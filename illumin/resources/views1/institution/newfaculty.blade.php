<!DOCTYPE html>

<html lang="en" dir="ltr">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Faculty Management</title>



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

                            <h4 class="m-0">New Faculty</h4>



                            <a href="{{ url('/faculty-management') }}"><button type="button" class="btn btn-warning"><i class="fa fa-step-backward"></i>&nbsp;Back</button></a>

                        </div>

                    </div>



                    <div class="container-fluid page__container">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="card">

                                  <form action="{{ url('/post-faculty') }}" id="form_sample_1" method="post" enctype="multipart/form-data" >

                                  {{ csrf_field() }}

                                    <div class="card-form__body card-body">

                                        @if(count($errors)>0)

                                          @foreach($errors->all() as $error)

                                            <p class="alert alert-success">{{$error}}</p>

                                          @endforeach

                                        @endif

                                        <h6>Profile Details</h6>

                                        <hr>

                                        <div class="form-group row">

                                            <div class="col-md-4 col-lg">

                                                <label for="fname">First Name</label>

                                                <input id="fname" type="text" class="form-control" placeholder="Enter First Name here" name="fname" value="" required />

                                            </div>

                                            <div class="col-md-4 col-lg">

                                                <label for="lname">Last Name</label>

                                                <input id="lname" type="text" class="form-control" placeholder="Enter Last Name here" name="lname" value="" required=""/>

                                            </div>

                                            <div class="col-md-4 col-lg">

                                                <label for="fname">Email</label>

                                                <input id="email" type="email" class="form-control" placeholder="Enter Email here" name="email" value="" >

                                            </div>

                                            

                                        </div>

                                        <div class="form-group row">

                                            <div class="col-md-4 col-lg">

                                                <label for="fname">Facebook</label>

                                                <div class="clearfix"></div>

                                                <input id="fbid" type="text" class="form-control" placeholder="Enter FB ID here" name="fbid" value="" required=""/>&nbsp;

                                                

                                                <!--<input type="radio" name="durtype" value="Weeks" > Weeks&nbsp;&nbsp;

                                                <input type="radio" name="durtype" value="Months" checked="checked" > Months&nbsp;&nbsp;

                                                <input type="radio" name="durtype" value="Years" > Years-->

                                            </div>

                                            <div class="col-md-4 col-lg">

                                                <label for="whatsapp">Whatsapp</label>

                                                

                                                <input type="text" class="form-control" placeholder="Enter Whatsapp Number here" id="whatsapp" name="whatsapp" >

                                            </div>

                                            <div class="col-md-4 col-lg">

                                                <label for="mobile">Mobile</label>

                                                <input id="mobile" type="text" class="form-control" placeholder="Enter Mobile Number here" name="mobile" value="" required="" onKeyPress="return isNumberKey(event)" >

                                            </div>

                                        </div>

                                        <div class="form-group row">

                                            <div class="col-md-6 col-lg">

                                                <label for="username">User Name</label>

                                                <input id="username" type="text" class="form-control" placeholder="Enter First Username here" name="username" value="" required />

                                            </div>

                                            <div class="col-md-6 col-lg">

                                                <label for="password">Password</label>

                                                <input id="password" type="password" class="form-control" placeholder="Enter Password here" name="password" value="" required=""/>

                                            </div>

                                            

                                        </div>

                                        

                                        <div class="clearfix"></div>

                                        <h6>Professional Background</h6>

                                        <hr>

                                        <div class="form-group row">

                                            <div class="col-md-3 col-lg">

                                                <label for="qualif">Qualification</label>

                                                <input id="qualif" type="text" class="form-control" placeholder="Enter Qualification here" name="qualif" value="" >



                                            </div>

                                        

                                            <div class="col-md-3 col-lg">

                                                <label for="experience">Experience in Years</label>

                                                <input id="experience" type="text" name="experience" class="form-control"  placeholder="Enter Offer Start Date here"  value="">



                                            </div>

                                            <div class="col-md-3 col-lg">

                                                <label for="skillset">Skill Set</label>

                                                <input id="skillset" type="text" class="form-control" placeholder="Enter Skill Set here" name="skillset" value="" >



                                            </div>

                                            <div class="col-md-3 col-lg">

                                                <label for="showcase">Show Case</label>

                                                <input id="showcase" type="text" class="form-control" placeholder="Enter Showcase here" name="showcase" value="" >



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



                                        <input type="submit" class="btn btn-success" value="Save"/>

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