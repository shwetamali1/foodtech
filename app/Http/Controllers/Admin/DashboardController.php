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
    public function index(Request $request) {
		$UserId  = Auth::user()->id;
		$role_id = Auth::user()->user_role_id;

		// Regular users should only see their own dashboard
		if ($role_id == 8) {
		    return redirect('/user-dashboard');
		}

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
        
        $usersList  = DB::table('users')->select('*')->where('user_role_id', 8)->get();
        $adminList  = DB::table('users')->select('*')->where('user_role_id', 6)->get();
        $userData   = DB::table('users')->select('*')->where('id', $UserId)->first();
        $reportList = DB::table('reports')->select('*')->get();

        // Year filter — default to current year; let user pick any year that has payments
        $currentYear   = (int) date('Y');
        $selectedYear  = (int) $request->get('year', $currentYear);
        $selectedView  = $request->get('chart_view', 'both'); // revenue | orders | both

        // Build list of years that have at least one successful payment
        $paymentYears = DB::table('payments')
            ->selectRaw('YEAR(created_at) as yr')
            ->where('status', 'success')
            ->whereNotNull('created_at')
            ->groupBy(DB::raw('YEAR(created_at)'))
            ->orderByDesc('yr')
            ->pluck('yr')
            ->toArray();

        if (empty($paymentYears)) {
            $paymentYears = [$currentYear];
        }
        if (!in_array($selectedYear, $paymentYears)) {
            $selectedYear = $paymentYears[0]; // fallback to latest year with data
        }

        // Monthly revenue & order count for selected year
        // amounts in payments table are already stored in ₹ (divided at save time)
        $rawMonthly = DB::table('payments')
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(amount) as revenue'),
                DB::raw('COUNT(*) as orders')
            )
            ->where('status', 'success')
            ->whereYear('created_at', $selectedYear)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        $monthLabels  = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        $chartMonths  = $monthLabels;
        $chartRevenue = [];
        $chartOrders  = [];
        for ($m = 1; $m <= 12; $m++) {
            $chartRevenue[] = isset($rawMonthly[$m]) ? round((float)$rawMonthly[$m]->revenue, 2) : 0;
            $chartOrders[]  = isset($rawMonthly[$m]) ? (int)$rawMonthly[$m]->orders : 0;
        }

        $totalRevenue = array_sum($chartRevenue);

        return view('admin-views.dashboard', [
            'records'        => $records,
            'role_id'        => $role_id,
            'subscriberecords' => $subscriberecords,
            'userList'       => $usersList,
            'adminList'      => $adminList,
            'reportList'     => $reportList,
            'userData'       => $userData,
            'chartMonths'    => $chartMonths,
            'chartRevenue'   => $chartRevenue,
            'chartOrders'    => $chartOrders,
            'totalRevenue'   => $totalRevenue,
            'currentYear'    => $currentYear,
            'selectedYear'   => $selectedYear,
            'selectedView'   => $selectedView,
            'paymentYears'   => $paymentYears,
        ]);
    }
    public function userDashboard() {
        $UserId  = Auth::user()->id;
        $role_id = Auth::user()->user_role_id;

        // Only logged-in user's own purchases
        $records = DB::table('billing_details')
            ->select(
                'billing_details.*',
                'payments.r_payment_id',
                'payments.method',
                'payments.amount',
                'payments.status as p_status',
                'payments.created_at as payment_date',
                'reports.reports_title as report_title',
                'subscriptions.title as subscription_name'
            )
            ->join('payments', 'billing_details.id', '=', 'payments.billing_detail_id')
            ->leftJoin('reports', function($join) {
                $join->on('billing_details.subscribe_id', '=', 'reports.id')
                     ->where('billing_details.payment_plan', 'report');
            })
            ->leftJoin('subscriptions', function($join) {
                $join->on('billing_details.subscribe_id', '=', 'subscriptions.id')
                     ->where('billing_details.payment_plan', '!=', 'report');
            })
            ->where('billing_details.user_id', $UserId)
            ->where('payments.status', 'success')
            ->get();

        $userData = DB::table('users')->where('id', $UserId)->first();

        return view('admin-views.user-dashboard', [
            'records'  => $records,
            'role_id'  => $role_id,
            'userData' => $userData,
        ]);
    }
}
