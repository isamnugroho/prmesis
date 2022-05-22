<?php $__env->startSection('stylesheet'); ?>
<style>

#leds {
  -webkit-transform: translate(-50%, -50%);
  -khtml-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-border-radius: 5px;
  -khtml-border-radius: 5px;
  -moz-border-radius: 5px;
  -ms-border-radius: 5px;
  -o-border-radius: 5px;
  border-radius: 5px;
  -webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5), 0px 0px 5px rgba(255, 255, 255, 0.1) inset;
  -khtml-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5), 0px 0px 5px rgba(255, 255, 255, 0.1) inset;
  -moz-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5), 0px 0px 5px rgba(255, 255, 255, 0.1) inset;
  -ms-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5), 0px 0px 5px rgba(255, 255, 255, 0.1) inset;
  -o-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5), 0px 0px 5px rgba(255, 255, 255, 0.1) inset;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5), 0px 0px 5px rgba(255, 255, 255, 0.1) inset;
  width: 40px;
  padding: 5px;
  padding-bottom: 2px;
  background: #111;
  background: -webkit-linear-gradient(190deg, #111, #191919, #111);
  background: -khtml-linear-gradient(190deg, #111, #191919, #111);
  background: -moz-linear-gradient(190deg, #111, #191919, #111);
  background: -ms-linear-gradient(190deg, #111, #191919, #111);
  background: -o-linear-gradient(190deg, #111, #191919, #111);
  background: linear-gradient(190deg, #111, #191919, #111);
}
#leds div.led {
  -webkit-border-radius: 50%;
  -khtml-border-radius: 50%;
  -moz-border-radius: 50%;
  -ms-border-radius: 50%;
  -o-border-radius: 50%;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  display: inline-block;
}
#leds div.led.green {
  background-color: #00ff00;
}
#leds div.led.green.off {
  -webkit-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -khtml-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -moz-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -ms-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -o-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  background-color: #005700;
  transition: all 0.1s linear;
}
#leds div.led.red {
  background-color: #ff0000;

}
#leds div.led.red.off {
  -webkit-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -khtml-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -moz-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -ms-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -o-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  background-color: #570000;
  transition: all 0.1s linear;
}

#leds div.led.orange {
  background-color: #ff8000;

}
#leds div.led.orange.off {
  -webkit-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -khtml-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -moz-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -ms-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -o-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  background-color: #570000;
  transition: all 0.1s linear;
}

.highcharts-figure, .highcharts-data-table table {
  min-width: 320px; 
  max-width: 800px;
  margin: 1em auto;
}


#containerXX {
  height: 200px;
  width: 99%;
}
#containerX {
  height: 215px;
  width: 100%;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
}

</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Widget ID (each widget will need unique ID)-->
<div class="jarviswidget" id="wid-id-5" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">

<header style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);">
<span class="widget-icon"><img style="float: left; margin: 8px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/filerack.png" height="18" width="18" /></span>
	<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>File Directory System</b></h2>
</header>
<!-- widget div-->
<div>

<!-- widget edit box -->
<div class="jarviswidget-editbox">
<!-- This area used as dropdown edit box -->

</div>
<!-- end widget edit box -->

