  
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
                         <div class="widget-stat-title">Sponsored Users</div>
                         <div class="widget-stat-number">{{ $number_of_sponsored_users }}</div>
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
          
          
         
         </div>
        <!--  end row -->
              
            
        @endsection