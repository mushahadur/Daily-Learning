@extends('layouts.customer')

@section('title')
    Outreach Link Agency | Outreach Link Agency Packages
@endsection

@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-5 text-center">
                    <span class="header-style">Outreach Link Agency Packages</span>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($package as $item)
                            @if ($item->is_active == 1)
                                <div class="col-xl-3 my-4">
                                    <div class="card pricing-box">
                                        <div class="quantity card-body p-4">
                                            <div class="mb-3 text-center"
                                                style="background-color: #6200ee; margin: -25px; padding: 10px">
                                                <h5 class="mb-1" style="color: white">{{ $item->name }}</h5>
                                            </div>
                                            <ul class="list-unstyled plan-features mt-3"
                                                style="padding: 0px 0px 0px 0px; text-align: left; justify-content: center; display: flex;">
                                                <li>{!! $item->description !!}</li>
                                            </ul>
                                            <div class="pb-4 text-center">
                                                <span id="price-{{ $item->id }}" class="priceID"
                                                    style="font-weight: 900; font-size: 20px"><small>$</small>
                                                    {{ $item->price }}</span>
                                            </div>
                                            <form action="{{ route('package-order.redirect', $item->id) }}" method="GET">
                                                <div class="input-group mb-2 mt-0">
                                                    <button
                                                        class="decrement-btn packge-action-button input-group-text font-weight-bold px-3 btn btn-outline-primary"
                                                        data-id="{{ $item->id }}" data-price="{{ $item->price }}"
                                                        style="border-radius: 100% 0 0 100%">-</button>
                                                    <input type="text" class="quantity-input form-control text-center"
                                                        name="quantity" value="{{ $item->initial_quantity }}" readonly>
                                                    <button
                                                        class="increment-btn packge-action-button input-group-text font-weight-bold px-3 btn btn-outline-primary"
                                                        data-id="{{ $item->id }}" data-price="{{ $item->price }}"
                                                        style="border-radius: 0 100% 100% 0"
                                                        value="{{ $item->increment_decrement_quantity }}">+
                                                    </button>
                                                </div>
                                                <div class="text-center plan-btn my-2">
                                                    <button type="submit"
                                                        class="btn btn-otr-primary btn-rounded waves-effect waves-light"
                                                        style="padding: 8px 135px 9px 136px; font-weight: 700">Buy
                                                        Now</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {

            $('.increment-btn').click(function(e) {

                e.preventDefault();
                var packageId = $(this).data('id');
                var packagePrice = $(this).data('price');
                var quantityInput = $(this).parent().find('.quantity-input');
                var incrementID = $(this).parent().find('.increment-btn');
                var quantity = parseInt(quantityInput.val()) + parseInt(incrementID.val());
                var newPrice = (packagePrice / incrementID.val()) * quantity;
                quantityInput.val(quantity);
                $('#price-' + packageId).html('<small>$ </small>' + newPrice);
            });

            $('.decrement-btn').click(function(e) {
                e.preventDefault();
                var packageId = $(this).data('id');
                var packagePrice = $(this).data('price');
                var quantityInput = $(this).parent().find('.quantity-input');
                var incrementID = $(this).parent().find('.increment-btn');
                var quantity = parseInt(quantityInput.val()) - parseInt(incrementID.val());
                if (quantity < parseInt(incrementID.val())) {
                    quantity = parseInt(quantityInput.val());
                }
                var newPrice = (packagePrice / incrementID.val()) * quantity;
                $('#price-' + packageId).html('<small>$ </small>' + newPrice);
                quantityInput.val(quantity);
            });
        });
    </script>
@endpush
