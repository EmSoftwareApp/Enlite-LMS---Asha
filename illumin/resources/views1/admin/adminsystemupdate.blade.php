@foreach($data as $object)

@endforeach

<!DOCTYPE html>

<html lang="en" dir="ltr">


<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} Admin | System Settings</title>



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





</head>



<body class="layout-default">







    <!-- Header Layout -->

    <div class="mdk-header-layout js-mdk-header-layout">



        <!-- Header -->



        @include('includes/adminheader')



        <!-- // END Header -->



        <!-- Header Layout Content -->

        <div class="mdk-header-layout__content">



            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">

                <div class="mdk-drawer-layout__content page">







                    <div class="container-fluid page__heading-container">

                        <div class="page__heading d-flex align-items-center justify-content-between">

                            <h4 class="m-0">Edit System Settings</h4>



                            <a href="{{ url('/adminsyssettings') }}"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp;Back</button></a>

                        </div>

                    </div>



                    <div class="container-fluid page__container">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="card">

                                  <form action="{{ url('/update-systemsettings') }}" id="form_sample_1" method="post" enctype="multipart/form-data" >

                                  {{ csrf_field() }}

                                    <div class="card-form__body card-body">

                                        @if(count($errors)>0)

                                          @foreach($errors->all() as $error)

                                            <p class="alert alert-success">{{$error}}</p>

                                          @endforeach

                                        @endif

                                        <div class="form-group row">

                                            <div class="col-md-4 col-lg">

                                                <label for="fname">System Name</label>

                                                <input id="fname" type="text" class="form-control" placeholder="Enter System Name here" name="systemname" value="{{ $object->systemname }}" required="">

                                            </div>

                                        

                                            <div class="col-md-4 col-lg">

                                                <label for="fname">Contact</label>

                                                <input id="contact" type="text" class="form-control" placeholder="Enter Contact here" name="contact" value="{{ $object->contact }}">

                                            </div>

                                        

                                            <div class="col-md-4 col-lg">

                                                <label for="fname">Email</label>

                                                <input id="email" type="email" class="form-control" placeholder="Enter Email here" name="email" value="{{ $object->email }}">

                                            </div>

                                        </div>



                                        <div class="form-group row">

                                            <div class="col-md-6 col-lg">

                                                <label for="desc">Primary Address</label>

                                                <textarea id="paddress" rows="4" class="form-control" placeholder="Please enter Primary Address" name="address1">{{ $object->address1 }}</textarea>

                                            </div>

                                        

                                            <div class="col-md-6 col-lg">

                                                <label for="desc">Secondary Address</label>

                                                <textarea id="paddress" rows="4" class="form-control" placeholder="Please enter Secondary Address" name="address2">{{ $object->address2 }}</textarea>

                                            </div>

                                        </div>



                                        <div class="form-group row">

                                            <div class="col-md-6 col-lg">

                                                <label for="desc">Other Address</label>

                                                <textarea id="paddress" rows="4" class="form-control" placeholder="Please enter Other Address" name="address3">{{ $object->address3 }}</textarea>

                                            </div>

                                        

                                            <div class="col-md-6 col-lg">

                                                <label for="desc">Description</label>

                                                <textarea id="desc" rows="4" class="form-control" placeholder="Please enter a description" name="description">{{ $object->description }}</textarea>

                                            </div>

                                        </div>



                                        <div class="form-group row">

                                            <div class="col-md-12 col-lg">

                                                <label for="desc">Choose Logo</label>

                                                <input type="file" name="file" class="btn btn-sm btn-light dz-clickable">

                                            </div>

                                        

                                        </div>



                                        <input type="hidden" name="updated" value="<?php echo date('Y-m-d'); ?>">

                                        <input type="hidden" name="year" value="<?php echo date('Y'); ?>">



                                        <input type="hidden" name="prlogo" value="{{ $object->logo }}">

                                        <input type="hidden" name="id" value="{{ $object->id }}">



                                        <div class="form-group">

                                            <label>Previous Logo</label>

                                            

                                                <div class="dz-preview dz-file-preview dz-clickable mr-3">

                                                    <div class="avatar avatar-lg">

                                                        @if($object->logo == '')

                                                        <img src="{{ asset('assets/images/account-add-photo.svg') }}" class="avatar-img rounded" alt="..." data-dz-thumbnail>

                                                        @else

                                                        <?php $img = 'logo/'.$object->logo; ?>

                                                        <img src="<?php echo asset($img); ?>" class="avatar-img rounded" alt="..." data-dz-thumbnail>

                                                        @endif

                                                    </div>

                                                </div>

                                                

                                        </div>

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



</body>



</html>