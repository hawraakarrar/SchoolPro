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
        <a class="nav-link text-primary" data-toggle="tab" href="#home">تسجيل الطلاب</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" data-toggle="tab" href="#menu1"> تسجيل الاباء</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary active" data-toggle="tab" href="#menu2"> الطلاب</a>
      </li>
    </ul>
  <br><br>
    <div class="tab-content">
      <div id="home" class="container tab-pane fade">
        <form method="POST" action="{{ route('add.student') }}"  enctype="multipart/form-data">
          {{ csrf_field() }}
            <div class="row mb-1">
              <div class="col-lg-2 col-md-2 col-sm-2"></div>
              <div class="col-lg-4 col-md-4 col-sm-12 mb-1">
                <input type="text" name="Sname" class="form-control text-right text-right" placeholder="اسم الطالب">
              </div> 
              <div class="col-lg-4 col-md-4 col-sm-12">
                <select class="form-control text-right" id="gurdian" name="gurdian">
                  <option>ولي امر الطالب</option>
                    @foreach ($users as $user)
                      @if($user->role != 1)
                        <option value="{{$user->id}}" >{{$user->name}}</option>
                      @endif
                    @endforeach
                </select>
              </div> 
              <div class="col-lg-2 col-md-2 col-sm-2"></div>
            </div>
            <div class="row mb-1">
              <div class="col-lg-2 col-md-2 col-sm-2 mn-1"></div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <input type="date" name="BirthDate" class="form-control ">
              </div> 
              <div class="col-lg-4 col-md-4 col-sm-12">
                <input type="text" name="BackSchool" class="form-control text-right" placeholder="المدرسه السابقه">
              </div> 
              <div class="col-lg-2 col-md-2 col-sm-2"></div>
            </div>
            <div class="row mb-1">
              <div class="col-lg-2 col-md-2 col-sm-2"></div>
              <div class="col-lg-2 col-md-2 col-sm-2"></div>
            </div>
            <div class="row mb-1">
              <div class="col-lg-2 col-md-2 col-sm-2"></div>
              <div class="col-lg-8 col-md-8 col-sm-12 mb-1">
                <select class="form-control text-right" id="class" name="class" > 
                  <option>الصف</option>
                  @foreach ($classes as $class)
                    <option value="{{$class->id}}" >
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
                  @endforeach
                </select>
              <div class="col-lg-2 col-md-2 col-sm-2"></div>
              </div> 
            </div>
            <div class="row mb-1">
              <div class="col-lg-2 col-md-2 col-sm-2"></div>
              <div class="col-lg-8 col-md-8 col-sm-12 mb-1">
                <input type="text" class="form-control text-right" name="address" placeholder="عنوان السكن">
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
            <button type="submit" class="btn btn-success mt-2" style="width:30%">تسجيل</button>
        </form>
      </div>
      <div id="menu1" class="container tab-pane fade">
        <form method="POST" action="{{ route('add.user') }}"  enctype="multipart/form-data">
          {{ csrf_field() }}
            <div class="row mb-2">
              <div class="col-lg-2 col-md-2 col-sm-2"></div>
              <div class="col-lg-8 col-md-8 col-sm-12">
                <input type="text"  name="fatherName" class="form-control text-center" placeholder="اسم ولي امر الطالب">
              </div> 
              
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
            </div>
            <div class="row mb-1">
              <div class="col-lg-2 col-md-2 col-sm-2"></div>
              <div class="col-lg-4 col-md-4 col-sm-12 mb-1">
                <input type="text" class="form-control text-right text-right" name="username" placeholder="UserName">
              </div> 
              <div class="col-lg-4 col-md-4 col-sm-12">
                <input type="password" class="form-control text-right text-right" name="password" placeholder="Password">        
              </div> 
              <div class="col-lg-2 col-md-2 col-sm-2"></div>
            </div>
            <div class="row mb-2" style="margin-left:.5px;margin-right:.5px">
              <div class="col-lg-2 col-md-2 col-sm-2"></div>
              <div class="col-lg-4 col-md-4 col-sm-4 custom-file mb-1">
                <input type="file" class="custom-file-input" name="FfrontCard">
                <label class="custom-file-label text-center" for="customFile">بطاقه الجنسيه الاماميه</label>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 custom-file mb-1">
                <input type="file" name="FbackCard" class="custom-file-input">
                <label class="custom-file-label text-center" for="customFile">بطاقه الجنسيه الخلفيه</label>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2"></div>
            </div>
            <div class="row mb-1" style="margin-left:.5px;margin-right:.5px">
              <div class="col-lg-2 col-md-2 col-sm-2"></div>
              <div class="col-lg-8 col-md-8 col-sm-8 custom-file">
                <input type="file" class="custom-file-input" name="Fphoto">
                <label class="custom-file-label text-center" for="customFile">صوره الشخصيه</label>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2"></div>
            </div>
            <button type="submit" class="btn btn-primary mt-2" style="width:30%">تسجيل</button>
        </form>
      </div>
      <div id="menu2" class="container tab-pane active "><br>
        <form method="get" action="{{ route('student.search') }}">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
              <div class="col-lg-7 col-md-11 col-sm-12 mb-1">
                <input type="text" name="StuName"  class="form-control text-center" placeholder="اسم الطالب">
              </div>
              <div class="col-lg-1 col-md-1 col-sm-12 text-center">
               <button type="submit" class="btn btn-primary btn-block text-center" style="width:100%;margin:auto">بحث</button>
              </div>
        
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
          </div>
        </form>
        
        <div class="row">
          
          <div class="col-lg-2"></div>
          <div class="col-lg-8">
            <div class="table-responsive">
              <table class="table mt-2 table-borderless" style="direction:rtl">
                <thead class="thead-light">
                  <tr>
                      <th>#</th>
                      <th>اسم الطالب الثلاثي</th>
                      <th>اسم ولي امر الطالب</th>
                      <th>الصف</th>
                      <th>الشعبه</th>
                      <th>التحرير</th>
                      <th>حذف</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($students as $key => $student)
                  <tr>
                    <td>{{$key+1}} </td>
                    <td>{{$student->name}} </td>
                    @foreach ($users as $user)
                      @if($student->father_id == $user->id )
                          <td>{{$user->name}} </td>
                      @endif
                    @endforeach
                    @foreach ($classes as $class)
                        @if($student->class_id == $class->id )
                          @foreach ($levels as $level)
                            @if( $class->class_id == $level->id)
                               <td>{{$level->name}} </td>
                            @endif
                          @endforeach
                          @foreach ($parts as $part)
                            @if( $class->part_id == $part->id )
                               <td>{{$part->name}} </td>
                            @endif
                          @endforeach
                        @endif
                    @endforeach

                    <td>
                        <a class="" href="{{route('edit.student',['id' =>$student->id ])}}">
                            <i class="far fa-trash-alt"> تعديل</i>
                        </a>
                    </td>
                    <td>
                      <a class="" href="{{route('Student.delete',['id' =>$student->id ])}}">
                          <i class="far fa-trash-alt"> حذف</i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="col-lg-2"></div>
          </div>
        </div>
    </div>

    
  
  </div>
</div>







@endsection

