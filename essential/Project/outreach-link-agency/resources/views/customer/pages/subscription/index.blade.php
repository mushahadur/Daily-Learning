@extends('layouts.customer')

@section('title')
    Outreach Link Agency | Subscription Plan
@endsection

@section('dashboard')
    <div class="page-content subscription">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="border-0" style="padding: 15px 10px 0px 10px">
                                <h2 class="text-primary text-center mb-2">OutreachLinkAgency’s Subscription Services</h2>
                                
                                <span class="font-size-14">
                                    <p class="mt-3">
                                        <b>Each and every SEO or Digital Marketing Agency is on the hunt for publishers and websites that can assist them in link building and guest posting.
                                        However, the task of locating niche publishers, deciphering their service rates, and orchestrating campaigns is anything but simple.
                                        It's a process that demands a significant amount of time, work, and financial investment.</b>
                                    </p>
                                </span>
    
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                                            <span class="fs-5 mt-2 font-size-14">
                                                <span>
                                                    <b>However, with a subscription to OutreachLinkAgency, you can leverage the expertise of our Outreach Team Specialists to your advantage By simply opting
                                                    for our monthly or yearly subscription, you gain unrestricted access to our extensive database, thereby drastically reducing your time, effort,
                                                    and investment. As a subscriber to our services, you will have:</b>
                                                </span>
                                                <ul style="font-weight: 900; margin-top: 10px">
                                                    <li>i. Unlimited search options within our database</li>
                                                    <li>ii. Up-to-date SEO metrics for each publisher listed in the database</li>
                                                    <li>iii. Full access to every site and their specific details</li>
                                                    <li>iv. Freedom to explore as many domains as you wish, with no restrictions</li>
                                                </ul>
                                                <b class="font-size-14">Our Outreach Team continually brings new publishers on board, spanning various niches, metrics, and price ranges.
                                                    Every week, you'll receive email notifications about the fresh sites added by our skilled outreach professionals.
                                                    This keeps you in the loop about new sites to explore each week.</b>
    
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="d-flex justify-content-center">
                                <button class="btn" type="button" data-bs-toggle="collapse"
                                    data-bs-target=".multi-collapse" aria-expanded="false"
                                    aria-controls="multiCollapseExample1 multiCollapseExample2"
                                    style="color: #55729e; font-size: 16px">
                                    <i class="fas fa-chevron-circle-down"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @if (empty($errors->first('payment_successfull')))
                {{-- Nothig to show error --}}
                @else
                <div class="badge-success mb-2 fs-5"><i class="uil-check-square"></i> {{{ $errors->first('payment_successfull') }}}</div>
            @endif
            @if (empty($errors->first('subscription_updated')))
                {{-- Nothig to show error --}}
                @else
                <div class="badge-success mb-2 fs-5"><i class="uil-check-square"></i> {{{ $errors->first('subscription_updated') }}}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-body">
                        @if ($mysubscription_plan)
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="active-plan">
                                        <h2>Active Plan</h2>
                                        <h5>This is your active plan on your profile </h5>
                                        <h5>You can buy other plan to upgrade your account </h5>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="active-plan-details p-3">
                                        <div class="d-flex justify-content-between">
                                            <h2 class="text-primary">{{ $mysubscription_plan->name }}</h2>
                                            <h2 class="text-primary">$ {{ $mysubscription_plan->price }}/{{ $mysubscription_plan->validity }} </h2>
                                        </div>
                                        @if ($mysubscription_plan->name == 'Basic Plan')
                                            <ul>
                                                <li>Started: {{ Carbon\Carbon::now() }}</li>
                                                <li>Ends: {{ date('Y-m-d H:m:s', strtotime(Carbon\Carbon::now() . " +1 month") ) }} (For next one month)</li>
                                            </ul>
                                            @else
                                            <ul>
                                                <li>Started: {{ App\Models\Subscriber::where('user_id', Auth::user()->id)->first()->updated_at }}</li>
                                                <li>Ends: {{ App\Models\Subscriber::where('user_id', Auth::user()->id)->first()->active_until }} ($ {{ $mysubscription_plan->price }}/{{ $mysubscription_plan->validity }})</li>
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @else
                        @endif
                    </div>
                </div>
            </div>
            <!-- Subscription plan box -->
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <h2 class="text-primary text-center my-3">OutreachLinkAgency’s Subscription Plan Details</h2>
                    <div class="row my-3 mt-4">
                        @forelse ($subscription_plan as $item)
                            <div class="col-xl-3 my-2">
                                <div class="card pricing-box" style="height: 100% !important;">
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <div class="mt-3">
                                                <h5 class="mb-4">{{ $item->name }}</h5>
                                            </div>
                                        </div>
                                        <ul class="list-unstyled plan-features mt-4 text-start">
                                            {!! $item->description !!}
                                        </ul>
                                        @if ($item->validity)
                                            <p class="fw-bold mt-3">
                                                Validity: {{ $item->validity }}
                                            </p>
                                        @endif
                                        <div class="py-3 text-center">
                                            <h3><sup><small>$</small></sup> {{ $item->price }}/ <span class="font-size-13 text-muted">{{ $item->validity }}</span></h3>
                                        </div>

                                        <div class="text-center subscription-plan-btn my-2">
                                            <a href="{{ route('subscription.checkout', $item->id) }}" class="btn btn-primary waves-effect waves-light @if ($item->price < 1) btn btn-success disabled @else @endif">
                                                @if ($item->price < 1)
                                                    Free Plan
                                                    @else
                                                    Buy at $ {{ $item->price }}
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p class="badge badge-danger text-danger fs-6">There is no subscription plan</p>
                        @endforelse
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
@endsection
@push('script')
    <script>
        function viewTextFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("moreText");
            var viewTextBtn = document.getElementById("viewTextBtn");

            if (dots.style.display === "none") {
            dots.style.display = "inline";
            viewTextBtn.innerHTML = "view more";
            moreText.style.display = "none";
            } else {
            dots.style.display = "none";
            viewTextBtn.innerHTML = "show less";
            moreText.style.display = "inline";
            }
        }
    </script>
@endpush
