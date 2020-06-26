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
        <li><a  href="{{ url('kitnews/dashbord/users') }}">المستخدمين</a></li>    
        <li><a class="active" href="{{ url('kitnews/dashbord/news') }}">الاخبار</a></li>    
        <li><a  href="{{ url('kitnews/dashbord/category') }}">التصنيفات</a></li>    
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
            
        <h1 class="text-center mt-5">تعديل معلومات الخبر</h1>
  
        @if(count($errors))
        <div class="alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
        </ul>
        </div>
        @endif
        <div class="row mt-5 justify-content-center ">    
        <label for="imgs"  class=" text-right mr-3">صور الخبر</label>  
        @foreach($data as $new)
        <img  name="imgs" style="width:50px;height:50px;margin-left:18px" src="{{asset($new->img)}}" alt="no image">       
        @endforeach
        </div>

        
        <div class="row mt-5 justify-content-center ">    
          <form action="{{url('/addphoto/'.$id)}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <input type="file" required name="im" class="mt-2 ">
          <input type="submit" name="photoprin" class="btn btn-warning" value="تغيير الصورة الاساسية للخبر"> 
          </form>
        </div>


        <div class="row mt-5 justify-content-center ">    
        <label for="imgs"  class=" text-right mr-3">صور الخبر</label>  
        @foreach($data3 as $img)
      <form action="{{url('/kitnews/img/delete/'.$img->id.'/'.$id)}}" method="post">
      {{csrf_field()}}
      {{method_field('DELETE')}}
        <img  name="imgs" style="width:50px;height:50px;margin-left:18px" src="{{asset($img->img_path)}}" alt="no image">       
      <input type="submit" class="btn btn-danger"  value="حدف">
      </form> 
        @endforeach
        </div>
       
        <div class="row mt-5 justify-content-center ">    
          <form action="{{url('/addphoto/'.$id)}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <input type="file" required name="image[]" multiple  class="mt-2 ">
          <input type="submit" name="photosecen" class="btn btn-warning" value=" إظافة صور جديدة للخبر"> 
          </form>
        </div>

        <form action="{{url('/kitnews/dashbord/news/update/'.$id)}}" method="post"  class="form-group col-lg-6 offset-lg-3  mt-5" >

        {{ csrf_field() }}
   
        @foreach($data as $news)
        <div class="row mt-3 justify-content-end ">
             <label for="editnewsTitle" class="text-right mr-3"> عنوان الخبر</label>
        <textarea  rows="3" type="text" class="form-control text-right" name="editnewsTitle" >{{$news->News_title}}</textarea>
        </div>
        <div class="row mt-3 justify-content-end ">
           <label for="editnewsDiscription" class="text-right mr-3">وصف الخبر</label>
        <textarea rows="20" class="form-control text-right" id="editnewsDiscription" name="editnewsDiscription">{{$news->News_discription}}</textarea>
        </div>
        <div class="row mt-3 justify-content-end ">
           <label for="editnewsDiscription2" hidden class="text-right mr-3">وصف الخبر</label>
        <textarea rows="20" hidden class="form-control text-right" id="editnewsDiscription2" name="editnewsDiscription2"></textarea>
        </div>
      
        <div class="row mt-3 justify-content-end ">
           <label for="editnewsDiscription2"  class=" text-right mr-3">تصنيف الخبر</label>
            <select class="form-control text-right" name="editnewscategory" id="">
            @foreach($data2 as $category)
             @if($category == $news->News_Category)
             <option  selected value="{{$category->category_name}}">{{$category->category_name}}</option>            
             @else
            <option  value="{{$category->category_name}}">{{$category->category_name}}</option>            
            @endif
            @endforeach
            </select>
        </div>

        <div class="row mt-3 justify-content-end ">
        <input type="submit" onclick="crypter()" value="حفظ" name="updateinfosnews" class="btn btn-info form-control mt-5">
        </div>
        @endforeach
        <div class="row mt-3 justify-content-end ">
        <a href="{{ url('kitnews/dashbord/news') }}" class="btn btn-danger form-control mt-2">الغاء</a>
        </div>
    </form>       
    </div>





<script>

    function crypter()
{
        text1 = document.getElementById('editnewsDiscription').value;
        text1 = text1.replace(/  /g, "[sp][sp]");
        text1 = text1.replace(/\n/g, "[nl]");
        document.getElementById('editnewsDiscription2').value = text1;
        return false;
}
</script>
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