@foreach($data as $object)
@endforeach
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Feed Management</title>

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
<link href="{{ asset('assets/css/material-design-icons/material-icon.css') }}" rel="stylesheet" type="text/css" />
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
<link type="text/css" href="{{ asset('assets/vendor/summernote/summernote.css') }}" rel="stylesheet">

<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/material/material.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/material_style.css') }}">
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
                            <h4 class="m-0">Update Feed</h4>

                            <a href="{{ url('/feeds') }}"><button type="button" class="btn btn-warning"><i class="fa fa-step-backward"></i>&nbsp;Back</button></a>
                        </div>
                    </div>

                    <div class="container-fluid page__container">
                        <div class="row no-gutters">
                            <div class="col-md-12">
                                <div class="card">
                                  <form action="{{ url('/update-feed') }}" id="form_sample_1" method="post" enctype="multipart/form-data" >
                                  {{ csrf_field() }}
                                    <div class="card-form__body card-body">
                                        @if(count($errors)>0)
                                          @foreach($errors->all() as $error)
                                            <p class="alert alert-success">{{$error}}</p>
                                          @endforeach
                                        @endif
                                        <div class="form-group row">
                                            <div class="col-5">
                                                

                                                    <label for="eventcategoryfname">Feed Category</label>
                                                <select  id="category" class="form-control select2" name="category">
                                                    <!--<option value="{{ $object->category }}">{{ $object->category }}</option>-->
                                                     @foreach($feedcat as $feedcat)
                                                     <option value="{{ $feedcat->category }}" @if($feedcat->category==$object->category) selected="" @endif>{{ $feedcat->category }}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="title">Title</label>
                                                <input id="title" type="text" class="form-control" placeholder="Enter Title here" name="title" value="{{ $object->title }}" required="">
                                            </div>
                                            
                                        </div>
                                        <!--<div class="form-group row">-->
                                        <!--    <div class="col-5">-->
                                        <!--        <label for="tumbimage">Upload Thumbnail image</label>-->
                                        <!--        <input id="tumbimage" type="file" class="form-control" placeholder="Upload thumbnail image here" name="tumbimage"  >-->
                                                
                                        <!--    </div>-->
                                        <!--    <div class="col-6">-->

                                        <!--        <label for="realimage"> Feed Image</label>-->
                                        <!--        <input id="realimage" type="file" class="form-control" placeholder="Upload Feed image here" name="realimage" >-->

                                        <!--    </div>-->
                                            
                                        <!--</div>-->
                                        
                                        
                                        
                                            <div class="row">
                                                    
                                                    
                                                    
                                                     <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="image">Thumbnail Image</label>
                                                            <div id="uploadFile_div">
                                                            <input id="fileUpload" type="file" class="form-control" placeholder="Upload Image here" name="tumbimage" onChange="checkFileDetails()"  />
                                                        </div>
                                                         <input type="hidden" name="thumb_img" value="{{ $object->tumbimage }}">
                                                 <img src="/{{ $object->tumbimage }}" width="50px" height="50px">

                                                        </div>
                                                        <!--  <input type="button" value="Upload"  /> -->
                                                    </div>
                                                        
                                                        
                                                         <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="image">Feed Image</label>
                                                            <div id="uploadFile_div1">
                                                            <input id="fileUpload1" type="file" class="form-control" placeholder="Upload Image here" name="realimage" onChange="checkFileDetailss()"  />
                                                        </div>
                                                   <input type="hidden" name="orginal_img" value="{{ $object->realimage }}">
                                                   
                                                   <img src="/{{ $object->realimage }}" width="50px" height="50px">

                                                        </div>

                                                       <!--  <input type="button" value="Upload"  /> -->
                                                    </div>
                                                    
                                                    </div>
                                                    <div class="row">
                                                         <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="author">Author(Optional)</label>
                                                            <input id="author" type="text" class="form-control" placeholder="Enter Author Name here" name="author" value="{{ $object->author }}"/>
                                                        </div>
                                                        </div>
                                                       
                                                        
                                                         <div class="col-5">
                                                        <div class="form-group">
                                                            <label for="author">Artilce Link (Optional)</label>
                                                            <input id="author" type="text" class="form-control" placeholder="Enter Author Name here" name="articlelink" value="{{ $object->articlelink }}"/>
                                                        </div>

                                                        </div>
                                                    
                                                    
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="image">Publishing Date</label>
                                                            <div id="uploadFile_div">
                                                            <input id="pdate" type="date" class="form-control" placeholder="Upload Image here" name="pdate" value="{{ $object->pdate }}"  required/>
                                                        </div>



                                                        </div>
                                                        <!--  <input type="button" value="Upload"  /> -->
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    

                                                </div>
                                                
                                                
                                                
                                                
                                                        <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <label for="fname">PDF</label>
                                                           
                                                             <div id="uploadFile_div1">
                                                            <input id="pdf1" type="file" class="form-control" placeholder="Upload PDF here" value="{{ $object->pdf }}" name="pdf1" />

                                                            <input type="hidden" name="oldpdf" value="{{ $object->pdf }}">
                                                            
                                                          <span class="item-blue">
                                                             
                                            	
										  	<a href="/{{ $object->pdf }}" target="_blank"><b><font color="black">Old PDF</b></font></a></span>

                                              
                                                        </div>
                                                    </div>
                                                </div>

                                                  
                                                  


                                            </div>
                                            <div class="row">

                                                    <div class="col-11">

                                                        <div class="form-group">

                                                            <label for="fname">Labels</label>

                                                           



      <select data-placeholder="Choose Labels" name="labels"  class="chosen-select form-control select2" >

                        @foreach($feedlabels as $feedlabel)

                            
                           
                              <option value="{{ $feedlabel->id }}" @if($object->labelid==$feedlabel->id) selected="" @endif>{{ $feedlabel->labels}}</option>
                            



                                                    @endforeach

 

                        </select>

                        <div id="output"></div>

                                                

                                               

                                                        </div>

                                                    </div>

                                                </div>
                                        <!--<div class="form-group row">-->
                                        <!--    <div class="col-md-12 col-lg">-->
                                        <!--        <label for="fname"></label>-->
                                              
