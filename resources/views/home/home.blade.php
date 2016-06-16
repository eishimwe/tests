  
    @extends('master')

    @section('content')

       
            <!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li><a href="javascript:;">Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
            <!-- end breadcrumb -->

            @if(\Auth::user()->user_registration_statuses_id == 2)

            <div class="alert alert-warning fade in m-b-10">
                    <strong>Successfully registered!</strong>
                    Your account is pending activation
                    <span class="close" data-dismiss="alert">&times;</span>
            </div>
            <!-- begin page-header -->

            @elseif(Auth::user()->user_registration_statuses_id == 3)
             <div class="alert alert-success fade in m-b-10">
                <strong>Congratulations!</strong>
                Your account has been successfully activated,your personal referral identification is '<strong>{{ \Request::root() }}/sponsor/{{ \Auth::user()->username }}</strong>'
                <span class="close" data-dismiss="alert">&times;</span>
            </div>
    
            @else

            <h1 class="page-header">Home <small>header small text goes here...</small></h1>
           

            @endif
            <!-- end page-header -->
       <!--   begin row -->
         <div class="row">
            <!--  begin col-3 -->
             <div class="col-sm-6 col-lg-3">
              <!--    begin widget -->
                 <div class="widget widget-stat widget-stat-right bg-inverse text-white">
                     <div class="widget-stat-btn"><a href="javascript:;" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                     <div class="widget-stat-icon"><i class="fa fa-user"></i></div>
                     <div class="widget-stat-info">
                         <div class="widget-stat-title">Your Sponsors Users</div>
                         <div class="widget-stat-number"><a href="#nav-pills-tab-1" data-toggle="tab">{{ $number_of_sponsors_users }}</a></div>
                     </div>
                     <div class="widget-stat-progress">
                         <div class="progress">
                             <div class="progress-bar" style="width: 80%"></div>
                         </div>
                     </div>
                     <div class="widget-stat-footer text-left"></div>
                 </div>
                 <!-- end widget -->
             </div>
             <!-- end col-3 -->
            
              <div class="col-sm-6 col-lg-3">
                    <!-- begin widget -->
                    <div class="widget widget-stat widget-stat-right bg-success text-white">
                        <div class="widget-stat-btn"><a href="javascript:;" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                        <div class="widget-stat-icon"><i class="fa fa-user"></i></div>
                        <div class="widget-stat-info">
                            <div class="widget-stat-title">Your Sponsored Users</div>
                            <div class="widget-stat-number"><a href="{{ url('sponsored-list') }}">{{ $number_of_sponsored_users }}</a></div>
                        </div>
                        <div class="widget-stat-progress">
                            <div class="progress">
                                <div class="progress-bar" style="width: 60%"></div>
                            </div>
                        </div>
                        <div class="widget-stat-footer"></div>
                    </div>
                    <!-- end widget -->
                </div>

         </div>
        <!--  end row -->

        <!-- begin section-container -->
           <!--  <div class="section-container section-with-top-border p-b-5">
               <h5 class="m-t-0">Default Nav Pills & Justified Pills</h5>
               begin row
               <div class="row">
                   begin col-6
                   <div class="col-md-6">
                       begin nav-pills
                       <ul class="nav nav-pills nav-pills-success">
                           <li class="active"><a href="#nav-pills-tab-1" data-toggle="tab">Pills One</a></li>
                           <li><a href="#nav-pills-tab-2" data-toggle="tab">Pills Two</a></li>
                           <li><a href="#nav-pills-tab-3" data-toggle="tab">Pills Three</a></li>
                       </ul>
                       end nav-pills
                       begin tab-content
                       <div class="tab-content panel">
                           <div class="tab-pane fade active in" id="nav-pills-tab-1">
                               <h4>Affordable solutions for all your creativity needs.</h4>
                               <p>
                                   Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                   Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor, 
                                   est diam sagittis orci, a ornare nisi quam elementum tortor. 
                                   Proin interdum ante porta est convallis dapibus dictum in nibh. 
                               </p>
                           </div>
                           <div class="tab-pane fade" id="nav-pills-tab-2">
                               <h4>Accessible. Affordable. Design.</h4>
                               <p>
                                   Proin interdum ante porta est convallis dapibus dictum in nibh. 
                                   Aenean quis massa congue metus mollis fermentum eget et tellus. 
                                   Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien, 
                                   nec eleifend orci eros id lectus.
                               </p>
                           </div>
                           <div class="tab-pane fade" id="nav-pills-tab-3">
                               <h4>Engaging Purposeful and Creative.</h4>
                               <p>
                                   Aenean quis massa congue metus mollis fermentum eget et tellus. 
                                   Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien, 
                                   nec eleifend orci eros id lectus.
                                   Proin interdum ante porta est convallis dapibus dictum in nibh. 
                               </p>
                           </div>
                       </div>
                       end tab-content
                   </div>
                   end col-6
                   begin col-6
                
               </div>
               end row
           </div> -->
            <!-- end section-container -->


          <!-- begin section-container -->
            <div class="section-container section-with-top-border">
                <p class="m-b-20">
                    <b>Sponsors</b> 
                </p>
                <!-- begin panel -->
                <div class="panel pagination-inverse m-b-0 clearfix">
                    <table id="sponsors-users-table" data-order='[[1,"asc"]]' class="table table-bordered table-hover">
                        <thead>
                            <tr class="inverse">
                                <th data-sorting="disabled"></th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Surname</th>
                                <th>Email Address</th>
                                <th>Cellphone</th>
                                <th data-sorting="disabled"></th>
                            </tr>
                        </thead>
                       
                    </table>
                </div>
                <!-- end panel -->
            </div>
            <!-- end section-container -->
        
                  
        @endsection

        @section('custom_stript')

            <script src="{{ asset('assets/js/home.js') }}"></script>

        @endsection