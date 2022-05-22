@extends('layouts.masterdis')

@section('stylesheet')
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.5/css/scroller.dataTables.min.css">
@endsection


@section('content')


<section id="widget-grid" class="">

	<div class="row">
		<article class="col-xs-12 col-sm-12" style="margin: 0px 0px -60px 0px;">
			<!-- new widget -->
			<div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
			<header  style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%);">
				<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
				<h2>Dashboard System</h2>

				<ul class="nav nav-tabs pull-right in" id="myTab">
					<li class="active">
						<a data-toggle="tab" href="#s1">
						<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>assets/img/mn.png" height="14" width="14" />
						<span class="hidden-mobile hidden-tablet">CRM Reliability</span></a>
					</li>

				</ul>

			</header>
			
			<div class="panel-body no-padding">
				
				<table class="table table-bordered table-condensed">
					
					<tbody>
						<tr>
							<td style="background: #ffffff" width="20%">
							<div class="no-padding" style="margin: 0px 0px -25px 0px;">
								<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
									<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
										<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/mn.png" height="18" width="18" /> </span>
										<h2 style="color:white; margin: -2px 0px 0px 10px; font-weight: bold;">CRM Performance 
										</h2>
									</header>
									<div>
										<div class="widget-body no-padding">
											<center style="background: linear-gradient(to bottom, #8e9eab, #eef2f3);">
												<div class="widget-body no-padding">
													<link rel="stylesheet" href="<?=BASE_URL?>v153/radial/style.css">
													<div class="med">
														<div class="pie pie--value pie--disc" style="--percent:0;"></div>
														<div class="pie pie--value pie--disc" style="--percent:0;"></div>
														<div class="pie pie--value pie--disc" style="--percent:0;"></div>
													</div>
													<script src="<?=BASE_URL?>v153/radial/script.js"></script>
													<link rel="stylesheet" href="<?=BASE_URL?>v153/radial2/style.css">
												</div>
											</center>
											<table class="table table-bordered table-condensed" style="margin: -8px 0px 0px 0px;">
												<thead>
													<tr>
														<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;text-align:right;">Total Ticket</th>
														<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;text-align:center;">Ticket Pending</th>
														<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">Ticket Done</th>
													</tr>
												</thead>
											</table>
										</div>
									</div>
								</div>

							</div>
							<div class="no-padding" style="margin: 0px 0px -25px 0px;">
								<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
									<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
										<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/mn.png" height="18" width="18" /> </span>
										<h2 style="color:white; margin: -2px 0px 0px 10px; font-weight: bold;">CCTV Performance
										</h2>
									</header>
									<div>
										<div class="widget-body no-padding">
											<center style="background: linear-gradient(to bottom, #8e9eab, #eef2f3);">
												<div class="widget-body no-padding">
													<link rel="stylesheet" href="<?=BASE_URL?>v153/radial/style.css">
													<div class="med">
														<div class="pie pie--value pie--disc" style="--percent:0;"></div>
														<div class="pie pie--value pie--disc" style="--percent:0;"></div>
														<div class="pie pie--value pie--disc" style="--percent:0;"></div>
													</div>
													<script src="<?=BASE_URL?>v153/radial/script.js"></script>
													<link rel="stylesheet" href="<?=BASE_URL?>v153/radial2/style.css">
												</div>
											</center>
											<table class="table table-bordered table-condensed" style="margin: -8px 0px 0px 0px;">
												<thead>
													<tr>
														<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;text-align:right;">Total Ticket</th>
														<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;text-align:center;">Ticket Pending</th>
														<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">Ticket Done</th>
													</tr>
												</thead>
											</table>
										</div>
									</div>
								</div>

							</div>
							<div class="no-padding" style="margin: 0px 0px -25px 0px;">
								<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
									<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
										<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/mn.png" height="18" width="18" /> </span>
										<h2 style="color:white; margin: -2px 0px 0px 10px; font-weight: bold;">UPS Performance
										</h2>
									</header>
									<div>
										<div class="widget-body no-padding">
											<center style="background: linear-gradient(to bottom, #8e9eab, #eef2f3);">
												<div class="widget-body no-padding">
													<link rel="stylesheet" href="<?=BASE_URL?>v153/radial/style.css">
													<div class="med">
														<div class="pie pie--value pie--disc" style="--percent:0;"></div>
														<div class="pie pie--value pie--disc" style="--percent:0;"></div>
														<div class="pie pie--value pie--disc" style="--percent:0;"></div>
													</div>
													<script src="<?=BASE_URL?>v153/radial/script.js"></script>
													<link rel="stylesheet" href="<?=BASE_URL?>v153/radial2/style.css">
												</div>
											</center>
											<table class="table table-bordered table-condensed" style="margin: -8px 0px 0px 0px;">
												<thead>
													<tr>
														<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;text-align:right;">Total Ticket</th>
														<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;text-align:center;">Ticket Pending</th>
														<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">Ticket Done</th>
													</tr>
												</thead>
											</table>
										</div>
									</div>
								</div>

							</div>
							<div class="no-padding" style="margin: 0px 0px -25px 0px;">
								<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
									<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
										<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/mn.png" height="18" width="18" /> </span>
										<h2 style="color:white; margin: -2px 0px 0px 10px; font-weight: bold;">Cleaning Performance
										</h2>
									</header>
									<div>
										<div class="widget-body no-padding">
											<center style="background: linear-gradient(to bottom, #8e9eab, #eef2f3);">
												<div class="widget-body no-padding">
													<link rel="stylesheet" href="<?=BASE_URL?>v153/radial/style.css">
													<div class="med">
														<div class="pie pie--value pie--disc" style="--percent:0;"></div>
														<div class="pie pie--value pie--disc" style="--percent:0;"></div>
														<div class="pie pie--value pie--disc" style="--percent:0;"></div>
													</div>
													<script src="<?=BASE_URL?>v153/radial/script.js"></script>
													<link rel="stylesheet" href="<?=BASE_URL?>v153/radial2/style.css">
												</div>
											</center>
											<table class="table table-bordered table-condensed" style="margin: -8px 0px 0px 0px;">
												<thead>
													<tr>
														<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;text-align:right;">Total Ticket</th>
														<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;text-align:center;">Ticket Pending</th>
														<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">Ticket Done</th>
													</tr>
												</thead>
											</table>
										</div>
									</div>
								</div>

							</div>
							
							</td>
							<td style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);width:60%;">
							<div class="no-padding" style="margin: 0px 0px -25px 0px;">
								<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
									<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
										<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/mn.png" height="18" width="18" /> </span>
										<h2 style="color:white; margin: -2px 0px 0px 10px; font-weight: bold;">Cleaning Performance
										</h2>
									</header>
									<div>
										<div class="widget-body no-padding">
