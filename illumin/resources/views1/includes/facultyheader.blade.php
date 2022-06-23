
<div id="header" class="mdk-header js-mdk-header m-0" data-fixed>
            <div class="mdk-header__content">

                <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-primary pl-md-0 pr-0" id="navbar" data-primary>
                    <div class="container-fluid pr-0 ">

                        <!-- Navbar toggler -->
                        <button class="navbar-toggler navbar-toggler-custom d-lg-none d-flex mr-navbar" type="button" data-toggle="sidebar">
                            <span class="material-icons">short_text</span>
                        </button>


                        <div class="d-flex sidebar-account flex-shrink-0 mr-auto mr-lg-0">
                            <a href="{{ url('/insthome') }}" class="flex d-flex align-items-center text-underline-0">
                                <span class="mr-1  text-white">
                                    <!-- LOGO -->
                                    <?php $logo = App\Models\tblSystemSettigs::systemname('logo'); ?>
                                    @if($logo != '')
                                    <img src="{{ asset('logo/'.$logo) }}" alt="Avatar" class="avatar-img rounded-circle" style=" width: 30px; height: 30px;">
                                    @endif
                                </span>
                                <span class="flex d-flex flex-column text-white">
                                    <strong class="sidebar-brand">{{ App\Models\tblSystemSettigs::systemname('systemname') }}</strong>
                                </span>
                            </a>
                        </div>





                        <!--<ul class="nav navbar-nav d-none d-lg-flex pl-2">
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
                                    <span class="mr-1"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="22" height="22">
                                            <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                <path d="M24,4.75c0-1.657-1.343-3-3-3H3c-1.657,0-3,1.343-3,3v14.5c0,1.657,1.343,3,3,3h18c1.657,0,3-1.343,3-3V4.75z M21.75,6.75 C21.888,6.75,22,6.862,22,7v5.5c0,0.138-0.112,0.25-0.25,0.25h-12c-0.138,0-0.25-0.112-0.25-0.25V7c0-0.138,0.112-0.25,0.25-0.25 H21.75z M9.65,3.75c0.258-0.467,0.845-0.637,1.312-0.38c0.16,0.088,0.292,0.22,0.38,0.38c0.096,0.149,0.149,0.322,0.154,0.5 c-0.005,0.178-0.058,0.351-0.154,0.5c-0.258,0.467-0.845,0.637-1.312,0.38C9.87,5.042,9.738,4.91,9.65,4.75 c-0.096-0.149-0.149-0.322-0.154-0.5c0.006-0.178,0.06-0.351,0.158-0.5H9.65z M6.15,3.75c0.258-0.467,0.845-0.637,1.312-0.38 c0.16,0.088,0.292,0.22,0.38,0.38C7.94,3.899,7.994,4.072,8,4.25c-0.005,0.178-0.058,0.351-0.154,0.5 C7.588,5.217,7.001,5.387,6.534,5.13c-0.16-0.088-0.292-0.22-0.38-0.38C6.058,4.601,6.005,4.428,6,4.25 c0.005-0.178,0.058-0.351,0.154-0.5H6.15z M2.588,3.842C2.749,3.482,3.106,3.25,3.5,3.25c0.351,0.004,0.673,0.195,0.846,0.5 C4.442,3.899,4.495,4.072,4.5,4.25c-0.005,0.178-0.058,0.351-0.154,0.5C4.088,5.217,3.501,5.387,3.034,5.13 c-0.16-0.088-0.292-0.22-0.38-0.38C2.558,4.601,2.505,4.428,2.5,4.25c0.001-0.141,0.032-0.28,0.092-0.408H2.588z M8,20 c0,0.138-0.112,0.25-0.25,0.25H3c-0.552,0-1-0.448-1-1V7c0-0.138,0.112-0.25,0.25-0.25h5.5C7.888,6.75,8,6.862,8,7V20z M22,19.25 c0,0.552-0.448,1-1,1H9.75c-0.138,0-0.25-0.112-0.25-0.25v-5.5c0-0.138,0.112-0.25,0.25-0.25h12c0.138,0,0.25,0.112,0.25,0.25 V19.25z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg></span>
                                    Switch Layout</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item active" href="instructor-dashboard.html">Admin</a>
                                    <a class="dropdown-item" href="fluid-instructor-dashboard.html">Full Width</a>
                                    <a class="dropdown-item" href="fixed-instructor-dashboard.html">Fixed</a>
                                </div>
                            </li>
                        </ul>-->



                        <ul class="ml-auto nav navbar-nav mr-2 d-none d-lg-flex">
                            <li class="nav-item"><a href="#" class="nav-link">Get Help</a></li>
                        </ul>


                        <form class="search-form search-form--light d-none d-sm-flex flex ml-3" action="">
                            <input type="text" class="form-control" placeholder="Search">
                            <button class="btn" type="submit"><i class="material-icons">search</i></button>
                        </form>


                        <ul class="nav navbar-nav d-none d-md-flex">
                            <li class="nav-item dropdown">
                                <a href="#notifications_menu" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
                                    <span class="nav-icon navbar-notifications-indicator">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="25" height="25">
                                            <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                <path d="M21.5,12.254c0.003-5.247-4.248-9.502-9.494-9.506C6.759,2.745,2.503,6.996,2.5,12.243 c-0.002,2.915,1.335,5.669,3.625,7.471l-2.332,2.333c-0.39,0.39-0.39,1.024,0,1.414c0.394,0.383,1.02,0.383,1.414,0L7.863,20.8 c2.613,1.267,5.661,1.267,8.274,0l2.656,2.657c0.394,0.383,1.02,0.383,1.414,0c0.39-0.39,0.39-1.024,0-1.414l-2.332-2.333 C20.163,17.912,21.499,15.164,21.5,12.254z M11.25,5.754c0-0.414,0.336-0.75,0.75-0.75s0.75,0.336,0.75,0.75V11.5h2.75 c0.414,0,0.75,0.336,0.75,0.75S15.914,13,15.5,13H12c-0.414,0-0.75-0.336-0.75-0.75V5.754z M7.4,2.27 c0.251-0.115,0.361-0.412,0.246-0.663c-0.028-0.061-0.067-0.115-0.117-0.16C5.711-0.236,2.873-0.127,1.19,1.691 c-1.593,1.72-1.593,4.376,0,6.096C1.285,7.89,1.418,7.948,1.558,7.948c0.195-0.001,0.371-0.114,0.454-0.29 C3.11,5.278,5.02,3.368,7.4,2.27z M19.5,0.254c-1.125,0.003-2.207,0.429-3.033,1.193c-0.204,0.187-0.217,0.503-0.031,0.706 c0.045,0.049,0.099,0.089,0.16,0.117c2.38,1.098,4.29,3.008,5.388,5.388c0.085,0.174,0.26,0.286,0.454,0.29 c0.14,0,0.273-0.058,0.368-0.161c1.683-1.818,1.573-4.657-0.245-6.339C21.728,0.677,20.634,0.251,19.5,0.254z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </a>
                                <div id="notifications_menu" class="dropdown-menu dropdown-menu-right navbar-notifications-menu">
                                    <div class="dropdown-item d-flex align-items-center py-2">
                                        <span class="flex navbar-notifications-menu__title m-0">Notifications</span>
                                        <a href="javascript:void(0)" class="text-muted"><small>Clear all</small></a>
                                    </div>
                                    <div class="navbar-notifications-menu__content" data-perfect-scrollbar>
                                        <div class="py-2">

                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <div class="avatar avatar-xs">
                                                        <img src="{{ asset('assets/images/256_daniel-gaffey-1060698-unsplash.jpg') }}" alt="Avatar" class="avatar-img rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <a href="">A.Demian</a> left a comment on <a href="">Stack</a><br>
                                                    <small class="text-muted">1 minute ago</small>
                                                </div>
                                            </div>
                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <a href="#">
                                                        <div class="avatar avatar-xs">
                                                            <span class="avatar-title bg-primary rounded-circle"><i class="material-icons icon-16pt">person_add</i></span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="flex">
                                                    New user <a href="#">Peter Parker</a> signed up.<br>
                                                    <small class="text-muted">1 hour ago</small>
                                                </div>
                                            </div>
                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <a href="#">
                                                        <div class="avatar avatar-xs">
                                                            <span class="avatar-title rounded-circle">JD</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="flex">
                                                    <a href="#">Big Joe</a> <small class="text-muted">wrote:</small><br>
                                                    <div>Hey, how are you? What about our next meeting</div>
                                                    <small class="text-muted">2 minutes ago</small>
                                                </div>
                                            </div>

                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <div class="avatar avatar-xs">
                                                        <img src="{{ asset('assets/images/256_daniel-gaffey-1060698-unsplash.jpg') }}" alt="Avatar" class="avatar-img rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <a href="">A.Demian</a> left a comment on <a href="">Stack</a><br>
                                                    <small class="text-muted">1 minute ago</small>
                                                </div>
                                            </div>
                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <a href="#">
                                                        <div class="avatar avatar-xs">
                                                            <span class="avatar-title bg-primary rounded-circle"><i class="material-icons icon-16pt">person_add</i></span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="flex">
                                                    New user <a href="#">Peter Parker</a> signed up.<br>
                                                    <small class="text-muted">1 hour ago</small>
                                                </div>
                                            </div>
                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <a href="#">
                                                        <div class="avatar avatar-xs">
                                                            <span class="avatar-title rounded-circle">JD</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="flex">
                                                    <a href="#">Big Joe</a> <small class="text-muted">wrote:</small><br>
                                                    <div>Hey, how are you? What about our next meeting</div>
                                                    <small class="text-muted">2 minutes ago</small>
                                                </div>
                                            </div>

                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <div class="avatar avatar-xs">
                                                        <img src="{{ asset('assets/images/256_daniel-gaffey-1060698-unsplash.jpg') }}" alt="Avatar" class="avatar-img rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <a href="">A.Demian</a> left a comment on <a href="">Stack</a><br>
                                                    <small class="text-muted">1 minute ago</small>
                                                </div>
                                            </div>
                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <a href="#">
                                                        <div class="avatar avatar-xs">
                                                            <span class="avatar-title bg-primary rounded-circle"><i class="material-icons icon-16pt">person_add</i></span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="flex">
                                                    New user <a href="#">Peter Parker</a> signed up.<br>
                                                    <small class="text-muted">1 hour ago</small>
                                                </div>
                                            </div>
                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <a href="#">
                                                        <div class="avatar avatar-xs">
                                                            <span class="avatar-title rounded-circle">JD</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="flex">
                                                    <a href="#">Big Joe</a> <small class="text-muted">wrote:</small><br>
                                                    <div>Hey, how are you? What about our next meeting</div>
                                                    <small class="text-muted">2 minutes ago</small>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <a href="javascript:void(0);" class="dropdown-item text-center navbar-notifications-menu__footer">View All</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#events-drawer" data-toggle="sidebar" class="nav-link d-flex align-items-center">
                                    <span class=" nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="25" height="25">
                                            <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                <path d="M21.5,3h-2.75c-0.138,0-0.25-0.112-0.25-0.25V1c0-0.552-0.448-1-1-1s-1,0.448-1,1v4.75c0,0.414-0.336,0.75-0.75,0.75 S15,6.164,15,5.75V3.5C15,3.224,14.776,3,14.5,3H8.25C8.112,3,8.001,2.889,8,2.751V1c0-0.552-0.448-1-1-1S6,0.448,6,1v4.75 C6,6.164,5.664,6.5,5.25,6.5S4.5,6.164,4.5,5.75V3.5C4.5,3.224,4.276,3,4,3H2.5c-1.105,0-2,0.895-2,2v17c0,1.105,0.895,2,2,2h19 c1.105,0,2-0.895,2-2V5C23.5,3.895,22.605,3,21.5,3z M21.5,21.5c0,0.276-0.224,0.5-0.5,0.5H3c-0.276,0-0.5-0.224-0.5-0.5v-12 C2.5,9.224,2.724,9,3,9h18c0.276,0,0.5,0.224,0.5,0.5V21.5z M18.185,13.111l-6-2.383c-0.119-0.046-0.251-0.046-0.37,0l-6,2.383 c-0.193,0.077-0.319,0.266-0.315,0.474c0,0.034,0,3.38,0,3.38c0,0.414,0.336,0.75,0.75,0.75S7,17.379,7,16.965v-2.506l4.834,1.706 c0.107,0.038,0.225,0.038,0.332,0l6-2.118c0.26-0.092,0.397-0.377,0.305-0.638C18.423,13.273,18.319,13.164,18.185,13.111z M15.263,15.829L12,16.981l-3.263-1.152c-0.26-0.092-0.546,0.045-0.638,0.306c-0.019,0.053-0.028,0.11-0.028,0.166v2.145 c0,0.212,0.134,0.402,0.334,0.472l2.574,0.908c0.661,0.232,1.381,0.232,2.042,0l2.574-0.908c0.2-0.07,0.334-0.26,0.334-0.472V16.3 c0-0.276-0.223-0.5-0.5-0.5c-0.057,0-0.113,0.01-0.166,0.028L15.263,15.829z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </a>
                            </li>
                            <!-- <li class="nav-item nav-item-circle">
          <a href="#" class="nav-link d-flex align-items-center navbar-circle-link">
          <span class="rounded-circle">
            <span class="material-icons text-primary">flag</span>
          </span>
        </a>
      </li> -->
                        </ul>

                        <div class="dropdown">
                            <a href="#account_menu" class="dropdown-toggle navbar-toggler navbar-toggler-dashboard border-left d-flex align-items-center ml-navbar" data-toggle="dropdown">
                                @if($logo != '')
                                    <img src="{{ asset('logo/'.$logo) }}" class="rounded-circle" width="32" alt="Frontted">
                                @endif
                                <span class="ml-1 d-flex-inline">
                                    <span class="text-light"></span>
                                </span>
                            </a>
                            <div id="company_menu" class="dropdown-menu dropdown-menu-right navbar-company-menu">
                                <div class="dropdown-item d-flex align-items-center py-2 navbar-company-info py-3">

                                    <span class="mr-3">
                                       
                                        @if($logo != '')
                                        <img src="{{ asset('logo/'.$logo) }}" width="43" height="43" alt="avatar">
                                        @endif
                                    </span>
                                    <span class="flex d-flex flex-column">
                                        <strong class="h5 m-0"></strong>
                                       
                                       
                                        <small class="text-muted text-uppercase">Centre Faculty</small>
                                       
                                    </span>

                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item d-flex align-items-center py-2" href="{{ url('/instsettings') }}">
                                    <span class="material-icons mr-2">settings</span> Settings
                                </a>
                                <a class="dropdown-item d-flex align-items-center py-2" href="{{ url('/instlogout') }}">
                                    <span class="material-icons mr-2">exit_to_app</span> Logout
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
