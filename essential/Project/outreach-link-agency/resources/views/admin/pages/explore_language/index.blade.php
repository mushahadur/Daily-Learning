@extends('layouts.app')

@section('title')
    Outreach Link Agency | Language List
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Language List</span>
                    </div>
                </div>
            </div><!-- end row-->
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="['Language Name', 'Language Code']">
                                @foreach ($explore_languages as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->code }}</td>
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
