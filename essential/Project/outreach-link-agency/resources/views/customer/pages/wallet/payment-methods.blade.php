<div class="paypal-payment">
    <form method="get" action="{{ route('test') }}">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text border-primary bg-primary text-white fs-5"
                            for="inputGroupSelect01">Country </label>
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
        <div class="checkout-btn my-3">
            <button type="submit" class="text-dark" style="background: #ffff00d1;"><img
                    src="{{ asset('assets/images/payment-cart/paypal.svg') }}" alt="payment-cart"> Checkout</button>
        </div>
    </form>
    <div class="checkout-btn my-3">
        <button wire:click="showCard" type="submit" class="bg-dark text-white"><img
                src="{{ asset('assets/images/payment-cart/devit-or-credit-cart.svg') }}" alt="payment-cart"> Debit or
            Credit Card</button>
    </div>
    {{-- @if ($show_card)
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="stripe-card my-3">
                    <form method="POST" action="">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <input type="number" class="form-control" placeholder="Card number"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" name="card_number">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Expires"
                                        id="exampleInputPassword1" name="expires">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <input type="number" class="form-control" placeholder="CSV"
                                        id="exampleInputPassword1" name="csv_number">
                                </div>
                            </div>
                            <h5>Billing Address</h5>
                            <div class="col-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="First Name"
                                        id="exampleInputPassword1" name="first_name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Last Name"
                                        id="exampleInputPassword1" name="last_name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Zip Code"
                                        id="exampleInputPassword1" name="zip_code">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Mobile No."
                                        id="exampleInputPassword1" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="stripe-pay-btn">
                            <button type="submit" class="btn btn-primary">Pay Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif --}}
    <p class="text-center mt-3"><i>Powered by</i> <img width="60px"
            src="{{ asset('assets/images/payment-cart/paypal.svg') }}" alt="payment-cart"></p>
</div>
