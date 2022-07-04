@extends('template.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">SELLIT  Login</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin_login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="mb-3 form-control" name="email"  required placeholder="john_doe@exaple.com">
                            </div>
                            <div class="form-group mb-2">
                                <input type="password" class=" form-control" name="password" value="" required placeholder="Password">
                            </div>
                            <div class="form-group mb-2">
                                <div class="mb-2">
                                    <button type="submit" value="Login" name="login" class="btn btn-primary btn-block lead form-control">
                                        {{ __('Login') }}
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.components.message')
@endsection
