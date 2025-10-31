<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
		//parent::leftMenu();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
		$UserId = Auth::user()->id;
		$cdate = date("Y-m-d");
		//$totalTime = DB::select("CALL get_total_task_time(".$UserId.",'".$cdate."')");
		//$total_task_time = (empty($totalTime[0]->total_time)) ? "0h 0m" : date('G', strtotime($totalTime[0]->total_time))."h ".date('i', strtotime($totalTime[0]->total_time))."m";

        //$holiday_list = AptHoliday::select()->whereYear('date', '=', date('Y'))->get();

        return view('admin-views.admin-role.list', ['total_task_time' => 10, 'holiday_list' => '']);
    }
    public function add() {
		$UserId = Auth::user()->id;
		$cdate = date("Y-m-d");
        return view('admin-views.admin-role.add', ['total_task_time' => 10, 'holiday_list' => '']);
    }
}
