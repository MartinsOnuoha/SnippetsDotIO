@extends('layouts.app')

@section('content')
    <body class="page-login">
        <main class="page-content">
            <div class="page-inner page-inner-1">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 center">
                            <div class="login-box">
                                <a href="{{ url('/') }}" class="logo-name text-lg text-center text-white">{{ config('app.name', 'Snippet') }}</a>
                                <p class="text-center m-t-md text-white">{{ __('Reset Password') }}</p>
                                <form class="m-t-md" method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                       <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block"> {{ __('Send Password Reset Link') }}</button>
                                    <p class="text-center m-t-xs text-sm text-white">Do not have an account?</p>
                                    <a href="{{ route('register') }}" class="btn btn-default btn-block m-t-md">Create an account</a>
                                     <p class="text-center m-t-xs text-sm text-white">Already have an account?</p>
                                    <a href="{{ route('login') }}" class="btn btn-default btn-block m-t-xs">Login</a>
                                </form>
                                <p class="text-center m-t-xs text-sm text-white">2018 &copy;  {{ config('app.name', 'Snippet') }}.</p>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
@endsection
