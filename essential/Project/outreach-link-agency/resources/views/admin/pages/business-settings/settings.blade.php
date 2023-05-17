@extends('layouts.app')

@php
    $admin = Auth::guard('web')->user();
@endphp

@section('title')
    Outreach Link Agency | Business Settings
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Business Settings</span>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                <li class="breadcrumb-item active">Wizard</li> --}}
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4"></h4>

                            <div id="basic-example">
                                <!-- basic information -->
                                <h3>Basic Information</h3>
                                <section id="basic_info">
                                    <form action="{{ route('settings.update', ['type' => 'general_settings']) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input"><b>Company name</b> <span
                                                            style="color: red">*</span> </label>
                                                    <input value="{{ $businessSettings->name }}" name="name"
                                                        type="text" class="form-control" id="basicpill-firstname-input"
                                                        placeholder="Enter company name">
                                                    @error('name')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-lastname-input"><b>Company Email</b> <span
                                                            style="color: red">*</span> </label>
                                                    <input value="{{ $businessSettings->email }}" name="email"
                                                        type="email" class="form-control" id="basicpill-lastname-input"
                                                        placeholder="Enter company email">
                                                    @error('email')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-phoneno-input"><b>Company Phone</b> <span
                                                            style="color: red">*</span> </label>
                                                    <input value="{{ $businessSettings->contact }}" name="contact"
                                                        type="number" class="form-control" id="basicpill-phoneno-input"
                                                        placeholder="Enter company's phone number">
                                                    @error('contact')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-email-input"><b>Company Slogan</b> </label>
                                                    <textarea name="tagline" id="basicpill-address-input" class="form-control" rows="1"
                                                        placeholder="Enter company slogan">{{ $businessSettings->tagline }}</textarea>
                                                    @error('tagline')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-address-input"><b>Company Favicon</b> </label>
                                                    <input name="favicon" type="file" class="form-control"
                                                        id="basicpill-phoneno-input" placeholder="Enter company's Favicon">
                                                    @error('favicon')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-address-input"><b>Company Logo</b> </label>
                                                    <input name="logo" type="file" class="form-control"
                                                        id="basicpill-phoneno-input" placeholder="Enter company's logo">
                                                    @error('logo')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-address-input"><b>Office start time</b> </label>
                                                    <input value="{{ $businessSettings->office_start }}"
                                                        name="office_start" type="time" class="form-control"
                                                        id="basicpill-phoneno-input"
                                                        placeholder="Enter company's start time">
                                                    @error('office_start')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-address-input"><b>Office end time</b> </label>
                                                    <input value="{{ $businessSettings->office_end }}" name="office_end"
                                                        type="time" class="form-control" id="basicpill-phoneno-input"
                                                        placeholder="Enter company's end time">
                                                    @error('office_end')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <div class="mb-3">
                                                        <label for="basicpill-address-input"><b>Address</b> <span
                                                                style="color: red">*</span> </label>
                                                        <textarea name="address" id="basicpill-address-input" class="form-control" rows="3"
                                                            placeholder="Enter company address">{{ $businessSettings->address }}</textarea>
                                                        @error('address')
                                                            <span style="color: red">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <button style="margin-top: 25px;" class="btn btn-primary"
                                                        type="submit">Update</button>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 ">
                                                <div class="md-3">
                                                    {{-- <button  class="btn btn-primary" type="submit">Update</button> --}}
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </section>

                                <!-- social setting -->
                                <h3>Company Social Page</h3>
                                <section>
                                    <form action="{{ route('settings.update', ['type' => 'social_link']) }}"
                                        method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-pancard-input">Website Link</label>
                                                    <input name="website_link"
                                                        value="{{ $businessSettings->website_link }}" type="text"
                                                        class="form-control" id="basicpill-pancard-input"
                                                        placeholder="Enter company website link" />
                                                    @error('website_link')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div><!-- end col-lg-6 -->

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-vatno-input">Facebook</label>
                                                    <input name="facebook" value="{{ $businessSettings->facebook }}"
                                                        type="url" class="form-control" id="basicpill-vatno-input"
                                                        placeholder="Enter company's facebook page link">
                                                    @error('facebook')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-cstno-input">Linkedin</label>
                                                    <input name="linkedin" value="{{ $businessSettings->linkedin }}"
                                                        type="url" class="form-control" id="basicpill-cstno-input"
                                                        placeholder="Enter company's linked page link">
                                                    @error('linkedin')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div><!-- end col-lg-6 -->

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input">Youtube</label>
                                                    <input name="youtube" value="{{ $businessSettings->youtube }}"
                                                        type="url" class="form-control"
                                                        id="basicpill-servicetax-input"
                                                        placeholder="Enter company's youtube link">
                                                    @error('youtube')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                        </div>

                                        @if ($admin->can('Settings Update Button'))
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <button style="margin-top: 25px;" class="btn btn-primary"
                                                            type="submit">Update</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 ">
                                                    <div class="md-3">
                                                        {{-- <button  class="btn btn-primary" type="submit">Update</button> --}}
                                                    </div>

                                                </div>
                                            </div>
                                        @endif
                                    </form>
                                </section>

                                <!-- mail settings -->
                                <h3>Mail Configaration</h3>
                                <section>
                                    <div>
                                        <form action="{{ route('settings.update', ['type' => 'mail_settings']) }}"
                                            method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-pancard-input">Mail Mailer <span
                                                                style="color: red">*</span> </label>
                                                        <input name="mail_mailer"
                                                            value="{{ $businessSettings->mail_mailer }}" type="text"
                                                            class="form-control" id="basicpill-pancard-input"
                                                            placeholder="E.g: smtp" />
                                                        @error('mail_mailer')
                                                            <span style="color: red">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div><!-- end col-lg-6 -->

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-vatno-input">Mail Host <span
                                                                style="color: red">*</span> </label>
                                                        <input name="mail_host"
                                                            value="{{ $businessSettings->mail_host }}" type="text"
                                                            class="form-control" id="basicpill-vatno-input"
                                                            placeholder="E.g: smtp.mailtrap.io">
                                                        @error('mail_host')
                                                            <span style="color: red">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                            </div><!-- end row -->
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-cstno-input">Mail Port <span
                                                                style="color: red">*</span> </label>
                                                        <input name="mail_port"
                                                            value="{{ $businessSettings->mail_port }}" type="text"
                                                            class="form-control" id="basicpill-cstno-input"
                                                            placeholder="E.g: 2525">
                                                        @error('mail_port')
                                                            <span style="color: red">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div><!-- end col-lg-6 -->

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-servicetax-input">Mail Username <span
                                                                style="color: red">*</span> </label>
                                                        <input name="mail_username"
                                                            value="{{ $businessSettings->mail_username }}" type="text"
                                                            class="form-control" id="basicpill-servicetax-input"
                                                            placeholder="E.g: 9f38517146aa3b">
                                                        @error('mail_username')
                                                            <span style="color: red">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                            </div><!-- end row -->
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-cstno-input">Mail Password <span
                                                                style="color: red">*</span> </label>
                                                        <input name="mail_password"
                                                            value="{{ $businessSettings->mail_password }}" type="text"
                                                            class="form-control" id="basicpill-cstno-input"
                                                            placeholder="E.g: b4bac5d90f05d7">
                                                        @error('mail_password')
                                                            <span style="color: red">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div><!-- end col-lg-6 -->

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-servicetax-input">Mail Encryption <span
                                                                style="color: red">*</span> </label>
                                                        <input name="mail_encryption"
                                                            value="{{ $businessSettings->mail_encryption }}"
                                                            type="text" class="form-control"
                                                            id="basicpill-servicetax-input" placeholder="E.g: tls">
                                                        @error('mail_encryption')
                                                            <span style="color: red">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                            </div><!-- end row -->
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-cstno-input">Mail form <span
                                                                style="color: red">*</span> </label>
                                                        <input name="mail_from_address"
                                                            value="{{ $businessSettings->mail_from_address }}"
                                                            type="text" class="form-control"
                                                            id="basicpill-cstno-input"
                                                            placeholder="E.g: example@gmail.com">
                                                        @error('mail_from_address')
                                                            <span style="color: red">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-cstno-input">Mail form name <span
                                                                style="color: red">*</span> </label>
                                                        <input name="mail_from_name"
                                                            value="{{ $businessSettings->mail_from_name }}"
                                                            type="text" class="form-control"
                                                            id="basicpill-cstno-input"
                                                            placeholder="E.g: example@gmail.com">
                                                        @error('mail_from_name')
                                                            <span style="color: red">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                            </div><!-- end row -->
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <button style="margin-top: 25px;" class="btn btn-primary"
                                                            type="submit">Update</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 ">
                                                    <div class="md-3">
                                                        {{-- <button  class="btn btn-primary" type="submit">Update</button> --}}
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </section>

                                {{-- payment getway setup --}}
                                <h3>Payment Getway</h3>
                                <section>
                                    <div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div id="addproduct-accordion" class="custom-accordion">
                                                    <div class="card">
                                                        <a href="#addrecurring-service" class="text-dark collapsed"
                                                            data-bs-toggle="collapse" aria-haspopup="true"
                                                            aria-expanded="false" aria-haspopup="true"
                                                            aria-controls="addrecurring-service">
                                                            <div class="p-4">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0 me-3">
                                                                        <div class="avatar-xs">
                                                                            <div
                                                                                class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                                <i class="uil-dollar-sign-alt"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <h5 class="font-size-16 mb-1">Paypal Settings</h5>
                                                                        <p class="text-muted text-truncate mb-0">Fill all
                                                                            information below</p>
                                                                    </div>
                                                                    <div class="flex-shrink-0">
                                                                        <i
                                                                            class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <div id="addrecurring-service" class="collapse"
                                                            data-bs-parent="#addproduct-accordion">
                                                            <div class="p-4 border-top">
                                                                <div class="row">
                                                                    <form
                                                                        action="{{ route('settings.update', ['type' => 'paypal_settings']) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="custom-control custom-switch">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        name="is_paypal_active"
                                                                                        {{ $businessSettings->is_paypal_active == 1 ? 'checked' : '' }} />
                                                                                    <label
                                                                                        for="basicpill-pancard-input">Paypal
                                                                                        Status<span
                                                                                            style="color: red">*</span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        for="basicpill-pancard-input">Paypal
                                                                                        Mode<span
                                                                                            style="color: red">*</span>
                                                                                    </label>
                                                                                    <input name="paypal_mode"
                                                                                        value="{{ $businessSettings->paypal_mode }}"
                                                                                        type="text"
                                                                                        class="form-control"
                                                                                        id="basicpill-pancard-input"
                                                                                        placeholder="E.g: sandbox" />
                                                                                    @error('paypal_mode')
                                                                                        <span
                                                                                            style="color: red">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div><!-- end col-lg-6 -->

                                                                            <div class="col-lg-6">
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        for="basicpill-vatno-input">Client
                                                                                        Id <span
                                                                                            style="color: red">*</span>
                                                                                    </label>
                                                                                    <input name="paypal_client_id"
                                                                                        value="{{ $businessSettings->paypal_client_id }}"
                                                                                        type="text"
                                                                                        class="form-control"
                                                                                        id="basicpill-vatno-input"
                                                                                        placeholder="E.g: xxxxx-xxx-xx">
                                                                                    @error('paypal_sandbox_api_username')
                                                                                        <span
                                                                                            style="color: red">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div><!-- end col-lg-6 -->
                                                                        </div><!-- end row -->
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        for="basicpill-cstno-input">Client
                                                                                        Secret <span
                                                                                            style="color: red">*</span>
                                                                                    </label>
                                                                                    <input name="paypal_client_secret"
                                                                                        value="{{ $businessSettings->paypal_client_secret }}"
                                                                                        type="text"
                                                                                        class="form-control"
                                                                                        id="basicpill-cstno-input"
                                                                                        placeholder="E.g: abc123">
                                                                                    @error('paypal_sandbox_api_password')
                                                                                        <span
                                                                                            style="color: red">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div><!-- end col-lg-6 -->

                                                                            <div class="col-lg-6">
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        for="basicpill-cstno-input">Currency
                                                                                        <span style="color: red">*</span>
                                                                                    </label>
                                                                                    <input name="paypal_currency"
                                                                                        value="{{ $businessSettings->paypal_currency }}"
                                                                                        type="text"
                                                                                        class="form-control"
                                                                                        id="basicpill-cstno-input"
                                                                                        placeholder="E.g: USD">
                                                                                    @error('paypal_currency')
                                                                                        <span
                                                                                            style="color: red">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div><!-- end col-lg-6 -->
                                                                        </div><!-- end row -->

                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        for="basicpill-cstno-input">Paypal
                                                                                        Test Mode<span
                                                                                            style="color: red">*</span>
                                                                                    </label>
                                                                                    <select name="paypal_test_mode"
                                                                                        class="form-select"
                                                                                        aria-label="Default select example">
                                                                                        <option
                                                                                            {{ $businessSettings->paypal_test_mode == 1 ? 'selected' : '' }}
                                                                                            value="1">True
                                                                                        </option>
                                                                                        <option
                                                                                            {{ $businessSettings->paypal_test_mode == 0 ? 'selected' : '' }}
                                                                                            value="0">False
                                                                                        </option>
                                                                                    </select>
                                                                                    @error('paypal_test_mode')
                                                                                        <span
                                                                                            style="color: red">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="mb-3">
                                                                                    <button style="margin-top: 25px;"
                                                                                        class="btn btn-primary"
                                                                                        type="submit">Update</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 ">
                                                                                <div class="md-3">
                                                                                    {{-- <button  class="btn btn-primary" type="submit">Update</button> --}}
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <a href="#addvisibility" class="text-dark collapsed"
                                                            data-bs-toggle="collapse" aria-haspopup="true"
                                                            aria-expanded="false" aria-haspopup="true"
                                                            aria-controls="addvisibility">
                                                            <div class="p-4">

                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0 me-3">
                                                                        <div class="avatar-xs">
                                                                            <div
                                                                                class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                                <i class="uil-dollar-sign-alt"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <h5 class="font-size-16 mb-1">Stripe Payment</h5>
                                                                        <p class="text-muted text-truncate mb-0">Fill all
                                                                            information below</p>
                                                                    </div>
                                                                    <div class="flex-shrink-0">
                                                                        <i
                                                                            class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </a>
                                                        <div id="addvisibility" class="collapse"
                                                            data-bs-parent="#addproduct-accordion">
                                                            <div class="p-4 border-top">
                                                                <div class="row">
                                                                    <form
                                                                        action="{{ route('settings.update', ['type' => 'stripe_settings']) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="custom-control custom-switch">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        name="is_stripe_active"
                                                                                        {{ $businessSettings->is_stripe_active == 1 ? 'checked' : '' }} />
                                                                                    <label
                                                                                        for="basicpill-pancard-input">Stripe
                                                                                        Status<span
                                                                                            style="color: red">*</span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        for="basicpill-pancard-input">Stripe
                                                                                        Key<span
                                                                                            style="color: red">*</span>
                                                                                    </label>
                                                                                    <input name="stripe_key"
                                                                                        value="{{ $businessSettings->stripe_key }}"
                                                                                        type="text"
                                                                                        class="form-control"
                                                                                        id="basicpill-pancard-input"
                                                                                        placeholder="E.g: sandbox" />
                                                                                    @error('stripe_key')
                                                                                        <span
                                                                                            style="color: red">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div><!-- end col-lg-6 -->

                                                                            <div class="col-lg-6">
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        for="basicpill-vatno-input">Stripe
                                                                                        Secret<span
                                                                                            style="color: red">*</span>
                                                                                    </label>
                                                                                    <input name="stripe_secret"
                                                                                        value="{{ $businessSettings->stripe_secret }}"
                                                                                        type="text"
                                                                                        class="form-control"
                                                                                        id="basicpill-vatno-input"
                                                                                        placeholder="E.g: xxxxx-xxx-xx">
                                                                                    @error('stripe_secret')
                                                                                        <span
                                                                                            style="color: red">{{ $message }}</span>stripe_secret
                                                                                    @enderror
                                                                                </div>
                                                                            </div><!-- end col-lg-6 -->
                                                                        </div><!-- end row -->

                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="mb-3">
                                                                                    <button style="margin-top: 25px;"
                                                                                        class="btn btn-primary"
                                                                                        type="submit">Update</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 ">
                                                                                <div class="md-3">
                                                                                    {{-- <button  class="btn btn-primary" type="submit">Update</button> --}}
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                </section>

                                <!-- Dashboard Button Selection -->
                                <h3>Dashboard Button Selection</h3>
                                <section>
                                    <form action="{{ route('settings.update', ['type' => 'dashboard_button']) }}"
                                        method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div>
                                                    @foreach ($dashboard_buttons->take(20) as $item)
                                                        <div class="d-flex justify-content-between my-2">
                                                            <label for="">{{ $item->name }}</label>
                                                            <input type="checkbox" id="switch{{ $item->id }}"
                                                                switch="none" class="bg-success"
                                                                value="1 {{ old('$item->status') ? 'checked="checked"' : '' }}"
                                                                name="button[{{ $item->id }}]"
                                                                @if ($item->status == 1) @checked(true)@else @checked(false) @endif />
                                                            <label for="switch{{ $item->id }}" data-on-label="On"
                                                                data-off-label="Off"></label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div><!-- end row -->
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <button style="margin-top: 25px;" class="btn btn-primary"
                                                        type="submit">Update</button>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 ">
                                                <div class="md-3">
                                                    {{-- <button  class="btn btn-primary" type="submit">Update</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </div>

                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection
@push('script')
    <!-- jquery step -->
    <script src="{{ asset('assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <!-- form wizard init -->
    <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>
    <!-- Show all error in toast -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            @php
                toast('' . "$error" . '', 'error');
            @endphp
        @endforeach
    @endif
@endpush
