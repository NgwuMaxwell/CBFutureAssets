<!DOCTYPE html>
<html lang="en">

 


<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="{{ asset('storage/app/public/' . $settings->logo) }}">
    <meta name="description" content="{{$settings->site_name}} is one of the world's leading forex,stock and crypto trading platform ">
    

    <!-- ========== Page Title ========== -->
    <title>{{$settings->site_name}} is one of the world's leading forex,stock and crypto trading platform </title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{ asset('storage/app/public/photos/'.$settings->favicon)}}" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="temp/front/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="temp/front/assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="temp/front/assets/css/flaticon-set.css" rel="stylesheet" />
    <link href="temp/front/assets/css/elegant-icons.css" rel="stylesheet" />
    <link href="temp/front/assets/css/magnific-popup.css" rel="stylesheet" />
    <link href="temp/front/assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="temp/front/assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="temp/front/assets/css/animate.css" rel="stylesheet" />
    <link href="temp/front/assets/css/bootsnav.css" rel="stylesheet" />
    <link href="temp/front/style.css" rel="stylesheet">
    <link href="temp/front/assets/css/responsive.css" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

</head>


<!-- withdraw statement-->
<!-- withdraw statement-->

<div class="mgm" style="display: none ;">
<div class="txt" style="color:black;">Someone from <b></b> just traded with <a href="javascript:void(0);" onclick="javascript:void(0);"></a></div>
</div>

<style>
.mgm {
    border-radius: 7px;
    position: fixed;
    z-index: 90;
    bottom: 80px;
    right: 50px;
    background: #fff;
    padding: 10px 27px;
    box-shadow: 0px 5px 13px 0px rgba(0,0,0,.3);
}
.mgm a {
    font-weight: 700;
    display: block;
    color:#f2d516;
}
.mgm a, .mgm a:active {
    transition: all .2s ease;
    color:#f2d516;
}
</style>
<script type="text/javascript">
var listCountries = ['United Kingdom', 'USA', 'Germany', 'France', 'Italy', 'USA', 'Australia', 'Lesotho', 'Canada', 'Argentina', 'Saudi Arabia', 'Mexico', 'Kenya', 'Maldives', 'Venezuela', 'Demark', 'Sweden', 'India', 'United State', 'Italy', 'Pakistan', 'United Kingdom', 'Demark', 'Greece', 'Cuba', 'United State', 'Portugal', 'Austria', 'United State', 'Panama', 'USA', 'United State', 'Netherlands', 'Switzerland', 'Belgium', 'Israel', 'Cyprus'];
	var listPlans = ['$50,000','$15,000','$20,000','$10,000','$2000','$3000','$4000', '$60,800', '$700', '$2,500', '$12,500', '$22,500', '$900', '$1,000'];
	interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
    var run = setInterval(request, interval);

    function request() {
        clearInterval(run);
        interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
        var country = listCountries[Math.floor(Math.random() * listCountries.length)];
        var plan = listPlans[Math.floor(Math.random() * listPlans.length)];
        var msg = 'Someone from <b>' + country + '</b> just Withdrew <strong href="javascript:void(0);" onclick="javascript:void(0);">' + plan + ' </strong>';
        $(".mgm .txt").htnl(msg);
        $(".mgm").stop(true).fadeIn(2);
        window.setTimeout(function() {
            $(".mgm").stop(true).fadeOut(100);
        }, 8000);
        run = setInterval(request, interval);
    }
</script>


<div class="mgm" style="display: none ;">
<div class="txt" style="color:black;">Someone from <b></b> just traded with <a href="javascript:void(0);" onclick="javascript:void(0);"></a></div>
</div>

