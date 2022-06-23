<?php $i =1; ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | News Management</title>



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

                            <h4 class="m-0">News Management</h4>



                            <a href="{{ url('/new-news') }}">

                                <!--<button type="button" class="btn btn-primary btn-sm">New Course</button>-->

                                <button type="button" class="btn btn-warning">

                                    <i class="fa fa-paper-plane"></i> New News<i class="fal fa-comment-alt-edit"></i>

                                </button>

                            </a>

                        </div>

                    </div>









                    <div class="container-fluid page__container">

                        <div class="card card-form">

                            <div class="row no-gutters">

                                <div class="col-lg-12 card-form__body">

                                    <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>

                                        

                                                <p class="alert alert-success"></p>

                                              

                                        



                                        <div class="container">

                                            <section>

                                                <table id="example" class="display" style="width:100%">

                                                    <thead>

                                                        <tr>

                                                            <th style="width: 5%;">No</th>

                                                            <th style="width: 25%;">Category</th>

                                                            <th style="width: 25%;">Title</th>

                                                           

                                                            <th style="width: 50%;">News</th>

                                                            <th style="width: 20%;">Publishing Date</th>

                                                            <th style="width: 25%;">Image</th>

                                                            <th style="width: 15%;">Publish</th>
                                                            <th style="width: 5%;">Popular News</th> 

                                                            <th style="width: 10%; text-align: center;">Action</th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                       

                                                         @foreach($news as $data) 



                                                         





                                                        <tr>

                                                            <td align="center">{{ $i}}</td>

                                                            <td>

                                                                <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name">{{ $data->category }}</span>

                                                                    </div>

                                                                </div>

                                                            </td>

                                                            <td>

                                                                <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name">{{ $data->title }}</span>

                                                                    </div>

                                                                </div>

                                                            </td>

                                                           

                                                            <td>

                                                                <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        

                                                                        

                                                                        <span class="js-lists-values-employee-name">

                                                                            

                                                                            

                                                                            <?php

                                                                            

                                                                            $string = strip_tags($data->description );

if (strlen($string) > 50) {



    // truncate string

    $stringCut = substr($string, 0, 50);

    $endPoint = strrpos($stringCut, ' ');



    //if the string doesn't contain any space then it will cut without word basis.

    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);

    $string .= '... ';

}

echo $string;

                           

                           ?>                                                 

                                                              <a href="" data-toggle="tooltip" title="{{ strip_tags( $data->description) }} ">Read More</a>    

                                                                            

                                                                            

                                                                            

                                                                            

                                                                            

                                                                           </span>

                                                                    </div>

                                                                </div>

                                                            </td>

                                                            

                                                            

                                                              <td>

                                                                <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name">

                                                                            {{ date('d-m-Y', strtotime($data->pdate)) }}  

                                                                            

                                                                        </span>

                                                                    </div>

                                                                </div>

                                                            </td>

                                                            

                                                            

                                                            

                                                            <td> 

                                                                <!--{{ $data->tumbimage }}-->

                                                                <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name"><img src="/../{{ $data->tumbimage }}" width="50px" height="50px"></span>

                                                                    </div>

                                                                </div>

                                                            </td>

                                                            <td>

                                                                

                                                                 <div class="custom-control custom-checkbox">

                                                                    <input type="checkbox" class="" style=" margin-top: 5px;" id="myCheck{{$i}}" onChange="myFunction({{ $i }}, {{ $data->id }})" @if($data->status == '1') checked="checked" @endif>

                                                                    

                                                                </div>

                                                            

                                                            </td>



                                                           {{ csrf_field() }}
 <td>

                                                                <div class="custom-control custom-checkbox">

                                                                    <input type="checkbox" class="" style=" margin-top: 5px;" id="myChecki{{$i}}" onChange="popularevents({{ $i }}, {{ $data->id }})" @if($data->popularstatus == '1') checked="checked" @endif>

                                                                    

                                                                </div>

                                                            </td>
                                                            <td align="center">

                                                                <a href="{{ url('update-news/'.$data->id) }}" class="text-muted">

                                                                    <i class="fa fa-edit"></i>

                                                                </a>

                                                                <a href="{{ url('news-remove/'.$data->id) }}" class="text-muted" onClick="return confirm('Are you sure to Delete??');">

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



                    url: "<?php echo route('news-approve') ?>",

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



                    url: "<?php echo route('news-reject') ?>",

                    method: 'POST',

                    data: {db_id:db_id,  _token:token},

                    success: function(data) {

                        //alert(data);

                    }

                });

            }

        }

    }
	 function popularevents(x, y) {

                                          

                                          // Get the checkbox

                                          var checkBox = document.getElementById("myChecki"+x);

                                          var db_id = y;

                                       

                                          var token = $("input[name='_token']").val();

                                                                            

                                          // If the checkbox is checked, display the output text

                                          if (checkBox.checked == true){

                                              if(db_id != '')

                                              {

                                                  $.ajax({

                                  

                                                      url: "<?php echo route('popular-bapprove') ?>",

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

                                  

                                                      url: "<?php echo route('popular-breject') ?>",

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



<script>

$(document).ready(function(){

  $('[data-toggle="tooltip"]').tooltip();   

});

</script>

</body>



</html>