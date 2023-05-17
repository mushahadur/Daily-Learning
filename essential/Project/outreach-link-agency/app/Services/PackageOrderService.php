<?php

namespace App\Services;

use App\Models\PackageOrder;

class PackageOrderService
{
    public function packageOrder($request, $payment_method)
    {
        $packageOrder = PackageOrder::where('id', $request->paymentable_id)->first();
        $packageOrder->status = "Waiting for Approval";
        $packageOrder->payment_method = $payment_method;
        $packageOrder->payment_status = 'Paid';
        $packageOrder->update();

        if (!is_null($packageOrder) && $payment_method == 'balance') {
            (new WalletDebitCredit())->debit($request, true, 'Package_order');
        }
        return $packageOrder;
    }
}
