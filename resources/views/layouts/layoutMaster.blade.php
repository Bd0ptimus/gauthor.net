<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gấu và Thỏ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
    <meta name="author" content="FREEHTML5.CO" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!--
 //////////////////////////////////////////////////////

 FREE HTML5 TEMPLATE
 DESIGNED & DEVELOPED by FREEHTML5.CO

 Website: 		http://freehtml5.co/
 Email: 			info@freehtml5.co
 Twitter: 		http://twitter.com/fh5co
 Facebook: 		https://www.facebook.com/fh5co

 //////////////////////////////////////////////////////
 -->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />


    @php $url="http://bcfd-93-188-41-67.eu.ngrok.io" @endphp
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet'
        type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Passions Conflict" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script> --}}
    {{-- <!-- Animate.css -->
    <link rel="stylesheet" href="{{env('APP_URL')}}/loving-web/public/front/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{env('APP_URL')}}/loving-web/public/front/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{env('APP_URL')}}/loving-web/public/front/css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{env('APP_URL')}}/loving-web/public/front/css/magnific-popup.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{env('APP_URL')}}/loving-web/public/front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{env('APP_URL')}}/loving-web/public/front/css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{env('APP_URL')}}/loving-web/public/front/css/style.css">

    <link rel="stylesheet" href="{{env('APP_URL')}}/loving-web/public/front/css/app.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}/loving-web/public/front/css/nav-bar/navbar.css"> --}}
    @livewireStyles



{{--
    <!-- jQuery -->
    <script src="{{env('APP_URL')}}/loving-web/public/front/js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="{{env('APP_URL')}}/loving-web/public/front/js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="{{env('APP_URL')}}/loving-web/public/front/js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="{{env('APP_URL')}}/loving-web/public/front/js/jquery.waypoints.min.js"></script>
    <!-- Carousel -->
    <script src="{{env('APP_URL')}}/loving-web/public/front/js/owl.carousel.min.js"></script>
    <!-- countTo -->
    <script src="{{env('APP_URL')}}/loving-web/public/front/js/jquery.countTo.js"></script>

    <!-- Stellar -->
    <script src="{{env('APP_URL')}}/loving-web/public/front/js/jquery.stellar.min.js"></script>
    <!-- Magnific Popup -->
    <script src="{{env('APP_URL')}}/loving-web/public/front/js/jquery.magnific-popup.min.js"></script>

    <script src="{{env('APP_URL')}}/loving-web/public/front/js/magnific-popup-options.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script>

    <script src="{{env('APP_URL')}}/loving-web/public/front/js/simplyCountdown.js"></script>
    <!-- Main -->
    <script src="{{env('APP_URL')}}/loving-web/public/front/js/main.js"></script>

    <script src="https://kit.fontawesome.com/04e9a3dbb4.js" crossorigin="anonymous"></script>

    <script src="{{env('APP_URL')}}/loving-web/public/front/js/modernizr-2.6.2.min.js"></script>

    <script src="{{env('APP_URL')}}/loving-web/public/front/js/nav-bar/navbar.js"></script> --}}

    @livewireScripts



    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('front/css/icomoon.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.css') }}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('front/css/magnific-popup.css') }}">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.theme.default.min.css') }}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('front/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/css/nav-bar/navbar.css') }}">




    <!-- jQuery -->
    <script src="{{ asset('front/js/jquery.min.js') }}"></script>
    <!-- jQuery Easing -->
    <script src="{{ asset('front/js/jquery.easing.1.3.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('front/js/jquery.waypoints.min.js') }}"></script>
    <!-- Carousel -->
    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
    <!-- countTo -->
    <script src="{{ asset('front/js/jquery.countTo.js') }}"></script>

    <!-- Stellar -->
    <script src="{{ asset('front/js/jquery.stellar.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>

    <script src="{{ asset('front/js/magnific-popup-options.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script>

    <script src="{{ asset('front/js/simplyCountdown.js') }}"></script>
    <!-- Main -->
    <script src="{{ asset('front/js/main.js') }}"></script>

    <script src="https://kit.fontawesome.com/04e9a3dbb4.js" crossorigin="anonymous"></script>

    <script src="{{ asset('front/js/modernizr-2.6.2.min.js') }}"></script>

    <script src="{{ asset('/front/js/nav-bar/navbar.js') }}"></script>


</head>
