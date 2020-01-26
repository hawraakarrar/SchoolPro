@extends('layout.main')
@section('content')
@include('navbar.nav')
<div class="content">
  @if(count($errors)>0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Error !</strong> {{$error}} .
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endforeach
        @endif 
  <form method="POST" action="{{ route('save.Absence') }}"  enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="container text-center pl-5 pr-5 pt-4">
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2"></div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <select class="form-control text-right" id="sudent" name="sudent">
              <option>اسم الطالب</option>
                @foreach ($students as $stu)
                    <option value="{{$stu->id}}" >{{$stu->name}}</option>
                @endforeach
            </select>
          </div> 
        <div class="col-lg-2 col-md-2 col-sm-2"></div>
      </div>

      <div class="mt-5 text-center text-primary">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input mr-4" id="radio1" name="example" value="absences">
          <label class="custom-control-label" for="radio1">غياب</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input mr-4" id="radio2" name="example" value="permit">
          <label class="custom-control-label" for="radio2">اجازه</label>
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-lg-2 col-md-2 col-sm-2"></div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <a class="btn btn-danger text-light" href="{{route('view.Absence')}}" class="text-light" style="text-decoration:none"> عرض الغيابات </a>
      </div>
   
      <div class="col-lg-4 col-md-4 col-sm-4">
        <button type="submit" class="btn btn-primary text-light" class="text-light" style="text-decoration:none">اضافه</button>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2"></div>
    </div>
  </form>
</div>
@endsection