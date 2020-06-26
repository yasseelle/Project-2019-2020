@extends('layouts.master')



@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form action="{{ url('kitpress') }}" method="post">

                {{ csrf_field() }}


                <div class="form-group">
                <label for="">titre</label>
                <input type="text" name="titre" class="form-control">
                </div>

                <div class="form-group">
                <label for="">discription</label>
                <textarea rows="5" name="discription" class="form-control"></textarea>
                </div>

                <div class="form-group">
                <input type="submit" value="insert" class="form-control btn btn-primary ">
                </div>
            </form>

        </div>
    </div>
</div>

@endsection