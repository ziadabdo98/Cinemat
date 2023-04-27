<head>
    <meta charset="UTF-8">

    <!-- ===== Mobile viewport optimized ===== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">

    <!-- ===== Meta Tags - Description for Search Engine purposes ===== -->
    <meta name="description" content="Cinemat - Ticket reservation">
    <meta name="keywords" content="movies, cinema, reservation, tickets">
    <meta name="author" content="zoz">

    <!-- ===== Website Title ===== -->
    <title>{{ config('app.name') }}</title>

    <!-- ===== Favicon ===== -->
    <link rel="shortcut icon" href={{ asset('images/branding/logos/favicon.png') }} type="image/x-icon">

    <!-- ===== Google Fonts ===== -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

    <!-- ===== CSS links ===== -->
    <link rel="stylesheet" type="text/css" href={{ asset('css/bootstrap.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('revolution/css/settings.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('revolution/css/layers.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('revolution/css/navigation.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('css/magnific-popup.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('css/jquery.mmenu.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('css/owl.carousel.min.css') }}>

    <link rel="stylesheet" type="text/css" href={{ asset('css/style.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('css/responsive.css') }}>

    @stack('head')
</head>
