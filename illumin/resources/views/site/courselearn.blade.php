@foreach($data as $object)

@endforeach

<?php

  $userid = Auth::user()->id;

  $pgmtime = Request::segment(2);

  $pgmid = App\tblProgram::programfinder($pgmtime, 'regtime', 'id');

  $i = 1;

  $videoid = Request::segment(4);

  $cururl = URL::to('/');

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

        <label for="toggle_html5" onClick="">HTML5</label>

        <input id="toggle_flash" name="custom-toggle-player" type="radio">

        <label for="toggle_flash" onClick="">Flash</label>

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

@foreach($pgm as $pgms)

   @endforeach 

    <div role="navigation" class='course-sidebar lecture-page collapse navbar-collapse navbar-sidebar-collapse' id='courseSidebar'>

  <h2>{{ $pgms->programname }}</h2>

  <!-- Course Progress -->

  

  <div class='course-progress lecture-page is-at-top'>

    <div class='progressbar'>

      <div class='progressbar-fill' style='min-width: 100%;'></div>

    </div>

    <!--<div class='small course-progress-percentage'>

      <span class='percentage'>

        83%

      </span>

      COMPLETE

    </div>-->

  </div>

  

  <!-- Lecture list on courses page (enrolled user) -->



  <div class='row lecture-sidebar'>



    <!-- Hidden variable for storing url data --> 

    <input type="hidden" name="" id="urlval" value="{{ URL::to('/') }}">



    @foreach($cour as $cours)

    <div class='col-sm-12 course-section'>

      <div role="heading" aria-level="3" class='section-title'>

        <span class="section-lock">

          <i class="fa fa-lock"></i>&nbsp;

        </span>

        Topic {{ $i }}: {{ $cours->topicname }}

      </div>

      <ul class='section-list'>

        <?php
		
//do something with object $data


          $agents1 = DB::table('tbl_videos')->where(['topic' => $cours->id])->get(); 

          foreach ($agents1 as $agent1) { 
		  


        ?>

        <li data-lecture-id="" class='section-item incomplete @if($videoid == $agent1->regtime) next-lecture @endif'>

          <a class='item' onClick="retredirect({{ $pgmtime }}, {{ $agent1->regtime }});" style=" cursor: pointer;;">

            <!--<a class='item' onclick="retredirect({{ $pgmtime}});" href="{{ url('/learn/'.$pgmtime.'/lectures/'.$agent1->regtime) }}">-->

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

                {{ App\Models\tblBasicSettings::chapterfind( $agent1->chapter ) }} - {{ $agent1->videocaption }}

                ({{ $agent1->duration_min }}:{{ $agent1->duration_sec }})

                

              </span>

            </div>

          </a>

        </li>

        

        <?php } ?>

        

      </ul>

    </div>

    <?php $i++; ?>

    @endforeach

  </div>

</div>



  

    <!-- Lecture Content -->

<div role="main" class="course-mainbar lecture-content">

  <!-- Meta tag for tracking lecture progress -->

  

  <h2 id="lecture_heading" class="section-title"  style=" font-size: 1.5rem;">

    <i class="fa fa-file-text"></i>

    &nbsp;

    {{ App\Models\tblBasicSettings::chapterfind( $object->chapter ) }} - {{ $object->videocaption }}

</h2>



  <!-- Attachment Blocks -->



  <div

    class='lecture-attachment lecture-attachment-type-html'

    id="lecture-attachment-6551901"

  >

    <div class="attachment-data"></div>

    

      



    

  </div>



  <div

    class='lecture-attachment lecture-attachment-type-video'

    id="lecture-attachment-6550337"

  >

    <div class="attachment-data"></div>

    

      <!-- Attachment: Video -->



<div class="wistia_responsive_padding">

  <div class="wistia_responsive_wrapper">

    <?php

      $url = $object->url;

      $path = substr(parse_url($url, PHP_URL_PATH), 1);

      /*preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);

      $id = $matches[1];*/

      $width = '100%';

      $height = '350px';

    ?>

   

   <!-- <iframe id="ytplayer" type="text/html" src="https://player.vimeo.com/video/{{ $path }}" width="<?php echo $width ?>" height="<?php echo $height ?>" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>-->

   

   <iframe id="ytplayer" type="text/html" src="https://www.youtube.com/embed/{{ $path }}" width="<?php echo $width ?>" height="<?php echo $height ?>" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>

    

    <!--<iframe width="560" height="315" src="https://www.youtube.com/embed/MG7qcHOXbZ0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->

  </div>

</div>





<!-- Video actions -->



<div class='video-options'>

  @if($object->downloads != '')

    <a class='download' href='{{ $object->downloads }}' target='_blank'>

      <div class='span glyphicon glyphicon-save'></div>

      Downloads

    </a>

  @endif 

  @if($object->uploads != '') 

    <a class='download' href="{{ url('/'.$object->uploads) }}" target='_blank'>

      <div class='span glyphicon glyphicon-save'></div>

      Study Materials

    </a>

  @endif

