<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class SettingsController extends Controller
{
    /**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
		parent::leftMenu();
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function profile() {
		$id = Auth::user()->id;
		$editRec = DB::table('users')->select('users.*')->where('users.id', '=', $id)->first();
        $business_category = DB::table('business_categories')->select('id', 'category')->get();      
		$roleRec = DB::table('roles')->select('id', 'role_name')->get();
		if($id != 1 && $id != 6){
		    $notifications = DB::table('notifications')->select('*')->where('notifications.send_to', '=', $id)->get();
		}else{
		    $notifications = DB::table('notifications')->select('*')->get();
		}
        return view('admin-views.settings.profile', ['editRec' => $editRec, 'roleRec' => $roleRec, 'notifications' => $notifications,'business_category' => $business_category]);
		
	}
	public function updateRecord(Request $request) {
        
		$method = $request->method();

		if($method == 'POST') {
			$id = Auth::user()->id;
			
			$validate = $this->validate($request,[
				'first_name' => 'required',
				'last_name' => 'required',
				'password' => 'required|min:6',
				'mobile' => 'required|numeric|max_digits:10',
				'category' => 'required',
				'cname'  => 'required',
    		],[
				'first_name.required' => 'First name field is required.',
				'last_name.required' => 'Last name field is required.',
				'password.required' => 'Password field is required.',
				'password.min' => 'Password minimum 6 characters.',
				'mobile.required' => 'Mobile field is required.',
				'category.required' => 'Category field is required.',
				'cname.required' => 'company field is required.',
    		]);

			if(!empty($id)) {
				$editRec = DB::table('users')->select('password')->where('id', '=', $id)->first();
				$getPass = $request->input('password');

				if(($editRec->password != $getPass) && $getPass !="") {
					$password = Hash::make($getPass);
				} else {
					$password = $getPass;
				}

				DB::table('users')->where('id', $id)->update([
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'password' => $password,
                    'mobile' => $request->input('mobile'),
                    'category_id' => $request->input('category'),
                    'company_name' => $request->input('cname'),
    				'country' => $request->input('country'),
    				'state' => $request->input('state'),
    				'city' => $request->input('city'),
				]);

			}
			//return redirect('settings/profiles');
			return redirect()->back()->with('success', 'Your record has been successfully updated');

		}
	}
	public function getNotification(Request $request){
		$id = $request->id;
		$notifications = DB::table('notifications')->select('*')->where('id', $id)->first();
		return $notifications;
	}
	public function reports() {
		$UserId = Auth::user()->id;
		$editRec = DB::table('users')->select('users.*')->where('users.id', '=', $UserId)->first();
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
            'reports.uploaded_pdf',
        )
        ->join('payments', 'billing_details.id', '=', 'payments.billing_detail_id')
    
        // Join reports only when payment_plan = 'report'
        ->leftJoin('reports', function($join) {
            $join->on('billing_details.subscribe_id', '=', 'reports.id')
                 ->where('billing_details.payment_plan', 'report');
        })
    
        ->where('billing_details.user_id', $UserId)
        ->where('billing_details.payment_plan', 'report')
        ->get();
        return view('admin-views.settings.reports', ['editRec' => $editRec, 'records' => $records]);
	}
	public function subscriptions() {
		$UserId = Auth::user()->id;
		$editRec = DB::table('users')->select('users.*')->where('users.id', '=', $UserId)->first();
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
            'users.first_name as first_name',
            'users.last_name as last_name',
            'users.email as user_email',
            'users.mobile as user_phone'
        )
        ->join('payments', 'billing_details.id', '=', 'payments.billing_detail_id')
        ->leftJoin('reports', function($join) {
            $join->on('billing_details.subscribe_id', '=', 'reports.id')
                 ->where('billing_details.payment_plan', 'report');
        })
        ->leftJoin('subscriptions', function($join) {
            $join->on('billing_details.subscribe_id', '=', 'subscriptions.id')
                 ->where('billing_details.payment_plan', '!=', 'report');
        })
        ->leftJoin('users', 'billing_details.user_id', '=', 'users.id')
        ->where('payments.status', 'success')
        ->get();
        return view('admin-views.settings.subscriptions', ['editRec' => $editRec, 'records' => $records]);
	}
	public function notifications(Request $request) {
		$method = $request->method();
        $UserId = Auth::user()->id;
		if($method == 'POST') {
			$validate = $this->validate($request,[
                'user_id' => 'required',
				'notification' => 'required',
    		],[
                'user_id.required' => 'select user.',
				'notification.required' => 'notification field is required.',
    		]);

    		// Save notification to database
    		DB::table('notifications')->insertGetId([
                'notification' => $request->notification,
                'sent_by' => $UserId,
                'send_to' => $request->user_id,
                'status' => 'unread',
			]);

			// Fetch the recipient user to send them an email notification
			$recipient = DB::table('users')->where('id', $request->user_id)->first();
			if ($recipient && !empty($recipient->email)) {
			    $name = trim(($recipient->first_name ?? '') . ' ' . ($recipient->last_name ?? ''));
			    $name = $name ?: $recipient->email;
			    $msgText = $request->notification;
			    try {
			        Mail::send('email.notification', ['name' => $name, 'message' => $msgText], function ($mail) use ($recipient, $name) {
			            $mail->to($recipient->email, $name);
			            $mail->subject('New Notification from FoodTech Mate');
			        });
			    } catch (\Exception $e) {
			        // Log email failure but don't interrupt the flow
			        \Log::error('Notification email failed: ' . $e->getMessage());
			    }
			}

			return redirect()->back()->with('success', 'Notification sent successfully');
		} else {
			$users = DB::table('users')
            ->whereNotIn('user_role_id', [1, 6])
            ->get();

			return view('admin-views.settings.notifications', [
				'users' => $users
			]);
		}
    }

    /**
     * Mark a notification as read.
     * Called via POST /settings/notifications/mark-read/{id}
     */
    public function markNotificationRead(Request $request, $id)
    {
        $UserId = Auth::user()->id;

        // Only allow marking own notifications as read
        DB::table('notifications')
            ->where('id', $id)
            ->where('send_to', $UserId)
            ->update(['status' => 'read']);

        if ($request->wantsJson()) {
            return response()->json(['success' => true]);
        }
        return redirect()->back()->with('success', 'Notification marked as read.');
    }

    /**
     * Mark all notifications as read for the current user.
     * Called via POST /settings/notifications/mark-all-read
     */
    public function markAllNotificationsRead(Request $request)
    {
        $UserId = Auth::user()->id;

        DB::table('notifications')
            ->where('send_to', $UserId)
            ->where('status', 'unread')
            ->update(['status' => 'read']);

        if ($request->wantsJson()) {
            return response()->json(['success' => true]);
        }
        return redirect()->back()->with('success', 'All notifications marked as read.');
    }
    
	public function featureDocuments()
{
    $userId = Auth::user()->id;

    $editRec = DB::table('users')
        ->where('id', $userId)
        ->first();

    $documents = DB::table('feature_documents')
        ->select(
            'feature_documents.id',
            'feature_documents.feature_text',
            'feature_documents.original_name',
            'feature_documents.file_path',
            'feature_documents.created_at',
        )
        ->leftJoin('subscriptions', 'feature_documents.subscription_id', '=', 'subscriptions.id')
        ->where('feature_documents.user_id', $userId)
        ->orderBy('feature_documents.created_at', 'desc')
        ->get();

    return view(
        'admin-views.settings.liecense',
        compact('editRec', 'documents')
    );
}
public function downloadFeatureDocument($id)
{
    $userId = Auth::user()->id;

    $document = DB::table('feature_documents')
        ->where('id', $id)
        ->where('user_id', $userId) // security check
        ->first();

    if (!$document) {
        abort(404, 'File not found');
    }

    if (!Storage::disk('public')->exists($document->file_path)) {
        abort(404, 'File missing from storage');
    }

    return Storage::disk('public')->download(
        $document->file_path,
        $document->original_name   // downloads as 07.jpg
    );
}
}
