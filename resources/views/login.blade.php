@extends('layout.main')
@push('show')
   <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endpush
@section('content')

<div class="container">
  @if(isset(Auth::user()->email))
       <script>window.location="/student";  </script>
  @endif
  @if($validator =Session::get('error'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error !</strong> {{$validator}} .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
  @endif
  @if(count($errors)>0)
       <div class="alert alert-danger">
         <ul>
           @foreach ($errors->all() as $error)
               <li> {{$error}} </li>
           @endforeach
         </ul>
       </div>
  @endif
  <form class="modal-content animate" action="{{ route('checklogin') }}" method="post">
    {{ csrf_field() }}
    <div class="imgcontainer mb-3">
      <span class="font-weight-bold">Sign In</span><br><br>
      <img src="../img/logo.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container text-center pl-3 pr-3">
      <input type="email" placeholder="Email" name="email" required class="form-control text-center mb-2 " style="background:rgba(202, 202, 202, 0.822);color:black">
      <input type="password" placeholder="Password" name="password" required class="form-control text-center mb-2" style="background:rgba(202, 202, 202, 0.822);color:black">
      <button type="submit" name="login" class="btn btn-info mt-3" style="width:30%">Login</button>
    </div>
<br><br>
    <div class="container text-center" style="background-color:#f1f1f1">
      <h6 class="text-black font-weight-bold">Copyright:CoreIT</h6>
    </div>
  </form>
  </div>
@endsection