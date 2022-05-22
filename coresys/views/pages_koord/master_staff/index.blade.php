@extends('layouts.master_layout')

@section('content')
	@include('pages_koord/master_staff/style')
	<section id="widget-grid" class="">
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: 0px 0px 0px 0px;">
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-deletebutton="false" data-widget-sortable="false" data-widget-editbutton="false">
					<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>Data Karyawan/Staff</b></h2>
						<span class="ribbon-button-alignment pull-right" style="margin: -22px 2px 0px 0px; ">
						</span>
					</header>
					<div>
						<div class="widget-body no-padding">
							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th data-hide="phone">NO</th>
										<th data-class="expand">Nama Vendor</th>
										<th data-hide="phone">NIK</th>
										<th data-hide="phone">Nama</th>
										<th data-hide="phone">Area Kelolaan</th>
										<th data-hide="phone,tablet" width="250px">Opsi/Fungsional</th>
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
				<span class="widget-icon"> <img style="float: left; margin: 8px 5px 0px 6px;" src="<?=BASE_LAYOUT?>/img/userpro.png" height="18" width="18" /> </span>
				<h2 style="color:white;font-size:14px; font-weight: bold; margin: -2px 0px 0px 10px;">Tambah Karyawan/Staff
				</h2>
			</header>
			<div>
				<div class="widget-body no-padding" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
					<br>
					<center>
						<form action="<?=base_url().explode("/", $that->uri->uri_string())[0].'/master_staff/insert'?>" style="width: 95%; text-align: left;">
							<input type="hidden" placeholder="" class="form-control" id="id" name="id" value="">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Vendor</label>
										<select class="form-control" id="vendor" name="id_vendor" value="" required>
											<option value=""></option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">NIK :</label>
										<input type="text" placeholder="" class="form-control" id="nik" name="nik" value="" readonly>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Nama :</label>
										<input type="text" placeholder="" class="form-control" id="nama" name="nama" value="" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Jenis Kelamin :</label>
										<select class="form-control" id="jk" name="jk" value="" required>
											<option value="">-- Select Jenis Kelamin --</option>
											<option value="PRIA">PRIA</option>
											<option value="WANITA">WANITA</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Handphone :</label>
										<input type="text" placeholder="" class="form-control" id="hp" name="hp" value="" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Email :</label>
										<input type="text" placeholder="" class="form-control" id="email" name="email" value="" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">Alamat :</label>
										<input type="text" placeholder="" class="form-control" id="alamat" name="alamat" value="" required>
									</div>
								</div>
							</div>
						</form>
					</center>
				</div>
			</div>
		</div>
	</article>	
	
	<article class="col-sm-12 col-md-12 col-lg-12 container content_list_petugas" hidden>
		<div style="margin: 0px 0px -40px 0px;" class="jarviswidget jarviswidget-color-purple" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false" 
		data-widget-colorbutton="false" data-widget-deletebutton="false">
			<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
				<span class="widget-icon"> <img style="float: left; margin: 8px 5px 0px 6px;" src="<?=BASE_LAYOUT?>/img/atm2.png" height="18" width="18" /> </span>
				<h2 style="color:white;font-size:14px; font-weight: bold; margin: -2px 0px 0px 10px;">Data Petugas
				</h2>
			</header>
			<div>
				<div class="widget-body no-padding" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
					<br>
					<center>
						<form action="<?=base_url().explode("/", $that->uri->uri_string())[0].'/master_staff/insert_petugas'?>" style="width: 95%; text-align: left;">
							<input type="hidden" placeholder="" class="form-control" id="id_lokasi" name="id_lokasi" value="<?=$id?>">
							<div class="row">
								<div class="col-md-12" style="width: 100%">
									<div class="row">
										<div class="col-sm-6"></div>
										<div class="col-sm-6">
											<div class="form-group">
												<a href='#' id='add_petugas_list' class='btn btn-success btn-sm' 
													style='background: linear-gradient(to bottom, #69c167, #13aa1d);border-radius: 4px;font-weight:bold; float: right;'>
													<img style='float: left; margin: 1px 0px 5px 0px; height:15px; width:15px;' src='<?=BASE_LAYOUT?>/img/adddata.png'/>
													Add Petugas
												</a>
											</div>
										</div>
									</div>
									<table id="datatable2" class="display table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th>NO</th>
												<th>NIK</th>
												<th>Nama</th>
												<th width="280px">Action</th>
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
	
	<article class="col-sm-12 col-md-12 col-lg-12 container content_form_user_access" hidden>
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
						<form action="<?=base_url().'master_user/insert'?>" style="width: 90%; text-align: left;" autocomplete="off">
							<input type="hidden" placeholder="" class="form-control" id="id" name="id" value="">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group staff">
										<label>Staff</label>
										<!--<select class="form-control" id="staff" name="username" value="" required>
											<option value=""></option>
										</select>-->
										
										<input type="text" placeholder="" class="form-control" id="staff" name="username" value="" readonly>
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
	
	<article class="col-sm-12 col-md-12 col-lg-12 container content_form_team" hidden>
		<div style="margin: 0px 0px -40px 0px;" class="jarviswidget jarviswidget-color-purple" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false" 
		data-widget-colorbutton="false" data-widget-deletebutton="false">
			<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
				<span class="widget-icon"> <img style="float: left; margin: 8px 5px 0px 6px;" src="<?=BASE_LAYOUT?>/img/userpro.png" height="18" width="18" /> </span>
				<h2 style="color:white;font-size:14px; font-weight: bold; margin: -2px 0px 0px 10px;">Tambah Petugas Cleaning
				</h2>

			</header>
			<div>
				<div class="widget-body no-padding" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
					<br>
					<center>
						<form action="<?=base_url().explode("/", $that->uri->uri_string())[0].'/master_staff/insert_team'?>" style="width: 95%; text-align: left;">
							<input type="hidden" placeholder="" class="form-control" id="id" name="id" value="">
							<input type="hidden" placeholder="" class="form-control" id="id_koord" name="id_koord" value="">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Vendor</label>
										<!--<select class="form-control" id="vendor" name="id_vendor" value="" readonly>
											<option value=""></option>
										</select>-->
										<input type="hidden" placeholder="" class="form-control" id="id_vendor" name="id_vendor" value="" readonly>
										<input type="text" placeholder="" class="form-control" id="vendor" name="vendor" value="" readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">NIK :</label>
										<input type="text" placeholder="" class="form-control" id="nik" name="nik" value="" readonly>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Nama :</label>
										<input type="text" placeholder="" class="form-control" id="nama" name="nama" value="" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Jenis Kelamin :</label>
										<select class="form-control" id="jk" name="jk" value="" required>
											<option value="">-- Select Jenis Kelamin --</option>
											<option value="PRIA">PRIA</option>
											<option value="WANITA">WANITA</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Handphone :</label>
										<input type="text" placeholder="" class="form-control" id="hp" name="hp" value="" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Email :</label>
										<input type="text" placeholder="" class="form-control" id="email" name="email" value="" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">Alamat :</label>
										<input type="text" placeholder="" class="form-control" id="alamat" name="alamat" value="" required>
									</div>
								</div>
							</div>
						</form>
					</center>
				</div>
			</div>
		</div>
	</article>	
@endsection
@include('pages_koord/master_staff/script')

