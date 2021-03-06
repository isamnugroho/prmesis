@extends('layouts.master')

@section('stylesheet')
@endsection

@section('breadcrumb')
@endsection

@section('content')
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
				<div class="col-sm-2" style="margin: 5px 0px 0px 0px;">
				<a href="<?=base_url()?>master_inventory" class="btn btn-default btn-circle btn-sm zoomsmall">
				<img style="float: left; margin: -2px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/building.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Count Inventory</small><br>
						<small style="color:white;font-size:12px;">Dashboard Inventory</small>
					</p>
				</a>
				</div>
				<div class="col-sm-2" style="margin: 5px 0px 0px 0px;">
				<a href="<?=base_url()?>master_inventory" class="btn btn-default btn-circle btn-sm zoomsmall ">
				<img style="float: left; margin: -2px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/inventory3.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Inventory Stock</small><br>
						<small style="color:white;font-size:12px;">Inventory Logistics</small>
					</p>
				</a>
				</div>
				<div class="col-sm-2" style="margin: 5px 0px 0px 0px;">
				<a href="<?=base_url()?>accesory_part" class="btn btn-default btn-circle btn-sm zoomsmall">
				<img style="float: left; margin: -2px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/dataset.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Accesory Part</small><br>
						<small style="color:white;font-size:12px;">List Accesory Part</small>
					</p>
				</a>
				</div>
				<div class="col-sm-2" style="margin: 5px 0px 0px 0px;">
				<a href="<?=base_url()?>transaction_in" class="btn btn-default btn-circle btn-sm zoomsmall">
				<img style="float: left; margin: -2px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/incoming.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Transaction In</small><br>
						<small style="color:white;font-size:12px;">Incoming Transaction</small>
					</p>
				</a>
				</div>
				<div class="col-sm-2" style="margin: 5px 0px 0px 0px;">
				<a href="<?=base_url()?>transaction_out" class="btn btn-default btn-circle zoomsmall active">
				<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/outgoing.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Transaction Out</small><br>
						<small style="color:white;font-size:12px;">Outgoing Transaction</small>
					</p>
				</a>
				</div>
				<div class="col-sm-2" style="margin: 5px 0px 0px 0px;">
				<a href="<?=base_url()?>request_sparepart" class="btn btn-default btn-circle zoomsmall">
				<img style="float: left; margin: -2px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/db_add.png" height="26" width="26" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Request Part</small><br>
						<small style="color:white;font-size:12px;">Incoming Request</small>
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
					data-widget-sortable="false"
					data-widget-editbutton="false">
					<header style="background: linear-gradient(to bottom, #00c6ff, #0072ff);">
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>Data Transaction Out</b></h2>
					</header>
					<span class="ribbon-button-alignment pull-right" style="margin: -55px 2px 0px 0px; "> 
						<section>
						<a onclick="createModal()" class="btn btn-default btn-xs pull-right zoomsmall" style="float:left; background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); border-radius: 4px; margin: 14px 0px 0px 0px;height:28px; width:140px">
						<img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="20" width="20" />
						<!--<b style="margin: 0px 0px 0px 0px;font-size:12px">Pilih & Tambah Client/Bank</b>-->	
						<p class="small" style="margin: 6px 0px 0px 0px; ">
							<small style="color:black;font-size:12px; font-weight: bold;">Transaction Out</small>
						</p>
						</a>
							<select id="select_merk" class="form-control pull-right" style="margin: 14px 2px 0px 0px; width: 180px;height:28px">
							<option value="">Pilih Jenis/Merek Mesin</option>
							<?php 
								foreach($merk as $r) {
									echo '<option value="'.$r->merk.'">'.$r->merk.'</option>';
								}
							?>
							</select>
						</section>
					</span>
					<div>
						<div class="widget-body no-padding">

							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th data-hide="phone">No.</th>
										<th data-class="expand">Tanggal Keluar</th>
										<th data-hide="phone,tablet">Nama Sparepart</th>
										<th data-hide="phone,tablet">Quantity</th>
										<th data-hide="phone,tablet">Service Area</th>
										<th data-hide="phone,tablet">CSE</th>
										<th width="180">Opsi/Fungsional</th>
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

		<!-- end row -->

		<div class="container content_maps" hidden>
			<input id="searchInput" class="controls" type="text" placeholder="Enter a location">
			<div id="w3docs-map" class="w3docs-map" style="width: 100%;height: 480px; display: none"></div>
		</div>
		
		<div class="container content_form" hidden style="margin: 0px 0px 0px 0px;">
			<div style="margin: 0px 0px -40px 0px;" class="jarviswidget jarviswidget-color-blueLight"  style="margin: 0px 0px 0px 0px;" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
				<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
					<span class="widget-icon"> <img style="float: left; margin: 8px 5px 0px 6px;" src="<?=base_url()?>assets/img/outgoing.png" height="18" width="18" /> </span>
					<h2 style="color:white;font-size:14px; font-weight: bold; margin: -2px 0px 0px 10px;">Transaction Out
					</h2>
				</header>
				<div style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
					<div class="widget-body no-padding">
						<div class="col-md-6" style="margin: 10px 0px 0px 0px;">
							<div class="form-group">
								<label class="control-label">Kode Sparepart :</label>
								<div id="slWrapper" class="parsley-select wd-250">
									<select class="form-control" data-placeholder="Choose one" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" id="kode_part" name="kode_part" required>
										<option value="">Pilih Jenis/Merek Mesin</option>
									</select>
									<div id="slErrorContainer"></div>
								</div>
							</div>
						</div>
						<div class="col-md-6" style="margin: 10px 0px 0px 0px;">
							<div class="form-group">
								<label class="control-label">ID Service Area :</label>
								<div id="slWrapper" class="parsley-select wd-250">
									<select class="form-control" data-placeholder="Choose one" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" id="pid" name="pid" required>
										<option value="">Pilih Customer</option>
									</select>
									<div id="slErrorContainer"></div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Quantity :</label>
								<input type="text" placeholder="" class="form-control quantity" id="quantity" name="quantity" value="" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Tanggal Keluar :</label>
								<input type="text" placeholder="" class="form-control" id="tgl_keluar" name="tgl_keluar" value="" required>
							</div>
						</div>
							
					</div>
				</div>
			</div>	
			
			
			
			<center>
				<form action="<?=base_url().explode("/", $that->uri->uri_string())[0].'/insert'?>" style="width: 95%; text-align: left; margin: 10px 0px 0px 0px;">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<article id="request_detail" class="col-sm-12 col-md-12 col-lg-12" style="margin: 0px 0px -60px 0px; display: none">
									<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
										<header style="background-image: linear-gradient( 171.8deg,  rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 78.6% );color:white;">
											<span class="widget-icon"> <img style="float: left; margin: 7px 5px 0px 8px;" src="<?=base_url()?>assets/img/outgoing.png" height="18" width="18" /> </span>
											<h2 style="color:white;font-size:14px; font-weight: bold;">Transaction Out - Approved Request 
											</h2>
										</header>
										<div>
											<div class="widget-body no-padding">
											<table class="table table-bordered table-condensed">
												<thead>
													<tr>
														<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">No</th>
														<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">Type Mesin/Sparepart</th>
														<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;">Quantity</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td style="background: #ffffff"><span id="">1</span></td>
														<td style="background: #ffffff"><span id="">NCR / POWER SUPPLY</span></td>
														<td style="background: #ffffff"><span id="">4</span></td>
													</tr>
												</tbody>
												<tfoot>
													<tr>
														<th colspan="3" style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;height:1px;"></th>
													</tr>
												</tfoot>
											</table>
											</div>
										</div>
									</div>
								</article>									
							</div>	
					
							
						</div>
						
		
						<div class="col-md-12" id="add_detail" style="display: none">
							
							<a onclick="createModalMerk()" class="btn btn-primary pull-right" style="margin-top: -0px; border-radius: 5px;"><img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="25" width="20" /><b>Tambah Data</b></a>
							<table id="datatable2" class="table display table-bordered">
								<thead>
									<th width="10" style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;font-size:12px;">No.</th>
									<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;font-size:12px;">Nama Part</th>
									<th style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;font-size:12px;">S/N Part</th>
									<!--<th style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);color:white;font-size:14px;">Price</th>-->
									<th width="10" style="background: linear-gradient(to bottom, #00c6ff, #0072ff);color:white;font-size:12px;" align="center">Option</th> 
								</thead>
							</table>
						</div>
					</div>
				</form>
			</center>
		</div>

		<div class="container content_merk" hidden>


		<center>
				<form action="<?=base_url().explode("/", $that->uri->uri_string())[0].'/add_data_temp'?>" style="width: 90%; text-align: left">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">List Sparepart :</label>
								<div id="slWrapper" class="parsley-select wd-250">
									<select class="form-control" data-placeholder="Choose one" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" id="kode_part2" name="kode_part2" required>
										<option value="">Pilih S/N Sparepart</option>
									</select>
									<div id="slErrorContainer"></div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</center>
		</div>

	</section>
	<!-- end widget grid -->
