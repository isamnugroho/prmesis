<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Laporanfpdf extends CI_Controller {
	 
		function __construct(){
			parent::__construct();
			$this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
		}
	 
		function index()
		{
			error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
	 
			$pdf = new FPDF('L', 'mm','Letter');
	 
			$pdf->AddPage();
	 
			$pdf->SetFont('Arial','B',16);
			$pdf->Cell(0,7,'DAFTAR PEGAWAI AYONGODING.COM',0,1,'C');
			$pdf->Cell(10,7,'',0,1);
	 
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(10,6,'No',1,0,'C');
			$pdf->Cell(90,6,'Nama Pegawai',1,0,'C');
			$pdf->Cell(120,6,'Alamat',1,0,'C');
			$pdf->Cell(40,6,'Telp',1,1,'C');
	 
			$pdf->SetFont('Arial','',10);
			$pegawai = $this->db->get('master_staff')->result();
			$no=0;
			foreach ($pegawai as $data){
				$no++;
				$pdf->Cell(10,6,$no,1,0, 'C');
				$pdf->Cell(90,6,$data->nama,1,0);
				$pdf->Cell(120,6,$data->alamat,1,0);
				$pdf->Cell(40,6,$data->hp,1,1);
			}
			$pdf->Output();
		}
		
		public function jobcard($ticket) {
			$query = "
				SELECT *, master_ticket.status as status_ticket FROM master_ticket
				LEFT JOIN master_atm ON(master_atm.idatm=master_ticket.atm_id)
				LEFT JOIN master_client ON(master_client.id=master_ticket.bank_id)
				LEFT JOIN trouble_sub_category ON(trouble_sub_category.sub_category_name=master_ticket.problem_type)
				LEFT JOIN trouble_category ON(trouble_category.id=trouble_sub_category.id_category)
				WHERE master_ticket.ticket_id='".$ticket."'
			";
			$query = "
				SELECT 
					*, 
					master_ticket.id as ids, 
					primary_table.status as status_ticket, 
					master_client.nama as nama_bank, 
					master_ticket.pic as pic 
				FROM master_ticket_detail primary_table 
				LEFT JOIN (SELECT id, ticket_id, atm_id, service_type, problem_type, reported_problem, reported_by, entry_date, pic FROM master_ticket) as master_ticket ON(master_ticket.ticket_id=primary_table.ticket_id)
				LEFT JOIN master_atm ON(master_atm.idatm=master_ticket.atm_id)
				LEFT JOIN master_client ON(master_client.id=master_atm.id_bank), 
				(SELECT MAX(id) as pId FROM master_ticket_detail GROUP BY ticket_id) second_table
				WHERE primary_table.id = second_table.pId AND master_ticket.ticket_id='".$ticket."'
			";
			
			$query = $this->db->query($query);
			$num_rows = $query->num_rows();
			$res = $query->row();
			
			$date = date("d-m-Y", strtotime($res->entry_date));
			$time = date("H:i", strtotime($res->entry_date));
			$layanan = $res->service_type;
			$pm = "";
			$cm = "";
			$in = "";
			$mk = "";
			$pm = "";
			if($layanan=="PM") {
				$pm = "4";
			}
			if($layanan=="CM") {
				$cm = "4";
			}
			if($layanan=="IN") {
				$in = "4";
			}
			if($layanan=="MK") {
				$mk = "4";
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
			}
			
			
			if($res->status_ticket=='pending-sparepart' || $res->status_ticket=='pending-pekerjaan') {
				$status_ticket = "pending";
			} else if($res->status_ticket=='done') {
				$status_ticket = "done";
			}
			
			$lines = $res_action[0];
			$lines = str_replace(",", ", ", $lines);
			$lines = explode("\n", wordwrap($lines, 75, "\n"));
			
			// $noted = "Check, epp not detect, switch kabel usb, restart atm, check diag bywindows";
			$noted = "";
			$noted = str_replace(",", ", ", $noted);
			$noted = explode("\n", wordwrap($noted, 40, "\n"));
			
			if($res->status_ticket=='pending-sparepart' || $res->status_ticket=='pending-pekerjaan') {
				$status_ticket = "pending";
			} else if($res->status_ticket=='done') {
				$status_ticket = "done";
			}
			
			// echo "<pre>";
			// // print_r($res);
			// print_r(json_decode($res->action_taken, true)['action']['form2']);
			
			$pdf = new FPDF('P','mm','A4');
			$pdf->AddPage();
			
			$pdf->Image('assets/jobcard/bg1.png',8,18,195);
			
			$pdf->SetFont('Arial','',8);
			
			// KETERANGAN PELANGGAN
			$base = 69.5;
			$pdf->Text(37.5,$base,$res->nama);
			$pdf->Text(37.5,($base+6.5),$res->cabang);
			$pdf->Text(37.5,($base+13.5),$res->idatm);
			$pdf->Text(37.5,($base+20),$res->alamat);
			$pdf->Text(37.5,($base+26.5),$res->telp);
			
			// KETERANGAN MESIN
			$pdf->SetFont('Arial','B',6);
			$pdf->SetY(64.1);   
			$pdf->SetX(180);   
			$pdf->Cell(19.5,5,$res->ticket_id,0,1,'C'); 
			
			$pdf->SetFont('Arial','',8);
			$pdf->SetY(75);   
			$pdf->SetX(107.5);   
			$pdf->Cell(19,5,$res->type_mesin,0,1,'C'); 
			
			$pdf->SetY(75);   
			$pdf->SetX(137);   
			$pdf->Cell(19,5,$res->merk_mesin,0,1,'C'); 
			
			$pdf->SetY(75);   
			$pdf->SetX(173.5);   
			$pdf->Cell(19,5,$res->sn_mesin,0,1,'C'); 
			
			$pdf->Text(139.5,84.5,$res->reported_problem);
			$pdf->Text(130.5,94.5,$res->reported_by);
			
			$pdf->SetFont('Arial','',6);
			$pdf->SetY(92);   
			$pdf->SetX(181.5);   
			$pdf->Cell(19,5,$date,0,1,'C'); 
			
			$pdf->SetY(94);   
			$pdf->SetX(181.5);   
			$pdf->Cell(19,5,$time,0,1,'C'); 
			
			
			//checkmark
			$pdf->SetFont('ZapfDingbats','', 14);
			$pdf->SetY(109.2);   
			$pdf->SetX(40.5);   
			$pdf->Cell(19,5,$pm,0,1,'C'); 
			
			$pdf->SetY(109.2);   
			$pdf->SetX(91.5);   
			$pdf->Cell(19,5,$cm,0,1,'C'); 
			
			$pdf->SetY(116.2);   
			$pdf->SetX(40.5);   
			$pdf->Cell(19,5,$in,0,1,'C'); 
			
			$pdf->SetY(116.2);   
			$pdf->SetX(91.5);   
			$pdf->Cell(19,5,$mk,0,1,'C'); 
			
			$pdf->SetFont('Arial','',8);
			$pdf->Text(163.5,112.5,$res->problem_type);
			
			// DATE TIME
			$pdf->SetY(140);   
			$pdf->SetX(38.6);   
			$pdf->Cell(13,5,$time_entry,0,1,'C'); 
			$pdf->SetY(140);   
			$pdf->SetX(53.6);   
			$pdf->Cell(13,5,$day_entry,0,1,'C'); 
			$pdf->SetY(140);   
			$pdf->SetX(68.6);   
			$pdf->Cell(13,5,$month_entry,0,1,'C'); 
			$pdf->SetY(140);   
			$pdf->SetX(83.6);   
			$pdf->Cell(13,5,$year_entry,0,1,'C'); 
			
			
			$pdf->SetY(145.6);   
			$pdf->SetX(38.6);   
			$pdf->Cell(13,5,$time_arrival,0,1,'C'); 
			$pdf->SetY(145.6);   
			$pdf->SetX(53.6);   
			$pdf->Cell(13,5,$day_arrival,0,1,'C'); 
			$pdf->SetY(145.6);   
			$pdf->SetX(68.6);   
			$pdf->Cell(13,5,$month_arrival,0,1,'C'); 
			$pdf->SetY(145.6);   
			$pdf->SetX(83.6);   
			$pdf->Cell(13,5,$year_arrival,0,1,'C'); 
			
			
			$pdf->SetY(151.6);   
			$pdf->SetX(38.6);   
			$pdf->Cell(13,5,$time_start,0,1,'C'); 
			$pdf->SetY(151.6);   
			$pdf->SetX(53.6);   
			$pdf->Cell(13,5,$day_start,0,1,'C'); 
			$pdf->SetY(151.6);   
			$pdf->SetX(68.6);   
			$pdf->Cell(13,5,$month_start,0,1,'C'); 
			$pdf->SetY(151.6);   
			$pdf->SetX(83.6);   
			$pdf->Cell(13,5,$year_start,0,1,'C'); 
			
			
			$pdf->SetY(157.6);   
			$pdf->SetX(38.6);   
			$pdf->Cell(13,5,$time_end,0,1,'C'); 
			$pdf->SetY(157.6);   
			$pdf->SetX(53.6);   
			$pdf->Cell(13,5,$day_end,0,1,'C'); 
			$pdf->SetY(157.6);   
			$pdf->SetX(68.6);   
			$pdf->Cell(13,5,$month_end,0,1,'C'); 
			$pdf->SetY(157.6);   
			$pdf->SetX(83.6);   
			$pdf->Cell(13,5,$year_end,0,1,'C'); 
			
			
			$pdf->SetY(163.6);   
			$pdf->SetX(38.6);   
			$pdf->Cell(13,5,$time_leave,0,1,'C'); 
			$pdf->SetY(163.6);   
			$pdf->SetX(53.6);   
			$pdf->Cell(13,5,$day_leave,0,1,'C'); 
			$pdf->SetY(163.6);   
			$pdf->SetX(68.6);   
			$pdf->Cell(13,5,$month_leave,0,1,'C'); 
			$pdf->SetY(163.6);   
			$pdf->SetX(83.6);   
			$pdf->Cell(13,5,$year_leave,0,1,'C'); 
			
			
			$pdf->SetY(169.6);   
			$pdf->SetX(38.6);   
			$pdf->Cell(13,5,$time_waiting,0,1,'C'); 
			
			$i = 0;
			foreach($lines as $r) { 	
				$pdf->Text(103.5,144+($i*6),$r);
				
				$i++;
			}
			
			$pdf->Text(23.5,193, json_decode($res->action_taken, true)['action']['form2']['ln_voltage']);
			$pdf->Text(23.5,197.6, json_decode($res->action_taken, true)['action']['form2']['lg_voltage']);
			$pdf->Text(23.5,202, json_decode($res->action_taken, true)['action']['form2']['ng_voltage']);
			
			$ups = (json_decode($res->action_taken, true)['action']['form2']['ups']=="tidak") ? "tidak ada" : json_decode($res->action_taken, true)['action']['form2']['ups'];
			$stabillizer = (json_decode($res->action_taken, true)['action']['form2']['stabillizer']=="tidak") ? "tidak ada" : json_decode($res->action_taken, true)['action']['form2']['stabillizer'];
			
			$pdf->Text(23.5,206.6, $ups);
			$pdf->Text(23.5,211.4, $stabillizer);
			$pdf->Text(23.5,215.6, json_decode($res->action_taken, true)['action']['form2']['temp']);
			
			$i = 0;
			foreach($noted as $r) { 	
				$pdf->Text(23.5,220.5+($i*4.7),$r);
				
				$i++;
			}
			
			// CHECKLIST
			$pdf->SetFont('ZapfDingbats','', 8);
			$i = 0;
			foreach($data1 as $r) { 
				if($r['value']=="diag") {
					$pdf->Text(76,187.5+($i*3.55),"4");
				} else if($r['value']=="align") {
					$pdf->Text(82.4,187.5+($i*3.55),"4");
				} else if($r['value']=="replace") {
					$pdf->Text(90.8,187.5+($i*3.55),"4");
				}
				
				$i++;
			}
			
			$j = 50.7;
			$i = 0;
			foreach($data2 as $r) { 
				if($r['value']=="diag") {
					$pdf->Text(76+$j,187.5+($i*3.55),"4");
				} else if($r['value']=="align") {
					$pdf->Text(82.4+$j,187.5+($i*3.55),"4");
				} else if($r['value']=="replace") {
					$pdf->Text(90.8+$j,187.5+($i*3.55),"4");
				}
				
				$i++;
			}
			
			$j = 101.5;
			$i = 0;
			foreach($data3 as $r) { 
				if($r['value']=="diag") {
					$pdf->Text(76+$j,187.5+($i*3.55),"4");
				} else if($r['value']=="align") {
					$pdf->Text(82.4+$j,187.5+($i*3.55),"4");
				} else if($r['value']=="replace") {
					$pdf->Text(90.8+$j,187.5+($i*3.55),"4");
				}
				
				$i++;
			}
			
			$pdf->SetFont('ZapfDingbats','', 12);
			if($status_ticket=="done") {
				$pdf->Text(101.5,224,"4");
			} else if($status_ticket=="pending") {
				$pdf->Text(152,224,"4");
			}
			
			$pdf->Output();
		}
	}