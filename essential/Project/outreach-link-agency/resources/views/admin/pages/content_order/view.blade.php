@extends('layouts.app')

@section('title')
    Outreach Link Agency | Content Order View Page
@endsection

@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 header-style">Content Order View</h4>
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
                                    <div>
                                        <p class="mb-1">Name :</p>
                                        <h5 class="font-size-16">{{ $contentorder->user->name }}</h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Content Name</p>
                                        <h5 class="font-size-16">{{ $contentorder->word_content->name }}</h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Total Price</p>
                                        <h5 class="font-size-16">{{ $contentorder->total_price }}</h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Quantity :</p>
                                        <h5 class="font-size-16">{{ $contentorder->quantity }}</h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">status :</p>
                                        <h5 class="font-size-16">{{ $contentorder->status }}</h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Payment Status :</p>
                                        <h5 class="font-size-16">{{ $contentorder->payment_status }}</h5>
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
                                            @foreach ($contentorderdetails as $item)
                                                @foreach ($item->word_content_order_detail as $data)
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
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
