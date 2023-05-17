@extends('layouts.app')

@section('title')
    Outreach Link Agency | Explore Site Order View Page
@endsection

@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 header-style">Explore Site Order View</h4>
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
                                        <p class="mb-1">Customer Name :</p>
                                        <h5 class="font-size-16">{{ $exploreserviceorder->user->name }}</h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Explore Site Name</p>
                                        <h5 class="font-size-16">{{ $exploreserviceorder->exploreSite->site_name }}</h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Total Price</p>
                                        <h5 class="font-size-16">{{ $exploreserviceorder->grand_total }}</h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Payment Method :</p>
                                        <h5 class="font-size-16">{{ $exploreserviceorder->payment_method }}</h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Status :</p>
                                        <h5 class="font-size-16">{{ $exploreserviceorder->status }}</h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Payment Status :</p>
                                        <h5 class="font-size-16">{{ $exploreserviceorder->payment_status }}</h5>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card mb-0">
                        <div class="tab-content p-4">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <span>Explore Site:
                                        <b>{{ $exploreserviceorder->orderDetails->service->name }}</b>
                                    </span>
                                </div>
                            </div>
                            @if ($exploreserviceorder->orderDetails->service->name != 'Link Insertion')
                                <div class="col-12">
                                    <div class="page-title-box d-flex align-items-center justify-content-between">
                                        <span>Service buy content:
                                            <b>{{ $exploreserviceorder->orderDetails->service->serviceContentType[0]->name }}</b>
                                        </span>
                                    </div>
                                </div>
                                @if (!$exploreserviceorder->orderDetails->service->serviceContentType[0]->name == 'Content Writing & Publication')
                                    <div class="col-12">
                                        <div class="page-title-box d-flex align-items-center justify-content-between">
                                            <span>Explore Site:
                                                <b>{{ $exploreserviceorder->orderDetails->service->serviceContentType[0]->wordLength[0]->name }}</b>
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            @endif
                            <div class="container">
                                @if ($exploreserviceorder->orderDetails->title)
                                    <div class="row mb-4">
                                        <div class="col">
                                            <span class="d-block"><b>Title of article:</b></span>
                                            <span>{{ $exploreserviceorder->orderDetails->title }}</span>
                                        </div>
                                    </div>
                                @endif
                                @if ($exploreserviceorder->orderDetails->topic)
                                    <div class="row mb-4">
                                        <div class="col">
                                            <span class="d-block"><b>Topic:</b></span>
                                            <span>{{ $exploreserviceorder->orderDetails->topic }}</span>
                                        </div>
                                    </div>
                                @endif
                                @if ($exploreserviceorder->orderDetails->service->name == 'Link Insertion')
                                    <div class="row mb-4">
                                        <div class="col">
                                            <span class="d-block"><b>Post URL:</b></span>
                                            <span>{{ $exploreserviceorder->orderDetails->post_url }}</span>
                                        </div>
                                    </div>
                                @endif
                                <div class="row mb-4">
                                    <div class="col">
                                        <span class="d-block"><b>Keyword/Anchore text:</b></span>
                                        <span>{{ $exploreserviceorder->orderDetails->anchor_text }}</span>
                                    </div>
                                    <div class="col">
                                        <span class="d-block"><b>Landing page/Link URL:</b></span>
                                        <span>{{ $exploreserviceorder->orderDetails->landing_page }}</span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    @if ($exploreserviceorder->orderDetails->content)
                                        <div class="col">
                                            <span class="d-block"><b>Article content:</b></span>
                                            <span>
                                                {{ $exploreserviceorder->orderDetails->content }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <span class="d-block"><b>Special Instructions:</b></span>
                                        <span>
                                            {!! $exploreserviceorder->orderDetails->specialInstruction !!}
                                        </span>
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
    <!-- End Page-content -->
@endsection
