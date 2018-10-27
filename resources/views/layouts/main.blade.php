<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#212121">

    <link rel="shortcut icon" href="{{ asset('snippet.png') }}" type="image/png">

    <title>{{ config('app.name', 'Snippet') }}</title>
        <meta name="description" content=" Connect your Talent to the right Investor" />
        <meta name="keywords" content="snipper,talents,investors" />
        <meta name="author" content="Projectiles" />
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href="{{ asset('assets/plugins/pace-master/themes/blue/pace-theme-flash.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/plugins/uniform/css/uniform.default.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/fontawesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/line-icons/simple-line-icons.css') }}" rel="stylesheet" type="text/css"/> 
        <link href="{{ asset('assets/plugins/waves/waves.min.css') }}" rel="stylesheet" type="text/css"/>  
        <link href="{{ asset('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/3d-bold-navigation/css/style.css') }}" rel="stylesheet" type="text/css"/> 
        <link href="{{ asset('assets/plugins/3d-bold-navigation/css/style.css') }}" rel="stylesheet" type="text/css"/>  
        <link href="{{ asset('assets/plugins/slidepushmenus/css/component.css') }}" rel="stylesheet" type="text/css"/>
        
        <!-- Theme Styles -->
        <link href="{{ asset('assets/css/modern.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/tagsinput.css') }}" rel="stylesheet" type="text/css"/>
        
        <script src="{{ asset('assets/plugins/3d-bold-navigation/js/modernizr.js') }}"></script>
        
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>

 <body class="page-header-fixed compact-menu page-horizontal-bar">
        <div class="overlay"></div>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s1">
            <h3><span class="pull-left">Chat</span><a href="javascript:void(0);" class="pull-right" id="closeRight"><i class="fa fa-times"></i></a></h3>
            <div class="slimscroll">
            @foreach (Auth::user()->getFriends() as $friend)
                <a href="javascript:void(0);" class="showRight2"><img src="{{ asset($friend->avatar) }}" alt=""><span>{{ $friend->name }}<small>{{ $friend->email }}</small></span></a>
            @endforeach
            </div>
		</nav>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
            
                <h3><span class="pull-left">James Daniel</span> <a href="javascript:void(0);" class="pull-right" id="closeRight2"><i class="fa fa-angle-right"></i></a></h3>    
            
            <div class="slimscroll chat">
                <div class="chat-item chat-item-left">
                    <div class="chat-image">
                        <img src="assets/images/avatar2.png" alt="">
                    </div>
                    <div class="chat-message">
                        Hi There!
                    </div>
                </div>
                <div class="chat-item chat-item-right">
                    <div class="chat-message">
                        Hi! How are you?
                    </div>
                </div>
                <div class="chat-item chat-item-left">
                    <div class="chat-image">
                        <img src="assets/images/avatar2.png" alt="">
                    </div>
                    <div class="chat-message">
                        Fine! do you like my project?
                    </div>
                </div>
                <div class="chat-item chat-item-right">
                    <div class="chat-message">
                        Yes, It's clean and creative, good job!
                    </div>
                </div>
                <div class="chat-item chat-item-left">
                    <div class="chat-image">
                        <img src="assets/images/avatar2.png" alt="">
                    </div>
                    <div class="chat-message">
                        Thanks, I tried!
                    </div>
                </div>
                <div class="chat-item chat-item-right">
                    <div class="chat-message">
                        Good luck with your sales!
                    </div>
                </div>
            </div>
            <div class="chat-write">
                <form class="form-horizontal" action="javascript:void(0);">
                    <input type="text" class="form-control" placeholder="Say something">
                </form>
            </div>
		</nav>      
        <!-- Search form -->
        <form class="search-form" action="#" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control search-input" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
                </span>
            </div><!-- Input Group -->
        </form><!-- Search Form -->

        
        <main id="app" class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner container">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        <a href="{{ url('/home') }}" class="logo-text"><span>{{ config('app.name', 'Snippet') }}</span></a>
                    </div><!-- Logo Box -->
                    <div class="search-button">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-left">
                                {{-- <li>
                                    <a href="#cd-nav" class="waves-effect waves-button waves-classic cd-nav-trigger"><i class="fa fa-bars"></i></a>
                                </li>        --}}
                            </ul>


                            <ul class="nav navbar-nav navbar-right">
                                <li>    
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                                </li>
           
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-bell"></i><span class="badge badge-success pull-right">{{ count(Auth::user()->notify) }}</span></a>
                                    <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                                        <li class="dropdown-menu-list slimscroll tasks">
                                            <ul class="list-unstyled">
                                                @if (Auth::user()->notify)
                                                @foreach (Auth::user()->notify as $notification)
                                                <li>
                                                    <a data-toggle="modal" data-target="#{{ $notification->id }}" href="#">
                                                        <div class="task-icon badge badge-success"><i class="icon-user"></i></div>
                                                        <span class="badge badge-roundless badge-default pull-right">{{ $notification->created_at->format('m/d/Y') }}</span>
                                                        <p class="task-details">{{ $notification->message }}</p>
                                                    </a>
                                                </li>                                                    
                                                @endforeach

                                                @else
                                                <li>
                                                    <a href="#">
                                                        <div class="task-icon badge badge-success"><i class="icon-user"></i></div>
                                                        <span class="badge badge-roundless badge-default pull-right"></span>
                                                        <p class="task-details">No Messages.</p>
                                                    </a>
                                                </li>                                                
                                                @endif
                                            </ul>
                                        </li>
                                        <li class="drop-all"><a href="#" class="text-center">All Notifications</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name">
                                            {{ Auth::user()->name }}<i class="fa fa-angle-down"></i>
                                        </span>
                                        <img class="img-circle avatar" src="{{ asset(Auth::user()->avatar) }}" width="40" height="40" alt="">
                                        {{-- <img src="{{Auth::user()->getFirstMediaUrl('avatars') }}"> --}}
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation">
                                            <a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="{{ route('discover') }}"><i class="fa fa-binoculars"></i>Discover</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="{{ route('profile', Auth::user()->slug) }}"><i class="fa fa-user"></i>Profile</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="{{ route('get_connections') }}"><i class="fa fa-compress"></i>Connections</a>
                                        </li>
                                        <li role="presentation" class="divider"></li>

                                        <li role="presentation">
                                            <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out m-r-xs"></i>{{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic" id="showRight">
                                        <i class="fa fa-comments"></i>
                                    </a>
                                </li>
                            </ul><!-- Nav -->
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div><!-- Navbar -->
            <div class="page-sidebar sidebar horizontal-bar">
                <div class="page-sidebar-inner">
                    <ul class="menu accordion-menu">
                        <li class="nav-heading"><span>Navigation</span></li>
                        <li><a href="{{ url('/home') }}"><span class="menu-icon icon-speedometer"></span><p>Home</p></a></li>
                        <li class="active"><a href="{{ url('/') }}"><span class="menu-icon icon-user"></span><p>Profile</p></a></li>
                      
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div>



            <!-- Small modal -->
            @if (Auth::user()->notify)
                @foreach (Auth::user()->notify as $notification)
                    <div class="modal fade bs-example-modal-sm" id="{{ $notification->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="mySmallModalLabel">{{ $notification->type }}</h4>
                                </div>
                                <div class="modal-body">
                                    {{ $notification->message }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            @endif
            @yield('content')


            
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- Javascripts -->
        <script src="{{ asset('assets/plugins/jquery/jquery-2.1.4.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/pace-master/pace.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-blockui/jquery.blockui.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/uniform/jquery.uniform.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/classie/classie.js') }}"></script>
        <script src="{{ asset('assets/plugins/waves/waves.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/3d-bold-navigation/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/modern.min.js') }}"></script>
        <script src="{{ asset('js/tagsinput.js') }}"></script>
        <script src="{{ asset('assets/js/modern.min.js') }}"></script> 
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzjeZ1lORVesmjaaFu0EbYeTw84t1_nek"></script>
        {{-- <script src="{{ asset('assets/js/pages/profile.js') }}"></script> --}}
    </body>
</html>