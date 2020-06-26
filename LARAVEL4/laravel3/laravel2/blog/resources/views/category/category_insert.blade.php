@extends('layouts.master')


@section('content')


<div class="container">


<h1 style="text-align: center;" class="">تسجيل تصنيف جديد</h1>

@if(count($errors))
        <div class="alert alert-danger" role="alert">
        <ul>
        
        @foreach($errors->all() as $message)

        <li>{{ $message }}</li>

        @endforeach
        </ul>
        </div>

        @elseif(isset($_GET['alredycat']))
    <div class="alert alert-danger" role="alert">اسم التصنيف الذي ادخلته يوجد مسبقا</div>
    @elseif(isset($_GET['categoryadd']))
    <div class="alert alert-success" role="alert">تمت اضافة التصنيف بنجاح </div>
    @else
    <h6 style="text-align: center;" class="mt-4">المرجو ملئ إستمارة التسجيل</h6>
    @endif

<div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
        <div id="ui"></div>
        <form action="{{ url('kitnews/category/store') }}" class="form-group has-error" method="post">
        {{ csrf_field() }}    
      
                    <input type="text" value="{{ old('category_nom') }}" required class=" mt-5 form-control" name="category_nom" placeholder="اسم التصنيف">
                    <textarea type="text" rows="6" required class="form-control mt-5" value="{{ old('category_discription') }}" name="category_description" placeholder="وصف التصنيف"></textarea>


        <input type="submit" class="form-control mt-5 btn btn-success"  name="insert_category" value="تسجيل تصنيف جديد">

        </form>
        </div>
        <div class="col-lg-3"></div></div>

</div>
@endsection