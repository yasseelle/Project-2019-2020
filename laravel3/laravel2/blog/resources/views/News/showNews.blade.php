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

    <title>الاخبار/ لوحة التحكم</title>
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
        <li><a href="{{ url('kitnews/dashbord/users') }}">المستخدمين</a></li>    
        <li><a class="active" href="{{ url('kitnews/dashbord/news') }}">الاخبار</a></li>    
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

    <div class="container">

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
        <ul>
        
    

        <li>{{ $errors->first() }}</li>

        </ul>
        </div>
@endif

            <div class="row mt-5 justify-content-center">
 <h3 id="serchdisplay" onclick="hideshow()" class="btn btn-success fa fa-search">إظهار قائمة البحث</h3>
</div>

<div style="display:none;" id="searchfields" class="row mt-3 justify-content-center">

<form action="{{url('/kitnews/dashbord/category/search')}}" class="form-group col-lg-6 offset-lg-3  mt-5" method="post" >
{{ csrf_field() }}    
  <input type="text" id="nametest" name="searchnewstitle" class="form-control text-center" placeholder="بحث عن طريق عنوان الخبر">
  <label   class="mt-2 text-center">البحث عن طريق تاريخ النشر</label>
  <input type="date" id="datefield" name="searchnewsdate" class="form-control text-center">
  <script>datefield.max = new Date().toISOString().split("T")[0];</script>
  <label   class="mt-2 text-center">البحث عن طريق التصنيف</label>
            <select class="form-control text-right" name="searchnewscategory" id="">
            <option  selected disabled value="">البحث عن طريق التصنيف</option>            
            @foreach($data2 as $category)
           
            <option  value="{{$category->category_name}}">{{$category->category_name}}</option>            
            
            @endforeach
            </select>
            <label   class="mt-2 text-center">البحث عن طريق ناشر الخبر</label>
            <input type="text"  name="searchnewsnameby" class="form-control text-center" placeholder="البحث عن طريق ناشر الخبر">
 
 
  <input type="submit" class="form-control mt-2 btn btn-success" value="بحث">

</form>

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
            
            <div  class="row mt-3 justify-content-center">

            <a class="text-center  mt-2 btn btn-warning fa fa-plus" style="color:darkblue;width:100px" href="{{url('/kitnews/news/new/create')}}">نشر خبر جديد</a>

            </div>
                    <h1 class="text-center mt-5">لائحة الاخبار </h1>
          
            
                    <h3 class="text-center mt-3"><b style="background:darkblue;color:white">{{$count}}</b>   :عدد الاخبار في الموقع    </h4>
            

            <div class="table-responsive mt-3 ">

                <table rows="3" class="table table-bordered table-hover table-striped">

                <thead style="background:rgb(65, 63, 63);color:white">
                    <tr>
                    <th class="text-center" style="border : solid 1px white">رقم الخبر</th>
                    <th class="text-center" style="border : solid 1px white">عنوان الخبر</th>
                    <th class="text-center" style="border : solid 1px white">وصف الخبر</th>
                    <th class="text-center" style="border : solid 1px white">تصنيف الخبر</th>
                    <th class="text-center" style="border : solid 1px white">ناشر الخبر</th>
                    <th class="text-center" style="border : solid 1px white">الصورة الاساسية للخبر</th>
                    <th class="text-center" style="border : solid 1px white">صور الثانوية للخبر</th>
                    <th class="text-center" style="border : solid 1px white">تاريخ انشاء الخبر</th>
                    <th class="text-center" style="border : solid 1px white">تاريخ اخر تعديل على الخبر</th>
                    <th class="text-center" style="border : solid 1px white">خيارات</th>
                    
    
                </tr>
                </thead>
                <tbody>
                    @foreach($data as $news)

                        <tr class="text-center" id="tablehover" style="color:darkblue" >
                            <td>{{$news->id}}</td>
                            <td>{{print_r($news->News_title)}}</td>
                            <td>...{{substr($news->News_discription,0,100)}}</td>
                            <td>{{$news->News_Category}}</td>
                            <td>{{$news->News_created_by}}</td>
                            <td><img style="width:50px;height:50px" src="{{asset($news->img)}}" alt="not found"></td>
                            
                            <td>
                            @foreach($img as $imgs)
                                @if($imgs->img_news_id == $news->id)
                            <img style="width:50px;height:50px" src="{{asset($imgs->img_path)}}" alt="not found">
                                @endif
                            @endforeach
                            </td>
                            <td>{{$news->created_at}}</td>
                            <td>{{$news->updated_at}}</td>
                           
                            <form action="{{url('/kitnews/dashbord/news/delete/'.$news->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <td><a href="/kitnews/dashbord/news/edit/{{$news->id}}" class="btn btn-primary">تعديل</a>
                            <a href="/kitnews/news/{{$news->id}}" class="btn btn-warning">تفاصيل</a>
                            <button type="submit" class="btn btn-danger">حدف</button>
                            </form> 
                             </td>
                         
                        </tr>

                    @endforeach
                </tbody>
                </table>


            </div>

 

            </div>








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