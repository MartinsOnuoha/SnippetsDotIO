@extends('layouts.main')
 
@section('content')
            <!-- Page Sidebar -->
            <div class="page-inner">
                <div class="profile-cover">
                    <div class="container">
                        <div class="col-md-12 profile-info">
                            <div class="profile-info-value text-center">
                                <h3>{{ $user->countFriends() }}</h3>
                                <p>Connections</p>
                            </div>
                            <!-- call a countPosts() method from the Posts Trait -->
                            <div class="profile-info-value text-center">
                                <h3>1780</h3>
                                @if ($user->user_type === 'investor')
                                    <p>Gigs</p>
                                @else
                                    <p>Snippets</p> 
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div id="main-wrapper" class="container">
                <div class="row">
                        <div class="col-md-3 user-profile">
                            <div class="profile-image-container">
                                <img height="150" width="150" src="{{ asset($user->avatar) }}" alt="">
                            </div>
                            <h3 class="text-center">{{ $user->name }}</h3>
                            <p class="text-center">{{ $user->profile->talent }}</p>
                            <hr>
                            <ul class="list-unstyled text-center">
                                <li>
                                    <p>
                                        <i class="fa fa-map-marker m-r-xs"></i>
                                        @if($user->profile->location)
                                            {{ $user->profile->location }}
                                        @else
                                            Location not set
                                        @endif
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-envelope m-r-xs"></i>
                                        <a href="#">{{ $user->email }}</a>
                                    </p>
                                </li>
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
                            </ul>
                            <hr>
                            @if($user->id === Auth::user()->id)
                            <a href="{{ route('profile.edit') }}">
                                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit m-r-xs"></i>Edit</button>
                            </a>
                            @else
                                {{-- <button class="btn btn-primary btn-block"><i class="fa fa-plus m-r-xs"></i>Follow</button> --}}
                                <Friend :profile_user_id="{{ $user->id }}"></Friend>
                            @endif
                        </div>
                        <div class="col-md-6 m-t-lg">
                            @if ($user->id === Auth::user()->id)
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div class="post">
                                        <textarea class="form-control" placeholder="Post" rows="4=6"></textarea>
                                        <div class="post-options">
                                            <a href="#"><i class="icon-camera"></i></a>
                                            <a href="#"><i class="icon-camcorder"></i></a>
                                            <a href="#"><i class="icon-music-tone-alt"></i></a>
                                            <a href="#"><i class="icon-link"></i></a>
                                            <a href="#"><i class="icon-microphone"></i></a>
                                            <button class="btn btn-default pull-right">Post</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="profile-timeline">
                                <ul class="list-unstyled">
                                    <li class="timeline-item">
                                        <div class="panel panel-white">
                                            <div class="panel-body">
                                                <div class="timeline-item-header">
                                                    <img src="{{ asset($user->avatar) }}" alt="">
                                                    <p>
                                                        @if($user->id === Auth::user()->id)
                                                            You
                                                        @else
                                                            {{ $user->name }}
                                                        @endif
                                                        <span>Posted a Snippet</span>
                                                    </p>
                                                    <small>5 hours ago</small>
                                                </div>
                                                <div class="timeline-item-post">
                                                    <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>
                                                    <div class="timeline-options">
                                                        <a href="#"><i class="icon-like"></i> Likes (7)</a>
                                                    </div>
                                                    @if($user->id === Auth::user()->id)
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a href="">
                                                                <i class="icon-trash text-red" style="margin-right: 40px;"></i>
                                                            </a>
                                                            <a href="#">
                                                                <i class="icon-pencil ml-5"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                
                                    <li class="timeline-item">
                                        <div class="panel panel-white">
                                            <div class="panel-body">
                                                <div class="timeline-item-header">
                                                    <img src="{{ asset($user->avatar) }}" alt="">
                                                    <p>
                                                        @if($user->id === Auth::user()->id)
                                                            You
                                                        @else
                                                            {{ $user->name }}
                                                        @endif
                                                        <span>Posted a Snippet</span>
                                                    </p>
                                                    <small>6 hours ago</small>
                                                </div>
                                                <div class="timeline-item-post">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p>
                                                    <img src="{{ asset('assets/images/post-image.jpg') }}" alt="">
                                                    <div class="timeline-options">
                                                        <a href="#"><i class="icon-like"></i> Likes (7)</a>
                                                    </div>

                                                    @if($user->id === Auth::user()->id)
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a href="">
                                                                <i class="icon-trash text-red" style="margin-right: 40px;"></i>
                                                            </a>
                                                            <a href="#">
                                                                <i class="icon-pencil ml-5"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
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
                                        @foreach ($user->getFriends() as $friend)
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
                                    @if(Auth::user()->id === $user->id)
                                    <a href="{{ route('profile.edit') }}">
                                        <button class="btn btn-primary btn-block"><i class="fa fa-edit m-r-xs"></i>Edit</button>
                                    </a>
                                    @endif
                                </div>
                            </div>
                            @if(Auth::user()->id === $user->id)
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <div class="panel-title">Pending Requests</div>
                                </div>
                                <div class="panel-body">
                                    @foreach ($user->getPendingRequestSent() as $pending)
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
                                    @foreach ($user->getPendingRequests() as $pending)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>{{ $pending->name }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <i class="fa fa-trash text-red"></i>
                                                <i class="fa fa-check" style="margin-left: 30px;"></i>
                                            </div>
                                        </div>
                                        <div class="divider" style="margin-top: 5px;"></div>
                                    @endforeach
                                        
                                </div>
                            </div>
                            @endif
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
                        <p>Connections</p>
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
