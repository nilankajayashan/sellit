@extends('template.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4 text-blue"><i class="fas fa-user-plus"></i>&nbsp;Register</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register_validate') }}" id="register_form">
                            @csrf
                            <div class="mb-2">
                                <input type="text" class="mb-3 form-control @error('username') is-invalid @enderror" name="username"  required="required" placeholder="Your Username">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <input type="email" class="mb-3 form-control @error('email') is-invalid @enderror" name="email"  required="required" placeholder="Your E-mail Address">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <input type="text" class="mb-3 form-control @error('contact_name') is-invalid @enderror" name="contact_name"  required="required" placeholder="Your Contact Name">
                                @error('contact_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <input type="text" class="mb-3 form-control @error('address') is-invalid @enderror" name="address"  required="required" placeholder="Your Address">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <input type="tel" class="mb-3 form-control @error('mobile') is-invalid @enderror" name="mobile"  required="required" placeholder="Your Mobil Number">
                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <input type="password" class=" form-control @error('password') is-invalid @enderror" name="password" minlength="8" required="required" placeholder="Password for This Account" id="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <input type="password" class=" form-control" value="" required="required" minlength="8" placeholder="Password Conform" id="conform-password">
                                <span id="conform-error" class="invalid-feedback" role="alert"></span>
                            </div>
                            <div class="mb-2">
                                    <button type="button" value="register" name="register" class="btn btn-orange btn-block lead form-control" onclick="password_check()">
                                        {{ __('Register') }}
                                    </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(isset($error))
        <script>
            Notiflix.Notify.failure({{$error}});
        </script>
    @endif
@endsection

<script>
    function password_check(){
        if(document.getElementById('password').value == document.getElementById('conform-password').value) {
            document.getElementById('register_form').submit();
        } else{
            Notiflix.Notify.failure('Password conform does not matched');
        }

    }
</script>
