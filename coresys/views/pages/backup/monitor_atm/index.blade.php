@extends('layouts.master')

@section('stylesheet')
<style>

#leds {
  -webkit-transform: translate(-50%, -50%);
  -khtml-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-border-radius: 5px;
  -khtml-border-radius: 5px;
  -moz-border-radius: 5px;
  -ms-border-radius: 5px;
  -o-border-radius: 5px;
  border-radius: 5px;
  -webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5), 0px 0px 5px rgba(255, 255, 255, 0.1) inset;
  -khtml-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5), 0px 0px 5px rgba(255, 255, 255, 0.1) inset;
  -moz-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5), 0px 0px 5px rgba(255, 255, 255, 0.1) inset;
  -ms-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5), 0px 0px 5px rgba(255, 255, 255, 0.1) inset;
  -o-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5), 0px 0px 5px rgba(255, 255, 255, 0.1) inset;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5), 0px 0px 5px rgba(255, 255, 255, 0.1) inset;
  width: 25px;
  padding: 5px;
  padding-bottom: 2px;
  background: #111;
  background: -webkit-linear-gradient(190deg, #111, #191919, #111);
  background: -khtml-linear-gradient(190deg, #111, #191919, #111);
  background: -moz-linear-gradient(190deg, #111, #191919, #111);
  background: -ms-linear-gradient(190deg, #111, #191919, #111);
  background: -o-linear-gradient(190deg, #111, #191919, #111);
  background: linear-gradient(190deg, #111, #191919, #111);
}
#leds div.led {
  -webkit-border-radius: 50%;
  -khtml-border-radius: 50%;
  -moz-border-radius: 50%;
  -ms-border-radius: 50%;
  -o-border-radius: 50%;
  border-radius: 50%;
  width: 15px;
  height: 15px;
  display: inline-block;
}
#leds div.led.green {
  background-color: #00ff00;
}
#leds div.led.green.off {
  -webkit-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -khtml-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -moz-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -ms-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -o-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  background-color: #005700;
  transition: all 0.1s linear;
}
#leds div.led.red {
  background-color: #ff0000;

}
#leds div.led.red.off {
  -webkit-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -khtml-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -moz-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -ms-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -o-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  background-color: #570000;
  transition: all 0.1s linear;
}

