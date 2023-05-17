<?php

namespace App\Repositories\CustomerRepository;

use App\Models\SubscribePlan;
// use SubscriptionRepositoryInterface;
use App\Http\Requests\SubscribePlanRequest;
use App\Models\ExploreCountry;
use App\Models\Subscriber;
use App\Repositories\Interfaces\CustomerInterfaces\SubscriptionRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class SubscriptionRepository implements SubscriptionRepositoryInterface
{
    public function all()
    {
        return SubscribePlan::where('is_active', 1)->orderBy('created_at', 'ASC')->get();
    }

    public function findById($id)
    {
        return SubscribePlan::findOrFail($id);
    }

    public function viewData($id)
    {
        $subscription_plan_info = $this->findById($id);
        return $subscription_plan_info;
    }

    public function countryView(){
        $country_list = ExploreCountry::all();
        return $country_list;
    }

    public function viewMySubscriptionPlan(){
        $subscription_checking = Subscriber::where('user_id', Auth::user()->id)->first();
        if (!empty($subscription_checking)) {
            return $mysubscription_plan = SubscribePlan::where('id', $subscription_checking->plan_id)->first();
        }
        else{
            return $mysubscription_plan = '';
        }
    }

    
}