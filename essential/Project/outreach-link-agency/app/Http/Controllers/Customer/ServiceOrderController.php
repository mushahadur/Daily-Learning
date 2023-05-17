<?php

namespace App\Http\Controllers\Customer;

use DB;
use App\Models\ExploreSite;
use Illuminate\Http\Request;
use App\Models\ExploreServiceOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ExploreSiteModification;
use App\Models\ContentOrderModification;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\ExploreCountryRepository;

class ServiceOrderController extends Controller
{
    public function index(Request $request)
    {
        $query_paramiter = $request->query('status');
        $count = ExploreServiceOrder::where('user_id', Auth::id())
            ->groupBy('status')
            ->select('status', DB::raw('count(*) as count'))
            ->pluck('count', 'status');
        $totalCount = ExploreServiceOrder::where('user_id', Auth::id())->whereNotIn('status', ['N/A'])->count();

        if (is_null($query_paramiter)) {
            $site_order = ExploreServiceOrder::with('exploreSite', 'orderDetails', 'orderDetails.service', 'exploreSiteModification')->where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        } else {
            $site_order = ExploreServiceOrder::with('exploreSite', 'orderDetails', 'orderDetails.service', 'exploreSiteModification')->where('user_id', Auth::id())->where('status', $query_paramiter)->orderBy('created_at', 'DESC')->get();
        }

        // dd($site_order);
        return view('customer.pages.explore_site.order.index', compact('site_order', 'count', 'totalCount'));
    }

    public function view($id)
    {
        $exploreserviceorder = ExploreServiceOrder::with('wordLength', 'exploreSite', 'orderDetails.service')->where('user_id', Auth::id())->where('id', $id)->first();
        // dd($exploreserviceorder);
        return view('customer.pages.explore_site.order.view', compact('exploreserviceorder'));
    }

    public function create(Request $request)
    {
        // dd($request->has('orderId'));
        $orderId = null;
        if ($request->has('orderId')) {
            $orderId = $request->query('orderId');
            $serviceOrder = ExploreServiceOrder::findOrFail($orderId);
            if (is_null($serviceOrder)) {
                return redirect()->route('campaign.index');
            }
        }
        $siteId = $request->query('exploreSite');
        if (!$siteId) {
            return redirect()->route('sites.index');
        } else {
            $explore_site = ExploreSite::with('hyperlink_type', 'categories', 'countries', 'languages', 'services')->findOrFail($siteId);
            if (is_null($explore_site)) {
                return redirect()->route('sites.index');
            }
        }
        return view('customer.pages.service_order.create', compact('explore_site', 'orderId'));
    }

    public function show($id)
    {
        $site_order = ExploreServiceOrder::findOrFail($id);
        if ($site_order->payment_status = 'Not Paid') {
            return redirect()->route('order.checkout', $site_order->id);
        }

        return redirect()->route('');
    }

    public function checkout($id)
    {
        $site_order = ExploreServiceOrder::with('exploreSite', 'orderDetails', 'orderDetails.service')->findOrFail($id);
        $site_order->price = $site_order->grand_total;
        $country_list = (new ExploreCountryRepository())->all();
        $paymentable_area = 'service_order';
        return view('customer.pages.explore_site.checkout', compact('site_order', 'country_list', 'paymentable_area'));
    }

    public function message($id)
    {
        $exploreserviceorder = ExploreServiceOrder::with('wordLength', 'exploreSite', 'orderDetails.service', 'exploreSiteModification.user')->where('user_id', Auth::id())->where('id', $id)->first();
        return view('customer.pages.explore_site.order.message', compact('exploreserviceorder'));
    }

    public function statusUpdate(Request $request, $id)
    {
        // dd($request->all());
        try {
            $exploreserviceorder = ExploreServiceOrder::find($id);
            $exploreserviceorder->status = 'Completed';
            $exploreserviceorder->save();

            Alert::success('Explore Service Order Complete Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Something went wrong.');
            return redirect()->back();
        }
    }

    public function modificationUpdate(Request $request, $id)
    {
        // dd($request->all());
        try {
            $exploreserviceorder = ExploreServiceOrder::find($id);
            $exploreserviceorder->status = 'Modification';
            $exploreserviceorder->save();


            $message = new ExploreSiteModification();
            $message->messages = $request->messages;
            $message->user_id = Auth::id();
            $message->explore_service_order_id = $id;
            $message->save();

            Alert::success('Your modification message send Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Something went wrong.');
            return redirect()->back();
        }
    }
}
