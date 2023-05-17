@extends('layouts.app')

@section('title')
    Outreach Link Agency | Service List
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Service List</span>
                    </div>
                </div>
            </div><!-- end row-->
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="['Name', 'Price', 'Action']">
                                @foreach ($services as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->price }}</td>

                                        <td>
                                            <div style='float: left; padding: 5px;'>
                                                <button type="submit" class="btn btn-info edit-explore-service"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                    data-item="{{ $item->id }}"><i
                                                        class="fa fa-pencil-alt"></i></button>
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
            <x-modal title='Edit Service' id="editModal" modalSize=''>
                <div class="container">
                    <div class="row">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" placeholder="Enter Price" id="explorServicePriceEdit"
                                name="price" min="0.00" step="0.01">
                            <label for="explorServicePriceEdit">Price</label>
                        </div>
                    </div>
                </div>
            </x-modal>
        </form>
    </div>
@endsection
