<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#212121">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Home - Snippet</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
<body>
<!-- Start your project here-->

    <main id="main">

        <nav class="navbar navbar-expand-lg navbar-scroll fixed-top scrolling-navbar">
            <div class="container">
                <a class="navbar-brand" href="#">{{ config('app.name', 'Snippet') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
                 aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            @if (Route::has('login'))
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-success btn-sm my-0" type="submit">{{ Auth::user()->name }} </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-success btn-sm my-0" type="submit">Login</a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary btn-sm my-0" type="submit">Sign up</a>
                        @endif
                    @endauth
                </div>

                    </ul>
                </div>
            @endif
                        <!-- <li class="nav-item">
                            <a class="nav-link " href="#">Login</a>
                        </li> -->
            </div>
        </nav>

        <div id="particles-js1" class="brand-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="snippet-pad">
                            <p class="snippet-text">
                                Snippet <span id="changeWord">connects<span>.
                            </p>
                            <p class="snippet-text-two">
                                Whether you need the best of talents to promote your brand, 
                                or that perfect gig to kickstart your career.<br>
                                Snippet has got you covered  🚀.
                            </p>
                        </div>

                        <div class="col-md-8 mr-auto mar">
                            <!-- <input type="text" class="form-control"> -->
                            <div class="input-group mb-3 mt-4">
                                {{-- <input type="search" class="form-control" placeholder="Email Address"> --}}
                                <a href="{{ route('register') }}" class="btn btn-material btn-block my-0" type="submit">Get Started</a>
                            </div>
                            @if (Route::has('login'))
                                @auth

                                @else
                                    <p class="account">Already have Account ?
                                        <a href="{{ route('login') }}">
                                            <span class="">Sign In</span>
                                        </a>
                                    </p>
                                @endauth
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="snippet-pad">
                            <img src="{{ asset('img/home.png') }}" alt="" width="100%">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>


        <section id="particles-js2" class="barnd-cards">
            <div id="particles-js3" class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="snippet-card-pad">
                            <p class="snippet-text text-white">
                                A Peek into Entertainment Goodness
                            </p>
                            <p class="text-white">
                                Sharinig your creative contents just got easier.
                            </p>

                            <p class="text-white">
                                Get discovered by top Entertainment Investors around the globe.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="div">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-con">
                                        <div class="card text-center card-height" id="card1">     
                                            <div class="card-title">
                                        
                                                <h4>BE FIRST</h4>
                                            </div>
                                            <div class="card-body">
                                                Get notified about the latest opportunities for you to promote your music, dancing, movie and modeling talent.
                                            </div>
                                        </div>
                                        <div class="card text-center mt-3 card-height" id="card2">
                                            <div class="card-title">
                                                <h4>ANNOUNCE</h4>
                                            </div>
                                            <div class="card-body">
                                                post your search for talent and recruit from the snippets of many applicants.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-con-two">
                                        <div class="card text-center card-height" id="card3">
                                            <div class="card-title">
                                                <h4>CONNECT</h4>
                                            </div>
                                            <div class="card-body">
                                                Upload snippets of you performing any of the listed talents. Your next investor might be watching.
                                            </div>
                                        </div>
                                        <div class="card text-center mt-3 card-height" id="card4">
                                            <div class="card-title">
                                                <h4>FILTER</h4>
                                            </div>
                                            <div class="card-body">
                                                Browse through video snippets of users and applicants before setting up an interview with them.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


{{-- 
        <section class="artisan">

            <div class="featured text-center">
                <h1 class="">Featured Job Categories</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="artisan-card-height">
                            <div class="card artisan-card text-center">
                                <img src="./img//o2.png" alt="artisan" class="mt-4">
                                <p class="mt-3">Development</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="artisan-card-height">
                            <div class="card artisan-card text-center">
                                <img src="./img/o3.png" alt="" class="mt-4">
                                <p class="mt-3">Technology</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="artisan-card-height">
                            <div class="card artisan-card text-center">
                                <img src="./img/o1.png" alt="" class="mt-4">
                                <p class="mt-3">Accounting</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="artisan-card-height">
                            <div class="card artisan-card text-center">
                                <img src="./img/o5.png" alt="" class="mt-4">
                                <p class="mt-3">Medical</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-pad">
                    <div class="col-md-3">
                        <div class="artisan-card-height">
                            <div class="card artisan-card text-center">
                                <img src="./img/o4.png" alt="" class="mt-4">
                                <p class="mt-3">Media & News</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="artisan-card-height">
                            <div class="card artisan-card text-center">
                                <img src="./img/o6.png" alt="" class="mt-4">
                                <p class="mt-3">Goverment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}



        {{-- <section class="third-sec">
            <div class="mentor text-center">
                <h2 class="">Meet the Team</h2>
            </div>
            <div class="container">
                <div class="row">

                    <div class="col-md-3">
                        <div class="card-height-1">
                            <div class="card card-list text-center">
                                <div class="img-round"></div>
                                <h4 class="mt-5 dev">Iyiola Osuagwu</h4>
                                <p class="dev-p">JavaScript / Frontend</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-height-1">
                            <div class="card card-list text-center">
                                <div class="img-round"></div>
                                <h4 class="mt-5 dev">Martins Onuoha</h4>
                                <p class="dev-p">Node.js / Backend</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-height-1">
                            <div class="card card-list text-center">
                                <div class="img-round"></div>
                                <h4 class="mt-5 dev">Jeremiah Uchenna</h4>
                                <p class="dev-p">PHP / Backend</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-height-1">
                            <div class="card card-list text-center">
                                <div class="img-round"></div>
                                <h4 class="mt-5 dev">Dayo</h4>
                                <p class="dev-p">Creative Content Developer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}



        {{-- <section class="third-sec">
            <div class="mentor text-center">
                <h2 class="">Meet Our mentors</h2>
            </div>
            <div class="container">
                <div class="row">

                    <div class="col-md-3">
                        <div class="card-height-1">
                            <div class="card card-list text-center">
                                <div class="img-round"></div>
                                <h4 class="mt-5 dev">Developer</h4>
                                <p class="dev-p">Fullstack javascript</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-height-1">
                            <div class="card card-list text-center">
                                <div class="img-round"></div>
                                <h4 class="mt-5 dev">Developer</h4>
                                <p class="dev-p">Ruby</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-height-1">
                            <div class="card card-list text-center">
                                <div class="img-round"></div>
                                <h4 class="mt-5 dev">Developer</h4>
                                <p class="dev-p">Node.js / Backend</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-height-1">
                            <div class="card card-list text-center">
                                <div class="img-round"></div>
                                <h4 class="mt-5 dev">Developer</h4>
                                <p class="dev-p">this.MartinOnauha</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}


        <!-- <footer class="black">
            <div class="container">
                <div class="copyright p-3 text-white">
                    snippet @ 2018
                </div>
            </div>
        </footer> -->




        <!-- <section id="features">
            <div class="container">
                <div class="owl-carousel owl-theme col-md-offset-1">
                    <div class="item back1" style="color: white;">
                        <div class="card-height-1">
                            <div class="card card-list">

                            </div>
                        </div>
                    </div>
                    <div class="item back2" style="color: white;">
                        <div class="card-height-1">
                            <div class="card card-list">

                            </div>
                        </div>
                    </div>
                    <div class="item back3" style="color: white;">
                        <div class="card-height-1">
                            <div class="card card-list">

                            </div>
                        </div>
                    </div>
                    <div class="item back4" style="color: white;">
                        <div class="card-height-1">
                            <div class="card card-list">

                            </div>
                        </div>
                    </div>
                    <div class="item back5" style="color: white;">
                        <div class="card-height-1">
                            <div class="card card-list">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
    </main>



    <style>

    </style>

    <!-- /Start your project here-->




    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/owl.carousel.js') }}"></script>
    {{-- Particles JS --}}
    <script type="text/javascript" src="{{ asset('js/particles.min.js') }}"></script>
    {{-- Typed Js --}}
    <script src="{{ asset('js/typed.min.js') }}"></script>

    <script type="text/javascript">
        particlesJS.load('particles-js1', 'assets/particles.json', function() {
            console.log('callback - particles.js config loaded');
        });
        particlesJS.load('particles-js2', 'assets/particles.json', function() {
            console.log('callback - particles.js config loaded');
        });
        var typed2 = new Typed('#changeWord', {
		    strings: ['connects', 'inspires', 'grows'],
		    typeSpeed: 50,
		    backSpeed: 30,
		    fadeOut: true,
		    loop: true,
		 });
        var owl = $('.owl-carousel');
        owl.owlCarousel({

            loop: true,
            margin: 9,
            autoplay: true,
            autoplayTimeout: 9000,
            autoplayHoverPause: true,

            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });
        $('.play').on('click', function () {
            owl.trigger('play.owl.autoplay', [1000])
        })
        $('.stop').on('click', function () {
            owl.trigger('stop.owl.autoplay')
        })
    </script>

</body>

</html>