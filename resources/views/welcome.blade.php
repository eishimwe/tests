<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
    <title>Rand Godz</title>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    
    <!-- Favicon --> 
    <link rel="shortcut icon" href="images/favicon.ico">
    
    <!-- this styles only adds some repairs on idevices  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Google fonts - witch you want to use - (rest you can just remove) -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
    
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <!-- ######### CSS STYLES ######### -->
    
    <link rel="stylesheet" href="{{ asset('/assets/css/reset.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('/assets/css/website.css') }}" type="text/css" />
    
    <link href="{{ asset('/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    
    <!-- responsive devices styles -->
    <link rel="stylesheet" media="screen" href="{{ asset('/assets/css/responsive-leyouts.css') }}" type="text/css" />

    <!-- animations -->
    <link href="{{ asset('/assets/css/animations.min.css') }}" rel="stylesheet" type="text/css" media="all" />


    <link rel="stylesheet" href="{{ asset('/assets/css/yellow.css') }}" />

    
    <!-- mega menu -->
    <link href="{{ asset('/assets/css/stickytwo.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/demo.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/menu.css') }}" rel="stylesheet">
    
    <!-- Master Slider -->
    <link rel="stylesheet" href="{{ asset('/assets/masterslider/style/masterslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/masterslider/skins/default/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/masterslider/style.css') }}" />
    
    <link href="{{ asset('/assets/masterslider/style/ms-staff-style.css') }}" rel='stylesheet' type='text/css'>

    <!-- cubeportfolio -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/cubeportfolio/cubeportfolio.min.css') }}">
    
    <!-- tabs -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/tabs/assets/css/responsive-tabs.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/tabs/assets/css/responsive-tabs2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/tabs/assets/css/responsive-tabs3.css') }}">

    <!-- carousel -->
    <link rel="stylesheet" href="{{ asset('/assets/carousel/flexslider.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/carousel/skin.css') }}" />
    
    <!-- accordion -->
    <link rel="stylesheet" href="{{ asset('/assets/accordion/accordion.css') }}" type="text/css" media="all">
    
    <!-- Lightbox -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/lightbox/jquery.fancybox.css') }}" media="screen" />
    
    
</head>

<body>

<div class="site_wrapper">

<header id="header">
    
    <div id="trueHeader">
    
    <div class="wrapper">
    
    
    <div class="logoarea">
    <div class="container">
    
    <!-- Logo -->
    <div class="logo"><a href="index.html" id="logo"></a></div>
    
    <div class="right_links">
        
        <ul>
            <li class="link"><a href="mailto:admin@randgodz.co.za"><i class="fa fa-envelope"></i> admin@randgodz.co.za</a></li>
            <li class="link"><a href="{{ url('/register') }}"><i class="fa fa-edit"></i> Register</a></li>
            <li class="link"><a href="{{ url('/login') }}"><i class="fa fa-edit"></i> Login</a></li>
        </ul>
        
    </div><!-- end right links -->
    
    
    </div>
    </div>
        
    <!-- Menu -->
    <div class="menu_main">
    
    <div class="container">
        
    <div class="navbar yamm navbar-default">
    
    <div class="container">
      <div class="navbar-header">
        <div class="navbar-toggle .navbar-collapse .pull-right " data-toggle="collapse" data-target="#navbar-collapse-1"  > <span>Menu</span>
          <button type="button" > <i class="fa fa-bars"></i></button>
        </div>
      </div>
      
      <div id="navbar-collapse-1" class="navbar-collapse collapse">
      
        <ul class="nav navbar-nav">
        
        <li><a href="{{ url('/') }}" class="active">Home</a></li>
        
        <li> <a href="#">Process</a></li>
       
        <li> <a href="#">FAQs</a></li>
        
        <li> <a href="#">Contact</a></li>
        
        <li> <a href="{{ url('/register') }}">Register</a></li>
        
        <li> <a href="{{ url('/login') }}">Login</a></li>
        
        </ul>
        
        <div id="wrap">
          <form action="index.html" autocomplete="on">
          <input id="search" name="search" type="text" placeholder=""><input id="search_submit" value="search" type="submit">
          </form>
        </div>  
            
      </div>
      </div>
     </div>
     
    </div>
    </div><!-- end menu -->
        
    </div>
    
    </div>
    
</header>

<div class="clearfix"></div>

<!-- Slider
======================================= -->  

