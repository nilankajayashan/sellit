<div class="col-lg-6">
    <a href="{{ route('view-ad',['ad_id' => $ad->ad_id]) }}" class="text-decoration-none">
        <div class="card  bg-blue rounded-5">
            {{--                    @if(isset($ad->ad_option))<?php $ad_options = json_decode($ad->ad_option);if(in_array('urgent', $ad_options)){ echo '<h5><span class="badge bg-danger text-end mb-2">Urgent</span></h5>'; }?>@endif--}}

            <div class="card-body row">
                <div class="col-5">
                    @if(isset($ad->ad_option))
                        @if(in_array('urgent', json_decode($ad->ad_option)))
                            <h5 style="top: 18px; left: 20px; z-index: 9999; position: absolute" class="mt-0"><i class="fas fa-star text-orange"></i></h5>
                        @endif
                    @endif                    
                    <div style="overflow-x: hidden !important; height: 100px; !important; -webkit-background-size: cover;background-size: cover; background-image:url('@if(!isset($ad->images) || $ad->images == null || $ad->images == '[]' || $ad->images == '') {{ 'ad_photos/default/default.png' }} @else{{ '../../ad_photos/'.$ad->user_id.'/'.$ad->ad_id.'/'.json_decode($ad->images)[$ad->main_image] }}@endif');" class="rounded-5 img-hover @if(isset($ad->ad_option))<?php $ad_options = json_decode($ad->ad_option);if(in_array('highlighted', $ad_options)){ echo ''; }?>@endif" id="main_image">
                    </div>

                </div>
                <div class="col-7" style="display: grid;">
                    <h6 class="card-title text-white p-0 m-0">{{ ucwords($ad->tittle) }}</h6>
                    <p class="text-white p-0 m-0">City:&nbsp;{{ ucwords($ad->city)}}</p>
                    <h5 class="text-orange p-0 m-0"> Price:&nbsp;Rs.{{number_format($ad->price)}}/=</h5>
                </div>
            </div>
        </div>
    </a>
</div>
