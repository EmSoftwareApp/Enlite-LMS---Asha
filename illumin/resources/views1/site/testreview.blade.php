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
  
  $i = 1;
  $k = 1;
  
?>
@foreach($test as $tests)
@endforeach

<?php 
    $timw = $tests->totaltime; 
    $var = explode(":",$timw);
    $t1 = $var[0];
    $t2 = $var[1];
    $t3 = $var[2];
?>
<?php $total_qts = $tests->totalquestions; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Test Review</title>

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


    <!-- Dragula -->
    <link type="text/css" href="{{ asset('assets/vendor/dragula/dragula.min.css') }}" rel="stylesheet">


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
                <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                    <h4 class="m-lg-0">{{ $tests->testname }} - Test Review</h4>
                    <a href="{{ url('/test-courses') }}" class="btn btn-success ml-lg-3">Back to Course <i class="material-icons">arrow_forward</i></a>
                </div>
            </div>





            <div class="container page__container">


                <div id="questions_wrapper">
                    @foreach($data as $object)
                    <?php 
                        $correct = App\Models\tblBasicSettings::qustionfind($object->question_no, 'correct_answer'); 
                        $myanswer = App\Models\tblBasicSettings::myanswer($pgmtime, $object->question_no);
                        $explanation = App\Models\tblBasicSettings::qustionfind($object->question_no, 'explanation'); 
                    ?>
                    <div class="card mb-4" data-position="1" data-question-id="1">
                        <div class="card-header d-flex justify-content-between">
                            <div class="d-flex align-items-center ">
                                <div class="h6 m-0 ml-4">{{ $i }}: {{ strip_tags(App\Models\tblBasicSettings::qustionfind($object->question_no, 'question')) }}</div>
                            </div>
                            
                        </div>
                        <div class="card-body">

                            <div id="answerWrapper_1" class="mb-4">
                                <div class="row mb-1">
                                    <div class="col"><strong></strong></div>
                                    <div class="col text-right"><strong>&nbsp;</strong></div>
                                </div>

                                <form action="#">
                                    <ul class="list-group" id="answer_container_1">
                                        <li class="list-group-item d-flex" data-position="1" data-answer-id="1" data-question-id="1" @if($correct == 'answer_a') style="background-color: #a6cc5d; color: #fff; " @endif @if(($myanswer == 'answer_a') && ($myanswer != $correct)) style="background-color: #ff0000; color: #fff; " @endif>
                                            <span class="mr-2">A)</span>
                                            <div>
                                                {{ strip_tags(App\Models\tblBasicSettings::qustionfind($object->question_no, 'answer_a')) }}
                                            </div>
                                            <div class="ml-auto">
                                                @if(($myanswer == 'answer_a') && ($myanswer == $correct))
                                                <i class="fa fa-check" style="color: #fff;"></i>
                                                @endif
                                                <!--<input type="radio" name="" id="correct_answer_1" @if($correct == 'answer_a') checked @else disabled="" @endif>-->
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex" data-position="2" data-answer-id="2" data-question-id="1" @if($correct == 'answer_b') style="background-color: #a6cc5d; color: #fff; " @endif @if(($myanswer == 'answer_b') && ($myanswer != $correct)) style="background-color: #ff0000; color: #fff; " @endif>
                                            <span class="mr-2">B)</span>
                                            <div>
                                                {{ strip_tags(App\Models\tblBasicSettings::qustionfind($object->question_no, 'answer_b')) }}
                                            </div>
                                            <div class="ml-auto">
                                                @if(($myanswer == 'answer_b') && ($myanswer == $correct))
                                                <i class="fa fa-check" style="color: #fff;"></i>
                                                @endif
                                                <!--<input type="radio" name="" id="correct_answer_2" @if($correct == 'answer_b') checked @else disabled="" @endif>-->
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex" data-position="3" data-answer-id="3" data-question-id="1" @if($correct == 'answer_c') style="background-color: #a6cc5d; color: #fff; " @endif @if(($myanswer == 'answer_c') && ($myanswer != $correct)) style="background-color: #ff0000; color: #fff; " @endif>
                                            <span class="mr-2">C)</span>
                                            <div>
                                                {{ strip_tags(App\Models\tblBasicSettings::qustionfind($object->question_no, 'answer_c')) }}
                                            </div>
                                            <div class="ml-auto">
                                                @if(($myanswer == 'answer_c') && ($myanswer == $correct))
                                                <i class="fa fa-check" style="color: #fff;"></i>
                                                @endif
                                                <!--<input type="radio" name="" id="correct_answer_3" @if($correct == 'answer_c') checked @else disabled="" @endif>-->
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex" data-position="3" data-answer-id="3" data-question-id="1" @if($correct == 'answer_d') style="background-color: #a6cc5d; color: #fff; " @endif @if(($myanswer == 'answer_d') && ($myanswer != $correct)) style="background-color: #ff0000; color: #fff; " @endif>
                                            <span class="mr-2">D)</span>
                                            <div>
                                                {{ strip_tags(App\Models\tblBasicSettings::qustionfind($object->question_no, 'answer_d')) }}
                                            </div>
                                            <div class="ml-auto">
                                                @if(($myanswer == 'answer_d') && ($myanswer == $correct))
                                                <i class="fa fa-check" style="color: #fff;"></i>
                                                @endif
                                                <!--<input type="radio" name="" id="correct_answer_4" @if($correct == 'answer_d') checked @else disabled="" @endif>-->
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                            @if($explanation != '')
                            <div class="d-flex align-items-center ">
                                <div class="h6 m-0 ml-4">Explanation</div>
                            </div>
                            <div class="d-flex align-items-center ">
                                <label class="m-0 ml-4">{{ $explanation }}</label>
                            </div>
                            @endif
                        </div>
                        <div class="card-header d-flex justify-content-between">
                            
                            
                        </div>
                    </div>
                    <?php $i++; ?>
                    @endforeach

                </div>
                <div class="col-md-12" style=" text-align: center; margin-bottom: 10px;">
                    <div class="form-group mb-0">
                        
                        <a href="{{ url('/test-courses') }}"><button class="btn btn-success">Back to Course</button></a>
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


    <!-- Dragula -->
    <script src="{{ asset('assets/vendor/dragula/dragula.min.js') }}"></script>
    <script src="{{ asset('assets/js/dragula.js') }}"></script>




    <script>
        drake = dragula([document.getElementById('questions_wrapper')], {
            moves: function(el, container, handle) {
                return handle.classList.contains('question_handle') || handle.parentNode.classList.contains('question_handle');
            }
        });
        drake.on('drop', function(el, target, source, sibling) {
            console.log($(el).data('position'));
            // $.ajax({
            //   method: "POST",
            //   url: '/admin/courses/[course_id]/questions/sort',
            //   data: {
            //     el: $(el).data('position'),
            //     sibling: $(sibling).data('position')
            //   }
            // })
            // .done(function( msg ) {
            //   console.log('works');
            // });
        });

        var containers = [
            document.getElementById('answer_container_1'),
            document.getElementById('answer_container_2'),
            document.getElementById('answer_container_3')
        ]
        var drake_answers = dragula(containers);
        drake_answers.on('drop', function(el, target, source, sibling) {

            // $.ajax({
            //   method: "POST",
            //   url: '/admin/courses/[course_id]]/questions/answers/sort',
            //   data: {
            //     el: $(el).data('position'),
            //     sibling: $(sibling).data('position'),
            //     question_id: $(el).data('question-id')
            //   }
            // })
            // .done(function( msg ) {
            //   // update/flush position after success

            // });
        });
    </script>

</body>

</html>
@endif