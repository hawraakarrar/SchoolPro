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
        <form method="POST" action="{{ route('add.table') }}"  enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="row mb-5">
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-1">
                        <button type="submit" class="btn btn-primary btn-block">اضافه</button>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 custom-file mb-1" >
                        <input type="file" class="custom-file-input" name="photo" >
                        <label class="custom-file-label text-center" for="customFile">صوره</label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                        <select class="form-control text-right" id="class" name="class" > 
                            <option>الصف</option>
                            @foreach ($classes as $class)
                            <option value="{{$class->id}}" >
                                @foreach ($levels as $level)
                                    @if($class->class_id == $level->id )
                                        <td> {{$level->name}} </td>
                                    @endif
                                @endforeach
                                @foreach ($parts as $part)
                                        @if($class->part_id == $part->id )
                                            <td>({{$part->name}})</td>
                                        @endif
                                @endforeach
                            
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
        </form>
        <hr>
        <form method="get" action="{{ route('table.search') }}">
            {{ csrf_field() }}
                <div class="row mb-3 mt-3">
                    <div class="col-lg-10 col-md-11 col-sm-12 mb-1">
                        <input type="text" name="class" class="form-control text-right" placeholder="الصف">
                    </div>
                    <div class="col-lg-2 col-md-1 col-sm-12 text-center">
                        <button class="btn btn-primary btn-block">بحث</button>
                    </div>
                </div>
        </form>
        <div class="table-responsive">
            <table class="table mt-2" style="direction:rtl">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>الصف</th>
                        <th>صوره الجدول</th>
                        <th>تحرير</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classes as $key => $class)
                        <tr>
                            <td>{{$key+1}}</td>
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
                                @if($class->image !="")
                                    <td>
                                        <a href="{{ route('table.download', $class->id) }}" class="btn btn-info">تحميل</a>
                                    </td>
                                @else
                                    <td> </td>
                                @endif
                            <td>
                                <a class="btn btn-danger" href="{{route('table.destory',$class->id)}}"> حذف</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection