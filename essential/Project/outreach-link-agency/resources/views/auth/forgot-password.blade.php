@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-10 col-lg-7 col-xl-6 mt-5">
                <div>
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <img src="{{ asset('assets/images/logo.png') }}" height="40px" alt="">
                                <h5 class="text-primary mt-3">Reset Password</h5>
                            </div>
                            <div class="p-2 mt-4">
                                <div>
                                    <p>Forgot your password ? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                                </div>
                                <!-- Session Status -->
                                <x-auth-session-status style="background: #28a745; color: #fff; padding: 10px; border-radius: 5px;" class="mb-4 text-white" :status="session('status')" />
                                <form action="{{ route('password.email') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="useremail">Email</label>
                                        <input type="email" class="form-control" id="useremail" placeholder="Enter email" name="email" value="{{ old('email') }}" required autofocus />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="mt-3 text-end">
                                        <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Send Reset Link</button>
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