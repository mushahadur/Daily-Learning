<?php

namespace App\Http\Controllers\Customer\Payments;

use App\Models\Package;
use App\Models\WordContent;
use App\Models\PackageOrder;
use Illuminate\Http\Request;
use App\Models\SubscribePlan;
use App\Models\WordContentOrder;
use App\Services\SubscriberService;
use App\Services\WalletDebitCredit;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Services\PackageOrderService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Services\ExploresiteOrderService;
use App\Services\WordContentOrderService;

class OrderController extends Controller
{
    public function order(PaymentRequest $request)
    {
        // dd($request->all());
        // Check wallet balance use service Class
        $balance = (new WalletDebitCredit())->check_balance();

        if ($request->paymentable_area == 'service_order') {
            // GET Selectable package information
            $package_info = Package::where('id', $request->paymentable_id)->first();
            if ($request->amount <= $balance) {
                $payment_method = 'balance';
                $ExploresiteOrderService = (new ExploresiteOrderService)->exploresiteOrder($request, $payment_method);

                toast('Your site order successfully completed', 'success');
                return redirect()->route('order.index');
            } else {
                return Redirect::back()->withErrors(['balance_low' => 'Your Balance is low']);
            }
        } elseif ($request->paymentable_area == 'subscription_order') {
            // GET Selectable subscription plan information
            $subscription_plan_info = SubscribePlan::where('id', $request->paymentable_id)->first();
            if ($subscription_plan_info->price <= $balance) {
                $payment_method = 'balance';
                $subscription_plan_info->amount = $subscription_plan_info->price;
                $SubscriberService =  (new SubscriberService)->addSubscriber($request, $subscription_plan_info, $payment_method);
                // dd($SubscriberService);
                toast('Subscription Plan Updated', 'success');
                return redirect()->route('subscription.index');
            } else {
                return Redirect::back()->withErrors(['balance_low' => 'Your Balance is low']);
            }
        } elseif ($request->paymentable_area == 'content_order') {
            // GET Selectable Word content
            $word_content_order_info = WordContentOrder::where('id', $request->paymentable_id)->first();
            if ($word_content_order_info->amount <= $balance) {
                $payment_method = 'balance';
                $content_order = (new WordContentOrderService)->contentOrder($request, $payment_method);
                toast('Your Content order successfully completed', 'success');
                return redirect()->route('content-order.view');
            } else {
                return Redirect::back()->withErrors(['balance_low' => 'Your Balance is low']);
            }
        } elseif ($request->paymentable_area == 'package_order') {
            // GET Selectable Package Order
            $package_order_info = PackageOrder::where('id', $request->paymentable_id)->first();
            if ($package_order_info->total_price <= $balance) {
                $payment_method = 'balance';
                $package_order = (new PackageOrderService)->packageOrder($request, $payment_method);
                toast('Your Package order payment completed', 'success');
                return redirect()->route('package-order.view');
            } else {
                return Redirect::back()->withErrors(['balance_low' => 'Your Balance is low']);
            }
        } else {
            toast('Something Went Wrong', 'error');
            return redirect()->back();
        }
    }
}
