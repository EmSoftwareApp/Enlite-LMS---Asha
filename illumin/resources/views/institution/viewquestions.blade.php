@foreach($data as $object)
@endforeach
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Test Management</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="assets/vendor/perfect-scrollbar.css" rel="stylesheet">

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

    <!-- Quill Theme -->
    <link type="text/css" href="{{ asset('assets/css/vendor-quill.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-quill.rtl.css') }}" rel="stylesheet">

    <!-- Dropzone -->
    <link type="text/css" href="{{ asset('assets/css/vendor-dropzone.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-dropzone.rtl.css') }}" rel="stylesheet">

    <!-- Select2 -->
    <link type="text/css" href="{{ asset('assets/css/vendor-select2.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-select2.rtl.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/vendor/select2/select2.min.css') }}" rel="stylesheet">

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
                            <h4 class="m-0">View Question</h4>

                            <a href="{{ url('/test-questions') }}"><button type="button" class="btn btn-warning"><i class="fa fa-step-backward"></i>&nbsp;Back</button></a>
                        </div>
                    </div>

                    <div class="container-fluid page__container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                  <form action="{{ url('/update-questions') }}" id="form_sample_1" method="post" enctype="multipart/form-data" onSubmit="return validateForm()">
                                  {{ csrf_field() }}
                                    <div class="card-form__body card-body">
                                        @if(count($errors)>0)
                                          @foreach($errors->all() as $error)
                                            <p class="alert alert-success">{{$error}}</p>
                                          @endforeach
                                        @endif
                                        <h6>Question Details</h6>
                                        <hr>
                                        <div class="form-group row">
                                            <div class="col-md-3 col-lg">
                                                <label for="fname">Course*</label>
                                                <select class="form-control select2" name="course" required="" onchange="ajxclevel2find(this.value);">
                                                    <option value="">Choose Course</option>
                                                    @foreach($course as $courses)
                                                     <option value="{{ $courses->id }}" @if($object->course == $courses->id) selected="selected" @endif>{{ $courses->coursename }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-lg">
                                                <label for="fname">Program*</label>
                                                <select class="form-control" name="program" id="program" required="" >
                                                    <option value="{{ $object->program }}">{{ App\Models\tblBasicSettings::programfind($object->program) }}</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-lg">
                                                <label for="fname">Topic*</label>
                                                <select class="form-control" name="topic" id="topic" required="" onchange="ajxclevel3find(this.value);">
                                                    <option value="{{ $object->topic }}">{{ App\Models\tblBasicSettings::topicfind($object->topic) }}</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-lg">
                                                <label for="fname">Chapter*</label>
                                                <select class="form-control" name="chapter" id="chapter" required="">
                                                    <option value="{{ $object->chapter }}">{{ App\Models\tblBasicSettings::chapterfind($object->chapter) }}</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-lg">
                                                <label for="fname">Question*</label>
                                                 <textarea id="editor1" name="question" rows="8" cols="50" placeholder="Drop your question here.." required="">
                                                    {{ $object->question }}
                                                </textarea>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-lg">
                                                <label for="fname">Answer A*</label>
                                                 <textarea id="editor2" name="answer_a" rows="8" cols="50" placeholder="Answer A Added Here.." readonly="">
                                                     {{ $object->answer_a }}
                                                 </textarea>
                                                
                                            </div>
                                            <div class="col-md-6 col-lg">
                                                <label for="fname">Answer B*</label>
                                                 <textarea id="editor3" name="answer_b" rows="8" cols="50" placeholder="Answer B Added Here.." required="">
                                                     {{ $object->answer_b }}
                                                 </textarea>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-lg">
                                                <label for="fname">Answer C*</label>
                                                 <textarea id="editor4" name="answer_c" rows="8" cols="50" placeholder="Answer C Added Here.." required="">
                                                     {{ $object->answer_c }}
                                                 </textarea>
                                                
                                            </div>
                                            <div class="col-md-6 col-lg">
                                                <label for="fname">Answer D*</label>
                                                 <textarea id="editor5" name="answer_d" rows="8" cols="50" placeholder="Answer D Added Here.." required="">
                                                    {{ $object->answer_d }}
                                                </textarea>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-lg">
                                                <label for="fname">Explanations</label>
                                                 <textarea id="editor7" name="explanation" rows="8" cols="50" placeholder="Explanations Added Here..">
                                                     {{ $object->explanation }}
                                                 </textarea>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Correct Answer*</label>
                                                <select class="form-control" name="correct_answer" id="correct_answer" required="">
                                                    <option value="" @if($object->correct_answer == "") selected="selected" @endif>Choose Correct Answer</option>
                                                    <option value="answer_a" @if($object->correct_answer == 'answer_a') selected="selected" @endif>Answer A</option>
                                                    <option value="answer_b" @if($object->correct_answer == 'answer_b') selected="selected" @endif>Answer B</option>
                                                    <option value="answer_c" @if($object->correct_answer == 'answer_c') selected="selected" @endif>Answer C</option>
                                                    <option value="answer_d" @if($object->correct_answer == 'answer_d') selected="selected" @endif>Answer D</option>
                                                </select>

                                            </div>
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Score*</label>
                                                <select class="form-control" name="score" id="score" required="">
                                                    <option value="" @if($object->score == '') selected="selected" @endif>Choose Score</option>
                                                    <option value="1" @if($object->score == '1') selected="selected" @endif>1</option>
                                                    <option value="2" @if($object->score == '2') selected="selected" @endif>2</option>
                                                    <option value="3" @if($object->score == '3') selected="selected" @endif>3</option>
                                                    <option value="4" @if($object->score == '4') selected="selected" @endif>4</option>
                                                    <option value="5" @if($object->score == '5') selected="selected" @endif>5</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Difficulty Levels</label>
                                                <select class="form-control" name="difficulty_levels">
                                                    <option value="">Choose Difficulty Levels</option>
                                                    @foreach($diff as $diffs)
                                                     <option value="{{ $diffs->id }}" @if($object->difficulty_levels == $diffs->id) selected="selected" @endif>{{ $diffs->level }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            
                                            
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-lg">
                                                <label for="fname">Description(If Any)</label>
                                                 <textarea  name="description" class="form-control" placeholder="Description Added Here..">{{ $object->description }}</textarea>
                                                
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
                                        <div class="clearfix"></div>
                                        <hr>
                                        <input type="hidden" name="id" value="{{ $object->id }}">
                                        
                                        <input type="hidden" name="year" value="<?php echo date('Y'); ?>">

                                        <input type="hidden" name="instid" value="{{ Auth::user()->instid }}">

                                        

                                        <!-- Added & Updated by starts here -->
                                        
                                        <input type="hidden" name="addedby" value="{{ $object->addedby }}">
                                        <input type="hidden" name="updatedby" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="updatedon" value="<?php echo date('Y-m-d'); ?>">
                                        
                                    </div>
                                    <div class="card-body text-center">

                                        <input type="submit" class="btn btn-success" value="Save Question"/>
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

    <!-- jQuery Mask Plugin -->
    <script src="{{ asset('assets/vendor/jquery.mask.min.js') }}"></script>

    <!-- Quill -->
    <script src="{{ asset('assets/vendor/quill.min.js') }}"></script>
    <script src="{{ asset('assets/js/quill.js') }}"></script>

    <!-- Dropzone -->
    <script src="{{ asset('assets/vendor/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('assets/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>

    <!-- CK Editor -->
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('js/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

    <script type="text/javascript">
        function ajxclevel2find(x)
          {
              var id_country = x;
              var token = $("input[name='_token']").val();
              $('#topic').val('');
              $('#chapter').val('');

              $.ajax({
                  url: "<?php echo route('select-pgm-level') ?>",
                  method: 'POST',
                  data: {id_country:id_country, _token:token},
                  success: function(data) {
                    
                    $("select[name='program'").html('');
                    $("select[name='program'").html(data.options);
                  }
              });

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
        function ajxclevel3find(x)
          {
              var id_country = x;
              var token = $("input[name='_token']").val();
              $('#chapter').val('');

              $.ajax({
                  url: "<?php echo route('select-chapter-level') ?>",
                  method: 'POST',
                  data: {id_country:id_country, _token:token},
                  success: function(data) {
                    
                    $("select[name='chapter'").html('');
                    $("select[name='chapter'").html(data.options);
                  }
              });
          }

          $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
          })

          $(function () {
            CKEDITOR.replace('editor2')
            $('.textarea').wysihtml5()
          })

          $(function () {
            CKEDITOR.replace('editor3')
            $('.textarea').wysihtml5()
          })
          $(function () {
            CKEDITOR.replace('editor4')
            $('.textarea').wysihtml5()
          })
          $(function () {
            CKEDITOR.replace('editor5')
            $('.textarea').wysihtml5()
          })
          $(function () {
            CKEDITOR.replace('editor6')
            $('.textarea').wysihtml5()
          })
          $(function () {
            CKEDITOR.replace('editor7')
            $('.textarea').wysihtml5()
          })
    </script>


</body>

</html>