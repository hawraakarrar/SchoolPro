@extends('layout.main')
@section('content')
@include('navbar.nav')
<div class="content">
    <div class="container text-center pl-5 pr-5 pt-3">

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

        <form method="POST" action="{{ route('add.Payment') }}"  enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="row mb-2 text-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-1"> 
                        <input type="number" name="money" class="form-control text-center" placeholder="المبلغ">
                    </div> 
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-1">
                        <select class="form-control text-center" id="studentName" name="studentName">
                            <option> اسم الطالب</option>
                            @foreach ($students as $stu)
                                <option value="{{$stu->id}}" >{{$stu->name}}</option>
                            @endforeach
                        </select>
                    </div> 
                </div>
                <div class="row mb-2 text-center">
                    <button class="btn btn-primary btn-block mb-5 mr-3 ml-3 mb-2">اضافه</button>
                </div>
        </form>

        <form method="get" action="{{ route('Payment.search') }}">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-10 col-md-11 col-sm-12 ">
                        <input type="text" name="StudentName2" class="form-control text-center" placeholder=" اسم الطالب ">
                    </div>
                    <div class="col-lg-2 col-md-1 col-sm-12">
                        <button class="btn btn-primary btn-block">بحث</button>
                    </div>
                </div>
        </form>


        <div class="table-responsive">
            <table class="table mt-2" style="direction:rtl">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>اسم الطالب</th>
                        <th>الصف</th>
                        <th>المبلغ</th>
                        <th>التحرير</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $key => $stu)
                        <tr >
                            <td>{{$key+1}}</td>
                            <td>{{$stu->name}}</td>
                            @foreach($classes as $class)
                                @if( $class->id == $stu->class_id )
                                    @foreach ($levels as $level)
                                        @if( $class->class_id == $level->id)
                                            <td>{{$level->name}}
                                        @endif
                                    @endforeach
                                    @foreach ($parts as $part)
                                        @if( $class->part_id == $part->id )
                                            ({{$part->name}})</td>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                                     
                            <td>{{$stu->Payment}}$</td>
                            <td>
                                <button class="btn btn-success mb-1" style="width:60px"><a href="{{ route('edit.Payment', $stu->id) }}" class="text-light" style="text-decoration: none;">تعديل</a></button>  
                                <button class="btn btn-danger mb-1" style="width:60px"><a href="{{ route('delete.Payment', $stu->id) }}" class="text-light" style="text-decoration: none;">حذف</a></button>  
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        
        </div>
        
    </div>
</div>
@endsection