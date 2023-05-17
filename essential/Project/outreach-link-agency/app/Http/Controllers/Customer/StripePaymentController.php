<?php

namespace App\Http\Controllers\Customer;

use Omnipay\Omnipay;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\SubscribePlan;
use App\Services\InvoiceService;
use App\Services\SubscriberService;
use App\Services\WalletDebitCredit;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\PackageOrderService;
use Illuminate\Support\Facades\Redirect;
use App\Services\ExploresiteOrderService;
use App\Services\WordContentOrderService;

class StripePaymentController extends Controller
{
    public $gateway;
    public $completePaymentUrl;

    public function __construct()
    {
        $this->gateway = Omnipay::create('Stripe\PaymentIntents');
        $this->gateway->setApiKey(config('app.stripe_secret') ?? env('STRIPE_SECRET_KEY'));
        $this->completePaymentUrl = url('confirm');
    }

    public function index()
    {
        return view('customer.pages.stripe-payment');
    }

    public function charge(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'amount' => 'required'
        ]);
        if ($request->input('paymentable_area') == 'stripe_wallet' && $request->amount < 50) {
            return Redirect::back()->withErrors(['min_deposit_error' => 'The deposit amount must be at least $ 50']);
        }
        if ($request->input('stripeToken')) {
            $token = $request->input('stripeToken');

            $response = $this->gateway->authorize([
                'amount' => $request->input('amount'),
                'currency' => env('STRIPE_CURRENCY'),
                'description' => 'This is a ' . ucfirst(str_replace('stripe_', ' ', $request->input('paymentable_area'))) . ' purchase transaction from Outreach Link Agency.',
                'token' => $token,
                'returnUrl' => $this->completePaymentUrl,
                'confirm' => true,
            ])->send();

            if ($response->isSuccessful()) {
                // dd($response);
                $response = $this->gateway->capture([
                    'amount' => $request->input('amount'),
                    'currency' => env('STRIPE_CURRENCY'),
                    'paymentIntentReference' => $response->getPaymentIntentReference(),
                ])->send();

                $arr_payment_data = $response->getData();

                $payment = $this->store_payment([
                    'payment_id' => $arr_payment_data['id'],
                    'payer_email' => $request->input('email'),
                    'payer_id' => $arr_payment_data['client_secret'],
                    'payer_id' => $arr_payment_data['client_secret'],
                    'amount' => $arr_payment_data['amount'] / 100,
                    'currency' => env('STRIPE_CURRENCY'),
                    'payment_status' => $arr_payment_data['status'],
                ]);

                $payment_method = 'stripe';
                if ($request->input('paymentable_area') == 'stripe_wallet') {
                    // balance add to wallet table
                    $credit = (new WalletDebitCredit)->credit($request, $payment, $payment_method, 'Wallet');
                    if ($credit) {
                        toast('Successfully added balance to your wallet', 'success');
                    } else {
                        toast('Failed to add balance your wallet', 'error');
                    }
                    return redirect()->route('wallet.index');
                } elseif ($request->input('paymentable_area') == 'stripe_service_order') {
                    $site_order =  (new ExploresiteOrderService)->exploresiteOrder($request, $payment_method);
                    if (!is_null($site_order)) {
                        $collection = collect([
                            'amount' => $arr_payment_data['amount'] / 100,
                            'source' => 'Site_order',
                            'type' => 'debit',
                            'txn_id' => $arr_payment_data['id']
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
                } elseif ($request->input('paymentable_area') == 'stripe_content_order') {
                    $wordContentOrderService = (new WordContentOrderService)->contentOrder($request, $payment_method);
                    if (!is_null($wordContentOrderService)) {
                        $collection = collect([
                            'amount' => $arr_payment_data['amount'] / 100,
                            'source' => 'Content_order',
                            'type' => 'debit',
                            'txn_id' => $arr_payment_data['id']
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
                } elseif ($request->input('paymentable_area') == 'stripe_package_order') {
                    $package_order =  (new PackageOrderService)->packageOrder($request, $payment_method);
                    if (!is_null($package_order)) {
                        $collection = collect([
                            'amount' => $arr_payment_data['amount'] / 100,
                            'source' => 'Package_order',
                            'type' => 'debit',
                            'txn_id' => $arr_payment_data['id']
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
                } elseif ($request->input('paymentable_area') == 'stripe_subscription') {
                    $subscription_plan_info = SubscribePlan::where('id', $request->paymentable_id)->first();
                    $subscription_create = (new SubscriberService)->addSubscriber($request, $subscription_plan_info, $payment_method);
                    if (!is_null($subscription_create)) {
                        $collection = collect([
                            'amount' => $arr_payment_data['amount'] / 100,
                            'source' => 'Subscription',
                            'type' => 'debit',
                            'txn_id' => $arr_payment_data['id']
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
                }

                return redirect()->back()->with("success", "Payment is successful. Your payment id is: " . $arr_payment_data['id']);
            } elseif ($response->isRedirect()) {
                session(['payer_email' => $request->input('email')]);
                $response->redirect();
            } else {
                return redirect()->back()->with("error", $response->getMessage());
            }
        }
    }

    public function confirm(Request $request)
    {
        $response = $this->gateway->confirm([
            'paymentIntentReference' => $request->input('payment_intent'),
            'returnUrl' => $this->completePaymentUrl,
        ])->send();

        if ($response->isSuccessful()) {
            $response = $this->gateway->capture([
                'amount' => $request->input('amount'),
                'currency' => env('STRIPE_CURRENCY'),
                'paymentIntentReference' => $request->input('payment_intent'),
            ])->send();

            $arr_payment_data = $response->getData();

            $this->store_payment([
                'payment_id' => $arr_payment_data['id'],
                'payer_email' => session('payer_email'),
                'payer_id' => $arr_payment_data['client_secret'],
                'amount' => $arr_payment_data['amount'] / 100,
                'currency' => env('STRIPE_CURRENCY'),
                'payment_status' => $arr_payment_data['status'],
            ]);

            return redirect()->back()->with("success", "Payment is successful. Your payment id is: " . $arr_payment_data['id']);
        } else {
            return redirect()->back()->with("error", $response->getMessage());
        }
    }

    public function store_payment($arr_data = [])
    {
        $isPaymentExist = Payment::where('payment_id', $arr_data['payment_id'])->first();

        if (!$isPaymentExist) {
            $payment = new Payment;
            $payment->user_id = Auth::id();
            $payment->payment_id = $arr_data['payment_id'];
            $payment->payer_email = $arr_data['payer_email'];
            $payment->payer_id = $arr_data['payer_id'];
            $payment->payer_id = $arr_data['payer_id'];
            $payment->amount = $arr_data['amount'];
            $payment->currency = env('STRIPE_CURRENCY');
            $payment->payment_status = $arr_data['payment_status'];
            $payment->payment_method = 'Stripe';
            $payment->save();
        }
        return $payment;
    }
}
