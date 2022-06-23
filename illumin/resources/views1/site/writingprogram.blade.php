<?php $i =1; ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Writing Program Question PDF List</title>



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

                            <h4 class="m-0">Writing Program Question PDF List</h4>



                            <a href="{{ url('/new-wprogram-question') }}">

                                <!--<button type="button" class="btn btn-primary btn-sm">New Program</button>-->

                                <button type="button" class="btn btn-warning">

                                    <i class="fa fa-paper-plane"></i> Upload New Question Paper

                                </button>

                            </a>

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

                                                            <th style="width: 30%;">Title</th>
<th style="width: 20%;">Course</th>
                                                            <th style="width: 20%;">Subject</th>

                                                            <th style="width: 10%;">Publish Date</th>
                                                            <th style="width: 5%;">Publish</th>

                                                            

                                                            <th style="width: 5%; text-align: center;">Action</th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                        @foreach($data as $object)

                                                        {{ csrf_field() }}

                                                        <tr>

                                                            <td align="center">{{ $i }}</td>

                                                            <td>

                                                                <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name" style=" color: #202fe8; font-weight: bold;">{{ $object->title }}</span>

                                                                    </div>

                                                                </div>

                                                            </td>
<td>

                                                                <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name">{{ App\Models\tblBasicSettings::programfind($object->course) }}</span>

                                                                    </div>

                                                                </div>

                                                            </td>
                                                            

                                                            <td>

                                                                <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name">{{ App\Models\tblBasicSettings::subjectfind($object->subject) }}</span>

                                                                    </div>

                                                                </div>

                                                            </td>

                                                            

                                                            

                                                            

                                                            



                                                            <td>

                                                                <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name" style=" color: #202fe8; font-weight: bold;">{{ $object->dop }}</span>

                                                                    </div>

                                                                </div>

                                                            </td>

                                                           
                                                            

                                                            <td>

                                                                <div class="custom-control custom-checkbox">

                                                                    <input type="checkbox" class="" style=" margin-top: 5px;" id="myCheck{{$i}}" onChange="myFunction({{ $i }}, {{ $object->id }})" @if($object->status == '1') checked="checked" @endif>

                                                                    

                                                                </div>

                                                            </td>

                                                            {{ csrf_field() }}

                                                            

                                                            <td align="center">

                                                                <a href="{{ url('view-wprogram/'.$object->id) }}" class="text-muted">

                                                                    <i class="fa fa-edit"></i>

                                                                </a>

                                                                <a href="{{ url('wprogram-remove/'.$object->id) }}" class="text-muted" onClick="return confirm('Are you sure to Delete??');">

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

    function myFunction(x, y) {

                                          

        // Get the checkbox

        var checkBox = document.getElementById("myCheck"+x);

        var db_id = y;

        var token = $("input[name='_token']").val();

                                          

        // If the checkbox is checked, display the output text

        if (checkBox.checked == true){

            if(db_id != '')

            {

                $.ajax({



                    url: "<?php echo route('program-approve') ?>",

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

                $.ajax({



                    url: "<?php echo route('program-reject') ?>",

                    method: 'POST',

                    data: {db_id:db_id,  _token:token},

                    success: function(data) {

                        //alert(data);

                    }

                });

            }

        }

    }



    // Featured settings Starts here



    function feaFunction(x, y) {

                                          

        // Get the checkbox

        var checkBox = document.getElementById("feaCheck"+x);

        var db_id = y;

        var token = $("input[name='_token']").val();

                                          

        // If the checkbox is checked, display the output text

        if (checkBox.checked == true){

            if(db_id != '')

            {

                $.ajax({



                    url: "<?php echo route('feat-pgm-approve') ?>",

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

                $.ajax({



                    url: "<?php echo route('feat-pgm-reject') ?>",

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