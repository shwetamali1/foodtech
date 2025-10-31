<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersController extends Controller
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
		$cdate = date("Y-m-d");
		$showRec = DB::table('users')
			->select("users.*", "roles.id as role_id","roles.role_name")
			->leftJoin('roles', 'users.user_role_id', '=', 'roles.id')
            ->where('users.is_deleted', '0')
			->get();
       
        return view('admin-views.users.list', ['showRec' => $showRec]);
    }
    public function add() {
		$UserId = Auth::user()->id;
		$cdate = date("Y-m-d");
        $records =DB::table('roles')
			->select('id','role_name')
            ->get();
        $business_category = DB::table('business_categories')->select('id', 'category')->get();
        return view('admin-views.users.add', ['records' => $records, 'business_category' => $business_category]);
    }
    public function add_submit(Request $request) {
		$method = $request->method();

		if($method == 'POST') {
            $validate = $this->validate($request,[
				'first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|unique:users,email',
				'mobile' => 'required|numeric|digits:10',
				'business_category' => 'required',
				'password' => 'required|min:6',
				'user_role_id' => 'required',
    		],[
				'first_name.required' => 'First name field is required.',
				'last_name.required' => 'Last name field is required.',
				'email.required' => 'Email field is required.',
				'email.regex' => 'Please enter valid email.',
				'email.unique' => 'Email already exists.',
				'password.required' => 'Password field is required.',
				'password.min' => 'Password minimum 6 characters.',
				'mobile.required' => 'Mobile field is required.',
				'business_category.required' => 'Category field is required.',
				'user_role_id.required' => 'Please select user role.',
    		]);

			$id = DB::table('users')->insertGetId([
				'first_name' => $request->input('first_name'),
				'last_name' => $request->input('last_name'),
                'user_name' => $request->input('first_name').'.'.$request->input('last_name'),
                'mobile' => $request->input('mobile'),
                'category_id' => $request->input('business_category'),
				'email' => $request->input('email'),
				'password' => Hash::make($request->input('password')),
				'user_role_id' => $request->input('user_role_id'),
				'status' => $request->input('status'),
			]);

			return redirect('users/list');
        }
    }
    public function updateRecord(Request $request,$id) {
        
		$method = $request->method();
		

		if($method == 'POST') {
			$validate = $this->validate($request,[
				'first_name' => 'required',
				'last_name' => 'required',
				'mobile' => 'required|numeric|digits:10',
				'business_category' => 'required',
				'password' => 'required|min:6',
				'user_role_id' => 'required',
    		],[
				'first_name.required' => 'First name field is required.',
				'last_name.required' => 'Last name field is required.',
				'password.required' => 'Password field is required.',
				'password.min' => 'Password minimum 6 characters.',
				'mobile.required' => 'Mobile field is required.',
				'business_category.required' => 'Category field is required.',
				'user_role_id.required' => 'Please select user role.',
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
                    'mobile' => $request->input('mobile'),
                    'category_id' => $request->input('business_category'),
                    'password' => $password,
                    'user_role_id' => $request->input('user_role_id'),
                    'status' => $request->input('status'),
				]);

			}
			return redirect('users/list');

		} else if($method == 'GET') {
			$editRec = DB::table('users')->select('users.*')->where('users.id', '=', $id)->first();
			$business_category = DB::table('business_categories')->select('id', 'category')->get();
              
			$roleRec = DB::table('roles')->select('id', 'role_name')->get();
            return view('admin-views.users.edit', ['editRec' => $editRec, 'roleRec' => $roleRec, 'business_category' => $business_category]);
		}
	}
    public function deleteRecord(Request $request, $id=null) {
		if(isset($id)) {
            DB::table('users')->where('id', $id)->delete();
            DB::table('user_request')->where('user_id', $id)->delete();
            DB::table('billing_details')->where('user_id', $id)->delete();
            DB::table('payments')->where('user_id', $id)->delete();
            DB::table('documents')->where('user_id', $id)->delete();

			return back(); // page reload
		}
	}
	public function getDocument() {
		$UserId = Auth::user()->id;
		$cdate = date("Y-m-d");
		
		$showRec = DB::table('documents')
			->select("documents.*", "document_type.id as document_type_id","document_type.type","users.first_name","users.last_name","users.email","users.mobile")
			->leftJoin('document_type', 'documents.doc_type_id', '=', 'document_type.id')
			->leftJoin('users', 'documents.user_id', '=', 'users.id')
            ->where('documents.is_deleted', '0')
            ->where('documents.user_id','<>', 1)
			->get();
       
        return view('admin-views.users.document', ['showRec' => $showRec]);
    }
    public function docUpdateRecord(Request $request,$id) {
        
		$method = $request->method();

		if($method == 'POST') {
			    $validate = $this->validate($request,[
                'title' => 'required',
        		],[
                    'title.required' => 'Title field is required.',
        		]);
    			
    
    			DB::table('documents')->where('id', $id)->update([
                    'document' => $request->input('title'),
    				'doc_type_id' => $request->input('document_type'),
    				'status' => $request->input('document_status'),
    				'uploaded_file' => $request->input('uploaded_file'),
    			]);
		
			return redirect('users/document');

		} else if($method == 'GET') {
		    $role_id = Auth::user()->user_role_id;
			$editRec = DB::table('documents')->select('documents.*')->where('documents.id', '=', $id)->first();
              
			$records =DB::table('document_type')->select('id','type')->get();
            return view('admin-views.users.docedit', ['editRec' => $editRec, 'records' => $records, 'role_id' => $role_id]);
		}
	}
    public function docDeleteRecord(Request $request, $id=null) {
		if(isset($id)) {
			DB::table('documents')
                ->where('id', $id)
                ->update(['is_deleted' => '1']);

			return back(); // page reload
		}
	}
	public function impersonate(Request $request, User $user)
    {
        $this->authorize('impersonate', $request->user()); // optional policy

        // Prevent impersonating yourself
        if ($request->user()->id === $user->id) {
            return back()->with('error', 'Cannot impersonate your own account.');
        }

        // Save original admin id
        session(['impersonator_id' => $request->user()->id]);

        // OPTIONAL: log the impersonation event
        Log::info('Impersonation started', [
            'impersonator_id' => $request->user()->id,
            'impersonated_id' => $user->id,
            'ip' => $request->ip(),
        ]);

        // Login as the user (same guard)
        Auth::loginUsingId($user->id);

        // You may want to redirect to the user's dashboard
        return redirect('/')->with('success', "Now impersonating {$user->name}");
    }

    public function stopImpersonate(Request $request)
    {
        if (!session()->has('impersonator_id')) {
            return back()->with('error', 'Not impersonating anyone.');
        }

        $originalId = session('impersonator_id');
        $original = User::find($originalId);

        // If original deleted or missing, clear session and log out
        if (! $original) {
            session()->forget('impersonator_id');
            Auth::logout();
            return redirect('/login')->with('error', 'Original admin account not found.');
        }

        // OPTIONAL: log stop event
        Log::info('Impersonation stopped', [
            'impersonator_id' => $originalId,
            'restored_at' => now(),
            'ip' => $request->ip(),
        ]);

        // Restore original admin
        session()->forget('impersonator_id');
        Auth::loginUsingId($original->id);

        return redirect()->route('/users/list')->with('success', 'Returned to admin account.');
    }
    public function docdownload(Request $request, $file=null) {
        
       // $filenames = json_decode($file, true);
        
		$filePath = public_path('images/'.$file); // file inside /public/files/

        return response()->download($filePath, $file);
	}
	public function view(Request $request, $userId = null) {
		$id = Auth::user()->id;
		$editRec = DB::table('users')->select('users.*')->where('users.id', '=', $userId)->first();
        $subscription = DB::table('billing_details')
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
    
        ->leftJoin('users', 'billing_details.user_id', '=', 'users.id')
        ->where('billing_details.user_id', $userId)
        ->where('payments.status', 'success')
        ->get();
        
        //user documents
        $document = DB::table('documents')
			->select("documents.*", "document_type.id as document_type_id","document_type.type","users.first_name","users.last_name","users.email","users.mobile")
			->leftJoin('document_type', 'documents.doc_type_id', '=', 'document_type.id')
			->leftJoin('users', 'documents.user_id', '=', 'users.id')
            ->where('documents.is_deleted', '0')
            ->where('documents.user_id','=', $userId)
			->get();
        return view('admin-views.users.view', ['editRec' => $editRec, 'subscriptions' => $subscription, 'documents' => $document]);
		
	}
}
