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
                                    <div class="panel-body">
                                        @if(Auth::user()->isInvestor())
                                            <h4>Add Gig</h4>
                                        @else
                                            <h4>Add Snippet</h4>
                                        @endif
                                        <div class="post">
                                            <form action="{{ route('snippet.add') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
        
                                                <input class="form-control" placeholder="Snippet Tags separated by commas e.g #singing, #dancing" rows="4=6" name="snippetags" required><br/>
                                                <textarea class="form-control" placeholder="Post" rows="4=6" name="snippetdetails" require></textarea>
                                                <div class="post-options">
                                                    <label for="snippetfile" style="cursor: pointer;"><i class="icon-cloud-upload"></i></label>
                                                    @if(Auth::user()->isInvestor())
                                                        <input type="file" style="display: none;" id="snippetfile" name="snippetfile" class="form-control" accept="image/*" required>
                                                    @else
                                                        <input type="file" style="display: none;" id="snippetfile" name="snippetfile" class="form-control" accept="image/*,video/*" required>
                                                    @endif
        
                                                    <button type="submit" class="btn btn-default pull-right">Post</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-timeline">
                                    <ul class="list-unstyled">
                                        @foreach(Auth::user()->getAllSnippets() as $snippet)
                                        <li class="timeline-item">
                                            <div class="panel panel-white">
                                                <div class="panel-body">
                                                    <div class="timeline-item-header">
                                                        <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="">
                                                        <p>
                                                            @if($snippet->user_id === Auth::user()->id)
                                                                <a href="{{ route('profile', Auth::user()->slug) }}">You</a>
                                                            @else
                                                                <a href="{{ route('profile', $snippet->user_slug) }}">{{ $snippet->user_name }}</a>
                                                            @endif
                                                            <span>Posted a {{ $snippet->snippet_type }}</span>
                                                        </p>
                                                        <small>{{ $snippet->created_at }}</small>
                                                    </div>
                                                    <div class="timeline-item-post">
                                                        <p>{{ $snippet->snippetags }}</p>
                                                        <p>{{ $snippet->snippetdetails }}</p>
                                                        @if($snippet->file_type == "image")
                                                            <img src="{{ asset(''. $snippet->snippetfile . '') }}" alt="">
                                                        @elseif($snippet->file_type == "video")
                                                            <video class="snippetvideo" controls>
                                                                <source src="{{ asset(''. $snippet->snippetfile . '') }}" type="video/{{ $snippet->file_extension }}">
                                                            </video>
                                                        @endif
                                                    <div class="timeline-options">
                                                        <Like :snippet_id={{ $snippet->id }} :likes={{ $snippet->likes }}></Like>
                                                    </div>
                                                    @if($snippet->user_id === Auth::user()->id)
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a href="{{ route('snippet.delete', $snippet->id) }}">
                                                                <i class="icon-trash text-red" style="margin-right: 40px;"></i>
                                                            </a>
                                                            <a href="{{ route('snippet.edit', $snippet->id) }}">
                                                                <i class="icon-pencil ml-5"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    @else
                                                        <button class="btn btn-primary btn-block"><i class="fa fa-check m-r-xs"></i>I'm Interested</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach  
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


                            @if (Auth::user()->isTalent())
                                <div class="panel panel-white">
                                    <div class="panel-heading">
                                        <div class="panel-title">Latest GiG</div>
                                    </div>
                                    @foreach(Auth::user()->getAllSnippets() as $snippet)
                                    <div class="panel-body">
                                        <p>{{ $snippet->snippetdetails }}</p>
                                        <button class="btn btn-primary btn-block"><i class="fa fa-check m-r-xs"></i>I'm Interested</button>
                                    </div>
                                    @endforeach
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
        
        <div class="cd-overlay"></div>
@endsection
