@if (!Auth::check())

<?php 

  $cur_url = URL::to('/');

  echo "<script>window.location.href='".$cur_url."/user-login'</script>";

?>

@else

<?php

  $cur_url = URL::to('/');

  $userid = Auth::user()->id;

  $pgmtime = Request::segment(2);

  $pgmid = App\tblProgram::programfinder($pgmtime, 'regtime', 'id');

  $pgmstatus = App\tblProgram::programfinder($pgmtime, 'regtime', 'program_status');

  if($pgmstatus == '0')

  {

    $user_payment = '1';

  }

  else{

    $user_payment = App\tblUserProgramPayment::usercheck($userid, $pgmid);

  }

  

  if($user_payment == '0')

  {

     echo "<script>window.location.href='".$cur_url."/userpay/".$pgmtime."'</script>";

  }

  $i = 1;

  $k = 1;

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Courses</title>



    <!-- Prevent the demo from appearing in search engines -->

    <meta name="robots" content="noindex">



    <!-- Perfect Scrollbar -->

    <link type="text/css" href="{{ asset('assets/vendor/perfect-scrollbar.css') }}" rel="stylesheet">



    <!-- App CSS -->

    <link type="text/css" href="{{ asset('assets/css/app.css') }}" rel="stylesheet">

    <link type="text/css" href="{{ asset('assets/css/app.rtl.css') }}" rel="stylesheet">



    <!-- Material Design Icons -->

    <link type="text/css" href="{{ asset('assets/css/vendor-material-icons.css') }}" rel="stylesheet">

    <link type="text/css" href="{{ asset('assets/css/vendor-material-icons.rtl.css') }}" rel="stylesheet">



    <!-- Font Awesome FREE Icons -->

    <link type="text/css" href="{{ asset('assets/css/vendor-fontawesome-free.css') }}" rel="stylesheet">

    <link type="text/css" href="{{ asset('assets/css/vendor-fontawesome-free.rtl.css') }}" rel="stylesheet">



    <!-- ion Range Slider -->

    <link type="text/css" href="{{ asset('assets/css/vendor-ion-rangeslider.css') }}" rel="stylesheet">

    <link type="text/css" href="{{ asset('assets/css/vendor-ion-rangeslider.rtl.css') }}" rel="stylesheet">









    <link href="{{ asset('assets/css/base.css') }}" rel="stylesheet" data-turbolinks-track="true"></link>



    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">



     



     <style type="text/css">

       .course-sidebar {

        position: absolute !important;

        height: auto !important;

        z-index: 99;

        overflow: hidden !important;

       }

     </style>



</head>



<body class="layout-fixed layout-sticky-subnav">







    <div class="preloader"></div>



    <!-- Header Layout -->

    <div class="mdk-header-layout js-mdk-header-layout">



        <!-- Header -->



        @include('includes/siteheader')



        <!-- // END Header -->



        <!-- Header Layout Content -->

        <div class="mdk-header-layout__content page">



            @include('includes/sitemenu')







            <div class="container page__container">



                



   @foreach($pgm as $pgms)

   @endforeach             

   

                <div class='course-sidebar'>

  <!-- Image & Title -->

  @if($pgms->image != '')

  <?php $img = $pgms->image; ?>

  <img class='course-image' src='<?php echo asset($img); ?>' alt="">

  @else

  <img src="{{ asset('assets/images/course_lms.jpg') }}" style="width:100%;" alt="">

  @endif

  <h2>{{ $pgms->programname }}</h2>

  <!-- Course Progress -->

  <div class='course-progress'>

    <div class='progressbar'>

      <div class='progressbar-fill' style='min-width: 100%;'></div>

    </div>

    <!--<div class='small course-progress'>

      <span class='percentage'>

        83%

      </span>

      COMPLETE

    </div>-->

  </div>

  <ul class='sidebar-nav'>

      <!-- Sidebar Nav -->

  

    <li class="selected">

      <a href='' class='sidebar-nav-link'>

        <span class='lecture-sidebar-icon'>

          <i class='fa fa-list-alt'></i>

        </span>

        Course Curriculum

      </a>

    </li>

  
<li class="selected">

      <a href='{{url('course-writing-program/'.$pgmtime)}}' class='sidebar-nav-link'>

        <span class='lecture-sidebar-icon'>

          <i class='fa fa-edit'></i>

        </span>

        Writing Program

      </a>

    </li>
  

  <!--<li class="">

    <a href='/courses/156515/author_bio' class='sidebar-nav-link'>

      <span class='lecture-sidebar-icon'>

        <i class='fa fa-user'></i>

      </span>

      Your Instructor

    </a>

  </li>-->

  

  </ul>

