@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-lg-4">
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
    </div>
</div>

@endsection