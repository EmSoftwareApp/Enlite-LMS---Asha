@foreach($data as $object)

@endforeach

<!DOCTYPE html>

<html lang="en" dir="ltr">


<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Instructor Management</title>



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



    <!-- bootstrap wysihtml5 - text editor -->

    <link rel="stylesheet" href="{{ asset('js/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">



    <!-- Select2 -->

    <link type="text/css" href="{{ asset('assets/css/vendor-select2.css') }}" rel="stylesheet">

    <link type="text/css" href="{{ asset('assets/css/vendor-select2.rtl.css') }}" rel="stylesheet">

    <link type="text/css" href="{{ asset('assets/vendor/select2/select2.min.css') }}" rel="stylesheet">



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

                            <h4 class="m-0">View Instructor</h4>



                            <a href="{{ url('/instructors') }}"><button type="button" class="btn btn-warning"><i class="fa fa-step-backward"></i>&nbsp;Back</button></a>

                        </div>

                    </div>



                    <div class="container-fluid page__container">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="card">

                                  <form action="{{ url('/update-instructor') }}" id="form_sample_1" method="post" enctype="multipart/form-data" >

                                  {{ csrf_field() }}

                                    <div class="card-form__body card-body">

                                        @if(count($errors)>0)

                                          @foreach($errors->all() as $error)

                                            <p class="alert alert-success">{{$error}}</p>

                                          @endforeach

                                        @endif

                                        <div class="form-group row">

                                            <div class="col-md-4 col-lg">

                                                <label for="fname">Instructor Name*</label>

                                                <input id="fname" type="text" class="form-control" placeholder="Enter Program Name here" name="instructorname" value="{{ $object->instructorname }}" required="">

                                            </div>

                                            <div class="col-md-4 col-lg">

                                                <label for="fname">Mobile*</label>

                                                <input id="fname" type="text" class="form-control" placeholder="Enter Mobile here" name="mobile" value="{{ $object->mobile }}" required="" minlength="10" maxlength="10" onkeypress="return isNumberKey(event)" >



                                            </div>

                                            <div class="col-md-4 col-lg">

                                                <label for="fname">Employee Code</label>

                                                <input id="fname" type="text" class="form-control" placeholder="Enter Employee Code here" name="empcode" value="{{ $object->empcode }}" >

                                            </div>

                                            

                                        </div>

                                        

                                        <div class="clearfix"></div>

                                        <div class="form-group row">

                                            <div class="col-md-4 col-lg">

                                                <label for="fname">Email</label>

                                                <input id="fname" type="email" class="form-control" placeholder="Enter Email here" name="email" value="{{ $object->email }}" >

                                            </div>

                                            <div class="col-md-4 col-lg">

                                                <label for="fname">Qualification</label>

                                                <input id="fname" type="text" class="form-control" placeholder="Enter Qualification here" name="qualification" value="{{ $object->qualification }}" >

                                            </div>

                                            

                                            <div class="col-md-4 col-lg">

                                                <label for="fname">Course</label>

                                                <select class="form-control" name="course">

                                                    <option value="">Choose Course</option>

                                                    @foreach($course as $courses)

                                                     <option value="{{ $courses->id }}" @if($object->course == $courses->id) selected="selected" @endif>{{ $courses->coursename }}</option>

                                                    @endforeach

                                                </select>

                                            </div>

                                            

                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="form-group row">

                                            <div class="col-md-4 col-lg">

                                                <label for="fname">Instructor Image (350px * 200px)</label>

                                                <div class="clearfix"></div>

                                                <input type="file" name="image1">



                                            </div>

                                            <div class="col-md-4 col-lg">

                                                @if($object->image != '')

                                                <?php $img = $object->image; ?>

                                                <label for="fname">Previous Instructor Image</label>

                                                <div class="clearfix"></div>

                                                <img src="<?php echo asset($img); ?>" width="120" height="70">

                                                <a href="{{ url('/remove-instructor-image/'.$object->id) }}" onclick="return confirm('Are you sure to remove this Image?');">

                                                    <button type="button" class="btn btn-danger btn-sm"><i class="material-icons">close</i></button>

                                                </a>

                                                @endif



                                            </div>



                                            

                                            <div class="col-md-4 col-lg">

                                                

                                            </div>

                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="form-group row">

                                            <div class="col-md-12 col-lg">

                                                <label for="fname">Address</label>

                                                <textarea id="" class="form-control" rows="15" cols="80" placeholder="Enter About Address here" name="address">{{ $object->address }}</textarea>



                                            </div>

                                        </div>

                                        <div class="form-group row">

                                            <div class="col-md-12 col-lg">

                                                <label for="fname">Description</label>

                                                <textarea id="editor1" class="form-control" rows="15" cols="80" placeholder="Enter About Description here" name="description">{{ $object->description }}</textarea>



                                            </div>

                                        </div>

                                        <div class="clearfix"></div>

                                        



                                        <input type="hidden" name="created" value="<?php echo date('Y-m-d'); ?>">

                                        <input type="hidden" name="year" value="<?php echo date('Y'); ?>">



                                        <input type="hidden" name="instid" value="{{ Auth::user()->instid }}">



                                        <input type="hidden" name="id" value="{{ $object->id }}">



                                        <input type="hidden" name="primage" value="{{ $object->image }}">

                                        

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





    <!-- Dropzone -->

    <script src="{{ asset('assets/vendor/dropzone.min.js') }}"></script>

    <script src="{{ asset('assets/js/dropzone.js') }}"></script>



    <!-- CK Editor -->

    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>

    <!-- Bootstrap WYSIHTML5 -->

    <script src="{{ asset('js/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>



    <!-- Select2 -->

    <script src="{{ asset('assets/vendor/select2/select2.min.js') }}"></script>

    <script src="{{ asset('assets/js/select2.js') }}"></script>



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