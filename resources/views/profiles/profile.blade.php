@extends('layouts.app')

@section('content')
<style>
    .avatar {
        border-radius: 50%;
        height: 50px;
    }
</style>
<div class="container">
    <div class="col-lg-4">
        <div class="panel">
            {{ $user->name }}'s Profile
        </div>
        <div class="panel-body">
            <img class="avatar" src="{{ Storage::url($user->avatar) }}">
        </div>
    </div>
</div>

@endsection