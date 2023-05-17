@extends('layouts.customer')

@section('title')
    Outreach Link Agency | Package Order View
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 header-style">Package Order View</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row mb-4">
                <div class="col-xl-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="text-muted">
                                <div class="table-responsive mt-4">
                                    <div class="col-xl-12">
                                        <div class="card pricing-box">
                                            <div class="card-body p-4">
                                                <div class="mb-3 text-center"
                                                    style="background-color: #6200ee; margin: -25px; padding: 10px">
                                                    <h5 class="mb-1" style="color: white">
                                                        {{ $packageorder->package->name }}</h5>
                                                </div>
                                                <ul class="list-unstyled plan-features mt-3"
                                                    style="padding: 0px 0px 0px 0px; text-align: left; justify-content: center; display: flex;">
                                                    <li>{!! $packageorder->package->description !!}</li>
                                                </ul>
                                                <div class="py-4 text-center">
                                                    <span class="priceID"
                                                        style="font-weight: 900; font-size: 20px"><small>$</small>
                                                        {{ $packageorder->total_price }}</span>
                                                </div>
                                                <div class="quantity input-group mb-2 mt-0">
                                                    <input type="text" class="quantity-input form-control text-center"
                                                        name="quantity" value="Quantity: {{ $packageorder->quantity }}"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card mb-0">
                        <div class="tab-content p-4">
                            <div class="tab-pane active" id="about" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Topic</th>
                                                <th>Anchor Text (Required)</th>
                                                <th>Landing Page (Required)</th>
                                                <th>Instructions (Not Mandatory)</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($packageOrderDetails as $item)
                                                @foreach ($item->package_order_details as $data)
                                                    <tr>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->topic }}" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->anchor_text }}" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->landing_page }}" readonly>
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" readonly>{{ $data->instruction }}</textarea>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