</div>



    

    <div class='course-mainbar' style='display: block; min-height: 550px;'>

      



<h2 class='section-title' style=" font-size: 1.5rem;">

  Course Curriculum

</h2>

<div class='next-lecture-wrapper'>

  <a

    class='btn btn-primary start-next-lecture'

    data-no-turbolink='true'

    data-ss-course-id='156515'

    data-ss-event-name='Lecture: Start Next'

    data-ss-event-type='button'

    data-ss-school-id='115396'

    data-ss-user-id='4066098'

  >

    Start next lecture&nbsp;&nbsp;

    <span aria-hidden='true'>&#8250;</span>

  </a>

  

</div>



<!-- Lecture list on courses page (enrolled user) -->





@foreach($data as $object)



<div class='row'>

  <div class='col-sm-12 course-section'>

    <div class='section-title' data-release-date="" data-days-until-dripped="0" data-is-dripped-by-date="" data-course-id="156515">

      <span class="section-lock">

        <i class="fa fa-lock"></i>&nbsp;

      </span>

      Topic {{ $i }}: {{ $object->topicname }}

      

    </div>

    <ul class='section-list'>

      <?php

        $agents1 = DB::table('tbl_videos')->where(['topic' => $object->id])->get(); 

        foreach ($agents1 as $agent1) { 

      ?>

        

      <li class='section-item incomplete' data-lecture-id="">

        <a class='item' href="{{ url('/learn/'.$pgmtime.'/lectures/'.$agent1->regtime) }}">

          <span class='status-container'>

            <span class='status-icon'>

              &nbsp;

            </span>

          </span>

          <div class='title-container'>

            <div class='btn-primary btn-sm pull-right'>

              Start

            </div>

            <span class='lecture-icon'>

              <i class='fa fa-play'></i>

            </span>

            <span class='lecture-name'>

              Lesson {{ $k }} - {{ App\Models\tblBasicSettings::chapterfind( $agent1->chapter ) }} - {{ $agent1->videocaption }}

                

            </span>

          </div>

        </a>

      </li>

      <?php $k++; ?>

      <?php } ?>

      

    </ul>

  </div>

</div>

<?php $i++; ?>

@endforeach

<!--<li class='section-item completed' data-lecture-id="2345617">

        <a >

          <span class='status-container'>

            <span class='status-icon'>

              &nbsp;

            </span>

          </span>

          <div class='title-container'>

            <div class='btn-primary btn-sm pull-right'>

              Start

            </div>

            <span class='lecture-icon'>

              <i class='fa fa-lightbulb-o'></i>

            </span>

            <span class='lecture-name'>

              Lesson 4 - Checking SEO Traffic in Google Analytics

              

                (5:45)

              



            </span>

          </div>

        </a>

      </li>-->







<br>







    </div>

            </div>



            @include('includes/sitefooter')

            

        </div>

        <!-- // END Header Layout Content -->



    </div>

    <!-- // END Header Layout -->

    

    

    

    <!-- jQuery -->

    <script src="{{ asset('assets/vendor/jquery.min.js') }}"></script>



    <!-- Bootstrap -->

    <script src="{{ asset('assets/vendor/popper.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/bootstrap.min.js') }}"></script>



    <!-- Perfect Scrollbar -->

    <script src="{{ asset('assets/vendor/perfect-scrollbar.min.js') }}"></script>



    <!-- DOM Factory -->

    <script src="{{ asset('assets/vendor/dom-factory.js') }}"></script>



    <!-- MDK -->

    <script src="{{ asset('assets/vendor/material-design-kit.js') }}"></script>



    <!-- Range Slider -->

    <script src="{{ asset('assets/vendor/ion.rangeSlider.min.js') }}"></script>

    <script src="{{ asset('assets/js/ion-rangeslider.js') }}"></script>



    <!-- App -->

    <script src="{{ asset('assets/js/toggle-check-all.js') }}"></script>

    <script src="{{ asset('assets/js/check-selected-row.js') }}"></script>

    <script src="{{ asset('assets/js/dropdown.js') }}"></script>

    <script src="{{ asset('assets/js/sidebar-mini.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>



    <!-- App Settings (safe to remove) -->

    <script src="{{ asset('assets/js/app-settings.js') }}"></script>



    <script src="{{ asset('assets/js/course.js') }}"></script>



    <script src="{{ asset('assets/js/course1.js') }}"></script>





</body>



</html>

@endif