#leds div.led.orange {
  background-color: #ff8000;

}
#leds div.led.orange.off {
  -webkit-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -khtml-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -moz-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -ms-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  -o-box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  box-shadow: 0px 0px 15px rgba(90, 90, 90, 0.6) inset;
  background-color: #570000;
  transition: all 0.1s linear;
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
		<div class="navbar navbar-default" style="background-image: linear-gradient( 176.4deg,rgba(237,135,33,1) 28.8%, rgba(244,62,62,1) 99% );border-radius: 5px 5px 0px 0px;">
			<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
			<a href="<?=base_url()?>monitor_atm.ins" class="btn btn-default btn-circle btn-sm zoomsmall">
			<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/hdblue.png" height="24" width="24" />
				<p class="small" style="margin: -5px 0px 0px 0px;">
					<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Monitoring ATM</small><br>
					<small style="color:white;font-size:12px;">Data Monitoring ATM</small>
				</p>
			</a>
			</div>
			<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
			<a href="<?=base_url()?>monitor_dc.ins" class="btn btn-default btn-circle zoomsmall">
			<img style="float: left; margin: -1px 10px 0px 4px;" src="<?=base_url()?>seipkon/assets/img/atm2.png" height="24" width="24" />
				<p class="small" style="margin: -5px 0px 0px 0px;">
					<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Main Data Center</small><br>
					<small style="color:white;font-size:12px;">Data Center Management</small>
				</p>
			</a>
			</div>
			<div class="col-sm-3" style="margin: 5px 0px 0px 0px;">
			<a onclick="createModalAdd()" class="btn btn-default btn-circle btn-sm zoomsmall">
			<img style="float: left; margin: -1px 10px 0px 5px;" src="<?=base_url()?>seipkon/assets/img/blackbook.png" height="24" width="24" />
				<p class="small" style="margin: -5px 0px 0px 0px;">
					<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Client & Host </small><br>
					<small style="color:white;font-size:12px;">Data Client & Host</small>
				</p>
			</a>
			</div>
			<div class="col-sm-2" style="margin: 5px 0px 0px 0px;">
			<a href="<?=base_url()?>monitor_history.ins" class="btn btn-default btn-circle btn-sm zoomsmall">
			<img style="float: left; margin: -2px 10px 0px 3px;" src="<?=base_url()?>seipkon/assets/img/whiteloc.png" height="28" width="28" />
				<p class="small" style="margin: -5px 0px 0px 0px;">
					<small style="color:white;font-size:16px; margin: 0px 0px 0px 0px; font-weight: bold;">Log & History</small><br>
					<small style="color:white;font-size:12px;">Historycal Data & Log</small>
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
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false"
			data-widget-colorbutton="false"
			data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-togglebutton="false">
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
					<header style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);">
						<span class="widget-icon"><img style="float: left; margin: 7px 10px 0px 20px;" src="<?=base_url()?>seipkon/assets/img/hdblue.png" height="18" width="18" /></span>
						<h2 style="color:white; margin: -1px 0px 0px 30px;"><b>Data Monitoring ATM</b></h2>
						<a onclick="createModalAdd()" class="btn btn-default btn-xs pull-right zoomsmall" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); border-radius: 4px; margin: 5px 5px 0px 0px;width:140px;">
							<img style="float: left; margin: 0px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="18" width="18" />
							<p class="small" style="float:left;font-size:12px; margin: 3px 0px 0px 0px;">
								<small style="color:black;font-size:12px; margin: 0px 0px 0px 0px;">ADD CLIENT/HOST</small>
							</p>
						</a>
						<a onclick="openModalGA()" class="btn btn-default btn-xs pull-right zoomsmall" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); border-radius: 4px; margin: 5px 5px 0px 0px;width:145px;">
							<img style="float: left; margin: 0px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="18" width="18" />
							<p class="small" style="float:left;font-size:12px; margin: 3px 0px 0px 0px;">
								<small style="color:black;font-size:12px; margin: 0px 0px 0px 0px;">DATA GROUP AREA</small>
							</p>
						</a>
						<a onclick="javascript:connectServer()" class="btn btn-default btn-xs pull-right zoomsmall" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); border-radius: 4px; margin: 5px 5px 0px 0px;width:190px;">
							<img style="float: left; margin: 0px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/clean.png" height="18" width="18" />
							<p class="small" style="float:left;font-size:12px; margin: 3px 0px 0px 0px;">
								<?=($status_server=="ONLINE" ? "STOP" : "START")?>
								<small style="color:black;font-size:12px; margin: 0px 0px 0px 0px;">LISTENING - </small>
							</p>
							<b id="status_server_tombol" style="font-weight: bold;color: <?=($status_server=="ONLINE" ? "green" : "red")?>;display: block;"><?=$status_server?></b>
						</a>
					</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">
						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
							<thead>			                
								<tr>
									<th height="30" width="60" style="background-image: linear-gradient(rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 98.6% );"><b style="color:white;font-size:12px;">No</b></th>
									<th style="background-image: linear-gradient(rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 98.6% );"><b style="color:white;font-size:12px;">Nama ATM/Client</th>
									<th style="background-image: linear-gradient(rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 98.6% );"><b style="color:white;font-size:12px;">IP Host ATM/Client</b></th>
									<th style="background-image: linear-gradient(rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 98.6% );"><b style="color:white;font-size:12px;">Live Status</b></th>
									<th width="70" style="background-image: linear-gradient(rgba(5,111,146,1) 13.5%, rgba(6,57,84,1) 98.6% );"><b style="color:white;font-size:12px;">Indicator</b></th>
								</tr>
							</thead>
							<tbody>
								<?php 
									// echo "<pre>";
									// print_r($client);
									$no = 0;
									foreach($client as $row) { $no++; ?>
										<tr>
											<td><?=$no?></td>
											<td><?=$row->id_atm?></td>
											<td><?=$row->ip?></td>
											<td>
												<span style="font-weight: bold; color: <?=($row->status=="ONLINE" ? "green" : ($row->status_client=="OFFLINE" ? "red" : "orange"))?>; display: block;">
												<?=ucfirst(strtolower($row->status))?>	
											</td>
											<td>
												<div id="leds" style="margin: 12px 0px -20px 30px; "> 
												  <div class="led <?=($row->status=="ONLINE" ? "green" : ($row->status=="OFFLINE" ? "red" : "orange"))?>"></div>
												</div>		
											</td>
										</tr>
								<?php	
									} ?>
							</tbody>
						</table>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->


