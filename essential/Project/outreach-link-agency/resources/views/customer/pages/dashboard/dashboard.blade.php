@extends('layouts.customer')

@section('title')
    Outreach Link Agency | Dashboard Page
@endsection

@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">
            <!-- Start User Name display -->
            @include('customer.pages.dashboard._auth_user_display')
            <!-- End User Name display -->

            <!-- User Dashboard Summery Card -->
            @include('customer.pages.dashboard._summery_card')
            <!-- User Dashboard Summery Card -->

            <!-- Dashboard Button Card -->
            @include('customer.pages.dashboard._dashboard_button')
            <!-- Dashboard Button Card -->
        </div>
    </div>
@endsection
