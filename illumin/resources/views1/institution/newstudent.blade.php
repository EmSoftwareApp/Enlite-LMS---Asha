<!DOCTYPE html>

<html lang="en" dir="ltr">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} Admin | Student Management</title>



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

                            <h4 class="m-0">New Sudent</h4>



                            <a href="{{ url('/student-details') }}"><button type="button" class="btn btn-warning"><i class="fa fa-step-backward"></i>&nbsp;Back</button></a>

                        </div>

                    </div>



                    <form action="{{ url('/post-student') }}" id="form_sample_1" method="post" enctype="multipart/form-data" >

                                {{ csrf_field() }}

                    <div class="container-fluid page__container">

                        <div class="card card-form">

                            

                                <div class="row no-gutters">

                                    

                                    <div class="col-lg-4 card-body">

                                        <p><strong class="headings-color">Basic Information</strong></p>

                                        <p class="text-muted mb-0">Add Student's basic account details.</p>

                                        <p class="text-muted mb-0">Password will send to the Registered Email.</p>

                                    </div>

                                    <div class="col-lg-8 card-form__body card-body">

                                        @if(count($errors)>0)

                                              @foreach($errors->all() as $error)

                                                <p class="alert alert-success">{{$error}}</p>

                                              @endforeach

                                            @endif

                                        <div class="row">

                                            <div class="col">

                                                <div class="form-group">

                                                    <label for="fname">Student name*</label>

                                                    <input id="fname" type="text" name="name" class="form-control" placeholder="Enter Student name here" required="">

                                                </div>

                                            </div>

                                            

                                        </div>

                                        <div class="row">

                                            <div class="col">

                                                <div class="form-group">

                                                    <label for="fname">Mobile Number*</label>

                                                    <input name="contact" type="text" class="form-control" placeholder="Enter Mobile here" required="" maxlength="10" minlength="10" onkeypress="return isNumberKey(event)">

                                                </div>

                                            </div>

                                            <div class="col">

                                                <div class="form-group">

                                                    <label for="lname">Email*</label>

                                                    <input id="lname" type="email" name="email" class="form-control" placeholder="Enter Email here" required="">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col">

                                                <div class="form-group">

                                                    <label for="fname">Password Creation</label>

                                                    <select name="psw_creator" class="form-control" onchange="chossepws(this.value)">

                                                        <option value="0">Automatic</option>

                                                        <option value="1">Mannual</option>

                                                    </select>

                                                </div>

                                            </div>

                                            <div class="col">

                                                <div class="form-group" id="passfld" style=" display: none;">

                                                    <label for="lname">Password</label>

                                                    <input id="cretepassword" type="password" name="cretepassword" class="form-control" placeholder="Enter Password here" >

                                                </div>

                                            </div>

                                        </div>

                                       

                                        <div class="form-group">

                                            <label for="desc">Address</label>

                                            <textarea name="address" rows="4" class="form-control" placeholder="Enter Student Address here ..."></textarea>

                                        </div>

                                        <input type="hidden" name="year" value="<?php echo date('Y'); ?>">

                                        <input type="hidden" name="type" value="3">

                                        <input type="hidden" name="instid" value="{{ Auth::user()->instid }}">



                                        <!-- Added & Updated by starts here -->

                                        

                                        <input type="hidden" name="addedby" value="{{ Auth::user()->id }}">

                                        <input type="hidden" name="updatedby" value="">

                                        <input type="hidden" name="updatedon" value="">

                                    </div>

                                </div>

                            

                        </div>

                        

                        <div class="text-right mb-5">

                            <input type="submit" name="btnsummit" class="btn btn-success" value="Register" />

                        </div>

                    </div>

                    </form>



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

        function isNumberKey(evt)

        {

            var charCode = (evt.which) ? evt.which : event.keyCode

            if (charCode > 31 && (charCode < 48 || charCode > 57))

               return false;



            return true;

        }

        function chossepws(x)

        {

            if(x==1)

            {

                $("#passfld").css("display", "block");

            }

            else

            {

                $("#passfld").css("display", "none");

                document.getElementById("cretepassword").value="";

             }

        }

    </script>

</body>



</html>