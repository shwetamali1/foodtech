<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
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

	public function showRecord() {
		//$userData = Auth::user();
		return view('userProfile/userprofile');
	}

	public function updateRecord(Request $request) {
		$method = $request->method();
		$userData = Auth::user();
		if($method == 'POST') {

			$validate = $this->validate($request,[
    			'first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required',
				'profile_image' => 'image|mimes:jpeg,png,jpg|max:1000',
				'phone_number' => 'required|min:10|max:15'
    		],[
    			'first_name.required' => 'First name field is required.',
				'last_name.required' => 'Last name field is required.',
				'email.required' => 'Email field is required.',
				'profile_image.mimes' => 'Please upload jpeg, png, jpg image.',
				'profile_image.max' => 'Upload size is large, please upload small size image.',
				'phone_number.required' => 'Please enter your mobile number',
    		]);

			if ($profileImage = $request->file('profile_image')) {
				$destinationPath = 'profile_images/';
				$profileImgName = date('YmdHis') . "." . $profileImage->getClientOriginalExtension();
				
				$profileImage->move($destinationPath, $profileImgName);

				DB::table('users')->where('id', $userData->id)->update([
					'profile_image' => $profileImgName,
				]);
			}

			DB::table('users')->where('id', $userData->id)->update([
				'first_name' => $request->input('first_name'),
				'last_name' => $request->input('last_name'),
				'email' => $request->input('email'),
				'phone_number' => $request->input('phone_number')
			]);

			return redirect('/user-profile');

		} else if($method == 'GET') {
			//$editRec = DB::table('users')->select()->where('id', '=', $id)->get();
			return view('userProfile/edit-userprofile', ['editRec' => $userData]);
		}
	}

	public function changePassword(Request $request) {
		$method = $request->method();
		
		if($method == 'POST') {
			$user = Auth::user();

			$validate = $this->validate($request,[
    			'current_password' => 'required',
				'new_password' => 'required|min:6',
				'confirm_password' => 'required|same:new_password'
    		],[
    			'current_password.required' => 'Please enter current password.',
				'new_password.required' => 'Please enter new password.',
				'confirm_password.required' => 'Please enter confirm password.',
    		]);
			
			if (!Hash::check($request->current_password, $user->password)) {
				return back()->withErrors(['current_password'=>'Current password does not match!']);
			}

			$user->password = Hash::make($request->new_password);
        	$user->save();

			return back()->with('success', 'Password successfully changed!');

		} else {
			return view('userProfile/change-password');
		}
	}
}
