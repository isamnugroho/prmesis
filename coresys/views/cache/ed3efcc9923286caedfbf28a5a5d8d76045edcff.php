<?php $__env->startSection('stylesheet'); ?>
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
	<div class="row">
		<hanzmobview>
			<article class="btn-group col-sm-12">
				<div class="navbar navbar-default" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 5px 5px 0px 0px;">
					<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
					<a href="report_attendance" class="btn btn-default btn-circle btn-sm zoomsmall active">
					<img style="float: left; margin: -1px 10px 0px 6px;" src="<?=base_url()?>seipkon/assets/img/cal.png" height="24" width="24" />
						<p class="small" style="margin: -5px 0px 0px 0px;">
							<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Attendance Report</small><br>
							<small style="color:white;font-size:12px;">Absensi & Persensi Report</small>
						</p>
					</a>
					</div>
					<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
					<a href="inventory_report" class="btn btn-default btn-circle btn-sm zoomsmall ">
					<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/report.png" height="24" width="24" />
						<p class="small" style="margin: -5px 0px 0px 0px;">
							<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Inventory Report</small><br>
							<small style="color:white;font-size:12px;">Report Logistics & Inventory </small>
						</p>
					</a>
					</div>
					<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
					<a href="report_maintenance" class="btn btn-default btn-circle zoomsmall">
					<img style="float: left; margin: -1px 10px 0px 6px;" src="<?=base_url()?>seipkon/assets/img/filewhite.png" height="24" width="24" />
						<p class="small" style="margin: -5px 0px 0px 0px;">
							<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Maintenance Report</small><br>
							<small style="color:white;font-size:12px;">Maintenance Service Report</small>
						</p>
					</a>
					</div>
					<div class="col-sm-2" style="margin: 5px 0px 0px 0px;">
					<a href="report_jobcard" class="btn btn-default btn-circle btn-sm zoomsmall">
					<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/filerack2.png" height="24" width="24" />
						<p class="small" style="margin: -5px 0px 0px 0px;">
							<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Jobcard Report</small><br>
							<small style="color:white;font-size:12px;">Jobcard Maintenance Report</small>
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
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: -20px 0px 0px 0px;">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" 	
					data-widget-colorbutton="false" 
					data-widget-togglebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-deletebutton="false"
					data-widget-sortable="false">
					<!-- widget options:
					usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

					data-widget-colorbutton="false"
					data-widget-editbutton="false"
					data-widget-togglebutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-collapsed="true"
					data-widget-sortable="false"

					-->
					<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>Attendance Report</b></h2>
					</header>

					<!-- widget div-->
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
							<center>
								<form action="<?=base_url()?>report_attendance" method="GET">
									<div class="" style="border-radius: 5px; width: 20%">
										<div class="form-group">
											<label class="control-label">Pilih Bulan:</label>
											<input type="text" name="month_year" class="form-control input-sm from" placeholder="Pilih Bulan" value="">
										</div>
										
										<button style="border-radius: 5px;" type="submit" class="btn btn-sm btn-info pull-right"><b>Preview</b></button>
									</div>
								</form>
							</center>
						</div>
						<!-- end widget edit box -->

						<!-- widget content -->
						<div class="widget-body no-padding">
							<?php
								// print_r($resourcess);
							?>
							<div style="padding: 20px;" id="calendar"></div>

						</div>
						<!-- end widget content -->

					</div>
					<!-- end widget div -->

				</div>
				<!-- end widget -->

			</article>
			<!-- WIDGET END -->
			
			

		</div>

		<!-- end row -->

		<div class="container content_form" hidden>
			<form action="<?=base_url()?>trouble_sub_category/insert" class="formName">
				<div class="form-group">
					<label>Nama Kategori</label>
					<select class="form-control category" id="category" required="">
						<option value="">Pilih Kategori</option>
					</select>
				</div>
				<div class="form-group">
					<label>Masukan Nama Sub Kategori</label>
					<input type="text" placeholder="Nama Sub Kategori" class="name form-control" required />
				</div>
			</form>
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
			$('#calendar').fullCalendar({
				defaultView: 'timelineMonth',
				header: {
					right: 'timelineMonth'
				},
				defaultDate: moment('<?php echo $default_dateZ;?>'),
				resourceColumns: [
					{
					  labelText: 'Employee',
					  field: 'title'
					},
					{
					  labelText: 'Present',
					  field: 'employee_present'
					}
				],
				resources: <?=$resourcess?>,
				events: <?=$eventss?>,
			});
			
			var default_date = '<?=$default_dateZ?>';
			$('.from').val(default_date);
			
			$('.from').on('focus', function() {
				$(".view_bank").hide("slow");
				$(".view_atm").hide("slow");
			});
		
			$('.from').datepicker({
				autoclose: true,
				minViewMode: 1,
				format: 'yyyy-mm',
				todayHighlight: true
			}).on('changeDate', function(selected){
				var bulan = ("0" + (selected.date.getMonth() + 1)).slice(-2);
				var tahun = selected.date.getFullYear(); 
				// console.log(selected);
				// console.log(bulan+" "+tahun);
				
				$(".view_bank").show("slow");
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\2021\JUL-W1\BRIDNINS\coresys\views/pages/cle_report_attendance/index.blade.php ENDPATH**/ ?>