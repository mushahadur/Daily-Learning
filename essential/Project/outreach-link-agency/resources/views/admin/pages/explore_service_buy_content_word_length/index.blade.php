@extends('layouts.app')

@php
    $admin = Auth::guard('web')->user();
@endphp

@section('title')
    Outreach Link Agency | Content Writing Word List
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Content Word Length List</span>
                    </div>
                </div>
            </div><!-- end row-->
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="['Word Length', 'Price', 'Pulishing Method', 'Service', 'Action']">
                                @foreach ($word_lengths as $item)
                                    <tr>
                                        <td>{{ $item->length }} Words</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->buyContent->name }}</td>
                                        <td>{{ $item->buyContent->serviceType->name }}</td>

                                        <td>
                                            <div style='float: left; padding: 5px;'>
                                                @if ($admin->can('Content Writing Edit'))
                                                    <button type="submit"
                                                        class="btn btn-info edit-explore-service-content-word-length"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                        data-item="{{ $item->id }}"><i
                                                            class="fa fa-pencil-alt"></i></button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </x-table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
        <form method="POST" id="editForm">
            @csrf
            @method('PUT')
            <x-modal title='Edit Content Writing Price' id="editModal" modalSize=''>
                <div class="container">
                    <div class="row">
                        <h4 class="word-length-for">
                            For:
                            <span class="word-length badge bg-primary"></span>
                            Words
                        </h4>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" placeholder="Enter Content Price"
                                id="explorServiceContentPriceEdit" name="price" min="0.00" step="0.01">
                            <label for="explorServiceContentPriceEdit">Price</label>
                            <span class="text-muted">e.g "10.00"</span>
                        </div>
                    </div>
                </div>
            </x-modal>
        </form>
    </div>
@endsection
