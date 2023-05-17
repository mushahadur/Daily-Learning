@extends('layouts.app')

@section('title')
    Outreach Link Agency | Content Edit Page
@endsection

@push('css')
    <!-- select2 css -->
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="{{ asset('assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Content Edit Page</span>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <form action="{{ route('content.update', $content->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-xl-6">
                        <div class="custom-accordion">
                            <div class="card">
                                <a href="#checkout-billinginfo-collapse" class="text-dark" data-bs-toggle="collapse">
                                    <div class="p-4">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <i class="mdi mdi-file-percent text-primary h2"></i>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-16 mb-1">Content Information</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                                <div id="checkout-billinginfo-collapse" class="collapse show">
                                    <div class="p-4 border-top">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="image">Content Name</label>
                                                        <input name="name" type="text" class="form-control"
                                                            placeholder="Content Name" value="{{ $content->name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="image">Content Price</label>
                                                        <input name="price" type="text" class="form-control"
                                                            placeholder="0.00" value="{{ $content->price }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="image">Description</label>
                                                <textarea id="elm1" name="description">{{ $content->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row my-4">
                            <div class="col">
                                <div class="text-end mt-2 mt-sm-0">
                                    <button type="submit" class="btn btn-otr-primary">
                                        <i class="uil uil-focus-add me-1"></i> Update Content </button>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row-->
                    </div>
                </form>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection
@push('script')
    <!--tinymce js-->
    <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
    <!-- init js -->
    <script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>
@endpush
