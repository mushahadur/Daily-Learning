@extends('layouts.guest')

@section('content')
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body p-0 border-0">
                            <div class="row">
                                <div class="d-none d-md-block col-md-6 col-lg-6 col-xl-6 login-img">
                                    <img class="img-fluid" src="assets/images/register-img.png" alt="login-img">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 px-5 py-4">
                                    <div class="text-center">
                                        <div class="logo">
                                            @if (config('app.logo'))
                                                <img src="{{ asset('storage/images/' . config('app.logo')) }}"
                                                    height="50" alt="login-img">
                                            @else
                                                <img src="{{ asset('assets/images/logo.png') }}" height="50"
                                                    alt="login-img">
                                            @endif
                                        </div>
                                        <h3 class="text-primary mt-3">Register Now</h3>
                                    </div>
                                    <div class="p-2 mt-2">
                                        <form action="{{ route('register') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="redirect_url" value="{{ $redirect_url }}">
                                            <div class="mb-3">
                                                <label class="form-label" for="username">Full Name</label>
                                                <input type="text" class="form-control" id="username"
                                                    placeholder="Full name" value="{{ old('name') }}" name="name"
                                                    required>
                                                @error('name')
                                                    <span class="text-danger text-bold">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="username">Email Address</label>
                                                <input type="text" class="form-control" id="username"
                                                    placeholder="Email address" value="{{ old('email') }}" name="email"
                                                    required>
                                                @error('email')
                                                    <span class="text-danger text-bold">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="userpassword">Password</label>
                                                <input type="password" class="form-control" id="userpassword"
                                                    placeholder="Enter password" value="{{ old('password') }}"
                                                    name="password" required>
                                                @error('password')
                                                    <span class="text-danger text-bold">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="userpassword">Confirm Password</label>
                                                <input type="password" class="form-control" id="userpassword"
                                                    placeholder="Confirm password"
                                                    value="{{ old('password_confirmation') }}" name="password_confirmation"
                                                    required>
                                                @error('password_confirmation')
                                                    <span class="text-danger text-bold">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="auth-remember-check">
                                                <label class="form-check-label" for="auth-remember-check">Remember
                                                    me</label>
                                            </div>

                                            <div class="mt-3 text-end login-btn">
                                                <button class="" type="submit">Sign Up</button>
                                            </div>
                                            {{-- <div class="mt-4 text-center">
                                                <div class="mt-3 text-end login-btn">
                                                    <button class="" type="">
                                                        <a href="{{ route('login.google') }}">
                                                            <img src="{{ asset('assets/images/google-icon.png') }}" width="30px" alt="">
                                                            Continue with Google
                                                        </a>
                                                    </button>
                                                </div>
                                            </div> --}}
                                            <div class="mt-5 text-center">
                                                @if ($redirect_url === '/dashboard')
                                                    <p class="mb-0">Already have an account ? <a
                                                            href="{{ route('login') }}" class="fw-medium text-primary">
                                                            Login </a> </p>
                                                @else
                                                    <p class="mb-0">Already have an account ? <a
                                                            href="{{ route('login', ['redirect_url' => $redirect_url]) }}"
                                                            class="fw-medium text-primary">
                                                            Login </a> </p>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <p>©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Outreachlink Agency. Crafted with <i
                                class="mdi mdi-heart text-danger"></i> by Bitchip Digital
                        </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection
