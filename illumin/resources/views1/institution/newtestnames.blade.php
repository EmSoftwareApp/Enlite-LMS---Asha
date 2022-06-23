<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Test Names</title>

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

    <!-- Flatpickr -->
    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr.rtl.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr-airbnb.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr-airbnb.rtl.css') }}" rel="stylesheet">

    <!-- DateRangePicker -->
    <link type="text/css" href="{{ asset('assets/vendor/daterangepicker.css') }}" rel="stylesheet">

    <style type="text/css">
        .flatpickr-am-pm{
            display: none !important;
        }
    </style>
    
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
                            <h4 class="m-0">New Test Name</h4>

                            <a href="{{ url('/test-names') }}"><button type="button" class="btn btn-warning"><i class="fa fa-step-backward"></i>&nbsp;Back</button></a>
                        </div>
                    </div>

                    <div class="container-fluid page__container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                  <form action="{{ url('/post-test-name') }}" id="form_sample_1" method="post" enctype="multipart/form-data" >
                                  {{ csrf_field() }}
                                    <div class="card-form__body card-body">
                                        @if(count($errors)>0)
                                          @foreach($errors->all() as $error)
                                            <p class="alert alert-success">{{$error}}</p>
                                          @endforeach
                                        @endif
                                        <div class="form-group row">
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Course</label>
                                                <select class="form-control" name="course" id="course">
                                                    <option value="">Choose Course</option>
                                                    @foreach($course as $courses)
                                                     <option value="{{ $courses->id }}">{{ $courses->coursename }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <?php for($k=1; $k<=25; $k++) { ?>
                                        <div class="form-group row" id="chpater-row{{$k}}" @if($k != '1') style="display: none;" @endif>
                                            <div class="col-md-4 col-md">
                                                <label for="fname">Test Name</label>
                                                <input id="testname{{ $k }}" type="text" class="form-control" placeholder="Enter Test Name here" name="testname{{ $k }}">
                                            </div>
                                            <div class="col-md-4 col-md">
                                                <label for="fname">Short Name</label>
                                                <input id="testshortname{{ $k }}" type="text" class="form-control" placeholder="Enter Test Short Name here" name="testshortname{{ $k }}">
                                            </div>
                                            <div class="col-md-4 col-md">
                                                <label for="fname">Total Questions</label>
                                                <input id="totalquestions{{ $k }}" type="text" class="form-control" placeholder="Enter Total Questions here" name="totalquestions{{ $k }}" onKeyPress="return isNumberKey(event)">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-4 col-md">
                                                <label for="fname">Total Time</label>
                                                <input id="totaltime{{ $k }}" name="totaltime{{ $k }}" type="text" class="form-control" placeholder="Enter Total Time here" data-toggle="flatpickr" data-flatpickr-enable-time="true" data-flatpickr-no-calendar="true" data-flatpickr-alt-format="H:i" data-flatpickr-date-format="H:i" value="01:00">
                                            </div>
                                            <div class="col-md-4 col-md">
                                                <label for="fname">Total Marks</label>
                                                <input id="totalmarks{{ $k }}" name="totalmarks{{ $k }}" type="text" class="form-control" placeholder="Enter Total Marks " onKeyPress="return isNumberKey(event)">
                                            </div>
                                            <div class="col-md-2 col-md">
                                                <label for="fname">Negativeve Marks</label>
                                                <input id="negativemarks{{ $k }}" type="text" class="form-control" placeholder="Enter Negative Marks here" name="negativemarks{{ $k }}" onKeyPress="return isNumberKey1(event)">
                                            </div>
                                            <div class="col-md-2 col-md">
                                                <label for="fname">&nbsp;</label>
                                                <div class="clearfix"></div>
                                                @if($k != '25')
                                                <a class="btn btn-warning btn-sm" onClick="newrow({{$k}});" style=" color: #fff; ">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                @endif
                                                @if($k != '1')
                                                <a class="btn btn-danger btn-sm" onClick="removerow({{$k}});"  style=" color: #fff; ">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                        <?php } ?>
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

                                        <input type="submit" class="btn btn-success" value="Save Test Name"/>
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
                                                
            document.getElementById('testname'+x).value = '';
            document.getElementById('testshortname'+x).value = '';
            document.getElementById('totalquestions'+x).value = '';
            document.getElementById('totaltime'+x).value = '';
            document.getElementById('totalmarks'+x).value = '';
            document.getElementById('negativemarks'+x).value = '';
            $("#chpater-row"+rowcount).hide();
        }

        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
        function isNumberKey1(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
    </script>

    <!-- Flatpickr -->
    <script src="{{ asset('assets/vendor/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr.js') }}"></script>

    <!-- DateRangePicker -->
    <script src="{{ asset('assets/vendor/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/daterangepicker.js') }}"></script>

</body>

</html>