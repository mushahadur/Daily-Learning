@extends('layouts.app')

@section('title')
    Outreach Link Agency | Invoice list 
@endsection

@section('content')
    <!-- container-fluid -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Invoices</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="[
                                'SL',
                                'TXN Id',
                                'User Name',
                                'Narration',
                                'Type',
                                'Status',
                                'Amount',
                                'Created At',
                                'Action',
                            ]">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($invoices as $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td><span class="badge bg-soft-secondary">{{ $item->tnx_id }}</span></td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ strpos($item->source, '_') !== false ? ucwords(strtolower(str_replace('_', ' ', $item->source))) : ucwords(strtolower($item->source)) }}
                                        </td>
                                        <td><span class="badge bg-soft-success">{{ strtoupper($item->type) }}</span></td>
                                        <td><span class="badge bg-soft-success">{{ strtoupper($item->status) }}</span></td>
                                        <td><span class="badge bg-soft-primary">{{ $item->price }}</span></td>
                                        <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                        <td>
                                            <div style='float: left; padding: 5px;'>
                                                <button type="submit" class="border-0 p-0" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="View Details">
                                                    <a class="btn btn-primary text-white"
                                                        href="{{ route('admin_invoice.show', $item->id) }}"><i
                                                            class="far fa-eye"></i></a>
                                                </button>
                                            </div>
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
