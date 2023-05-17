@extends('layouts.app')

@php
    $admin = Auth::guard('web')->user();
@endphp

@section('title')
    Outreach Link Agency | Explore publication type
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-6">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Explore Publication Type List</span>
                    </div>
                </div>
                <div class="col-6 text-end">
                    @if ($admin->can('Explore Publication Create'))
                        <button type="button" class="btn btn-otr-primary" data-bs-toggle="modal" data-bs-target="#bootModal">
                            <i class="bx bx-plus"></i>
                            Add New
                        </button>
                    @endif
                </div>
            </div><!-- end row-->
            @php
                $langauge = 'us';
            @endphp
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="['Name', 'Action']">
                                @foreach ($explore_publication_type as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <div style='float: left; padding: 5px;'>

                                                @if ($admin->can('Explore Publication Edit'))
                                                    <button type="submit" class="btn btn-info edit-explore-publication"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                        data-item="{{ $item->id }}"><i
                                                            class="fa fa-pencil-alt"></i></button>
                                                @endif
                                            </div>
                                            @if ($admin->can('Explore Publication Delete'))
                                                <form action="{{ route('explore_publication_type.destroy', $item) }}"
                                                    method="post" style='float: left; padding: 5px;'>
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
        <form action="{{ route('explore_publication_type.store') }}" method="POST">
            @csrf
            <x-modal title='Add Explore Publication Type' id="bootModal" modalSize=''>
                <div class="container">
                    <div class="row">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Publication Type here"
                                id="exploreCategoryName" name="name">
                            <label for="exploreCategoryName">Publication Type</label>
                        </div>
                    </div>
                </div>
            </x-modal>
        </form>

        <form method="POST" id="editForm">
            @csrf
            @method('PUT')
            <x-modal title='Edit Explore Publication Type' id="editModal" modalSize=''>
                <div class="container">
                    <div class="row">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Publication type here"
                                id="explorePublicationNameEdit" name="name">
                            <label for="explorePublicationNameEdit">Publication Type</label>
                        </div>
                    </div>
                </div>
            </x-modal>
        </form>
    </div>
@endsection
