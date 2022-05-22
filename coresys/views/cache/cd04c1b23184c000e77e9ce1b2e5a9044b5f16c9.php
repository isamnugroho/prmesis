

<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('pages/dash_performance/style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.5/css/scroller.dataTables.min.css">


	<section id="widget-grid" class="">

	<div class="row">
		<article class="col-sm-12">
		<!-- new widget -->
		<div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
			<header  style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%);">
				<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
				<h2>Dashboard Premesis</h2>

				<ul class="nav nav-tabs pull-right in" id="myTab">
					<li class="active">
						<a data-toggle="tab" href="#s1"><i class="fa">
						<img style="float: left; margin: 2px 5px 0px -5px;" src="<?=base_url()?>assets/img/mn.png" height="14" width="14" />
						</i> <span class="hidden-mobile hidden-tablet">Statistics Performance</span></a>
					</li>
					<li class="">
						<a data-toggle="tab" href="#s2"><i class="fa fa-clock-o"></i> <span class="hidden-mobile hidden-tablet">Job Pagi</span></a>
					</li>
					<li class="">
						<a data-toggle="tab" href="#s3"><i class="fa fa-clock-o"></i> <span class="hidden-mobile hidden-tablet">Job Sore</span></a>
					</li>	
					<li class="">
						<a data-toggle="tab" href="#s4"><i class="fa fa-clock-o"></i> <span class="hidden-mobile hidden-tablet">Status Job </span></a>
					</li>
				</ul>
			</header>

			<!-- widget div-->
			<div class="no-padding">
				<div class="widget-body">
					<!-- content -->
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in padding-10 no-padding-bottom" id="s1">
							<div class="row no-space">
								<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 no-space">
								<div class="show-stat-microcharts" style="margin: 0px 0px 0px 0px;">
							
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
								<a href="<?=base_url()?>detail_mesincrm">
								<img style="float: left; margin: 6px 5px 0px -4px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
								<span class="menu-item-parent">
								<p class="small" style="color:gray;margin: 6px 0px 0px 0px;">
									<small style="font-size:12px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
									<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_atm']?></small>
								</p>
								</span>
								</a>
										
								</div>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
								<a href="<?=base_url()?>detail_mesincrm">
								<img style="float: left; margin: 6px 5px 0px -4px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
								<span class="menu-item-parent">
								<p class="small" style="color:gray;margin: 6px 0px 0px 0px;">
									<small style="font-size:12px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
									<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_atm']?></small>
								</p>
								</span>
								</a>
										
								</div>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
								<a href="<?=base_url()?>detail_mesincrm">
								<img style="float: left; margin: 6px 5px 0px -4px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
								<span class="menu-item-parent">
								<p class="small" style="color:gray;margin: 6px 0px 0px 0px;">
									<small style="font-size:12px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
									<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_atm']?></small>
								</p>
								</span>
								</a>
										
								</div>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
								<a href="<?=base_url()?>detail_mesincrm">
								<img style="float: left; margin: 6px 5px 0px -4px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
								<span class="menu-item-parent">
								<p class="small" style="color:gray;margin: 6px 0px 0px 0px;">
									<small style="font-size:12px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
									<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_atm']?></small>
								</p>
								</span>
								</a>
										
								</div>
								</div>
								
								</div>

								<div id="updating-chart" class="chart-large txt-color-green"></div>
								
								<div class="show-stat-microcharts" style="margin: 0px 0px 0px 0px;">
							
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
								<a href="<?=base_url()?>detail_mesincrm">
								<img style="float: left; margin: 6px 5px 0px -4px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
								<span class="menu-item-parent">
								<p class="small" style="color:gray;margin: 6px 0px 0px 0px;">
									<small style="font-size:12px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
									<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_atm']?></small>
								</p>
								</span>
								</a>
										
								</div>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
								<a href="<?=base_url()?>detail_mesincrm">
								<img style="float: left; margin: 6px 5px 0px -4px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
								<span class="menu-item-parent">
								<p class="small" style="color:gray;margin: 6px 0px 0px 0px;">
									<small style="font-size:12px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
									<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_atm']?></small>
								</p>
								</span>
								</a>
										
								</div>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
								<a href="<?=base_url()?>detail_mesincrm">
								<img style="float: left; margin: 6px 5px 0px -4px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
								<span class="menu-item-parent">
								<p class="small" style="color:gray;margin: 6px 0px 0px 0px;">
									<small style="font-size:12px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
									<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_atm']?></small>
								</p>
								</span>
								</a>
										
								</div>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
								<a href="<?=base_url()?>detail_mesincrm">
								<img style="float: left; margin: 6px 5px 0px -4px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
								<span class="menu-item-parent">
								<p class="small" style="color:gray;margin: 6px 0px 0px 0px;">
									<small style="font-size:12px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
									<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_atm']?></small>
								</p>
								</span>
								</a>
										
								</div>
								</div>
								
								</div>										
								</div>
								<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 show-stats">

								<div class="show-stat-microcharts" style="margin: -6px 0px 0px 0px; height:120px;">
							
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="height:120px;">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:120px;">
								<a href="<?=base_url()?>detail_mesincrm">
								<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
								<span class="menu-item-parent">
								<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
									<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
									<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_atm']?></small>
								</p>
								</span>
								</a>
										
								</div>
								</div>
							
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="height:120px;">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:120px;">
								<a href="<?=base_url()?>detail_mesincrm">
								<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
								<span class="menu-item-parent">
								<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
									<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
									<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_atm']?></small>
								</p>
								</span>
								</a>
										
								</div>
								</div>
							
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="height:120px;">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:120px;">
								<a href="<?=base_url()?>detail_mesincrm">
								<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
								<span class="menu-item-parent">
								<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
									<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
									<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_atm']?></small>
								</p>
								</span>
								</a>
										
								</div>
								</div>
							
							
								</div>											

								<div class="show-stat-microcharts" style="margin: -6px 0px 0px 0px; height:120px;">
							
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="height:120px;">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:120px;">
								<a href="<?=base_url()?>detail_mesincrm">
								<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
								<span class="menu-item-parent">
								<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
									<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
									<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_atm']?></small>
								</p>
								</span>
								</a>
										
								</div>
								</div>
							
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="height:120px;">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:120px;">
								<a href="<?=base_url()?>detail_mesincrm">
								<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
								<span class="menu-item-parent">
								<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
									<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
									<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_atm']?></small>
								</p>
								</span>
								</a>
										
								</div>
								</div>
							
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="height:120px;">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:120px;">
								<a href="<?=base_url()?>detail_mesincrm">
								<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
								<span class="menu-item-parent">
								<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
									<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
									<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_atm']?></small>
								</p>
								</span>
								</a>
										
								</div>
								</div>
							
							
								</div>
								
								<div class="show-stat-microcharts" style="margin: -6px 0px 0px 0px; height:120px;">
							
								<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12" style="height:120px;">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:105px;">
								<a href="<?=base_url()?>detail_mesincrm">
								<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> My Tasks <span class="pull-right">130/200</span> </span>
									<div class="progress">
										<div class="progress-bar bg-color-blueDark" style="width: 65%;"></div>
									</div> 
								</div>
								</a>
										
								</div>
								</div>
													
								</div>
								
								</div>
							</div>
							
							<div class="show-stat-microcharts" style="margin: 0px 0px 0px 0px; height:135px;">
							
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="height:135px;">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%);height:155px;">
								<a href="<?=base_url()?>detail_mesincrm">
								<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
								<span class="menu-item-parent">
								<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
									<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
									<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_atm']?></small>
								</p>
								</span>
								</a>												
								</div>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">

									<div class="easy-pie-chart txt-color-orangeDark" data-percent="73" data-pie-size="50" style="margin: -16px 5px 0px 0px; ">
										<span class="percent percent-sign">35</span>
									</div>
									<span class="easy-pie-title" style="height:30px;width:50%;">
									<p class="small" style=" margin: 0px 0px 0px 0px;color:dimgray;">
									<small style="font-size:14px;font-weight: bold;">All Performance</small><br>
									<small style="font-size:10px;">Summary Job Performance</small>
									</p>
									</span>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
									<div class="easy-pie-chart txt-color-greenLight" data-percent="78.9" data-pie-size="50">
										<span class="percent percent-sign">78.9 </span>
									</div>
									<span class="easy-pie-title"> Disk Space <i class="fa fa-caret-down icon-color-good"></i></span>
									<ul class="smaller-stat hidden-sm pull-right">
										<li>
											<span class="label bg-color-blueDark"><i class="fa fa-caret-up"></i> 76%</span>
										</li>
										<li>
											<span class="label bg-color-blue"><i class="fa fa-caret-down"></i> 3%</span>
										</li>
									</ul>
									<div class="sparkline txt-color-blue hidden-sm hidden-md pull-right" data-sparkline-type="line" data-sparkline-height="33px" data-sparkline-width="70px" data-fill-color="transparent">
										257, 200, 210, 300, 270, 363, 130, 187, 250, 247, 270, 363, 247
									</div>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
									<div class="easy-pie-chart txt-color-blue" data-percent="23" data-pie-size="50">
										<span class="percent percent-sign">23 </span>
									</div>
									<span class="easy-pie-title"> Transfered <i class="fa fa-caret-up icon-color-good"></i></span>
									<ul class="smaller-stat hidden-sm pull-right">
										<li>
											<span class="label bg-color-darken">10GB</span>
										</li>
										<li>
											<span class="label bg-color-blueDark"><i class="fa fa-caret-up"></i> 10%</span>
										</li>
									</ul>
									<div class="sparkline txt-color-darken hidden-sm hidden-md pull-right" data-sparkline-type="line" data-sparkline-height="33px" data-sparkline-width="70px" data-fill-color="transparent">
										200, 210, 363, 247, 300, 270, 130, 187, 250, 257, 363, 247, 270
									</div>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
									<div class="easy-pie-chart txt-color-darken" data-percent="36" data-pie-size="50">
										<span class="percent degree-sign">36 <i class="fa fa-caret-up"></i></span>
									</div>
									<span class="easy-pie-title"> Temperature <i class="fa fa-caret-down icon-color-good"></i></span>
									<ul class="smaller-stat hidden-sm pull-right">
										<li>
											<span class="label bg-color-red"><i class="fa fa-caret-up"></i> 124</span>
										</li>
										<li>
											<span class="label bg-color-blue"><i class="fa fa-caret-down"></i> 40 F</span>
										</li>
									</ul>
									<div class="sparkline txt-color-red hidden-sm hidden-md pull-right" data-sparkline-type="line" data-sparkline-height="33px" data-sparkline-width="70px" data-fill-color="transparent">
										2700, 3631, 2471, 2700, 3631, 2471, 1300, 1877, 2500, 2577, 2000, 2100, 3000
									</div>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
									<div class="easy-pie-chart txt-color-blue" data-percent="23" data-pie-size="50">
										<span class="percent percent-sign">23 </span>
									</div>
									<span class="easy-pie-title"> Transfered <i class="fa fa-caret-up icon-color-good"></i></span>
									<ul class="smaller-stat hidden-sm pull-right">
										<li>
											<span class="label bg-color-darken">10GB</span>
										</li>
										<li>
											<span class="label bg-color-blueDark"><i class="fa fa-caret-up"></i> 10%</span>
										</li>
									</ul>
									<div class="sparkline txt-color-darken hidden-sm hidden-md pull-right" data-sparkline-type="line" data-sparkline-height="33px" data-sparkline-width="70px" data-fill-color="transparent">
										200, 210, 363, 247, 300, 270, 130, 187, 250, 257, 363, 247, 270
									</div>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
									<div class="easy-pie-chart txt-color-darken" data-percent="36" data-pie-size="50">
										<span class="percent degree-sign">36 <i class="fa fa-caret-up"></i></span>
									</div>
									<span class="easy-pie-title"> Temperature <i class="fa fa-caret-down icon-color-good"></i></span>
									<ul class="smaller-stat hidden-sm pull-right">
										<li>
											<span class="label bg-color-red"><i class="fa fa-caret-up"></i> 124</span>
										</li>
										<li>
											<span class="label bg-color-blue"><i class="fa fa-caret-down"></i> 40 F</span>
										</li>
									</ul>
									<div class="sparkline txt-color-red hidden-sm hidden-md pull-right" data-sparkline-type="line" data-sparkline-height="33px" data-sparkline-width="70px" data-fill-color="transparent">
										2700, 3631, 2471, 2700, 3631, 2471, 1300, 1877, 2500, 2577, 2000, 2100, 3000
									</div>
								</div>
	
							</div>

							<div class="show-stat-microcharts" style="margin: -6px 0px 30px 0px;">
							
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:120px;">
								<a href="<?=base_url()?>detail_mesincrm">
								<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
								<span class="menu-item-parent">
								<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
									<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
									<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_atm']?></small>
								</p>
								</span>
								</a>
										
								</div>
								</div>
							
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:120px;">
								<a href="<?=base_url()?>detail_mesincrm">
								<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
								<span class="menu-item-parent">
								<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
									<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
									<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_atm']?></small>
								</p>
								</span>
								</a>
										
								</div>
								</div>
							
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:120px;">
								<a href="<?=base_url()?>detail_mesincrm">
								<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
								<span class="menu-item-parent">
								<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
									<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
									<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_atm']?></small>
								</p>
								</span>
								</a>
										
								</div>
								</div>
							
							</div>						
							<br>
							<br>
							<br>
						</div>
					</div>

					<!-- end content -->
				</div>

			</div>
			<!-- end widget div -->
		</div>
		<!-- end widget -->

		</article>
	</div>

	</section>
	<!-- end widget grid -->


	
	
