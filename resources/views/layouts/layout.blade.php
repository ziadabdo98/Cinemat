<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- ===== Mobile viewport optimized ===== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">

    <!-- ===== Meta Tags - Description for Search Engine purposes ===== -->
    <meta name="description" content="Cinemat - Ticket reservation">
    <meta name="keywords" content="movies, cinema, reservation, tickets">
    <meta name="author" content="Zoz">

    <!-- ===== Website Title ===== -->
    <title>{{config('app.name')}}</title>

    <!-- ===== Favicon & Different size apple touch icons ===== -->
    <link rel="shortcut icon" href={{  asset('images/branding/logos/favicon.png')  }} type="image/x-icon">

    <!-- ===== Google Fonts ===== -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

    <!-- ===== CSS links ===== -->
    <link rel="stylesheet" type="text/css" href={{  asset('css/bootstrap.min.css')  }}>
    <link rel="stylesheet" type="text/css" href={{  asset('revolution/css/settings.css')  }}>
    <link rel="stylesheet" type="text/css" href={{  asset('revolution/css/layers.css')  }}>
    <link rel="stylesheet" type="text/css" href={{  asset('revolution/css/navigation.css')  }}>
    <link rel="stylesheet" type="text/css" href={{  asset('css/magnific-popup.css')  }}>
    <link rel="stylesheet" type="text/css" href={{  asset('css/jquery.mmenu.css')  }}>
    <link rel="stylesheet" type="text/css" href={{  asset('css/owl.carousel.min.css')  }}>

    <link rel="stylesheet" type="text/css" href={{ asset('css/style.css')  }}>
    <link rel="stylesheet" type="text/css" href={{ asset('css/responsive.css')  }}>
</head>

