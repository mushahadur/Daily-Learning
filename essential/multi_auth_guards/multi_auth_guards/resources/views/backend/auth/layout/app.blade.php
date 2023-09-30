<!DOCTYPE html>
<html lang="en">


    <!-- Mushahedur Rahman Khan @ software Developer -->
    <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="multi-role-permission">

        <!-- Title Content -->
    <title>@yield('title') - Admin Dashboard </title>

        <!-- Style CSS Section -->
    @include('backend.auth.layout.partials.style')

    </head>

    <body>
        <div class="loader"></div>
        <div id="app">
            <div class="main-wrapper main-wrapper-1">
                <div class="navbar-bg"></div>

               

                <!-- Main Content -->
                <div class="main-content">
                    <section class="section">
                        <div class="section-body">
                            <!-- add content here -->
                            @yield('content') 
                        </div>
                    </section>


                </div>

                <!-- Footer Section -->
                @include('backend.auth.layout.partials.footer')

            </div>
        </div>

        <!-- Style JS Section -->
        @include('backend.auth.layout.partials.script')

    </body>

<!-- Mushahedur Rahman Khan @ software Developer -->
</html>