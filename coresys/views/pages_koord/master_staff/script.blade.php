@section('javascript')
	<script type="text/javascript">
		pageSetUp();
		
		var table;
		var table2;
		var base_url = "<?php echo base_url();?>koord/master_staff/";
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
								var url_delete = base_url+'delete_petugas/'+d[i].id;
								table += ''+
									'<tr>' +
										'<td width="150px"></td>' +
										'<td>'+d[i].nik+'</td>' +
										'<td>'+d[i].nama+'</td>' +
										'<td>' +
											'<a onclick="" class="btn btn-warning btn-sm zoomsmall" style="background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;">Edit</a>'+
											'<a onclick="deleteActionPetugas(\''+url_delete+'\')" class="btn btn-danger btn-sm zoomsmall" style="background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;">Delete</a>'+
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
					type : 'GET',
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
					// {
						// "class":          "details-control",
						// "orderable":      false,
						// "data":           null,
						// "defaultContent": ""
					// },
					{ "searchable": false, "orderable": false, "data": "no" },
					{ "searchable": true, "orderable": true,  "data": "nama_vendor" },
					{ "searchable": true, "orderable": false, "data": "nik" },
					{ "searchable": true, "orderable": false, "data": "nama" },
					{ "searchable": true, "orderable": false, "data": "kelolaan" },
					{ "searchable": true, "orderable": false, "data": "action" },
				],
			});
			
			var detailRows = [];
 
			$('#dt_basic tbody').on('click', 'tr td.details-control', function() {
				var tr = $(this).closest('tr');
				var row = table.row(tr);
				
				// console.log(row.data().team);

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
		
		function addUserAccess(rows) {
			var content = $('.content_form_user_access').clone().html();
			
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
					// var $select1 = this.$content.find('#staff')
					// $select1.select2({
						// tokenSeparators: [','],
						// placeholder: "Select Staff",
						// ajax: {
							// dataType: 'json',
							// url: '<?php echo base_url().'/select2/select_staff'?>',
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
					this.$content.find('#staff').val(rows.nik);
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
		
		function editUserAccess(rows) {
			var content = $('.content_form_user_access').clone().html();
		
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
							
							// console.log(url);
							
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
								
								// console.log(response);
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
						{id: 'KOORDINATOR',text: 'KOORDINATOR'},
						{id: 'PETUGAS',text: 'PETUGAS'}
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
		
		function addUserPetugasAccess(rows) {
			var content = $('.content_form_user_access').clone().html();
			
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
					// var $select1 = this.$content.find('#staff')
					// $select1.select2({
						// tokenSeparators: [','],
						// placeholder: "Select Staff",
						// ajax: {
							// dataType: 'json',
							// url: '<?php echo base_url().'/select2/select_staff'?>',
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
					this.$content.find('#staff').val(rows.nik);
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
		
		function editUserPetugasAccess(rows) {
			var content = $('.content_form_user_access').clone().html();
		
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
							
							// console.log(url);
							
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
								
								// console.log(response);
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
					
					
					jc.$content.find('#id').val(rows.id);
					// jc.$content.find('#password').val(rows.password);
					jc.$content.find('.staff').hide();
					var data = [
						{id: 'PETUGAS',text: 'PETUGAS'}
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
					var $select_vendor = this.$content.find('#vendor')
					$select_vendor.select2({
						tokenSeparators: [','],
						placeholder: "Select Vendor",
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
						var id_vendor = $select_vendor.select2('data')[0].id;
						// alert('<?php echo base_url().'/select2/kode_koordinator'?>');
						// alert(id_vendor);

						// $.get('<?php echo base_url().'/select2/kode_koordinator'?>', {id_vendor: id_vendor}).done(function(data) {
							// alert( "Data Loaded: " + data );
						// });
						
						$.ajax({
							url: "<?php echo base_url();?>/select2/kode_koordinator",
							dataType: "html",
							method: "get",
							data: {
								id_vendor: id_vendor
							},
							timeout: 3000,
						}).done(function (response) {
							console.log(response);
							jc.$content.find('#nik').val(response)
						}).fail(function(){
							console.log("fail");
						});
					});
					
					
					var data = [{id: 'PRIA',text: 'PRIA'},{id: 'WANITA',text: 'WANITA'}];
					var $select3 = this.$content.find('#jk');
					$select3.select2({
						placeholder: "Select Jenis Kelamin",
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
					jc.$content.find('#nik').val(rows.nik);
					jc.$content.find('#nama').val(rows.nama_staff);
					jc.$content.find('#hp').val(rows.hp);
					jc.$content.find('#email').val(rows.email);
					jc.$content.find('#alamat').val(rows.alamat_staff);
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
		
		function listModalPetugas(rows) {
			var content = $('.content_list_petugas').clone().html();
			
			$.confirm({
				draggable: false,
				title: false,
				theme: 'light',
				content: content,
				columnClass: 'col-md-12',
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
					
					table2 = this.$content.find('#datatable2').DataTable({
						"pageLength" : 10,
						"searching": false, 
						"paging": false, 
						"info": false,
						"serverSide": true,
						"ajax": base_url + 'json_list_petugas?id_koord='+rows.id,
						"order": [[1, "asc"]],
					});
					
					this.$content.find('#add_petugas_list').on('click', function (e) {
						// open_kelolaan_list()
						addModalPetugas(rows)
					});
					
					this.$content.find('form').on('submit', function (e) {
						// if the user submits the form by pressing enter in the field.
						e.preventDefault();
						jc.$$formSubmit.trigger('click'); // reference the button and click it
					});
				}
			});
			
		}
		
		function addModalPetugas(rows) {
			var content = $('.content_form_team').clone().html();
		
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
					
					jc.$content.find('#id_koord').val(rows.id);
					jc.$content.find('#id_vendor').val(rows.id_vendor);
					jc.$content.find('#vendor').val(rows.nama_vendor);
					
					$.ajax({
						url: "<?php echo base_url();?>/select2/kode_petugas",
						dataType: "html",
						method: "get",
						data: {
							kode_koord: rows.nik
						},
						timeout: 3000,
					}).done(function (response) {
						console.log(response);
						
						jc.$content.find('#nik').val(response);
					}).fail(function(){
						console.log("fail");
					});
					// jc.$content.find('#nama').val(rows.nama_staff);
					// jc.$content.find('#hp').val(rows.hp);
					// jc.$content.find('#email').val(rows.email);
					// jc.$content.find('#alamat').val(rows.alamat_staff);
					// var $select1 = this.$content.find('#vendor')
					// $select1.select2({
						// tokenSeparators: [','],
						// ajax: {
							// dataType: 'json',
							// url: '<?php echo base_url().'/select2/select_vendor'?>',
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
					// $select1.append(new Option(rows.nama_vendor, rows.id_vendor, true, true));
					
					var data = [{id: '',text: ''}, {id: 'PRIA',text: 'PRIA'},{id: 'WANITA',text: 'WANITA'}];
					var $select3 = this.$content.find('#jk');
					$select3.select2({
						placeholder: "Select Jenis Kelamin",
						data: data
					});
					// $select3.val(rows.jk).trigger('change');
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
		
		function updateModalPetugas(rows) {
			console.log(rows);
			// $.alert(id+' '+id_bank+' '+idatm+' '+cabang+' '+lokasi+' '+sn_mesin+' '+status+' '+alamat);
			var content = $('.content_form_team').clone().html();
		
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
					
					
					jc.$content.find('#id').val(rows.id);
					jc.$content.find('#nik').val(rows.nik);
					jc.$content.find('#nama').val(rows.nama);
					jc.$content.find('#hp').val(rows.hp);
					jc.$content.find('#email').val(rows.email);
					jc.$content.find('#alamat').val(rows.alamat);
					jc.$content.find('#id_koord').val(rows.id_koord);
					jc.$content.find('#id_vendor').val(rows.id_vendor);
					// var $select1 = this.$content.find('#vendor')
					// $select1.select2({
						// tokenSeparators: [','],
						// ajax: {
							// dataType: 'json',
							// url: '<?php echo base_url().'/select2/select_vendor'?>',
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
					// $select1.append(new Option(rows.nama_vendor, rows.id_vendor, true, true));
					
					
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
		
		function deleteActionPetugas(url) {
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
@endsection