<div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Dashboard</div>
                    <a class="nav-link" href="{{ route('dashboard',['state' => 'dashboard']) }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    @if(in_array( 'view_ads', json_decode($permissions)))
                    <div class="sb-sidenav-menu-heading">Ad Control</div>
                    <a class="nav-link" href="{{ route('dashboard',['state' => 'ads']) }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-ad"></i></div>
                        Ads
                    </a>
                    @endif
{{--                    <a class="nav-link" href="{{ route('dashboard',['state' => 'categories']) }}">--}}
{{--                        <div class="sb-nav-link-icon"><i class="fas fa-stream"></i></div>--}}
{{--                        Categories--}}
{{--                    </a>--}}
                    @if(in_array( 'view_filters', json_decode($permissions)))

                    <a class="nav-link" href="{{ route('dashboard',['state' => 'filters']) }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-filter"></i></div>
                        Filters
                    </a>
@endif
                    @if(in_array( 'view_users', json_decode($permissions)) || in_array( 'view_guests', json_decode($permissions)))

                    <div class="sb-sidenav-menu-heading">Users</div>
                    @endif
                    @if(in_array( 'view_users', json_decode($permissions)))
                    <a class="nav-link" href="{{ route('dashboard',['state' => 'users']) }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-lock"></i></div>
                        Users
                    </a>
                    @endif
                    @if(in_array( 'view_guests', json_decode($permissions)))
                    <a class="nav-link" href="{{ route('dashboard',['state' => 'guests']) }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-child"></i></div>
                        Guests
                    </a>
@endif
                    @if(in_array( 'view_admins', json_decode($permissions)))
                    <div class="sb-sidenav-menu-heading">Administrators</div>
                    <a class="nav-link" href="{{ route('dashboard',['state' => 'admins']) }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                        Admin Users
                    </a>
                    @endif
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as: @if(session()->has('auth_admin')) {{ session()->get('auth_admin')->user_name }} @else Admin user @endif</div>
            </div>
        </nav>
    </div>
