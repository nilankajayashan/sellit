<!doctype html>
<html lang="en">
<head>

    @include('admin.components.header')
</head>
<body class="sb-nav-fixed ">
    @include('admin.components.nav_bar')
    <div id="layoutSidenav">
        @include('admin.components.side_nav')
        <div id="layoutSidenav_content" >
            <main class="p-3">
                @if(isset($state))
                    @switch($state)
                        @case('dashboard')
                        @include('admin.views.dashboard')
                        @break
                        @case('ads')
                        @include('admin.views.ads.all_ads')
                        @break
                        @case('edit_ad')
                        @include('admin.views.ads.edit_ad')
                        @break
                        @case('post_ad')
                        @include('admin.views.ads.post_ad')
                        @break
                        @case('categories')
                        @include('admin.views.categories')
                        @break
                        @case('filters')
                        @include('admin.views.filters')
                        @break
                        @case('users')
                        @include('admin.views.users')
                        @break
                        @case('user_remove')
                        @include('admin.views.user_remove')
                        @break
                        @case('guests')
                        @include('admin.views.guests')
                        @break
                        @case('admins')
                        @include('admin.views.admins')
                        @break
                        @case('my_account')
                        @include('admin.views.my_account')
                        @break
                        @case('ads')
                        @default
                        @include('admin.views.dashboard')
                        @break
                    @endswitch
                @endif
            </main>
        </div>
    </div>
@include('admin.components.message')
</body>
</html>
