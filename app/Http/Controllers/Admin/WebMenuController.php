<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class WebMenuController extends Controller
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
	public function index() {
		$records = DB::select('select * from web_menu where parent_id IN ("0")');
		return view('admin-views.webMenu.web_menu', ['records' => $records]);
	}

	public function showRecord($id) {
		$showRec = DB::select('select * from web_menu where id='.$id);
		$childMenuRec = DB::select('select * from web_menu where parent_id IN ('.$id.')');

		return view('admin-views.webMenu.view', ['showRec' => $showRec[0], 'childMenuRec' => $childMenuRec]);
	}

	public function createRecord(Request $request) {
		$method = $request->method();

		if($method == 'POST') {
			$validate = $this->validate($request,[
    			'title' => 'required',
				/*'url' => 'required',*/
				'nav_item' => 'required',
				'orders' => 'required|numeric|integer',
    		],[
    			'title.required' => 'Menu title field is required.',
				/*'url.required' => 'Menu url field is required.',*/
				'nav_item.required' => 'Nav-item link field is required.',
				'orders.required' => 'Menu order field is required.',
				'orders.numeric' => 'Please enter numeric value.',
				'orders.integer' => 'Please enter only number.',
    		]);

			DB::table('web_menu')->insert([
				'title' => $request->input('title'),
				'url' => $request->input('url'),
				'controller' => $request->input('controller'),
				'action' => $request->input('action'),
				'parent_id' => $request->input('parent_id'),
				'orders' => $request->input('orders'),
				'nav_item' => $request->input('nav_item'),
				'menu_icon' => $request->input('menu_icon'),
				'permission_tag' => $request->input('permission_tag'),
				'is_submenu' => $request->input('is_submenu'),
				'status' => 1,
			]);
			return redirect('/web-menu');
		} else {
			$parentRec = DB::table('web_menu')->select('id', 'title')->where('parent_id', '=', 0)->get();
			return view('admin-views.webMenu.add', ['parentRec' => $parentRec]);
		}
    }

	public function updateRecord(Request $request,$id) {
		$method = $request->method();

		if($method == 'POST') {

			$validate = $this->validate($request,[
    			'title' => 'required',
				/*'url' => 'required',*/
				'nav_item' => 'required',
				'orders' => 'required|numeric|integer',
    		],[
    			'title.required' => 'Menu title field is required.',
				/*'url.required' => 'Menu url field is required.',*/
				'nav_item.required' => 'Nav-item link field is required.',
				'orders.required' => 'Menu order field is required.',
				'orders.numeric' => 'Please enter numeric value.',
				'orders.integer' => 'Please enter only number.',
    		]);

			DB::table('web_menu')->where('id', $id)->update([
				'title' => $request->input('title'),
				'url' => $request->input('url'),
				'controller' => $request->input('controller'),
				'action' => $request->input('action'),
				'parent_id' => $request->input('parent_id'),
				'orders' => $request->input('orders'),
				'nav_item' => $request->input('nav_item'),
				'menu_icon' => $request->input('menu_icon'),
				'permission_tag' => $request->input('permission_tag'),
				'is_submenu' => $request->input('is_submenu'),
				'status' => 1,
			]);
			return redirect('/web-menu');

		} else if($method == 'GET') {
			$parentRec = DB::table('web_menu')->select('id', 'title')->where('parent_id', '=', 0)->get();
			$editRec = DB::select('select * from web_menu where id='.$id);

			return view('admin-views.webMenu.edit', ['editRec' => $editRec[0], 'parentRec' => $parentRec]);
		}
	}

	public function deleteRecord(Request $request, $id=null, $status=null) {
		if(isset($id) && isset($status)) {
			DB::table('web_menu')
                ->where('id', $id)
                ->update(['status' => $status]);

			return back(); // page reload
		}
	}
}
