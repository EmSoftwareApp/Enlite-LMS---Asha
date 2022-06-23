


            

            
           <!-- <form action="{{ url('student-login') }}" method="post">
                {{ csrf_field() }}
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <p class="alert alert-success">{{$error}}</p>
                    @endforeach
                @endif
                <div class="form-group">
                    <label class="text-label" for="email_2">Email Address:</label>
                    <div class="input-group input-group-merge">
                        <input id="email_2" type="email" required="" class="form-control form-control-prepended" placeholder="Enter Email Id Here" name="email">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label" for="password_2">Password:</label>
                    <div class="input-group input-group-merge">
                        <input id="password_2" type="password" required="" class="form-control form-control-prepended" placeholder="Enter your password" name="password">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-key"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="prviouslink" value="">
                <div class="form-group mb-1">
                    <button class="btn btn-block btn-primary" type="submit">Login</button>
                </div>
                <div class="form-group text-center">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" checked="" id="remember">
                        <label class="custom-control-label" for="remember">Remember me for 30 days</label>
                    </div>
                </div>
                <div class="form-group text-center mb-0">
                    <a href="{{ url('/forgotpassword') }}">Forgot password?</a> <br>
                    Don't have an account? <a class="text-underline" href="{{ url('/signup') }}">Sign up</a>
                </div>
            </form>-->
            <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<title>www.enliteias.com</title>
<link href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<link  rel="stylesheet" href="{{ asset('assets/scss/animate.css') }}">
<link rel="stylesheet" href="{{ asset('assets/scss/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/components/bootstrap-table/dist/bootstrap-table.min.css') }}" />
<link  id="theme" rel="stylesheet" href="{{ asset('assets/scss/colors/red.css') }}">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
.login-register {
	background: url(plugins/images/login-register.jpg) center center/cover no-repeat!important;
	height: 100%;
	position: fixed; }
	
	.checkbox {
  padding-left: 20px;}
	</style>
</head>
<body class="mini-sidebar fix-header">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
            <form action="{{ url('student-login') }}" method="post" class="form-horizontal form-material" id="loginform" >
                {{ csrf_field() }}
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <p class="alert alert-success">{{$error}}</p>
                    @endforeach
                @endif
                    <h3 class="box-title m-b-20">Sign In Here</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Username" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div>
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot password?</a> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-warning btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                            <div class="social">
                                <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                                <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Don't have an account? <a href="#" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal" id="recoverform" action="{{ url('post-forgotpassword') }}" method="POST">
                {{ csrf_field() }}

@if(count($errors)>0)

    @foreach($errors->all() as $error)

        <p class="alert alert-success">{{$error}}</p>

    @endforeach

@endif

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-warning btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
   
	
	<script src="{{ asset('assets/plugins/components/jquery/dist/jquery.min.js') }}"></script> 
<script src="{{ asset('assets/bootstrap/dist/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('assets/sjs/waves.js') }}"></script> 
<script src="{{ asset('assets/sjs/sidebarmenu.js') }}"></script> 
<script src="{{ asset('assets/sjs/custom.js') }}"></script> 
<script src="{{ asset('assets/plugins/components/bootstrap-table/dist/bootstrap-table.min.js') }}"></script> 
<script src="{{ asset('assets/plugins/components/bootstrap-table/dist/bootstrap-table.ints.js') }}"></script>
<script src="{{ asset('assets/plugins/components/styleswitcher/jQuery.style.switcher.js') }}"></script>
</body>

</html>
         