@extends('layouts.app')

@php
    $admin = Auth::guard('web')->user();
@endphp

@section('title')
    Outreach Link Agency | Package Order lists Page
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
                        <h2 class="mb-0 header-style">Package Order Lists</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="[
                                'SL',
                                'Referance ID',
                                'Date',
                                'Package',
                                'Customer Name',
                                'Price',
                                'Quantity',
                                'Status',
                                'Payment Status',
                                'Action',
                            ]">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($packageorder as $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>#{{ $item->reference_id }}</td>
                                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                                        <td>{{ $item->package->name }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->total_price }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->payment_status }}</td>
                                        <td>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    @if ($admin->can('Package Order Edit'))
                                                        <a href="{{ route('packageorder.edit', $item->id) }}"
                                                            class="btn btn-success" title="Edit"><i
                                                                class="fa fa-pencil-alt"></i></a>
                                                    @endif
                                                </li>
                                                <li class="list-inline-item">
                                                    @if ($admin->can('Package Order View'))
                                                        <a href="{{ route('packageorder.show', $item->id) }}"
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
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <!--tinymce js-->
    <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
    <!-- init js -->
    <script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>
@endpush
