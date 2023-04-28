@extends('layouts.layout')

@section('content')
    @include('home.hero-slider')

    <!-- =============== START OF TOP MOVIES SECTION =============== -->
    <section class="top-movies2">
        <div class="container">
            <div class="row">
                @php
                    $containerClasses = ['col-sm-6 col-xs-12', 'col-sm-6 d-none d-sm-block', 'd-none d-lg-block', 'd-none d-lg-block'];
                @endphp
                @foreach ($top4movies as $movie)
                    @include('components.movie-item-dark', [
                        'movie' => $movie,
                        'containerClass' => $containerClasses[$loop->index],
                    ])
                @endforeach
            </div>
        </div>
    </section>
    <!-- =============== END OF TOP MOVIES SECTION =============== -->

    <!-- =============== START OF HOW IT WORKS SECTION =============== -->
    <section class="how-it-works4 pt50 pb100">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">How it works?</h2>
                    <h6 class="subtitle">Feeling confused? start here.</h6>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <div class="icon-box2">
                        <i class="fa fa-film"></i>
                        <h4 class="title">Pick your movie</h4>
                        <p>Browse our extensive and exciting collection of movies. Still don't know what to watch? take a
                            look at our <a href={{ route('movies.index') }} class="text-primary">recommendations.</a></p>
                    </div>

                    <div class="icon-box2">
                        <i class="fa fa-ticket"></i>
                        <h4 class="title">Reserve your ticket</h4>
                        <p>Reserve your ticket to your favourite movie!</p>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="icon-box2">
                        <i class="icon-login"></i>
                        <h4 class="title">Register</h4>
                        <p>Register your account to reserve and pay for tickets. Also to stay up to date with the latest
                            offers and news.</p>
                    </div>

                    <div class="icon-box2">
                        <i class="icon-heart"></i>
                        <h4 class="title">Enjoy!</h4>
                        <p>Enjoy your movie at one of our cinema rooms, order snacks while you're at it. Your convinence is
                            our priority.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- =============== END OF HOW IT WORKS SECTION =============== -->

    <!-- =============== START OF LATEST RELEASES SECTION =============== -->
    <section class="latest-releases bg-light ptb100">
        <div class="container">

            <!-- Start of row -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">Newest Movies</h2>
                    <h6 class="subtitle">View our latest movies collection.</h6>
                </div>
            </div>
            <!-- End of row -->
        </div>
        <!-- End of Container -->

        <!-- Start of Latest Releases Slider -->
        <div class="owl-carousel latest-releases-slider">
            @each('components.movie-item', $newest_movies, 'movie')
        </div>
        <!-- End of Latest Releases Slider -->

        <div class="text-center pt-3">
            <a class="btn btn-main btn-effect" href="{{ route('movies.index') }}">See All Movies</a>
        </div>
    </section>
    <!-- =============== END OF LATEST RELEASES SECTION =============== -->

    <!-- =============== START OF FEATURES SECTION =============== -->
    <section class="features">
        <div class="row">

            <div class="col-md-6 col-sm-12 with-bg overlay-gradient"
                style="background: url({{ asset('images/other/people-cinema.jpg') }})"></div>

            <div class="col-md-6 col-sm-12 bg-white">
                <div class="features-wrapper">
                    <h3 class="title">Watch all newest Movies once they get released!</h3>
                    @guest
                        <p>Sign up or register now to reserve you own tickets. And get notified on new offers and news!</p>
                        <a class="btn btn-main btn-effect" href="{{ route('register') }}">Register</a>
                    @endguest

                    @auth
                        <p>Start reserving your tickets to enjoy the latest and greatest movies!</p>
                        <a class="btn btn-main btn-effect" href="{{ route('movies.index') }}">Shows</a>
                    @endauth
                </div>
            </div>

        </div>
    </section>
    <!-- =============== END OF FEATURES SECTION =============== -->

    <!-- =============== END OF SUBSCRIBE SECTION =============== -->
    <section class="subscribe bg-light2 ptb100">
        <div class="container">

            <!-- Start of row -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    @guest
                        <h2 class="title">Join Cinemat Now!</h2>
                        <h6 class="subtitle">Enter your email to be notified about any news and new offers!</h6>
                    @endguest

                    @auth
                        <h2 class="title">Thanks For Using {{ config('app.name') }}!</h2>
                        <h6 class="subtitle">We hope you enjoy your experience with us!</h6>
                    @endauth
                </div>
            </div>
            <!-- End of row -->


            @guest
                <!-- Start of row -->
                <div class="row justify-content-center">
                    <div class="col-md-7 col-sm-10 col-12">

                        <!-- Subscribe Form -->
                        <form method="POST" action="{{ route('leads') }}" class="mt50">
                            @csrf
                            <!-- Form -->
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Your Email" autocomplete="off">
                                    <label for="email"></label>
                                    <button type="submit" class="btn btn-main btn-effect">Subscribe</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- End of row -->
            @endguest


        </div>
    </section>
    @include('components.flash-message')
    <!-- =============== END OF SUBSCRIBE SECTION =============== -->
@endsection
