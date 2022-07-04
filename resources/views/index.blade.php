@extends('template.app')
@section('content')
    <div class="container p-2 p-lg-0 mt-3">
        <div class="row justify-content-center">
            @foreach($categories as $category)
                <form action="{{ url('search/'.$category->name.'/sri-lanka') }}" method="get" class="mt-2 col-lg-2 col-6 ">
                    <div class="card rounded-5" >
                        <button type="submit" class="btn bg-blue text-white p-0 rounded-5 bg-blue-hover" style="min-height: 136px;">
                            <div class="card-body text-center p-0 m-0">
                                <i class="fas {{ $category->icon }} card-text fs-3 mb-2 p-0"></i>
                                <p class="card-text m-0 p-0">{{ ucwords( str_replace('_',' ',$category->name)) }}</p>
                                @if($category->name == 'other_items' )
                                    <p class="m-0 h6 p-0">{{ 'All '.ucwords( str_replace('_',' ',$category->name)) }}</p>
                                @else
                                <p class="m-0 h6 p-0">{{ 'All '.ucwords( str_replace('_',' ',$category->name)).' types' }}</p>
                                @endif
                            </div>
                        </button>
                    </div>
                </form>
            @endforeach
        </div>

        <div class="container mb-3">
            <div class="row mt-3 p-0">
                @foreach($ads as $ad)
                    @include('component.widget.ad_view')
                @endforeach
            </div>
        </div>



        {{--            @foreach($ads as $ad)--}}
{{--                @if(isset($ad->ad_option))--}}
{{--                    <?php $ad_options = json_decode($ad->ad_option);?>--}}
{{--                    @if(!in_array('priority', $ad_options))--}}
{{--                        <div class="card col-lg-3 mt-sm-3 m-lg-3 p-3  @if(isset($ad->ad_option))<?php $ad_options = json_decode($ad->ad_option);if(in_array('highlighted', $ad_options)){ echo 'border border-success border-2 shadow'; }?>@endif">--}}
{{--                            @if(isset($ad->ad_option))<?php $ad_options = json_decode($ad->ad_option);if(in_array('urgent', $ad_options)){ echo '<h5><span class="badge bg-danger text-end mb-2">Urgent</span></h5>'; }?>@endif--}}
{{--                            <a href="{{ route('view-ad',['ad_id' => $ad->ad_id]) }}">--}}
{{--                                <img src="@if(!isset($ad->images) || $ad->images == null || $ad->images == '[]' || $ad->images == '') {{ asset('ad_photos/default/default.png') }} @else{{ asset('ad_photos/'.$ad->user_id.'/'.$ad->ad_id.'/'.json_decode($ad->images)[$ad->main_image]) }}@endif" class="card-img-top img-fluid "   alt="@if(!isset($ad->images) || $ad->images == null || $ad->images == '[]' || $ad->images == '') image can not found @else{{ json_decode($ad->images)[$ad->main_image] }}@endif">--}}
{{--                            </a>--}}
{{--                            <div class="card-body">--}}
{{--                                <h5 class="card-title">{{ ucwords($ad->tittle) }}</h5>--}}
{{--                                <p><span class="badge bg-dark">City:&nbsp;{{ ucwords($ad->city)}}</span></p>--}}
{{--                                <p><span class="badge bg-success">Price:&nbsp;Rs.{{$ad->price}}/=</span></p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @endif--}}
{{--            @endforeach--}}
    </div>
    @if(isset($error))
        <script>
            Notiflix.Notify.failure({{$error}});
        </script>
    @endif
    @if(session()->has('success') )
        <script>
            Notiflix.Report.success(
                'Success',
                '{{ session()->get('success') }}',
                'Okay',
            );
        </script>
    @endif
@endsection
