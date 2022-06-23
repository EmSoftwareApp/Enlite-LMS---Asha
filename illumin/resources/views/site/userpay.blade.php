@foreach($data as $object)

@endforeach

<!DOCTYPE html>

<html lang="en" dir="ltr">


<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ App\Models\tblSystemSettigs::systemname('systemname') }} | Payment</title>



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



                    <h3 class="m-0">Payment Area</h3>

                </div>

            </div>



            <div class="container page__container">

                @if($object->program_status == '1')

                                @if(($object->offeramount != '') && ($object->offerstart != '') && ($object->offerend != ''))

                                    <?php 

                                        $date = date('Y-m-d');

                                        $of_from = $object->offerstart;

                                        $of_to = $object->offerend;

                                    ?>

                                    @if(($date >= $of_from) && ($date <= $of_to)) <!-- If any Offer Availavle -->

                                        <?php $pgm_amount = $object->offeramount; ?>

                                    @else

                                        <?php $pgm_amount = $object->amount; ?>

                                    @endif

                                </p>

                                @else

                                    <?php $pgm_amount = $object->amount; ?>

                                @endif

                            @else

                                <?php $pgm_amount = '0'; ?>

                            @endif

                <div class="alert alert-soft-warning d-flex align-items-center card-margin" role="alert">

                    <i class="material-icons mr-3">error_outline</i>

                    <div class="text-body">

                        You have a payment due for

                        <strong class="text-danger" style="font-size: 24px;">₹{{ number_format($pgm_amount) }}</strong>

                    </div>

                    <form action="{{ url('/payment') }}" method="POST" enctype="multipart/form-data" class="ml-auto">

                        {{ csrf_field() }}

                        <input type="hidden" name="purpose" id="purpose" value="{{ $object->programname. 'Payment' }}">

                        <input type="hidden" name="orderid" id="ordrid" value="<?php echo time(); ?>">

                        <input type="hidden" name="userid" id="userid" value="{{ Auth::user()->id }}">

                        <input type="hidden" name="amount" id="amount" value="{{ $pgm_amount }}">

                        <input type="hidden" name="pgmid" id="pgmid" value="{{ $object->id }}">

                        <input type="hidden" name="pgmregtime" id="pgmregtime" value="{{ $object->regtime }}">

                        <input type="hidden" name="user_name" id="user_name" value="{{ Auth::user()->name }}">

                        <input type="hidden" name="user_mobile" id="user_mobile" value="{{ Auth::user()->contact }}">

                        <input type="hidden" name="user_email" id="user_email" value="{{ Auth::user()->email }}">



                        <input type="submit" name="" class="btn btn-warning ml-auto" value="Pay Now!" />

                    </form>

                </div>



                <div class="card card-form">

                    <div class="row no-gutters">

                        <div class="col-lg-4 card-body">

                            <p><strong class="headings-color">Course Information</strong></p>

                            <p class="text-muted mb-0">This account is billed to:</p>

                        </div>

                        <div class="col-lg-8 card-form__body card-body">



                            <div class="d-flex align-items-center flex-wrap">

                                

                                <strong>{{ $object->programname }}</strong>

                                <div class="ml-auto">

                                    <a href="{{ url('/course-details/'.$object->id) }}"><button class="btn btn-danger"> Back</button>

                                </div>

                            </div>



                        </div>



                    </div>

                </div>







                <!--<div class="card card-form">

                    <div class="row no-gutters">

                        <div class="col-lg-4 card-body">

                            <p><strong class="headings-color">Previous Payments</strong></p>

                            <p class="text-muted mb-0">Your past payments</p>

                        </div>

                        <div class="col-lg-8 card-form__body">



                            <div class="table-responsive">

                                <table class="table mb-0">

                                    <thead>

                                        <tr>

                                            <th>Invoice</th>

                                            <th class="text-center">Amount</th>

                                            <th class="text-center">Status</th>

                                            <th class="text-center" style="width: 140px;">Date</th>

                                        </tr>

                                    </thead>

                                    <tbody class="list">



                                        <tr>

                                            <td>

                                                <a href="fixed-invoice.html">#<span>12199</span></a>

                                            </td>

                                            <td class="text-center">

                                                $49.00

                                            </td>

                                            <td class="text-center">

                                                <div class="badge badge-soft-warning">

                                                    DUE

                                                </div>

                                            </td>

                                            <td>



                                                <div class="d-flex align-items-center text-muted small">

                                                    <i class="material-icons icon-16pt mr-1">today</i>

                                                    25 May 2019

                                                </div>

                                            </td>

                                        </tr>

                                    </tbody>

                                </table>

                            </div>



                        </div>

                    </div>

                </div>-->



            </div>











            @include('includes/sitefooter')

        </div>

        <!-- // END Header Layout Content -->



    </div>

    <!-- // END Header Layout -->

    

    </div>

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









</body>



</html>