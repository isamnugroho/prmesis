<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title>INSAN SYSTEMS</title>
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
		<link rel="icon" href="<?=BASE_URL?>img/favicon/favicon.png" type="image/x-icon">

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
		
		<!-- v152 -->
		<!--<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>v152/themes/default/easyui.css">
		<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>v152/themes/icon.css">
		<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>v152/demo.css">-->
				
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
	

	<body class="fixed-header fixed-navigation fixed-page-footer">

		<!-- HEADER -->
		<header id="header">
			<div id="logo-group" style="#f3f3f3">
				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo" style="margin: 10px 5px 0px 5px;"> 
					<a href="#" class="zoomsmall" data-toggle="modal" data-target="#myMenu">
					<img src="<?=BASE_URL?>img/logo-white.png" alt="PROTOTYPE" style="width: 100%"> </a>
				</span>
				
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
			
			</div>

	
			
		<!-- pulled right: nav area -->
			<div class="pull-right">
				
				
			
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> 	
						<a href="javascript:void(0);" class="btn btn-primary pull-right zoomsmall" data-action="launchFullscreen" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);border-radius: 4px;width: 100%;height:30px;color:gray"><img style="float: left; margin: 3px 5px 0px 3px;" src="<?=base_url()?>assets/img/buttonblue.png" height="18" width="18" /><b style="float: left; margin: 0px 5px 0px 0px;font-size:12px;">Fullscreen</b></a>
					</span>
				</div>
				
			</div>
			<!-- end pulled right: nav area -->

		</header>
		<aside id="left-panel" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% ); margin: 0px 0px 0px 0px;">
		
			
			<nav style="background: linear-gradient(to bottom, #000000, #434343);color;white;">
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

					<li>
						<span class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
						<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); color;white; height:85px;">
							<div class="panel-heading">
								<a href="#" class="">
								<img style="float: left; margin: -20px 10px 0px 0px;" src="<?=base_url()?>assets/img/timecal.png" height="40" width="40" />
								<span class="menu-item-parent">
								<p class="small" style="float:left;color:gray;font-size:12px; font-weight: bold;margin: -5px 0px 0px 0px;">Time & Date (WIB)</p><br>
								<p class="small" style="margin: -5px 0px 0px 0px;">
									
									<small style="color:gray;font-size:12px; font-weight: bold;">
									<b id="Date" style="color:gray;font-size:12px; margin: 0px 0px 0px 0px;">
									01 January 2021
									</b>
									<b id="hours" style="color:gray;font-size:12px;">00</b>
									<b id="point" style="color:gray;font-size:12px;">:</b>
									<b id="min" style="color:gray;font-size:12px;">00</b>
									<b id="point" style="color:gray;font-size:12px;">:</b>
									<b id="sec" style="color:gray;font-size:12px;">00</b>
									
									</small>
								</p>
								</span>
								</a>
							</div>
						</div>

						</span> 					
					</li>					
					<li>
						<span class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
						<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
						<a href="#" class="">
						<img style="float: left; margin: -4px 5px 0px -4px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
						<span class="menu-item-parent">
						<p class="small" style="color:gray;margin: -4px 0px 0px 0px;">
							<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
							<small style="font-size:28px; font-weight: bold;">0</small>
						</p>
						</span>
						</a>
								
						</div>
						</span> 					
					</li>					
					<li>
						<span class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
						<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
						<a href="#" class="">
						<img style="float: left; margin: -4px 5px 0px -4px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
						<span class="menu-item-parent">
						<p class="small" style="color:gray;margin: -4px 0px 0px 0px;">
							<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
							<small style="font-size:28px; font-weight: bold;">0</small>
						</p>
						</span>
						</a>
								
						</div>
						</span> 					
					</li>					
					<li>
						<span class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
						<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
						<a href="#" class="">
						<img style="float: left; margin: -4px 5px 0px -4px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
						<span class="menu-item-parent">
						<p class="small" style="color:gray;margin: -4px 0px 0px 0px;">
							<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
							<small style="font-size:28px; font-weight: bold;">0</small>
						</p>
						</span>
						</a>
								
						</div>
						</span> 					
					</li>					
					<li>
						<span class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
						<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
						<a href="#" class="">
						<img style="float: left; margin: -4px 5px 0px -4px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
						<span class="menu-item-parent">
						<p class="small" style="color:gray;margin: -4px 0px 0px 0px;">
							<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
							<small style="font-size:28px; font-weight: bold;">0</small>
						</p>
						</span>
						</a>
								
						</div>
						</span> 					
					</li>					
					<li>
						<span class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
						<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
						<a href="#" class="">
						<img style="float: left; margin: -4px 5px 0px -4px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
						<span class="menu-item-parent">
						<p class="small" style="color:gray;margin: -4px 0px 0px 0px;">
							<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
							<small style="font-size:28px; font-weight: bold;">0</small>
						</p>
						</span>
						</a>
								
						</div>
						</span> 					
					</li>					
					<li>
						<span class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
						<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
						<a href="#" class="">
						<img style="float: left; margin: -4px 5px 0px -4px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
						<span class="menu-item-parent">
						<p class="small" style="color:gray;margin: -4px 0px 0px 0px;">
							<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
							<small style="font-size:28px; font-weight: bold;">0</small>
						</p>
						</span>
						</a>
								
						</div>
						</span> 					
					</li>					
					<li>
						<span class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
						<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
						<a href="#" class="">
						<img style="float: left; margin: -4px 5px 0px -4px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
						<span class="menu-item-parent">
						<p class="small" style="color:gray;margin: -4px 0px 0px 0px;">
							<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
							<small style="font-size:28px; font-weight: bold;">0</small>
						</p>
						</span>
						</a>
								
						</div>
						</span> 					
					</li>					
					<li>
						<span class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
						<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
						<a href="#" class="">
						<img style="float: left; margin: -4px 5px 0px -4px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
						<span class="menu-item-parent">
						<p class="small" style="color:gray;margin: -4px 0px 0px 0px;">
							<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
							<small style="font-size:28px; font-weight: bold;">0</small>
						</p>
						</span>
						</a>
								
						</div>
						</span> 					
					</li>					

					
				</ul>
			</nav>

		</aside>

		<!-- MAIN PANEL -->
		<div id="main" role="main">


			<!-- MAIN CONTENT -->
			<div id="content">

				<?php echo $__env->yieldContent('content'); ?>

			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
		<div class="page-footer" style="background: linear-gradient(to bottom, #000000, #434343); height:30px">
			<div class="row">
				<div class="col-xs-12 col-sm-12" style="margin: -8px 0px 0px 0px;">
					<center>
					<span class="txt-color-white"><?php echo "Copyright © " . (int)date('Y') . " - GT-1 (Global Terminal One)"; ?></span>
					</center>
				</div>
			</div>
		</div>
		<!-- END PAGE FOOTER -->

		
		<script type="text/javascript" src="<?=BASE_URL?>v152/jquery.min.js"></script>
		<script type="text/javascript" src="<?=BASE_URL?>v152/jquery.easyui.min.js"></script>	
	
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
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
		
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

</html><?php /**PATH D:\DEV_SERVER\htdocs\bridnins\coresys\views/layouts/masterdis.blade.php ENDPATH**/ ?>