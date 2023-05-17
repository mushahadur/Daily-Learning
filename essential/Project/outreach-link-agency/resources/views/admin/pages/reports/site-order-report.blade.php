@extends('layouts.app')

@section('title')
    Outreach Link Agency | Site Order Report Page
@endsection

@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Site Order Report</span>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('siteOrder.index') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="start_date">Filter From</label>
                                <input name="from" type="date" class="form-control">
                                @error('start_date')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="end_date">Filter To Date</label>
                                <input name="to" type="date" class="form-control">
                                @error('end_date')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <button style="margin-top: 28px;" class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="[
                                'SL',
                                'Referance ID',
                                'Order Date',
                                'Customer Name',
                                'Site Name',
                                'Price',
                                'Discount',
                                'Status',
                                'Payment Method',
                                'Payment Status',
                            ]">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($siteOrder as $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>#{{ $item->reference_id }}</td>
                                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->exploreSite->domain }}</td>
                                        <td><span class="badge bg-soft-primary">{{ $item->grand_total }}</td>
                                        <td>{{ $item->discount }}</td>
                                        <td><span class="badge bg-soft-info">{{ $item->status }}</td>
                                        <td>{{ $item->payment_method }}</td>
                                        <td>
                                            @if ($item->payment_status == 'Not Paid')
                                                <span class="badge bg-soft-danger"> Not Paid </span>
                                             @elseif($item->payment_status == 'Paid')
                                                <span class="badge bg-soft-success"> Paid</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </x-table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
