 @php
     $admin = Auth::guard('web')->user();
 @endphp
 <div class="vertical-menu">
     <!-- LOGO -->
     <div class="navbar-brand-box">
         <a href="{{ route('dashboard') }}" class="logo logo-dark">
             <span class="logo-sm">
                 @if (config('app.favicon'))
                     <img src="{{ asset('storage/images/' . config('app.favicon')) }}" alt="logo" height="22">
                 @else
                     <img src="{{ asset('assets/images/logo-small.png') }}" alt="logo" height="22">
                 @endif
             </span>
             <span class="logo-lg">
                 @if (config('app.logo'))
                     <img src="{{ asset('storage/images/' . config('app.logo')) }}" alt="logo" height="35">
                 @else
                     <img src="{{ asset('assets/images/logo.png') }}" alt="logo" height="35">
                 @endif
             </span>
         </a>
     </div>

     <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
         <i class="fa fa-fw fa-bars"></i>
     </button>

     <div data-simplebar class="sidebar-menu-scroll">
         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <ul class="metismenu list-unstyled" id="side-menu">
                 <li class="menu-title">Menu</li>
                 @if ($admin->can('Dashboard Sidebar Button'))
                     <li>
                         <a href="{{ route('dashboard') }}">
                             <i class="uil-home-alt"></i>
                             <span>Dashboard</span>
                         </a>
                     </li>
                 @endif
                 @if ($admin->can('Settings Sidebar Button'))
                     <li>
                         <a href="{{ route('settings.view') }}">
                             <i class="uil-cog"></i>
                             <span>Settings</span>
                         </a>
                     </li>
                 @endif
                 <li class="menu-title">Permission</li>
                 @if ($admin->can('Role Sidebar Button'))
                     <li>
                         <a href="{{ route('role.index') }}" class="waves-effect">
                             <i class="mdi mdi-account-cog"></i>
                             <span>Role</span>
                         </a>
                     </li>
                 @endif
                 @if ($admin->can('User Sidebar Button'))
                     <li>
                         <a href="{{ route('user-create.index') }}" class="waves-effect">
                             <i class="uil-user-circle"></i>
                             <span>User</span>
                         </a>
                     </li>
                 @endif

                 @if (
                     $admin->can('Explore Sites Sidebar Button') ||
                         $admin->can('Explore Header Sidebar Button') ||
                         $admin->can('Explore Sub Header Sidebar Button') ||
                         $admin->can('Explore Categories Sidebar Button') ||
                         $admin->can('Explore Countries Sidebar Button') ||
                         $admin->can('Explore Languages Sidebar Button') ||
                         $admin->can('Explore Publication Sidebar Button') ||
                         $admin->can('Explore Hyperlink Sidebar Button') ||
                         $admin->can('Exploresites Sidebar Button'))
                     <li class="menu-title">ACTIVITY</li>
                     <li>
                         @if ($admin->can('User Sidebar Button'))
                             <a href="#" class="has-arrow waves-effect">
                                 <i class="uil-search"></i>
                                 <span>Explore Sites</span>
                             </a>
                         @endif
                         <ul class="sub-menu" aria-expanded="false">
                             @if ($admin->can('Explore Header Sidebar Button'))
                                 <li><a href="{{ route('explore_header.index') }}">Explore Headers</a></li>
                             @endif
                             @if ($admin->can('Explore Sub Header Sidebar Button'))
                                 <li><a href="{{ route('explore_sub_header.index') }}">Explore Sub Headers</a></li>
                             @endif
                             @if ($admin->can('Explore Categories Sidebar Button'))
                                 <li><a href="{{ route('explore_category.index') }}">Explore Categories</a></li>
                             @endif
                             @if ($admin->can('Explore Countries Sidebar Button'))
                                 <li><a href="{{ route('explore_country') }}">Explore Countries</a></li>
                             @endif
                             @if ($admin->can('Explore Languages Sidebar Button'))
                                 <li><a href="{{ route('explore_language') }}">Explore Languages</a></li>
                             @endif
                             @if ($admin->can('Explore Publication Sidebar Button'))
                                 <li><a href="{{ route('explore_publication_type.index') }}">Publication Type</a></li>
                             @endif
                             @if ($admin->can('Explore Hyperlink Sidebar Button'))
                                 <li><a href="{{ route('explore_hyperlink_type.index') }}">Hyperlink Type</a></li>
                             @endif
                             @if ($admin->can('Exploresites Sidebar Button'))
                                 <li><a href="{{ route('explore_site.index') }}">Explore Sites</a></li>
                             @endif
                         </ul>
                     </li>
                 @endif
                 @if ($admin->can('Explore Services Sidebar Button') || $admin->can('Content Writing Sidebar Button'))
                     <li>
                         @if ($admin->can('Explore Services Sidebar Button'))
                             <a href="#" class="has-arrow waves-effect">
                                 <i class="mdi mdi-room-service"></i>
                                 <span>Explore Services</span>
                             </a>
                         @endif
                         <ul class="sub-menu" aria-expanded="false">
                             @if ($admin->can('Content Writing Sidebar Button'))
                                 <li>
                                     <a href="{{ route('service_buy_content_word_length.index') }}">Content Writing &
                                         Publishing</a>
                                 </li>
                             @endif
                         </ul>
                     </li>
                 @endif
                 @if (
                     $admin->can('Package Sidebar Button') ||
                         $admin->can('Package List Sidebar Button') ||
                         $admin->can('Package Create'))
                     <li>
                         @if ($admin->can('Package Sidebar Button'))
                             <a href="#" class="has-arrow waves-effect">
                                 <i class="mdi mdi-package"></i>
                                 <span>Packages</span>
                             </a>
                         @endif
                         <ul class="sub-menu" aria-expanded="false">
                             @if ($admin->can('Package List Sidebar Button'))
                                 <li><a href="{{ route('package.index') }}">Package List</a></li>
                             @endif
                             @if ($admin->can('Package Create'))
                                 <li><a href="{{ route('package.create') }}">Package Add</a></li>
                             @endif
                         </ul>
                     </li>
                 @endif
                 @if ($admin->can('Content Sidebar Button') || $admin->can('Content List Sidebar Button'))
                     <li>
                         @if ($admin->can('Content Sidebar Button'))
                             <a href="#" class="has-arrow waves-effect">
                                 <i class="bx bxs-book-content"></i>
                                 <span>Content</span>
                             </a>
                         @endif
                         <ul class="sub-menu" aria-expanded="false">
                             @if ($admin->can('Content List Sidebar Button'))
                                 <li><a href="{{ route('content.index') }}">Content Lists</a></li>
                             @endif
                         </ul>
                     </li>
                 @endif
                 @if (
                     $admin->can('Subscription Sidebar Button') ||
                         $admin->can('Subscription Plan List Sidebar Button') ||
                         $admin->can('Subscription List Sidebar Button') ||
                         $admin->can('Subscription Create'))
                     <li class="menu-title">Subscription</li>
                     <li>
                         @if ($admin->can('Subscription Sidebar Button'))
                             <a href="#" class="has-arrow waves-effect">
                                 <i class="bx bxs-inbox"></i>
                                 <span>Subscription Plan</span>
                             </a>
                         @endif
                         <ul class="sub-menu" aria-expanded="false">
                             @if ($admin->can('Subscription Plan List Sidebar Button'))
                                 <li><a href="{{ route('subscription-plan.index') }}">Plan list</a></li>
                             @endif
                             @if ($admin->can('Subscription Create'))
                                 <li><a href="{{ route('subscription-plan.create') }}">Add new plan</a></li>
                             @endif
                         </ul>
                     </li>
                     <li>
                         @if ($admin->can('Subscription List Sidebar Button'))
                             <a href="{{ route('subscription.list') }}" class="waves-effect">
                                 <i class="mdi mdi-youtube-subscription"></i>
                                 <span>Subscription Lists</span>
                             </a>
                         @endif
                     </li>
                 @endif
                 @if (
                     $admin->can('Exploresite Order Sidebar Button') ||
                         $admin->can('Content Order Sidebar Button') ||
                         $admin->can('Package Order Sidebar Button'))
                     <li class="menu-title">Order</li>
                     <li>
                         @if ($admin->can('Exploresite Order Sidebar Button'))
                             <a href="{{ route('explore_service_order') }}" class="waves-effect">
                                 <i class="mdi mdi-shopping"></i>
                                 <span>Explore Site Order</span>
                             </a>
                         @endif
                     </li>
                     <li>
                         @if ($admin->can('Content Order Sidebar Button'))
                             <a href="{{ route('contentorder.index') }}" class="waves-effect">
                                 <i class="mdi mdi-shopping-search"></i>
                                 <span>Content Order</span>
                             </a>
                         @endif
                     </li>
                     <li>
                         @if ($admin->can('Package Order Sidebar Button'))
                             <a href="{{ route('packageorder.index') }}" class="waves-effect">
                                 <i class="uil-package"></i>
                                 <span>Package Order</span>
                             </a>
                         @endif
                     </li>
                 @endif

                 <li class="menu-title">Billing</li>

                 <li>
                     @if ($admin->can('Invoice Sidebar Button'))
                         <a href="{{ route('admin_invoice.index') }}" class="waves-effect">
                             <i class="uil-invoice"></i>
                             <span>Invoice Lists</span>
                         </a>
                     @endif
                 </li>
                 <li class="menu-title">Marketing</li>

                 <li>
                     @if ($admin->can('Coupon Sidebar Button'))
                         <a href="{{ route('coupon.index') }}" class="waves-effect">
                             <i class="mdi mdi-brightness-percent"></i>
                             <span>Coupons</span>
                         </a>
                     @endif
                 </li>

                 @if (
                     $admin->can('Site Order Report Sidebar Button') ||
                         $admin->can('Content Order Report Sidebar Button') ||
                         $admin->can('Package Order Report Sidebar Button'))
                     <li class="menu-title">Report</li>
                     <li>
                         @if ($admin->can('Site Order Report Sidebar Button'))
                             <a href="{{ route('site-order.index') }}" class="waves-effect">
                                 <i class="fas fa-clipboard-list"></i>
                                 <span>Site Order Report</span>
                             </a>
                         @endif
                     </li>
                     <li>
                         @if ($admin->can('Content Order Report Sidebar Button'))
                             <a href="{{ route('content-order.index') }}" class="waves-effect">
                                 <i class="fas fa-clipboard-list"></i>
                                 <span>Content Order Report</span>
                             </a>
                         @endif
                     </li>
                     <li>
                         @if ($admin->can('Package Order Report Sidebar Button'))
                             <a href="{{ route('package-order.index') }}" class="waves-effect">
                                 <i class="fas fa-clipboard-list"></i>
                                 <span>Package Order Report</span>
                             </a>
                         @endif
                     </li>
                 @endif
                 <li class="menu-title">Contact</li>

                 <li>
                     @if ($admin->can('Message List Sidebar Button'))
                         <a href="{{ route('admin_contact.index') }}" class="waves-effect">
                             <i class="uil-message"></i>
                             <span>Message Lists</span>
                         </a>
                     @endif
                 </li>


             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
