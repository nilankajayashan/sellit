<div class="ps-3 pe-3 table-responsive">
<h3>Ads</h3>
    @if(in_array( 'add_ads', json_decode($permissions)))
    <a class="btn btn-primary" href="{{ route('dashboard', ['state' => 'post_ad']) }}"> Post Ad</a>
    @endif
    @if(isset($ads) && in_array( 'view_ads', json_decode($permissions)))
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Ad ID</th>
                <th scope="col">User</th>
                <th scope="col">Category</th>
                <th scope="col">Tittle</th>
                <th scope="col">Packages</th>
                <th scope="col">Last Update</th>
                <th scope="col">Payment</th>
                <th scope="col">Status</th>
                @if(in_array( 'edit_ads', json_decode($permissions)) || in_array( 'delete_ads', json_decode($permissions)) || in_array( 'approve_ads', json_decode($permissions)) || in_array( 'reject_ads', json_decode($permissions)))
                <th scope="col">Actions</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @if(count($ads)>0)
                @foreach($ads as $ad)

                    <tr class="">
                        <td scope="row">{{ $ad->ad_id }}</td>
                        <td>
                            @if($ad->user_type == 'registered')
                                @foreach($users as $user)
                                    @if($user->user_id == $ad->user_id)
                                        {{ $user->user_name }}
                                    @endif
                                @endforeach
                            @elseif($ad->user_type == 'guest')
                                @foreach($guests as $user)
                                    @if($user->user_id == $ad->user_id)
                                        {{ $user->user_name }}
                                    @endif
                                @endforeach
                            @endif

                        </td>
                        <td>
                            @foreach($categories as $category)
                                @if($category->category_id == $ad->category_id)
                                    @foreach($categories as $categorymain)
                                        @if($category->parent_id == $categorymain->category_id )
                                            {{ $categorymain->name }}
                                        @endif
                                    @endforeach
                                    {{ ' > '.$category->name }}
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $ad->tittle }}</td>
                        <td>
                            @if(in_array('highlighted', json_decode($ad->ad_option)))
                            <span class="badge rounded-pill bg-success">highlighted</span>
                            @endif
                            @if(in_array('priority', json_decode($ad->ad_option)))
                            <span class="badge rounded-pill bg-primary">priority</span>
                            @endif
                            @if(in_array('urgent', json_decode($ad->ad_option)))
                            <span class="badge rounded-pill bg-danger">urgent</span>
                            @endif
                        </td>
                        <td>{{ $ad->updated_at }}</td>

                        <td>
                            @switch($ad->payment_status)
                                @case('success')
                                    <h6><span class="badge bg-success">{{ $ad->payment_status.' | Rs.'. number_format($ad->price).'/=' }}</span></h6>
                                    @break
                                @default
                                <h6><span class="badge bg-secondary">{{ $ad->payment_status.' | Rs.'. number_format($ad->price).'/=' }}</span></h6>
                                @break
                            @endswitch
                        </td>
                        <td>
                            @if($ad->status == 1)
                                <h6><span class="badge bg-success">Active</span></h6>
                            @elseif($ad->status == 0)
                                @if($ad->reject == 1)
                                    <h6><span class="badge bg-danger">Rejected</span></h6>
                                @else
                                    <h6><span class="badge bg-secondary">Deactive</span></h6>
                                @endif
                            @else
                                <h6><span class="badge bg-secondary">Deactive</span></h6>
                            @endif
                        </td>
                        <td>
                            @if(in_array( 'edit_ads', json_decode($permissions)) || in_array( 'delete_ads', json_decode($permissions)) || in_array( 'approve_ads', json_decode($permissions)) || in_array( 'reject_ads', json_decode($permissions)))
                            @if(in_array( 'edit_ads', json_decode($permissions)) )
                                <a href="{{ route('edit_ad', ['ad_id' => $ad->ad_id]) }}">
                                <i class="fas fa-edit d-inline-flex text-primary" aria-hidden="true" role="button">Edit</i>
                            </a>
                                @endif
                            @if(in_array( 'approve_ads', json_decode($permissions)) )
                            |
                            @if($ad->reject == 0)
                                <form action="{{ route('change_ad_status') }}" method="post" class="d-inline-flex">
                                    @csrf
                                    <input type="hidden" name="status" value="{{ $ad->status }}">
                                    <input type="hidden" name="ad_id" value="{{ $ad->ad_id }}">
                                    <button type="submit" class="@if($ad->status == 1) text-warning @else text-success @endif bg-white border-0">
                                        @if($ad->status == 1) <i class="fas fa-minus-circle">Deactive</i> @else <i class="fas fa-check-circle">Active</i> @endif
                                    </button>
                                </form>
                            @else
                                <i class="text-danger fas fa-times-circle">Rejected</i>
                            @endif
                                @endif
                            @if(in_array( 'reject_ads', json_decode($permissions)) )
                            |
                            @if($ad->reject == 0)
                                <!-- Reject Modal -->
                                    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content text-start">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Reject Ad</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('ad_reject') }}">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="ad_id" class="form-label ">Ad ID:</label>
                                                            <input type="text" class="form-control" id="ad_id" disabled value="{{ $ad->ad_id }}">
                                                        </div>
                                                        <input type="hidden" name="ad_id" value="{{ $ad->ad_id }}">
                                                        <div class="mb-3">
                                                            <label for="reason" class="form-label">Reason for Reject:</label>
                                                            <textarea class="form-control" rows="3" name="reason" maxlength="200" minlength="10" id="reason"></textarea>
                                                        </div>
                                                        <div class="text-end">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Reject Ad</button>
                                                        </div>
                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Reject Modal -->
                                <button type="button" class="text-danger bg-white border-0 d-inline-flex" data-bs-toggle="modal" data-bs-target="#rejectModal">
                                    <i class="fas fa-times-circle">Reject</i>
                                </button>
                            @else
                                <i class="fas fa-times-circle text-danger d-inline-flex">Rejected</i>
                            @endif
                                @endif
                            @if(in_array( 'delete_ads', json_decode($permissions)) )
                            |
                            <form action="{{ route('admin_delete_ad')}}" method="post" class="d-inline-flex">
                                @csrf
                                <input type="hidden" name="ad_id" value="{{ $ad->ad_id }}">
                                <button type="submit" class="bg-white border-0 text-danger fw-bold"><i class="fas fa-edit d-inline-flex" aria-hidden="true">Delete</i></button>

                            </form>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <h5>No Advertistment yet...!</h5>
            @endif
            </tbody>
        </table>
        @endif
</div>


