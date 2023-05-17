@extends('layouts.app')

@section('title')
    Outreach Link Agency | Message Details
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Message Details</span>
                    </div>
                </div>
            </div>
            <!-- end row-->
            <div class="row mt-2">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">


                            <div>
                                <h6 class="mb-1 col-md-6 p-2"> <b> User Name : {{ $contact->user->name ?? 'N/A' }} </b> </h6>
                            </div>

                            <div>
                                <h6 class="mb-1 col-md-6 p-2"> <b> User Email : {{ $contact->user->email ?? 'N/A' }} </b></h6>
                            </div>


                            <div class="p-2">
                                <P class="mb-1"> <b> Subject : {{ $contact->subject }} </b> </P>
                                {{-- <p class="font-size:16"> <b> {{ $contact->subject }} </b> </p> --}}
                            </div>

                            <div class="my-4 w-100 p-3" style="background-color: #eee;">
                                <P class="mb-1"> <b> <i> {{$contact->user->name }} </b> Message: </i> </P>
                                <p align="justify" class="font-size:16"> {{ $contact->message }} </p>
                            </div>

                            <div>
                                @foreach ($contact->reply as $reply)
                                    <tr>
                                        <td>
                                            <div class="col mt-2">
                                                {{-- <textarea readonly class="form-control max-height: 100%"> {{$reply->reply}} </textarea> --}}

                                                <div class="w-100 p-3  " style="background-color: #eee;">
                                                    <p> <b> <i> {{ $reply->user->name }} </b> Reply: </P> </i> {{ $reply->reply }}
                                                </div>
                                            </div>
                                        </td> <br>
                                    </tr>
                                @endforeach
                            </div>

                            <!-- start Form -->
                            <div class="row">
                                <form class="contact-us-form" action="{{ route('admin_reply_contact', $contact->id) }}"
                                    method="Post">
                                    @csrf
                                    <div class="col-12">
                                        <div class="col mt-3">
                                            <textarea class="form-control empty" cols="30" rows="7" placeholder="Reply Message" name="reply_message"
                                                id="reply_message"></textarea>
                                            @error('reply_message')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="actions text-center mt-4">
                                            <button type="submit" class="btn btn-primary px-4 py-2">Reply</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end form-->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
@endsection
