@extends('layouts.guest')

@section('content')
    <div class="account-pages my-5  pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6">
                    <div>
                        <a href="index.html" class="mb-5 d-block auth-logo">
                            <img src="assets/images/logo-dark.png" alt="" height="22" class="logo logo-dark">
                            <img src="assets/images/logo-light.png" alt="" height="22" class="logo logo-light">
                        </a>
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <div class="logo">
                                        <img src="{{ asset('assets/images/logo.png') }}" height="40px" alt="Logo">
                                    </div>
                                    <h3 class="text-primary my-2">Verify Email</h3>
                                    <h6 class="text-start fs-6">Thanks to signing up! Before getting started, could your verify your email address by clicking on the link we just emailed to you ? If you didn't receive the email, we will gladly send you another.</h6>
                                </div>

                                @if (session('status') == 'verification-link-sent')
                                    <div class="mt-2">
                                        <p class="fs-6 text-white" style="background: #28a745; padding: 10px 15px; border-radius: 5px; margin-top: 20px;">A new verification link has been sent to the email address you provided during registration.</p>
                                    </div>
                                @endif

                                <div class="p-2 mt-4">
                                    <form method="POST" action="{{ route('verification.send') }}">
                                        @csrf
                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Resend verification Link</button>
                                        </div>
                                    </form>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <div class="mt-5 text-center">
                                            <p class="mb-0">Won't verify ? 
                                                <button type="submit" class="fw-medium text-primary" style="background: none;border:none;"> Logout </button>
                                            </p>
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
        <!-- end container -->
    </div>
@endsection
