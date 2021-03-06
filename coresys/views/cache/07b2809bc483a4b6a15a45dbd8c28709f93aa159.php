<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title>PROTOTYPE</title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>css/smartadmin-skins.min.css">
		
		<link rel="stylesheet" href="<?php echo base_url();?>seipkon/assets/fullcalendar/dist/fullcalendar.css">
		<link rel="stylesheet" href="<?php echo base_url();?>seipkon/assets/fullcalendar/dist/scheduler.min.css">

		<!-- SmartAdmin RTL Support  -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>css/smartadmin-rtl.min.css">

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>css/demo.min.css">
		
		<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>seipkon/assets/jqueryconfirm/dist/jquery-confirm.min.css">
		<link href="<?=base_url()?>seipkon/assets/select2/dist/css/select2.min.css" rel="stylesheet">
		<link href="<?=base_url()?>seipkon/assets/datepicker/datepicker.min.css" rel="stylesheet">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="<?=BASE_URL?>img/favicon/fav-icon.png" type="image/x-icon">
		<link rel="icon" href="<?=BASE_URL?>img/favicon/fav-icon.png" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="<?=BASE_URL?>img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?=BASE_URL?>img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?=BASE_URL?>img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?=BASE_URL?>img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="<?=BASE_URL?>img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="<?=BASE_URL?>img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="<?=BASE_URL?>img/splash/iphone.png" media="screen and (max-device-width: 320px)">
		
				
		<?php echo $__env->yieldContent('stylesheet'); ?>

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

			.select2-container .select2-selection--single {
				height: 38px;
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

			.select2-container--default .select2-selection--single, .select2-selection .select2-selection--single, .select2-container--default.select2-container--focus .select2-selection--multiple, .select2-container--default .select2-selection--multiple {
				border: 1px solid #ced4da;
				border-radius: 0;
				padding: 5px;
				height: auto;
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

			@media  screen and (max-width: 1024px){
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
	<body class="fixed-header fixed-navigation fixed-page-footer">

		<!-- HEADER -->
		<header id="header">
			<div id="logo-group" style="#f3f3f3">
				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo" style="margin: 5px 0px 0px 10px;"> 
					<!--<a href="#" class="zoomsmall" data-toggle="modal" data-target="#myMenu">
					<img src="<?=BASE_URL?>img/logo-white2.png" alt="PROTOTYPE" style="width: 95%"> </a>-->
					<span style="font-size: 25px; font-weight: bold">PROTOTYPE</span>
				</span>
				<div class="modal fade" id="myMenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="height:100%">
						<div class="modal-content" style="margin: 50px 0px 0px 0px;">
							<div class="modal-header" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white; height:1px;">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:white;">
									&times;
								</button>
								<b style="color:white; margin: -5px 0px 0px 0px;">Menu System</b>
							</div>
							<div class="modal-body">
								<div class="widget-body no-padding" style="margin: -10px 0px 0px 0px;">
								
								<ul id="myTab1" class="nav nav-tabs bordered">
									<li class="active">
										<a href="#m1" data-toggle="tab">Quick Menu</a>
									</li>
									<li>
										<a href="#m2" data-toggle="tab">Overall Menu</a>
									</li>
								</ul>
					
								<div id="myTabContent1" class="tab-content padding-10">
									<div class="tab-pane fade in active" id="m1">
										
										<div class="btn-group btn-group-justified">
											<a href="<?=base_url()?>dashboard" class="btn btn-primary zoomsmall" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 0px;width: 50%;height:50px">
											<img style="float: left; margin: 2px 5px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/roll.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="margin: 2px 5px 0px 0px;color:white;">
												<small style="font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Dashboard System</small><br>
												<small style="font-size:10px;">Administrator Dashboard</small>
											</p>
											</span>
											</a>
											<a href="<?=base_url()?>dashboard_merchant" class="btn btn-primary zoomsmall" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 0px;width: 50%;height:50px">
											<img style="float: left; margin: 2px 5px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/colorloc.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="margin: 2px 5px 0px 0px;color:white;">
												<small style="font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Client Dashboard</small><br>
												<small style="font-size:10px;">Client Dashboard Monitoring</small>
											</p>
											</span>
											</a>
											<a href="<?=base_url()?>master_client" class="btn btn-primary zoomsmall" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 0px;width: 50%;height:50px">
											<img style="float: left; margin: 2px 5px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/cube.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="margin: 2px 5px 0px 0px;color:white;">
												<small style="font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Data Master Client</small><br>
												<small style="font-size:10px;">Client, Mesin ATM & Area</small>
											</p>
											</span>
											</a>
										</div>
										<div class="btn-group btn-group-justified" style="margin: 10px 0px 0px 0px;" >
											<a href="<?=base_url()?>master_staff" class="btn btn-primary zoomsmall" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 0px;width: 50%;height:50px">
											<img style="float: left; margin: 1px 5px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/userpro.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="margin: 2px 5px 0px 0px;color:white;">
												<small style="font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Data Master Staff</small><br>
												<small style="float:left;font-size:10px;">Karyawan & Attendance</small>
											</p>
											</span>
											</a>
											<a href="<?=base_url()?>master_inventory" class="btn btn-primary zoomsmall" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 0px;width: 50%;height:50px">
											<img style="float: left; margin: 2px 5px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/folset.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="margin: 2px 5px 0px 0px;color:white;">
												<small style="font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Master Inventory</small><br>
												<small style="font-size:10px;">Data Inventory & Logistics</small>
											</p>
											</span>
											</a>
											<a href="<?=base_url()?>dash_maintenance" class="btn btn-primary zoomsmall" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 0px;width: 50%;height:50px">
											<img style="float: left; margin: 2px 5px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/new-ticket.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="margin: 2px 5px 0px 0px;color:white;">
												<small style="font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Data Maintenance</small><br>
												<small style="font-size:10px;">Technical & Maintenance</small>
											</p>
											</span>
											</a>
										</div>
										<div class="btn-group btn-group-justified" style="margin: 10px 0px 0px 0px;" >
											<a href="<?=base_url()?>dash_finance" class="btn btn-primary zoomsmall" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 0px;width: 50%;height:50px">
											<img style="float: left; margin: 1px 5px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/graphround.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="float:left;margin: 2px 5px 0px 0px;color:white;">
												<small style="font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Official Finance</small><br>
												<small style="float:left;font-size:10px;">Costing & Budgeting</small>
											</p>
											</span>
											</a>
											<a href="<?=base_url()?>dash_reports" class="btn btn-primary zoomsmall" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 0px;width: 50%;height:50px">
											<img style="float: left; margin: 2px 5px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/graphraw.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="float: left;margin: 2px 5px 0px 0px;color:white;">
												<small style="font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Master Reports</small><br>
												<small style="float: left;font-size:10px;">Reports Management</small>
											</p>
											</span>
											</a>
											<a href="<?=base_url()?>master_instruction" class="btn btn-primary zoomsmall" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 0px;width: 50%;height:50px">
											<img style="float: left; margin: 1px 5px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/userguide.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="margin: 2px 5px 0px 0px;color:white;">
												<small style="font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">User Guide System</small><br>
												<small style="font-size:10px;">User Guide Documentation</small>
											</p>
											</span>
											</a>
											
										</div>
										
									</div>
									<div class="tab-pane fade" id="m2">
									<nav class="no-padding" style="width:100%; overflow-y: hidden;overflow-x: hidden;">
									<ul>
										
										<!-- MENU DASHBOARD SYSTEM -->
										<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'dashboard')?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
											<a href="<?=base_url()?>dashboard" title="" class="menu-item-parent zoomsmall">
											<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/roll.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="">
												<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Dashboard System</small><br>
												<small style="color:white;font-size:10px;">Administrator Dashboard</small>
											</p>
											</span>
											</a>
										</li>
										
										<!-- MENU DASHBOARD CLIENT -->
										<li <?=access($user_access, array('admin', 'director','manager','monitor','','finance','client_bst','client_bkt','client_bmm'))?><?=active($that, array('dashboard_bst', 'dashboard_bkt', 'dashboard_bmm'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
											<a href="#" class="zoomsmall">
											<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/colorloc.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="">
												<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Client Dashboard</small><br>
												<small style="color:white;font-size:10px;">Client Dashboard Monitoring</small>
											</p>
											</span>
											</a>		
											<ul>
												<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: -6px 0px 0px 0px;">
												</div>
												<div <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
													<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Dashboard Overall
													</b>
												</div>
												<li  <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'dashboard_merchant')?>>
													<a href="<?=base_url()?>dashboard_merchant" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/building2.png" height="15" width="15" />Dashboard Overall</a>
												</li>
												<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: 0px 0px 0px 0px;">
												</div>
												<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
													<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Dashboard Clients
													</b>
												</div>
												<li  <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','client_bst'))?><?=active($that, 'dash_bst')?>>
													<a href="<?=base_url()?>dash_bst" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/building2.png" height="15" width="15" />Bank Sulteng</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','client_bkt'))?><?=active($that, 'dash_bkt')?>>
													<a href="<?=base_url()?>dash_bkt" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/building2.png" height="15" width="15" />Bank Kalteng</a>
												</li>
												<li  <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','client_bmm'))?><?=active($that, 'dash_bmm')?>>
													<a href="<?=base_url()?>dash_bmm" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/building2.png" height="15" width="15" />Bank Malut</a>
												</li>
												<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: 0px 0px 0px 0px;">
												</div>
												<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
													<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Clients Report
													</b>
												</div>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','client_bst'))?> <?=active($that, 'report_maintenance_bst')?>>
													<a href="<?=base_url()?>report_maintenance_bst" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="15" width="15" />Report Bank Sulteng</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','client_bkt'))?> <?=active($that, 'report_maintenance_bkt')?>>
													<a href="<?=base_url()?>report_maintenance_bkt" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="15" width="15" />Report Bank Kalteng</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','client_bmm'))?> <?=active($that, 'report_maintenance_bmm')?>>
													<a href="<?=base_url()?>report_maintenance_bmm" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="15" width="15" />Report Bank Malut</a>
												</li>
											</ul>
										</li>
										
										<!-- MENU MASTER CLIENT -->
										<li <?=access($user_access, array('admin', 'director','manager','monitor','','finance'))?> <?=active($that, array('dashboard_merchant_internal', 'master_client', 'master_atm', 'master_location', 'master_location_detail', 'master_require_part'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
											<a href="#" class="zoomsmall">
											<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/cube.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="">
												<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Data Master Client</small><br>
												<small style="color:white;font-size:10px;">Client, Mesin ATM & Area</small>
											</p>
											</span>
											</a>		
											<ul>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'dashboard_merchant_internal')?>>
													<a href="<?=base_url()?>dashboard_merchant_internal" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/cube.png" height="15" width="15" />Client Dashboard</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_client')?>>
													<a href="<?=base_url()?>master_client" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/building.png" height="15" width="15" />Client & Customer</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_atm')?>>
													<a href="<?=base_url()?>master_atm" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/atm2.png" height="15" width="15" />Data Mesin ATM</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, array('master_location', 'master_location_detail', 'master_require_part'))?>>
													<a href="<?=base_url()?>master_location" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/whiteloc.png" height="15" width="15" />Area & Location</a>
												</li>
											</ul>
										</li>
										
										<!-- MENU MASTER STAFF -->
										<li <?=access($user_access, array('admin', 'director','manager','monitor','','finance'))?> <?=active($that, array('dash_staff', 'master_staff', 'master_attendance', 'master_user', 'master_absen_location'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
											<a href="#" class="zoomsmall">
											<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/userpro.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="">
												<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Data Master Staff</small><br>
												<small style="color:white;font-size:10px;">Staff/Karyawan & Attendance</small>
											</p>
											</span>
											</a>
											<ul>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'dash_staff')?>>
													<a href="<?=base_url()?>dash_staff" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/userflow.png" height="15" width="15" />Dashboard Staff</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_staff')?>>
													<a href="<?=base_url()?>master_staff" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/userpro.png" height="15" width="15" />Karyawan / Staff</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_attendance')?>>
													<a href="<?=base_url()?>master_attendance" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/timecal.png" height="15" width="15" />Attendance</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_user')?>>
													<a href="<?=base_url()?>master_user" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/lock.png" height="15" width="15" />User Access</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_absen_location')?>>
													<a href="<?=base_url()?>master_absen_location" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/browser.png" height="15" width="15" />Setting Geolocation</a>
												</li>
											</ul>
										</li>
										
										<!-- MENU MASTER INVENTORY -->
										<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, array('dash_inventory', 'servicepoint_inventory', 'master_inventory', 'transaction_in', 'transaction_out', 'transaction_in_sp', 'transaction_out_sp'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
											<a href="#" class="zoomsmall">
											<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/folset.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="">
												<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Master Inventory</small><br>
												<small style="color:white;font-size:10px;">Inventory & Logistics</small>
											</p>
											</span>
											</a>
											<ul>
												<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: -6px 0px 0px 0px;">
												</div>
												<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
													<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Overall Inventory Stock
													</b>
												</div>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'dash_inventory')?>>
													<a href="<?=base_url()?>dash_inventory" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/folset.png" height="15" width="15" />Dashboard Inventory</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_inventory')?>>
													<a href="<?=base_url()?>master_inventory" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/dataset3.png" height="15" width="15" />All Inventory Stock</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'accesory_part')?>>
													<a href="<?=base_url()?>accesory_part" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/dataset.png" height="15" width="15" />Accesory Part</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'transaction_in')?>>
													<a href="<?=base_url()?>transaction_in" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/incoming.png" height="15" width="15" />Transaction In</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'transaction_out')?>>
													<a href="<?=base_url()?>transaction_out" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/outgoing.png" height="15" width="15" />Transaction Out</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'request_sparepart')?>>
													<a href="<?=base_url()?>request_sparepart" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/db_add.png" height="15" width="15" />Incoming Request</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?>  <?=active($that, 'all_return_bad')?>>
													<a href="<?=base_url()?>all_return_bad" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/tools2.png" height="15" width="15" />All Return Bad</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?>  <?=active($that, 'journal_sparepart')?>>
													<a href="<?=base_url()?>journal_sparepart" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/folgraph2.png" height="15" width="15" />Journal Sparepart</a>
												</li>
												
												<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: 0px 0px 0px 0px;">
												</div>
												<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
													<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Service Point Stock
													</b>
												</div>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'servicepoint_inventory')?>>
													<a href="<?=base_url()?>servicepoint_inventory" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/redloc.png" height="15" width="15" />Service Point Stock</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'transaction_in_sp')?>>
													<a href="<?=base_url()?>transaction_in_sp" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/incoming.png" height="15" width="15" />SP Transaction In</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'transaction_out_sp')?>>
													<a href="<?=base_url()?>transaction_out_sp" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/outgoing.png" height="15" width="15" />SP Transaction Out</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'outgoing_request')?>>
													<a href="<?=base_url()?>outgoing_request" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/db_add.png" height="15" width="15" />Outgoing Request</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'sp_return_bad')?>>
													<a href="<?=base_url()?>sp_return_bad" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/tools2.png" height="15" width="15" />SP Return Bad</a>
												</li>
											</ul>
										</li>
										
										<!-- MENU WORK SCHEDULERS -->
										<li <?=access($user_access, array('admin', 'director','manager','monitor','','finance'))?> <?=active($that, array('trans_schedule', 'trans_staff', 'master_item', 'master_news'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
											<a href="#" class="zoomsmall">
											<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/taskyellow.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="">
												<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Work Schedulers</small><br>
												<small style="color:white;font-size:10px;">Job & Work Schedulers</small>
											</p>
											</span>
											</a>
											<ul>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'trans_schedule')?>>
													<a href="<?=base_url()?>trans_schedule" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/taskyellow.png" height="15" width="15" />Work Schedule</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'trans_staff')?>>
													<a href="<?=base_url()?>trans_staff" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/send.png" height="15" width="15" />Switch Schedule</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_item')?>>
													<a href="<?=base_url()?>master_item" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/cal.png" height="15" width="15" />List Job Item</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_news')?>>
													<a href="<?=base_url()?>master_news" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/phonepink.png" height="15" width="15" />News Broadcast</a>
												</li>
											</ul>
										</li>		
										
										<!-- MENU MAINTENANCE -->
										<li <?=access($user_access, array('admin', 'director','manager','monitor','','finance'))?> <?=active($that, array('new_ticket', 'status_ticket', 'master_jobcard', 'trouble_category', 'trouble_sub_category'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
											<a href="#" class="zoomsmall">
											<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/new-ticket.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="">
												<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Data Maintenance</small><br>
												<small style="color:white;font-size:10px;">Technical & Maintenance  </small>
											</p>
											</span>
											</a>						
											<ul>
												<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: -6px 0px 0px 0px;">
												</div>
												<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
													<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Dashboard Maintenance
													</b>
												</div>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'dash_maintenance')?>>
													<a href="<?=base_url()?>dash_maintenance" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/blackbook.png" height="15" width="15" />Summary Tickets</a>
												</li>
												<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: 0px 0px 0px 0px;">
												</div>
												<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
													<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Create Issue Tickets
													</b>
												</div>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'new_ticket')?>>
													<a href="<?=base_url()?>new_ticket" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/new-ticket.png" height="15" width="15" />New Issue Tickets</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'status_ticket')?>>
													<a href="<?=base_url()?>status_ticket" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/filetime.png" height="15" width="15" />Status Tickets</a>
												</li>
												<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: 0px 0px 0px 0px;">
												</div>
												<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
													<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">List Count Tickets
													</b>
												</div>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'calculation_tickets')?>>
													<a href="<?=base_url()?>calculation_tickets" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/new-ticket.png" height="15" width="15" />Calculation Tickets</a>
												</li>
												<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: 0px 0px 0px 0px;">
												</div>
												<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
													<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Utility Management
													</b>
												</div>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_jobcard')?>>
													<a href="<?=base_url()?>master_jobcard" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/jobcard.png" height="15" width="15" />Data Jobcard</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'trouble_category')?>>
													<a href="<?=base_url()?>trouble_category" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/setting2.png" height="15" width="15" />Activity Type</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'trouble_sub_category')?>>
													<a href="<?=base_url()?>trouble_sub_category" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/setting.png" height="15" width="15" />Problem Type</a>
												</li>
											</ul>
										</li>		
										
										<!-- MENU FINCANCE -->
										<li <?=access($user_access, array('admin', 'director','manager','monitor','','finance'))?> <?=active($that, array('dash_finance', 'finance_costing', 'costing_job', 'costing_rev', 'costing_jobrefund','report_costing'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
											<a href="#" class="zoomsmall">
											<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/graphround.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="">
												<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Official Finance</small><br>
												<small style="color:white;font-size:10px;">Costing & Budgeting</small>
											</p>
											</span>
											</a>						
											<ul>
												<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: -6px 0px 0px 0px;">
												</div>
												<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
													<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Dashboard Finance
													</b>
												</div>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'dash_finance')?>>
													<a href="<?=base_url()?>dash_finance" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/graphround.png" height="15" width="15" />Dashboard Finance</a>
												</li>
												<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: 0px 0px 0px 0px;">
												</div>
												<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
													<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Data Costing & Jobs
													</b>
												</div>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'finance_costing')?>>
													<a href="<?=base_url()?>finance_costing" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/db_add.png" height="15" width="15" />Parameter Costing</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'costing_job')?>>
													<a href="<?=base_url()?>costing_job" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/filewhite.png" height="15" width="15" />Data Costing Jobs</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'costing_rev')?>>
													<a href="<?=base_url()?>costing_rev" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/blackbook.png" height="15" width="15" />All Costing Review</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'costing_jobrefund')?>>
													<a href="<?=base_url()?>costing_jobrefund" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/history.png" height="15" width="15" />Costing Job Refund</a>
												</li>
												<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: 0px 0px 0px 0px;">
												</div>
												<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
													<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Costing Report
													</b>
												</div>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'report_costing')?>>
													<a href="<?=base_url()?>report_costing" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="15" width="15" />Costing Report</a>
												</li>
											</ul>
										</li>		
										
										<!-- MENU MASTER REPORTS -->
										<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, array('report_attendance', 'inventory_report', 'report_maintenance', 'report_jobcard'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
											<a href="#" class="zoomsmall">
											<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/graphraw.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="">
												<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Master Reports</small><br>
												<small style="color:white;font-size:10px;">Reports Management</small>
											</p>
											</span>
											</a>					
											<ul>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','','finance'))?> <?=active($that, 'report_attendance')?>>
													<a href="<?=base_url()?>report_attendance" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="15" width="15" />Attendance Report</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'inventory_report')?>>
													<a href="<?=base_url()?>inventory_report" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="15" width="15" />Inventory Report</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'report_maintenance')?>>
													<a href="<?=base_url()?>report_maintenance" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="15" width="15" />Maintenance Report</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'report_jobcard')?>>
													<a href="<?=base_url()?>report_jobcard" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="15" width="15" />Jobcard Report</a>
												</li>
												<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'report_costing')?>>
													<a href="<?=base_url()?>report_costing" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="15" width="15" />Costing Report</a>
												</li>
											</ul>
										</li>		
										
										<!-- MENU STANDARISASI WAKTU -->
										<li <?=access($user_access, array('admin', 'director','manager','monitor','','finance'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
											<a href="master_stand_time" title="" class="menu-item-parent zoomsmall">
											<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/colormix.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="">
												<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Standarisasi Jam</small><br>
												<small style="color:white;font-size:10px;">Regional & Standar Waktu</small>
											</p>
											</span>
											</a>
										</li>
										
										<!-- MENU USERGUIDE -->
										<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','client_bst','client_bkt','client_bmm'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
											<a href="<?=base_url()?>master_instruction" title="" class="menu-item-parent zoomsmall">
											<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/userguide.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="">
												<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">User Guide</small><br>
												<small style="color:white;font-size:10px;">User Guide & Documentation</small>
											</p>
											</span>
											</a>
										</li>	
										
										<!-- MENU HELPDESK -->
										<!--<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
											<a href="helpdesk" title="" class="menu-item-parent zoomsmall">
											<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/helpdesk.png" height="28" width="28" />
											<span class="menu-item-parent">
											<p class="small" style="">
												<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Helpdesk System</small><br>
												<small style="color:white;font-size:10px;">Complain Management</small>
											</p>
											</span>
											</a>
										</li>-->		
										
									</ul>
									</nav>	
										
									</div>
									
								</div>
								</div>
								
							</div>
							<div class="modal-footer" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white; height:1px;">
							</div>
						</div>
					</div>
				</div>
				
				<?php
				function access_exo($user_access, $accepted_access){
						if(strtolower($user_access['level'])!=="super") {
							if (in_array(strtolower($user_access['level']),  $accepted_access)) {
								echo "";
							} else {
								echo "hidden";
							}
						}
					}
				?>
				<!-- END LOGO PLACEHOLDER -->
				<div  <?=access_exo($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> >
				<span id="activity" class="activity-dropdown">
								
				<img style="margin: -5px 0px 0px 0px;" src="<?=base_url()?>assets/img/calendar.png" height="20" width="20" />
				<b class="badge" id="my_notify" style="margin: 0px 0px -20px 0px;"> 0 </b> </span>
				<div class="ajax-dropdown" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);color;white;">
					<div class="btn-group btn-group-justified" data-toggle="buttons">
						<label class="btn btn-default">
							<input type="radio" name="activity" id="<?=base_url()?>notification/get_notif_ticket">
							Ticket Notification (<span id="my_notify_ticket">0</span>) </label>
						<label class="btn btn-default">
							<input type="radio" name="activity" id="<?=base_url()?>notification/get_notif_costing">
							Request Costing (<span id="my_notify_costing">0</span>) </label>
					</div>
					<div class="ajax-notifications custom-scroll">
						<div class="alert alert-transparent">
							Silahkan Pilih Tombol Ticket Notification atau Request Costing untuk melihat Pesan Notifikasi.
						</div>
						<center>
						<img style="margin: 0px 0px 0px 0px;" src="<?=base_url()?>assets/img/colormix.png" height="80" width="80" />
						</center>
					</div>
					
					<span> Last Updated On: <span id="last_update">12/12/2020 00:00AM</span>
						<button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading Notification..." id="reloading_notif" class="btn btn-xs btn-default pull-right">
							<i class="fa fa-refresh"></i>
						</button> 
					</span>
				</div>
				</div>
				<!-- END AJAX-DROPDOWN -->
			</div>

	<div class="content" style="margin: 0px 0px 0px 0px;">
	<hanzmobview <?=access_exo($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> >	
		<ul class="exo-menu">
			<!--<li class="drop-down"><a href="#" class="cd-btn js-cd-panel-trigger" data-panel="main">
			<p class="small zoomsmall" align="justify" style="color:black;font-size:10px; margin: 0px 0px 0px 0px;"><img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/taskyellow.png" height="30" width="30"/>
			<b style="letter-spacing: -1px; color:black;font-size:16px; margin: 0px 0px 0px 0px;">
			Work Schedule</b><br>
			<small style="color:black;font-size:10px; margin: 0px 0px 0px 0px;">Job & Workschedule</small></p>
			</a>
				<ul class="drop-down-ul animated fadeIn">
					<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
					<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/kworldclock.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Job & Work Schedule</span></div>
					</a>
					</li>
					<li class="flyout-right"><a href="<?=base_url()?>trans_staff">
					<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/kdmconfig.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Switch Schedule</span></div>
					</a>
					</li>
					<li class="flyout-right"><a href="<?=base_url()?>master_item">
					<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/newjob.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">List Job Item</span></div>
					</a>
					</li>
				</ul>	
			
			</li>-->
			
			<li class="drop-down"><a href="#">
			<p class="small zoomsmall" align="justify" style="color:black;font-size:10px; margin: 0px 0px 0px 0px; "><img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/database.png" height="30" width="30"/>
			<b style="letter-spacing: -1px; color:black;font-size:16px; margin: 0px 0px 0px 0px;">
			Core Master Data</b><br>
			<small style="color:black;font-size:10px; margin: 0px 0px 0px 0px;">Master Data System</small></p>
			</a>
				<ul class="drop-down-ul animated fadeIn">
					<li class="flyout-right" <?=access_exo($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> ><a href="#">
					<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Master Data Client</span></div>
					</a>
						<ul class="animated">  						
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/flipblue.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Client Dashboard</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/blackbook.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Client & Customer</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/atm.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Data Mesin ATM</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/loc.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Area & Location</span></div>
							</a>
							</li>
						</ul>
					</li>
					
					<li class="flyout-right" <?=access_exo($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?>><a href="#">
					<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Master Data Staff</span></div>
					</a>
						<ul class="animated">  
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/userpro.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Petugas/Staff</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/timecal.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Attendance</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/lock.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">User Access</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/timeroll2.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Setting GeoLocation</span></div>
							</a>
							</li>
						</ul>
					</li>
					
					<li class="flyout-right" <?=access_exo($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?>><a href="#">
					<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Master Inventory</span></div>
					</a>
						<ul class="animated">  
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/inventory3.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Inventory Stock</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/incoming.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Transaction In</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/outgoing.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Transaction Out</span></div>
							</a>
							</li>
						</ul>
					</li>
					
					<li class="flyout-right" <?=access_exo($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?>><a href="#">
					<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Master WorkSchedule</span></div>
					</a>
						<ul class="animated">
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/timecal.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Work Schedule</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/kdmconfig.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Switch Schedule</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/newjob.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">List Job Item</span></div>
							</a>
							</li>
							<li class="flyout-right"><a href="<?=base_url()?>trans_schedule">
							<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/send.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">News Broadcast</span></div>
							</a>
							</li>
						</ul>
					</li>					
				</ul>	
			</li>					
			<li class="drop-down"><a href="#">
			<p class="small zoomsmall" align="justify" style="color:black;font-size:10px; margin: 0px 0px 0px 0px;"><img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/graphraw.png" height="30" width="30"/>
			<b style="letter-spacing: -1px; color:black;font-size:16px; margin: 0px 0px 0px 0px;">
			Reports Management</b><br>
			<small style="color:black;font-size:10px; margin: 0px 0px 0px 0px;">Reports Management System</small></p>
			</a>
				<ul class="drop-down-ul animated fadeIn">
					<li class="flyout-right" <?=access_exo($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?>><a href="<?=base_url()?>report_attendance" >
					<div class="zoomsmall"><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Attendance Reports</span></div>
					</a>
					</li>
					<li class="flyout-right" <?=access_exo($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?>><a href="<?=base_url()?>inventory_report" >
					<div class="zoomsmall"><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Inventory Reports</span></div>
					</a>
					</li>
					<li class="flyout-right" <?=access_exo($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?>><a href="<?=base_url()?>report_maintenance" >
					<div class="zoomsmall"><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Maintenance Reports</span></div>
					</a>
					</li>
					<li class="flyout-right" <?=access_exo($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?>><a href="<?=base_url()?>trans_schedule">
					<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 6px;">Jobcard Reports</span></div>
					</a>
					</li>
				</ul>	
			</li>
			
			<li class="drop-down" <?=access_exo($user_access1, array('admin', 'director','manager','monitor','logistic','finance'))?>><a href="<?=base_url()?>new_ticket">
			<p class="small zoomsmall" align="justify" style="color:black;font-size:10px; margin: 0px 0px 0px 0px;"><img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>assets/img/new-ticket.png" height="30" width="30"/>
			<b style="letter-spacing: -1px; color:black;font-size:16px; margin: 0px 0px 0px 0px;">
			New Issue Tickets</b><br>
			<small style="color:black;font-size:10px; margin: 0px 0px 0px 0px;">Create New Tickets</small></p>
			</a>
			</li>
			<li class="drop-down"><a href="#">
				<p class="small zoomsmall" align="justify" style="color:black;font-size:10px; margin: 0px 0px 0px 0px;"><img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>assets/img/userpro.png" height="30" width="30"/>
				<b style="letter-spacing: -1px; color:black;font-size:16px; margin: 0px 0px 0px 0px;">
			User Access</b><br>
			<small style="color:black;font-size:10px; margin: 0px 0px 0px 0px;">User System</small>
				</p>
				</a>
					<ul class="drop-down-ul animated fadeIn">
						<li class="flyout-right" <?=access_exo($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> ><a href="<?=base_url()?>">
						
					<span style="background: linear-gradient(to bottom, #000000, #434343);">
						<p class="small" align="justify" style="color:black;font-size:10px; margin: 5px 0px 0px 0px;">
						<b style="letter-spacing: -1px; color:black;font-size:16px; margin: 0px 0px 0px 0px;">
						User Credential Access</b><br>
						<small style="color:black;font-size:10px; margin: 0px 0px 0px 0px;"><?=$user_access['level']?> : <?=$user_access['name']?></small></p>
					</span>
						</a>
						</li>
						<li class="flyout-right" <?=access_exo($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?>><a href="<?=base_url()?>">
						<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/kdmconfig.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Profile User</span></div>
						</a>
						</li>
						<li class="flyout-right" <?=access_exo($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?>><a href="<?=base_url()?>">
						<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/gear.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Settings</span></div>
						</a>
						</li>
						<li class="flyout-right" <?=access_exo($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> ><a href="<?=base_url()?>">
						<div class="zoomsmall" ><img style="float: left; margin: 0px 0px 0px -5px;" src="<?=base_url()?>seipkon/assets/img/logout.png" height="20" width="20" /><span style="color:black;font-size:14px; margin: 0px 0px 0px 5px;">Logout</span></div>
						</a>
						</li>
					</ul>	
				
				</li>
					
		</ul>
		
	</hanzmobview>
	</div>
			
		<!-- pulled right: nav area -->
			<div class="pull-right">
				
				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->
				
				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li class="">
						<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
							<img src="<?=BASE_URL?>img/avatars/sunny.png" alt="John Doe" class="online" />  
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="<?=base_url()?>login" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
							</li>
						</ul>
					</li>
				</ul>

				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="<?=base_url()?>login/logout" title="Sign Out" data-action="userLogout" data-logout-msg="Apakah Anda Yakin akan Logout dari sistem ???"><i class="fa fa-sign-out"></i></a> </span>
				</div>
				<!-- end logout button -->

				<!-- fullscreen button -->
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>
				<!-- end fullscreen button -->
				
				<!-- #Voice Command: Start Speech -->
				<div id="speech-btn" class="btn-header transparent pull-right hidden-sm hidden-xs">
					<div> 
						<a href="javascript:void(0)" title="Voice Command" data-action="voiceCommand"><i class="fa fa-microphone"></i></a> 
						<div class="popover bottom"><div class="arrow"></div>
							<div class="popover-content">
								<h4 class="vc-title">Voice Command Cctivated <br><small>Please Speak Clearly into the microphone</small></h4>
								<h4 class="vc-title-error text-center">
									<i class="fa fa-microphone-slash"></i> Voice Command Failed
									<br><small class="txt-color-red">Must <strong>"Allow"</strong> Microphone</small>
									<br><small class="txt-color-red">Must have <strong>Internet Connection</strong></small>
								</h4>
								<a href="javascript:void(0);" class="btn btn-success" onclick="commands.help()">See Commands</a> 
								<a href="javascript:void(0);" class="btn bg-color-purple txt-color-white" onclick="$('#speech-btn .popover').fadeOut(50);">Close Popup</a> 
							</div>
						</div>
					</div>
				</div>
				<!-- end voice command -->
	
			</div>
			<!-- end pulled right: nav area -->

		</header>
		<!-- END HEADER -->

	
		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% ); margin: 0px 0px 0px 0px;">
			<!-- User info -->
			<div class="login-info" style="background: linear-gradient(to bottom, #000000, #434343);">
				<!--<span> 
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="<?=BASE_URL?>img/avatars/sunny.png" alt="me" class="online" /> 
						<span>
							john.doe 
							john.doe 
						</span>
						<i class="fa fa-angle-down"></i>
						
					</a> 
					
				</span>-->
				<span>
					<p class="small" align="justify" style="color:white;font-size:10px; margin: 5px 0px 0px 0px;">
					<b style="letter-spacing: -1px; color:white;font-size:16px; margin: 0px 0px 0px 0px;">
					User Credential Access</b><br>
					<small style="color:white;font-size:10px; margin: 0px 0px 0px 0px;"><?=$user_access['level']?> : <?=$user_access['name']?></small></p>
				</span>
			</div>
			<nav>
				<ul>
					<?php
						function active($that, $currect_page){
							$url_array = explode("/", $that->router->fetch_class());
							$url = end($url_array);  
							if($currect_page == $url){
								echo "class='active'";
							} 
							if(is_array($currect_page)) {
								if(in_array($url, $currect_page)){
									echo "class='active'";
								}
							}
						}
						function access($user_access, $accepted_access){
							if(strtolower($user_access['level'])!=="super") {
								if (in_array(strtolower($user_access['level']),  $accepted_access)) {
									echo "";
								} else {
									echo "hidden";
								}
							}
						}
					?>
					<!-- MENU DASHBOARD SYSTEM -->
					<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','cse'))?> <?=active($that, 'dashboard')?> 
						style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
						<a href="<?=base_url()?>dashboard" title="" class="menu-item-parent zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/roll.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Dashboard System</small><br>
							<small style="color:white;font-size:10px;">Administrator Dashboard</small>
						</p>
						</span>
						</a>
					</li>
					<!--<li <?=active($that, 'dashboard_merchant')?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
						<a href="<?=base_url()?>dashboard_merchant" title="" class="menu-item-parent zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/colorloc.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Client Dashboard</small><br>
							<small style="color:white;font-size:10px;">Client Dashboard Monitoring</small>
						</p>
						</span>
						</a>
					</li>-->
					
					<!-- MENU DASHBOARD CLIENT -->
					<li <?=access($user_access, array('admin', 'director','manager','monitor','','finance','client_bst','client_bkt','client_bmm'))?><?=active($that, array('dashboard_bst', 'dashboard_bkt', 'dashboard_bmm'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
						<a href="#" class="zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/colorloc.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Client Dashboard</small><br>
							<small style="color:white;font-size:10px;">Client Dashboard Monitoring</small>
						</p>
						</span>
						</a>		
						<ul>
							<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: -6px 0px 0px 0px;">
							</div>
							<div <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
								<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Dashboard Overall
								</b>
							</div>
							<li  <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'dashboard_merchant')?>>
								<a href="<?=base_url()?>dashboard_merchant" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/building2.png" height="15" width="15" />Dashboard Overall</a>
							</li>
							<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: 0px 0px 0px 0px;">
							</div>
							<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
								<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Dashboard Clients
								</b>
							</div>
							<li  <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','client_bst'))?><?=active($that, 'dash_bst')?>>
								<a href="<?=base_url()?>dash_bst" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/building2.png" height="15" width="15" />Bank Sulteng</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','client_bkt'))?><?=active($that, 'dash_bkt')?>>
								<a href="<?=base_url()?>dash_bkt" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/building2.png" height="15" width="15" />Bank Kalteng</a>
							</li>
							<li  <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','client_bmm'))?><?=active($that, 'dash_bmm')?>>
								<a href="<?=base_url()?>dash_bmm" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/building2.png" height="15" width="15" />Bank Malut</a>
							</li>
							<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: 0px 0px 0px 0px;">
							</div>
							<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
								<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Performance Report
								</b>
							</div>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','client_bst'))?> <?=active($that, 'report_maintenance_bst')?>>
								<a href="<?=base_url()?>report_maintenance_bst" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="15" width="15" />Report Bank Sulteng</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','client_bkt'))?> <?=active($that, 'report_maintenance_bkt')?>>
								<a href="<?=base_url()?>report_maintenance_bkt" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="15" width="15" />Report Bank Kalteng</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','client_bmm'))?> <?=active($that, 'report_maintenance_bmm')?>>
								<a href="<?=base_url()?>report_maintenance_bmm" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="15" width="15" />Report Bank Malut</a>
							</li>
						</ul>
					</li>
					
					<!-- MENU MASTER CLIENT -->
					<li <?=access($user_access, array('admin', 'director','manager','monitor','','finance'))?> <?=active($that, array('dashboard_merchant_internal', 'master_client', 'master_atm', 'master_location', 'master_location_detail', 'master_require_part'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
						<a href="#" class="zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/cube.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Data Master Client</small><br>
							<small style="color:white;font-size:10px;">Client, Mesin ATM & Area</small>
						</p>
						</span>
						</a>		
						<ul>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'dashboard_merchant_internal')?>>
								<a href="<?=base_url()?>dashboard_merchant_internal" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/cube.png" height="15" width="15" />Client Dashboard</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_client')?>>
								<a href="<?=base_url()?>master_client" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/building.png" height="15" width="15" />Client & Customer</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_atm')?>>
								<a href="<?=base_url()?>master_atm" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/atm2.png" height="15" width="15" />Data Mesin ATM</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, array('master_location', 'master_location_detail', 'master_require_part'))?>>
								<a href="<?=base_url()?>master_location" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/whiteloc.png" height="15" width="15" />Area & Location</a>
							</li>
						</ul>
					</li>
					
					<!-- MENU MASTER STAFF -->
					<li <?=access($user_access, array('admin', 'director','manager','monitor','','finance'))?> <?=active($that, array('dash_staff', 'master_staff', 'master_attendance', 'master_user', 'master_absen_location'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
						<a href="#" class="zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/userpro.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Data Master Staff</small><br>
							<small style="color:white;font-size:10px;">Staff/Karyawan & Attendance</small>
						</p>
						</span>
						</a>
						<ul>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'dash_staff')?>>
								<a href="<?=base_url()?>dash_staff" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/userflow.png" height="15" width="15" />Dashboard Staff</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_staff')?>>
								<a href="<?=base_url()?>master_staff" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/userpro.png" height="15" width="15" />Karyawan / Staff</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_attendance')?>>
								<a href="<?=base_url()?>master_attendance" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/timecal.png" height="15" width="15" />Attendance</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_user')?>>
								<a href="<?=base_url()?>master_user" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/lock.png" height="15" width="15" />User Access</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_absen_location')?>>
								<a href="<?=base_url()?>master_absen_location" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/browser.png" height="15" width="15" />Setting Geolocation</a>
							</li>
						</ul>
					</li>
					
					<!-- MENU MASTER INVENTORY -->
					<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','cse'))?> <?=active($that, array('dash_inventory', 'servicepoint_inventory', 'master_inventory', 'transaction_in', 'transaction_out', 'transaction_in_sp', 'transaction_out_sp'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
						<a href="#" class="zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/folset.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Master Inventory</small><br>
							<small style="color:white;font-size:10px;">Inventory & Logistics</small>
						</p>
						</span>
						</a>
						<ul <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?>>
							<div <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: -6px 0px 0px 0px;">
							</div>
							<div <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
								<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Overall Inventory Stock
								</b>
							</div>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'dash_inventory')?>>
								<a href="<?=base_url()?>dash_inventory" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/folset.png" height="15" width="15" />Dashboard Inventory</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_inventory')?>>
								<a href="<?=base_url()?>master_inventory" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/dataset3.png" height="15" width="15" />All Inventory Stock</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'accesory_part')?>>
								<a href="<?=base_url()?>accesory_part" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/dataset.png" height="15" width="15" />Accesory Part</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'transaction_in')?>>
								<a href="<?=base_url()?>transaction_in" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/incoming.png" height="15" width="15" />Transaction In</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'transaction_out')?>>
								<a href="<?=base_url()?>transaction_out" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/outgoing.png" height="15" width="15" />Transaction Out</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'request_sparepart')?>>
								<a href="<?=base_url()?>request_sparepart" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/db_add.png" height="15" width="15" />Incoming Request</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?>  <?=active($that, 'all_return_bad')?>>
								<a href="<?=base_url()?>all_return_bad" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/tools2.png" height="15" width="15" />All Return Bad</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?>  <?=active($that, 'journal_sparepart')?>>
								<a href="<?=base_url()?>journal_sparepart" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/folgraph2.png" height="15" width="15" />Journal Sparepart</a>
							</li>
							
							<div <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','cse'))?> class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: 0px 0px 0px 0px;">
							</div>
							<div <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','cse'))?> class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
								<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Service Point Stock
								</b>
							</div>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','cse'))?> <?=active($that, 'servicepoint_inventory')?>>
								<a href="<?=base_url()?>servicepoint_inventory" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/redloc.png" height="15" width="15" />Service Point Stock</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','cse'))?> <?=active($that, 'transaction_in_sp')?>>
								<a href="<?=base_url()?>transaction_in_sp" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/incoming.png" height="15" width="15" />SP Transaction In</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','cse'))?> <?=active($that, 'transaction_out_sp')?>>
								<a href="<?=base_url()?>transaction_out_sp" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/outgoing.png" height="15" width="15" />SP Transaction Out</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','cse'))?> <?=active($that, 'outgoing_request')?>>
								<a href="<?=base_url()?>outgoing_request" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/db_add.png" height="15" width="15" />Outgoing Request</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','cse'))?> <?=active($that, 'sp_return_bad')?>>
								<a href="<?=base_url()?>sp_return_bad" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/tools2.png" height="15" width="15" />SP Return Bad</a>
							</li>
						</ul>
					</li>
					
					<!-- MENU WORK SCHEDULERS -->
					<li <?=access($user_access, array('admin', 'director','manager','monitor','','finance'))?> <?=active($that, array('trans_schedule', 'trans_staff', 'master_item', 'master_news'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
						<a href="#" class="zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/taskyellow.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Work Schedulers</small><br>
							<small style="color:white;font-size:10px;">Job & Work Schedulers</small>
						</p>
						</span>
						</a>
						<ul>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'trans_schedule')?>>
								<a href="<?=base_url()?>trans_schedule" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/taskyellow.png" height="15" width="15" />Work Schedule</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'trans_staff')?>>
								<a href="<?=base_url()?>trans_staff" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/send.png" height="15" width="15" />Switch Schedule</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_item')?>>
								<a href="<?=base_url()?>master_item" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/cal.png" height="15" width="15" />List Job Item</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_news')?>>
								<a href="<?=base_url()?>master_news" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/phonepink.png" height="15" width="15" />News Broadcast</a>
							</li>
						</ul>
					</li>		
					
					<!-- MENU MAINTENANCE -->
					<li <?=access($user_access, array('admin', 'director','manager','monitor','','finance'))?> <?=active($that, array('new_ticket', 'status_ticket', 'master_jobcard', 'trouble_category', 'trouble_sub_category','documentation'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
						<a href="#" class="zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/new-ticket.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Data Maintenance</small><br>
							<small style="color:white;font-size:10px;">Technical & Maintenance  </small>
						</p>
						</span>
						</a>						
						<ul>
							<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: -6px 0px 0px 0px;">
							</div>
							<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
								<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Dashboard Maintenance
								</b>
							</div>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'dash_maintenance')?>>
								<a href="<?=base_url()?>dash_maintenance" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/blackbook.png" height="15" width="15" />Summary Tickets</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'documentation')?>>
								<a href="<?=base_url()?>documentation" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/folinfo.png" height="15" width="15" />Documentation</a>
							</li>
							<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: 0px 0px 0px 0px;">
							</div>
							<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
								<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Create Issue Tickets
								</b>
							</div>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'new_ticket')?>>
								<a href="<?=base_url()?>new_ticket/ticket_new" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/new-ticket.png" height="15" width="15" />New Issue Tickets<b class="badge" style="margin: -8px 10px 0px 0px; color: red"> New </b></a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'new_ticket')?>>
								<a href="<?=base_url()?>new_ticket" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/new-ticket.png" height="15" width="15" />New Issue Tickets</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'status_ticket')?>>
								<a href="<?=base_url()?>status_ticket" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/filetime.png" height="15" width="15" />Status Tickets</a>
							</li>
							<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: 0px 0px 0px 0px;">
							</div>
							<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
								<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">List Count Tickets
								</b>
							</div>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'calculation_tickets')?>>
								<a href="<?=base_url()?>calculation_tickets" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/new-ticket.png" height="15" width="15" />Listing Tickets</a>
							</li>
							<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: 0px 0px 0px 0px;">
							</div>
							<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
								<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Utility Maintenance
								</b>
							</div>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'master_jobcard')?>>
								<a href="<?=base_url()?>master_jobcard" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/jobcard.png" height="15" width="15" />Data Jobcard</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'trouble_category')?>>
								<a href="<?=base_url()?>trouble_category" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/setting2.png" height="15" width="15" />Activity Type</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'trouble_sub_category')?>>
								<a href="<?=base_url()?>trouble_sub_category" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/setting.png" height="15" width="15" />Problem Type</a>
							</li>
						</ul>
					</li>		
					
					<!-- MENU FINCANCE -->
					<li <?=access($user_access, array('admin', 'director','manager','monitor','','finance'))?> <?=active($that, array('dash_finance', 'finance_costing', 'costing_job', 'costing_rev', 'costing_jobrefund','report_costing'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
						<a href="#" class="zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/graphround.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Official Finance</small><br>
							<small style="color:white;font-size:10px;">Costing & Budgeting</small>
						</p>
						</span>
						</a>						
						<ul>
							<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: -6px 0px 0px 0px;">
							</div>
							<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
								<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Dashboard Finance
								</b>
							</div>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'dash_finance')?>>
								<a href="<?=base_url()?>dash_finance" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/graphround.png" height="15" width="15" />Dashboard Finance</a>
							</li>
							<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: 0px 0px 0px 0px;">
							</div>
							<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
								<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Data Costing & Jobs
								</b>
							</div>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'finance_costing')?>>
								<a href="<?=base_url()?>finance_costing" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/db_add.png" height="15" width="15" />Parameter Costing</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'costing_job')?>>
								<a href="<?=base_url()?>costing_job" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/filewhite.png" height="15" width="15" />Data Costing Jobs</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'costing_rev')?>>
								<a href="<?=base_url()?>costing_rev" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/blackbook.png" height="15" width="15" />All Costing Review</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'costing_jobrefund')?>>
								<a href="<?=base_url()?>costing_jobrefund" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/history.png" height="15" width="15" />Costing Job Refund</a>
							</li>
							<div class="" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );height:3px; margin: 0px 0px 0px 0px;">
							</div>
							<div class="" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:30px; margin: 0px 0px 0px 0px;">
								<b class="hanzicons" style="float: left; margin: 12px 5px 0px 30px;font-size:14px;color:gray;">Costing Report
								</b>
							</div>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'report_costing')?>>
								<a href="<?=base_url()?>report_costing" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="15" width="15" />Costing Report</a>
							</li>
						</ul>
					</li>		
					
					<!-- MENU MASTER REPORTS -->
					<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, array('report_attendance', 'inventory_report', 'report_maintenance', 'report_jobcard'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
						<a href="#" class="zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/graphraw.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Master Reports</small><br>
							<small style="color:white;font-size:10px;">Reports Management</small>
						</p>
						</span>
						</a>					
						<ul>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','','finance'))?> <?=active($that, 'report_attendance')?>>
								<a href="<?=base_url()?>report_attendance" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="15" width="15" />Attendance Report</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'inventory_report')?>>
								<a href="<?=base_url()?>inventory_report" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="15" width="15" />Inventory Report</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'report_maintenance')?>>
								<a href="<?=base_url()?>report_maintenance" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="15" width="15" />Maintenance Report</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'report_jobcard')?>>
								<a href="<?=base_url()?>report_jobcard" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="15" width="15" />Jobcard Report</a>
							</li>
							<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> <?=active($that, 'report_costing')?>>
								<a href="<?=base_url()?>report_costing" class="zoomsmall"><img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/pdf.png" height="15" width="15" />Costing Report</a>
							</li>
						</ul>
					</li>		
					
					
					<!--<li  <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
						<a href="master_statistic" title="" class="menu-item-parent zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/graphround.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Statistics & Traffic</small><br>
							<small style="color:white;font-size:10px;">Traffic & Analyzer System</small>
						</p>
						</span>
						</a>
					</li>-->	
					
					<!-- MENU STANDARISASI WAKTU -->
					<li <?=access($user_access, array('admin', 'director','manager','monitor','','finance'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
						<a href="master_stand_time" title="" class="menu-item-parent zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/colormix.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Standarisasi Jam</small><br>
							<small style="color:white;font-size:10px;">Regional & Standar Waktu</small>
						</p>
						</span>
						</a>
					</li>
					
					<!-- MENU USERGUIDE -->
					<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance','client_bst','client_bkt','client_bmm'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
						<a href="<?=base_url()?>master_instruction" title="" class="menu-item-parent zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/userguide.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">User Guide</small><br>
							<small style="color:white;font-size:10px;">User Guide & Documentation</small>
						</p>
						</span>
						</a>
					</li>	
					
					<!-- MENU HELPDESK -->
					<!--<li <?=access($user_access, array('admin', 'director','manager','monitor','logistic','finance'))?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
						<a href="helpdesk" title="" class="menu-item-parent zoomsmall">
						<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/helpdesk.png" height="28" width="28" />
						<span class="menu-item-parent">
						<p class="small" style="">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Helpdesk System</small><br>
							<small style="color:white;font-size:10px;">Complain Management</small>
						</p>
						</span>
						</a>
					</li>-->		
					
				</ul>
			</nav>

		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon" style="background: linear-gradient(to bottom, #000000, #434343);">
			<span class="ribbon-button-alignment pull-left" style="margin: -3px 0px 0px 0px; "> 
			<small style="color:white;font-size:16px; font-weight: bold;">
			<a href="#" class="cd-btn js-cd-panel-trigger" data-panel="main" style="color:white;font-size:16px; font-weight: bold;">
			CSE Integrated Monitoring System</a></small>
			</span> 
			
				<span class="ribbon-button-alignment pull-right"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"> Refresh & Sincronize Data</i>
					</span> 
				</span>
				
			<link rel="stylesheet" href="<?=BASE_URL?>v153/panel/css/reset.css"> <!-- CSS reset -->
			<link rel="stylesheet" href="<?=BASE_URL?>v153/panel/css/style.css"> <!-- Resource style -->
			<div class="cd-panel cd-panel--from-right js-cd-panel-main" >
				<header class="cd-panel__header" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
					<img style="float: left; margin: 10px 10px 0px 10px;" src="<?=base_url()?>seipkon/assets/img/foltime2.png" height="28" width="28" />
						<p class="small" style="margin: 10px 0px 0px 0px;">
							<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Log System</small><br>
							<small style="color:white;font-size:10px;">Data Log Activity</small>
						</p>
					<a href="#0" class="cd-panel__close js-cd-close" style="color:red">Close</a>
				</header>
				
				<div class="cd-panel__container" style="background: linear-gradient(to bottom, #000000, #434343);">
					
					<div class="cd-panel__content">
					<div class="row">
				
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
						<div class="well well-sm">
							<!-- Timeline Content -->
							<div class="smart-timeline">
								<ul class="smart-timeline-list">
									<style>
										div.log {
										  line-height: 80%;
										}
									</style>
									<li>
										<div class="smart-timeline-icon">
											<i class="fa fa-file-text"></i>
										</div>
										<div class="smart-timeline-time">
										<p class="small" style="float:left;font-size:12px; margin: -10px 0px 0px 0px; color:black;">
											<small>22/03/2021</small>
											<small>19:24:33</small>
										</p>
										</div>
										<div class="smart-timeline-content" style="height:70px;">
											<a href="#" class="zoomsmall">
											<p class="small" style=" margin: -10px 0px 0px 0px; color:black;">
												<small style="font-size:14px;font-weight: bold;">Client Dashboard</small><br>
												<div  class="log"><small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br>
												<small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br>
												<small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br>
												<small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br></div>
											</p>
											
											</a>
										</div>
									</li>
									<li>
										<div class="smart-timeline-icon">
											<i class="fa fa-file-text"></i>
										</div>
										<div class="smart-timeline-time">
										<p class="small" style="float:left;font-size:12px; margin: -10px 0px 0px 0px; color:black;">
											<small>22/03/2021</small>
											<small>19:24:33</small>
										</p>
										</div>
										<div class="smart-timeline-content" style="height:70px;">
											<a href="#" class="zoomsmall">
											<p class="small" style=" margin: -10px 0px 0px 0px; color:black;">
												<small style="font-size:14px;font-weight: bold;">Client Dashboard</small><br>
												<div  class="log"><small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br>
												<small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br>
												<small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br>
												<small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br></div>
											</p>
											
											</a>
										</div>
									</li>
									<li>
										<div class="smart-timeline-icon">
											<i class="fa fa-file-text"></i>
										</div>
										<div class="smart-timeline-time">
										<p class="small" style="float:left;font-size:12px; margin: -10px 0px 0px 0px; color:black;">
											<small>22/03/2021</small>
											<small>19:24:33</small>
										</p>
										</div>
										<div class="smart-timeline-content" style="height:70px;">
											<a href="#" class="zoomsmall">
											<p class="small" style=" margin: -10px 0px 0px 0px; color:black;">
												<small style="font-size:14px;font-weight: bold;">Client Dashboard</small><br>
												<div  class="log"><small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br>
												<small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br>
												<small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br>
												<small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br></div>
											</p>
											
											</a>
										</div>
									</li>
									<li>
										<div class="smart-timeline-icon">
											<i class="fa fa-file-text"></i>
										</div>
										<div class="smart-timeline-time">
										<p class="small" style="float:left;font-size:12px; margin: -10px 0px 0px 0px; color:black;">
											<small>22/03/2021</small>
											<small>19:24:33</small>
										</p>
										</div>
										<div class="smart-timeline-content" style="height:70px;">
											<a href="#" class="zoomsmall">
											<p class="small" style=" margin: -10px 0px 0px 0px; color:black;">
												<small style="font-size:14px;font-weight: bold;">Client Dashboard</small><br>
												<div  class="log"><small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br>
												<small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br>
												<small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br>
												<small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br></div>
											</p>
											
											</a>
										</div>
									</li>
									<li>
										<div class="smart-timeline-icon">
											<i class="fa fa-file-text"></i>
										</div>
										<div class="smart-timeline-time">
										<p class="small" style="float:left;font-size:12px; margin: -10px 0px 0px 0px; color:black;">
											<small>22/03/2021</small>
											<small>19:24:33</small>
										</p>
										</div>
										<div class="smart-timeline-content" style="height:70px;">
											<a href="#" class="zoomsmall">
											<p class="small" style=" margin: -10px 0px 0px 0px; color:black;">
												<small style="font-size:14px;font-weight: bold;">Client Dashboard</small><br>
												<div  class="log"><small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br>
												<small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br>
												<small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br>
												<small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br></div>
											</p>
											
											</a>
										</div>
									</li>
									<li>
										<div class="smart-timeline-icon">
											<i class="fa fa-file-text"></i>
										</div>
										<div class="smart-timeline-time">
										<p class="small" style="float:left;font-size:12px; margin: -10px 0px 0px 0px; color:black;">
											<small>22/03/2021</small>
											<small>19:24:33</small>
										</p>
										</div>
										<div class="smart-timeline-content" style="height:70px;">
											<a href="#" class="zoomsmall">
											<p class="small" style=" margin: -10px 0px 0px 0px; color:black;">
												<small style="font-size:14px;font-weight: bold;">Client Dashboard</small><br>
												<div  class="log"><small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br>
												<small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br>
												<small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br>
												<small style="font-size:10px;" class="log">Client Dashboard Monitoring</small><br></div>
											</p>
											
											</a>
										</div>
									</li>
									
									<li class="text-center">
										<a href="javascript:void(0)" class="btn btn-sm btn-default"><i class="fa fa-arrow-down text-muted"></i> LOAD MORE</a>
									</li>
								</ul>
							</div>
							<!-- END Timeline Content -->
				
						</div>
				
					</div>
				
				</div>
				
					</div>
					
				</div> 
				
			</div>
			<script src="<?=BASE_URL?>v153/panel/js/main.js"></script>			
						
				
				<!-- breadcrumb -->
				<?php echo $__env->yieldContent('breadcrumb'); ?>
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span> -->

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				<?php echo $__env->yieldContent('content'); ?>

			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
		<div class="page-footer" style="background: linear-gradient(to bottom, #000000, #434343); height:35px">
			<div class="row">
				<div class="col-xs-12 col-sm-6" style="margin: -8px 0px 0px 0px;">
					<!--<span class="txt-color-white"><?php echo "Copyright ?? " . (int)date('Y') . " - ASSINDO CSE Integrated Monitoring System"; ?></span>-->
				</div>
			</div>
		</div>
		<!-- END PAGE FOOTER -->

		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->
		<div id="shortcut">
			<ul>
				<li>
					<a href="invoice.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>All Runsheet <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
				</li>
				<li>
					<a href="inbox.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>All Problem Ticket <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
				</li>
				<li>
					<a href="gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-clock-o fa-4x"></i> <span>All Interval<span class="label pull-right bg-color-darken">14</span></span> </span> </a>
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

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?=BASE_URL?>js/plugin/pace/pace.min.js"></script>-->
	
	
		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="<?=BASE_URL?>js/libs/jquery-2.1.1.min.js"></script>
		
		<script src="<?=BASE_URL?>js/libs/jquery.redirect.js"></script>

		<script src="<?=BASE_URL?>js/libs/jquery-ui-1.10.3.min.js"></script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?=BASE_URL?>js/app.config.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="<?=BASE_URL?>js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

		<!-- BOOTSTRAP JS -->
		<script src="<?=BASE_URL?>js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="<?=BASE_URL?>js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="<?=BASE_URL?>js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<script src="<?=BASE_URL?>js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

		<!-- SPARKLINES -->
		<script src="<?=BASE_URL?>js/plugin/sparkline/jquery.sparkline.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="<?=BASE_URL?>js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="<?=BASE_URL?>js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY SELECT2 INPUT 
		<script src="<?=BASE_URL?>js/plugin/select2/select2.min.js"></script>-->

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="<?=BASE_URL?>js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="<?=BASE_URL?>js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices -->
		<script src="<?=BASE_URL?>js/plugin/fastclick/fastclick.min.js"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- Demo purpose only 
		<script src="<?=BASE_URL?>js/demo.min.js"></script>-->

		<!-- MAIN APP JS FILE -->
		<script src="<?=BASE_URL?>js/app.min.js"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="<?=BASE_URL?>js/speech/voicecommand.min.js"></script>

		<!-- SmartChat UI : plugin -->
		<script src="<?=BASE_URL?>js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="<?=BASE_URL?>js/smart-chat-ui/smart.chat.manager.min.js"></script>
		
		<script src="<?=base_url()?>seipkon/assets/jqueryconfirm/dist/jquery-confirm.min.js"></script>
		<script src="<?=base_url()?>seipkon/assets/select2/dist/js/select2.min.js"></script>
		<script src="<?=base_url()?>seipkon/assets/datepicker/bootstrap-datepicker.min.js"></script>
		
		<script src="<?=base_url()?>seipkon/assets/plugins/daterangepicker/js/moment.min.js"></script>
		<script src="<?php echo base_url();?>seipkon/assets/fullcalendar/dist/fullcalendar.js"></script>
		<script src="<?php echo base_url();?>seipkon/assets/fullcalendar/dist/scheduler.min.js"></script>
		
		<!-- PAGE RELATED PLUGIN(S) -->
		<?php echo $__env->yieldContent('javascript'); ?>
		
		<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js"></script>
		<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-analytics.js"></script>
		<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-messaging.js"></script>
		<script>
			MsgElem = document.getElementById("msg");
			TokenElem = document.getElementById("token");
			NotisElem = document.getElementById("notis");
			ErrElem = document.getElementById("err");
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
					ErrElem.innerHTML =  "Unable to get permission to notify."
					console.log("Unable to get permission to notify.", err);
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
		
		<!-- Your GOOGLE ANALYTICS CODE Below -->
		<script type="text/javascript">
			$.sound_path = "<?=BASE_URL?>sound/";
			$.sound_on = true; 
		
			function notify() {
				$.smallBox({
					title : "James Simmons liked your comment",
					content : "<i class='fa fa-clock-o'></i> <i>2 seconds ago...</i>",
					color : "#296191",
					iconSmall : "fa fa-thumbs-up bounce animated",
					timeout : 4000
				});
			}
		
			function notify_with_value(title, body) {
				// $.smallBox({
					// title : title,
					// content : body,
					// color : "#296191",
					// iconSmall : "fa fa-thumbs-up bounce animated",
					// timeout : 5000
				// });
				$.bigBox({
					title : title,
					content : body,
					color : "#3276B1",
					// timeout: 3000,
					icon : "fa fa-bell swing animated",
					// number : "1"	
				});
			}
			
			function notify_sound() {
				$.bigBox({
					title : "Big Information box",
					content : "Lorem ipsum dolor sit amet, test consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
					color : "#3276B1",
					timeout: 3000,
					icon : "fa fa-bell swing animated",
					number : "2"
				});
			}
		</script>
		
		<script>
			$.get("<?=base_url()?>notification/get_count", function(data) {
				var data = JSON.parse(data);
				$("#my_notify").html(data.count_all);
				$("#my_notify_ticket").html(data.count_ticket);
				$("#my_notify_costing").html(data.count_costing);
				$("#last_update").html(data.last_update);
				
				$this = $("#activity > .badge");
				$this.addClass("bg-color-red bounceIn animated");
			});
			
			$("#reloading_notif").on("click", function() {
				$.get("<?=base_url()?>notification/get_count", function(data) {
					var data = JSON.parse(data);
					$("#my_notify").html(data.count_all);
					$("#my_notify_ticket").html(data.count_ticket);
					$("#my_notify_costing").html(data.count_costing);
					$("#last_update").html(data.last_update);
					
					$this = $("#activity > .badge");
					$this.addClass("bg-color-red bounceIn animated");
				});
				
				var tes = $(this).closest("div").prev().next(".ajax-dropdown").find(".btn-group > .active > input").attr("id");
				if(tes!==undefined) {
					container = $(".ajax-notifications"), loadURL(tes,container);
				}
			});
			
			function read_notif(url) {
				$.ajax({
					url: url,
					dataType: 'html',
					timeout: 3000,
				}).done(function (response) {
					data = JSON.parse(response);
					// alert(data.url);
					// window.location.href = response;
					$.redirect(data.url, {
						id: data.id,
					}, "POST");
				}).fail(function(){
					self.hideLoading();
					$.alert('Something went wrong.');
				});
			}
			
			// $("#activity").click(function(a){var b=$(this);b.find(".badge").hasClass("bg-color-red"),b.next(".ajax-dropdown").is(":visible")?(b.next(".ajax-dropdown").fadeOut(150),b.removeClass("active")):(b.next(".ajax-dropdown").fadeIn(150),b.addClass("active"));var c=b.next(".ajax-dropdown").find(".btn-group > .active > input").attr("id");b=null,c=null,a.preventDefault()}),$('input[name="activity"]').change(function(){var a=$(this);url=a.attr("id"),container=$(".ajax-notifications"),loadURL(url,container),a=null})
		</script>

		<script type="text/javascript">
			// var _gaq = _gaq || [];
			// _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
			// _gaq.push(['_trackPageview']);

			// (function() {
				// var ga = document.createElement('script');
				// ga.type = 'text/javascript';
				// ga.async = true;
				// ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				// var s = document.getElementsByTagName('script')[0];
				// s.parentNodeertBefore(ga, s);
			// })();

		</script>

	</body>

</html><?php /**PATH D:\DEV_SERVER\htdocs\atmserv\coresys\views/layouts/master.blade.php ENDPATH**/ ?>