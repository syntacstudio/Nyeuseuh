@extends('layouts.auth')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 mt-md-5 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <a href="{{ route('page.home') }}" class="col-lg-6 d-none d-lg-block bg-login-image"></a>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Sign In</h1>
                                </div>
                                <form method="POST" class="user" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="email" type="email"
                                            class="form-control form-control-user{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" value="{{ old('email') }}" required
                                            placeholder="Email Address">

                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password"
                                            class="form-control  form-control-user{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" required placeholder="Password">

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="rememberMe"
                                                name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label"
                                                for="rememberMe">{{ __('Remember Me') }}</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block rounded-pill">
                                        {{ __('Login') }}
                                    </button>
                                </form>

                                <div class="text-center mt-2">
                                    <a class="btn btn-outline-primary btn-block rounded-pill"
                                        href="{{ route('register') }}">Create an Account</a>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center pb-md-3 pb-2">
                                <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
