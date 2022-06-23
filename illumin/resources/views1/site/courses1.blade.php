<?php $cour_param = Request::segment(2); ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">



<head>{{ App\Models\

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



    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">







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




{{ App\Models\
            <div class="container page__heading-container">

                <div class="page__heading d-flex align-items-center justify-content-between mb-0">

                    <h1 class="m-0">Courses</h1>

                    <!--<div class="d-flex align-items-center">

                        <span class="mr-2 bold text-muted">Sort:</span> <select class="form-control form-inline">

                            <option value="1">Course Name</option>

                            <option value="2">Price</option>

                            <option value="3">Author</option>

                        </select>

                    </div>-->



                </div>

            </div>











            <div class="container page__container">



                <div class="card clear-shadow">



                    <div class="bg-soft-light-gray card-header card-header-tabs-basic nav" role="tablist">

                        <a href="{{ url('/courses') }}" @if($cour_param == '') class="active" @endif>All</a>

                        @foreach($course as $courses)

                        <a href="{{ url('/course/'.$courses->id) }}" @if($cour_param == $courses->id) class="active" @endif >{{ $courses->coursename }}</a>

                        @endforeach

                        

                    </div>

                </div>



                <div class="d-flex justify-content-around pb-4">



                    <div class="row">

                        @foreach($data as $object)

                        <div class="col-md-6 col-lg-4">

                            <div class="card card__course card__course__animate" style="width:350px;">

                                <a href="{{ url('/course-details/'.$object->id) }}" class="card-img-top">

                                    @if($object->image == '')

                                    <img src="{{ asset('assets/images/course_lms.jpg') }}" style="width:100%;" alt="{{ $object->programname }}">

                                    @else

                                    <?php $pr_image = $object->image; ?>

                                    <img src="<?php echo asset($pr_image); ?>" style="width:100%; min-height: 240px;" alt="{{ $object->programname }}">

                                    @endif

                                    

                                </a>



                                <div class="p-3 text-center border-bottom">

                                    <div class="bold mb-2">

                                        <a href="{{ url('/course-details/'.$object->id) }}" class="text-body">

                                            <span class="course__title">{{ $object->programname }}</span>

                                        </a>

                                    </div>

                                    <div class="d-flex justify-content-around">





                                        <div class="mb-2 text-muted d-flex align-items-center align-self-center">

                                            <!--<small class="mr-3 d-flex align-items-center">

                                                <i class="fa fa-book-open"></i>

                                                <span class="ml-1">{{ App\tblCourse::totalvideos($object->id) }} Lessons </span>

                                            </small>-->

                                            <small class="d-flex align-items-center">

                                                <i class="fa fa-clock"></i>

                                                <span class="ml-1">

                                                    {{ str_pad($object->time_hh, 2, "0", STR_PAD_LEFT) }}:{{ str_pad($object->time_mm, 2, "0", STR_PAD_LEFT) }}  hours

                                                </span>

                                            </small>

                                        </div>

                                    </div>



                                </div>

                                <div class="p-3 text-center">

                                    @if($object->program_status == '1')

                                        @if(($object->offeramount != '') && ($object->offerstart != '') && ($object->offerend != ''))



                                            <?php 

                                                $date = date('Y-m-d');

                                                $of_from = $object->offerstart;

                                                $of_to = $object->offerend;

                                            ?>

                                            @if(($date >= $of_from) && ($date <= $of_to)) 

                                                <strong class="h4 m-0 text-primary">₹{{ number_format($object->offeramount, 0) }}</strong>

                                            @else

                                                <strong class="h4 m-0 text-primary"> ₹{{ number_format($object->amount, 0) }} </strong>

                                            @endif

                                        @else

                                            <strong class="h4 m-0 text-primary"> ₹{{ number_format($object->amount, 0) }} </strong>

                                        @endif

                                    @else

                                        <strong class="h4 m-0 text-primary"> Free Program </strong>

                                    @endif

                                </div>

                            </div>

                        </div>

                        @endforeach

                        </div>

                    </div>

                    <?php //echo $data->links(); ?>



                    <?php $link_limit = 9; // maximum number of links ?>





    

                    @if($data->lastPage() > 1)

                        <ul class="pagination">

                            

                            <li class="page-item {{ ($data->currentPage() == 1) ? ' disabled' : '' }}">

                                <a class="page-link" href="{{ $data->url(1) }}" aria-label="Previous">

                                    <span aria-hidden="true" class="material-icons">first_page</span>

                                    <span class="sr-only">First</span>

                                </a>

                            </li>

                            <li class="page-item {{ ($data->currentPage() == 1) ? ' disabled' : '' }}">

                                <a class="page-link" href="{{ $data->url($data->currentPage() - 1) }}" aria-label="Previous">

                                    <span aria-hidden="true" class="material-icons">chevron_left</span>

                                    <span class="sr-only">Prev</span>

                                </a>

                            </li>

                            @for ($i = 1; $i <= $data->lastPage(); $i++)

                                <?php

                                $half_total_links = floor($link_limit / 2);

                                $from = $data->currentPage() - $half_total_links;

                                $to = $data->currentPage() + $half_total_links;

                                if ($data->currentPage() < $half_total_links) {

                                   $to += $half_total_links - $data->currentPage();

                                }

                                if ($data->lastPage() - $data->currentPage() < $half_total_links) {

                                    $from -= $half_total_links - ($data->lastPage() - $data->currentPage()) - 1;

                                }

                                ?>

                                @if ($from < $i && $i < $to)

                                    <li class="page-item {{ ($data->currentPage() == $i) ? ' active' : '' }}">

                                        <a class="page-link" href="{{ $data->url($i) }}" aria-label="1">

                                            <span>{{ $i }}</span>

                                        </a>

                                    </li>

                                @endif

                            @endfor

                            <li class="page-item {{ ($data->currentPage() == $data->lastPage()) ? ' disabled' : '' }}">

                                <a class="page-link" href="{{ $data->url($data->currentPage() + 1) }}" aria-label="Next">

                                    <span class="sr-only">Next</span>

                                    <span aria-hidden="true" class="material-icons">chevron_right</span>

                                </a>

                            </li>





                            <li class="page-item {{ ($data->currentPage() == $data->lastPage()) ? ' disabled' : '' }}">

                                <a class="page-link" href="{{ $data->url($data->lastPage()) }}" aria-label="Next">

                                    <span class="sr-only">Last</span>

                                    <span aria-hidden="true" class="material-icons">last_page</span>

                                </a>

                            </li>

                        </ul>

                    @endif



                    

               





                <!--<div class="bg-soft-primary card-body mb-4 p-4 text-center rounded">

                    <h4 class="text-center text-primary bold mb-3">Get all courses for ₹99</h4>

                    <a href="#" class="btn btn-primary btn-lg">Purchase <i class="material-icons">shopping_cart</i></a>

                </div>-->

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









</body>



</html>