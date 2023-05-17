@extends('layouts.app')

@section('title')
    Outreach Link Agency | Coupon Create Page
@endsection

@push('css')
    <!-- select2 css -->
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="{{ asset('assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Coupon Create Page</span>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <form action="{{ route('coupon.store') }}" method="POST">
                    @csrf
                    <div class="col-xl-6">
                        <div class="custom-accordion">
                            <div class="card">
                                <a href="#checkout-billinginfo-collapse" class="text-dark" data-bs-toggle="collapse">
                                    <div class="p-4">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <i class="mdi mdi-file-percent text-primary h2"></i>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-16 mb-1">Coupon Information</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                                <div id="checkout-billinginfo-collapse" class="collapse show">
                                    <div class="p-4 border-top">
                                        <form>
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <form name="randform">
                                                            <label class="form-label" for="tb">Coupon code</label>
                                                            <div class="mb-3 mb-4 d-flex">
                                                                <input type="text" name="couponId_generate"
                                                                    class="form-control" style="margin-right: 40px"
                                                                    id="tb" placeholder="E.G. 45OFF">
                                                                <button type="button" class="btn btn-otr-primary"
                                                                    onclick="randomString();">Generate</button>
                                                            </div>
                                                            @error('couponId_generate')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label" for="billing-address">Description</label>
                                                    <textarea class="form-control" name="description" id="billing-address" rows="3" placeholder="type anything..."></textarea>
                                                    <span>Not visible to clients, helps you remember what the coupon is
                                                        for.</span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <a href="#checkout-shippinginfo-collapse" class="collapsed text-dark"
                                    data-bs-toggle="collapse">
                                    <div class="p-4">

                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <i class="mdi mdi-sack-percent text-primary h2"></i>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-16 mb-1">Discount Info</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                            </div>
                                        </div>

                                    </div>
                                </a>

                                <div id="checkout-shippinginfo-collapse" class="collapse">
                                    <div class="p-4 border-top">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3 mb-4">
                                                    <label class="form-label" for="billing-name">Discount type</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="discount_type"
                                                            id="formRadios1" value="Fixed Amount">
                                                        <label class="form-check-label" for="formRadios1">
                                                            Fixed Amount
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="discount_type"
                                                            id="formRadios2" value="Percentage">
                                                        <label class="form-check-label" for="formRadios2">
                                                            Percentage
                                                        </label>
                                                    </div>
                                                    @error('discount_type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table class="table table-striped mb-0">

                                                    <thead>
                                                        <tr>
                                                            <th>Applies for...</th>
                                                            <th>Discount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="container">
                                                        <tr>
                                                            <td>
                                                                <select class="form-control select2-multiple dynamicSelect"
                                                                    name="explore_site[]" id="exploreSiteID">
                                                                    <option>Select</option>
                                                                    <option value="All Services">All Services
                                                                    </option>
                                                                    @foreach ($exploresite as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->site_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger">
                                                                    {{ $errors->first('explore_site[]') }}
                                                                </span>
                                                            </td>

                                                            <td>
                                                                <input type="number" class="form-control price-input"
                                                                    placeholder="0.00">
                                                                @error('price')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-9">

                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3 mb-4">
                                                    <a type="button" style="color: #896cfe; font-weight: 900"
                                                        id="discountTable"> <i class="uii uil-plus"></i>
                                                        Add Discount</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <a href="#checkout-paymentinfo-collapse" class="collapsed text-dark"
                                    data-bs-toggle="collapse">
                                    <div class="p-4">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <i class="mdi mdi-label-percent text-primary h2"></i>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-16 mb-1">Redemption Section</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                            </div>
                                        </div>

                                    </div>
                                </a>

                                <div id="checkout-paymentinfo-collapse" class="collapse">
                                    <div class="p-4 border-top">
                                        <div>
                                            <h5 class="font-size-14 mb-3">Redemption limits </h5>
                                            <div class="row">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="formCheck1"
                                                        name="limit_to_one_use_per_customer"
                                                        value="Limit to one use per customer">
                                                    <label class="form-check-label" for="formCheck1">
                                                        Limit to one use per customer
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="myCheck"
                                                        onclick="myFunction()" name="set_expiry_date"
                                                        value="Set expiry date">
                                                    <label class="form-check-label" for="myCheck">
                                                        Set expiry date
                                                    </label>
                                                </div>
                                                <div class="row" id="text" style="display: none;">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3 mt-2 d-flex">
                                                            <input type="date" name="expiry_date" class="form-control"
                                                                style="margin-right: 40px" id="tb"
                                                                placeholder="Never Expires">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row my-4">
                            <div class="col">
                                <div class="text-end mt-2 mt-sm-0">
                                    <button type="submit" class="btn btn-otr-primary">
                                        <i class="uil uil-focus-add me-1"></i> Create Coupon </button>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row-->
                    </div>
                </form>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection

@push('script')
    <!-- select 2 plugin -->
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

    <!-- dropzone plugin -->
    <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>
    <!-- init js -->
    <script src="{{ asset('assets/js/pages/ecommerce-add-product.init.js') }}"></script>
    <script>
        // Generate Coupon code
        function randomString() {
            var rnd = Math.random().toString(36).toUpperCase().slice(2, 9);
            document.getElementById('tb').value = rnd;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $(document).ready(function() {

            $('#discountTable').click(function(e) {

                $.ajax({

                    url: "{{ route('exploresite.service') }}",
                    type: "POST",
                    success: function(data) {
                        var options = "";
                        $.each(data.exploresitejsondata, function(index, exploresitejsondata) {
                            options += '<option value="' + exploresitejsondata.id +
                                '">' + exploresitejsondata.site_name + '</option>';
                        });
                        $('#container').append(`
                            <tr>
                            <td>
                                <select class="form-control select2-multiple dynamicSelect" name="explore_site[]">
                                    <option>Select</option>
                                    <option value="All Services">All Services</option>
                                    ${options}
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control price-input" placeholder="0.00">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger remove-tr" title="Delete"><i class="fa fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        `);
                    }
                })
            });

            $('#container').on('change', '.dynamicSelect', function() {
                var selectedValue = $(this).val();
                var priceInput = $(this).closest('td').siblings().find('.price-input');
                priceInput.attr("name", "price[" + selectedValue + "]");
                // console.log(priceInput);
            });
        });


        function myFunction() {
            var checkBox = document.getElementById("myCheck");
            var text = document.getElementById("text");
            if (checkBox.checked == true) {
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }

        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endpush
