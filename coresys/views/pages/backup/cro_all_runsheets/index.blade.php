@extends('layouts.master')

@section('stylesheet')
	<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/datetime/1.1.0/css/dataTables.dateTime.min.css">
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
@endsection

@section('breadcrumb')
@endsection

@section('content')
<style>
.hrow-gap1{
margin: 20px 0px 0px 0px;
}
.hrow-gap2{
margin: -30px 0px 0px 0px;
}
.hrow-gap3{
margin: -30px 0px 0px 0px;
}

hanzmobview{
  display: inline;
}
@media screen and (max-width: 1024px){
hanzmobview{
    display: none;
  }
.art-one{
  padding: 10px;
  }

}
</style>
<div class="row art-one">
<hanzmobview>
	<article class="btn-group col-sm-12">
		<div class="navbar navbar-default" style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );border-radius: 5px 5px 0px 0px;">
			<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
			<a href="<?=base_url()?>dashboard_merchant_internal" class="btn btn-default btn-circle btn-sm zoomsmall">
			<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/blackbut.png" height="24" width="24" />
				<p class="small" style="margin: -5px 0px 0px 0px;">
					<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Client Dashboard</small><br>
					<small style="color:white;font-size:12px;">Client Dashboard Monitoring</small>
				</p>
			</a>
			</div>
			<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
			<a href="<?=base_url()?>master_client" class="btn btn-default btn-circle btn-sm zoomsmall">
			<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/blackbook.png" height="24" width="24" />
				<p class="small" style="margin: -5px 0px 0px 0px;">
					<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Client & Customer </small><br>
					<small style="color:white;font-size:12px;">Data Client & Customer </small>
				</p>
			</a>
			</div>
			<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
			<a href="<?=base_url()?>master_atm" class="btn btn-default btn-circle zoomsmall active">
			<img style="float: left; margin: -1px 10px 0px 4px;" src="<?=base_url()?>seipkon/assets/img/atm2.png" height="24" width="24" />
				<p class="small" style="margin: -5px 0px 0px 0px;">
					<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Data Mesin ATM</small><br>
					<small style="color:white;font-size:12px;">Data Mesin ATM</small>
				</p>
			</a>
			</div>
			<div class="col-sm-2" style="margin: 5px 0px 0px 0px;">
			<a href="<?=base_url()?>master_location" class="btn btn-default btn-circle btn-sm zoomsmall">
			<img style="float: left; margin: -2px 10px 0px 3px;" src="<?=base_url()?>seipkon/assets/img/whiteloc.png" height="28" width="28" />
				<p class="small" style="margin: -5px 0px 0px 0px;">
					<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Area & Location</small><br>
					<small style="color:white;font-size:12px;">Area & Location Coverage</small>
				</p>
			</a>
			</div>			
		</div>
	</article>
</hanzmobview>
</div>
	<!-- widget grid -->
	<section id="widget-grid" class="">

	
		<div class="row">
			
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: -20px 0px 0px 0px;">

				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" data-widget-togglebutton="false"										  data-widget-fullscreenbutton="false"
				data-widget-deletebutton="false"
				data-widget-sortable="false"
				data-widget-editbutton="false">
					
					<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>Data Mesin ATM</b></h2>
						
						<span class="ribbon-button-alignment pull-right" style="margin: -22px 2px 0px 0px; "> 
						<section>
						<a onclick="createModal()" class="btn btn-default btn-xs pull-right zoomsmall" style="float:left; background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); border-radius: 4px; margin: 14px 0px 0px 0px;height:28px; width:230px">
						<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="20" width="20" />	
						<p class="small" style="margin: 6px 0px 0px 0px; ">
							<small style="color:black;font-size:12px; font-weight: bold;">Pilih Bank & Tambah Mesin ATM</small>
						</p>
						</a>
							<select id="select_client" class="form-control pull-right" style="margin: 14px 2px 0px 0px; width: 180px;height:28px">
							<option value="">Pilih Client/Bank</option>
							<?php 
								foreach($client as $r) {
									echo '<option value="'.$r->id.'">'.$r->nama.'</option>';
								}
							?>
							</select>
						</section>
						</span>
					</header>
					
					<div>
						<div class="widget-body no-padding">
							<table cellspacing="5" cellpadding="5" border="0" class="pull-right" style="margin : 10px">
								<tbody>
									<tr>
										<td>SEARCH BY DATE</td>
										<td style="width: 20px; text-align: center"> : </td>
										<td><input type="text" class="form-control" id="search_by_date" name="search_by_date"></td>
									</tr>
								</tbody>
							</table>
							<div id="content_table" style="padding: 20px">
							</div>
							<div id="content_no_data" style="padding: 20px; text-align: center; display: none">
								NO DATA
							</div>
						</div>
					</div>
				</div>
			</article>

		</div>


	</section>
@endsection

@section('javascript')
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAb7d-G5Ea9j3X_haj37bSPJkSN7PpAp7I&libraries=places"></script>
	<script type="text/javascript" src="<?=base_url()?>seipkon/assets/ContextMenu.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script src="https://cdn.datatables.net/datetime/1.1.0/js/dataTables.dateTime.min.js"></script>

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
			
			var search_by_date;
			
			search_by_date = new DateTime($('#search_by_date'), {
				format: 'DD-MM-YYYY'
			});
			
			$.ajax({
				url     : "<?=base_url()?>cro_all_runsheets/get_data",
				type    : "POST",
				data    : {},
				dataType: "html",
				timeout : 10000,
				cache   : false,
				success : function(html){
					if(html=="") {
						$('#content_no_data').show();
						$('#content_table').html("");
					} else {
						$('#content_no_data').hide();
						$('#content_table').html(html);
					}
				},
				error   : function(jqXHR, status, error){
					// alert(JSON.stringify(error));
					if(status==="timeout") {
						$.ajax(this);
						return;
					}
				}
			});
			
			// // Refilter the table
			$('#search_by_date').on('change', function () {
				// console.log(minDate);
				$.ajax({
					url     : "<?=base_url()?>cro_all_runsheets/get_data/" + $(this).val(),
					type    : "POST",
					data    : {},
					dataType: "html",
					timeout : 10000,
					cache   : false,
					success : function(html){
						if(html=="") {
							$('#content_no_data').show();
							$('#content_table').html("");
						} else {
							$('#content_no_data').hide();
							$('#content_table').html(html);
						}
					},
					error   : function(jqXHR, status, error){
						// alert(JSON.stringify(error));
						if(status==="timeout") {
							$.ajax(this);
							return;
						}
					}
				});
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
@endsection