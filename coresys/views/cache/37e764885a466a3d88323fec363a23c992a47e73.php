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
				<a href="<?=base_url()?>master_inventory" class="btn btn-default btn-circle btn-sm zoomsmall active">
				<img style="float: left; margin: -2px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/inventory3.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Inventory Stock</small><br>
						<small style="color:white;font-size:12px;">Inventory Logistics</small>
					</p>
				</a>
				</div>
				<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
				<a href="<?=base_url()?>transaction_in" class="btn btn-default btn-circle btn-sm zoomsmall">
				<img style="float: left; margin: -2px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/incoming.png" height="24" width="24" />
					<p class="small" style="margin: -5px 0px 0px 0px;">
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Transaction In</small><br>
						<small style="color:white;font-size:12px;">Incoming Transaction</small>
					</p>
				</a>
				</div>
				<div class="col-sm-4" style="margin: 5px 0px 0px 0px;">
				<a href="<?=base_url()?>transaction_out" class="btn btn-default btn-circle zoomsmall">
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
						<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Request Sparepart</small><br>
						<small style="color:white;font-size:12px;">Request Sparepart</small>
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
					
						<h2 style="color:white; margin: -1px 0px 0px 10px;"><b>Data Inventory Stock</b></h2>
					</header>

					<!-- widget div-->
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
							<div class="row">
								
							</div>
						</div>
						<!-- end widget edit box -->

						<!-- widget content -->
						<div class="widget-body no-padding">

							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th data-hide="phone">No.</th>
										<th data-class="expand">Kode Sparepart</th>
										<th data-hide="phone,tablet">Nama Sparepart</th>
										<th data-hide="phone,tablet">Jenis/Merek Mesin</th>
										<th data-hide="phone,tablet">Stok/Unit</th>
										<th width="180">Opsi/Fungsional</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
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

		<!-- end row -->

		<div class="container content_maps" hidden>
			<input id="searchInput" class="controls" type="text" placeholder="Enter a location">
			<div id="w3docs-map" class="w3docs-map" style="width: 100%;height: 480px; display: none"></div>
		</div>
		
		<div class="container content_form" hidden>
			<center>
				<form action="<?=base_url().explode("/", $that->uri->uri_string())[0].'/insert'?>" style="width: 95%; text-align: left">
				<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Kode Sparepart :</label>
								<input type="text" placeholder="" class="form-control" id="kode_part" name="kode_part" value="" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Nama Sparepart :</label>
								<input type="text" placeholder="" class="form-control" id="nama_part" name="nama_part" value="" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Part Number :</label>
								<input type="text" placeholder="" class="form-control" id="part_no" name="part_no" value="" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Stok/Unit :</label>
								<input type="text" placeholder="" class="form-control" id="stock" name="stock" value="" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Price :</label>
								<input type="text" placeholder="" class="form-control" id="price" name="price" value="" >
							</div>	
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Category Sparepart :</label>
								<div id="slWrapper" class="parsley-select wd-250">
									<select class="form-control" data-placeholder="Choose one" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" id="category" name="category" required>
										<option value=""> -- Choose Category -- </option>
										<option value="upper"> Upper Compartement </option>
										<option value="lower"> Lower Compartement </option>
										<option value="consume"> Consume Sparepart </option>
										<option value="accessories"> Accecories Sparepart </option>
									</select>
									<div id="slErrorContainer"></div>
								</div>
							</div>	
						</div>
					</div>
				</form>
			</center>
		</div>

		<div class="container content_merk" hidden>
			<center style="padding: 10px">
				<form action="<?=base_url().'master_merk/insert'?>" style="width: 95%; text-align: left">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">Jenis/Merek Mesin :</label>
								<input type="text" placeholder="" class="form-control" id="merk" name="merk" value="" required>
							</div>
						</div>
					</div>
				</form>
			</center>
		</div>

		<div class="container content_merk_table" hidden>
			
			<div style="padding: 10px">
				<a onclick="createModalMerk()" class="btn btn-primary pull-right" style="border-radius: 5px;"><img style="float: left; margin: 0px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="20" width="20" /><b>Tambah Data Jenis/Merek Mesin</b></a>
				<table id="datatable" class="table table-striped table-bordered table-hover" width="100%">
					<thead>
						<th>No.</th>
						<th>Merk</th>
						<th width="180">Opsi/Fungsional</th> 
					</thead>
				</table>
			</div>
		</div>

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
						url :  base_url + 'accesory_part/get_data/0',
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
						table.ajax.url(base_url + 'accesory_part/get_data/'+that.val()).load();
					} else {
						table.ajax.url(base_url + 'accesory_part/get_data/0').load();
					}
				});

			/* END BASIC */

		};

		function createModalMerkTable() {
			var content = $('.content_merk_table').clone().html();
			
			// table = 
			
			$.confirm({
				draggable: false,
				title: false,
				theme: 'light',
				content: content,
				columnClass: 'col-md-8 col-md-offset-2',
				buttons: {
					cancel: function () {
						//close
					},
				},
				onContentReady: function () {
					// bind to events
					var jc = this;
					
					var base_url = "<?php echo base_url();?>";
					console.log(base_url + 'master_merk/get_data');
					table2 = this.$content.find('#datatable').DataTable({
						searching: false, paging: false, info: false,
						"pageLength" : 10,
						"serverSide": true,
						"order": [[1, "asc" ]],
						"columnDefs": [{"orderable": false, "targets": 0}],
						"ajax":{
							url :  base_url + 'master_merk/get_data',
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
					
					this.$content.find('.name').focus();
					this.$content.find('form').on('submit', function (e) {
						// if the user submits the form by pressing enter in the field.
						e.preventDefault();
						jc.$$formSubmit.trigger('click'); // reference the button and click it
					});
				}
			});
		}
		
		function updateModalMerkEdit(id, merk) {
			var content = $('.content_merk').clone().html();
		
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
							
							var merk = this.$content.find('#merk').val();
							// if(!name){
								// $.alert('provide a valid name');
								// return false;
							// }
							
							var data = {
								id: id,
								merk: merk,
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
									
									table2.ajax.reload( null, false );
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
					jc.$content.find('#merk').val(merk);
					
					this.$content.find('form').on('submit', function (e) {
						// if the user submits the form by pressing enter in the field.
						e.preventDefault();
						jc.$$formSubmit.trigger('click'); // reference the button and click it
					});
				}
			});
		}
		
		function createModalMerk() {
			var content = $('.content_merk').clone().html();

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

							var merk = this.$content.find('#merk').val();
							
							var data = {
								id: null,
								merk: merk,
							};

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
									
									table2.ajax.reload( null, false );
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
					this.$content.find('form').on('submit', function (e) {
						// if the user submits the form by pressing enter in the field.
						e.preventDefault();
						jc.$$formSubmit.trigger('click'); // reference the button and click it
					});
				}
			});
		}
		
		function createModal() {
			var content = $('.content_form').clone().html();
			
			var merk = $("#select_merk").val();
			if(merk=="") {
				$.alert('Pilih Merk terlebih dahulu!');
				return false;
			}
		
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
							var nama_part = this.$content.find('#nama_part').val();
							var part_no = this.$content.find('#part_no').val();
							var stock = this.$content.find('#stock').val();
							var price = this.$content.find('#price').val();
							var category = this.$content.find('#category').val();
							
							var data = {
								id: null,
								kode_part: kode_part,
								nama_part: nama_part,
								part_no: part_no,
								stock: stock,
								merk: merk,
								price: price,
								category: category
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
					this.$content.find('form').on('submit', function (e) {
						// if the user submits the form by pressing enter in the field.
						e.preventDefault();
						jc.$$formSubmit.trigger('click'); // reference the button and click it
					});
				}
			});
		}
		
		function updateModal(id, kode_part, nama_part, merk, part_no, stock, price) {
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
							var nama_part = this.$content.find('#nama_part').val();
							var part_no = this.$content.find('#part_no').val();
							var stock = this.$content.find('#stock').val();
							var price = this.$content.find('#price').val();
							// if(!name){
								// $.alert('provide a valid name');
								// return false;
							// }
							
							var data = {
								id: id,
								kode_part: kode_part,
								nama_part: nama_part,
								part_no: part_no,
								stock: stock,
								merk: merk,
								price: price
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
					jc.$content.find('#kode_part').val(kode_part);
					jc.$content.find('#nama_part').val(nama_part);
					jc.$content.find('#part_no').val(part_no);
					jc.$content.find('#stock').val(stock);
					jc.$content.find('#price').val(price);
					
					this.$content.find('form').on('submit', function (e) {
						// if the user submits the form by pressing enter in the field.
						e.preventDefault();
						jc.$$formSubmit.trigger('click'); // reference the button and click it
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
								
								if(response=="SUCCESS") {
									table2.ajax.reload( null, false );
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV_SERVER\htdocs\atmserv\coresys\views/pages/accesory_part/index.blade.php ENDPATH**/ ?>