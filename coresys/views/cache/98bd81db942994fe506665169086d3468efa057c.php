

<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('pages/complain_management/style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<section id="widget-grid" class="">
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: 0px 0px 0px 0px;">
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-deletebutton="false" data-widget-sortable="false" data-widget-editbutton="false">
					<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>Cleaning Report Overall</b></h2>
						<span class="ribbon-button-alignment pull-right" style="margin: -22px 2px 0px 0px; ">
							<section>
								<a onclick="createModal()" class="btn btn-default btn-xs pull-right zoomsmall" style="float:left; background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); border-radius: 4px; margin: 14px 0px 0px 0px;height:28px; width:200px">
									<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=BASE_LAYOUT?>seipkon/assets/img/adddata.png" height="20" width="20" />
									<p class="small" style="margin: 6px 0px 0px 0px; ">
										<small style="color:black;font-size:12px; font-weight: bold;">Search & Filter Data Report</small>
									</p>
								</a>
							</section>
						</span>
					</header>
					<div>
						<div class="widget-body no-padding">
							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th data-hide="phone">NO</th>
										<th data-hide="phone">Kanwil</th>
										<th data-hide="phone">Grup Area</th>
										<th data-hide="phone">Switch From</th>
										<th data-hide="phone">Switch To</th>
										<th data-hide="phone">Date From</th>
										<th data-hide="phone">Date To</th>
										<th data-hide="phone">Reason</th>
										<th data-hide="phone,tablet" width="160px">Opsi/Fungsional</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</article>
		</div>
	</section>
	
	<article class="col-sm-12 col-md-12 col-lg-12 container content_form" hidden>
		<div style="margin: 0px 0px -40px 0px;" class="jarviswidget jarviswidget-color-purple" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false" 
		data-widget-colorbutton="false" data-widget-deletebutton="false">
			<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
				<span class="widget-icon"> <img style="float: left; margin: 8px 5px 0px 6px;" src="<?=BASE_LAYOUT?>/img/atm2.png" height="18" width="18" /> </span>
				<h2 style="color:white;font-size:14px; font-weight: bold; margin: -2px 0px 0px 10px;">Search & Filter Report Data Report
				</h2>

			</header>
			<div>
				<div class="widget-body no-padding" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
					<br>
					<center>
						<form action="<?=base_url().explode("/", $that->uri->uri_string())[0].'/insert'?>" style="width: 90%; text-align: left;" autocomplete="off">
							<input type="hidden" placeholder="" class="form-control" id="id" name="id" value="">
							<div class="row">
								<div class="col-sm-6 col-md-6 col-sm-12">
									<div class="form-group staff">
										<label>Input By</label>
										<select class="form-control" id="search_by" name="search_by" value="" required>
											<option value=""></option>
											<option value="harian">Harian</option>
											<option value="range">Range</option>
										</select>
									</div>
								</div>
								
								<div class="col-sm-6 col-lg-6">
									<div class="form-group staff">
										<label>Kanwil</label>
										<select class="form-control" id="kanwil" name="kanwil" value="" required>
											<option value=""></option>
										</select>
									</div>
								</div>
							</div>
							<div class="row" id="view_date" style="display: none">
								<div class="col-md-12">
									<div class="form-group">
										<label>Date Input <span id="text_view_date"></span></label>
										<input type="text" class="form-control" style="display: none" name="date_harian" 
											id="date_harian" placeholder="Select date" value="<?=date("d/m/Y")?>" />
										<input type="text" class="form-control" style="display: none" name="date_range" 
											id="date_range" placeholder="Select date" value="<?=date("d/m/Y")?> - <?=date("d/m/Y")?>" />
									</div>
								</div>
							</div>
							
							<div class="row" id="view_switch" style="display: none">
								<div class="col-sm-6 col-lg-6">
									<div class="form-group staff">
										<label>Dari</label>
										<select class="form-control" id="pic_from" name="pic_from" value="" required>
											<option value=""></option>
										</select>
									</div>
								</div>
								<div class="col-sm-6 col-lg-6">
									<div class="form-group staff">
										<label>Ke</label>
										<select class="form-control" id="pic_to" name="pic_to" value="" required>
											<option value=""></option>
										</select>
									</div>
								</div>
							</div>
							
							<div class="row" id="view_reason" style="display: none">
								<div class="col-sm-12 col-lg-12">
									<div class="form-group staff">
										<label>Reason</label>
										<input type="text" class="form-control" name="reason" id="reason" placeholder="Input Reason" value="" />
									</div>
								</div>
							</div>
							
						</form>
					</center>
				</div>
			</div>
		</div>
	</article>	
	
	<article class="col-sm-12 col-md-12 col-lg-12 container content_form_preview" hidden>
		<div style="margin: 0px 0px -40px 0px;" class="jarviswidget jarviswidget-color-purple" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false" 
		data-widget-colorbutton="false" data-widget-deletebutton="false">
			<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
				<span class="widget-icon"> <img style="float: left; margin: 8px 5px 0px 6px;" src="<?=BASE_LAYOUT?>/img/pdf.png" height="18" width="18" /> </span>
				<h2 style="color:white;font-size:14px; font-weight: bold; margin: -2px 0px 0px 10px;">View Report 
				</h2>

			</header>
			<div>
				<div class="widget-body no-padding" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
					<iframe id="iframe" src="" width="100%" height="500px"></iframe>
				</div>
			</div>
		</div>
	</article>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages/complain_management/script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->make('layouts.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV_SERVER\htdocs\2022\premesis\coresys\views/pages/complain_management/index.blade.php ENDPATH**/ ?>