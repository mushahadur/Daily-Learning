@extends('layouts.app')
@php
    $admin = Auth::guard('web')->user();
@endphp
@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 header-style">Profile</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
                                <li class="breadcrumb-item active">
                                    {{ Str::limit(Auth::user()->name, 25, $end = '..') ?? 'N/A' }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row mb-4">
                <div class="col-xl-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="clearfix"></div>
                                <div class="text-center">
                                    <img src="{{ asset('storage/profile-image/' . $user->avatar) }}" alt="profile"
                                        class="avatar-lg rounded-circle img-thumbnail">
                                </div>
                                <h5 class="mt-3 mb-1">{{ Str::limit(Auth::user()->name, 25, $end = '..') ?? 'N/A' }}</h5>
                                <p class="text-muted">{{ Auth::user()->role_id ?? 'Account type' }}</p>
                            </div>

                            <hr class="my-4">
                            <div class="text-muted">
                                <div class="table-responsive mt-4">
                                    <div>
                                        <p class="mb-1">Name :</p>
                                        <h5 class="font-size-16">
                                            {{ Str::limit(Auth::user()->name, 25, $end = '..') ?? 'N/A' }}
                                        </h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Mobile :</p>
                                        <h5 class="font-size-16">
                                            {{ Str::limit(Auth::user()->phone, 17, $end = '..') ?? 'N/A' }}
                                        </h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Email :</p>
                                        <h5 class="font-size-16">
                                            {{ Str::limit(Auth::user()->email, 25, $end = '..') ?? 'N/A' }}
                                        </h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">City :</p>
                                        <h5 class="font-size-16">
                                            {{ Str::limit(Auth::user()->city, 25, $end = '..') ?? 'N/A' }}
                                        </h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Country :</p>
                                        <h5 class="font-size-16">
                                            {{ Str::limit(Auth::user()->country, 25, $end = '..') ?? 'N/A' }}
                                        </h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Address :</p>
                                        <h5 class="font-size-16">
                                            {{ Str::limit(Auth::user()->address, 35, $end = '..') ?? 'N/A' }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card mb-0">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#about" role="tab">
                                    <i class="uil uil-user-circle font-size-20"></i>
                                    <span class="d-none d-sm-block">Profile Update</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tasks" role="tab">
                                    <i class="uil-lock-alt font-size-20"></i>
                                    <span class="d-none d-sm-block">Password</span>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab content -->
                        <div class="tab-content p-4">
                            <div class="tab-pane active" id="about" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="card-title mb-4">Profile Edit</h4>
                                        <form class="outer-repeater" action="{{ route('profile.update', Auth::id()) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formname">Name :</label>
                                                        <input type="text" class="form-control" id="formname"
                                                            placeholder="Full Name" value="{{ Auth::user()->name }}"
                                                            name="name">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formname">Email :</label>
                                                        <input type="text" class="form-control" id="formname"
                                                            placeholder="Enter your Email"
                                                            value="{{ Auth::user()->email }}" disabled>
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formname">Phone :</label>
                                                        <input type="number" class="form-control" id="formname"
                                                            placeholder="Enter your Phone"
                                                            value="{{ Auth::user()->phone }}" name="phone">
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formname">Profile Photo :</label>
                                                        <input type="file" class="form-control" id="formname"
                                                            placeholder="Upload your profile photo" name="avatar">
                                                        @error('avatar')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formname">Address :</label>
                                                        <input type="text" class="form-control" id="formname"
                                                            placeholder="Enter user's address"
                                                            value="{{ Auth::user()->address }}" name="address">
                                                        @error('address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formname">City :</label>
                                                        <input type="text" class="form-control" id="formname"
                                                            placeholder="Enter user's city"
                                                            value="{{ Auth::user()->city }}" name="city">
                                                        @error('city')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formname">State :</label>
                                                        <input type="text" class="form-control" id="formname"
                                                            placeholder="Enter user's state"
                                                            value="{{ Auth::user()->state }}" name="state">
                                                        @error('state')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formname">Country :</label>
                                                        <select name="country" class="form-control" id="formname">
                                                            <option value="{{ Auth::user()->country }}">
                                                                {{ Auth::user()->country ?? 'Select Country' }}</option>
                                                            @foreach ($country_list as $item)
                                                                <option value="{{ $item->name }}">{{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('country')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($admin->can('Profile Update Button'))
                                                <div class="btn mt-3">
                                                    <button type="submit" class="btn btn-primary"> Update </button>
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tasks" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="card-title mb-4">Change Password</h4>
                                        <form class="outer-repeater" action="{{ route('password.update') }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formname">Enter Old Password
                                                            :</label>
                                                        <input type="password" class="form-control" id="formname"
                                                            placeholder="Enter old password" name="current_password">
                                                        @error('current_password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formname">New Password :</label>
                                                        <input type="password" class="form-control" id="formname"
                                                            placeholder="Enter new password" name="password">
                                                        @error('password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formname">Confirm New
                                                            Password:</label>
                                                        <input type="password" class="form-control" id="formname"
                                                            placeholder="Confirm new password"
                                                            name="password_confirmation">
                                                        @error('password_confirmation')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($admin->can('Password Update Button'))
                                                <div class="btn mt-3">
                                                    <button type="submit" class="btn btn-primary"> Update </button>
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
    </div>
    <!-- End Page-content -->
@endsection
@push('script')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            @php
                toast('' . "$error" . '', 'error');
            @endphp
        @endforeach
    @endif
@endpush
