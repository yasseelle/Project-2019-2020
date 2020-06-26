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

    <title></title>
</head>
<body class="">
   
    <header>
      <a href="/"><img  class="logo" src="{{ asset('asset/svg/method-draw-image.svg') }}" alt=""></a>
      <div class="menu-toggle"></div>
      <nav>
      <ul class="ul-dashbord">
        <li><iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=small&timezone=Africa%2FCasablanca"  width="100%" height="90" frameborder="0" seamless ></iframe></li>
        <li><a href="{{url('/')}}">الصفحة الرئيسية</a></li>
        <li><a class="active" href="{{url('/kitnews/news')}}">الاخبار</a></li>
        <li><a href="#cattype">تصنيفات الاخبار</a></li>
        <li><a href="">عن الموقع</a></li>
        <li><a href="#fot">اتصل بنا</a></li>
        @if(session()->has('my_role'))
        <li><a href="{{ url('kitnews/dashbord') }}">لوحة التحكم</a></li>
        @endif        
        @if(session()->has('my_email'))
        <li><a href="{{ url('kitnews/logout') }}">تسجيل الخروج</a></li>
        
        @else
        <li><a href="{{ url('kitnews/login') }}">تسجيل الدخول</a></li>
        @endif
      </ul>
      </nav>
      <div class="clearfix"></div>
    </header>


    <div class="container">
    <div class="row mt-5 justify-content-center">
 <h3 id="serchdisplay" onclick="hideshow()" class="btn btn-success fa fa-search">إظهار قائمة البحث</h3>
</div>

<div style="display:none;" id="searchfields" class="row mt-3 justify-content-center">
<div class="mb-5 col-sm-12 col-md-4 col-lg-4">
<form action="{{url('kitnews/search')}}" class="form-group" method="post">
{{ csrf_field() }}    
  <input type="text" id="nametest" name="searchname" class="form-control text-center" placeholder="البحث عن موضوع ">
  <label id="testlab"  class="mt-2 text-center">البحث عن طريق التاريخ</label>
  <input type="date" id="datefield" name="searchdate" class="form-control text-center">
  <script>datefield.max = new Date().toISOString().split("T")[0];</script>
  <input type="submit" class="form-control mt-2 btn btn-success" value="بحث">

</form>

</div>
</div>

<script type="text/javascript">
    function hideshow()
    {
      var fieldserch  =  document.getElementById('searchfields');
      var buttserch  =  document.getElementById('serchdisplay');
      if(fieldserch.style.display === "none")
      {
        fieldserch.style.display = "block";
        buttserch.innerHTML="إخفاء قائمة البحث";
      }
      else
      {
        fieldserch.style.display = "none";
        buttserch.innerHTML="إظهار قائمة البحث";
      }
    }
 
  </script>

    <div class="row mt-5 justify-content-center" >            
    <h3> نتيجة البحث {{$countdata}}  موضوع</h3>
    </div>
<div class="row mt-5 justify-content-center" >            
    @foreach($data as $newscard)
<div class="mb-5 mt-5 col-sm-12 col-md-4 col-lg-4">
<div class="card shadowx">
  <img src="{{ asset($newscard->img) }}" class="card-img-top" style="height:15rem;" alt="...">
  <div class="card-body shadowx" style="background:#069370;" >
    <h3 class="card-title   " style="background:#069370;color:#fff;font-size:19px"> {{substr($newscard->News_title,0,50) }}...</h3>
    <h5 class="" style="font-size:15px;background-color:#069370;color:#fff;"> {{ $newscard->News_Category }}  : التصنيف</h5> 
    <h6 class="" style="font-size:12px;background:#069370;color:#fff">{{ $newscard->created_at }} :تاريخ النشر</h6>
    <a href="{{url('/kitnews/news/'.$newscard->id)}}" style="font-size:15px" class="btn btn-colorx mt-2">...المزيد من المعلومات</a>
  </div>
</div>
</div>  
@endforeach 

</div>
</div>






<div class="footer" id="fot">
  <div class="inner_footer">
    
    <a href="/"><img style="width:200px;" class="logo mt-1 mr-5 justify-content-center"  src="{{ asset('asset/svg/method-draw-image.svg') }}" alt=""></a>

    <div class="footer_third">
      <h1>تحتاج الى المساعدة</h1>
      <a href="">شروط الاستعمال</a>
      <a href="">سياسة الخصوصية</a>
    </div>

    <div class="footer_third">
      <h1>وسائل التواصل الاجتماعي</h1>
      <ul>
      <li><a href=""><i class="fa fa-twitter"></i></a></li>
      <li><a href=""><i class="fa fa-facebook-f"></i></a></li>
      <li><a href=""><i class="fa fa-google"></i></a></li>
      <li><a href=""><i class="fa fa-instagram"></i></a></li>
      </ul>
    </div>

    <div class="footer_third">
      <h1>وسائل اخرى للتواصل</h1>
      <a >KitPress.News@gmail.com</a>
      <a >+2125555555</a>
    </div>
  </div>
</div>
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