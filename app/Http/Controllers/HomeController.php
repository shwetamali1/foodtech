<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;

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

        $addonServices = DB::table('addon_services')
            ->where('is_deleted', 0)
            ->get();

        return view('subscriptions', ['showRec' => $showRec, 'addonServices' => $addonServices]);
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
        ->paginate(10)
        ->withQueryString();
        
        $categories =DB::table('report_categories')->select('id','category')->where('report_categories.is_deleted', '=', '0')->get();
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
        if($slug === 'food-safety-soapes')
        {
            return view('food-safety-soapes',['plans' => $planResult]);

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
				'password' => 'required|min:6',
    		],[
				'first_name.required' => 'First name field is required.',
				'last_name.required' => 'Last name field is required.',
				'email.required' => 'Email field is required.',
				'email.regex' => 'Please enter valid email.',
				'email.unique' => 'Email already exists.',
				'password.required' => 'Password field is required.',
				'password.min' => 'Password minimum 6 characters.',
				'mobile.required' => 'Mobile field is required.',
    		]);

			$id = DB::table('users')->insertGetId([
                'user_id' => rand( 1000 , 9999),
				'employee_code' => rand( 100000 , 999999),
				'first_name' => $request->input('first_name'),
				'last_name' => $request->input('last_name'),
                'user_name' => $request->input('first_name').'.'.$request->input('last_name').rand( 10 , 99),
                'mobile' => $request->input('mobile'),
                'category_id' => 0,
				'email' => $request->input('email'),
				'password' => Hash::make($request->input('password')),
				'user_role_id' => 8,
				'company_name' => '',
				'country' => '',
				'state' => '',
				'city' => '',
				'status' => 'active',
			]);

			$emailData = [
				'first_name' => $request->input('first_name'),
				'last_name'  => $request->input('last_name'),
				'email'      => $request->input('email'),
				'mobile'     => $request->input('mobile'),
			];

			Mail::send('email/welcome', ['data' => $emailData], function($message) use($emailData) {
				$message->to($emailData['email']);
				$message->subject('Welcome to Food Tech Mate');
			});

			Mail::send('email/welcome', ['data' => $emailData], function($message) use($emailData) {
				$message->to('malishweta7434@gmail.com');
				$message->subject('New User Registration - ' . $emailData['first_name'] . ' ' . $emailData['last_name']);
			});

			return redirect()->back()->with('success', 'Your business has been successfully register please login');
        }else{
            $business_category = DB::table('business_categories')->select('id', 'category')->get();
             return view('register-user', ['business_category' => $business_category]);
        }
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

}
