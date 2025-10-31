<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CategoryController extends Controller
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
		$showRec = DB::table('business_categories')
			->select("business_categories.*")
            ->where('business_categories.is_deleted', '0')
			->get();
       
        return view('admin-views.category.list', ['showRec' => $showRec]);
    }
    public function add() {
		$UserId = Auth::user()->id;
		$cdate = date("Y-m-d");
        return view('admin-views.category.add');
    }
    public function add_submit(Request $request) {
		$method = $request->method();

		if($method == 'POST') {
            $validate = $this->validate($request,[
                'category' => 'required',
    		],[
                'category.required' => 'Category field is required.',
    		]);

			$id = DB::table('business_categories')->insertGetId([
                'category' => $request->input('category'),
			]);

			return redirect('category/list');
        }
    }
    public function updateRecord(Request $request,$id) {
        
		$method = $request->method();
		

		if($method == 'POST') {
			$validate = $this->validate($request,[
                'category' => 'required',
    		],[
                'category.required' => 'Category field is required.',
    		]);

			if(!empty($id)) {
				
				DB::table('business_categories')->where('id', $id)->update([
                    'category' => $request->input('category'),
				]);

			}
			return redirect('category/list');

		} else if($method == 'GET') {
			$editRec = DB::table('business_categories')->select('business_categories.*')->where('business_categories.id', '=', $id)->first();
			
            return view('admin-views.category.edit', ['editRec' => $editRec]);
		}
	}
    public function deleteRecord(Request $request, $id=null) {
		if(isset($id)) {
			DB::table('business_categories')
                ->where('id', $id)
                ->update(['is_deleted' => '1']);

			return back(); // page reload
		}
	}
	public function reportCategory() {
		$UserId = Auth::user()->id;
		$cdate = date("Y-m-d");
		$showRec = DB::table('report_categories')
			->select("report_categories.*")
            ->where('report_categories.is_deleted', '0')
			->get();
       
        return view('admin-views.category.categorylist', ['showRec' => $showRec]);
    }
    public function add_category() {
		$UserId = Auth::user()->id;
		$cdate = date("Y-m-d");
        return view('admin-views.category.categoryadd');
    }
    public function add_submit_report(Request $request) {
		$method = $request->method();

		if($method == 'POST') {
            $validate = $this->validate($request,[
                'category' => 'required',
    		],[
                'category.required' => 'Category field is required.',
    		]);

			$id = DB::table('report_categories')->insertGetId([
                'category' => $request->input('category'),
			]);

			return redirect('category/report-category');
        }
    }
    public function updateReportRecord(Request $request,$id) {
        
		$method = $request->method();
		

		if($method == 'POST') {
			$validate = $this->validate($request,[
                'category' => 'required',
    		],[
                'category.required' => 'Category field is required.',
    		]);

			if(!empty($id)) {
				
				DB::table('report_categories')->where('id', $id)->update([
                    'category' => $request->input('category'),
				]);

			}
			return redirect('category/report-category');

		} else if($method == 'GET') {
			$editRec = DB::table('report_categories')->select('report_categories.*')->where('report_categories.id', '=', $id)->first();
			
            return view('admin-views.category.categoryedit', ['editRec' => $editRec]);
		}
	}
	public function deleteReportRecord(Request $request, $id=null) {
		if(isset($id)) {
			DB::table('report_categories')
                ->where('id', $id)
                ->update(['is_deleted' => '1']);

			return back(); // page reload
		}
	}
	
	public function docCategory() {
		$UserId = Auth::user()->id;
		$cdate = date("Y-m-d");
		$showRec = DB::table('document_type')
			->select("document_type.*")
            ->where('document_type.is_deleted', '0')
			->get();
       
        return view('admin-views.category.doccategory', ['showRec' => $showRec]);
    }
    public function add_doc_category() {
		$UserId = Auth::user()->id;
		$cdate = date("Y-m-d");
        return view('admin-views.category.doccategoryadd');
    }
    public function add_submit_doc(Request $request) {
		$method = $request->method();

		if($method == 'POST') {
            $validate = $this->validate($request,[
                'category' => 'required',
    		],[
                'category.required' => 'Category field is required.',
    		]);

			$id = DB::table('document_type')->insertGetId([
                'type' => $request->input('category'),
			]);

			return redirect('category/doc-category');
        }
    }
    public function updateDocRecord(Request $request,$id) {
        
		$method = $request->method();
		

		if($method == 'POST') {
			$validate = $this->validate($request,[
                'category' => 'required',
    		],[
                'category.required' => 'Category field is required.',
    		]);

			if(!empty($id)) {
				
				DB::table('document_type')->where('id', $id)->update([
                    'type' => $request->input('category'),
				]);

			}
			return redirect('category/doc-category');

		} else if($method == 'GET') {
			$editRec = DB::table('document_type')->select('document_type.*')->where('document_type.id', '=', $id)->first();
			
            return view('admin-views.category.doccategoryedit', ['editRec' => $editRec]);
		}
	}
	public function deleteDocRecord(Request $request, $id=null) {
		if(isset($id)) {
			DB::table('document_type')
                ->where('id', $id)
                ->update(['is_deleted' => '1']);

			return back(); // page reload
		}
	}
}
