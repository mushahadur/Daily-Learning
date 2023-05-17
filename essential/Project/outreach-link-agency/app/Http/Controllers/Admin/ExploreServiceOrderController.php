<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExploreServiceOrder;
use App\Models\ExploreSiteModification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ExploreServiceOrderController extends Controller
{
    public function index()
    {
        $exploreserviceorder = ExploreServiceOrder::with('orderDetails', 'exploreSite', 'user')->orderBy('created_at', 'DESC')->whereNotIn('status', ['Draft', 'N/A'])->get();
        return view('admin.pages.exploreservice-order.index', compact('exploreserviceorder'));
    }

    public function edit($id)
    {
        $exploreserviceorder = ExploreServiceOrder::with('orderDetails', 'exploreSite', 'user')->where('id', $id)->first();
        $message = ExploreSiteModification::with('explore_serivce_order', 'user')->where('explore_site_modifications.explore_service_order_id', $exploreserviceorder->id)->get();
        // dd($message);
        return view('admin.pages.exploreservice-order.edit', compact('exploreserviceorder', 'message'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        try {
            $exploreserviceorder = ExploreServiceOrder::find($id);
            $exploreserviceorder->status = $request->status;
            $exploreserviceorder->save();

            if ($request->messages) {
                $message = new ExploreSiteModification;
                $message->messages = $request->messages;
                $message->user_id = Auth::id();
                $message->explore_service_order_id = $exploreserviceorder->id;
                $message->save();
            }

            Alert::success('Explore Service Order Update Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Something went wrong.');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $exploreserviceorder = ExploreServiceOrder::with('orderDetails', 'exploreSite', 'user')->where('id', $id)->first();
        return view('admin.pages.exploreservice-order.view', compact('exploreserviceorder'));
    }
}
