  
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
<<<<<<< HEAD
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
                         <div class="widget-stat-number">{{ $number_of_sponsors_users }}</div>
                     </div>
                     <div class="widget-stat-progress">
                         <div class="progress">
                             <div class="progress-bar" style="width: 80%"></div>
                         </div>
                     </div>
                     <div class="widget-stat-footer text-left">3.10% better than last week</div>
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
                            <div class="widget-stat-number">{{ $number_of_sponsored_users }}</div>
                        </div>
                        <div class="widget-stat-progress">
                            <div class="progress">
                                <div class="progress-bar" style="width: 60%"></div>
                            </div>
                        </div>
                        <div class="widget-stat-footer">10.2% better than last week</div>
                    </div>
                    <!-- end widget -->
                </div>
          
          
         
         </div>
        <!--  end row -->
              
            
=======
      
          <!-- begin section-container -->
            <div class="section-container section-with-top-border p-b-5">
                <h5 class="m-t-0"></h5>
                <!-- begin row -->
                <div class="row">
                    <!-- begin col-6 -->
                    <div class="col-md-12">
                        <!-- begin nav-pills -->
                        <ul class="nav nav-pills nav-pills-success">

                          <li class="active">

                               
                                <!--    begin widget -->
                                 <div class="widget widget-stat widget-stat-right bg-inverse text-white">
                                     <div class="widget-stat-btn"><a href="javascript:;" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                                     <div class="widget-stat-icon"><i class="fa fa-user"></i></div>
                                     <div class="widget-stat-info">
                                         <div class="widget-stat-title">Sponsors Users</div>
                                         <div class="widget-stat-number"> <a href="#nav-pills-tab-1" data-toggle="tab">{{ $number_of_sponsors_users }} </a></div>
                                     </div>
                                     <div class="widget-stat-progress">
                                         <div class="progress">
                                             <div class="progress-bar" style="width: 80%"></div>
                                         </div>
                                     </div>
                                     <div class="widget-stat-footer text-left"></div>
                                 </div>
                                 <!-- end widget -->
                              </li>
                            <li>

                                  <!-- begin widget -->
                                  <div class="widget widget-stat widget-stat-right bg-success text-white">
                                      <div class="widget-stat-btn"><a href="javascript:;" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                                      <div class="widget-stat-icon"><i class="fa fa-user"></i></div>
                                      <div class="widget-stat-info">
                                          <div class="widget-stat-title">Sponsored Users</div>
                                          <div class="widget-stat-number"><a href="#nav-pills-tab-2" data-toggle="tab">{{ $number_of_sponsored_users }}</a></div>
                                      </div>
                                      <div class="widget-stat-progress">
                                          <div class="progress">
                                              <div class="progress-bar" style="width: 60%"></div>
                                          </div>
                                      </div>
                                      <div class="widget-stat-footer"></div>
                                  </div>
                                  <!-- end widget -->

                            </li>
                           
                        </ul>
                        <!-- end nav-pills -->
                        <!-- begin tab-content -->
                        <div class="tab-content panel">
                            <div class="tab-pane fade active in" id="nav-pills-tab-1">
                                <h4>sponsors list</h4>


                                  <!-- begin panel -->
                                  <div class="panel pagination-inverse m-b-0 clearfix">
                                      <table id="sponsors-users-table" data-order='[[1,"asc"]]' class="table table-bordered table-hover">
                                          <thead>
                                              <tr class="inverse">
                                                  <th>Username</th>
                                                  <th>First Name</th>
                                                  <th>Surname</th>
                                                  <th>Primary Contact</th>
                                                  <th>Amount Due</th>
                                                  <th data-sorting="disabled"></th>
                                              </tr>
                                          </thead>
                                         
                                      </table>
                                  </div>
                                  <!-- end panel -->
                                                

                            </div>
                            <div class="tab-pane fade" id="nav-pills-tab-2">
                                <h4>sponsored users</h4>

                                 <!-- begin panel -->
                                  <div class="panel pagination-inverse m-b-0 clearfix">
                                      <table id="sponsored-users-table" data-order='[[1,"asc"]]' class="table table-bordered table-hover">
                                          <thead>
                                              <tr class="inverse">
                                      
                                                  <th>Username</th>
                                                  <th>First Name</th>
                                                  <th>Surname</th>
                                                  <th>Primary Contact</th>
                                                  <th>Status</th>
                                                  <th data-sorting="disabled"></th>
                                              </tr>
                                          </thead>
                                         
                                      </table>
                                  </div>
                                  <!-- end panel -->



                               
                            </div>
                           
                        </div>
                        <!-- end tab-content -->
                    </div>
                    <!-- end col-6 -->
                  
                </div>
                <!-- end row -->
            </div>
            <!-- end section-container -->
          
                  
        @endsection

        @section('custom_stript')

            <script src="{{ asset('assets/js/home.js') }}"></script>

>>>>>>> c069028c0742e086308a05171dd8ade5ac51e7c3
        @endsection