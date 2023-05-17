@extends('layouts.app')

@section('title')
    Outreach Link Agency | Message List
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Message List</span>
                    </div>
                </div>
            </div><!-- end row-->
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="[ 'Name', 'Email', 'Subject', 'Message', 'Action']">

                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->user->name }}</td>
                                        <td>{{ $contact->user->email }}</td>
                                        <td>{{ $contact->subject }}</td>


                                        <td> {{Str::limit($contact->message, 50, '...')}}</td>

                                        <td>
                                            <div style='float: left; padding: 5px;'>
                                                <button type="submit" class="border-0 p-0" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="View Details">
                                                    <a class="btn btn-primary text-white"
                                                        href="{{route('admin_contact.show', $contact->id)}}"><i class="far fa-eye"></i></a>
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
        </div> <!-- container-fluid -->
    </div>
@endsection

