<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\JsonResponse;
use Razorpay\Api\Api;
use App\Models\Payment;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ReportsController extends Controller
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
		$userRole = Auth::user()->user_role_id;
		$cdate = date("Y-m-d");
// 		if(Auth::user()->user_role_id ==1 || Auth::user()->user_role_id ==6){
// 			$showRec = DB::table('reports')
// 				->select("reports.*")
// 				->where('reports.is_deleted', '0')
// 				->get();
// 		}else{
// 			$showRec = DB::table('reports')
// 				->select("reports.*")
// 				->where('reports.is_deleted', '0')
// 				->where('reports.user_id', $UserId)
// 				->get();
// 		}
            $showRec = DB::table('reports')
				->select("reports.*")   
				->where('reports.is_deleted', '0')
				->get();
       
        return view('admin-views.reports.list', ['showRec' => $showRec, 'userRole' => $userRole]);
    }
    public function add() {
		$UserId = Auth::user()->id;
		$cdate = date("Y-m-d");
        $records =DB::table('roles')->select('id','role_name')->get();
        $categories =DB::table('report_categories')->select('id','category')->where('report_categories.is_deleted', '=', '0')->get();
        return view('admin-views.reports.add', ['records' => $records, 'categories' => $categories]);
    }
    public function add_submit(Request $request) {
		$method = $request->method();
        $UserId = Auth::user()->id;
		if($method == 'POST') {
            $validate = $this->validate($request,[
                'title' => 'required',
				'price' => 'required',
				'description' => 'required',
				'category_id' => 'required',
                'meta_title' => 'nullable|max:60',
                'meta_description' => 'nullable|max:160',
    		],[
                'title.required' => 'Title field is required.',
				'price.required' => 'Price field is required.',
				'description.required' => 'Description field is required.',
				'category_id.required' => 'Please select category.',
    		]);
			
            $slug = Str::slug($request->input('title'));

       
			$id = DB::table('reports')->insertGetId([
                'reports_title' => $request->input('title'),
                'slug' => $slug,
				'price' => $request->input('price'),
				'category_id' => $request->input('category_id'),
                'meta_title'       => $request->input('meta_title'),
                'meta_description' => $request->input('meta_description'),
				'description' => $request->input('description'),
				'user_id' => $UserId,
				'uploaded_video' => $request->input('uploaded_video'),
				'uploaded_pdf' => $request->input('uploaded_pdf'),
			]);

			return redirect('reports/list');
        }
    }
    public function updateRecord(Request $request,$id) {
        
		$method = $request->method();

		if($method == 'POST') {
			$validate = $this->validate($request,[
                'title' => 'required',
				'price' => 'required',
				'description' => 'required',
				'category_id' => 'required',
                'meta_title' => 'nullable|max:60',
                'meta_description' => 'nullable|max:160',
    		],[
                'title.required' => 'Title field is required.',
				'price.required' => 'Price field is required.',
				'description.required' => 'Description field is required.',
				'category_id.required' => 'Please select category.',
    		]);

			if(!empty($id)) {
				
				DB::table('reports')->where('id', $id)->update([
                    'reports_title' => $request->input('title'),
    				'price' => $request->input('price'),
                    'meta_title'       => $request->input('meta_title'),
                    'meta_description' => $request->input('meta_description'),
    				'category_id' => $request->input('category_id'),
    				'description' => $request->input('description'),
    				'uploaded_video' => $request->input('uploaded_video'),
    				'uploaded_pdf' => $request->input('uploaded_pdf'),
				]);

			}
			return redirect('reports/list');

		} else if($method == 'GET') {
			$editRec = DB::table('reports')->select('reports.*')->where('reports.id', '=', $id)->first();
            $categories =DB::table('report_categories')->select('id','category')->where('report_categories.is_deleted', '=', '0')->get();  
			$roleRec = DB::table('roles')->select('id', 'role_name')->get();
            return view('admin-views.reports.edit', ['editRec' => $editRec, 'roleRec' => $roleRec, 'categories' => $categories]);
		}
	}
	public function viewReports($id=null){
	    $editRec = DB::table('reports')->select('reports.*')->where('reports.id', '=', $id)->first();
              
        return view('admin-views.reports.view-report', ['report' => $editRec]);
	}
	public function payout($id=null){
	    $editRec = DB::table('reports')->select('reports.*')->where('reports.id', '=', $id)->first();
              
        return view('admin-views.reports.payout', ['editRec' => $editRec]);
	}
	
    public function deleteRecord(Request $request, $id=null) {
		if(isset($id)) {
			DB::table('reports')
                ->where('id', $id)
                ->update(['is_deleted' => '1']);

			return back(); // page reload
		}
	}
	public function getDownload(Request $request, $file=null)
    {
        $fileName = public_path('images/'.$file);
        return response()->download($fileName);
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

			$lastId = DB::table('billing_details')->insertGetId([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'country' => 'India',
                'payment_method' => 'Online',
                'country_code' => '+91',
                'user_id' => $UserId,
                "payment_plan" => 'report',
                'subscribe_id' => $id,
                'subscription_start_date' => $cdate,
                
			]);
			//return redirect('subscriptions/thank-you/'.$id);
			return redirect('reports/pay/'.$id.'/'.$lastId);

		} else if($method == 'GET') {
		    $userData = DB::table('users')->select('*')->where('id', '=', $UserId)->first();
    	    $editRec = DB::table('reports')->select('reports.*')->where('reports.id', '=', $id)->first();
                  
            return view('admin-views.reports.billing', ['editRec' => $editRec, 'userData' => $userData]);
		}
	}
	
	public function pay(Request $request, $id = null, $billingId = null)
    {
        $editRec = DB::table('reports')->select('reports.*')->where('reports.id', '=', $id)->first();
        $billingData = DB::table('billing_details')->select('billing_details.*')->where('billing_details.id', '=', $billingId)->first();
        
        return view('admin-views.reports.pay',['editRec' => $editRec, 'billingData' => $billingData]);
    }
    public function store(Request $request, $id = null, $billingId = null)
    {
         //DB::beginTransaction();
         
         try {
            $paymentId = $request->input('razorpay_payment_id');
            $orderId   = $request->input('razorpay_order_id');
            $signature = $request->input('razorpay_signature');
            $billing = $request->input('billingId');
            
            if (!$paymentId) {
                throw new \Exception('Missing razorpay_payment_id');
            }

            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

            // Fetch payment details
            $payment = $api->payment->fetch($paymentId);

            // Capture payment (amount must be same as order)
            $payment->capture(['amount' => $payment['amount']]);
            
            $savedPayment = Payment::create([
                'r_payment_id'    => $payment->id,
                'method'          => $payment->method,
                'currency'        => $payment->currency,
                'email'           => $payment->email,
                'phone'           => $payment->contact,
                'amount'          => $payment->amount / 100, // paise → ₹
                'status'          => 'success',
                'json_response'   => json_encode($payment->toArray()),
                'billing_detail_id' => $billing,
                "user_id" => Auth::user()->id,
            ]);
            $lastPaymentId = Payment::latest('id')->first()->id;

            return response()->json([
                'success' => true,
                'message' => 'Payment captured successfully',
                'lastId' => $lastPaymentId,
                'payment' => $payment
            ]);
        } catch (\Exception $e) {
            \Log::error('PAYMENT_STORE_ERROR: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'error'   => $e->getMessage()
            ], 500);
        }

    }

    public function failed(Request $request) {
        DB::beginTransaction();
        
        try {
            $responseData = $request->input('response');
            $errorData = $request->input('error');
            $billing      = $request->input('billingId');
            $amount       = $request->input('amount');
            $UserId       = auth()->id(); // or however you get the logged-in user
            // $data = data_get($errorData, 'metadata.payment_id');
            
            // Payment::create([
            //     'r_payment_id'     => '',
            //     'method'           => '',
            //     'currency'         => 'INR',
            //     'email'            => '', // set user email here
            //     'phone'            => '', // set user phone here
            //     'amount'           => $amount,
            //     'status'           => 'failed',
            //     'json_response'    => json_encode($errorData->toArray()),
            //     'billing_detail_id'=> $billing,
            //     'user_id'          => $UserId,
            // ]);

            return response()->json(['success' => true, 'message' => 'Payment failure recorded']);

        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('PAYMENT_FAILURE_ERROR: '.$th->getMessage());
            return response()->json(['success' => false, 'error' => 'Internal Server Error'], 500);
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
            
           
            Mail::send('email/userpurchase', ['data' => $records], function($message) use($records){

              $message->to($records->email);

              $message->subject('Subscription Purchase Confirmation - '. $records->report_title);

          });
          Mail::send('email/adminconfirm', ['data' => $records], function($message) use($records){
               

              $message->to('malishweta7434@gmail.com');

              $message->subject('Report Purchase Confirmation - '.$records->report_title);

          });
        return view('admin-views.reports.thank-you');
    }


    public function ckeditorUpload(Request $request): JsonResponse
    {
        if (!$request->hasFile('upload')) {
            return response()->json(['error' => 'No file'], 400);
        }
    
        $file = $request->file('upload');
    
        // Ensure directory exists
        $path = public_path('ckeditor');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
    
        $filename = time().'_'.preg_replace('/[^A-Za-z0-9.\-_]/', '_', $file->getClientOriginalName());
    
        // Move file to public/ckeditor
        $file->move($path, $filename);
    
        // 🔥 Return PUBLIC URL
        return response()->json([
            'url' => url('ckeditor/'.$filename)
        ]);
    }
    

}
