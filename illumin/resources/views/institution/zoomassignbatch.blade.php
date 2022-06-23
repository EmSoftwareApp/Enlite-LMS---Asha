<?php 

	$ser_year = Request::segment(3);

    $batch = Request::segment(2);

	$i =1; 

    $cur_url = URL::to('/');



    $batchname = App\Models\tblBasicSettings::batchfind($batch);

    $year = date('Y');

    $instid = Auth::user()->instid;

  

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Faculty Batch Allocation</title>



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



<body class="layout-default" onLoad="myFunction()">

    <div id="loading"></div>







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

                            <h4 class="m-0">Zoom Meetings of Batch - {{ $batchname }}</h4>



                            <a href="{{ url('/new-student') }}">

                                <!--<button type="button" class="btn btn-primary btn-sm">New Course</button>

                                <button type="button" class="btn btn-warning">

                                    <i class="fa fa-user-graduate"></i> New Student

                                </button>-->

                                 <a href="{{ url('/faculty-batch') }}"><button type="button" class="btn btn-warning"><i class="fa fa-step-backward"></i>&nbsp;Back</button></a>

                            </a>

                        </div>

                    </div>






                    <div class="container-fluid page__container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                  <form action="{{ url('/post-batch') }}" id="form_sample_1" method="post" enctype="multipart/form-data" >
                                  {{ csrf_field() }}
                                    <div class="card-form__body card-body">
                                        @if(count($errors)>0)
                                          @foreach($errors->all() as $error)
                                            <p class="alert alert-success">{{$error}}</p>
                                          @endforeach
                                        @endif
                                        <div class="form-group row">
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Topic Name</label>
                                                <input type="text" class="form-control" name="topic_name" required="">
                                                    
                                            </div>
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Duration*</label>
                                                <select class="form-control" name="acdyear" required="">
                                                    <option value="">Hours</option>
                                                    <?php $i=1;
                                                    for($i;$i<=5;$i++)
                                                    {
                                                    ?>
                                                     <option value="{{$i}}">{{ $i }}</option>
                                                   <?php } ?>
                                                </select>
                                                <select class="form-control" name="acdyear" required="">
                                                    <option value="">Minutes</option>
                                                    @foreach($acyr as $acyrs)
                                                    <?php 
                                                        $given = $acyrs->acdyear;
                                                        $str = explode(" to ",$given);
                                                        $date1 = $str[0];
                                                        $date2 = $str[1];
                                                    ?>
                                                     <option value="{{ $acyrs->id }}">{{ Carbon\Carbon::parse($date1)->format('j F Y') }} - {{ Carbon\Carbon::parse($date2)->format('j F Y') }}</option>
                                                    @endforeach
                                                </select>                                            </div>
                                            
                                            
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Meeting Date</label>
                                                <input id="" type="text" name="batchstart" class="form-control"  placeholder="Enter Batch Start Date here" data-toggle="flatpickr" value="">
                                            </div>
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Duration*</label>
                                                <select class="form-control" name="acdyear" required="">
                                                    <option value="">Hours</option>
                                                    <?php $i=1;
                                                    for($i;$i<=5;$i++) {?>
                                                    
                                                     <option value="{{ $i }}">{{$i}}</option>
                                                   <?php } ?>
                                                </select>
                                                <select class="form-control" name="acdyear" required="">
                                                    <option value="">Minutes</option>
                                                    @foreach($acyr as $acyrs)
                                                    <?php 
                                                        $given = $acyrs->acdyear;
                                                        $str = explode(" to ",$given);
                                                        $date1 = $str[0];
                                                        $date2 = $str[1];
                                                    ?>
                                                     <option value="{{ $acyrs->id }}">{{ Carbon\Carbon::parse($date1)->format('j F Y') }} - {{ Carbon\Carbon::parse($date2)->format('j F Y') }}</option>
                                                    @endforeach
                                                </select>                                            </div>
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Meeting ID*</label>
                                                <input id="fname" type="text" class="form-control" placeholder="Enter Max No of Students here" name="noofstudents" onkeypress="return isNumberKey(event)" maxlength="4" required="">
                                            </div>
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Passcode*</label>
                                                <input id="fname" type="text" class="form-control" placeholder="Enter Max No of Students here" name="noofstudents" onkeypress="return isNumberKey(event)" maxlength="4" required="">
                                            </div>
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Invite Link*</label>
                                                <input id="fname" type="text" class="form-control" placeholder="Enter Max No of Students here" name="noofstudents" onkeypress="return isNumberKey(event)" maxlength="4" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-lg">
                                                <label for="fname">  Description</label>
                                                <textarea class="form-control" placeholder="Enter Batch Description here" name="description" rows="5" cols="80" ></textarea>

                                            </div>
                                        </div>
                                        <div class="clearfix"></div>

                                        <input type="hidden" name="created" value="<?php echo date('Y-m-d'); ?>">
                                        <input type="hidden" name="year" value="<?php echo date('Y'); ?>">

                                        <input type="hidden" name="instid" value="{{ Auth::user()->instid }}">
                                        
                                        <!-- Added & Updated by starts here -->
                                        
                                        <input type="hidden" name="addedby" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="updatedby" value="">
                                        <input type="hidden" name="updatedon" value="">
                                    </div>
                                    <div class="card-body text-center">

                                        <input type="submit" class="btn btn-success" value="Save Batch"/>
                                    </div>
                                  </form>
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

                                        	<div class="row">

                                            <div class="col">

                                                <div class="form-group">

                                                    <label for="fname">Batch</label>

                                                    <input type="text" class="form-control" value="{{ $batchname }}" readonly="" />

                                                </div>

                                            </div>

                                            <div class="col">

                                                

                                                <input type="hidden" name="cur_url" id="cur_url" value="{{ $cur_url }}">

                                                <input type="hidden" name="batch" id="batch" value="{{ $batch }}">

                                                <?php

                                                    $batchstart = App\Models\tblStudentBatchAssign::batchdatefind($batch, 'batchstart');

                                                    $batchend = App\Models\tblStudentBatchAssign::batchdatefind($batch, 'batchend');

                                                ?>

                                                                

                                                <input type="hidden" id="fr" value="{{ $batchstart }}">

                                                <input type="hidden" id="to" value="{{ $batchend }}">

                                            </div>

                                            

                                            <div class="col">

                                                <div class="form-group">

                                                    

                                                </div>

                                            </div>

                                            <div class="col">

                                                <div class="form-group">

                                                    

                                                </div>

                                            </div>

                                            

                                        </div>

                                            <section>

                                                <table id="example" class="display" style="width:100%">

                                                    <thead>

                                                        <tr>

                                                            <th style="width: 5%;">No</th>

                                                            <th style="width: 20%;">First Name</th>

                                                            <th style="width: 20%;">Last Name</th>

                                                            <th style="width: 20%;">Email</th>

                                                            <th style="width: 20%;">Mobile</th>
                                                            <th style="width: 20%;">Qualification</th>

                                                            <th style="width: 5%;">Add</th>

                                                            

                                                           

                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                        @foreach($data as $object)

                                                        

                                                        <tr>

                                                            <td align="center">{{ $i }}</td>

                                                            <td>

                                                                <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name" style=" color: #202fe8; font-weight: bold;">{{ $object->fname }}</span>

                                                                    </div>

                                                                </div>

                                                            </td>

                                                            

                                                            <td>

                                                                <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name">{{ $object->lname }}</span>

                                                                    </div>

                                                                </div>

                                                            </td>
                                                            <td>

                                                                <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name"><a href="mailto:{{ $object->email }}" style="text-decoration: none;"> {{ $object->email }}</a></span>

                                                                    </div>

                                                                </div>

                                                            </td>

                                                           <td>

                                                                <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name"><a href="tel:{{ $object->email }}" style="text-decoration: none;">{{ $object->mobile }}</a></span>

                                                                    </div>

                                                                </div>

                                                            </td>
                                                             <td >

                                                               <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name">{{ $object->qualif }}</span>

                                                                    </div>

                                                                </div>

                                                            </td>

                                                            {{ csrf_field() }}

                                                            <td>

                                                                <?php 

                                                                $val2 = App\Models\tblFacultyBatchAssign::FacultyBatchCount($batch, $object->id); 

                                                                ?>

                                                                

                                                                <div class="custom-control custom-checkbox">

                                                                    <input type="checkbox" class="" style=" margin-top: 5px;" id="myCheck{{$i}}" onChange="assign({{ $i }} ,{{ $batch }}, {{ $object->id }}, {{ $instid }})" @if($val2 > 0) checked="checked" @endif  data-toggle="tooltip" title="Add/Remove from here">

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

      'lengthChange': true,

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

    function assign(x, batch, user, instid) {

                                        

        // Get the checkbox

        var checkBox = document.getElementById("myCheck"+x);

        var token = $("input[name='_token']").val();

        var batchstart = document.getElementById("fr").value;

        var batchend = document.getElementById("to").value;

            

        // If the checkbox is checked, display the output text

        if (checkBox.checked == true){

                $.ajax({



                    url: "<?php echo route('faculty-batch_assign') ?>",

                    method: 'POST',

                    data: {batch:batch, user:user, instid:instid, batchstart:batchstart, batchend:batchend, _token:token},

                    success: function(data) {

                        //alert(data);

                    }

                });

        } else {

            

                $.ajax({



                    url: "<?php echo route('faculty-batch_ressign') ?>",

                    method: 'POST',

                    data: {batch:batch, user:user, instid:instid, batchstart:batchstart, batchend:batchend, _token:token},

                    success: function(data) {

                        //alert(data);

                    }

                });

        }

    }



    // year searc Start here



    function yearselect()

    {

    	var x = $("#year").val();

        var cur_url = $("#cur_url").val();

        var batch = $("#batch").val();



    	if(x != '')

    	{

    		//window.location.href="/student-details-find/"+x;

            window.location.href=cur_url+'/student-assign-batch-find/'+batch+'/'+x;

    	}

    }

</script>



<script>

        // $(document).ready(function(){

            //  $('div#loading').removeAttr('id');

        // });

        var preloader = document.getElementById("loading");

        // window.addEventListener('load', function(){

        //  preloader.style.display = 'none';

        //  })



        function myFunction(){

            preloader.style.display = 'none';

        };

    </script>

</body>



</html>