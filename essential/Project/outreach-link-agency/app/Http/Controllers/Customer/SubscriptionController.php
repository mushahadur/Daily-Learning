<?php

namespace App\Http\Controllers\Customer;

use Carbon\Carbon;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Models\SubscribePlan;
use App\Services\InvoiceService;
use App\Services\SubscriberService;
use App\Services\WalletDebitCredit;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PaymentRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\Interfaces\CustomerInterfaces\SubscriptionRepositoryInterface;

class SubscriptionController extends Controller
{
    private $subscriptionRepository;

    public function __construct(SubscriptionRepositoryInterface $subscriptionRepositoryInterface)
    {
        $this->subscriptionRepository = $subscriptionRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscription_plan = $this->subscriptionRepository->all();
        $mysubscription_plan = $this->subscriptionRepository->viewMySubscriptionPlan();
        return view('customer.pages.subscription.index', get_defined_vars());
    }
    /**
     * Display a listing of the resource.
     */
    public function checkout($id)
    {
        $subscription_plan_info = $this->subscriptionRepository->viewData($id);
        $country_list = $this->subscriptionRepository->countryView();
        $paymentable_area = 'subscription_order';
        return view('customer.pages.subscription.checkout', compact('subscription_plan_info', 'country_list', 'paymentable_area'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
