<?php

namespace App\Http\Controllers\Admin;

use Response;
use Illuminate\Http\Request;
use App\Models\SubscribePlan;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\SubscribePlanRequest;
use App\Repositories\Interfaces\SubscribePlanRepositoryInterface;

class SubscribePlanController extends Controller
{
    private $subscribePlanRepository;

    public function __construct(SubscribePlanRepositoryInterface $subscribePlanRepositoryInterface)
    {
        $this->subscribePlanRepository = $subscribePlanRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $subscription_plan_list = $this->subscribePlanRepository->all();
        return view('admin.pages.subscription_plan.index', compact('subscription_plan_list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.subscription_plan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscribePlanRequest $request)
    {
        $subscription_plan = SubscribePlan::where('name', $request->name)->exists();
        if ($subscription_plan) {
            Alert::error('error', 'This subscription plan name is already used !');
            return back();
        }
        $this->subscribePlanRepository->storeData($request);
        Alert::success('Congratulation', 'Subscription Plan Successfully Created');
        return redirect(route('subscription-plan.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subscription_plan_info = $this->subscribePlanRepository->viewData($id);
        return Response::json($subscription_plan_info);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subscription_plan = $this->subscribePlanRepository->findById($id);
        return view('admin.pages.subscription_plan.edit', compact('subscription_plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubscribePlanRequest $request, string $id)
    {
        $subscription_plan = SubscribePlan::where('id', $id)->first();
        if ($subscription_plan->name != $request->name) {
            $subscription_plan = SubscribePlan::where('name', $request->name)->exists();
            if ($subscription_plan) {
                Alert::error('error', 'This subscription plan name is already used !');
                return back();
            }
        }
        $this->subscribePlanRepository->updateData($request, $id);
        Alert::success('Congratulation', 'Subscription Plan sunnessfully udpated');
        return redirect(route('subscription-plan.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->subscribePlanRepository->deleteData($id);
            Alert::success('Success', 'Subscription Plan Successfully Deleted');
            return back();
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->getCode();

            if ($errorCode === '23000') {
                // Foreign key constraint violation
                Alert::error('error', 'Cannot delete or update the record due to a foreign key constraint.');
            } else {
                // Other database-related errors
                Alert::error('error', 'An error occurred while processing the request.');
            }
            return back();
        }

    }

    // Package active deactive services
    public function active($id)
    {
        $this->subscribePlanRepository->active($id);
        Alert::success('Success', 'Subscription Plan Successfully Activated');
        return redirect()->back();
    }

    public function deactive($id)
    {
        $active = $this->subscribePlanRepository->deactive($id);
        if (!$active->is_active) {
            Alert::success('Success', 'Subcription Plan successfully deactivated');
            return redirect()->back();
        }
        Alert::warning('Oops !!', 'Subcription Plan is already deactive');
        return redirect()->back();
    }

    public function subscription_list()
    {
        $subscriber_list = $this->subscribePlanRepository->subscriberList();
        return view('admin.pages.subscription_list.index', compact('subscriber_list'));
    }
}
