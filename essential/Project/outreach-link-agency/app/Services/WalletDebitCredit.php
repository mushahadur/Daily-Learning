<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WalletDebitCredit
{
    // This method for wallet credit
    public function credit($request, $payment, $payment_method, $source)
    {
        if ($payment) {
            $wallet = new Wallet();
            $wallet->user_id = Auth::user()->id;
            $wallet->txn_id = time() . rand(10 * 45, 100 * 98);
            $wallet->source = $source;
            $wallet->type = 'credit';
            $wallet->amount = $request->amount;
            $wallet->status = 'completed';
            $wallet->save();

            if (is_null($wallet)) {
                toast('Purchase Failed', 'error');
                return redirect()->back();
            } else {
                return (new InvoiceService())->invoice($wallet->id, $wallet, $payment_method);
            }
        }
        toast('Successfully added balance to your wallet', 'success');
        return true;
    }

    // This method for wallet dabit
    public function debit($request, $payment, $source)
    {
        if ($payment) {
            $wallet = new Wallet();
            $wallet->user_id = Auth::user()->id;
            $wallet->txn_id = time() . rand(10 * 45, 100 * 98);
            $wallet->source = $source;
            $wallet->type = 'debit';
            $wallet->amount = $request->amount;
            $wallet->status = 'completed';
            $wallet->save();

            if (is_null($wallet)) {
                toast('Purchase Failed', 'error');
                return redirect()->back();
            } else {
                return (new InvoiceService())->invoice($request->paymentable_id, $wallet, 'wallet');
            }
        }

        return redirect()->route('wallet.index');
    }

    // Check Current user Balance
    public function check_balance()
    {
        $balance = Wallet::select(DB::raw('SUM(CASE WHEN type = "credit" THEN amount ELSE -amount END) as total'))
            ->where('user_id', Auth::id())
            ->pluck('total')
            ->first();
        return $balance;
    }
}
