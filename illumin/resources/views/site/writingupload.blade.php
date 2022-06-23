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

   

                



    

    <div class='course-mainbar1' style='display: block; min-height: 550px;'>

      



<h2 class='section-title' style=" font-size: 1.5rem;margin-top:20px;">

  Writing Program - {{$pgms->programname}}

</h2>





<!-- Lecture list on courses page (enrolled user) -->







<?php
					/* $wid=$object->id;
					 $pct11="SELECT * from writing_student where student_id='$id' and writing_id='$wid'";
                     $result_pct11=mysqli_query($dbc, $pct11);
					 $result_count1=mysqli_num_rows($result_pct11);
					 $res_pct11=mysqli_fetch_assoc($result_pct11);
					 if($result_count1==0)
					 {
					 $status='Not Uploaded';
					 }
					 else
					 {
					 if($res_pct11['wstatus']=='1')
					 {
					 $status='Accepted';
					 }
					 else if($res_pct11['wstatus']=='2')
					 {
					 $status='Rejected';
					 }
					 else if($res_pct11['wstatus']=='0')
					 {
					 $status='Uploaded';
					 }
					 else if($res_pct11['wstatus']=='3')
					 {
					 $status='ReUploaded';
					 }
					 }
					 $today=date('Y-m-d');
					 $d_vfrom1 = date('Y-m-d', strtotime($res_pct1['d_vfrom']));
					 $d_vto1 = date('Y-m-d', strtotime($res_pct1['d_vto']));
					 if($today>=$d_vfrom1 && $today<=$d_vto1)
					 {
					 $download=1;
					 }
					 else
					 {
					 $download=0;
					 }
					 $u_vfrom1 = date('Y-m-d', strtotime($res_pct1['u_vfrom']));
					 $u_vto1 = date('Y-m-d', strtotime($res_pct1['u_vto']));
					 if($today>=$u_vfrom1 && $today<=$u_vto1)
					 {
					 $upload=1;
					 }
					 else
					 {
					 $upload=0;
					 }
					 if($today==date('Y-m-d', strtotime($res_pct1['answer_publish'])))
					 {
					 $answer=1;
					}
					else
					{
					$answer=0;
					 }
					 ?>
					 <tr><td><?php echo $i;?></td><td><?php echo $res_pct1['section_name'];?></td><td><?php echo $res_pct1['title'];?></td><td><?php echo $res_pct1['attended_date'];?></td><td>From <?php echo $res_pct1['d_vfrom'];?> to <?php echo $res_pct1['d_vto'];?>&nbsp;<?php if($download=='1') { ?><a href="../writing/<?php echo $res_pct1['test_pdf'];?>" target="_blank"><i class="fa fa-download"></i></a><?php } ?></td><td>From <?php echo $res_pct1['u_vfrom'];?> to <?php echo $res_pct1['u_vto'];?>&nbsp;<?php if($upload=='1' && ($status=='Not Uploaded' || $status=='Rejected')) { ?><a href="#" data-id="<?php echo $res_pct1['writing_id'];?>" data-toggle="modal" data-target="#uploadModal"><i class="fa fa-upload"></i></a><?php } ?></td><td><?php echo $status;?><?php if($status=='Rejected') {  echo '<p><i>'.$res_pct11['comments'].'</i></p>';}?></td><td><?php if($res_pct11['fanswer_pdf']!='') { ?><a href="../writing/<?php echo $res_pct11['fanswer_pdf'];?>" target="_blank"><i class="fa fa-download"></i></a><?php } ?></td><td><?php echo $res_pct1['mark'];?></td><td>On <?php echo $res_pct1['answer_publish'];?><?php if($answer=='1') { ?>&nbsp;<a target="_blank" href="../writing/<?php echo $res_pct1['test_apdf'];?>"><i class="fa fa-download"></i></a><?php } ?></td>
					 <?php
					 $i++;*/
					 ?>

<div class='row'>

  <div class='col-sm-12 course-section'>

    <!--<div class='section-title' data-release-date="" data-days-until-dripped="0" data-is-dripped-by-date="" data-course-id="156515">

      <span class="section-lock">

        <i class="fa fa-lock"></i>&nbsp;

      </span>

      Topic {{ $i }}: 

      

    </div>-->

     <form id="uploadForm" action="#" method="post">
	   <input type="hidden" name="writing_id" id="writing_id">
<div class="form-group">
                    <label foCourser="student_name" class="col-sm-3 control-label">No of Questions Attempted</label>

                  <div class="col-sm-9">
<input name="ques" type="number" class="form-control"  value="" min="1" max="99" required/>
</div>
</div>
<br /><br /><br /><br />
<div class="form-group">
                    <label foCourser="student_name" class="col-sm-3 control-label">Answer PDF</label>

                  <div class="col-sm-9">

<input name="userImage" type="file" class="inputFile" /></div></div><br /><br /><br />
<input type="submit" value="Submit" class="btnSubmit btn btn-info" />
</form>

  </div>

</div>



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



<style>
#writ td,#writ th
{
padding:10px;
border: 1px solid #fff;
text-align:center;
white-space:nowrap;
}
</style>

</body>



</html>

@endif