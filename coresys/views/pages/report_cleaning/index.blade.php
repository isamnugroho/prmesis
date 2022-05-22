@extends('layouts.master_layout')

@section('content')
	@include('pages/report_cleaning/style')
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
										<th data-hide="phone">ID</th>
										<th data-hide="phone">Tanggal</th>
										<th data-class="expand">TID</th>
										<th data-hide="phone">Kanwil</th>
										<th data-hide="phone">Lokasi</th>
										<th data-hide="phone">Alamat</th>
										<th data-hide="phone,tablet">Report Pagi</th>
										<th data-hide="phone,tablet">Report Sore</th>
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
						<form action="<?=base_url().explode("/", $that->uri->uri_string())[0].''?>" style="width: 90%; text-align: left;" autocomplete="off">
							<input type="hidden" placeholder="" class="form-control" id="id" name="id" value="">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group staff">
										<label>Search By</label>
										<select class="form-control" id="search_by" name="search_by" value="" required>
											<option value=""></option>
											<option value="daily">Daily</option>
											<option value="monthly">Monthly</option>
											<!--<option value="range">Range</option>-->
										</select>
									</div>
								</div>
								<div class="col-md-12" id="view_date" style="display: none">
									<div class="form-group">
										<label>Date Search <span id="text_view_date"></span></label>
										<input type="text" class="form-control" style="display: none" name="date_daily" 
											id="date_daily" placeholder="Select date" value="<?=date("d/m/Y")?>" />
										<input type="text" class="form-control" style="display: none" name="date_montly" 
											id="date_montly" placeholder="Select date" value="<?=date("m/Y")?>" />
										<input type="text" class="form-control" style="display: none" name="date_range" 
											id="date_range" placeholder="Select date" value="<?=date("d/m/Y")?> - <?=date("d/m/Y")?>" />
									</div>
									<div class="form-group staff">
										<label>Kanwil</label>
										<select class="form-control" id="kanwil" name="kanwil" value="" required>
											<option value=""></option>
										</select>
									</div>
								</div>
								<div class="col-md-12" id="view_kanwil" style="display: none">
									<div class="form-group staff">
										<label>Staff</label>
										<select class="form-control" id="staff" name="username" value="" required>
											<option value=""></option>
										</select>
									</div>
								</div>
								<div class="col-md-12" id="view_kanwil" style="display: none">
									<div class="form-group">
										<label class="control-label">Level :</label>
										<select class="form-control" id="level" name="level" value="" required>
											<option value="">-- Select Level --</option>
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
@endsection
@include('pages/report_cleaning/script')

