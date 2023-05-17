@extends('layouts.app')

@section('title')
    Outreach Link Agency | Dashboard Page
@endsection

@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Dashboard</span>
                    </div>
                </div>
            </div><!-- end row-->
            <!-- end page title -->

            <!-- Start User Name display -->
            @include('admin.pages.dashboard._auth_user_display')
            <!-- End User Name display -->

            <!-- Start Summery Card -->
            @include('admin.pages.dashboard._summery_card')
            <!-- End Summery Card -->

            <!-- Start Sales Analytics -->
            @include('admin.pages.dashboard._sales_analytics')
            <!-- End Sales Analytics -->

            <!-- Start Latest Transaction -->
            @include('admin.pages.dashboard._latest_transaction')
            <!-- End Latest Transaction -->

        </div> <!-- container-fluid -->
    </div>
@endsection
