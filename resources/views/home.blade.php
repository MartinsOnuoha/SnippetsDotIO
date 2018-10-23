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
                                    @if(Auth::user()->profile->website)
                                        <a href="{{ Auth::user()->profile->website }}">{{ Auth::user()->profile->website }}</a>
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
                            {{-- <div class="panel panel-white">
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
                            </div> --}}
                            <div class="profile-timeline">
                                <ul class="list-unstyled">
                                    <li class="timeline-item">
                                            <div class="panel panel-white">
                                                <div class="panel-body">
                                                    <div class="timeline-item-header">
                                                        <img src="{{ asset(Auth::user()->avatar) }}" alt="">
                                                        <p>
                                                            @if($user->id === Auth::user()->id)
                                                                <a href="{{ route('profile', Auth::user()->slug) }}">You</a>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                  
                                    <li class="timeline-item">
                                        <div class="panel panel-white">
                                            <div class="panel-body">
                                                <div class="timeline-item-header">
                                                    <img src="{{ asset('defaults/avatars/snippet.png') }}" alt="">
                                                    <p><a href="#">John Ukenna</a> <span>posted a Snippet</span></p>
                                                    <small>2 hours ago</small>
                                                </div>
                                                <div class="timeline-item-post">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p>
                                                    <img src="assets/images/post-image.jpg" alt="">
                                                    <div class="timeline-options">
                                                        <a href="#"><i class="icon-like"></i> Like (14)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="panel panel-white">
                                            <div class="panel-body">
                                                <div class="timeline-item-header">
                                                    <img src="{{ asset('defaults/avatars/snippet.png') }}" alt="">
                                                    <p><a href="#"> Mr Mashmellow</a> <span>posted a GiG</span></p>
                                                    <small>6 hours ago</small>
                                                </div>
                                                <div class="timeline-item-post">
                                                    <div id="map-canvas" style="height: 200px; width: 100%;"></div>
                                                    <div class="timeline-options">
                                                        <a href="#"><i class="icon-like"></i> Like (3)</a>
                                                    </div>
                                                    <button class="btn btn-primary btn-block"><i class="fa fa-check m-r-xs"></i>I'm Interested</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 m-t-lg">
                            @if (Auth::user()->user_type === 'investor')
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <div class="panel-title">Top Talents</div>
                                </div>
                                <div class="panel-body">
                                    <div class="team">
                                        @foreach (Auth::user()->getAllTalents() as $talent)
                                            <div class="team-member">
                                                <div class="online on"></div>
                                                <a href="{{ route('profile', $talent->slug) }}">
                                                    <img src="{{ asset($talent->avatar) }}" alt="">
                                                </a>
                                            </div>        
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <div class="panel-title">Top Investors</div>
                                </div>
                                <div class="panel-body">
                                    <div class="team">
                                        @foreach (Auth::user()->getAllInvestors() as $investor)
                                            <div class="team-member">
                                                <div class="online on"></div>
                                                <a href="{{ route('profile', $investor->slug) }}">
                                                    <img src="{{ asset($investor->avatar) }}" alt="">
                                                </a>
                                            </div>        
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif


                            @if (Auth::user()->user_type === 'talent')
                                <div class="panel panel-white">
                                    <div class="panel-heading">
                                        <div class="panel-title">Latest GiG</div>
                                    </div>
                                    <div class="panel-body">
                                        <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>
                                        <button class="btn btn-primary btn-block"><i class="fa fa-check m-r-xs"></i>I'm Interested</button>
                                    </div>
                                </div>                             
                            @else
                                <div class="panel panel-white">
                                    <div class="panel-heading">
                                        <div class="panel-title">Latest Snippet</div>
                                    </div>
                                    <div class="panel-body">
                                        <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>
                                    </div>
                                </div>                  
                            @endif
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <div class="panel-title">Latest Snippets</div>
                                </div>
                                <div class="panel-body">
                                    <div class="panel panel-black">
                                        <div class="panel-body">
                                            <a href="#">Marcus Grey posted a snippet</a>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <a href="#">Samuel James posted a snippet</a>
                                        </div>
                                    </div>
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
                    <a href="{{ route('get_connections') }}">
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
