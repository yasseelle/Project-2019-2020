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

    <title>المستخدميين/ لوحة التحكم</title>
</head>
<body class="btn-colorx5">
   
    <header>
      <a href="/"><img  class="logo" src="{{ asset('asset/svg/method-draw-image.svg') }}" alt=""></a>
      <div class="menu-toggle"></div>
      <nav>
      <ul class="ul-dashbord">
        <li><iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=small&timezone=Africa%2FCasablanca"  width="100%" height="90" frameborder="0" seamless ></iframe></li>
        <li><a href="{{url('/')}}">اعودة الى الموقع</a></li>
        <li><a href="{{ url('kitnews/dashbord') }}">الرئيسية</a></li>
        <li><a class="active" href="{{ url('kitnews/dashbord/users') }}">المستخدمين</a></li>    
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


     <div class="container mt-5">
            
        <h1 class="text-center mt-5">تعديل معلومات المستخدم</h1>
  
        @if(count($errors))
        <div class="alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
        </ul>
        </div>
        @endif
       

       
        <form action="{{url('/kitnews/dashbord/users/update/'.$id)}}" method="post" class="form-group col-lg-6 offset-lg-3  mt-5">

            {{ csrf_field() }}
  
        @foreach($data as $user)
        <div class="row mt-3 justify-content-end ">
             <label for="editName" class="text-right mr-3">الاسم</label>
        <input type="text" class="form-control text-right" name="editName" value="{{$user->name}}">
        </div>
        <div class="row mt-3 justify-content-end ">
           <label for="editlastName" class="text-right mr-3">النسب</label>
        <input type="text" class="form-control text-right" name="editlastName" value="{{$user->lastname}}">
        </div>
        <div class="row mt-3 justify-content-end ">
        <label for="editemail" class="text-right mr-3">البريد الالكتروني</label>
        <input type="text" disabled class="form-control text-right " name="editemail" value="{{$user->email}}">
        </div>
        <div class="row mt-3 justify-content-end ">
          <label for="editphone_number" class="text-right mr-3">رقم الهاتف</label>
        <input type="text" class="form-control text-right" name="editphone_number" value="{{$user->phone_number}}"> 
        </div> 
        <div class="row mt-3 justify-content-end ">
          <label for="editcuntry" class="text-right mr-3">البلد</label>
        <input type="text" class="form-control text-right" name="editcuntry" value="{{$user->cuntry}}">  
         </div>
         <div class="row mt-3 justify-content-end ">
          <label for="editcity" class="text-right mr-3">المدينة</label>
        <input type="text" class="form-control text-right" name="editcity" value="{{$user->city}}">
         </div>
      
         <div class="row mt-3 justify-content-end ">
        <label for="editbirth_day" class="text-right mr-3">تاريخ الازدياد</label>
        <input type="date" class="form-control text-right" name="editbirth_day" value="{{$user->birth_day}}"> 
        </div>
       
        @if(session()->get('my_email') != $user->email)
        <div class="row mt-3 justify-content-end ">       
              <label for="editrole" class=" mr-3 text-right">الرتبة</label>
        <select required class="form-control text-right"name="editrole" id="">
            <option value=""  selected disabled>الرتبة</option>
            <option value="user" >مستخدم</option>
            <option value="admin" >مدير</option>
        </select> 
       
         </div>
        
        @endif
        <div class="row mt-3 justify-content-end ">
        <input type="submit" value="حفظ" class="btn btn-info form-control mt-5">
        </div>
        @endforeach
        <div class="row mt-3 justify-content-end ">
        <a href="{{ url('kitnews/dashbord/users') }}" class="btn btn-danger form-control mt-2">الغاء</a>
        </div>
    </form>       
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