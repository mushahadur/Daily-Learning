@extends('layouts.app')

@php
    $admin = Auth::guard('web')->user();
@endphp

@section('title')
    Outreach Link Agency | Explore Site List
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-6">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Explore Site List</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="action-button text-end">
                        @if ($admin->can('Exploresites Create'))
                            <a href="{{ route('explore_site.create') }}" type="button" class="btn btn-otr-primary">
                                <i class="bx bx-plus"></i>
                                Add New
                            </a>
                        @endif
                    </div>
                </div>
            </div><!-- end row-->
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="['Site Name', 'Domain', 'DA', 'DR', 'Traffic', 'SC', 'PT', 'Action']">
                                @foreach ($explore_sites as $item)
                                    <tr>
                                        <td>{{ $item->site_name }}</td>
                                        <td>
                                            <a href="{{ $item->domain_url }}" target="_blank"
                                                class="text-primary font-weight-bold">
                                                {{ $item->domain }}
                                            </a>
                                        </td>
                                        <td><small
                                                class="badge bg-soft-success">{{ $item->moz_domain_authority }}</small></small>
                                        </td>
                                        <td><small class="badge bg-soft-success">{{ $item->ahref_domain_rating }}</small>
                                        </td>
                                        <td><small class="badge bg-soft-success">{{ $item->ahref_organic_traffic }}</small>
                                        </td>
                                        <td><small class="badge bg-soft-success">{{ $item->moz_spam_score }}</small></td>
                                        {{-- <td><small
                                                class="badge bg-soft-success">{{ $item->explore_hyperlink_type->name }}</small>
                                        </td> --}}
                                        <td><small
                                                class="badge bg-soft-success">{{ $item->explore_publication_type->name }}</small>
                                        </td>
                                        <td>
                                            @if ($admin->can('Exploresites Active'))
                                                @if ($item->is_active)
                                                    <form action="{{ route('explore_site.deactive', $item) }}"
                                                        method="get" style='float: left; padding: 5px;'>
                                                        <!-- @csrf -->
                                                        <button type="submit" class="btn btn-danger"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Deactivate Site"><i
                                                                class="mdi mdi-close-octagon-outline"></i></button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('explore_site.active', $item) }}" method="get"
                                                        style='float: left; padding: 5px;'>
                                                        <!-- @csrf -->
                                                        <button type="submit" class="btn btn-success"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Active Site"><i class="mdi mdi-cloud-check"></i></button>
                                                    </form>
                                                @endif
                                            @endif
                                            <div style='float: left; padding: 5px;'>
                                                @if ($admin->can('Exploresites View'))
                                                    <button type="submit" class="border-0 p-0" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Edit">
                                                        <a class="btn btn-info text-white"
                                                            href="{{ route('explore_site.edit', $item) }}"><i
                                                                class="fa fa-pencil-alt"></i></a>
                                                    </button>
                                                @endif
                                            </div>

                                            <div style='float: left; padding: 5px;'>
                                                @if ($admin->can('Exploresites Edit'))
                                                    <button type="submit" class="border-0 p-0" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="View Details">
                                                        <a class="btn btn-primary text-white"
                                                            href="{{ route('explore_site.show', $item->id) }}"><i
                                                                class="far fa-eye"></i></a>
                                                    </button>
                                                @endif
                                            </div>
                                            @if ($admin->can('Exploresites Delete'))
                                                <form action="{{ route('explore_site.destroy', $item) }}" method="post"
                                                    style='float: left; padding: 5px;'>
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger delete-confirm"
                                                        data-name="{{ $item->site_name }}" data-bs-toggle="tooltip"
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
    </div>
@endsection
