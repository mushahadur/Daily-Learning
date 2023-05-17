@extends('layouts.customer')

@section('title')
    Outreach Link Agency | Add Money to Wallet
@endsection

@push('style')
    <!-- select2 css -->
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="page-content subscription">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Add money to your wallet</span>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Adding funds to you BloggerOutreach wallet is a fast, simple and secure
                                process. You will be able to purchase services like Guest post, Link insertion and Content
                                Writing through your wallet money</h5>
                            <div class="row mt-4 d-flex justify-content-center">
                                <div class="col-md-6">
                                    <img src="{{ asset('assets/images/Payment-Checkout.png') }}" alt="" class="img-fluid">
                                </div>
                                <div class="col-md-6 align-self-center">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-active" role="tablist">
                                        @if (config('app.is_paypal_active') == 1)
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#navtabs-home" role="tab">
                                                <span class="text-center text-truncate">
                                                    <i class="bx bxl-paypal d-block h2 mb-3"></i>
                                                    Paypal
                                                </span>
                                            </a>
                                        </li>
                                        @endif
                                        @if (config('app.is_stripe_active') == 1)
                                            <li class="nav-item">
                                                <a class="nav-link @if (config('app.is_paypal_active') != 1) active @endif" data-bs-toggle="tab" href="#navtabs-profile" role="tab">
                                                    <span class="text-center text-truncate">
                                                        <i class="bx bxl-stripe d-block h2 mb-3"></i>
                                                        Stripe
                                                    </span>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content p-3 text-muted">
                                        @if (config('app.is_paypal_active') == 1)
                                        <div class="tab-pane @if (config('app.is_stripe_active') != 1 || config('app.is_paypal_active') == 1) active @endif" id="navtabs-home" role="tabpanel">
                                            <form method="POST" action="{{ route('wallet.payment') }}" id="paypal-form">
                                                @csrf
                                                <div class="wallet-form-group">
                                                    <div class="row d-flex">
                                                        <div class="col-sm-10 mb-3">
                                                            <div class="input-group flex-nowrap">
                                                                <span class="input-group-text" id="addon-wrapping">$</span>
                                                                <input type="number" class="form-control" value="100" name="amount" placeholder="Amount" aria-label="Username" aria-describedby="addon-wrapping"><br>
                                                                    @error('amount')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                            </div>
                                                            <small id="deposit-help" class="text-muted d-block mt-2"> Deposit amount <span class="font-weight-bold">(Minimum 50 USD)</span></small>
                                                            @if (empty($errors->first('min_deposit_error')))
                                                                {{-- Nothig to show error --}}
                                                                @else
                                                                <div class="badge-danger mt-3 fs-5"><i class="uil-info-circle text-danger"></i> {{{ $errors->first('min_deposit_error') }}}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wallet-form-group">
                                                    <div class="row d-flex">
                                                        <div class="col-sm-10 mb-3">
                                                            {!! Form::label('country_id', 'Country') !!}
                                                            {{ Form::select('country_id', $country_list, null, ['class' => 'select2', 'data-placeholder' => 'Choose your country']) }}
                                                            <span class="text-danger">
                                                                {{ $errors->first('country_id') }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex">
                                                    <div class="col-sm-10">
                                                        <div class="checkout-btn my-3">
                                                            <button type="submit" class="text-dark" style="background: #ffff00d1;"><img src="{{ asset('assets/images/payment-cart/paypal.svg') }}" alt="payment-cart"> Checkout</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        @endif
                                        @if (config('app.is_stripe_active') == 1)
                                        <div class="tab-pane @if (config('app.is_stripe_active') == 1 && config('app.is_paypal_active') != 1) active @endif" id="navtabs-profile" role="tabpanel">
                                            <form method="POST" action="{{ route('stripe.charge') }}" id="payment-form">
                                                @csrf
                                                <div id="stripe-form">
                                                    <div class="row">
                                                        <div class="col-lg-10">
                                                            <div class="stripe-card my-3">
                                                                    <div class="row">
                                                                        <input type="hidden" name="paymentable_area" value="stripe_wallet">
                                                                        <div class="row wallet-form-group">
                                                                            <div class="col-12">
                                                                                <div class="input-group flex-nowrap">
                                                                                    <span class="input-group-text" id="addon-wrapping">$</span>
                                                                                    <input type="number" class="form-control" value="100" name="amount" placeholder="Amount" aria-label="Username" aria-describedby="addon-wrapping"><br>
                                                                                        @error('amount')
                                                                                            <span class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                </div>
                                                                                <small id="deposit-help" class="text-muted d-block mt-2"> Deposit amount <span class="font-weight-bold">(Minimum 50 USD)</span></small>
                                                                                @if (empty($errors->first('min_deposit_error')))
                                                                                    {{-- Nothig to show error --}}
                                                                                    @else
                                                                                    <div class="badge-danger mt-3 fs-5"><i class="uil-info-circle text-danger"></i> {{{ $errors->first('min_deposit_error') }}}</div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="mb-3">
                                                                                <input type="text" class="form-control" placeholder="Name" id="name" name="name">
                                                                                @error('name')
                                                                                    <span class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="mb-3">
                                                                            <input type="email" class="form-control" placeholder="Email Name" id="email" name="email">
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!--Stripe Payment -->
                                {{-- <div class="row d-flex justify-content-center">
                                    <div class="col-sm-10">
                                        <div class="checkout-btn my-3">
                                            <a type="button" class="bg-dark text-white" id="strip-button"><img src="{{ asset('assets/images/payment-cart/devit-or-credit-cart.svg') }}" alt="payment-cart"> Pay With Stripe</a>
                                        </div>
                                    </div>
                                </div> --}}
                            <!--End Stripe Payment -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    @include('components.select2-script');
    <link rel="stylesheet" href="{{ asset('assets/css/stripe-card.css') }}" />
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var publishable_key = '{{ config("app.stripe_key") ?? env('STRIPE_PUBLISHABLE_KEY') }}';
    </script>
    <script src="{{ asset('assets/js/card.js') }}"></script>
@endpush
