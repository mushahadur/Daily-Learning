@extends('layouts.app')

@section('title')
    Outreach Link Agency | View Details (Invoice)
@endsection

@section('content')
    <div class="page-content" id="explore-site-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Invoice Details</span>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="invoice-title">
                                <h4 class="float-end font-size-16">Invoice: #{{ $invoice->reference_id }} <span
                                        class="badge bg-success font-size-12 ms-2">{{ $invoice->payment_status }}</span>
                                </h4>
                                <div class="mb-4">
                                    <img src="{{ asset('assets/images/logo.png') }}" alt="logo" height="22" />
                                </div>
                                <div class="text-muted">
                                    <p class="mb-1">Tropical Alauddin Tower, Road #02 , Sector #03, Rajlaxmi Uttara,
                                        Dhaka- 1230</p>
                                    <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i>info@bitchipdigital.com</p>
                                    <p><i class="uil uil-phone me-1"></i>(+880) 01315-083437</p>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-muted">
                                        <h5 class="font-size-16 mb-3">Billed To:</h5>
                                        <h5 class="font-size-15 mb-2">{{ $invoice->user->name }}</h5>
                                        @if (!is_null($invoice->user->address))
                                            <p class="mb-1">{{ $invoice->user->address }}</p>
                                        @endif
                                        <p class="mb-1">{{ $invoice->user->email }}</p>
                                        @if (!is_null($invoice->user->phone))
                                            <p>{{ $invoice->user->phone }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-muted text-sm-end">
                                        <div>
                                            <h5 class="font-size-16 mb-1">Invoice No:</h5>
                                            <p>#{{ $invoice->reference_id }}</p>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-16 mb-1">Invoice Date:</h5>
                                            <p>{{ Carbon\Carbon::parse($invoice->created_at)->format('d M Y') }}</p>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-16 mb-1">Order No:</h5>
                                            <p>#{{ $invoice->invoiceable_id }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2">
                                <h5 class="font-size-15">Order summary</h5>
                                <div class="table-responsive">
                                    <table class="table table-nowrap table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th style="width: 70px;">TXN ID</th>
                                                <th>Narration</th>
                                                <th>Price</th>
                                                <th>Payment From</th>
                                                <th class="text-end" style="width: 120px;">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $invoice->tnx_id }}</td>
                                                <td>{{ strpos($invoice->source, '_') !== false ? ucwords(strtolower(str_replace('_', ' ', $invoice->source))) : ucwords(strtolower($invoice->source)) }}
                                                </td>
                                                <td>{{ $invoice->price }}</td>
                                                <td>{{ ucwords($invoice->payment_method) }}</td>
                                                <td class="text-end">${{ $invoice->price }}</td>
                                            </tr>


                                            <tr>
                                                <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                                <td class="text-end">${{ $invoice->price }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end">
                                                    Discount :</th>

                                                @if (isset($invoice->invoiceable->total_discount) && !is_null($invoice->invoiceable->total_discount))
                                                    <td class="border-0 text-end">- $
                                                        {{ $invoice->invoiceable->total_discount }}
                                                    </td>
                                                @else
                                                    <td class="border-0 text-end">- $0.00
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                                <td class="border-0 text-end">
                                                    @if (isset($invoice->invoiceable->grand_total) && !is_null($invoice->invoiceable->grand_total))
                                                        <h4 class="m-0">${{ $invoice->invoiceable->grand_total }}</h4>
                                                    @else
                                                        <h4 class="m-0">${{ $invoice->price }}</h4>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-print-none mt-4">
                                    <div class="float-end">
                                        <a href="javascript:window.print()" data-bs-toggle="tooltip" title="Print"
                                            class="btn btn-success w-md waves-effect waves-light me-1"><i
                                                class="fa fa-print"></i></a>
                                        <a href="{{ route('generate-pdf', $invoice->id) }}" data-bs-toggle="tooltip"
                                            title="Download" class="btn btn-primary w-md waves-effect waves-light"><i
                                                class="fas fa-download"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection
