@extends('layouts.main')

@section('content')
            <!-- Page Sidebar -->
            <div class="page-inner">

                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-3" style="margin-top: 20px">
                            <div class="profile-image-container">
                                <img src="{{ asset(Auth::user()->avatar) }}" alt="">
                            </div>
                            <h3 class="text-center">{{ Auth::user()->name }}</h3>
                            <p class="text-center user-type">{{ Auth::user()->user_type }}</p>
                            <p class="text-center user-type">Connections - {{ count(Auth::user()->getFriends()) }}</p>
                            <hr>
                            <ul class="list-unstyled text-center">
                                <li>
                                    <p>
                                        <i class="fa fa-map-marker m-r-xs"></i>
                                        @if(Auth::user()->profile->location)
                                            {{ Auth::user()->profile->location }}
                                        @else
                                            Location not set
                                        @endif
                                    </p>
                                </li>
                                <li><p><i class="fa fa-envelope m-r-xs"></i><a href="#">{{ Auth::user()->email }}</a></p></li>
                                <li>
                                    <p>
                                    <i class="fa fa-link m-r-xs"></i>
                                    @if($user->profile->website)
                                        <a href="{{ $user->profile->website }}">{{ $user->profile->website }}</a>
                                    @else
                                        Website Not set
                                    @endif
                                    </p>
                                </li>
                                <li>
                                    <p>
                                    <i class="fa fa-building m-r-xs"></i>
                                    @if($user->profile->industry)
                                        {{ $user->profile->industry }}
                                    @else
                                        Website Not set
                                    @endif
                                    </p>
                                </li>
                            </ul>
                            <hr>
                            <a href="{{ route('profile', Auth::user()->slug) }}">
                                <button class="btn btn-primary btn-block"><i class="fa fa-eye m-r-xs"></i>View My Profile</button>
                            </a>
                        </div>
                        <div class="col-md-6 m-t-lg">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Update your Awesomeness</h4>
                                </div>
                                <div class="panel-body">
                                    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input name="email" value="{{ Auth::user()->email }}" type="email" class="form-control" id="email" placeholder="Enter email">
                                            
                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input name="phone" value="{{ Auth::user()->profile->phone }}" type="phone" class="form-control" id="phone" placeholder="Enter Phone" required>

                                            @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="avatar">Upload Profile Picture</label>
                                            <input name="avatar" type="file" class="form-control" id="avatar" accept="image/*">
                                            
                                            @if ($errors->has('avatar'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('avatar') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input name="location" value="{{ Auth::user()->profile->location }}" type="text" class="form-control" id="location" placeholder="Enter Location">
                                            
                                            @if ($errors->has('location'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('location') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input name="website" value="{{ Auth::user()->profile->website }}" type="text" class="form-control" id="website" placeholder="Enter Website">
                                            
                                            @if ($errors->has('website'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('website') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <textarea name="about" id="about" cols="60" rows="3" placeholder="About you...">{{ Auth::user()->profile->about }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Industry</label>
                                            <select name="industry" class="form-control">
                                                <option selected>What part of entertainment do you thrive in?</option>
                                                <option>Music</option>
                                                <option>Film</option>
                                                <option>Performing Art</option>
                                                <option>Script Writing</option>
                                                <option>Fashion</option>
                                                <option>Web Television</option>
                                                <option>Comedy</option>
                                                <option>Drama</option>
                                                <option>Broadcasting</option>
                                            </select>

                                        </div>
                                        <button class="btn-primary btn-lg btn-block" type="submit">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 m-t-lg">                           
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        About @if(Auth::user()->id == $user->id)Me @else {{ $user->name }} @endif
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p>
                                        @if($user->profile->about)
                                            {{ $user->profile->about }}
                                        @else
                                            <span style="color: #CCC">Tell us something about you...</span>
                                        @endif
                                    </p>
                                    
                                </div>
                            </div>       
                        </div>
                    </div>
                </div>
                <div class="page-footer">
                    <div class="container">
                        <p class="no-s">2018 &copy; Snippet.</p>
                    </div>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->

        <div class="cd-overlay"></div>
@endsection
