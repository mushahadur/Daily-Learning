<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PackageOrder;
use App\Models\PackageOrderModification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PackageOrderController extends Controller
{
    public function index()
    {
        $packageorder = PackageOrder::orderBy('created_at', 'DESC')->whereNotIn('status', ['Draft'])->get();
        return view('admin.pages.package_order.index', compact('packageorder'));
    }

    public function packageOrderShow($id)
    {
        $packageorder = PackageOrder::with('package_order_details')->where('id', $id)->first();
        $packageorderdetails = PackageOrder::with('package_order_details')->where('id', $id)->get();
        return view('admin.pages.package_order.view', compact('packageorder', 'packageorderdetails'));
    }

    public function packageOrderEdit($id)
    {
        $packageorder = PackageOrder::with('package_order_details')->where('id', $id)->first();
        $packageorderdetails = PackageOrder::with('package_order_details')->where('id', $id)->get();
        $message = PackageOrderModification::with('package_order', 'user')->where('package_order_modifications.package_order_id', $packageorder->id)->get();
        return view('admin.pages.package_order.edit', compact('packageorder', 'packageorderdetails', 'message'));
    }

    public function packageOrderUpdate(Request $request, $id)
    {
        try {
            $packageorder = PackageOrder::find($id);
            $packageorder->status = $request->status;
            $packageorder->save();

            if ($request->messages) {
                $message = new PackageOrderModification();
                $message->messages = $request->messages;
                $message->user_id = Auth::id();
                $message->package_order_id = $packageorder->id;
                $message->save();
            }

            Alert::success('Package Order Update Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Something went wrong.');
            return redirect()->back();
        }
    }
}
