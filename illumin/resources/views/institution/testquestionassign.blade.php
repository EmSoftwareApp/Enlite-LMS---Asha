<?php 
    $i =1; 
    $testno = Request::segment(2);
    $instid = Auth::user()->instid;
    $prgm = Request::segment(3);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Assign Test Questions</title>

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

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/media/css/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/resources/syntax/shCore.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/resources/demo.css') }}">

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
                        <div class="page__heading d-flex align-items-center justify-content-between">
                            <h4 class="m-0">Assign Test Questions for {{ App\Models\tblBasicSettings::testfind($testno) }}</h4>

                            <a href="{{ url('/questions-assigned/'.$testno) }}"><button type="button" class="btn btn-warning"><i class="fa fa-step-backward"></i>&nbsp;Back</button></a>
                        </div>
                    </div>

                    <div class="container-fluid page__container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-form__body card-body">
                                        
                                        <div class="form-group row">
                                            <div class="col-lg-4 col-lg">
                                                <label for="fname">Program</label>
                                                <select id="program" class="form-control" name="program" onchange="pgmchoose(this.value, {{ $testno }})">
                                                    <option value="">Choose Program</option>
                                                    @foreach($pgm as $pgms)
                                                     <option value="{{ $pgms->id }}" @if($pgms->id == $prgm) selected @endif>{{ $pgms->programname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                            <div class="col-lg-4 col-lg">
                                               
                                            </div>
                                            
                                            <div class="col-lg-4 col-lg">
                                                
                                            </div>
                                        </div>
                                        
                                       
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    </div>


                    <div class="container-fluid page__container">
                        <div class="card card-form">
                            <div class="row no-gutters">
                                <div class="col-lg-12 card-form__body">
                                    <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                                        @if(count($errors)>0)
                                              @foreach($errors->all() as $error)
                                                <p class="alert alert-success">{{$error}}</p>
                                              @endforeach
                                            @endif
                                        

                                        <div class="container">
                                            <section>
                                                <table id="example" class="display" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 5%;">No</th>
                                                            <th style="width: 30%;">Question</th>
                                                            <th style="width: 25%;">Course</th>
                                                            <th style="width: 25%;">Chapter</th>
                                                            <th style="width: 5%; text-align: center;">
                                                                Assign 
                                                                @if($prgm != '')
                                                                <a href="{{ url('assign-all-questions/'.$testno.'/'.$prgm) }}" class="text-muted" onclick="return confirm('Are you sure?')">
                                                                    <i class="fa fa-check-square"></i>
                                                                </a>
                                                                @endif
                                                            </th>
                                                            <th style="width: 5%;">Assigned</th>
                                                            <th style="width: 5%; text-align: center;">Details</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach($data as $object)
                                                        <?php
                                                       /* $entry = DB::table('tbl_test_assigned_questions')->where(['question_no' => $object->id, 'instid' => $instid])->get(); 
        
                                                        if(count($entry) == 0)
                                                        {*/
                                                        ?>
                                                        <tr>
                                                            <td align="center">{{ $i }}</td>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-body">
                                                                        <span class="js-lists-values-employee-name">{!! $object->question !!}</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-body">
                                                                        <span class="js-lists-values-employee-name">{{ App\Models\tblBasicSettings::coursefind($object->course) }}</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                           <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-body">
                                                                        <span class="js-lists-values-employee-name">{{ App\Models\tblBasicSettings::chapterfind($object->chapter) }}</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            {{ csrf_field() }}
                                                            <td>
                                                                <?php $qstasin = App\Models\tblBasicSettings::qstfind($object->id, $testno, $instid); ?>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="" style=" margin-top: 5px;" id="myCheck{{$i}}" onchange="myFunction({{ $i }}, {{ $object->id }}, {{ $testno }}, {{ $instid }})" @if($qstasin > '0') checked="checked" @endif>
                                                                    
                                                                </div>
                                                            </td>
                                                            <td align="center">
                                                                <a data-toggle="tooltip" title="{{ 'App\Models\tblBasicSettings::assignedqts($object->id)' }}"><i class="fa fa-eye"></i>
                                                                </a>
                                                            </td>
                                                            <td align="center">
                                                                <a href="{{ url('view-assign-questions/'.$object->id) }}" class="text-muted" target="_blank">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>

                                                            </td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                    <?php //} ?>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </section>
                                        </div>
                                    </div>
                                    

                                </div>
                            </div>
                        </div>

                       
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


    <!-- List.js -->
    <script src="{{ asset('assets/vendor/list.min.js') }}"></script>
    <script src="{{ asset('assets/js/list.js') }}"></script>

    <!--Date table files Starts here -->
    <script type="text/javascript" language="javascript" src="{{ asset('assets/media/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('assets/resources/syntax/shCore.js') }}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('assets/resources/demo.js') }}"></script>
    <script type="text/javascript" language="javascript" class="init">
    
    </script>
    <script>
  $(function () {
    $('#example1').DataTable()
    $('#example').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
  $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();   
        });
</script>
<script>
    function myFunction(x, y, testno, instid) {
                                          
        // Get the checkbox
        var checkBox = document.getElementById("myCheck"+x);
        var qtsNo = y;
        var token = $("input[name='_token']").val();
                                          
        // If the checkbox is checked, display the output text
        if (checkBox.checked == true){
            if(qtsNo != '')
            {
                $.ajax({

                    url: "<?php echo route('question-test-assign') ?>",
                    method: 'POST',
                    data: {qtsNo:qtsNo, testno:testno, instid:instid, _token:token},
                    success: function(data) {
                        //alert(data);
                    }
                });
            }
        } else {
            if(qtsNo != '')
            {
                $.ajax({

                    url: "<?php echo route('question-test-reject') ?>",
                    method: 'POST',
                    data: {qtsNo:qtsNo, testno:testno, instid:instid, _token:token},
                    success: function(data) {
                        //alert(data);
                    }
                });
            }
        }
    }

    function topicfind(x)
    {
        var course = $('#course').val();

        if((x != '') && (course != ''))
        {
            window.location.href='';
        }
    }

    function pgmchoose(x, y)
    {
        if(x != '')
        {
            window.location.href = "{{URL::to('find-question-assign')}}/"+y+"/"+x;
        }
    }
</script>
</body>

</html>