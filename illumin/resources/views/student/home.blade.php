@include('includes/studentheader')
    <div class="row m-0 container-fluid">
      <div class="col-md-4 col-sm-6 info-box">
        <div class="media">
          <div class="media-left" style="width:28% !important;">
            <div class="sl-left">
              <div> <img class="img-circle" alt="user" src="{{ asset('assets/plugins/images/users/hanna.jpg') }}"> </div>
            </div>
          </div>
          <div class="media-body">
            <h3 class="info-count text-blue">{{Auth::user()->name}}</h3>
            <span class="hr-line"></span>
            <p class="info-text font-12">Student</p>
            {{Auth::user()->email}} </div>
        </div>
      </div>
      <div class="col-md-8 col-sm-6 info-box">
        <div class="media">
          <div class="media-left"> <span class="icoleaf bg-warning text-white"><i class="icon-bell"></i></span> </div>
          <div class="media-body">
          @foreach($notifications as $notification)
            <p class=" font-16" style="margin-bottom:0px;">{{$notification->title}}</p>
            <span class="hr-line"></span>
            
            <p>{{$notification->message}}</p>
          @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 col-sm-12">
          <div class="white-box" style="border-bottom:5px solid #f6a439;">
            <div class="task-list">
              <h5 class="font-bold"> Your Bookmarks <a href="#"><span class="label label-warning pull-right"> View all</span> </a></h5>
              <ul class="list-group" style="margin-left:0px !important;">
                <li class="list-group-item" >
                  <div class="checkbox-success" style="border-bottom: 1px  solid #ddd !important; margin-top:10px !important;">
                    <P > <span class="label label-warning">50</span> <span class="p-l-5 "><a href="#">Current affairs</a></span> </P>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="checkbox-success" style="border-bottom: 1px  solid #ddd !important;">
                    <P > <span class="label label-warning">50</span> <span class="p-l-5 "><a href="#">Daily MCQ Test</a></span> </P>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="checkbox-success" style="border-bottom: 1px  solid #ddd !important;">
                    <P > <span class="label label-warning">50</span> <span class="p-l-5 "><a href="#">MCQ Questions</a></span> </P>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="checkbox-success" style="border-bottom: 1px  solid #ddd !important;">
                    <P > <span class="label label-warning">50</span> <span class="p-l-5"><a href="#">Online Test</a></span> </P>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="checkbox-success" style="border-bottom: 1px  solid #ddd !important;">
                    <P > <span class="label label-warning">50</span> <span class="p-l-5 "><a href="#">Current affairs</a></span> </P>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="checkbox-success" style="border-bottom: 1px  solid #ddd !important;">
                    <P > <span class="label label-warning">50</span> <span class="p-l-5 "><a href="#">Daily MCQ Test</a></span> </P>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="checkbox-success" style="border-bottom: 1px  solid #ddd !important;">
                    <P > <span class="label label-warning">50</span> <span class="p-l-5 "><a href="#">MCQ Questions</a></span> </P>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="checkbox-success" style="border-bottom: 1px  solid #ddd !important;">
                    <P > <span class="label label-warning">50</span> <span class="p-l-5"><a href="#">Online Test</a></span> </P>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="white-box"> 
            
            <!-- START carousel-->
            <div id="carousel-example-captions-1" data-ride="carousel" class="carousel slide">
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-captions-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-captions-1" data-slide-to="1" class=""></li>
                <li data-target="#carousel-example-captions-1" data-slide-to="2" class=""></li>
              </ol>
              <div role="listbox" class="carousel-inner" >
                <div class="item active"> <img src="{{ asset('assets/plugins/images/big/img4.jpg') }}" alt="First slide image"> </div>
                <div class="item"> <img src="{{ asset('assets/plugins/images/big/img5.jpg') }}" alt="Second slide image"> </div>
                <div class="item"> <img src="{{ asset('assets/plugins/images/big/img6.jpg') }}" alt="Third slide image"> </div>
              </div>
            </div>
            <!-- END carousel--> 
          </div>
          <div class="white-box"  id="feeds">
            <div class="user-post">
              <div class="friend-info">
                <div class="box-header">
                  <div class="pull-right" style="font-size:20px;padding-top:5px;"> <i class="fa fa-star-half-empty"></i> </div>
                  <div class="box-header-icon mcq_test_bg_color"> <i class="icon-globe-alt"></i> </div>
                  <h3> Current Affairs <br>
                    <small><i class="fa fa-calendar"></i> &nbsp; 25 JUNE 2021 </small></h3>
                </div>
                <div class="description">
                  <h5>What is Lorem Ipsum?</h5>
                  <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it ... </p>
                </div>
                <div class="post-meta"> <img src="{{ asset('assets/plugins/images/user-post.jpg') }}" alt="">
                  <div class="bottombutton">
                    <button class="btn btn-warning waves-effect waves-light"> <i class="fa fa-tags "></i> <span>International </span></button>
                  </div>
                  <div class="pull-right" style="margin-top:20px">
                    <button class="fcbtn btn btn-warning btn-outline btn-1f pull-right">Read More</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="white-box">
            <div class="user-post">
              <div class="friend-info">
                <div class="box-header">
                  <div class="pull-right" style="font-size:20px;padding-top:5px;"> <i class="fa fa-star-half-empty"></i> </div>
                  <div class="box-header-icon mcq_test_bg_color"> <i class="fa fa-laptop"></i> </div>
                  <h3> Daily MCQ <br>
                    <small><i class="fa fa-calendar"></i> &nbsp; 25 JUNE 2021 </small></h3>
                </div>
                <div class="description">
                  <h5 style="text-align:center;">10 August 2021 MCQ Test</h5>
                </div>
                <div class="post-meta">
                  <div class="inbox">
                    <div class="inboxa"> <span style="font-size:35px;"><i class="fa fa-sort-numeric-asc"></i></span><br/>
                      10 Questions </div>
                    <div class="inboxa"> <span style="font-size:35px;"><i class="fa fa-clock-o"></i></span><br/>
                      20 Minutes </div>
                    <div class="inboxa"> <span style="font-size:35px;"><i class="fa fa-cogs"></i></span><br/>
                      Attempts Allowed </div>
                    <div class="inboxa"> <span style="font-size:35px;"><i class="fa fa-file-text"></i></span><br/>
                      10 Questions </div>
                    <br/>
                    <div style="width:80%; margin:0 auto;">
                      <button class="btn btn-block btn-warning">Start Test</button>
                    </div>
                  </div>
                  <div class="bottombutton">
                    <button class="btn btn-warning waves-effect waves-light"> <i class="fa fa-tags "></i> <span>International </span></button>
                  </div>
                  <div class="pull-right" style="margin-top:20px">
                    <button class="fcbtn btn btn-warning btn-outline btn-1f pull-right">Read More</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="white-box">
            <div class="user-post">
              <div class="friend-info">
                <div class="box-header">
                  <div class="pull-right" style="font-size:20px;padding-top:5px;"> <i class="fa fa-star-half-empty"></i> </div>
                  <div class="box-header-icon mcq_test_bg_color"> <i class="fa fa-video-camera"></i> </div>
                  <h3> ENbreezEN Videos <br>
                    <small><i class="fa fa-calendar"></i> &nbsp; 25 JUNE 2021 </small></h3>
                </div>
                <div class="description"> </div>
                <div class="post-meta">
                  <iframe width="100%" height="350" src="https://www.youtube.com/embed/HGSR3FDVkkQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  <div class="bottombutton">
                    <button class="btn btn-warning waves-effect waves-light"> <i class="fa fa-tags "></i> <span>None </span></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-12">
          <div class="white-box" style="border-bottom:5px solid #f6a439;">
            <div class="task-list">
              <h5 class="font-bold"> Latest Current Affairs <a href="#"><span class="label label-warning pull-right"> All</span> </a></h5>
              <div class="steamline" style="margin-top:30px;">
              @foreach($news as $newss)
                <div class="sl-item">
                  <div class="sl-left">
                    <div> <img class="img-circle" alt="user" src="{{ asset('assets/plugins/images/users/hanna.jpg') }}"> </div>
                  </div>
                  <div class="sl-right">
                    <div> <small><i class="fa fa-calendar"></i> &nbsp; 25 JUNE 2021 </small>
                      <h5 class="font-bold" style="font-size:13px;"> <a href="#">What is Lorem Ipsum?</a></h5>
                      <p class="wica">Lorem Ipsum is simply dummy text of the printing and ..... </p>
                    </div>
                  </div>
                </div>
                @endforeach
               <!-- <div class="sl-item">
                  <div class="sl-left">
                    <div> <img class="img-circle" alt="user" src="{{ asset('assets/plugins/images/users/hanna.jpg') }}"> </div>
                  </div>
                  <div class="sl-right">
                    <div> <small><i class="fa fa-calendar"></i> &nbsp; 25 JUNE 2021 </small>
                      <h5 class="font-bold" style="font-size:13px;"> <a href="#">What is Lorem Ipsum?</a></h5>
                      <p class="wica">Lorem Ipsum is simply dummy text of the printing and ..... </p>
                    </div>
                  </div>
                </div>
                <div class="sl-item">
                  <div class="sl-left">
                    <div> <img class="img-circle" alt="user" src="{{ asset('assets/plugins/images/users/hanna.jpg') }}"> </div>
                  </div>
                  <div class="sl-right">
                    <div> <small><i class="fa fa-calendar"></i> &nbsp; 25 JUNE 2021 </small>
                      <h5 class="font-bold" style="font-size:13px;"> <a href="#">What is Lorem Ipsum?</a></h5>
                      <p class="wica">Lorem Ipsum is simply dummy text of the printing and ..... </p>
                    </div>
                  </div>
                </div>-->
                <button class="btn btn-block btn-outline btn-rounded btn-warning">Read More</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="right-sidebar">
        <div class="slimscrollright">
          <div class="rpanel-title"> Login details<span><i class="icon-close right-side-toggler"></i></span> </div>
          <div class="r-panel-body">
            <ul class="m-t-20 chatonline">
              <li><a href="#" title=""><i class="ti-user" style="margin-right:10px;"></i> view profile</a></li>
              <li><a href="#" title=""><i class="ti-pencil-alt" style="margin-right:10px;"></i>edit profile</a></li>
              <li><a href="#" title=""><i class="ti-target" style="margin-right:10px;"></i>activity log</a></li>
              <li><a href="#" title=""><i class="ti-settings" style="margin-right:10px;"></i>account setting</a></li>
              <li><a href="#" title=""><i class="ti-power-off" style="margin-right:10px;"></i>log out</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    @include('includes/studentfooter')