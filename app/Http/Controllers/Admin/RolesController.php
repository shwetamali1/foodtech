<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

use App\Models\WebMenu;
use App\Models\ModulePermission;
use App\Models\Role;

class RolesController extends Controller
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
		$roleList = Role::get();
		return view('admin-views.roles.index', ['roleList' => $roleList]);
	}

	public function add(Request $request) {
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

				$role = new Role;
                $role->role_name = $request->role_name;
                $role->permission_id = $permissionIds;
				$role->module_permission_id = $modulePermisstionIds;
                $role->status = $request->status;
				if ($role->save()) {
					session()->flash('success', 'Role inserted successfully');
                    return response()->json(['success' => true, 'message' => 'Role inserted successfully', 'redirect' => route('roles')]);
                } else {
                    return response()->json(['success' => false, 'message' => 'Failed to insert record']);
                }
			}
		} else {
			$subMenuList = WebMenu::where([['parent_id', '!=', 0],['status', '=', 1]])->orderBy('orders', 'asc')->get();
			$modulePermissionParentList = ModulePermission::where([['parent_id', '=', 0],['status', '=', 1]])->orderBy('id','asc')->get();
			$modulePermissionList = ModulePermission::where([['parent_id', '!=', 0],['status', '=', 1]])->orderBy('id', 'asc')->get();

			return view('roles/add', [
				'subMenuList' => $subMenuList,
				'modulePermissionParentList'=> $modulePermissionParentList,
				'modulePermissionList' => $modulePermissionList
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
}
