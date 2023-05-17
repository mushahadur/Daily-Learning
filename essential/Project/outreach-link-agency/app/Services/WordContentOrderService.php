<?php

namespace App\Services;

use App\Models\WordContentOrder;

class WordContentOrderService
{
    public function contentOrder($request, $payment_method)
    {
        $word_content_order = WordContentOrder::where('id', $request->paymentable_id)->first();
        $word_content_order->status = "Waiting for Approval";
        $word_content_order->payment_method = $payment_method;
        $word_content_order->payment_status = 'Paid';
        $word_content_order->update();

        if (!is_null($word_content_order) && $payment_method == 'balance') {
            (new WalletDebitCredit())->debit($request, true, 'Content_order');
        }
        return $word_content_order;
    }
}
