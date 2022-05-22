<?php $__env->startSection('javascript'); ?>
	<script type="text/javascript">
		pageSetUp();
		
		var table;
		var base_url = "<?php echo base_url();?>/master_user/";
		var pagefunction = function() {
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;
			
			var breakpointDefinition = {
				tablet : 1024,
				phone : 480
			};
			
			function format (d) {
				if(d !== null) {
					
					var table = '' +
						'<table class="table" style=border: 1px solid black">';
							for (let i = 0; i < d.length; i++) { 
								table += ''+
									'<tr>' +
										'<td width="150px"></td>' +
										'<td>'+d[i].nik+'</td>' +
										'<td>'+d[i].nama_staff+'</td>' +
										'<td>'+d[i].level+'</td>' +
										'<td>' +
											'<a onclick="" class="btn btn-danger btn-sm zoomsmall" style="background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;">Delete</a>'+
										'</td>' +
									'</tr>';
							}
							
						table += '</table>';
					
					return table;
				} 
				
				return '<table class="table" style=border: 1px solid black"><tr><td><center>NO DATA</center></td></tr></table>';
			}
			
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
					{
						"class":          "details-control",
						"orderable":      false,
						"data":           null,
						"defaultContent": ""
					},
					// { "searchable": false, "orderable": false, "data": "no" },
					{ "searchable": true, "orderable": true,  "data": "nama_vendor" },
					{ "searchable": true, "orderable": false, "data": "nik" },
					{ "searchable": true, "orderable": false, "data": "nama" },
					{ "searchable": true, "orderable": false, "data": "level" },
					{ "searchable": true, "orderable": false, "data": "action" },
				],
			});
			
			var detailRows = [];
 
			$('#dt_basic tbody').on('click', 'tr td.details-control', function() {
				var tr = $(this).closest('tr');
				var row = table.row(tr);
				
				console.log(row.data().team);

				if (row.child.isShown()) {
					row.child.hide();
					tr.removeClass('shown');
				} else {
					//Below line does the trick :)
					if (table.row('.shown').length) {
						$('.details-control', table.row('.shown').node()).click();
					}
					// row.child(format(row.data())).show();
					row.child(format(row.data().team)).show();
					tr.addClass('shown');
				}
			});
		 
			// On each draw, loop over the `detailRows` array and show any child rows
			table.on('draw', function () {
				$.each(detailRows, function (i, id) {
					$('#'+id+' td.details-control').trigger('click');
				});
			});
		};
		
		function createModal() {
			var content = $('.content_form').clone().html();
			
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
					var $select1 = this.$content.find('#staff')
					$select1.select2({
						tokenSeparators: [','],
						placeholder: "Select Staff",
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'/select2/select_staff'?>',
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
					var data = [
						{id: 'SUPER',text: 'SUPER ADMIN'},
						{id: 'ADMIN',text: 'ADMIN'},
						{id: 'KOORDINATOR',text: 'KOORDINATOR'},
						{id: 'PETUGAS',text: 'PETUGAS'}
					];
					var $select3 = this.$content.find('#level');
					$select3.select2({
						placeholder: "Select Level User",
						data: data
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
		
		function createModalTeam() {
			var content = $('.content_form').clone().html();
			
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
					var $select1 = this.$content.find('#staff')
					$select1.select2({
						tokenSeparators: [','],
						placeholder: "Select Staff",
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'/select2/select_staff_team'?>',
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
					var data = [
						{id: 'PETUGAS',text: 'PETUGAS'}
					];
					var $select3 = this.$content.find('#level');
					$select3.select2({
						placeholder: "Select Level User",
						data: data
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
					// jc.$content.find('#password').val(rows.password);
					jc.$content.find('.staff').hide();
					var data = [
						{id: 'SUPER',text: 'SUPER ADMIN'},
						{id: 'ADMIN',text: 'ADMIN'},
						{id: 'USER',text: 'USER'}
					];
					var $select3 = this.$content.find('#level');
					$select3.select2({
						placeholder: "Select Level User",
						data: data
					});
					$select3.val(rows.level).trigger('change');
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
<?php $__env->stopSection(); ?><?php /**PATH D:\DEV_SERVER\htdocs\2022\25-01-2022\premesis\coresys\views/pages/master_user/script.blade.php ENDPATH**/ ?>