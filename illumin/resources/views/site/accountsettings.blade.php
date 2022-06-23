@foreach($data as $object)

@endforeach

<!DOCTYPE html>

<html lang="en" dir="ltr">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Account Settings</title>



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



    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
     <!-- Flatpickr -->

    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr.css') }}" rel="stylesheet">

    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr.rtl.css') }}" rel="stylesheet">

    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr-airbnb.css') }}" rel="stylesheet">

    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr-airbnb.rtl.css') }}" rel="stylesheet">

</head>



<body class="layout-fixed layout-sticky-subnav">





    <div class="preloader"></div>



    <!-- Header Layout -->

    <div class="mdk-header-layout js-mdk-header-layout">



        <!-- Header -->



        @include('includes/siteheader')



        <!-- // END Header -->



        <!-- Header Layout Content -->

        <div class="mdk-header-layout__content page">

            @include('includes/sitemenu')





            <div class="container page__heading-container">

                <div class="page__heading d-flex align-items-center justify-content-between">



                    <h4 class="m-0">Account Settings</h4>

                </div>

            </div>



            <form action="{{ url('/update-account') }}" id="form_sample_1" method="post" enctype="multipart/form-data" >

                {{ csrf_field() }}

	            <div class="container page__container">

	                <div class="card card-form">

	                    <div class="row no-gutters">

	                        <div class="col-lg-4 card-body">

	                            <p><strong class="headings-color">Account Information & Profile Settings</strong></p>

	                            <p class="text-muted mb-0">Edit your account details and settings.</p>

	                        </div>

	                        <div class="col-lg-8 card-form__body card-body">

	                            @if(count($errors)>0)

	                                @foreach($errors->all() as $error)

	                                    <p class="alert alert-success">{{$error}}</p>

	                                @endforeach

	                    		@endif

	                            <div class="row">

	                                <div class="col">

	                                    <div class="form-group">

	                                        <label for="fname">Student name*</label>

	                                        <input id="fname" type="text" name="name" class="form-control" placeholder="Enter Student name here" value="{{ $object->name }}"  required="">

	                                    </div>

	                           		</div>

	                                            

	                            </div>
                                 <div class="row">

	                                <div class="col">

	                                    <div class="form-group">

	                                        <label for="fname">Gender*</label>

	                                        <select name="gender" class="form-control" required>

	                                        	<option value="" @if($object->gender == '') selected="selected" @endif>Choose Gender</option>

	                                        	
                                                <option value="Male" @if($object->gender == 'Male') selected="selected" @endif>Male</option>
                                                <option value="Female" @if($object->gender == 'Female') selected="selected" @endif>Female</option>

                                               

	                                        </select>

	                                    </div>

	                           		</div>
                                    <div class="col">

	                                    <div class="form-group">

	                                        <label for="fname">Date of Birth*</label>

	                                        <input id="" type="text" name="dob" class="form-control"  data-toggle="flatpickr" value="{{ $object->dob }}">

	                                    </div>

	                           		</div>

	                                            

	                            </div>
								
	                            <div class="row">

	                                <div class="col">

	                                    <div class="form-group">

	                                        <label for="fname">Landphone Number*</label>

	                                        <input name="lcontact" type="text" class="form-control" placeholder="Enter Lanphone Number here" required="" maxlength="11" minlength="11" onKeyPress="return isNumberKey(event)" value="{{ $object->lcontact }}">

	                                    </div>

	                                </div>

		                            <div class="col">

	                                    <div class="form-group">

	                                        <label for="fname">Mobile Number*</label>

	                                        <input name="contact" type="text" class="form-control" placeholder="Enter Mobile here" required="" maxlength="10" minlength="10" onKeyPress="return isNumberKey(event)" value="{{ $object->contact }}">

	                                    </div>

	                                </div>

		                        </div>