<div class="widget-body no-padding" style="margin: 10px 0px 0px 0px;">
										
										<div class="col-xs-12 col-sm-4 col-md-3" style="margin: -10px 0px 0px 0px;">
											<div class="panel zoomsmall" style="background: linear-gradient(to bottom, #f12711, #f5af19); color;white; height:55px;">
												<div class="panel-heading">
													<a href="#" class="">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/newticket.png" height="35" width="35" />
													<span class="menu-item-parent">
													<p class="small" style="color:white;">
														<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Tickets Overall</small><br>
														<small style="font-size:24px; font-weight: bold;"><?=$data_summary['total_ticket']?></small>
													</p>
													</span>
													</a>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-3" style="margin: -10px 0px 0px 0px;">
											<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #ff0844 0%, #ffb199 100%);color;white; height:55px;">
												<div class="panel-heading">
													<a href="#" class="">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/proman2.png" height="35" width="35" />
													<span class="menu-item-parent">
													<p class="small" style="">
														<small style="color:white;font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">All Ticket Closed</small><br>
														<small style="color:white;font-size:24px; font-weight: bold;"><?=$data_summary['total_ticket_done']?></small>
													</p>
													</span>
													</a>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-3" style="margin: -10px 0px 0px 0px;">
											<div class="panel zoomsmall" style="background: linear-gradient(to bottom, #e52d27, #b31217);color;white; height:55px;">
												<div class="panel-heading">
													<a href="#" class="">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/blackbook.png" height="35" width="35" />
													<span class="menu-item-parent">
													<p class="small" style="">
														<small style="color:white;font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">All Ticket Open</small><br>
														<small style="color:white;font-size:24px; font-weight: bold;"><?=$data_summary['total_ticket_open']?></small>
													</p>
													</span>
													</a>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-3" style="margin: -10px 0px 0px 0px;">
											<div class="panel zoomsmall" style="background: linear-gradient(to bottom, #3c3b3f, #605c3c);color;white; height:55px;">
												<div class="panel-heading">
													<a href="#" class="">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/blackbook.png" height="35" width="35" />
													<span class="menu-item-parent">
													<p class="small" style="">
														<small style="color:white;font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">All Ticket Pending</small><br>
														<small style="color:white;font-size:24px; font-weight: bold;"><?=$data_summary['total_ticket_pending']?></small>
													</p>
													</span>
													</a>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-3" style="margin: -10px 0px 0px 0px;">
											<div class="panel zoomsmall" style="background: linear-gradient(to bottom, #9d50bb, #6e48aa);color;white; height:55px;">
												<div class="panel-heading">
													<a href="#" class="">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/turntik.png" height="38" width="38" />
													<span class="menu-item-parent">
													<p class="small" style="">
														<small style="color:white;font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Tickets Today</small><br>
														<small style="color:white;font-size:24px; font-weight: bold;"><?=$data_summary['total_today_ticket']?></small>
													</p>
													</span>
													</a>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-3" style="margin: -10px 0px 0px 0px;">
											<div class="panel zoomsmall" style="background: linear-gradient(to top, #d31027, #ea384d);color;white; height:55px;">
												<div class="panel-heading">
													<a href="#" class="">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/tikopen.png" height="35" width="35" />
													<span class="menu-item-parent">
													<p class="small" style="">
														<small style="color:white;font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Tickets Open Today</small><br>
														<small style="color:white;font-size:24px; font-weight: bold;"><?=$data_summary['total_today_ticket_open']?></small>
													</p>
													</span>
													</a>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-3" style="margin: -10px 0px 0px 0px;">
											<div class="panel zoomsmall" style="background: linear-gradient(to bottom, #1d976c, #3bff84);color;white; height:55px;">
												<div class="panel-heading">
													<a href="#" class="">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/proman2.png" height="35" width="35" />
													<span class="menu-item-parent">
													<p class="small" style="">
														<small style="color:white;font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Tickets Done Today</small><br>
														<small style="color:white;font-size:24px; font-weight: bold;"><?=$data_summary['total_today_ticket_done']?></small>
													</p>
													</span>
													</a>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-3" style="margin: -10px 0px 0px 0px;">
											<div class="panel zoomsmall" style="background: linear-gradient(to top, #d31027, #ea384d);color;white; height:55px;">
												<div class="panel-heading">
													<a href="#" class="">
													<img style="float: left; margin: 0px 5px 0px -5px;" src="<?=base_url()?>assets/img/tikpending.png" height="35" width="35" />
													<span class="menu-item-parent">
													<p class="small" style="">
														<small style="color:white;font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Tickets Pending Today</small><br>
														<small style="color:white;font-size:24px; font-weight: bold;"><?=$data_summary['total_today_ticket_pending']?></small>
													</p>
													</span>
													</a>
												</div>
											</div>
										</div>
									</div>
								
										<table class="table table-bordered table-condensed" style="margin: -8px 0px 0px 0px;">
											<thead>
												<tr>
													<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;text-align:right;">Total Ticket</th>
													<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;text-align:center;">Ticket Pending</th>
													<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">Ticket Done</th>
												</tr>
											</thead>
										</table>
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
			</div>
									
			</div>
			<!-- end widget -->

		</article>
	</div>

