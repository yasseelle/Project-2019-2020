<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--  bootstrap -->
     <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <!-- navbar css  /footer-->
    <link rel="stylesheet" href="{{ asset('asset/css/navbar.css') }}">

    <!-- font awsome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"  ">

    <!--  css animated -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" integrity="sha256-PHcOkPmOshsMBC+vtJdVr5Mwb7r0LkSVJPlPrp/IMpU=" crossorigin="anonymous" />
    <!--  css card style -->
    <link rel="stylesheet" href="{{ asset('asset/css/cardx.css') }}"/>

     <!--  lightbox -->
     <link rel="stylesheet" href="{{ asset('asset/css/lightbox.min.css') }}"/>

    <title>لوحة التحكم</title>
</head>
<body class="">
   
    <header>
      <a href="/"><img  class="logo" src="{{ asset('asset/svg/method-draw-image.svg') }}" alt=""></a>
      <div class="menu-toggle"></div>
      <nav>
      <ul class="ul-dashbord">
        <li><iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=small&timezone=Africa%2FCasablanca"  width="100%" height="90" frameborder="0" seamless ></iframe></li>
        <li><a href="{{url('/')}}">اعودة الى الموقع</a></li>
        <li><a class="active" href="{{ url('kitnews/dashbord') }}">الرئيسية</a></li>
        <li><a href="{{ url('kitnews/dashbord/users') }}">المستخدمين</a></li>    
        <li><a href="{{ url('kitnews/dashbord/news') }}">الاخبار</a></li>    
        <li><a href="{{ url('kitnews/dashbord/category') }}">التصنيفات</a></li>    
        <li><a href="{{ url('kitnews/dashbord/inbox') }}">علبة الرسائل</a></li>        
        @if(session()->has('my_email'))
        <li><a href="{{ url('kitnews/logout') }}">تسجيل الخروج</a></li>
        
        @else
        <li><a href="{{ url('kitnews/login') }}">تسجيل الدخول</a></li>
        @endif
      </ul>
      </nav>
      <div class="clearfix"></div>
    </header>




@yield('content')







<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=216956595701122&autoLogAppEvents=1"></script>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5e923b837daa0a0012e7bfe8&product=inline-share-buttons" async="async"></script>
<script src="{{asset('asset/js/jquery.min.js')}}"></script>
<script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('asset/js/lightbox-plus-jquery.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.menu-toggle').click(function(){
      $('.menu-toggle').toggleClass('active')
      $('nav').toggleClass('active')

    })
  })
</script>

</body>
</html>