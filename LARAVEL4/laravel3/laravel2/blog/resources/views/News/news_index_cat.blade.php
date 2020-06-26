@extends('layouts.master')

@section('content')

<div class="container">        
      <div class="row" style="background:#fff; border: dashed seagreen; border-radius: 15px 50px;">
        <div class="">
        <a href="{{ url('/kitnews/news/') }}"><button class="btn btn-colorx2  ml-5 mt-2 mb-2" >اخبار منوعة</button></a>
       @foreach($datacategory as $datacat)
  <a href="{{ url('/kitnews/news/id/'.$datacat->category_name.'?page=0')}}"><button class="btn btn-colorx2  ml-5 mt-2 mb-2" >{{ $datacat->category_name }}</button></a> 
  @endforeach

 

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
  <label id="testlab" class="mt-2 text-center">البحث عن طريق التاريخ</label>
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


<div class="row mt-5 text-center">
@foreach($datanewswithcat1 as $newscard)
<div class="mb-5 col-sm-12 col-md-4 col-lg-4">
<div class="card shadowx">
  <img src="{{ asset($newscard->img) }}" class="card-img-top" style="height:15rem;" alt="...">
  <div class="card-body">
    <h3 class="card-title" style="font-size:19px"> {{substr($newscard->News_title,0,50) }}...</h3>
    <h5 class="" style="font-size:15px"> {{ $newscard->News_Category }}  : التصنيف</h5> 
    <h6 class="" style="font-size:12px">{{ $newscard->created_at }} :تاريخ النشر</h6>
    <a href="{{url('/kitnews/news/'.$newscard->id)}}" style="font-size:15px" class="btn btn-colorx mt-2">...المزيد من المعلومات</a>
  </div>
</div>
</div>
@endforeach 
</div>



<div class="row mt-5 justify-content-center" >
<div aria-label="Page navigation example">
  <ul class="pagination ">

@if(!isset($_GET['page']))
    <li class="page-item disabled">
      <a class="page-link" href="{{url('kitnews/news/id/'.$category.'?page=')}}" tabindex="-1">الصفحة السابقة</a>
    </li>
    @for($i=0;$i<$numpages;$i++)
    @if($i==0)
    <li class="page-item active"><a class="page-link" href="{{url('kitnews/news?page='.$i)}}">{{$i}}</a></li>
    @else
    <li class="page-item "><a class="page-link" href="{{url('kitnews/news/id/'.$category.'?page='.$i)}}">{{$i}}</a></li>
    @endif
    @endfor
    <li class="page-item">
      <a class="page-link" href="{{url('kitnews/news/id/'.$category.'?page=0')}}">الصفحة التالية</a>
    </li>


    @elseif($_GET['page'] == $numpages-1)
    <li class="page-item ">
      <a class="page-link" href="{{url('kitnews/news/id/'.$category.'?page='.$_GET['page']-=1)}}" tabindex="-1">الصفحة السابقة</a>
    </li>
    @for($i=0;$i<$numpages;$i++)
    @if($i==$numpages-1)
    <li class="page-item active"><a class="page-link" href="{{url('kitnews/news/id/'.$category.'?page='.$i)}}">{{$i}}</a></li>
    @else
    <li class="page-item "><a class="page-link" href="{{url('kitnews/news/id/'.$category.'?page='.$i)}}">{{$i}}</a></li>
    @endif 
    @endfor
    <li class="page-item disabled">
      <a class="page-link" href="{{url('kitnews/news/id/'.$category.'?page='.$_GET['page']+=1)}}" >الصفحة التالية</a>
    </li>

    @elseif($_GET['page'] == 0)
    <li class="page-item disabled">
      <a class="page-link" href="{{url('kitnews/news/id/'.$category.'?page='.$_GET['page']-=1)}}" tabindex="-1">الصفحة السابقة</a>
    </li>
    @for($i=0;$i<$numpages;$i++)
    @if($i==0)
    <li class="page-item active"><a class="page-link" href="{{url('kitnews/news/id/'.$category.'?page='.$i)}}">{{$i}}</a></li>
    @else
    <li class="page-item "><a class="page-link" href="{{url('kitnews/news/id/'.$category.'?page='.$i)}}">{{$i}}</a></li>
    @endif 
     @endfor
    <li class="page-item">
      <a class="page-link" href="{{url('kitnews/news/id/'.$category.'?page=1')}}">الصفحة التالية</a>
    </li>
@elseif($_GET['page']>0 && $_GET['page']<$numpages-1)
    <li class="page-item ">
      <a class="page-link" href="{{url('kitnews/news/id/'.$category.'?page='.$_GET['page']-=1)}}" tabindex="-1">الصفحة السابقة</a>
    </li>
    @for($i=0;$i<$numpages;$i++)
    @if($_GET['page'] == $i-1)
    <li class="page-item active"><a class="page-link" href="{{url('kitnews/news/id/'.$category.'?page='.$i)}}">{{$i}}</a></li>
    @else
    <li class="page-item "><a class="page-link" href="{{url('kitnews/news/id/'.$category.'?page='.$i)}}">{{$i}}</a></li>
    @endif 
    @endfor
    <li class="page-item">
      <a class="page-link" href="{{url('kitnews/news/id/'.$category.'?page='.$_GET['page']+=2)}}" >الصفحة التالية</a>
    </li>

@endif
  </ul>
</div>
</div>





</div>




@endsection