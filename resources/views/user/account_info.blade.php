@extends('template.app')
@section('content')
    <div class="container mt-3 p-2 p-lg-0">
        <div class="alert bg-blue text-white fw-bolder h5 rounded-5" role="alert">
            <i class="fas fa-address-card"></i> Account Information
        </div>
        @if(isset($user))
        <div class="card col-12 text-center bg-blue rounded-5 text-white">
            <div class="card-body">

                <form method="post" action="{{ route('update_account_info') }}">
                    <div class="row">
                        @csrf
                        <div class="col-lg-4 mb-3">
                                <label for="username" class="form-label float-start">User Name:</label>
                                <input type="text" class="form-control rounded-5" id="username" disabled="disabled" value="{{ $user->user_name }}">
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label for="contact_name" class="form-label float-start">Contact Name:</label>
                            <input type="text" class="form-control rounded-5 @error('contact_name') is-invalid @enderror" id="contact_name" name="contact_name" placeholder="Contact Name" value="{{ $user->contact_name }}">
                            @error('contact_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label for="email" class="form-label float-start">Email:</label>
                            <input type="email" class="rounded-5 form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ $user->email }}" disabled>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label for="address" class="form-label float-start">Address:</label>
                            <input type="text" class="form-control rounded-5 @error('address') is-invalid @enderror" id="address" name="address" placeholder="Address" value="{{ $user->address }}">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label for="phone" class="form-label float-start">Phone:</label>
                            <input type="tel" class="form-control rounded-5 @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Phone Number" value="{{ $user->phone }}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-orange col-12 rounded-5">Update Account Information</button>
                </form>
            </div>
        </div>

        <div class="card col-12 mt-3 text-center bg-blue rounded-5 text-white">
            <div class="card-body">
                <form method="post" action="{{ route('update_account_password') }}">
                    <div class="row">
                        @csrf
                        <div class="col-lg-6 mb-3">
                            <label for="password" class="form-label float-start" >Password:</label>
                            <input type="password" class="rounded-5 form-control @error('password') is-invalid @enderror" id="password" name="password" required="required" minlength="8" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="password_conform" class="form-label float-start">Password Conform:</label>
                            <input type="password" class="rounded-5 form-control @error('password_conform') is-invalid @enderror" id="password_conform" name="password_conform" required="required" minlength="8" placeholder="Password Again">
                            @error('password_conform')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-orange rounded-5 col-12">Update Account Password</button>
                </form>
            </div>
        </div>
            @if($user->remove_state == 0)
                <div class="alert alert-danger rounded-5 mt-3" role="alert">
                    Request to <a href="{{ route('remove_account') }}" class="alert-link">Remove Account</a>
                </div>
            @else
                <div class="alert alert-danger rounded-5 mt-3" role="alert">
                    You Requested to Remove your account <a href="{{ route('remove_account') }}" class="alert-link">Cancel Request</a>
                </div>
            @endif
        @else
            <div class="alert alert-danger" role="alert">
                User Can not Find...!
            </div>
        @endif
    </div>
    @if(isset($success) )
        <script>
            Notiflix.Report.success(
                'Success',
                '{{ $success }}',
                'Okay',
            );
        </script>
    @endif
    @if(isset($error))
        <script>
            Notiflix.Notify.failure('{{ $error }}');
        </script>
    @endif
@endsection
