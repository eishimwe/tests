  
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
                Your account has been successfully activated,your personal referral identification is '<strong>{{ \Request::root() }}/{{ \Auth::user()->username }}</strong>'
                <span class="close" data-dismiss="alert">&times;</span>
            </div>
    
            @else

            <h1 class="page-header">Home <small>header small text goes here...</small></h1>
           

            @endif
            <!-- end page-header -->
            
            <!-- begin row -->
            <div class="row">
                <!-- begin col-3 -->
                <div class="col-sm-6 col-lg-3">
                    <!-- begin widget -->
                    <div class="widget widget-stat widget-stat-right bg-inverse text-white">
                        <div class="widget-stat-btn"><a href="javascript:;" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                        <div class="widget-stat-icon"><i class="fa fa-chrome"></i></div>
                        <div class="widget-stat-info">
                            <div class="widget-stat-title">New Visitors</div>
                            <div class="widget-stat-number">839</div>
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
                <!-- begin col-3 -->
                <div class="col-sm-6 col-lg-3">
                    <!-- begin widget -->
                    <div class="widget widget-stat widget-stat-right bg-success text-white">
                        <div class="widget-stat-btn"><a href="javascript:;" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                        <div class="widget-stat-icon"><i class="fa fa-diamond"></i></div>
                        <div class="widget-stat-info">
                            <div class="widget-stat-title">New Premium User</div>
                            <div class="widget-stat-number">71</div>
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
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-sm-6 col-lg-3">
                    <!-- begin widget -->
                    <div class="widget widget-stat widget-stat-right bg-primary text-white">
                        <div class="widget-stat-btn"><a href="javascript:;" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                        <div class="widget-stat-icon"><i class="fa fa-hdd-o"></i></div>
                        <div class="widget-stat-info">
                            <div class="widget-stat-title">Total Bandwidth Used</div>
                            <div class="widget-stat-number">128gb</div>
                        </div>
                        <div class="widget-stat-progress">
                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                        </div>
                        <div class="widget-stat-footer">1,024gb Left</div>
                    </div>
                    <!-- end widget -->
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-sm-6 col-lg-3">
                    <!-- begin widget -->
                    <div class="widget widget-stat widget-stat-right bg-info text-white">
                        <div class="widget-stat-btn"><a href="javascript:;" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                        <div class="widget-stat-icon"><i class="fa fa-file"></i></div>
                        <div class="widget-stat-info">
                            <div class="widget-stat-title">Pending Invoice</div>
                            <div class="widget-stat-number">29</div>
                        </div>
                        <div class="widget-stat-progress">
                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                        </div>
                        <div class="widget-stat-footer">3 new transaction</div>
                    </div>
                    <!-- end widget -->
                </div>
                <!-- end col-3 -->
            </div>
            <!-- end row -->
            
            <!-- begin row -->
            <div class="row">
                <!-- begin col-6 -->
                <div class="col-lg-6">
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-lime" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Visitors Analytics <small>monthly stat</small></h4>
                        </div>
                        <div class="panel-body">
                            <div class="panel-option">
                                <div class="dropdown pull-right">
                                    <a href="javascript:;" class="btn btn-white btn-rounded btn-sm" data-toggle="dropdown">Change Date <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:;">Last Week</a></li>
                                        <li><a href="javascript:;">Last Month</a></li>
                                        <li><a href="javascript:;">Last Year</a></li>
                                    </ul>
                                </div>
                                <div class="text-ellipsis">Date: 1 November 2015 - 30 November 2015</div>
                            </div>
                            <div>
                                <canvas id="chart-visitor-analytics" data-height="228px" class="width-full"></canvas>
                                <div id="visitor-analytics-tooltip" class="chartjs-tooltip"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
                <!-- begin col-6 -->
                <div class="col-lg-6">
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-lime" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Browser Analytics <small>monthly stat</small></h4>
                        </div>
                        <div class="panel-body p-b-0">
                            <!-- begin row -->
                            <div class="row">
                                <!-- begin col-6 -->
                                <div class="col-sm-6 m-b-20">
                                    <div class="chart-summary-container">
                                        <div class="chart-title text-purple">Google Chrome</div>
                                        <div class="chart-doughnut">
                                            <canvas id="doughnut-chrome"></canvas>
                                            <div id="doughnut-chrome-tooltip" class="chartjs-tooltip"></div>
                                        </div>
                                        <div class="chart-info">
                                            <div class="chart-summary">
                                                <div class="text">Total Visits</div>
                                                <div class="number">192,102 <small>(65.5%)</small></div>
                                            </div>
                                            <div class="chart-summary">
                                                <div class="text">Unique Visitors</div>
                                                <div class="number">52,102</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col-6 -->
                                <!-- begin col-6 -->
                                <div class="col-sm-6 m-b-20">
                                    <div class="chart-summary-container">
                                        <div class="chart-title text-primary">Internet Explorer</div>
                                        <div class="chart-doughnut">
                                            <canvas id="doughnut3"></canvas>
                                            <div id="doughnut-ie-tooltip" class="chartjs-tooltip"></div>
                                        </div>
                                        <div class="chart-info">
                                            <div class="chart-summary">
                                                <div class="text">Total Visits</div>
                                                <div class="number">2,102 <small>(2.2%)</small></div>
                                            </div>
                                            <div class="chart-summary">
                                                <div class="text">Unique Visitors</div>
                                                <div class="number">602</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- begin row -->
                            <div class="row">
                                <!-- begin col-6 -->
                                <div class="col-sm-6 m-b-20">
                                    <div class="chart-summary-container">
                                        <div class="chart-title text-warning">Mozilla Firefox</div>
                                        <div class="chart-doughnut">
                                            <canvas id="doughnut4"></canvas>
                                            <div id="doughnut-firefox-tooltip" class="chartjs-tooltip"></div>
                                        </div>
                                        <div class="chart-info">
                                            <div class="chart-summary">
                                                <div class="text">Total Visits</div>
                                                <div class="number">62,102 <small>(20.2%)</small></div>
                                            </div>
                                            <div class="chart-summary">
                                                <div class="text">Unique Visitors</div>
                                                <div class="number">8,402</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col-6 -->
                                <!-- begin col-6 -->
                                <div class="col-sm-6 m-b-20">
                                    <div class="chart-summary-container">
                                        <div class="chart-title text-success">Safari</div>
                                        <div class="chart-doughnut">
                                            <canvas id="doughnut5"></canvas>
                                            <div id="doughnut-safari-tooltip" class="chartjs-tooltip"></div>
                                        </div>
                                        <div class="chart-info">
                                            <div class="chart-summary">
                                                <div class="text">Total Visits</div>
                                                <div class="number">22,102 <small>(4.5%)</small></div>
                                            </div>
                                            <div class="chart-summary">
                                                <div class="text">Unique Visitors</div>
                                                <div class="number">5,291</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col-6 -->
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
            </div>
            <!-- end row -->
            
            <!-- begin row -->
            <div class="row">
                <!-- begin col-4 -->
                <div class="col-lg-4">
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-lime" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Recent Activities</h4>
                        </div>
                        <div class="panel-body p-b-15">
                            <div data-scrollbar="true" data-height="280px">
                                <ul class="feeds">
                                    <li>
                                        <a href="javascript:;">
                                            <div class="icon bg-success-light"><i class="fa fa-check"></i></div>
                                            <div class="time">Just Now</div>
                                            <div class="desc">You sold an item</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="icon bg-info-light"><i class="fa fa-info-circle"></i></div>
                                            <div class="time">24 mins</div>
                                            <div class="desc">You have exceeded the limit of email sender</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="icon bg-warning-light"><i class="fa fa-file-text"></i></div>
                                            <div class="time">20 mins</div>
                                            <div class="desc">New pending invoice <span class="label label-inverse m-l-5">INV-910129</span></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="icon bg-danger-light"><i class="fa fa-hdd-o"></i></div>
                                            <div class="time">25 mins</div>
                                            <div class="desc">Server Overloaded <span class="label label-danger m-l-5">Urgent!</span></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="icon bg-grey-light"><i class="fa fa-bell"></i></div>
                                            <div class="time">25 mins</div>
                                            <div class="desc">MYSQL Script Error</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="icon bg-grey-light"><i class="fa fa-bug"></i></div>
                                            <div class="time">30 mins</div>
                                            <div class="desc">4 Server Script Error</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="icon bg-success-light"><i class="fa fa-plus"></i></div>
                                            <div class="time">1 hours</div>
                                            <div class="desc">New user registered premium account</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="icon bg-success-light"><i class="fa fa-check"></i></div>
                                            <div class="time">2 hours</div>
                                            <div class="desc">You sold an item</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="icon bg-info-light"><i class="fa fa-info-circle"></i></div>
                                            <div class="time">3 hours</div>
                                            <div class="desc">You have exceeded the limit of email sender</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="icon bg-warning-light"><i class="fa fa-file-text"></i></div>
                                            <div class="time">3 hours</div>
                                            <div class="desc">New pending invoice <span class="label label-inverse m-l-5">INV-149201</span></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-right m-t-10">
                                <a href="javascript:;" class="text-inverse">See more records <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-4 -->
                <!-- begin col-4 -->
                <div class="col-lg-4">
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-lime" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Chat History</h4>
                        </div>
                        <div class="panel-body">
                            <div data-scrollbar="true" data-height="248px">
                                <ul class="chats">
                                    <li class="left">
                                        <a href="javascript:;" class="image"><img alt="" src="assets/img/user_1.jpg" /></a>
                                        <div class="message">
                                            <a href="javascript:;" class="name">Sowse Bawdy</a>
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit volutpat. Praesent mattis interdum arcu eu feugiat.
                                            <span class="date-time">11:23pm</span>
                                        </div>
                                    </li>
                                    <li class="right">
                                        <a href="javascript:;" class="image"><img alt="" src="assets/img/user_2.jpg" /></a>
                                        <div class="message">
                                            <a href="javascript:;" class="name">Me</a>
                                            Nullam posuere, nisl a varius rhoncus, risus tellus hendrerit neque.
                                            <span class="date-time">08:12am</span>
                                        </div>
                                    </li>
                                    <li class="left">
                                        <a href="javascript:;" class="image"><img alt="" src="assets/img/user_3.jpg" /></a>
                                        <div class="message">
                                            <a href="javascript:;" class="name">Neck Jolly</a>
                                            Euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                            <span class="date-time">09:20am</span>
                                        </div>
                                    </li>
                                    <li class="left">
                                        <a href="javascript:;" class="image"><img alt="" src="assets/img/user_4.jpg" /></a>
                                        <div class="message">
                                            <a href="javascript:;" class="name">Shag Strap</a>
                                            Nullam iaculis pharetra pharetra. Proin sodales tristique sapien mattis placerat.
                                            <span class="date-time">11:15am</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-footer bg-white">
                            <form name="send_message_form" class="form-input-flat">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="message" placeholder="Enter your message here.">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">Send</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-4 -->
                <!-- begin col-4 -->
                <div class="col-lg-4">
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-lime" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">People on Project</h4>
                        </div>
                        <div class="panel-body">
                            <ul class="project-summary">
                                <li>
                                    <div class="project-title">Project manager</div>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 60%"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="project-title">UX strategy</div>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 40%"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="project-title">UX desiner</div>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 70%"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="project-title">Art director</div>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 20%"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="project-title">Designer</div>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 85%"></div>
                                    </div>
                                </li>
                                <li class="users">
                                    <div class="title">People involved </div>
                                    <ul class="image-list">
                                        <li><img src="assets/img/user_8.jpg" alt="" /></li>
                                        <li><img src="assets/img/user_9.jpg" alt="" /></li>
                                        <li><img src="assets/img/user_10.jpg" alt="" /></li>
                                        <li><img src="assets/img/user_11.jpg" alt="" /></li>
                                        <li><img src="assets/img/user_12.jpg" alt="" /></li>
                                        <li><img src="assets/img/user_13.jpg" alt="" /></li>
                                        <li class="add-btn">
                                            <a href="javascript:;"><i class="fa fa-plus"></i></a>
                                        </li>
                                    </ul>   
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-4 -->
            </div>
            <!-- end row -->
            
            
        @endsection