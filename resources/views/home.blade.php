@extends('layouts.main')

@section('content')
            <!-- Page Sidebar -->
            <div class="page-inner">
                <div class="profile-cover">
                    <div class="container">
                        <div class="col-md-12 profile-info">
                            <div class="profile-info-value">
                                <h3>1020</h3>
                                <p>Followers</p>
                            </div>
                            <div class="profile-info-value">
                                <h3>1780</h3>
                                <p>Friends</p>
                            </div>
                            <div class="profile-info-value">
                                <h3>260</h3>
                                <p>Photos</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-3 user-profile">
                            <div class="profile-image-container">
                                <img src="{{ storage_path(Auth::user()->avatar) }}" alt="">
                            </div>
                            <h3 class="text-center">{{ Auth::user()->name }}</h3>
                            <p class="text-center"> @if($user->profile->about)
                                                        {{ $user->profile->about }}
                                                    @endif</p>
                            <hr>
                            <ul class="list-unstyled text-center">
                                <li><p><i class="fa fa-map-marker m-r-xs"></i>Melbourne, Australia</p></li>
                                <li><p><i class="fa fa-envelope m-r-xs"></i><a href="#">{{ Auth::user()->email }}</a></p></li>
                                <li><p><i class="fa fa-link m-r-xs"></i><a href="#">www.themeforest.net</a></p></li>
                            </ul>
                            <hr>
                            <button class="btn btn-primary btn-block"><i class="fa fa-plus m-r-xs"></i>Follow</button>
                        </div>
                        <div class="col-md-6 m-t-lg">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div class="post">
                                <h4> Add a Snippet</h4>
                                <br>
                                        <input type="text" name="talents" class="form-control" Placeholder=" Snippet Tags e.g Java, Singing" data-role="tagsinput" required>
                                        <br>
                                        <textarea class="form-control" placeholder="Post" rows="4=6"></textarea>
                                        <div class="post-options">
                                            <a href="#"><i class="icon-camera"></i></a>
                                        @if($user->profile->user_type == "talent")
                                            <a href="#"><i class="icon-camcorder"></i></a>
                                        @endif
                                            <a href="#"><i class="icon-music-tone-alt"></i></a>
                                            <a href="#"><i class="icon-link"></i></a>
                                            <button class="btn btn-default pull-right">Post</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-timeline">
                                <ul class="list-unstyled">
                                    <li class="timeline-item">
                                        <div class="panel panel-white">
                                            <div class="panel-body">
                                                <div class="timeline-item-header">
                                                    <img src="assets/images/avatar3.png" alt="">
                                                    <p>Christopher palmer <span>Posted a Status</span></p>
                                                    <small>5 hours ago</small>
                                                </div>
                                                <div class="timeline-item-post">
                                                    <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>
                                                    <div class="timeline-options">
                                                        <a href="#"><i class="icon-like"></i> Like (7)</a>
                                                        <a href="#"><i class="icon-bubble"></i> Comment (2)</a>
                                                        <a href="#"><i class="icon-share"></i> Share (3)</a>
                                                    </div>
                                                    <div class="timeline-comment">
                                                        <div class="timeline-comment-header">
                                                            <img src="assets/images/avatar5.png" alt="">
                                                            <p>Nick Doe <small>1 hour ago</small></p>
                                                        </div>
                                                        <p class="timeline-comment-text">Nullam quis risus eget urna mollis ornare vel eu leo.</p>
                                                    </div>
                                                    <div class="timeline-comment">
                                                        <div class="timeline-comment-header">
                                                            <img src="assets/images/avatar2.png" alt="">
                                                            <p>Sandra Smith <small>3 hours ago</small></p>
                                                        </div>
                                                        <p class="timeline-comment-text">Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                                    </div>
                                                    <textarea class="form-control" placeholder="Replay"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="panel panel-white">
                                            <div class="panel-body">
                                                <div class="timeline-item-header">
                                                    <img src="assets/images/avatar2.png" alt="">
                                                    <p>Sandra Smith <span>Uploaded Photo</span></p>
                                                    <small>2 hours ago</small>
                                                </div>
                                                <div class="timeline-item-post">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p>
                                                    <img src="assets/images/post-image.jpg" alt="">
                                                    <div class="timeline-options">
                                                        <a href="#"><i class="icon-like"></i> Like (14)</a>
                                                        <a href="#"><i class="icon-bubble"></i> Comment (1)</a>
                                                        <a href="#"><i class="icon-share"></i> Share (5)</a>
                                                    </div>
                                                    <div class="timeline-comment">
                                                        <div class="timeline-comment-header">
                                                            <img src="assets/images/avatar5.png" alt="">
                                                            <p>Nick Doe <small>1 hours ago</small></p>
                                                        </div>
                                                        <p class="timeline-comment-text">Nullam quis risus eget urna mollis ornare vel eu leo.</p>
                                                    </div>
                                                    <textarea class="form-control" placeholder="Replay"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="panel panel-white">
                                            <div class="panel-body">
                                                <div class="timeline-item-header">
                                                    <img src="assets/images/avatar5.png" alt="">
                                                    <p>Nick Doe <span>Was in New York</span></p>
                                                    <small>6 hours ago</small>
                                                </div>
                                                <div class="timeline-item-post">
                                                    <div id="map-canvas" style="height: 200px; width: 100%;"></div>
                                                    <div class="timeline-options">
                                                        <a href="#"><i class="icon-like"></i> Like (3)</a>
                                                        <a href="#"><i class="icon-bubble"></i> Comment (0)</a>
                                                        <a href="#"><i class="icon-share"></i> Share (2)</a>
                                                    </div>
                                                    <textarea class="form-control" placeholder="Write a comment..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 m-t-lg">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <div class="panel-title">Team</div>
                                </div>
                                <div class="panel-body">
                                    <div class="team">
                                        <div class="team-member">
                                           <div class="online on"></div>
                                            <img src="assets/images/avatar1.png" alt="">
                                        </div>
                                        <div class="team-member">
                                           <div class="online off"></div>
                                            <img src="assets/images/avatar2.png" alt="">
                                        </div>
                                        <div class="team-member">
                                           <div class="online on"></div>
                                            <img src="assets/images/avatar3.png" alt="">
                                        </div>
                                        <div class="team-member">
                                           <div class="online on"></div>
                                            <img src="assets/images/avatar5.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <div class="panel-title">Some Info</div>
                                </div>
                                <div class="panel-body">
                                    <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>
                                </div>
                            </div>
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <div class="panel-title">Skills</div>
                                </div>
                                <div class="panel-body">
                                    <p>HTML5</p>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        </div>
                                    </div>
                                    <p>PHP</p>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        </div>
                                    </div>
                                    <p>Javascript</p>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-footer">
                    <div class="container">
                        <p class="no-s">2015 &copy; Modern by Steelcoders.</p>
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
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li data-menu="profile">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <p>Profile</p>
                    </a>
                </li>
                <li data-menu="inbox">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-envelope"></i>
                        </span>
                        <p>Mailbox</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-tasks"></i>
                        </span>
                        <p>Tasks</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-cog"></i>
                        </span>
                        <p>Settings</p>
                    </a>
                </li>
                <li data-menu="calendar">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <p>Calendar</p>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="cd-overlay"></div>
@endsection
