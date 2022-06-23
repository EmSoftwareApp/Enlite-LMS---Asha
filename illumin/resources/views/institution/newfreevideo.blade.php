<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Free Video Management</title>

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
                            <h4 class="m-0">New Free Video</h4>

                            <a href="{{ url('/free-video') }}"><button type="button" class="btn btn-warning"><i class="fa fa-step-backward"></i>&nbsp;Back</button></a>
                        </div>
                    </div>

                    <div class="container-fluid page__container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                  <form action="{{ url('/post-freevideo') }}" id="form_sample_1" method="post" enctype="multipart/form-data" onSubmit="return validateForm()">
                                  {{ csrf_field() }}
                                    <div class="card-form__body card-body">
                                        @if(count($errors)>0)
                                          @foreach($errors->all() as $error)
                                            <p class="alert alert-success">{{$error}}</p>
                                          @endforeach
                                        @endif
                                        <h6>Free Video Details</h6>
                                        <hr>
                                        <div class="form-group row">
                                            <div class="col-md-3 col-lg">
                                                <label for="fname">Course</label>
                                                <select class="form-control select2" name="course" required="">
                                                    <option value="">Choose Course*</option>
                                                    @foreach($course as $courses)
                                                     <option value="{{ $courses->id }}">{{ $courses->coursename }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Video Link/URL*</label>
                                                <input type="text" class="form-control" placeholder="Enter Video Link/URL here" name="url" value="" required="">

                                            </div>
                                            <div class="col-md-4 col-lg">
                                                <label for="fname">Video Caption</label>
                                                <input type="text" class="form-control" placeholder="Enter Video Caption here" name="videocaption" value="">

                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-lg">
                                                <label for="fname">Description</label>
                                                 <textarea name="description" class="form-control" rows="7" cols="80" placeholder="Video Description Added Here..">
                                                    
                                                </textarea>
                                                
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>

                                        <div class="form-group row">
                                              <div class="col-md-4">
                                                <label for="exampleInputFile">Enter Code Here(Case Sensitive)</label>
                                                <input type="text" class="form-control" name="captcha" id="captcha" required="" onclick="codehide();">
                                                <label for="exampleInputFile" id="invalid" style=" color: red; display: none;">Invalid Code</label>
                                              </div>
                                              <div class="col-md-4">
                                                <label for="exampleInputFile">Captcha</label>
                                                <div class="clearfix"></div>
                                                <label for="exampleInputFile" id="orgCode" style=" font-size: 16px; color: red; margin-right: 10px; text-transform: none;"></label>
                                                <button type="button" onClick="randomString();" class="btn btn-warning"> <i class="fa fa-circle-notch"></i></button>
                                              </div>
                                             
                                              <div class="col-md-4">
                                               
                                              </div>
                                          </div>

                                        <input type="hidden" name="created" value="<?php echo date('Y-m-d'); ?>">
                                        <input type="hidden" name="year" value="<?php echo date('Y'); ?>">

                                        <input type="hidden" name="instid" value="{{ Auth::user()->instid }}">

                                        <input type="hidden" name="regtime" value="<?php echo time(); ?>">

                                        <!-- Added & Updated by starts here -->
                                        
                                        <input type="hidden" name="addedby" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="updatedby" value="">
                                        <input type="hidden" name="updatedon" value="">
                                        
                                    </div>
                                    <div class="card-body text-center">

                                        <input type="submit" class="btn btn-success" value="Save Video"/>
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
    </script>

    <!--                 CAPTCHA SCRIPT STARTS FROM HEERE                   -->

<script>
  $(document).ready(function(){
        var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
        var string_length = 8;
        var randomstring = '';
        for (var i=0; i<string_length; i++) {
          var rnum = Math.floor(Math.random() * chars.length);
          randomstring += chars.substring(rnum,rnum+1);
        }
        document.getElementById('orgCode').innerHTML = randomstring;
      });
  function randomString()
  {
      var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
        var string_length = 8;
        var randomstring = '';
        for (var i=0; i<string_length; i++) {
          var rnum = Math.floor(Math.random() * chars.length);
          randomstring += chars.substring(rnum,rnum+1);
        }
        document.getElementById('orgCode').innerHTML = randomstring;
  }

  $('#orgCode').bind('copy paste',function(e) {
    e.preventDefault(); return false;
  });

  function validateForm()
  {
    var captcha = $('#orgCode').text();
    var code = $('#captcha').val();

   if(captcha == code)
   {
    return true;
   }
   else
    {
      document.getElementById('captcha').value = '';
      $("#invalid").css("display", "block");

      var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
      var string_length = 8;
      var randomstring = '';
      for (var i=0; i<string_length; i++) {
          var rnum = Math.floor(Math.random() * chars.length);
          randomstring += chars.substring(rnum,rnum+1);
        }
      document.getElementById('orgCode').innerHTML = randomstring;
      return false;
    }
  }

  function codehide()
  {
    $("#invalid").css("display", "none");
  }
</script>

<!--                 CAPTCHA SCRIPT ENDS HEERE                   -->
</body>

</html>