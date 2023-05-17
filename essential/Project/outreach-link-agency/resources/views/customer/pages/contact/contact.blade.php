@extends('layouts.customer')

@section('title')
    Outreach Link Agency | Contact
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-12">
                    <span class="header-style">Contact Us</span>
                </div>
            </div>
            <!-- start Form -->
            <div class="row">
                <form class="contact-us-form" action="{{ route('contact.store') }}" method="Post">
                    @csrf
                    <div class="col-12">
                        <div class="shadow bg-white rounded p-4">
                            <select class="form-select form-control" name="subject" id="subject"
                                aria-label="Default select example">
                                <option value="">Choose Subject</option>
                                <option value="account">Account</option>
                                <option value="order">Order</option>
                                <option value="wallet">Wallet</option>
                                <option value="others">Others</option>
                            </select>
                            @error('subject')
                                    <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="col mt-3">
                                <textarea class="form-control" cols="30" rows="16" placeholder="Your message here" name="message"
                                    id="message"></textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="actions text-center mt-4">
                                <button type="submit" class="btn btn-primary px-4 py-2">Send Message </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end form-->
        </div>
    </div>
@endsection
