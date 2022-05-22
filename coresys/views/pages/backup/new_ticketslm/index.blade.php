@extends('layouts.master')

@section('stylesheet')
	<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>bootstrap-datetimepicker/css/bootstrap-datetimepicker.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css">
@endsection

@section('breadcrumb')
@endsection

@section('content')
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>datatables/datatables.css"/>
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>datatables/fixedColumns.dataTables.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>datatables/scroller.dataTables.min.css"/>
	<script type="text/javascript" src="<?=BASE_URL?>datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?=BASE_URL?>datatables/dataTables.fixedColumns.min.js"></script>
	<style>
		/*	start styles for the ContextMenu	*/
		.context_menu {
			background-color: #ebebeb;
			border: 1px solid black;
		}

		.context_menu_item {
			padding: 3px 6px;
		}

		.context_menu_item:hover {
			background-color: #CCCCCC;
		}

		.context_menu_separator {
			background-color: gray;
			height: 1px;
			margin: 0;
			padding: 0;
		}
		
		.controls {
			margin-top: 10px;
			border: 1px solid transparent;
			border-radius: 2px 0 0 2px;
			box-sizing: border-box;
			-moz-box-sizing: border-box;
			height: 40px;
			color: rgb(86, 86, 86);
			font-family: Roboto, Arial, sans-serif;
			-moz-user-select: none;
			font-size: 18px;
			background-color: rgb(255, 255, 255);
			padding: 0px 17px;
			border-bottom-right-radius: 2px;
			border-top-right-radius: 2px;
			background-clip: padding-box;
			box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px;
			min-width: 64px;
			border-left: 0px none;
			outline: currentcolor none medium;
		}
		
		#searchInput {
			background-color: #fff;
			font-family: Roboto;
			font-size: 15px;
			font-weight: 300;
			margin-left: 12px;
			padding: 0 11px 0 13px;
			text-overflow: ellipsis;
			width: 50%;
		}

		#searchInput:focus {
			border-color: #4d90fe;
		}

		ul#geoData {
			text-align: left;
			font-weight: bold;
			margin-top: 10px;
		}

		ul#geoData span {
			font-weight: normal;
		}
		
		.pac-container {
			z-index: 99999999 !important;
		}
		
		.modal-open .select2-container {
		  z-index: 9999;
		}
	</style>
	<style>
	hanzmobview{
	  margin: 0 auto;
	}
	hanzmobview{
	  display: inline;
	}

	@media screen and (max-width: 1024px){
	hanzmobview{
		display: none;
	  }
	article{
	  padding: 20px;
	  }
	}
	</style>
	<div class="row">
	<hanzmobview>
		<article class="btn-group col-sm-12">
			<div class="navbar navbar-default" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 5px 5px 0px 0px;">
				<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
				<a href="new_ticketslm" class="btn btn-default btn-circle btn-sm zoomsmall active">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>assets/img/slmticket.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">New Tickets SLM</small><br>
						<small style="color:white;font-size:12px;">Create New Issue Tickets</small>
					</p>
				</a>
				</div>
				<div class="col-sm-3" style="margin: 5px 0px 0px -40px;">
				<a href="status_ticketslm" class="btn btn-default btn-circle btn-sm zoomsmall">
				<img style="float: left; margin: -1px 10px 0px 6px;" src="<?=base_url()?>assets/img/n6.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Status Tickets</small><br>
						<small style="color:white;font-size:12px;">Status Ticket SLM</small>
					</p>
				</a>
				</div>
				<div class="col-sm-3" style="margin: 5px 0px 0px -60px;">
				<a href="slm_history" class="btn btn-default btn-circle btn-sm zoomsmall ">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>assets/img/n14.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">History Ticket</small><br>
						<small style="color:white;font-size:12px;">SLM Historycal Data</small>
					</p>
				</a>
				</div>
				<div class="col-sm-2" style="margin: 5px 0px 0px -50px;">
				<a href="slm_doc" class="btn btn-default btn-circle zoomsmall">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>assets/img/n26.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Documentation</small><br>
						<small style="color:white;font-size:12px;">SLM Documentation</small>
					</p>
				</a>
				</div>
				<div class="col-sm-2" style="margin: 5px 0px 0px 40px;">
				<a href="slm_checklist" class="btn btn-default btn-circle btn-sm zoomsmall">
				<img style="float: left; margin: -2px 10px 0px 4px;" src="<?=base_url()?>assets/img/n38.png" height="25" width="25" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">SLM Job Checklist</small><br>
						<small style="color:white;font-size:12px;">SLM Function Checklist</small>
					</p>
				</a>
				</div>			
			</div>
		</article>
	</hanzmobview>
	</div>
<!-- widget grid -->
	<section id="widget-grid" class="">
		<!-- row -->
		<div class="row">
			
			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: -20px 0px -30px 0px;">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" 	
					data-widget-colorbutton="false" 
					data-widget-togglebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-deletebutton="false"
					data-widget-sortable="false"
					data-widget-editbutton="false"
					>
					
					<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>Data New Issue Tickets - SLM</b></h2>
						
					</header>
					<!--<span class="ribbon-button-alignment pull-right" style="margin: -42px 0px 0px 0px;"> 
						<section>	
							<a onclick="createModal()" class="btn btn-primary pull-right zoomsmall" style="background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;width: 100%;height:30px"><img style="float: left; margin: -2px 5px 0px 0px;" src="<?=base_url()?>assets/img/tikopen.png" height="20" width="20" /><b>Tambah New Ticket</b></a>
						</section>	
					</span>-->
					<span class="ribbon-button-alignment pull-right" style="margin: -42px 5px 0px 0px; "> 
						<section style="display: none">	
							<button class="btn btn-primary pull-right zoomsmall reload" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);border-radius: 4px;width: 100%;height:30px;color:black"><img style="float: left; margin: -2px 5px 0px 0px;" src="<?=base_url()?>assets/img/tikopen.png" height="20" width="20" /><b>Reload</b></button>
						</section>	
						<section>	
							<button class="btn btn-primary pull-right zoomsmall launch-modal" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);border-radius: 4px;width: 100%;height:30px;color:black"><img style="float: left; margin: -2px 5px 0px 0px;" src="<?=base_url()?>assets/img/tikopen.png" height="20" width="20" /><b>Tambah New Ticket</b></button>
						</section>	
					</span>
					<div>
						<div class="widget-body no-padding">
							<div class="custom-scroll table-responsive" style="height:560px; overflow-y: scroll;overflow-x: scroll;">
							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%" hidden>
								<thead>			                
									<tr>
										<th data-hide="phone">No.</th>
										<th data-class="expand">ID ATM</th>
										<th data-class="expand">Area Service Coverage</th>
										<th data-class="expand" >Lokasi Mesin ATM</th>
										<th data-class="expand">Ticket No.</th>
										<th data-class="expand">Problem Type</th>
										<th data-class="expand">Date / Time</th>
										<th data-class="expand">Status</th>
										<th width="80">Opsi/Fungsional</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>

							<table id="example" class="display nowrap cell-border" style="width:100%">
								<thead>
									<tr>
										<th></th>
										<th>No.</th>
										<th>Ticket No.</th>
										<th>BANK</th>
										<th>ID ATM</th>
										<th>Problem Type</th>
										<th>Date / Time</th>
										<th>Status</th>
										<th width="80">Opsi/Fungsional</th>
									</tr>
								</thead>
							</table>	
						</div>
						</div>
						<!-- end widget content -->

					</div>
					<!-- end widget div -->

				</div>
				<!-- end widget -->

			</article>
			<!-- WIDGET END -->
			
			

		</div>
		
		<!-- Modal HTML -->
    <div id="myModalx" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Do you want to save changes you made to document before closing?</p>
                    <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
                    <p class="text-info"><small><strong>Note:</strong> Press Tab key on the keyboard to enter inside the modal window after that press the Esc key. By default keyboard option is true that means modal hide on the press of escape key.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

		<!-- end row -->
		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
			<div class="modal-dialog">
				<div class="modal-content" style="background: linear-gradient(to bottom, #8e9eab, #eef2f3);">
					<div class="modal-header" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white; height:40px;">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h5 style="color:white; margin: -8px 0px 0px 0px;"><b><img style="float: left; margin: -4px 5px -10px 0px;" src="<?=base_url()?>assets/img/new-ticket.png" height="18" width="18" /> Data New Issue Tickets</b></h5>
					</div>
					<div class="modal-body">
						
						<div class="widget-body no-padding" style="margin: 0px 0px 0px 0px;">
							<form action="<?=base_url()?>new_ticketslm/insert" class="form_submit_today">
								
								<div  style="margin: 0px 0px 0px 0px;" class="jarviswidget jarviswidget-color-blueLight" id="wid-id-12" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
									<div>
										<div class="widget-body no-padding"  style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
											<input type="hidden" placeholder="" class="ticket_id form-control" required />
											<table class="table table-bordered table-condensed">
												<thead>
													<tr>
														<th colspan="2" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
														<small style="color:white;font-size:14px; font-weight: bold;">TICKET NUMBER : <span id="id_ticket">-</span></small>
														<input type="hidden" placeholder="" name="ticket_id" class="ticket_id form-control" required />
														</th>
													</tr>
												</thead>
												<thead>
													<tr>
														<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">TICKET INFORMATION</th>
														<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">ISSUE REPORTED</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td width="50%">
														<div class="form-group">
															<label>ID ATM</label>
															<br>
															<select class="form-control idatmX" id="idatm" name="idatm" required="" style="width: 250px">
																<option value="">-- Select ATM --</option>
															</select>
														</div>
														</td>
														<td width="50%">
														<div class="form-group">
															<label>REPORTED BY</label>
															<input type="text" placeholder="Reported By" name="reported_by" class="reported_by form-control" />
														</div>
														</td>
													</tr>
													<tr>
														<td>
														<div class="form-group">
														<label>EMAIL DATE</label>
														<input type="text" placeholder="Email Date" name="email_date" class="email_date form-control" required />
														</div>
														</td>
														<td>
														<div class="form-group">
															<label>EMAIL PIC</label>
															<input type="text" placeholder="Email PIC" name="email_pic" class="reported_by form-control" />
														</div>
														</td>
													</tr>
													<tr>
														<td>
														<div class="form-group">
															<label>REPORTED PROBLEM</label>
															<input type="text" placeholder="Reported Problem" name="reported_problem" class="reported_problem form-control" required />
														</div>
														</td>
														<td>
														<div class="form-group">
															<label>NO HP PIC</label>
															<input type="text" placeholder="PIC Contact" name="phone_pic" class="reported_by form-control" />
														</div>
														</td>
													</tr>
													<tr>
														<td colspan="2">
														<div class="form-group" style="height:20px;">
															<label>REPORTED METHOD</label>
																<input type="checkbox" name="email_method" value="true" checked="checked" style="margin: 10px 0px 0px 20px;">
																<i></i>BY EMAIL
																<input type="checkbox" name="phone_method" value="true" style="margin: 10px 0px 0px 20px;">
																<i></i>BY PHONE
														</div>
														</td>
													</tr>
													<tr>
														<td colspan="2">
														<div class="form-group">
															<label>SERVICE TYPE</label>
															<br>
															<select class="form-control service_typeX" id="service_type" name="service_type" required="" style="width: 100%">
																<option value="">-- Select Service Type --</option>
															</select>
														</div>
														</td>
													</tr>
												</tbody>
												<thead>
													<tr>
														<th colspan="2" style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">CUSTOMER SUPPORT ENGINEER</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td colspan="2">
														<div class="form-group">
															<label>ASSIGN CSE</label>
															<br>
															<select class="form-control picX" id="pic" name="pic" required="" style="width: 100%">
																<option value="">-- Select CSE --</option>
															</select>
														</div>
														</td>
													</tr>
												</tbody>
												<tfoot>
													<tr>
														<th colspan="2" style="color:white;height:10px;">
														<button type="button" id="close_modal" class="btn btn-danger btn-sm zoomsmall" style="float: left; background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;"><img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px;" src="<?=base_url()?>assets/img/del2.png"/>Cancel/Close</button>
														<button type="submit" class="btn btn-primary btn-sm zoomsmall" style="float: right; background: linear-gradient(to top, #44a08d, #093637);border-radius: 4px;font-weight:bold;"><img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px;" src="<?=base_url()?>assets/img/clean.png"/>Create Ticket</button>
														</th>
													</tr>
													<tr>
														<th colspan="2" style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;height:1px;"></th>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
							</form>
						</div>
						
					</div>
					<div class="modal-footer" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white; height:10px;">
						
					
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		
		<!-- Modal -->
		<div class="modal fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
			<div class="modal-dialog">
				<div class="modal-content" style="background: linear-gradient(to bottom, #8e9eab, #eef2f3);">
					<div class="modal-header" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white; height:40px;">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h5 style="color:white; margin: -8px 0px 0px 0px;"><b><img style="float: left; margin: -4px 5px -10px 0px;" src="<?=base_url()?>assets/img/new-ticket.png" height="18" width="18" /> Closing Ticket Manual</b></h5>
					</div>
					<div class="modal-body">
						
						<div class="widget-body no-padding" style="margin: 0px 0px 0px 0px;">
							<form action="<?=base_url()?>new_ticketslm/close_manual" class="form_submit_today2">
								
								<div  style="margin: 0px 0px 0px 0px;" class="jarviswidget jarviswidget-color-blueLight" id="wid-id-12" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
									<div>
										<div class="widget-body no-padding"  style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
											<input type="hidden" placeholder="" name="closing_id" class="closing_id form-control" />
											<input type="hidden" placeholder="" name="closing_ticket" class="closing_ticket form-control" />
											<table class="table table-bordered table-condensed">
												<thead>
													<tr>
														<th colspan="2" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
														<small style="color:white;font-size:14px; font-weight: bold;">TICKET NUMBER : <span id="closing_ticket">-</span></small>
														</th>
													</tr>
												</thead>
												<thead>
													<!--<tr>
														<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">TICKET INFORMATION</th>
														<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">ISSUE REPORTED</th>
													</tr>-->
												</thead>
												<tbody>
													<tr>
														<td style="vertical-align: middle" width="150">
															<label class="col-md-12 control-label">Waktu Tiba</label>
														</td>
														<td>
															<input name="waktu_tiba" class="form-control timepicker_tiba" type="text">
														</td>
													</tr>
													<tr>
														<td style="vertical-align: middle">
															<label class="col-md-12 control-label">Waktu Mulai</label>
														</td>
														<td>
															<input name="waktu_mulai" class="form-control timepicker_mulai" type="text">
														</td>
													</tr>
													<tr>
														<td style="vertical-align: middle">
															<label class="col-md-12 control-label">Waktu Selesai</label>
														</td>
														<td>
															<input name="waktu_selesai" class="form-control timepicker_selesai" type="text">
														</td>
													</tr>
													<tr>
														<td style="vertical-align: top">
															<label class="col-md-12 control-label">Action Taken</label>
														</td>
														<td>
															<textarea name="action_taken" class="form-control" style="resize: none;" rows="4"></textarea>
														</td>
													</tr>
												</tbody>
												<tfoot>
													<tr>
														<th colspan="2" style="color:white;height:10px;">
														<button type="button" id="close_modal2" class="btn btn-danger btn-sm zoomsmall" style="float: left; background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;"><img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px;" src="<?=base_url()?>assets/img/del2.png"/>Cancel/Close</button>
														<button type="submit" class="btn btn-primary btn-sm zoomsmall" style="float: right; background: linear-gradient(to top, #44a08d, #093637);border-radius: 4px;font-weight:bold;"><img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px;" src="<?=base_url()?>assets/img/clean.png"/>Create Ticket</button>
														</th>
													</tr>
													<tr>
														<th colspan="2" style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;height:1px;"></th>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
							</form>
						</div>
						
					</div>
					<div class="modal-footer" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white; height:10px;">
						
					
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		
		<div class="container content_form" hidden>
			<div class="row">
			
				<article class="col-sm-12 col-md-12 col-lg-12">
					<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
						<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
							<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/new-ticket.png" height="18" width="18" /> </span>
							<h2 style="color:white;font-size:14px; font-weight: bold;">New Ticket
							</h2>
						</header>
						<div>
							<div class="widget-body">
								<form action="<?=base_url()?>new_ticketslm/insert" class="formName">
									<center><h5 style="font-weight: bold">CREATE NEW ISSUE TICKET <br>TICKET NUMBER : <span id="id_ticket">-</span></h5></center><br>
									<input type="hidden" placeholder="" class="ticket_id form-control" required />
									<div class="form-group">
										<label>ID ATM</label>
										<select class="form-control idatm" id="idatm" required="">
											<option value="">-- Select ATM --</option>
										</select>
									</div>
									<div class="form-group">
										<label>EMAIL DATE</label>
										<input type="text" placeholder="Email Date" class="email_date form-control" required />
									</div>
									<div class="form-group">
										<label>REPORTED PROBLEM</label>
										<input type="text" placeholder="Reported Problem" class="reported_problem form-control" required />
									</div>
									<div class="form-group">
										<label>REPORTED BY</label>
										<input type="text" placeholder="Reported By" class="reported_by form-control" required />
									</div>
									<div class="form-group">
										<label>SERVICE TYPE</label>
										<select name="service_type[]" class="easyui-validatebox service_type" style="width: 100%" required>
											<option value="">-- Select type --</option>
										</select>
									</div>
									<div class="form-group">
										<label>C S E</label>
										<select class="form-control pic" id="pic" required="">
											<option value="">-- Select PIC --</option>
										</select>
									</div>
									<!--<div class="form-group">
										<label>PART REPLACEMENT</label>
										<select multiple name="part[]"  class="form-control part" id="part" required="">
											<option value="">-- Select Part --</option>
										</select>
									</div>-->
								</form>
							</div>
						</div>
					</div>
				</article>		
			</div>

		</div>

		
		<!--<div class="container content_form" hidden style="width:100%">
		<div class="row">
			<article class="col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
					<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
						<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/new-ticket.png" height="18" width="18" /> </span>
						<h2 style="color:white;font-size:14px; font-weight: bold;">New Ticket
						</h2>
					</header>
					<div>
						<div class="widget-body no-padding">
						<div class="col-xs-12 col-sm-4 col-md-12" style="margin: 0px 0px 0px 0px;">
							<form action="<?=base_url()?>new_ticketslm/insert" class="formName">
								<center><h5 style="font-weight: bold">CREATE NEW ISSUE TICKET <br>TICKET NUMBER : <span id="id_ticket">-</span></h5></center><br>

								<div class="form-group">
									<label>ID ATM</label>
									<select class="form-control idatm" id="idatm" required="">
										<option value="">-- Select ATM --</option>
									</select>
								</div>
								<label>ID TICKET (Auto)</label>
								<input type="text" placeholder="ID Tickets" class="ticket_id form-control" required /><br>
								<div class="form-group">
									<label>EMAIL DATE</label>
									<input type="text" placeholder="Email Date" class="email_date form-control" required />
								</div>
								<div class="form-group">
									<label>PROBLEM TYPE</label>
									<select multiple name="problem_type[]" class="easyui-validatebox problem_type" style="width: 100%" required>
										<option value="">-- Select Problem --</option>
									</select>
								</div>
								<div class="form-group">
									<label>C S E</label>
									<select class="form-control pic" id="pic" required="">
										<option value="">-- Select PIC --</option>
									</select>
								</div>
								<div class="form-group" hidden>
									<label>PART REPLACEMENT</label>
									<select multiple name="part[]"  class="form-control part" id="part" required="">
										<option value="">-- Select Part --</option>
									</select>
								</div>
							</form>
						</div>
						</div>
					</div>
				</div>
			</article>		
		</div>

		
		</div>-->

	</section>
	<!-- end widget grid -->
@endsection

@section('javascript')
	
	<script src="<?=BASE_URL?>bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
	<script src="<?=BASE_URL?>bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
	<script type="text/javascript">

		var global_id_atm;
		var table;
		$(document).ready(function(){
			$('#close_modal').click(function(){
				$(".form_submit_today")[0].reset();
				$("#myModal").modal('hide');
			});
			$('#close_modal2').click(function(){
				$(".form_submit_today2")[0].reset();
				$("#myModal2").modal('hide');
			});
			$('.launch-modal').click(function(){
				$('#myModal').modal({
					backdrop: 'static'
				});
				
				$('.idatmX').select2({
					tokenSeparators: [','],
					ajax: {
						dataType: 'json',
						url: '<?php echo base_url().'new_ticketslm/select_atm'?>',
						delay: 250,
						type: "POST",
						data: function(params) {
							return {
								search: params.term
							}
						},
						processResults: function (data, page) {
							return {
								results: data
							};
						}
					}
				}).on('change', function(e) {
					// Access to full data
					// console.log($(this).select2('data'));
					var data = $(this).select2('data');
					var value = data[0].id;
					var text = data[0].text;
					// alert(value);
					// alert(text);
					global_id_atm = value;

					url = "<?=base_url()?>new_ticketslm/get_ticket";
					$.ajax({
						url: url,
						dataType: 'html',
						method: 'post',
						data: {id: value},
						timeout: 3000,
					}).done(function (response) {
						if(response=="nojo") {
							alert("ID ATM BELUM TEREGISTER JOB ORDER");
						} else {
							// console.log(value);
							// console.log(response);
							$('#id_ticket').html(response)
							$('.ticket_id').val(response)
						}
					}).fail(function(){
						$.alert('Something went wrong.');
					});
				});
				
				// $('.email_date').datetimepicker({
					// autoclose: true,
					// minViewMode: 0,
					// todayBtn: true,
					// // format: 'yyyy-mm-dd',
					// todayHighlight: true
				// }).on('changeDate', function(selected){
					// var bulan = ("0" + (selected.date.getMonth() + 1)).slice(-2);
					// var tahun = selected.date.getFullYear(); 
				// }); 
				
				$('.email_date').bootstrapMaterialDatePicker({ 
					format: 'YYYY-MM-DD HH:mm'
				}); 
				
				$('.service_typeX').select2({
					tags: false, tokenSeparators: [','], width: '100%',
					ajax: {
						dataType: 'json',
						url: '<?php echo base_url().'new_ticketslm/select_problem'?>',
						delay: 250,
						type: "POST",
						data: function(params) {
							return {
								search: params.term
							}
						},
						processResults: function (data, page) {
							return {
								results: data
							};
						}
					}, maximumSelectionLength: 3,
					createTag: function (params) { var term = $.trim(params.term);
						if (term === '') { return null; }
						return { id: term, text: term + ' (add new)' };
					}
				});

				$('.picX').select2({
					tokenSeparators: [','],
					ajax: {
						dataType: 'json',
						url: '<?php echo base_url().'new_ticketslm/select_cse'?>',
						delay: 250,
						type: "POST",
						data: function(params) {
							return {
								search: params.term,
								atm_id: global_id_atm
							}
						},
						processResults: function (data, page) {
							return {
								results: data
							};
						}
					}
				});
			}); 
			
			$(".form_submit_today").on("submit", function(e) {
				e.preventDefault();
				var url = $(this)[0].action;
				var form = $(this)[0];
				var formData = new FormData(form);
				
				$.confirm({
					title: false,
					content: function () {
						var self = this;
						return $.ajax({
							url: url,
							dataType: 'json',
							method: 'post',
							processData: false,
							contentType: false,
							cache: false,
							data: formData,
							timeout: 3000,
						}).done(function (response) {
							
							if(response.status=="success") {
								$(".form_submit_today")[0].reset();
								$("#myModal").modal('hide');
								
								self.setContent('SUCCESS');
								
								table.ajax.reload( null, false );
							} else {
								// self.hideLoading();
								self.setContent('Something wrong!');
							}
						}).fail(function(){
							self.setContent('Something went wrong.');
						});
					},
					autoClose: 'ok|1000',
					buttons: {
						ok: function () {
							
						}
					}
				});
				
				// $.ajax({
					// url: url,
					// dataType: 'json',
					// method: 'post',
					// processData: false,
					// contentType: false,
					// cache: false,
					// data: formData,
					// timeout: 3000,
				// }).done(function (response) {
					// console.log(response);
					// if(response.status=="success") {
						// $(".form_submit_today")[0].reset();
						// $("#myModal").modal('hide');
						
						// $.confirm({
							// title: false,
							// content: 'SUCCESS',
							// autoClose: 'ok|1000',
							// buttons: {
								// ok: function () {
									
								// }
							// }
						// });
						
						// table.ajax.reload( null, false );
					// } else {
						// // self.hideLoading();
						// $.alert('Something wrong!');
					// }
				// }).fail(function(){
					// $.alert('Something went wrong.');
				// });
			});
			
			$('.timepicker_tiba').bootstrapMaterialDatePicker({ 
				format: 'YYYY-MM-DD HH:mm:00'
			}); 
			
			$('.timepicker_mulai').bootstrapMaterialDatePicker({ 
				format: 'YYYY-MM-DD HH:mm:00'
			}); 
			
			$('.timepicker_selesai').bootstrapMaterialDatePicker({ 
				format: 'YYYY-MM-DD HH:mm:00'
			}); 
			
			
			
			$(".form_submit_today2").on("submit", function(e) {
				e.preventDefault();
				var url = $(this)[0].action;
				var form = $(this)[0];
				var formData = new FormData(form);
				
				$.confirm({
					title: false,
					content: function () {
						var self = this;
						return $.ajax({
							url: url,
							dataType: 'html',
							method: 'post',
							processData: false,
							contentType: false,
							cache: false,
							data: formData,
							timeout: 3000,
						}).done(function (response) {
							if(response=="SUCCESS") {
								$(".form_submit_today2")[0].reset();
								$("#myModal2").modal('hide');
								
								self.setContent('SUCCESS');
								
								table.ajax.reload( null, false );
							} else {
								// self.hideLoading();
								self.setContent('Something wrong!');
							}
						}).fail(function(){
							self.setContent('Something went wrong.');
						});
					},
					autoClose: 'ok|1000',
					buttons: {
						ok: function () {
							
						}
					}
				});
			});
			
			
			$(".reload").on("click", function(e) {
				table.ajax.reload( null, false );
			});
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
		
		/*
		 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
		 * eg alert("my home function");
		 * 
		 * var pagefunction = function() {
		 *   ...
		 * }
		 * loadScript("<?=BASE_URL?>js/plugin/_PLUGIN_NAME_.js", pagefunction);
		 * 
		 */
		
		// PAGE RELATED SCRIPTS
		
		// pagefunction	
		var table2;
		var qty_global;
		// var pagefunction = function() {
			//console.log("cleared");
			
			/* // DOM Position key index //
			
				l - Length changing (dropdown)
				f - Filtering input (search)
				t - The Table! (datatable)
				i - Information (records)
				p - Pagination (paging)
				r - pRocessing 
				< and > - div elements
				<"#id" and > - div with an id
				<"class" and > - div with a class
				<"#id.class" and > - div with an id and class
				
				Also see: http://legacy.datatables.net/usage/features
			*/	

			/* BASIC ;*/
				// var responsiveHelper_dt_basic = undefined;
				// var responsiveHelper_datatable_fixed_column = undefined;
				// var responsiveHelper_datatable_col_reorder = undefined;
				// var responsiveHelper_datatable_tabletools = undefined;
				
				// var breakpointDefinition = {
					// tablet : 1024,
					// phone : 480
				// };
				
				// var base_url = "<?php echo base_url();?>";
				// table = $('#dt_basic').DataTable({
					// "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
						// "t"+
						// "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
					// "autoWidth" : true,
					// "preDrawCallback" : function() {
						// // Initialize the responsive datatables helper once.
						// if (!responsiveHelper_dt_basic) {
							// responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
						// }
					// },
					// "rowCallback" : function(nRow) {
						// responsiveHelper_dt_basic.createExpandIcon(nRow);
					// },
					// "drawCallback" : function(oSettings) {
						// responsiveHelper_dt_basic.respond();
					// },
					// "pageLength" : 10,
					// "serverSide": true,
					// "order": [[1, "desc" ]],
					// "columnDefs": [{"orderable": false, "targets": 0}],
					// "ajax":{
						// url : base_url + 'new_ticketslm/get_data',
						// type : 'POST',
						// dataFilter: function(data) {
							// // console.log(data);
							// var json = jQuery.parseJSON( data );
							// json.recordsTotal = json.recordsTotal;
							// json.recordsFiltered = json.recordsFiltered;
							// json.data = json.data;

							// return JSON.stringify( json );
						// }
					// },
				// });

			/* END BASIC */

		// };
		
		var pagefunction = function() {
			function format(d) {
				// `d` is the original data object for the row
				return '<table cellpadding="5" cellspacing="0" border="0" class="table table-hover table-condensed">' +
					'<tr>' +
					'<td style="width:100px">CSE</td>' +
					'<td>'+d.cse+'</td>' +
					'</tr>' +
					'<tr>' +
					'<td style="width:100px">Cabang</td>' +
					'<td>'+d.cabang+'</td>' +
					'</tr>' +
					'<tr>' +
					'<td style="width:100px">Lokasi</td>' +
					'<td>'+d.lokasi+'</td>' +
					'</tr>' +
					'<tr>' +
					'<td style="width:100px">Reported By</td>' +
					'<td>'+d.reported_by+'</td>' +
					'</tr>' +
					'<tr>' +
					'<td style="width:100px">Reported Problem</td>' +
					'<td>'+d.reported_problem+'</td>' +
					'</tr>' +
					'<tr>' +
					'<td style="width:100px">Email PIC</td>' +
					'<td>'+d.email_pic+'</td>' +
					'</tr>' +
					'<tr>' +
					'<td style="width:100px">Phone PIC</td>' +
					'<td>'+d.phone_pic+'</td>' +
					'</tr>' +
					'<tr>' +
					'<td style="width:100px">Created Ticket By</td>' +
					'<td>'+d.created_by+'</td>' +
					'</tr>' +
					'<td style="width:100px">Action</td>' +
					'<td>'+d.jobcard+'</td>' +
					'</tr>' +
					'</tr>' +
					'</table>';
			}
			
			table = $('#example').DataTable({
				serverSide: true,
				ordering: true,
				searching: true,
				lengthChange: false,
				ajax: {
					url: '<?=base_url()?>new_ticketslm/json',
					data: function(data) {
						// // Read values
						// var values = jq341('.datepicker_search').val();
						// // alert(values);

						// // Append to data
						// if(values=="") {
							// // data.search.value = "<?=date('Y-m-d')?>";
						// } else {
							// data.search.value = values;
						// }
					},
					dataFilter: function(data){
						console.log(data);
						var json = jQuery.parseJSON( data );
						json.recordsTotal = json.recordsTotal;
						json.recordsFiltered = json.recordsFiltered;
						json.data = json.data;

						return JSON.stringify( json ); // return JSON string
					}
				},
				scrollX:        false,
				"order": [[6, "desc"]],
				"columnDefs": [{"orderable": false, "targets": 6}],
				"columns": [{
						"class": 'details-control',
						"orderable": false,
						"searchable": false,
						"data": null,
						"defaultContent": ''
					},
					{
						"orderable": false,
						"searchable": false,
						"data": "no",
					},
					{ "searchable": true, "orderable": false, "data": "ticket_id" },
					{ "searchable": false, "orderable": false, "data": "nama_bank"} ,
					{ "searchable": true, "orderable": false, "data": "atm_id"} ,
					{ "searchable": true, "orderable": false, "data": "problem_type" },
					{ "searchable": true, "orderable": true, "data": "entry_date" },
					{ "searchable": false, "orderable": false, "data": "status" },
					{ "searchable": false, "orderable": false, "data": "button" },
				],
				'rowCallback': function(row, data, index){
					console.log(data.status);
					if(data.status=="OPEN") {
						console.log(row);
						$(row).find('td:eq(7)').css({"color": "red", "font-weight": "bold"});
					} else if(data.status=="CLOSE") {
						$(row).find('td:eq(7)').css({"color": "blue", "font-weight": "bold"});
					} else if(data.status=="DONE") {
						$(row).find('td:eq(7)').css({"color": "green", "font-weight": "bold"});
					} else if(data.status=="PENDING-SPAREPART") {
						$(row).find('td:eq(7)').css({"color": "red", "font-weight": "bold"});
					} else if(data.status=="PENDING-PEKERJAAN") {
						$(row).find('td:eq(7)').css({"color": "orange", "font-weight": "bold"});
					}
					// if(data[3]> 11.7){
						// $(row).find('td:eq(3)').css('color', 'red');
					// }
					// if(data[2].toUpperCase() == 'EE'){
						// $(row).find('td:eq(2)').css('color', 'blue');
					// }
				}
			});
			
			// Add event listener for opening and closing details
			$('#example tbody').on('click', 'td.details-control', function() {
				var tr = $(this).closest('tr');
				var row = table.row(tr);

				if (row.child.isShown()) {
					// This row is already open - close it
					row.child.hide();
					tr.removeClass('shown');
				} else {
					// Open this row
					row.child(format(row.data())).show();
					tr.addClass('shown');
				}
			});
		};

		var global_id = 0;
		function createModal() {
			var content = $('.content_form').clone().html();

			$.confirm({
				columnClass: 'col-md-6 col-md-offset-3',
				draggable: false,
				title: false,
				theme: 'light',
				content: content,
				buttons: {
					formSubmit: {
						text: 'Submit',
						btnClass: 'btn-blue',
						action: function () {
							var self = this;
							var url = self.$content.find('form')[0].action;
							
							var idatm = this.$content.find('.idatm').val();
							var ticket_id = this.$content.find('.ticket_id').val();
							var email_date = this.$content.find('.email_date').val();
							var service_type = this.$content.find('.service_type').val();
							var reported_problem = this.$content.find('.reported_problem').val();
							var reported_by = this.$content.find('.reported_by').val();
							var pic = this.$content.find('.pic').val();
							if(!service_type){ $.alert('provide a valid service_type'); return false; }
							if(!pic){ $.alert('provide a valid pic'); return false; }

							var data = {
								id: null,
								idatm: idatm,
								ticket_id: ticket_id,
								email_date: email_date,
								service_type: service_type,
								reported_problem: reported_problem,
								reported_by: reported_by,
								pic: pic
							};

							// self.showLoading();

							$.ajax({
								url: url,
								dataType: 'json',
								method: 'post',
								data: data,
								timeout: 3000,
							}).done(function (response) {
								console.log(response);
								
								if(response.status=="exist") {
									self.hideLoading();
									$.alert('Sub kategori sudah tersedia!');
								} else {
									self.close();
									// $.alert('SUCCESS');
									$.confirm({
										title: false,
										content: 'SUCCESS',
										autoClose: 'ok|1000',
										buttons: {
											ok: function () {
												
											}
										}
									});
									table.ajax.reload( null, false );
								}
							}).fail(function(){
								self.hideLoading();
								$.alert('Something went wrong.');
							});
							
							return false;
						}
					},
					cancel: function () {
						//close
					},
				},
				onContentReady: function () {
					var jc = this;

					this.$content.find('.idatm').select2({
						tokenSeparators: [','],
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'new_ticketslm/select_atm'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}
					}).on('change', function(e) {
						// Access to full data
						// console.log($(this).select2('data'));
						var data = $(this).select2('data');
						var value = data[0].id;
						var text = data[0].text;
						alert(value);
						// alert(text);
						global_id = value;

						url = "<?=base_url()?>new_ticketslm/get_ticket";
						$.ajax({
							url: url,
							dataType: 'html',
							method: 'post',
							data: {id: value},
							timeout: 3000,
						}).done(function (response) {
							jc.$content.find('#id_ticket').html(response)
							jc.$content.find('.ticket_id').val(response)
						}).fail(function(){
							$.alert('Something went wrong.');
						});
					});;

					this.$content.find('.service_type').select2({
						tags: false, tokenSeparators: [','], width: '100%',
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'new_ticketslm/select_problem'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}, maximumSelectionLength: 3,
						createTag: function (params) { var term = $.trim(params.term);
							if (term === '') { return null; }
							return { id: term, text: term + ' (add new)' };
						}
					});

					this.$content.find('.pic').select2({
						tokenSeparators: [','],
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'new_ticketslm/select_pic'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term,
									atm_id: global_id
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}
					});

					this.$content.find('.part').select2({
						tokenSeparators: [','],
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'new_ticketslm/select_part'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}
					});

					this.$content.find('.email_date').datepicker({
						autoclose: true,
						minViewMode: 0,
						format: 'yyyy-mm-dd',
						todayHighlight: true
					}).on('changeDate', function(selected){
						var bulan = ("0" + (selected.date.getMonth() + 1)).slice(-2);
						var tahun = selected.date.getFullYear(); 
					}); 

					this.$content.find('form').on('submit', function (e) {
						e.preventDefault();
						jc.$$formSubmit.trigger('click');
					});
				}
			});
		}

		function updateModal(id, category_id, category_name, name) {
			var content = $('.content_form').clone().html();

			$.confirm({
				draggable: false,
				title: false,
				theme: 'light',
				content: content,
				buttons: {
					formSubmit: {
						text: 'Submit',
						btnClass: 'btn-blue',
						action: function () {
							var self = this;
							var url = self.$content.find('form')[0].action;
							
							var category = this.$content.find('.category').val();
							var name = this.$content.find('.name').val();
							if(!category){ $.alert('provide a valid category'); return false; }
							if(!name){ $.alert('provide a valid name'); return false; }
							
							var data = {
								id: id,
								category: category,
								name: name
							};

							self.showLoading();
							
							$.ajax({
								url: url,
								dataType: 'json',
								method: 'post',
								data: data,
								timeout: 3000,
							}).done(function (response) {
								// self.buttons.formSubmit.hide();
								// self.buttons.cancel.hide();
								// self.close();
								
								if(response.status=="exist") {
									self.hideLoading();
									$.alert('Lokasi sudah tersedia!');
								} else {
									self.close();
									// $.alert('SUCCESS');
									$.confirm({
										title: false,
										content: 'SUCCESS',
										autoClose: 'ok|1000',
										buttons: {
											ok: function () {
												
											}
										}
									});
									
									table.ajax.reload( null, false );
								}
							}).fail(function(){
								self.hideLoading();
								$.alert('Something went wrong.');
							});
							
							return false;
						}
					},
					cancel: function () {
						//close
					},
				},
				onContentReady: function () {
					this.$content.find('.category').append('<option value="'+category_id+'">'+category_name+'</option>');
					this.$content.find('.category').val(category_id);
					this.$content.find('.category').select2().trigger('change');
					this.$content.find('.category').select2({
						tokenSeparators: [','],
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'new_ticketslm/select_category'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}
					});

					// this.$content.find('.category').val(category);
					// this.$content.find('.category').select2().trigger('change');
					var jc = this;
					jc.$content.find('.name').val(name);
					this.$content.find('form').on('submit', function (e) {
						e.preventDefault();
						jc.$$formSubmit.trigger('click');
					});
				}
			});
		}

		function deleteAction(url) {
			$.confirm({
				title: 'Delete data?',
				content: 'This dialog will automatically trigger \'cancel\' in 6 seconds if you don\'t respond.',
				autoClose: 'cancel|8000',
				buttons: {
					delete: {
						text: 'delete',
						keys: ['enter'],
						action: function () {
							$.ajax({
								url: url,
								dataType: 'html',
								timeout: 3000,
							}).done(function (response) {
								console.log(response);
								if(response=="SUCCESS") {
									table.ajax.reload( null, false );
								}
							}).fail(function(){
								self.hideLoading();
								$.alert('Something went wrong.');
							});
						}
					},
					cancel: function () {
						
					}
				}
			});
		}

		function closeAction(id, ticket) {
			$('#myModal2').modal({
				backdrop: 'static'
			});
			$('.closing_id').val(id)
			$('.closing_ticket').val(ticket)
			$('#closing_ticket').html(ticket)
		}

		
		// load related plugins
		
		loadScript("<?=BASE_URL?>js/plugin/datatables/jquery.dataTables.min.js", function(){
			loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.colVis.min.js", function(){
				loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.tableTools.min.js", function(){
					loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.bootstrap.min.js", function(){
						loadScript("<?=base_url()?>seipkon/assets/jqueryconfirm/dist/jquery-confirm.min.js", function(){
							loadScript("<?=BASE_URL?>js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
						});
					});
				});
			});
		});


	</script>
@endsection