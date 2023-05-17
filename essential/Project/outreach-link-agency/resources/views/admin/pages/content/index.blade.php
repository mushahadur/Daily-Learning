@extends('layouts.app')

@php
    $admin = Auth::guard('web')->user();
@endphp

@section('title')
    Outreach Link Agency | Content lists Page
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
                        <span class="mb-0 header-style">Content Lists</span>
                        @if ($admin->can('Content Create'))
                            <button type="button" class="btn btn-otr-primary waves-effect waves-light"
                                data-bs-toggle="modal" data-bs-target=".bs-example-modal-center"><i
                                    class="mdi mdi-plus me-2"></i>Add Content</button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="['SL', 'Name', 'Price', 'Description', 'Action']">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($content as $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>${{ $item->price }}</td>
                                        <td>{!! $item->description !!}</td>
                                        <td class="d-flex">
                                            @if ($admin->can('Content Edit'))
                                                <a class="btn btn-primary me-2"
                                                    href="{{ route('content.show', $item->id) }}" title="Edit Content"> <i
                                                        class="uil-edit-alt"></i> </a>
                                            @endif
                                            @if ($admin->can('Content Delete'))
                                                <form action="{{ route('content.delete', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger delete-confirm"
                                                        data-name="" title="Delete Content"> <i class="uil-trash-alt"></i>
                                                    </button>
                                                </form>
                                            @endif
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

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title header-style">Content Create</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('content.store') }}" method="POST">
                                @csrf
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="image">Content Name</label>
                                                <input name="name" type="text" class="form-control"
                                                    placeholder="Content Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="image">Content Price</label>
                                                <input name="price" type="number" class="form-control"
                                                    placeholder="0.00">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="image">Description</label>
                                        <textarea id="elm1" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col ms-auto">
                                        <div class="d-flex flex-reverse flex-wrap gap-2">
                                            <button type="submit" class="btn btn-otr-primary"> <i
                                                    class="uil uil-file-alt"></i>
                                                Create Content
                                            </button>
                                        </div>
                                    </div> <!-- end col -->
                                </div>
                            </form>
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
