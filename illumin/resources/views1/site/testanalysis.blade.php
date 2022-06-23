@foreach($data as $object)

@endforeach

<!DOCTYPE html>

<html lang="en" dir="ltr">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Test Analysis</title>



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



    <!-- ion Range Slider -->') }}

    <link type="text/css" href="{{ asset('assets/css/vendor-ion-rangeslider.css') }}" rel="stylesheet">

    <link type="text/css" href="{{ asset('assets/css/vendor-ion-rangeslider.rtl.css') }}" rel="stylesheet">











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





            <div class="container page__heading-container">

                <div class="page__heading d-flex align-items-center justify-content-between">

                    <!--<h4 class="m-0">Test Analysis</h4>-->

                </div>

            </div>



            <?php 

                $neg = $object->negativemarks; 

                $totalqtns = $object->totalquestions;

                $makperqtn = App\Models\tblBasicSettings::markperqtn($object->testno);

                $correct = App\Models\tblBasicSettings::testanalysisfind_correct($object->id);

                $wrong = App\Models\tblBasicSettings::testanalysisfind_wrong($object->id);

                $reg_pgm = App\Models\tblBasicSettings::pgmregfind($object->pgmid);

echo $correct;
echo $makperqtn;

                $mark_obt = $correct * $makperqtn;

                $neg_mark = $wrong * $neg;



                $total = $mark_obt - $neg_mark;



                $na = $totalqtns - ($correct + $wrong);



            ?>

            <input type="hidden" name="correct" id="correct" value="{{ $correct }}">

            <input type="hidden" name="wrong" id="wrong" value="{{ $wrong }}">

            <input type="hidden" name="na" id="na" value="{{ $na }}">



            <div class="container page__container">



                <div class="row card-group-row">

                    <div class="col-lg-4 col-md-5 card-group-row__col">

                        <div class="card card-group-row__card">

                            <div class="card-header card-header-large bg-light d-flex align-items-center">

                                <div class="flex">

                                    <h4 class="card-header__title">Test Analysis</h4>

                                </div>

                                

                            </div>

                            <div class="card-body d-flex align-items-center justify-content-center h-250">

                                <div class="chart z-0 dashboard-chart">

                                    <div class="d-flex flex-column align-items-center justify-content-center">

                                        <div class="text-muted mb-1">Total Questions</div>

                                        <div class="card-header__title">{{ $totalqtns }}</div>

                                    </div>

                                    <canvas class="position-relative chartjs-render-monitor" id="billingChart1" width="420" height="420" style="display: block; height: 210px; width: 210px;"></canvas>

                                </div>

                            </div>

                            <div class="card-body pt-0 text-center">

                                <div class="text-muted">Questions Atteneded : <label style="color: #6837de; font-weight: bold;">{{ App\Models\tblBasicSettings::testanalysisfind_attend($object->id) }}</label></div>

                                <div class="text-muted">Correct Answers : <label style="color: #1baf09; font-weight: bold;">{{ $correct }}</label></div>

                                <div class="text-muted">Wrong Answers : <label style="color: #de0000; font-weight: bold;">{{ $wrong }}</label></div>

                                <div class="text-muted">Marks Obtained : <label style="color: #000; font-weight: bold;">{{ $mark_obt }}</label></div>

                                <div class="text-muted">Negative Marks : <label style="color: #de0000; font-weight: bold;">{{ $neg_mark }}</label></div>

                                 <div class="text-muted">Total Marks : <label style="color: #1baf09; font-weight: bold;">{{ $total }}</label></div>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 col-md-7 card-group-row__col">

                        <div class="card card-group-row__card">

                            <div class="card-header card-header-large bg-light d-flex align-items-center">

                                <div class="flex">

                                    <h4 class="card-header__title">Detailed View</h4>

                                </div>

                                

                            </div>

                            <div class="card-body d-flex align-items-center">

                                <div class="col-lg-12 card-form__body card-body">

                                    <div class="form-group">

                                        <label for="fname">Program : <span style="text-transform: capitalize;">{{ App\Models\tblBasicSettings::programfind($object->pgmid) }}</span> </label><br />

                                    </div>

                                    <hr>

                                    <div class="form-group">

                                        <label for="fname">Test Name: <span style="text-transform: capitalize;">{{ App\Models\tblBasicSettings::testfind($object->testno) }}</span> </label><br />

                                    </div>

                                    <hr>

                                    <?php 

                                        $date = $object->date;

                                        $var = explode("-",$date);

                                        $testdate = $var[2].'/'.$var[1].'/'.$var[0];

                                    ?>

                                    <div class="form-group">

                                        <label for="fname">Test Date : <span style="text-transform: capitalize;">{{ $testdate }}, {{ $object->test_time }}</span> </label><br />

                                    </div>

                                    <hr>

                                    

                                                                



                                    <div class="form-group m-0">

                                        <a href="{{ url('/test-review/'.$object->regtime) }}" class="btn btn-outline-primary">Test Review</a>

                                        <a href="{{ url('/test-enroll/'.$reg_pgm) }}" class="btn btn-outline-primary">Start Test Again</a>

                                        <a href="{{ url('/test-courses') }}" class="btn btn-outline-primary">Back to Courses</a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

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





    <!-- Flatpickr -->

    <script src="{{ asset('assets/vendor/flatpickr/flatpickr.min.js') }}"></script>

    <script src="{{ asset('assets/js/flatpickr.js') }}"></script>



    <!-- Global Settings -->

    <script src="{{ asset('assets/js/settings.js') }}"></script>



    <!-- Chart.js -->

    <script src="{{ asset('assets/vendor/Chart.min.js') }}"></script>



    <!-- App Charts JS -->

    <script src="{{ asset('assets/js/chartjs-rounded-bar.js') }}"></script>

    <script src="{{ asset('assets/js/charts.js') }}"></script>



    <!-- Vector Maps -->

    <script src="{{ asset('assets/vendor/jqvmap/jquery.vmap.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/jqvmap/maps/jquery.vmap.world.js') }}"></script>

    <script src="{{ asset('assets/js/vector-maps.js') }}"></script>



    <!-- Chart Samples -->

    <script src="{{ asset('assets/js/page.dashboard.js') }}"></script>



</body>



</html>