<body>
    <!-- =============== START OF RESPONSIVE - MAIN NAV =============== -->
    <nav id="main-mobile-nav"></nav>
    <!-- =============== END OF RESPONSIVE - MAIN NAV =============== -->

    <!-- =============== START OF HEADER NAVIGATION =============== -->
    <!-- Insert the class "sticky" in the header if you want a sticky header -->
    <header class="header header-fixed text-black">
        <div class="container-fluid">

            <!-- ====== Start of Navbar ====== -->
            <nav class="navbar navbar-expand-lg">

                <a class="navbar-brand" href="index.html">
                    <!-- INSERT YOUR LOGO HERE -->
                    <img src={{  asset('images/branding/logos/logo-bt.png')  }} alt="logo" width="200" class="logo">
                    <!-- INSERT YOUR WHITE LOGO HERE -->
                    <img src={{  asset('images/branding/logos/logo-w.png')  }} alt="white logo" width="200" class="logo-white">
                </a>

                <!-- Login Button on Responsive -->
                <a href="#login-register-popup" class="login-mobile-btn popup-with-zoom-anim"><i class="icon-user"></i></a>

                <button id="mobile-nav-toggler" class="hamburger hamburger--collapse" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>

                <!-- ====== Start of #main-nav ====== -->
                <div class="navbar-collapse" id="main-nav">

                    <!-- ====== Start of Main Menu ====== -->
                    <ul class="navbar-nav mx-auto" id="main-menu">
                        <!-- Menu Item -->
                        <li class="nav-item">
                            <a class="nav-link" href={{  route('home')  }}>Home</a>
                        </li>

                        <!-- Menu Item -->
                        <li class="nav-item">
                            <a class="nav-link" href="contact-us.html">Movies</a>
                        </li>

                        <!-- Menu Item -->
                        <li class="nav-item">
                            <a class="nav-link" href="contact-us.html">What to Watch?</a>
                        </li>

                        <!-- Menu Item -->
                        <li class="nav-item">
                            <a class="nav-link" href="contact-us.html">Contact us</a>
                        </li>

                    </ul>
                    <!-- ====== End of Main Menu ====== -->


                    <!-- ====== Start of Extra Nav ====== -->
                    <ul class="navbar-nav extra-nav">

                        <!-- Menu Item -->
                        <li class="nav-item notification-wrapper">
                            <a class="nav-link notification" href="#">
                                <i class="fa fa-ticket"></i>
                                <span class="notification-count">2</span>
                            </a>
                        </li>

                        <!-- Menu Item -->
                        <li class="nav-item">
                            <a href="#login-register-popup" class="btn btn-main btn-effect login-btn">
                                <i class="icon-user"></i>login</a>
                        </li>
                    </ul>
                    <!-- ====== End of Extra Nav ====== -->

                </div>
                <!-- ====== End of #main-nav ====== -->
            </nav>
            <!-- ====== End of Navbar ====== -->

        </div>
    </header>
    <!-- =============== END OF HEADER NAVIGATION =============== -->


    @yield('content')

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
                            <img src={{  asset('images/branding/logos/logo-bt.png')  }} alt="logo" class="logo">
                            <!-- INSERT YOUR WHITE LOGO HERE -->
                            <img src={{  asset('images/branding/logos/logo-w.png')  }} alt="white logo" class="logo-white">
                            <p class="nomargin">{{  config('app.name')  }} is a ticket reservation system designed for cinemas. It features a great number of features, from normal ticket reservation to multi-user roles. It was developed using laravel 8. We hope you like it.</p>
                        </div>
                    </div>
                    <!-- End of Widget 1 -->

                    <!-- Start of Widget 2 -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget widget-links">
                            <h4 class="widget-title">Sitemap</h4>

                            <ul class="general-listing">
                                <li><a href="#">about movify</a></li>
                                <li><a href="#">blog</a></li>
                                <li><a href="#">forum</a></li>
                                <li><a href="#">my account</a></li>
                                <li><a href="#">watch list</a></li>
                            </ul>

                        </div>
                    </div>
                    <!-- End of Widget 2 -->

                    <!-- Start of Widget 3 -->
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget widget-blog">
                            <h4 class="widget-title">Nearest Movies</h4>

                            <ul class="blog-posts">
                                <li><a href="#">blog post 1</a><small>januar 13, 2018</small></li>
                                <li><a href="#">blog post 2</a><small>januar 13, 2018</small></li>
                                <li><a href="#">blog post 3</a><small>januar 13, 2018</small></li>
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

                            <div class="copyright ml-auto">Made with ❤️ by team #8</div>

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



    <!-- ===== All Javascript at the bottom of the page for faster page loading ===== -->
    <script src={{  asset('js/jquery-3.2.1.min.js')  }}></script>
    <script src={{  asset('js/bootstrap.min.js')  }}></script>
    <script src={{  asset('js/jquery.ajaxchimp.js')  }}></script>
    <script src={{  asset('js/jquery.magnific-popup.min.js')  }}></script>
    <script src={{  asset('js/jquery.mmenu.js')  }}></script>
    <script src={{  asset('js/jquery.inview.min.js')  }}></script>
    <script src={{  asset('js/jquery.countTo.min.js')  }}></script>
    <script src={{  asset('js/jquery.countdown.min.js')  }}></script>
    <script src={{  asset('js/owl.carousel.min.js')  }}></script>
    <script src={{  asset('js/imagesloaded.pkgd.min.js')  }}></script>
    <script src={{  asset('js/isotope.pkgd.min.js')  }}></script>
    <script src={{  asset('js/headroom.js')  }}></script>
    <script src={{  asset('js/custom.js')  }}></script>

    <!-- ===== Slider Revolution core JavaScript files ===== -->
    <script type="text/javascript" src={{  asset('revolution/js/jquery.themepunch.tools.min.js')  }}></script>
    <script type="text/javascript" src={{  asset('revolution/js/jquery.themepunch.revolution.min.js')  }}></script>

    <!-- ===== Slider Revolution extension scripts ===== -->
    <script type="text/javascript" src={{  asset('revolution/js/extensions/revolution.extension.actions.min.js')  }}></script>
    <script type="text/javascript" src={{  asset('revolution/js/extensions/revolution.extension.carousel.min.js')  }}></script>
    <script type="text/javascript" src={{  asset('revolution/js/extensions/revolution.extension.kenburn.min.js')  }}></script>
    <script type="text/javascript" src={{  asset('revolution/js/extensions/revolution.extension.layeranimation.min.js')  }}></script>
    <script type="text/javascript" src={{  asset('revolution/js/extensions/revolution.extension.migration.min.js')  }}></script>
    <script type="text/javascript" src={{  asset('revolution/js/extensions/revolution.extension.navigation.min.js')  }}></script>
    <script type="text/javascript" src={{  asset('revolution/js/extensions/revolution.extension.parallax.min.js')  }}></script>
    <script type="text/javascript" src={{  asset('revolution/js/extensions/revolution.extension.slideanims.min.js')  }}></script>
    <script type="text/javascript" src={{  asset('revolution/js/extensions/revolution.extension.video.min.js')  }}></script>

</body>

</html>