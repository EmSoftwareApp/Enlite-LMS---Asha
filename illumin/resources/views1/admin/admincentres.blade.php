<?php $i =1; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} Admin | Centres</title>

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
                            <h4 class="m-0">All Centres</h4>
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
                                        <div class="search-form search-form--light m-3" style=" max-width: 30%; float: right;">
                                            <input type="text" class="form-control search" placeholder="Search">
                                            <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                        </div>

                                        <table class="table mb-0 thead-border-top-0" id="example2">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%;">No</th>
                                                    <th style="width: 40%;">Centre Name</th>
                                                    <th style="width: 15%;">Contact</th>
                                                    <th style="width: 15%;">Email</th>
                                                    <th style="width: 5%;">Approve</th>
                                                    <th style="width: 5%;">Active</th>
                                                    <th style="width: 10%;">Settings</th>
                                                    <th style="width: 5%;">Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody class="list" id="staff">

                                                @foreach($data as $object)
                                            
                                                <tr class="selected">
                                                    <td>{{ $i }}</td>
                                                    <td>
                                                        <div class="media align-items-center">
                                                            <div class="media-body">
                                                                <span class="js-lists-values-employee-name">{{ $object->name }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="media align-items-center">
                                                            <div class="media-body">
                                                                <span class="js-lists-values-employee-name">{{ $object->contact }}</span>
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
                                                    <td align="center">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="" id="myCheck{{$i}}" onchange="myFunction({{ $i }}, {{ $object->id }})" @if($object->status == '1') checked="checked" @endif>
                                                            
                                                        </div>
                                                    </td>
                                                    {{ csrf_field() }}
                                                    <td align="center">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="radio"  class="chkbox" id="chkbox{{ $object->id }}" @if($object->center_active == '0') onclick="ActiveFunction(this.value)" @endif value="{{ $object->id }}" @if($object->center_active == '1') checked="checked" @endif @if($object->status == '0')  disabled="" @endif>
                                                            
                                                        </div>
                                                    </td>
                                                    <td><a href="{{ url('/basic-settings/'.$object->id) }}" style="text-decoration: none;"><span class="badge badge-warning">Basic Settings</span></td>
                                                    <td align="center">
                                                        <a href="" class="text-muted">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{{ url('admin-inst-remove/'.$object->id) }}" class="text-muted" onclick="return confirm('Are you sure to Delete??');">
                                                            <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    

                                </div>
                            </div>
                        </div>

                       
                    </div>

                </div>
                <!-- // END drawer-layout__content -->

                @include('includes/adminmenu')
                
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
    <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
    function myFunction(x, y) {
                                          
        // Get the checkbox
        var checkBox = document.getElementById("myCheck"+x);
        var db_id = y;
        var token = $("input[name='_token']").val();
                                          
        // If the checkbox is checked, display the output text
        if (checkBox.checked == true){
            if(db_id != '')
            {
                $.ajax({

                    url: "<?php echo route('centre-approve') ?>",
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

                    url: "<?php echo route('centre-reject') ?>",
                    method: 'POST',
                    data: {db_id:db_id,  _token:token},
                    success: function(data) {
                        //alert(data);
                    }
                });
            }
        }
    }
    function ActiveFunction(x)
    {   
        var token = $("input[name='_token']").val();
        if(x != '')
        {
            $.ajax({

                url: "<?php echo route('centre-active') ?>",
                method: 'POST',
                data: {db_id:x,  _token:token},
                success: function(data) {
                    //alert(data);
                }
            });
            $('.chkbox').attr('checked', false);
            $('#chkbox'+x).attr('checked', true);
        }
    }
</script>
</body>

</html>