</section>
@endsection


@section('javascript')

  <script src="<?=BASE_URL?>chartnew/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="<?=BASE_URL?>assets/js/pace.min.js"></script>
  <script src="<?=BASE_URL?>chartnew/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="<?=BASE_URL?>chartnew/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="<?=BASE_URL?>chartnew/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
  


	<script src="<?=BASE_URL?>js/plugin/morris/raphael.min.js"></script>
	<script src="<?=BASE_URL?>js/plugin/morris/morris.min.js"></script>


	<!-- PAGE RELATED PLUGIN(S) -->
	<script src="<?=BASE_URL?>js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
	<script src="<?=BASE_URL?>js/plugin/fuelux/wizard/wizard.min.js"></script>
	
	
	<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/scroller/2.0.5/js/dataTables.scroller.min.js"></script>
	
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBNYm2qInIVWeNLEUtYsMqiaOhjsynyFAY&libraries=places"></script>

	<script>	
	
	let map;
	var geocoder;
	var marker;
	
	function initializes() {
		geocoder = new google.maps.Geocoder();
		geocoder.geocode( { 'address': "DENPASAR"}, function(results, status) {
			if (status == 'OK') {
				console.log(results[0].geometry.location.lat()+" "+results[0].geometry.location.lng())
				var prop = {
					center: new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()),
					zoom: 12,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				map = new google.maps.Map($('#w3docs-map')[0], prop);
				
			
				marker = new google.maps.Marker({
					map: map
				});
				
				$('#w3docs-map').show();
			} else {
				alert('Geocode was not successful for the following reason: ' + status);
			}
		});
		
	}
	
	initializes();
	
	var ctx = document.getElementById('barChart').getContext('2d');
	var chartHome = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI', 'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER'],
			datasets: [{
				label: '# of Open Ticket',
				data: [0, 0, 0, 0, 0, 0, 0, 0, 10],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
				],
				borderWidth: 1
			}, {
				label: '# of Closed Ticket',
				data: [12, 19, 3, 5, 2, 3, 3, 5, 3],
				backgroundColor: [
					'rgba(54, 162, 235, 0.2)',
				],
				borderColor: [
					'rgba(54, 162, 235, 1)',
				],
				borderWidth: 1
			}]
		},
		options: {
			responsive: true,
			plugins: {
				legend: {
					display: true,
				}
			}
		}
	});
	
	function findThis(alamat, idatm) {
		// console.log(alamat);
		// console.log(idatm);
		if(map!==undefined) {
			geocoder.geocode({'address': alamat}, function(results, status) {
				if (status == 'OK') {
					map.setCenter(results[0].geometry.location);
					marker.setPosition(results[0].geometry.location);

				} else {
					alert('Geocode was not successful for the following reason: ' + status);
				}
			});
		}
		
		show_detail(idatm);
	}
	
	var myChart;
	var data_json;
	var data_json2;
	function findThis2(url, idatm) {
		console.log(idatm);
		
		$.ajax({
			url: url,
			dataType: 'html',
			timeout: 3000,
		}).done(function (response) {
			data_json = JSON.parse(response);
			generate_graph(data_json)
		}).fail(function(){
			self.hideLoading();
			$.alert('Something went wrong.');
		});
		
		show_detail_trans(idatm)
	}
	
		
	var Util = {
		color : {
			backgroundColor : {
				'red' : 'rgba(54, 162, 235, 0.2)',
				'blue' : 'rgba(255, 99, 132, 0.2)',
			},
			borderColor : {
				'red' : 'rgba(54, 162, 235, 1)',
				'blue' : 'rgba(255, 99, 132, 1)',
			}
		}
	};
	
	function show_detail(id_atm) {
		var base_url = "<?php echo base_url();?>";
		$.ajax({
			url: base_url + 'dashboard/detail_atm/'+id_atm,
			dataType: 'html',
			timeout: 3000,
		}).done(function (response) {
			// console.log(response);
			$("#detail_info_atm").html(response)
		}).fail(function(){
			self.hideLoading();
			$.alert('Something went wrong.');
		});
	}
	
	function show_detail_trans(id_atm) {
		var base_url = "<?php echo base_url();?>";
		$.ajax({
			url: base_url + 'dashboard/detail_trans_atm/'+id_atm,
			dataType: 'html',
			timeout: 3000,
		}).done(function (response) {
			// console.log(response);
			$("#detail_trans_atm").html(response)
		}).fail(function(){
			self.hideLoading();
			$.alert('Something went wrong.');
		});
	}
	
	function generate_graph(data_json) {
		const getOrCreateLegendList = (chart, id) => {
		  const legendContainer = document.getElementById(id);
		  let listContainer = legendContainer.querySelector('ul');

		  if (!listContainer) {
			listContainer = document.createElement('ul');
			listContainer.style.display = 'flex';
			listContainer.style.flexDirection = 'row';
			listContainer.style.margin = 0;
			listContainer.style.padding = 0;

			legendContainer.appendChild(listContainer);
		  }

		  return listContainer;
		};
		
		const htmlLegendPlugin = {
		  id: 'htmlLegend',
		  afterUpdate(chart, args, options) {
			const ul = getOrCreateLegendList(chart, options.containerID);

			// Remove old legend items
			while (ul.firstChild) {
			  ul.firstChild.remove();
			}

			// Reuse the built-in legendItems generator
			const items = chart.options.plugins.legend.labels.generateLabels(chart);

			items.forEach(item => {
			  const li = document.createElement('li');
			  li.style.alignItems = 'center';
			  li.style.cursor = 'pointer';
			  li.style.display = 'flex';
			  li.style.flexDirection = 'row';
			  li.style.marginLeft = '10px';

			  li.onclick = () => {
				const {type} = chart.config;
				if (type === 'pie' || type === 'doughnut') {
				  // Pie and doughnut charts only have a single dataset and visibility is per item
				  chart.toggleDataVisibility(item.index);
				} else {
				  chart.setDatasetVisibility(item.datasetIndex, !chart.isDatasetVisible(item.datasetIndex));
				}
				chart.update();
			  };

			  // Color box
			  const boxSpan = document.createElement('span');
			  boxSpan.style.background = item.fillStyle;
			  boxSpan.style.borderColor = item.strokeStyle;
			  boxSpan.style.borderWidth = item.lineWidth + 'px';
			  boxSpan.style.display = 'inline-block';
			  boxSpan.style.height = '20px';
			  boxSpan.style.marginRight = '10px';
			  boxSpan.style.width = '20px';

			  // Text
			  const textContainer = document.createElement('p');
			  textContainer.style.color = item.fontColor;
			  textContainer.style.margin = 0;
			  textContainer.style.padding = 0;
			  textContainer.style.textDecoration = item.hidden ? 'line-through' : '';

			  const text = document.createTextNode(item.text);
			  textContainer.appendChild(text);

			  li.appendChild(boxSpan);
			  li.appendChild(textContainer);
			  ul.appendChild(li);
			});
		  }
		};
		
		if (myChart == undefined) {
			var ctx = document.getElementById('barChart2').getContext('2d');
			myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ['CASSETTE 1', 'CASSETTE 2', 'CASSETTE 3', 'CASSETTE 4', 'MIX', 'REJECT'],
					datasets: data_json
				},
				options: {
					responsive: true,
					scales: {
					  x: {
						stacked: true,
					  },
					  y: {
						stacked: true
					  }
					},
					plugins: {
						htmlLegend: {
							containerID: 'legend-container',
						},
						legend: {
							display: false,
						}
					}
				},
				plugins: [htmlLegendPlugin]
			});
		} else {
			myChart.destroy();
			var ctx = document.getElementById('barChart2').getContext('2d');
			myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ['CASSETTE 1', 'CASSETTE 2', 'CASSETTE 3', 'CASSETTE 4', 'MIX', 'REJECT'],
					datasets: data_json
				},
				options: {
					responsive: true,
					scales: {
					  x: {
						stacked: true,
					  },
					  y: {
						stacked: true
					  }
					},
					plugins: {
						htmlLegend: {
							containerID: 'legend-container',
						},
						legend: {
							display: false,
						}
					}
				},
				plugins: [htmlLegendPlugin]
			});
		}
	}
	
	var table_arr = {};
	function openTable(kanwil) {
		
		if(map!==undefined) {
			geocoder.geocode({'address': kanwil}, function(results, status) {
				if (status == 'OK') {
					map.setCenter(results[0].geometry.location);
				} else {
					alert('Geocode was not successful for the following reason: ' + status);
				}
			});
		}
		
		if (table_arr[kanwil] == undefined) {
			var base_url = "<?php echo base_url();?>";
			table_arr[kanwil] = $('#example'+kanwil).DataTable({
				serverSide: true,
				ordering: false,
				searching: true,
				ajax: {
					url :  base_url + 'dashboard/crm_live_status/'+kanwil,
					type : 'POST',
					dataFilter: function(data) {
						// console.log(data);
						var json = jQuery.parseJSON( data );
						json.recordsTotal = json.recordsTotal;
						json.recordsFiltered = json.recordsFiltered;
						json.data = json.data;

						return JSON.stringify( json );
					}
				},
				scrollY: 200,
				scroller: {
					loadingIndicator: true
				},
			});
		}
	}

	var table_arr2 = {};
	function openTable2(kanwil) {
		if (table_arr2[kanwil] == undefined) {
			var base_url = "<?php echo base_url();?>";
			table_arr2[kanwil] = $('#example2'+kanwil).DataTable({
				serverSide: true,
				ordering: false,
				searching: true,
				ajax: {
					url :  base_url + 'dashboard/crm_trans_status/'+kanwil,
					type : 'POST',
					dataFilter: function(data) {
						// console.log(data);
						var json = jQuery.parseJSON( data );
						
						findThis2(json.data[0][3], json.data[0][2]);
						
						json.recordsTotal = json.recordsTotal;
						json.recordsFiltered = json.recordsFiltered;
						json.data = json.data;

						return JSON.stringify( json );
					}
				},
				scrollY: 200,
				scroller: {
					loadingIndicator: true
				},
			});
		}
	}
	
	openTable('DENPASAR');
	openTable2('DENPASAR');
	
	$(document).ready(function()
	{
		
		var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
		var dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]

		// Create a newDate() object
		var newDate = new Date();
		// Extract the current date from Date object
		newDate.setDate(newDate.getDate());
		// Output the day, date, month and year    
		$('#Date').html(newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

		setInterval(function() {
			// Create a newDate() object and extract the seconds of the current time on the visitor's
			var seconds = new Date().getSeconds();
			// Add a leading zero to seconds value
			$("#sec").html((seconds < 10 ? "0" : "") + seconds);
		}, 1000);

		setInterval(function() {
			// Create a newDate() object and extract the minutes of the current time on the visitor's
			var minutes = new Date().getMinutes();
			// Add a leading zero to the minutes value
			$("#min").html((minutes < 10 ? "0" : "") + minutes);
		}, 1000);

		setInterval(function() {
			// Create a newDate() object and extract the hours of the current time on the visitor's
			var hours = new Date().getHours();
			// Add a leading zero to the hours value
			$("#hours").html((hours < 10 ? "0" : "") + hours);
		}, 1000);
	});

	</script>
	<script>
	var dataset = [
        { name: 'OPEN', percent: parseInt("<?=$data_summary['persen_open']?>") },
        { name: 'CLOSE', percent: parseInt("<?=$data_summary['persen_done']?>") },
        { name: 'PENDING', percent: parseInt("<?=$data_summary['persen_pending']?>") }
    ];

    var pie=d3.layout.pie()
            .value(function(d){return d.percent})
            .sort(null)
            .padAngle(.03);

    var w=300,h=300;

    var outerRadius=w/2;
    var innerRadius=100;

    var color = d3.scale.category10();

    var arc=d3.svg.arc()
            .outerRadius(outerRadius)
            .innerRadius(innerRadius);

    var svg=d3.select("#chart")
            .append("svg")
            .attr({
                width:w,
                height:h,
                class:'shadow'
            }).append('g')
            .attr({
                transform:'translate('+w/2+','+h/2+')'
            });
    var path=svg.selectAll('path')
            .data(pie(dataset))
            .enter()
            .append('path')
            .attr({
                d:arc,
                fill:function(d,i){
                    return color(d.data.name);
                }
            });

    path.transition()
            .duration(1000)
            .attrTween('d', function(d) {
                var interpolate = d3.interpolate({startAngle: 0, endAngle: 0}, d);
                return function(t) {
                    return arc(interpolate(t));
                };
            });


    var restOfTheData=function(){
        var text=svg.selectAll('text')
                .data(pie(dataset))
                .enter()
                .append("text")
                .transition()
                .duration(200)
                .attr("transform", function (d) {
                    return "translate(" + arc.centroid(d) + ")";
                })
                .attr("dy", ".4em")
                .attr("text-anchor", "middle")
                .text(function(d){
                    return d.data.percent+"%";
                })
                .style({
                    fill:'#fff',
                    'font-size':'10px'
                });

        var legendRectSize=20;
        var legendSpacing=7;
        var legendHeight=legendRectSize+legendSpacing;


        var legend=svg.selectAll('.legend')
                .data(color.domain())
                .enter()
                .append('g')
                .attr({
                    class:'legend',
                    transform:function(d,i){
                        //Just a calculation for x & y position
                        return 'translate(-35,' + ((i*legendHeight)-65) + ')';
                    }
                });
        legend.append('rect')
                .attr({
                    width:legendRectSize,
                    height:legendRectSize,
                    rx:20,
                    ry:20
                })
                .style({
                    fill:color,
                    stroke:color
                });

        legend.append('text')
                .attr({
                    x:30,
                    y:15
                })
                .text(function(d){
                    return d;
                }).style({
                    fill:'#929DAF',
                    'font-size':'14px'
                });
    };

    setTimeout(restOfTheData,1000);
	</script>

	<script type="text/javascript">
		/* DO NOT REMOVE : GLOBAL FUNCTIONS!
		 *
		 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
		 *
		 * // activate tooltips
		 * $("[rel=tooltip]").tooltip();
		 *
		 * // activate popovers
		 * $("[rel=popover]").popover();
		 *
		 * // activate popovers with hover states
		 * $("[rel=popover-hover]").popover({ trigger: "hover" });
		 *
		 * // activate inline charts
		 * runAllCharts();
		 *
		 * // setup widgets
		 * setup_widgets_desktop();
		 *
		 * // run form elements
		 * runAllForms();
		 *
		 ********************************
		 *
		 * pageSetUp() is needed whenever you load a page.
		 * It initializes and checks for all basic elements of the page
		 * and makes rendering easier.
		 *
		 */

		var flot_updating_chart, flot_statsChart, flot_multigraph, calendar;

		pageSetUp();
		
		
		/*
		 * PAGE RELATED SCRIPTS
		 */

		// pagefunction
		
		var pagefunction = function() {
			
			/*
			 * RUN PAGE GRAPHS
			 */
			 
			if ($('#donut-graph').length) {
				var chart, data;
				$.get('<?=base_url()?>dashboard/get_donut_data', function(data) {
					data = JSON.parse(data);
					
					chart = Morris.Donut({
						element : 'donut-graph',
						data : data,
						formatter : function(x) {
							return x + "Unit"
						}
					});
				
					chart.segments.forEach(function(segment){
						console.log(segment.color,segment.data);
						var legendText = segment.data.label+" ("+segment.data.value+")";
						var legendColor = segment.color;
						var legendItem = $('<li style=""></li>').text(legendText).css('color', 'black');
						var legendColorDot = $('<span></span>').html("&#9632; ").addClass('colorDot').css('color', legendColor);
						$(legendItem).prepend(legendColorDot)
						$('#legend').append(legendItem);
					});
				});
			}

			// load all flot plugins
			loadScript("<?=BASE_URL?>js/plugin/flot/jquery.flot.cust.min.js", function(){
				loadScript("<?=BASE_URL?>js/plugin/flot/jquery.flot.resize.min.js", function(){
					loadScript("<?=BASE_URL?>js/plugin/flot/jquery.flot.fillbetween.min.js", function(){
						loadScript("<?=BASE_URL?>js/plugin/flot/jquery.flot.orderBar.min.js", function(){
							loadScript("<?=BASE_URL?>js/plugin/flot/jquery.flot.pie.min.js", function(){
								loadScript("<?=BASE_URL?>js/plugin/flot/jquery.flot.time.min.js", function(){
									loadScript("<?=BASE_URL?>js/plugin/flot/jquery.flot.tooltip.min.js", generatePageGraphs);
								});
							});
						});
					});
				});
			});

			
			function generatePageGraphs() {
				// TAB THREE GRAPH //
				/* TAB 3: Revenew  */
				
				
			
				$(function () {
					
					/* chart colors default */
					var $chrt_border_color = "#efefef";
					var $chrt_grid_color = "#DDD"
					var $chrt_main = "#E24913";
					/* red       */
					var $chrt_second = "#6595b4";
					/* blue      */
					var $chrt_third = "#FF9F01";
					/* orange    */
					var $chrt_fourth = "#7e9d3a";
					/* green     */
					var $chrt_fifth = "#BD362F";
					/* dark red  */
					var $chrt_mono = "#000";
					
					var trgt,
						prft,
						sgnups,
						toggles = $("#rev-toggles"),
						target = $("#flotcontainer");
						
					$.get('<?=base_url()?>dashboard/get_graph', function(data) {
						var data = JSON.parse(data)
						trgt = data.total;
						prft = data.open;
						sgnups = data.pending;
						sgnups2 = data.done;
						
						var data = [{
							label: "OPEN TICKET",
							data: prft,
							bars : {
								show : true,
								barWidth : 30 * 60 * 1000 * 30 * 10,
								order : 2
							}
						}, {
							label: "PENDING TICKET",
							data: sgnups,
							bars : {
								show : true,
								barWidth : 30 * 60 * 1000 * 30 * 10,
								order : 3
							}
						}, {
							label: "CLOSED TICKET",
							data: sgnups2,
							bars : {
								show : true,
								barWidth : 30 * 60 * 1000 * 30 * 10,
								order : 4
							}
						}];
				
						var options = {
							colors : [$chrt_second, $chrt_fourth, "#666", "#BBB", "#BBB"],
							grid : {
								show : true,
								hoverable : true,
								clickable : true,
								tickColor : $chrt_border_color,
								borderWidth : 0,
								borderColor : $chrt_border_color,
							},
							xaxis : {
								mode : "time",
								dateFormat: '%b %y',
							},
							yaxis : {
								max: 10,
								min: 0
							},
							legend : true,
							tooltip : true,
							tooltipOpts : {
								content : "<b>%s</b> on <b>%x</b> was <b>%y</b>",
								dateFormat: '%b %y',
								defaultTheme : false
							}

						};
						
						// // var data1 = [];
					// // for (var i = 0; i <= 12; i += 1)
						// // data1.push([i, parseInt(Math.random() * 30)]);

					// // var data2 = [];
					// // for (var i = 0; i <= 12; i += 1)
						// // data2.push([i, parseInt(Math.random() * 30)]);

					// // var data3 = [];
					// // for (var i = 0; i <= 12; i += 1)
						// // data3.push([i, parseInt(Math.random() * 30)]);

					// // var ds = new Array();

					// // ds.push({
						// // data : data1,
						// // bars : {
							// // show : true,
							// // barWidth : 0.2,
							// // order : 1,
						// // }
					// // });
					// // ds.push({
						// // data : data2,
						// // bars : {
							// // show : true,
							// // barWidth : 0.2,
							// // order : 2
						// // }
					// // });
					// // ds.push({
						// // data : data3,
						// // bars : {
							// // show : true,
							// // barWidth : 0.2,
							// // order : 3
						// // }
					// // });

					// //Display graph
					// $.plot(target, ds, {
						// colors : [$chrt_second, $chrt_fourth, "#666", "#BBB"],
						// grid : {
							// show : true,
							// hoverable : true,
							// clickable : true,
							// tickColor : $chrt_border_color,
							// borderWidth : 0,
							// borderColor : $chrt_border_color,
						// },
						// legend : true,
						// tooltip : true,
						// tooltipOpts : {
							// content : "<b>%x</b> = <span>%y</span>",
							// defaultTheme : false
						// }
					// });
						
				
						flot_multigraph = null;
				
						function plotNow() {
							var d = [];
							toggles.find(':checkbox').each(function () {
								if ($(this).is(':checked')) {
									d.push(data[$(this).attr("name").substr(4, 1)]);
								}
							});
							if (d.length > 0) {
								if (flot_multigraph) {
									flot_multigraph.setData(d);
									flot_multigraph.draw();
								} else {
									flot_multigraph = $.plot(target, d, options);
								}
							}
				
						};
				
						toggles.find(':checkbox').on('change', function () {
							plotNow();
						});

						plotNow()
					});
				});
			
			}
		
		};
		
		// end pagefunction

		// destroy generated instances 
		// pagedestroy is called automatically before loading a new page
		// only usable in AJAX version!

		var pagedestroy = function(){
			
			// destroy calendar
			calendar.fullCalendar('destroy');
			calendar = null;

			//destroy flots
			flot_updating_chart.shutdown();  
			flot_updating_chart=null;
			flot_statsChart.shutdown(); 
			flot_statsChart = null;

			flot_multigraph.shutdown(); 
			flot_multigraph = null;

			// destroy vector map objects
			$('#vector-map').find('*').addBack().off().remove();

			// destroy todo
			$("#sortable1, #sortable2").sortable("destroy");
			$('.todo .checkbox > input[type="checkbox"]').off();

			// destroy misc events
			$("#rev-toggles").find(':checkbox').off();
			$('#chat-container').find('*').addBack().off().remove();

			// debug msg
			if (debugState){
				root.console.log("✔ Calendar, Flot Charts, Vector map, misc events destroyed");
			} 

		}

		// end destroy
		
		// run pagefunction on load
		pagefunction();
		
		
	</script>

@endsection