<!DOCTYPE html>
<html>
<head><title>مؤسسة FDF</title>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="apple-touch-icon" href="{{asset('assets/front/images/logo.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/front/images/logo.png')}}">


    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/front/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('assets/front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('assets/front/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('assets/front/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap-datepicker.css')}}">
{{--    <link rel="stylesheet" href="{{asset('assets/front/css/jquery.timepicker.css')}}">--}}


    <link rel="stylesheet" href="{{asset('assets/front/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">



    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>


@include('front.includes.alerts.success')
@include('front.includes.alerts.errors')
<!--start of Header-->
@include('front.includes.header')
<!--end of Header-->

{{--Start Content Here--}}
@yield('content')
{{--End Content Here--}}


<!--start of footer-->
@include('front.includes.footer')
<!--end of footer-->


<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<!--start of copy-->
<section class="copy text-center" dir="ltr">
    <p class="wow fadeIn"><a class="cr" style="color: #9c992c;" href="https://www.facebook.com/NoOneGiveShit/">
Ebrahim Ashraf        </a>
        - All Rights Reserved {{date('Y')}}.</p>
</section>
<!--end of copy-->

<script src="{{asset('assets/front/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('assets/front/js/popper.min.js')}}"></script>
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('assets/front/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/front/js/aos.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('assets/front/js/bootstrap-datepicker.js')}}"></script>
{{--<script src="{{asset('assets/front/js/jquery.timepicker.min.js')}}"></script>--}}
<script src="{{asset('assets/front/js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{asset('assets/front/js/google-map.js')}}"></script>
<script src="{{asset('assets/front/js/main.js')}}"></script>

@yield('script')
</body>

</html>
