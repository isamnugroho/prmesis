<?php $__env->startSection('stylesheet'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>datatables/datatables.css"/>
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>datatables/fixedColumns.dataTables.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>datatables/scroller.dataTables.min.css"/>
	<script type="text/javascript" src="<?=BASE_URL?>datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?=BASE_URL?>datatables/dataTables.fixedColumns.min.js"></script>
	<script type="text/javascript" src="<?=BASE_URL?>datatables/dataTables.scroller.min.js"></script>

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
		
		.fc-event, .fc-event-dot {
			background-color: white;
			border: 1px solid #3a87ad;
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
	
	<section id="widget-grid" class="">
		<!-- row -->
		<div class="row">
			
			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: 0px 0px 0px 0px;">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" 	
					data-widget-colorbutton="false" 
					data-widget-togglebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-deletebutton="false"
					data-widget-sortable="false"
					data-widget-editbutton="false">
					
					<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>Key Permits & Performance Report</b></h2>
					</header>

					<!-- widget div-->
					<div>
						<div class="widget-body no-padding">

							<table id="example" class="display nowrap cell-border" style="width:100%">
								<thead>
									<tr>
										<th></th>
										<th>No</th>
										<th>ID ATM</th>
										<th>PIC/CSE/CUSTODY</th>
										<th>Request Date / Time</th>
										<th>Provide Date / Time</th>
										<th>Close Date / Time</th>
										<th style="background-color: #ebebeb">Total Time</th>
									</tr>
								</thead>
							</table>

						</div>
						<!-- end widget content -->

					</div>
					<!-- end widget div -->

				</div>
				<!-- end widget -->

			</article>
			<!-- WIDGET END -->
			
		</div>
	</section>
	<!-- end widget grid -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<?php 
		$default_date = date("Y-m-d");
	?>
	<script type="text/javascript">

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
		var pagefunction = function() {
			function format(d) {
				// `d` is the original data object for the row
				return '<table cellpadding="5" cellspacing="0" border="0" class="table table-hover table-condensed">' +
					'<tr>' +
					'<td style="width:100px">Reported By:</td>' +
					'<td>'+d.reported_by+'</td>' +
					'</tr>' +
					// '<tr>' +
					// '<td style="width:100px">Reported Problem:</td>' +
					// '<td>'+d.reported_problem+'</td>' +
					// '</tr>' +
					// '<tr>' +
					// '<td style="width:100px">Email PIC:</td>' +
					// '<td>'+d.email_pic+'</td>' +
					// '</tr>' +
					'<tr>' +
					'<td style="width:100px">Phone PIC:</td>' +
					'<td>'+d.phone_pic+'</td>' +
					'</tr>' +
					'</tr>' +
					'</table>';
			}
			
			var table = $('#example').DataTable({
				serverSide: true,
				ordering: false,
				searching: false,
				lengthChange: false,
				ajax: {
					url: '<?=base_url()?>key_report/json',
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
				scrollX:        true,
				"columns": [{
						"class": 'details-control',
						"orderable": false,
						"data": null,
						"defaultContent": ''
					},
					{"data": "no"},
					{"data": "lokasi"},
					{"data": "cse"},
					{"data": "email_date"},
					{"data": "entry_date"},
					{"data": "close_date"},
					{"data": "resolution_time"},
				],
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV_SERVER\htdocs\cencon\ProtoMONPro\coresys\views/pages/key_report/index.blade.php ENDPATH**/ ?>