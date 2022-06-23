 @foreach($data as $object)

 @endforeach

 <?php $k = 1; ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

{{ App\Models\

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



    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

    

    <!-- CSS 

    ================================================== -->

    <link rel="stylesheet" href="{{ asset('temp/assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('temp/assets/css/night-mode.css') }}">

    <link rel="stylesheet" href="{{ asset('temp/assets/css/framework.css') }}">

    <link rel="stylesheet" href="{{ asset('temp/assets/css/bootstrap.css') }}"> 



    <style type="text/css">

        a { text-decoration: none !important; }

    </style>    







</head>



<body class="layout-fixed layout-sticky-subnav">







    <div class="preloader"></div>



    <!-- Header Layout -->{{ App\Models\

    <div class="mdk-header-layout js-mdk-header-layout">



        <!-- Header -->



        @include('includes/siteheader')



        <!-- // END Header -->



        <!-- Header Layout Content -->

        <div class="mdk-header-layout__content page">



            @include('includes/sitemenu')





            











            <div class="container page__container">



                <div class="page-content">







        <div class="course-details-wrapper topic-1 uk-light">

            <div class="container p-sm-0">



                <div uk-grid>

                    <div class="uk-width-2-3@m">



                        <div class="course-details">

                            <h1> {{ $object->programname }}</h1>

                            <p> {{ strip_tags($object->description) }} </p>



                            <div class="course-details-info mt-4">

                                <ul>

                                    <li>

                                        <div class="star-rating">

                                            <span class="avg"> 4.9 </span> 

                                            <span class="fa fa-star" style="color: #febe42;"></span>

                                            <span class="fa fa-star" style="color: #febe42;"></span>

                                            <span class="fa fa-star" style="color: #febe42;"></span>

                                            <span class="fa fa-star" style="color: #febe42;"></span>

                                            <span class="fa fa-star-half-alt" style="color: #febe42;"></span>

                                        </div>
{{ App\Models\
                                    </li>

                                    <li></li>

                                </ul>

                            </div>



                            <div class="course-details-info">



                                <ul>

                                    <?php $created = $object->created; ?>



                                    <li> Created by <a href="#"> {{ App\Models\tblSystemSettigs::systemname('systemname') }} </a> </li>

                                    <li> On {{ Carbon\Carbon::parse($created)->format('j F Y') }}</li>

                                </ul>



                            </div>

                        </div>

                        <nav class="responsive-tab style-5">

                            <ul

                                uk-switcher="connect: #course-intro-tab ;animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">

                                <li><a href="#">Curriculum</a></li>

                                <li><a href="#">Overview</a></li>

                                <li><a href="#">FAQ</a></li>

                                <li><a href="#">Sample Video</a></li>

                                <li><a href="#">Course Content</a></li>

                            </ul>

                        </nav>



                    </div>

                </div>



            </div>

        </div>



        <div class="container">



            <div class="uk-grid-large mt-4" uk-grid>

                <div class="uk-width-2-3@m">

                    <ul id="course-intro-tab" class="uk-switcher mt-4">



                        <!-- course Curriculum-->

                        <li>



                            {!! $object->about !!}



                        </li>



                        <!-- course description -->

                        <li class="course-description-content">

                            {!! $object->overview !!}

                        </li>



                        <!-- course Faq-->

                        <li>



                            <h4 class="my-4"> Course Faq</h4>



                            <ul class="course-faq" uk-accordion>

                                <?php

                                   $agents1 = DB::table('tbl_faqs')->where(['programid' => $object->id])->get(); 

                                   foreach ($agents1 as $agent1) { 

                                ?>



                                <li @if($k == 1) class="uk-open" @endif>

                                    <a class="uk-accordion-title" href="#">{{ $agent1->question }} </a>

                                    <div class="uk-accordion-content">

                                        <p>{{ strip_tags($agent1->answer) }} </p>

                                    </div>

                                </li>

                                <?php $k++; ?>

                                <?php } ?>



                            </ul>



                        </li>



                        <!-- course Announcement-->

                        <li>

                            <h4> Sample Video </h4>



                            <div class="user-details-card">

                                @if($object->demovideo != '')

                                <?php

                                    $url = $object->demovideo;

                                    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);

                                    $id = $matches[1];

                                    $width = '100%';

                                    $height = '300px';

                                ?>

                                <iframe id="ytplayer" type="text/html" width="<?php echo $width ?>" height="<?php echo $height ?>" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe> 

                               

                                @endif

                            </div>

                            

                        </li>



                        <!-- course Reviews-->

                        <li>



                            <div class="comments">

                                <h4 class="review-summary-title"> Course Content </h4>



                                <ul>

                                    <?php $n = 1; ?>

                                    @foreach($topic as $topics)

                                    <li>

                                        <h6><b>{{ $n }}. {{ App\Models\tblBasicSettings::topicfind($topics->topic) }}</b></h6>

                                    </li>

                                    <div class="clearfix"></div>

                                    <?php $n++; ?>

                                    @endforeach

                                    



                                </ul>



                            </div>

                        </li>



                    </ul>

                </div>



                <div class="uk-width-1-3@m">

                    <div class="course-card-trailer" uk-sticky="top: 10 ;offset:105 ; media: @m ; bottom:true">



                        <div class="course-thumbnail">

                            @if($object->demovideo != '')

                                <?php

                                    $url = $object->demovideo;

                                    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);

                                    $id = $matches[1];

                                    $width = '100%';

                                    $height = '250px';

                                ?>

                                <iframe id="ytplayer" type="text/html" width="<?php echo $width ?>" height="<?php echo $height ?>" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe> 

                            @else

                                @if($object->image == '')

                                <img src="{{ asset('assets/images/course_lms.jpg') }}" alt="{{ $object->programname }}">

                                @else

                                <?php $pr_image = $object->image; ?>

                                <img src="<?php echo asset($pr_image); ?>" alt="{{ $object->programname }}">

                                @endif

                            @endif

                            <!--<a class="play-button-trigger show" href="#trailer-modal" uk-toggle> </a>-->

                        </div>



                        <!-- video demo model -->

                        <!--<div id="trailer-modal" uk-modal>

                            <div class="uk-modal-dialog">

                                <button class="uk-modal-close-default mt-2  mr-1" type="button" uk-close></button>

                                <div class="uk-modal-header">

                                    <h4> Trailer video </h4>

                                </div>

                                <div class="video-responsive">

                                    <iframe src="https://www.youtube.com/embed/nOCXXHGMezU" class="uk-padding-remove"

                                        uk-video="automute: true" frameborder="0" allowfullscreen

                                        uk-responsive></iframe>

                                </div>



                                <div class="uk-modal-body">

                                    <h3>Build Responsive Websites </h3>

                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum

                                        dolore

                                        eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non

                                        proident,

                                        sunt

                                        in culpa qui officia deserunt mollit anim id est laborum.</p>

                                </div>

                            </div>

                        </div>-->



                        <div class="p-3">

                            @if($object->program_status == '1')

                                @if(($object->offeramount != '') && ($object->offerstart != '') && ($object->offerend != ''))

                                <p class="my-3 text-center">

                                    <?php 

                                        $date = date('Y-m-d');

                                        $of_from = $object->offerstart;

                                        $of_to = $object->offerend;

                                    ?>

                                    @if(($date >= $of_from) && ($date <= $of_to)) <!-- If any Offer Availavle -->

                                    <span class="uk-h1"> ₹{{ $object->offeramount }} </span>

                                    <s class="uk-h4 text-muted"> ₹{{ $object->amount }}</s>

                                    <?php

                                        $datetime1 = new DateTime($date);

                                        $datetime2 = new DateTime($of_to);

                                        $interval = $datetime1->diff($datetime2);

                                        $days = $interval->format('%a');//now do whatever you like with $days

                                    ?>

                                    <p> {{ $days+1 }} Days Left This price</p>

                                    @else

                                    <span class="uk-h1"> ₹{{ $object->amount }} </span>

                                    @endif

                                </p>

                                @else

                                <p class="my-3 text-center">

                                    

                                    <span class="uk-h1"> ₹{{ $object->amount }} </span>

                                    <!--<s class="uk-h4 text-muted"> ₹19.99 </s>

                                    <s class="uk-h6 ml-1 text-muted"> ₹32.99 </s>-->

                                </p>

                                @endif

                            @else

                                <p class="my-3 text-center">

                                    <span class="uk-h3"> Free Program </span>

                                    <!--<s class="uk-h4 text-muted"> ₹19.99 </s>

                                    <s class="uk-h6 ml-1 text-muted"> ₹32.99 </s>-->

                                </p>

                            @endif



                            <!--<p> ! Hour Left This price</p>-->



                            <div class="uk-child-width-1-2 uk-grid-small mb-4" uk-grid>

                                <div  style="width: 100% !important;">

                                    @if($object->program_status == '1')

                                    <a href="{{ url('/course-enroll/'.$object->regtime) }}"

                                        class="uk-width-1-1 btn btn-success transition-3d-hover"> 

                                        <i class="fa fa-play"></i> Start </a>

                                    @else

                                    <a href="{{ url('/course-enroll/'.$object->regtime) }}"

                                        class="uk-width-1-1 btn btn-success transition-3d-hover"> 

                                        <i class="fa fa-play"></i> Start </a>

                                   @endif

                                    

                                </div>

                                <!--<div>

                                    @if($object->program_status == '1')

                                    <a href="" class="btn btn-danger uk-width-1-1 transition-3d-hover"> 

                                        <i class="fa fa-shopping-cart"></i> Buy Now </a>

                                    @else

                                    <a href="" class="btn btn-danger uk-width-1-1 transition-3d-hover disabled"> 

                                        <i class="fa fa-shopping-cart"></i> Buy Now </a>

                                    @endif

                                </div>-->

                            </div>



                            <p class="uk-text-bold"> This Course Include </p>



                            <div class="uk-child-width-1-2 uk-grid-small" uk-grid>

                                <div>

                                    <span><i class="uil-youtube-alt"></i> {{ $n-1 }} Topics</span>

                                </div>

                                <div>

                                    <span> <i class="uil-award"></i> {{ str_pad($object->time_hh, 2, "0", STR_PAD_LEFT) }}:{{ str_pad($object->time_mm, 2, "0", STR_PAD_LEFT) }}  hours </span>

                                </div>

                                <!--<div>

                                    <span> <i class="uil-file-alt"></i> 12 Article </span>

                                </div>

                                <div>

                                    <span> <i class="uil-video"></i> Watch Offline </span>

                                </div>

                                <div>

                                    <span> <i class="uil-award"></i> Certificate </span>

                                </div>

                                <div>

                                    <span> <i class="uil-clock-five"></i> Lifetime access </span>

                                </div>-->

                            </div>

                        </div>

                    </div>

                </div>



            </div>





           





    



    </div>

 



    </div>

                





            </div>

            <p>&nbsp;</p>

            @include('includes/sitefooter')

            

        </div>

        <!-- // END Header Layout Content -->



    </div>

    <!-- // END Header Layout -->

    

    

    

    <!-- jQuery -->

    <script src="{{ asset('temp/assets/js/jquery-3.3.1.min.js') }}"></script>



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





    <!-- javaScripts

                ================================================== -->

    <script src="{{ asset('temp/assets/js/framework.js') }}"></script>

    



</body>



</html>