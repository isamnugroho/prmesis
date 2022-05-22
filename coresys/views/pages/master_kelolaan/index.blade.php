@extends('layouts.master_layout')

@section('content')
	@include('pages/master_kelolaan/style')
	<section id="widget-grid" class="">
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: 0px 0px 0px 0px;">
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-deletebutton="false" data-widget-sortable="false" data-widget-editbutton="false">
					<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>Data Area & Location</b></h2>
						<span class="ribbon-button-alignment pull-right" style="margin: -22px 2px 0px 0px; ">
							<section>
								<a onclick="createModal()" class="btn btn-default btn-xs pull-right zoomsmall" style="float:left; background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); border-radius: 4px; margin: 14px 0px 0px 0px;height:28px; width:160px">
									<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=BASE_LAYOUT?>seipkon/assets/img/adddata.png" height="20" width="20" />
									<p class="small" style="margin: 6px 0px 0px 0px; ">
										<small style="color:black;font-size:12px; font-weight: bold;">Pilih Area & Location</small>
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
										<th data-class="expand">Nama Vendor</th>
										<th data-class="expand">Kanwil</th>
										<th data-hide="phone">Area</th>
										<th data-hide="phone">Time Zone</th>
										<th data-hide="phone,tablet" width="350px">Opsi/Fungsional</th>
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
				<span class="widget-icon"> <img style="float: left; margin: 8px 5px 0px 6px;" src="<?=BASE_LAYOUT?>/img/whiteloc.png" height="18" width="18" /> </span>
				<h2 style="color:white;font-size:14px; font-weight: bold; margin: -2px 0px 0px 10px;">Data Area & Location
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
										<label>Vendor</label>
										<select class="form-control" id="vendor" name="id_vendor" value="" required>
											<option value=""></option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Kantor Wilayah</label>
										<select class="form-control" id="kanwil" name="kanwil" value="" required>
											<option value=""></option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Group Area :</label>
										<input type="text" placeholder="" class="form-control" id="grup_area" name="grup_area" value="" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Time Zone</label>
										<select class="form-control" id="timezone" name="time_zone" value="" required>
											<option value="">-- Select Timezone --</option>
											<option value="WIB">WIB</option>
											<option value="WITA">WITA</option>
											<option value="WIT">WIT</option>
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
@endsection
@include('pages/master_kelolaan/script')

