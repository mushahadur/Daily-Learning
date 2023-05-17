@extends('layouts.customer')

@section('title')
    Outreach Link Agency | Message Reply
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Message Reply</span>
                    </div>
                </div>
            </div>
            <!-- end row-->
            <div class="row mt-2">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <x-table :headers="[ 'SL', 'Subject', 'Message', 'Date', 'Action']">

                                @php
                                     $i = 0;
                                @endphp
                                @foreach ($contacts as $index)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $index->subject}}</td>
                                    <td>{{Str::limit($index->message, 50, '...')}}</td>
                                    <td>{{ $index->created_at->format('d/m/y') }}</td>
                                    <td>
                                        @if(count($index->reply)>0)
                                            <div style='float: left; padding: 5px;'>
                                                <button type="submit" class="border-0 p-0" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="View Reply">
                                                    <a class="btn btn-primary text-white"
                                                        href="{{route('contact.reply.view', $index->id)}}"><i class="far fa-eye"></i></a>
                                                </button>
                                            </div>
                                        @endif
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
