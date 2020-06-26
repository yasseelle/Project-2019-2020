@extends('layouts.master')

@section('content')


<div class="container">
   
    <h1 style="text-align: center;" class="">تسجيل حساب جديد</h1>
    @if(count($errors))
        <div class="alert alert-danger" role="alert">
        <ul>
        
        @foreach($errors->all() as $message)

        <li>{{ $message }}</li>

        @endforeach
        </ul>
        </div>
    @elseif(isset($_GET['alredyemail']))
    <div class="alert alert-danger" role="alert">يوجد  حساب اخر مسجل بهذا البريد الالكتروبي  </div>
    @elseif(isset($_GET['passwordcompair']))
    <div class="alert alert-danger" role="alert">كلمتي المرور غير متطابقين</div>
    @else
    <h6 style="text-align: center;" class="mt-4">المرجو ملئ إستمارة التسجيل</h6>
    @endif
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
        <div id="ui"></div>
        <form action="{{ url('kitnews/register/store') }}" class="form-group has-error" method="post">
        {{ csrf_field() }}    
        <div class="row mt-5">
                <div class="col-lg-6">
                    <input type="text" value="{{ old('prenom') }}" required class="form-control" name="prenom" placeholder="الاسم الشخصي">
                </div>
                <div class="col-lg-6">
                    <input type="text" required class="form-control" value="{{ old('nom') }}" name="nom" placeholder="الاسم العائلي">
                </div>
        </div>

        
        <input type="email" required class="form-control mt-5" value="{{ old('email') }}" name="email" placeholder="exemple@emple.com  الايمايل الخاص بك">
      

        <div class="row mt-5">
                <div class="col-lg-6">
                    <input type="text" required class="form-control" value="{{ old('city') }}" name="city" placeholder="المدينة">
                </div>
                <div class="col-lg-6">
                    <input type="number" required class="form-control" value="{{ old('phone') }}" name="phone" placeholder="رقم الهاتف">
                </div>
        </div>

        <select name="gender" class="form-control mt-5" id="" required>
        <option value="" disabled selected>الجنس</option>
            <option value="homme">ذكر</option>
            <option value="famme">انثى</option>
        </select>

        <input type="date" value="{{ old('birthday') }}" min="1950-01-01" max="2015-12-31" name="birthday" class="form-control mt-5" required>

        <div class="row mt-5">
                <div class="col-lg-6">
                    <input type="password" required class="form-control" name="password1" placeholder="كلمة المرور">
                </div>
                <div class="col-lg-6">
                    <input type="password" required class="form-control" name="password2" placeholder="اعادة تٱكيد كلمة المرور">
                </div>
        </div>

        <input type="submit" class="form-control mt-5 btn btn-success" name="register" value="تسجيل حساب جديد">
        <a href="{{url('kitnews/login')}}"><input type="button" class="form-control mt-5 mb-5 btn btn-primary" name="login" value="تسجيل الدخول"></a>


        </form>
        </div>
        <div class="col-lg-3"></div>

    </div>
</div>


@endsection

