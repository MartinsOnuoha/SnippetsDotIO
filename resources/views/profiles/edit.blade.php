@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Edit Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" class="form-control" value="{{ $user->profile->location }}" required>
                        </div>
                        
                             @if($user->profile->user_type == "talent")
                                <div class="form-group">
                                     <label for="talents">Talents</label>
                                    <input type="text" name="talents" class="form-control" value="{{ $user->profile->talents }}" data-role="tagsinput" required>
                                </div>
                            @endif
                           
                        <div class="form-group">
                            <label for="avatar">Upload Profile Picture</label>
                            <input type="file" name="avatar" class="form-control" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="about">About Me</label>
                            <textarea id="about" type="text" name="about" class="form-control" cols="30" rows="4" required>
                                {{ $user->profile->about }}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <p class="text-center">
                                <button class="btn btn-block btn-primary" type="submit">Save Info</button>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
        </div>
    </div>
</div>
@endsection
