@extends('layouts.customer')

@section('title')
    Outreach Link Agency | Checkout page for package
@endsection
@push('style')
    @livewireStyles
@endpush

@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="title" style="font-size: 1.5rem;">
                                Checkout
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card border border-info">
                        <div class="card-header bg-transparent border-info">
                            <h5 class="my-0 fw-bold text-info">Package Order #{{ $package->reference_id }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <h4 class="card-header bg-info text-white">{!! $package->package->name !!}</h4>
                                        <div class="card-body">
                                            <div class="card-text my-2">
                                                {!! $package->package->description !!}
                                                <p class="fw-bold mt-3">
                                                    Price: $ {{ $package->total_price }}
                                                </p>
                                                <p class="fw-bold">

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <livewire:payment-methods :data="$package" :country_list="$country_list" paymentable_type="package_checkout"
                        :paymentable_area="$paymentable_area" />
                    <div id="stripeDiv" style="display: none;">
                        @if (config('app.is_stripe_active') == 1)
                            <div class="row d-flex justify-content-center">
                                <div class="col-12">
                                    <div class="checkout-btn my-3">
                                        <a type="button" class="bg-dark text-white checkout-btn" id="strip-button"><img
                                                src="{{ asset('assets/images/payment-cart/devit-or-credit-cart.svg') }}"
                                                alt="payment-cart"> Pay With Stripe</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div id="stripe-form" style="display:none">
                            <div class="row">
                                <div class="col-12 m-auto px-5">
                                    <div class="stripe-card my-3">
                                        <form method="POST" action="{{ route('stripe.charge') }}" id="payment-form">
                                            @csrf
                                            <div class="row">
                                                <input type="hidden" name="paymentable_area" value="stripe_package_order">
                                                <input type="hidden" name="paymentable_id" value="">
                                                <input type="hidden" name="amount" value="">
                                                <input type="hidden" name="discount" value="">
                                                <input type="hidden" name="couponID" value="">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" placeholder="Name"
                                                            id="name" name="name">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="mb-3">
                                                        <input type="email" class="form-control" placeholder="Email Name"
                                                            id="email" name="email">
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <label for="card-element">
                                                    Credit or debit card
                                                </label>
                                                <div id="card-element">
                                                    <!-- A Stripe Element will be inserted here. -->
                                                </div>
                                                <!-- Used to display form errors. -->
                                                <div id="card-errors" role="alert"></div>
                                            </div>
                                            <div class="stripe-pay-btn mt-4">
                                                <button type="submit" class="btn btn-primary">Pay Now</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    @livewireScripts
    <link rel="stylesheet" href="{{ asset('assets/css/stripe-card.css') }}" />
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var publishable_key = '{{ config('app.stripe_key') ?? env('STRIPE_PUBLISHABLE_KEY') }}';
    </script>
    <script src="{{ asset('assets/js/card.js') }}"></script>
    <script>
        window.addEventListener('stripe', event => {
            if (event.detail == 1) {
                $("#stripeDiv").toggle();
            } else {
                $("#stripeDiv").toggle();
            }
        });
        window.addEventListener('stripeData', event => {
            console.log(event.detail)
            $("input[name='paymentable_id']").val(event.detail.id);
            $("input[name='amount']").val(event.detail.price);
            $("input[name='discount']").val(event.detail.discount);
            $("input[name='couponID']").val(event.detail.couponID);
        });
    </script>
    <script>
        $('#strip-button').click(function() {
            var isHidden = $("#stripe-form").is(":hidden");
            $("#stripe-form").toggle();
            if (isHidden) {
                $('#payment-form').attr('action', '{{ route('stripe.charge') }}');
            }
        })
    </script>
@endpush
