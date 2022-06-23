<?php $i =1; ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="_token" content="{{csrf_token()}}" />
    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Coordinator Management</title>



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
    

    <!-- ion Range Slider -->

    <link type="text/css" href="{{ asset('assets/css/vendor-ion-rangeslider.css') }}" rel="stylesheet">

    <link type="text/css" href="{{ asset('assets/css/vendor-ion-rangeslider.rtl.css') }}" rel="stylesheet">



    <link rel="stylesheet" type="text/css" href="{{ asset('assets/media/css/jquery.dataTables.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/resources/syntax/shCore.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/resources/demo.css') }}">



    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Font Awesome FREE Icons -->

    <link type="text/css" href="{{ asset('assets/css/vendor-fontawesome-free.css') }}" rel="stylesheet">

    <link type="text/css" href="{{ asset('assets/css/vendor-fontawesome-free.rtl.css') }}" rel="stylesheet">

    

</head>



<body class="layout-default">
<div id="uploadModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

   
    <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
        <h4 class="modal-title">Reject with comments</h4>
      </div>
      <div class="modal-body">
      
	  
	  <form id="uploadForm" action="{{url('/reject-wprogram')}}" method="post">
       {{ csrf_field() }}
	   <input type="hidden" name="wsid" id="wsid" value="">


<textarea name="comments" class="form-control"></textarea><br/>
<input type="submit" value="Submit" class="btnSubmit" name="btnSubmit" />
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="uploadModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

   
    <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
        <h4 class="modal-title">Upload Corrected Answer PDF</h4>
      </div>
      <div class="modal-body">
      
	  
	  <form id="uploadForm" action="{{url('upload_answerpdf')}}" method="post" enctype="multipart/form-data">
       {{ csrf_field() }}
	   <input type="hidden" name="wsid" id="wsid">
<div class="form-group">
                    <label foCourser="student_name" class="col-sm-3 control-label">Mark</label>

                  <div class="col-sm-9">
<input name="mark" type="text" class="form-control"  value=""/>
</div>
</div>

<div class="form-group">
                    <label foCourser="student_name" class="col-sm-3 control-label">Answer PDF</label>

                  <div class="col-sm-9">
<input name="userImage" type="file" class="inputFile" />
</div></div>
<div class="form-group">
<div class="col-sm-9">
<input type="submit" value="Submit" class="btnSubmit btn btn-info" /></div></div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




    <!-- Header Layout -->

    <div class="mdk-header-layout js-mdk-header-layout">



        <!-- Header -->



        @include('includes/facultyheader')



        <!-- // END Header -->



        <!-- Header Layout Content -->

        <div class="mdk-header-layout__content">



            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">

                <div class="mdk-drawer-layout__content page">







                    <div class="container-fluid page__heading-container">

                        <div class="page__heading d-flex align-items-center justify-content-between">

                            <h4 class="m-0">Coordinator Management</h4>



                           

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

                                            <section>

                                                <table id="example" class="display" style="width:100%">

                                                    <thead>

                                                        <tr>

                                                            <th style="width: 5%;">No</th>

                                                            <th style="width: 20%;">Name</th>

                                                            <th style="width: 20%;">Email</th>

                                                            <th style="width: 15%;">Program</th>

                                                            <th style="width: 15%;">Attempted</th>

                                                            <th style="width: 15%; text-align: center;">Up</th>

                                                            <th style="width: 5%;">Cr</th>
                                                            <th style="width: 5%;">Mark</th>
                                                            <th style="width: 5%;">Status</th>
                                                            
                                                            <th style="width: 5%; text-align: center;">Action</th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                        @foreach($data as $object)

                                                        {{ csrf_field() }}

                                                        <tr>

                                                            <td align="center">{{ $i }}</td>

                                                            <td>

                                                                <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name" style=" color: #202fe8; font-weight: bold;">{{ $object->name }}</span>

                                                                    </div>

                                                                </div>

                                                            </td>

                                                            

                                                            <td>

                                                                <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name">{{ $object->email }}</span>

                                                                    </div>

                                                                </div>

                                                            </td>

                                                            <td>

                                                                <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name">{{ $object->title }}  </span>

                                                                    </div>

                                                                </div>

                                                            </td>

                                                            

                                                            <td>

                                                                <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name">{{ $object->ques }}</span>

                                                                    </div>

                                                                </div>

                                                            </td>

                                                            



                                                            <td >

                                                               <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name"><a href="{{ url($object->sanswer_pdf) }}" target="_blank"><i class="fa fa-download"></i></a></span>

                                                                    </div>

                                                                </div>

                                                            </td>

                                   

                                                              <td >

                                                               <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name">@if($object->fanswer_pdf!='') <a href="{{ url($object->fanswer_pdf) }}" target="_blank"><i class="fa fa-download"></i></a>@endif</span>

                                                                    </div>

                                                                </div>

                                                            </td>

                                                            {{ csrf_field() }}

                                                           

                                                            <td >

                                                               <div class="media align-items-center">

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name">{{$object->mark }}</span>

                                                                    </div>

                                                                </div>

                                                            </td>
                                                             <td >
