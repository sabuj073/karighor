<div class="sidebar widget widget-dashboard mb-lg-0 mb-3 col-lg-3 order-0 user_sidebar">
    <div class="box_shadow bg-white rad_5">
        <div class="user_info_box p-2">
            <img src="{{ asset('backend/images/default_profile.png') }}" class="m-auto" alt="">
            <h2 class="text-uppercase text-center mt-2 text-white">Md Imran Hossain</h2>
        </div>
        <ul class="nav nav-tabs list flex-column mb-0 p-4" role="tablist">
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('user.dashboard')) active @endif"
                    href="{{ route('user.dashboard') }}">Dashboard</a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('user.orders')) active @endif"
                    href="{{ route('user.orders') }}">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  @if (request()->routeIs('user.wishlist')) active @endif"
                    href="{{ route('user.wishlist') }}">Wishlist</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  @if (request()->routeIs('user.profile')) active @endif"
                    href="{{ route('user.profile') }}">Manage Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">Logout</a>
            </li>
        </ul>
    </div>

</div>
