@extends('layouts.app')

@section('title')
    Outreach Link Agency | Edit Explore Site
@endsection

@push('style')
    <!-- select2 css -->
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Edit New Explore Site</h4>
                    </div>
                </div>
            </div><!-- end row-->
            <div class="row">
                <div class="col-md-12">
                    @include('admin.pages.explore_site._form')
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
@endsection


@push('script')
    @include('components.select2-script');

    <script>
        $('document').ready(function() {
            $('.serviceType-enable').on('click', function() {
                let id = $(this).attr('data-id')
                let enabled = $(this).is(":checked")
                $('.serviceType-amount[data-id="' + id + '"]').attr('disabled', !enabled)
                $('.serviceType-amount[data-id="' + id + '"]').val(null)
            })
        });
    </script>
@endpush
