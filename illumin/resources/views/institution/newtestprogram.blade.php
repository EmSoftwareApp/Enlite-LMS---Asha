<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Test Program Management</title>

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


    <!-- Flatpickr -->
    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr.rtl.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr-airbnb.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr-airbnb.rtl.css') }}" rel="stylesheet">

    <!-- Quill Theme -->
    <link type="text/css" href="{{ asset('assets/css/vendor-quill.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-quill.rtl.css') }}" rel="stylesheet">

    <!-- Dropzone -->
    <link type="text/css" href="{{ asset('assets/css/vendor-dropzone.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-dropzone.rtl.css') }}" rel="stylesheet">

    <!-- Select2 -->
    <link type="text/css" href="{{ asset('assets/css/vendor-select2.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-select2.rtl.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/vendor/select2/select2.min.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

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
                            <h4 class="m-0">New Test Program</h4>

                            <a href="{{ url('/test-programs') }}"><button type="button" class="btn btn-warning"><i class="fa fa-step-backward"></i>&nbsp;Back</button></a>
                        </div>
                    </div>

                    <div class="container-fluid page__container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                  <form action="{{ url('/post-test-program') }}" id="form_sample_1" method="post" enctype="multipart/form-data" >
                                  {{ csrf_field() }}
                                    <div class="card-form__body card-body">
                                        @if(count($errors)>0)
                                          @foreach($errors->all() as $error)
                                            <p class="alert alert-success">{{$error}}</p>
                                          @endforeach
                                        @endif
                                        <h6>Basic Details</h6>
                                        <hr>
                                        <div class="form-group row">
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Course</label>
                                                <select class="form-control" name="course" required="">
                                                    <option value="">Choose Course</option>
                                                    @foreach($course as $courses)
                                                     <option value="{{ $courses->id }}">{{ $courses->coursename }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Program Name</label>
                                                <input id="fname" type="text" class="form-control" placeholder="Enter Program Name here" name="programname" value="" required="">
                                            </div>
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Program Code</label>
                                                <input id="fname" type="text" class="form-control" placeholder="Enter Program Code here" name="programcode" value="" >
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Program Duration</label>
                                                <div class="clearfix"></div>
                                                <select class="form-control" name="duraion" required="" style="width: 40%; float: left;">
                                                    <option value="">Duration</option>
                                                    <?php for($i=1; $i<=36; $i++) { ?>
                                                     <option value="{{ $i }}">{{ $i }}</option>
                                                    <?php } ?>
                                                </select>&nbsp;
                                                <select class="form-control" name="durtype" required="" style="width: 40%; float: left;">
                                                    <option value="Months">Months</option>
                                                    <option value="Weeks">Weeks</option>
                                                    <option value="Years">Years</option>
                                                </select>
                                                <!--<input type="radio" name="durtype" value="Weeks" > Weeks&nbsp;&nbsp;
                                                <input type="radio" name="durtype" value="Months" checked="checked" > Months&nbsp;&nbsp;
                                                <input type="radio" name="durtype" value="Years" > Years-->
                                            </div>
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Eligibility</label>
                                                
                                                <input type="text" class="form-control" placeholder="Enter Qualification here" name="qualification" >
                                            </div>
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Fee (Amount)</label>
                                                <input id="fname" type="text" class="form-control" placeholder="Enter Fees here" name="amount" value="" required="" onkeypress="return isNumberKey(event)" >
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group row">
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Program Image (350px * 200px)</label>
                                                <div class="clearfix"></div>
                                                <input type="file" name="image1">

                                            </div>
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Instructor</label>
                                                <select class="form-control" name="instructor">
                                                    <option value="">Choose Instructor</option>
                                                    @foreach($inst as $insts)
                                                     <option value="{{ $insts->id }}">{{ $insts->instructorname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-4 col-lg">
                                                <div class="col-md-4 col-lg">
                                                    <label for="fname">Total Time (HH:MM:SS)</label>
                                                    <div class="clearfix"></div>
                                                    <select class="form-control" name="time_hh" required="" style="width: 33.33%; float: left;">
                                                        <?php for($i=0; $i<=600; $i++) { ?>
                                                         <option value="{{ $i }}">{{ str_pad($i, 2, "0", STR_PAD_LEFT) }}</option>
                                                        <?php } ?>
                                                    </select>

                                                    <select class="form-control" name="time_mm" required="" style="width: 33.33%; float: left;">
                                                        <?php for($j=0; $j<=60; $j++) { ?>
                                                         <option value="{{ $j }}">{{ str_pad($j, 2, "0", STR_PAD_LEFT) }}</option>
                                                        <?php } ?>
                                                    </select>

                                                    <select class="form-control" name="time_ss" required="" style="width: 33.33%; float: left;">
                                                        <?php for($k=0; $k<=60; $k++) { ?>
                                                         <option value="{{ $k }}">{{ str_pad($k, 2, "0", STR_PAD_LEFT) }}</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>
                                        <h6>Offer Details</h6>
                                        <hr>
                                        <div class="form-group row">
                                            <div class="col-md-3 col-lg">
                                                <label for="fname">Offer Name</label>
                                                <input id="fname" type="text" class="form-control" placeholder="Enter Offer Name here" name="offername" value="" >

                                            </div>
                                        
                                            <div class="col-md-3 col-lg">
                                                <label for="fname">Offer Start Date</label>
                                                <input id="" type="text" name="offerstart" class="form-control"  placeholder="Enter Offer Start Date here" data-toggle="flatpickr" value="">

                                            </div>
                                            <div class="col-md-3 col-lg">
                                                <label for="fname">Offer End Date</label>
                                                <input id="" type="text" class="form-control" placeholder="Enter Offer End Date here" name="offerend" data-toggle="flatpickr" value="" >

                                            </div>
                                            <div class="col-md-3 col-lg">
                                                <label for="fname">Offer Fee</label>
                                                <input id="fname" type="text" class="form-control" placeholder="Enter Offer Fees here" name="offeramount" onkeypress="return isNumberKey(event)" >

                                            </div>
                                        </div>
                                        <h6>Other Details</h6>
                                        <hr>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-lg">
                                                <label for="fname">Program Overview</label>
                                                <textarea id="editor1" class="form-control" rows="15" cols="80" placeholder="Enter About Program Overview here" name="overview"></textarea>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-lg">
                                                <label for="fname">Cariculam Program</label>
                                                <textarea id="editor2" class="form-control" rows="15" cols="80" placeholder="Enter About Program here" name="about"></textarea>

                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-lg">
                                                <label for="fname">Demo Video Link (youtube url)</label>
                                                 <input id="" type="text" class="form-control" placeholder="Enter Demo Video Link here" name="demovideo">

                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group row">
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Brouchre (PDF)</label>
                                                <div class="clearfix"></div>
                                                <input type="file" name="image2">

                                            </div>
                                            <div class="col-md-2 col-lg">
                                                <label for="fname">Display Order</label>
                                                <select class="form-control" name="display_order">
                                                    <option value="">Order</option>
                                                    <?php for($p=1; $p<=36; $p++) { ?>
                                                     <option value="{{ $p }}">{{ $p }}</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 col-lg">
                                                <label for="fname">Payment Status</label>
                                                <select class="form-control" name="program_status">
                                                    <option value="1" selected="selected">Paid</option>
                                                    <option value="0">Free</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Syllabus (PDF)</label>
                                                <div class="clearfix"></div>
                                                <input type="file" name="image3">
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-lg">
                                                <label for="fname">Program Description</label>
                                                <textarea class="form-control" placeholder="Enter Description here" name="description" rows="5" cols="80" ></textarea>

                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <input type="hidden" name="created" value="<?php echo date('Y-m-d'); ?>">
                                        <input type="hidden" name="year" value="<?php echo date('Y'); ?>">

                                        <input type="hidden" name="instid" value="{{ Auth::user()->instid }}">
                                        <input type="hidden" name="regtime" value="<?php echo time(); ?>">

                                        <!-- Added & Updated by starts here -->
                                        
                                        <input type="hidden" name="addedby" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="updatedby" value="">
                                        <input type="hidden" name="updatedon" value="">
                                        
                                    </div>
                                    <div class="card-body text-center">

                                        <input type="submit" class="btn btn-success" value="Save Program"/>
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


    <!-- Flatpickr -->
    <script src="{{ asset('assets/vendor/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr.js') }}"></script>

    <!-- jQuery Mask Plugin -->
    <script src="{{ asset('assets/vendor/jquery.mask.min.js') }}"></script>

    <!-- Quill -->
    <script src="{{ asset('assets/vendor/quill.min.js') }}"></script>
    <script src="{{ asset('assets/js/quill.js') }}"></script>

    <!-- Dropzone -->
    <script src="{{ asset('assets/vendor/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('assets/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>

    <!-- CK Editor -->
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('js/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
          })
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor2')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
          })
        function isNumberKey(evt)
          {
             var charCode = (evt.which) ? evt.which : event.keyCode
             if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

             return true;
          }
    </script>
</body>

</html>