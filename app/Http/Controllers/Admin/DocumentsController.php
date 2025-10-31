<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ser;

class DocumentsController extends Controller
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
		$cdate = date("Y-m-d");
		if(Auth::user()->user_role_id == 8){
		    $showRec = DB::table('documents')
			->select("documents.*", "document_type.id as document_type_id","document_type.type")
			->leftJoin('document_type', 'documents.doc_type_id', '=', 'document_type.id')
            ->where('documents.is_deleted', '0')
            ->where('documents.user_id',$UserId)
			->get();
		}else{
		$showRec = DB::table('documents')
			->select("documents.*", "document_type.id as document_type_id","document_type.type")
			->leftJoin('document_type', 'documents.doc_type_id', '=', 'document_type.id')
            ->where('documents.is_deleted', '0')
			->get();
		}
		
		$subscription = DB::table('billing_details')
        ->select(
            "billing_details.transaction_id",
            "billing_details.subscribe_id",
            "payments.r_payment_id",
            "payments.method",
            "payments.amount",
            "payments.status as payment_status",
            "payments.created_at as payment_date"
        )
        ->leftJoin('payments', function($join) {
            $join->on('billing_details.id', '=', 'payments.billing_detail_id')
                 ->whereRaw('payments.id = (
                     SELECT MAX(id) 
                     FROM payments 
                     WHERE payments.billing_detail_id = billing_details.id
                 )');
        })
        ->where('billing_details.user_id', $UserId)
        ->where('billing_details.payment_plan', 'subcribe')
        ->where('payments.status', 'success')
        ->get();
    //   print_r($subscription);
    //   exit;
        return view('admin-views.documents.list', ['showRec' => $showRec, 'subscription' => $subscription, 'role_id' => $role_id]);
    }
    public function add() {
		$UserId = Auth::user()->id;
		$role_id = Auth::user()->user_role_id;
		$cdate = date("Y-m-d");
        $records =DB::table('document_type')
			->select('id','type')
            ->get();
        $userData = DB::table('users')->select('id','first_name','last_name','email')->where('user_role_id', '<>', '1')->where('user_role_id', '<>', '6')->get();
        
        return view('admin-views.documents.add', ['records' => $records,'role_id' => $role_id, 'userData' => $userData]);
    }
    public function add_submit(Request $request) {
		$method = $request->method();
		$UserId = Auth::user()->id;
		$user_role_id = Auth::user()->user_role_id;
		if($method == 'POST') {
		    if($user_role_id == 8){
		        $validate = $this->validate($request,[
                    'document_type' => 'required',
                    'title' => 'required',
                    'document_status' => 'required',
        		],[
        		    'document_type.required' => 'Please select document type.',
                    'title.required' => 'Title field is required.',
                    'document_status.required' => 'Please select document status.',
        		]);
		    }else{
		        $validate = $this->validate($request,[
                    'document_type' => 'required',
                    'title' => 'required',
                    'document_status' => 'required',
                    'user_id' => 'required',
        		],[
        		    'document_type.required' => 'Please select document type.',
                    'title.required' => 'Title field is required.',
                    'document_status.required' => 'Please select document status.',
                    'user_id.required' => 'Please select user.',
        		]);
		    }
            
			if($user_role_id == 8){
			    $uid = $UserId;
			}else{
			    $uid = $request->input('user_id');
			}

			$id = DB::table('documents')->insertGetId([
                'document' => $request->input('title'),
				'doc_type_id' => $request->input('document_type'),
				'status' => $request->input('document_status'),
				'user_id' => $uid,
				'uploaded_file' => $request->input('uploaded_file'),
			]);

			return redirect('documents/list');
        }
    }
    public function updateRecord(Request $request,$id) {
        
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
		
			return redirect('documents/list');

		} else if($method == 'GET') {
		    $role_id = Auth::user()->user_role_id;
			$editRec = DB::table('documents')->select('documents.*')->where('documents.id', '=', $id)->first();
              
			$records =DB::table('document_type')->select('id','type')->get();
            return view('admin-views.documents.edit', ['editRec' => $editRec, 'records' => $records, 'role_id' => $role_id]);
		}
	}
    public function deleteRecord(Request $request, $id=null) {
		if(isset($id)) {
			DB::table('documents')
                ->where('id', $id)
                ->update(['is_deleted' => '1']);

			return back(); // page reload
		}
	}
}
