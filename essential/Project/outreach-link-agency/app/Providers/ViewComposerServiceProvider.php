<?php

namespace App\Providers;

use App\Models\Wallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['customer.pages.wallet.index', 'customer.pages.explore_site.index', 'customer.components.header', 'livewire.payment-methods'], function($view){
            $current_balance = Wallet::select(DB::raw('SUM(CASE WHEN type = "credit" THEN amount ELSE -amount END) as total'))
                ->where('user_id', Auth::id())
                ->pluck('total')
                ->first();
            if (is_null($current_balance)) {
                $lowbalance = true;
            } elseif ($current_balance < 50) {
                $lowbalance = true;
            } else {
                $lowbalance = false;
            }
            $view->with('lowbalance', $lowbalance);
            $view->with('current_balance', $current_balance);
        });

    }
}
