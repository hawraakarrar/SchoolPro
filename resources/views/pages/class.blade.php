@extends('layout.main')
@section('content')
@include('navbar.nav')
<div class="content">
<div class="container text-center pl-5 pr-5 pt-5">
    <div class="container" style="direction:rtl">
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
<form method="post" action="{{ route('add') }}">
    {{ csrf_field() }}
    <div class="row mb-2 text-center">
        
        <div class="col-lg-5 col-md-5 col-sm-12 mb-1">
            <select class="form-control text-right" id="part" name="part_id">
                <option>الشعبه</option>
                @foreach ($parts as $part)
                    <option value="{{$part->id}}" >{{$part->name}}</option>
                @endforeach
            </select>
          </div>
       
          <div class="col-lg-5 col-md-5 col-sm-12 mb-1">
            <select class="form-control text-right" id="level" name="level_id">
                <option>الصف</option>
                @foreach ($levels as $level)
                    <option value="{{$level->id}}" >{{$level->name}}</option>
                @endforeach
            </select>
          </div> 
        <div class="col-lg-2 col-md-5 col-sm-12">
             <button type="submit" class="btn btn-primary">اضافه</button>
        </div> 
    </div>
</form>
<br>
<form method="get" action="{{ route('class.search') }}">
    {{ csrf_field() }}
    <div class="row mb-1">
        <div class="col-lg-10 col-md-11 col-sm-12 mb-1">
            <input type="text" name="class2" class="form-control text-right" placeholder="الصف">
        </div>
        <div class="col-lg-2 col-md-1 col-sm-12 text-center">
            <input type="submit" class="btn btn-primary btn-block" value="بحث">
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
           <th>الصف</th>
           <th>الشعبه</th>
           <th>التحرير</th>
        </tr>
    </thead>
    <tbody>
            @foreach($classes as $key => $class)
            <tr>
                <td>{{$key+1}} </td>
                @foreach ($levels as $level)
                    @if($class->class_id == $level->id )
                        <td>{{$level->name}} </td>
                    @endif
                @endforeach

                @foreach ($parts as $part)
                    @if($class->part_id == $part->id )
                       <td>{{$part->name}} </td>
                    @endif
                @endforeach

                <td>
                    <a class="" href="{{route('class.delete',['id' =>$class->id ])}}">
                        <i class="far fa-trash-alt"> Delete</i>
                    </a>
                </td>
            </tr>
            @endforeach


    </tbody>
</table>


</div>
</div>
</div>
</div>
@endsection