<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\WebMenu;
use App\Models\ModulePermission;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;

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
		if($id !=1 || $id !=6){
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
                echo $editRec->password;
                
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
	public function liecenses() {
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
            'subscriptions.title as subscription_name'
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
    
        ->where('billing_details.user_id', $UserId)
        ->where('payments.status', 'success')
        ->get();
//         echo '<pre>'.print_r($records, true).'</pre>';
// 		exit;
	//	$record = DB::table('liecenses')->select('liecenses.*')->where('liecenses.user_id', '=', $UserId)->get();
        return view('admin-views.settings.liecense', ['editRec' => $editRec, 'records' => $records]);
		
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
//         echo '<pre>'.print_r($records, true).'</pre>';
// 		exit;
	//	$record = DB::table('liecenses')->select('liecenses.*')->where('liecenses.user_id', '=', $UserId)->get();
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
    
        // Join users
        ->leftJoin('users', 'billing_details.user_id', '=', 'users.id')
        ->where('payments.status', 'success')
        ->get();
//         echo '<pre>'.print_r($records, true).'</pre>';
// 		exit;
	//	$record = DB::table('liecenses')->select('liecenses.*')->where('liecenses.user_id', '=', $UserId)->get();
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
    		$id = DB::table('notifications')->insertGetId([
                'notification' => $request->notification,
                'sent_by' => $UserId,
                'send_to' => $request->user_id,
			]);
			
			return redirect()->back()->with('success', 'Notification send successfully');
		} else {
			$users = DB::table('users')
            ->whereNotIn('user_role_id', [1, 6])
            ->get();

			return view('admin-views.settings.notifications', [
				'users' => $users
			]);
		}
    }
    
	public function update(Request $request,$id) {
		$method = $request->method();

		if($method == 'POST') {
			$validate = Validator::make($request->all(), [
                'role_name' => 'required',
            ],[
            ]);

			if ($validate->fails()) {
                return response()->json(['errors' => $validate->errors()], 422);
            } else {
				$permissionIds = (!empty($request->input('menuIds'))) ? implode (",", $request->input('menuIds')) : "";
				$modulePermisstionIds = (!empty($request->input('modulePermisstionIds'))) ? implode (",", $request->input('modulePermisstionIds')) : "";

				$role = Role::find($id);
                $role->role_name = $request->role_name;
                $role->permission_id = $permissionIds;
				$role->module_permission_id = $modulePermisstionIds;
                $role->status = $request->status;
				if ($role->save()) {
					session()->flash('success', 'Role updated successfully');
					return response()->json(['success' => true, 'message' => 'Role updated successfully', 'redirect' => route('roles')]);
				} else {
					return response()->json(['success' => false, 'message' => 'Failed to insert record']);
				}
			}

		} else {
			$subMenuList = WebMenu::where([['parent_id', '!=', 0],['status', '=', 1]])->orderBy('orders', 'asc')->get();
			$modulePermissionParentList = ModulePermission::where([['parent_id', '=', 0],['status', '=', 1]])->orderBy('id','asc')->get();
			$modulePermissionList = ModulePermission::where([['parent_id', '!=', 0],['status', '=', 1]])->orderBy('id', 'asc')->get();
			$editRec = Role::where('id', '=', $id)->first();

			return view('admin-views.roles.edit', [
				'id' => $id,
				'editRec' => $editRec,
				'subMenuList' => $subMenuList,
				'modulePermissionParentList'=> $modulePermissionParentList,
				'modulePermissionList' => $modulePermissionList
			]);
		}
	}

	public function delete(Request $request, $id=null, $status=null) {
		if(isset($id) && isset($status)) {
			$role = Role::find($id);
			$role->status = ($status == 'active')? 'active' : 'inactive';
			if($role->save()) {
				$status_msg = ($status == "active")? "Role active successfully!" : "Role inactive successfully!";
				session()->flash('success', $status_msg);
				return back();
			}
		}
	}

	public function featureDocuments()
{
    $userId = Auth::user()->id;

    // User info (optional – same as licenses)
    $editRec = DB::table('users')
        ->where('id', $userId)
        ->first();

    // Fetch feature documents mapped with subscription
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

    // If stored in storage/app
   if (!Storage::disk('public')->exists($document->file_path)) {
        abort(404, 'File missing from storage');
    }

    return Storage::disk('public')->download(
        $document->file_path,
        $document->original_name   // downloads as 07.jpg
    );
}
}
