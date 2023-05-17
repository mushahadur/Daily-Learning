@extends('layouts.app')

@section('title')
    Outreach Link Agency | Country List
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Country List</span>
                    </div>
                </div>
            </div><!-- end row-->
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="['Country Name', 'Country Code', 'Flag']">
                                @foreach ($explore_countries as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>
                                            <img src="{{ asset('vendor/blade-flags/country-' . $item->code . '.svg') }}"
                                                width="32" height="32" />
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