<!-- widget content -->
<div class="widget-body">
	<div class="easyui-layout" style="width:100%;height:950px;">
		<div data-options="region:'north'" title="Statistics & Traffic Main Server"  style="height:320px">
			<table style="margin-left : 10px; margin-top : 10px; width: 80%">
				<tr>
					<th width="130px">CPU Usage</th>
					<td width="10px"> : </td>
					<td> <span id="html_cpu_usage"></span> </td>
				</tr>
				<tr>
					<th>Memory</th>
					<td> : </td>
					<td> <span id="html_memory_usage"></span> </td>
				</tr>
			</table>
			<b><center><h4>SERVER CPU MONITOR</h4></center></b>
			<div id="containerXX">
				<div class='grid_12 invoice_title'>
				<center><img src='<?=base_url()?>assets/corelay/img/logo-o.png' width='90' height='70' style="margin: 10px 0px 0px 0px;">
				</center>
				<center>
				<small align='center' style="color:black;font-size:20px; margin: 0px 0px 0px 0px; font-weight: bold;">GT-ONE INTEGRATED MONITORING SYSTEM</small>
				<br><p style="color:black;font-size:16px; margin: 0px 0px 0px 0px;">FILE DIRECTORY ATM</p></center>
				</div>
			</div>
		</div>
		<div data-options="region:'west',split:true" title="List Directory ATM" style="height:1250px; width:210px;">
			
			<nav>
				<ul>
					<?php 
						foreach($blok as $row) { ?>
							<li <?php if($active_blok==$row->id_blok) { echo 'class="active"'; } ?> style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
								<a href="#" class="zoomsmall">
									<img style="float: left; margin: 0px 10px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/atm2.png" height="28" width="28" />
									<span class="menu-item-parent">
										<p class="small" style="">
											<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;"><?=$row->name_blok?></small><br>
											<small style="color:white;font-size:10px;"><?=$row->range_client?></small>
										</p>
									</span>
								</a>
								<ul>
									<?php 
										foreach($get_client($row->id_blok) as $r) {  ?>
											<li <?php if($active_atm==$r->id_client) { echo 'class="active"'; } ?>>
												<a href="<?=base_url()?>master_fds?id_blok=<?=$r->id_blok?>&id_atm=<?=$r->id_client?>">
												<img style="float: left; margin: 3px 5px 0px -10px;" src="<?=base_url()?>seipkon/assets/img/atm2.png" width="15" height="15">
												<?=$r->name_client?></a>
											</li>
									<?php
										} ?>
								</ul>
							</li>
					<?php
						} ?>
				</ul>
			</nav>

		</div>
		<div data-options="region:'center',title:'Detail File Directory ATM'">
		<?php 
			if(is_numeric($active_atm)) {
		?>
		<?php 
			$no = 0;
			foreach($get_data_client($active_atm) as $r) {
				$no++;
				if($no==1) {
					$active = 'active';
				} else {
					$active = '';	
				}
		?>
			<div>
				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<!-- This area used as dropdown edit box -->
				</div>
				<!-- end widget edit box -->

				<!-- widget content -->
				<div class="widget-body">
					<div class="panel-group smart-accordion-default" id="accordion<?=$no?>">
						<div class="panel panel-default">
							<div class="panel-heading" style="background-image: linear-gradient( 171.8deg, rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
								<h4 class="panel-title" style="height:45px"><a data-toggle="collapse" data-parent="#accordion<?=$no?>" href="#c<?=$r->id_client?><?=$no+1?>"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right" style="color:;font-size:20px;"></i>
								<img style="float: left; margin: -3px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/folinfo.png" height="25" width="25" />
								<p class="small" style="margin: -2px 0px 0px 0px;">
									<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">Directory Properties</small><br>
									<small style="color:white;font-size:12px;">Identity : <?=$r->name_client?></small>
								</p>
								</a></h4>
							</div>
							<div id="c<?=$r->id_client?><?=$no+1?>" class="panel-collapse collapse in">
								<div class="panel-body">
									<div class="well">
										<div class="row">

											<div class="col-sm-4">
											
												<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
													<header style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );color:white;">
														<h2><strong><?=$r->name_client?></strong></h2>

														<div class="widget-toolbar" id="">
															<span>ID ATM : <?=$r->id_client?></span>
														</div>
													</header>

													<!-- widget div-->
													<div style="height:80px;">

														<!-- widget content -->
														<div class="widget-body">
															<h4 class="alert alert-info">
																<p class="small" style="">
																	<small style="color:black;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">IP Host ATM</small><br>
																	<small style="color:black;font-size:12px;"><?=$r->ip_client?></small>
																</p>
																<div id="leds" style="float:right; margin: -14px -25px 0px 0px; ">
																	<div class="led <?=($r->status_client=="ONLINE" ? "green" : "red")?>"></div>
																</div>
															</h4>



														</div>
														<!-- end widget content -->

													</div>
													<!-- end widget div -->
													<header style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );color:black;">
														<h2><strong>Livestatus</strong></h2>

														<div class="widget-toolbar" id="">
															<span>ONLINE</span>
														</div>
													</header>
												</div>
												<!-- end widget -->
											</div>
											<div class="col-sm-8">

												<table class="table table-bordered table-condensed">
													<thead>
														<tr>
															<th style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );color:white;">ATM File Types</th>
															<th style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );color:white;">Latest Upload / Generate</th>
															<th style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );color:white;">Filename</th>
															<th style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );color:white;">Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );color:white;">Electronic Journal (EJ) (*.jrn)</th>
															<td style="background: #ffffff"><span id="jrn_date_updated">-</span></td>
															<td style="background: #ffffff"><span id="jrn_filename">-</span></td>
															<td style="background: #ffffff">
																<a href="#" onclick="viewJurnal()">View</a>
															</td>
														</tr>
														<tr>
															<th style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );color:white;">Bitmap (*.bmp)</th>
															<td style="background: #ffffff"><span id="bmp_date_updated">-</span></td>
															<td style="background: #ffffff"><span id="bmp_filename">-</span></td>
															<td style="background: #ffffff"><a href="">Upload</a></td>
														</tr>
														<tr>
															<th style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );color:white;">Total Up Time</th>
															<td colspan="4" style="background: #ffffff"><span id="total_uptime">-</span></td>
														</tr>
														<tr>
															<th style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );color:white;">Sincronize Periodic</th>
															<td colspan="4" style="background: #ffffff">
															<?=date("M / Y")?>
															</td>
														</tr>
													</tbody>
												</table>


											</div>

										</div>
										<div class="row">
											<div class="col-sm-12">
												<small style="color:black;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;"><?=$r->name_client?> - CPU Monitor</small>
												<div id="containerX" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);"></div>
											</div>
										</div>
									</div>

								</div>

							</div>
						</div>
						
						<div class="panel panel-default">
							<?php
							if($r->status_client=="ONLINE") {
							?>
							<div class="panel-heading" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );">
								<h4 class="panel-title" style="height:45px">
								<a data-toggle="collapse" data-parent="#accordion<?=$no?>" href="#c<?=$r->id_client?><?=$no?>" > <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right" style="color:;font-size:20px;"></i>
								<img style="float: left; margin: -3px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/filerack2.png" height="25" width="25" />
								<p class="small" style="margin: -2px 0px 0px 0px;">
									<small style="color:white;font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">File Directory ATM</small><br>
									<small style="color:white;font-size:12px;">Identity : <?=$r->name_client?></small>
								</p>
								</a></h4>
							</div>
							<div id="c<?=$r->id_client?><?=$no?>" class="panel-collapse collapse <?=($r->status_client=="ONLINE" ? "" : "in")?>">
								<div class="panel-body no-padding">
									<iframe src="http://<?=$r->ip_client?>/fdsatm/" onload="tes('iframe<?=$no?>', '<?=$r->ip_client?>')" id="iframe<?=$no?>" style="border:none; margin: 0px 0px 0px 0px;" width="950" height="505">
									</iframe>
								</div>
							</div>
							<?php 
								}
							?>
						</div>
					</div>

				</div>
				<!-- end widget content -->
			</div>

			<?php 
			}
		?>
		<?php 
			} else { ?>
			
				<div class='grid_12 invoice_title'>
				<br>
				<center><img src='<?=base_url()?>assets/corelay/img/logo-o.png' width='90' height='70' style="margin: 190px 0px 0px 0px;">
				</center>
				<center>
				<small align='center' style="color:black;font-size:20px; margin: 0px 0px 0px 0px; font-weight: bold;">GT-ONE INTEGRATED MONITORING SYSTEM</small>
				<br><p style="color:black;font-size:16px; margin: 0px 0px 0px 0px;">FILE DIRECTORY ATM</p></center>
				</div>
		<?php
			}
		?>
			
		</div>
	</div>

</div>
<!-- end widget content -->

</div>
<!-- end widget div -->

</div>
<!-- end widget -->
<?php $__env->stopSection(); ?>			

<?php $__env->startSection('javascript'); ?>			
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
	function viewJurnal() {
		// http://<?=$r->ip_client?>:3000/download
		// $.get("http://<?=$r->ip_client?>:3000/viewtxt", function(data) {
			// var x = (new Date()).getTime(), // current time
			// y = data.cpuusage;
			// series.addPoint([x, y], true, true);
			url = "http://<?=$r->ip_client?>:3000/download";
			$.get("<?=base_url()?>e_journal/get", {url: url},function(data) {
				// alert(data);
				$.confirm({
					title: 'View Jrn',
					theme: 'light',
					content: data
				});
			});
		// });
	}

	<?php 
		error_reporting(0);
		if($get_status_client($active_atm)=="ONLINE") {
	?>
			Highcharts.chart('containerX', {
				chart: {
					type: 'spline',
					animation: Highcharts.svg, // don't animate in old IE
					marginRight: 10,
					events: {
						load: function () {

							// set up the updating of the chart each second
							// var series = this.series[0];
							// setInterval(function () {
								// var x = (new Date()).getTime(), // current time
									// y = Math.random();
								// series.addPoint([x, y], true, true);
							// }, 1000);
							var series = this.series[0];
							setInterval(function () {
								$.get("http://<?=$get_ip_client($active_atm)?>:3000/get_cpu", function(data) {
									var x = (new Date()).getTime(), // current time
									y = data.cpuusage;
									series.addPoint([x, y], true, true);
								});
								
								$.get("http://<?=$get_ip_client($active_atm)?>:3000/get_jrn", function(data) {
									$("#jrn_date_updated").html(data.date_indo);
									// $("#jrn_date_updated").html(data.date);
									$("#jrn_filename").html(data.filename);
								});
								
								$.get("http://<?=$get_ip_client($active_atm)?>:3000/status_uptime", function(data) {
									$("#total_uptime").html(data);
								});
							}, 1000);
						}
					}
				},

				time: {
					useUTC: false
				},

				title: {
					text: ''
				},

				accessibility: {
					announceNewData: {
						enabled: true,
						minAnnounceInterval: 15000,
						announcementFormatter: function (allSeries, newSeries, newPoint) {
							if (newPoint) {
								return 'New point added. Value: ' + newPoint.y;
							}
							return false;
						}
					}
				},

				xAxis: {
					type: 'datetime',
					tickPixelInterval: 150
				},

				yAxis: {
					title: {
						text: 'Usage (%)'
					},
					plotLines: [{
						value: 0,
						width: 1,
						color: '#808080'
					}]
					// min: 0,
					// max: 100
				},

				tooltip: {
					headerFormat: '<b>{series.name}</b><br/>',
					pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
				},

				legend: {
					enabled: false
				},

				exporting: {
					enabled: false
				},

				series: [{
					name: 'Random data',
					data: (function () {
						// generate an array of random data
						var data = [],
							time = (new Date()).getTime(),
							i;

						for (i = -19; i <= 0; i += 1) {
							data.push({
								x: time + i * 1000,
								y: 0
							});
						}
						return data;
					}())
				}],
				
				credits: false
			});
	<?php 
		}
	?>
	
	Highcharts.chart('containerXX', {
		chart: {
			type: 'spline',
			animation: Highcharts.svg, // don't animate in old IE
			marginRight: 10,
			events: {
				load: function () {

					// set up the updating of the chart each second
					// var series = this.series[0];
					// setInterval(function () {
						// var x = (new Date()).getTime(), // current time
							// y = Math.random();
						// series.addPoint([x, y], true, true);
					// }, 1000);
					var series = this.series[0];
					setInterval(function () {
						// $.get("http://<?=$get_ip_client($active_atm)?>:3000/get_cpu", function(data) {
							// var x = (new Date()).getTime(), // current time
							// y = data.cpuusage;
							// series.addPoint([x, y], true, true);
						// });
						
						// $.get("http://<?=$get_ip_client($active_atm)?>:3000/get_jrn", function(data) {
							// $("#jrn_date_updated").html(data.date_indo);
							// // $("#jrn_date_updated").html(data.date);
							// $("#jrn_filename").html(data.filename);
						// });
						
						$.get("http://192.168.11.37:3333/get_cpu", function(data) {
							$("#html_cpu_usage").html(data.cpuusage+" %");
							$("#html_memory_usage").html(data.used_mem+"/"+data.total_mem+"GB ("+data.percent_mem+"%)");
							var x = (new Date()).getTime(), // current time
							y = data.cpuusage;
							series.addPoint([x, y], true, true);
						});
					}, 1000);
				}
			}
		},

		time: {
			useUTC: false
		},

		title: {
			text: ''
		},

		accessibility: {
			announceNewData: {
				enabled: true,
				minAnnounceInterval: 15000,
				announcementFormatter: function (allSeries, newSeries, newPoint) {
					if (newPoint) {
						return 'New point added. Value: ' + newPoint.y;
					}
					return false;
				}
			}
		},

		xAxis: {
			type: 'datetime',
			tickPixelInterval: 150
		},

		yAxis: {
			title: {
				text: 'Usage (%)'
			},
			plotLines: [{
				value: 0,
				width: 1,
				color: '#808080'
			}]
			// min: 0,
			// max: 100
		},

		tooltip: {
			headerFormat: '<b>{series.name}</b><br/>',
			pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
		},

		legend: {
			enabled: false
		},

		exporting: {
			enabled: false
		},

		series: [{
			name: 'Random data',
			data: (function () {
				// generate an array of random data
				var data = [],
					time = (new Date()).getTime(),
					i;

				for (i = -19; i <= 0; i += 1) {
					data.push({
						x: time + i * 1000,
						y: 0
					});
				}
				return data;
			}())
		}],
		
		credits: false
	});

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

	pageSetUp();

	// PAGE RELATED SCRIPTS
	
	function tes(iframe, ip) {
		var iframe = $("#"+iframe)[0];
		
		// console.log("#"+iframe);
		console.log(iframe);
		// console.log(iframe.contentDocument());
		// console.log(iframe.contentWindow());
		
		try {
			console.log("AAA "+ip)
			if ( iframe.innerHTML() ) {
				console.log("BBB")
			}
		} catch {			
			// console.log("CCC "+ip)
		}
		// document.getElementById(iframe).src = "http://"+ip+"/fdsatm/";
		// console.log(iframe);
		// if ( iframe.innerHTML() ) {
			// // get and check the Title (and H tags if you want)
			// var ifTitle = iframe.contentDocument.title;
			// if ( ifTitle.indexOf("404")>=0 ) {
				// // we have a winner! probably a 404 page!
				// alert("AAA");
			// }
		// } else {
			// // didn't load
			// alert("BBB");
		// }
	}
	
	function load_iframe(ip) {
		alert(ip);
		// var iframe = $("#iframe")[0];
		// iframe.src = "http://"+ip+"/fdsatm/";
		// if ( iframe.innerHTML() ) {
			// // get and check the Title (and H tags if you want)
			// var ifTitle = iframe.contentDocument.title;
			// if ( ifTitle.indexOf("404")>=0 ) {
				// // we have a winner! probably a 404 page!
				// alert("AAA");
			// }
		// } else {
			// // didn't load
			// alert("BBB");
		// }
	}

	function noAnswer() {

		$.smallBox({
			title : "Sure, as you wish sir...",
			content : "",
			color : "#A65858",
			iconSmall : "fa fa-times",
			timeout : 5000
		});

	};
	
	function closedthis() {
		$.smallBox({
			title : "Great! You just closed that last alert!",
			content : "This message will be gone in 5 seconds!",
			color : "#739E73",
			iconSmall : "fa fa-cloud",
			timeout : 5000
		});
	};		

	// pagefunction
	
	var pagefunction = function() {

		/*
		 * Autostart Carousel
		 */
		$('.carousel.slide').carousel({
			interval : 3000,
			cycle : true
		});
		$('.carousel.fade').carousel({
			interval : 3000,
			cycle : true
		});
		
		// Fill all progress bars with animation
		$('.progress-bar').progressbar({
			display_text : 'fill'
		});

		/*
		 * Smart Notifications
		 */
		$('#eg1').click(function(e) {
	
			$.bigBox({
				title : "Big Information box",
				content : "This message will dissapear in 6 seconds!",
				color : "#C46A69",
				//timeout: 6000,
				icon : "fa fa-warning shake animated",
				number : "1",
				timeout : 6000
			});
	
			e.preventDefault();
	
		})
	
		$('#eg2').click(function(e) {
	
			$.bigBox({
				title : "Big Information box",
				content : "Lorem ipsum dolor sit amet, test consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
				color : "#3276B1",
				//timeout: 8000,
				icon : "fa fa-bell swing animated",
				number : "2"
			});
	
			e.preventDefault();
		})
	
		$('#eg3').click(function(e) {
	
			$.bigBox({
				title : "Shield is up and running!",
				content : "Lorem ipsum dolor sit amet, test consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
				color : "#C79121",
				//timeout: 8000,
				icon : "fa fa-shield fadeInLeft animated",
				number : "3"
			});
	
			e.preventDefault();
	
		})
	
		$('#eg4').click(function(e) {
	
			$.bigBox({
				title : "Success Message Example",
				content : "Lorem ipsum dolor sit amet, test consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
				color : "#739E73",
				//timeout: 8000,
				icon : "fa fa-check",
				number : "4"
			}, function() {
				closedthis();
			});
	
			e.preventDefault();
	
		})
	
		$('#eg5').click(function() {
	
			$.smallBox({
				title : "Ding Dong!",
				content : "Someone's at the door...shall one get it sir? <p class='text-align-right'><a href='javascript:void(0);' class='btn btn-primary btn-sm'>Yes</a> <a href='javascript:void(0);'  onclick='noAnswer();' class='btn btn-danger btn-sm'>No</a></p>",
				color : "#296191",
				//timeout: 8000,
				icon : "fa fa-bell swing animated"
			});
	
		});
	
		$('#eg6').click(function() {
	
			$.smallBox({
				title : "Big Information box",
				content : "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
				color : "#5384AF",
				//timeout: 8000,
				icon : "fa fa-bell"
			});
	
		})
	
		$('#eg7').click(function() {
	
			$.smallBox({
				title : "James Simmons liked your comment",
				content : "<i class='fa fa-clock-o'></i> <i>2 seconds ago...</i>",
				color : "#296191",
				iconSmall : "fa fa-thumbs-up bounce animated",
				timeout : 4000
			});
	
		})
	
		/*
		* SmartAlerts
		*/
		
		// With Callback
		
		$("#smart-mod-eg1").click(function(e) {
			$.SmartMessageBox({
				title : "Smart Alert!",
				content : "This is a confirmation box. Can be programmed for button callback",
				buttons : '[No][Yes]'
			}, function(ButtonPressed) {
				if (ButtonPressed === "Yes") {
	
					$.smallBox({
						title : "Callback function",
						content : "<i class='fa fa-clock-o'></i> <i>You pressed Yes...</i>",
						color : "#659265",
						iconSmall : "fa fa-check fa-2x fadeInRight animated",
						timeout : 4000
					});
				}
				if (ButtonPressed === "No") {
					$.smallBox({
						title : "Callback function",
						content : "<i class='fa fa-clock-o'></i> <i>You pressed No...</i>",
						color : "#C46A69",
						iconSmall : "fa fa-times fa-2x fadeInRight animated",
						timeout : 4000
					});
				}
	
			});
			e.preventDefault();
		})
		
		// With Input
		$("#smart-mod-eg2").click(function(e) {
	
			$.SmartMessageBox({
				title : "Smart Alert: Input",
				content : "Please enter your user name",
				buttons : "[Accept]",
				input : "text",
				placeholder : "Enter your user name"
			}, function(ButtonPress, Value) {
				alert(ButtonPress + " " + Value);
			});
	
			e.preventDefault();
		})
		
		// With Buttons
		$("#smart-mod-eg3").click(function(e) {
	
			$.SmartMessageBox({
				title : "Smart Notification: Buttons",
				content : "Lots of buttons to go...",
				buttons : '[Need?][You][Do][Buttons][Many][How]'
			});
	
			e.preventDefault();
		})
		
		// With Select
		$("#smart-mod-eg4").click(function(e) {
	
			$.SmartMessageBox({
				title : "Smart Alert: Select",
				content : "You can even create a group of options.",
				buttons : "[Done]",
				input : "select",
				options : "[Costa Rica][United States][Autralia][Spain]"
			}, function(ButtonPress, Value) {
				alert(ButtonPress + " " + Value);
			});
	
			e.preventDefault();
		});
	
		// With Login
		$("#smart-mod-eg5").click(function(e) {
	
			$.SmartMessageBox({
				title : "Login form",
				content : "Please enter your user name",
				buttons : "[Cancel][Accept]",
				input : "text",
				placeholder : "Enter your user name"
			}, function(ButtonPress, Value) {
				if (ButtonPress == "Cancel") {
					alert("Why did you cancel that? :(");
					return 0;
				}
	
				Value1 = Value.toUpperCase();
				ValueOriginal = Value;
				$.SmartMessageBox({
					title : "Hey! <strong>" + Value1 + ",</strong>",
					content : "And now please provide your password:",
					buttons : "[Login]",
					input : "password",
					placeholder : "Password"
				}, function(ButtonPress, Value) {
					alert("Username: " + ValueOriginal + " and your password is: " + Value);
				});
			});
	
			e.preventDefault();
		});
		
	};
	
	// end pagefunction
	
	// load bootstrap-progress bar script and run pagefunction
	loadScript("<?=BASE_URL?>js/plugin/bootstrap-progressbar/bootstrap-progressbar.min.js", pagefunction);

</script>
<script type="text/javascript">

var ON_TIMEOUT   = 0;   // time until next 'all on', calculated
var LED_TIMEOUT  = 90;  // timeout for each led to turn off
var OFF_DELAY    = 390; // timeout for leds turning off

$(function() {
  var leds = [];
  
  ON_TIMEOUT = OFF_DELAY;
  $("div.led").each(function() {
    ON_TIMEOUT += LED_TIMEOUT * 2;
    leds.push(this);
  });
 
  $.each(leds, function() {
    $(this).addClass("off");

    // Instead of setInterval, this timer starts immediately.
    (function() {
      var startTimeout = LED_TIMEOUT;
      for(var index = (leds.length - 1); index >= 0; index--) {
        var $led = $(leds[index]);
        $led.removeClass("off");
        
        (function() {
          // grabbing the upvalue... 
          var $led2 = $led;
          setTimeout(function() {
            $led2.addClass("off");
          }, startTimeout + OFF_DELAY);
        }());
        
        startTimeout += LED_TIMEOUT;
      }
      
      setTimeout(arguments.callee, ON_TIMEOUT);
    }());
  });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV_SERVER\htdocs\bridnins\coresys\views/pages/master_fds/index.blade.php ENDPATH**/ ?>