<div class="container_full slidertop">
    
    
    <div class="master-slider ms-skin-default" id="masterslider">
    
    <!-- slide sokuqala  -->
    <div class="ms-slide slide-2" data-delay="8">
         
        <!-- slide background -->
        <img src="{{ asset('/assets/images/sliders/image3.jpg') }}" data-src="{{ asset('/assets/images/sliders/image3.jpg') }}" alt="Rand Godz"/>     
        

        <h1 class="ms-layer stext4"
            style="left: 130px; top: 335px;"
            data-type="text"
            data-duration="900"
            data-delay="800"
            data-ease="easeOutExpo"
            data-effect="bottom(40)"
        >
            Freedom is a<br /> 
            <strong>State of <em>Mind</em></strong>
        </h1>
        
        <h4 class="ms-layer stext5"
            style="left: 130px; top: 470px;"
            data-type="text"
            data-duration="900"
            data-delay="1500"
            data-ease="easeOutExpo"
            data-effect="bottom(40)"
        >
            Take a leap into your financial freedom.
        </h4>
        
        <div class="ms-layer"
            style="left: 130px; top: 550px;"
            data-type="text"
            data-delay="2500"
            data-ease="easeOutExpo"
            data-duration="900"
            data-effect="scale(1.5,1.6)"
        >
            <a href="{{ url('/register') }}" class="sbutton1">Become a Rand God Now!</a>
        </div>
        
    </div>
    <!-- end of slide sokuqala -->

    <!-- slide sesibili  -->
    <div class="ms-slide slide-2" data-delay="8">
         
        <!-- slide background -->
        <img src="{{ asset('/assets/images/sliders/image1.jpg') }}" data-src="{{ asset('/assets/images/sliders/image1.jpg') }}" alt="Rand Godz"/>     
        

        <h1 class="ms-layer stext1"
            style="left: 130px; top: 335px;"
            data-type="text"
            data-duration="900"
            data-delay="800"
            data-ease="easeOutExpo"
            data-effect="bottom(40)"
        >
            
            <strong>From Scarcity to <br><em>Abundance</em></strong>
        </h1>
        
        
        <div class="ms-layer"
            style="left: 130px; top: 550px;"
            data-type="text"
            data-delay="2500"
            data-ease="easeOutExpo"
            data-duration="900"
            data-effect="scale(1.5,1.6)"
        >
            <a href="#" class="sbutton1">Get Started Today!</a>
        </div>
        
    </div>
    <!-- end of slide sesibili -->    

    <!-- slide sesithathu  -->
    <div class="ms-slide slide-2" data-delay="8">
         
        <!-- slide background -->
        <img src="{{ asset('/assets/images/sliders/image2.jpg') }}" data-src="{{ asset('/assets/images/sliders/image2.jpg') }}" alt="Rand Godz"/>     

        
        <div class="ms-layer"
            style="left: 130px; top: 550px;"
            data-type="text"
            data-delay="2500"
            data-ease="easeOutExpo"
            data-duration="900"
            data-effect="scale(1.5,1.6)"
        >
            <a href="#" class="sbutton1">Become a Member</a>
        </div>
        
    </div>
    <!-- end of slide sesithathu -->

 
</div>

</div><!-- end slider -->



<div class="clearfix"></div>


<div class="feature_section30 two">
<div class="container">

    <section class="slider nosidearrows">
        <div class="flexslider carousel">
          <ul class="slides">
    
                <li>
                    
                    <div class="one_half">
                        <br />
                        <h1 class="whitecaps">Join The <em>Rand Godz</em> <br /> <strong>Community</strong></h1>
                        <p class="white">Become a Rand God by making donations to other members of the Rand Godz community. The minimum amount allowed for donations is R500.00. This donation is offered to other members of the Rand community who need the financial injection.<br><br>

                            One you have donated to a member, you will get an incentive of 50% in at least 48 hours.</p>
                        <br /><br />
                        <a href="{{ url('/register') }}" class="readmore_but10">Register Now!</a> 
                        <a href="{{ url('/login') }}" class="readmore_but10">Login</a>
                    </div>
                    
                    <div class="one_half last"><img src="{{ asset('/assets/images/desktop.png') }}" alt="" class="img_left" /></div>
                    
                </li><!-- end section -->
               
                <li>
                    
                    <div class="one_half">
                        <br />
                        <h1 class="whitecaps">Members should be at least <br /> <strong>18 years or older</strong> to become a member</h1>

                        <br /><br />
                        <a href="{{ url('/register') }}" class="readmore_but10">Register Now!</a> <a href="{{ url('/login') }}" class="readmore_but10">Login</a>
                    </div>
                    
                    <div class="one_half last"><img src="{{ asset('/assets/images/desktop-2.png') }}" alt="" class="img_left" /></div>
                    
                </li><!-- end section -->
                
                <li>
                    
                    <div class="one_half">
                        <br />
                        <h1 class="whitecaps">More about the <br /> <strong>Rand Godz</strong></h1>
                        <br /><br />
                        <a href="{{ url('/register') }}" class="readmore_but10">Get Started</a> <a href="{{ url('/login') }}" class="readmore_but10">Login!</a>
                    </div>
                    
                    <div class="one_half last"><img src="{{ asset('/assets/images/desktop-3.png') }}" alt="" class="img_left" /></div>
                    
                </li><!-- end section -->
                
            </ul>
        </div>
        </section>


