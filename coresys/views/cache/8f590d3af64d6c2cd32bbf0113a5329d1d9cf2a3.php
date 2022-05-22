

<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('pages/helpdesk/style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<section id="widget-grid" class="">
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: 0px 0px 0px 0px;">
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-deletebutton="false" data-widget-sortable="false" data-widget-editbutton="false">
					<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>On Progress Development</b></h2>
						
					</header>
					<div>
						<div class="widget-body no-padding">						
							<div style="margin: 0px 0px 0px 0px;">
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="height:310px;"></div>
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="height:310px;">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%);height:310px;">
										<img style="float: left; margin: 8px 2px 0px 0px;" src="<?=base_url()?>assets/img/pagi.png" height="30" width="30" />
										<p class="small" style="color:dimgray; margin: 8px 0px 0px 0px;">
											<small style="font-size:14px; margin: 0px 0px 0px 0px; font-weight: bold;">REPORT STORAGE</small><br>
											<small style="font-size:10px;">Current Report Storage</small>
										</p>	
										<link rel="stylesheet" href="<?=BASE_LAYOUT?>v153/progressbar/style.css">					
										<div class="progress" style="margin: 15px 0px 0px 0px; height: 240px;">
											<br>
											<small style="float:left; color:black;font-size:12px;"> Percentage Memory Usage : </small> 
											<small style="float:right; color:black;font-size:12px; font-weight: bold;"> <?=$persen['persen']?>%</small><br>
											<small style="float:left; color:black;font-size:12px;"> Total Memory Usage : </small> 
											<small style="float:right; color:black;font-size:12px; font-weight: bold;"> <?=$mem['value']?> <?=$mem['unit']?> / <?=$persen['target']?></small><br><br>
											<div data-progress="<?=$persen['persen']?>"></div>
											<script src="<?=BASE_LAYOUT?>v153/progressbar/script.js"></script>		
											
											<center>
												<?php 
													if($count_local_db>0) {
												?>
														<a href="<?=base_url()?>report_backup/backup" class="btn btn-default btn-xs zoomsmall" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); border-radius: 4px; margin: 14px 0px 0px 0px;height:28px; width:160px">
															<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>assets/img/brangkas2.png" height="20" width="20" />
															<p class="small" style="margin: 3px 0px 3px 0px; ">
																<small style="color:black;font-size:12px; font-weight: bold;">Backup</small>
															</p>
														</a>
												<?php 
													}
												?>
												<?php 
													if($count_backup>0) {
												?>
														<a href="<?=base_url()?>report_backup/delete_data" class="btn btn-default btn-xs zoomsmall" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); border-radius: 4px; margin: 14px 0px 0px 0px;height:28px; width:160px">
															<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>assets/img/delete.png" height="20" width="20" />
															<p class="small" style="margin: 3px 0px 3px 0px; ">
																<small style="color:black;font-size:12px; font-weight: bold;">Delete</small>
															</p>
														</a>
												<?php 
													}
												?>
											</center>
										</div>
									</div>
								</div>
							</div>
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
				<span class="widget-icon"> <img style="float: left; margin: 8px 5px 0px 6px;" src="<?=BASE_LAYOUT?>/img/lock.png" height="18" width="18" /> </span>
				<h2 style="color:white;font-size:14px; font-weight: bold; margin: -2px 0px 0px 10px;">Tambah User Access
				</h2>

			</header>
			<div>
				<div class="widget-body no-padding" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
					<br>
					<center>
						<form action="<?=base_url().explode("/", $that->uri->uri_string())[0].'/insert'?>" style="width: 90%; text-align: left;" autocomplete="off">
							<input type="hidden" placeholder="" class="form-control" id="id" name="id" value="">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group staff">
										<label>Staff</label>
										<select class="form-control" id="staff" name="username" value="" required>
											<option value=""></option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">Level :</label>
										<select class="form-control" id="level" name="level" value="" required>
											<option value="">-- Select Level --</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">Password :</label>
										<input type="text" style="display:none;">
										<input type="password" placeholder="" class="form-control" id="password" name="password" value="" autocomplete="false" required>
									</div>
								</div>
							</div>
						</form>
					</center>
				</div>
			</div>
		</div>
	</article>	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages/helpdesk/script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->make('layouts.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV_SERVER\htdocs\2022\25-01-2022\premesis\coresys\views/pages/report_backup/index.blade.php ENDPATH**/ ?>