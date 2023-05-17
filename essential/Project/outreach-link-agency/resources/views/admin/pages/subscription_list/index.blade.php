@extends('layouts.app')

@section('title')
    Outreach Link Agency | Subscription List
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Subscription List</span>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="['Name', 'Email', 'Plan Name', 'Started At', 'Until Active']">
                                @foreach ($subscriber_list as $item)
                                    <tr>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->user->email }}</td>
                                        <td>{{ $item->subscribe_plan->name }}</td>
                                        <td>{{ Carbon\Carbon::parse($item->updated_at)->format('d M Y') }}</td>
                                        <td>{{ Carbon\Carbon::parse($item->active_until)->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </x-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
@endsection
