<!DOCTYPE html>

<?php 
	$date = $res->entry_date;
	$date = date("y/m/d", strtotime($date));
	$layanan = $res->service_type;
	$pm = "";
	$cm = "";
	$in = "";
	$mk = "";
	$pm = "";
	if($layanan=="PM") {
		$pm = "V";
	}
	if($layanan=="CM") {
		$cm = "V";
	}
	if($layanan=="IN") {
		$in = "V";
	}
	if($layanan=="MK") {
		$mk = "V";
	}
	
	$date_entry = date_create($res->entry_date);
	$time_entry = date_format($date_entry, "H:i");
	$day_entry = date_format($date_entry, "d");
	$month_entry = date_format($date_entry, "m");
	$year_entry = date_format($date_entry, "Y");
	
	$date_arrival = date_create($res->arrival_time);
	$time_arrival = date_format($date_arrival, "H:i");
	$day_arrival = date_format($date_arrival, "d");
	$month_arrival = date_format($date_arrival, "m");
	$year_arrival = date_format($date_arrival, "Y");
	
	$date_start = date_create($res->start_job);
	$time_start = date_format($date_start, "H:i");
	$day_start = date_format($date_start, "d");
	$month_start = date_format($date_start, "m");
	$year_start = date_format($date_start, "Y");
	
	$date_end = date_create($res->end_job);
	$time_end = date_format($date_end, "H:i");
	$day_end = date_format($date_end, "d");
	$month_end = date_format($date_end, "m");
	$year_end = date_format($date_end, "Y");
	
	$date_leave = date_create($res->leave_time);
	$time_leave = date_format($date_leave, "H:i");
	$day_leave = date_format($date_leave, "d");
	$month_leave = date_format($date_leave, "m");
	$year_leave = date_format($date_leave, "Y");
	
	$date_waiting = date_create($res->waiting_time);
	$time_waiting = date_format($date_waiting, "H:i");
	
	$action_taken = json_decode($res->action_taken, true)['action_taken'];
	$without_breaks = str_replace(array('<ol>', '<li>', '</ol>', '</li>', '<li __plugindomid="pgm1418961401523">'), '-', $action_taken);
	$res_action = array_filter(explode("--", $without_breaks));
	
	$data1 = array();
	$data2 = array();
	$data3 = array();
	$i=0;
	foreach(json_decode($res->action_taken, true)['action']['form1'] as $r) {
		$i++;
		if($i<=9) {
			$data1[] = $r;
		} else if($i>9 && $i<=18) {
			$data2[] = $r;
		} else if($i>18 && $i<=26) {
			$data3[] = $r;
		}
		// print_r($r['value']);
	}
	// echo "<pre>";
	// print_r($data1);
	
	
	if($res->status_ticket=='pending-sparepart' || $res->status_ticket=='pending-pekerjaan') {
		$status_ticket = "pending";
	} else if($res->status_ticket=='done') {
		$status_ticket = "done";
	}
	
	$str = $res_action[0];
	$res_action = wordwrap($str,30,"<br>\n");
	$str = str_replace(",", ", ", $str);
	$lines = explode("\n", wordwrap($str, 85, "\n"));
?>



