@extends('layouts.master')

@section('content')
<div class="container">
<h1 style="text-align: center;" class="">نشر خبر جديد</h1>

        @if(count($errors))
        <div class="alert alert-danger" role="alert">
        <ul>
        
        @foreach($errors->all() as $message)

        <li>{{ $message }}</li>

        @endforeach
        </ul>
        </div>

    @elseif(isset($_GET['newsadd']))
    <div class="alert alert-success" role="alert">تم نشر الخبر بنجاح</div>
    @else
    <h6 style="text-align: center;" class="mt-4">المرجو ملئ إستمارة التسجيل</h6>
    @endif
   
<div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
        <div id="ui"></div>
        <form action="{{ url('kitnews/news/new/store') }}" class="form-group has-error" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}    
      
                    <input type="text" value="{{ old('News_titre') }}" required class=" mt-5 form-control" name="News_titre" placeholder="عنوان الخبر">
                    <textarea type="text" rows="20" required class="form-control mt-5" id="textarea1" value="{{ old('news_description') }}"  placeholder="وصف الخبر impotent"></textarea>
                    <textarea type="text" hidden rows="10" required class="form-control mt-5" id="textarea2" name="news_description"  placeholder="وصف الخبر the one well be sent"></textarea>
                    <select name="categoryname" id="" class="mt-5 form-control" required>
                    <option value="" disabled selected>التصنيف</option>
                    @foreach($data as $datas)
                    <option value="{{ $datas->category_name }}">{{ $datas->category_name }}</option>
                    @endforeach
                    </select>  
                   <!-- <label for="" class="mt-5">ناشر الخبر</label> -->
                    @foreach($data2 as $datas2)
                    <input type="text" hidden value="{{ $datas2->name }} {{ $datas2->lastname }}" class=" mt-2 form-control" name="created_by_name" disabled>
                    @endforeach
                    <input type="text" hidden value="{{ session()->get('my_email') }}" class=" mt-5 form-control" name="created_by_email" disabled>
                  
                    <label for="" id="labeltest" class="mt-5">صور للخبر</label>
                    <input type="file" required name="image[]" multiple  class="mt-2 form-control">

        <input type="submit" onclick="crypter()" class="form-control mt-5 btn btn-success"  name="insert_news" value="نشر الخبر">

        </form>
        </div>
        <div class="col-lg-3"></div></div>

</div>
<script>
function crypter()
{
        text1 = document.getElementById('textarea1').value;
        text1 = text1.replace(/  /g, "[sp][sp]");
        text1 = text1.replace(/\n/g, "[nl]");
        document.getElementById('textarea2').value = text1;
        return false;
}
</script>


@endsection



