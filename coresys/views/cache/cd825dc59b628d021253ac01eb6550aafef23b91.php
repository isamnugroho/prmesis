<?php $__env->startSection('stylesheet'); ?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>bootstrap-datetimepicker/css/bootstrap-datetimepicker.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
						<span class="widget-icon"><img style="float: left; margin: 8px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/whiteloc.png" height="18" width="18" /></span>
						<span class="ribbon-button-alignment pull-right" style="margin: -22px 2px 0px 0px;"> 
						</span>	
						
						<span class="ribbon-button-alignment pull-right" style="margin: -8px 4px 0px 0px;"> 
						<section>	
						<a href="<?=(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url().'master_item.assindo')?>" class="btn btn-warning pull-right zoomsmall" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);border-radius: 4px;width: 80px;height:28px;color:black"><img style="float: left; margin: -2px 5px 0px 0px;" src="<?=base_url()?>assets/img/startback.png" height="20" width="20" /><p class="small" style="margin: 1px 0px 0px 0px; ">
							<small style="color:black;font-size:12px; font-weight: bold;">Back</small>
						</p></a> 
						</section>	
						</span>
						
					</header>
					<!--<span class="ribbon-button-alignment pull-right" style="margin: -42px 0px 0px 0px;"> 
						<section>	
							<a onclick="createModal()" class="btn btn-primary pull-right zoomsmall" style="background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;width: 100%;height:30px"><img style="float: left; margin: -2px 5px 0px 0px;" src="<?=base_url()?>assets/img/tikopen.png" height="20" width="20" /><b>Tambah New Ticket</b></a>
						</section>	
					</span>
					<span class="ribbon-button-alignment pull-right" style="margin: -42px 5px 0px 0px; "> 
						<section style="display: none">	
							<button class="btn btn-primary pull-right zoomsmall reload" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);border-radius: 4px;width: 100%;height:30px;color:black"><img style="float: left; margin: -2px 5px 0px 0px;" src="<?=base_url()?>assets/img/tikopen.png" height="20" width="20" /><b>Reload</b></button>
						</section>	
						<section>	
							<button class="btn btn-primary pull-right zoomsmall launch-modal" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);border-radius: 4px;width: 100%;height:30px;color:black"><img style="float: left; margin: -2px 5px 0px 0px;" src="<?=base_url()?>assets/img/tikopen.png" height="20" width="20" /><b>Tambah New Ticket</b></button>
						</section>	
					</span>-->
					<div>
						<div class="widget-body no-padding">
							<div class="custom-scroll table-responsive" style="height:560px; overflow-y: scroll;overflow-x: scroll;">
							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th>NO.</th>
										<th>ATM ID</th>
										<th>CASSETE 1</th>
										<th>CASSETE 2</th>
										<th>CASSETE 3</th>
										<th>CASSETE 4</th>
										<th>NOMINAL</th>
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
							<form action="<?=base_url()?>cro_master_cashreplenish_detail/insert" style="margin-bottom: 10px" autocomplete="off" id="data" method="post" enctype="multipart/form-data" class="form_submit_today">
								<div  style="margin: 0px 0px 0px 0px;" class="jarviswidget jarviswidget-color-blueLight" id="wid-id-12" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
									<div>
										<div class="widget-body no-padding"  style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
											<input type="hidden" name="id" placeholder="" class="id form-control" value="<?=$id?>" required />
											<table class="table table-bordered table-condensed">
												<tbody>
													<tr>
														<td colspan="2">
															<div class="form-group">
																<label>ID ATM</label>
																<br>
																<select class="form-control idatmX" id="idatm" name="idatm" required="" style="width: 100%">
																	<option value="">-- Select ATM --</option>
																</select>
															</div>
															<div class="form-group">
																<tbody>
																	<tr>
																		<td>
																			<label>CASSETTE 1</label>
																		</td>
																	</tr>
																	<tr>
																		<td width="50%">
																			<div class="form-group">
																				<select class="form-control " id="cst_1" name="cst_1" required="" style="width: 250px">
																					<option value="">-- DENOM --</option>
																					<option value="100">100.000</option>
																					<option value="50">50.000</option>
																				</select>
																			</div>
																		</td>
																		<td width="50%">
																			<div class="form-group">
																				<input type="text" placeholder="Value/Lembar" name="cst_1_val" class="reported_by form-control" />
																			</div>
																		</td>
																	</tr>
																</tbody>
															</div>
															<div class="form-group">
																<tbody>
																	<tr>
																		<td>
																			<label>CASSETTE 2</label>
																		</td>
																	</tr>
																	<tr>
																		<td width="50%">
																			<div class="form-group">
																				<select class="form-control " id="cst_2" name="cst_2" required="" style="width: 250px">
																					<option value="">-- DENOM --</option>
																					<option value="100">100.000</option>
																					<option value="50">50.000</option>
																				</select>
																			</div>
																		</td>
																		<td width="50%">
																			<div class="form-group">
																				<input type="text" placeholder="Value/Lembar" name="cst_2_val" class="reported_by form-control" />
																			</div>
																		</td>
																	</tr>
																</tbody>
															</div>
															<div class="form-group">
																<tbody>
																	<tr>
																		<td>
																			<label>CASSETTE 3</label>
																		</td>
																	</tr>
																	<tr>
																		<td width="50%">
																			<div class="form-group">
																				<select class="form-control " id="cst_3" name="cst_3" style="width: 250px">
																					<option value="">-- DENOM --</option>
																					<option value="100">100.000</option>
																					<option value="50">50.000</option>
																				</select>
																			</div>
																		</td>
																		<td width="50%">
																			<div class="form-group">
																				<input type="text" placeholder="Value/Lembar" name="cst_3_val" class="reported_by form-control" />
																			</div>
																		</td>
																	</tr>
																</tbody>
															</div>
															<div class="form-group">
																<tbody>
																	<tr>
																		<td>
																			<label>CASSETTE 4</label>
																		</td>
																	</tr>
																	<tr>
																		<td width="50%">
																			<div class="form-group">
																				<select class="form-control " id="cst_4" name="cst_4" style="width: 250px">
																					<option value="">-- DENOM --</option>
																					<option value="100">100.000</option>
																					<option value="50">50.000</option>
																				</select>
																			</div>
																		</td>
																		<td width="50%">
																			<div class="form-group">
																				<input type="text" placeholder="Value/Lembar" name="cst_4_val" class="reported_by form-control" />
																			</div>
																		</td>
																	</tr>
																</tbody>
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
		
		
		<!-- end row -->
		<!-- Modal -->
		<div class="modal fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
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
							<form action="<?=base_url()?>cro_master_collection_detail/update" style="margin-bottom: 10px" autocomplete="off" id="data" method="post" enctype="multipart/form-data" class="form_submit_today2">
								<div  style="margin: 0px 0px 0px 0px;" class="jarviswidget jarviswidget-color-blueLight" id="wid-id-12" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
									<div>
										<div class="widget-body no-padding"  style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
											<input type="hidden" name="id" placeholder="" class="id form-control" value="<?=$id?>" required />
											<table class="table table-bordered table-condensed">
												<tbody>
													<tr>
														<td colspan="3">
															<div class="form-group">
																<label>ID ATM</label>
																<br>
																<input type="text" placeholder="Value/Lembar" name="idatm" class="idatm form-control" readonly />
															</div>
															<div class="form-group">
																<tbody>
																	<tr>
																		<td width="30%">
																			<label></label>
																		</td>
																		<td width="25%" align="center">
																			100.000
																		</td>
																		<td width="25%" align="center">
																			50.000
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<label>CASSETTE 1</label>
																		</td>
																		<td>
																			<div class="form-group">
																				<input type="text" placeholder="Value/Lembar" id="cst_1_100" name="cst_1_100" class="form-control" />
																			</div>
																		</td>
																		<td>
																			<div class="form-group">
																				<input type="text" placeholder="Value/Lembar" id="cst_1_50" name="cst_1_50" class="form-control" />
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<label>CASSETTE 2</label>
																		</td>
																		<td>
																			<div class="form-group">
																				<input type="text" placeholder="Value/Lembar" id="cst_2_100" name="cst_2_100" class="form-control" />
																			</div>
																		</td>
																		<td>
																			<div class="form-group">
																				<input type="text" placeholder="Value/Lembar" id="cst_2_50" name="cst_2_50" class="form-control" />
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<label>CASSETTE 3</label>
																		</td>
																		<td>
																			<div class="form-group">
																				<input type="text" placeholder="Value/Lembar" id="cst_3_100" name="cst_3_100" class="form-control" />
																			</div>
																		</td>
																		<td>
																			<div class="form-group">
																				<input type="text" placeholder="Value/Lembar" id="cst_3_50" name="cst_3_50" class="form-control" />
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<label>CASSETTE 4</label>
																		</td>
																		<td>
																			<div class="form-group">
																				<input type="text" placeholder="Value/Lembar" id="cst_4_100" name="cst_4_100" class="form-control" />
																			</div>
																		</td>
																		<td>
																			<div class="form-group">
																				<input type="text" placeholder="Value/Lembar" id="cst_4_50" name="cst_4_50" class="form-control" />
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<label>CASSETTE 5</label>
																		</td>
																		<td>
																			<div class="form-group">
																				<input type="text" placeholder="Value/Lembar" id="cst_5_100" name="cst_5_100" class="form-control" />
																			</div>
																		</td>
																		<td>
																			<div class="form-group">
																				<input type="text" placeholder="Value/Lembar" id="cst_5_50" name="cst_5_50" class="form-control" />
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<label>REJECT/RETRACT</label>
																		</td>
																		<td>
																			<div class="form-group">
																				<input type="text" placeholder="Value/Lembar" id="divert_100" name="divert_100" class="form-control" />
																			</div>
																		</td>
																		<td>
																			<div class="form-group">
																				<input type="text" placeholder="Value/Lembar" id="divert_50" name="divert_50" class="form-control" />
																			</div>
																		</td>
																	</tr>
																</tbody>
															</div>
														</td>
													</tr>
												</tbody>
												</tfoot>
													<tr>
														<th colspan="3" style="color:white;height:10px;">
														<button type="button" id="close_modal2" class="btn btn-danger btn-sm zoomsmall" style="float: left; background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;"><img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px;" src="<?=base_url()?>assets/img/del2.png"/>Cancel/Close</button>
														<button type="submit" class="btn btn-primary btn-sm zoomsmall" style="float: right; background: linear-gradient(to top, #44a08d, #093637);border-radius: 4px;font-weight:bold;"><img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px;" src="<?=base_url()?>assets/img/clean.png"/>Create Ticket</button>
														</th>
													</tr>
													<tr>
														<th colspan="3	" style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;height:1px;"></th>
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

	</section>
	<!-- end widget grid -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	
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
						url: '<?php echo base_url().'new_ticket/select_atm'?>',
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

					url = "<?=base_url()?>new_ticket/get_ticket";
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
							console.log(response);
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
							dataType: 'json',
							method: 'post',
							processData: false,
							contentType: false,
							cache: false,
							data: formData,
							timeout: 3000,
						}).done(function (response) {
							if(response.status=="success") {
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
						url :  base_url + 'cro_master_collection_detail/get_data/<?=$id?>',
						type : 'POST',
						dataFilter: function(data) {
							console.log(data);
							var json = jQuery.parseJSON( data );
							json.recordsTotal = json.recordsTotal;
							json.recordsFiltered = json.recordsFiltered;
							json.data = json.data;

							return JSON.stringify( json );
						}
					},
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
		
		function updateModal(id, id_bank) {
			$('#myModal2').modal({
				backdrop: 'static'
			});
			
			$('.id').val(id);
			$('.idatm').val(id_bank);
			
			// // $(".idatmX2").select2().select2('val', id_bank);
			
			// var content = $('.content_form').clone().html();
		
			// $.confirm({
				// draggable: false,
				// title: false,
				// theme: 'light',
				// content: content,
				// buttons: {
					// formSubmit: {
						// text: 'Submit',
						// btnClass: 'btn-blue',
						// action: function () {
							// var self = this;
							// var url = self.$content.find('form')[0].action;
							// var formData = new FormData(self.$content.find('form')[0]);
							
							// var nama_client 	 = this.$content.find('.nama_client').val();
							// var alamat 	 = this.$content.find('.alamat').val();
							// var telepon 	 = this.$content.find('.telepon').val();
							
							// if(!nama_client){ $.alert('Please provide a valid client'); return false; }
							// if(!alamat){ $.alert('Please provide a valid alamat'); return false; }
							// if(!telepon){ $.alert('Please provide a valid picture telepon'); return false; }
							
							// var data = {
								// id			: id,
								// nama_client		: nama_client,
								// alamat		: alamat,
								// telepon			: telepon
							// };
							
							// console.table(url);
							// console.table(data);
							
							// self.showLoading();
							
							// $.ajax({
								// url: url,
								// type: 'POST',
								// data: formData,
								// success: function (data) {
									// response = JSON.parse(data);
									// if(response.status=="exist") {
										// self.hideLoading();
										// $.alert('Bank sudah tersedia!');
									// } else {
										// self.close();
										
										
										// notify('UPDATED', 'Modify Data Client Successful!', 'success')
										// // $.confirm({
											// // title: false,
											// // content: 'SUCCESS',
											// // autoClose: 'ok|1000',
											// // buttons: {
												// // ok: function () {}
											// // }
										// // });
										
										// table.ajax.reload( null, false );
									// }
								// },
								// cache: false,
								// contentType: false,
								// processData: false
							// });
							
							// // $.ajax({
								// // url: url,
								// // dataType: 'json',
								// // method: 'post',
								// // data: data,
								// // timeout: 3000,
							// // }).done(function (response) {
								// // console.log(response);
								// // if(response.status=="exist") {
									// // self.hideLoading();
									// // $.alert('Bank sudah tersedia!');
								// // } else {
									// // self.close();
									
									// // $.confirm({
										// // title: false,
										// // content: 'SUCCESS',
										// // autoClose: 'ok|1000',
										// // buttons: {
											// // ok: function () {}
										// // }
									// // });
									
									// // table.ajax.reload( null, false );
								// // }
							// // }).fail(function(){
								// // self.hideLoading();
								// // $.alert('Something went wrong.');
							// // });
							
							// return false;
						// }
					// },
					// cancel: function () {},
				// },
				// onContentReady: function () {
					// // bind to events
					// var jc = this;
					// jc.$content.find('.id').val(id);
					// jc.$content.find('.nama_client').val(nama_client);
					// jc.$content.find('.alamat').val(alamat);
					// jc.$content.find('.telepon').val(telepon);
					
					
					// this.$content.find('form').on('submit', function (e) {
						// // if the user submits the form by pressing enter in the field.
						// e.preventDefault();
						// jc.$$formSubmit.trigger('click'); // reference the button and click it
					// });
				// }
			// });
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV_SERVER\htdocs\bridnins\coresys\views/pages/cro_master_collection_detail/index.blade.php ENDPATH**/ ?>