@extends('layouts.guest')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-10 col-lg-8 col-xl-7 mt-5">
                <div>
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <img src="{{ asset('assets/images/logo.png') }}" height="40px" alt="">
                                <h5 class="text-primary mt-3">Make New Passowrd</h5>
                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('password.store') }}">
                                    @csrf
                                    <!-- Password Reset Token -->
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    <div class="mb-3">
                                        <label class="form-label" for="useremail">Email address :</label>
                                        <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="useremail">New Password :</label>
                                        <input type="password" class="form-control" id="useremail" placeholder="Enter email" name="password" :value="old('password')" required autofocus>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="useremail">Confirm New Password :</label>
                                        <input type="password" class="form-control" id="useremail" placeholder="Enter email" name="password_confirmation" :value="old('password_confirmation')" required autofocus>
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="mt-4 text-end">
                                        <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Save Password</button>
                                    </div>
        

                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Remember It ? <a href="{{ route('login') }}" class="fw-medium text-primary"> Signin </a></p>
                                    </div>
                                </form>
                            </div>
        
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>© <script>document.write(new Date().getFullYear())</script> Outreachlink Agency. Crafted with <i class="mdi mdi-heart text-danger"></i> by Bitchip Digital</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
@endsection
