<div>
    <form action="{{ route('payment.order') }}" method="POST">
        @csrf
        @if (empty($errors->first('something_wrong')))
            {{-- Nothig to show error --}}
            @else
            <div class="badge-danger mb-3 fs-5"><i class="uil-info-circle text-danger fs-5"></i> {{{ $errors->first('something_wrong') }}}</div>
        @endif
        <div class="card">
            <div class="card-body">
                <h4 class="form-check-label text-secondary ms-2 pe-none" for="closeButton">Payable Amount: <span class="text-primary">${{ $data->price ?? 'Null' }}</span></h4>
                <input type="hidden" name="amount" value="{{ $data->price }}">
                <input type="hidden" name="paymentable_id" value="{{ $data->id }}">
                <input type="hidden" name="paymentable_area" value="{{ $paymentable_area }}">
                <input type="hidden" name="discount" value="{{ $discount }}">
                <input type="hidden" name="couponID" value="{{ $couponID }}">
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-check">
                    <input wire:model="payment_method" type="radio" class="form-check-input input-mini" id="closeButton" value="1" name="payment_method" id="flexRadioDefault1" style="width: 1.3em; height: 1.3em;">
                    <h4 class="form-check-label text-primary ms-2" for="flexRadioDefault1">Balance <span class="text-secondary">(${{ $current_balance ?? '00.00' }})</span></h4>
                </div>
            </div>
        </div>
        @if (empty($errors->first('balance_low')))
            {{-- Nothig to show balance error --}}
            @else
            <div class="badge-danger mb-3 fs-5"><i class="uil-info-circle text-danger fs-5"></i> {{{ $errors->first('balance_low') }}} <a href="{{ route('wallet.create') }}">Add Funds</a></div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="form-check">
                    <input wire:model="payment_method" type="radio" class="form-check-input input-mini pay-with-paypal" id="closeButton" value="2" name="payment_method" id="flexRadioDefault2" style="width: 1.3em; height: 1.3em;">
                    <h4 class="form-check-label text-primary ms-2" for="flexRadioDefault2">Pay with Paypal or Stripe</h4>
                </div>
            </div>
        </div>
        @if ($paymentable_type == 'explore_site_checkout')
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3 d-flex">
                    <input type="text" name="coupon"
                        class="form-control" style="margin-right: 40px"
                        id="tb" placeholder="E.G. 45OFF" wire:model="couponInput">
                    <button type="button" class="btn btn-outline-warning waves-effect waves-light w-lg" style="font-weight: 900" wire:click="couponApply">Apply Coupon</button>
                </div>
                @if($is_errorMessage)
                    <div class="badge-danger mb-3"><i class="uil-info-circle text-danger"></i> {{ $errorMessage }}</div>
                @endif
                @error('couponInput')
                    <div class="badge-danger mb-3"><i class="uil-info-circle text-danger"></i> {{ $message }}</div>
                @enderror
            </div>
        </div>
        @endif
        @error('payment_method')
            <div class="badge-danger mb-3 fs-5"><i class="uil-info-circle text-danger fs-5"></i> {{ $message }}</div>
        @enderror
        @if ($payment_method == 1)
            <div class="card">
                <div class="card-body">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text border-primary bg-primary text-white fs-5" for="inputGroupSelect01">Country </label>
                        </div>
                        <select class="custom-select form-control fs-5" id="inputGroupSelect01" name="country_id">
                            <option value="">Select One...</option>
                            @foreach ($country_list as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        @endif
        @error('country_id')
            <div class="badge-danger mb-3 fs-5"><i class="uil-info-circle text-danger fs-5"></i> {{ $message }}</div>
        @enderror
        @if ($payment_method == 1)
            <div class="checkout-btn">
                <button type="submit" class="">Order Now</button>
            </div>
        @endif
    </form>
    @if ($payment_method == 2)
        <div class="paypal-payment">
            <form method="POST" action="{{ route('payment') }}">
                @csrf
                @if ($payment_method == 2)
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" name="payment_method" value="{{ $payment_method }}">
                            <input type="hidden" name="paymentable_id" value="{{ $data->id }}">
                            <input type="hidden" name="paymentable_area" value="{{ $paymentable_area }}">
                            <input type="hidden" name="amount" value="{{ $data->price }}">
                            <input type="hidden" name="discount" value="{{ $discount }}">
                            <input type="hidden" name="couponID" value="{{ $couponID }}">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text border-primary bg-primary text-white fs-5" for="inputGroupSelect01">Country </label>
                                </div>
                                <select class="custom-select form-control fs-5" id="inputGroupSelect01" name="country_id">
                                    <option value="">Select One...</option>
                                    @foreach ($country_list as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                @endif
                @if (config('app.is_paypal_active') == 1)
                    <div class="checkout-btn mt-3">
                        <button type="submit" class="text-dark" style="background: #ffff00d1;"><img src="{{ asset('assets/images/payment-cart/paypal.svg') }}" alt="payment-cart"> Checkout</button>
                    </div>
                @endif
            </form>
            {{-- <div class="checkout-btn my-3">
                <button wire:click="showCard" id="strip-button" type="submit" class="bg-dark text-white"><img src="{{ asset('assets/images/payment-cart/devit-or-credit-cart.svg') }}" alt="payment-cart"> Debit or Credit Card</button>
            </div>
            {{-- @if ($show_card)
                <div class="row">
                    <div class="col-lg-8 m-auto">
                        <div class="stripe-card my-3">
                            <form method="POST" action="">
                                <div id="stripe-form">
                                    <div class="row">
                                        <div class="col-lg-10 m-auto">
                                            <div class="stripe-card my-3">
                                                    <div class="row">
                                                        <input type="hidden" name="paymentable_area" value="stripe_wallet">
                                                        <div class="col-6">
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" placeholder="Name" id="name" name="name">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                            <input type="email" class="form-control" placeholder="Email Name" id="email" name="email">
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
                    </div>
                </div>
            @endif --}}
            {{-- <p class="text-center mt-3"><i>Powered by</i> <img width="60px" src="{{ asset('assets/images/payment-cart/paypal.svg') }}" alt="payment-cart"></p> --}}
        </div>
    @endif
</div>
