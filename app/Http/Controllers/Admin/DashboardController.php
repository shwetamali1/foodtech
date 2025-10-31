<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
	   $records = DB::table('billing_details')
        ->select(
            'billing_details.*',
            'payments.id as payment_id',
            'payments.r_payment_id',
            'payments.method',
            'payments.amount',
            'payments.status as p_status',
            'payments.created_at as payment_date',
            'reports.reports_title as report_title',
            'subscriptions.title as subscription_name'
        )
        ->join('payments', 'billing_details.id', '=', 'payments.billing_detail_id')
    
        // Join reports only when payment_plan = 'report'
        ->leftJoin('reports', function($join) {
            $join->on('billing_details.subscribe_id', '=', 'reports.id')
                 ->where('billing_details.payment_plan', 'report');
        })
    
        // Join subscriptions only when payment_plan != 'report'
        ->leftJoin('subscriptions', function($join) {
            $join->on('billing_details.subscribe_id', '=', 'subscriptions.id')
                 ->where('billing_details.payment_plan', '!=', 'report');
        })
    
        ->leftJoin('users', 'billing_details.user_id', '=', 'users.id')
        ->where('billing_details.user_id', $UserId)
        ->where('payments.status', 'success')
        ->get();
        
        
        $subscriberecords = DB::table('billing_details')
        ->select(
            'billing_details.*',
            'payments.id as payment_id',
            'payments.r_payment_id',
            'payments.method',
            'payments.amount',
            'payments.status as p_status',
            'payments.created_at as payment_date',
            'reports.reports_title as report_title',
            'subscriptions.title as subscription_name',
            'users.first_name as first_name',
            'users.last_name as last_name',
            'users.email as user_email',
            'users.mobile as user_phone'
        )
        ->join('payments', 'billing_details.id', '=', 'payments.billing_detail_id')
    
        // Join reports only when payment_plan = 'report'
        ->leftJoin('reports', function($join) {
            $join->on('billing_details.subscribe_id', '=', 'reports.id')
                 ->where('billing_details.payment_plan', 'report');
        })
    
        // Join subscriptions only when payment_plan != 'report'
        ->leftJoin('subscriptions', function($join) {
            $join->on('billing_details.subscribe_id', '=', 'subscriptions.id')
                 ->where('billing_details.payment_plan', '!=', 'report');
        })
    
        // Join users
        ->leftJoin('users', 'billing_details.user_id', '=', 'users.id')
        ->where('payments.status', 'success')
        ->get();
        
        $usersList =DB::table('users')->select('*')->where('user_role_id', 8)->get();
        $adminList =DB::table('users')->select('*')->where('user_role_id', 6)->get();
        $userData =DB::table('users')->select('*')->where('id', $UserId)->first();
        $reportList =DB::table('reports')->select('*')->get();

        return view('admin-views.dashboard', ['records' => $records, 'role_id' => $role_id, 'subscriberecords' => $subscriberecords, 'userList' => $usersList, 'adminList' => $adminList, 'reportList' => $reportList, 'userData' => $userData]);
    }
    public function userDashboard() {
		$UserId = Auth::user()->id;
		$cdate = date("Y-m-d");
		//$totalTime = DB::select("CALL get_total_task_time(".$UserId.",'".$cdate."')");
		//$total_task_time = (empty($totalTime[0]->total_time)) ? "0h 0m" : date('G', strtotime($totalTime[0]->total_time))."h ".date('i', strtotime($totalTime[0]->total_time))."m";

        //$holiday_list = AptHoliday::select()->whereYear('date', '=', date('Y'))->get();

        return view('admin-views.user-dashboard', ['total_task_time' => 10, 'holiday_list' => '']);
    }
}
