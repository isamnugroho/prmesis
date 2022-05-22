

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
						<br>
						<br>
						<br>
						<br>
							<center>
							<h2 style="font-weight:bold;">This Module/Function is Coming soon</h2>
							</center>
						<br>
						<br>
						<br>
						<br>	
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


<?php echo $__env->make('layouts.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV_SERVER\htdocs\2022\premesis\coresys\views/pages/helpdesk/index.blade.php ENDPATH**/ ?>