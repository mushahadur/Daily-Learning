<?php

namespace App\Repositories;

use App\Models\SubscribePlan;
use App\Http\Requests\SubscribePlanRequest;
use App\Models\Subscriber;
use App\Repositories\Interfaces\SubscribePlanRepositoryInterface;

class SubscribePlanRepository implements SubscribePlanRepositoryInterface
{
    public function all()
    {
        return SubscribePlan::orderBy('created_at', 'ASC')->get();
    }

    public function findById($id)
    {
        return SubscribePlan::findOrFail($id);
    }

    public function storeData($request)
    {
        return SubscribePlan::create($request->validated());
    }

    public function viewData($id)
    {
        $subscription_plan_info = $this->findById($id);
        return $subscription_plan_info;
    }

    public function updateData($request, $id)
    {
        $subscription_plan = $this->findById($id);
        return $subscription_plan->update($request->validated());
    }

    public function deleteData($id)
    {
        $subscription_plan = $this->findById($id)->delete();
        return $subscription_plan;
    }

    public function active($id)
    {
        $active = SubscribePlan::where('id', $id)->first();
        if ($active->is_active == 0) {
            $active->is_active = 1;
            $active->save();
        }
    }

    public function deactive($id)
    {
        $active = $this->findById($id);
        if ($active->is_active == 1) {
            $active->is_active = 0;
            $active->save();
        }
        return $active;
    }

    public function subscriberList()
    {
        return Subscriber::all();
    }

}