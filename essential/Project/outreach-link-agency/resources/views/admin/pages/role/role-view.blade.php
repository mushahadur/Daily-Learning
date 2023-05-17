@extends('layouts.app')

@php
    $admin = Auth::guard('web')->user();
@endphp

@section('title')
    Outreach Link Agency | Role Page
@endsection

@push('style')
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
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
                        <span class="mb-0 header-style">Role List</span>
                        @if ($admin->can('Role Create'))
                            <a href="{{ route('role.create') }}" class="btn btn-success waves-effect waves-light mb-3"><i
                                    class="mdi mdi-plus me-1"></i> Add Role</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Permission</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($role as $item)
                                                <tr>
                                                    <th>{{ ++$i }}</th>
                                                    <td
                                                        style="font-weight: 900; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                                                        {{ $item->name }}</td>
                                                    <td>
                                                        @foreach ($item->permissions as $per)
                                                            <span
                                                                class="mt-2 badge border border-primary text-primary mt-2">
                                                                {{ $per->name }}
                                                            </span>
                                                        @endforeach
                                                    </td>
                                                    <td class="d-flex">
                                                        @if ($item->name != 'Super Admin' && $item->name != 'Customer')
                                                            @if ($admin->can('Role Edit'))
                                                                <a class="btn btn-primary me-2"
                                                                    href="{{ route('role.edit', $item->id) }}"
                                                                    title="Edit Role"> <i class="uil-edit-alt"></i> </a>
                                                            @endif
                                                            @if ($admin->can('Role Delete'))
                                                                <form action="{{ route('role.destroy', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger delete-confirm"
                                                                        data-name="{{ $item->name }}" title="Delete Role">
                                                                        <i class="uil-trash-alt"></i> </button>
                                                                </form>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </div>
@endsection

@push('script')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
@endpush
