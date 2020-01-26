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

        <form method="POST" action="{{route('update.grade',['id' => $students->id ])}}"  enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="row mb-2 text-center">
                    
                    <div class="col-lg-6 col-md-6 col-sm-6 custom-file" >
                        <input type="file" class="custom-file-input" name="result" >
                        <label class="custom-file-label text-center" for="customFile">النتيجه</label>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 mb-1">
                        <input type="text" class="form-control text-center" value="{{$students->name}}" id="studentName"  name="studentName">
                    </div> 

                    <div class="col-lg-12 col-md-12 col-sm-12 mb-1">
                        <button type="submit" class="btn btn-primary mt-2 text-center mb-3" style="width:50%">ارسال</button>
                    </div>

                </div>
        </form>
        
    </div>
</div>
@endsection