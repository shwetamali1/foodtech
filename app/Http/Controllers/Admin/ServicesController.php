<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class ServicesController extends Controller
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
		$showRec = DB::table('services')
			->select("services.*", "services_type.id as services_type_id","services_type.type")
			->leftJoin('services_type', 'services.service_type_id', '=', 'services_type.id')
            ->where('services.is_deleted', '0')
			->get();
		
       
        return view('admin-views.services.list', ['showRec' => $showRec]);
    }
    public function add() {
		$UserId = Auth::user()->id;
		$cdate = date("Y-m-d");
        $records =DB::table('services_type')
			->select('id','type')
            ->get();
        return view('admin-views.services.add', ['records' => $records]);
    }
	public function add_submit(Request $request)
	{
		if ($request->isMethod('post')) {
	
			$this->validate($request, [
				'services_type'    => 'required',
				'title'            => 'required',
				'description'      => 'required',
				'meta_title'       => 'required|max:60',
				'meta_description' => 'required|max:160',
			], [
				'services_type.required'    => 'Services Type field is required.',
				'title.required'            => 'Title field is required.',
				'description.required'      => 'Description field is required.',
				'meta_title.required'       => 'Meta title is required.',
				'meta_description.required' => 'Meta description is required.',
			]);
	
			// Generate unique slug
			$slug = Str::slug($request->title);
			$count = DB::table('services')->where('slug', 'LIKE', "{$slug}%")->count();
			if ($count > 0) {
				$slug .= '-' . ($count + 1);
			}
	
			DB::table('services')->insert([
				'services'         => $request->title,
				'slug'             => $slug,
				'price'            => $request->price,
				'service_type_id'  => $request->services_type,
				'description'      => $request->description,
				'meta_title'       => $request->meta_title,
				'meta_description' => $request->meta_description,
				'uploaded_file'    => $request->uploaded_file,
			]);
	
			return redirect('services/list')->with('success', 'Service added successfully');
		}
	}
    public function updateRecord(Request $request,$id) {
        
		$method = $request->method();

		if($method == 'POST') {
			$validate = $this->validate($request,[
				'services_type' => 'required',
                'title' => 'required',
				'description' => 'required',
    		],[
				'services_type.required' => 'Services Type field is required.',
                'title.required' => 'Title field is required.',
				'description.required' => 'Description field is required.',
    		]);

			if(!empty($id)) {
				
				DB::table('services')->where('id', $id)->update([
                    'services' => $request->input('title'),
					'meta_title'       => $request->meta_title,
					'meta_description' => $request->meta_description,
                    'slug' => Str::slug($request->input('title')),
					'price' => $request->input('price'),
					'description' => $request->input('description'),
					'uploaded_file' => $request->input('uploaded_file'),
				]);

			}
			return redirect('services/list');

		} else if($method == 'GET') {
			$editRec = DB::table('services')->select('services.*')->where('services.id', '=', $id)->first();
            $records =DB::table('services_type')
			->select('id','type')
            ->get(); 
            return view('admin-views.services.edit', ['editRec' => $editRec, 'records' => $records]);
		}
	}
    public function deleteRecord(Request $request, $id=null) {
		if(isset($id)) {
			DB::table('services')
                ->where('id', $id)
                ->update(['is_deleted' => '1']);

			return back(); // page reload
		}
	}
}
