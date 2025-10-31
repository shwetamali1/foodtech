<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserrequestController extends Controller
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
		$requests = DB::table('user_request')
			->select("user_request.*", "services.services")
			->leftJoin('services', 'user_request.service_id', '=', 'services.id')
            ->where('user_request.is_deleted', '0')
			->get();
       
        return view('admin-views.userRequest.list', ['requests' => $requests]);
    }
    public function request() {
		$UserId = Auth::user()->id;
		$role_id = Auth::user()->user_role_id;
		$cdate = date("Y-m-d");
		$services = DB::table('services')
			->select("services.id", "services.services")
			->get();
       
        return view('admin-views.userRequest.request', ['services' => $services, 'role_id' => $role_id]);
    }
    public function add() {
		$UserId = Auth::user()->id;
		$cdate = date("Y-m-d");
        $records =DB::table('roles')
			->select('id','role_name')
            ->get();
        return view('admin-views.subscription.add', ['records' => $records]);
    }
    
    public function add_submit(Request $request) {
		$method = $request->method();
        $UserId = Auth::user()->id;
		if($method == 'POST') {
            $validate = $this->validate($request,[
                'first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required',
				'mobile' => 'required',
				'service_id' => 'required',
				'adharcard' => 'required',
    		],[
                'first_name.required' => 'First Name field is required.',
				'last_name.required' => 'Last Name field is required.',
				'email.required' => 'Email field is required.',
				'mobile.required' => 'Mobile field is required.',
				'service_id.required' => 'Please select service.',
				'adharcard.regex' => 'Adharcard field is required.',
    		]);

			$id = DB::table('user_request')->insertGetId([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->mobile,
                'service_id' => $request->service_id,
                'user_id' => $UserId,
                'adhar_number' => $request->adharcard,
                'start_date' => $request->startdate,
                'start_month' => $request->startmonth,
                'start_year' => $request->startyear,
                'end_date' => $request->enddate,
                'end_month' => $request->endmonth,
                'end_year' => $request->endyear
			]);

			return back()->with('success', 'Your request submmited, Admin will contact shortly!');
        }
    }
    public function updateRecord(Request $request,$id) {
        
		$method = $request->method();

		if($method == 'POST') {
			$validate = $this->validate($request,[
                'title' => 'required',
				'offer' => 'required',
				'description' => 'required',
				'price' => 'required',
				'per' => 'required',
				'credits' => 'required',
				'features' => 'required',
    		],[
                'title.required' => 'Title field is required.',
				'offer.required' => 'Offer field is required.',
				'description.required' => 'Description field is required.',
				'price.required' => 'Price field is required.',
				'per.regex' => 'per field is required.',
				'credits.unique' => 'Credit field is required.',
				'features.required' => 'Feature field is required..',
    		]);

			if(!empty($id)) {
				DB::table('subscriptions')->where('id', $id)->update([
                    'title' => $request->title,
                    'offer' => $request->offer,
                    'description' => $request->description,
                    'price' => $request->price,
                    'per' => $request->per,
                    'credits' => $request->credits,
                    'features' => json_encode($request->features),
				]);

			}
			return redirect('subscriptions/list');

		} else if($method == 'GET') {
			$editRec = DB::table('subscriptions')->select('subscriptions.*')->where('subscriptions.id', '=', $id)->first();
              
			$roleRec = DB::table('roles')->select('id', 'role_name')->get();
            return view('admin-views.subscription.edit', ['editRec' => $editRec, 'roleRec' => $roleRec]);
		}
	}
	public function subscribe($id = null) {
	    $editRec = DB::table('subscriptions')->select('subscriptions.*')->where('subscriptions.id', '=', $id)->first();
              
        return view('admin-views.subscription.subscribe', ['editRec' => $editRec]);
	}
	public function billing(Request $request, $id = null){
	    $method = $request->method();
        $UserId = Auth::user()->id;
		$cdate = date("Y-m-d");
		if($method == 'POST') {
			$validate = $this->validate($request,[
                'first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
				'country' => 'required',
				'payment_method' => 'required',
				'card_number' => 'required',
				'date' => 'required',
				'month' => 'required',
				'year' => 'required',
    		],[
    		    'first_name.required' => 'First name field is required.',
				'last_name.required' => 'Last name field is required.',
				'email.required' => 'Email field is required.',
				'email.regex' => 'Please enter valid email.',
				
                'country.required' => 'country field is required.',
				'payment_method.required' => 'Please select payment method.',
				'card_number.required' => 'Card Number field is required.',
				'date.required' => 'Please select date.',
				'month.regex' => 'Please select month',
				'year.unique' => 'Please select year',
    		]);

			DB::table('billing_details')->insertGetId([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'country' => $request->country,
                'payment_method' => $request->payment_method,
                'card_number' => $request->card_number,
                'date' => $request->date,
                'month' => $request->month,
                'year' => $request->year,
                'country_code' => $request->country_code,
                'user_id' => $UserId,
                'subscribe_id' => $id,
                'subscription_start_date' => $cdate,
                
			]);
			return redirect('subscriptions/thank-you/'.$id);

		} else if($method == 'GET') {
    	    $editRec = DB::table('subscriptions')->select('subscriptions.*')->where('subscriptions.id', '=', $id)->first();
                  
            return view('admin-views.subscription.billing', ['editRec' => $editRec]);
		}
	}
	public function payout(Request $request, $id = null){
	    $editRec = DB::table('subscriptions')->select('subscriptions.*')->where('subscriptions.id', '=', $id)->first();
                  
        return view('admin-views.subscription.thank-you', ['editRec' => $editRec]);
	}
    public function deleteRecord(Request $request, $id=null) {
		if(isset($id)) {
			DB::table('user_request')
                ->where('id', $id)
                ->update(['is_deleted' => '1']);

			return back(); // page reload
		}
	}
}
