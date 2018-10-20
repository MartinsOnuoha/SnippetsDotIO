@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    {{ $user->name }}
                </div>
                <div class="card-body text-center">
                    <img height="60" width="60" style="border-radius: 50%" class="avatar" src="{{ Storage::url($user->avatar) }}">
                    <p>{{ $user->email }}</p>
                    <p class="text-center">
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-block">Edit</a>
                    </p>
                </div>    
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    About
                </div>
                <div class="card-body text-center">
                    @if($user->profile->about)
                        {{ $user->profile->about }}
                    @endif
                        {{ __('Nothing to show') }}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection