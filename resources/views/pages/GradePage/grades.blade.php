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

        <form method="POST" action="{{ route('add.grade') }}"  enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="row mb-2 text-center">
                    
                    <div class="col-lg-6 col-md-6 col-sm-6 custom-file" >
                        <input type="file" class="custom-file-input" name="result" >
                        <label class="custom-file-label text-center" for="customFile">النتيجه</label>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 mb-1">
                        <select class="form-control text-center" id="studentName" name="studentName">
                            <option> اسم الطالب</option>
                            @foreach ($students as $stu)
                                <option value="{{$stu->id}}" >{{$stu->name}}</option>
                            @endforeach
                        </select>
                    </div> 

                    <div class="col-lg-12 col-md-12 col-sm-12 mb-1">
                        <button type="submit" class="btn btn-primary mt-2 text-center mb-3" style="width:50%">ارسال</button>
                    </div>

                </div>
        </form>
        
        <form method="POST" action="{{ route('grade.search') }}"  enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="row mb-3 mt-3">
                    <div class="col-lg-10 col-md-11 col-sm-12 mb-1">
                        <input type="text" name="class2" class="form-control text-right" placeholder="اسم الطالب">
                    </div>
                    <div class="col-lg-2 col-md-1 col-sm-12 text-center">
                        <button class="btn btn-primary btn-block">بحث</button>
                    </div>
                </div>
        </form>
        <div class="row mb-1">
            <div class="col-lg-12 col-md-11 col-sm-12 mb-1">
                <div class="table-responsive">
                    <table class="table mt-2" style="direction:rtl">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>اسم الطالب</th>
                                <th>الصف</th>
                                <th>الشعبه</th>
                                <th>النتيجه</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $key => $stu)
                                @if($stu->grade_img !="")
                                    <tr>

                                        <td>{{$key+1}}</td>
                                        <td>{{$stu->name}}</td>
                                        @foreach($classes as $class)
                                          @if( $class->id == $stu->class_id )
                                            @foreach ($levels as $level)
                                                @if( $class->class_id == $level->id)
                                                    <td>{{$level->name}}</td>
                                                @endif
                                            @endforeach
                                            @foreach ($parts as $part)
                                                @if( $class->part_id == $part->id )
                                                    <td>{{$part->name}}</td>
                                                @endif
                                            @endforeach
                                          @endif
                                        @endforeach
                                        <td>
                                            <a href="{{ route('grade.download', $stu->id) }}" class="btn btn-info">تحميل</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-success" href="{{route('edit.grade',$stu->id)}}">تعديل</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" href="{{route('grade.delete',$stu->id )}}"> حذف</a>
                                        </td>
                                    
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection