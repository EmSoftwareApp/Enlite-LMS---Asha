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
@foreach($test as $tests)
@endforeach

<?php 
    $timw = $tests->totaltime; 
    $var = explode(":",$timw);
    $t1 = $var[0];
    $t2 = $var[1];
    $t3 = $var[2];

    function ConvertHours($n) 
    { 
        $minutes = $n * 60; 
        $seconds = $n * 3600; 
      
        return $minutes; 
    } 
    
    $hourstomin = ConvertHours($t1);
    $totalminutes = $hourstomin + $t2;
?>
<?php $total_qts = $tests->totalquestions; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Test</title>

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

    <!-- CSS for timer starts here -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.countdownTimer.css') }}" />

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
                    <div>
                        <h6 class="m-lg-0">{{ $tests->testname }}</h6>
                        <!--<div class="d-inline-flex align-items-center">
                            <i class="material-icons icon-16pt mr-1 text-muted">school</i> <a href="#" class="text-muted">Getting Started with InVision</a>
                        </div>-->

                    </div>
                    
                    <!--<a href="" class="btn btn-success ml-lg-3 mt-3 mt-lg-0">Back to Course <i class="material-icons">arrow_forward</i></a>-->
                </div>
            </div>

            <div class="container page__container">
                <form action="{{ url('/post-test') }}" id="form_sample_1" method="post" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                <div class="row">
                    
                        @foreach($data as $object)
                        <div class="col-md-8 test-all" id="qtn-cls{{ $i }}" style=" display: none;">
                            <div class="card">
                                <div class="card-header">
                                    <div class="media align-items-center">
                                        <div class="media-left">
                                            <h4 class="m-0 text-primary mr-2"><strong>{{ $i }}</strong></h4>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="card-title m-0">
                                                {{ strip_tags(App\Models\tblBasicSettings::qustionfind($object->question_no, 'question')) }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input id="customCheck01_{{ $i }}" type="radio" name="option{{ $i }}" onclick="assignval({{ $i }})" style=" float: left;" value="answer_a"><span style=" float: left; padding-left: 10px;">{!! App\Models\tblBasicSettings::qustionfind($object->question_no, 'answer_a') !!}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input id="customCheck04_{{ $i }}" type="radio" name="option{{ $i }}" onclick="assignval({{ $i }})" style=" float: left;" value="answer_b"><span style=" float: left; padding-left: 10px;">{!! App\Models\tblBasicSettings::qustionfind($object->question_no, 'answer_b') !!}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input id="customCheck03_{{ $i }}" type="radio" name="option{{ $i }}" onclick="assignval({{ $i }})" style=" float: left;" value="answer_c"><span style=" float: left; padding-left: 10px;">{!! App\Models\tblBasicSettings::qustionfind($object->question_no, 'answer_c') !!}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input id="customCheck04_{{ $i }}" type="radio" name="option{{ $i }}" onclick="assignval({{ $i }})" style=" float: left;" value="answer_d"><span style=" float: left; padding-left: 10px;">{!! App\Models\tblBasicSettings::qustionfind($object->question_no, 'answer_d') !!}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-light" onclick="skip();">Skip</a>
                                    @if($i != $total_qts)
                                    <a class="btn btn-success float-right" onclick="nextqtn();" style="color: #fff;">Next <i class="material-icons btn__icon--right">arrow_forward</i></a>
                                    @endif
                                </div>
                                <input type="hidden" value="{{ $object->question_no }}" name="question_no{{ $i }}">
                                <input type="hidden" value="0" id="dummyval{{ $i }}">
                                <input type="hidden" value="{{strip_tags(App\Models\tblBasicSettings::qustionfind($object->question_no, 'correct_answer'))}}" name="correctanswer{{ $i }}">
                            </div>
                        </div>
                        <?php $i++; ?>
                        
                        @endforeach

                        <input type="hidden" value="1" id="question_count">
                        <input type="hidden" value="{{ $total_qts }}" name="totalquestions">
                        <input type="hidden" value="{{ $pgmid }}" name="pgmid">
                        <input type="hidden" value="{{ $tests->id }}" name="testno">
                        <input type="hidden" value="{{ $tests->negativemarks }}" name="negativemarks">
                        <input type="hidden" value="{{ $userid }}" name="userid">
                        <input type="hidden" value="<?php echo date('Y'); ?>" name="year">
                        <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="date">
                    
                    <div class="col-md-4 ">

                        <div class="list-group">
                            <span id="hm_timer" style=" margin-bottom: 10px;"></span>
                            
                            <a  class="list-group-item">
                                <span class="media align-items-center">
                                    <span class="media-left mr-2">
                                        <?php for($t=1; $t<=$total_qts; $t++) { ?>
                                        <span class="btn btn-light btn-sm" id="countbox{{ $t }}" onclick="countfn({{ $t }})">{{ $t }}</span>
                                        <?php } ?>
                                    </span>
                                    
                                </span>
                            </a>
                            <p>&nbsp;</p>
                            <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modal-warning">Submit</button>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
</form>
            </div>

            @include('includes/sitefooter')
        </div>
        <!-- // END Header Layout Content -->

        <!-- Warning Alert Modal -->
    <div id="modal-warning" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <i class="material-icons icon-40pt text-warning mb-2">warning</i>
                    <h4>Warning!</h4>
                    <p class="mt-3">Are you sure to submit?</p>
                    <button type="button" class="btn btn-warning my-2" onclick="testsubmit();">Continue</button>
                </div> <!-- // END .modal-body -->
            </div> <!-- // END .modal-content -->
        </div> <!-- // END .modal-dialog -->
    </div> <!-- // END .modal -->

    </div>
    <!-- // END Header Layout -->
    
    <!-- jQuery -->
    <script src="{{ asset('assets/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-2.0.3.js') }}"></script>
    <!-- jquery timer -->
    <script src="{{ asset('assets/vendor/jquery.countdownTimer.js') }}"></script>
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
    <script>
        
        // Load first and hide remwining

        $( document ).ready(function() {
            var question_count = $('#question_count').val();
            $("#qtn-cls"+question_count).css("display", "block");
        });

        // for manage next button
        function nextqtn()
        {
            var question_count = $('#question_count').val();
            var dummyval = $('#dummyval'+question_count).val();;
            //alert(elements);

            if(dummyval == 0) 
            {
                alert('Please choose an option');
            }
            else
            {
                var next_count = parseInt(question_count) + parseInt(1);
                document.getElementById('question_count').value = next_count;
                $(".test-all").css("display", "none");
                $("#qtn-cls"+next_count).css("display", "block");
                $('#countbox'+question_count).css('background-color', '#17b15c');
                $('#countbox'+question_count).css('color', '#fff'); 
            }
            
        }

        // Skip 

        function skip()
        {
            var question_count = $('#question_count').val();
            var next_count = parseInt(question_count) + parseInt(1);
            document.getElementById('question_count').value = next_count;
            $(".test-all").css("display", "none");
            $("#qtn-cls"+next_count).css("display", "block");
            $('#countbox'+question_count).css('background-color', '#ff0000'); 
            $('#countbox'+question_count).css('color', '#fff'); 
        }

        // For right side count
        function countfn(x)
        {
            document.getElementById('question_count').value = x;
            $(".test-all").css("display", "none");
            $("#qtn-cls"+x).css("display", "block");
        }

        // Assign value
        function assignval(x)
        {
            document.getElementById('dummyval'+x).value = 1;
        }

        // For form submit

        function testsubmit()
        {
            $("#form_sample_1").submit();
        }
        setTimeout(function(){ $('#form_sample_1').submit() }, 60000 * {{$totalminutes}});
    </script>
    <script>
    $(function(){
            $('#hm_timer').countdowntimer({
                hours : {{ $t1 }},
                minutes : {{ $t2 }},
                size : "xs"
            });

        });
        </script>
</body>

</html>
@endif