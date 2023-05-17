@extends('layouts.customer')

@section('title')
    Outreach Link Agency | Content Buy Page
@endsection

@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row justify-content-start">
                <div class="row">
                    <div class="col-12 mb-5 text-center">
                        <span class="header-style">Outreach Link Agency Content Packages</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($content as $item)
                            <div class="col-xl-3">
                                <div class="card pricing-box">
                                    <div class="card-body p-4">
                                        <div class="mb-3 text-center"
                                            style="background-color: #6200ee; margin: -25px; padding: 10px">
                                            <h5 class="mb-1" style="color: white">{{ $item->name }}</h5>
                                        </div>
                                        <ul class="list-unstyled plan-features mt-3"
                                            style="padding: 0px 0px 0px 0px; text-align: left; justify-content: center; display: flex;">
                                            <li>{!! $item->description !!}</li>
                                        </ul>
                                        <div class="py-4 text-center">
                                            <span id="price-{{ $item->id }}" class="priceID"
                                                style="font-weight: 900; font-size: 20px"><small>$</small>
                                                {{ $item->price }}</span>
                                        </div>
                                        <form action="{{ route('content-order.redirect', $item->id) }}" method="GET">
                                            <div class="quantity input-group mb-2 mt-0">
                                                <button
                                                    class="decrement-btn packge-action-button input-group-text font-weight-bold px-3 btn btn-outline-primary"
                                                    data-id="{{ $item->id }}" data-price="{{ $item->price }}"
                                                    style="border-radius: 100% 0 0
                                                    100%">-</button>
                                                <input type="text" class="quantity-input form-control text-center"
                                                    name="quantity" value="1" readonly>
                                                <button
                                                    class="increment-btn packge-action-button input-group-text font-weight-bold px-3 btn btn-outline-primary"
                                                    data-id="{{ $item->id }}" data-price="{{ $item->price }}"
                                                    style="border-radius: 0 100% 100% 0">+
                                                </button>
                                            </div>
                                            <div class="text-center plan-btn my-2">
                                                <button type="submit"
                                                    class="btn btn-otr-primary btn-rounded waves-effect waves-light"
                                                    style="padding: 8px 135px 9px 136px; font-weight: 700;">Buy Now</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.increment-btn').click(function(e) {
                e.preventDefault();
                var packageId = $(this).data('id');
                var packagePrice = $(this).data('price');
                var quantityInput = $(this).parent().find('.quantity-input');
                var quantity = parseInt(quantityInput.val()) + 1;
                var newPrice = (packagePrice / 1) * quantity;
                quantityInput.val(quantity);
                $('#price-' + packageId).html('<small>$ </small>' + newPrice);
            });

            $('.decrement-btn').click(function(e) {
                e.preventDefault();
                var packageId = $(this).data('id');
                var packagePrice = $(this).data('price');
                var quantityInput = $(this).parent().find('.quantity-input');
                var quantity = parseInt(quantityInput.val()) - 1;
                if (quantity < 1) {
                    quantity = 1;
                }
                var newPrice = (packagePrice * quantity);
                $('#price-' + packageId).html('<small>$ </small>' + newPrice);
                quantityInput.val(quantity);
            });
        });
    </script>
@endpush
