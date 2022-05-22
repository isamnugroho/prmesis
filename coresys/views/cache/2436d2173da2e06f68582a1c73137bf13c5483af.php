<?php $__env->startSection('content'); ?>
	<link rel="stylesheet" href="<?=base_url()?>seipkon/assets/css/animate.min.css">
	<!-- Bootstrap CSS -->
	<!--Codehim Clock CSS-->
	<link rel="stylesheet" href="<?=base_url()?>seipkon/assets/css/codehim-clock.css" />
	<link rel="stylesheet" href="<?=base_url()?>seipkon/assets/css/jClocksGMT.css">
	
	<style>
		/*	start styles for the ContextMenu	*/
		.context_menu {
			background-color: #ebebeb;
			border: 1px solid black;
		}

		.context_menu_item {
			padding: 3px 6px;
		}

		.context_menu_item:hover {
			background-color: #CCCCCC;
		}

		.context_menu_separator {
			background-color: gray;
			height: 1px;
			margin: 0;
			padding: 0;
		}
		
		.controls {
			margin-top: 10px;
			border: 1px solid transparent;
			border-radius: 2px 0 0 2px;
			box-sizing: border-box;
			-moz-box-sizing: border-box;
			height: 40px;
			color: rgb(86, 86, 86);
			font-family: Roboto, Arial, sans-serif;
			-moz-user-select: none;
			font-size: 18px;
			background-color: rgb(255, 255, 255);
			padding: 0px 17px;
			border-bottom-right-radius: 2px;
			border-top-right-radius: 2px;
			background-clip: padding-box;
			box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px;
			min-width: 64px;
			border-left: 0px none;
			outline: currentcolor none medium;
		}
		
		#searchInput {
			background-color: #fff;
			font-family: Roboto;
			font-size: 15px;
			font-weight: 300;
			margin-left: 12px;
			padding: 0 11px 0 13px;
			text-overflow: ellipsis;
			width: 50%;
		}

		#searchInput:focus {
			border-color: #4d90fe;
		}

		ul#geoData {
			text-align: left;
			font-weight: bold;
			margin-top: 10px;
		}

		ul#geoData span {
			font-weight: normal;
		}
		
		.pac-container {
			z-index: 99999999 !important;
		}
		
		.fc-event, .fc-event-dot {
			background-color: white;
			border: 1px solid #3a87ad;
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
	article{
	  padding: 20px;
	  }
	}
	</style>

	<div class="jarviswidget" id="wid-id-5" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">

	<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
		<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>Standard Jam & Waktu </b></h2>
	</header>

	<div>

		<div class="widget-body" style="margin: -12px 0px 0px 0px;">
		   <div class="row">
			  <div class="widget-body">
				 <table class="table table-bordered table-condensed">
					<thead>
					   <tr>
						  <th style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%);color:gray;">Time Indicator</th>
						  <th style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%);color:gray;">Time Regional (Zona 3)</th>
					   </tr>
					</thead>
					<tbody>
					   <tr>
						  <td style="background: linear-gradient(to bottom, #000000, #434343);width:560px;">
							 <div class="widget_card_body">
								<div class="clock-place" style="margin: 10px 0px 0px 0px;"></div>
							 </div>
							 <p id="clock_wib" style="margin: 10px 0px 0px 10px;"></p>
							 <p id="clock_wita" style="margin: 10px 0px 0px -60px;"></p>
							 <p id="clock_wit" style="margin: 10px 0px 0px -60px;"></p>
						  </td>
						  
						  <td style="background: #ffffff">
						  
							<div class="panel" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); color;white; height:55px;">
								<div class="panel-heading">
									<a href="#" class="">
									<img style="float: left; margin: -4px 10px 0px -5px;" src="<?=base_url()?>assets/img/timecal.png" height="40" width="40" />
									<span class="menu-item-parent">
									<p class="small" style="float:left;color:gray;font-size:16px; font-weight: bold;margin: -5px 0px 0px 0px;">Time & Date (WIB)</p><br>
									<p class="small" style="margin: -5px 0px 0px 0px;">
										
										<small style="color:gray;font-size:24px; font-weight: bold;">
										<b id="Date" style="color:gray;font-size:22px; margin: 0px 0px 0px 0px;">
										01 January 2021
										</b>
										<b id="hours" style="color:gray;font-size:22px;">00</b>
										<b id="point" style="color:gray;font-size:22px;">:</b>
										<b id="min" style="color:gray;font-size:22px;">00</b>
										<b id="point" style="color:gray;font-size:22px;">:</b>
										<b id="sec" style="color:gray;font-size:22px;">00</b>
										
										</small>
									</p>
									</span>
									</a>
								</div>
							</div>
										
							 <div class="panel-group smart-accordion-default" id="accordion" style="margin: -14px 0px 0px 0px;">
								<div class="panel panel-default">
								   <div class="panel-heading" style="height:30px;background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
									  <h4 class="panel-title">
										 <a data-toggle="collapse" data-parent="#accordion" href="#dps">
											<i class="fa fa-lg fa-angle-down pull-right"></i>
											<i class="fa fa-lg fa-angle-up pull-right"></i>
											<p class="small" style="margin: -2px 0px 0px -5px;">
											   <small style="color:white;font-size:14px;  font-weight: bold;">Wilayah Denpasar</small>
											</p>
										 </a>
									  </h4>
								   </div>
								   <div id="dps" class="panel-collapse collapse in">
									  <div class="panel-body no-padding">
									  <div class="panel" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); color;white; height:55px;">
								<div class="panel-heading">
									<a href="#" class="">
									<img style="float: left; margin: -4px 10px 0px -5px;" src="<?=base_url()?>assets/img/timecal.png" height="40" width="40" />
									<span class="menu-item-parent">
									<p class="small" style="float:left;color:gray;font-size:16px; font-weight: bold;margin: -5px 0px 0px 0px;">Time & Date (WIB)</p><br>
									<p class="small" style="margin: -5px 0px 0px 0px;">
										
										<small style="color:gray;font-size:24px; font-weight: bold;">
										<b id="Date" style="color:gray;font-size:22px; margin: 0px 0px 0px 0px;">
										01 January 2021
										</b>
										<b id="hours" style="color:gray;font-size:22px;">00</b>
										<b id="point" style="color:gray;font-size:22px;">:</b>
										<b id="min" style="color:gray;font-size:22px;">00</b>
										<b id="point" style="color:gray;font-size:22px;">:</b>
										<b id="sec" style="color:gray;font-size:22px;">00</b>
										
										</small>
									</p>
									</span>
									</a>
								</div>
							</div>
							
									  
										 <table class="table table-bordered table-condensed">
											<thead>
											   <tr>
												  <th>Grid Name/Information</th>
												  <th>View</th>
											   </tr>
											</thead>
											<tbody>
											   <tr>
												  <td>
													 <p id="demo"></p>
													 <script>
														var d = new Date();
														document.getElementById("demo").innerHTML = d.toString();
													 </script>
												  </td>
												  <td>
													 <img style="margin: -5px 0px 0px 0px;" src="
														<?=base_url()?>assets/img/clean.png" height="15" width="15" />
												  </td>
											   </tr>
											</tbody>
										 </table>
									  </div>
								   </div>
								</div>
								<div class="panel panel-default">
								   <div class="panel-heading" style="height:30px;background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
									  <h4 class="panel-title">
										 <a data-toggle="collapse" data-parent="#accordion" href="#jyp" class="collapsed">
											<i class="fa fa-lg fa-angle-down pull-right"></i>
											<i class="fa fa-lg fa-angle-up pull-right"></i>
											<p class="small" style="margin: -2px 0px 0px -5px;">
											   <small style="color:white;font-size:14px;  font-weight: bold;">Wilayah Jayapura</small>
											</p>
										 </a>
									  </h4>
								   </div>
								   <div id="jyp" class="panel-collapse collapse">
									  <div class="panel-body no-padding">
										 <table class="table table-bordered table-condensed">
											<thead>
											   <tr>
												  <th>Graph Name/Information</th>
												  <th>View</th>
											   </tr>
											</thead>
											<tbody>
											   <tr>
												  <td>Total Tickets Overall</td>
												  <td>
													 <img style="margin: -5px 0px 0px 0px;" src="
														<?=base_url()?>assets/img/clean.png" height="15" width="15" />
												  </td>
											   </tr>
											   <tr>
											   <tr>
												  <td>Tickets Open Today</td>
												  <td>
													 <img style="margin: -5px 0px 0px 0px;" src="
														<?=base_url()?>assets/img/clean.png" height="15" width="15" />
												  </td>
											   </tr>
											   <tr>
												  <td>Tickets Done Today</td>
												  <td>
													 <img style="margin: -5px 0px 0px 0px;" src="
														<?=base_url()?>assets/img/clean.png" height="15" width="15" />
												  </td>
											   </tr>
											   <tr>
												  <td>Tickets Pending Today</td>
												  <td>
													 <img style="margin: -5px 0px 0px 0px;" src="
														<?=base_url()?>assets/img/clean.png" height="15" width="15" />
												  </td>
											   </tr>
											</tbody>
										 </table>
									  </div>
								   </div>
								</div>
								<div class="panel panel-default">
								   <div class="panel-heading" style="height:30px;background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
									  <h4 class="panel-title">
										 <a data-toggle="collapse" data-parent="#accordion" href="#mks" class="collapsed">
											<i class="fa fa-lg fa-angle-down pull-right"></i>
											<i class="fa fa-lg fa-angle-up pull-right"></i>
											<p class="small" style="margin: -2px 0px 0px -5px;">
											   <small style="color:white;font-size:14px;  font-weight: bold;">Wilayah Makassar</small>
											</p>
										 </a>
									  </h4>
								   </div>
								   <div id="mks" class="panel-collapse collapse">
									  <div class="panel-body no-padding">
										 <table class="table table-bordered table-condensed">
											<thead>
											   <tr>
												  <th>Graph Name/Information</th>
												  <th>View</th>
											   </tr>
											</thead>
											<tbody>
											   <tr>
												  <td>Total Tickets Overall</td>
												  <td>
													 <img style="margin: -5px 0px 0px 0px;" src="
														<?=base_url()?>assets/img/clean.png" height="15" width="15" />
												  </td>
											   </tr>
											   <tr>
											   <tr>
												  <td>Tickets Open Today</td>
												  <td>
													 <img style="margin: -5px 0px 0px 0px;" src="
														<?=base_url()?>assets/img/clean.png" height="15" width="15" />
												  </td>
											   </tr>
											   <tr>
												  <td>Tickets Done Today</td>
												  <td>
													 <img style="margin: -5px 0px 0px 0px;" src="
														<?=base_url()?>assets/img/clean.png" height="15" width="15" />
												  </td>
											   </tr>
											   <tr>
												  <td>Tickets Pending Today</td>
												  <td>
													 <img style="margin: -5px 0px 0px 0px;" src="
														<?=base_url()?>assets/img/clean.png" height="15" width="15" />
												  </td>
											   </tr>
											</tbody>
										 </table>
									  </div>
								   </div>
								</div>
							 </div>
			  </div>
			  </td>
			  </tr>
			  </tbody>
			  <tfoot>
			  <tr>
			  <th colspan="7" style="background: linear-gradient(to bottom, #8e9eab, #eef2f3);color:black;height:1px;"></th>
			  </tr>
			  </tfoot>
			  </table>
				
			  <div class="tabbable tabs-below" style="margin: -10px 0px 0px 0px;">
				 <div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
					<header style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%);color:gray;height:30px;">
					   <h2 style="font-size:12px; font-weight: bold;">
						  <p class="small" style="margin: 8px 0px 0px 0px;">
							 <small style="color:gray;font-size:12px;  font-weight: bold;">Grid Information</small>
						  </p>
					   </h2>
					</header>
						<div class="row">
		<article class="col-sm-12">
			<div class="navbar navbar-default">
			<img style="float: left; margin: 10px 10px 0px 10px;" src="<?=base_url()?>assets/img/timecal.png" height="40" width="40" />
			<span>
				<p align="justify; margin: 10px 0px 0px 0px;">
					<small style="color:black;font-size:12px;">
					 <b style="color:black;font-size:18px;">Interval Perbedaan Regional Waktu WIB,WITA,WIT</b>
						  <br>
						  <small style="color:black;font-size:13px;">Standarisasi Waktu : (GMT+07:00,GMT+08:00,GMT+09:00)</small> 
					</small>
				</p>
			</span>
			</div>
		</article>
	</div>

				 </div>
			  </div>
		   </div>
		</div>
		</div>



	</div>
<!-- end widget div -->

</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>


<script src="<?=base_url()?>seipkon/assets/js/jquery.clock-wib.js"></script>
<script src="<?=base_url()?>seipkon/assets/js/jClocksGMT.js"></script>
<script src="<?=base_url()?>seipkon/assets/js/jquery.rotate.js"></script>

<script>
	$(document).ready(function(){

		$('#clock_wib').jClocksGMT(
		{
			title: 'W I B', 
			offset: '+7',
			skin: 5 
		});

		$('#clock_wita').jClocksGMT(
		{
			title: 'W I T A', 
			offset: '+8',
			skin: 5 
		});

		$('#clock_wit').jClocksGMT(
		{
			title: 'W I T', 
			offset: '+9',
			skin: 5 
		});


	});
</script>

<script>
$(document).ready(function(){ 
$(".clock-place").CodehimClockWIB({
 });
}); 

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV_SERVER\htdocs\bridnins\coresys\views/pages/master_stand_time/index.blade.php ENDPATH**/ ?>