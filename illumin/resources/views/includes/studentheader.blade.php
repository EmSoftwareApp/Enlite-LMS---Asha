<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<title>www.enliteias.com</title>
<link href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/scss/animate.css') }}" rel="stylesheet">
<link href="{{ asset('assets/scss/style.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/components/owl.carousel/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/components/owl.carousel/owl.theme.default.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/scss/colors/red.css') }}" id="theme" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
@if (!Auth::check())

<?php 

  $cur_url = URL::to('/');

  echo "<script>window.location.href='".$cur_url."'</script>";

?>
@endif
<body class="fix-header">
<div id="wrapper">
  <div class="preloader">
    <div class="cssload-speeding-wheel"></div>
  </div>
  <nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="#" data-toggle="collapse" data-target=".navbar-collapse"> <i class="fa fa-bars"></i> </a>
      <div class="top-left-part"> <a class="logo" href="{{url('/studenthome')}}"> <b> <img src="{{ asset('assets/plugins/images/logo.png') }}" alt="home" /> </b> <span> <img src="{{ asset('assets/plugins/images/logo-text.png') }}" alt="homepage" class="dark-logo" /> </span> </a> </div>
      <ul class="nav navbar-top-links navbar-left hidden-xs">
        <li>
          <form role="search" class="app-search hidden-xs">
            <i class="icon-magnifier"></i>
            <input type="text" placeholder="Search..." class="form-control">
          </form>
        </li>
      </ul>
      <ul class="nav navbar-top-links navbar-right pull-right">
        <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);"> <i class="icon-speech"></i> <span class="badge badge-xs badge-danger">6</span> </a>
          <ul class="dropdown-menu mailbox animated bounceInDown">
            <li>
              <div class="drop-title">You have 4 new messages</div>
            </li>
            <li>
              <div class="message-center"> <a href="#">
                <div class="user-img"> <img src="{{ asset('assets/plugins/images/users/1.jpg') }}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                <div class="mail-contnet">
                  <h5>Aravind Honai</h5>
                  <span class="mail-desc">Lorem Ipsum is simply dummy text.</span> <span class="time">9:30 AM</span> </div>
                </a> <a href="#">
                <div class="user-img"> <img src="{{ asset('assets/plugins/images/users/2.jpg') }}" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                <div class="mail-contnet">
                  <h5>Aravind Honai</h5>
                  <span class="mail-desc">Lorem Ipsum is simply dummy text.</span> <span class="time">7:10 AM</span> </div>
                </a>  </div>
            </li>
            <li> <a class="text-center" href="#"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a> </li>
          </ul>
        </li>
        <li class="right-side-toggle"> <a class="right-side-toggler waves-effect waves-light b-r-0 font-20" href="#"> <i class="ti-user"></i> </a> </li>
      </ul>
    </div>
  </nav>
  <aside class="sidebar">
    <div class="scroll-sidebar">
      <nav class="sidebar-nav">
        <ul id="side-menu">
          <li> <a class="active waves-effect" href="{{url('/studenthome#feeds')}}"><i class="icon-screen-desktop fa-fw"></i> <span class="hide-menu"> Feed </span></a> </li>
          <li> <a class="waves-effect" href="courses.html"><i class="icon-layers"></i> <span class="hide-menu"> Courses</span></a> </li>
          <li> <a class="waves-effect" href="liveclasess.html"><i class="icon-graduation"></i> <span class="hide-menu"> Live Classes</span></a> </li>
          <li> <a class="waves-effect" href="curentaffairs.html"><i class="icon-book-open"></i> <span class="hide-menu"> News</span></a> </li>
          <li> <a class="waves-effect" href="MCQ2.html"><i class="icon-grid"></i> <span class="hide-menu"> MCQs</span></a> </li>
          <li> <a class="waves-effect" href="Studymaterials.html"><i class="icon-social-dropbox"></i> <span class="hide-menu"> Materials</span></a> </li>
          <li> <a class="waves-effect" href="testseries.html"><i class="icon-list"></i> <span class="hide-menu"> Prelims Test</span></a> </li>
          <li> <a class="waves-effect" href="#"><i class="icon-docs fa-fw"></i> <span class="hide-menu"> Mains Test</span></a> </li>
          <li> <a class="waves-effect" href="video.html"><i class="icon-camrecorder"></i> <span class="hide-menu"> videos</span></a> </li>
          <li> <a class="waves-effect" href="dailyquestion.html"><i class="icon-note"></i> <span class="hide-menu"> Mains Daily Answer</span></a> </li>
        </ul>
      </nav>
    </div>
  </aside>
  <div class="page-wrapper ">