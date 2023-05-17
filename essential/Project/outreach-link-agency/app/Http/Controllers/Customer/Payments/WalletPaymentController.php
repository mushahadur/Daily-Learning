<?php

namespace App\Http\Controllers\Customer\Payments;

use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Services\OmnipayInitialize;
use App\Services\WalletDebitCredit;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use Illuminate\Support\Facades\Redirect;

class WalletPaymentController extends Controller
{
    private $gateway;
    public function __construct()
    {
        $this->gateway = (new OmnipayInitialize())();
    }

    public function pay(PaymentRequest $request)
    {
        if ($request->amount < 50) {
            return Redirect::back()->withErrors(['min_deposit_error' => 'The deposit amount must be at least $ 50']);
        }
        $redirect_url = 'wallet-payment-success';
        (new PaymentService)->pay($request, $request->paymentable_id, $this->gateway, $redirect_url);
    }

    public function success(Request $request)
    {
        // dd($request->all());
        // dd($request->all());
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
                if ($payment) {
                    toast('Payment successfull !', 'success');
                }

                $payment_method = 'paypal';
                // balance add to wallet table
                $credit = (new WalletDebitCredit)->credit($request, $payment, $payment_method, 'Wallet');
                if ($credit) {
                    toast('Successfully added balance to your wallet', 'success');
                } else {
                    toast('Failed to add balance your wallet', 'error');
                }
                return redirect()->route('wallet.index');
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
