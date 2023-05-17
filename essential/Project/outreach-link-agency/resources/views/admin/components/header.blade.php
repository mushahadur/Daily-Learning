 @php
     $admin = Auth::guard('web')->user();
 @endphp
 <header id="page-topbar">
     <div class="navbar-header">
         <div class="d-flex">
             <!-- LOGO -->
             <div class="navbar-brand-box">
                 <a href="{{ route('dashboard') }}" class="logo logo-dark">
                     <span class="logo-sm">
                         @if (config('app.favicon'))
                             <img src="{{ asset('storage/images/' . config('app.favicon')) }}" alt="logo"
                                 height="22">
                         @else
                             <img src="{{ asset('assets/images/logo-small.png') }}" alt="logo" height="22">
                         @endif
                     </span>
                     <span class="logo-lg">
                         @if (config('app.logo'))
                             <img src="{{ asset('storage/images/' . config('app.logo')) }}" alt="logo"
                                 height="35">
                         @else
                             <img src="{{ asset('assets/images/logo.png') }}" alt="logo" height="35">
                         @endif
                     </span>
                 </a>
             </div>

             <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                 <i class="fa fa-fw fa-bars"></i>
             </button>
         </div>

         <div class="d-flex">

             <div class="dropdown d-none d-lg-inline-block ms-1">
                 <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                     <i class="uil-minus-path"></i>
                 </button>
             </div>
             <div class="dropdown d-inline-block">
                 <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <img class="rounded-circle header-profile-user"
                         src="{{ asset('storage/profile-image/' . Auth::user()->avatar) }}">
                     <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">
                         {{ Str::limit(Auth::user()->name, 15, $end = '..') ?? 'Name Here' }}
                     </span>
                     <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                 </button>
                 <div class="dropdown-menu dropdown-menu-end">
                     <!-- item-->
                     @if ($admin->can('Profile Header Button'))
                         <a class="dropdown-item" href="{{ route('profile.index') }}">
                             <i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i>
                             <span class="align-middle">View Profile</span>
                         </a>
                     @endif
                     <a class="dropdown-item d-block" href="{{ route('settings.view') }}">
                         <i class="uil uil-cog font-size-18 align-middle me-1 text-muted"></i>
                         <span class="align-middle">Settings</span>
                     </a>

                     <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i>
                         {{ __('Signout') }}
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                     </a>
                 </div>
             </div>
         </div>
     </div>
 </header>