</div>
<!-- end widget -->

</article>
<!-- WIDGET END -->
		
	</div>

	<!-- end row -->

	<!-- row -->

	<div class="row">

		<!-- a blank row to get started -->
		<div class="col-sm-12">
			<!-- your contents here -->
		</div>
			
	</div>

	<!-- end row -->
	
	<div class="content_form" style="width: '100%'" hidden>
		<form action="" class="formName" enctype="multipart/form-data">
			<input type="hidden" class="form-control" name="id" id="id" value="">
			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label">Host Name :</label>
					<input required type="text" name="client" id="client" value="" class="form-control">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label">IP Client :</label>
					<input required type="text" name="ip" id="ip" data-inputmask="'alias': 'ip'" data-mask="" class="form-control">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label">Group Area :</label>
					<select name="stasiun" id="stasiun" class="form-control" style="width: 100%;">
					@foreach($stasiun as $row)
						<option value="{{$row->id_blok}}">{{$row->name_blok}}</option>
					@endforeach
					</select>
				</div>
			</div>
		</form>
	</div>
	
	<div class="container content_form2" hidden>
		<center>
			<form action="<?=base_url()?>transaction_in/insert" class="formName" enctype="multipart/form-data" style="width: 95%; text-align: left">
				<div class="row">
					<div class="col-md-12">
						<a onclick="createModalGA()" class="btn btn-primary pull-right" style="margin-top: -0px; border-radius: 5px;"><img style="float: left; margin: 2px 5px 0px 0px;" src="<?=base_url()?>seipkon/assets/img/adddata.png" height="25" width="20" /><b>Tambah Data</b></a>
						<table id="datatable2" class="table display table-bordered" >
							<thead>
								<th width="50" style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);color:white;font-size:14px;">No.</th>
								<th style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);color:white;font-size:14px;">Nama Area</th>
								<th style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);color:white;font-size:14px;">Keterangan</th>
								<th style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);color:white;font-size:14px;">Range Client</th>
								
								<th width="120" style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);color:white;font-size:14px;" align="center">Opsi</th> 
							</thead>
						</table>
					</div>
				</div>
			</form>
		</center>
	</div>
	
	<div class="container content_blok" hidden>
		<center>
			<form action="<?=base_url().'/master_blok/proses_add'?>" style="width: 90%; text-align: left" enctype="multipart/form-data">
				<input type="hidden" placeholder="" class="form-control" id="id_blok" name="id_blok" value="" required>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Nama Area :</label>
							<input type="text" placeholder="" class="form-control" id="name_blok" name="name_blok" value="" required>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Keterangan :</label>
							<input type="text" placeholder="" class="form-control" id="add_blok" name="add_blok" value="" required>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Range :</label>
							<input type="text" placeholder="" class="form-control" id="range_client" name="range_client" value="" required>
						</div>
					</div>
				</div>
			</form>
		</center>
	</div>

</section>
@endsection

