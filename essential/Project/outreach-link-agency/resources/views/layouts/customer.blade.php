<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">

    <!-- ========== Style ========== -->

    @include('admin.components.style')

    <!-- Style End -->

</head>


<body>

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ========== Header Section Start ========== -->

        @include('customer.components.header')

        <!-- ========== Left Sidebar Start ========== -->

        @include('customer.components.left-bar')

        <!-- Left Sidebar End -->

        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <!-- ========== Page-content Start ========== -->

            @yield('dashboard')
            @yield('content')

            <!-- End Page-content -->

            <!-- ========== Footer Start ========== -->

            @include('admin.components.footer')

            <!-- Footer End -->
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Sweet Alert -->
    @include('sweetalert::alert')

    <!-- JAVASCRIPT -->
    @include('admin.components.script')
    @include('customer.components.tawk-script')

</body>

</html>
