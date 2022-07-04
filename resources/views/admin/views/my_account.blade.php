
    <div class="card">
        <div class="card-body">
            <h5>@if($my_details->user_name != null) {{ 'WelCome...! '.ucwords($my_details->user_name) }} @else Hello Admin @endif</h5>
            <div class="mb-3">
                <span class="fs-5 float-start">Email: {{ $my_details->email }}</span>
            </div>
            <form action="{{ route('admin_update_account') }}" method="post">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Your Name" required="required" value="{{ $my_details->name }}">
                    @error('name')
                    <div class="bg-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    @error('password')
                    <div class="bg-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-warning col-12">Update Profile</button>
            </form>
        </div>
    </div>
