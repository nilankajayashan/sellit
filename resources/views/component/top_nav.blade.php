<ul class="nav nav-pills bg-light justify-content-between shadow-lg p-2 container-fluid pb-0">
    <div class="container justify-content-between d-flex p-0">
        <a class="navbar-brand rounded-3 shadow position-relative bg-white ps-3 pe-3" href="{{ route('index') }}" style="width: 180px !important; bottom: -30px;">
            <img src="{{ asset('logo.png') }}" alt="sellit.lk" class="w-100 mt-3 mt-lg-0" >
        </a>
        <div class="pt-2">
            @if(session()->has('auth_user'))
                <li class="nav-item dropdown d-inline-flex">
                    <a class="nav-link dropdown-toggle text-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fas fa-user-alt"></i> My Account</a>
                    <ul class="dropdown-menu bg-blue">
                        <li><a class="dropdown-item-custom" href="{{ route('my_account') }}"><i class="fas fa-chart-line"></i> Statistics</a></li>
                        <li><a class="dropdown-item-custom" href="{{ route('account_info') }}"><i class="fas fa-address-card"></i> Account Info</a></li>
                        <li><a class="dropdown-item-custom" href="{{ route('my_ad',['filter' => 'all']) }}"><i class="fas fa-ad"></i> My Ad</a></li>
                        <li><a class="dropdown-item-custom" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </li>
            @elseif(Route::current()->getName() == 'login')
                <li class="nav-item d-inline-flex"><a class="text-dark text-decoration-none" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>&nbsp;Register</a></li>
            @elseif(Route::current()->getName() == 'register')
                <li class="nav-item d-inline-flex"><a class="text-dark text-decoration-none" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</a></li>
            @else
                <li class="nav-item me-3 d-inline-flex"><a class="text-decoration-none text-dark" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</a></li>
                <li class="nav-item me-3 d-inline-flex"><a class="text-decoration-none text-dark" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>&nbsp;Register</a></li>
            @endif
            <li class="nav-item  ms-0 ms-lg-5 float-end d-inline-flex">
                <a href="{{ route('post_ad') }}" class="btn btn-orange rounded-5 shadow m-2 m-lg-0">POST YOUR AD</a>
            </li>
        </div>
    </div>
</ul>
<div class="bg-blue container text-center p-2 mt-5">
    <div class="row justify-content-center d-flex">
        <form action="{{ url('search/all/sri-lanka') }}" method="get" class="justify-content-evenly m-0">
            <input type="text" class="rounded-5 p-2 border-0 col-12 col-lg-2 me-lg-5">
            <input type="text" class="rounded-5 p-2 border-0 mt-lg-0 mt-2 col-12 col-lg-5 me-lg-5" placeholder="What  Are You Looking For?" name="search">
            <button class="btn btn-orange rounded-5 p-2 mt-lg-0 mt-2 col-12 col-lg-2" type="submit">&nbsp;Search Your AD</button>
        </form>
    </div>
</div>
