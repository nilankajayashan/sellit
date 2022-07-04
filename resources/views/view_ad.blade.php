@extends('template.app')
@section('content')
    <script>
        function showMobile(){
            document.getElementById('mobile_number_hide').style.display = 'none';
            document.getElementById('mobile_number_view').style.display  = 'block';
            document.getElementById('show_mobile_btn').style.display = 'none';
        }
    </script>
    <div class="container mt-3 mb-3 p-2 pe-lg-0">
        @if(isset($ad))
            <div class="col-lg-12">
                <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider:'>';">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-orange text-decoration-none">Home </a></li>
                        <form action="{{ url('search/'.$ad->parent->name.'/sri-lanka') }}" method="get" class="breadcrumb-item p-0 m-0">
                            <button type="submit" class="btn btn-link p-0 m-0 text-orange text-decoration-none">{{ ucwords( str_replace('_',' ',$ad->parent->name)) }}</button>
                        </form>
                        <li class="breadcrumb-item active text-orange" aria-current="page">{{ ucwords(str_replace('_',' ',$ad->child->name)) }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <span class="h3 pb-3">Posted by {{ ucfirst($ad->user->contact_name) }}, {{ date('d-M-Y h:i a', strtotime($ad->created_at)) }}</span>
                <div class="col-lg-7">
                    <div class="card bg-blue rounded-5 p-2">
                        <div>
                            @if(isset($ad->ad_option))
                                @if(in_array('urgent', json_decode($ad->ad_option)))
                                    <h5 style="top: 16px; left: 18px; z-index: 9999; position: absolute" class="mt-0"><i class="fas fa-star text-orange"></i></h5>
                                @endif
                            @endif
                            <div style="width: 100% !important; height: 283px !important; -webkit-background-size: cover;background-size: cover; background-image:url('@if(!isset($ad->images) || $ad->images == null || $ad->images == '[]' || $ad->images == '') {{ 'ad_photos/default/default.png' }} @else{{ '../ad_photos/'.$ad->user_id.'/'.$ad->ad_id.'/'.json_decode($ad->images)[$ad->main_image] }}@endif');" class="rounded-5 @if(isset($ad->ad_option))<?php $ad_options = json_decode($ad->ad_option);if(in_array('highlighted', $ad_options)){ echo ''; }?>@endif" id="main_image">
                            </div>
                        </div>
                        @if($ad->images != null || $ad->images != [] || $ad->images != '')
                                <div class="scrollSubImages overflow-hidden" id="scrollMenu">
                                    @if(count(json_decode($ad->images)) > 2)
                                    <button class="btn btn-outline-orange position-absolute" style="z-index: 999; top: 325px; left: 15px;" onclick="scrollList('left')"><i class="fas fa-arrow-circle-left"></i></button>
                                    <button class="btn btn-outline-orange position-absolute" style="z-index: 999; top: 325px; right: 15px;" onclick="scrollList('right')"><i class="fas fa-arrow-circle-right"></i></button>
                                   @endif
                                    @for($index = 0; $index < count(json_decode($ad->images));$index++)
                                        <div role="button" class="col-lg-4 rounded-5 mt-2 subImage img-hover" style="width: 160px !important; height: 85px !important; -webkit-background-size: cover;background-size: cover; background-image:url('@if(!isset($ad->images) || $ad->images == null || $ad->images == '[]' || $ad->images == '') {{ 'ad_photos/default/default.png' }} @else{{ '../ad_photos/'.$ad->user_id.'/'.$ad->ad_id.'/'.json_decode($ad->images)[$index] }}@endif');" onclick="toMainImage('{{ '../ad_photos/'.$ad->user_id.'/'.$ad->ad_id.'/'.json_decode($ad->images)[$index] }}')">
{{--                                            <img class="w-100 h-auto rounded-5" src="'" alt="@if(!isset($ad->images) || $ad->images == null || $ad->images == [] || $ad->images == '') image can not found @else{{ json_decode($ad->images)[$index] }}@endif" onclick="toMainImage('{{ '../ad_photos/'.$ad->user_id.'/'.$ad->ad_id.'/'.json_decode($ad->images)[$index] }}')">--}}
                                        </div>
                                    @endfor
                                </div>
                        @endif
                    </div>
                    <div class="mt-3 mb-3">
                        <div class="">
                            <h5 class="">Specifications</h5>
                            <hr>


                            <table class="table">
                                <tbody>
                                @php $index=0; @endphp
                                @foreach($ad->ad_info as $key => $value)
                                    @if($value)
                                        @if($index%2 == 0)
                                            @php
                                                $past_key = $key;
                                                $past_value = $value;
                                            @endphp
                                        @else
                                            <tr class="">
                                                <td class="d-flex">
                                                    <div style="flex: 50%;">
                                                        <span class="fw-bolder">{{ ucwords( str_replace('_',' ',$past_key)).': ' }}</span>
                                                        @if(strpos($past_value, ',') !== false)
                                                            {{ ucwords(str_replace(',',' | ',ucwords( str_replace('_',' ',$past_value)))) }}
                                                        @else
                                                            {{ ucwords( str_replace('_',' ',$past_value)) }}
                                                        @endif
                                                    </div>

                                                    @php
                                                        $past_key = null;
                                                        $past_value = null;
                                                    @endphp

                                                    <div style="flex: 50%;">
                                                        <span class="fw-bolder ">{{ ucwords( str_replace('_',' ',$key)).': ' }}</span>
                                                        @if(strpos($value, ',') !== false)
                                                            {{ ucwords(str_replace(',',' | ',ucwords( str_replace('_',' ',$value)))) }}
                                                        @else
                                                            {{ ucwords( str_replace('_',' ',$value)) }}
                                                        @endif
                                                    </div>

                                                </td>
                                            </tr>

                                        @endif

                                    @endif
                                    @php $index++; @endphp
                                @endforeach
                                @if(isset($past_key) && $past_key != null)
                                    <tr>
                                        <td>
                                            <span class="fw-bolder">{{ ucwords( str_replace('_',' ',$past_key)).': ' }}</span>
                                            @if(strpos($past_value, ',') !== false)
                                                {{ ucwords(str_replace(',',' | ',ucwords( str_replace('_',' ',$past_value)))) }}
                                            @else
                                                {{ ucwords( str_replace('_',' ',$past_value)) }}
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-3 mb-3">
                        <h5 class="">Description</h5>
                        <hr>
                            <pre style="text-align: justify !important;" class="">{{ $ad->description }}</pre>

                    </div>
                </div>
                <div class="col-lg-5 m-auto mt-0">
                    <div class="card bg-blue rounded-5">
                        <div class="card-body">
                            <h5 class="@if(isset($ad->ad_option))<?php $ad_options = json_decode($ad->ad_option);if(in_array('highlighted', $ad_options)){ echo ''; }?>@endif text-white">{{ ucwords($ad->tittle) }} &nbsp;
                            </h5>
                            <p class="text-white m-0">{{ ucwords( str_replace('_',' ',$ad->city)).', '.ucwords( str_replace('_',' ',$ad->town)). ', Sri Lanka.' }}</p>
                            <p class="text-white m-0">{{ 'Category: '.ucwords( str_replace('_',' ',$ad->child->name)) }}</p>
                            <h3 class="text-orange">Rs.{{ number_format($ad->price) }}/=</h3>
                        </div>
                    </div>
                        <div class="card mt-3 bg-orange rounded-5">
                            <div class="card-body" style="cursor: pointer;" onclick="showMobile()">
                                <h6 class="text-white">Call To Seller:</h6>
                                <h3 class="text-white" id="mobile_number_hide">{{ substr($ad->user->phone,0,3) }}*******</h3>
                                <h3 class="text-white" id="mobile_number_view" style="display: none;">{{ '('.substr($ad->user->phone,0,3).') '.substr($ad->user->phone,3,3).'-'.substr($ad->user->phone,6) }}</h3>
                                <h6 class="text-white" id="show_mobile_btn">Click to show phone number</h6>
                            </div>
                        </div>
                        <div class="card mt-3 bg-gray rounded-5">
                            <div class="card-body" data-toggle="modal" data-target="#mail" role="button">
                                <h6 class="text-white">Mail To Seller</h6>
                                <h4 class="text-white">Reply by Email</h4>
                            </div>
                        </div>
                    <!-- Modal -->
                    <div class="modal fade border-0" id="mail" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content bg-blue">
                                <div class="modal-header">
                                    <h5 class="modal-title text-white" id="exampleModalLabel">Mail To Seller</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('mail-to-customer') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $ad->ad_id }}" name="ad_id">
                                        <div class="mb-3">
                                            <input type="text" class="form-control @error('visitor_name') is-invalid @enderror" placeholder="Your Name"  name="visitor_name">
                                            @error('visitor_name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="email" class="form-control @error('visitor_email') is-invalid @enderror" placeholder="Your Email" name="visitor_email">
                                            @error('visitor_email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="tel" class="form-control @error('visitor_mobile') is-invalid @enderror" placeholder="Your Contact Number" name="visitor_mobile">
                                            @error('visitor_mobile')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-floating">
                                            <textarea class="form-control  @error('visitor_message') is-invalid @enderror" placeholder="Leave a message here" id="message" style="height: 100px" name="visitor_message"></textarea>
                                            <label for="message">Message for seller </label>
                                            @error('visitor_message')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-orange text-white col-12 mt-3">Send email to seller</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="card bg-blue rounded-5 mt-3" style="min-height: 350px;">
                            <h5 class="text-white text-center pt-5">PAID AD</h5>
                        </div>

                </div>
            </div>
            <div class="container ">
                <div class="row mt-3 p-0">
                    @if(isset($related_ads))
                        @foreach($related_ads as $ad)
                            @if(in_array('priority', json_decode($ad->ad_option)))
                                @include('component.widget.ad_view')
                            @endif
                        @endforeach


                        @foreach($related_ads as $ad)
                            @if(isset($ad->ad_option))
                                @if(!in_array('priority', json_decode($ad->ad_option)))
                                        @include('component.widget.ad_view')
                                @endif
                            @endif
                        @endforeach
                    @endif

                    @if(isset($related_ads_by_category) && $related_ads_by_category != null)
                        @foreach($related_ads_by_category as $ad)
                            @if(isset($ad->ad_option))
                                @if(in_array('priority', json_decode($ad->ad_option)))
                                       @include('component.widget.ad_view')
                                @endif
                            @endif
                        @endforeach


                        @foreach($related_ads_by_category as $ad)
                            @if(isset($ad->ad_option))
                                @if(!in_array('priority', json_decode($ad->ad_option)))
                                        @include('component.widget.ad_view')
                                @endif
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        @else
            <div class="alert alert-primary d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div>
                    Can not find this advertisement
                </div>
            </div>
        @endif
    </div>
    @if(isset($error))
        <script>
            Notiflix.Notify.failure({{$error}});
        </script>
    @endif
    @if(session()->has('error'))
        <script>
            Notiflix.Notify.failure({{session()->get('error')}});
        </script>
    @endif
    @if(isset($success))
        <script>
            Notiflix.Report.success(
                'Success',
                '{{ $success }}',
                'Okay',
            );
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
    <script>
        let length = 0;
        let scrollMenu = document.getElementById('scrollMenu');

        function toMainImage(path){
            document.getElementById('main_image').style.backgroundImage = 'url("'+path+'")';
        }

        function scrollList(button) {
           if (button == 'right'){
               if(length <= scrollMenu.scrollLeft){
                length += 50;
                scrollMenu.scrollLeft = length;
               }
           } else{
               if(length > 0){
                length -= 50;
                scrollMenu.scrollLeft =  length;
               }
           }
        }
    </script>
@endsection

