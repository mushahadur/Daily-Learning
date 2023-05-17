<?php

namespace App\Services;

use Omnipay\Omnipay;

class OmnipayInitialize
{
    public function __invoke()
    {
        $gateway = Omnipay::create('PayPal_Rest');
        $gateway->setClientId(config('app.paypal_client_id') ?? env('PAYPAL_CLIENT_ID'));
        $gateway->setSecret(config('app.paypal_client_secret') ?? env('PAYPAL_CLIENT_SECRET'));
        $gateway->setTestMode(config('app.paypal_test_mode') ?? env('PAYPAL_TEST_MODE'));
        return $gateway;
    }
}
