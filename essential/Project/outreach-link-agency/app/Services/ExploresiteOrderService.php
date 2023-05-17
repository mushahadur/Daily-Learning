<?php

namespace App\Services;

use App\Models\ExploreServiceOrder;
use App\Models\Package;

class ExploresiteOrderService
{
    public function exploresiteOrder($request, $payment_method)
    {
        $site_order = ExploreServiceOrder::where('id', $request->paymentable_id)->first();
        if (is_null($request->discount)) {
            $grandtotal = $site_order->grand_total;
        } else {
            $grandtotal = $site_order->grand_total - $request->discount;
        }
        $site_order->status = "Waiting for Approval";
        $site_order->payment_method = $payment_method;
        $site_order->payment_status = 'Paid';
        $site_order->grand_total = $grandtotal;
        $site_order->total_discount = $request->discount;
        $site_order->coupon_id = $request->couponID;
        $site_order->update();

        if (!is_null($site_order) && $payment_method == 'balance') {
            (new WalletDebitCredit())->debit($request, true, 'Site_order');
        }

        return $site_order;
    }
}
