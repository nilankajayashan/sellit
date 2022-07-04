@extends('template.app')
@section('content')
    <div class="container mt-3 p-2 p-lg-0 rounded-5">
        <div class="alert bg-blue text-white fw-bolder h5 rounded-5" role="alert">
            <i class="fas fa-chart-line"></i> Statistics
        </div>
        <div class="row p-3">
{{--            <div class="card col-lg-5 ms-lg-3 mt-3">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">General</h5>--}}
{{--                    <table class="table">--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <th scope="row" class="text-start">Account Type</th>--}}
{{--                            <td class="text-end">Regular user</td>--}}
{{--                        </tr>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}

{{--                </div>--}}
{{--            </div>--}}

            <div class="card col-12 mt-3 bg-blue text-white rounded-5">
                <div class="card-body">
                    <h5 class="card-title">Listings</h5>
                    <table class="table text-white bg-orange rounded-5 table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row" class="">Total Ads</th>
                                <td><a href="{{ route('my_ad',['filter' => 'all']) }}" type="button" class="btn btn-blue">View</a></td>
                                <td class="">@if(isset($total_ads)) {{ $total_ads }} @else 0 @endif</td>
                            </tr>
                        <tr class="">
                            <th scope="row" class="">Active Ads</th>
                            <td><a href="{{ route('my_ad',['filter' => 'active']) }}" type="button" class="btn btn-blue">View</a></td>
                            <td class="">@if(isset($active_ads)) {{ $active_ads }} @else 0 @endif</td>
                        </tr>
                        <tr>
                            <th scope="row" class="">Pending Ads</th>
                            <td><a href="{{ route('my_ad',['filter' => 'pending']) }}" type="button" class="btn btn-blue">View</a></td>
                            <td class="">@if(isset($pending_ads)) {{ $pending_ads }} @else 0 @endif</td>
                        </tr>
                        <tr class="">
                            <th scope="row" class="">Rejected Ads</th>
                            <td><a href="{{ route('my_ad',['filter' => 'reject']) }}" type="button" class="btn btn-blue">View</a></td>
                            <td class="">@if(isset($rejected_ads)) {{ $rejected_ads }} @else 0 @endif</td>
                        </tr>
{{--                        <tr>--}}
{{--                            <th scope="row" class="">Expired Ads</th>--}}
{{--                            <td><a href="#" type="button" class="btn btn-sm btn-outline-info">View</a></td>--}}
{{--                            <td class="">0</td>--}}
{{--                        </tr>--}}
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
