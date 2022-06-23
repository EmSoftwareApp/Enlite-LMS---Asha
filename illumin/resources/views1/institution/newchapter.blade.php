<!DOCTYPE html>

<html lang="en" dir="ltr">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Chapter Management</title>



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





    <!-- Dropzone -->

    <link type="text/css" href="{{ asset('assets/css/vendor-dropzone.css') }}" rel="stylesheet">

    <link type="text/css" href="{{ asset('assets/css/vendor-dropzone.rtl.css') }}" rel="stylesheet">



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

                            <h4 class="m-0">New Chapter</h4>



                            <a href="{{ url('/chapter-management') }}"><button type="button" class="btn btn-warning"><i class="fa fa-step-backward"></i>&nbsp;Back</button></a>

                        </div>

                    </div>



                    <div class="container-fluid page__container">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="card">

                                  <form action="{{ url('/post-chapter') }}" id="form_sample_1" method="post" enctype="multipart/form-data" >

                                  {{ csrf_field() }}

                                    <div class="card-form__body card-body">

                                        @if(count($errors)>0)

                                          @foreach($errors->all() as $error)

                                            <p class="alert alert-success">{{$error}}</p>

                                          @endforeach

                                        @endif

                                        <?php for($k=1; $k<=25; $k++) { ?>

                                        <div class="form-group row" id="chpater-row{{$k}}" @if($k != '1') style="display: none;" @endif>

                                            <div class="col-md-3 col-lg">

                                                <label for="fname">Course</label>

                                                <select class="form-control" name="course{{ $k }}" id="course{{ $k }}" onchange="ajxclevel2find(this.value, {{ $k }});">

                                                    <option value="">Choose Course</option>

                                                    @foreach($course as $courses)

                                                     <option value="{{ $courses->id }}">{{ $courses->coursename }}</option>

                                                    @endforeach

                                                </select>

                                            </div>

                                            <div class="col-md-3 col-lg">

                                                <label for="fname">Topic</label>

                                                <select class="form-control" name="topic{{ $k }}" id="topic{{ $k }}">

                                                    <option value="">Choose Topic</option>

                                                </select>

                                            </div>

                                            <div class="col-md-4 col-lg">

                                                <label for="fname">Chapter Name</label>

                                                <input id="chaptername{{ $k }}" type="text" class="form-control" placeholder="Enter Chapter Name here" name="chaptername{{ $k }}" value="">

                                            </div>

                                            <div class="col-md-2 col-lg">

                                                <label for="fname">&nbsp;</label>

                                                <div class="clearfix"></div>

                                                @if($k != '25')

                                                <a class="btn btn-warning" onclick="newrow({{$k}});" style=" color: #fff; ">

                                                    <i class="fa fa-plus"></i>

                                                </a>

                                                @endif

                                                @if($k != '1')

                                                <a class="btn btn-danger" onclick="removerow({{$k}});"  style=" color: #fff; ">

                                                    <i class="fa fa-trash-alt"></i>

                                                </a>

                                                @endif

                                            </div>

                                            

                                        </div>

                                    <?php } ?>



                                        <!--<div class="form-group row">

                                            <div class="col-md-12 col-lg">

                                                <label for="fname">Description (If any)</label>

                                                <textarea class="form-control" placeholder="Enter Description here" name="description"></textarea>



                                            </div>

                                        </div>-->

                                        <input type="hidden" name="tot" id="tot" value="1">

                                        <input type="hidden" name="created" value="<?php echo date('Y-m-d'); ?>">

                                        <input type="hidden" name="year" value="<?php echo date('Y'); ?>">



                                        <input type="hidden" name="instid" value="{{ Auth::user()->instid }}">

                                        

                                        <!-- Added & Updated by starts here -->

                                        

                                        <input type="hidden" name="addedby" value="{{ Auth::user()->id }}">

                                        <input type="hidden" name="updatedby" value="">

                                        <input type="hidden" name="updatedon" value="">

                                    </div>

                                    <div class="card-body text-center">



                                        <input type="submit" class="btn btn-success" value="Save Chapter"/>

                                    </div>

                                  </form>

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





    <!-- Dropzone -->

    <script src="{{ asset('assets/vendor/dropzone.min.js') }}"></script>

    <script src="{{ asset('assets/js/dropzone.js') }}"></script>

    <script type="text/javascript">

        function ajxclevel2find(x, y)

          {

              var id_country = x;

              var token = $("input[name='_token']").val();



              $.ajax({

                  url: "<?php echo route('select-state-level') ?>",

                  method: 'POST',

                  data: {id_country:id_country, _token:token},

                  success: function(data) {

                    

                    //$("select[name='topic'").html('');

                    //$("select[name='topic'").html(data.options);

                    $("#topic"+y).html('');

                    $("#topic"+y).html(data.options);

                  }

              });

          }

        function newrow(x)

        {

            var val = 1;

            var tot = $('#tot').val();



            var rowcount = parseInt(x) + parseInt(val);

            var total = parseInt(tot) + parseInt(val);



            document.getElementById('tot').value = total;

            $("#chpater-row"+rowcount).show();

        }

        function removerow(x)

        {

            var rowcount = x;

            var val = 1;

            var tot = $('#tot').val();



            var total = parseInt(tot) - parseInt(val);

            document.getElementById('tot').value = total;

                                                

            document.getElementById('chaptername'+x).value = '';

            document.getElementById('topic'+x).value = '';

            document.getElementById('course'+x).value = '';

            $("#chpater-row"+rowcount).hide();

        }

    </script>

</body>



</html>