@section('javascript')
<script src="<?=BASE_URL?>js/jquery.inputmask.js"></script>
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
	 * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
	 * 
	 * TO LOAD A SCRIPT:
	 * var pagefunction = function (){ 
	 *  loadScript(".../plugin.js", run_after_loaded);	
	 * }
	 * 
	 * OR you can load chain scripts by doing
	 * 
	 * loadScript(".../plugin.js", function(){
	 * 	 loadScript("../plugin.js", function(){
	 * 	   ...
	 *   })
	 * });
	 */

	// pagefunction
	var table;
	var base_url = "<?=base_url()?>monitor_atm/";
	var pagefunction = function() {

		/* Formatting function for row details - modify as you need */
		function format ( d ) {
			// `d` is the original data object for the row
			return '<table cellpadding="5" cellspacing="0" border="0" class="table table-hover table-condensed">'+
				'<tr>'+
					'<td style="width:100px">Project Title:</td>'+
					'<td></td>'+
				'</tr>'+
				'<tr>'+
					'<td>Deadline:</td>'+
					'<td></td>'+
				'</tr>'+
				'<tr>'+
					'<td>Extra info:</td>'+
					'<td>And any further details here (images etc)...</td>'+
				'</tr>'+
				'<tr>'+
					'<td>Comments:</td>'+
					'<td></td>'+
				'</tr>'+
				'<tr>'+
					'<td>Action:</td>'+
					'<td></td>'+
				'</tr>'+
			'</table>';
		}

		// clears the variable if left blank
		table = $('#example').DataTable( {
			"bStateSave": true,
			"ajax": {
				url :  "<?=base_url()?>monitor_atm/get_data",
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
			"bDestroy": true,
			"iDisplayLength": 15,
			"columns": [
				{
					"class":          'details-control',
					"orderable":      false,
					"data":           null,
					"defaultContent": ''
				},
				{ "data": "name_client" },
				{ "data": "ip_client" },
				{ "data": "status" },
				{ "data": "aksi" },
			],
			"order": [[1, 'asc']],
			"fnDrawCallback": function( oSettings ) {
			   runAllCharts()
			}
		} );


		 
		// Add event listener for opening and closing details
		$('#example tbody').on('click', 'td.details-control', function () {
			var tr = $(this).closest('tr');
			var row = table.row( tr );
	 
			// if ( row.child.isShown() ) {
				// // This row is already open - close it
				// row.child.hide();
				// tr.removeClass('shown');
			// }
			// else {
				// // Open this row
				// row.child( format(row.data()) ).show();
				// tr.addClass('shown');
			// }
		});
		
		
		
		// var interval = setInterval(function() {
			// table.ajax.reload( null, false );
		// }, 10000);

	};
	
	// end pagefunction
	// checkServer();
	
	function checkServer() {
		var url = "<?=base_url()?>njpserv/check_server.php";
		console.log(url)
		$.confirm({    
			// autoClose: 'formSubmit|1000',
			content: function () {
				var self = this;
				return $.ajax({
					url: url,
					dataType: 'html',
					method: 'get',
					title: false,
				}).done(function (response) {
					var str = JSON.parse(response);
					console.log(check_processed(str).length);
					if(check_processed(str).length>0) {
						if(check_processed(str).includes('STOPPED')) {
							var url = "<?=base_url()?>njpserv/stop.php";
							$.get(url, function(data) {});
							connectServer();
						} else if(check_processed(str).includes('index.js')) {
							self.setTitle("ONLINE");
							var formData = new FormData();
							formData.append("status", "ONLINE");
							var request = new XMLHttpRequest();
							request.open("POST", "<?=base_url()?>monitor_atm/proses_server");
							request.onload = function(oEvent) {
								if (request.status == 200) {
									console.log(request.response);
									// window.location.reload();
									$("#status_server_tombol").html("ONLINE")
									$("#status_server_tombol").css({"color": "green"})
								} else {
									// alert("BBB");
								}
							};
							request.send(formData);
						}
					} else {
						self.setTitle("OFFLINE");
						var formData = new FormData();
						formData.append("status", "OFFLINE");
						var request = new XMLHttpRequest();
						request.open("POST", "<?=base_url()?>monitor_atm/proses_server");
						request.onload = function(oEvent) {
							if (request.status == 200) {
								console.log(request.response);
								$("#status_server_tombol").html("OFFLINE")
								$("#status_server_tombol").css({"color": "red"})
								// window.location.reload();
							} else {
								alert("BBB");
							}
						};
						request.send(formData);
					}
					
					self.close();
				}).fail(function(){
					self.setTitle("");
					self.setContent('Destination net unreachable.');
					
					// formData.append("status", "Destination net unreachable");
					// var request = new XMLHttpRequest();
					// request.open("POST", "<?=base_url()?>monitor_atm/proses_client");
					// request.onload = function(oEvent) {
						// if (request.status == 200) {
							// console.log(request.response);
							// // window.location.reload();
						// } else {
							// // alert("BBB");
						// }
					// };
					// request.send(formData);
				});
			},
			buttons: {
				formSubmit: {
					text: 'OK',
					btnClass: 'btn-blue',
					action: function () {
						// window.location.reload();
					}
				}
			}
		});
	}
	
	function check_processed(str) {
		var result = [];
		var filtered = str.filter(function (el) {
			return el != "";
		});
		if(filtered.length>1) {
			for (var key in filtered) {
				if(key>1) {
					var tes = filtered[key].split(' ');
					var filtered2 = tes.filter(function (el) {
						return el != "";
					});
					
					var filename = filtered2[4].replace(/^.*[\\\/]/, '')
					var uptime = filtered2[8].replace(/^.*[\\\/]/, '')
					if(uptime=="STOPPED") {
						result.push(uptime);
					} else {
						result.push(filename);
					}
				}
			}
		}
		
		return result;
	}
	
	function connectServer() {
		var status = "<?=$status_server?>";
		if (status=="ONLINE") {
			action = "stop_server";
		} else if(status=="OFFLINE") {
			action = "start_server";
		} else {
			action = "start_server";
		}
		
		var url = "<?=base_url()?>njpserv/server.php?action="+action+"&submit=SUBMIT";
		$.confirm({    
			autoClose: 'formSubmit|1000',
			content: function () {
				var self = this;
				return $.ajax({
					url: url,
					dataType: 'html',
					method: 'get',
					title: false,
				}).done(function (response) {
					self.setTitle("");
					self.setContent(response);
					
					var formData = new FormData();
					formData.append("status", response);
					var request = new XMLHttpRequest();
					request.open("POST", "<?=base_url()?>monitor_atm/proses_server");
					request.onload = function(oEvent) {
						if (request.status == 200) {
							console.log(request.response);
							// window.location.reload();
						} else {
							alert("BBB");
						}
					};
					request.send(formData);
				}).fail(function(){
					self.setContent('Something went wrong.');
				});
			},
			buttons: {
				formSubmit: {
					text: 'OK',
					btnClass: 'btn-blue',
					action: function () {
						window.location.reload();
					}
				}
			}
		});
	}
	
	function connectClient(id, ip, status) {
		if (status=="ONLINE") {
			action = "stop";
		} else if(status=="OFFLINE") {
			action = "start";
		} else {
			action = "start";
		}
		
		var formData = new FormData();
		formData.append("id", id);
		formData.append("ip", ip);
		var url = "http://"+ip+"/njpserv/tes.php?action="+action+"&submit=SUBMIT";
		console.log(url)
		$.confirm({    
			autoClose: 'formSubmit|1000',
			content: function () {
				var self = this;
				return $.ajax({
					url: url,
					dataType: 'html',
					method: 'get',
					title: false,
				}).done(function (response) {
					self.setTitle("");
					self.setContent(response);
					
					formData.append("status", response);
					var request = new XMLHttpRequest();
					request.open("POST", "<?=base_url()?>monitor_atm/proses_client");
					request.onload = function(oEvent) {
						if (request.status == 200) {
							console.log(request.response);
							// window.location.reload();
						} else {
							// alert("BBB");
						}
					};
					request.send(formData);
				}).fail(function(){
					self.setTitle("");
					self.setContent('Destination net unreachable.');
					
					formData.append("status", "Destination net unreachable");
					var request = new XMLHttpRequest();
					request.open("POST", "<?=base_url()?>monitor_atm/proses_client");
					request.onload = function(oEvent) {
						if (request.status == 200) {
							console.log(request.response);
							// window.location.reload();
						} else {
							// alert("BBB");
						}
					};
					request.send(formData);
				});
			},
			buttons: {
				formSubmit: {
					text: 'OK',
					btnClass: 'btn-blue',
					action: function () {
						window.location.reload();
					}
				}
			}
		});
	}
	
	function forceStop(id, ip, status) {
		var formData = new FormData();
		formData.append("id", id);
		formData.append("ip", ip);
		var url = "http://"+ip+"/njpserv/stop.php"
		console.log(url)
		$.confirm({    
			autoClose: 'formSubmit|1000',
			content: function () {
				var self = this;
				return $.ajax({
					url: url,
					dataType: 'html',
					method: 'get',
					title: false,
				}).done(function (response) {
					var n = response.search("No forever processes running");
					if(n!==-1) {
						response = "OFFLINE";
					}
					self.setTitle("");
					self.setContent(response);
					formData.append("status", response);
					var request = new XMLHttpRequest();
					request.open("POST", "<?=base_url()?>monitor_atm/proses_client");
					request.onload = function(oEvent) {
						if (request.status == 200) {
							console.log(request.response);
							// window.location.reload();
						} else {
							// alert("BBB");
						}
					};
					request.send(formData);
				}).fail(function(){
					self.setTitle("");
					self.setContent('Destination net unreachable.');
					
					formData.append("status", "Destination net unreachable");
					var request = new XMLHttpRequest();
					request.open("POST", "<?=base_url()?>monitor_atm/proses_client");
					request.onload = function(oEvent) {
						if (request.status == 200) {
							console.log(request.response);
							// window.location.reload();
						} else {
							// alert("BBB");
						}
					};
					request.send(formData);
				});
			},
			buttons: {
				formSubmit: {
					text: 'OK',
					btnClass: 'btn-blue',
					action: function () {
						window.location.reload();
					}
				}
			}
		});
	}
	
	function infoClient(id, ip, status) {
		var formData = new FormData();
		formData.append("id", id);
		formData.append("ip", ip);
		var url = "http://"+ip+"/njpserv/list.php";
		console.log(url)
		$.confirm({    
			// autoClose: 'formSubmit|1000',
			content: function () {
				var self = this;
				return $.ajax({
					url: url,
					dataType: 'html',
					method: 'get',
					title: false,
				}).done(function (response) {
					if(response!=="[]") {
						var json = JSON.parse(response)[0];
						var uptime = json.uptime;
						var res = uptime.split(":");
						var day = res[0];
						var hour = res[1];
						var minute = res[2];
						var second = res[3].split(".");
						second = second[0];
						uptime = day+":"+hour+":"+minute+":"+second;
						
						self.setTitle("Info Client");
						self.setContent('PID: ' + json.pid);
						self.setContentAppend('<br>Uptime: ' + uptime);
					} else {
						self.setTitle("Info Client");
						self.setContent('This client is offline');
					}
				}).fail(function(){
					self.setTitle("");
					self.setContent('Destination net unreachable.');
					
					formData.append("status", "Destination net unreachable");
					var request = new XMLHttpRequest();
					request.open("POST", "<?=base_url()?>monitor_atm/proses_client");
					request.onload = function(oEvent) {
						if (request.status == 200) {
							console.log(request.response);
							// window.location.reload();
						} else {
							// alert("BBB");
						}
					};
					request.send(formData);
				});
			},
			buttons: {
				formSubmit: {
					text: 'OK',
					btnClass: 'btn-blue',
					action: function () {
						window.location.reload();
					}
				}
			}
		});
	}
	
	function restartClient(id, ip, status) {
		if (status=="ONLINE") {
			action = "stop";
		} else if(status=="OFFLINE") {
			action = "start";
		} else {
			action = "start";
		}
		
		var formData = new FormData();
		formData.append("id", id);
		formData.append("ip", ip);
		var url = "http://"+ip+"/restart.php?action="+action+"&submit=SUBMIT";
		console.log(url)
		$.confirm({    
			autoClose: 'formSubmit|1000',
			content: function () {
				var self = this;
				return $.ajax({
					url: url,
					dataType: 'html',
					method: 'get',
					title: false,
				}).done(function (response) {
					self.setTitle("");
					self.setContent(response);
					
					formData.append("status", response);
					var request = new XMLHttpRequest();
					request.open("POST", "<?=base_url()?>monitor_atm/proses_client");
					request.onload = function(oEvent) {
						if (request.status == 200) {
							console.log(request.response);
							// window.location.reload();
						} else {
							// alert("BBB");
						}
					};
					request.send(formData);
				}).fail(function(){
					self.setTitle("");
					self.setContent('Destination net unreachable.');
					
					formData.append("status", "Destination net unreachable");
					var request = new XMLHttpRequest();
					request.open("POST", "<?=base_url()?>monitor_atm/proses_client");
					request.onload = function(oEvent) {
						if (request.status == 200) {
							console.log(request.response);
							// window.location.reload();
						} else {
							// alert("BBB");
						}
					};
					request.send(formData);
				});
			},
			buttons: {
				formSubmit: {
					text: 'OK',
					btnClass: 'btn-blue',
					action: function () {
						window.location.reload();
					}
				}
			}
		});
	}
	
	function createModalAdd() {
		var content = $('.content_form').clone().html();
		
		$.confirm({
			title: 'Tambah Client',
			theme: 'light',
			content: content,
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
							url: base_url + "save",
							dataType: 'html',
							method: 'post',
							processData: false,
							contentType: false,
							cache: false,
							data: formData,
							timeout: 3000,
						}).done(function (response) {
							if(response=="success") {
								window.location.reload();
								self.close();
							} else {
								self.hideLoading();
							}
						}).fail(function(e){
							console.log(e);
							alert('Something went wrong.');
						});
						
						table.ajax.reload( null, false );
					}
				},
				cancel: function () {
					//close
				},
			},
			onContentReady: function () {
				var jc = this;
				var selector = this.$content.find('#ip');
				var ipv4_address = selector;
				ipv4_address.inputmask({
					alias: "ip",
					"placeholder": "_"
				});
					
				this.$content.find('form').on('submit', function (e) {
					// if the user submits the form by pressing enter in the field.
					e.preventDefault();
					jc.$$formSubmit.trigger('click'); // reference the button and click it
				});
			}
		});
	}
	
	function createModalEdit(id_client, name_client, ip_client, stasiun) {
		var content = $('.content_form').clone().html();
		// console.log(content);
		// alert(content);
		// $.alert({
			// draggable: false,
			// theme: 'dark',
			// title: 'Alert!',
			// content: 'Simple alert!',
		// });
	
		$.confirm({
			draggable: false,
			title: false,
			theme: 'light',
			content: content,
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
							url: base_url + "update",
							dataType: 'html',
							method: 'post',
							processData: false,
							contentType: false,
							cache: false,
							data: formData,
							timeout: 3000,
						}).done(function (response) {
							if(response=="success") {
								window.location.reload();
								self.close();
							} else {
								self.hideLoading();
							}
						}).fail(function(e){
							console.log(e);
							alert('Something went wrong.');
						});
						
						table.ajax.reload( null, false );
					}
				},
				cancel: function () {
					//close
				},
			},
			onContentReady: function () {
				// bind to events
				
				var jc = this;
				
				var selector = this.$content.find('#ip');
				var ipv4_address = selector;
				ipv4_address.inputmask({
					alias: "ip",
					"placeholder": "_"
				});
				
				this.$content.find('#id').val(id_client);
				this.$content.find('#client').val(name_client);
				this.$content.find('#ip').val(ip_client);
				this.$content.find('#stasiun').val(stasiun);
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
								window.location.reload();
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
	
	function deleteBlok(url) {
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
	
	var table2;
	function openModalGA() {
		var content = $('.content_form2').clone().html();
			
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
				cancel: function () {
					$.ajax({url: '<?=base_url()?>transaction_in/clear_temp', dataType: 'html', method: 'post', data: { 
					}, timeout: 3000}).done(function (response) {
						table2.ajax.reload( null, false );
					});
				},
			},
			onContentReady: function () {
				// bind to events
				var jc = this;
				
				var base_url = "<?php echo base_url();?>";
				console.log(base_url + 'master_blok/get_data');
				table2 = this.$content.find('#datatable2').DataTable({
					"pageLength" : 100,
					"serverSide": true,
					"order": [[1, "asc" ]],
					"columnDefs": [{"orderable": false, "targets": 0}],
					"ajax":{
						url :  base_url + 'master_blok/get_data',
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
				
				this.$content.find('form').on('submit', function (e) {
					// if the user submits the form by pressing enter in the field.
					e.preventDefault();
					jc.$$formSubmit.trigger('click'); // reference the button and click it
				});
			}
		});
	}
	
	function createModalGA() {
		var content = $('.content_blok').clone().html();
		
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
							console.log(response);
							// self.buttons.formSubmit.hide();
							// self.buttons.cancel.hide();
							// self.close();
							table2.ajax.reload( null, false );
							self.close();
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
	
	function updateBlok(id_blok, name_blok, add_blok) {
		var content = $('.content_blok').clone().html();
		
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
							console.log(response);
							// self.buttons.formSubmit.hide();
							// self.buttons.cancel.hide();
							// self.close();
							table2.ajax.reload( null, false );
							self.close();
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
				jc.$content.find('#id_blok').val(id_blok);
				jc.$content.find('#name_blok').val(name_blok);
				jc.$content.find('#add_blok').val(add_blok);
				this.$content.find('form').on('submit', function (e) {
					// if the user submits the form by pressing enter in the field.
					e.preventDefault();
					jc.$$formSubmit.trigger('click'); // reference the button and click it
				});
			}
		});
	}
	// destroy generated instances 
	// pagedestroy is called automatically before loading a new page
	// only usable in AJAX version!

	var pagedestroy = function(){
		
		/*
		Example below:

		$("#calednar").fullCalendar( 'destroy' );
		if (debugState){
			root.console.log("✔ Calendar destroyed");
		} 

		For common instances, such as Jarviswidgets, Google maps, and Datatables, are automatically destroyed through the app.js loadURL mechanic

		*/
		//$('#example').find('*').addBack().off().remove();
	
	}

	// end destroy
	
	// load related plugins & run pagefunction
	loadScript("<?=BASE_URL?>js/plugin/datatables/jquery.dataTables.min.js", function(){
		loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.colVis.min.js", function(){
			loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.tableTools.min.js", function(){
				loadScript("<?=BASE_URL?>js/plugin/datatables/dataTables.bootstrap.min.js", function(){
					loadScript("<?=BASE_URL?>js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
				});
			});
		});
	});
	
</script>
<script type="text/javascript">
var ON_TIMEOUT   = 0;   // time until next 'all on', calculated
var LED_TIMEOUT  = 90;  // timeout for each led to turn off
var OFF_DELAY    = 390; // timeout for leds turning off

$(function() {
var leds = [];

ON_TIMEOUT = OFF_DELAY;
$("div.led").each(function() {
ON_TIMEOUT += LED_TIMEOUT * 2;
leds.push(this);
});

$.each(leds, function() {
$(this).addClass("off");

// Instead of setInterval, this timer starts immediately.
(function() {
  var startTimeout = LED_TIMEOUT;
  for(var index = (leds.length - 1); index >= 0; index--) {
	var $led = $(leds[index]);
	$led.removeClass("off");
	
	(function() {
	  // grabbing the upvalue... 
	  var $led2 = $led;
	  setTimeout(function() {
		$led2.addClass("off");
	  }, startTimeout + OFF_DELAY);
	}());
	
	startTimeout += LED_TIMEOUT;
  }
  
  setTimeout(arguments.callee, ON_TIMEOUT);
}());
});
});
</script>


@endsection