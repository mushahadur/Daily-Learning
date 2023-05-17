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
    <body class="bg-white">

        @yield('content')

        <!-- JAVASCRIPT -->
        @include('admin.components.script')

    </body>
</html>