<style>
.mgm {
    border-radius: 7px;
    position: fixed;
    z-index: 90;
    bottom: 80px;
    right: 50px;
    background: #fff;
    padding: 10px 27px;
    box-shadow: 0px 5px 13px 0px rgba(0,0,0,.3);
}
.mgm a {
    font-weight: 700;
    display: block;
    color:#f2d516;
}
.mgm a, .mgm a:active {
    transition: all .2s ease;
    color:#f2d516;
}
</style>
<script type="text/javascript">
var listCountries = ['London', 'Carlifornia', 'Germany', 'France', 'Italy', 'USA', 'Australia', 'Lesotho', 'Canada', 'Argentina', 'Saudi Arabia', 'Mexico', 'Kenya', 'Maldives', 'Venezuela', 'Soweto', 'Sweden', 'India', 'United State', 'Italy', 'Pakistan', 'United Kingdom', 'United State', 'Greece', 'Cuba', 'United State', 'Delhi', 'Austria', 'United State', 'Panama', 'USA', 'United State', 'Netherlands', 'Switzerland', 'Belgium', 'Israel', 'Cyprus'];
    var listPlans = ['$600','$500','$1,000','$2,150','$8,400','$3,220','$400', '$600', '$750', '$2,500', '$6000', '$18,000', '$12,000'];
	interval = Math.floor(Math.random() * (30000 - 8000 + 1) + 8000);
    var run = setInterval(request, interval);

    function request() {
        clearInterval(run);
        interval = Math.floor(Math.random() * (30000 - 8000 + 1) + 8000);
        var country = listCountries[Math.floor(Math.random() * listCountries.length)];
        var plan = listPlans[Math.floor(Math.random() * listPlans.length)];
        var msg = 'Someone from <b>' + country + '</b> just Withdrew <strong href="javascript:void(0);" onclick="javascript:void(0);">' + plan + ' </strong>';
        $(".mgm .txt").html(msg);
        $(".mgm").stop(true).fadeIn(2);
        window.setTimeout(function() {
            $(".mgm").stop(true).fadeOut(100);
        }, 8000);
        run = setInterval(request, interval);
    }
</script>

<style>
.mgm {
    border-radius: 7px;
    position: fixed;
    z-index: 90;
    bottom: 80px;
    right: 50px;
    background: #fff;
    padding: 10px 27px;
    box-shadow: 0px 5px 13px 0px rgba(0,0,0,.3);
}
.mgm a {
    font-weight: 700;
    display: block;
    color:#f2d516;
}
.mgm a, .mgm a:active {
    transition: all .2s ease;
    color:#f2d516;
}
</style>
<script type="text/javascript">
var listCountries = ['United Kingdom', 'USA', 'Germany', 'France', 'Italy', 'USA', 'Australia', 'Lesotho', 'Canada', 'Argentina', 'Saudi Arabia', 'Mexico', 'Kenya', 'Maldives', 'Venezuela', 'United State', 'Sweden', 'India', 'United State', 'Italy', 'Pakistan', 'United Kingdom', 'United State', 'Greece', 'Cuba', 'United State', 'Portugal', 'Austria', 'United State', 'Panama', 'USA', 'United State', 'Netherlands', 'Switzerland', 'Belgium', 'Israel', 'Cyprus'];
    var listPlans = ['$54,000','$15,000','$11,000','$10,000','$2,000','$3,000','$4,000', '$69,800', '$700', '$2,500' , '$4,800' , '$5,100' , '$1,200', '$14,000'];
    interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
    var run = setInterval(request, interval);

    function request() {
        clearInterval(run);
        interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
        var country = listCountries[Math.floor(Math.random() * listCountries.length)];
        var plan = listPlans[Math.floor(Math.random() * listPlans.length)];
        var msg = 'Someone from <b>' + country + '</b> just Withdrew <strong href="javascript:void(0);" onclick="javascript:void(0);">' + plan + ' </strong>';
        $(".mgm .txt").html(msg);
        $(".mgm").stop(true).fadeIn(2);
        window.setTimeout(function() {
            $(".mgm").stop(true).fadeOut(100);
        }, 8000);
        run = setInterval(request, interval);
    }
