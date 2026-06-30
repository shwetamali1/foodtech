<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Razorpay\Api\Api;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Mail;
use PDF;

class SubscriptionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
		parent::leftMenu();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
		$UserId = Auth::user()->id;
		$role_id = Auth::user()->user_role_id;

        $showRec = DB::table('subscriptions')
    ->select(
        "subscriptions.*",
        "billing_details.transaction_id",
        "billing_details.subscribe_id",
        "billing_details.expiry_date",
        "payments.r_payment_id",
        "payments.method",
        "payments.amount",
        "payments.status as payment_status",
        "payments.created_at as payment_date"
    )
    ->leftJoin('billing_details', function($join) use ($UserId) {
        $join->on('subscriptions.id', '=', 'billing_details.subscribe_id')
             ->where('billing_details.user_id', $UserId)
             ->where('billing_details.payment_plan', 'subcribe')   
             ->whereRaw('billing_details.id = (
                 SELECT MAX(id) 
                 FROM billing_details 
                 WHERE billing_details.subscribe_id = subscriptions.id
                 AND billing_details.user_id = ?
                 AND billing_details.payment_plan = "subcribe"
             )', [$UserId]);
    })
    ->leftJoin('payments', function($join) {
        $join->on('billing_details.id', '=', 'payments.billing_detail_id')
             ->whereRaw('payments.id = (
                 SELECT MAX(id) 
                 FROM payments 
                 WHERE payments.billing_detail_id = billing_details.id
             )');
    })
    ->get();

      
        return view('admin-views.subscription.list', ['showRec' => $showRec, 'role_id' => $role_id]);
    }
    public function add() {
		$UserId = Auth::user()->id;
		$cdate = date("Y-m-d");
        $records =DB::table('roles')
			->select('id','role_name')
            ->get();
        return view('admin-views.subscription.add', ['records' => $records]);
    }
    
    public function add_submit(Request $request) {
		$method = $request->method();

		if($method == 'POST') {
            $validate = $this->validate($request,[
                'title' => 'required',
				'offer' => 'required',
				'description' => 'required',
				'price' => 'required',
				'features' => 'required',
    		],[
                'title.required' => 'Title field is required.',
				'offer.required' => 'Offer field is required.',
				'description.required' => 'Description field is required.',
				'price.required' => 'Price field is required.',
				'features.required' => 'Feature field is required..',
    		]);

			$id = DB::table('subscriptions')->insertGetId([
                'title' => $request->title,
                'offer' => $request->offer,
                'description' => $request->description,
                'price' => $request->price,
                'per' => '',
                'government_fee' => $request->government_fee,
                'discount' => $request->discount,
                'credits' => $request->credits,
                'label_validation_limit' => $request->label_validation_limit ?: null,
                'features' => json_encode($request->features),
			]);

			return redirect('subscriptions/list');
        }
    }
    public function updateRecord(Request $request,$id) {
        
		$method = $request->method();

		if($method == 'POST') {
			$validate = $this->validate($request,[
                'title' => 'required',
				'offer' => 'required',
				'description' => 'required',
				'price' => 'required',
				'features' => 'required',
    		],[
                'title.required' => 'Title field is required.',
				'offer.required' => 'Offer field is required.',
				'description.required' => 'Description field is required.',
				'price.required' => 'Price field is required.',
				'features.required' => 'Feature field is required..',
    		]);

			if(!empty($id)) {
				DB::table('subscriptions')->where('id', $id)->update([
                    'title' => $request->title,
                    'offer' => $request->offer,
                    'description' => $request->description,
                    'price' => $request->price,
                    'per' => '',
                    'government_fee' => $request->government_fee,
                    'discount' => $request->discount,
                    'credits' => $request->credits,
                    'label_validation_limit' => $request->label_validation_limit ?: null,
                    'features' => json_encode($request->features),
				]);

			}
			return redirect('subscriptions/list');

		} else if($method == 'GET') {
			$editRec = DB::table('subscriptions')->select('subscriptions.*')->where('subscriptions.id', '=', $id)->first();
              
			$roleRec = DB::table('roles')->select('id', 'role_name')->get();
            return view('admin-views.subscription.edit', ['editRec' => $editRec, 'roleRec' => $roleRec]);
		}
	}
	public function subscribe($id = null) {
	    $editRec = DB::table('subscriptions')->select('subscriptions.*')->where('subscriptions.id', '=', $id)->first();
              
        return view('admin-views.subscription.subscribe', ['editRec' => $editRec]);
	}
	public function billing(Request $request, $id = null){
	    $method = $request->method();
        $UserId = Auth::user()->id;
		$cdate = date("Y-m-d");
		if($method == 'POST') {
			$validate = $this->validate($request,[
                'first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
    		],[
    		    'first_name.required' => 'First name field is required.',
				'last_name.required' => 'Last name field is required.',
				'email.required' => 'Email field is required.',
				'email.regex' => 'Please enter valid email.',
    		]);
    		
    		$billingData = DB::table('billing_details')
                ->select('billing_details.*')
                ->where('billing_details.user_id', '=', $UserId)
                ->where('billing_details.payment_plan', '=', 'subcribe')
                ->first();

            if (!empty($billingData)) {
                $lastId = $billingData->id;
                // Intentionally NOT updating subscribe_id / subscription_start_date here:
                // those should only change once payment actually succeeds (see store()/switchPlan()).
                // Otherwise simply reaching the billing form and then cancelling payment would
                // silently overwrite the user's currently active plan.
                DB::table('billing_details')
                    ->where('id', $lastId)
                    ->update([
                        'first_name'     => $request->first_name,
                        'last_name'      => $request->last_name,
                        'email'          => $request->email,
                        'mobile'         => $request->mobile,
                        'country'        => 'India',
                        'payment_method' => 'Online',
                        'country_code'   => '+91',
                        'user_id'        => $UserId,
                        'payment_plan'   => 'subcribe',
                    ]);
            } else {
                $lastId = DB::table('billing_details')->insertGetId([
                    'first_name'              => $request->first_name,
                    'last_name'               => $request->last_name,
                    'email'                   => $request->email,
                    'mobile'                  => $request->mobile,
                    'country'                 => 'India',
                    'payment_method'          => 'Online',
                    'country_code'            => '+91',
                    'user_id'                 => $UserId,
                    'payment_plan'            => 'subcribe',
                    'subscribe_id'            => $id,
                    'subscription_start_date' => $cdate,
                ]);
            }

            return redirect('subscriptions/pay/' . $id . '/' . $lastId);

		} else if($method == 'GET') {
		    $userData = DB::table('users')->select('*')->where('id', '=', $UserId)->first();
    	    $editRec = DB::table('subscriptions')->select('subscriptions.*')->where('subscriptions.id', '=', $id)->first();
                  
            return view('admin-views.subscription.billing', ['editRec' => $editRec, 'userData' => $userData]);
		}
	}
	public function pay(Request $request, $id = null, $billingId = null)
    {
        $editRec = DB::table('subscriptions')->select('subscriptions.*')->where('subscriptions.id', '=', $id)->first();
        $billingData = DB::table('billing_details')->select('billing_details.*')->where('billing_details.id', '=', $billingId)->first();

        $mprice   = (float) str_replace('RS', '', $editRec->price);
        $discount = !empty($editRec->discount) ? (float) $editRec->discount : 0;
        $dis      = ($mprice * $discount) / 100;
        $govtFee  = !empty($editRec->government_fee) ? (float) $editRec->government_fee : 0;
        $newPrice = $mprice - $dis + $govtFee;

        $alreadyPaid = 0;
        $isUpgrade = !empty($billingData->expiry_date) && Carbon::parse($billingData->expiry_date)->isFuture();
        if ($isUpgrade) {
            $lastPayment = DB::table('payments')
                ->where('billing_detail_id', $billingId)
                ->where('status', 'success')
                ->orderByDesc('id')
                ->first();
            if ($lastPayment) {
                $alreadyPaid = (float) $lastPayment->amount;
            }
        }

        $payable = max(0, $newPrice - $alreadyPaid);

        return view('admin-views.subscription.pay', [
            'editRec'     => $editRec,
            'billingData' => $billingData,
            'newPrice'    => $newPrice,
            'alreadyPaid' => $alreadyPaid,
            'payable'     => $payable,
            'isUpgrade'   => $isUpgrade,
        ]);
    }
    public function store(Request $request, $id = null, $billingId = null)
    {
        try {
            $paymentId = $request->input('razorpay_payment_id');
            $billing   = $request->input('billingId');

            if (!$paymentId) {
                throw new \Exception('Missing razorpay_payment_id');
            }

            $existingPayment = DB::table('payments')
                ->where('user_id', Auth::user()->id)
                ->where('billing_detail_id', $billing)
                ->first();

            if (!empty($existingPayment)) {
                DB::table('payments')
                    ->where('user_id', Auth::user()->id)
                    ->where('billing_detail_id', $billing)
                    ->update(['status' => 'upgrade']);
            }

            $paymentData = [
                'r_payment_id'      => $paymentId,
                'method'            => '',
                'currency'          => 'INR',
                'email'             => Auth::user()->email ?? '',
                'phone'             => '',
                'amount'            => (float) $request->input('amount', 0),
                'status'            => 'success',
                'json_response'     => json_encode(['payment_id' => $paymentId]),
                'billing_detail_id' => $billing,
                'user_id'           => Auth::user()->id,
            ];

            try {
                $api     = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
                $payment = $api->payment->fetch($paymentId);
                $paymentData = array_merge($paymentData, [
                    'r_payment_id'  => $payment->id,
                    'method'        => $payment->method ?? '',
                    'currency'      => $payment->currency ?? 'INR',
                    'email'         => $payment->email ?? $paymentData['email'],
                    'phone'         => $payment->contact ?? '',
                    'amount'        => ($payment->amount ?? 0) / 100,
                    'json_response' => json_encode($payment->toArray()),
                ]);
            } catch (\Exception $apiEx) {
                \Log::error('RAZORPAY_FETCH_ERROR: ' . $apiEx->getMessage() . ' | payment_id: ' . $paymentId);
            }

            $savedPayment  = Payment::create($paymentData);

            $planId = $request->input('planId');

            $billingUpdate = [
                'subscription_start_date' => now(),
                'expiry_date'             => now()->addYear(),
            ];
            if (!empty($planId)) {
                $billingUpdate['subscribe_id'] = $planId;
            }
            DB::table('billing_details')->where('id', $billing)->update($billingUpdate);

            return response()->json([
                'success' => true,
                'message' => 'Payment processed successfully',
                'lastId'  => $savedPayment->id,
            ]);
        } catch (\Exception $e) {
            \Log::error('PAYMENT_STORE_ERROR: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    public function switchPlan(Request $request, $billingId)
    {
        $billing = DB::table('billing_details')
            ->where('id', $billingId)
            ->where('user_id', Auth::id())
            ->first();

        abort_unless($billing, 404);

        $planId = $request->input('planId');
        abort_if(empty($planId), 422, 'Missing plan id.');

        DB::table('payments')
            ->where('billing_detail_id', $billingId)
            ->where('status', 'success')
            ->update(['status' => 'upgrade']);

        $paymentId = Payment::create([
            'r_payment_id'      => 'SWITCH-' . time(),
            'method'            => 'plan-switch',
            'currency'          => 'INR',
            'email'             => Auth::user()->email ?? '',
            'phone'             => '',
            'amount'            => 0,
            'status'            => 'success',
            'json_response'     => json_encode(['note' => 'Covered by existing plan credit, no additional payment']),
            'billing_detail_id' => $billingId,
            'user_id'           => Auth::id(),
        ])->id;

        DB::table('billing_details')->where('id', $billingId)->update([
            'subscription_start_date' => now(),
            'expiry_date'             => now()->addYear(),
            'subscribe_id'            => $planId,
        ]);

        return response()->json([
            'success' => true,
            'lastId'  => $paymentId,
        ]);
    }

    public function failed(Request $request) {
        return response()->json(['success' => true, 'message' => 'Payment failure recorded']);
    }

    public function deleteRecord(Request $request, $id=null) {
		if(isset($id)) {
			DB::table('subscriptions')
                ->where('id', $id)
                ->update(['is_deleted' => '1']);

			return back(); // page reload
		}
	}
	public function thankyou(Request $request, $pid = null){
	    $records = DB::table('billing_details')
            ->select(
                'billing_details.*',
                'payments.id as payment_id',
                'payments.r_payment_id',
                'payments.method',
                'payments.amount',
                'payments.status as p_status',
                'payments.created_at as payment_date',
                'reports.reports_title as report_title',
                'subscriptions.title as subscription_name',
                'reports.uploaded_pdf'
            )
            ->join('payments', 'billing_details.id', '=', 'payments.billing_detail_id')
        
            // Join reports only when payment_plan = 'report'
            ->leftJoin('reports', function($join) {
                $join->on('billing_details.subscribe_id', '=', 'reports.id')
                     ->where('billing_details.payment_plan', 'report');
            })
        
            // Join subscriptions only when payment_plan != 'report'
            ->leftJoin('subscriptions', function($join) {
                $join->on('billing_details.subscribe_id', '=', 'subscriptions.id')
                     ->where('billing_details.payment_plan', '!=', 'report');
            })
        
            ->where('payments.id', $pid)
            ->first();

        if ($records) {
            try {
                Mail::send('email/subscriptionconfirm', ['data' => $records], function($message) use($records){
                    $message->subject('Subscription Purchase Confirmation - '. $records->subscription_name);
                    $message->to($records->email);
                });
                Mail::send('email/adminconfirm', ['data' => $records], function($message) use($records){
                    $plan = !empty($records->subscription_name) ? $records->subscription_name : $records->report_title;
                    $message->subject('New ' . $records->payment_plan . ' Purchased - ' . $plan);
                    $message->to('malishweta7434@gmail.com');
                });
            } catch (\Exception $e) {
                \Log::error('THANKYOU_MAIL_ERROR: ' . $e->getMessage());
            }
        }

        return view('admin-views.subscription.thank-you');
    }
    public function invoice(Request $request, $pid = null, $bid = null){
        $records = DB::table('billing_details')
        ->select(
            'billing_details.*',
            'payments.id as payment_id',
            'payments.r_payment_id',
            'payments.method',
            'payments.amount',
            'payments.status as p_status',
            'payments.created_at as payment_date',
            'reports.reports_title as report_title',
            'subscriptions.title as subscription_name',
        )
        ->join('payments', 'billing_details.id', '=', 'payments.billing_detail_id')
        
        ->leftJoin('reports', function($join) {
            $join->on('billing_details.subscribe_id', '=', 'reports.id')
                 ->where('billing_details.payment_plan', 'report');
        })
    
        // Join subscriptions only when payment_plan != 'report'
        ->leftJoin('subscriptions', function($join) {
            $join->on('billing_details.subscribe_id', '=', 'subscriptions.id')
                 ->where('billing_details.payment_plan', '!=', 'report');
        })
    
        ->where('billing_details.id', $bid)
        ->first();
        if($records->payment_plan == 'report'){ $title = $records->report_title; } else{ $title = $records->subscription_name; }
        $data = [
            'invoice_id' => $records->r_payment_id,
            'customer_name' => $records->first_name.' '. $records->last_name,
            'customer_email' => $records->email,
            'date' => now()->format('d-m-Y'),
            'items' => [
                ['name' => $title, 'qty' => 1, 'price' => $records->amount],
            ],
        ];

        $pdf = PDF::loadView('admin-views.subscription.invoice', $data);

        return $pdf->download('invoice_'.$data['invoice_id'].'.pdf');
    }
}
