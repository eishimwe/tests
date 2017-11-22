<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Social Life Style</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="Social Life Style" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="{{ asset('/assets/css/fonts.css') }}" rel="stylesheet" />

    <link href="{{ asset('/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/style.min.css') }}" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->
    
    <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
    <link href="{{ asset('/assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />  
    <!-- ================== END PAGE LEVEL CSS STYLE ================== -->
    
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('/assets/plugins/pace/pace.min.js') }}"></script>
    <!-- ================== END BASE JS ================== -->

      <!-- DataTables Responsive CSS -->
        <link href="{{ asset('/bower_components/datatables-responsive/css/responsive.dataTables.scss') }}" rel="stylesheet">
    
    <!--[if lt IE 9]>
        <script src="assets/crossbrowserjs/excanvas.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="page-loader fade in"><span class="spinner">Loading...</span></div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade page-container page-header-fixed page-sidebar-fixed page-with-two-sidebar page-with-footer">
        <!-- begin #header -->
        <div id="header" class="header navbar navbar-default navbar-fixed-top">
            <!-- begin container-fluid -->
            <div class="container-fluid">
                <!-- begin mobile sidebar expand / collapse button -->
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand" > Social Life Style</a>
                    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- end mobile sidebar expand / collapse button -->
                
                <!-- begin navbar-right -->
                <ul class="nav navbar-nav navbar-right">
                   
                    <li class="dropdown">
                       <!--  <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle has-notify" data-click="toggle-notify">
                           <i class="fa fa-bell"></i>
                       </a> -->
                        <ul class="dropdown-menu dropdown-notification pull-right">
                            <li class="dropdown-header">Notifications (5)</li>
                            <li class="notification-item">
                                <a href="javascript:;">
                                    <div class="media"><i class="fa fa-exclamation-triangle"></i></div>
                                    <div class="message">
                                        <h6 class="title">Server Error Reports</h6>
                                        <div class="time">3 minutes ago</div>
                                    </div>
                                    <div class="option" data-toggle="tooltip" data-title="Mark as Read" data-click="set-message-status" data-status="unread" data-container="body">
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-item">
                                <a href="javascript:;">
                                    <div class="media"><img src="assets/img/user_1.jpg" alt="" /></div>
                                    <div class="message">
                                        <h6 class="title">Solvia Smith</h6>
                                        <p class="desc">Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                        <div class="time">25 minutes ago</div>
                                    </div>
                                    <div class="option read" data-toggle="tooltip" data-title="Mark as Unread" data-click="set-message-status" data-status="read" data-container="body">
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-item">
                                <a href="javascript:;">
                                    <div class="media"><img src="assets/img/user_2.jpg" alt="" /></div>
                                    <div class="message">
                                        <h6 class="title">Olivia</h6>
                                        <p class="desc">Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                        <div class="time">35 minutes ago</div>
                                    </div>
                                    <div class="option read" data-toggle="tooltip" data-title="Mark as Unread" data-click="set-message-status" data-status="read" data-container="body">
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-item">
                                <a href="javascript:;">
                                    <div class="media"><i class="fa fa-user-plus media-object"></i></div>
                                    <div class="message">
                                        <h6 class="title"> New User Registered</h6>
                                        <div class="time">1 hour ago</div>
                                    </div>
                                    <div class="option read" data-toggle="tooltip" data-title="Mark as Unread" data-click="set-message-status" data-status="read" data-container="body">
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-item">
                                <a href="javascript:;">
                                    <div class="media bg-success"><i class="fa fa-credit-card"></i></div>
                                    <div class="message">
                                        <h6 class="title"> New Item Sold</h6>
                                        <div class="time">2 hour ago</div>
                                    </div>
                                    <div class="option read" data-toggle="tooltip" data-title="Mark as Read" data-click="set-message-status" data-status="read" data-container="body">
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-footer text-center">
                                <a href="javascript:;">View more</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown navbar-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="image"><img src="assets/img/logo-light.png" alt="" /></span>
                            <span class="hidden-xs">
                                
                                
                                    @if (Auth::user())

                                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}

                                    @endif



                            </span> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu pull-right">
                        
                            <li><a href="{{ url('/logout') }}">Log Out</a></li>
                        </ul>
                    </li>
                    <li>
                        <!-- <a href="javascript:;" data-click="right-sidebar-toggled">
                            <i class="fa fa-align-left"></i>
                        </a> -->
                    </li>
                </ul>
                <!-- end navbar-right -->
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end #header -->
        
        <!-- begin #sidebar -->
        <div id="sidebar" class="sidebar">
            <!-- begin sidebar scrollbar -->
            <div data-scrollbar="true" data-height="100%">
                <!-- begin sidebar nav -->
                <ul class="nav">
                    <li class="nav-user">
                        <div class="image">
                            <img src="assets/img/logo-light.png" alt="" />
                        </div>
                        <div class="info">
                            <div class="name dropdown">
                                <a href="javascript:;" data-toggle="dropdown">

                                    @if (Auth::user())

                                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}

                                    @endif


                                 <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/logout') }}">Log Out</a></li>
                                </ul>
                            </div>
                            <div class="position">Social Life Style</div>
                        </div>
                    </li>
                    <li class="nav-header">Navigation</li>
                    <li class="active has-sub">
                        <a href="{{ url('home') }}">
                            <b class="pull-right"></b>
                            <i class="fa fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                      
                    </li>

                    <li class="has-sub">
                        <a href="{{ url('banking-details') }}">
                            <b class="pull-right"></b>
                            <i class="fa fa-money"></i>
                            <span>My Banking Details</span>
                            <span class="badge pull-right">{{ $number_bank_accounts }}</span>
                        </a>
                      
                    </li>
                    @if (Auth::user()->user_registration_statuses_id == 3)
                     <li class="has-sub">
                        <a href="{{ url('donations-details') }}">
                            <b class="pull-right"></b>
                            <i class="fa fa-money"></i>
                            <span>Orders / Investments</span>
                            <span class="badge pull-right">{{ $number_donations }}</span>
                        </a>
                      
                    </li>
                    @endif
               
                    @if (Auth::user()->role_id == 1)
                        <li class="has-sub">
                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-cogs"></i>
                                <span>Administration</span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="{{ url('list-users') }}">Users</a></li>
                                <li><a href="page_blank.html">Group Users</a></li>
                              
                            </ul>
                        </li>
                    @endif
                
                  
                    <li class="divider has-minify-btn">
                        <!-- begin sidebar minify button -->
                        <a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-left"></i></a>
                        <!-- end sidebar minify button -->
                    </li>
                  
                </ul>
                <!-- end sidebar nav -->
            </div>
            <!-- end sidebar scrollbar -->
        </div>
        <div class="sidebar-bg"></div>
        <!-- end #sidebar -->
        
         <!-- begin #content -->
        <div id="content" class="content">


            @yield('content')


        <!-- begin #footer -->
            <div id="footer" class="footer">
                <span class="pull-right">
                    <a href="javascript:;" class="btn-scroll-to-top" data-click="scroll-top">
                        <i class="fa fa-arrow-up"></i> <span class="hidden-xs">Back to Top</span>
                    </a>
                </span>
                &copy; 2016 <b>Social Life Style</b> All Right Reserved
            </div>
            <!-- end #footer -->
        </div>
        <!-- end #content -->
        
        <!-- begin #sidebar-right -->
        <div id="sidebar-right" class="sidebar sidebar-right">
            <!-- begin sidebar scrollbar -->
            <div data-scrollbar="true" data-height="100%">
                <!-- begin sidebar-nav -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="width-half active"><a href="#today" data-toggle="tab">Today</a></li>
                    <li class="width-half"><a href="#notifications" data-toggle="tab">Notifications</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="today">
                        <ul class="nav">
                            <li class="nav-date">
                                Sunday, May 31 st
                            </li>
                            <li class="divider"></li>
                            <li class="nav-header">Stocks</li>
                            <li>
                                <ul class="stock-list">
                                    <li>
                                        <div class="name">AAPL</div>
                                        <div class="value">130.28</div>
                                        <div class="percentage"><span class="label label-inverse">- 1.14%</span></div>
                                    </li>
                                    <li>
                                        <div class="name">DOWJ</div>
                                        <div class="value">18010.68</div>
                                        <div class="percentage"><span class="label label-inverse">- 0.64%</span></div>
                                    </li>
                                    <li>
                                        <div class="name">SBUX</div>
                                        <div class="value">51.96</div>
                                        <div class="percentage"><span class="label label-success">+ 0.29%</span></div>
                                    </li>
                                    <li>
                                        <div class="name">NKE</div>
                                        <div class="value">18010.68</div>
                                        <div class="percentage"><span class="label label-inverse">- 0.62%</span></div>
                                    </li>
                                    <li>
                                        <div class="name">YHOO</div>
                                        <div class="value">42.94</div>
                                        <div class="percentage"><span class="label label-inverse">- 0.31%</span></div>
                                    </li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="nav-header">Calendar</li>
                            <li>
                                <div id="schedule-calendar"></div>
                            </li>
                            <li class="divider"></li>
                            <li class="nav-header">Latest Post</li>
                            <li>
                                <ul class="nav-post">
                                    <li>
                                        <div class="image">
                                            <img src="assets/img/latest_post_1.jpg" alt="" />
                                        </div>
                                        <div class="info">
                                            <div class="title">Mauris ac condimentum erat. Curabitur porta pretium ultricies.</div>
                                            <div class="time">Today, 8.12am</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="image">
                                            <img src="assets/img/latest_post_2.jpg" alt="" />
                                        </div>
                                        <div class="info">
                                            <div class="title">Cras pretium ipsum vel nulla laoreet malesuada sed at turpis.</div>
                                            <div class="time">Yesterday, 11.42pm</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="image">
                                            <img src="assets/img/latest_post_3.jpg" alt="" />
                                        </div>
                                        <div class="info">
                                            <div class="title">Ut sit amet vulputate ante. Nunc quis convallis arcu.</div>
                                            <div class="time">Posted on 3 days ago</div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="notifications">
                        <ul class="nav">
                            <li class="nav-header">Mailbox</li>
                            <li>
                                <ul class="notification-list">
                                    <li>
                                        <div class="media"><i class="fa fa-check"></i></div>
                                        <div class="info">
                                            <div class="title"><a href="javascript:;">PHP version updated</a></div>
                                            <div class="time">Yesterday, 6.06pm</div>
                                            <div class="desc">Donec tristique malesuada nibh quis lobortis. Quisque viverra faucibus hendrerit.</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media"><i class="fa fa-bug text-danger"></i></div>
                                        <div class="info">
                                            <div class="title"><a href="javascript:;">10 Unknown mysql query detected</a></div>
                                            <div class="time">Yesterday, 12.05am</div>
                                            <div class="desc">Integer fermentum arcu et dolor sodales, quis laoreet justo aliquam.</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media"><img src="assets/img/user_2.jpg" alt="" /></div>
                                        <div class="info">
                                            <div class="title"><a href="javascript:;">New email from David</a></div>
                                            <div class="time">Just now</div>
                                            <div class="desc">Nunc metus orci, lobortis eu luctus quis, dictum mollis ante.</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media"><img src="assets/img/user_4.jpg" alt="" /></div>
                                        <div class="info">
                                            <div class="title"><a href="javascript:;">New email from Terry</a></div>
                                            <div class="time">Today, 12.05am</div>
                                            <div class="desc">Integer fermentum arcu et dolor sodales, quis laoreet justo aliquam.</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media"><img src="assets/img/user_3.jpg" alt="" /></div>
                                        <div class="info">
                                            <div class="title"><a href="javascript:;">New email from Tom (2)</a></div>
                                            <div class="time">Yesterday, 5.23pm</div>
                                            <div class="desc">Integer fermentum arcu et dolor sodales, quis laoreet justo aliquam.</div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="nav-header">Activities Log</li>
                            <li>
                                <ul class="notification-list">
                                    <li>
                                        <div class="media"><i class="fa fa-cog"></i></div>
                                        <div class="info">
                                            <div class="title"><a href="javascript:;">Your scheduled post has been published</a></div>
                                            <div class="time">Just now</div>
                                            <div class="desc">Aenean lobortis libero libero, vitae imperdiet dolor dictum id.</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media"><i class="fa fa-shield"></i></div>
                                        <div class="info">
                                            <div class="title"><a href="javascript:;">Turn on the firewall</a></div>
                                            <div class="time">Today, 7.08am</div>
                                            <div class="desc">Donec at augue in mi egestas luctus fermentum et ex.</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media"><i class="fa fa-user-plus"></i></div>
                                        <div class="info">
                                            <div class="title"><a href="javascript:;">Added 2 admin user</a></div>
                                            <div class="time">Today, 6.40am</div>
                                            <div class="desc">Quisque elementum urna placerat mi vestibulum lacinia.</div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                        </ul>
                    </div>
                </div>
                <!-- end sidebar-nav -->
            </div>
            <!-- end sidebar scrollbar -->
        </div>
        <div class="sidebar-bg sidebar-right"></div>
        <!-- end #sidebar-right -->
    </div>
    <!-- end page container -->
    

    
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('/assets/plugins/jquery/jquery-1.9.1.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/jquery/jquery-migrate-1.1.0.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--[if lt IE 9]>
        <script src="assets/crossbrowserjs/html5shiv.js"></script>
        <script src="assets/crossbrowserjs/respond.min.js"></script>
    <![endif]-->
    <script src="{{ asset('/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
    <!-- ================== END BASE JS ================== -->
    
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{ asset('/assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/chart-js/chart.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/gritter/js/jquery.gritter.js') }}"></script>
    <script src="{{ asset('/assets/js/page-index-v2.demo.js') }}"></script>
   
    
    <script src="{{ asset('assets/plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/Buttons/js/buttons.colvis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js') }}"></script>
    
    <script src="{{ asset('assets/js/demo.min.js') }}"></script>
    <script src="{{ asset('assets/js/apps.min.js') }}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    @yield('custom_stript')

    @include('stript')
    


    
    <script>
        $(document).ready(function() {
            App.init();
            Demo.init();
            PageDemo.init();
        });
    </script>
</body>
</html>