<div class="row">
<div class="col">

		                                <div class="form-group">

		                                    <label for="lname">Email*</label>

		                                    <input id="lname" type="email" name="email" class="form-control" placeholder="Enter Email here" required="" value="{{ $object->email }}">

		                                </div>

		                            </div>
	                                <div class="col">

	                                    <div class="form-group">

	                                        <label for="fname">Guardian name*</label>

	                                        <input id="gname" type="text" name="gname" class="form-control" placeholder="Enter Guardian name here" value="{{ $object->gname }}"  required="">

	                                    </div>

	                           		</div>

	                                            

	                            </div>
		                        <div class="form-group">

		                            <label for="desc">Address</label>

		                            <textarea name="address" rows="4" class="form-control" placeholder="Enter Student Address here ...">{{ $object->address }}</textarea>

		                        </div>

	                            <div class="row">

	                                <div class="col">

	                                    <div class="form-group">

	                                        <label for="fname">PIN code*</label>

	                                        <input name="pin" type="text" class="form-control" placeholder="Enter Pincode here" required="" minlength="6" onKeyPress="return isNumberKey(event)" value="{{ $object->pin }}">

	                                    </div>

	                                </div>

		                            <div class="col">

	                                    <div class="form-group">

	                                        <label for="fname">Whatsapp Number</label>

	                                        <input name="whatsapp" type="text" class="form-control" placeholder="Enter Whatsapp here" maxlength="10" minlength="10" onKeyPress="return isNumberKey(event)" value="{{ $object->whatsapp }}">

	                                    </div>

	                                </div>

		                        </div> 



		                        <div class="row">

	                                <div class="col">

	                                    <div class="form-group">

	                                        <label for="fname">State</label>

	                                        <select name="state" class="form-control" onChange="ajxclevel2find(this.value);">

	                                        	<option value="" @if($object->state == '') selected="selected" @endif>Choose State</option>

	                                        	@foreach($state as $states)

                                                <option value="{{ $states->id }}" @if($object->state == $states->id) selected="selected" @endif>{{ $states->state }}</option>

                                                @endforeach

	                                        </select>

	                                    </div>

	                                </div>

		                            <div class="col">

	                                    <div class="form-group">

	                                        <label for="fname">District</label>

	                                        <select name="district" class="form-control">

	                                        	@if($object->district == '')

	                                        	<option value="">Choose District</option>

	                                        	@else

	                                        	<option value="{{ $object->district }}">{{ App\Models\tblBasicSettings::distfind($object->district) }}</option>

	                                        	@endif

	                                        </select>

	                                    </div>

	                                </div>

		                        </div>  

		                        <div class="row">

	                                <div class="col">

	                                    <div class="form-group">

	                                        <label for="fname">Profile Picture</label>

	                                        <div class="clearfix"></div>

	                                        <input type="file" name="image1">

	                                    </div>

	                                </div>

		                            <div class="col">

	                                    <div class="form-group">

	                                        @if($object->image != '')

		                                        <label for="fname">Current Profile Picture</label>

		                                         &nbsp; &nbsp;&nbsp;&nbsp;

		                                        <a href="{{ url('/remove-profile-pic/'.$object->id) }}" onClick="return confirm('Are you sure to remove this Picture?');">

		                                            <i class="fa fa-trash-alt"></i>

		                                        </a>

		                                        <div class="clearfix"></div>

		                                        <?php $img = $object->image; ?>

		                                        <img src="<?php echo asset($img); ?>" alt="Profile" width="70" height="70" style="border-radius: 50%;" >

		                                              

		                                        

	                                        @endif

	                                    </div>

	                                </div>

	                                <input type="hidden" name="id" value="{{ $object->id }}">

	                                <input type="hidden" name="primage" value="{{ $object->image }}">

		                        </div>    
                                
                                <h4>Educational Qualifications</h4> 
                                <h6>SSC/Matric</h6>
                                <div class="row">
<div class="col">

		                                <div class="form-group">

		                                   
		                                    <input id="course" type="text" name="course" class="form-control" placeholder="Name of Course" value="{{ $object->course }}">

		                                </div>

		                            </div>
	                                <div class="col">

	                                    <div class="form-group">

	                                        <input id="board" type="text" name="board" class="form-control" placeholder="University / Board" value="{{ $object->board }}">

	                                    </div>

	                           		</div>

	                                <div class="col">

	                                    <div class="form-group">

	                                        <input id="syear" type="text" name="syear" class="form-control" placeholder="Year of Passing" value="{{ $object->syear }}">

	                                    </div>

	                           		</div>
                                    
                                    <div class="col">

	                                    <div class="form-group">

	                                        <input id="grade" type="text" name="grade" class="form-control" placeholder="Grade / Percentage" value="{{ $object->grade }}">

	                                    </div>

	                           		</div>            

	                            </div>  
                                <h6>Higher Education</h6>    
<div class="row">
<div class="col">

		                                <div class="form-group">

		                                   
		                                    <input id="course" type="text" name="hcourse" class="form-control" placeholder="Name of Course" value="{{ $object->hcourse }}">

		                                </div>

		                            </div>
	                                <div class="col">

	                                    <div class="form-group">

	                                        <input id="board" type="text" name="hboard" class="form-control" placeholder="University / Board" value="{{ $object->hboard }}">

	                                    </div>

	                           		</div>

	                                <div class="col">

	                                    <div class="form-group">

	                                        <input id="year" type="text" name="hyear" class="form-control" placeholder="Year of Passing" value="{{ $object->hyear }}">

	                                    </div>

	                           		</div>
                                    
                                    <div class="col">

	                                    <div class="form-group">

	                                        <input id="grade" type="text" name="hgrade" class="form-control" placeholder="Grade / Percentage" value="{{ $object->hgrade }}">

	                                    </div>

	                           		</div>            

	                            </div>
	                        </div>

	                    </div>

	                </div>

	                <div class="text-right mb-5">

	                    <input type="submit" name="btnsubmit" value="Save Changes" class="btn btn-success" />

	                </div>

	            </div>

            </form>

            @include('includes/sitefooter')

        </div>

        <!-- // END Header Layout Content -->



    </div>

    <!-- // END Header Layout -->

    

   

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


<!-- Flatpickr -->

    <script src="{{ asset('assets/vendor/flatpickr/flatpickr.min.js') }}"></script>

    <script src="{{ asset('assets/js/flatpickr.js') }}"></script>

    <!-- App Settings (safe to remove) -->

    <script src="{{ asset('assets/js/app-settings.js') }}"></script>



    <script type="text/javascript">

    	function ajxclevel2find(x)

          {

              var id_country = x;

              var token = $("input[name='_token']").val();



              $.ajax({

                  url: "<?php echo route('select-district-level') ?>",

                  method: 'POST',

                  data: {id_country:id_country, _token:token},

                  success: function(data) {

                    

                    $("select[name='district'").html('');

                    $("select[name='district'").html(data.options);

                  }

              });

          }

    </script>





</body>



</html>