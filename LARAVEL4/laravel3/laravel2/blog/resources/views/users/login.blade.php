@extends('layouts.master')

@section('content')

<div class="container">
    <h1 style="text-align: center;" class="mt-5">تسجيل الدخول</h1>
    @if(isset($_GET['err']))
    <div class="alert alert-danger" role="alert">البريد الالكتروني او كلمة المرور غير صحيحة المرجو التٱكد و اعادة المحاولة </div>
    @elseif(isset($_GET['usernotexist']))
    <div  class="alert alert-danger" role="alert">لا يوجد اي حساب بهذه المعلومات</div>
    @elseif(isset($_GET['accountDeleted']))
    <div  class="alert alert-danger" role="alert">هذا الحساب تم حظره </div>
    @else
    <h6 style="text-align: center;" class="mt-5"></h6>
    @endif
    <div class="row mt-5">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
        <div id="ui"></div>
        <form action="{{ url('kitnews/login/store') }}" class="form-group mt-5" method="post">
        {{ csrf_field() }}    
       

        
        <input type="email" required class="form-control mt-5" name="loginemail" placeholder="exemple@emple.com  الايمايل الخاص بك">
      

       

       
        <input type="password" name="loginpassword" class="form-control mt-5" placeholder="كلمة المرور" required>

       

        <input type="submit" class="form-control mt-5 btn btn-success" name="register" value="تسجيل الدخول">
        <a href="{{url('kitnews/register')}}"><input type="button" class="form-control mt-5 mb-5 btn btn-primary" name="login" value="تسجيل حساب جديد"></a>


        </form>
        </div>
       

    </div>

</div>   


@endsection