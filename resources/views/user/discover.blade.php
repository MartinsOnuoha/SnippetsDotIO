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
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h4 class="panel-title">Discover</h4>
                                <div class="panel-control">
                                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" class="panel-reload" data-original-title="Reload"><i class="icon-reload"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="inbox-widget slimscroll">
                                    @if(Auth::user()->isInvestor())
                                        @foreach (Auth::user()->getAllTalents() as $person)
                                        <div class="inbox-item text-center">
                                            <div class="user-box m-t-lg row">
                                                <div class="col-md-12 m-b-md">
                                                    <img src="{{ asset($person->avatar) }}" class="img-circle m-t-xxs" alt="">
                                                </div>
                                                <div class="col-md-12">
                                                    <a href="{{ route('profile', $person->slug) }}">
                                                        <p class="no-m text-center" style="font-size: 20px">{{ $person->name }}</p>
                                                    </a>
                                                    <p class="text-sm text-center">{{ $person->email }}</p>
                                                
                                                    <div class="text-center">
                                                        <div class="text-center center-align">
                                                            <Friend :profile_user_id="{{ $person->id }}"></Friend>
                                                        </div><!-- /btn-group -->
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>      
                                        @endforeach
    
                                        @else
                                            @foreach (Auth::user()->getAllInvestors() as $person) 
                                            <div class="inbox-item text-center">
                                                <div class="user-box m-t-lg row">
                                                    <div class="col-md-12 m-b-md">
                                                        <img src="{{ asset($person->avatar) }}" class="img-circle m-t-xxs" alt="">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <a href="{{ route('profile', $person->slug) }}">
                                                            <p class="no-m text-center" style="font-size: 20px">{{ $person->name }}</p>
                                                        </a>
                                                        <p class="text-sm text-center">{{ $person->email }}</p>
                                                        <div class="text-center">
                                                            <div class="">
                                                                <Friend :profile_user_id="{{ $person->id }}"></Friend>
                                                            </div><!-- /btn-group -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>         
                                            @endforeach                                        
                                        @endif
                                </div>
                
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 m-t-lg">
                        @if (Auth::user()->isInvestor())
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


@endsection