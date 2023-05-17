<?php

namespace App\Services;

use App\Services;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class InvoiceService
{
    public function invoice($invoiceable_id, $collection, $payment_method)
    {
        // dd($invoiceable_id);
        if ($collection['source'] == 'Site_order') {
            $invoiceable_type = 'App\Models\ExploreServiceOrder';
        } elseif ($collection['source'] == 'Subscription') {
            $invoiceable_type = 'App\Models\SubscribePlan';
        } elseif ($collection['source'] == 'Content_order') {
            $invoiceable_type = 'App\Models\WordContentOrder';
        } elseif ($collection['source'] == 'Package_order') {
            $invoiceable_type = 'App\Models\PackageOrder';
        } elseif ($collection['source'] == 'Wallet') {
            $invoiceable_type = 'App\Models\Wallet';
        } else {
            toast('Something Went Wrong', 'error');
            return redirect()->back();
        }

        $invoice = new Invoice();

        $invoice->tnx_id = $collection['txn_id'];
        $invoice->reference_id = 'Inv' . time() . rand(10 * 45, 100 * 98);
        $invoice->user_id = Auth::id();
        $invoice->invoiceable_id = $invoiceable_id;
        $invoice->invoiceable_type = $invoiceable_type;
        $invoice->source = $collection['source'];
        $invoice->type = $collection['type'];
        $invoice->price = $collection['amount'];
        $invoice->status = 'success';
        $invoice->payment_method = $payment_method;
        $invoice->payment_status = 'Paid';
        $invoice->save();

        return true;
    }
}