<?php if($object->wstatus=='1')
$status='Accepted';
else if($object->wstatus=='2')
 $status='Rejected';
else if($object->wstatus=='0')
$status='Uploaded';
else if($object->wstatus=='3')
$status='ReUploaded';
else
$status='Not Uploaded';
?>

                                                                    <div class="media-body">

                                                                        <span class="js-lists-values-employee-name">{{$status }}</span>

                                                                    </div>

                                                                </div>

                                                            </td>

                                                             
                                                             
                                                             <td >

                                                               <div class="media align-items-center">

                                                                    <div class="media-body">
 {{ csrf_field() }}
                                                                        <span class="js-lists-values-employee-name">
                                                                        <a title="Upload Corrected File" href="#" data-id="{{$object->writing_id}}" data-toggle="modal" data-target="#uploadModal"><i class="fa fa-upload"></i></a>@if($object->wstatus=='0' || $object->wstatus=='3')<a title="accept" class="btn btn-dark btn-xs" href="{{ url('/accept-wprogram/'.$object->writing_id) }}"><button class="btn btn-default" style="padding: 2px;
    width: 25px;"><i class="fa fa-check-circle"></i></button></a>&nbsp;<a class="btn btn-dark btn-xs" title="reject" href="#" data-id="{{$object->writing_id}}" data-toggle="modal" data-target="#uploadModal1"><button class="btn btn-default" style="padding: 2px;
    width: 25px;"><i class="fa fa-ban"></i></button></a>@endif @if($object->wstatus=='1')<a class="btn btn-dark btn-xs" href="#" ><button class="btn btn-success" style="padding: 2px;
    width: 25px;"><i class="fa fa-check-circle"></i></button></a>@endif @if($object->wstatus=='2')<a class="btn btn-dark btn-xs" href="#" ><button class="btn btn-danger" style="padding: 2px;
    width: 25px;"><i class="fa fa-ban"></i></button></a>@endif</span>

                                                                    </div>

                                                                </div>

                                                            </td>
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



                @include('includes/facultymenu')

                

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

</script>
<script>
$('#uploadModal').on('show.bs.modal', function(e) {
    var userid = $(e.relatedTarget).data('id');
    $(e.currentTarget).find('input[name="wsid"]').val(userid);
});
</script>
<script type="text/javascript">
        function set_status(status,task)
		{
		
		//alert(company);
		$.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
		 $.ajax
    ({
        method: "POST",
        url: "{{ url('/set_status')}}",
        //dataType: 'json',
		//data:'_token = <?php echo csrf_token() ?>',
        data: {status: status,
		task: task},
        success: function(msg)
        {
		alert(msg);
        //$("#due_date").val(msg.due_date);
        }
    });
		}
        </script>
<script>

    function myFunction(x, y) {

                                          

        // Get the checkbox

        var checkBox = document.getElementById("myCheck"+x);

        var db_id = y;

        var token = $("input[name='_token']").val();

        //    alert(token);                               

        // If the checkbox is checked, display the output text

        if (checkBox.checked == true){

            if(db_id != '')

            {

                $.ajax({



                    url: "<?php echo route('coordinator-approve') ?>",

                    method: 'POST',

                    data: {db_id:db_id,  _token:token},

                    success: function(data) {

                        //alert(data);

                    }

                });

            }

        } else {

            if(db_id != '')

            {

                $.ajax({



                    url: "<?php echo route('coordinator-reject') ?>",

                    method: 'POST',

                    data: {db_id:db_id,  _token:token},

                    success: function(data) {

                        //alert(data);

                    }

                });

            }

        }

    }



    // Featured settings Starts here



    function feaFunction(x, y) {

                                          

        // Get the checkbox

        var checkBox = document.getElementById("feaCheck"+x);

        var db_id = y;

        var token = $("input[name='_token']").val();

        // If the checkbox is checked, display the output text

        if (checkBox.checked == true){

            if(db_id != '')

            {

                $.ajax({



                    url: "<?php echo route('feat-pgm-approve') ?>",

                    method: 'POST',

                    data: {db_id:db_id,  _token:token},

                    success: function(data) {

                        //alert(data);

                    }

                });

            }

        } else {

            if(db_id != '')

            {

                $.ajax({



                    url: "<?php echo route('feat-pgm-reject') ?>",

                    method: 'POST',

                    data: {db_id:db_id,  _token:token},

                    success: function(data) {

                        //alert(data);

                    }

                });

            }

        }

    }

</script>
<style>
#example td
{
text-align:center;
}
.btn-dark
{
padding:0px!important;
background-color:none!important;
background:none!important;
}
</style>
</body>



</html>