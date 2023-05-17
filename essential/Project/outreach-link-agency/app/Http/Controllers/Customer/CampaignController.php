<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\ExploreServiceOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    public function index()
    {
        $exploresite = ExploreServiceOrder::with('campaign')->where('campaign_id', 'campaigns.id')->get();
        $campaign = DB::table('campaigns')
            ->leftJoin('explore_service_orders', 'campaigns.id', '=', 'explore_service_orders.campaign_id')
            ->select('campaigns.id', 'campaigns.name', 'campaigns.created_at', DB::raw('COUNT(explore_service_orders.campaign_id) as numberOfCampaign'), DB::raw('date(campaigns.created_at) as dates'), DB::raw('COUNT(CASE WHEN explore_service_orders.status = "N/A" THEN 1 ELSE NULL END) as freeToUse'))
            ->where('campaigns.user_id', Auth::user()->id)
            ->groupBy('campaigns.id', 'campaigns.name', 'campaigns.created_at')
            ->paginate(10);
        return view('customer.pages.campaigns.index', compact('campaign'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['url', 'unique:' . Campaign::class],
            ]);

            $campaign = new Campaign([
                'name' => $request->name,
                'user_id' => Auth::user()->id,
            ]);

            $campaign->save();
            Alert::success('Congratulation', 'Campaign Create Successfully');
            return redirect('campaign');
        } catch (\Throwable $th) {
            Alert::error($request->name . ' is already exists');
            return redirect()->back();
        }
    }

    public function storeWithExploresite(Request $request)
    {

        try {

            if (is_null($request->campaign)) {
                $request->validate([
                    'name' => ['url', 'unique:' . Campaign::class],
                ]);

                $campaign = new Campaign([
                    'name' => $request->name,
                    'user_id' => Auth::user()->id,
                ]);
                $campaign->save();
            } else {
                $campaign = Campaign::findOrFail($request->campaign);
            }
            $campaign->exploreSites()->syncWithoutDetaching($request->input('exploresite_id'));

            $service_order = new ExploreServiceOrder();
            $service_order->reference_id = time() . rand(10 * 45, 100 * 98);
            $service_order->user_id = Auth::id();
            $service_order->campaign_id = $campaign->id;
            $service_order->exploresite_id = $request->exploresite_id;
            $service_order->status = 'N/A';
            $service_order->total_price = $request->price;
            $service_order->grand_total = $request->price;
            $service_order->payment_status = 'Not Paid';
            $service_order->save();

            Alert::success('Congratulation', 'Campaign Create Successfully');
            return redirect('campaign');
        } catch (\Throwable $th) {
            Alert::error($request->name . ' is already exists');
            return redirect()->back();
        }
    }

    public function show($id, Request $request)
    {
        $campaignID = $id;
        $query_paremiter = $request->query('status');

        if (is_null($query_paremiter)) {
            $exploreServiceOrder = ExploreServiceOrder::where('user_id', Auth::id())->where('campaign_id', $id)->orderBy('created_at', 'DESC')->get();
        } else {
            $exploreServiceOrder = ExploreServiceOrder::where('user_id', Auth::id())->where('status', $query_paremiter)->where('campaign_id', $id)->orderBy('created_at', 'DESC')->get();
        }
        // dd($exploreServiceOrder);
        return view('customer.pages.campaigns.show', compact('exploreServiceOrder', 'campaignID'));
    }

    public function destroy(Request $request)
    {
        $exploreServiceOrder = ExploreServiceOrder::findOrFail($request->explore_service_order_id);
        $campaign = Campaign::where('id', $exploreServiceOrder->campaign_id)->first();
        $campaign->exploreSites()->detach($exploreServiceOrder->exploresite_id);
        $exploreServiceOrder->delete();
        Alert::success('Congratulation', 'Site Delete Successfully');
        return redirect()->back();
    }
}
