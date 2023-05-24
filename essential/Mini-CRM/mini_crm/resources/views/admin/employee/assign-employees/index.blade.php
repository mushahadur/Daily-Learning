
@extends('admin.master')

@section('body')
    <div class="row">
<div class="col-md-4 mx-auto">
    <div class="card">

        <p class="card-title-desc">{{Session::get('message')}}</p>
        <div class="card-body">
            <h3 class="text-center pb-5">Sign in</h3>
            <form action="{{ route('employee.login') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-form-label col-md-4">Employee Email</label>
                    <div class="col-md-8">
                        <input type="text" name="email" class="form-control" placeholder="Enter Email"/>
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-4">Employee Password</label>
                    <div class="col-md-8">
                        <input type="text" name="phone" class="form-control" placeholder="Enter Password or Phone Number"/>
                        @error('last_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <label class="col-form-label col-md-4"></label>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary px-5 mx-5">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div> <!-- end row -->
@endsection
