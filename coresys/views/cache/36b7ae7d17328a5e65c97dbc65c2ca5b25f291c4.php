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
								<table id="mytable" class="table table-striped table-bordered table-hover" width="100%">
									<thead>			                
										<tr>
											<th>No.</th>
											<th>Run Number</th>
											<th>Tanggal Dibuat</th>
											<th>Tanggal Eksekusi</th>
											<th width="160px">Opsi/Fungsional</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
	</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('stylesheet'); ?>
	<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/datetime/1.1.0/css/dataTables.dateTime.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script src="https://cdn.datatables.net/datetime/1.1.0/js/dataTables.dateTime.min.js"></script>
	<script type="text/javascript">
		
		pageSetUp();
		
		var search_by_date;
		var table;
		var pagefunction = function() {
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;
			var breakpointDefinition = { tablet : 1024, phone : 480 };
			
			console.log($.fn.dataTable.version);
			console.log($.fn.dataTable.ext.search);
			$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
				return {
					"iStart": oSettings._iDisplayStart,
					"iEnd": oSettings.fnDisplayEnd(),
					"iLength": oSettings._iDisplayLength,
					"iTotal": oSettings.fnRecordsTotal(),
					"iFilteredTotal": oSettings.fnRecordsDisplay(),
					"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
					"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
				};
			};
			
			$.fn.dataTable.ext.search.push(
				function( settings, data, dataIndex ) {
					var min = search_by_date.val();
					var date = new Date( data[2] );
					if (
						( min == date )
					) {
						return true;
					}
					return false;
				}
			);
			
			// search_by_date = new DateTime($('#search_by_date'), { format: 'DD-MM-YYYY' });
			search_by_date = new DateTime($('#search_by_date'), { format: 'YYYY-MM-DD' });

			var t = $("#mytablex").dataTable({
				initComplete: function() {
					var api = this.api();
					$('#mytable_filter input')
							.off('.DT')
							.on('keyup.DT', function(e) {
								 if (e.keyCode == 13  || e.keyCode == 66 || e.keyCode == 65 || e.keyCode == 115 || e.keyCode == 8 || e.keyCode == 67 || e.keyCode == 68 || e.keyCode == 69 || e.keyCode == 70 || e.keyCode == 71 || e.keyCode == 72 || e.keyCode == 73 || e.keyCode == 74 || e.keyCode == 75 || e.keyCode == 76 || e.keyCode == 77 || e.keyCode == 78 || e.keyCode == 79 || e.keyCode == 80 || e.keyCode == 81 || e.keyCode == 82 || e.keyCode == 83 || e.keyCode == 84 || e.keyCode == 85 || e.keyCode == 86 || e.keyCode == 87 || e.keyCode == 88 || e.keyCode == 89 || e.keyCode == 90 || e.keyCode == 90 || e.keyCode == 48 || e.keyCode == 49 || e.keyCode == 50 || e.keyCode == 51 || e.keyCode == 52 || e.keyCode == 53 || e.keyCode == 54 || e.keyCode == 55 || e.keyCode == 56 || e.keyCode == 57 || e.keyCode == 33 || e.keyCode == 35 || e.keyCode == 36 || e.keyCode == 37 || e.keyCode == 38 || e.keyCode == 40 || e.keyCode == 41 || e.keyCode == 42 || e.keyCode == 94  ) {
									api.search(this.value).draw();
						}
					});
				},
				oLanguage: {
					sProcessing: "loading..."
				},
				processing: true,
				serverSide: true,
				ajax: {"url": "cro_master_cashreplenish/json", "type": "POST"},
				columns: [
					{"data": "run_number"},
					{"data": "date"},
					{"data": "action_date"},
					{"data": "action_date"},
					{"data": "action_date"}
				],
				order: [[0, 'desc']],
				rowCallback: function(row, data, iDisplayIndex) {
					var info = this.fnPagingInfo();
					var page = info.iPage;
					var length = info.iLength;
					var index = page * length + (iDisplayIndex + 1);
					$('td:eq(0)', row).html(index);
				}
			});
			
			table = $('#mytable').DataTable({
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
			
			$('#search_by_date').on('change', function () {
				// table.draw();
				table.ajax.url('cro_master_cashreplenish/get_data/'+$(this).val()).load();
			});
		};
		
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV_SERVER\htdocs\bridnins\coresys\views/pages/cro_master_cashreplenish/view.blade.php ENDPATH**/ ?>