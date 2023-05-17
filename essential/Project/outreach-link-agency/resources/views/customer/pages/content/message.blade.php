@extends('layouts.customer')

@section('title')
    Outreach Link Agency | Content Order Message
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 header-style">Content Order Message</h4>
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
                                                        {{ $contentorder->word_content->name }}</h5>
                                                </div>
                                                <ul class="list-unstyled plan-features mt-3"
                                                    style="padding: 0px 0px 0px 0px; text-align: left; justify-content: center; display: flex;">
                                                    <li>{!! $contentorder->word_content->description !!}</li>
                                                </ul>
                                                <div class="py-4 text-center">
                                                    <span class="priceID"
                                                        style="font-weight: 900; font-size: 20px"><small>$</small>
                                                        {{ $contentorder->total_price }}</span>
                                                </div>
                                                <div class="quantity input-group mb-2 mt-0">
                                                    <input type="text" class="quantity-input form-control text-center"
                                                        name="quantity" value="Quantity: {{ $contentorder->quantity }}"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    @if ($contentorder->status == 'Delivered Project')
                                        <p class="mb-1">Action </p>
                                        <form action="{{ route('content-order.contentStatusUpdate', $contentorder->id) }}"
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
                                    <form action="{{ route('content-order.contentModificationUpdate', $contentorder->id) }}"
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
                <div class="row mb-4">
                    <h4 class="mb-4 header-style" style="margin-left: 550px">Message Lists</h4>
                    @foreach ($contentorder->contentOrderModification as $item)
                        <div class="col-xl-4">

                        </div>
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <h5 class="font-size-14 my-1"><small
                                                        class="text-muted font-size-14">Published by</small>
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
            </div>
        </div>
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
