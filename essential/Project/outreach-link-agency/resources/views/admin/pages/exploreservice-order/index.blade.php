@extends('layouts.app')

@php
    $admin = Auth::guard('web')->user();
@endphp

@section('title')
    Outreach Link Agency | Explore Service Order Page
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
                        <span class="mb-0 header-style">Explore Service Order Lists</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="[
                                'SL',
                                'Services ID',
                                'Customer Name',
                                'Site',
                                'Price',
                                'Status',
                                'Ordered At',
                                'Action',
                            ]">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($exploreserviceorder as $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>#{{ $item->reference_id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->exploreSite->site_name }}</td>
                                        <td>{{ $item->grand_total }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                                        <td>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    @if ($admin->can('Exploresite Order Edit'))
                                                        <a href="{{ route('explore_service_order.edit', $item->id) }}"
                                                            class="btn btn-success" title="Edit"><i
                                                                class="fa fa-pencil-alt"></i></a>
                                                    @endif
                                                </li>
                                                <li class="list-inline-item">
                                                    @if ($admin->can('Exploresite Order View'))
                                                        <a href="{{ route('explore_service_order.view', $item->id) }}"
                                                            class="btn btn-primary" title="View"><i
                                                                class="fa fas fa-eye"></i></a>
                                                    @endif
                                                </li>
                                            </ul>
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
