<?php 

    $i =1;

    $videoid = Request::segment(2);

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
{{ App\Models\


<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Program Management</title>



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



    <link rel="stylesheet" type="text/css" href="{{ asset('assets/media/css/jquery.dataTables.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/resources/syntax/shCore.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/resources/demo.css') }}">

    <style type="text/css">

        .modal-backdrop {

            position: initial !important;

        }

    </style>

</head>

{{ App\Models\

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

                            <h4 class="m-0">Video Program Management</h4>



                            <a href="{{ url('/video-management') }}"><button type="button" class="btn btn-warning"><i class="fa fa-step-backward"></i>&nbsp;Back</button></a>

                        </div>

                    </div>



                    <div class="container-fluid page__container">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="card">
{{ App\Models\
                                  <form action="{{ url('/post-assignprogram') }}" id="form_sample_1" method="post" enctype="multipart/form-data" >

                                  {{ csrf_field() }}

                                    <div class="card-form__body card-body">

                                        @if(count($errors)>0)

                                          @foreach($errors->all() as $error)

                                            <p class="alert alert-success">{{$error}}</p>

                                          @endforeach

                                        @endif

                                        <h6>Assign Program</h6>

                                        <hr>

                                        <div class="form-group row">

                                            <div class="col-md-6 col-lg">

                                                <label for="fname">Video Caption</label>

                                                <input type="text" class="form-control" name="videocaption" value="{{ App\Models\tblBasicSettings::videofind($videoid, 'videocaption') }}" readonly="">



                                            </div>

                                            <div class="col-md-4 col-lg">

                                                <label for="fname">Program</label>

                                                <select class="form-control" name="programid" required="">

                                                    <option value="">Choose Program</option>

                                                    @foreach($program as $programs)

                                                    <option value="{{ $programs->id }}">{{ $programs->programname }}</option>

                                                    @endforeach

                                                </select>



                                            </div>

                                            

                                            <input type="hidden" name="created" value="<?php echo date('Y-m-d'); ?>">

                                            <input type="hidden" name="year" value="<?php echo date('Y'); ?>">



                                            <input type="hidden" name="instid" value="{{ Auth::user()->instid }}">

                                            <input type="hidden" name="type" value="video">

                                            <input type="hidden" name="prid" value="{{ $videoid }}">



                                            <div class="col-md-2 col-lg pull-right">

                                                <label for="fname">&nbsp;</label>

                                                <div class="clearfix"></div>

                                                <input type="submit" class="btn btn-success" value="Assign Program"/>



                                            </div>

                                        </div>

                                        

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

                                        <div class="container">

                                            <p>&nbsp;</p>

                                            <h6>Assigned Programs</h6>

                                            <hr>

                                            <section>

                                                <table id="example" class="display" style="width:100%">

                                                    <thead>

                                                        <tr>

                                                            <th style="width: 5%;">No</th>

                                                            <th style="width: 35%;">Program</th>

                                                            <th style="width: 5%;">Publish</th>

                                                            <th style="width: 5%; text-align: center;">Action</th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                        @foreach($data as $object)

                                                        

                                                        <tr>

                                                            <td align="center">{{ $i }}</td>

                                                            <td>

                                                                <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name">{{ App\Models\tblBasicSettings::programfind($object->programid) }}</span>

                                                                    </div>

                                                                </div>

                                                            </td>

                                                            <td>

                                                                <div class="custom-control custom-checkbox">

                                                                    <input type="checkbox" class="" style=" margin-top: 5px;" id="myCheck{{$i}}" onchange="myFunction({{ $i }}, {{ $object->id }})" @if($object->status == '1') checked="checked" @endif>

                                                                </div>

                                                            </td>

                                                            {{ csrf_field() }}

                                                            <td align="center">

                                                                <a href="{{ url('video-program-remove/'.$object->id) }}" class="text-muted" onclick="return confirm('Are you sure to Delete??');">

                                                                    <i class="fa fa-trash-alt"></i>

                                                                </a>

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

      'paging'      : false,

      'lengthChange': false,

      'searching'   : false,

      'ordering'    : true,

      'info'        : false,

      'autoWidth'   : true

    })

  })

</script>

<script>

    function myFunction(x, y) {

                                          

        // Get the checkbox

        var checkBox = document.getElementById("myCheck"+x);

        var db_id = y;

        var token = $("input[name='_token']").val();

                                          

        // If the checkbox is checked, display the output text

        if (checkBox.checked == true){

            if(db_id != '')

            {

                //alert('true');

                $.ajax({



                    url: "<?php echo route('video-program-approve') ?>",

                    method: 'POST',

                    data: {db_id:db_id,  _token:token},

                    success: function(data) {

                        //alert(data);

                    }

                });

            }

        } else {

            if(db_id != '')

            {

                //alert(db_id);

                $.ajax({



                    url: "<?php echo route('video-program-reject') ?>",

                    method: 'POST',

                    data: {db_id:db_id,  _token:token},

                    success: function(data) {

                        //alert(data);

                    }

                });

            }

        }

    }

</script>

</body>



</html>