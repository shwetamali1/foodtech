<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HomeController extends Controller
{
   public function __construct()
    {
        //$this->middleware('auth');
    }
    public function home()
    {
        $services = DB::table('services')
			->select("services.*", "services_type.id as services_type_id","services_type.type")
			->leftJoin('services_type', 'services.service_type_id', '=', 'services_type.id')
            ->where('services.is_deleted', '0')
			->get();

            $showRec = DB::table('subscriptions')
			->select("subscriptions.*")
			->get();

        return view('home2', ['services' => $services, 'plans' => $showRec]);
    }
    public function home2()
    {
        $services = DB::table('services')
			->select("services.*", "services_type.id as services_type_id","services_type.type")
			->leftJoin('services_type', 'services.service_type_id', '=', 'services_type.id')
            ->where('services.is_deleted', '0')
			->get();

        $showRec = DB::table('subscriptions')
			->select("subscriptions.*")
			->get();

        return view('home2', ['services' => $services, 'showRec' => $showRec]);
    }
    public function subscriptions()
    {
        $showRec = DB::table('subscriptions')
			->select("subscriptions.*")
			->get();
        return view('subscriptions', ['showRec' => $showRec]);
    }
    public function reports(Request $request)
    {   
        $category = $request->query('category'); // from URL ?category=
        $search   = $request->query('search');   // from URL ?search=
       
        $reports = DB::table('reports')
        ->select('*')
        ->when(!empty($category), function($query) use ($category) {
            $query->where('category_id', $category);
        })
        ->when(!empty($search), function($query) use ($search) {
            $query->where('reports_title', 'like', "%{$search}%");
        })
        ->get();
        
        $categories =DB::table('report_categories')->select('id','category')->where('report_categories.is_deleted', '=', '0')->get();
        //return view('reports',['reports' => $reports, 'categories' => $categories]);
        return view('reports', compact('reports','categories'));
    }
    public function reportsDetails($slug){
        $reports = DB::table('reports')
        ->where('slug', $slug)
        ->first();

    if (!$reports) {
        abort(404); 
    }

    return view('reports-details', compact('reports'));
    }
    public function serviceDetails($slug=null)
    {
        // $services = DB::table('services')
        //     ->select("services.*", "services_type.id as services_type_id", "services_type.type")
        //     ->leftJoin('services_type', 'services.service_type_id', '=', 'services_type.id')
        //     ->where('services.slug', $slug)
        //     ->first();
           
        // return view('service-details', ['services' => $services]);
           $planResult = DB::table('subscriptions')
			->select("subscriptions.*")
			->get();
        if($slug === 'fssai-licensing') {
            return view('fssai-licensing', ['plans' => $planResult]);
        }
        if($slug === 'fssai-label-validation')
            {
                return view('label-validation', ['plans' => $planResult]);
        }
            
    }
    
    
    public function contactus(Request $request)
    {
        $method = $request->method();

		if($method == 'POST') {
            $validate = $this->validate($request,[
				'first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
				'phone' => 'required',
    		],[
				'first_name.required' => 'First name field is required.',
				'last_name.required' => 'Last name field is required.',
				'email.required' => 'Email field is required.',
				'email.regex' => 'Please enter valid email.',
				'phone.required' => 'Mobile field is required.',
    		]);

			$id = DB::table('contact_us')->insertGetId([
				'first_name' => $request->input('first_name'),
				'last_name' => $request->input('last_name'),
                'phone' => $request->input('phone'),
				'email' => $request->input('email'),
				'message' => $request->input('message'),
			]);

			//return redirect('register-user');
			return redirect()->back()->with('success', 'Your data was successfully added!');
        }else{
            return view('contact-us');
        }
    }
    public function termsAndConditions() {
        return view('terms-and-conditions');
    }

    public function refundPolicy() {
        return view('refund-policy');
    }

    public function privacyPolicy() {
        return view('privacy-policy');
    }

    public function aboutUs() {
        return view('about-us');
    }
    public function registerUser(Request $request){
        $method = $request->method();

		if($method == 'POST') {
            $validate = $this->validate($request,[
				'first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|unique:users,email',
				'mobile' => 'required|numeric|max_digits:10',
				'category' => 'required',
				'password' => 'required|min:6',
				'cname'  => 'required',
    		],[
				'first_name.required' => 'First name field is required.',
				'last_name.required' => 'Last name field is required.',
				'email.required' => 'Email field is required.',
				'email.regex' => 'Please enter valid email.',
				'email.unique' => 'Email already exists.',
				'password.required' => 'Password field is required.',
				'password.min' => 'Password minimum 6 characters.',
				'mobile.required' => 'Mobile field is required.',
				'category.required' => 'Category field is required.',
				'cname.required' => 'company field is required.',
				
    		]);

			$id = DB::table('users')->insertGetId([
                'user_id' => rand( 1000 , 9999),
				'employee_code' => rand( 100000 , 999999),
				'first_name' => $request->input('first_name'),
				'last_name' => $request->input('last_name'),
                'user_name' => $request->input('first_name').'.'.$request->input('last_name').rand( 10 , 99),
                'mobile' => $request->input('mobile'),
                'category_id' => $request->input('category'),
				'email' => $request->input('email'),
				'password' => Hash::make($request->input('password')),
				'user_role_id' => 8,
				'company_name' => $request->input('cname'),
				'country' => $request->input('country'),
				'state' => $request->input('state'),
				'city' => $request->input('city'),
				'status' => 'active',
			]);

			//return redirect('register-user');
			return redirect()->back()->with('success', 'Your business has been successfully register please login');
        }else{
            $business_category = DB::table('business_categories')->select('id', 'category')->get();
             return view('register-user', ['business_category' => $business_category]);
        }
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
    public function emailSubscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        DB::table('subscribers')->insertGetId([
			'email' => $request->email,
		]);

        return redirect()->back()->with('success', 'Thanks for showing interest! Our team will connect with you over mail shortly.');
    }

    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.auth.login');
    }
}
