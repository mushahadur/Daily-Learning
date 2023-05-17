@extends('layouts.customer')

@section('title')
    Outreach Link Agency | Wallet
@endsection

@section('content')
    <div class="page-content subscription">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Wallet</span>
                        <a href="{{ route('wallet.create') }}" type="button"
                            class="btn btn-otr-primary waves-effect waves-light">
                            <i class="mdi mdi-wallet-outline me-2"></i>Add Funds</a>
                    </div>
                </div>
            </div>
            @if ($lowbalance)
                @include('customer.components.balance-low')
            @endif
            <div id="highlights" class="d-flex flex-column flex-lg-row mb-4 mt-2" style="gap: calc(10px + 1vmin);">

                <div class="w-100">
                    <div class="card border-top-spending shadow h-100 py-2 border-0"
                        style="background-color: white !important;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase text-muted mb-1">
                                        Spending
                                    </div>

                                    <div class="row no-gutters align-items-center">
                                        <div class="col m-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-top-spending">
                                                <span class="app-currency">{{ $spending ?? '00.00' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto square-box">
                                    <div class="span bg-primary-light rounded-circle text-top-spending p-2 square-content">
                                        <i class="fas fa-dollar-sign fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-100">
                    <div class="card border-top-balance shadow h-100 py-2 border-0"
                        style="background-color: white !important;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase text-muted mb-1">
                                        Balance
                                    </div>

                                    <div class="row no-gutters align-items-center">
                                        <div class="col m-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-top-balance">
                                                <span class="app-currency">{{ $balance ?? '00.00' }}</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-auto square-box">
                                    <div class="span bg-success-light rounded-circle text-top-balance p-2 square-content">
                                        <i class="fas fa-dollar-sign fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="['SL', 'TXN Id', 'Source', 'Amount', 'Type', 'Status', 'Created At']">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($wallet_list as $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->txn_id }}</td>
                                        <td>{{ ucfirst(str_replace('_', ' ', $item->source)) }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>
                                            @if ($item->type == 'credit')
                                                <span
                                                    class="badge bg-soft-success text-capitalize">{{ $item->type }}</span>
                                            @else
                                                <span
                                                    class="badge bg-soft-danger text-capitalize">{{ $item->type }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status == 'completed')
                                                <span
                                                    class="badge bg-soft-success text-capitalize">{{ $item->status }}</span>
                                            @else
                                                <span
                                                    class="badge bg-soft-danger text-capitalize">{{ $item->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
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
