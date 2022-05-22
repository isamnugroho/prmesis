<?php $__env->startSection('javascript'); ?>
	<script type="text/javascript">
		pageSetUp();
		
		var table;
		var base_url = "<?php echo base_url();?>master_atm/";
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
					url :  base_url + 'json',
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
				"order": [[1, "asc"]],
				"columns": [
					{ "searchable": false, "orderable": false, "data": "no" },
					{ "searchable": true, "orderable": true, "data": "tid" },
					{ "searchable": true, "orderable": false, "data": "kanwil" },
					{ "searchable": true, "orderable": false, "data": "cabang" },
					{ "searchable": true, "orderable": false, "data": "nama_unit" },
					{ "searchable": true, "orderable": false, "data": "lokasi" },
					{ "searchable": true, "orderable": false, "data": "alamat" },
					{ "searchable": true, "orderable": false, "data": "action" },
				],
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
					jc.$content.find('#tid').val(rows.tid);
					jc.$content.find('#merk_mesin').val(rows.merk_mesin);
					jc.$content.find('#type_mesin').val(rows.type_mesin);
					jc.$content.find('#sn_mesin').val(rows.sn_mesin);
					jc.$content.find('#kanwil').val(rows.kanwil);
					jc.$content.find('#cabang').val(rows.cabang);
					jc.$content.find('#nama_unit').val(rows.nama_unit);
					jc.$content.find('#lokasi').val(rows.lokasi);
					jc.$content.find('#zonasi').val(rows.zonasi);
					jc.$content.find('#alamat').val(rows.alamat);
					jc.$content.find('#kelurahan').val(rows.kelurahan);
					jc.$content.find('#kecamatan').val(rows.kecamatan);
					jc.$content.find('#kabupaten').val(rows.kabupaten);
					jc.$content.find('#keterangan').val(rows.keterangan);
					jc.$content.find('#pic').val(rows.pic);
					jc.$content.find('#hp_pic').val(rows.hp_pic);
					
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
		
		loadScript("<?=BASE_LAYOUT?>js/plugin/datatables/jquery.dataTables.min.js", function(){
			loadScript("<?=BASE_LAYOUT?>js/plugin/datatables/dataTables.colVis.min.js", function(){
				loadScript("<?=BASE_LAYOUT?>js/plugin/datatables/dataTables.tableTools.min.js", function(){
					loadScript("<?=BASE_LAYOUT?>js/plugin/datatables/dataTables.bootstrap.min.js", function(){
						loadScript("<?=BASE_LAYOUT?>seipkon/assets/jqueryconfirm/dist/jquery-confirm.min.js", function(){
							loadScript("<?=BASE_LAYOUT?>js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
						});
					});
				});
			});
		});
	</script>
<?php $__env->stopSection(); ?><?php /**PATH D:\DEV_SERVER\htdocs\2022\premesis\coresys\views/pages/master_atm/script.blade.php ENDPATH**/ ?>