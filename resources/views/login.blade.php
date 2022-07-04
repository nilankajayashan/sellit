@extends('template.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4 text-blue"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login_validate') }}">
                            @csrf
                            <div class="mb-2">
                                <input type="email" class="mb-3 form-control @error('invalid_email') is-invalid @enderror" name="email"  required placeholder="Your Email Address">
                                @error('invalid_email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <input type="password" class=" form-control @error('invalid_password') is-invalid @enderror" name="password" value="" required placeholder="Password">
                                @error('invalid_password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
{{--                            password reset here--}}
                            <div class="mb-2">
                                    <button type="submit" value="Login" name="login" class="btn btn-orange btn-block lead form-control">
                                        {{ __('Login') }}
                                    </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
    @if(session()->has('success') )
        <script>
            Notiflix.Report.success(
                'Success',
                '{{ session()->get('success') }}',
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
