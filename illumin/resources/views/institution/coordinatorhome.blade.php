<?php $year = date('Y'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Home</title>

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


    <!-- Flatpickr -->
    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr.rtl.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr-airbnb.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr-airbnb.rtl.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

</head>

<body class="layout-default">

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        @include('includes/coordinatorheader')

        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page">



                    <div class="container-fluid page__heading-container">
                        <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <h4 class="m-lg-0">Coordinator Dashboard</h4>
                            
                        </div>
                    </div>


                    <input type="hidden" name="jan" id="jan" value="{{ App\Models\tblBasicSettings::janearn($year.'-01-01', $year.'-01-31') }}">
                    <input type="hidden" name="feb" id="feb" value="{{ App\Models\tblBasicSettings::janearn($year.'-02-01', $year.'-02-31') }}">
                    <input type="hidden" name="mar" id="mar" value="{{ App\Models\tblBasicSettings::janearn($year.'-01-03', $year.'-03-31') }}">
                    <input type="hidden" name="apr" id="apr" value="{{ App\Models\tblBasicSettings::janearn($year.'-04-01', $year.'-04-31') }}">
                    <input type="hidden" name="may" id="may" value="{{ App\Models\tblBasicSettings::janearn($year.'-05-01', $year.'-05-31') }}">
                    <input type="hidden" name="jun" id="jun" value="{{ App\Models\tblBasicSettings::janearn($year.'-06-01', $year.'-06-31') }}">
                    <input type="hidden" name="jul" id="jul" value="{{ App\Models\tblBasicSettings::janearn($year.'-07-01', $year.'-07-31') }}">
                    <input type="hidden" name="aug" id="aug" value="{{ App\Models\tblBasicSettings::janearn($year.'-08-01', $year.'-08-31') }}">
                    <input type="hidden" name="sep" id="sep" value="{{ App\Models\tblBasicSettings::janearn($year.'-09-01', $year.'-09-31') }}">
                    <input type="hidden" name="oct" id="oct" value="{{ App\Models\tblBasicSettings::janearn($year.'-10-01', $year.'-10-31') }}">
                    <input type="hidden" name="nov" id="nov" value="{{ App\Models\tblBasicSettings::janearn($year.'-11-01', $year.'-11-31') }}">
                    <input type="hidden" name="dec" id="dec" value="{{ App\Models\tblBasicSettings::janearn($year.'-12-01', $year.'-12-31') }}">
                   


                    <div class="container-fluid page__container">

                        <div class="row card-group-row">
                            <div class="col-lg-4 col-md-6 card-group-row__col" >
                                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center" style="background-color:#c5c2c2;">
                                    <div class="flex">
                                        <div class="card-header__title text-muted mb-2">Students</div>
                                        <div class="text-amount"><?php //echo $studentcount = DB::table('users')->where(['type' => '3', 'status' => '1', 'instid' => Auth::user()->instid])->count(); ?><?php //echo $studentcount = DB::table('previous_users')->count();
										// $studentcount1 = DB::table('previous_userstechtalks')->count();
										 //echo $studentcount+$studentcount1;?></div>
                                    </div>

                                    <div class="avatar">
                                        <span class="bg-soft-success avatar-title rounded-circle text-center text-success">
                                            <i class="fa fa-users"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 card-group-row__col">
                                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center" style="background-color:#c5c2c2;">
                                    <div class="flex">
                                        <div class="card-header__title text-muted mb-2">Videos</div>
                                        <div class="text-amount"><?php //echo $vdpgmcount = DB::table('tbl_programs')->where(['videoprogram' => '1', 'status' => '1', 'instid' => Auth::user()->instid])->count();
										//$vdpgmcount = DB::table('previous_users')->distinct()->count('student_course');
										//$vdpgmcount1 = DB::table('previous_userstechtalks')->distinct()->count('student_course');
										//echo $vdpgmcount+$vdpgmcount1;  ?></div>
                                    </div>
                                    <div class="avatar">
                                        <span class="bg-soft-success avatar-title rounded-circle text-center text-success">
                                            <i class="fa fa-file-video"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 card-group-row__col">
                                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center" style="background-color:#c5c2c2;">
                                    <div class="flex">
                                        <div class="card-header__title text-muted mb-2">Tests</div>
                                        <div class="text-amount"><?php //echo $testpgmcount = DB::table('tbl_programs')->where(['testprogram' => '1', 'status' => '1', 'instid' => Auth::user()->instid])->count();
										//$vdpgmcount = DB::table('previous_users')->distinct()->count('student_batch');
										//$vdpgmcount1 = DB::table('previous_userstechtalks')->distinct()->count('student_batch');
										//echo $vdpgmcount+$vdpgmcount1; ?></div>
                                    </div>
                                    <div class="avatar">
                                        <span class="bg-soft-success avatar-title rounded-circle text-center text-success">
                                            <i class="fa fa-handshake"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row card-group-row">
                            
                            
                            <?php
                                $date = date('Y-m-d');
                                $amt = 0;
                                $data = DB::table('tbl_payments')->where(['paidon' => $date])->get();
                                foreach($data as $obj)
                                {
                                    $amt = $amt + $obj->amount;
                                }
                            ?>
                            <!--<div class="col-lg-4 col-md-12 card-group-row__col">
                                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                    <div class="flex">
                                        <div class="card-header__title text-muted mb-2">Old Students</div>
                                        <div class="text-amount">&#8377; {{ $amt }}</div>
                                    </div>
                                    <div class="avatar">
                                        <span class="bg-soft-warning avatar-title rounded-circle text-center text-warning">
                                            <i class="fa fa-gift"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>-->
                            
                        </div>

                        <!-- CHART -->
                        <div class="row">
                            <!--<div class="col-md-8">

                                <div class="card">
                                    <div class="card-header bg-white d-flex align-items-center">
                                        <h4 class="card-header__title mb-0">Earnings</h4>
                                       
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="ordersChart" class="chart-canvas"></canvas>
                                        </div>
                                    </div>
                                </div>

                            </div>-->
                            
                            
                            
                            
                            
                        </div>
                    </div>


                </div>
                <!-- // END drawer-layout__content -->
                @include('includes/coordinatormenu')
                
            <!-- // END drawer-layout -->

        </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->


     @include('includes/adminfooter')

    

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


    <!-- Flatpickr -->
    <script src="{{ asset('assets/vendor/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr.js') }}"></script>

    <!-- Global Settings -->
    <script src="{{ asset('assets/js/settings.js') }}"></script>


    <!-- Chart.js -->
    <script src="{{ asset('assets/vendor/Chart.min.js') }}"></script>

    <!-- UI Charts Page JS -->
    <script src="{{ asset('assets/js/chartjs-rounded-bar.js') }}"></script>
    <script src="{{ asset('assets/js/charts.js') }}"></script>

    <!-- Chart.js Samples -->
    <script src="{{ asset('assets/js/page.instructor-dashboard.js') }}"></script>

</body>

</html>