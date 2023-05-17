<?php

namespace App\Http\Controllers\Customer;

use App\Models\Package;
use App\Models\PackageOrder;
use Illuminate\Http\Request;
use App\Models\ExploreCountry;
use Illuminate\Support\Facades\DB;
use App\Models\PackageOrderDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\PackageOrderModification;
use RealRashid\SweetAlert\Facades\Alert;

class PackageController extends Controller
{
    public function index()
    {
        $package = Package::all();
        return view('customer.pages.packages.buy', compact('package'));
    }

    public function view(Request $request)
    {
        $query_paramiter = $request->query('status');
        $count = PackageOrder::where('user_id', Auth::id())
            ->groupBy('status')
            ->select('status', DB::raw('count(*) as count'))
            ->pluck('count', 'status');
        $totalCount = PackageOrder::where('user_id', Auth::id())->whereNotIn('status', ['N/A'])->count();

        if (is_null($query_paramiter)) {
            $package = PackageOrder::with('package', 'packageOrderModification')->where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        } else {
            $package = PackageOrder::with('package', 'packageOrderModification')->where('user_id', Auth::user()->id)->where('status', $query_paramiter)->orderBy('created_at', 'DESC')->get();
        }
        return view('customer.pages.packages.index', compact('package', 'count', 'totalCount'));
    }

    public function redirect(Request $request, $id)
    {
        $quantity = Crypt::encrypt($request->quantity);
        return redirect()->route('package-order.show', [$id, 'quantity' => $quantity]);
    }
    public function create(Request $request, $id)
    {
        $package = Package::where('id', $id)->first();
        try {
            $quantity = Crypt::decrypt($request->quantity);
            // Continue processing decrypted data
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // Handle decryption exception
            toast('Quantity is invalid', 'error');
            return redirect()->back();
        }
        return view('customer.pages.packages.order', compact('package', 'quantity'));
    }

    public function packageOrderShow(Request $request, $id)
    {
        $packageorder = PackageOrder::with('package')->where('id', $id)->first();
        $packageOrderDetails = PackageOrder::with('package_order_details')->where('id', $id)->get();
        return view('customer.pages.packages.show', compact('packageorder', 'packageOrderDetails'));
    }

    public function store(Request $request, $id)
    {

        $validator = $request->validate([
            'anchor_text.*' => 'required',
            'landing_page.*' => ['required', 'url'],
        ], [
            'anchor_text.*.required' => 'This field is required.',
            'landing_page.*.required' => 'This field is required.',
            'landing_page.*.url' => 'This landing page must be url (https://example.com)',
        ]);

        $package = Package::where('id', $id)->first();
        $quantity = $request->quantity;
        $price = $package->price;
        $increment = $package->increment_decrement_quantity;
        $totalPrice =  ($price / $increment) * $quantity;

        $packageOrder = new PackageOrder([
            'reference_id' => time() . rand(10 * 45, 100 * 98),
            'package_id' => $request->id,
            'user_id' => auth()->user()->id,
            'total_price' => $totalPrice,
            'quantity' => $request->quantity,
            'payment_status' => 'Not Paid',
        ]);

        $saved = $packageOrder->save();

        if ($saved) {
            for ($i = 0; $i < $quantity; $i++) {
                $packageOrderdetails = new PackageOrderDetails();

                $packageOrderdetails->package_order_id = $packageOrder->id;
                $packageOrderdetails->topic = $request->topic[$i];
                $packageOrderdetails->anchor_text = $request->anchor_text[$i];
                $packageOrderdetails->landing_page = $request->landing_page[$i];
                $packageOrderdetails->instruction = $request->instruction[$i];

                $packageOrderdetails->save();
            }
        }
        Alert::success('Congratulation', 'Package order Save Successfully');
        return redirect()->route('package-order.checkout', $packageOrder->id);
    }

    public function checkout($id)
    {
        $package = PackageOrder::with('package')->where('id', $id)->first();
        $package->price = $package->total_price;
        $country_list = ExploreCountry::all();
        $paymentable_area = 'package_order';
        return view('customer.pages.packages.checkout', compact('package', 'country_list', 'paymentable_area'));
    }

    public function message($id)
    {
        $packageorder = PackageOrder::with('package', 'user', 'package_order_details', 'packageOrderModification.user')->where('user_id', Auth::id())->where('id', $id)->first();
        $packagorderdetails = PackageOrder::with('package', 'user', 'package_order_details')->where('id', $id)->get();
        return view('customer.pages.packages.message', compact('packageorder', 'packagorderdetails'));
    }

    public function packageStatusUpdate(Request $request, $id)
    {
        try {
            $exploreserviceorder = PackageOrder::find($id);
            $exploreserviceorder->status = 'Completed';
            $exploreserviceorder->save();

            Alert::success('Package Order Accept Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Something went wrong.');
            return redirect()->back();
        }
    }

    public function packageModificationUpdate(Request $request, $id)
    {
        try {
            $exploreserviceorder = PackageOrder::find($id);
            $exploreserviceorder->status = 'Modification';
            $exploreserviceorder->save();


            $message = new PackageOrderModification();
            $message->messages = $request->messages;
            $message->user_id = Auth::id();
            $message->package_order_id = $id;
            $message->save();

            Alert::success('Your modification message send Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Something went wrong.');
            return redirect()->back();
        }
    }
}
