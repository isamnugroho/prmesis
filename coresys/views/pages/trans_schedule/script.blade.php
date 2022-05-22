@section('javascript')
	<script type="text/javascript">
		pageSetUp();
		
		var table;
		var table_dalam;
		var base_url = "<?php echo base_url();?>/trans_schedule/";
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
					{ "searchable": true, "orderable": true,  "data": "nama_vendor" },
					{ "searchable": true, "orderable": false, "data": "kanwil" },
					{ "searchable": true, "orderable": false, "data": "grup_area" },
					{ "searchable": true, "orderable": false, "data": "pic" },
					{ "searchable": true, "orderable": false, "data": "team" },
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
									$.alert('Form not completed');
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
					var $select_vendor = this.$content.find('#vendor')
					var $select_kelolaan = this.$content.find('#id_lokasi')
					var $select_pic = this.$content.find('#pic')
					var $select_team = this.$content.find('#team')
					
					// $select1.select2({
						// tokenSeparators: [','],
						// placeholder: "Select Grup Area",
						// ajax: {
							// dataType: 'json',
							// url: '<?php echo base_url().'/select2/select_grup_area'?>',
							// delay: 250,
							// type: "POST",
							// data: function(params) {
								// return {
									// search: params.term,
								// }
							// },
							// processResults: function (data, page) {
								// return {
									// results: data
								// };
							// }
						// }
					// });
					
					$select_vendor.select2({
						tokenSeparators: [','],
						placeholder: "Select VENDOR",
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
					
					$select_vendor.on('select2:select', function (e) {
						var data = e.params.data;
						var id_vendor = data.id;
						
						jc.$content.find('.id_lokasi').show();
						jc.$content.find('.pic').show();
						
						$select_kelolaan.select2({
							tokenSeparators: [','],
							placeholder: "Select Grup Area",
							ajax: {
								dataType: 'json',
								url: '<?php echo base_url().'/select2/select_grup_area'?>',
								delay: 250,
								type: "POST",
								data: function(params) {
									return {
										search: params.term,
										id_vendor: id_vendor,
									}
								},
								processResults: function (data, page) {
									return {
										results: data
									};
								}
							}
						});
						
						$select_pic.select2({
							tokenSeparators: [','],
							placeholder: "Select PIC",
							ajax: {
								dataType: 'json',
								url: '<?php echo base_url().'/select2/select_user_by_vendor'?>',
								delay: 250,
								type: "POST",
								data: function(params) {
									return {
										search: params.term,
										id_vendor: id_vendor,
									}
								},
								processResults: function (data, page) {
									return {
										results: data
									};
								}
							}
						});
					});
					
					$select_pic.on('select2:select', function (e) {
						var id_pic = $select_pic.select2('data')[0].id;
						var id_vendor = $select_vendor.select2('data')[0].id;
						
						
						jc.$content.find('.team').show();
						
						$select_team.select2({
							tokenSeparators: [','],
							placeholder: "Select Team",
							ajax: {
								dataType: 'json',
								url: '<?php echo base_url().'/select2/select_team_by_vendor'?>',
								delay: 250,
								type: "POST",
								data: function(params) {
									return {
										search: params.term,
										id_pic: id_pic,
										id_vendor: id_vendor,
									}
								},
								processResults: function (data, page) {
									return {
										results: data
									};
								}
							}
						});
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
					
					var $select_vendor = this.$content.find('#vendor')
					var $select_kelolaan = this.$content.find('#id_lokasi')
					var $select_pic = this.$content.find('#pic')
					var $select_team = this.$content.find('#team')
					
					jc.$content.find('#id').val(rows.id);
					
					$select_vendor.select2({
						tokenSeparators: [','],
						placeholder: "Select VENDOR",
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
					$select_vendor.append(new Option(rows.nama_vendor, rows.id_vendor, true, true));
					
					var id_vendor = $select_vendor.select2('data')[0].id;
					
					if(id_vendor!=="") {
						alert(id_vendor);
						jc.$content.find('.id_lokasi').show();
						jc.$content.find('.pic').show();
						
						$select_kelolaan.select2({
							tokenSeparators: [','],
							placeholder: "Select Grup Area",
							ajax: {
								dataType: 'json',
								url: '<?php echo base_url().'/select2/select_grup_area'?>',
								delay: 250,
								type: "POST",
								data: function(params) {
									return {
										search: params.term,
										id_vendor: id_vendor,
									}
								},
								processResults: function (data, page) {
									return {
										results: data
									};
								}
							}
						});
						
						$select_pic.select2({
							tokenSeparators: [','],
							placeholder: "Select PIC",
							ajax: {
								dataType: 'json',
								url: '<?php echo base_url().'/select2/select_user_by_vendor'?>',
								delay: 250,
								type: "POST",
								data: function(params) {
									return {
										search: params.term,
										id_vendor: id_vendor,
									}
								},
								processResults: function (data, page) {
									return {
										results: data
									};
								}
							}
						});
					}
					
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
					
					var data = [{id: 'PRIA',text: 'PRIA'},{id: 'WANITA',text: 'WANITA'}];
					var $select3 = this.$content.find('#jk');
					$select3.select2({
						placeholder: "Select Jenis Kelamin",
						data: data
					});
					$select3.val(rows.jk).trigger('change');
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
		
		function createModalAssignedTeam(rows) {
			console.log(rows);
			// $.alert(id+' '+id_bank+' '+idatm+' '+cabang+' '+lokasi+' '+sn_mesin+' '+status+' '+alamat);
			var content = $('.content_assign_form').clone().html();
		
			$.confirm({
				draggable: false,
				title: false,
				theme: 'light',
				content: content,
				columnClass: 'col-md-8 col-md-offset-2',
				buttons: {
					// formSubmit: {
						// text: 'Submit',
						// btnClass: 'btn-blue',
						// action: function () {
							// var self = this;
							
							// return false;
						// }
					// },
					close: function () {},
				},
				onContentReady: function () {
					// bind to events
					var jc = this;
					
					
					jc.$content.find('#id_detail').val(rows.id);
					
					var $select_petugas = this.$content.find('#petugas')
					$select_petugas.select2({
						tokenSeparators: [','],
						placeholder: "Select PIC",
						ajax: {
							dataType: 'json',
							url: '<?php echo base_url().'/select2/select_petugas_by_koord'?>',
							delay: 250,
							type: "POST",
							data: function(params) {
								return {
									search: params.term,
									id_koord: rows.id_koord,
									id_lokasi: rows.id_lokasi,
								}
							},
							processResults: function (data, page) {
								return {
									results: data
								};
							}
						}
					});
					
					
					var id_petugas = $select_petugas.select2('data')[0].id
					var base_url = "<?php echo base_url();?>/trans_schedule/";
					console.log(base_url + 'json_assigned/'+id_petugas);
					table_dalam = jc.$content.find('#dt_basicxx').DataTable({
						"pageLength" : 10,
						"serverSide": true,
						"ajax":{
							url :  base_url + 'json_assigned/'+id_petugas,
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
							{ "searchable": true, "orderable": true,  "data": "tid" },
							{ "searchable": true, "orderable": false, "data": "alamat" },
							{ "searchable": true, "orderable": false, "data": "action" },
						],
					});
					
					$select_petugas.on('change', function (e) {
						var id_petugas = $select_petugas.select2('data')[0].id
						table_dalam.ajax.url(base_url + 'json_assigned/'+id_petugas).load();
					});
					this.$content.find('#open_kelolaan_list').on('click', function (e) {
						// open_kelolaan_list()
						var id_petugas = $select_petugas.select2('data')[0].id
						open_kelolaan_list(id_petugas, rows.id, rows.id_lokasi);
					});
					this.$content.find('form').on('submit', function (e) {
						// if the user submits the form by pressing enter in the field.
						e.preventDefault();
						jc.$$formSubmit.trigger('click'); // reference the button and click it
					});
				}
			});
		}
		
		function open_kelolaan_list(id_petugas, id_detail, id_lokasi) {
			// alert(id_petugas+" "+id_detail)
			if(!id_petugas) {
				alert("Pilih petugas terlebih dahulu");
				return false;
			}
			var content = $('.content_assign_add_form').clone().html();
			
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
							formData.append('id_detail', id_detail);
							formData.append('pic', id_petugas);
							$('input[name="id\[\]"]', form).remove();
							
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
									
									table_dalam.ajax.reload( null, false );
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
					
					
					// var base_url = "<?php echo base_url();?>/master_kelolaan_detail/";
					var base_urlx = "<?php echo base_url();?>/master_atm/";
					table2 = this.$content.find('#datatable2').DataTable({
						"serverSide": true,
						"ajax": base_url + 'json_select_atm?id_lokasi='+id_lokasi,
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
		
		
		function deleteAssignedAction(url) {
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
									table_dalam.ajax.reload( null, false );
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
		
		// loadScript("<?=BASE_LAYOUT?>js/plugin/datatables/jquery.dataTables.min.js", function(){
			// loadScript("<?=BASE_LAYOUT?>js/plugin/datatables/dataTables.colVis.min.js", function(){
				// loadScript("<?=BASE_LAYOUT?>js/plugin/datatables/dataTables.tableTools.min.js", function(){
					// loadScript("<?=BASE_LAYOUT?>js/plugin/datatables/dataTables.bootstrap.min.js", function(){
						// loadScript("<?=BASE_LAYOUT?>seipkon/assets/jqueryconfirm/dist/jquery-confirm.min.js", function(){
							// loadScript("<?=BASE_LAYOUT?>js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
						// });
					// });
				// });
			// });
		// });
		
		
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