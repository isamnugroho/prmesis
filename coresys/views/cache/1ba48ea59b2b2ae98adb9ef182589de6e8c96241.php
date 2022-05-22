<?php $__env->startSection('javascript'); ?>
	<script src="<?=BASE_LAYOUT?>datepicker/js/moment.js"></script>
	<script src="<?=BASE_LAYOUT?>datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?=BASE_LAYOUT?>datepicker/js/bootstrap-daterangepicker.js"></script>
	<script type="text/javascript">
		pageSetUp();
		
		var table;
		var base_url = "<?php echo base_url();?>/report_cleaning_switch/";
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
				// "ajax":{
					// url :  base_url + 'json',
					// type : 'POST',
					// dataFilter: function(data) {
						// console.log(data);
						// var json = jQuery.parseJSON( data );
						// json.recordsTotal = json.recordsTotal;
						// json.recordsFiltered = json.recordsFiltered;
						// json.data = json.data;

						// return JSON.stringify( json );
					// }
				// },
				"ajax": base_url + 'json',
				"order": [[0, "desc"]],
				"columnDefs": [
					{"render": function ( data, type, row ) {
						if(data!=="") {
							// return '<a href="'+base_url+"get_report/?objectName="+data+'" target="__blank"><button onclick="">Download Report Pagi</button></a>';
							
							return '<button class="zoomsmall" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); border-radius: 4px;font-weight:bold;" onclick="openPreview(\''+data+'\')"><img style="float: left; margin: 1px 5px 0px 0px;" src="<?=BASE_LAYOUT?>seipkon/assets/img/search.png" height="15" width="15" />View</button> <a style="font-color: black; color: black" href="'+base_url+"get_report/?objectName="+data+'" target="__blank"><button class="zoomsmall" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); border-radius: 4px;font-weight:bold;" onclick=""><img style="float: left; margin: 1px 5px 0px 0px;" src="<?=BASE_LAYOUT?>seipkon/assets/img/cloud.png" height="17" width="17" />Download Report Pagi</button></a>';
						} else {
							return "No report available";
						}
					}, "targets": [5]},
					{"render": function ( data, type, row ) {
						if(data!=="") {
							return '<button class="zoomsmall" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); border-radius: 4px;font-weight:bold;" onclick="openPreview(\''+data+'\')"><img style="float: left; margin: 1px 5px 0px 0px;" src="<?=BASE_LAYOUT?>seipkon/assets/img/search.png" height="15" width="15" />View</button> <a style="font-color: black; color: black" href="'+base_url+"get_report/?objectName="+data+'" target="__blank"><button class="zoomsmall" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); border-radius: 4px;font-weight:bold;" onclick=""><img style="float: left; margin: 1px 5px 0px 0px;" src="<?=BASE_LAYOUT?>seipkon/assets/img/cloud.png" height="17" width="17" />Download Report Sore</button></a>';
						} else {
							return "No report available";
						}
					}, "targets": [6]}
				],
			});
			
			function createManageBtn() {
				return '<button id="manageBtn" type="button" onclick="myFunc()" class="btn btn-success btn-xs">Manage</button>';
			}
			function myFunc() {
				console.log("Button was clicked!!!");
			}
			
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
		
		function openPreview(objectName) {
			var content = $('.content_form_preview').clone().html();
			
			$.confirm({
				draggable: false,
				title: false,
				theme: 'light',
				content: content,
				columnClass: 'col-md-12',
				buttons: {
					close: function () {
						//close
					},
				},
				onContentReady: function () {
					// bind to events
					var jc = this;
					
					// $.ajax({
						// url: base_url + 'get_reportx',
						// dataType: 'html',
						// method: 'get',
						// data: {
							// objectName: objectName
						// },
						// timeout: 3000,
					// }).done(function (response) {
						// console.log(response);
					// }).fail(function(){
					// });
					// jc.showLoading();
					
					var a = $.confirm({
						lazyOpen: true,
					});
					a.open();
					a.showLoading();
					jc.$content.find("#iframe").attr('src', base_url + 'get_reportx?objectName='+objectName)
					jc.$content.find("#iframe").on("load", function() {
						a.close();
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
							console.log(form);
							date_daily = self.$content.find('input[name=date_daily]').val();
							kanwil = self.$content.find('select[name=kanwil]').val();
							console.log(base_url + 'json?date_daily='+date_daily);
							table.ajax.url(base_url + 'json?date_daily='+date_daily+'&kanwil='+kanwil).load();
							// self.showLoading();
							
							// $.ajax({
								// url: url,
								// dataType: 'html',
								// method: 'post',
								// processData: false,
								// contentType: false,
								// cache: false,
								// data: formData,
								// timeout: 3000,
							// }).done(function (response) {
								// if(response=="success") {
									// self.close();
									// $.confirm({
										// title: false,
										// content: 'SUCCESS',
										// autoClose: 'ok|1000',
										// buttons: {
											// ok: function () {
												
											// }
										// }
									// });
									
									// table.ajax.reload( null, false );
								// } else {
									// self.hideLoading();
									// $.alert('Something wrong!');
								// }
							// }).fail(function(){
								// self.hideLoading();
								// $.alert('Something went wrong.');
							// });
							
							// return false;
						}
					},
					cancel: function () {
						//close
					},
				},
				onContentReady: function () {
					// bind to events
					var jc = this;
					
					var $select_search_by = this.$content.find('#search_by')
					var $select_kanwil = this.$content.find('#kanwil')
					var $select_pic = this.$content.find('#pic')
					var $select_team = this.$content.find('#team')
					
					
					var data = [{id: 'daily', text: 'Daily'},{id: 'monthly', text: 'Monthly'},{id: 'range', text: 'Range'}];
					$select_search_by.select2({
						placeholder: "Select Report Type",
						data: data
					});
					
					$select_search_by.on('select2:select', function (e) {
						var data = e.params.data;
						var report_type = data.id;
						
						
						jc.$content.find('#view_date').hide();
						jc.$content.find('#date_daily').hide();
						jc.$content.find('#date_montly').hide();
						jc.$content.find('#date_range').hide();
						jc.$content.find('#text_view_date').html("("+data.text+")");
						
						if(report_type=='daily') {
							jc.$content.find('#view_date').show();
							jc.$content.find('#date_daily').show();
						
							jc.$content.find('#date_daily').datepicker({
								autoclose: true,
								minViewMode: 0,
								todayBtn: true,
								format: 'dd/mm/yyyy',
								todayHighlight: true,
							}).on('changeDate', function(selected){
								var bulan = ("0" + (selected.date.getMonth() + 1)).slice(-2);
								var tahun = selected.date.getFullYear(); 
							});

						} else if(report_type=='monthly') {
							jc.$content.find('#view_date').show();
							jc.$content.find('#date_montly').show();
							jc.$content.find('#date_montly').datepicker({
								autoclose: true,
								minViewMode: 0,
								todayHighlight: true,
								format: "mm/yyyy",
								startView: "months", 
								minViewMode: "months"	
							}).on('changeDate', function(selected){
								var bulan = ("0" + (selected.date.getMonth() + 1)).slice(-2);
								var tahun = selected.date.getFullYear(); 
							}); 
						} else if(report_type=='range') {
							jc.$content.find('#view_date').show();
							jc.$content.find('#date_range').show();
							jc.$content.find('#date_range').daterangepicker({
								opens: 'left',
								locale: {
									format: 'DD/MM/YYYY'
								}
							}, function(start, end, label) {
								console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
							});
						}
						
						$select_kanwil.select2({
							tokenSeparators: [','],
							placeholder: "Select KANWIL",
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
<?php $__env->stopSection(); ?><?php /**PATH D:\DEV_SERVER\htdocs\2022\premesis\coresys\views/pages/report_cleaning_switch/script.blade.php ENDPATH**/ ?>