<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8"/>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	</head>
	<body style="margin:0px;padding:0px;overflow:hidden">
		<iframe class="preview-pane" type="application/pdf" frameborder="0" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:100%;width:100%;position:absolute;top:0px;left:0px;right:0px;bottom:0px" height="100%" width="100%"></iframe>
	</body>
	<script type="text/javascript" src="<?=base_url()?>assets/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/jspdf.min.js"></script>
	<script>
		var demo = "TEXT DEMO";
		var doc = new jsPDF("p", "mm", "a4");
		
		var myImage = new Image();
		myImage.src = '<?=base_url()?>assets/jobcard/bg1.png';
		myImage.onload = function(){
			doc.addImage(myImage, 'PNG', 8, 18, 195, 265, null, 'FAST');
			
			text();
			
			var string = doc.output('bloburi');
			$('.preview-pane').attr('src', string);
			// doc.save("a4.pdf");
			
			// var blob = doc.output('blob');
			// var formData = new FormData();
			// formData.append('pdf', blob);
			// formData.append('ticket', "<?=$ticket?>");
			// $.ajax({
				// url: "<?=$base_url?>uploads/pdf",
				// dataType: 'html',
				// method: 'POST',
				// data: formData,
				// processData: false,
				// contentType: false,
				// success: function(data){
					// console.log(data); 
					// window.history.back();
				// },
				// error: function(data){console.log(data)}
			// });
			
			// doc.fromHTML(
			// $('.preview-pane'), 15, 15,
			// {width: 170},
			// function()
			// {
				// var blob = doc.output('blob');

				// var formData = new FormData();
				// formData.append('pdf', blob);

				// $.ajax('/upload.php',
				// {
					// method: 'POST',
					// data: formData,
					// processData: false,
					// contentType: false,
					// success: function(data){console.log(data)},
					// error: function(data){console.log(data)}
				// });
			// }
		// );

		};
		
		
		function text() {
			doc.setFont("times");
			doc.setFontType("normal");
			// TICKET NUMBER
			doc.text(167, 53.6, ''); // NOMOR JOBCARD
			
			doc.setFontSize(8);
			// KETERANGAN PELANGGAN
			doc.text(37, 69.5, '<?=$res->nama?>'); // PERUSAHAAN
			doc.text(37, 76.4, '<?=$res->cabang?>'); // CABANG
			doc.text(37, 83.2, '<?=$res->idatm?>'); // ATM ID
			doc.text(37, 90.2, '<?=$res->alamat?>'); // ALAMAT
			doc.text(37, 96.6, ''); // TELP. & FAX
			
			// KETERANGAN MESIN
			doc.setFontSize(6.5);
			doc.text(181, 67.4, '<?=$res->ticket_id?>'); // NOMOR TICKET
			doc.setFontSize(8);
			doc.text(108, 78.8, '<?=$res->type_mesin?>'); // TYPE
			doc.text(133, 78.8, '<?=$res->merk_mesin?>'); // MODEL NO.
			doc.text(166.7, 78.8, '<?=$res->sn_mesin?>'); // SERIAL NO.
			doc.text(139.5, 85, '<?=$res->reported_problem?>'); // KERUSAKAN DILAPORKAN
			doc.text(130.5, 95, '<?=$res->reported_by?>'); // DILAPORKAN OLEH
			
			doc.setFontSize(10);
			doc.text(184.6, 97, '<?=$date?>'); // TANGGAL & JAM
			
			doc.text(48.5, 113.8, "<?=$pm?>"); // JENIS LAYANAN PM
			doc.text(48.5, 120.8, "<?=$in?>"); // JENIS LAYANAN IN
			doc.text(99.7, 113.8, "<?=$cm?>"); // JENIS LAYANAN CM
			doc.text(99.7, 120.8, "<?=$mk?>"); // JENIS LAYANAN MK
			
			doc.setFontSize(8);
			// doc.text(163, 113.3, "<?=$res->problem_type?>"); // JENIS KERUSAKAN
			
			// PEKERJAAN
			doc.setFontSize(8);
			// WAKTU PENUGASAN
			doc.text(41.8, 144.4, "<?=$time_entry?>"); // JAM
			doc.text(58.5, 144.4, "<?=$day_entry?>"); // TANGGAL
			doc.text(73.5, 144.4, "<?=$month_entry?>"); // TANGGAL
			doc.text(87.5, 144.4, "<?=$year_entry?>"); // TAHUN
			
			
			doc.text(41.8, 150.4, "<?=$time_arrival?>");  // JAM
			doc.text(58.5, 150.4, "<?=$day_arrival?>"); // TANGGAL
			doc.text(73.5, 150.4, "<?=$month_arrival?>"); // TANGGAL
			doc.text(87.5, 150.4, "<?=$year_arrival?>"); // TAHUN
			
			
			doc.text(41.8, 156.4, "<?=$time_start?>");  // JAM
			doc.text(58.5, 156.4, "<?=$day_start?>"); // TANGGAL
			doc.text(73.5, 156.4, "<?=$month_start?>"); // TANGGAL
			doc.text(87.5, 156.4, "<?=$year_start?>"); // TAHUN
			
			
			doc.text(41.8, 162.4, "<?=$time_end?>");  // JAM
			doc.text(58.5, 162.4, "<?=$day_end?>"); // TANGGAL
			doc.text(73.5, 162.4, "<?=$month_end?>"); // TANGGAL
			doc.text(87.5, 162.4, "<?=$year_end?>"); // TAHUN
			
			
			doc.text(41.8, 168.4, "<?=$time_leave?>");  // JAM
			doc.text(58.5, 168.4, "<?=$day_leave?>"); // TANGGAL
			doc.text(73.5, 168.4, "<?=$month_leave?>"); // TANGGAL
			doc.text(87.5, 168.4, "<?=$year_leave?>"); // TAHUN
			
			
			doc.text(41.8, 174.4, "<?=$time_waiting?>"); // WAKTU MENUNGGU
			doc.text(60, 174.6, ""); // TANGGAL
			
			// doc.text(102, 144.4, "<?=$action_taken?>"); // PEKERJAAN DILAKUKAN
			// doc.text(102, 150.4, "# CHECK DISPENSER"); // PEKERJAAN DILAKUKAN
			// doc.text(102, 156.4, "# CHECK DISPENSER"); // PEKERJAAN DILAKUKAN
			// doc.text(102, 162.4, "# CHECK DISPENSER"); // PEKERJAAN DILAKUKAN
			// doc.text(102, 168.4, "# CHECK DISPENSER"); // PEKERJAAN DILAKUKAN
			// doc.text(102, 174.6, "# CHECK DISPENSER"); // PEKERJAAN DILAKUKAN
			
			var i = 0;
			<?php 
				foreach($lines as $r) { 		
			?>
					doc.text(102, 145+(i*6), "<?=$r?>");
					i++;
			<?php 
				} 
			?>
			
			
			// POWER LISTRIK
			doc.text(25, 194.6, "220"); 
			doc.text(25, 199.3, "219"); 
			doc.text(25, 203.6, "1,0"); 
			doc.text(25, 208.4, "ADA"); 
			doc.text(25, 213.1, "ADA"); 
			doc.text(25, 217.8, "18"); 
			doc.text(23, 222.2, "UPS BATTERY MULAI LEMAH"); 
			
			var i = 0;
			<?php 
				foreach($data1 as $r) {
					if($r['value']=="diag") { ?>
						doc.text(76, 189+(i*3.6), "V");
				<?php
					} else if($r['value']=="align") { ?>
						doc.text(82.5, 189+(i*3.6), "V");
				<?php
					} else if($r['value']=="replace") { ?>
						doc.text(91, 189+(i*3.6), "V");
				<?php
					}
				?>
					i++;
			<?php
				}
			?>
			
			var j = 51;
			var i = 0;
			<?php 
				foreach($data2 as $r) {
					if($r['value']=="diag") { ?>
						doc.text(76+j, 189+(i*3.6), "V");
				<?php
					} else if($r['value']=="align") { ?>
						doc.text(82.5+j, 189+(i*3.6), "V");
				<?php
					} else if($r['value']=="replace") { ?>
						doc.text(91+j, 189+(i*3.6), "V");
				<?php
					}
				?>
					i++;
			<?php
				}
			?>
			
			var j = 102;
			var i = 0;
			<?php 
				foreach($data3 as $r) {
					if($r['value']=="diag") { ?>
						doc.text(76+j, 189+(i*3.6), "V");
				<?php
					} else if($r['value']=="align") { ?>
						doc.text(82.5+j, 189+(i*3.6), "V");
				<?php
					} else if($r['value']=="replace") { ?>
						doc.text(91+j, 189+(i*3.6), "V");
				<?php
					}
				?>
					i++;
			<?php
				}
			?>
			
			
			doc.setFontType("bold");
			doc.setFontSize(10);
			<?php
				if($status_ticket=="done") { 
			?>
					doc.text(102, 225.5, "V"); 
			<?php
				} else if($status_ticket=="pending") { 
			?>
					doc.text(152.5, 225.5, "V"); 
			<?php
				}
			?>
		}
	</script>
</html>

<?php /**PATH D:\DEV_SERVER\htdocs\atmserv\coresys\views/pages/report_jobcard/pdf.blade.php ENDPATH**/ ?>