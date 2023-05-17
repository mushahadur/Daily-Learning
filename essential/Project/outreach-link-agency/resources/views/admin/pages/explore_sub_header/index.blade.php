@extends('layouts.app')

@php
    $admin = Auth::guard('web')->user();
@endphp

@section('title')
    Outreach Link Agency | Explore Site Sub Header
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-6">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Explore Site Sub Header List</span>
                    </div>
                </div>
                <div class="col-6 text-end">
                    @if ($admin->can('Explore Sub Header Create'))
                        <button type="button" class="btn btn-otr-primary" data-bs-toggle="modal" data-bs-target="#bootModal">
                            <i class="bx bx-plus"></i>
                            Add New
                        </button>
                    @endif
                </div>
            </div><!-- end row-->
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="['Header Title', 'Header Details', 'Status', 'Action']">
                                @foreach ($explore_sub_headers as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ Str::limit($item->description, 50, '...') }}</td>
                                        <td>
                                            @if ($item->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($admin->can('Deactivate Sub Header'))
                                                @if ($item->is_active)
                                                    <form action="{{ route('explore_sub_header.deactive', $item) }}"
                                                        method="get" style='float: left; padding: 5px;'>
                                                        <!-- @csrf -->
                                                        <button type="submit" class="btn btn-danger"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Deactivate Header"><i
                                                                class="mdi mdi-close-octagon-outline"></i></button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('explore_sub_header.active', $item) }}"
                                                        method="get" style='float: left; padding: 5px;'>
                                                        <!-- @csrf -->
                                                        <button type="submit" class="btn btn-success"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Active Header"><i
                                                                class="mdi mdi-cloud-check"></i></button>
                                                    </form>
                                                @endif
                                            @endif
                                            <div style='float: left; padding: 5px;'>

                                                @if ($admin->can('Explore Sub Header Edit'))
                                                    <button type="submit" class="btn btn-info edit-explore-sub-header"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                        data-item="{{ $item->id }}"><i
                                                            class="fa fa-pencil-alt"></i></button>
                                                @endif
                                            </div>
                                            @if ($admin->can('Explore Sub Header Delete'))
                                                <form action="{{ route('explore_sub_header.destroy', $item->id) }}"
                                                    method="post" style='float: left; padding: 5px;'>
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger delete-confirm"
                                                        data-name="{{ $item->title }}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Delete"><i
                                                            class="fa fa-trash-alt"></i></button>
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
        </div> <!-- container-fluid -->
        <form action="{{ route('explore_sub_header.store') }}" method="POST">
            @csrf
            <x-modal title='Add Explore Site Sub Header' id="bootModal" modalSize=''>
                <div class="container">
                    <div class="row">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Type Your Sub Header Title"
                                id="exploreHeaderTitle" name="title">
                            <label for="exploreHeaderTitle">Title</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Type Your Sub Header Message Here" id="exploreHeaderDetails"
                                name="description" style="height: 100px"></textarea>
                            <label for="exploreHeaderDetails">Description</label>
                        </div>
                        <div id="headerHelp" class="form-text">Enter The Sub Header Description in this box</div>
                    </div>
                </div>
            </x-modal>
        </form>

        <form method="POST" id="editForm">
            @csrf
            @method('PUT')
            <x-modal title='Edit Explore Site Sub Header' id="editModal" modalSize=''>
                <div class="container">
                    <div class="row">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Type Your Sub Header Title"
                                id="exploreHeaderTitleEdit" name="title">
                            <label for="exploreHeaderTitleEdit">Title</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Type Your Sub Header Message Here" id="exploreHeaderDetailsEdit"
                                name="description" style="height: 100px"></textarea>
                            <label for="exploreHeaderDetailsEdit">Description</label>
                        </div>
                        <div id="headerHelp" class="form-text">Enter The Sub Header Description in this box</div>
                    </div>
                </div>
            </x-modal>
        </form>
    </div>
@endsection
