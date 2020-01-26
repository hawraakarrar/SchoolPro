@extends('layout.main')
@section('content')
@include('navbar.nav')
<div class="content">
    <div class="container pt-5 pl-5 pr-5">
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
        <form method="post" action="{{ route('add.teacher') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row mb-2 text-center">
                <div class="col-lg-6 col-md-6 col-sm-6 mb-1">
                    <input type="text" name="subject" class="form-control text-center" placeholder="الماده">
                </div> 
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <input type="text" name="TeacherName" class="form-control text-center" placeholder="اسم الاستاذ">
                </div> 
            </div>
            <div class="row" style="margin-right:.5px;margin-left:.5px">
                <div class="col-lg-12 col-md-12 col-sm-12 custom-file">
                    <input type="file" class="custom-file-input" id="Teacherphoto" name="Teacherphoto">
                    <label class="custom-file-label text-center" for="customFile">صوره</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 mb-3  btn-block" style="width:67%;margin:auto">اضافه</button>
        </form>
        
        
        <hr>
        <form method="get" action="{{ route('teacher.search') }}">
            {{ csrf_field() }}
            <div class="row mb-1">
                <div class="col-lg-10 col-md-11 col-sm-12 mb-1">
                    <input type="text" name="teacher" class="form-control text-right" placeholder="اسم الاستاذ">
                </div>
                <div class="col-lg-2 col-md-1 col-sm-12 text-center">
                    <input type="submit" class="btn btn-primary btn-block" value="بحث">
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-lg-1 col-md-1 cpl-sm-1"></div>
        <div class="col-lg-10 col-md-12 col-sm-12">
            <div class="table-responsive">
                <table class="table mt-2 table-borderless" style="direction:rtl">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>اسم الاستاذ</th>
                            <th>الماده</th>
                            <th>تعديل</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($staffs as $key => $staff)
                        <tr>

                            <td>{{$key+1}}</td>
                            <td>{{$staff->name}}</td>
                            <td>{{$staff->lacture}}</td>

                            <td>
                                <a class="" href="{{route('edit.teacher',['id' =>$staff->id ])}}">
                                    <i class="far fa-trash-alt"> تعديل</i>
                                </a>
                            </td>
                            <td>
                              <a class="" href="{{route('teacher.delete',['id' =>$staff->id ])}}">
                                  <i class="far fa-trash-alt"> حذف</i>
                              </a>
                            </td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 custom-file"></div></div>
        </div>
    </div>
</div>

@endsection