@extends('layout.main')

@section('content')

@include('navbar.nav')
<div class="content">
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

  <ul class="nav nav-tabs" role="tablist" style="width:50%">
    <li class="nav-item">
      <a class="nav-link text-primary " data-toggle="tab" href="/student">تسجيل الطلاب</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-primary" data-toggle="tab" href="/student"> تسجيل الاباء</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-primary active" data-toggle="tab" href="#Ustudent"> تعديل الطلاب</a>
    </li>
  </ul>
<br>
  <div class="tab-content">
    <div id="Ustudent" class="container tab-pane active">
      <form method="POST"action="{{route('update.student',['id' => $students->id ])}}"  enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="row mb-1">
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <input type="text" name="Sname" class="form-control text-right text-right" value="{{$students->name}}">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <select class="custom-select form-control" name="father" id="father">
                @foreach ($users as $user)
                      @if($students->father_id == $user->id )
                        <option value="{{$user->id}}" selected>{{$user->name}}</option>
                      @else
                         @if($user->role != 1)
                           <option value="{{$user->id}}" >{{$user->name}}</option>
                        @endif
                      @endif
                @endforeach
              </select>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
          </div>

          <div class="row mb-1">
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <input type="date" class="form-control" name="BirthDate" value="{{$students->birthdate}}">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
               <input type="text" class="form-control text-right" name="BackSchool" value="{{$students->backSchool}}" >
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
          </div>

          <div class="row mb-1">
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
            <div class="col-lg-8 col-md-8 col-sm-12 mb-1">
              <select class="form-control text-right" id="class_id" name="class" >
                @foreach ($classes as $class)
                  @if($class->id == $students->class_id)
                    <option value="{{$class->id}}" selected>
                      @foreach ($levels as $level)
                          @if($class->class_id == $level->id )
                              <td>( {{$level->name}}( </td>
                          @endif
                      @endforeach
                      @foreach ($parts as $part)
                              @if($class->part_id == $part->id )
                                  <td>{{$part->name}}</td>
                              @endif
                      @endforeach
                    </option>
                  @else
                    <option value="{{$class->id}}">
                      @foreach ($levels as $level)
                          @if($class->class_id == $level->id )
                              <td>( {{$level->name}}( </td>
                          @endif
                      @endforeach
                      @foreach ($parts as $part)
                              @if($class->part_id == $part->id )
                                  <td>{{$part->name}}</td>
                              @endif
                      @endforeach
                    </option>
                  @endif
                @endforeach
              </select>
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
            </div>
          </div>

          <div class="row mb-1">
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
            <div class="col-lg-8 col-md-8 col-sm-12">
              <input type="text" class="form-control text-right" name="address" value="{{$students->address}}">
              <div class="col-lg-2 col-md-2 col-sm-2"></div>
            </div>
          </div>

          <div class="row mb-1" style="margin-right:.5px;margin-left:.5px">
            <div class="col-lg-2 col-md-2 col-sm-2 "></div>
            <div class="col-lg-4 col-md-4 col-sm-4 custom-file mb-1">
              <input type="file" class="custom-file-input" id="customFile" name="FrontNationalityPhoto">
              <label class="custom-file-label text-center pr-5" for="customFile">صوره الجنسيه الاماميه</label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 custom-file mb-1">
              <input type="file" class="custom-file-input" id="customFile" name="BackNationalityPhoto">
              <label class="custom-file-label text-center pr-5" for="customFile" >صوره الجنسيه الخلفيه</label>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
          </div>
          <div class="row mb-1" style="margin-right:.5px;margin-left:.5px">
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 custom-file mb-1">
              <input type="file" class="custom-file-input" name="RationCard">
              <label class="custom-file-label text-center pr-5" for="customFile">بطاقه التموينيه</label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 custom-file mb-1">
              <input type="file" class="custom-file-input" name="NationalityCertificate">
              <label class="custom-file-label text-center pr-5" for="customFile">شهاده الجنسيه</label>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
          </div>
          <div class="row mb-1" style="margin-right:.5px;margin-left:.5px">
            <div class="col-lg-2 col-md-2 col-sm-2 mb-1"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 custom-file mb-1">
              <input type="file" class="custom-file-input" name="FrontHousingCard">
              <label class="custom-file-label text-center pr-5" for="customFile">بطاقه السكن الاماميه</label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 custom-file mb-1">
              <input type="file" class="custom-file-input" name="BackHousingCard">
              <label class="custom-file-label text-center pr-5" for="customFile">بطاقه السكن الخلفيه</label>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
          </div>
          <div class="row mb-1" style="margin-right:.5px;margin-left:.5px">
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
            <div class="col-lg-8 col-md-8 col-sm-12 custom-file mb-1">
              <input type="file" class="custom-file-input" name="image">
              <label class="custom-file-label text-center  pr-5" for="customFile">صوره الطالب</label>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
          </div>
          <button type="submit" class="btn btn-success mt-2" style="width:30%">حفظ</button>
      </form>
    </div>
  </div>
</div>
@endsection
