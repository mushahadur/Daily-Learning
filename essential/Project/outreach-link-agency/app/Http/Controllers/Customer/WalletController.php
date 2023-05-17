<?php

namespace App\Http\Controllers\Customer;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ExploreCountryRepository;

use function PHPUnit\Framework\isNull;

class WalletController extends Controller
{
    public function index()
    {
        // $test = config('mail.username');
        // dd($test);
        $wallet_list = Wallet::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        // dd($wallet_list);

        $balance = Wallet::select(DB::raw('SUM(CASE WHEN type = "credit" THEN amount ELSE -amount END) as total'))
            ->where('user_id', Auth::id())
            ->pluck('total')
            ->first();

        // Get the sum of all debit transactions
        $spending = Wallet::where('type', 'debit')
            ->select(DB::raw('SUM(amount) as total'))
            ->where('user_id', Auth::id())
            ->pluck('total')
            ->first();
        // dd($spending);
        return view('customer.pages.wallet.index', compact('wallet_list', 'balance', 'spending'));
    }

    public function create()
    {
        $country_list = (new ExploreCountryRepository)->pluckById();
        return view('customer.pages.wallet.create', compact('country_list'));
    }
}
