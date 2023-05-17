@extends('layouts.customer')

@section('title')
    Outreach Link Agency | Explore Site
@endsection

@section('content')
    <!-- container-fluid -->
    <div class="page-content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Orders</span>
                        <a href="{{ route('sites.index') }}" class="btn btn-otr-primary waves-effect waves-light"><i
                                class="mdi mdi-plus me-2"></i> Place
                            Order</a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <nav class="navbar navbar-expand-lg navbar-light p-0 mb-3">
                                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                                    data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse overflow-auto" id="navbarNav">
                                    <ul class="btn-group btn-group-sm w-100 p-0 m-0 overflow-auto">
                                        <li class="nav-item btn p-0 {{ request()->get('status') == 'Draft' ? 'btn-primary' : 'btn-outline-primary' }}"
                                            style="white-space: nowrap; ">
                                            <a class=" nav-link btn btn-sm w-100 p-2" style="color: inherit !important;"
                                                href="{{ route('order.index', ['status' => 'Draft']) }}">
                                                Draft
                                                @if (isset($count['Draft']))
                                                    <span
                                                        class="badge bg-danger text-white font-bold font-size-12">{{ $count['Draft'] }}</span>
                                                @endif
                                            </a>
                                        </li>

                                        <li class=" btn p-0  {{ request()->get('status') == 'Waiting for Approval' ? 'btn-primary' : 'btn-outline-primary' }}"
                                            style="white-space: nowrap; ">
                                            <a class=" nav-link btn btn-sm w-100 p-2" style="color: inherit !important;"
                                                href="{{ route('order.index', ['status' => 'Waiting for Approval']) }}">
                                                Waiting for Approval
                                                @if (isset($count['Waiting for Approval']))
                                                    <span
                                                        class="badge bg-danger text-white font-bold font-size-12">{{ $count['Waiting for Approval'] }}</span>
                                                @endif
                                            </a>
                                        </li>

                                        <li class=" btn p-0  {{ request()->get('status') == 'In Progress' ? 'btn-primary' : 'btn-outline-primary' }}"
                                            style="white-space: nowrap; ">
                                            <a class=" nav-link btn btn-sm w-100 p-2" style="color: inherit !important;"
                                                href="{{ route('order.index', ['status' => 'In Progress']) }}">
                                                In Progress
                                                @if (isset($count['In Progress']))
                                                    <span
                                                        class="badge bg-danger text-white font-bold font-size-12">{{ $count['In Progress'] }}</span>
                                                @endif
                                            </a>
                                        </li>

                                        <li class=" btn p-0  {{ request()->get('status') == 'Delivered Project' ? 'btn-primary' : 'btn-outline-primary' }}"
                                            style="white-space: nowrap; ">
                                            <a class=" nav-link btn btn-sm w-100 p-2" style="color: inherit !important;"
                                                href="{{ route('order.index', ['status' => 'Delivered Project']) }}">
                                                Delivered Project
                                                @if (isset($count['Delivered Project']))
                                                    <span
                                                        class="badge bg-danger text-white font-bold font-size-12">{{ $count['Delivered Project'] }}</span>
                                                @endif
                                            </a>
                                        </li>

                                        <li class=" btn p-0  {{ request()->get('status') == 'Completed' ? 'btn-primary' : 'btn-outline-primary' }}"
                                            style="white-space: nowrap; ">
                                            <a class=" nav-link btn btn-sm w-100 p-2" style="color: inherit !important;"
                                                href="{{ route('order.index', ['status' => 'Completed']) }}">
                                                Completed
                                                @if (isset($count['Completed']))
                                                    <span
                                                        class="badge bg-danger text-white font-bold font-size-12">{{ $count['Completed'] }}</span>
                                                @endif
                                            </a>
                                        </li>

                                        <li class=" btn p-0  {{ request()->get('status') == 'Modification' ? 'btn-primary' : 'btn-outline-primary' }}"
                                            style="white-space: nowrap; ">
                                            <a class=" nav-link btn btn-sm w-100 p-2" style="color: inherit !important;"
                                                href="{{ route('order.index', ['status' => 'Modification']) }}">
                                                Modification
                                                @if (isset($count['Modification']))
                                                    <span
                                                        class="badge bg-danger text-white font-bold font-size-12">{{ $count['Modification'] }}</span>
                                                @endif
                                            </a>
                                        </li>

                                        <li class=" btn p-0  {{ request()->get('status') == 'Declined' ? 'btn-primary' : 'btn-outline-primary' }}"
                                            style="white-space: nowrap; ">
                                            <a class=" nav-link btn btn-sm w-100 p-2" style="color: inherit !important;"
                                                href="{{ route('order.index', ['status' => 'Declined']) }}">
                                                Declined
                                                @if (isset($count['Declined']))
                                                    <span
                                                        class="badge bg-danger text-white font-bold font-size-12">{{ $count['Declined'] }}</span>
                                                @endif
                                            </a>
                                        </li>

                                        <li class="  btn p-0  {{ request()->get('status') == '' ? 'btn-primary' : 'btn-outline-primary' }} "
                                            style="white-space: nowrap; ">
                                            <a class="btn btn-sm w-100 p-2" style="color: inherit !important;"
                                                href="{{ route('order.index') }}">All
                                                <span
                                                    class="badge bg-danger text-white font-bold font-size-12">{{ $totalCount }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                            <x-table :headers="['SL', 'Ref ID', 'Site', 'Price', 'Status', 'Ordered at', 'Action']">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($site_order as $item)
                                    {{-- @dump($item->exploreSiteModification) --}}
                                    @if ($item->status != 'N/A')
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $item->reference_id }}</td>
                                            <td>
                                                <a href="{{ $item->exploreSite->domain_url }}"
                                                    target="__blank">{{ $item->exploreSite->domain }}</a>
                                            </td>
                                            <td><span class="badge bg-soft-primary">{{ $item->grand_total }}</span></td>
                                            <td><span class="badge bg-soft-info">{{ $item->status }}</span></td>
                                            <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-M-Y') }}</td>

                                            <td>
                                                @if ($item->payment_status == 'Not Paid')
                                                    <form action="{{ route('order.show', $item->id) }}">
                                                        <div style='float: left; padding: 5px;'>
                                                            <button type="submit"
                                                                class="btn btn-outline-primary waves-effect waves-light"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Show"><i class="fa fa-eye"></i></button>
                                                        </div>
                                                    </form>
                                                @else
                                                    <form action="{{ route('order.view', $item->id) }}">
                                                        <div style='float: left; padding: 5px;'>
                                                            <button type="submit"
                                                                class="btn btn-outline-success waves-effect waves-light"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="View"><i class="fa fa-eye"></i></button>
                                                        </div>
                                                    </form>
                                                @endif
                                                @if (isset($item->exploreSiteModification[0]->messages))
                                                    <div style='float: left; padding: 5px;'>
                                                        <a title="Message Check"
                                                            href="{{ route('order.message', $item->id) }}"
                                                            class="btn btn-outline-dark waves-effect waves-light"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"> <i
                                                                class="uil-comment-alt-message"></i> </a>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </x-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
@endsection
