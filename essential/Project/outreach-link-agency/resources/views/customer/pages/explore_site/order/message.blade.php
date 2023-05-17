@extends('layouts.customer')

@section('title')
    Outreach Link Agency | Explore Site
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 header-style">Site Order Message</h4>
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
                                        <p class="mb-1">Payment Status :</p>
                                        <h5 class="font-size-16">{{ $exploreserviceorder->payment_status }}</h5>
                                    </div>
                                    <hr>
                                    <div>
                                        @if ($exploreserviceorder->status == 'Delivered Project')
                                            <p class="mb-1">Action </p>
                                            <form action="{{ route('order.statusUpdate', $exploreserviceorder->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div style='float: left; padding: 5px; margin-bottom: 15px'>
                                                    <button type="submit"
                                                        class="btn btn-outline-info waves-effect waves-light accept-confirm"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Order Accept">Accept</button>
                                                </div>
                                            </form>
                                            <div style='float: left; padding: 5px; margin-bottom: 15px'>
                                                <button onclick="modification()"
                                                    class="btn btn-outline-warning waves-effect waves-light"
                                                    data-bs-toggle="tooltip" data-bs-placement="top">Modification</button>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <form action="{{ route('order.modificationUpdate', $exploreserviceorder->id) }}"
                                            method="POST">
                                            @csrf
                                            <div id="message" style="display: none">
                                                <div>
                                                    <textarea name="messages" class="form-control" id="" cols="62" rows="10" placeholder="Type Anything"></textarea>
                                                </div>
                                                <div style="margin-top: 30px">
                                                    <button type="submit" class="btn btn-otr-primary"><span
                                                            class="d-none d-sm-inline-block me-2">Send</span> <i
                                                            class="mdi mdi-send float-end"></i> </button>
                                                </div>
                                            </div>
                                        </form>
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
                                                {!! $exploreserviceorder->orderDetails->content !!}
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
            <div class="row mb-4">
                <h4 class="mb-4 header-style" style="margin-left: 550px">Message Lists</h4>


                @foreach ($exploreserviceorder->exploreSiteModification as $item)
                    <div class="col-xl-4"></div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 my-1"><small class="text-muted font-size-14">Published
                                                    by</small>
                                                <b>{{ $item->user->name }}</b> <small
                                                    class="text-muted font-size-14">on</small> <span>
                                                    {{ $item->created_at->format('l jS \\of F Y') }} </span> <span
                                                    class="bg-info badge me-2 float-end">{{ $item->user->getRoleNames()->first() }}
                                                </span>
                                            </h5>
                                            <small class="text-muted"><b>{{ $item->user->email }}</b></small>
                                            <hr style="height: 2px;color: black">
                                        </div>
                                    </div>
                                    <p style="color: black">{{ $item->messages }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- container-fluid -->
    </div>
@endsection

@push('script')
    <script>
        function modification() {
            var message = document.getElementById("message");
            if (message.style.display === "none") {
                message.style.display = "block";
            } else {
                message.style.display = "none";
            }
        }
    </script>
@endpush
