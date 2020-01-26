@extends('layout.main')
@section('content')
@include('navbar.nav')
<div class="content">
    <div class="container text-center pl-5 pr-5 pt-4">
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
        <form method="POST" action="{{ route('book.search') }}"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row  pr-5 pl-5">
                <div class="col-lg-1 col-md-1 col-sm-12 p-0">
                    <button class="btn btn-primary mb-2"><a href="/add/book" class="text-light">رجوع</a></button>
                </div>

                <div class="col-lg-10 col-md-8 col-sm-12" >
                    <input type="text" name="name" class="form-control text-right mb-2" placeholder="اسم الكتاب">
                </div>
                <div class="col-lg-1 col-md-2 col-sm-12 text-center p-0">
                    <button class="btn btn-primary mb-2">بحث</button>
                </div>
            </div>
        </form>
        @foreach ($book as $b)
            <div class="details pr-5 pl-5 d-flex flex-row justify-content-around flex-wrap-reverse ">
                <div class="d-flex flex-column justify-content-center flex-wrap text-right first">
                    <h5>{{$b->name}}</h5>
                    @foreach ($staff as $s)
                       @if ($s->id ==$b->Teacher_id)
                         <span>{{$s->name}}</span>
                       @endif
                    @endforeach
                    
                    <p>
                        {{$b->subject}}         
                    </p>
                    <div class="d-flex flex-row justify-content-end">
                        
                        <button class="btn btn-success mb-1 mr-5" style="width:60px"><a href="" class="text-light" style="text-decoration: none;">تعديل</a></button>  
                        <button class="btn btn-danger mb-1" class="text-light"  style="width:60px"><a  class="text-light"  style="text-decoration: none;" href="{{route('book.destory',$b->id )}}"> حذف</a></button>  
                    </div>
                </div>
                <div class="book">
                   <img src="{{$s->image}}" alt="{{$s->name}}">
                </div>
            </div>
         
        @endforeach
    </div>
</div>
@endsection