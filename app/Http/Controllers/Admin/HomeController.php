<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function __construct()
    {
        //$this->middleware('auth');
    }
    public function home()
    {
        return view('home');
    }

    public function submit(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
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
        auth()->guard('admin')->logout();
        return redirect()->route('admin.auth.login');
    }
}
