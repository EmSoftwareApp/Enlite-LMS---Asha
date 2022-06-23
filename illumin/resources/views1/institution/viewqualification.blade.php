@foreach($data as $object)

@endforeach

<!DOCTYPE html>

<html lang="en" dir="ltr">


<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Qualification Management</title>



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

                            <h4 class="m-0">View Qualification</h4>



                            <a href="{{ url('/qualification-management') }}"><button type="button" class="btn btn-warning"><i class="fa fa-step-backward"></i>&nbsp;Back</button></a>

                        </div>

                    </div>



                    <div class="container-fluid page__container">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="card">

                                  <form action="{{ url('/update-qualification') }}" id="form_sample_1" method="post" enctype="multipart/form-data" >

                                  {{ csrf_field() }}

                                    <div class="card-form__body card-body">

                                        @if(count($errors)>0)

                                          @foreach($errors->all() as $error)

                                            <p class="alert alert-success">{{$error}}</p>

                                          @endforeach

                                        @endif

                                        

                                        <div class="form-group row">

                                            <div class="col-md-12 col-lg">

                                                <label for="fname">Qualification</label>

                                                <input id="fname" type="text" class="form-control" placeholder="Enter Qualification here" name="qualification" value="{{ $object->qualification }}" required="">

                                            </div>

                                        </div>



                                        <input type="hidden" name="created" value="<?php echo date('Y-m-d'); ?>">

                                        <input type="hidden" name="year" value="<?php echo date('Y'); ?>">



                                        <input type="hidden" name="instid" value="{{ Auth::user()->instid }}">

                                        <input type="hidden" name="id" value="{{ $object->id }}">

                                        

                                    </div>

                                    <div class="card-body text-center">



                                        <input type="submit" class="btn btn-success" value="Save Course"/>

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



</body>



</html>