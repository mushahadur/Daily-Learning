@extends('layouts.app')

@section('title')
    Outreach Link Agency | User Create Page
@endsection

@push('style')
    <!-- select2 css -->
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">User Create Page</span>
                    </div>
                </div>
            </div>
            <form action="{{ route('user-create.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div id="addproduct-accordion" class="custom-accordion">
                            <div class="card">
                                <a href="#addproduct-billinginfo-collapse" class="text-dark" data-bs-toggle="collapse"
                                    aria-expanded="true" aria-controls="addproduct-billinginfo-collapse">
                                    <div class="p-4">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-16 mb-1">User Information</h5>
                                                <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                            </div>

                                        </div>
                                    </div>
                                </a>
                                <div id="addproduct-billinginfo-collapse" class="collapse show"
                                    data-bs-parent="#addproduct-accordion">
                                    <div class="p-4 border-top">
                                        <div class="mb-3">
                                            <label class="form-label" for="name">User Name</label>
                                            <input id="name" name="name" type="text" class="form-control"
                                                value="{{ old('name') }}" placeholder="Enter User Name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">

                                                <div class="mb-3">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input id="email" name="email" type="text" class="form-control"
                                                        value="{{ old('email') }}" placeholder="Enter User Email">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">

                                                <div class="mb-3">
                                                    <label class="form-label" for="phone">Phone</label>
                                                    <input id="phone" name="phone" type="number" class="form-control"
                                                        value="{{ old('phone') }}" placeholder="Enter User Phone Number">
                                                    @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" class="control-label">Assign Role For
                                                        User</label>
                                                    <select class="form-control" name="roles">
                                                        <option value="">Select Role</option>
                                                        @foreach ($roles as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('roles')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="image">Image</label>
                                                    <input name="image" type="file" class="form-control">
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="password">Password</label>
                                                    <input id="email" name="password" type="password"
                                                        class="form-control" placeholder="Enter New Password">
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="password_confirmation">Confirm
                                                        Password</label>
                                                    <input id="phone" name="password_confirmation" type="password"
                                                        class="form-control" placeholder="Enter Confirm Password"
                                                        autocomplete="new-password">
                                                    @error('password_confirmation')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col ms-auto">
                        <div class="d-flex flex-reverse flex-wrap gap-2">
                            <button type="submit" class="btn btn-otr-primary"> <i class="uil uil-file-alt"></i> Create
                                User </button>
                        </div>
                    </div> <!-- end col -->
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <!-- select 2 plugin -->
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

    <!-- dropzone plugin -->
    <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/js/pages/ecommerce-add-product.init.js') }}"></script>
@endpush
