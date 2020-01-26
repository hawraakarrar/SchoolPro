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
        <form method="POST"action="{{route('update.Payment',['id' => $students->id ])}}"  enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="row mb-2 text-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-1">  
                        <input type="number"  name="money" class="form-control text-center" placeholder="المبلغ">
                    </div> 
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-1">
                        <label  class="form-control text-center">{{$students->name}}</label>
                    </div> 
                </div>
                <div class="row mb-2 text-center">
                    <button class="btn btn-success btn-block mb-5 mr-3 ml-3 mb-2"><a  class="text-light" style="text-decoration: none;">حفظ</a></button>
                </div>
        </form>

    </div>
</div>
@endsection