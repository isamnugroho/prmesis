@section('javascript')
	<script type="text/javascript">
		pageSetUp();
		
		var table;
		var table2;
		var base_url = "<?php echo base_url();?>/master_kelolaan_detail/";
		var pagefunction = function() {
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;
			
			var breakpointDefinition = {
				tablet : 1024,
				phone : 480
			};
			
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
				"ajax":{
					url :  base_url + 'json/<?=$id?>',
					type : 'GET',
					dataFilter: function(data) {
						var json = jQuery.parseJSON( data );
						console.log(json);
						json.recordsTotal = json.recordsTotal;
						json.recordsFiltered = json.recordsFiltered;
						json.data = json.data;

						return JSON.stringify(json);
					}
				},
				"columnDefs": [
					{
						"targets": 0,
						"checkboxes": {
						   "selectRow": true
						}
					 }
				],
				"select": {
					"style": "multi"
				},
				"order": [[2, 'asc']],
				"columns": [
					{ "searchable": false, "orderable": false, "data": "id" },
					{ "searchable": true, "orderable": false, "data": "no" },
					{ "searchable": true, "orderable": true, "data": "tid" },
					{ "searchable": true, "orderable": false, "data": "alamat" },
					{ "searchable": true, "orderable": false, "data": "cabang" },
					{ "searchable": true, "orderable": false, "data": "action" },
				],
			});
			
			var versionNo = $.fn.dataTable.version;
			console.log('DataTable version: '+versionNo);console.log('jQuery version: '+jQuery.fn.jquery);
			
			$('#frm-example').on('submit', function(e){
				e.preventDefault();
				
				var form = this;
				var url = form.action;
				// alert(url);

				var rows_selected = table.column(0).checkboxes.selected();

				// Iterate over all selected checkboxes
				$.each(rows_selected, function(index, rowId){
					// Create a hidden element 
					$(form).append(
						$('<input>')
							.attr('type', 'hidden')
							.attr('name', 'id[]')
							.val(rowId)
					);
				});
				
				if(rows_selected.length == 0) {
					$.alert('No data selected.');
					return false;
				}
				
				var formData = new FormData(form);
				$('input[name="id\[\]"]', form).remove();
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
					if(response=="success") {
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
						$.alert('Something wrong!');
					}
				}).fail(function(){
					$.alert('Something went wrong.');
				});
				// Remove added elements

				// Prevent actual form submission
			});   
			
		};
		
		function createModal() {
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
							var form = self.$content.find('form')[0];
							
							var rows_selected = table2.column(3).checkboxes.selected();
							
							$.each(rows_selected, function(index, rowId){
								// Create a hidden element 
								$(form).append(
									$('<input>')
										.attr('type', 'hidden')
										.attr('name', 'id[]')
										.val(rowId)
								);
							});
							
							var formData = new FormData(form);
							
							
							self.showLoading();
							
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
					
					var base_urlx = "http://localhost/assindo/sync/";
					// table2 = this.$content.find('#datatable2').DataTable({
						// columnDefs: [{
							// orderable: false,
							// className: 'select-checkbox',
							// targets: 0
						// }],
						// select: {
							// style: 'multi',
						// },
						// order: [[1, 'asc']]
					// });
					
					var base_urlx = "<?php echo base_url();?>/master_atm/";
					table2 = this.$content.find('#datatable2').DataTable({
						"serverSide": true,
						"ajax": base_url + 'json_select_atm',
						"columnDefs": [
							{
								"targets": 3,
								"checkboxes": {
								   "selectRow": true
								}
							 }
						],
						"select": {
							"style": "multi"
						},
						"order": [[1, 'asc']]
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
		
		function updateModal(rows) {
			console.log(rows);
			// $.alert(id+' '+id_bank+' '+idatm+' '+cabang+' '+lokasi+' '+sn_mesin+' '+status+' '+alamat);
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
							var form = self.$content.find('form')[0];
							var formData = new FormData(form);
							
							// var idatm = this.$content.find('#idatm').val();
							// var cabang = this.$content.find('#cabang').val();
							// var lokasi = this.$content.find('#lokasi').val();
							// var sn_mesin = this.$content.find('#sn_mesin').val();
							// var foto = this.$content.find('#foto').val();
							// var status = this.$content.find('#status').val();
							// var latitude = this.$content.find('#latitude').val();
							// var longitude = this.$content.find('#longitude').val();
							// var alamat = this.$content.find('#alamat').val();
							// // if(!name){
								// // $.alert('provide a valid name');
								// // return false;
							// // }
							
							// var data = {
								// id: id,
								// id_bank: id_bank,
								// idatm: idatm,
								// cabang: cabang,
								// lokasi: lokasi,
								// sn_mesin: sn_mesin,
								// foto: foto,
								// status: status,
								// latitude: latitude,
								// longitude: longitude,
								// alamat: alamat
							// };
							
							// console.log(data);
							
							self.showLoading();
							
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
					
					
					jc.$content.find('#id').val(rows.id);
					var $select1 = this.$content.find('#vendor')
					$select1.select2({
						tokenSeparators: [','],
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'/select2/select_vendor'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term,
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}
					});
					$select1.append(new Option(rows.nama_vendor, rows.id_vendor, true, true));
					
					var $select2 = this.$content.find('#kanwil')
					$select2.select2({
						tokenSeparators: [','],
						placeholder: "Select Kanwil",
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'/select2/select_kanwil'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term,
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}
					});
					$select2.append(new Option(rows.kanwil, rows.kanwil, true, true));
					
					jc.$content.find('#grup_area').val(rows.grup_area);
					
					var data = [{id: 'WIB',text: 'WIB'},{id: 'WITA',text: 'WITA'},{id: 'WIT',text: 'WIT'}];
					var $select3 = this.$content.find('#timezone');
					$select3.select2({
						placeholder: "Select Timezone",
						data: data
					});
					$select3.val(rows.time_zone).trigger('change');
					// jc.$content.find('#nama').val(rows.nama);
					// jc.$content.find('#nama_lengkap').val(rows.nama_lengkap);
					// jc.$content.find('#alamat').val(rows.alamat);
					// jc.$content.find('#kode_vendor').val(rows.kode_vendor);
					// jc.$content.find('#telp').val(rows.telp);
					
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
		
		loadScript("<?=BASE_LAYOUT?>js/plugin/datatables/jquery.dataTables3.min.js", function(){
			loadScript("<?=BASE_LAYOUT?>datatables/dataTables.checkboxes.min.js", function(){
				loadScript("<?=BASE_LAYOUT?>js/plugin/datatables/dataTables.colVis.min.js", function(){
					loadScript("<?=BASE_LAYOUT?>js/plugin/datatables/dataTables.tableTools.min.js", function(){
						loadScript("<?=BASE_LAYOUT?>js/plugin/datatables/dataTables.bootstrap.min.js", function(){
							loadScript("<?=BASE_LAYOUT?>js/plugin/datatable-responsive/datatables.responsive.min.js", function(){
								loadScript("<?=BASE_LAYOUT?>seipkon/assets/jqueryconfirm/dist/jquery-confirm.min.js", pagefunction)
							});
						});
					});
				});
			});
		});
	</script>
@endsection