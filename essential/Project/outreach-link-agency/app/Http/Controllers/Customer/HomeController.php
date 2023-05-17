<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\DashboardStatisticsButton;
use App\Models\ExploreServiceOrder;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth()->user();
        $dashboard_button = DashboardStatisticsButton::where('status', 1)->get();
        $current_balance = Wallet::select(DB::raw('SUM(CASE WHEN type = "credit" THEN amount ELSE -amount END) as total'))
            ->where('user_id', Auth::id())
            ->pluck('total')
            ->first();
        $spending = Wallet::where('type', 'debit')
            ->select(DB::raw('SUM(amount) as total'))
            ->where('user_id', Auth::id())
            ->pluck('total')
            ->first();
        $service_active_orders = ExploreServiceOrder::where('user_id', Auth::id())->where('status', 'Submitted')->orWhere('status', 'In Progress')->orWhere('status', 'Wating for Approval')->get()->count();
        $service_complete_orders = ExploreServiceOrder::where('user_id', Auth::id())->where('status', 'Completed')->get()->count();
        return view('customer.pages.dashboard.dashboard', get_defined_vars(), compact('current_balance', 'spending', 'service_active_orders', 'service_complete_orders'));
    }
}
