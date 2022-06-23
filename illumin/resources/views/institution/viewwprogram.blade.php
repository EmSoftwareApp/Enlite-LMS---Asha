@foreach($data as $object)
@endforeach
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Program Management</title>

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

    <!-- Dropzone -->
    <link type="text/css" href="{{ asset('assets/css/vendor-dropzone.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-dropzone.rtl.css') }}" rel="stylesheet">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href=".{{ asset('js/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

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
                            <h4 class="m-0">View Program</h4>

                            <a href="{{ url('/writing-program') }}"><button type="button" class="btn btn-warning"><i class="fa fa-step-backward"></i>&nbsp;Back</button></a>
                        </div>
                    </div>

                    <div class="container-fluid page__container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                  <form action="{{ url('/update-wprogram') }}" id="form_sample_1" method="post" enctype="multipart/form-data" >
                                  {{ csrf_field() }}
                                    <div class="card-form__body card-body">
                                        @if(count($errors)>0)
                                          @foreach($errors->all() as $error)
                                            <p class="alert alert-success">{{$error}}</p>
                                          @endforeach
                                        @endif
                                        <h6>Basic Details</h6>
                                        <hr>
                                        <div class="form-group row">
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Course</label>
                                                <select class="form-control" name="course" required="">
                                                    <option value="">Choose Course</option>
                                                    @foreach($course as $courses)
                                                     <option value="{{ $courses->id }}" @if($object->course == $courses->id) selected="selected" @endif>{{ $courses->programname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Title</label>
                                                 <input id="fname" type="text" class="form-control" placeholder="Enter Title here" name="title" value="{{ $object->title }}" required="">
                                            </div>
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Subject</label>
                                                <select class="form-control" name="subject">
                                                    <option value="">Choose Subject</option>
                                                    @foreach($subject as $insts)
                                                     <option value="{{ $insts->id }}" @if($object->subject == $insts->id) selected="selected" @endif>{{ $insts->subject }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group row">
                                            <div class="col-md-3 col-lg">
                                                <label for="fname">Upload Question PDF </label>
                                                <div class="clearfix"></div>
                                                <input type="file" name="question_pdf">

                                            </div>
                                            <div class="col-md-3 col-lg">
                                                @if($object->question_pdf != '')
                                                <label for="fname">Previous Question PDF</label>
                                                <div class="clearfix"></div>
                                                <a href="{{ url('/'.$object->question_pdf) }}" target="_blank"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-download"></i>&nbsp;Download</button></a>
                                                <a href="{{ url('/remove-questionpdf/'.$object->id) }}" onClick="return confirm('Are you sure to remove this Brouchre?');">
                                                    <button type="button" class="btn btn-danger btn-sm"><i class="material-icons">close</i></button>
                                                </a>
                                                @endif

                                            </div>
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Date of Publish</label>
                                                <div class="clearfix"></div>
                                        <input id="" type="text" class="form-control" placeholder="Enter Publish Date here" name="dop" data-toggle="flatpickr" value="{{$object->dop}}" >
                                        </div>
                                            
                                            
                                            
                                        </div>
                                        <div class="clearfix"></div>
                                       <div class="form-group row">
                                         
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Download Valid From</label>
                                                <div class="clearfix"></div>
                                               <input id="" type="text" class="form-control" placeholder="Enter Publish Date here" name="dvalidfrom" data-toggle="flatpickr" value="{{$object->dvalidfrom}}" >

                                            </div>
                                            
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Valid To</label>
                                                <div class="clearfix"></div>
                                        <input id="" type="text" class="form-control" placeholder="Enter Publish Date here" name="dvalidto" data-toggle="flatpickr" value="{{$object->dvalidto}}">
                                        </div>
                                            
                                            
                                        </div>
                                        <div class="form-group row">
                                         
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Upload Valid From</label>
                                                <div class="clearfix"></div>
                                               <input id="" type="text" class="form-control" placeholder="Enter Publish Date here" name="uvalidfrom" data-toggle="flatpickr" value="{{$object->uvalidfrom}}" >

                                            </div>
                                            
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Valid To</label>
                                                <div class="clearfix"></div>
                                        <input id="" type="text" class="form-control" placeholder="Enter Publish Date here" name="uvalidto" data-toggle="flatpickr" value="{{$object->uvalidto}}" >
                                        </div>
                                            
                                            
                                        </div>
                                        
                                       <div class="form-group row">
                                            <div class="col-md-3 col-lg">
                                                <label for="fname">Upload Answer PDF </label>
                                                <div class="clearfix"></div>
                                                <input type="file" name="answer_pdf">

                                            </div>
                                            <div class="col-md-3 col-lg">
                                                @if($object->answer_pdf != '')
                                                <label for="fname">Previous Answer PDF</label>
                                                <div class="clearfix"></div>
                                                <a href="{{ url('/'.$object->answer_pdf) }}" target="_blank"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-download"></i>&nbsp;Download</button></a>
                                                <a href="{{ url('/remove-answerpdf/'.$object->id) }}" onClick="return confirm('Are you sure to remove this Brouchre?');">
                                                    <button type="button" class="btn btn-danger btn-sm"><i class="material-icons">close</i></button>
                                                </a>
                                                @endif

                                            </div>
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Date of Publish</label>
                                                <div class="clearfix"></div>
                                        <input id="" type="text" class="form-control" placeholder="Enter Publish Date here" name="adop" data-toggle="flatpickr" value="{{$object->adop}}" >
                                        </div>
                                            
                                            
                                            
                                        </div>
                                        
                                        
                                      
                                        
                                        
                                        @if(Auth::user()->type == 2)
                                        <div class="form-group row">
                                            <div class="col-md-6 col-lg">
                                                <label for="fname">Added By</label>
                                                <input type="text" class="form-control" value="{{ App\Models\tblBasicSettings::instname($object->addedby, 'name') }}" disabled="">
                                            </div>
                                            <div class="col-md-3 col-lg">
                                                <label for="fname">Updated By</label>
                                                <input type="text" class="form-control" value="{{ App\Models\tblBasicSettings::instname($object->updatedby, 'name') }}" disabled="">
                                            </div>
                                            <div class="col-md-3 col-lg">
                                                <label for="fname">Updaed On</label>
                                                <input type="text" class="form-control" @if($object->updatedon != '') value="{{ Carbon\Carbon::parse($object->updatedon)->format('j F Y') }}" @endif disabled="">
                                            </div>
                                            <div class="col-md-3 col-lg">
                                                
                                            </div>
                                        </div>
                                        @endif
                                        <input type="hidden" name="created" value="<?php echo date('Y-m-d'); ?>">
                                        <input type="hidden" name="year" value="<?php echo date('Y'); ?>">

                                        <input type="hidden" name="instid" value="{{ Auth::user()->instid }}">
                                        <input type="hidden" name="id" value="{{ $object->id }}">

                                       

                                        <input type="hidden" name="prquestionpdf" value="{{ $object->question_pdf }}">
                                        <input type="hidden" name="pranswerpdf" value="{{ $object->answer_pdf }}">

                                        <!-- Added & Updated by starts here -->
                                        
                                        <input type="hidden" name="addedby" value="{{ $object->addedby }}">
                                        <input type="hidden" name="updatedby" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="updatedon" value="<?php echo date('Y-m-d'); ?>">
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

    <!-- Flatpickr -->
    <script src="{{ asset('assets/vendor/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr.js') }}"></script>

    <!-- Dropzone -->
    <script src="{{ asset('assets/vendor/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.js') }}"></script>

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