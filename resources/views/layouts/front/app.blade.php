<!DOCTYPE html>
<html lang=en>
<head>
    <title>
        PTE Voucher  ₹9745*
    </title>
    <meta content="Want to book PTE Academic Exam online? Buy PTE Voucher online at ₹9745* & Save ₹1602 and get 11 Scored mock tests FREE. Limited Time Offer!"
          name=description>
    {{--<meta content="Want to book PTE Academic Exam online? Buy PTE Voucher online at ₹{{$rate or ''}} and get 20 Scored + 20 Unscored mock tests FREE. Get your voucher/promo code and free mock test instantly."
          name=description>--}}
    <meta property="og:url" content="https://www.buyptevoucher.in/"/>
    <meta name="author" content="BuyPteVoucher (buyptevoucher.in)"/>
    <meta content="width=device-width,initial-scale=1" name=viewport>
    <meta content="text/html; charset=utf-8" http-equiv=Content-Type>
    <meta property="og:image" content={!! asset('css/front/img/sk.png') !!}/>
    <link rel="shortcut icon" href="{{url('css/front/img/sk.png')}}" type="image/x-icon">
    <link rel="icon" href="{{url('css/front/img/sk.png')}}" type="image/x-icon">
    <script>
        //Google Analytic Code

    </script>

    <!-- Google Tag Manager -->
    <script>

    </script>

    <!-- Google Code for Remarketing Tag -->
    <!--------------------------------------------------
    Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
    --------------------------------------------------->
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5b6039f9df040c3e9e0c2085/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</head>


<link rel="stylesheet" type="text/css" href="{{url('css/front/css/bootstrap.min.css')}}" >
<!-- Scrolling-nav CSS -->

<link rel="stylesheet" type="text/css" href="{{url('css/front/css/scrolling-nav.css')}}" >
<!-- Material-kit CSS -->
<link rel="stylesheet" type="text/css" href="{{url('css/front/css/material-kit.css')}}" >
<!-- Font Icons CSS -->
<link rel="stylesheet" type="text/css" href="{{url('css/front/css/font-awesome.css')}}" >
<!-- Custom styles for this template -->
<link rel="stylesheet" type="text/css" href="{{url('css/front/css/style.css')}}" >
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>

<body>

@include('layouts.front.header')

@yield('content')
@include('layouts.front.footer')
@yield('extra')

<script src="{{url('css/front/js/jquery.js')}}"></script>
<script src="{{url('css/front/js/jquery.sticky.js')}}"></script>
<script src="{{url('css/front/js/jquery.easing.min.js')}}"></script>
<script src="{{url('css/front/js/scrolling-nav.js')}}"></script>
<script src="{{url('css/front/js/bootstrap.js')}}"></script>
<script src="{{url('css/front/js/material-kit.js')}}"></script>
<script src="{{url('css/front/js/material.min.js')}}"></script>
<script src="{{url('css/front/js/custom.js')}}"></script>

@stack('external_script')
@stack('script')

</body>
</html>
