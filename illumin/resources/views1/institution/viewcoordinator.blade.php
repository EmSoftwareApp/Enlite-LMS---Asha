@foreach($data as $object)

@endforeach

<!DOCTYPE html>

<html lang="en" dir="ltr">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Coordinator Management</title>



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

                            <h4 class="m-0">View Coordinator</h4>



                            <a href="{{ url('/coordinator-management') }}"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;Back</button></a>

                        </div>

                    </div>



                    <div class="container-fluid page__container">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="card">

                                  <form action="{{ url('/update-coordinator') }}" id="form_sample_1" method="post" enctype="multipart/form-data" >

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

                                                <input id="fname" type="text" class="form-control" placeholder="Enter First Name here" name="fname" value="{{$object->fname}}" required />

                                            </div>

                                            <div class="col-md-4 col-lg">

                                                <label for="lname">Last Name</label>

                                                <input id="lname" type="text" class="form-control" placeholder="Enter Last Name here" name="lname" value="{{$object->lname}}" required=""/>

                                            </div>

                                            <div class="col-md-4 col-lg">

                                                <label for="fname">Email</label>

                                                <input id="email" type="email" class="form-control" placeholder="Enter Email here" name="email" value="{{$object->email}}" >

                                            </div>

                                            

                                        </div>

                                        <div class="form-group row">

                                            <div class="col-md-4 col-lg">

                                                <label for="fname">Facebook</label>

                                                <div class="clearfix"></div>

                                                <input id="fbid" type="text" class="form-control" placeholder="Enter FB ID here" name="fbid" value="{{$object->fbid}}" required=""/>&nbsp;

                                                

                                                <!--<input type="radio" name="durtype" value="Weeks" > Weeks&nbsp;&nbsp;

                                                <input type="radio" name="durtype" value="Months" checked="checked" > Months&nbsp;&nbsp;

                                                <input type="radio" name="durtype" value="Years" > Years-->

                                            </div>

                                            <div class="col-md-4 col-lg">

                                                <label for="whatsapp">Whatsapp</label>

                                                

                                                <input type="text" class="form-control" placeholder="Enter Whatsapp Number here" id="whatsapp" name="whatsapp" value="{{$object->whatsapp}}" >

                                            </div>

                                            <div class="col-md-4 col-lg">

                                                <label for="mobile">Mobile</label>

                                                <input id="mobile" type="text" class="form-control" placeholder="Enter Mobile Number here" name="mobile" value="{{$object->mobile}}" required="" onKeyPress="return isNumberKey(event)" >

                                            </div>

                                        </div>

                                        <div class="form-group row">

                                            <div class="col-md-6 col-lg">

                                                <label for="username">User Name</label>

                                                <input id="username" type="text" class="form-control" placeholder="Enter First Username here" name="username" value="{{$object->username}}" required />

                                            </div>

                                            <div class="col-md-6 col-lg">

                                                <label for="password">Password</label>

                                                <input id="password" type="password" class="form-control" placeholder="Enter Password here" name="password" value="{{$object->password}}" required=""/>

                                            </div>

                                            

                                        </div>

                                        

                                        <div class="clearfix"></div>

                                        <h6>Professional Background</h6>

                                        <hr>

                                        <div class="form-group row">

                                            <div class="col-md-3 col-lg">

                                                <label for="qualif">Qualification</label>

                                                <input id="qualif" type="text" class="form-control" placeholder="Enter Qualification here" name="qualif" value="{{$object->qualif}}" >



                                            </div>

                                        

                                            <div class="col-md-3 col-lg">

                                                <label for="experience">Experience in Years</label>

                                                <input id="experience" type="text" name="experience" class="form-control"  placeholder="Enter Offer Start Date here"  value="{{$object->experience}}">



                                            </div>

                                            <div class="col-md-3 col-lg">

                                                <label for="skillset">Skill Set</label>

                                                <input id="skillset" type="text" class="form-control" placeholder="Enter Skill Set here" name="skillset" value="{{$object->skillset}}" >



                                            </div>

                                            <div class="col-md-3 col-lg">

                                                <label for="showcase">Show Case</label>

                                                <input id="showcase" type="text" class="form-control" placeholder="Enter Showcase here" name="showcase" value="{{$object->showcase}}" >



                                            </div>

                                        </div>

                                        

                                        


                                        


                                        <div class="clearfix"></div>

                                        

                                        <input type="hidden" name="id" value="{{$object->id}}">

                                        <input type="hidden" name="instid" value="{{ Auth::user()->instid }}">

                                        

                                        <!-- Added & Updated by starts here -->

                                        

                                    </div>

                                    <div class="card-body text-center">



                                        <input type="submit" class="btn btn-success" value="Save Changes"/>

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

        function ajxclevel2find(x)

          {

              var id_country = x;

              var token = $("input[name='_token']").val();



              $.ajax({

                  url: "<?php echo route('select-state-level') ?>",

                  method: 'POST',

                  data: {id_country:id_country, _token:token},

                  success: function(data) {

                    

                    $("select[name='topic'").html('');

                    $("select[name='topic'").html(data.options);

                  }

              });

          }

    </script>

</body>



</html>