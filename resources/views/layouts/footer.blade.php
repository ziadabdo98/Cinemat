<!-- =============== START OF FOOTER =============== -->
<footer class="footer1 bg-dark">

    <!-- ===== START OF FOOTER WIDGET AREA ===== -->
    <div class="footer-widget-area ptb100">
        <div class="container">
            <div class="row">

                <!-- Start of Widget 1 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget widget-about">

                        <!-- INSERT YOUR LOGO HERE -->
                        <img src={{ asset('images/branding/logos/logo-bt.png') }} alt="logo" class="logo">
                        <!-- INSERT YOUR WHITE LOGO HERE -->
                        <img src={{ asset('images/branding/logos/logo-w.png') }} alt="white logo" class="logo-white">
                        <p class="nomargin">{{ config('app.name') }} is a ticket reservation system designed for
                            cinemas. It features a great number of features, from normal ticket reservation to
                            multi-user roles. It was developed using laravel 8. We hope you like it.</p>
                    </div>
                </div>
                <!-- End of Widget 1 -->

                <!-- Start of Widget 2 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget widget-links">
                        <h4 class="widget-title">Useful Links</h4>

                        <ul class="general-listing">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('movies.index') }}">Movies</a></li>
                            <li><a href="{{ route('movies.index') }}">What to watch</a></li>
                            <li><a href="{{ route('dashboard') }}">my account</a></li>
                        </ul>

                    </div>
                </div>
                <!-- End of Widget 2 -->

                <!-- Start of Widget 3 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget widget-blog">
                        @php
                            $newestMovies = \App\Models\Movie::orderBy('release_date', 'desc')
                                ->take(3)
                                ->get();
                        @endphp
                        <h4 class="widget-title">Newest Movies</h4>

                        <ul class="blog-posts">
                            @foreach ($newestMovies as $movie)
                                <li><a
                                        href="{{ route('movies.show', $movie->id) }}">{{ $movie->title }}</a><small>{{ $movie->release_date->format('d M Y') }}</small>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- End of Widget 3 -->

                <!-- Start of Widget 4 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget widget-social">
                        <h4 class="widget-title">follow us</h4>

                        <p>Follow us on our socials, to be up to date on any news and offers!</p>

                        <!-- Start of Social Buttons -->
                        <ul class="social-btns">
                            <!-- Social Media -->
                            <li>
                                <a href="#" class="social-btn-roll facebook">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-facebook"></i>
                                        <i class="social-btn-roll-icon fa fa-facebook"></i>
                                    </div>
                                </a>
                            </li>

                            <!-- Social Media -->
                            <li>
                                <a href="#" class="social-btn-roll twitter">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-twitter"></i>
                                        <i class="social-btn-roll-icon fa fa-twitter"></i>
                                    </div>
                                </a>
                            </li>

                            <!-- Social Media -->
                            <li>
                                <a href="#" class="social-btn-roll google-plus">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-google-plus"></i>
                                        <i class="social-btn-roll-icon fa fa-google-plus"></i>
                                    </div>
                                </a>
                            </li>

                            <!-- Social Media -->
                            <li>
                                <a href="#" class="social-btn-roll instagram">
                                    <div class="social-btn-roll-icons">
                                        <i class="social-btn-roll-icon fa fa-instagram"></i>
                                        <i class="social-btn-roll-icon fa fa-instagram"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- End of Social Buttons -->

                    </div>
                </div>
                <!-- End of Widget 4 -->

            </div>
        </div>
    </div>
    <!-- ===== END OF FOOTER WIDGET AREA ===== -->


    <!-- ===== START OF FOOTER COPYRIGHT AREA ===== -->
    <div class="footer-copyright-area ptb30">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex">
                        <div class="links">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="#">Privacy & Cookies</a></li>
                                <li class="list-inline-item"><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>

                        <div class="copyright ml-auto">Made with ❤️</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ===== END OF FOOTER COPYRIGHT AREA ===== -->

</footer>
<!-- =============== END OF FOOTER =============== -->
<!-- ===== Start of Back to Top Button ===== -->
<div id="backtotop">
    <a href="#"></a>
</div>
<!-- ===== End of Back to Top Button ===== -->
