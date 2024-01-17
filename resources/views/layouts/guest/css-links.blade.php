<link rel="stylesheet" href="{{ asset('guest/css/all.min.css') }}">
{{-- animation --}}
<link rel="stylesheet" href="{{ asset('guest/css/en/animate.css') }}">


{{-- Icomoon Icon Fonts --}}
<link rel="stylesheet" href="{{ asset('guest/css/en/icomoon.css') }}">
{{-- Bootstrap --}}
<link rel="stylesheet" href="{{ asset('guest/css/en/bootstrap.css') }}">
{{--Owl Carousel --}}
<link rel="stylesheet" href="{{ asset('guest/css/en/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('guest/css/en/owl.theme.default.min.css') }}">
{{-- Magnific Popup  --}}
<link rel="stylesheet" href="{{ asset('guest/css/en/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('guest/css/framework.css') }}">


{{--  Modernizr JS --}}
<script src="{{ asset('guest/js/modernizr-2.6.2.min.js') }}"></script>

<!--[if lt IE 9]>
<script src="js/respond.min.js"></script>
<![endif]-->

{{-- files depend for langs --}}
@if(App::getLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('guest/css/ar/style.css') }}">

@else
    <link rel="stylesheet" href="{{ asset('guest/css/en/style.css') }}">
@endif
