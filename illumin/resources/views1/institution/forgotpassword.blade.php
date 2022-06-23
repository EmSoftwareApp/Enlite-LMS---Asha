<!DOCTYPE html>

<html lang="en" dir="ltr">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Forgot Password</title>



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



    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

    

</head>



<body class="layout-login-centered-boxed">





    <div class="layout-login-centered-boxed__form">

        <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-4 navbar-light">

            <a href="{{ url('/site-manager') }}" class="text-center text-light-gray mb-4">



                <!-- LOGO -->

                <h3>{{ App\Models\tblSystemSettigs::systemname('systemname') }}</h3>



            </a>

        </div>



        <div class="card card-body">





            <div class="page-separator">

                <div class="page-separator__text">Forgot Password</div>

            </div>



            <form action="{{ url('inst-postforgotpassword') }}" method="POST">

                {{ csrf_field() }}

                @if(count($errors)>0)

                    @foreach($errors->all() as $error)

                        <p class="alert alert-success">{{$error}}</p>

                    @endforeach

                @endif

                <div class="form-group">

                    <label class="text-label" for="email_2">Email Address:</label>

                    <div class="input-group input-group-merge">

                        <input id="email_2" type="email" required="" class="form-control form-control-prepended" placeholder="Enter Your Email Id" name="email">

                        <div class="input-group-prepend">

                            <div class="input-group-text">

                                <span class="far fa-envelope"></span>

                            </div>

                        </div>

                    </div>

                </div>

                

                <div class="form-group mb-1">

                    <button class="btn btn-block btn-primary" type="submit">Send</button>

                </div>

                

                <div class="form-group text-center mb-0">

                    &nbsp;<br>

                    Already know? <a class="text-underline" href="{{ url('/site-manager') }}">Login</a>

                </div>

            </form>

        </div>

    </div>





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