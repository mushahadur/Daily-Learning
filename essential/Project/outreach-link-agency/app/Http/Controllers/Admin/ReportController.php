<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExploreServiceOrder;
use App\Models\PackageOrder;
use App\Models\WordContentOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function siteOrderReport()
    {
        $siteOrder = ExploreServiceOrder::with('user', 'exploreSite')->whereNotIn('status', ['N/A', 'Draft'])->get();
        // dd($siteOrder);
        return view('admin.pages.reports.site-order-report', compact('siteOrder'));
    }

    public function dateFilter(Request $request)
    {
        $siteOrder = ExploreServiceOrder::whereDate('created_at', '>=', $request->from)->whereDate('created_at', '<=', $request->to)->get();
        return view('admin.pages.reports.site-order-report', compact('siteOrder'));
    }

    public function contentOrderReport()
    {
        $contentorder = WordContentOrder::with('user', 'word_content', 'word_content_order_detail')->whereNotIn('status', ['Draft'])->get();
        // dd($siteOrder);
        return view('admin.pages.reports.content-order-report', compact('contentorder'));
    }

    public function contentdateFilter(Request $request)
    {
        $contentorder = WordContentOrder::whereDate('created_at', '>=', $request->from)->whereDate('created_at', '<=', $request->to)->get();
        return view('admin.pages.reports.content-order-report', compact('contentorder'));
    }

    public function packageOrderReport()
    {
        $packageorder = PackageOrder::with('user', 'package', 'package_order_details')->whereNotIn('status', ['Draft'])->get();
        // dd($siteOrder);
        return view('admin.pages.reports.package-order-report', compact('packageorder'));
    }

    public function packagedateFilter(Request $request)
    {
        $packageorder = PackageOrder::whereDate('created_at', '>=', $request->from)->whereDate('created_at', '<=', $request->to)->get();
        return view('admin.pages.reports.package-order-report', compact('packageorder'));
    }
}
