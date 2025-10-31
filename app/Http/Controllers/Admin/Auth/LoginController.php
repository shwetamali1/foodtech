<?php

namespace App\Http\Controllers\Admin\Auth;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Session;
use App\CentralLogics\Helpers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Mail;
class LoginController extends Controller
{
   
    public function login()
    {
        return view('admin-views.auth.login');
    }
    public function forgot(Request $request)
    {
        $method = $request->method();
        if($method == 'POST') {
            $randomBytes = random_bytes(50);
            $token = bin2hex($randomBytes);
            
            $validate = $this->validate($request,[
				'email' => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|exists:users',
    		],[
				'email.required' => 'Email field is required.',
				'email.regex' => 'Please enter valid email.',
    		]);
			DB::table('users')->where('email', $request->input('email'))->update([
                'forgot_token' => $token,
			]);
			
			Mail::send('email/forgetPassword', ['token' => $token], function($message) use($request){

              $message->to($request->email);

              $message->subject('Reset Password');

          });
           

          return back()->with('success', 'We have e-mailed your password reset link!');
          
        }else{
            return view('admin-views.auth.forgot-password');
        }
    }
    public function reset(Request $request, $token = null)
    {
        $method = $request->method();
        if($method == 'POST') {
            $validate = $this->validate($request,[
				'password' => 'required|string|confirmed|min:6',
    		],[
				'password.required' => 'New password field is required.',
				'password.confirmed' => 'New and Confirm password do not match.',
    		]);
    		DB::table('users')->where('forgot_token', $token)->update([
                'password' => Hash::make($request->input('password')),
			]);
			DB::table('users')->where('forgot_token', $token)->update([
                'forgot_token' => '',
			]);
          
          

          return back()->with('success', 'Password updated successfully');
          
        }else{
            return view('admin-views.auth.reset-password', ['token' => $token]);
        }
        
    }
    public function submit(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $credentials['status'] = 'active';
       
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = auth()->user();
           
            return redirect()->intended('dashboard'); // change to your desired route
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
        
        // if (auth('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        //     $admin = Admin::find(auth('admin')->id());
        //     $admin->is_logged_in = 1;
        //     $admin->save();
        //     $modules = Module::Active()->get();
        //     if(isset($modules)&&($modules->count()>0)){

        //         return redirect()->route('admin.dashboard');
        //     }
        //     return redirect()->route('admin.business-settings.business-setup');
        // }

        // return redirect()->back()->withInput($request->only('email', 'remember'))
        //     ->withErrors(['Credentials does not match.']);
    }

    public function logout(Request $request)
    {
        Auth()->guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    
}
