@extends('layouts.app')

@section('title')
    Outreach Link Agency | Content Order Edit Page
@endsection

@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 header-style">Content Order Edit</h4>
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
                                        <h5 class="font-size-16">{{ $packageorder->user->name }}</h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Content Name</p>
                                        <h5 class="font-size-16">{{ $packageorder->package->name }}</h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Total Price</p>
                                        <h5 class="font-size-16">{{ $packageorder->total_price }}</h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Quantity :</p>
                                        <h5 class="font-size-16">{{ $packageorder->quantity }}</h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Payment Status :</p>
                                        <h5 class="font-size-16">{{ $packageorder->payment_status }}</h5>
                                    </div>
                                    <form action="{{ route('packageorder.update', $packageorder->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mt-4">
                                            <p class="mb-1">Status :</p>
                                            <select class="form-control" name="status" id="statusID">
                                                <option value="">Select Status</option>
                                                <option value="Waiting for Approval"
                                                    {{ $packageorder->status == 'Waiting for Approval' ? 'selected' : '' }}>
                                                    Waiting for Approval
                                                </option>
                                                <option value="In Progress"
                                                    {{ $packageorder->status == 'In Progress' ? 'selected' : '' }}>
                                                    In
                                                    Progress
                                                </option>
                                                <option value="Delivered Project"
                                                    {{ $packageorder->status == 'Delivered Project' ? 'selected' : '' }}>
                                                    Delivered Project</option>
                                                <option value="Completed"
                                                    {{ $packageorder->status == 'Completed' ? 'selected' : '' }}>
                                                    Completed
                                                </option>
                                                <option value="Declined"
                                                    {{ $packageorder->status == 'Declined' ? 'selected' : '' }}>
                                                    Declined
                                                </option>
                                                <option value="Modification"
                                                    {{ $packageorder->status == 'Modification' ? 'selected' : '' }}>
                                                    Modification
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mt-4" id="message" style="display: none">
                                            <textarea name="messages" class="form-control" id="" cols="62" rows="10" placeholder="Type Anything"></textarea>
                                        </div>
                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-otr-primary">Update</button>
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
                                            @foreach ($packageorderdetails as $item)
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
                <div class="row mb-4">
                    @if (isset($message[0]->messages))
                        <h4 class="mb-4 header-style" style="margin-left: 550px">Message Lists</h4>
                    @endif
                    @foreach ($message as $item)
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
        $("#statusID").on('click', function() {

            var message = $(this).val();
            if (message === 'Delivered Project') {

                $("#message").show()

            } else if (message === 'Declined') {

                $("#message").show()
            } else {
                $("#message").hide()
            }

        });
    </script>
@endpush