<section id="widget-grid" class="">

	<div class="row">
		<article class="col-sm-12" style="margin: 0px 0px -60px 0px;">
			<!-- new widget -->
			<div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false"
			data-widget-custombutton="false"
			data-widget-collapsed="false"
			data-widget-sortable="false"
			
			>
			<header  style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%);">
				<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
				<h2>Dashboard Premesis</h2>

				<ul class="nav nav-tabs pull-right in" id="myTab">
					<li class="active">
						<a data-toggle="tab" href="#s1">
						<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>assets/img/mn.png" height="14" width="14" />
						<span class="hidden-mobile hidden-tablet">CRM Reliability</span></a>
					</li>

				</ul>

			</header>

			<!-- widget div-->
			<div class="no-padding">
				

				<div class="widget-body" style="margin: 0px 0px -40px 0px;">
					<!-- content -->
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in padding-10 no-padding-bottom" id="s1">
							<div class="row">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin: 0px 0px 0px 0px;">
									<div class="row">
										<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12" style="margin: 0px 0px 0px 0px;">
											<a href="<?=base_url()?>detail_schedule">
											<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); color;white; height:115px;">
												<div class="panel-heading">
													<p class="small" style="float:left;color:gray;font-size:22px; font-weight: bold;margin: -5px 0px 0px 0px;">Premesis CRM BRI</p>
													<br>
													<br>
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
												</div>
											</div>
											</a>
										</div>
										<span class="show-stat-buttons" style="margin: -10px 0px 0px 0px;">

										<span class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
										<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
										<a href="<?=base_url()?>detail_mesincrm">
										<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/n45.png" height="40" width="40" />
										<span class="menu-item-parent">
										<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
											<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Mesin CRM</small><br>
											<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_atm']?></small>
										</p>
										</span>
										</a>
												
										</div>
										</span> 
										
										<span class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
										<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
										<a href="<?=base_url()?>detail_totwilayah"> 
										<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/whiteloc.png" height="40" width="40" />
										<span class="menu-item-parent">
										<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
											<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Wilayah</small><br>
											<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_wilayah']?></small>
										</p>
										</span>
										</a>
												
										</div>
										</span> 
										
										</span>

										<span class="show-stat-buttons" style="margin: -10px 0px 0px 0px;">

										<span class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
										<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
										<a href="<?=base_url()?>detail_totcabang"> 
										<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/building2.png" height="40" width="40" />
										<span class="menu-item-parent">
										<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
											<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Branch/Cabang</small><br>
											<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_kc']?></small>
										</p>
										</span>
										</a>
												
										</div>
										</span> 
										
										<span class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
										<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
										<a href="<?=base_url()?>detail_totuker"> 
										<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/building.png" height="40" width="40" />
										<span class="menu-item-parent">
										<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
											<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Unit Kerja</small><br>
											<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_unit']?></small>
										</p>
										</span>
										</a>
												
										</div>
										</span>
										
										</span>

										<span class="show-stat-buttons" style="margin: -10px 0px 0px 0px;">

										<span class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
										<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
										<a href="<?=base_url()?>detail_totusers"> 
										<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/userpro.png" height="40" width="40" />
										<span class="menu-item-parent">
										<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
											<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Users</small><br>
											<small style="font-size:28px; font-weight: bold;"><?=$data_summary['total_staff']?></small>
										</p>
										</span>
										</a>
												
										</div>
										</span>
										<span class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
										<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
										<a href="<?=base_url()?>detail_totpetugas"> 
										<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/tikopen.png" height="40" width="40" />
										<span class="menu-item-parent">
										<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
											<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Petugas</small><br>
											<small style="font-size:28px; font-weight: bold;"><?=$summary['total_petugas']?></small>
										</p>
										</span>
										</a>
												
										</div>
										</span>
										
										
										</span>
										

					
													
										
													
									</div>

								</div>

