

<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('pages_koord/trans_schedule/style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<section id="widget-grid" class="">
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: 0px 0px 0px 0px;">
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-deletebutton="false" data-widget-sortable="false" data-widget-editbutton="false">
					<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>Data Work Schedule</b></h2>
						<span class="ribbon-button-alignment pull-right" style="margin: -22px 2px 0px 0px; ">
							<section>
							</section>
						</span>
					</header>
					<div>
						<div class="widget-body no-padding">
							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th data-class="expand">NO</th>
										<th data-hide="phone">Nama Vendor</th>
										<th data-class="expand">Kanwil</th>
										<th data-class="expand">Area</th>
										<th data-hide="phone">Nama Koordinator</th>
										<th data-hide="phone">Team/Petugas</th>
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
				<span class="widget-icon"> <img style="float: left; margin: 8px 5px 0px 6px;" src="<?=BASE_LAYOUT?>/img/taskyellow.png" height="18" width="18" /> </span>
				<h2 style="color:white;font-size:14px; font-weight: bold; margin: -2px 0px 0px 10px;">Data Work Schedule
				</h2>

			</header>
			<div>
				<div class="widget-body no-padding" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
					<br>
					<center>
						<form action="<?=base_url().explode("/", $that->uri->uri_string())[0].'/insert'?>" style="width: 90%; text-align: left;">
							<input type="hidden" placeholder="" class="form-control" id="id" name="id" value="">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>VENDOR</label>
										<select class="form-control" id="vendor" name="vendor" value="" required>
											<option value=""></option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group id_lokasi" hidden>
										<label class="control-label">Group Area :</label>
										<select class="form-control" id="id_lokasi" name="id_lokasi" value="" required>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group pic" hidden>
										<label>Leader</label>
										<select class="form-control" id="pic" name="pic" value="" required>
											<option value=""></option>
										</select>
									</div>
								</div>
								<div class="col-md-12" hidden>
									<div class="form-group team" hidden>
										<label>TEAM</label>
										<select class="form-control" id="team" name="team[]" multiple="multiple" required>
											<option value=""></option>
										</select>
									</div>
								</div>
							</div>
						</form>
					</center>
				</div>
			</div>
		</div>
	</article>	
	
	<article class="col-sm-12 col-md-12 col-lg-12 container content_assign_form" hidden>
		<div style="margin: 0px 0px -40px 0px;" class="jarviswidget jarviswidget-color-purple" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false" 
		data-widget-colorbutton="false" data-widget-deletebutton="false">
			<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
				<span class="widget-icon"> <img style="float: left; margin: 8px 5px 0px 6px;" src="<?=BASE_LAYOUT?>/img/taskyellow.png" height="18" width="18" /> </span>
				<h2 style="color:white;font-size:14px; font-weight: bold; margin: -2px 0px 0px 10px;">Data Work Schedule
				</h2>

			</header>
			<div>
				<div class="widget-body no-padding" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
					<br>
					<center>
						<form action="<?=base_url().explode("/", $that->uri->uri_string())[0].'/trans_schedule/insert_assign'?>" style="width: 95%; text-align: left;">
							<input type="hidden" placeholder="" class="form-control" id="id_detail" name="id_detail" value="">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>PETUGAS</label>
										<select class="form-control" id="petugas" name="petugas" value="" required>
											<option value=""></option>
										</select>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<a href='#' id='open_kelolaan_list' class='btn btn-success btn-sm' 
											style='background: linear-gradient(to bottom, #69c167, #13aa1d);border-radius: 4px;font-weight:bold; float: right;'>
											<img style='float: left; margin: 1px 0px 5px 0px; height:15px; width:15px;' src='<?=BASE_LAYOUT?>/img/adddata.png'/>
											Open List Kelolaan
										</a>
									</div>
								</div>
							</div>
							<table id="dt_basicxx" class="table table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th data-hide="phone">NO</th>
										<th data-class="expand">TID</th>
										<th data-hide="phone">Alamat</th>
										<th data-hide="phone,tablet" width="160px">Opsi/Fungsional</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</form>
					</center>
				</div>
			</div>
		</div>
	</article>	
	
	<article class="col-sm-12 col-md-12 col-lg-12 container content_assign_add_form" hidden>
		<div style="margin: 0px 0px -40px 0px;" class="jarviswidget jarviswidget-color-purple" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false" 
		data-widget-colorbutton="false" data-widget-deletebutton="false">
			<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
				<span class="widget-icon"> <img style="float: left; margin: 8px 5px 0px 6px;" src="<?=BASE_LAYOUT?>/img/atm2.png" height="18" width="18" /> </span>
				<h2 style="color:white;font-size:14px; font-weight: bold; margin: -2px 0px 0px 10px;">Data Mesin ATM
				</h2>
			</header>
			<div>
				<div class="widget-body no-padding" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
					<br>
					<center>
						<form action="<?=base_url().explode("/", $that->uri->uri_string())[0].'/trans_schedule/insert_assign'?>" style="width: 95%; text-align: left;">
							<input type="hidden" placeholder="" class="form-control" id="id_lokasi" name="id_lokasi" value="<?=$id?>">
							<div class="row">
								<div class="col-md-12" style="width: 100%">
									<table id="datatable2" class="display table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th>TID</th>
												<th>Kanwil</th>
												<th>Alamat</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</form>
					</center>
				</div>
			</div>
		</div>
	</article>	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages_koord/trans_schedule/script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->make('layouts.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV_SERVER\htdocs\2022\25-01-2022\premesis\coresys\views/pages_koord/trans_schedule/index.blade.php ENDPATH**/ ?>