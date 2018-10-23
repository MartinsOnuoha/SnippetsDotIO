@extends('layouts.main')

@section('content')
            <!-- Page Sidebar -->
            <div class="page-inner">
                <div class="profile-cover">
                    <div class="container">
                        <div class="col-md-12 profile-info">
                            <div class="profile-info-value text-center">
                                <h3>{{ count(Auth::user()->getFriends()) }}</h3>
                                <p>Followers</p>
                            </div>
                            <!-- call a countPosts() method from the Posts Trait -->
                            <div class="profile-info-value text-center">
                                <h3>1780</h3>
                                <p>Posts</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="main-wrapper" class="container">
                <div class="row">
                        <div class="col-md-3 user-profile">
                            <div class="profile-image-container">
                                <img height="150" width="150" src="{{ Storage::url(Auth::user()->avatar) }}" alt="">
                            </div>
                            <h3 class="text-center">{{ Auth::user()->name }}</h3>
                            <p class="text-center">{{ Auth::user()->profile->talent }}</p>
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
                                <li>
                                    <p>
                                        <i class="fa fa-envelope m-r-xs"></i>
                                        <a href="#">{{ Auth::user()->email }}</a>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                    <i class="fa fa-link m-r-xs"></i>
                                    @if(Auth::user()->profile->website)
                                        <a href="{{ Auth::user()->profile->website }}">{{ Auth::user()->profile->website }}</a>
                                    @else
                                        Website Not set
                                    @endif
                                    </p>
                                </li>
                            </ul>
                            <hr>
                            @if(Auth::user()->id === Auth::user()->id)
                                <a href="{{ url('/profile/edit') }}" class="btn btn-primary btn-block"><i class="fa fa-edit m-r-xs"></i>Edit</a>
                            @else
                                <button class="btn btn-primary btn-block"><i class="fa fa-plus m-r-xs"></i>Follow</button>
                            @endif
                        </div>
                        <div class="col-md-6 m-t-lg">
                            @if (Auth::user()->id === Auth::user()->id)
                            <div class="panel panel-white">
                                <div class="panel-body">
                                     @if(Auth::user()->user_type =="talent")
                                    <h4>Edit Snippet</h4>
                                            @else
                                            <h4>Edit Gig</h4>
                                            @endif
                                    <div class="post">
                                <form action="{{ route('snippet.update', $snippet->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $snippet->id }}" name="snippetid">
                                        <input class="form-control" placeholder="Snippet Tags separated by commas e.g #singing, #dancing" rows="4=6" name="snippetags" value="{{ $snippet->snippetags }}" required>
                                        <br/>
                                        <textarea class="form-control" placeholder="Post" rows="4=6" name="snippetdetails">{{ $snippet->snippetdetails }}</textarea>
                                        <div class="post-options">
                                            <button type="submit" class="btn btn-default pull-right">Update</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <!-- middle ends -->

                        <!-- Right Side -->
                        <div class="col-md-3 m-t-lg">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <div class="panel-title">Folowers</div>
                                </div>
                                <div class="panel-body">
                                    <div class="team">
                                        @foreach (Auth::user()->getFriends() as $friend)
                                            <div class="team-member">
                                                <div class="online on"></div>
                                                <img src="{{ Storage::url($friend->avatar) }}" alt=""> 
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    @if(Auth::user()->id === Auth::user()->id)
                                    <div class="panel-title">About Me</div>
                                    @else
                                    <div class="panel-title">About {{ Auth::user()->name }}</div>
                                    @endif
                                </div>
                                <div class="panel-body">
                                    <p>
                                        @if(Auth::user()->profile->about)
                                            {{ Auth::user()->profile->about }}
                                        @else
                                            <span style="color: #CCC">Tell us something about you...</span>
                                        @endif
                                    </p>

                                </div>
                            </div>
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <div class="panel-title">Pending Requests</div>
                                </div>
                                <div class="panel-body">
                                    @foreach (Auth::user()->getPendingRequestSent() as $pending)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>{{ $pending->name }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-primary">Cancle</button>
                                            </div>
                                        </div>
                                        <div class="divider" style="margin-top: 5px;"></div>
                                    @endforeach
                                        
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
        <nav class="cd-nav-container" id="cd-nav">
            <header>
                <h3>Navigation</h3>
                <a href="#0" class="cd-close-nav">Close</a>
            </header>
            <ul class="cd-nav list-unstyled">
                <li class="cd-selected" data-menu="index">
                    <a href="{{ route('home') }}">
                        <span>
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <p>Home</p>
                    </a>
                </li>
                <li data-menu="profile">
                    <a href="{{ route('profile', Auth::user()->slug) }}">
                        <span>
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <p>Profile</p>
                    </a>
                </li>
                <li data-menu="inbox">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-bell"></i>
                        </span>
                        <p>Notifications</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-plus"></i>
                        </span>
                        <p>Followers</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        <span>
                            <i class="fa fa-sign-out m-r-xs"></i>
                        </span>
                        <p>{{ __('Logout') }}</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <div class="cd-overlay"></div>
@endsection
