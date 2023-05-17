@extends('layouts.customer')

@section('title')
    Outreach Link Agency | Campaign List Page
@endsection

@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Campaign Lists</span>
                        <button type="button" class="btn btn-otr-primary waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target=".bs-example-modal-center"><i class="mdi mdi-plus me-2"></i>Add Campaign</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="[
                                'SL',
                                'Campaign Name',
                                'Total Order',
                                'Free to use',
                                'Campaign Create',
                                'Action',
                            ]">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($campaign as $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->numberOfCampaign }}</td>
                                        <td>{{ $item->freeToUse }}</td>
                                        <td>{{ $item->dates }}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-primary me-2" href="{{ route('campaign.show', $item->id) }}"
                                                title="Show Campaign">
                                                <i class="uil uil-eye"></i>
                                            </a>
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
        <div class="col-lg-6">
            <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title header-style">Campaign Create</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('campaign.store') }}" method="POST">
                                @csrf
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="image">New Campaign</label>
                                        <input name="name" type="text" class="form-control"
                                            placeholder="Enter Domain (example.com)">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col ms-auto">
                                        <div class="d-flex flex-reverse flex-wrap gap-2">
                                            <button type="submit" class="btn btn-otr-primary"> <i
                                                    class="uil uil-file-alt"></i>
                                                Create Campaign
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
