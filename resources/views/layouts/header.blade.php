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
                        <a href={{  route('login-register')  }} class="btn btn-main btn-effect login-btn">
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