@endsection

@section('javascript')
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
		var table2;
		var qty_global;
		var price_global = 0;
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
						url :  base_url + 'transaction_in_sp/get_data/0',
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
				
				$("#select_merk").on("change", function() {
					that = $(this);
					if(that.val()!=="") {
						// alert(that.val());
						// table.ajax.url(base_url + 'transaction_in_sp/get_data/'+that.val()).load();	
					} else {
						table.ajax.url(base_url + 'transaction_in_sp/get_data/0').load();
					}
				});

			/* END BASIC */

		};

		function createModalMerk() {
			var content = $('.content_merk').clone().html();
			// alert(qty_global);
			if(qty_global==undefined) {
				price_global = 0;
				$.alert('Silahkan input quantity dengan jumlah yang sesuai!');
				return false;
			}
			
			var merk = $("#select_merk").val();
			var part = $("#kode_part").select2('data')[0].id;
			// alert(part);
			
			$.ajax({url: '<?=base_url()?>transaction_out/count_data_temp', dataType: 'html', method: 'post', data: { 
			}, timeout: 3000}).done(function (response) {
				var cnt_response = response;
				// alert(qty_global+ " "+cnt_response);
				if(qty_global!==undefined) {
					if(parseInt(cnt_response)>=parseInt(qty_global)) {
						$.alert('Jumlah quantity sudah terpenuhi!');
						return false;
					} else {
						$.confirm({
							draggable: false,
							title: false,
							theme: 'light',
							content: content,
							columnClass: 'col-md-4 col-md-offset-4',
							buttons: {
								formSubmit: {
									text: 'Submit',
									btnClass: 'btn-blue',
									action: function () {
										var self = this;
										var url = self.$content.find('form')[0].action;
										var form = self.$content.find('form')[0];
										var formData = new FormData(form);
										
										var price = this.$content.find('#price').val();
										price_global = price;
										// self.showLoading();
										
										$.ajax({
											url: url,
											dataType: 'html',
											method: 'post',
											processData: false,
											contentType: false,
											cache: false,
											data: formData,
											timeout: 3000,
										}).done(function (response) {
											if(response=="EXIST") {
												alert("This S/N already inputed!");
											} else {
												self.buttons.formSubmit.hide();
												self.buttons.cancel.hide();
												self.close();
												table2.ajax.reload( null, false );
												self.close();
												// alert(parseInt(cnt_response)+" "+parseInt(qty_global));
												if(parseInt(cnt_response)<parseInt(qty_global)) {
													createModalMerk();
												}
											}
											// console.log(response);
										}).fail(function(){
											self.hideLoading();
											$.alert('Something went wrong.');
										});
										
										return false;
									}
								},
								cancel: function () {
									
								},
							},
							onContentReady: function () {
								// bind to events
								var jc = this;
								
								// if(price_global!==0) {
									// jc.$content.find('#price').val(price_global);
								// }
								
								alert(merk+ " " +part);
								
								jc.$content.find('#kode_part2').select2({
									tokenSeparators: [','],
									ajax: {
										dataType: 'json',
										url: '<?php echo base_url().'transaction_out/get_part_detail'?>',
										delay: 250,
										type: "POST",
										data: function(params) {
											return {
												search: params.term,
												merk: merk,
												part: part
											}
										},
										processResults: function (data, page) {
											return {
												results: data
											};
										}
									}
								}).on('change', function(e) {
									console.log($(this).select2('data'));
									var data = $(this).select2('data');
									var value = data[0].id;
									var text = data[0].text;
									// $.get("<?=base_url()?>transaction_in/get_category", { id: value }, function(res) {
										// // alert(res);
										// if(res!="consume") {
											// jc.$content.find("#add_detail").css("display", "");
										// } else {
											// jc.$content.find("#add_detail").css("display", "none");
										// }
									// });
								});
								
								this.$content.find('.name').focus();
								this.$content.find('form').on('submit', function (e) {
									// if the user submits the form by pressing enter in the field.
									e.preventDefault();
									jc.$$formSubmit.trigger('click'); // reference the button and click it
								});
							}
						});
					}
				}
			});
		}
		
		function createModal() {
			var content = $('.content_form').clone().html();
			
			var merk = $("#select_merk").val();
			if(merk=="") {
				$.alert('Pilih Jenis/Merek Mesin terlebih dahulu!');
				return false;
			}
			
			$.ajax({url: '<?=base_url()?>transaction_out/clear_temp', dataType: 'html', method: 'post', data: {}, timeout: 3000}).done();
			
			$.confirm({
				draggable: false,
				title: false,
				theme: 'light',
				content: content,
				columnClass: 'col-md-8 col-md-offset-2',
				buttons: {
					formSubmit: {
						text: 'Submit',
						btnClass: 'btn-blue',
						action: function () {
							var self = this;
							var url = self.$content.find('form')[0].action;
							
							var kode_part = this.$content.find('#kode_part').val();
							var pid = this.$content.find('#pid').val();
							var tgl_keluar = this.$content.find('#tgl_keluar').val();
							var quantity = this.$content.find('#quantity').val();
							
							var data = {
								id: null,
								kode_part: kode_part,
								pid: pid,
								tgl_keluar: tgl_keluar,
								quantity: quantity
							};
							
							console.log(data);
							
							// self.showLoading();
							
							$.ajax({
								url: url,
								dataType: 'html',
								method: 'post',
								data: data,
								timeout: 3000,
							}).done(function (response) {
								// self.buttons.formSubmit.hide();
								// self.buttons.cancel.hide();
								// self.close();
								
								console.log(response);
								if(response=="success") {
									self.close();
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
								} else {
									self.hideLoading();
									$.alert('Something wrong!');
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
					// bind to events
					var jc = this;
					this.$content.find('.name').focus();
					// let dropdown = this.$content.find('#kode_part');
					// dropdown.empty();
					// dropdown.append('<option selected="true" disabled>Pilih Sparepart</option>');
					// dropdown.prop('selectedIndex', 0);
					// $.ajax({url: '<?=base_url()?>transaction_out/get_part', dataType: 'html', method: 'post', data: { merk: $("#select_merk").val() }, timeout: 3000}).done(function (response) {
						// var data = JSON.parse(response);

						// $.each(data, function(key, val) {
							// dropdown.append($('<option></option>').attr('value', val.kode_part).text('['+val.kode_part+'] '+val.nama_part));
						// });
					// });
					
					var base_url = "<?php echo base_url();?>";
					table2 = this.$content.find('#datatable2').DataTable({
						searching: false, paging: false, info: false,
						"pageLength" : 100,
						"serverSide": true,
						"order": [[1, "asc" ]],
						"columnDefs": [{"orderable": false, "targets": 0}],
						"ajax":{
							url :  base_url + 'transaction_in_sp/get_data_temp',
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
					}); // End of DataTable
					
					jc.$content.find('#kode_part').select2({
						tokenSeparators: [','],
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'transaction_out/get_part2'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term,
									merk: merk
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}
					}).on('change', function(e) {
						console.log($(this).select2('data'));
						$(this).prop("disabled", true);
						var data = $(this).select2('data');
						var value = data[0].id;
						var text = data[0].text;
						$.get("<?=base_url()?>transaction_in/get_category", { id: value }, function(res) {
							// alert(res);
							if(res!="consume") {
								jc.$content.find("#add_detail").css("display", "");
							} else {
								jc.$content.find("#add_detail").css("display", "none");
							}
						});
					});
					

					// let dropdown2 = this.$content.find('#pid');
					// dropdown2.empty();
					// dropdown2.append('<option selected="true" disabled>Pilih Service Area</option>');
					// dropdown2.prop('selectedIndex', 0);
					// $.ajax({url: '<?=base_url()?>transaction_out/get_cust', dataType: 'html', method: 'post', data: {}, timeout: 3000}).done(function (response) {
						// var data = JSON.parse(response);

						// $.each(data, function(key, val) {
							// dropdown2.append($('<option></option>').attr('value', val.id).text('['+val.idatm+'] '+val.sn_mesin));
						// });
					// });
					
					jc.$content.find('#pid').select2({
						tokenSeparators: [','],
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'transaction_out/get_area'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term,
									merk: merk
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}
					}).on('change', function(e) {
						console.log($(this).select2('data'));
						var data = $(this).select2('data');
						var value = data[0].id;
						var text = data[0].text;
						// $.get("<?=base_url()?>transaction_in/get_category", { id: value }, function(res) {
							// alert(res);
							// if(res!="consume") {
								// jc.$content.find("#add_detail").css("display", "");
							// } else {
								// jc.$content.find("#add_detail").css("display", "none");
							// }
						// });
					});

					this.$content.find('#tgl_keluar').datepicker({
						autoclose: true,
						minViewMode: 0,
						format: 'yyyy-mm-dd',
						todayHighlight: true
					}).on('changeDate', function(selected){
						var bulan = ("0" + (selected.date.getMonth() + 1)).slice(-2);
						var tahun = selected.date.getFullYear(); 
					}); 
					
					this.$content.find('#quantity').on('change', function (tes) {
						qty_global = $(this).val();
					});

					this.$content.find('form').on('submit', function (e) {
						// if the user submits the form by pressing enter in the field.
						e.preventDefault();
						jc.$$formSubmit.trigger('click'); // reference the button and click it
					});
				}
			});
		}
		
		function updateModal(id, tgl_terpakai, kode_part, pid, quantity) {
			// $.alert(id+' '+id_bank+' '+idatm+' '+cabang+' '+lokasi+' '+kategori+' '+status+' '+alamat);
			var content = $('.content_form').clone().html();
		
			$.confirm({
				draggable: false,
				title: false,
				theme: 'light',
				content: content,
				columnClass: 'col-md-8 col-md-offset-2',
				buttons: {
					formSubmit: {
						text: 'Submit',
						btnClass: 'btn-blue',
						action: function () {
							var self = this;
							var url = self.$content.find('form')[0].action;
							
							var kode_part = this.$content.find('#kode_part').val();
							var pid = this.$content.find('#pid').val();
							var tgl_terpakai = this.$content.find('#tgl_terpakai').val();
							var quantity = this.$content.find('#quantity').val();
							
							var data = {
								id: id,
								kode_part: kode_part,
								pid: pid,
								tgl_terpakai: tgl_terpakai,
								quantity: quantity
							};
							
							console.log(data);
							
							self.showLoading();
							
							$.ajax({
								url: url,
								dataType: 'html',
								method: 'post',
								data: data,
								timeout: 3000,
							}).done(function (response) {
								// self.buttons.formSubmit.hide();
								// self.buttons.cancel.hide();
								// self.close();
								
								console.log(response);
								if(response=="success") {
									self.close();
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
								} else {
									self.hideLoading();
									$.alert('Something wrong!');
								}
							}).fail(function(){
								self.hideLoading();
								$.alert('Something went wrong.');
							});
							
							return false;
						}
					},
					cancel: function () {},
				},
				onContentReady: function () {
					// bind to events
					var jc = this;

					let dropdown = this.$content.find('#kode_part');
					dropdown.empty();
					dropdown.append('<option selected="true" disabled>Pilih Sparepart</option>');
					dropdown.prop('selectedIndex', 0);
					$.ajax({url: '<?=base_url()?>transaction_out/get_part', dataType: 'html', method: 'post', data: { merk: $("#select_merk").val() }, timeout: 3000}).done(function (response) {
						var data = JSON.parse(response);

						$.each(data, function(key, val) {
							dropdown.append($('<option></option>').attr('value', val.kode_part).text('['+val.kode_part+'] '+val.nama_part));
						});
					});

					let dropdown2 = this.$content.find('#pid');
					dropdown2.empty();
					dropdown2.append('<option selected="true" disabled>Pilih Sparepart</option>');
					dropdown2.prop('selectedIndex', 0);
					$.ajax({url: '<?=base_url()?>transaction_out/get_cust', dataType: 'html', method: 'post', data: {}, timeout: 3000}).done(function (response) {
						var data = JSON.parse(response);

						$.each(data, function(key, val) {
							dropdown2.append($('<option></option>').attr('value', val.id).text('['+val.idatm+'] '+val.sn_mesin));
						});
					});

					jc.$content.find('#tgl_terpakai').val(tgl_terpakai);
					jc.$content.find('#kode_part').val(kode_part);
					jc.$content.find('#pid').val(pid);
					jc.$content.find('#quantity').val(quantity);
					
					this.$content.find('#tgl_terpakai').datepicker({
						autoclose: true,
						minViewMode: 0,
						format: 'yyyy-mm-dd',
						todayHighlight: true
					}).on('changeDate', function(selected){
						var bulan = ("0" + (selected.date.getMonth() + 1)).slice(-2);
						var tahun = selected.date.getFullYear(); 
					}); 

					this.$content.find('form').on('submit', function (e) {
						// if the user submits the form by pressing enter in the field.
						e.preventDefault();
						jc.$$formSubmit.trigger('click'); // reference the button and click it
					});
				}
			});
		}
		
		function deleteAction(url) {
			console.log(url);
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
		
		function deleteTemp(url) {
			$.ajax({url: url, dataType: 'html', method: 'get', data: { 
			}, timeout: 3000}).done(function (response) {
				table2.ajax.reload( null, false );
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
@endsection
