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
		$UserId  = Auth::user()->id;
		$role_id = Auth::user()->user_role_id;

        // Only super admin (role 1) may view all user enquiries
        if ($role_id != 1) {
            abort(403, 'Access denied. Only the super admin can view user enquiries.');
        }

		// user_queries is where add_submit() saves service requests from logged-in users
        $requests = DB::table('user_queries')
            ->select(
                'user_queries.*',
                'users.first_name as user_first_name',
                'users.last_name  as user_last_name'
            )
            ->leftJoin('users', 'user_queries.user_id', '=', 'users.id')
            ->where('user_queries.is_deleted', '0')
            ->orderBy('user_queries.id', 'desc')
            ->get();

        $totalCount = $requests->count();
        $todayCount = $requests->filter(function ($r) {
            return isset($r->created_at)
                && \Carbon\Carbon::parse($r->created_at)->isToday();
        })->count();

        return view('admin-views.userRequest.list', [
            'requests'   => $requests,
            'role_id'    => $role_id,
            'totalCount' => $totalCount,
            'todayCount' => $todayCount,
        ]);
    }
    public function request() {
        return view('admin-views.userRequest.request');
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
        $UserId = Auth::user()->id;

        $this->validate($request, [
            'name'   => 'required',
            'email'  => 'required|email',
            'mobile' => 'required',
            'user_query' => 'required',
        ], [
            'name.required'       => 'Name is required.',
            'email.required'      => 'Email is required.',
            'email.email'         => 'Please enter a valid email.',
            'mobile.required'     => 'Mobile number is required.',
            'user_query.required' => 'Please enter your query.',
        ]);

        DB::table('user_queries')->insert([
            'user_id'    => $UserId,
            'name'       => $request->name,
            'email'      => $request->email,
            'mobile'     => $request->mobile,
            'query'      => $request->input('user_query'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Your query has been submitted. We will contact you shortly!');
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
			DB::table('user_queries')
                ->where('id', $id)
                ->update(['is_deleted' => '1']);

			return back();
		}
	}
}