<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="margin: 0px 0px 0px 0px;">
	<div class="row">
					
					
					<span class="show-stat-buttons" style="margin: 0px 0px -10px 0px;">

					<span class="col-xs-12 col-sm-3 col-md-3 col-lg-3"> 
					<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
					<a href="<?=base_url()?>detail_totjobpagi"> 
					<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/pagi.png" height="40" width="40" />
					<span class="menu-item-parent">
					<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
						<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Job Pagi</small><br>
						<small style="font-size:28px; font-weight: bold;"><?=$summary['job_pagi']?></small>
					</p>
					</span>
					</a>
							
					</div>
					</span> 
					
					<span class="col-xs-12 col-sm-3 col-md-3 col-lg-3"> 
					<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
					<a href="<?=base_url()?>detail_totjobsore"> 
					<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/sore.png" height="40" width="40" />
					<span class="menu-item-parent">
					<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
						<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Job Sore</small><br>
						<small style="font-size:28px; font-weight: bold;"><?=$summary['job_sore']?></small>
					</p>
					</span>
					</a>
							
					</div>
					</span> 

					<span class="col-xs-12 col-sm-3 col-md-3 col-lg-3"> 
					<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
					<a href="<?=base_url()?>detail_donepagi">
					<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/pagi.png" height="40" width="40" />
					<span class="menu-item-parent">
					<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
						<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Done Pagi</small><br>
						<small style="font-size:28px; font-weight: bold;"><?=$summary['done_pagi']?></small>
					</p>
					</span>
					</a>
							
					</div>
					</span> 
					
					<span class="col-xs-12 col-sm-3 col-md-3 col-lg-3"> 
					<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
					<a href="<?=base_url()?>detail_donesore"> 
					<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/sore.png" height="40" width="40" />
					<span class="menu-item-parent">
					<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
						<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Done Sore</small><br>
						<small style="font-size:28px; font-weight: bold;"><?=$summary['done_sore']?></small>
					</p>
					</span>
					</a>
							
					</div>
					</span> 
					
					</span>

					<span class="col-xs-12 col-sm-3 col-md-3 col-lg-3"> 
					<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
					<a href="<?=base_url()?>detail_schedule"> 
					<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/team1.png" height="40" width="40" />
					<span class="menu-item-parent">
					<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
						<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Koordinator</small><br>
						<small style="font-size:28px; font-weight: bold;"><?=$summary['total_koord']?></small>
					</p>
					</span>
					</a>
							
					</div>
					</span> 
					<span class="col-xs-12 col-sm-3 col-md-3 col-lg-3"> 
					<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
					<a href="<?=base_url()?>detail_schedule"> 
					<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/browser.png" height="40" width="40" />
					<span class="menu-item-parent">
					<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
						<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Group Area</small><br>
						<small style="font-size:28px; font-weight: bold;"><?=$summary['total_grup_area']?></small>
					</p>
					</span>
					</a>
							
					</div>
					</span> 
					
					<span class="col-xs-12 col-sm-3 col-md-3 col-lg-3"> 
					<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
					<a href="<?=base_url()?>detail_schedule"> 
					<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/history.png" height="40" width="40" />
					<span class="menu-item-parent">
					<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
						<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Pengalihan</small><br>
						<small style="font-size:28px; font-weight: bold;"><?=$summary['switch_schedule']?></small>
					</p>
					</span>
					</a>
							
					</div>
					</span> 

					<span class="col-xs-12 col-sm-3 col-md-3 col-lg-3"> 
					<div class="panel zoomsmall" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%); height:55px;">
					<a href="<?=base_url()?>detail_schedule"> 
					<img style="float: left; margin: 6px 5px 0px 8px;" src="<?=base_url()?>assets/img/n47.png" height="40" width="40" />
					<span class="menu-item-parent">
					<p class="small" style="color:gray;margin: 5px 0px 0px 0px;">
						<small style="font-size:14px; font-weight: bold; margin: 0px 0px 0px 0px;">Total Complain</small><br>
						<small style="font-size:28px; font-weight: bold;"><?=$summary['complain']?></small>
					</p>
					</span>
					</a>
							
					</div>
					</span> 
					<hanzmobview>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="margin: -10px 0px -10px 0px;">
					<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
					<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
					<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/mn.png" height="18" width="18" /> </span>
					<h2 style="color:white; margin: -1px 0px 0px 10px; font-weight: bold;">Performance Cleaning Job Pagi
					</h2>
					</header>
					<div>
					<div class="widget-body no-padding">
					<center style="background: linear-gradient(to bottom, #8e9eab, #eef2f3);">
					<div class="widget-body no-padding">
						<link rel="stylesheet" href="<?=BASE_LAYOUT?>v153/radial/style.css">
						<div class="big">
							<div class="pie pie--value pie--disc" style="--percent:0;"></div>
							<div class="pie pie--value pie--disc" style="--percent:0;"></div>
							<div class="pie pie--value pie--disc" style="--percent:0;"></div>
						</div>
						<script src="<?=BASE_LAYOUT?>v153/radial/script.js"></script>
						<link rel="stylesheet" href="<?=BASE_LAYOUT?>v153/radial2/style.css">
					</div>
					</center>
					<table class="table table-bordered table-condensed" style="margin: -8px 0px 0px 0px;">
					<thead>
						<tr>
							<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;text-align:right;">Total Job Today</th>
							<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;text-align:center;">Total Job Pending</th>
							<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">Total Job Done</th>
						</tr>
					</thead>
					</table>
					</div>
					</div>
					</div>

					</div>
					</hanzmobview>
					<hanzmobview>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="margin: -10px 0px -20px 0px;">
					<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
					<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
					<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/mn.png" height="18" width="18" /> </span>
					<h2 style="color:white; margin: -1px 0px 0px 10px; font-weight: bold;">Performance Cleaning Job Sore
					</h2>
					</header>
					<div>
					<div class="widget-body no-padding">
					<center style="background: linear-gradient(to bottom, #8e9eab, #eef2f3);">
					<div class="widget-body no-padding">
						<link rel="stylesheet" href="<?=BASE_LAYOUT?>v153/radial/style.css">
						<div class="big">
							<div class="pie pie--value pie--disc" style="--percent:0;"></div>
							<div class="pie pie--value pie--disc" style="--percent:0;"></div>
							<div class="pie pie--value pie--disc" style="--percent:0;"></div>
						</div>
						<script src="<?=BASE_LAYOUT?>v153/radial/script.js"></script>
						<link rel="stylesheet" href="<?=BASE_LAYOUT?>v153/radial2/style.css">
					</div>
					</center>
					<table class="table table-bordered table-condensed" style="margin: -8px 0px 0px 0px;">
					<thead>
						<tr>
							<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;text-align:right;">Total Job Today</th>
							<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;text-align:center;">Total Job Pending</th>
							<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">Total Job Done</th>
						</tr>
					</thead>
					</table>
					</div>
					</div>
					</div>

					</div>
					</hanzmobview>

				</div>
			

