@extends('layouts.app')

@php
    $admin = Auth::guard('web')->user();
@endphp

@section('title')
    Outreach Link Agency | Subscription Plan
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-6">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Subscription Plan List</span>
                    </div>
                </div>
                <div class="col-6 text-end">
                    @if ($admin->can('Subscription Create'))
                        <button type="button" class="border-0 p-0" data-bs-toggle="modal" data-bs-target="#bootModal">
                            <a href="{{ route('subscription-plan.create') }}" class="btn btn-otr-primary text-white">
                                <i class="bx bx-plus"></i>
                                Add New
                            </a>
                        </button>
                    @endif
                </div>
            </div><!-- end row-->
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="['Name', 'Price', 'Description', 'Validity', 'Status', 'Action']">
                                @foreach ($subscription_plan_list as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{!! Str::limit($item->description, 30, '..') !!}</td>
                                        <td>{{ $item->validity }}</td>
                                        <td>
                                            @if ($item->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($admin->can('Subscription Deactivate'))
                                                @if ($item->is_active)
                                                    <form action="{{ route('subscription-plan.deactive', $item) }}"
                                                        method="get" style='float: left; padding: 5px;'>
                                                        <!-- @csrf -->
                                                        <button type="submit" class="btn btn-danger"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Deactivate Package"><i
                                                                class="mdi mdi-close-octagon-outline"></i></button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('subscription-plan.active', $item) }}"
                                                        method="get" style='float: left; padding: 5px;'>
                                                        <!-- @csrf -->
                                                        <button type="submit" class="btn btn-success"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Active Package"><i
                                                                class="mdi mdi-cloud-check"></i></button>
                                                    </form>
                                                @endif
                                            @endif
                                            @if ($item->name != 'Basic Plan')
                                                <div style='float: left; padding: 5px;'>
                                                    @if ($admin->can('Subscription Edit'))
                                                        <button type="submit" class="border-0 p-0 edit-package"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                            data-item="">
                                                            <a class="btn btn-info text-white"
                                                                href="{{ route('subscription-plan.edit', $item->id) }}"><i
                                                                    class="fa fa-pencil-alt"></i></a>
                                                        </button>
                                                    @endif
                                                </div>
                                            @endif

                                            <div style='float: left; padding: 5px;'>
                                                @if ($admin->can('Subscription View'))
                                                    <button type="submit"
                                                        class="btn btn-primary show-subscription-plan-details"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="View Details" data-item="{{ $item->id }}">
                                                        <i class="bx bx-show"></i>
                                                    </button>
                                                @endif
                                            </div>

                                            @if ($admin->can('Subscription Delete'))
                                                @if ($item->name != 'Basic Plan')
                                                    <form action="{{ route('subscription-plan.destroy', $item) }}"
                                                        method="post" style='float: left; padding: 5px;'>
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger delete-confirm"
                                                            data-name="{{ $item->title }}" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Delete"><i
                                                                class="fa fa-trash-alt"></i></button>
                                                    </form>
                                                @endif
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
    </div> <!-- container-fluid -->
    <!-- Modal -->
    <div class="modal fade" id="subcriptionShowModal" tabindex="-1" aria-labelledby="exploreHeaderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="pricing-box custom-pricing-box">
                        <div class="card-body">
                            <div class="text-start">
                                <div class="mt-2">
                                    <h5 id="showModalLabel">Subscription : <span
                                            class="subscription-name text-primary"></span> </h5>
                                </div>
                                <div class="">
                                    <h5>Price ($) : <span class="subscription-price text-primary"></span></h5>
                                </div>
                                <div class="">
                                    <h5 id="showModalLabel">Validity : <span
                                            class="subscription-validity text-primary"></span> </h5>
                                </div>
                            </div>
                            <ul class="list-unstyled plan-features mt-3">
                                <p class="subscription-description"> </p>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="border-0 p-0 subscription-plan-edit-btn">

                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
