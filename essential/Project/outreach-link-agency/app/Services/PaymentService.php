<?php

namespace App\Services;

use Omnipay\Omnipay;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentService
{
    public function pay($request, $redirect_id = null, $gateway, $redirect_url)
    {
        // dd($redirect_url);
        // dd($request->all());
        try {

            $params = ['countryId' => $request->country_id, 'paymentable_area' => $request->paymentable_area];
            if ($request->paymentable_area == 'service_order') {
                $params['discount'] = $request->discount;
                $params['couponID'] = $request->couponID;
            }

            if ($redirect_url == 'wallet-payment-success') {
                $params['amount'] = $request->amount;
            }

            $response = $gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => config('app.paypal_currency') ?? env('PAYPAL_CURRENCY'),
                'returnUrl' => url($redirect_url, $redirect_id) . '?' . http_build_query($params),
                'cancelUrl' => url('error')
            ))->send();
            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function payment($arr)
    {
        // dd($arr);
        $isPaymentExist = Payment::where('payment_id', $arr['id'])->first();


        if (!$isPaymentExist) {
            $payment = new Payment();
            $payment->user_id = Auth::id();
            $payment->payment_id = $arr['id'];
            $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
            $payment->payer_email = $arr['payer']['payer_info']['email'];
            $payment->amount = $arr['transactions'][0]['amount']['total'];
            $payment->currency = config('app.paypal_currency') ?? env('PAYPAL_CURRENCY');
            $payment->payment_status = $arr['state'];
            $payment->payment_method = 'Paypal';
            $payment->save();
        }
        return $payment;
    }
}
