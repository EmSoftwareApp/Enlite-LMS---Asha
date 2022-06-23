<!DOCTYPE html>

<html lang="en" dir="ltr">



<head>
{{ App\Models\
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Password Settings</title>



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

    

</head>



<body class="layout-fixed layout-sticky-subnav">





    <div class="preloader"></div>



    <!-- Header Layout -->

    <div class="mdk-header-layout js-mdk-header-layout">



        <!-- Header -->



        @include('includes/siteheader')



        <!-- // END Header -->



        <!-- Header Layout Content -->

        <div class="mdk-header-layout__content page">

            @include('includes/sitemenu')







            <div class="container page__heading-container">

                <div class="page__heading d-flex align-items-center justify-content-between">



                    <h4 class="m-0">Password Settings</h4>

                </div>

            </div>



            <form action="{{ url('/update-password') }}" id="form_sample_1" method="post" enctype="multipart/form-data" >

	            {{ csrf_field() }}

	            <div class="container page__container">



	                <div class="card card-form">

	                    <div class="row no-gutters">

	                        <div class="col-lg-4 card-body">

	                            <p><strong class="headings-color">Update Your Password</strong></p>

	                            <p class="text-muted mb-0">Change your password.</p>

	                        </div>

	                        <div class="col-lg-8 card-form__body card-body">

	                        	

	                            <div class="row">

	                            	@if(count($errors)>0)

		                                @foreach($errors->all() as $error)

		                                    <p class="alert alert-success">{{$error}}</p>

		                                @endforeach

		                            @endif

	                            	<div class="col-md-6">

	                                    <div class="form-group">

	                                        <label for="opass">Email*</label>

	                                        <input type="email" name="email" class="form-control" placeholder="Enter Email here" value="{{ Auth::user()->email }}" required="">

	                                    </div>

	                                </div>

	                                <div class="col-md-6">

	                                    <div class="form-group">

	                                        <label for="opass">Old Password*</label>

	                                        <input name="oldpassword" type="password" class="form-control" placeholder="Old password" required="" >

	                                    </div>

	                                </div>

	                                <div class="col-md-6">    

	                                    <div class="form-group">

	                                        <label for="npass">New Password*</label>

	                                        <input  type="password" name="password" class="form-control" placeholder="New password" required="" minlength="6">

                                                

	                                    </div>

	                                </div>

	                                <div class="col-md-6">    

	                                    <div class="form-group">

	                                        <label for="cpass">Confirm Password*</label>

	                                        <input id="cpass" type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required="" minlength="6">

	                                    </div>



	                                </div>

	                                <input type="hidden" name="user" value="{{ Auth::user()->id }}">

	                            </div>

	                        </div>

	                    </div>

	                </div>

	                <div class="text-right mb-5">

	                    <input type="submit" name="btnsubmit" class="btn btn-success" value="Change Password" />

	                </div>

	            </div>

	        </form>

            @include('includes/sitefooter')

        </div>

        <!-- // END Header Layout Content -->



    </div>

    <!-- // END Header Layout -->

    

   

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









</body>



</html>