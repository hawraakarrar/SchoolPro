@extends('layout.main')
@section('content')
@include('navbar.nav')
<div class="content">
    <div class="container pt-3 pl-5 pr-5 mt-3">
        <form method="POST"action="{{route('update.teacher',['id' => $staff->id ])}}"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row mb-2 text-center">
                <div class="col-lg-6 col-md-6 col-sm-6 mb-1">
                    <input type="text" name="subject2" value="{{$staff->lacture}}" class="form-control text-center" placeholder="الماده">
                </div> 
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <input type="text" name="UdateName" value="{{$staff->name}}" class="form-control text-center" placeholder="اسم الاستاذ">
                </div> 
            </div>
            <div class="row" style="margin-right:.5px;margin-left:.5px">
                <div class="col-lg-12 col-md-12 col-sm-12 custom-file">
                    <input type="file" class="custom-file-input" name="Teacherphoto">
                    <label class="custom-file-label text-center" for="customFile">صوره</label>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-3 mb-3 text-ceneter btn-block" style="margin:auto"><a href="/teacher" class="text-light" style="text-decoration: none;">حفظ</a></button>
        </form>
        <div class="row mt-5">
            <div class="col-lg-12 col-md-8 col-sm-8 text-center">
                <img src="../img/logo.jpg" class="mr-4">
            </div>
        </div>
    </div>
</div>
@endsection