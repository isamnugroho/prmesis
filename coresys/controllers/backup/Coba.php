<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class Coba extends MY_Controller {

	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
    }

	
	public function index()
	{
		return view('coba2', $this->data);
	}
	
	public function submit() {
		sleep(30);

		echo "AAA";
	}
	
	public function proses_sync() {
		$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
		$rows = isset($_GET['rows']) ? intval($_GET['rows']) : 10;
		$offset = ($page)*$rows;
		
		// $totalpages = ceil($this->count_rows() / $rows);
		$totalpages = 2;
		
		// echo $totalpages." ".($page-1);
		
		if($totalpages==($page)) {
			echo json_encode(array("result"=>"success", "page"=>"done"));
		} else {
			// 10000000
			$page = $page + 1;
			for($i=0; $i<=100000000; $i++) {
				// echo $i;
				if($i==100000000) {
					echo json_encode(array("result"=>"success", "total"=>($totalpages), "page"=>($page), "offset"=>($offset)));
				}
			}
			
			// if($this->sync_jurnal($offset, $rows)=="done") {
				// echo json_encode(array("result"=>"success", "total"=>($totalpages), "page"=>($page-1), "tes"=>($offset)." ".$rows." ".($page-1)." ".$this->count_rows()));
			// }
		}
	}
	
	public function tesxx() {
		$reader 		= IOFactory::createReader('Xlsx');
		$spreadsheet 	= $reader->load('Rekap OT CRM BRI.xlsx');
		$sheet_data 	= $spreadsheet->getActiveSheet()->toArray();
		echo "<pre>";
		
		$page = 1;
		$rows = 10;
		$from = ($page-1)*$rows;
		$to = ($page)*$rows;
		
		echo $page.' '.$from.' '.$to;
		
		$list 			= [];
		$index = 3;
		$from = $from + $index;
		$to = $to + $index;
		foreach($sheet_data as $key => $val) {
			if($key > $from && $key <= $to) {
				print_r($val);
			}
		}
	}
	
	public function count_tesxx() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		header('Content-Type: text/plain');
		
		$reader 		= IOFactory::createReader('Xlsx');
		$spreadsheet 	= $reader->load('Rekap OT CRM BRI.xlsx');
		$sheet_data 	= $spreadsheet->getActiveSheet()->toArray();
		// echo "<pre>";
		
		$page = 1;
		$rows = 10;
		$from = ($page-1)*$rows;
		$to = ($page)*$rows;
		
		// echo $page.' '.$from.' '.$to;
		
		$list 			= [];
		$index = 3;
		$from = $from + $index;
		$to = $to + $index;
					
		// $this->check_next(32);
		// $this->check_next(34);
		
		$i = 0;
		foreach($sheet_data as $key => $val) {
			if($key > $index) {
			// if($key > $index && $key <=40) {
			// if($key == 31) {
				$var = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', preg_replace('/\s+/', '', $val[1]));
				if(isset($var) === true && $var !== '') {
					// print_r(checkMergedCell($sheet_data, "A28"));
					// print_r($val);
					// echo $var."<br>";
					
					// $list[$i]['ticket_dn'] 				= preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', preg_replace('/\s+/', '', $val[1]));
					// $list[$i]['problem_description'] 	= $val[2];
					// $list[$i]['tgl_problem'] 			= $val[3];
					// $list[$i]['entry_date'] 			= $val[4]." ".$val[5];
					// $list[$i]['remark'] 				= $val[6];
					// $list[$i]['reported_problem'] 		= $val[7];
					// $list[$i]['date'] 					= $val[8];
					
					// 21 : Problem Received		
					// 24 : Appointment Time				
					// 27 : Departured Time		
					// 30 : Arrival At Location			
					// 33 : Work Start		
					// 36 : Work Finish		
					// 39 : Arrival at Office	
		
					
					// // $list[$i]['id']						= "";
					// $list[$i]['ticket_id']				= preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', preg_replace('/\s+/', '', $val[1]));
					// // $list[$i]['bank_id']				= "";
					// // $list[$i]['atm_id']					= "";
					// // $list[$i]['failure_count']			= "";
					// $list[$i]['service_type']			= $val[19];
					// $list[$i]['problem_type']			= $val[20];
					// $list[$i]['reported_problem']		= $val[7];
					// $list[$i]['reported_by']			= $val[10];
					// // $list[$i]['email_pic']				= "";
					// // $list[$i]['phone_pic']				= "";
					// // $list[$i]['method_by_email']		= "";
					// // $list[$i]['method_by_phone']		= "";
					// $list[$i]['entry_date']				= $val[4]." ".$val[5];
					// $list[$i]['email_date']				= "";
					// $list[$i]['late_input']				= "";
					// $list[$i]['accept_time']			= "";
					// $list[$i]['arrival_time']			= $val[30]." ".$val[31];
					// $list[$i]['waiting_time']			= "";
					// $list[$i]['start_job']				= $val[33]." ".$val[34];
					// $list[$i]['end_job']				= $val[36]." ".$val[37];
					// $list[$i]['leave_time']				= "";
					// $list[$i]['pic']					= "";
					// $list[$i]['status']					= $val[62];
					// $list[$i]['images1']				= "";
					// $list[$i]['images2']				= "";
					// $list[$i]['images3']				= "";
					// $list[$i]['images4']				= "";
					// $list[$i]['images5']				= "";
					// $list[$i]['action_taken']			= $val[72];
					// $list[$i]['remark']					= $val[6];
					// $list[$i]['replacement_part']		= "";
					// $list[$i]['replacement_consume']	= "";
					// $list[$i]['foto_jobcard']			= "";
					// $list[$i]['updated'] 				= "";
					// $list[$i]['sync']					= "";
					// $list[$i]['solved_by'] 				= "";
					// $list[$i]['created_by']				= "";
					// $list[$i]['last_update']			= "";
					
					
					// echo $key." ".$val[0]." ".$val[1]."\n";
					// $this->check_next($key);
					// $this->check_next($key);
					// print_r($this->check_next(34));
					
					// $this->check_next($spreadsheet, ($key+1));
					
					
					// $list[$i]['no'] 					= $val[0];
					$list[$i]['ticket_id'] 				= '';
					$list[$i]['ticket_dn'] 				= $val[1];
					$list[$i]['machine_id']				= '';
					$list[$i]['problem_description']	= $val[2];
					$list[$i]['problem_date']			= $val[3];
					$list[$i]['req_ticket_time']		= $val[4].' '.$val[5];
					$list[$i]['remark_ticket']			= $val[6];
					$list[$i]['reported_problem']		= $val[7];
					$list[$i]['activity_date']			= $val[8];
					$list[$i]['chargeable']				= $val[9];
					$list[$i]['reported_by']			= $val[10];
					$list[$i]['tid']					= $val[17];
					$list[$i]['activity'] 				= $val[19];
					$list[$i]['problem_type']			= $val[20];
					$problem_received['date'] = $val[21];
					$problem_received['time'] = $val[22];
					$problem_received['zone'] = $val[23];
					$list[$i]['problem_received']		= json_encode($problem_received);
					$appointment_time['date'] = $val[24];
					$appointment_time['time'] = $val[25];
					$appointment_time['zone'] = $val[26];
					$list[$i]['appointment_time']		= json_encode($appointment_time);
					$departure_time['date'] = $val[27];
					$departure_time['time'] = $val[28];
					$departure_time['zone'] = $val[29];
					$list[$i]['departure_time']			= json_encode($departure_time);
					$arrival_time['date'] = $val[30];
					$arrival_time['time'] = $val[31];
					$arrival_time['zone'] = $val[32];
					$list[$i]['arrival_time']			= json_encode($arrival_time);
					$work_start['date'] = $val[33];
					$work_start['time'] = $val[34];
					$work_start['zone'] = $val[35];
					$list[$i]['work_start']				= json_encode($work_start);
					$work_finish['date'] = $val[36];
					$work_finish['time'] = $val[37];
					$work_finish['zone'] = $val[38];
					$list[$i]['work_finish']			= json_encode($work_finish);
					$arrival_office['date'] = $val[39];
					$arrival_office['time'] = $val[40];
					$arrival_office['zone'] = $val[41];
					$list[$i]['arrival_office']			= json_encode($arrival_office);
					$environtment['voltage'] = $val[43];
					$environtment['grouding'] = $val[44];
					$environtment['temperature'] = $val[45];
					$environtment['ups'] = $val[46];
					$environtment['ac'] = $val[47];
					$environtment['it_tranformer'] = $val[48];
					$environtment['device_ups']['sn'] = $val[49];
					$environtment['device_ups']['merk'] = $val[50];
					$environtment['device_cctv']['status'] = $val[51];
					$environtment['device_cctv']['merk'] = $val[52];
					$environtment['waiting']['customer_time'] = $val[53].' '.$val[54].' '.$val[55];
					$environtment['waiting']['communication_time'] = $val[56].' '.$val[57].' '.$val[58];
					$environtment['waiting']['sparepart_time'] = $val[59].' '.$val[60].' '.$val[61];
					$list[$i]['environtment']			= json_encode($environtment);
					$list[$i]['ticket_status']			= $val[62];
					$device_function['capture_camera'] = $val[63];
					$device_function['askim'] = $val[64];
					$device_function['anti_fraud'] = $val[65];
					$device_function['pin_cover'] = $val[66];
					$list[$i]['device_function']		= json_encode($device_function);
					
					// $replace_part[0]['part_name'] = $val[67];
					// $replace_part[0]['detail']['remove']['part_number'] = $val[68];
					// $replace_part[0]['detail']['remove']['serial_number'] = $val[69];
					// $replace_part[0]['detail']['replace']['part_number'] = $val[70];
					// $replace_part[0]['detail']['replace']['serial_number'] = $val[71];
					// $replace_part[1]['part_name'] = $val[67];
					// $replace_part[1]['detail']['remove']['part_number'] = $val[68];
					// $replace_part[1]['detail']['remove']['serial_number'] = $val[69];
					// $replace_part[1]['detail']['replace']['part_number'] = $val[70];
					// $replace_part[1]['detail']['replace']['serial_number'] = $val[71];
					
					
					// if($this->tesSs($spreadsheet, ($key+1))>1) {
						// for($i=0; $i<$this->tesSs($spreadsheet, ($key+1)); $i++) {
							// $replace_part[$i]['part_name'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 68, ($key+1)+$i )->getValue();
							// $replace_part[$i]['detail']['remove']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 69, ($key+1)+$i )->getValue();
							// $replace_part[$i]['detail']['remove']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 70, ($key+1)+$i )->getValue();
							// $replace_part[$i]['detail']['replace']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 71, ($key+1)+$i )->getValue();
							// $replace_part[$i]['detail']['replace']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 72, ($key+1)+$i )->getValue();
						// }
					// }
					
					$replace_part = array();
					$replace_part_num = 0;
					$var2 = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', preg_replace('/\s+/', '', $val[68]));
					if(isset($var2) === true && $var2 !== '' && $var2 !== '-') {
						$replace_part_num = $replace_part_num + 1;
						if($this->tesSs($spreadsheet, ($key+1))>1) {
							$replace_part_num = $replace_part_num + 1;
						}
						
						if($replace_part_num==1) { 
							$replace_part[0]['part_name'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 68, ($key+1) )->getValue();
							$replace_part[0]['detail']['remove']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 69, ($key+1) )->getValue();
							$replace_part[0]['detail']['remove']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 70, ($key+1) )->getValue();
							$replace_part[0]['detail']['replace']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 71, ($key+1) )->getValue();
							$replace_part[0]['detail']['replace']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 72, ($key+1) )->getValue();
						} else if($replace_part_num==2) { 
							$replace_part[0]['part_name'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 68, ($key+1) )->getValue();
							$replace_part[0]['detail']['remove']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 69, ($key+1) )->getValue();
							$replace_part[0]['detail']['remove']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 70, ($key+1) )->getValue();
							$replace_part[0]['detail']['replace']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 71, ($key+1) )->getValue();
							$replace_part[0]['detail']['replace']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 72, ($key+1) )->getValue();
							
							$replace_part[1]['part_name'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 68, ($key+2) )->getValue();
							$replace_part[1]['detail']['remove']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 69, ($key+2) )->getValue();
							$replace_part[1]['detail']['remove']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 70, ($key+2) )->getValue();
							$replace_part[1]['detail']['replace']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 71, ($key+2) )->getValue();
							$replace_part[1]['detail']['replace']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 72, ($key+2) )->getValue();
						} else if($replace_part_num==3) { 
							$replace_part[0]['part_name'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 68, ($key+1) )->getValue();
							$replace_part[0]['detail']['remove']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 69, ($key+1) )->getValue();
							$replace_part[0]['detail']['remove']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 70, ($key+1) )->getValue();
							$replace_part[0]['detail']['replace']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 71, ($key+1) )->getValue();
							$replace_part[0]['detail']['replace']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 72, ($key+1) )->getValue();
							
							$replace_part[1]['part_name'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 68, ($key+2) )->getValue();
							$replace_part[1]['detail']['remove']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 69, ($key+2) )->getValue();
							$replace_part[1]['detail']['remove']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 70, ($key+2) )->getValue();
							$replace_part[1]['detail']['replace']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 71, ($key+2) )->getValue();
							$replace_part[1]['detail']['replace']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 72, ($key+2) )->getValue();
							
							$replace_part[2]['part_name'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 68, ($key+3) )->getValue();
							$replace_part[2]['detail']['remove']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 69, ($key+3) )->getValue();
							$replace_part[2]['detail']['remove']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 70, ($key+3) )->getValue();
							$replace_part[2]['detail']['replace']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 71, ($key+3) )->getValue();
							$replace_part[2]['detail']['replace']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 72, ($key+3) )->getValue();
						} else if($replace_part_num==4) { 
							$replace_part[0]['part_name'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 68, ($key+1) )->getValue();
							$replace_part[0]['detail']['remove']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 69, ($key+1) )->getValue();
							$replace_part[0]['detail']['remove']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 70, ($key+1) )->getValue();
							$replace_part[0]['detail']['replace']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 71, ($key+1) )->getValue();
							$replace_part[0]['detail']['replace']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 72, ($key+1) )->getValue();
							
							$replace_part[1]['part_name'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 68, ($key+2) )->getValue();
							$replace_part[1]['detail']['remove']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 69, ($key+2) )->getValue();
							$replace_part[1]['detail']['remove']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 70, ($key+2) )->getValue();
							$replace_part[1]['detail']['replace']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 71, ($key+2) )->getValue();
							$replace_part[1]['detail']['replace']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 72, ($key+2) )->getValue();
							
							$replace_part[2]['part_name'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 68, ($key+3) )->getValue();
							$replace_part[2]['detail']['remove']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 69, ($key+3) )->getValue();
							$replace_part[2]['detail']['remove']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 70, ($key+3) )->getValue();
							$replace_part[2]['detail']['replace']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 71, ($key+3) )->getValue();
							$replace_part[2]['detail']['replace']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 72, ($key+3) )->getValue();
							
							$replace_part[3]['part_name'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 68, ($key+4) )->getValue();
							$replace_part[3]['detail']['remove']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 69, ($key+4) )->getValue();
							$replace_part[3]['detail']['remove']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 70, ($key+4) )->getValue();
							$replace_part[3]['detail']['replace']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 71, ($key+4) )->getValue();
							$replace_part[3]['detail']['replace']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 72, ($key+4) )->getValue();
						} else if($replace_part_num==5) { 
							$replace_part[0]['part_name'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 68, ($key+1) )->getValue();
							$replace_part[0]['detail']['remove']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 69, ($key+1) )->getValue();
							$replace_part[0]['detail']['remove']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 70, ($key+1) )->getValue();
							$replace_part[0]['detail']['replace']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 71, ($key+1) )->getValue();
							$replace_part[0]['detail']['replace']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 72, ($key+1) )->getValue();
							
							$replace_part[1]['part_name'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 68, ($key+2) )->getValue();
							$replace_part[1]['detail']['remove']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 69, ($key+2) )->getValue();
							$replace_part[1]['detail']['remove']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 70, ($key+2) )->getValue();
							$replace_part[1]['detail']['replace']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 71, ($key+2) )->getValue();
							$replace_part[1]['detail']['replace']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 72, ($key+2) )->getValue();
							
							$replace_part[2]['part_name'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 68, ($key+3) )->getValue();
							$replace_part[2]['detail']['remove']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 69, ($key+3) )->getValue();
							$replace_part[2]['detail']['remove']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 70, ($key+3) )->getValue();
							$replace_part[2]['detail']['replace']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 71, ($key+3) )->getValue();
							$replace_part[2]['detail']['replace']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 72, ($key+3) )->getValue();
							
							$replace_part[3]['part_name'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 68, ($key+4) )->getValue();
							$replace_part[3]['detail']['remove']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 69, ($key+4) )->getValue();
							$replace_part[3]['detail']['remove']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 70, ($key+4) )->getValue();
							$replace_part[3]['detail']['replace']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 71, ($key+4) )->getValue();
							$replace_part[3]['detail']['replace']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 72, ($key+4) )->getValue();
							
							$replace_part[4]['part_name'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 68, ($key+5) )->getValue();
							$replace_part[4]['detail']['remove']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 69, ($key+5) )->getValue();
							$replace_part[4]['detail']['remove']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 70, ($key+5) )->getValue();
							$replace_part[4]['detail']['replace']['part_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 71, ($key+5) )->getValue();
							$replace_part[4]['detail']['replace']['serial_number'] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow( 72, ($key+5) )->getValue();
						}
					}
					
					
					
					// $list[$i]['var2'] 					= $var2;
					// $list[$i]['key'] 					= ($key+1);
					// $list[$i]['ticket_dn'] 				= $val[0];
					// $list[$i]['replace_part_num']			= $replace_part_num;
					$list[$i]['replace_part']			= (count($replace_part)==0 ? "" : json_encode($replace_part));
					$list[$i]['action_text']			= $val[72];
					$list[$i]['engineer'] 				= $val[73];
					$list[$i]['phone_engineer']			= $val[74];
					$list[$i]['contact_pic']			= $val[75];
					$list[$i]['phone_pic'] 				= $val[76];
					$list[$i]['foto_lengkap']			= $val[77];
					$list[$i]['link_foto_lengkap']		= $val[78];

				
					$i++;
				}
			}
		}
		
		// echo count($list);
		
		print_r($list);
		
		// $this->db->replace('master_ticket_new', $list);
		
		$this->db->insert_batch('master_ticket_new', $list); 
		
		// echo $this->check_next($spreadsheet, 33);
		// echo $this->tesSs($spreadsheet, 32)."\n";
		// echo $this->tesSs($spreadsheet, 35)."\n";
		// echo $this->checkS($spreadsheet, 32)."\n";;
		
		// if($this->checkS($spreadsheet, 32)=='notmerged') {
			// echo "AAAA\n";
		// } else {
			// echo "VVVV\n";
		// }
		// echo $this->check_next($spreadsheet, 35);
		// echo $this->check_next($spreadsheet, 37);
		
		
	}
	
	var $nos = 0;
	public function tesSs($spreadsheet, $key=1, $no=0) {
		// echo "AAA";
		// if($no<=10) {
			// echo $no;
			// $no++;
			// $this->tesSs($no);
		// }
		$no = $no+1;
		if($this->checkS($spreadsheet, $key+1)=='notmerged') {
			$this->nos = $no;
			return $this->nos;
		} else {
			// $this->nos = $no;
			// echo $key;
			return $this->tesSs($spreadsheet, $key+1, $no);
		}
	}
	
	public function checkS($spreadsheet, $key) {
		$col = 1; 
		$row = $key;
		if (!$spreadsheet->getActiveSheet()->getCellByColumnAndRow( $col, $row )->isInMergeRange() ||
				$spreadsheet->getActiveSheet()->getCellByColumnAndRow( $col, $row )->isMergeRangeValueCell()) {
				return 'notmerged';
		} else {
			return 'merged';
		}
	}

	var $no = 0;
	var $master = '';
	public function check_next($spreadsheet, $key, $no=1) {
		// $this->no = $this->no + 1;
		$no = $no + 1;
		// print_r($key);
		if($this->master=='') {
			$this->master = $key;
		}
		// $reader 		= IOFactory::createReader('Xlsx');
		// $spreadsheet 	= $reader->load('Rekap OT CRM BRI.xlsx');
		$col = 1; 
		$row = $key+1;
		// echo $row;
		// if($no!==0) {
			if (!$spreadsheet->getActiveSheet()->getCellByColumnAndRow( $col, $row )->isInMergeRange() ||
				$spreadsheet->getActiveSheet()->getCellByColumnAndRow( $col, $row )->isMergeRangeValueCell()) {
				
				echo "\t".$this->master."\n";
				$this->master = '';
			} else {
				// merged row
				$this->check_next($spreadsheet, $row+1, $no);
				
				echo "\t".$row."\n";
				
				return $no;
			}
		// }
	}
	
	public function tes_table() {
		// $query = "SELECT * FROM flm_master_ticket";	
		
		// $result = $this->db->query($query);
		
		// print_r($result->getFieldNames());
		
		$fields = $this->db->list_fields('flm_master_ticket');

		foreach ($fields as $field) {
			echo $field."<br>";
		}
		
		// $query = $this->db->query('SELECT * FROM flm_master_ticket');

		// foreach ($query->getFieldNames() as $field) {
			// echo $field;
		// }
		
		// $query  = $db->query("SELECT * FROM flm_master_ticket");
		// $fields = $query->fieldData();
		// print_r($fields);
	}
	
	public function tes() {
		$reader = IOFactory::createReader('Xlsx');
		$spreadsheet = $reader->load('FIELD_ENGINEER_REPORT.xlsx');
		
		$spreadsheet->getActiveSheet()->setCellValue('A1', 'REPORT MAINTENANCE');
		$spreadsheet->getActiveSheet()->setCellValue('A2', 'SLA REPORT');
		
		$filename = 'report_technical_'.date("Y_m_d");
		$this->output_pdf($filename, $spreadsheet);
	}
	
	public function output_xlsx($filename, $spreadsheet) {
		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		
		exit;
	}
	
	public function output_pdf($filename, $spreadsheet) {
		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/pdf');
		header('Content-Disposition: attachment;filename="'. $filename .'.pdf"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = new \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf($spreadsheet);
		// $writer = new \PhpOffice\PhpSpreadsheet\Writer\Pdf\Tcpdf($spreadsheet);
		// $writer = new \PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf($spreadsheet);
		$writer->save('php://output');
		
		exit;
	}
	
	public function check() {
		$user_adm = "administrator";
		$key = "isn";
		$pass_adm = "@admin123";
		
		if (password_verify($user_adm, "$2y$12$4EVSg4ZD6vnVv4sD9COi8.mxzGWNQ07di1QaGZbYSkPI.3jfx9iXu")) {
			echo "~~~ADMIN MODE~~~\n";
			if (password_verify($key, "$2y$12$9SgTlB.sgn7MvBaivjiz..tTam4etMXGuj8J.VH3oEcC.8Ajvm.Fa")) {
				echo "~~~KEY VALID~~~\n";
				// if ($num_rows > 0) {
					$hash = '$2y$12$3OI3Y0F0ifC8MiJvGxlQ0.5Izl4mQNE/DxSzJ46x7i8DZya/MEc2G';
					if (password_verify($pass_adm, $hash)) {
						echo "~~~PASSWORD VALID~~~\n";
					} else {
						echo "!!!PASSWORD INVALID!!!\n";
					}
				// }
			} else {
				echo "!!!KEY INVALID!!!\n";
			}
		} else {
			echo "!!!ACCESS INVALID!!!\n";
		}
	}
	
	
	public function tesx()
	{
		$query = "SELECT * FROM master_user LEFT JOIN master_staff ON(master_staff.nik=master_user.username) WHERE master_user.token IS NOT NULL";
		$result = $this->db->query($query)->result();
		
		echo "<h1>NOTIF</h1>";
		echo "<form method='post' action='".base_url()."coba/notif'>";
		echo "<select name='token'>";
		foreach($result as $r) {
			if($r->token!=="mozilla/5.0 (windows nt 10.0; win64; x64; rv:71.0) gecko/20100101 firefox/71.0") {
				echo "<option value='$r->token'>$r->nama</option>";
			}
		}
		echo "</select>";
		echo "<input type='submit' value='SUBMIT'></input>";
		echo "</form>";
		
		
		echo "<h1>CMD</h1>";
		echo "<form method='post' action='".base_url()."coba/cmd'>";
		echo "<select name='token'>";
		foreach($result as $r) {
			if($r->token!=="mozilla/5.0 (windows nt 10.0; win64; x64; rv:71.0) gecko/20100101 firefox/71.0") {
				echo "<option value='$r->token'>$r->nama</option>";
			}
		}
		echo "</select>";
		echo "<input type='submit' value='SUBMIT'></input>";
		echo "</form>";
		
		echo "<h1>LOCATION</h1>";
		echo "<form method='post' action='".base_url()."coba/location'>";
		echo "<select name='token'>";
		foreach($result as $r) {
			if($r->token!=="mozilla/5.0 (windows nt 10.0; win64; x64; rv:71.0) gecko/20100101 firefox/71.0") {
				echo "<option value='$r->token'>$r->nama</option>";
			}
		}
		echo "</select>";
		echo "<input type='submit' value='SUBMIT'></input>";
		echo "</form>";
		// print_r($_REQUEST);
		
		echo "<h1>IMPL</h1>";
		echo "<form method='post' action='".base_url()."coba/impl'>";
		echo "<select name='impl'>";
		echo "<option value='get_current_location'>get_current_location</option>";
		echo "<option value='get_version'>get_version</option>";
		echo "</select>";
		echo "<select name='token'>";
		foreach($result as $r) {
			if($r->token!=="mozilla/5.0 (windows nt 10.0; win64; x64; rv:71.0) gecko/20100101 firefox/71.0") {
				echo "<option value='$r->token'>$r->nama</option>";
			}
		}
		echo "</select>";
		echo "<input type='submit' value='SUBMIT'></input>";
		echo "</form>";
	}
	
	public function notif() {
		$msg = $this->msg('flm');
		$data['to'] = $_REQUEST['token'];
		$data['title'] = $msg['title'];
		$data['body'] = $msg['body'];
		$data['status'] = $msg['status'];
		
		$res = $this->push($data); 
		
		echo $res;
	}
	
	public function impl() {
		$data['to'] = $_REQUEST['token'];
		$impl = $_REQUEST['impl'];
		
		// refresh, get_current_location
		$data['command'] = "open:lib:$impl";
		
		$res = $this->push_cmd($data); 
	}
	
	public function cmd() {
		$data['to'] = $_REQUEST['token'];
		
		// refresh, get_current_location
		$data['command'] = "open:lib:refresh";
		
		$res = $this->push_cmd($data); 
	}
	
	public function location() {
		$data['to'] = $_REQUEST['token'];
		
		// refresh, get_current_location
		$data['command'] = "open:lib:tracking";
		
		$res = $this->push_cmd($data); 
	}
	
	public function notif2() {
		$msg = $this->msg('flm');
		$data['to'] = "fdM5pvlEzE2jGl1E8nBTQe:APA91bHiVCr-EQ7EhE8kvTJmbp7iQo_eCaLsf9o2qCQuZxSAAY2DYdMGX2nRFpUP6lvatK9nSD0sawsBMdUB9klGdQJWpfQ7XjvvYLmy7IsvmVKjJWxNfwrwe_d6sBFmb8pzVSzWstcv";
		$data['title'] = $msg['title'];
		$data['body'] = $msg['body'];
		$data['status'] = $msg['status'];
		
		$res = $this->push2($data); 
		
		echo $res;
	}
	
	public function msg($krit='') {
		$arr = array(
			"cashout" => array(
				"title" => "Prioritas Replenishment",
				"body" => "Prioritas pengisian/replenishment telah dialihkan pada lokasi yang lain, silahkan cek kembali aplikasi anda",
				"status" => "priority"
			),
			"flm" => array(
				"title" => "Request Job",
				"body" => "Request maintenance segera melakukan perbaikan mesin ATM, silahkan cek kembali aplikasi anda",
				"status" => "normal"
			),
			"op" => array(
				"title" => "Request Job",
				"body" => "Request pengisian/replenishment, silahkan cek kembali aplikasi anda",
				"status" => "normal"
			)
		);
		
		return $arr[$krit];
	}
	
	function push($data) {
		define('AUTHORIZATION_KEY', 'AAAAnvWH4cE:APA91bGNmkgFTw4gn0l7DFah6bPVdoY_SiWO-vxEgZpBAkNQATQif_HcW4bFtFW6Q2hLDFVFaxl3lGar-DDfzbgDGwPvj0h_lDAw90NOa75TbN2k_ZuX3YMNoY13eAlTYisR29F6Keo7');

		// print_r($data);
		$to = $data['to'];
		
		$title = $data['title'];
		$body = $data['body'];
		
		$type = ($data['status']=="priority") ? "priority" : "alarm2";
		$channel = ($data['status']=="priority") ? "my_channel_id1" : "alarm2";
		
		$fields = array(
			'to' => $to,
			'data' => array(
				"notification_foreground"=> "true",
				"notification_android_channel_id"=> $channel,
				"notification_android_priority"=> "2",
				"notification_android_visibility"=> "1",
				"notification_android_color"=> "#ff0000",
				"notification_android_smallIcon"=> "thumbs_up",
				"notification_android_icon"=> "thumbs_up",
				"notification_android_sound"=> $type,
				"notification_android_vibrate"=> "500, 200, 500",
				"notification_android_lights"=> "#ffff0000, 250, 250",
			),
			'notification' => array(
				"body" => $body,
				"title"=> $title,
			)
		);
		
		$headers = array(
			'Authorization:key='.AUTHORIZATION_KEY,
			'Content-Type:application/json'
		);
		
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt($ch,CURLOPT_POST, true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		curl_close($ch);
		$result = json_decode($result, true);
		
		echo "<pre>";
		print_r($fields);
		print_r($result);
	}
	
	function push_cmd($data) {
		define('AUTHORIZATION_KEY', 'AAAAnvWH4cE:APA91bGNmkgFTw4gn0l7DFah6bPVdoY_SiWO-vxEgZpBAkNQATQif_HcW4bFtFW6Q2hLDFVFaxl3lGar-DDfzbgDGwPvj0h_lDAw90NOa75TbN2k_ZuX3YMNoY13eAlTYisR29F6Keo7');

		// print_r($data);
		$to = trim($data['to']);
		
		$fields = array(
			'to' => $to,
			'data' => array(
				"command"=> $data['command']
			)
		);
		
		$headers = array(
			'Authorization:key='.AUTHORIZATION_KEY,
			'Content-Type:application/json'
		);
		
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt($ch,CURLOPT_POST, true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		curl_close($ch);
		$result = json_decode($result, true);
		
		// echo "<pre>";
		// // print_r($fields);
		// print_r($result);
		// echo "</pre>";
	}
	
	function push2($data) {
		define('AUTHORIZATION_KEY', 'AAAAnvWH4cE:APA91bGNmkgFTw4gn0l7DFah6bPVdoY_SiWO-vxEgZpBAkNQATQif_HcW4bFtFW6Q2hLDFVFaxl3lGar-DDfzbgDGwPvj0h_lDAw90NOa75TbN2k_ZuX3YMNoY13eAlTYisR29F6Keo7');

		// print_r($data);
		$to = $data['to'];
		
		$title = $data['title'];
		$body = $data['body'];
		
		$type = ($data['status']=="priority") ? "priority" : "alarm2";
		$channel = ($data['status']=="priority") ? "my_channel_id1" : "alarm2";
		
		$fields = array(
			'to' => $to,
			'data' => array(
				"body" => $body,
				"title"=> $title,
				"icon"=> "firebase/itwonders-web-logo.png"
			)
		);
		
		$headers = array(
			'Authorization:key='.AUTHORIZATION_KEY,
			'Content-Type:application/json'
		);
		
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt($ch,CURLOPT_POST, true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		curl_close($ch);
		$result = json_decode($result, true);
		
		echo "<pre>";
		print_r($fields);
		print_r($result);
	}
}
