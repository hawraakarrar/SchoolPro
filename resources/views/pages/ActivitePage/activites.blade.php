@extends('layout.main')
@section('content')
@include('navbar.nav')
<div class="content">
  <div class="container text-center pl-5 pr-5">
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
      <form method="POST" action="{{ route('add.Activites') }}"  enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="row mb-2 mt-3">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <input type="url" name="link" class="form-control text-center" placeholder="link">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <input type="text" name="address" class="form-control text-center" placeholder="العنوان">
            </div>
          </div>
          
          <div class="row mb-2">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <input type="text" name="subject" class="form-control text-center" placeholder="الموضوع">
            </div>

          </div>
          <div class="row mb-2" style="margin-right:.5px;margin-left:.5px">
            <div class="col-lg-12 col-md-12 col-sm-12 custom-file">
              <input type="file" class="custom-file-input" name="photo">
              <label class="custom-file-label text-center" for="customFile">صوره</label>
            </div>
          </div>
          
          <div class="row mt-3">
            <div class="col-lg-2 col-md-6 col-sm-12"></div>
            
            <div class="col-lg-4 col-md-6 col-sm-12 mb-1">
              <button class="btn btn-secondary text-light" >نشر</button>
            </div>
          </form>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-1">
              <button class="btn btn-primary"><a href="{{ route('Show.Activites') }}" class="text-light" style="text-decoration:none">عرض</a></button>  
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12"></div>
          </div>
      
  </div>
</div>
@endsection