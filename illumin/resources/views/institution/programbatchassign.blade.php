<?php
    $ser_year = Request::segment(3);
    $pgmid = Request::segment(2);
    $i =1; 
    $cur_url = URL::to('/');

    $year = date('Y');
    $instid = Auth::user()->instid;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Student Batch Management</title>

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
                            <h4 class="m-0">Program Assign to Batch</h4>

                           <a href="{{ url('/program-management') }}"><button type="button" class="btn btn-warning"><i class="fa fa-step-backward"></i>&nbsp;Back</button></a>
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
                                            <div class="row">
                                               
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="fname">Program Name</label>
                                                        <input type="text" name="" class="form-control" value="{{ App\Models\tblBasicSettings::programfind($pgmid) }}" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="fname">Academic Year</label>
                                                        <select class="form-control" id="year" onchange="yearselect();">
                                                            
                                                            @foreach($acdyear as $acdyears)
                                                            <option value="{{ $acdyears->id }}" @if($acdyears->id == $ser_year) selected="selected" @endif>
                                                            <?php 
                                                                $given1 =  $acdyears->acdyear;
                                                                $str1 = explode(" to ",$given1);
                                                                $date11 = $str1[0];
                                                                $date21 = $str1[1];
                                                            ?>
                                                             {{ Carbon\Carbon::parse($date11)->format('j F Y') }} - {{ Carbon\Carbon::parse($date21)->format('j F Y') }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="cur_url" id="cur_url" value="{{ $cur_url }}">
                                                    <input type="hidden" name="pgmid" id="pgmid" value="{{ $pgmid }}">
                                                </div>
                                                <div class="col text-right">
                                                    <div class="form-group">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <section>
                                                <table id="example" class="display" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 5%;">No</th>
                                                            <th style="width: 25%;">Batch Name</th>
                                                            <th style="width: 25%;">Academic Year</th>
                                                            <th style="width: 15%;">Start</th>
                                                            <th style="width: 15%;">End</th>
                                                            <th style="width: 5%;">Max</th>
                                                            <!--<th style="width: 5%;">Publish</th>-->
                                                            <th style="width: 10%; text-align: center;">Assign</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($data as $object)
                                                        
                                                        <tr>
                                                            <td align="center">{{ $i }}</td>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-body">
                                                                        <span class="js-lists-values-employee-name">{{ $object->batchname }}</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <?php 
                                                                $given =  App\Models\tblBatch::acdyearfind($object->acdyear);
                                                                $str = explode(" to ",$given);
                                                                $date1 = $str[0];
                                                                $date2 = $str[1];
                                                            ?>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-body">
                                                                        <span class="js-lists-values-employee-name">{{ Carbon\Carbon::parse($date1)->format('j F Y') }} - {{ Carbon\Carbon::parse($date2)->format('j F Y') }}</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-body">
                                                                        <span class="js-lists-values-employee-name">
                                                                            @if($object->batchstart != '')
                                                                                {{ Carbon\Carbon::parse($object->batchstart)->format('j F Y') }}
                                                                            @endif
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-body">
                                                                        <span class="js-lists-values-employee-name">
                                                                            @if($object->batchend != '')
                                                                                {{ Carbon\Carbon::parse($object->batchend)->format('j F Y') }}
                                                                            @endif
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td align="center">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body">
                                                                        <span class="js-lists-values-employee-name">{{ $object->noofstudents }}</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            {{ csrf_field() }}
                                                            <!--<td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="" style=" margin-top: 5px;" id="myCheck{{$i}}" onchange="myFunction({{ $i }}, {{ $object->id }})" @if($object->status == '1') checked="checked" @endif>
                                                                    
                                                                </div>
                                                            </td>-->
                                                            <td align="center">
                                                                <?php $val2 = App\Models\tblProgramBatchAssign::ProgramBatchCount($pgmid, $object->id); ?>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="" style=" margin-top: 5px;" id="myCheck{{$i}}" onchange="myFunction({{ $i }} ,{{ $pgmid }}, {{ $object->id }}, {{ $year }}, {{ $instid }})" @if($val2 > 0) checked="checked" @endif>
                                                                </div>
                                                            </td>
                                                            
                                                        </tr>
                                                        <?php $i++; ?>
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
    function yearselect()
    {
        var x = $("#year").val();
        var cur_url = $("#cur_url").val();
        var pgmid = $("#pgmid").val();

        if(x != '')
        {
            //window.location.href="/student-details-find/"+x;
            window.location.href=cur_url+'/program-batch-assign-find/'+pgmid+'/'+x;
        }
    }
</script>
<script>
    function myFunction(x, pgmid, batch, year, instid) {
                                          
        // Get the checkbox
        var checkBox = document.getElementById("myCheck"+x);
        var token = $("input[name='_token']").val();
                                          
        // If the checkbox is checked, display the output text
        if (checkBox.checked == true){
                $.ajax({

                    url: "<?php echo route('program-batch-assign-ajx') ?>",
                    method: 'POST',
                    data: {batch:batch, pgmid:pgmid, year:year, instid:instid, _token:token},
                    success: function(data) {
                        //alert(data);
                    }
                });
        } else {
           
                $.ajax({

                    url: "<?php echo route('program-batch-ressign-ajx') ?>",
                    method: 'POST',
                    data: {batch:batch, pgmid:pgmid, year:year, instid:instid, _token:token},
                    success: function(data) {
                        //alert(data);
                    }
                });
        }
    }
</script>
</body>

</html>