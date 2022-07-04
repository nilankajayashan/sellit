@extends('template.app')
@section('content')
    <?php
    
    $path = explode('/', Request::path());
    $url_category = $path[1];
    $url_city = $path[2];
    //get url parameters
    $full_url = explode('?', Request::fullUrl());
    if (count($full_url) > 1) {
        $param_key = [];
        $param_value = [];
        $param_list = explode('&', $full_url[1]);
    }
    ?>
    <style>
        .sidenav {
            z-index: 999999 !important;
            height: 100%;
            width: 0;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #2273A2;
            overflow-x: hidden;
            transition: 0.3s;
            padding-top: 40px;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 20px;
            font-size: 36px;
        }
    </style>
    <div class="container mt-3 p-2 p-lg-0">

        <div class="sidenav d-lg-block" id="mySidenav">
            <a href="javascript:void(0)" class="closebtn text-decoration-none text-danger" onclick="closeNav()">
                <h3 class="text-danger">&times;</h3>
            </a>
            <div class="accordion" id="parent_category">
                @if (isset($main_categories))
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="main-categories-header">

                            <button class="accordion-button bg-orange text-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#main-categories" aria-expanded="false"
                                aria-controls="main-categories">
                                Category
                            </button>
                        </h2>
                        <div id="main-categories" class="accordion-collapse collapse show"
                            aria-labelledby="main-categories">
                            <div class="accordion-body p-0 m-0">
                                @if ($url_category == 'all')
                                    @foreach ($main_categories as $category)
                                        <form action="{{ url('search/' . $category->name . '/' . $url_city) }}"
                                            method="get">
                                            @if (isset($param_list))
                                                @foreach ($param_list as $param)
                                                    <?php
                                                    $param_data = explode('=', $param);
                                                    ?>
                                                    <input type="hidden" name="{{ $param_data[0] }}"
                                                        value="{{ $param_data[1] }}">
                                                @endforeach
                                            @endif
                                            <button type="submit" class="btn btn-sm btn-blue text-start col-12" style="padding-left: 30px;padding-top:8px;padding-bottom:8px;">
                                                <i class="fas {{ $category->icon }} d-inline-flex"></i>
                                                &nbsp;&nbsp;
                                                <span class="d-inline-flex">{{ ucwords(str_replace('_', ' ', $category->name)) }}</span>
                                            </button>
                                        </form>
                                        <hr class="mt-0 mb-0">
                                    @endforeach
                                @elseif(isset($sub_categories))
                                    @foreach ($sub_categories as $category)
                                        <form action="{{ url('search/' . $category->name . '/' . $url_city) }}"
                                            method="get">
                                            @if (isset($param_list))
                                                @foreach ($param_list as $param)
                                                    <?php
                                                    $param_data = explode('=', $param);
                                                    ?>
                                                    <input type="hidden" name="{{ $param_data[0] }}"
                                                        value="{{ $param_data[1] }}">
                                                @endforeach
                                            @endif
                                            <button type="submit"
                                                class="btn btn-sm btn-blue text-start col-12" style="padding-left: 30px;padding-top:8px;padding-bottom:8px;">
                                                <span class="d-inline-flex">
                                                    {{ ucwords(str_replace('_', ' ', $category->name)) }}</span>
                                            </button>
                                        </form>
                                        <hr class="mt-0 mb-0">
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                {{-- sub category --}}

                {{-- end sub category --}}
                @if (isset($cities))
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="city-heading">
                            <button class="accordion-button bg-orange text-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#city" aria-expanded="true"
                                aria-controls="city">
                                City
                            </button>
                        </h2>
                        <div id="city" class="accordion-collapse collapse show" aria-labelledby="city">
                            <div class="accordion-body p-0 m-0">
                                @foreach ($cities as $city)
                                    <form action="{{ url('search/' . $url_category . '/' . $city) }}" method="get">
                                        @if (isset($param_list))
                                            @foreach ($param_list as $param)
                                                <?php
                                                $param_data = explode('=', $param);
                                                ?>
                                                <input type="hidden" name="{{ $param_data[0] }}"
                                                    value="{{ $param_data[1] }}">
                                            @endforeach
                                        @endif
                                        <button type="submit" class="btn btn-sm btn-blue text-start col-12" style="padding-left: 30px;padding-top:8px;padding-bottom:8px;">
                                            <span>{{ ucwords(ucwords($city)) }}</span>
                                        </button>
                                    </form>
                                    <hr class="mt-0 mb-0">
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            @if (isset($sub_filters) && $sub_filters != null)
                <div class="accordion mt-3" id="accordionFlushExample">
                    @foreach ($sub_filters as $sub_filter)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed bg-orange" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                    aria-expanded="false" aria-controls="flush-collapseOne">
                                    {{ ucwords(str_replace('_', ' ', $sub_filter['filter_name'])) }}
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body p-0">
                                    {{-- {{dd(json_decode($sub_filter['filter_list']))}} --}}
                                    @foreach (json_decode($sub_filter['filter_list']) as $sub_filter_list)
                                        <form action="{{ url('search/' . $url_category . '/' . $url_city) }}"
                                            method="get">
                                            @if (isset($param_list))
                                                @foreach ($param_list as $param)
                                                    <?php
                                                    $param_data = explode('=', $param);
                                                    ?>
                                                    <input type="hidden" name="{{ $param_data[0] }}"
                                                        value="{{ $param_data[1] }}">
                                                @endforeach
                                            @endif
                                            <input type="hidden" name="{{ $sub_filter['filter_name'] }}"
                                                value="{{ $sub_filter_list }}">
                                            <button type="submit"
                                                class="btn btn-sm btn-blue text-start col-12 p-0 ps-5">
                                                <p>{{ ucwords(ucwords($sub_filter_list)) }}</p>
                                            </button>
                                        </form>
                                        <hr class="mt-0 mb-0">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>

        <div class="row mb-3">
            <div class="col-lg-3">
                <div class="card mb-3 bg-blue text-white rounded-5">
                    <div class="card-body">
                        <h5 class="card-title d-inline-flex"><i class="fas fa-filter text-orange"></i>&nbsp;Added Filters</h5>
                        {{-- <button class="navbar-toggler border border-1 d-inline-flex ms-2 d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent, #navbarNav2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> --}}
                        {{-- <i class="fas fa-stream text-orange"></i> --}}
                        {{-- </button> --}}
                        <button style="cursor:pointer" onclick="openNav()" class="btn btn-orange d-inline-flex">Filters&nbsp;&nbsp;<i class="fas fa-stream" style="padding-top: inherit;"></i></button>

                        <hr>
                        @if ($url_category != 'all')
                            <form action="{{ url('search/all/' . $url_city) }}" method="get">
                                @if (isset($param_list))
                                    @foreach ($param_list as $param)
                                        <?php
                                        $param_data = explode('=', $param);
                                        ?>
                                        <input type="hidden" name="{{ $param_data[0] }}" value="{{ $param_data[1] }}">
                                    @endforeach
                                @endif
                                <h6>
                                    <span
                                        class="text-orange">Category:</span>&nbsp;{{ ucwords(str_replace('_', ' ', $url_category)) }}
                                    <button type="submit" class="btn-close float-end btn-danger"
                                        aria-label="Close"></button>
                                </h6>
                                <hr>
                            </form>
                        @endif

                        @if ($url_city != 'sri-lanka')
                            <form action="{{ url('search/' . $url_category . '/sri-lanka') }}" method="get">
                                @if (isset($param_list))
                                    @foreach ($param_list as $param)
                                        <?php
                                        $param_data = explode('=', $param);
                                        ?>
                                        <input type="hidden" name="{{ $param_data[0] }}" value="{{ $param_data[1] }}">
                                    @endforeach
                                @endif
                                <h6>
                                    <span
                                        class="text-orange">City:</span>&nbsp;{{ ucwords(str_replace('_', ' ', $url_city)) }}
                                    <button type="submit" class="btn-close float-end btn-danger"
                                        aria-label="Close"></button>
                                </h6>
                                <hr>
                            </form>
                        @endif
                        {{-- selected sub filters --}}
                        @if (isset($param_list))
                            <form action="{{ url('search/' . $url_category . '/' . $url_city) }}" method="get"
                                id="selected-sub-filters-form">
                                @foreach ($param_list as $param)
                                    <?php
                                    $param_data = explode('=', $param);
                                    ?>
                                    <input type="hidden" name="{{ $param_data[0] }}" id="{{ $param_data[0] }}"
                                        value="{{ $param_data[1] }}">
                                    @if ($param_data[0] != 'search' && $param_data[0] != 'price_min' && $param_data[0] != 'price_max')
                                        <h6>
                                            <span
                                                class="text-orange">{{ ucwords(str_replace('_', ' ', $param_data[0])) }}:</span>&nbsp;{{ ucwords(str_replace('_', ' ', $param_data[1])) }}
                                            <button type="button" class="btn-close float-end btn-danger" aria-label="Close"
                                                onclick="selectedSubFilterRemover('{{ $param_data[0] }}')"></button>
                                        </h6>
                                        <hr>
                                    @endif
                                @endforeach
                            </form>
                        @endif
                        {{-- end selected sub filters --}}


                    </div>
                </div>
                <div class="card mb-3 bg-blue rounded-5 text-white">
                    <div class="card-body">
                        <form action="{{ url('search/' . $url_category . '/' . $url_city) }}" method="get" name="price_form">
                            @if (isset($param_list))
                                @foreach ($param_list as $param)
                                    <?php
                                    $param_data = explode('=', $param);
                                    ?>
                                    {{-- <input type="hidden" name="{{ $param_data[0] }}" value="{{ $param_data[1] }}"> --}}
                                @endforeach
                            @endif
                            <label for="price" class="form-label"><i
                                    class="fas fa-coins text-orange"></i>&nbsp;Price</label>
                            <br>
                            <div class="text-center row ps-3 pe-3">
                                <input class="rounded-5 col-5" type="number" id="price_min" min="0" max="9999999"
                                    name="price_min" onchange="priceMin()" placeholder="Min">
                                {{-- value="@if (isset($param_list))@foreach ($param_list as $param) <?php $param_data = explode('=', $param); ?> @if ($param_data[0] == 'price_min')ok @endif @endforeach @else{{'0'}}@endif" --}}
                                <span class="col-2">-</span>

                                <input class="rounded-5 col-5" type="number" id="price_max" min="0" max="9999999"
                                    name="price_max" onchange="priceMax()" placeholder="Max">
                            </div>
                            <input type="submit" value="Filter Price" class="btn btn-sm btn-outline-orange col-12 mt-2 text-white filter-btn">
                        </form>
                        <script>
                            function priceMin() {
                                document.getElementById('price_max').min = document.getElementById('price_min').value;
                            }

                            function priceMax() {
                                document.getElementById('price_min').max = document.getElementById('price_max').value;
                            }
                        </script>
                    </div>
                </div>

                

                {{-- start sub filters --}}
                {{-- end sub filters --}}


            </div>

            <div class="col-lg-9">
                @foreach ($ads as $ad)
                    @if (in_array('priority', json_decode($ad->ad_option)))
                        @include('component.widget.ad_view')
                    @endif
                @endforeach

                @foreach ($ads as $ad)
                    @if (!in_array('priority', json_decode($ad->ad_option)))
                        @include('component.widget.ad_view')
                    @endif
                @endforeach
            </div>

        </div>
    </div>
    <script>
        function filterSubmit() {
            document.getElementById('filter_form').submit();
        }

        function getParameters(name) {
            let urlString = '"' + window.location + '"';
            let paramString = urlString.split('?')[1];
            paramString = paramString.slice(0, -1);
            let params_arr = paramString.split('&');
            for (let i = 0; i < params_arr.length; i++) {
                let pair = params_arr[i].split('=');
                if (pair[0] === name) {
                    return pair[1];
                }
            }
        }
        document.getElementById('price_max').value = getParameters('price_max');
        document.getElementById('price_min').value = getParameters('price_min');
    </script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0px";
        }
    </script>
@endsection
