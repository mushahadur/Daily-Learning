<?php

namespace App\Services;

use App\Models\SubscribePlan;
use Carbon\Carbon;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\Interfaces\CustomerInterfaces\SubscriptionRepositoryInterface;

class SubscriberService
{
    public function addSubscriber($request, $subscription_plan_info, $payment_method)
    {
        // make subscription plan time
        $subscription_checking = Subscriber::where('user_id', Auth::user()->id)->first();
        if (empty($subscription_checking)) {
            $until_active_time = Carbon::now();
        } else {
            $until_active_time = $subscription_checking->active_until;
        }

        // Get subscription plan monthly or yearly
        if ($subscription_plan_info->validity == 'Monthly') {
            $until_active_time = date('Y-m-d H:m:s', strtotime($until_active_time . " +1 month"));
        } elseif ($subscription_plan_info->validity == 'Yearly') {
            $until_active_time = date('Y-m-d H:m:s', strtotime($until_active_time . " +1 year"));
        }

        // Already subscription checking
        if (empty($subscription_checking)) {
            $subscription = Subscriber::create($request->except('_token', 'status') + [
                'user_id' => Auth::user()->id,
                'active_until' => $until_active_time,
                'country_id' => $request->country_id,
                'payment_gateway' => $payment_method,
                'status' => 1,
            ]);

            if (!is_null($subscription) && $payment_method == 'balance') {
                (new WalletDebitCredit())->debit($request, true, 'Subscription');
            }

            // toast('Your subscription plan Updated', 'success');
            // return Redirect::route('subscription.index')->withErrors(['subscription_updated' => 'Your subscription plan Updated']);
            return $subscription;
        } else {
            $subscription = Subscriber::where('user_id', Auth::user()->id)->first();
            $subscription->plan_id = $request->paymentable_id;
            $subscription->country_id = $request->country_id;
            $subscription->active_until = $until_active_time;
            $subscription->payment_gateway = $payment_method;
            $subscription->status = 1;
            $subscription->update();

            if (!is_null($subscription) && $payment_method == 'balance') {
                (new WalletDebitCredit())->debit($request, true, 'Subscription');
            }

            return $subscription;
            // toast('Your subscription plan Updated', 'success');
            // return redirect()->route('subscription.index')->withErrors(['subscription_updated' => 'Your subscription plan Updated']);
        }
    }
}
