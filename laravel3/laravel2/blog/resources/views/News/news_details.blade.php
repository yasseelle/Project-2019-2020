@extends('layouts.master')

@section('content')


<div class="container">

<div class="row mt-5 justify-content-center" style="background:#fff;color:darkgreen" >
@foreach($newsdetails as $newsinfo)
<h1 class="newstitle">{{$newsinfo->News_title}}</h1>
@endforeach
</div>


<div class="row mt-5 justify-content-center">
@foreach($newsdetails as $newsinfo)
<img class="bigimg" style="width: 812px;height: 512px;" src="{{asset($newsinfo->img)}}" alt="">
@endforeach
</div>

<div class="row mt-5 justify-content-center" >
    <div class="gallery justify-content-center">
        @foreach($newsimgdetails as $imgs)
      <a  href="{{asset($imgs->img_path)}}" data-lightbox="mygallery"><img style="width: 212px;height: 212px" src="{{asset($imgs->img_path)}}" class="ml-1 mr-2 mt-2 img_gallery" alt=""></a>
      @endforeach
    
    </div>
</div>


<div class="row mt-5 justify-content-center" style="background:#fff;">

<h4 class="mt-2 mb-2" style="color:darkgreen"> تفاصيل</h4>
@foreach($newsdetails as $newsinfo)
<h5 class="mt-2" style="text-align: center; margin-left: 15px;margin-right: 15px;font-size:30px;">{{print_r($newsinfo->News_discription)}}</h5>
<h6 class="mt-3">{{$newsinfo->created_at}} بتاريخ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$newsinfo->News_created_by}} ناشر الموضوع</h6>
@endforeach 
</div>

<div class="row mt-5 justify-content-center" style="background:#fff;">
  <div class=" mt-2 sharethis-inline-share-buttons"></div>
  <h4 class="mt-2 mb-2" >    انشر الخبر على وسائل التواصل الاجتماعي</h4>

</div>





<div class="row mt-5 justify-content-center" style="background:#069370;">
<h2 class="mt-2 mb-2" style="color:white"> اخبار جديدة من نفس الصنف</h2>
<div class="row mt-5 text-center">
@foreach($similarnews as $newscard)
<div class="mb-5 col-6 col-sm-12 col-md-3 col-lg-3">
<div class="card shadowx">
  <img src="{{ asset($newscard->img) }}" class="card-img-top" style="height:15rem;" alt="...">
  <div class="card-body">
    <h3 class="card-title" style="font-size:19px"> {{substr($newscard->News_title,0,50) }}...</h3>
    <h5 class="" style="font-size:15px"> <a href="{{ url('/kitnews/news/id/'.$newscard->News_Category.'?page=0')}}">{{ $newscard->News_Category }}</a> : التصنيف</h5> 
    <h6 class="" style="font-size:12px">{{ $newscard->created_at }} :تاريخ النشر</h6>
    <a href="{{url('/kitnews/news/'.$newscard->id)}}" style="font-size:15px" class="btn btn-colorx mt-2">...المزيد من المعلومات</a>
  </div>
</div>
</div>  
@endforeach 
</div>
</div>


<div class="row mt-5 justify-content-center" style="background:#069370;">
  <h3 class="mt-2 mb-2" id="#commentres" style="color:white;background:#069370" >تعليقات </h3> 
</div>
@if(count($errors))
        <div class="alert alert-danger" role="alert">
        <ul>
        
        @foreach($errors->all() as $message)

        <li>{{ $message }}</li>

        @endforeach
        </ul>
        </div>
  @endif

<div class="row justify-content-center form-group" style="background:#069370;">
  <form action="{{ url('/kitnews/news/'.$newsid.'/commentstore') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}   
    <textarea name="coment" required id="coment" placeholder="اظافة تعليق" class=" form-control mb-3 ml-2" cols="50" rows="3"></textarea>
    <input type="submit" name="insert_comment" class=" form-control mt-3 mb-3 ml-2 btn btn-success" value="نشر التعليق">
  </form>
</div>


  <div class="row justify-content-center" style="background:#069370;color:white">
  <b class="mt-3">{{$comentcount}} : عدد التعليقات على الخبر</b>
  </div>
  @foreach($comentdetails as $comment)
  <div class="row justify-content-center" style="background:#069370;color:white">
  <h6 style="font-size:10px;margin-top:5px;margin-right:5px">  {{$comment->created_at}}  : تاريخ التعليق   <h5><b style="color:red;">{{$comment->created_by_name}}</b></h5></h6>
  </div>
  <div class="row justify-content-center mb-3" style="background:#0a7c63;color:white;border-bottom: black solid;">
  <h6><b>{{($comment->COMMENT)}}</b></h6>
  </div>
  @endforeach
 
  



</div>
@endsection 