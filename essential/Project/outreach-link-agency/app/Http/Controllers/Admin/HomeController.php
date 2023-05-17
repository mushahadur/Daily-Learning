<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Subscriber;
use App\Models\PackageOrder;
use Illuminate\Http\Request;
use App\Models\WordContentOrder;
use Illuminate\Support\Facades\DB;
use App\Models\ExploreServiceOrder;
use App\Http\Controllers\Controller;
use App\Models\ExploreSite;

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
        $statuses = ['Submitted', 'In Progress', 'Waiting for Approval', 'Completed'];
        // all user count
        $users = User::all()->count();
        // Paid subscriber count
        $paidCustomer = Subscriber::where('status', 1)->count();
        // total revenue summation
        $totalRevenew = Payment::whereYear('created_at', '=', date('Y'))->sum('amount');
        // indivisual order count
        $siteOrder = $this->getStatusCount(ExploreServiceOrder::class, $statuses);
        $packageOrder = $this->getStatusCount(PackageOrder::class, $statuses);
        $contentOrder = $this->getStatusCount(WordContentOrder::class, $statuses);
        // current year indivisual order
        $currentYearSiteOrder = $this->currentYearOrderCount(ExploreServiceOrder::class, $statuses);
        $currentYearPackageOrder = $this->currentYearOrderCount(PackageOrder::class, $statuses);
        $currentYearContentOrder = $this->currentYearOrderCount(WordContentOrder::class, $statuses);
        $currentYearTotalOrder = $currentYearSiteOrder + $currentYearPackageOrder + $currentYearContentOrder;
        // yearly revenue
        $yearlyRevenue = Payment::whereYear('created_at', '=', date('Y'))->sum('amount');

        $user = Auth()->user();

        // use for chart lables
        $chartLabels = ['January', 'February', 'March', 'April', 'May', 'Jun', 'July', 'August', 'September', 'October', 'November', 'December'];

        // This query find every month total amount of order with month number
        $exploreserviceorder = DB::table(function ($query) {
            $query->select(DB::raw('MONTHNAME(created_at) as month_name'), DB::raw('SUM(grand_total) as total_amount'))
                ->from('explore_service_orders')
                ->whereYear('created_at', date('Y'))
                ->groupBy('month_name');
        }, 'monthly_data')
            ->leftJoin(DB::raw('(SELECT 1 AS month_number UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12) AS months'), function ($join) {
                $join->on(DB::raw('MONTHNAME(monthly_data.month_name)'), '=', DB::raw('MONTHNAME(months.month_number)'));
            })
            ->orderBy('months.month_number')
            ->get();

        // pluck the service order with an array
        $monthlyData = $exploreserviceorder->pluck('total_amount', 'month_name', 'month_number')->toArray();

        // Blank array to use store data
        $exploreserviceorderData = [];

        // Store data in blank array
        foreach ($chartLabels as $label) {
            $exploreserviceorderData[] = isset($monthlyData[$label]) ? $monthlyData[$label] : 0;
        }

        // query for package order
        $packageorder = DB::table(function ($query) {
            $query->select(DB::raw('MONTHNAME(created_at) as month_name'), DB::raw('SUM(total_price) as total_price'))
                ->from('package_orders')
                ->whereYear('created_at', date('Y'))
                ->groupBy('month_name');
        }, 'monthly_data')
            ->leftJoin(DB::raw('(SELECT 1 AS month_number UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12) AS months'), function ($join) {
                $join->on(DB::raw('MONTHNAME(monthly_data.month_name)'), '=', DB::raw('MONTHNAME(months.month_number)'));
            })
            ->orderBy('months.month_number')
            ->get();

        $monthlyData = $packageorder->pluck('total_price', 'month_name', 'month_number')->toArray();
        $packageorderData = [];

        foreach ($chartLabels as $label) {
            $packageorderData[] = isset($monthlyData[$label]) ? $monthlyData[$label] : 0;
        }

        // query for content order
        $contentorder = DB::table(function ($query) {
            $query->select(DB::raw('MONTHNAME(created_at) as month_name'), DB::raw('SUM(total_price) as total_price'))
                ->from('word_content_orders')
                ->whereYear('created_at', date('Y'))
                ->groupBy('month_name');
        }, 'monthly_data')
            ->leftJoin(DB::raw('(SELECT 1 AS month_number UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12) AS months'), function ($join) {
                $join->on(DB::raw('MONTHNAME(monthly_data.month_name)'), '=', DB::raw('MONTHNAME(months.month_number)'));
            })
            ->orderBy('months.month_number')
            ->get();

        $monthlyData = $contentorder->pluck('total_price', 'month_name', 'month_number')->toArray();
        $contentorderData = [];

        foreach ($chartLabels as $label) {
            $contentorderData[] = isset($monthlyData[$label]) ? $monthlyData[$label] : 0;
        }

        $payment = Payment::with('user')->orderBy('created_at', 'desc')->take(5)->get();
        // dd($payment);

        return view('admin.pages.dashboard.dashboard', get_defined_vars(), compact('chartLabels', 'exploreserviceorderData', 'packageorderData', 'contentorderData', 'payment'));
    }

    function getStatusCount($model, $statuses)
    {
        return $model::whereIn('status', $statuses)->count();
    }

    function currentYearOrderCount($model, $statuses)
    {
        return $model::whereIn('status', $statuses)->whereYear('created_at', '=', date('Y'))->count();
    }
}
