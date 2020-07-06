<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Assessment Task</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/animate-css/animate.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    
</head>

<body>


    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')


   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
   <script src="{{asset('js/popper.js')}}"></script>
   <script src="{{asset('js/bootstrap.min.js')}}"></script>
   <script src="{{asset('js/stellar.js')}}"></script>
   <script src="{{asset('vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
   <script src="{{asset('vendors/isotope/isotope.pkgd.min.js')}}"></script>
   <script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
   <script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
   <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
   <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
   <script src="{{asset('js/mail-script.js')}}"></script>
   <script src="{{asset('js/contact.js')}}"></script>
   <script src="{{asset('js/jquery.form.js')}}"></script>
   <script src="{{asset('js/jquery.validate.min.js')}}"></script>
   <script src="{{asset('js/mail-script.js')}}"></script>
   <script src="{{asset('js/theme.js')}}"></script>
</body>
</html>