</div>
</div><!-- end features section 30 -->

<div class="clearfix"></div>

<div class="copyright_info four">
<div class="container">
    
    <div class="one_half">
    
        Copyright © 2016 Rand Godz. All rights reserved.  <a href="#">Terms and Conditions of use</a>
                   
    </div>
    
</div>
</div><!-- end copyright info -->


<a href="#" class="scrollup">Scroll</a><!-- end scroll to top of the page-->



</div>

    
<!-- ######### JS FILES ######### -->
<!-- get jQuery from the google apis -->
<script type="text/javascript" src="{{ asset('/assets/universal/jquery.js') }}"></script>


<!-- animations -->
<script src="{{ asset('/assets/animations/js/animations.min.js') }}" type="text/javascript"></script>


<!-- Master Slider -->
<script src="{{ asset('/assets/masterslider/jquery.easing.min.js') }}"></script>
<script src="{{ asset('/assets/masterslider/masterslider.min.js') }}"></script>
<script type="text/javascript">
(function($) {
 "use strict";

var slider = new MasterSlider();
 slider.setup('masterslider' , {
     width: 1400,    // slider standard width
     height:720,   // slider standard height
     space:0,
     speed:45,
     fullwidth:true,
     loop:true,
     preload:0,
     autoplay:true,
     view:"basic"
});
// adds Arrows navigation control to the slider.
slider.control('arrows');
slider.control('bullets');

})(jQuery);
</script>

<script type="text/javascript"> 
(function($) {
 "use strict";

    var slider5 = new MasterSlider();
    slider5.setup('masterslider5' , {
        loop:true,
        width:240,
        height:240,
        speed:20,
        view:'focus',
        preload:0,
        space:35,
        viewOptions:{centerSpace:1.6}
    });
    slider5.control('arrows');
    slider5.control('slideinfo',{insertTo:'#staff-info'});
    
})(jQuery);
</script>

<!-- mega menu -->
<script src="{{ asset('/assets/mainmenu/bootstrap.min.js') }}"></script>

<!-- jquery jcarousel -->
<script type="text/javascript" src="{{ asset('/assets/carousel/jquery.jcarousel.min.js') }}"></script>

<!-- scroll up -->
<script src="{{ asset('/assets/scrolltotop/totop.js') }}" type="text/javascript"></script>

<!-- tabs -->
<script src="{{ asset('/assets/tabs/assets/js/responsive-tabs.min.js') }}" type="text/javascript"></script>

<!-- jquery jcarousel -->
<script type="text/javascript">
(function($) {
 "use strict";

    jQuery(document).ready(function() {
            jQuery('#mycarouselthree').jcarousel();
    });
    
})(jQuery);
</script>

<!-- accordion -->
<script type="text/javascript" src="{{ asset('/assets/accordion/custom.js') }}"></script>

<!-- sticky menu -->
<script type="text/javascript" src="{{ asset('/assets/mainmenu/sticky.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/mainmenu/modernizr.custom.75180.js') }}"></script>

<!-- cubeportfolio -->
<script type="text/javascript" src="{{ asset('/assets/cubeportfolio/jquery.cubeportfolio.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/cubeportfolio/main.js') }}"></script>

<!-- carousel -->
<script defer src="{{ asset('/assets/carousel/jquery.flexslider.js') }}"></script>
<script defer src="{{ asset('/assets/carousel/custom.js') }}"></script>

<!-- lightbox -->
<script type="text/javascript" src="{{ asset('/assets/lightbox/jquery.fancybox.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/lightbox/custom.js') }}"></script>



</body>
</html>
