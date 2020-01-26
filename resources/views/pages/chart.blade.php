@extends('layout.main')
@section('content')
@include('navbar.nav')
<div class="content">
    <div class="container text-center  pr-5 pt-5">
        <div class="top">
            <div class="card text-center" style="color:blue; size:70px;"> 
                <div class="card-header">
                    School
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item fa fa-user" style="color:blue"><span>{{$chart["student"]}}</span><span>الطلاب</span></li>
                        <li class="list-group-item fa fa-user" style="color:blue"><span>{{$chart["staff"]}}</span><span>الاساتذه</span></li>
                        <li class="list-group-item fa fa-user" style="color:blue"><span>{{$chart["class"]}}</span><span>الصفوف</span></li>
                        <li class="list-group-item fa fa-user" style="color:blue"><span>{{$chart["user"]}}</span><span>المستخدمون</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection