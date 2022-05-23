<?php $__env->startSection('stylesheet'); ?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>bootstrap-datetimepicker/css/bootstrap-datetimepicker.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css">
	<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/datetime/1.1.0/css/dataTables.dateTime.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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

	@media  screen and (max-width: 1024px){
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
				<a href="dash_maintenance" class="btn btn-default btn-circle btn-sm zoomsmall">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/blackbook.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Summary Tickets</small><br>
						<small style="color:white;font-size:12px;">Dashboard Maintenance</small>
					</p>
				</a>
				</div>
				<div class="col-sm-3" style="margin: 5px 0px 0px -40px;">
				<a href="new_ticket" class="btn btn-default btn-circle btn-sm zoomsmall active">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/new-ticket.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">New Tickets</small><br>
						<small style="color:white;font-size:12px;">New Issue Ticket</small>
					</p>
				</a>
				</div>
				<div class="col-sm-3" style="margin: 5px 0px 0px -80px;">
				<a href="status_ticket" class="btn btn-default btn-circle btn-sm zoomsmall ">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/taskred.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Status Ticket</small><br>
						<small style="color:white;font-size:12px;">Status Trouble Ticket</small>
					</p>
				</a>
				</div>
				<div class="col-sm-2" style="margin: 5px 0px 0px -40px;">
				<a href="trouble_category" class="btn btn-default btn-circle zoomsmall">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/folset7.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Activity Type</small><br>
						<small style="color:white;font-size:12px;">Activity Type Services</small>
					</p>
				</a>
				</div>
				<div class="col-sm-2" style="margin: 5px 0px 0px 50px;">
				<a href="trouble_sub_category" class="btn btn-default btn-circle btn-sm zoomsmall">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/purpleset.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Problem Type</small><br>
						<small style="color:white;font-size:12px;">Problem Type Services </small>
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
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>Data New Issue Tickets</b></h2>
						
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
							<button class="btn btn-primary pull-right zoomsmall launch-modal" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);border-radius: 4px;width: 100%;height:30px;color:black"><img style="float: left; margin: -2px 5px 0px 0px;" src="<?=base_url()?>assets/img/tikopen.png" height="20" width="20" /><b>Tambah New Plan</b></button>
						</section>	
					</span>
					<div>
						<div class="widget-body no-padding">
							<div class="custom-scroll table-responsive" style="height:560px; overflow-y: scroll;overflow-x: scroll;">
							<table cellspacing="5" cellpadding="5" border="0" class="pull-right" style="margin : 10px">
								<tbody>
									<tr>
										<td>SEARCH BY DATE</td>
										<td style="width: 20px; text-align: center"> : </td>
										<td><input type="text" class="form-control" id="search_by_date" name="search_by_date"></td>
									</tr>
								</tbody>
							</table>
							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th>No.</th>
										<th>Run Number</th>
										<th>Tanggal Dibuat</th>
										<th>Tanggal Eksekusi</th>
										<th width="160px">Opsi/Fungsional</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
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
							<form action="<?=base_url()?>cro_master_cashreplenish/insert" style="margin-bottom: 10px" autocomplete="off" id="data" method="post" enctype="multipart/form-data" class="form_submit_today">
								<div  style="margin: 0px 0px 0px 0px;" class="jarviswidget jarviswidget-color-blueLight" id="wid-id-12" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
									<div>
										<div class="widget-body no-padding"  style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
											<input type="hidden" placeholder="" class="ticket_id form-control" required />
											<table class="table table-bordered table-condensed">
												<tbody>
													<tr>
														<td colspan="2">
															<div class="form-group">
																<label class="control-label" for="plan_for">Plan</label>
																<select name="plan_for" class="plan_for form-control">
																	<option value="">Select Plan For</option>
																	<option value="0">Data Planning H-0</option>
																	<option value="1">Data Planning H-1</option>
																</select>
															</div>
															<div class="form-group">
																<label>Run Number</label>
																<input type="text" name="run_number" placeholder="Run Number" class="run_number form-control" required />
															</div>
															<div class="form-group">
																<label>Tanggal Action</label>
																<input type="text" name="email_date" placeholder="Tanggal Action" class="email_date form-control" required />
															</div>
															<div class="form-group">
																<label>Dibuat Oleh</label>
																<input type="text" name="dibuat_oleh" placeholder="Dibuat Oleh" class="dibuat_oleh form-control" required />
															</div>
														</td>
													</tr>
												</tbody>
												</tfoot>
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
							<form action="<?=base_url()?>new_ticket/close_manual" class="form_submit_today2">
								
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
								<form action="<?=base_url()?>new_ticket/insert" class="formName">
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
							<form action="<?=base_url()?>new_ticket/insert" class="formName">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	
	<script src="<?=BASE_URL?>bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
	<script src="<?=BASE_URL?>bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script src="https://cdn.datatables.net/datetime/1.1.0/js/dataTables.dateTime.min.js"></script>
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
				
				$('.email_date').bootstrapMaterialDatePicker({ 
					time: false,
					clearButton: false,
					format: 'YYYY-MM-DD',
					minDate : new Date()
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
		var table;
		var pagefunction = function() {
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
				var responsiveHelper_dt_basic = undefined;
				var responsiveHelper_datatable_fixed_column = undefined;
				var responsiveHelper_datatable_col_reorder = undefined;
				var responsiveHelper_datatable_tabletools = undefined;
				
				var breakpointDefinition = {
					tablet : 1024,
					phone : 480
				};
			
				var search_by_date;
 
				// Custom filtering function which will search data in column four between two values
				$.fn.dataTable.ext.search.push(
					function( settings, data, dataIndex ) {
						var min = search_by_date.val();
						var max = search_by_date.val();
						var date = new Date( data[4] );
						
						alert(date);
				 
						if (
							( min === null && max === null ) ||
							( min === null && date <= max ) ||
							( min <= date   && max === null ) ||
							( min <= date   && date <= max )
						) {
							return true;
						}
						return false;
					}
				);
				
				search_by_date = new DateTime($('#search_by_date'), {
					format: 'DD-MM-YYYY'
				});
				
				var base_url = "<?php echo base_url();?>";
				table = $('#dt_basic').DataTable({
					"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
					"autoWidth" : true,
					"preDrawCallback" : function() {
						// Initialize the responsive datatables helper once.
						if (!responsiveHelper_dt_basic) {
							responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
						}
					},
					"rowCallback" : function(nRow) {
						responsiveHelper_dt_basic.createExpandIcon(nRow);
					},
					"drawCallback" : function(oSettings) {
						responsiveHelper_dt_basic.respond();
					},
					"pageLength" : 10,
					"serverSide": true,
					"order": [[1, "asc" ]],
					"columnDefs": [{"orderable": false, "targets": 0}],
					"ajax":{
						url :  base_url + 'cro_master_cashreplenish/get_data',
						type : 'POST',
						dataFilter: function(data) {
							// console.log(data);
							var json = jQuery.parseJSON( data );
							json.recordsTotal = json.recordsTotal;
							json.recordsFiltered = json.recordsFiltered;
							json.data = json.data;

							return JSON.stringify(json);
						}
					},
				});
				
				// // Refilter the table
				$('#search_by_date').on('change', function () {
					// console.log(minDate);
					table.ajax.url('cro_master_cashreplenish/get_data/'+$(this).val()).load();
				});

			/* END BASIC */

		};
		
		function createModal() {
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
							var formData = new FormData(self.$content.find('form')[0]);
							
							
							return false;
						}
					},
					cancel: function () {},
				},
				onContentReady: function () {
					// bind to events
					var jc = this;
					this.$content.find('.plan_for').on('change', function() {
						alert(this.value);
					});
					
					this.$content.find('.email_date').bootstrapMaterialDatePicker({ 
						format: 'YYYY-MM-DD HH:mm'
					}); 
					this.$content.find('form').on('submit', function (e) {
						// if the user submits the form by pressing enter in the field.
						e.preventDefault();
						jc.$$formSubmit.trigger('click'); // reference the button and click it
					});
				}
			});
		}
		
		function updateModal(id, nama_client, alamat, telepon) {
			var content = $('.content_form').clone().html();
		
			window.location.href = "<?php echo base_url();?>cro_master_cashreplenish_detail?id="+id;
		}
		
		
			
		function deleteAction2(url) {
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
								notify('DELETED', 'Delete Data Client Successful!', 'success')
								if(response=="SUCCESS") {
									table.ajax.reload( null, false );
								}
							}).fail(function(){
								// self.hideLoading();
								$.alert('Something went wrong.');
							});
						}
					},
					cancel: function () {}
				}
			});
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV_SERVER\htdocs\bridnins\coresys\views/pages/cro_master_cashreplenish/index.blade.php ENDPATH**/ ?>