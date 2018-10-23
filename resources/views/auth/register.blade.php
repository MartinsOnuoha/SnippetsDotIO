@extends('layouts.app')

@section('content')
   <body class="page-register">
        <main class="page-content">
            <div class="page-inner page-inner-2">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 center">
                            <div class="login-box">
                                <a href="{{ url('/') }}" class="logo-name text-lg text-center text-white">{{ config('app.name', 'Snippet') }}</a>
                                <p class="text-center m-t-md text-white">Create a {{ config('app.name', 'Snippet') }} account</p>
                                <form class="m-t-md" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                       <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} round" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} round" name="email" value="{{ old('email') }}" placeholder="Email" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                                   
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select id="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }} round" name="gender">
                                                    <option value="1">Male</option>
                                                    <option value="0">Female</option>
                                                </select>
        
                                                @if ($errors->has('gender'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('gender') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select id="user_type" class="form-control{{ $errors->has('user_type') ? ' is-invalid' : '' }} round" name="user_type">
                                                    <option selected>You are ?</option>
                                                    <option value="investor">An Investor</option>
                                                    <option value="talent">A Talent</option>
                                                </select>
        
                                                @if ($errors->has('user_type'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('user_type') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} round" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control round" placeholder="Confirm Password" name="password_confirmation" required>
                                    </div>
                                    {{-- <label>
                                        <input type="checkbox" class="text-white" required> Agree the terms and policy
                                    </label> --}}
                                    <button type="submit" class="btn btn-success btn-block m-t-xs round">{{ __('Register') }}</button>
                                    <p class="text-center m-t-xs text-sm text-white">Already have an account?</p>
                                    <a href="{{ route('login') }}" class="btn btn-default btn-block m-t-xs round">Login</a>
                                </form>
                                <p class="text-center m-t-xs text-sm text-white">2018 &copy;  {{ config('app.name', 'Snippet') }}.</p>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
@endsection