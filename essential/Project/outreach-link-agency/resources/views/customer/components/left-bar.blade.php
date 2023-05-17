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
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-title">Manage</li>
                <li>
                    <a href="{{ route('sites.index') }}">
                        <i class="mdi mdi-spider-web"></i>
                        <span>Explore Sites</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('order.index') }}">
                        <i class="uil-bag"></i>
                        <span>Order</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="mdi mdi-book-open-outline"></i>
                        <span>Content</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('content-buy.index') }}">Buy Content</a></li>
                        <li><a href="{{ route('content-order.view') }}">Content Orders</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="mdi mdi-package-variant"></i>
                        <span>Package</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('package-buy.index') }}">Buy Package</a></li>
                        <li><a href="{{ route('package-order.view') }}">Package Orders</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('campaign.index') }}" class="waves-effect">
                        <i class="mdi mdi-bullhorn-outline"></i>
                        <span>Campaigns</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('wallet.index') }}" class="waves-effect">
                        <i class="mdi mdi-wallet-outline"></i>
                        <span>Wallet</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('subscription.index') }}">
                        <i class="mdi mdi-bitcoin"></i>
                        <span>Subscription</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('invoice.index') }}">
                        <i class="uil-invoice"></i>
                        <span>Invoice</span>
                    </a>
                </li>



                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="mdi mdi-phone"></i>
                        <span>Contact Us</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('contact.index') }}">Send Message</a></li>
                        <li><a href="{{ route('contact.reply.index') }}">View Reply</a></li>
                    </ul>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
