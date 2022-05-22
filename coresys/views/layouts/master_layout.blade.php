<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> ITSView - Cleaning </title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_LAYOUT?>css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_LAYOUT?>css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_LAYOUT?>css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_LAYOUT?>css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_LAYOUT?>css/smartadmin-skins.min.css">

		<!-- SmartAdmin RTL Support  -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_LAYOUT?>css/smartadmin-rtl.min.css">

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_LAYOUT?>css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_LAYOUT?>css/demo.min.css">

		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_LAYOUT?>seipkon/assets/jqueryconfirm/dist/jquery-confirm.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_LAYOUT?>seipkon/assets/select2/dist/css/select2.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_LAYOUT?>seipkon/assets/datepicker/datepicker.min.css" rel="stylesheet">
		
		
		<link rel="stylesheet" href="<?=BASE_LAYOUT?>datatables/dataTables.checkboxes.css">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="<?=BASE_LAYOUT?>img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?=BASE_LAYOUT?>img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?=BASE_LAYOUT?>img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?=BASE_LAYOUT?>img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="<?=BASE_LAYOUT?>img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="<?=BASE_LAYOUT?>img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="<?=BASE_LAYOUT?>img/splash/iphone.png" media="screen and (max-device-width: 320px)">

		@yield('style')
		
		<style>
			.select2-container--open .select2-dropdown {
				z-index: 99999999 !important;
			}
			
			.dataTables_paginate #datatable_previous {
				width: 60px !important;
			}
			
			.dataTables_paginate #datatable_next {
				width: 60px !important;
			}

			.select2-container--default .select2-selection--single .select2-selection__arrow b {
				border-color: #888 transparent transparent transparent;
				border-style: solid;
				border-width: 5px 4px 0 4px;
				height: 0;
				left: 50%;
				margin-left: -4px;
				margin-top: 2px;
				position: absolute;
				top: 50%;
				width: 0;
			}

			.select2-container--default .select2-selection--multiple .select2-selection__choice {
				color: black;
			}
		</style>
		<style>
			.zoom {
			  transition: transform 0.01s; /* Animation */
			}
			.zoom:hover {
			  transform: scale(1.0); 
			}
			.zoomsmall {
			  transition: transform 0.01s; /* Animation */
			}
			.zoomsmall:hover {
			  transform: scale(1.05); 
			  background:;
			}
			p.small {
			  line-height: 1.0;
			}
			p.big {
			  line-height: 1.5;
			}
		</style>
		<style>
			hanzmobview{
			  margin: 0 auto;
			}
			hanzmobview{
			  display: inline;
			}

			@media screen and (max-width: 1024px){
			hanzmobview{
				display: none;
			  }
			}
			ul{
				list-style:none;
				margin: 0;
				padding: 0;
			}
			a, a:hover, a.active, a:active, a:visited, a:focus{
				color:#;
				text-decoration:none;
			}
			.exo-menu{
				width: 100%;
				float: left;
				list-style: none;
			}
			.exo-menu > li {	display: inline-block;float:left;}
			.exo-menu > li > a{
				color: #ccc;
				text-decoration: none;
				text-transform: uppercase;
				border-right: 1px #365670 dotted;
				-webkit-transition: color 0.2s linear, background 0.2s linear;
				-moz-transition: color 0.2s linear, background 0.2s linear;
				-o-transition: color 0.2s linear, background 0.2s linear;
				transition: color 0.2s linear, background 0.2s linear;
			}
			.exo-menu > li > a.active,
			.exo-menu > li > a:hover,
			li.drop-down ul > li > a:hover{
			background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
			z-index: 9999 !important;
			}
			.exo-menu i {
			  float: left;
			  font-size: 8px;
			  margin-right: 0px;
			  line-height: 10px !important;
			}
			li.drop-down,
			.flyout-right,
			.flyout-left{position:relative;}
			li.drop-down:before {
			  content: "";
			  color: #fff;
			  font-family: FontAwesome;
			  font-style: normal;
			  display: inline;
			  right: 6px;
			  top: 0px;
			  font-size: 14px;
			}
			li.drop-down>ul{
				left: 0px;
				min-width: 230px;

			}
			.drop-down-ul{display:none;}
			.flyout-right>ul,
			.flyout-left>ul{
			  top: 0;
			  min-width: 230px;
			  display: none;
			  border-left: 1px solid #ebebeb;
			  }

			li.drop-down>ul>li>a,
			.flyout-right ul>li>a ,
			.flyout-left ul>li>a {
				color: #000;
				display: block;
				padding: 12px 20px;
				text-decoration: none;
				background-color: #fff;
				border-bottom: 1px dotted #000;
				-webkit-transition: color 0.2s linear, background 0.2s linear;
				-moz-transition: color 0.2s linear, background 0.2s linear;
				-o-transition: color 0.2s linear, background 0.2s linear;
				transition: color 0.2s linear, background 0.2s linear;
			}
			.flyout-right ul>li>a ,
			.flyout-left ul>li>a {
				border-bottom: 1px dotted #000;
			}

			/*Blog DropDown*/
			.Blog{
				left:0;
				display:none;
				color:#fefefe;
				padding-top:0px;
				background:#547787;
				padding-bottom:15px;
			}
			.Blog .blog-title{
				color:#fff;
				font-size:15px;
				text-transform:uppercase;

			}
			.Blog .blog-des{
				color:#ccc;
				font-size:90%;
				margin-top:0px;
			}
			.Blog a.view-more{
				margin-top:0px;
			}
			/*Images*/
			.Images{
				left:0;
			   width:100%;
				 display:none;
				color:#fefefe;
				padding-top:0px;
				background:#547787;
				padding-bottom:15px;
			}
			.Images h4 {
			  font-size: 15px;
			  margin-top: 0px;
			  text-transform: uppercase;
			}
			/*common*/
			.flyout-right ul>li>a ,
			.flyout-left ul>li>a,
			.flyout-mega-wrap,
			.mega-menu{
				background-color: #fff;
			}

			/*hover*/
			.Blog:hover,
			.Images:hover,
			.mega-menu:hover,
			.drop-down-ul:hover,
			li.flyout-left>ul:hover,
			li.flyout-right>ul:hover,
			.flyout-mega-wrap:hover,
			li.flyout-left a:hover +ul,
			li.flyout-right a:hover +ul,
			.blog-drop-down >a:hover+.Blog,
			li.drop-down>a:hover +.drop-down-ul,
			.images-drop-down>a:hover +.Images,
			.mega-drop-down a:hover+.mega-menu,
			li.flyout-mega>a:hover +.flyout-mega-wrap{
				display:block;
			}
			/*responsive*/
			 @media (min-width:1024px){
				.exo-menu > li > a{
				display:block;
				padding: 10px 22px;
			 }
			.mega-menu, .flyout-mega-wrap, .Images, .Blog,.flyout-right>ul,
			.flyout-left>ul, li.drop-down>ul{
					position:absolute;
			}
			 .flyout-right>ul{
				left: 100%;
				}
				.flyout-left>ul{
				right: 100%;
			}
			 }
			@media (max-width:1024px){

				.exo-menu {
					min-height: 58px;
					background-color: #23364B;
					width: 100%;
				}
				
				.exo-menu > li > a{
					width:100% ;
					display:none ;
				
				}
				.exo-menu > li{
					width:100%;
				}
				.display.exo-menu > li > a{
				  display:block ;
					padding: 20px 22px;
				}
				
			.mega-menu, .Images, .Blog,.flyout-right>ul,
			.flyout-left>ul, li.drop-down>ul{
					position:relative;
			}

			}
			a.toggle-menu{
				right: 0px;
				font-size: 27px;
				background-color: #ccc;
				color: #23364B;
				top: 0px;
			}
		</style>
		
	</head>
	
	<!--

	TABLE OF CONTENTS.
	
	Use search to find needed section.
	
	===================================================================
	
	|  01. #CSS Links                |  all CSS links and file paths  |
	|  02. #FAVICONS                 |  Favicon links and file paths  |
	|  03. #GOOGLE FONT              |  Google font link              |
	|  04. #APP SCREEN / ICONS       |  app icons, screen backdrops   |
	|  05. #BODY                     |  body tag                      |
	|  06. #HEADER                   |  header tag                    |
	|  07. #PROJECTS                 |  project lists                 |
	|  08. #TOGGLE LAYOUT BUTTONS    |  layout buttons and actions    |
	|  09. #MOBILE                   |  mobile view dropdown          |
	|  10. #SEARCH                   |  search field                  |
	|  11. #NAVIGATION               |  left panel & navigation       |
	|  12. #RIGHT PANEL              |  right panel userlist          |
	|  13. #MAIN PANEL               |  main panel                    |
	|  14. #MAIN CONTENT             |  content holder                |
	|  15. #PAGE FOOTER              |  page footer                   |
	|  16. #SHORTCUT AREA            |  dropdown shortcuts area       |
	|  17. #PLUGINS                  |  all scripts and plugins       |
	
	===================================================================
	
	-->
	
	<!-- #BODY -->
	<!-- Possible Classes

		* 'smart-style-{SKIN#}'
		* 'smart-rtl'         - Switch theme mode to RTL
		* 'menu-on-top'       - Switch to top navigation (no DOM change required)
		* 'no-menu'			  - Hides the menu completely
		* 'hidden-menu'       - Hides the main menu but still accessable by hovering over left edge
		* 'fixed-header'      - Fixes the header
		* 'fixed-navigation'  - Fixes the main menu
		* 'fixed-ribbon'      - Fixes breadcrumb
		* 'fixed-page-footer' - Fixes footer
		* 'container'         - boxed layout mode (non-responsive: will not work with fixed-navigation & fixed-ribbon)
	-->
	<body class="">

		<!-- HEADER -->
		<header id="header">
		@include('layouts.master_header')
		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		@include('layouts.master_navbar')
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<!--<div id="ribbon">
			@include('layouts.master_breadcrumb')
			</div>-->
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">
			@yield('content')
			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
		<div class="page-footer" style="background: linear-gradient(to bottom, #000000, #434343);height:30px;">
			
			
		</div>
		<!-- END PAGE FOOTER -->

		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->
		<div id="shortcut">
			<ul>
				<li>
					<a href="inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
				</li>
				<li>
					<a href="calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
				</li>
				<li>
					<a href="gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
				</li>
				<li>
					<a href="invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
				</li>
				<li>
					<a href="gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
				</li>
				<li>
					<a href="profile.html" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
				</li>
			</ul>
		</div>
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?=BASE_LAYOUT?>js/plugin/pace/pace.min.js"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="<?=BASE_LAYOUT?>js/libs/jquery-2.1.1.min.js"><\/script>');
			}
		</script>

		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="<?=BASE_LAYOUT?>js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?=BASE_LAYOUT?>js/app.config.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="<?=BASE_LAYOUT?>js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

		<!-- BOOTSTRAP JS -->
		<script src="<?=BASE_LAYOUT?>js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="<?=BASE_LAYOUT?>js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="<?=BASE_LAYOUT?>js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<script src="<?=BASE_LAYOUT?>js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

		<!-- SPARKLINES -->
		<script src="<?=BASE_LAYOUT?>js/plugin/sparkline/jquery.sparkline.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="<?=BASE_LAYOUT?>js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="<?=BASE_LAYOUT?>js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<!--<script src="<?=BASE_LAYOUT?>js/plugin/select2/select2.min.js"></script>-->

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="<?=BASE_LAYOUT?>js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="<?=BASE_LAYOUT?>js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices -->
		<script src="<?=BASE_LAYOUT?>js/plugin/fastclick/fastclick.min.js"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- Demo purpose only -->
		<!--<script src="<?=BASE_LAYOUT?>js/demo.min.js"></script>-->

		<!-- MAIN APP JS FILE -->
		<script src="<?=BASE_LAYOUT?>js/app.min.js"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="<?=BASE_LAYOUT?>js/speech/voicecommand.min.js"></script>

		<!-- SmartChat UI : plugin -->
		<script src="<?=BASE_LAYOUT?>js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="<?=BASE_LAYOUT?>js/smart-chat-ui/smart.chat.manager.min.js"></script>
		
		<!-- PAGE RELATED PLUGIN(S) -->
		
		<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
		<script src="<?=BASE_LAYOUT?>js/plugin/flot/jquery.flot.cust.min.js"></script>
		<script src="<?=BASE_LAYOUT?>js/plugin/flot/jquery.flot.resize.min.js"></script>
		<script src="<?=BASE_LAYOUT?>js/plugin/flot/jquery.flot.time.min.js"></script>
		<script src="<?=BASE_LAYOUT?>js/plugin/flot/jquery.flot.tooltip.min.js"></script>
		
		<!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
		<script src="<?=BASE_LAYOUT?>js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="<?=BASE_LAYOUT?>js/plugin/vectormap/jquery-jvectormap-world-mill-en.js"></script>
		
		<!-- Full Calendar -->
		<script src="<?=BASE_LAYOUT?>js/plugin/moment/moment.min.js"></script>
		<script src="<?=BASE_LAYOUT?>js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>
		
		<script src="<?=BASE_LAYOUT?>seipkon/assets/jqueryconfirm/dist/jquery-confirm.min.js"></script>
		<script src="<?=BASE_LAYOUT?>seipkon/assets/select2/dist/js/select2.min.js"></script>
		<script src="<?=BASE_LAYOUT?>seipkon/assets/datepicker/bootstrap-datepicker.min.js"></script>
		
		<script src="<?=BASE_LAYOUT?>seipkon/assets/plugins/daterangepicker/js/moment.min.js"></script>
		<script src="<?=BASE_LAYOUT?>seipkon/assets/fullcalendar/dist/fullcalendar.js"></script>
		<script src="<?=BASE_LAYOUT?>seipkon/assets/fullcalendar/dist/scheduler.min.js"></script>
		
		
		@yield('javascript')
		
		<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js"></script>
		<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-analytics.js"></script>
		<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-messaging.js"></script>
		<script>
			MsgElem = document.getElementById("msg");
			TokenElem = document.getElementById("token");
			NotisElem = document.getElementById("notis");
			// ErrElem = document.getElementById("err");	
			// Initialize Firebase
			// TODO: Replace with your project's customized code snippet
			var config = {
				'messagingSenderId': '48481771203',
				'apiKey': 'AIzaSyAq_MFpZ4cvYbAWMTeOpr6Ato4hbGLgd6I',
				'projectId': 'assindo-27686',
				'appId': '1:48481771203:web:8d820884e4a2b2bf3acc76',
			};
			firebase.initializeApp(config);

			const messaging = firebase.messaging();
			messaging
				.requestPermission()
				.then(function () {
					MsgElem.innerHTML = "Notification permission granted." 
					console.log("Notification permission granted.");
					
					// get the token in the form of promise
					return messaging.getToken()
				})
				.then(function(token) {
					// TokenElem.innerHTML = "token is : " + token
					TokenElem.value = token
				})
				.catch(function (err) {
					// ErrElem.innerHTML =  ErrElem.innerHTML + "; " + err
					// ErrElem.innerHTML =  "Unable to get permission to notify."
					// console.log("Unable to get permission to notify.", err);
				});

			let enableForegroundNotification = true;
			messaging.onMessage(function(payload) {
				console.log("Message received. ", JSON.parse(payload.data.notification).title);
				// alert(payload.data.notification)
				// NotisElem.innerHTML = NotisElem.innerHTML + JSON.stringify(payload);
				notify_with_value(JSON.parse(payload.data.notification).title, JSON.parse(payload.data.notification).body);

				if(enableForegroundNotification) {
					const {title, ...options} = JSON.parse(payload.data.notification);
					navigator.serviceWorker.getRegistrations().then(registration => {
						registration[0].showNotification(title, options);
					});
				}
			});
		</script>

		<script>
			$(document).ready(function() {
				// DO NOT REMOVE : GLOBAL FUNCTIONS!
				pageSetUp();

			});
		</script>

	</body>

</html>