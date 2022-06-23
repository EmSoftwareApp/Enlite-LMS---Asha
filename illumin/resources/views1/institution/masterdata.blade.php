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



        @include('includes/instheader')



        <!-- // END Header -->



        <!-- Header Layout Content -->

        <div class="mdk-header-layout__content">



            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">

                <div class="mdk-drawer-layout__content page">







                    <div class="container-fluid page__heading-container">

                        <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">

                            <h4 class="m-lg-0">Master data</h4>

                        </div>

                    </div>











                    <div class="container-fluid page__container">



                        <div class="row card-group-row">

                            <div class="col-lg-4 col-md-6 card-group-row__col">

                                <a href="{{ url('/states') }}" style=" width: 100%;">

                                    <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">

                                        <div class="flex">

                                            <div class="card-header__title text-muted mb-2">States</div>

                                        </div>



                                        <div class="avatar">

                                            <span class="bg-soft-success avatar-title rounded-circle text-center text-success">

                                                <i class="material-icons icon-40pt">gps_fixed</i>

                                            </span>

                                        </div>

                                    </div>

                                </a>

                            </div>

                            <div class="col-lg-4 col-md-6 card-group-row__col">

                                <a href="{{ url('/district') }}" style=" width: 100%;">

                                    <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">

                                        <div class="flex">

                                            <div class="card-header__title text-muted mb-2">District</div>

                                        </div>



                                        <div class="avatar">

                                            <span class="bg-soft-success avatar-title rounded-circle text-center text-success">

                                                <i class="material-icons icon-40pt">gps_fixed</i>

                                            </span>

                                        </div>

                                    </div>

                                </a>

                            </div>

                            <div class="col-lg-4 col-md-12 card-group-row__col">

                                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">

                                    <div class="flex">

                                        <div class="card-header__title text-muted mb-2">Students this Month</div>

                                        <div class="text-amount">182</div>

                                        <div class="text-stats text-danger">3.5% <i class="material-icons">arrow_downward</i></div>

                                    </div>

                                    <div class="avatar">

                                        <span class="bg-soft-warning avatar-title rounded-circle text-center text-warning">

                                            <i class="material-icons text-warning icon-40pt">perm_identity</i>

                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>



                        <!-- CHART -->

                        

                    </div>





                </div>

                <!-- // END drawer-layout__content -->

                @include('includes/instmenu')

                

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