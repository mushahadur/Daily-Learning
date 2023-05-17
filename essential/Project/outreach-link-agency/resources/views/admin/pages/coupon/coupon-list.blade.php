@extends('layouts.app')

@php
    $admin = Auth::guard('web')->user();
@endphp

@section('title')
    Outreach Link Agency | Coupon list Page
@endsection

@push('css')
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endpush

@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Coupon Lists</span>
                        @if ($admin->can('Coupon Create'))
                            <a class="btn btn-otr-primary waves-effect waves-light" href="{{ route('coupon.create') }}"><i
                                    class="mdi mdi-plus me-2"></i> Add Coupon</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="[
                                'SL',
                                'Coupon ID',
                                'Applies For',
                                'Price',
                                'Description',
                                'Discount Type',
                                'Set Expiry Date',
                                'Action',
                            ]">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($coupon as $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->couponId_generate }}</td>
                                        <td>
                                            @if ($item->all_coupon_price)
                                                <span class="badge bg-pill bg-soft-success font-size-14 d-block"
                                                    style="font-weight: 900; margin-bottom: 10px">All Service</span>
                                            @else
                                                @foreach ($item->exploreSites as $data)
                                                    <span class="badge bg-pill bg-soft-success font-size-14 d-block"
                                                        style="font-weight: 900; margin-bottom: 10px">{{ $data->site_name }}</span>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->all_coupon_price)
                                                <span class="badge bg-pill bg-soft-success font-size-14 d-block"
                                                    style="font-weight: 900; margin-bottom: 10px">
                                                    @if ($item->discount_type == 'Fixed Amount')
                                                        ${{ $item->all_coupon_price }}
                                                    @else
                                                        {{ $item->all_coupon_price }}%
                                                    @endif
                                                </span>
                                            @endif
                                            @foreach ($item->exploreSites as $data)
                                                <span class="badge bg-pill bg-soft-success font-size-14 d-block"
                                                    style="font-weight: 900; margin-bottom: 10px">
                                                    @if ($item->discount_type == 'Fixed Amount')
                                                        ${{ $data->pivot->price }}
                                                    @else
                                                        {{ $data->pivot->price }}%
                                                    @endif

                                                </span>
                                            @endforeach
                                        </td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->discount_type }}</td>
                                        <td>{{ $item->expiry_date }}</td>
                                        <td class="d-flex">
                                            @if ($admin->can('Coupon Edit'))
                                                <a class="btn btn-primary me-2"
                                                    href="{{ route('coupon.edit', $item->id) }}" title="Edit Coupon"> <i
                                                        class="uil-edit-alt"></i> </a>
                                            @endif
                                            @if ($admin->can('Coupon Delete'))
                                                <form action="{{ route('coupon.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger delete-confirm"
                                                        data-name="{{ $item->name }}" title="Delete Coupon"> <i
                                                            class="uil-trash-alt"></i> </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </x-table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
