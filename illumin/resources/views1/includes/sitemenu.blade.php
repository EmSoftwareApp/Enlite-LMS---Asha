<?php
  $url = Request::segment(1);
?>
<div class="page__header  page__header-nav mb-0">
                <div class="container page__container">
                    <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex" id="secondaryNavbar">
                        <ul class="nav navbar-nav">
                            <!--@if (!Auth::check())-->
                            
                            <!--@endif-->
                            <li class="nav-item @if(($url == 'courses') || ($url == 'course-details') || ($url == '')) active @endif">
                                <a href="{{ url('/courses') }}" class="nav-link active">Courses</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/logout') }}" class="nav-link" onclick="return confirm('Are you sure to Logut and go to Home?');">Back to Home</a>
                            </li>
                            <!--<li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Student</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="fixed-student-dashboard.html">Dashboard</a>
                                    <a class="dropdown-item" href="fixed-student-series.html">Series</a>
                                    <a class="dropdown-item" href="fixed-student-courses.html">Courses</a>
                                    <a class="dropdown-item" href="fixed-student-course.html">Course Lessons</a>
                                    <a class="dropdown-item" href="fixed-student-take-course.html">Take Course</a>
                                    <a class="dropdown-item" href="fixed-student-take-quiz.html">Take Quiz</a>
                                    <a class="dropdown-item" href="fixed-student-billing.html">Billing</a>
                                    <a class="dropdown-item" href="fixed-student-edit-account.html">Edit Account</a>
                                    <a class="dropdown-item" href="fixed-student-profile.html">Student Profile</a>
                                    <a class="dropdown-item" href="login.html">Login</a>
                                    <a class="dropdown-item" href="sign-up.html">Sign Up</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Instructor</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="fixed-instructor-dashboard.html">Dashboard</a>
                                    <a class="dropdown-item" href="fixed-instructor-courses.html">My Courses</a>
                                    <a class="dropdown-item" href="fixed-instructor-course-edit.html">Edit Course</a>
                                    <a class="dropdown-item" href="fixed-instructor-lesson-edit.html">Edit Lesson</a>
                                    <a class="dropdown-item" href="fixed-instructor-create-quiz.html">Create Quiz</a>
                                    <a class="dropdown-item" href="fixed-instructor-earnings.html">Earnings</a>
                                    <a class="dropdown-item" href="fixed-instructor-profile.html">Profile</a>
                                    <a class="dropdown-item" href="fixed-instructor-payout.html">Payout</a> </div>
                            </li>
                            
                          <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Administrator</a>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="fixed-app-trello.html">Dashboard</a>
                              <a class="dropdown-item" href="fixed-app-trello.html">Review Courses</a>
                              <a class="dropdown-item" href="fixed-app-trello.html">Support Tickets</a>
                              <a class="dropdown-item" href="fixed-app-trello.html">Reports</a>
                              <a class="dropdown-item" href="fixed-app-trello.html">Website Settings</a> 
                            </div>
                          </li>
  
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">UI Components</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="fixed-ui-buttons.html">Buttons</a>
                                    <a class="dropdown-item" href="fixed-ui-alerts.html">Alerts</a>
                                    <a class="dropdown-item" href="fixed-ui-avatars.html">Avatars</a>
                                    <a class="dropdown-item" href="fixed-ui-modals.html">Modals</a>
                                    <a class="dropdown-item" href="fixed-ui-charts.html">Charts</a>
                                    <a class="dropdown-item" href="fixed-ui-icons.html">Icons</a>
                                    <a class="dropdown-item" href="fixed-ui-forms.html">Forms</a>
                                    <a class="dropdown-item" href="fixed-ui-range-sliders.html">Range Sliders</a>
                                    <a class="dropdown-item" href="fixed-ui-datetime.html">Time &amp; Date</a>
                                    <a class="dropdown-item" href="fixed-ui-tables.html">Tables</a>
                                    <a class="dropdown-item" href="fixed-ui-tabs.html">Tabs</a>
                                    <a class="dropdown-item" href="fixed-ui-loaders.html">Loaders</a>
                                    <a class="dropdown-item" href="fixed-ui-drag.html">Drag &amp; Drop</a>
                                    <a class="dropdown-item" href="fixed-ui-pagination.html">Pagination</a>
                                    <a class="dropdown-item" href="fixed-ui-vector-maps.html">Vector Maps</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Layouts</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="index.html">Admin</a>
                                    <a class="dropdown-item" href="fluid-index.html">Full Width</a>
                                    <a class="dropdown-item active" href="fixed-index.html">Fixed</a>
                                </div>
                            </li>-->
                        </ul>
                    </div>
                </div>
            </div>

            <link href="{{ asset('assets/css/aos.css') }}" rel="stylesheet">