</div>





    <div class="attachment-data"></div>

    <div class="lecture-text-container">

      <p>{!! $object->description !!}</p>

    </div>

  </div>



  <!--<div

    class='lecture-attachment lecture-attachment-type-html'

    id="lecture-attachment-6551909"

  >

    <div class="attachment-data"></div>

    

      <div class="attachment-data"></div>

<div class="lecture-text-container">

<p><p>Again, this is a rather long video. Any feedback regarding this can be sent to <a href="" class="__cf_email__" data-cfemail="">[email&#160;protected]</a>

</p></p>

</div>



    

  </div>-->



  <!--<div

    class='lecture-attachment lecture-attachment-type-native_comments'

    id="lecture-attachment-12239265"

  >

    <div class="attachment-data"></div>

    

  </div>-->





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

      <div class="comments__block-box__meta-name">{{ Auth::user()->name }}</div>

      <div class="comments__block-box__meta-now">now</div>

    </div>

    <form action="{{url('/post-comment')}}" class="new-comment-form" method="post" id="new_comment_form">
     {{ csrf_field() }}

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

      <input type="hidden" name="video_id" value="{{ $videoid }}">

      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

       <input type="hidden" name="course_id" value="{{ $object->program }}">



      <div class="comment-editor" id="comment_editor">

        <textarea aria-label="Comment box" placeholder="Leave a comment..." name="comments" id="comment_body"></textarea>

        <div class="new attachments-editor hidden" id="attachments_editor">

          <a href="#" class='add-attachment' id="add_attachment" data-comment-handler="add_image">

            <img src="https://fedora.teachablecdn.com/assets/icon-image-add-2bb59d5f21dbca28cca9cf9e6530fc84f468b86806ca92da9e2bdafa2aa398d0.svg" alt="Add Image">

          </a>

          <ul class="attachments" id="attachments" data-editable-attachments="true"></ul>

        </div>

      </div>

      <input class='btn btn-primary pull-right btn-md' id="submit_comment1" type="submit" value="Post Comment">

    </form>

  </div>

</div>



    </div>

  



  <h4 class="comments__heading">

    <span id="comments_total">{{@count($comments)}}</span> comments

  </h4>

  <div class="comments__wrapper" id="comments_wrapper">
<ul>
    @foreach($comments as $comment)
    <!--{{$comment->comments}}-->
    
    <li style="list-style-type: none;">
		 		
		 		<!-- current #{user} avatar -->
			 	<div class="user_avatar">
                <?php $pic = Auth::user()->image; ?>

                                    @if($pic == '')
<img src="{{ asset('assets/images/avatar/avatar5.png') }}">
                                    <!--<img src="{{ asset('assets/images/avatar/avatar5.png') }}" class="rounded-circle" width="32" alt="Frontted">-->

                                    @else
<img src="<?php echo asset($pic); ?>">
                                    <!--<img src="<?php echo asset($pic); ?>" class="rounded-circle" width="30" height="30" alt="Frontted">-->

                                    @endif
			 		
			 	</div><!-- the comment body --><div class="comment_body">
			 		<p></p><div class="replied_to"><p><span class="user">{{$comment->name}}:</span>{{$comment->comments}}
			 	</div>

			 	<!-- comments toolbar -->
			 	<div class="comment_toolbar">
 
			 		<!-- inc. date and time -->
			 		<div class="comment_details">
			 			<ul>
			 				<!--<li><i class="fa fa-clock-o"></i> 14:52</li>-->
			 				<li><i class="fa fa-calendar"></i> {{$comment->created_at}}</li>
			 				<li><i class="fa fa-pencil"></i> <span class="user">{{$comment->name}}</span></li>
			 			</ul>
			 		</div><!-- inc. share/reply and love -->

			 	</div>


		 	</li>
            @endforeach
</ul>
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

    <script type="text/javascript">

      function retredirect(x, y)

      {

        var url = $('#urlval').val();

        window.location.href=url+"/learn/"+x+"/lectures/"+y;

      }

    </script>
<style>
.user_avatar {
    width: 65px;
    height: 65px;
    display: inline-block;
    vertical-align: middle;
}
.user_avatar img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
}
.comment_body {
    display: inline-block;
    vertical-align: middle;
    width: calc(100% - 75px);
    min-height: 65px;
    margin-left: 10px;
    padding: 5px 10px;
    font-size: .9rem;
    color: #555;
    background-color: #FFF;
    border-bottom: 2px solid #f2f2f2;
}
.comment_body p,.replied_to p{
    font-size: .9rem!important;
    color: #555!important;
}
.comment_toolbar {
    width: 100%;
}
.comment_toolbar .comment_details {
    display: inline-block;
    vertical-align: middle;
    width: 70%;
    text-align: left;
}
.comment_toolbar ul {
    list-style-type: none;
    padding-left: 75px;
    font-size: 0;
}
.comment_toolbar ul li {
    display: inline-block;
    padding: 5px;
    font-size: .7rem;
   /* color: #d9d9d9;*/
}
.comment_body span {
    color: #6495ED;
    margin-right: 2px;
}
.comment_body .replied_to p {
    padding: 5px;
}
</style>
</body>



</html>