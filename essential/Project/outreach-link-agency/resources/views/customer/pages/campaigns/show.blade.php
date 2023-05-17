@extends('layouts.customer')

@section('title')
    Outreach Link Agency | Campaign Show Page
@endsection

@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Campaign Show Lists</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <nav class="navbar navbar-expand-lg navbar-light p-0 mb-3">
                                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                                    data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </nav>
                            <x-table :headers="['SL', 'Site', 'Price', 'Status', 'Action', 'Remove']">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($exploreServiceOrder as $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->exploresite->domain }}</td>
                                        <td><span class="badge bg-soft-primary">{{ $item->total_price }}</span></td>
                                        <td><span class="badge bg-soft-info">{{ $item->status }}</span></td>
                                        <td>
                                            @if ($item->status == 'N/A')
                                                <a class="btn btn-outline-primary waves-effect waves-light"
                                                    href="{{ route('order.create', ['exploreSite' => $item->exploresite->id, 'orderId' => $item->id]) }}"
                                                    title="Place Order">Place
                                                    Order</a>
                                            @elseif($item->status == 'Submitted')
                                                <a class="btn btn-outline-success waves-effect waves-light"
                                                    href="{{ route('order.view', $item->id) }}"
                                                    title="Show Site Order">Show
                                                    Site Order</a>
                                            @else
                                                <a class="btn btn-outline-warning waves-effect waves-light"
                                                    href="{{ route('order.checkout', $item->id) }}" title="View Order">View
                                                    Order</a>
                                            @endif

                                        </td>
                                        <td class="d-flex">
                                            @if ($item->status == 'N/A')
                                                <form
                                                    action="{{ route('campaign.destroy', ['explore_service_order_id' => $item->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary me-2 delete-confirm"
                                                        data-name="{{ $item->exploresite->domain }}" title="Delete Site">
                                                        <i class="uil-trash-alt"></i> </button>
                                                </form>
                                            @else
                                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip"
                                                    title="There is already an order in this campaign which cannot be removed">
                                                    <button class="btn btn-primary me-2" style="pointer-events: none;"
                                                        type="button" disabled><i class="uil-trash-alt"></i></button>
                                                </span>
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
@endsection

@push('script')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush
