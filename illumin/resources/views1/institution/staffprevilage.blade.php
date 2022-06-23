<?php $id = Request::segment(2); ?>

@foreach($data as $object)

@endforeach

<!DOCTYPE html>

<html lang="en" dir="ltr">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Staff Previlages</title>



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

                            <h4 class="m-0">User Previlages for {{ $object->name  }}</h4>

                            <a href="{{ url('/staff') }}"><button type="button" class="btn btn-warning"><i class="fa fa-step-backward"></i>&nbsp;Back</button></a>

                        </div>

                       

                    </div>



                    <div class="container-fluid page__container">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="card">

                                  <!--<form action="" id="form_sample_1" method="post" enctype="multipart/form-data" >-->

                                  {{ csrf_field() }}

                                    <div class="card-form__body card-body">

                                        @if(count($errors)>0)

                                          @foreach($errors->all() as $error)

                                            <p class="alert alert-success">{{$error}}</p>

                                          @endforeach

                                        @endif

                                        <h6>MASTER DATA</h6>

                                        	<hr/>

                                        <div class="form-group row">

                                        	

                                        	{{ csrf_field() }}

                                            <div class="col-md-3 col-lg">

                                                <label for="fname">Office Staff</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck1" onchange="myFunction('office_staff', '1')" @if(App\tblPrevilage::previlagefind('office_staff', $object->id, $object->instid) > 0)checked="checked" @endif >



                                            </div>

                                            <div class="col-md-3 col-lg">

                                                <label for="fname">State</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck2" onchange="myFunction('state', '2')" @if(App\tblPrevilage::previlagefind('state', $object->id, $object->instid) > 0)checked="checked" @endif >



                                            </div>

                                            <div class="col-md-3 col-lg">

                                                <label for="fname">District</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck3" onchange="myFunction('district', '3')" @if(App\tblPrevilage::previlagefind('district', $object->id, $object->instid) > 0)checked="checked" @endif >

                                            </div>

                                            <div class="col-md-3 col-lg">

                                                <label for="fname">Instructor</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck4" onchange="myFunction('instructor', '4')" @if(App\tblPrevilage::previlagefind('instructor', $object->id, $object->instid) > 0)checked="checked" @endif >

                                            </div>

                                            

                                            

                                        </div>

                                        

                                        <div class="clearfix"></div>

                                        <div class="form-group row">

                                        	<div class="col-md-3 col-lg">

                                                <label for="fname">Accademic Year</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck5" onchange="myFunction('accademic_year', '5')" @if(App\tblPrevilage::previlagefind('accademic_year', $object->id, $object->instid) > 0)checked="checked" @endif >

                                            </div>

                                            <div class="col-md-3 col-lg">

                                                <label for="fname">Student Batch</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck6" onchange="myFunction('student_batch', '6')" @if(App\tblPrevilage::previlagefind('student_batch', $object->id, $object->instid) > 0)checked="checked" @endif >

                                            </div>



                                            <div class="col-md-3 col-lg">

                                                <label for="fname">Staff Designation</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck7" onchange="myFunction('staff_designation', '7')" @if(App\tblPrevilage::previlagefind('staff_designation', $object->id, $object->instid) > 0)checked="checked" @endif >

                                            </div>

                                            <div class="col-md-3 col-lg">

                                                <label for="fname">System Settings</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck8" onchange="myFunction('system_settings', '8')" @if(App\tblPrevilage::previlagefind('system_settings', $object->id, $object->instid) > 0)checked="checked" @endif >

                                            </div>

                                        </div>

                                        <div class="clearfix"></div>

                                        <hr/>

                                        <h6>Others</h6>

                                        <hr/>

                                        <div class="form-group row">

                                        	<div class="col-md-3 col-lg">

                                                <label for="fname">Course</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck9" onchange="myFunction('course', '9')" @if(App\tblPrevilage::previlagefind('course', $object->id, $object->instid) > 0)checked="checked" @endif >

                                            </div>

                                            <div class="col-md-3 col-lg">

                                                <label for="fname">Program</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck10" onchange="myFunction('program', '10')" @if(App\tblPrevilage::previlagefind('program', $object->id, $object->instid) > 0)checked="checked" @endif >

                                            </div>



                                            <div class="col-md-3 col-lg">

                                                <label for="fname">Topic</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck11" onchange="myFunction('topic', '11')" @if(App\tblPrevilage::previlagefind('topic', $object->id, $object->instid) > 0)checked="checked" @endif >

                                            </div>



                                            <div class="col-md-3 col-lg">

                                                <label for="fname">Topic Order</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck17" onchange="myFunction('topic_order', '17')" @if(App\tblPrevilage::previlagefind('topic_order', $object->id, $object->instid) > 0)checked="checked" @endif >

                                            </div>

                                        </div>

                                        

                                        <div class="clearfix"></div>

                                        <div class="form-group row">

                                            <div class="col-md-3 col-lg">

                                                <label for="fname">Chapter</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck12" onchange="myFunction('chapter', '12')" @if(App\tblPrevilage::previlagefind('chapter', $object->id, $object->instid) > 0)checked="checked" @endif >

                                            </div>

                                        	<div class="col-md-3 col-lg">

                                                <label for="fname">Video</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck13" onchange="myFunction('video', '13')" @if(App\tblPrevilage::previlagefind('video', $object->id, $object->instid) > 0)checked="checked" @endif >

                                            </div>

                                            <div class="col-md-3 col-lg">

                                                <label for="fname">Student Management</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck14" onchange="myFunction('student_management', '14')" @if(App\tblPrevilage::previlagefind('student_management', $object->id, $object->instid) > 0)checked="checked" @endif >

                                            </div>



                                            <div class="col-md-3 col-lg">

                                                <label for="fname">Test Questions</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck21" onchange="myFunction('test_questions', '21')" @if(App\tblPrevilage::previlagefind('test_questions', $object->id, $object->instid) > 0)checked="checked" @endif >

                                            </div>

                                            

                                        </div>

                                        <div class="clearfix"></div>

                                        <hr/>

                                        <h6>Student Package</h6>

                                        <hr/>

                                        <div class="form-group row">

                                        	<div class="col-md-3 col-lg">

                                                <label for="fname">Package Expiry</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck15" onchange="myFunction('package_expiry', '15')" @if(App\tblPrevilage::previlagefind('package_expiry', $object->id, $object->instid) > 0)checked="checked" @endif >

                                            </div>

                                            <div class="col-md-3 col-lg">

                                                <label for="fname">Expired List</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck16" onchange="myFunction('expired_list', '16')" @if(App\tblPrevilage::previlagefind('expired_list', $object->id, $object->instid) > 0)checked="checked" @endif >

                                            </div>



                                            <div class="col-md-3 col-lg">

                                                

                                            </div>

                                            <div class="col-md-3 col-lg">

                                                

                                            </div>

                                        </div>

                                        <div class="clearfix"></div>

                                        <h6>Test Settings</h6>

                                        <hr/>

                                        <div class="form-group row">

                                            <div class="col-md-3 col-lg">

                                                <label for="fname">Test Difficulty Level</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck19" onchange="myFunction('test_difficulty_level', '19')" @if(App\tblPrevilage::previlagefind('test_difficulty_level', $object->id, $object->instid) > 0)checked="checked" @endif >

                                            </div>

                                            <div class="col-md-3 col-lg">

                                                <label for="fname">Test Names</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck20" onchange="myFunction('test_names', '20')" @if(App\tblPrevilage::previlagefind('test_names', $object->id, $object->instid) > 0)checked="checked" @endif >

                                            </div>



                                            <div class="col-md-3 col-lg">

                                                

                                            </div>

                                            <div class="col-md-3 col-lg">

                                                

                                            </div>

                                        </div>

                                        <div class="clearfix"></div>

                                        <hr/>

                                        <h6>App Settings</h6>

                                        <hr/>

                                        <div class="form-group row">

                                            <div class="col-md-3 col-lg">

                                                <label for="fname">Course Image</label>&nbsp;&nbsp;

                                                <input type="checkbox" class="" style=" margin-top: 10px;" id="myCheck18" onchange="myFunction('course_image', '18')" @if(App\tblPrevilage::previlagefind('course_image', $object->id, $object->instid) > 0)checked="checked" @endif >

                                            </div>

                                            <div class="col-md-3 col-lg">

                                                

                                            </div>



                                            <div class="col-md-3 col-lg">

                                                

                                            </div>

                                            <div class="col-md-3 col-lg">

                                                

                                            </div>

                                        </div>

                                        <div class="clearfix"></div>

                                        <input type="hidden" name="userid" id="userid" value="{{ $object->id }}">



                                        <input type="hidden" name="instid" id="instid" value="{{ Auth::user()->instid }}">                                        

                                                                                

                                    </div>

                                    <div class="card-body text-center">

                                    <!-- Last added Id 21 -->

                                    </div>

                                  <!--</form>-->

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



    function myFunction(x, y) {

                                          

        // Get the checkbox

        var checkBox = document.getElementById("myCheck"+y);

        var userid = document.getElementById("userid").value;

        var instid = document.getElementById("instid").value;

        var token = $("input[name='_token']").val();

        var val = x;



        

        // If the checkbox is checked, display the output text

        if (checkBox.checked == true){

        	

            if((userid != '') && (instid != ''))

            {

                $.ajax({



                    url: "<?php echo route('previlage-assign') ?>",

                    method: 'POST',

                    data: {userid:userid, instid:instid, val:val, _token:token},

                    success: function(data) {

                        //alert(data);

                    }

                });

            }

        } else {

            if((userid != '') && (instid != ''))

            {

                $.ajax({



                    url: "<?php echo route('previlage-reject') ?>",

                    method: 'POST',

                    data: {userid:userid, instid:instid, val:val, _token:token},

                    success: function(data) {

                        //alert(data);

                    }

                });

            }

        }

    }

</script>

</body>



</html>