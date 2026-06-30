<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use App\Models\Payment;
use Mail;

class AddonServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::leftMenu();
    }

    public function index()
    {
        $role_id = Auth::user()->user_role_id;

        $showRec = DB::table('addon_services')
            ->where('is_deleted', 0)
            ->get();

        return view('admin-views.addon-services.list', ['showRec' => $showRec, 'role_id' => $role_id]);
    }

    public function add()
    {
        return view('admin-views.addon-services.add');
    }

    public function add_submit(Request $request)
    {
        if ($request->method() == 'POST') {
            $this->validate($request, [
                'title' => 'required',
                'price' => 'required',
                'label_validation_credit' => 'nullable|integer|min:1',
            ], [
                'title.required' => 'Title field is required.',
                'price.required' => 'Price field is required.',
            ]);

            DB::table('addon_services')->insertGetId([
                'title'                   => $request->title,
                'price'                   => $request->price,
                'label_validation_credit' => $request->label_validation_credit ?: null,
                'description'             => $request->description,
            ]);

            return redirect('addon-services/list');
        }
    }

    public function updateRecord(Request $request, $id)
    {
        if ($request->method() == 'POST') {
            $this->validate($request, [
                'title' => 'required',
                'price' => 'required',
                'label_validation_credit' => 'nullable|integer|min:1',
            ], [
                'title.required' => 'Title field is required.',
                'price.required' => 'Price field is required.',
            ]);

            DB::table('addon_services')->where('id', $id)->update([
                'title'                   => $request->title,
                'price'                   => $request->price,
                'label_validation_credit' => $request->label_validation_credit ?: null,
                'description'             => $request->description,
            ]);

            return redirect('addon-services/list');
        } else {
            $editRec = DB::table('addon_services')->where('id', $id)->first();

            return view('admin-views.addon-services.edit', ['editRec' => $editRec]);
        }
    }

    public function deleteRecord(Request $request, $id = null)
    {
        if (isset($id)) {
            DB::table('addon_services')->where('id', $id)->update(['is_deleted' => 1]);

            return back();
        }
    }

    public function billing(Request $request, $id = null)
    {
        $UserId = Auth::user()->id;

        if ($request->method() == 'POST') {
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            ], [
                'first_name.required' => 'First name field is required.',
                'last_name.required' => 'Last name field is required.',
                'email.required' => 'Email field is required.',
                'email.regex' => 'Please enter valid email.',
            ]);

            $lastId = DB::table('billing_details')->insertGetId([
                'first_name'              => $request->first_name,
                'last_name'               => $request->last_name,
                'email'                   => $request->email,
                'mobile'                  => $request->mobile,
                'country'                 => 'India',
                'payment_method'          => 'Online',
                'country_code'            => '+91',
                'user_id'                 => $UserId,
                'payment_plan'            => 'addon_service',
                'subscribe_id'            => $id,
                'subscription_start_date' => date('Y-m-d'),
            ]);

            return redirect('addon-services/pay/' . $id . '/' . $lastId);
        } else {
            $userData = DB::table('users')->where('id', $UserId)->first();
            $editRec = DB::table('addon_services')->where('id', $id)->first();

            return view('admin-views.addon-services.billing', ['editRec' => $editRec, 'userData' => $userData]);
        }
    }

    public function pay(Request $request, $id = null, $billingId = null)
    {
        $editRec = DB::table('addon_services')->where('id', $id)->first();
        $billingData = DB::table('billing_details')->where('id', $billingId)->first();

        // razorpay-form component expects these (present on subscriptions, absent on addon_services)
        $editRec->discount = null;
        $editRec->government_fee = null;

        $newPrice = (float) str_replace('RS', '', $editRec->price);

        return view('admin-views.addon-services.pay', [
            'editRec'     => $editRec,
            'billingData' => $billingData,
            'newPrice'    => $newPrice,
            'alreadyPaid' => 0,
            'payable'     => $newPrice,
            'isUpgrade'   => false,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $paymentId = $request->input('razorpay_payment_id');
            $billing   = $request->input('billingId');

            if (!$paymentId) {
                throw new \Exception('Missing razorpay_payment_id');
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

            $savedPayment = Payment::create($paymentData);

            $billingRow = DB::table('billing_details')->where('id', $billing)->first();
            if ($billingRow) {
                $service = DB::table('addon_services')->where('id', $billingRow->subscribe_id)->first();
                if ($service && !empty($service->label_validation_credit)) {
                    DB::table('users')->where('id', Auth::id())
                        ->increment('addon_label_credits', $service->label_validation_credit);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Payment processed successfully',
                'lastId'  => $savedPayment->id,
            ]);
        } catch (\Exception $e) {
            \Log::error('ADDON_PAYMENT_STORE_ERROR: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    public function failed(Request $request)
    {
        return response()->json(['success' => true, 'message' => 'Payment failure recorded']);
    }

    public function thankyou(Request $request, $pid = null)
    {
        $records = DB::table('billing_details')
            ->select(
                'billing_details.*',
                'payments.id as payment_id',
                'payments.r_payment_id',
                'payments.method',
                'payments.amount',
                'payments.status as p_status',
                'payments.created_at as payment_date',
                'addon_services.title as report_title'
            )
            ->join('payments', 'billing_details.id', '=', 'payments.billing_detail_id')
            ->leftJoin('addon_services', function ($join) {
                $join->on('billing_details.subscribe_id', '=', 'addon_services.id')
                     ->where('billing_details.payment_plan', 'addon_service');
            })
            ->where('payments.id', $pid)
            ->first();

        if ($records) {
            try {
                Mail::send('email/userpurchase', ['data' => $records], function ($message) use ($records) {
                    $message->to($records->email);
                    $message->subject('Add-on Service Purchase Confirmation - ' . $records->report_title);
                });
                Mail::send('email/adminconfirm', ['data' => $records], function ($message) use ($records) {
                    $message->to('malishweta7434@gmail.com');
                    $message->subject('New Add-on Service Purchased - ' . $records->report_title);
                });
            } catch (\Exception $e) {
                \Log::error('ADDON_THANKYOU_MAIL_ERROR: ' . $e->getMessage());
            }
        }

        return view('admin-views.addon-services.thank-you');
    }
}