</script>
<div class="mgm" style="display: none ;">
<div class="txt" style="color:black;">Someone from <b></b> just traded with <a href="javascript:void(0);" onclick="javascript:void(0);"></a></div>
</div>
<style>
.mgm {
    border-radius: 7px;
    position: fixed;
    z-index: 90;
    bottom: 80px;
    right: 50px;
    background: #fff;
    padding: 10px 27px;
    box-shadow: 0px 5px 13px 0px rgba(0,0,0,.3);
}
.mgm a {
    font-weight: 700;
    display: block;
    color:#f2d516;
}
.mgm a, .mgm a:active {
    transition: all .2s ease;
    color:#f2d516;
}
</style>
<script type="text/javascript">
var listCountries = ['United Kingdom', 'USA', 'Germany', 'France', 'Italy', 'USA', 'Australia', 'Lesotho', 'Canada', 'Argentina', 'Saudi Arabia', 'Mexico', 'Kenya', 'Maldives', 'Venezuela', 'United State', 'Sweden', 'India', 'United State', 'Italy', 'Pakistan', 'United Kingdom', 'United State', 'Greece', 'Cuba', 'United State', 'Portugal', 'Austria', 'United State', 'Panama', 'USA', 'United State', 'Netherlands', 'Switzerland', 'Belgium', 'Israel', 'Cyprus'];
    var listPlans = ['$24,000','$15,000','$11,000','$10,000','$2,000','$3,000','$4,000', '$69,800', '$700', '$2,500' , '$4,800' , '$5,100' , '$1,200', '$14,000'];
    interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
    var run = setInterval(request, interval);

    function request() {
        clearInterval(run);
        interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
        var country = listCountries[Math.floor(Math.random() * listCountries.length)];
        var plan = listPlans[Math.floor(Math.random() * listPlans.length)];
        var msg = 'Someone from <b>' + country + '</b> just Deposit <strong href="javascript:void(0);" onclick="javascript:void(0);">' + plan + ' </strong>';
        $(".mgm .txt").html(msg);
        $(".mgm").stop(true).fadeIn(2);
        window.setTimeout(function() {
            $(".mgm").stop(true).fadeOut(100);
        }, 8000);
        run = setInterval(request, interval);
    }
</script>

 
<!-- end withdraw statement-->

<body>

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    <!-- Header 
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">

            

            <div class="container">

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                       
                        <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
                    </ul>
                </div>        
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('storage/app/public/' . $settings->logo) }}" class="logo logo-display" class="w-50" alt="Logo" width="250" height="600">
                        <img src="{{ asset('storage/app/public/' . $settings->logo) }}" class="logo logo-scrolled" class="w-50" alt="Logo" width="250" height="600">
                    </a>
                </div>
                <!-- End Header Navigation -->
