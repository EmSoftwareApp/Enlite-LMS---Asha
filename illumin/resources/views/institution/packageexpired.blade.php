<?php
    $ser_year = Request::segment(2);
    $i =1; 
    $cur_url = URL::to('/');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Package Expired List</title>

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

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/media/css/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/resources/syntax/shCore.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/resources/demo.css') }}">

    <!-- Flatpickr -->
    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr.rtl.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr-airbnb.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-flatpickr-airbnb.rtl.css') }}" rel="stylesheet">

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
                            <h4 class="m-0">Package Expired List</h4>

                            <a href="{{ url('/new-batch') }}">
                                <!--<button type="button" class="btn btn-primary btn-sm">New Program</button>
                                <button type="button" class="btn btn-warning">
                                    <i class="fa fa-users-cog"></i> New Student Batch
                                </button>-->
                            </a>
                        </div>
                    </div>




                    <div class="container-fluid page__container">
                        <div class="card card-form">
                            <div class="row no-gutters">
                                <div class="col-lg-12 card-form__body">
                                    <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                                        @if(count($errors)>0)
                                              @foreach($errors->all() as $error)
                                                <p class="alert alert-success">{{$error}}</p>
                                              @endforeach
                                            @endif
                                        

                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="fname">Year</label>
                                                        <select class="form-control" id="year" onchange="yearselect();">
	                                                    	<option value="" @if($ser_year == '') selected="selected" @endif> Choose Year</option>
	                                                    	<?php 
	                                                    	$yr = date('Y');
	                                                    	for($j=$yr; $j>='2019'; $j--) { ?>
	                                                    	<option value="{{ $j }}" @if($ser_year == $j) selected="selected" @endif> {{ $j }}</option>
	                                                    	<?php } ?>
	                                                    </select>
                                                    </div>
                                                    <input type="hidden" name="cur_url" id="cur_url" value="{{ $cur_url }}">
                                                </div>
                                                
                                                
                                                <div class="col">
                                                    <div class="form-group">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col text-right">
                                                    <div class="form-group">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <section>
                                                <table id="example" class="display" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 5%;">No</th>
                                                            <th style="width: 25%;">Student Name</th>
                                                            <th style="width: 10%;">Contact</th>
                                                            <th style="width: 20%;">Program/Batch</th>
                                                            <th style="width: 15%;">Started On</th>
                                                            <th style="width: 20%;">End Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($data as $object)
                                                        
                                                        <tr>
                                                            <td align="center">{{ $i }}</td>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-body">
                                                                        <span class="js-lists-values-employee-name">{{ App\Models\tblBasicSettings::instname($object->studentid, 'name') }}</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <?php
                                                            	$tel = App\Models\tblBasicSettings::instname($object->studentid, 'contact');
                                                            ?>
                                                            <td align="center">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body">
                                                                        <span class="js-lists-values-employee-name"><a href="tel: {{ $tel }}"> {{ $tel }}</a></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-body">
                                                                        <span class="js-lists-values-employee-name">
                                                                        	@if($object->batchid != '')
                                                                        	{{ App\Models\tblBasicSettings::batchfind($object->batchid) }}
                                                                        	@elseif($object->pgmid != '')
                                                                        	{{ App\Models\tblBasicSettings::programfind($object->pgmid) }}
                                                                        	@endif
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-body">
                                                                        <span class="js-lists-values-employee-name">{{ Carbon\Carbon::parse($object->purchased_on)->format('j F Y') }}</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                             
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-body">
                                                                    	<input type="text" class="form-control" name="" value="{{ $object->pack_ends_on }}" data-toggle="flatpickr" onchange="packageextend(this.value, {{ $object->id }});">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            {{ csrf_field() }}
                                                            
                                                        </tr>
                                                        <?php $i++; ?>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </section>
                                        </div>
                                    </div>
                                    

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

    <!-- List.js -->
    <script src="{{ asset('assets/vendor/list.min.js') }}"></script>
    <script src="{{ asset('assets/js/list.js') }}"></script>

    <!--Date table files Starts here -->
    <script type="text/javascript" language="javascript" src="{{ asset('assets/media/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('assets/resources/syntax/shCore.js') }}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('assets/resources/demo.js') }}"></script>
    <script type="text/javascript" language="javascript" class="init">

    
    </script>
    <script>
  $(function () {
    $('#example1').DataTable()
    $('#example').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })

    $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();   
        });
    function yearselect()
    {
        var x = $("#year").val();
        var cur_url = $("#cur_url").val();

        if(x != '')
        {
            //window.location.href="/student-details-find/"+x;
            window.location.href=cur_url+'/package-expired-find/'+x;
        }
    }
</script>
<script>
   	function packageextend(x, y)
    {
    	var db_id = y;
        var token = $("input[name='_token']").val();

        if((x != '') && (y != ''))
        {
            $.ajax({

                url: "<?php echo route('packageextend') ?>",
                method: 'POST',
                data: {dt:x, id:db_id, _token:token},
                success: function(data) {
                    //    alert(data);
                }
            });
        }
    }
</script>
</body>

</html>