

<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('pages/master_atm/style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<section id="widget-grid" class="">
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: 0px 0px 0px 0px;">
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-deletebutton="false" data-widget-sortable="false" data-widget-editbutton="false">
					<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>Data Mesin CRM (Overall)</b></h2>
						<span class="ribbon-button-alignment pull-right" style="margin: -22px 2px 0px 0px; ">
							<section>
								<a onclick="createModal()" class="btn btn-default btn-xs pull-right zoomsmall" style="float:left; background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); border-radius: 4px; margin: 14px 0px 0px 0px;height:28px; width:155px">
									<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=BASE_LAYOUT?>seipkon/assets/img/adddata.png" height="20" width="20" />
									<p class="small" style="margin: 6px 0px 0px 0px; ">
										<small style="color:black;font-size:12px; font-weight: bold;">Tambah Mesin CRM</small>
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
										<th data-class="expand">NO</th>
										<th data-class="expand">TID</th>
										<th data-class="expand">Kanwil</th>
										<th data-hide="phone">Nama KC Supervisi</th>
										<th data-hide="phone">Nama Unit Kerja</th>
										<th data-hide="phone,tablet">Lokasi Mesin CRM</th>
										<th data-hide="phone,tablet">Alamat</th>
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
				<h2 style="color:white;font-size:14px; font-weight: bold; margin: -2px 0px 0px 10px;">Data Mesin CRM
				</h2>

			</header>
			<div>
				<div class="widget-body no-padding" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
					<br>
					<center>
						<form action="<?=base_url().explode("/", $that->uri->uri_string())[0].'/insert'?>" style="width: 95%; text-align: left;">
							<input type="hidden" placeholder="" class="form-control" id="id" name="id" value="">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">TID :</label>
										<input type="text" placeholder="" class="form-control" id="tid" name="tid" value="" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Merk Mesin :</label>
										<input type="text" placeholder="" class="form-control" id="merk_mesin" name="merk_mesin" value="" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Type Mesin :</label>
										<input type="text" placeholder="" class="form-control" id="type_mesin" name="type_mesin" value="" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">SN Mesin :</label>
										<input type="text" placeholder="" class="form-control" id="sn_mesin" name="sn_mesin" value="" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Kanwil :</label>
										<input type="text" placeholder="" class="form-control" id="kanwil" name="kanwil" value="" required>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Cabang :</label>
										<input type="text" placeholder="" class="form-control" id="cabang" name="cabang" value="" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Nama Unit :</label>
										<input type="text" placeholder="" class="form-control" id="nama_unit" name="nama_unit" value="" required>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Lokasi :</label>
										<input type="text" placeholder="" class="form-control" id="lokasi" name="lokasi" value="" required>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Zonasi :</label>
										<input type="text" placeholder="" class="form-control" id="zonasi" name="zonasi" value="" required>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Alamat :</label>
										<input type="text" placeholder="" class="form-control" id="alamat" name="alamat" value="" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Kelurahan :</label>
										<input type="text" placeholder="" class="form-control" id="kelurahan" name="kelurahan" value="" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Kecamatan :</label>
										<input type="text" placeholder="" class="form-control" id="kecamatan" name="kecamatan" value="" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Kabupaten :</label>
										<input type="text" placeholder="" class="form-control" id="kabupaten" name="kabupaten" value="" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Keterangan :</label>
										<input type="text" placeholder="" class="form-control" id="keterangan" name="keterangan" value="" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">PIC :</label>
										<input type="text" placeholder="" class="form-control" id="pic" name="pic" value="" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Contanct PIC :</label>
										<input type="text" placeholder="" class="form-control" id="hp_pic" name="hp_pic" value="" required>
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
<?php echo $__env->make('pages/master_atm/script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->make('layouts.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XFilesystem\2022\JAN-W3\PREMESIS\coresys\views/pages/master_atm/index.blade.php ENDPATH**/ ?>