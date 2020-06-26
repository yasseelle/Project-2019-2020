@extends('layouts.master')



@section('content')
<div class="container">


  <div class="row justify-content-center btn-colorx">
    <h3>حالة الطقس لهذا الاسبوع</h3>
  </div>
<a class="weatherwidget-io mt-2 wetherclick" href="https://forecast7.com/ar/33d52n5d11/ifran/" data-label_1="IFRANE" data-label_2="WEATHER" data-theme="pool_table" >IFRANE WEATHER</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>






<div class="row justify-content-center mt-5 btn-colorx">
    <h3>ملخص اخر الاخبار</h3>
  </div>
<div id="carouselExampleIndicators" class="carousel slide mt-2 btn-colorx" data-ride="carousel">
  <ol class="carousel-indicators">

  @for($r=0;$r<$i+1;$r++)
    @if($r==0)
    <li data-target="#carouselExampleIndicators" data-slide-to="$r" class="active"></li>
    @else
    <li data-target="#carouselExampleIndicators" data-slide-to="$r"></li>
    @endif
   @endfor
  </ol>
  <div class="carousel-inner">

  <div class="carousel-item active">
    <img style="height: 600px;" class="d-block w-100" src="{{ asset('asset/img/cat.jpg')}}" alt="Third slide">
        <div class="carousel-caption">
            <h1 class="animated fadeInUp" style="animation-delay: 1s">hello</h1>
        </div> 
    </div>



  @foreach($newsdetails as $newsrow)
    <div class="carousel-item">
   <a style="color:white" href="{{url('/kitnews/news/'.$newsrow->id)}}"><img style="height: 600px;" class="d-block w-100" src="{{ asset($newsrow->img) }}" alt="Third slide"></a>
        <div class="carousel-caption">
          <a style="color:white" href="{{url('/kitnews/news/'.$newsrow->id)}}">  <h1 class="animated fadeInUp" style="animation-delay: 1s font-size:50px">{{$newsrow->News_title}}</h1></a>
           <a style="color:white"  href="{{url('/kitnews/news/id/'.$newsrow->News_Category.'?page=0')}}"> <p class="animated fadeInDown" style="animation-delay: 2s  font-size:15px">{{$newsrow->News_Category}}</p></a>
        </div> 
    </div>
    @endforeach
  </div>




  
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<div class=" row  btn-colorx4 justify-content-center mt-5" id="cattype">

<h3>تصنيفات الاخبار</h3>
</div>
<div class="row btn-colorx4  justify-content-center">
        <a href="{{ url('/kitnews/news/') }}"><button class="btn btn-colorx2  ml-5 mt-2 mb-2" >اخبار منوعة</button></a> 
       @foreach($datacategory as $datacat)
  <a href="{{ url('/kitnews/news/id/'.$datacat->category_name.'?page=0') }}"><button class="btn btn-colorx2  ml-5 mt-2 mb-2" >{{ $datacat->category_name }}</button></a> 
  <a href="{{ url('/kitnews/news/id/'.$datacat->category_name.'?page=0') }}"><button class="btn btn-colorx2  ml-5 mt-2 mb-2" >{{ $datacat->category_name }}</button></a> 
  <a href="{{ url('/kitnews/news/id/'.$datacat->category_name.'?page=0') }}"><button class="btn btn-colorx2  ml-5 mt-2 mb-2" >{{ $datacat->category_name }}</button></a> 
  <a href="{{ url('/kitnews/news/id/'.$datacat->category_name.'?page=0') }}"><button class="btn btn-colorx2  ml-5 mt-2 mb-2" >{{ $datacat->category_name }}</button></a> 
  <a href="{{ url('/kitnews/news/id/'.$datacat->category_name.'?page=0') }}"><button class="btn btn-colorx2  ml-5 mt-2 mb-2" >{{ $datacat->category_name }}</button></a> 
  <a href="{{ url('/kitnews/news/id/'.$datacat->category_name.'?page=0') }}"><button class="btn btn-colorx2  ml-5 mt-2 mb-2" >{{ $datacat->category_name }}</button></a> 
  <a href="{{ url('/kitnews/news/id/'.$datacat->category_name.'?page=0') }}"><button class="btn btn-colorx2  ml-5 mt-2 mb-2" >{{ $datacat->category_name }}</button></a> 

  @endforeach


</div>



<div class="row mt-5 justify-content-center" >

@foreach($newsdetails as $newscard)
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
<div class="row justify-content-center">
  <a class=" mb-3 btn btn-info btn-colorx3 " style="width:250px" href="{{url('/kitnews/news')}}">المزيد من الاخبار</a>
</div>
</div>

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
<form action="{{url('kitnews/search')}}" class="form-group col-lg-6 offset-lg-3  mt-5" method="post">
{{ csrf_field() }}    
  <input type="text" name="searchname" id="nametest" class="form-control text-center" placeholder="البحث عن موضوع ">
  <label id="testlab"  class="mt-2 text-center">البحث عن طريق التاريخ</label>
  <input type="date" id="datefield" name="searchdate" class="form-control text-center">
  <script>datefield.max = new Date().toISOString().split("T")[0];</script>
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

</div>
@endsection 
