@extends('layout.main')
@section('content')
@include('navbar.nav')
<div class="content">
     <div class="container text-center pl-5 pr-5 pt-4">
          <form method="GET" action="{{ route('News.search') }}"  >
                    <div class="row  pr-5 pl-5">
                         <div class="col-lg-1 col-md-1 col-sm-12 p-0">
                              <button class="btn btn-primary mb-2"><a href="{{route('news')}}" class="text-light">رجوع</a></button>
                         </div>
                         
                         <div class="col-lg-10 col-md-8 col-sm-12" >
                              <input type="text" name="name" class="form-control text-right mb-2" placeholder="اسم الخبر">
                         </div>
                         <div class="col-lg-1 col-md-2 col-sm-12 text-center p-0">
                              <button class="btn btn-primary mb-2">بحث</button>
                         </div>
                    </div>
          </form>
          @foreach ($news as $n)
               <div class="details pr-5 pl-5 d-flex flex-row justify-content-between flex-wrap-reverse ">
                    <div class="d-flex flex-column justify-content-center flex-wrap text-right first">
                         <h3>{{$n->subject}}</h3>
                         <p style="text-align:ceter ;text-align:justify;padding:3px">{{$n->content}}</p>
                         <div class="d-flex flex-row justify-content-end">
                              <button class="btn btn-success mb-1 mr-5" style="width:60px"><a href="" class="text-light" style="text-decoration: none;">تعديل</a></button>  
                              <button class="btn btn-danger mb-1" class="text-light"  style="width:60px"><a href="{{route('delete.news',['id' =>$n->id ])}}" class="text-light" style="text-decoration: none;">حذف</a></button>  
                         </div>
                    </div>
                    <div class="book">
                         <img src="..{{$n->image}}" alt="">
                    </div>
               </div>
          @endforeach
          
     </div>
</div>
@endsection