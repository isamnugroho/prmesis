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
				<a href="new_ticketslm" class="btn btn-default btn-circle btn-sm zoomsmall">
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
				<a href="slm_history" class="btn btn-default btn-circle btn-sm zoomsmall active">
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
					data-widget-editbutton="false"
					data-widget-sortable="false">
				
					<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>SLM Historycal Data</b></h2>
						
					</header>
					
					
					<span class="ribbon-button-alignment pull-right" style="margin: -42px 2px 0px 0px; "> 
						<section>
							<div class="" style="border-radius: 5px; width: 20%; margin: 0px 2px 0px 0px; width: 180px;height:28px">
								<div class="form-group">
									<input type="text" class="form-control input-sm from" placeholder="Pilih Bulan" >
								</div>
								
								<button style=" border-radius: 5px;" type="button" onclick="preview()" class="btn btn-sm btn-info pull-right hidden"><b>Preview</b></button>
							</div>
						</section>
					</span>
						
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
							<center>
								<div class="" style="border-radius: 5px; width: 20%">
									<div class="form-group">
										<label class="control-label">Pilih Tanggal:</label>
										<input type="text" class="form-control input-sm from" placeholder="Pilih Bulan" >
									</div>
									
									<button style=" border-radius: 5px;" type="button" onclick="preview()" class="btn btn-sm btn-info pull-right hidden"><b>Preview</b></button>
								</div>
							</center>
						</div>
						<!-- end widget edit box -->

						<!-- widget content -->
						<div class="widget-body no-padding">

							<div class="table display table-bordered" id="content_table" style="margin: -30px 0px 0px 0px;">
								<div>
								
								</div>
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

		<!-- end row -->


	</section>
	<!-- end widget grid -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
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
		var table;
		var pagefunction = function() {
			<?php if($id=="") { ?>
					$('.from').val("<?php echo $date; ?>");
			<?php } ?>
			// $('.from').val("<?php echo $date; ?>");
			
			$('.from').on('focus', function() {
				$(".view_bank").hide("slow");
				$(".view_atm").hide("slow");
			});
		
			$('.from').datepicker({
				autoclose: true,
				minViewMode: 0,
				format: 'yyyy-mm-dd',
				todayHighlight: true
			}).on('changeDate', function(selected){
				if(selected.date!==undefined) { 
					var hari = ("0" + selected.date.getDate()).slice(-2);
					var bulan = ("0" + (selected.date.getMonth() + 1)).slice(-2);
					var tahun = selected.date.getFullYear(); 
					console.log(selected);
					var date = tahun+"-"+bulan+"-"+hari;
					
					$.ajax({
						url: '<?=base_url()?>status_ticket/show_table',
						dataType: 'html',
						method: 'get',
						data: {id: "", date: date},
						timeout: 3000,
					}).done(function (response) {
						$('#content_table div').remove();
						$('#content_table').html(response);
					}).fail(function(){
						$.alert('Something went wrong.');
					});
				}
			}); 
			
			setInterval(get_data_table, 1000);
				
			$.get("<?=base_url()?>status_ticket/show_table", {id: "<?=$id?>", date: "<?=$date?>"}, function(response){
				$('#content_table div').remove();
				$('#content_table').html(response);
			});

			function get_data_table() {
				$.get("<?=base_url()?>status_ticket/check_data", function(response){
					if(response>0) {
						console.log("UPDATED");
						$.get("<?=base_url()?>status_ticket/update_status", function(response){
							if(response=="success") {
								$.get("<?=base_url()?>status_ticket/show_table", {id: "<?=$id?>", date: "<?=$date?>"}, function(response){
									$('#content_table div').remove();
									$('#content_table').html(response);
								});
							}
						});
					}
				});		
			}
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\2021\JUL-W1\BRIDNINS\coresys\views/pages/slm_history/index.blade.php ENDPATH**/ ?>