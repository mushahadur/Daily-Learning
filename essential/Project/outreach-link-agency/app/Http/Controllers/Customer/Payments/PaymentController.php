<?php

namespace App\Http\Controllers\Customer\Payments;

use Carbon\Carbon;
use Omnipay\Omnipay;
use App\Models\Payment;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Models\SubscribePlan;
use App\Services\InvoiceService;
use App\Services\PaymentService;
use PhpParser\Node\Stmt\Return_;
use App\Services\OmnipayInitialize;
use App\Services\SubscriberService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PaymentRequest;
use App\Services\PackageOrderService;
use Illuminate\Support\Facades\Redirect;
use App\Services\ExploresiteOrderService;
use App\Services\WordContentOrderService;

class PaymentController extends Controller
{
    private $gateway;
    public function __construct()
    {
        $this->gateway = (new OmnipayInitialize())();
    }

    public function pay(PaymentRequest $request)
    {
        // dd($request->all());
        $redirect_url = 'success';
        (new PaymentService)->pay($request, $request->paymentable_id, $this->gateway, $redirect_url);
    }

    public function success(Request $request, $paymentable_id)
    {
        // dd($request->input('paymentable_area'));
        // dd($paymentable_id);
        // dd($request->all());
        // dd($paymentable_id);
        // Payment mathod working process
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));
            $response = $transaction->send();
            if ($response->isSuccessful()) {
                $arr = $response->getData();

                $payment = (new PaymentService)->payment($arr);

                $request->merge(['paymentable_id' => $paymentable_id]);
                $payment_method = 'paypal';
                if ($request->input('paymentable_area') == 'subscription_order') {
                    $subscription_plan_info = SubscribePlan::where('id', $paymentable_id)->first();
                    $subscription_create = (new SubscriberService)->addSubscriber($request, $subscription_plan_info, $payment_method);
                    if (!is_null($subscription_create)) {
                        $collection = collect([
                            'amount' => $arr['transactions'][0]['amount']['total'],
                            'source' => 'Subscription',
                            'type' => 'debit',
                            'txn_id' => $arr['id']
                        ]);
                        $invoice = (new InvoiceService())->invoice($subscription_create->id, $collection, $payment_method);
                        if ($invoice) {
                            toast('Your subscription plan Updated', 'success');
                            return Redirect::route('subscription.index')->withErrors(['subscription_updated' => 'Your subscription plan Updated']);
                        } else {
                            toast('Failed to update subscription plan', 'error');
                            return Redirect::route('subscription.index')->withErrors(['subscription_updated' => 'Failed to update subscription plan']);
                        }
                    } else {
                        toast('Failed to update subscription plan', 'error');
                        return Redirect::route('subscription.index')->withErrors(['subscription_updated' => 'Failed to update subscription plan']);
                    }
                } elseif ($request->input('paymentable_area') == 'service_order') {
                    $request->merge(['discount' => $request->input('discount'), 'couponID' => $request->input('couponID')]);
                    $site_order =  (new ExploresiteOrderService)->exploresiteOrder($request, $payment_method);
                    if (!is_null($site_order)) {
                        $collection = collect([
                            'amount' => $arr['transactions'][0]['amount']['total'],
                            'source' => 'Site_order',
                            'type' => 'debit',
                            'txn_id' => $arr['id']
                        ]);
                        $invoice = (new InvoiceService())->invoice($site_order->id, $collection, $payment_method);
                        if ($invoice) {
                            toast('Your site order successfully completed', 'success');
                            return redirect()->route('order.index');
                        } else {
                            toast('Failed! Something went Wrong', 'error');
                            return Redirect::route('order.index');
                        }
                    } else {
                        toast('Failed! Something went Wrong', 'error');
                        return Redirect::route('order.index');
                    }
                } elseif ($request->input('paymentable_area') == 'content_order') {
                    $wordContentOrderService = (new WordContentOrderService)->contentOrder($request, $payment_method);
                    if (!is_null($wordContentOrderService)) {
                        $collection = collect([
                            'amount' => $arr['transactions'][0]['amount']['total'],
                            'source' => 'Content_order',
                            'type' => 'debit',
                            'txn_id' => $arr['id']
                        ]);
                        $invoice = (new InvoiceService())->invoice($wordContentOrderService->id, $collection, $payment_method);
                        if ($invoice) {
                            toast('Your word-content order payment completed', 'success');
                            return redirect()->route('content-order.view');
                        } else {
                            toast('Failed! Something went Wrong', 'error');
                            return Redirect::route('content-order.view');
                        }
                    } else {
                        toast('Failed! Something went Wrong', 'error');
                        return Redirect::route('content-order.view');
                    }
                } elseif ($request->input('paymentable_area') == 'package_order') {
                    $package_order =  (new PackageOrderService)->packageOrder($request, $payment_method);
                    if (!is_null($package_order)) {
                        $collection = collect([
                            'amount' => $arr['transactions'][0]['amount']['total'],
                            'source' => 'Package_order',
                            'type' => 'debit',
                            'txn_id' => $arr['id']
                        ]);
                        $invoice = (new InvoiceService())->invoice($package_order->id, $collection, $payment_method);
                        if ($invoice) {
                            toast('Your package order payment completed', 'success');
                            return redirect()->route('package-order.view');
                        } else {
                            toast('Failed! Something went Wrong', 'error');
                            return Redirect::route('package-order.view');
                        }
                    } else {
                        toast('Failed! Something went Wrong', 'error');
                        return Redirect::route('package-order.view');
                    }
                } else {
                    toast('Payment declined !', 'error');
                    return back();
                }
            } else {
                return $response->getMessage();
            }
        } else {
            toast('Payment declined !', 'error');
            return back();
        }
    }

    public function error()
    {
        toast('User declined the payment', 'error');
        return back();
    }
}