<div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="fname">Feed Description</label>
                                                <textarea id="editor2" class="form-control" rows="5" cols="40" placeholder="Enter description here" name="description">{{ $object->description }} </textarea>
                                            <!--</div>-->
                                            
                                            
                                              </div>

                                                        
                                                    </div>
                                                </div>
                                          <div class="row">      
                                                
                                            <div class="col-md-6 col-lg">
                                                <label for="fname">&nbsp;</label>
                                                <div class="clearfix"></div>
                                                <input type="submit" class="btn btn-success" value="Save Change"/>
                                            </div>
                                            
                                        </div>

                                        <input type="hidden" name="id" value="{{ $object->id }}">
                                    </div>
                                    <div class="card-body text-center">

                                        
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
    <script src="{{ asset('assets/vendor/material/material.min.js') }}"></script>
<script src="{{ asset('assets/vendor/summernote/summernote.js') }}"></script>
	<script src="{{ asset('assets/js/pages/summernote/summernote-data.js') }}"></script>
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
    
    
            <script>
    function checkFileDetails() {
        // alert('hai');
        var fi = document.getElementById('fileUpload');
        var isValid = false;
        if (fi.files.length > 0) {           
            for (var i = 0; i <= fi.files.length - 1; i++) {
                var fileName, fileExtension, fileSize, fileType, dateModified;
                fileName = fi.files.item(i).name;
                fileExtension = fileName.replace(/^.*\./, '');
                if (fileExtension == 'png' || fileExtension == 'jpg' || fileExtension == 'jpeg') {
                   readImageFile(fi.files.item(i));
                }
            }

            function readImageFile(file) {
                var reader = new FileReader(); // CREATE AN NEW INSTANCE.

                reader.onload = function (e) {
                    var img = new Image();      
                    img.src = e.target.result;

                    img.onload = function () {
                        var w = this.width;
                        var h = this.height;
                        if(w == 278 && h == 198)
                        {
                            isValid = true;
                        }
                        else
                        {
                            document.getElementById("uploadFile_div").innerHTML =document.getElementById("uploadFile_div").innerHTML;

                            alert("Image size must be 278 x 198px.. Please upload an IMAGE I with specified dimension otherwise the old image will be uploaded");
                        }
                    }
                };
                reader.readAsDataURL(file);
            }
        }
        return isValid;
    }
   function Upload() {
    //Get reference of FileUpload.
    // var fileUpload = document.getElementById("fileUpload");
 
    // //Check whether the file is valid Image.
    // var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
    // if (regex.test(fileUpload.value.toLowerCase())) {
 
    //     //Check whether HTML5 is supported.
    //     if (typeof (fileUpload.files) != "undefined") {
    //         //Initiate the FileReader object.
    //         var reader = new FileReader();
    //         //Read the contents of Image File.
    //         reader.readAsDataURL(fileUpload.files[0]);
    //         reader.onload = function (e) {
    //             //Initiate the JavaScript Image object.
    //             var image = new Image();
 
    //             //Set the Base64 string return from FileReader as source.
    //             image.src = e.target.result;
                       
    //             //Validate the File Height and Width.
    //             image.onload = function () {
    //                 var height = this.height;
//                     var width = this.width;
//                     alert(height,width);

//                     return false;
                    
//                   };
 
//             }
//         } else {
//             alert("This browser does not support HTML5.");
//             return false;
//         }
//     } else {
//         alert("Please select a valid Image file.");

//         return false;
//     }
// }

 var myImg = document.querySelector("#fileUpload");
        var currWidth = myImg.clientWidth;
        var currHeight = myImg.clientHeight;
        alert("Current width=" + currWidth + ", " + "Original height=" + currHeight);



return false;
}

       
</script>
   
   
       
    <script>
    function checkFileDetailss() {
        // alert('hai');
        var fi = document.getElementById('fileUpload1');
        var isValid = false;
        if (fi.files.length > 0) {           
            for (var i = 0; i <= fi.files.length - 1; i++) {
                var fileName, fileExtension, fileSize, fileType, dateModified;
                fileName = fi.files.item(i).name;
                fileExtension = fileName.replace(/^.*\./, '');
                if (fileExtension == 'png' || fileExtension == 'jpg' || fileExtension == 'jpeg') {
                   readImageFile(fi.files.item(i));
                }
            }

            function readImageFile(file) {
                var reader = new FileReader(); // CREATE AN NEW INSTANCE.

                reader.onload = function (e) {
                    var img = new Image();      
                    img.src = e.target.result;

                    img.onload = function () {
                        var w = this.width;
                        var h = this.height;
                        if(w == 750 && h == 450)
                        {
                            isValid = true;
                        }
                        else
                        {
                            document.getElementById("uploadFile_div1").innerHTML =document.getElementById("uploadFile_div1").innerHTML;

                            alert("Image size must be 700 x 200px.. Please upload an IMAGE II with specified dimension otherwise the old image will be uploaded");
                        }
                    }
                };
                reader.readAsDataURL(file);
            }
        }
        return isValid;
    }
   function Upload() {
    //Get reference of FileUpload.
    // var fileUpload = document.getElementById("fileUpload");
 
    // //Check whether the file is valid Image.
    // var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
    // if (regex.test(fileUpload.value.toLowerCase())) {
 
    //     //Check whether HTML5 is supported.
    //     if (typeof (fileUpload.files) != "undefined") {
    //         //Initiate the FileReader object.
    //         var reader = new FileReader();
    //         //Read the contents of Image File.
    //         reader.readAsDataURL(fileUpload.files[0]);
    //         reader.onload = function (e) {
    //             //Initiate the JavaScript Image object.
    //             var image = new Image();
 
    //             //Set the Base64 string return from FileReader as source.
    //             image.src = e.target.result;
                       
    //             //Validate the File Height and Width.
    //             image.onload = function () {
    //                 var height = this.height;
//                     var width = this.width;
//                     alert(height,width);

//                     return false;
                    
//                   };
 
//             }
//         } else {
//             alert("This browser does not support HTML5.");
//             return false;
//         }
//     } else {
//         alert("Please select a valid Image file.");

//         return false;
//     }
// }

 var myImg = document.querySelector("#fileUpload");
        var currWidth = myImg.clientWidth;
        var currHeight = myImg.clientHeight;
        alert("Current width=" + currWidth + ", " + "Original height=" + currHeight);



return false;
}

       
</script>

</body>

</html>