<div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
						<li>
                            <a  class="active" href="/">Home</a>
                        </li>
						<li>
                            <a   href="service">Service</a>
                        </li>
						<li>
                            <a    href="about">About Us</a>
                        </li>
						<li>
                            <a    href="pricing">Price</a>
                        </li>
						<li>
                            <a   href="contact">Contact Us</a>
                        </li>
						
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Legal</a>
                            <ul class="dropdown-menu">
                                 <li><a href="licences">Licences And Regulation</a></li>
                                <li><a href="terms">Terms And Conditions</a></li>
                                <li><a href="privacy">Privacy Policy</a></li>
                                <li><a href="risk">Risk Warning</a></li>
                                <li><a href="safety">Safety of Funds</a></li>
                                <li><a href="trading">Trading Conditions</a></li>
                            </ul>
                        </li>
                        <li>
                            <a  class="active" href="login">Login</a>
                        </li>
						<li>
                            <a   href="register">Register</a>
                        </li>
						<li>
                            <a   href="faq">FAQ</a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
                
            </div>

            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <div class="widget">
                    <h4 class="title">About Us</h4>
                    <img src="temp/front/assets/img/about/2.jpg" alt="Thumb">
                   
                    <p>
					
					 We give a chance to new, dynamilcally developing ICO projects that bring huge profits in an amazing short time. Join Us by choosing one of our plans today. Your success starts with your broker and the right trading conditions along with all the tools you need to get you there.
					  </p>
                    <a href="register" class="btn btn-theme border btn-sm" data-animation="animated slideInUp">Get Started</a>
                </div>
                <div class="widget">
                    <h4 class="title">Additional Links</h4>
                    <ul>
                        <li><a href="about">About</a></li>
                        <li><a href="contact">Contact us</a></li>
                        <li><a href="login">Login</a></li>
                        <li><a href="register">Register</a></li>
						<li> <a   href="faq">FAQ</a>     </li>
                    </ul>
                </div>
                
            </div>
            <!-- End Side Menu -->

        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->
    @yield('content')


    <footer class="bg-dark">
        <!-- Start Footer Top -->
        
        <!-- End Footer Top -->
        <div class="container">
            <div class="row">
                <div class="f-items default-padding">

                    <!-- Single Item -->
                    <div class="col-md-4  item">
                        <div class="f-item">
                            <h4>Risk Warning</h4>
                            <p>
                            Trading foreign exchange on margin carries a high level of risk, and may not be suitable for all investors. Before deciding to trade foreign exchange, you should carefully consider your investment objectives, level of experience, and risk appetite. There is a possibility that you may sustain a loss of some or all of your investment and therefore you should not invest money that you cannot afford to lose. You should be aware of all the risks associated with foreign exchange trading, and seek advice from an independent financial advisor if you have any doubts.
							</p>
                           
                            
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4   item">
                        <div class="f-item">
                            <h4>Services</h4>
                            <ul>
							<li>
                                    <a href="/">Home</a>
                                </li>
                                <li>
                                    <a href="about">About Us</a>
                                </li>
                                <li>
                                    <a href="contact">Contact</a>
                                </li>
                                <li>
                                    <a href="pricing">Account Type</a>
                                </li>
                                <li>
                                    <a href="faq">Faq</a>
                                </li>
                                <li>
                                    <a href="trading">Trading Conditions</a>
                                </li>
                                <li>
                                    <a href="safety">Safety of funds</a>
                                </li>
                                <li>
                                    <a href="risk">Risk Warning</a>
                                </li>
                                <li>
                                    <a href="privacy">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="terms">Terms And Conditions</a>
                                </li>
                                <li>
                                    <a href="licences">licences And Regulation</a>
                                </li>
                                 
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4   item">
                        <div class="f-item twitter-widget">
                            <h4>Contact Us</h4>
                            <div class="twitter-item">
                                <div class="twitter-content">
                                    <p>
                                  <i class="fas fa-map"></i> {{$settings->office}}</p>
                                </div>
                                
                            </div>
                            <div class="twitter-item">
                                <div class="twitter-content">
                                    <p>
                                    <i class="fas fa-envelope-open"></i> {{$settings->contact_email}}</p>
                                </div>
                                
                            </div>
                            <div class="twitter-item">
                                <div class="twitter-content">
                                    <p>
                                    <i class="fas fa-phone"></i>+1(530) 712 4028</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>
        </div>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom bg-dark text-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; Copyright 2019. All Rights Reserved </p>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="temp/front/assets/js/jquery-1.12.4.min.js"></script>
    <script src="temp/front/assets/js/bootstrap.min.js"></script>
    <script src="temp/front/assets/js/equal-height.min.js"></script>
    <script src="temp/front/assets/js/jquery.appear.js"></script>
    <script src="temp/front/assets/js/jquery.easing.min.js"></script>
    <script src="temp/front/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="temp/front/assets/js/modernizr.custom.13711.js"></script>
    <script src="temp/front/assets/js/owl.carousel.min.js"></script>
    <script src="temp/front/assets/js/wow.min.js"></script>
    <script src="temp/front/assets/js/progress-bar.min.js"></script>
    <script src="temp/front/assets/js/isotope.pkgd.min.js"></script>
    <script src="temp/front/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="temp/front/assets/js/count-to.js"></script>
    <script src="temp/front/assets/js/YTPlayer.min.js"></script>
    <script src="temp/front/assets/js/bootsnav.js"></script>
    <script src="temp/front/assets/js/main.js"></script>
    @if($settings->whatsapp)
    <script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "{{$settings->whatsapp}}", // WhatsApp number
                call_to_action: "Message us", // Call to action
                position: "left", // Position may be 'right' or 'left'
                pre_filled_message: "Hello I am", // WhatsApp pre-filled message
            };
            var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>
    @endif
    @if($settings->tido)
    <script src="//code.tidio.co/{{$settings->tido}}" async></script>
    @endif
</body>
 
</html>