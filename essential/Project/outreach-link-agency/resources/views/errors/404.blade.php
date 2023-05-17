@extends('layouts.guest')

@section('content')
    <div class="my-5 pt-sm-5">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <div>
                            <div class="row justify-content-center">
                                <div class="col-sm-4">
                                    <div class="error-img">
                                        <img src="{{ asset('assets/images/404-error.png') }}" alt=""
                                            class="img-fluid mx-auto d-block">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="text-uppercase mt-4">Sorry, page not found</h4>
                        <div class="mt-5">
                            <a class="btn btn-primary waves-effect waves-light" href="{{ route('dashboard') }}">Back to
                                Dashboard</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
