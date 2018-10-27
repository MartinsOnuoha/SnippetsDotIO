@extends('layouts.main')
 
@section('content')
            <!-- Page Sidebar -->
    @if ($user)
    <div class="page-inner">
            <div class="profile-cover">
                <div class="container">
                    <div class="col-md-12 profile-info">
                        <div class="profile-info-value text-center">
                            @if ($user)
                                <h3>{{ $user->countFriends() }}</h3>
                            @else
                                <h3>Unknown User</h3>
                            @endif
                            <p>Connections</p>
                        </div>
                        <!-- call a countPosts() method from the Posts Trait -->
                        <div class="profile-info-value text-center">
                            <h3>{{ count(Auth::user()->getSnippets()) }}</h3>
                            @if ($user->isInvestor())
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
                        <p class="text-center user-type">{{ $user->user_type }}</p>
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
                                @if(Auth::user()->user_type =="talent")
                                    <h4>Add Snippet</h4>
                                @else
                                    <h4>Add Gig</h4>
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
                        @endif

                        <div class="profile-timeline">
                            <ul class="list-unstyled">
                                @foreach($user->getSnippets() as $snippet)
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
                                                    <span>posted a {{ $snippet->snippet_type }}</span>
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
                                                    {{-- <a href="#"><i class="icon-like"></i> Likes ({{ $snippet->likes }})</a> --}}
                                                    <Like :snippet_id={{ $snippet->id }} :likes={{ $snippet->likes }}></Like>
                                                </div>

                                                @if($user->id === Auth::user()->id)
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
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach  
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
                            <div id="pending-req-div" class="panel-body">
                                @foreach ($user->getPendingRequestSent() as $pending)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>{{ $pending->name }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <Cancel :profile_user_id="{{ $pending->id }}"></Cancel>
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
                                            <Cancel :profile_user_id="{{ $pending->id }}"></Cancel>
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
        @else
        <h3>User Not Found</h3>
        @endif
        </div><!-- Page Inner -->       
    </main><!-- Page Content -->  
    <div class="cd-overlay"></div>     
    


        
    
@endsection
