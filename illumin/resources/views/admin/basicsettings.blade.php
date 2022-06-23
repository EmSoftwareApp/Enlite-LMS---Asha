<?php $id = Request::segment(2); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} Admin | Basic Settings</title>

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

                            <h4 class="m-0">Basic Centre Settings</h4>

                            <a href="{{ url('/admin-centres') }}"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp;Back</button></a>
                        </div>
                    </div>

                    <div class="container-fluid page__container">
                        <div class="card card-form">
                            <div class="row no-gutters">
                                <div class="col-lg-4 card-body">
                                    <p><strong class="headings-color text-uppercase">{{ App\Models\tblBasicSettings::instname($id, 'name') }}</strong></p>
                                    <p class="text-muted mb-0">Basic Settings</p>
                                </div>
                                <div class="col-lg-8 card-form__body card-body">
                                    <div class="row">
                                        {{ csrf_field() }}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="subscribe1">Category</label><br>
                                                <?php $val1 = App\Models\tblBasicSettings::basettings($id, 'category'); ?>
                                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                                    <input type="checkbox" id="subscribe1" class="custom-control-input" onchange="myfunction('1', {{ $id }}, 'category')" @if($val1 > 0) checked="checked" @endif >
                                                    <label class="custom-control-label" for="subscribe1">Yes</label>
                                                </div>
                                                <label for="subscribe1" class="mb-0">Yes</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="subscribe2">Sub Category</label><br>
                                                <?php $val2 = App\Models\tblBasicSettings::basettings($id, 'subcategory'); ?>
                                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                                    <input type="checkbox" id="subscribe2" class="custom-control-input" onchange="myfunction('2', {{ $id }}, 'subcategory')" @if($val2 > 0) checked="checked" @endif >
                                                    <label class="custom-control-label" for="subscribe2">Yes</label>
                                                </div>
                                                <label for="subscribe2" class="mb-0">Yes</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="subscribe3">Super Sub Category</label><br>
                                                <?php $val3 = App\Models\tblBasicSettings::basettings($id, 'supersubcategory'); ?>
                                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                                    <input type="checkbox" id="subscribe3" class="custom-control-input" onchange="myfunction('3', {{ $id }}, 'supersubcategory')" @if($val3 > 0) checked="checked" @endif >
                                                    <label class="custom-control-label" for="subscribe3">Yes</label>
                                                </div>
                                                <label for="subscribe3" class="mb-0">Yes</label>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        
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
    <script>
        function myfunction(x, y, z)
        {
            var checkBox = document.getElementById("subscribe"+x);
            var id = y;
            var val = z;
            var token = $("input[name='_token']").val();
                                                                      
            // If the checkbox is checked, display the output text
            if (checkBox.checked == true){
                if(id != '')
                {
                    $.ajax({

                        url: "<?php echo route('basic-setting-add') ?>",
                        method: 'POST',
                        data: {id:id, val:val,  _token:token},
                        success: function(data) {
                            //alert(data);
                        }
                    });
                }
            } else {
                if(id != '')
                {
                    $.ajax({

                        url: "<?php echo route('basic-setting-remove') ?>",
                        method: 'POST',
                        data: {id:id, val:val,  _token:token},
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