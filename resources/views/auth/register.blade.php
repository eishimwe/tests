<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Rand Godz | Register Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Nunito:400,300,700" rel="stylesheet" id="fontFamilySrc" />
	<link href="{{ asset('/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/assets/css/animate.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/assets/css/style.min.css') }}" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
    
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('/assets/plugins/pace/pace.min.js') }}"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!--[if lt IE 9]>
	    <script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="page-loader fade in"><span class="spinner">Loading...</span></div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-container">
	    <!-- begin register -->
		<div class="register">
		    <!-- begin register-brand -->
            <div class="register-brand bg-inverse text-white">
                <img src="assets/img/logo-light.png" height="36" class="pull-right" alt="" /> Registration Form
            </div>
            <!-- end register-brand -->
            <!-- begin register-content -->
            <div class="register-content">
                <h4 class="m-t-0 m-b-5">Great to see you here!</h4>
                <p class="m-b-20">Create your Rand Godz Account</p>
                
                <form action="{{ url('/register') }}" method="POST" name="register_form" class="form-input-flat">
                     {{ csrf_field() }}

                    <div class="form-group">

                        @if (isset($referrer_names))
                            <span class="label label-inverse m-b-5">Sponsored by : {{ $referrer_names }}</span>
                            <input type="hidden" name="sponsor_username" value={{ $referrer_username}}>
                        @endif

                    </div>

                     <div class="row row-space-14">
                        <div class="col-md-6 m-b-15{{ $errors->has('username') ? ' has-error' : '' }}">
                            <input type="text" class="form-control input-lg" placeholder="Username" name="username" value="{{ old('username') }}"/>
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6 m-b-15{{ $errors->has('cellphone') ? ' has-error' : '' }}">
                            <input type="text" class="form-control input-lg" placeholder="Cell Number" name="cellphone" value="{{ old('cellphone') }}"/>
                            @if ($errors->has('cellphone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cellphone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row row-space-14">
                        <div class="col-md-6 m-b-15{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control input-lg" placeholder="First Name" name="first_name" value="{{ old('first_name') }}"/>
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6 m-b-15{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control input-lg" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}"/>
                             @if ($errors->has('last_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="text" class="form-control input-lg" placeholder="Email Address" name="email" value="{{ old('email') }}"/>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" class="form-control input-lg" placeholder="Password" name="password" value="{{ old('password') }}"/>
                         @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <input type="password" class="form-control input-lg" placeholder="Re-enter Password" name="password_confirmation" value="{{ old('password_confirmation') }}" />
                         @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="checkbox m-b-15">
                        <label>
                            <input type="checkbox"> By creating an account, you agree to our <a href="#" class="text-muted">Terms and condition</a> and <a href="#" class="text-muted">Privacy Policy</a>.
                        </label>
                    </div>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-lime btn-lg btn-block">Register</button>
                        </div>
                    </div>
                    <div class="text-center">
                        Already a member? <a href="{{ url('/login') }}" class="text-muted">Login with your account</a>
                    </div>
                </form>
            </div>
            <!-- end register-content -->
		</div>
		<!-- end register -->
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
    <script src="{{ asset('/assets/js/apps.min.js') }}"></script>
    <script src="{{ asset('/assets/js/demo.min.js') }}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
		    App.init();
		    Demo.initThemePanel();
		});
	</script>
</body>
</html>
