<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Rand Godz | Login Page</title>
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
	    <!-- begin login -->
		<div class="login">
		    <!-- begin login-brand -->
            <div class="login-brand bg-inverse text-white">
                <img src="assets/img/logo-white.png" height="36" class="pull-right" alt="" /> Login Panel
            </div>
		    <!-- end login-brand -->
		    <!-- begin login-content -->
            <div class="login-content">
                <h4 class="text-center m-t-0 m-b-20">From Scarcity to Abundance !</h4>
                <form method="POST" name="login_form" action="{{ url('/login') }}"class="form-input-flat">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="text" class="form-control input-lg" name="email" value="{{ old('email') }}" placeholder="Email Address" />

                         @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="text" class="form-control input-lg" placeholder="Password" name="password"/>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row m-b-20">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-lime btn-lg btn-block">Sign in to your account</button>
                        </div>
                    </div>
                    <div class="text-center">
                        New here? <a href="{{ url('/register') }}" class="text-muted">Create a new account</a>
                    </div>
                </form>
            </div>
		    <!-- end login-content -->
		</div>
		<!-- end login -->
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
    <script src="{{ asset('/assets/js/demo.min.js') }}"></script>
    <script src="{{ asset('/assets/js/apps.min.js') }}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
		    App.init();
		    Demo.initThemePanel();
		});
	</script>
</body>
</html>
