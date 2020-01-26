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
        
        
                
        <form method="POST" action="{{ route('Absence.search') }}"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row mt-2 mr-2 ml-3">
                <div class="col-lg-2 col-md-1 col-sm-12">
                    <button class="btn btn-success"><a href="/add/Absence" class="text-light">رجوع</a></button>
                </div>
                <div class="col-lg-8 col-md-11 col-sm-12" >
                    <input  type="text" name="name" class="form-control text-right" placeholder="اسم الطالب">
                </div>
                <div class="col-lg-2 col-md-1 col-sm-12 text-center">
                    <button class="btn btn-primary btn-block">بحث</button>
                </div>
                
                
            </div>
        </form>
        
            
        
        <div class="mt-2 ml-3 mr-2 ">
            <div class="table-responsive">
                <table class="table" style="direction:rtl">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>اسم الطالب</th>
                            <th>الصف</th>
                            <th>ايام الغياب</th>
                            <th>ايام الاجازه</th>
                            <th>تحرير</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($abs as $key => $a)
                            <tr >
                                <td>{{$key+1}}</td>
                                @foreach($students as $stu)
                                    @if($stu->id == $a->stu_id)
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
                                    @endif
                                @endforeach     
                                <td>{{$a->absence}}</td>
                                <td>{{$a->permit}}</td>
                                <td><a href="{{ route('Absence.destory', $a->id) }}" class="btn btn-danger mb-1">حذف</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        
    </div>
</div>

@endsection