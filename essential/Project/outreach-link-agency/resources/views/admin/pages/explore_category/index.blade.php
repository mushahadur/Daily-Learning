@extends('layouts.app')

@php
    $admin = Auth::guard('web')->user();
@endphp

@section('title')
    Outreach Link Agency | Explore Site Category
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-6 d-flex align-items-center justify-content-between">
                    <div class="page-title-box">
                        <span class="mb-0 header-style">Explore Site Category List</span>
                    </div>
                </div>
                <div class="col-6 text-end">
                    @if ($admin->can('Explore Categories Create'))
                        <button type="button" class="btn btn-otr-primary" data-bs-toggle="modal" data-bs-target="#bootModal">
                            <i class="bx bx-plus"></i>
                            Add New
                        </button>
                    @endif
                </div>
            </div>
            @php
                $langauge = 'us';
            @endphp
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="['Name', 'Action']">
                                @foreach ($explore_headers as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <div style='float: left; padding: 5px;'>

                                                @if ($admin->can('Explore Categories Edit'))
                                                    <button type="submit" class="btn btn-info edit-explore-category"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                        data-item="{{ $item->id }}"><i
                                                            class="fa fa-pencil-alt"></i></button>
                                                @endif
                                            </div>
                                            @if ($admin->can('Explore Categories Delete'))
                                                <form action="{{ route('explore_category.destroy', $item) }}" method="post"
                                                    style='float: left; padding: 5px;'>
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger delete-confirm"
                                                        data-name="{{ $item->name }}" data-bs-toggle="tooltip"
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
        <form action="{{ route('explore_category.store') }}" method="POST">
            @csrf
            <x-modal title='Add Explore Site Category' id="bootModal" modalSize=''>
                <div class="container">
                    <div class="row">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Type Category here"
                                id="exploreCategoryName" name="name">
                            <label for="exploreCategoryName">Category Name</label>
                        </div>
                    </div>
                </div>
            </x-modal>
        </form>

        <form method="POST" id="editForm">
            @csrf
            @method('PUT')
            <x-modal title='Edit Explore Site Category' id="editModal" modalSize=''>
                <div class="container">
                    <div class="row">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Type Category here"
                                id="exploreCategoryNameEdit" name="name">
                            <label for="exploreCategoryNameEdit">Category Name</label>
                        </div>
                    </div>
                </div>
            </x-modal>
        </form>
    </div>
@endsection
