@extends('template.app')
@section('content')
    <div class="container mt-3 p-2 p-lg-0">
        <div class="alert bg-blue text-white fw-bolder h5 rounded-5" role="alert">
            <i class="fas fa-ad"></i> My Advertistment
        </div>
        @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif
            <form method="get" action="{{route('my_ad')}}">
                <label for="filter">Filter:&nbsp;</label>

                    <div class="form-group d-inline-flex">
                        <select class="form-select rounded-5" id="filter" name="filter" onchange="adTypeChange()">
                            <option value="all" disabled selected>Select Filter</option>
                            <option value="all">All</option>
                            <option value="active">Active</option>
                            <option value="pending">Pending</option>
                            <option value="reject">Reject</option>
                        </select>
                    </div>
                    <button type="submit" class="d-inline-flex btn btn-orange ms-1 rounded-5">Filter Advertistment</button>

            </form>
        @if(isset($ads) and count($ads)>0)
           <div class="table-responsive mt-3 bg-blue rounded-5 p-3">
               <table class="table text-white">
                   <thead>
                   <tr>
                       <th scope="col">Ad ID</th>
                       <th scope="col">Title</th>
                       <th scope="col">Image</th>
                       <th scope="col">Price</th>
                       <th scope="col">Status</th>
                       <th scope="col">Expired at</th>
                       <th scope="col">Action</th>
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($ads as $ad)
                       <tr class="bg-orange rounded-5">
                           <th scope="row">{{ $ad->ad_id }}</th>
                           <td>{{ ucwords($ad->tittle) }}</td>
                           <td class="mw-100">
                               <div style="width: 160px !important; height: 100px !important; -webkit-background-size: contain;background-size: contain;background-repeat:no-repeat; background-image:url('@if(!isset($ad->images) || $ad->images == null || $ad->images == '[]' || $ad->images == '') {{ 'ad_photos/default/default.png' }} @else{{ 'ad_photos/'.$ad->user_id.'/'.$ad->ad_id.'/'.json_decode($ad->images)[$ad->main_image] }}@endif');">
                               </div>
                           </td>
                           <td>Rs.{{ number_format($ad->price) }}/=</td>
                           <td>@if($ad->status == 0 and $ad->reject == 0) Pending @elseif($ad->status == 1 and $ad->reject == 0) Publish @elseif($ad->status == 0 and $ad->reject == 1) Rejected @else Crashed @endif</td>
                           <td>Expire date</td>
                           <td>
                               <form action="{{ route('edit_ad') }}" method="post" class="d-inline">
                                   @csrf
                                   <input type="hidden" name="ad_id" value="{{$ad->ad_id}}">
                                   <button type="submit" class="btn btn-blue text-decoration-none mt-2 mt-lg-0"><i class="fas fa-edit"></i> Edit</button>
                               </form>
                               <form action="{{ route('delete_ad') }}" method="post" class="d-inline">
                                   @csrf
                                   <input type="hidden" name="ad_id" value="{{$ad->ad_id}}">
                                   <button type="submit" class="btn btn-danger text-decoration-none mt-2 mt-lg-0"><i class="fas fa-trash-alt"></i> Delete</button>
                               </form>
                           </td>
                       </tr>
                   @endforeach
                   </tbody>
               </table>
           </div>
        @else
            <div class="alert bg-blue text-white fw-bolder h5 rounded-5 mt-3" role="alert">
                No Advertistment...!
            </div>
        @endif
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
