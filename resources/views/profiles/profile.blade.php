@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-lg-4">
        <div class="panel">
            {{ $user->name }}'s Profile
        </div>
        <div class="panel-body">
            <img height="60" width="60" style="border-radius: 50%" class="avatar" src="{{ Storage::url($user->avatar) }}">
        </div>
    </div>
</div>

@endsection