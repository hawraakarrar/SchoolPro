
  <header class="">
<nav class="navbar navbar-expand-md navbar-fixed-top">
<div class="container">
  <span class="d-flex">
    <a class="nav-link" href="{{route('logout')}}">
      <span class="title text-light">تسجيل الخروج</span>
      <span>
        <i class="fa fa-sign-out text-light"></i>
      </span>
</a>
     <span> <a class="nav-link" href="#"><i class="fa fa-bell text-light"></i></a></span>
   
</span>

<button class="navbar-toggler text-right" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" data-target="#collapsibleNavbar">
     
<span><i class="fa fa-bars text-light" aria-hidden="true"></i></span>
    </button>
  
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">                           
        <li class="nav-item ">
          <a class="nav-link" href="{{ route('chart') }}">الرئيسيه</a>
        </li>
      </ul>
    </div> 
    </div>
  </nav>
</header>
<div class="containers">
<div class="aside" id="hi">
<p class="arrow1">
<i class="fa fa-arrow-right" onclick="hideen"  style="background:#3421c0;width:35px;height:35px;color:#fff;line-height:35px;border:1px solid #fff;border-radius:50%;color:#fff"></i>
</p>
<p class="arrow2">
<i class="fa fa-arrow-left" onclick="hideen"  style="background:#3421c0;width:35px;height:35px;color:#fff;line-height:35px;border:1px solid #fff;border-radius:50%;color:#fff"></i>
</p>
<ul >
  <li>
    <a href="{{ route('index') }}">
    <span class="icon">
    <i class="fa fa-drivers-license"></i>
    </span>
    <span class="title">الطلاب</span>
  </a>
</li>

<li>
    <a href="{{ route('Teacher') }}">
    <span class="icon">
    <i class="fa fa-user"></i>
    </span>
    <span class="title">الاساتذه</span>
  </a>
</li>

<li>
    <a href="{{ route('Grade') }}">
    <span class="icon">
    <i class="fa fa-pie-chart"></i>
    </span>
    <span class="title">الدرجات</span>
  </a>
</li>

<li>
    <a href="{{ route('class') }}">
    <span class="icon">
    <i class="fa fa-users"></i>
    </span>
    <span class="title">الصفوف</span>
  </a>
</li>

<li>
<a href="{{route('table')}}">
    <span class="icon">
    <i class="fa fa-table"></i>
    </span>
    <span class="title">الجدول</span>
  </a>
</li>

<li>
    <a href="{{ route('add.Absence') }}">
    <span class="icon">
    <i class="fa fa-user-times"></i>
    </span>
    <span class="title">الغيابات</span>
  </a>
</li>

<li>
    <a href="{{route('add.book')}}">
    <span class="icon">
    <i class="fa fa-book"></i>
    </span> 
    <span class="title ml-2">المكتبه</span>
  </a>
</li>

<li>
    <a href="{{route('Payment')}}">
    <span class="icon">
    <i class="fa fa-money" ></i>
    </span>
    <span class="title pl-3">الدفع</span>
  </a>
</li>

<li>
    <a href="{{route('activites')}}">
    <span class="icon ">
    <i class="fa fa-line-chart"></i>
    </span>
    <span class="title">النشاطات</span>
  </a>
</li>

<li>
    <a href="{{route('news')}}">
    <span class="icon">
    <i class="fa fa-newspaper-o"></i>
    </span>
    <span class="title">الاخبار</span>
  </a>
</li>

<br>
<li>
    <a href="">
    <span class="icon"><i class="fa fa-users"></i>
    </span>
    <span class="title">من نحن</span>
  </a>
</li>
</ul>
 </div>
</div>