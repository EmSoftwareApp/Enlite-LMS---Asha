<?php

  $url = Request::segment(1);

?>

<style type="text/css">

    .sidebar-menu-icon {

        font-size: 14px !important;

    }



    .sidebar-menu-icon--left{

        margin-right: 0.1rem !important;

    }



</style>

<style>

ul, #myUL {

  list-style-type: none;

}



#myUL {

  margin: 0;

  padding: 0;

}



.caret {

  cursor: pointer;

  -webkit-user-select: none; /* Safari 3.1+ */

  -moz-user-select: none; /* Firefox 2+ */

  -ms-user-select: none; /* IE 10+ */

  user-select: none;

}



.caret::before {

  content: "\25B6";

  color: black;

  display: inline-block;

  margin-left: 200px;

  position:absolute; 

}



.caret-down::before {

  -ms-transform: rotate(90deg); /* IE 9 */

  -webkit-transform: rotate(90deg); /* Safari */'

  transform: rotate(90deg);  

}



.nested {

  display: none;

}



.active {

  display: block;

}

.submenu{

    margin-left:-18px;

}

</style>

<div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">

                    <div class="mdk-drawer__content">

                        <div class="sidebar sidebar-light sidebar-left bg-white" data-perfect-scrollbar>





                            <div class="sidebar-block p-0 m-0">

                                <div class="d-flex align-items-center sidebar-p-a border-bottom bg-light">

                                    <a href="#" class="flex d-flex align-items-center text-body text-underline-0">

                                        <span class="avatar avatar-sm mr-2">

                                            <span class="avatar-title rounded-circle bg-soft-secondary text-muted">AD</span>

                                        </span>

                                        <span class="flex d-flex flex-column">

                                            <strong class="text-uppercase"></strong>

                                            

                                        </span>

                                    </a>

                                    

                                </div>

                            </div>

                            <div class="sidebar-block p-0">

                               

                                <div class="sidebar-heading">Centre Faculty</div>

                               

                                



                               

                                <ul class="sidebar-menu mt-0">



                                    <li class="sidebar-menu-item @if($url == 'facultyhome') active @endif">

                                        <a class="sidebar-menu-button" href="{{ url('/facultyhome') }}">

                                            <span class="sidebar-menu-icon sidebar-menu-icon--left">

                                               <i class="fa fa-home"></i> 

                                            </span>

                                            <span class="sidebar-menu-text">Home</span>

                                        </a>

                                    </li>

                                    
<li class="sidebar-menu-item @if($url == 'faculty-tasks') active @endif">

                                        <a class="sidebar-menu-button" href="{{ url('/faculty-tasks') }}">

                                            <span class="sidebar-menu-icon sidebar-menu-icon--left">

                                               <i class="fa fa-home"></i> 

                                            </span>

                                            <span class="sidebar-menu-text">Assigned Tasks</span>

                                        </a>

                                    </li>
                                    
                                      
                                      
                                      
                                       
  
                                        
                                        
                                     <!-- <li class="sidebar-menu-item @if(($url == 'faculty-courses') || ($url == 'new-faculty') || ($url == 'view-faculty')) active @endif">

                                        <a class="sidebar-menu-button" href="{{ url('/faculty-courses') }}">

                                            <span class="sidebar-menu-icon sidebar-menu-icon--left">

                                               <i class="fa fa-graduation-cap"></i> 

                                            </span>

                                            <span class="sidebar-menu-text">Course</span>

                                        </a>

                                    </li>

                                   -->

                                    <!--<li class="sidebar-menu-item @if(($url == 'qualification-management') || ($url == 'new-qualification') || ($url == 'view-qualification')) active @endif">

                                        <a class="sidebar-menu-button" href="{{ url('/qualification-management') }}">

                                            <span class="sidebar-menu-icon sidebar-menu-icon--left">

                                               <i class="fa fa-book-open"></i> 

                                            </span>

                                            <span class="sidebar-menu-text">Qualification Management</span>

                                        </a>

                                    </li>-->

                                      

                                    



                                    
<!--
                                    <li class="sidebar-menu-item @if(($url == 'faculty-batches') || ($url == 'new-video') || ($url == 'view-video') || ($url == 'video-program') || ($url == 'video-management-find')) active @endif">

                                        <a class="sidebar-menu-button" href="{{ url('/faculty-batches') }}">

                                            <span class="sidebar-menu-icon sidebar-menu-icon--left">

                                               <i class="fa fa-video"></i> 

                                            </span>

                                            <span class="sidebar-menu-text">Batch </span>

                                        </a>

                                    </li>-->
<!--<li class="sidebar-menu-item @if(($url == 'faculty-batches') || ($url == 'new-video') || ($url == 'view-video') || ($url == 'video-program') || ($url == 'video-management-find')) active @endif">

                                        <a class="sidebar-menu-button" href="{{ url('/faculty-students') }}">

                                            <span class="sidebar-menu-icon sidebar-menu-icon--left">

                                               <i class="fa fa-video"></i> 

                                            </span>

                                            <span class="sidebar-menu-text">Students </span>

                                        </a>

                                    </li>-->

                                    <!--<li class="sidebar-menu-item @if(($url == 'student-details') || ($url == 'new-student') || ($url == 'student-details-find') || ($url == 'pgm-purchased')) active @endif">

                                        <a class="sidebar-menu-button" href="{{ url('/student-details') }}">

                                            <span class="sidebar-menu-icon sidebar-menu-icon--left">

                                               <i class="fa fa-user-graduate"></i> 

                                            </span>

                                            <span class="sidebar-menu-text">Student Management</span>

                                        </a>

                                    </li>-->
                                    

                                    <!-- Not set to users -->
                                    
                                    
                                    
                                    <!--sn_codes------>
                                    
                                    






                                    



                                    <!-- Not set to users -->



                                    



                                    

                                    

                                    

                                   <!-- <li class="sidebar-menu-item @if(($url == 'package-expiry') || ($url == 'package-expiry-find') || ($url == 'package-expired') || ($url == 'package-expired-find')) active @endif">

                                        <a class="sidebar-menu-button caret">

                                            <span class="sidebar-menu-icon sidebar-menu-icon--left">

                                               <i class="fa fa-gift"></i> 

                                            </span>

                                            <span class="">Student Package</span>

                                        </a>

                                        

                                        <ul class="@if(($url == 'package-expiry') || ($url == 'package-expiry-find') || ($url == 'package-expired') || ($url == 'package-expired-find')) active @endif nested">

                                            

                                            

                                        </ul>

                                      </li>-->



                                      



                                    



                                    

                                    

                                </ul>

                               

                                

                            </div>











                            




                           



<script>

var toggler = document.getElementsByClassName("caret");

var i;



for (i = 0; i < toggler.length; i++) {

  toggler[i].addEventListener("click", function() {

    this.parentElement.querySelector(".nested").classList.toggle("active");

    this.classList.toggle("caret-down");

  });

}

</script>

                        </div>

                    </div>

                </div>

            </div>