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









    <link href="{{ asset('assets/css/sidebar.css') }}" rel="stylesheet" data-turbolinks-track="true"></link>



    <link href="{{ asset('assets/css/base.css') }}" rel="stylesheet" data-turbolinks-track="true"></link>





<style type="text/css">

       .course-sidebar {

        position: absolute !important;

        height: auto !important;

        z-index: 99;

        overflow: hidden !important;

        margin-top: 0px !important;

       }

       .course-mainbar

       {

        padding-top: 25px !important;

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



                

              <header class='full-width half-height is-signed-in'>

  <div class='lecture-left'>

    <a class='nav-icon-back' aria-label='Back to course curriculum' data-no-turbolink="true" role='button' href='/courses/156515'>

      <i class='fa fa-angle-left' title='Back to course curriculum'></i>

    </a>

    <div class="dropdown settings-dropdown" role='menubar'>

      <a href='#' class='nav-icon-settings dropdown-toggle' aria-label='Settings Menu' aria-haspopup='true' role='menuitem' id='settings_menu' data-toggle='dropdown'>

        <i class='fa fa-cog' title='Settings Menu'></i>

      </a>

      <ul class="dropdown-menu left-caret" role="menu" aria-labelledby="settings_menu">

  <!-- AUTOPLAY -->

  <li aria-label="menuitem">

    <div class="switch" id="switch-autoplay-lectures">

      <input id="custom-toggle-autoplay" class="custom-toggle custom-toggle-round" name="toggle-autoplay" type="checkbox" aria-label="Autoplay">

      <label for="custom-toggle-autoplay"></label>

    </div>

    <span aria-labelledby="switch-autoplay-lectures">Autoplay</span>

  </li>

  <!-- AUTOCOMPLETE -->

  <li aria-label="menuitem">

    <div class="switch" id="switch-autocomplete-lectures">

      <input id="custom-toggle-autocomplete" class="custom-toggle custom-toggle-round" name="toggle-autocomplete" type="checkbox" aria-label="Autocomplete">

      <label for="custom-toggle-autocomplete"></label>

    </div>

    <span aria-labelledby="switch-autocomplete-lectures">Autocomplete</span>

  </li>

  <!-- PLAYER TYPE -->

  <li aria-label="menuitem">

    <div class="pull-right">

      <div class="switch-toggle well" id="switch-lecture-player">

        <input id="toggle_html5" name="custom-toggle-player" type="radio">

        <label for="toggle_html5" onclick="">HTML5</label>

        <input id="toggle_flash" name="custom-toggle-player" type="radio">

        <label for="toggle_flash" onclick="">Flash</label>

        <a class="btn btn-primary"></a>

      </div>

    </div>

    <span aria-labelledby="switch-lecture-player">Player</span>

  </li>

  <!-- PLAYBACK SPEED -->

  <li aria-label="menuitem">

    <div class="pull-right">

      <button class="playback-speed" role="button">

      </button>

    </div>

    Speed

  </li>

  <!-- QUALITY: not working yet -->

  <!--  <li>

    <div class="pull-right">

      <div class="switch-toggle switch-3 well">

        <input id="auto" name="quality" type="radio" checked>

        <label for="auto" onclick="">Auto</label>

        <input id="hd" name="quality" type="radio">

        <label for="hd" onclick="">HD</label>

        <input id="sd" name="quality" type="radio">

        <label for="sd" onclick="">SD</label>

        <a class="btn btn-primary"></a>

      </div>

    </div>

    Quality

  </li> -->

</ul>



    </div>

    <a class="nav-icon-list show-xs hidden-sm hidden-md hidden-lg collapsed" aria-label='Course Sidebar' role="button" data-toggle="collapse" href="#courseSidebar" aria-expanded="false" aria-controls="courseSidebar">

        <i class='fa fa-list' title='Course Sidebar'></i>

      </a>

  </div>

  

  <div class='lecture-nav'>

    <a class='nav-btn' href='' role='button' id='lecture_previous_button'>

      <i class='fa fa-arrow-left' aria-hidden='true'></i>

      &nbsp;

      <span class='nav-text'>Previous Lecture</span>

    </a>

    <a

      class='nav-btn complete'

      data-cpl-tooltip='You must complete all lecture material before progressing.'

      data-vpl-tooltip='90% of each video must be completed. You have completed'

      href=''

      id='lecture_complete_button'

      role='button'

    >

      <span class='nav-text'>Complete and continue</span>

      &nbsp;

      <i class='fa fa-arrow-right' aria-hidden='true'></i>

    </a>

  </div>

  

</header>



    <div role="navigation" class='course-sidebar lecture-page collapse navbar-collapse navbar-sidebar-collapse' id='courseSidebar'>

  <h2>SEO Mastery</h2>

  <!-- Course Progress -->

  

  <div class='course-progress lecture-page is-at-top'>

    <div class='progressbar'>

      <div class='progressbar-fill' style='min-width: 83%;'></div>

    </div>

    <div class='small course-progress-percentage'>

      <span class='percentage'>

        83%

      </span>

      COMPLETE

    </div>

  </div>

  

  <!-- Lecture list on courses page (enrolled user) -->



  <div class='row lecture-sidebar'>

    

    <div class='col-sm-12 course-section'>

      <div role="heading" aria-level="3" class='section-title' data-release-date="" data-days-until-dripped="0" data-is-dripped-by-date="" data-course-id="156515">

        <span class="section-lock">

          <i class="fa fa-lock"></i>&nbsp;

        </span>

        Module 1: SEO Introduction

      </div>

      <ul class='section-list'>

        

        <li data-lecture-id="2334928" data-lecture-url='/courses/seo-mastery/lectures/2334928' class='section-item completed'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2334928'

            data-ss-event-type='link'

            data-ss-lecture-id='2334928'

            data-ss-position='1'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2334928'

            id='sidebar_link_2334928'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 1 - Evolution of Search Engines

                

                  (14:08)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="2335570" data-lecture-url='/courses/seo-mastery/lectures/2335570' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2335570'

            data-ss-event-type='link'

            data-ss-lecture-id='2335570'

            data-ss-position='1'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2335570'

            id='sidebar_link_2335570'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 2 - SEO Vs. SEM

                

                  (13:16)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="2345353" data-lecture-url='/courses/seo-mastery/lectures/2345353' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2345353'

            data-ss-event-type='link'

            data-ss-lecture-id='2345353'

            data-ss-position='1'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2345353'

            id='sidebar_link_2345353'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 3 - Keyword Research Basics

                

                  (10:21)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="2345617" data-lecture-url='/courses/seo-mastery/lectures/2345617' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2345617'

            data-ss-event-type='link'

            data-ss-lecture-id='2345617'

            data-ss-position='1'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2345617'

            id='sidebar_link_2345617'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-lightbulb-o'></i>

              </span>

              <span class='lecture-name'>

                Lesson 4 - Checking SEO Traffic in Google Analytics

                

                  (5:45)

                

              </span>

            </div>

          </a>

        </li>

        

      </ul>

    </div>

    

    <div class='col-sm-12 course-section'>

      <div role="heading" aria-level="3" class='section-title' data-release-date="" data-days-until-dripped="0" data-is-dripped-by-date="" data-course-id="156515">

        <span class="section-lock">

          <i class="fa fa-lock"></i>&nbsp;

        </span>

        Module 2: Mastering the Google Search Console

      </div>

      <ul class='section-list'>

        

        <li data-lecture-id="2345608" data-lecture-url='/courses/seo-mastery/lectures/2345608' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2345608'

            data-ss-event-type='link'

            data-ss-lecture-id='2345608'

            data-ss-position='2'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2345608'

            id='sidebar_link_2345608'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 5 - Adding a Website Inside Search Console

                

                  (2:32)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="2346412" data-lecture-url='/courses/seo-mastery/lectures/2346412' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2346412'

            data-ss-event-type='link'

            data-ss-lecture-id='2346412'

            data-ss-position='2'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2346412'

            id='sidebar_link_2346412'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 6 - Setting Up the Preferred Website Version

                

                  (6:13)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="2346421" data-lecture-url='/courses/seo-mastery/lectures/2346421' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2346421'

            data-ss-event-type='link'

            data-ss-lecture-id='2346421'

            data-ss-position='2'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2346421'

            id='sidebar_link_2346421'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 7 - Fetch as Google for Quick Indexing

                

                  (2:32)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="2346441" data-lecture-url='/courses/seo-mastery/lectures/2346441' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2346441'

            data-ss-event-type='link'

            data-ss-lecture-id='2346441'

            data-ss-position='2'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2346441'

            id='sidebar_link_2346441'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 8 - Security and Malware Prevention for Good SEO

                

                  (2:07)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="2346455" data-lecture-url='/courses/seo-mastery/lectures/2346455' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2346455'

            data-ss-event-type='link'

            data-ss-lecture-id='2346455'

            data-ss-position='2'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2346455'

            id='sidebar_link_2346455'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 9 - Search Analytics and Keyword Analysis

                

                  (5:23)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="2346466" data-lecture-url='/courses/seo-mastery/lectures/2346466' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2346466'

            data-ss-event-type='link'

            data-ss-lecture-id='2346466'

            data-ss-position='2'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2346466'

            id='sidebar_link_2346466'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 10 - Crawl Data, Sitemaps and URL Parameters

                

                  (4:19)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="2346491" data-lecture-url='/courses/seo-mastery/lectures/2346491' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2346491'

            data-ss-event-type='link'

            data-ss-lecture-id='2346491'

            data-ss-position='2'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2346491'

            id='sidebar_link_2346491'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 11 - Other Resources in Search Console

                

                  (2:51)

                

              </span>

            </div>

          </a>

        </li>

        

      </ul>

    </div>

    

    <div class='col-sm-12 course-section'>

      <div role="heading" aria-level="3" class='section-title' data-release-date="" data-days-until-dripped="" data-is-dripped-by-date="" data-course-id="156515">

        <span class="section-lock">

          <i class="fa fa-lock"></i>&nbsp;

        </span>

        Module 3: On Page SEO Optimization

      </div>

      <ul class='section-list'>

        

        <li data-lecture-id="2346650" data-lecture-url='/courses/seo-mastery/lectures/2346650' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2346650'

            data-ss-event-type='link'

            data-ss-lecture-id='2346650'

            data-ss-position='3'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2346650'

            id='sidebar_link_2346650'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 12 - Introduction to On-Page SEO

                

                  (7:47)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="2346698" data-lecture-url='/courses/seo-mastery/lectures/2346698' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2346698'

            data-ss-event-type='link'

            data-ss-lecture-id='2346698'

            data-ss-position='3'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2346698'

            id='sidebar_link_2346698'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 13 - Page Load Speed

                

                  (5:30)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="2346707" data-lecture-url='/courses/seo-mastery/lectures/2346707' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2346707'

            data-ss-event-type='link'

            data-ss-lecture-id='2346707'

            data-ss-position='3'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2346707'

            id='sidebar_link_2346707'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 14 - Title, Meta Description & URL

                

                  (3:52)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="2346712" data-lecture-url='/courses/seo-mastery/lectures/2346712' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2346712'

            data-ss-event-type='link'

            data-ss-lecture-id='2346712'

            data-ss-position='3'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2346712'

            id='sidebar_link_2346712'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 15 - Ideal Content Length for Good SEO

                

                  (16:13)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="2349756" data-lecture-url='/courses/seo-mastery/lectures/2349756' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2349756'

            data-ss-event-type='link'

            data-ss-lecture-id='2349756'

            data-ss-position='3'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2349756'

            id='sidebar_link_2349756'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 16 - Search Engine & User Friendly Content

                

                  (7:35)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="2351464" data-lecture-url='/courses/seo-mastery/lectures/2351464' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2351464'

            data-ss-event-type='link'

            data-ss-lecture-id='2351464'

            data-ss-position='3'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2351464'

            id='sidebar_link_2351464'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 17 - LSI Keywords (Latent Semantic Index)

                

                  (2:32)

                

              </span>

            </div>

          </a>

        </li>

        

      </ul>

    </div>

    

    <div class='col-sm-12 course-section'>

      <div role="heading" aria-level="3" class='section-title' data-release-date="" data-days-until-dripped="" data-is-dripped-by-date="" data-course-id="156515">

        <span class="section-lock">

          <i class="fa fa-lock"></i>&nbsp;

        </span>

        Module 4: Off-page SEO

      </div>

      <ul class='section-list'>

        

        <li data-lecture-id="2351010" data-lecture-url='/courses/seo-mastery/lectures/2351010' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2351010'

            data-ss-event-type='link'

            data-ss-lecture-id='2351010'

            data-ss-position='4'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2351010'

            id='sidebar_link_2351010'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 18 - Understanding Off Page Optimization

                

                  (6:28)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="2351161" data-lecture-url='/courses/seo-mastery/lectures/2351161' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2351161'

            data-ss-event-type='link'

            data-ss-lecture-id='2351161'

            data-ss-position='4'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2351161'

            id='sidebar_link_2351161'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 19 - DoFollow and NoFollow Links

                

                  (3:19)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="2351162" data-lecture-url='/courses/seo-mastery/lectures/2351162' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2351162'

            data-ss-event-type='link'

            data-ss-lecture-id='2351162'

            data-ss-position='4'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2351162'

            id='sidebar_link_2351162'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 20 - High Quality Backlinks with Guest Posting

                

                  (3:11)

                

              </span>

            </div>

          </a>

        </li>

        

      </ul>

    </div>

    

    <div class='col-sm-12 course-section'>

      <div role="heading" aria-level="3" class='section-title' data-release-date="" data-days-until-dripped="" data-is-dripped-by-date="" data-course-id="156515">

        <span class="section-lock">

          <i class="fa fa-lock"></i>&nbsp;

        </span>

        Module 5: Using Advanced SEO Tools

      </div>

      <ul class='section-list'>

        

        <li data-lecture-id="2359041" data-lecture-url='/courses/seo-mastery/lectures/2359041' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2359041'

            data-ss-event-type='link'

            data-ss-lecture-id='2359041'

            data-ss-position='5'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2359041'

            id='sidebar_link_2359041'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 21 - How to Use Moz for SEO Analysis

                

                  (16:47)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="2374607" data-lecture-url='/courses/seo-mastery/lectures/2374607' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2374607'

            data-ss-event-type='link'

            data-ss-lecture-id='2374607'

            data-ss-position='5'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2374607'

            id='sidebar_link_2374607'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 22 - Complete Guide to Using SEMrush Tool

                

                  (21:26)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="2468250" data-lecture-url='/courses/seo-mastery/lectures/2468250' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2468250'

            data-ss-event-type='link'

            data-ss-lecture-id='2468250'

            data-ss-position='5'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2468250'

            id='sidebar_link_2468250'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 23 - Using Ahrefs.com to Get New Content Ideas

                

                  (13:50)

                

              </span>

            </div>

          </a>

        </li>

        

      </ul>

    </div>

    

    <div class='col-sm-12 course-section'>

      <div role="heading" aria-level="3" class='section-title' data-release-date="" data-days-until-dripped="" data-is-dripped-by-date="" data-course-id="156515">

        <span class="section-lock">

          <i class="fa fa-lock"></i>&nbsp;

        </span>

        Module 6 - Long Term SEO

      </div>

      <ul class='section-list'>

        

        <li data-lecture-id="2512392" data-lecture-url='/courses/seo-mastery/lectures/2512392' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2512392'

            data-ss-event-type='link'

            data-ss-lecture-id='2512392'

            data-ss-position='6'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2512392'

            id='sidebar_link_2512392'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 24 - How Branding Helps in SEO

                

                  (9:23)

                

              </span>

            </div>

          </a>

        </li>

        

      </ul>

    </div>

    

    <div class='col-sm-12 course-section'>

      <div role="heading" aria-level="3" class='section-title' data-release-date="" data-days-until-dripped="" data-is-dripped-by-date="" data-course-id="156515">

        <span class="section-lock">

          <i class="fa fa-lock"></i>&nbsp;

        </span>

        Module 7 - Monetizing Your SEO Skill

      </div>

      <ul class='section-list'>

        

        <li data-lecture-id="2571648" data-lecture-url='/courses/seo-mastery/lectures/2571648' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/2571648'

            data-ss-event-type='link'

            data-ss-lecture-id='2571648'

            data-ss-position='7'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/2571648'

            id='sidebar_link_2571648'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 25 - How to Sell SEO Services as an Agency

                

                  (24:30)

                

              </span>

            </div>

          </a>

        </li>

        

      </ul>

    </div>

    

    <div class='col-sm-12 course-section'>

      <div role="heading" aria-level="3" class='section-title' data-release-date="" data-days-until-dripped="" data-is-dripped-by-date="" data-course-id="156515">

        <span class="section-lock">

          <i class="fa fa-lock"></i>&nbsp;

        </span>

        Module 8 - Local SEO

      </div>

      <ul class='section-list'>

        

        <li data-lecture-id="3323076" data-lecture-url='/courses/seo-mastery/lectures/3323076' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/3323076'

            data-ss-event-type='link'

            data-ss-lecture-id='3323076'

            data-ss-position='8'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/3323076'

            id='sidebar_link_3323076'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 26 - How to Add a Listing on Google My Business

                

                  (20:35)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="3337050" data-lecture-url='/courses/seo-mastery/lectures/3337050' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/3337050'

            data-ss-event-type='link'

            data-ss-lecture-id='3337050'

            data-ss-position='8'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/3337050'

            id='sidebar_link_3337050'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 27 - How to Perform Local SEO

                

                  (54:23)

                

              </span>

            </div>

          </a>

        </li>

        

      </ul>

    </div>

    

    <div class='col-sm-12 course-section'>

      <div role="heading" aria-level="3" class='section-title' data-release-date="" data-days-until-dripped="" data-is-dripped-by-date="" data-course-id="156515">

        <span class="section-lock">

          <i class="fa fa-lock"></i>&nbsp;

        </span>

        Bonus Videos

      </div>

      <ul class='section-list'>

        

        <li data-lecture-id="3088726" data-lecture-url='/courses/seo-mastery/lectures/3088726' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/3088726'

            data-ss-event-type='link'

            data-ss-lecture-id='3088726'

            data-ss-position='9'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/3088726'

            id='sidebar_link_3088726'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Bonus Video: Scaling Search Traffic with Long Tail Keywords

                

                  (11:40)

                

              </span>

            </div>

          </a>

        </li>

        

      </ul>

    </div>

    

    <div class='col-sm-12 course-section'>

      <div role="heading" aria-level="3" class='section-title' data-release-date="" data-days-until-dripped="" data-is-dripped-by-date="" data-course-id="156515">

        <span class="section-lock">

          <i class="fa fa-lock"></i>&nbsp;

        </span>

        Module 9 - SEO Content and Backlinks

      </div>

      <ul class='section-list'>

        

        <li data-lecture-id="3369031" data-lecture-url='/courses/seo-mastery/lectures/3369031' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/3369031'

            data-ss-event-type='link'

            data-ss-lecture-id='3369031'

            data-ss-position='10'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/3369031'

            id='sidebar_link_3369031'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 28 - Content Writing for SEO

                

                  (52:32)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="3385617" data-lecture-url='/courses/seo-mastery/lectures/3385617' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/3385617'

            data-ss-event-type='link'

            data-ss-lecture-id='3385617'

            data-ss-position='10'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/3385617'

            id='sidebar_link_3385617'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 29 : Backlinks 101

                

                  (21:48)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="3477568" data-lecture-url='/courses/seo-mastery/lectures/3477568' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/3477568'

            data-ss-event-type='link'

            data-ss-lecture-id='3477568'

            data-ss-position='10'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/3477568'

            id='sidebar_link_3477568'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 30 - How to Build Backlinks

                

                  (33:30)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="3580178" data-lecture-url='/courses/seo-mastery/lectures/3580178' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/3580178'

            data-ss-event-type='link'

            data-ss-lecture-id='3580178'

            data-ss-position='10'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/3580178'

            id='sidebar_link_3580178'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 31 - How to Find Blogs for Building Backlinks

                

                  (24:10)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="3638278" data-lecture-url='/courses/seo-mastery/lectures/3638278' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/3638278'

            data-ss-event-type='link'

            data-ss-lecture-id='3638278'

            data-ss-position='10'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/3638278'

            id='sidebar_link_3638278'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 32 - How to Interlink for SEO benefits

                

                  (23:38)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="3678717" data-lecture-url='/courses/seo-mastery/lectures/3678717' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/3678717'

            data-ss-event-type='link'

            data-ss-lecture-id='3678717'

            data-ss-position='10'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/3678717'

            id='sidebar_link_3678717'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 33 - Link Velocity

                

                  (12:24)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="3887446" data-lecture-url='/courses/seo-mastery/lectures/3887446' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/3887446'

            data-ss-event-type='link'

            data-ss-lecture-id='3887446'

            data-ss-position='10'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/3887446'

            id='sidebar_link_3887446'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 34 - Part 1 - How to Perform a SEO Audit

                

                  (21:24)

                

              </span>

            </div>

          </a>

        </li>

        

        <li data-lecture-id="3945476" data-lecture-url='/courses/seo-mastery/lectures/3945476' class='section-item incomplete'>

          <a

            class='item'

            data-no-turbolink='true'

            data-ss-course-id='156515'

            data-ss-event-name='Lecture: Navigation Sidebar'

            data-ss-event-href='/courses/seo-mastery/lectures/3945476'

            data-ss-event-type='link'

            data-ss-lecture-id='3945476'

            data-ss-position='10'

            data-ss-school-id='115396'

            data-ss-user-id='4066098'

            href='/courses/seo-mastery/lectures/3945476'

            id='sidebar_link_3945476'

          >

            <span class='status-container'>

              <span class='status-icon'>

                &nbsp;

              </span>

            </span>

            <div class='title-container'>

              <span class='lecture-icon'>

                <i class='fa fa-play'></i>

              </span>

              <span class='lecture-name'>

                Lesson 35 - Part 2 - How to Perform an SEO Audit

                

                  (14:26)

                

              </span>

            </div>

          </a>

        </li>

        

      </ul>

    </div>

    

  </div>

</div>





    <!-- Lecture Content -->

<div role="main" class="course-mainbar lecture-content">

  <!-- Meta tag for tracking lecture progress -->

  

  <h2 id="lecture_heading" class="section-title"  style=" font-size: 1.5rem;">

    <i class="fa fa-file-text"></i>

    &nbsp;

    Lesson 28 - Content Writing for SEO

</h2>



  <!-- Attachment Blocks -->



  <div

    class='lecture-attachment lecture-attachment-type-html'

    id="lecture-attachment-6551901"

  >

    <div class="attachment-data"></div>

    

      <div class="attachment-data"></div>

<div class="lecture-text-container">

<p><p>In this video you will be learning about : <br>

</p>

<ol>

  <li>More advanced keyword research to choose the best topic for writing content.</li>

  <li>Competitor analysis/ landscape of a given keyword and how to choose the best content. </li>

  <li>How to actually write content around the chosen keyword. </li>

  <li>The right way to use your keywords in your content without going overboard.</li>

</ol></p>

</div>



    

  </div>



  <div

    class='lecture-attachment lecture-attachment-type-video'

    id="lecture-attachment-6550337"

  >

    <div class="attachment-data"></div>

    

      <!-- Attachment: Video -->



<div class="wistia_responsive_padding">

  <div class="wistia_responsive_wrapper">

    <div class='attachment-wistia-player stillSnap=false wistia_embed videoFoam=true' data-wistia-id='d4tpd2om96' id='wistia-d4tpd2om96'  data-attachment-id='6550337'></div>

  </div>

</div>





<!-- Video actions -->



<div class='video-options'>

    

    <a

      class='download'

      href='https://cdn.fs.teachablecdn.com/jiNzknfqSsqLgkB2Jwz1'

      target='_blank'

      rel='noopener'

      download

      data-x-origin-download

      data-x-origin-download-name='SEO Content SEP 11.mp4'

      aria-label="Download this video"

    >

      <div class='span glyphicon glyphicon-save'></div>

      Download

    </a>

</div>





    

  </div>



  <div

    class='lecture-attachment lecture-attachment-type-html'

    id="lecture-attachment-6551909"

  >

    <div class="attachment-data"></div>

    

      <div class="attachment-data"></div>

<div class="lecture-text-container">

<p><p>Again, this is a rather long video. Any feedback regarding this can be sent to <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d5a6b4bbbfb4ac95b1bcb2bca1b4b9b1b0b0a5b4befbb6bab8fb">[email&#160;protected]</a>

</p></p>

</div>



    

  </div>



  <div

    class='lecture-attachment lecture-attachment-type-native_comments'

    id="lecture-attachment-12239265"

  >

    <div class="attachment-data"></div>

    

  </div>





<!-- Comments -->



  <div class='lecture-attachment'>

    <div class="comments attachment-block-wrapper">

  <div role="heading" aria-level="3" class="attachment-block-label">

    Discussion

  </div>

  <div id="comments_settings" class="comments-settings hidden" data-thread-endpoint="/api/v1/comments/?commentable_type=Attachment&amp;commentable_id=12239265&amp;threaded=true" data-i18n="{&quot;post_title&quot;:&quot;Post a comment&quot;,&quot;post_placeholder&quot;:&quot;Leave a comment...&quot;,&quot;post_success&quot;:&quot;Your comment was posted.&quot;,&quot;post_moderation&quot;:&quot;Your comment was posted, but it needs to be approved by the school owner before it shows up.&quot;,&quot;post_fail&quot;:&quot;Sorry, your comment could not be posted at this time :(&quot;,&quot;post_comment&quot;:&quot;Post Comment&quot;,&quot;save_comment&quot;:&quot;Save Comment&quot;,&quot;view_comment&quot;:&quot;View comment&quot;,&quot;reply&quot;:&quot;Reply&quot;,&quot;ago&quot;:&quot;ago&quot;,&quot;now&quot;:&quot;now&quot;,&quot;instructor&quot;:&quot;Instructor&quot;,&quot;awaiting_review&quot;:&quot;Awaiting Review&quot;,&quot;comments&quot;:&quot;comments&quot;,&quot;notifications_participating_thread&quot;:&quot;Notify me when someone comments on a discussion I&#39;ve commented in.&quot;,&quot;notifications_responses&quot;:&quot;Notify me when someone responds to my comments.&quot;,&quot;notifications_author&quot;:&quot;Notify me when someone comments in one of my courses.&quot;,&quot;has_been_removed&quot;:&quot;This comment has been removed.&quot;,&quot;add_image&quot;:&quot;Add Image&quot;,&quot;view_thread&quot;:&quot;View the rest of this thread&quot;,&quot;approve&quot;:&quot;Approve&quot;,&quot;edit&quot;:&quot;Edit&quot;,&quot;delete&quot;:&quot;Delete&quot;,&quot;permalink&quot;:&quot;Link&quot;,&quot;load_more&quot;:&quot;Load more&quot;,&quot;add_text_error&quot;:&quot;Please add text to the comment.&quot;}" data-attachments-enabled="true" data-filepicker-key="ADNupMnWyR7kCWRvm76Laz"></div>

  

    <h4 class="comments__heading">Post a comment</h4>

    <div class="comments__wrapper">

      <div class="comments__block comments__block--indent-level-0 comments__block--student comments__block--new" id="new_comment_container">



  <div class="commenter-profile">

    <img class="gravatar" src="https://s.gravatar.com/avatar/e26339e83d833e01869c5957342d44f2?d=mm" alt="Vipin Kumar V">



    <label class="comments__block-box__meta-tag comments__block-box__meta-tag-instructor label label-default">

      Instructor

    </label>

  </div>



  <div class="comments__block-box new-comment-form">

    <div class="comment-arrow-border">

      <div class="comment-arrow"></div>

    </div>

    <div class="comments__block-box__meta">

      <div class="comments__block-box__meta-name">Vipin Kumar V</div>

      <div class="comments__block-box__meta-now">now</div>

    </div>

    <form action="/api/v1/comments" class="new-comment-form" method="post" target="_blank" rel="noopener" data-type="json" data-remote="true" id="new_comment_form" data-comment-handler="create_comment">

      <div class="alert alert-success comments__block-box__alert--posted" id="posted_msg">

        Your comment was posted.

      </div>

      <div class="alert alert-warning comments__block-box__alert--review" id="review_msg">

        <i class='fa fa-check'></i> Your comment was posted, but it needs to be approved by the school owner before it shows up.

      </div>

      <div class="alert alert-danger comments__block-box__alert--failed" id="failed_msg">

        Sorry, your comment could not be posted at this time :(

      </div>

      <div class="alert alert-danger text-error" id="text_error_alert" id="text_error_msg">

        Please add text to the comment.

      </div>

      <input type="hidden" name="comments[commentable_type]" value="Attachment">

      <input type="hidden" name="comments[commentable_id]" value="12239265">

      



      <div class="comment-editor" id="comment_editor">

        <textarea aria-label="Comment box" placeholder="Leave a comment..." name="comments[body]" id="comment_body"></textarea>

        <div class="new attachments-editor hidden" id="attachments_editor">

          <a href="#" class='add-attachment' id="add_attachment" data-comment-handler="add_image">

            <img src="https://fedora.teachablecdn.com/assets/icon-image-add-2bb59d5f21dbca28cca9cf9e6530fc84f468b86806ca92da9e2bdafa2aa398d0.svg" alt="Add Image">

          </a>

          <ul class="attachments" id="attachments" data-editable-attachments="true"></ul>

        </div>

      </div>

      <input class='btn btn-primary pull-right btn-md' id="submit_comment" type="submit" value="Post Comment">

    </form>

  </div>

</div>



    </div>

  



  <h4 class="comments__heading">

    <span id="comments_total">1</span> comments

  </h4>

  <div class="comments__wrapper" id="comments_wrapper">

    

  </div>



  <div class="comments__heading">

    <a class="comments-pagination-link hidden" id="comments_pagination" data-comment-handler="load_more">

      Load more

    </a>

  </div>



</div>





  </div>







<div id='empty_box'></div>

<!-- Scroll to current lecture link position in sidebar -->



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