</div>

						
							
							</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  no-padding" style="margin: -10px 0px -30px 0px;">


</div>


						</div>
						<!-- end s1 tab pane -->

					</div>

					<!-- end content -->
				</div>

			</div>
			<!-- end widget div -->
			</div>
			<!-- end widget -->

		</article>
	</div>

</section>

	<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>

  <script src="<?=BASE_LAYOUT?>chartnew/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="<?=BASE_LAYOUT?>assets/js/pace.min.js"></script>
  <script src="<?=BASE_LAYOUT?>chartnew/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="<?=BASE_LAYOUT?>chartnew/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="<?=BASE_LAYOUT?>chartnew/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
  
	<script src="<?=BASE_LAYOUT?>js/plugin/morris/raphael.min.js"></script>
	<script src="<?=BASE_LAYOUT?>js/plugin/morris/morris.min.js"></script>

	<!-- PAGE RELATED PLUGIN(S) -->
	<script src="<?=BASE_LAYOUT?>js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
	<script src="<?=BASE_LAYOUT?>js/plugin/fuelux/wizard/wizard.min.js"></script>
	
	<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/scroller/2.0.5/js/dataTables.scroller.min.js"></script>
	
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNYm2qInIVWeNLEUtYsMqiaOhjsynyFAY&libraries=places"></script>
	
	<script>
		$(document).ready(function() {

			// DO NOT REMOVE : GLOBAL FUNCTIONS!
			pageSetUp();

			/*
			 * PAGE RELATED SCRIPTS
			 */

			$(".js-status-update a").click(function() {
				var selText = $(this).text();
				var $this = $(this);
				$this.parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
				$this.parents('.dropdown-menu').find('li').removeClass('active');
				$this.parent().addClass('active');
			});

			/*
			* TODO: add a way to add more todo's to list
			*/

			// initialize sortable
			$(function() {
				$("#sortable1, #sortable2").sortable({
					handle : '.handle',
					connectWith : ".todo",
					update : countTasks
				}).disableSelection();
			});

			// check and uncheck
			$('.todo .checkbox > input[type="checkbox"]').click(function() {
				var $this = $(this).parent().parent().parent();

				if ($(this).prop('checked')) {
					$this.addClass("complete");

					// remove this if you want to undo a check list once checked
					//$(this).attr("disabled", true);
					$(this).parent().hide();

					// once clicked - add class, copy to memory then remove and add to sortable3
					$this.slideUp(500, function() {
						$this.clone().prependTo("#sortable3").effect("highlight", {}, 800);
						$this.remove();
						countTasks();
					});
				} else {
					// insert undo code here...
				}

			})
			// count tasks
			function countTasks() {

				$('.todo-group-title').each(function() {
					var $this = $(this);
					$this.find(".num-of-tasks").text($this.next().find("li").size());
				});

			}

			/*
			* RUN PAGE GRAPHS
			*/

			/* TAB 1: UPDATING CHART */
			// For the demo we use generated data, but normally it would be coming from the server

			var data = [], totalPoints = 200, $UpdatingChartColors = $("#updating-chart").css('color');

			function getRandomData() {
				if (data.length > 0)
					data = data.slice(1);

				// do a random walk
				while (data.length < totalPoints) {
					var prev = data.length > 0 ? data[data.length - 1] : 50;
					var y = prev + Math.random() * 10 - 5;
					if (y < 0)
						y = 0;
					if (y > 100)
						y = 100;
					data.push(y);
				}

				// zip the generated y values with the x values
				var res = [];
				for (var i = 0; i < data.length; ++i)
					res.push([i, data[i]])
				return res;
			}

			// setup control widget
			var updateInterval = 1500;
			$("#updating-chart").val(updateInterval).change(function() {

				var v = $(this).val();
				if (v && !isNaN(+v)) {
					updateInterval = +v;
					$(this).val("" + updateInterval);
				}

			});

			// setup plot
			var options = {
				yaxis : {
					min : 0,
					max : 100
				},
				xaxis : {
					min : 0,
					max : 100
				},
				colors : [$UpdatingChartColors],
				series : {
					lines : {
						lineWidth : 1,
						fill : true,
						fillColor : {
							colors : [{
								opacity : 0.4
							}, {
								opacity : 0
							}]
						},
						steps : false

					}
				}
			};

			var plot = $.plot($("#updating-chart"), [getRandomData()], options);

			/* live switch */
			$('input[type="checkbox"]#start_interval').click(function() {
				if ($(this).prop('checked')) {
					$on = true;
					updateInterval = 1500;
					update();
				} else {
					clearInterval(updateInterval);
					$on = false;
				}
			});

			function update() {
				if ($on == true) {
					plot.setData([getRandomData()]);
					plot.draw();
					setTimeout(update, updateInterval);

				} else {
					clearInterval(updateInterval)
				}

			}

			var $on = false;

			/*end updating chart*/

			/* TAB 2: Social Network  */

			$(function() {
				// jQuery Flot Chart
				var twitter = [[1, 27], [2, 34], [3, 51], [4, 48], [5, 55], [6, 65], [7, 61], [8, 70], [9, 65], [10, 75], [11, 57], [12, 59], [13, 62]], facebook = [[1, 25], [2, 31], [3, 45], [4, 37], [5, 38], [6, 40], [7, 47], [8, 55], [9, 43], [10, 50], [11, 47], [12, 39], [13, 47]], data = [{
					label : "Twitter",
					data : twitter,
					lines : {
						show : true,
						lineWidth : 1,
						fill : true,
						fillColor : {
							colors : [{
								opacity : 0.1
							}, {
								opacity : 0.13
							}]
						}
					},
					points : {
						show : true
					}
				}, {
					label : "Facebook",
					data : facebook,
					lines : {
						show : true,
						lineWidth : 1,
						fill : true,
						fillColor : {
							colors : [{
								opacity : 0.1
							}, {
								opacity : 0.13
							}]
						}
					},
					points : {
						show : true
					}
				}];

				var options = {
					grid : {
						hoverable : true
					},
					colors : ["#568A89", "#3276B1"],
					tooltip : true,
					tooltipOpts : {
						//content : "Value <b>$x</b> Value <span>$y</span>",
						defaultTheme : false
					},
					xaxis : {
						ticks : [[1, "JAN"], [2, "FEB"], [3, "MAR"], [4, "APR"], [5, "MAY"], [6, "JUN"], [7, "JUL"], [8, "AUG"], [9, "SEP"], [10, "OCT"], [11, "NOV"], [12, "DEC"], [13, "JAN+1"]]
					},
					yaxes : {

					}
				};

				var plot3 = $.plot($("#statsChart"), data, options);
			});

			// END TAB 2

			// TAB THREE GRAPH //
			/* TAB 3: Revenew  */

			$(function() {

				var trgt = [[1354586000000, 153], [1364587000000, 658], [1374588000000, 198], [1384589000000, 663], [1394590000000, 801], [1404591000000, 1080], [1414592000000, 353], [1424593000000, 749], [1434594000000, 523], [1444595000000, 258], [1454596000000, 688], [1464597000000, 364]], prft = [[1354586000000, 53], [1364587000000, 65], [1374588000000, 98], [1384589000000, 83], [1394590000000, 980], [1404591000000, 808], [1414592000000, 720], [1424593000000, 674], [1434594000000, 23], [1444595000000, 79], [1454596000000, 88], [1464597000000, 36]], sgnups = [[1354586000000, 647], [1364587000000, 435], [1374588000000, 784], [1384589000000, 346], [1394590000000, 487], [1404591000000, 463], [1414592000000, 479], [1424593000000, 236], [1434594000000, 843], [1444595000000, 657], [1454596000000, 241], [1464597000000, 341]], toggles = $("#rev-toggles"), target = $("#flotcontainer");

				var data = [{
					label : "Target Profit",
					data : trgt,
					bars : {
						show : true,
						align : "center",
						barWidth : 30 * 30 * 60 * 1000 * 80
					}
				}, {
					label : "Actual Profit",
					data : prft,
					color : '#3276B1',
					lines : {
						show : true,
						lineWidth : 3
					},
					points : {
						show : true
					}
				}, {
					label : "Actual Signups",
					data : sgnups,
					color : '#71843F',
					lines : {
						show : true,
						lineWidth : 1
					},
					points : {
						show : true
					}
				}]

				var options = {
					grid : {
						hoverable : true
					},
					tooltip : true,
					tooltipOpts : {
						//content: '%x - %y',
						//dateFormat: '%b %y',
						defaultTheme : false
					},
					xaxis : {
						mode : "time"
					},
					yaxes : {
						tickFormatter : function(val, axis) {
							return "$" + val;
						},
						max : 1200
					}

				};

				plot2 = null;

				function plotNow() {
					var d = [];
					toggles.find(':checkbox').each(function() {
						if ($(this).is(':checked')) {
							d.push(data[$(this).attr("name").substr(4, 1)]);
						}
					});
					if (d.length > 0) {
						if (plot2) {
							plot2.setData(d);
							plot2.draw();
						} else {
							plot2 = $.plot(target, d, options);
						}
					}

				};

				toggles.find(':checkbox').on('change', function() {
					plotNow();
				});
				plotNow()

			});

			/*
			 * VECTOR MAP
			 */

			data_array = {
				"US" : 4977,
				"AU" : 4873,
				"IN" : 3671,
				"BR" : 2476,
				"TR" : 1476,
				"CN" : 146,
				"CA" : 134,
				"BD" : 100
			};

			$('#vector-map').vectorMap({
				map : 'world_mill_en',
				backgroundColor : '#fff',
				regionStyle : {
					initial : {
						fill : '#c4c4c4'
					},
					hover : {
						"fill-opacity" : 1
					}
				},
				series : {
					regions : [{
						values : data_array,
						scale : ['#85a8b6', '#4d7686'],
						normalizeFunction : 'polynomial'
					}]
				},
				onRegionLabelShow : function(e, el, code) {
					if ( typeof data_array[code] == 'undefined') {
						e.preventDefault();
					} else {
						var countrylbl = data_array[code];
						el.html(el.html() + ': ' + countrylbl + ' visits');
					}
				}
			});

			/*
			 * FULL CALENDAR JS
			 */

			if ($("#calendar").length) {
				var date = new Date();
				var d = date.getDate();
				var m = date.getMonth();
				var y = date.getFullYear();

				var calendar = $('#calendar').fullCalendar({

					editable : true,
					draggable : true,
					selectable : false,
					selectHelper : true,
					unselectAuto : false,
					disableResizing : false,

					header : {
						left : 'title', //,today
						center : 'prev, next, today',
						right : 'month, agendaWeek, agenDay' //month, agendaDay,
					},

					select : function(start, end, allDay) {
						var title = prompt('Event Title:');
						if (title) {
							calendar.fullCalendar('renderEvent', {
								title : title,
								start : start,
								end : end,
								allDay : allDay
							}, true // make the event "stick"
							);
						}
						calendar.fullCalendar('unselect');
					},

					events : [{
						title : 'All Day Event',
						start : new Date(y, m, 1),
						description : 'long description',
						className : ["event", "bg-color-greenLight"],
						icon : 'fa-check'
					}, {
						title : 'Long Event',
						start : new Date(y, m, d - 5),
						end : new Date(y, m, d - 2),
						className : ["event", "bg-color-red"],
						icon : 'fa-lock'
					}, {
						id : 999,
						title : 'Repeating Event',
						start : new Date(y, m, d - 3, 16, 0),
						allDay : false,
						className : ["event", "bg-color-blue"],
						icon : 'fa-clock-o'
					}, {
						id : 999,
						title : 'Repeating Event',
						start : new Date(y, m, d + 4, 16, 0),
						allDay : false,
						className : ["event", "bg-color-blue"],
						icon : 'fa-clock-o'
					}, {
						title : 'Meeting',
						start : new Date(y, m, d, 10, 30),
						allDay : false,
						className : ["event", "bg-color-darken"]
					}, {
						title : 'Lunch',
						start : new Date(y, m, d, 12, 0),
						end : new Date(y, m, d, 14, 0),
						allDay : false,
						className : ["event", "bg-color-darken"]
					}, {
						title : 'Birthday Party',
						start : new Date(y, m, d + 1, 19, 0),
						end : new Date(y, m, d + 1, 22, 30),
						allDay : false,
						className : ["event", "bg-color-darken"]
					}, {
						title : 'Smartadmin Open Day',
						start : new Date(y, m, 28),
						end : new Date(y, m, 29),
						className : ["event", "bg-color-darken"]
					}],

					eventRender : function(event, element, icon) {
						if (!event.description == "") {
							element.find('.fc-event-title').append("<br/><span class='ultra-light'>" + event.description + "</span>");
						}
						if (!event.icon == "") {
							element.find('.fc-event-title').append("<i class='air air-top-right fa " + event.icon + " '></i>");
						}
					}
				});

			};

			/* hide default buttons */
			$('.fc-header-right, .fc-header-center').hide();

			// calendar prev
			$('#calendar-buttons #btn-prev').click(function() {
				$('.fc-button-prev').click();
				return false;
			});

			// calendar next
			$('#calendar-buttons #btn-next').click(function() {
				$('.fc-button-next').click();
				return false;
			});

			// calendar today
			$('#calendar-buttons #btn-today').click(function() {
				$('.fc-button-today').click();
				return false;
			});

			// calendar month
			$('#mt').click(function() {
				$('#calendar').fullCalendar('changeView', 'month');
			});

			// calendar agenda week
			$('#ag').click(function() {
				$('#calendar').fullCalendar('changeView', 'agendaWeek');
			});

			// calendar agenda day
			$('#td').click(function() {
				$('#calendar').fullCalendar('changeView', 'agendaDay');
			});

			/*
			 * CHAT
			 */

			$.filter_input = $('#filter-chat-list');
			$.chat_users_container = $('#chat-container > .chat-list-body')
			$.chat_users = $('#chat-users')
			$.chat_list_btn = $('#chat-container > .chat-list-open-close');
			$.chat_body = $('#chat-body');

			/*
			* LIST FILTER (CHAT)
			*/

			// custom css expression for a case-insensitive contains()
			jQuery.expr[':'].Contains = function(a, i, m) {
				return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
			};

			function listFilter(list) {// header is any element, list is an unordered list
				// create and add the filter form to the header

				$.filter_input.change(function() {
					var filter = $(this).val();
					if (filter) {
						// this finds all links in a list that contain the input,
						// and hide the ones not containing the input while showing the ones that do
						$.chat_users.find("a:not(:Contains(" + filter + "))").parent().slideUp();
						$.chat_users.find("a:Contains(" + filter + ")").parent().slideDown();
					} else {
						$.chat_users.find("li").slideDown();
					}
					return false;
				}).keyup(function() {
					// fire the above change event after every letter
					$(this).change();

				});

			}

			// on dom ready
			listFilter($.chat_users);

			// open chat list
			$.chat_list_btn.click(function() {
				$(this).parent('#chat-container').toggleClass('open');
			})

			$.chat_body.animate({
				scrollTop : $.chat_body[0].scrollHeight
			}, 500);

		});

	</script>
	
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
	
	// var ctx = document.getElementById('barChart').getContext('2d');
	// var chartHome = new Chart(ctx, {
		// type: 'bar',
		// data: {
			// labels: ['JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI', 'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER'],
			// datasets: [{
				// label: '# of Open Ticket',
				// data: [0, 0, 0, 0, 0, 0, 0, 0, 10],
				// backgroundColor: [
					// 'rgba(255, 99, 132, 0.2)',
				// ],
				// borderColor: [
					// 'rgba(255, 99, 132, 1)',
				// ],
				// borderWidth: 1
			// }, {
				// label: '# of Closed Ticket',
				// data: [12, 19, 3, 5, 2, 3, 3, 5, 3],
				// backgroundColor: [
					// 'rgba(54, 162, 235, 0.2)',
				// ],
				// borderColor: [
					// 'rgba(54, 162, 235, 1)',
				// ],
				// borderWidth: 1
			// }]
		// },
		// options: {
			// responsive: true,
			// plugins: {
				// legend: {
					// display: true,
				// }
			// }
		// }
	// });
	
	var data_json;
	var data_json2;
	
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
			// $.alert('Something went wrong.');
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
			// $.alert('Something went wrong.');
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
			// $.alert('Something went wrong.');
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
		// if(map!==undefined) {
			// geocoder.geocode({'address': kanwil}, function(results, status) {
				// if (status == 'OK') {
					// map.setCenter(results[0].geometry.location);
				// } else {
					// alert('Geocode was not successful for the following reason: ' + status);
				// }
			// });
		// }
		
		if (table_arr[kanwil] == undefined) {
			var base_url = "<?php echo base_url();?>";
			console.log(base_url + 'dashboard/crm_live_status/'+kanwil);
			table_arr[kanwil] = $('#example'+kanwil).DataTable({
				serverSide: true,
				ordering: false,
				searching: true,
				ajax: {
					url :  base_url + 'dashboard/crm_live_status/'+kanwil,
					type : 'POST',
					dataFilter: function(data) {
						console.log(data);
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
			loadScript("<?=BASE_LAYOUT?>js/plugin/flot/jquery.flot.cust.min.js", function(){
				loadScript("<?=BASE_LAYOUT?>js/plugin/flot/jquery.flot.resize.min.js", function(){
					loadScript("<?=BASE_LAYOUT?>js/plugin/flot/jquery.flot.fillbetween.min.js", function(){
						loadScript("<?=BASE_LAYOUT?>js/plugin/flot/jquery.flot.orderBar.min.js", function(){
							loadScript("<?=BASE_LAYOUT?>js/plugin/flot/jquery.flot.pie.min.js", function(){
								loadScript("<?=BASE_LAYOUT?>js/plugin/flot/jquery.flot.time.min.js", function(){
									loadScript("<?=BASE_LAYOUT?>js/plugin/flot/jquery.flot.tooltip.min.js", generatePageGraphs);
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

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XFilesystem\2022\JAN-W3\PREMESIS\coresys\views/pages/dash_performance/index.blade.php ENDPATH**/ ?>