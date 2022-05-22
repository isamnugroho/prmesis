<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class Report_maintenance extends MY_Controller {
	var $terpakai, $sisa, $kebutuhan, $kekurangan, $status;
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}

	public function index() {
		$this->db->select('*, master_location_detail.id as id_detail');
		$this->db->from('master_atm');
		$this->db->join('master_location_detail', 'master_atm.id=master_location_detail.id_atm');
		$query = $this->db->get();
		$result = $query->result();
		
		$this->data['data_atm'] = $result;
		
		return view('pages/report_maintenance/index', $this->data);
	}
	
	public function index2() {
		echo "<center><a href='".base_url()."report_maintenance/generate/output' target='_blank'>OUTPUT</a></center>";
		echo "<center><a href='".base_url()."report_maintenance/generate/preview' target='_blank'>PREVIEW</a></center>";
	}
	
	public function func() {
		$this->terpakai = function($kode_part) {
			$qty = $this->db->query("SELECT kode_part, SUM(quantity) as qty FROM master_transaction_out WHERE kode_part='$kode_part' GROUP BY kode_part");
			$num = $qty->num_rows();
			
			if($num>0) {
				$res = $qty->row()->qty;
				return $res;
			} else {
				return 0;
			}
		};
		
		$this->sisa = function($kode_part) {
			$stok = $this->db->query("SELECT kode_part, SUM(stock) as qty FROM master_inventory WHERE kode_part='$kode_part' GROUP BY kode_part");
			$stok_keluar = $this->db->query("SELECT kode_part, SUM(quantity) as qty FROM master_transaction_out WHERE kode_part='$kode_part' GROUP BY kode_part");
			$stok_masuk = $this->db->query("SELECT kode_part, SUM(quantity) as qty FROM master_transaction_in WHERE kode_part='$kode_part' GROUP BY kode_part");
			$num_stok = $stok->num_rows();
			$num_stok_keluar = $stok_keluar->num_rows();
			$num_stok_masuk = $stok_masuk->num_rows();
			
			if($num_stok>0) {
				if($num_stok_keluar>0) {
					if($num_stok_keluar>0)  {
						$res = ($stok->row()->qty + $stok_masuk->row()->qty) - $stok_keluar->row()->qty;	
					} else {
						$res = $stok->row()->qty - $stok_keluar->row()->qty;						
					}
				} else {
					$res = $stok->row()->qty;
				}
				return $res;
			} else {
				return 0;
			}
		};
		
		$this->kebutuhan = function($kode_part) {
			$qty = $this->db->query("SELECT kode_part, SUM(quantity) as qty FROM master_require_part WHERE kode_part='$kode_part' GROUP BY kode_part");
			$num = $qty->num_rows();
			
			if($num>0) {
				$res = $qty->row()->qty;
				return $res;
			} else {
				return 0;
			}
		};
		
		$this->kekurangan = function($sisa, $kebutuhan) {
			$res = $sisa-$kebutuhan;
			if($res==0) {
				$res = "-";
			} else if($res>0) {
				$res = "($res)";
			} else {
				$res = $res*-1;
			}
			return $res;
		};
		
		$this->status = function($sisa, $kebutuhan) {
			$res = $sisa-$kebutuhan;
			if($res==0) {
				$res = "LENGKAP";
			} else if($res>0) {
				$res = "LENGKAP";
			} else {
				$res = "TIDAK LENGKAP";
			}
			return $res;
		};
		
		return [
			"terpakai"=>$this->terpakai,
			"sisa"=>$this->sisa,
			"kebutuhan"=>$this->kebutuhan,
			"kekurangan"=>$this->kekurangan,
			"status"=>$this->status
		];
	}
	
	public function get_preview($data) {
		$func = $this->func();
		
		error_reporting(0);
		
		$htmlString = '
			<style>
				#table_bawah {
					width: 100%;
					margin-top: 20px;
					background-color: #ebebeb;
					font-size: 10px;
				}
				
				#table_bawah {
				  font-family: Arial, Helvetica, sans-serif;
				  border-collapse: collapse;
				  width: 100%;
				}

				#table_bawah th {
				  border: 1px solid #ddd;
				  padding: 8px;
				}

				#table_bawah td {
				  border: 1px solid #ddd;
				  padding: 5px;
				}

				#table_bawah tr:nth-child(even){background-color: #f2f2f2;}

				#table_bawah tr:hover {background-color: #ddd;}

				#table_bawah th {
				  padding-top: 12px;
				  padding-bottom: 12px;
				  text-align: center;
				  background-color: #4CAF50;
				  color: white;
				}
			</style>
			<h2 style="float: left">SUMMARY MAINTENANCE</h2>
		';
		
		// $htmlButton = '
			// <br><button style=" border-radius: 5px; float: right; margin-left: 2px" type="button" onclick="preview_report2(\''.$_REQUEST['bulan'].'\')" class="btn btn-info"><img style="float: left; margin: 0px 5px 0px 0px;" src="'.base_url().'seipkon/assets/img/xls.png" height="25" width="25" /><b style="color:white;font-size:16px; margin: 0px 0px 0px 0px;">Export To XLS</b></button>
			// <button style=" border-radius: 5px; float: right" type="button" onclick="preview_report(\''.$_REQUEST['bulan'].'\')" class="btn btn-info"><img style="float: left; margin: 0px 5px 0px 0px;" src="'.base_url().'seipkon/assets/img/pdf.png" height="25" width="25" /><b style="color:white;font-size:16px; margin: 0px 0px 0px 0px;">Export To PDF</b></button><br><br>
		// ';
		
		$htmlButton = '
			<br><button style=" border-radius: 5px; float: right; margin-left: 2px" type="button" onclick="preview_report2(\''.$_REQUEST['bulan'].'\')" class="btn btn-info"><img style="float: left; margin: 0px 5px 0px 0px;" src="'.base_url().'seipkon/assets/img/xls.png" height="25" width="25" /><b style="color:white;font-size:16px; margin: 0px 0px 0px 0px;">Export To XLS</b></button><br><br>
		';
		
		$htmlString .= '<div class="w3-responsive">'.$htmlButton;
		$htmlString .= '<table id="table_bawah" class="w3-table-all w3-card-4 w3-tiny">';
		$htmlString .= '<tr class="w3-light-green">';
		$htmlString .= '<th>No</th>';
		$htmlString .= '<th>ID</th>';
		// $htmlString .= '<th>Cabang</th>';
		// $htmlString .= '<th>Lokasi</th>';
		// $htmlString .= '<th>Bank</th>';
		$htmlString .= '<th>Cse</th>';
		$htmlString .= '<th>No. Ticket</th>';
		$htmlString .= '<th>Problem</th>';
		$htmlString .= '<th>Action Taken</th>';
		$htmlString .= '<th>Email Date / Time</th>';
		$htmlString .= '<th>Entry Date / Time</th>';
		$htmlString .= '<th>Accept Time</th>';
		$htmlString .= '<th>Arrival Date / Time</th>';
		$htmlString .= '<th>Start Date / Time</th>';
		$htmlString .= '<th>Close Date / Time</th>';
		$htmlString .= '<th style="background-color: #ebebeb; color: black">Response Time Duty</th>';
		$htmlString .= '<th style="background-color: #ebebeb; color: black">Response Time SLM</th>';
		$htmlString .= '<th style="background-color: #ebebeb; color: black">Repair Time</th>';
		$htmlString .= '<th style="background-color: #ebebeb; color: black">Resolution Time</th>';
		$htmlString .= '<th style="background-color: #ebebeb; color: black">DT (%) / Up Time</th>';
		$htmlString .= '</tr>';
		
		$atm = function($id, $field) {
			error_reporting(0);
			$atm = $this->db->query("SELECT $field FROM master_atm WHERE idatm='$id'")->row();
			$atm = (array) $atm;
			return $atm[$field];
		};
		
		$bank = function($id, $field) {
			error_reporting(0);
			$bank = $this->db->query("SELECT $field FROM master_client WHERE id='$id'")->row();
			$bank = (array) $bank;
			return $bank[$field];
		};
		
		$pic = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_staff WHERE id='$id'")->row()->nama;
			
			return $nama;
		};
		
		$no = 0;
		foreach($data as $r) {
			$no++;
			
			$rumus = ($this->dayNumber(date("Y-m-d", strtotime($r->arrival_date)))*24*60);
			$ttl_hari = $this->dayNumber(date("Y-m-d", strtotime($r->arrival_date)));
			$rumus = (24*60)*$ttl_hari;
			
			$response_duty = $this->rumus($r->email_date, $r->entry_date)['str'];
			$response_slm = $this->rumus($r->entry_date, $r->accept_time)['str'];
			$repair_time = $this->rumus($r->arrival_time, $r->end_job)['str'];
			$resolution_time = $this->to_hour((strtotime($response_slm) - strtotime('00:00:00')) + (strtotime($repair_time) - strtotime('00:00:00')));
			$down_time = $rumus - $this->to_minute($resolution_time);
			$down_time = round(($down_time/$rumus)*100, 2);
			$up_time = round(100-$down_time, 2);
			
			$action_taken = json_decode($r->action_taken, true)['action_taken'];
			
			$parsed = $this->count_string_between($action_taken, '__plugindomid', '">');
            $without_breaks = $action_taken;
        	for($i=0; $i<$parsed; $i++) {
        		$without_breaks = str_replace(array(
        			$this->get_string_between($without_breaks, '__plugindomid="', '"')
        		), '', $without_breaks);
        	}
			
			$without_breaks = str_replace(array('<ol>', '</ol>', ';'), '', $without_breaks);
			$without_breaks = str_replace(array('<li>'), '', $without_breaks);
			$without_breaks = str_replace(array('</li>'), '', $without_breaks);
			$without_breaks = str_replace(array('<div >', '<div  class="">'), ', ', $without_breaks);
			$without_breaks = str_replace(array('</div>'), ' ', $without_breaks);
			$without_breaks = str_replace(array('<br>', '<br >'), ' ', $without_breaks);
			$without_breaks = str_replace(array('&nbsp', '&amp'), ' ', $without_breaks);
			$without_breaks = preg_replace('/\s*,\s*/', ', ', $without_breaks);
			
			$r->action_taken = trim($without_breaks);
			$r->action_taken = wordwrap($without_breaks,150,"<br>\n");
			$r->action_taken = str_replace(",", ", ", $r->action_taken);
			
			$htmlString .= '<tr>';
			$htmlString .= '<td>'.$no.'</td>';
			$htmlString .= '<td>'.$atm($r->atm_id, 'idatm').'</td>';
			// $htmlString .= '<td>'.$atm($r->atm_id, 'cabang').'</td>';
			// $htmlString .= '<td>'.$atm($r->atm_id, 'lokasi').'</td>';
			// $htmlString .= '<td>'.$bank($atm($r->atm_id, 'id_bank'), 'nama').'</td>';
			$htmlString .= '<td>'.$pic($r->pic).'</td>';
			$htmlString .= '<td>'.$r->ticket_id.'</td>';
			$htmlString .= '<td>'.$r->problem_type.'</td>';
			$htmlString .= '<td>'.$r->action_taken.'</td>';
			$htmlString .= '<td>'.$r->email_date.'</td>';
			$htmlString .= '<td>'.$r->entry_date.'</td>';
			$htmlString .= '<td>'.$r->accept_time.'</td>';
			$htmlString .= '<td>'.$r->arrival_time.'</td>';
			$htmlString .= '<td>'.$r->start_job.'</td>';
			$htmlString .= '<td>'.$r->end_job.'</td>';
			$htmlString .= '<td>'.$response_duty.'</td>';
			$htmlString .= '<td>'.$response_slm.'</td>';
			$htmlString .= '<td>'.$repair_time.'</td>';
			$htmlString .= '<td>'.$resolution_time.'</td>';
			$htmlString .= '<td>'.$up_time.' / '.$down_time.'</td>';
			$htmlString .= '</tr>';
		}
		
		$htmlString .= '</table>';
		$htmlString .= '</div>';
		
		return $htmlString;
	}
	
	public function get_string_between($string, $start, $end){
		$string = ' ' . $string;
		$ini = strpos($string, $start);
		if ($ini == 0) return '';
		$ini += strlen($start);
		$len = strpos($string, $end, $ini) - $ini;
		return $start.substr($string, $ini, $len).$end;
	}
	
	public function count_string_between($string, $start, $end){
		$string = ' ' . $string;
		$ini = strpos($string, $start);
		if ($ini == 0) return '';
		$ini += strlen($start);
		$len = strpos($string, $end, $ini) - $ini;
		// return str_word_count($start.substr($string, $ini, $len).$end);
		return substr_count($string, $start);
	}
	
	function to_hour($totaltime) {
		$h = intval($totaltime / 3600);
	  
		$totaltime = $totaltime - ($h * 3600);
		  
		// Minutes is obtained by dividing
		// remaining total time with 60
		$m = intval($totaltime / 60);
		  
		// Remaining value is seconds
		$s = $totaltime - ($m * 60);
		
		// return "$h:$m:$s";
		return sprintf('%02d', $h).':'.sprintf('%02d', $m).':'.sprintf('%02d', $s);
	}
	
	function to_minute($time){
		$time = explode(':', $time);
		return ($time[0]*60) + ($time[1]) + ($time[2]/60);
	}
	
	function rumus($start_date, $end_date) {
		$diff1 = abs(strtotime($start_date) - strtotime($end_date)); 
		$years1 = floor($diff1 / (365*60*60*24)); 
		$months1 = floor(($diff1 - $years1 * 365*60*60*24) / (30*60*60*24)); 
		$days1 = floor(($diff1 - $years1 * 365*60*60*24 - $months1*30*60*60*24) / (60*60*24));
		$hours1 = floor(($diff1 - $years1 * 365*60*60*24 - $months1*30*60*60*24 - $days1*60*60*24) / (60*60));
		$minutes1 = floor(($diff1 - $years1 * 365*60*60*24 - $months1*30*60*60*24 - $days1*60*60*24 - $hours1*60*60)/ 60);
		$seconds1 = floor(($diff1 - $years1 * 365*60*60*24 - $months1*30*60*60*24 - $days1*60*60*24 - $hours1*60*60 - $minutes1*60)); 
		
		$resolution_time = "";
		if($years1>0) {
			$resolution_time = sprintf("%02d years, %02d months, %02d days, %02d:" . "%02d:%02d", $years1, $months1, $days1, $hours1, $minutes1, $seconds1);
		} else if($months1>0) {
			$resolution_time = sprintf("%02d months, %02d days, %02d:" . "%02d:%02d", $months1, $days1, $hours1, $minutes1, $seconds1);
		} else if($days1>0) {
			$resolution_time = sprintf("%02d day %02d:" . "%02d:%02d", $days1, $hours1, $minutes1, $seconds1);
			$number_time = sprintf("%02d:" . "%02d:%02d", ($days1*24)+$hours1, $minutes1, $seconds1);
		} else if($hours1>0) {
			$resolution_time = sprintf("%02d:%02d:%02d", $hours1, $minutes1, $seconds1);
			$number_time = sprintf("%02d:%02d:%02d", $hours1, $minutes1, $seconds1);
		} else {
			$resolution_time = sprintf("%02d:%02d:%02d", $hours1, $minutes1, $seconds1);
			$number_time = sprintf("%02d:%02d:%02d", $hours1, $minutes1, $seconds1);
		}
		
		return array("str"=>$resolution_time, "num"=>$number_time);
	}
	
	function diff($a1, $a2) {
        $awal  = date_create($a1);
        $akhir = date_create($a2); // waktu sekarang
        $diff  = date_diff($awal, $akhir);

        // return $diff;
        return sprintf('%02d', $diff->h).':'.sprintf('%02d', $diff->i).':'.sprintf('%02d', $diff->s);
    }
	
	public function dayNumber($date=''){
		if($date==''){
			$t=date('d-m-Y');
		} else {
			$t=date('d-m-Y',strtotime($date));
		}

		$dayMonth = strtolower(date("m",strtotime($t)));
		$dayYear = strtolower(date("Y",strtotime($t)));
		$return = cal_days_in_month(CAL_GREGORIAN, $dayMonth, $dayYear);
		return $return;
	}

    function hoursToMinutes($hours) { 
        $minutes = 0; 
        if (strpos($hours, ':') !== false) 
        { 
            // Split hours and minutes. 
            list($hours, $minutes) = explode(':', $hours); 
        } 
        return $hours * 60 + $minutes; 
    } 

    // Transform minutes like "105" into hours like "1:45". 
    function minutesToHours($minutes) { 
        $hours = (int)($minutes / 60); 
        $minutes -= $hours * 60; 
        return sprintf("%d:%02.0f", $hours, $minutes); 
    } 
	
	public function get_data_inv() {
		$result = $this->db->query("SELECT * FROM flm_master_ticket WHERE accept_time IS NOT NULL AND end_job IS NOT NULL");
		return $result->result();
	}
	
	public function generate($act) {
		// $func = $this->func();
		
		error_reporting(0);
		
		$atm = function($id, $field) {
			error_reporting(0);
			$atm = $this->db->query("SELECT $field FROM master_atm WHERE idatm='$id'")->row();
			$atm = (array) $atm;
			return $atm[$field];
		};
		
		$bank = function($id, $field) {
			error_reporting(0);
			$bank = $this->db->query("SELECT $field FROM master_client WHERE id='$id'")->row();
			$bank = (array) $bank;
			return $bank[$field];
		};
		
		$pic = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_staff WHERE id='$id'")->row()->nama;
			
			return $nama;
		};
		
		$reader = IOFactory::createReader('Xlsx');
		$spreadsheet = $reader->load('export_template.xlsx');
		
		$spreadsheet->getActiveSheet()->setCellValue('A1', 'REPORT MAINTENANCE');
		$spreadsheet->getActiveSheet()->setCellValue('A2', 'SLA REPORT');
		
		
		$result = $this->db->query("SELECT * FROM flm_master_ticket WHERE entry_date LIKE '".$_REQUEST['bulan']."%' AND accept_time IS NOT NULL AND end_job IS NOT NULL");
		
		$baseRow = 4;
		$i = 0;
		$row = 0;
		foreach($result->result() as $r) {
			$row = $baseRow + $i;
			$spreadsheet->getActiveSheet()->insertNewRowBefore($row+1, 1);
			$spreadsheet->getActiveSheet()->setCellValue('A'.$row,($i+1));
			
			$rumus = ($this->dayNumber(date("Y-m-d", strtotime($r->arrival_date)))*24*60);
			$ttl_hari = $this->dayNumber(date("Y-m-d", strtotime($r->arrival_date)));
			$rumus = (24*60)*$ttl_hari;
			
			$response_duty = $this->rumus($r->email_date, $r->entry_date)['str'];
			$response_slm = $this->rumus($r->entry_date, $r->accept_time)['str'];
			$repair_time = $this->rumus($r->arrival_time, $r->end_job)['str'];
			$resolution_time = $this->to_hour((strtotime($response_slm) - strtotime('00:00:00')) + (strtotime($repair_time) - strtotime('00:00:00')));
			$down_time = $rumus - $this->to_minute($resolution_time);
			$down_time = round(($down_time/$rumus)*100, 2);
			$up_time = round(100-$down_time, 2);
			
			$action_taken = json_decode($r->action_taken, true)['action_taken'];
            $without_breaks = $action_taken;
        	$without_breaks = str_replace(array(
    			$this->get_string_between($without_breaks, '__plugindomid="', '"')
    		), '', $without_breaks);
        	$without_breaks = str_replace(array(
    			$this->get_string_between($without_breaks, '__plugindomid="', '"')
    		), '', $without_breaks);
        	$without_breaks = str_replace(array(
    			$this->get_string_between($without_breaks, '__plugindomid="', '"')
    		), '', $without_breaks);
        	$without_breaks = str_replace(array(
    			$this->get_string_between($without_breaks, '__plugindomid="', '"')
    		), '', $without_breaks);
        	$without_breaks = str_replace(array(
    			$this->get_string_between($without_breaks, '__plugindomid="', '"')
    		), '', $without_breaks);
        	$without_breaks = str_replace(array(
    			$this->get_string_between($without_breaks, '__plugindomid="', '"')
    		), '', $without_breaks);
        	$without_breaks = str_replace(array(
    			$this->get_string_between($without_breaks, '__plugindomid="', '"')
    		), '', $without_breaks);
        	$without_breaks = str_replace(array(
    			$this->get_string_between($without_breaks, '__plugindomid="', '"')
    		), '', $without_breaks);
        	$without_breaks = str_replace(array(
    			$this->get_string_between($without_breaks, '__plugindomid="', '"')
    		), '', $without_breaks);
        	$without_breaks = str_replace(array(
    			$this->get_string_between($without_breaks, '__plugindomid="', '"')
    		), '', $without_breaks);
        	$without_breaks = str_replace(array(
    			$this->get_string_between($without_breaks, '__plugindomid="', '"')
    		), '', $without_breaks);
        	$without_breaks = str_replace(array(
    			$this->get_string_between($without_breaks, '__plugindomid="', '"')
    		), '', $without_breaks);
        	$without_breaks = str_replace(array(
    			$this->get_string_between($without_breaks, '__plugindomid="', '"')
    		), '', $without_breaks);
        	$without_breaks = str_replace(array(
    			$this->get_string_between($without_breaks, '__plugindomid="', '"')
    		), '', $without_breaks);
        	$without_breaks = str_replace(array(
    			$this->get_string_between($without_breaks, '__plugindomid="', '"')
    		), '', $without_breaks);
        	$without_breaks = str_replace(array(
    			$this->get_string_between($without_breaks, '__plugindomid="', '"')
    		), '', $without_breaks);
			
			$without_breaks = str_replace(array('<ol>', '</ol>', ';'), '', $without_breaks);
			$without_breaks = str_replace(array('<li>'), '', $without_breaks);
			$without_breaks = str_replace(array('</li>'), '', $without_breaks);
			$without_breaks = str_replace(array('<div >', '<div  class="">'), ', ', $without_breaks);
			$without_breaks = str_replace(array('</div>', '<li >', '<li class="">', '<li  class="">', '<li class="" >'), ' ', $without_breaks);
			$without_breaks = str_replace(array('<br>', '<br >'), ' ', $without_breaks);
			$without_breaks = str_replace(array('&nbsp', '&amp'), ' ', $without_breaks);
			$without_breaks = preg_replace('/\s*,\s*/', ', ', $without_breaks);
			
			$action_taken = $without_breaks;
// 			$action_taken = wordwrap($action_taken,150,"<br>\n");
			$action_taken = trim(str_replace(",", ", ", $action_taken));
			
			$spreadsheet->getActiveSheet()->setCellValue('B'.$row, $atm($r->atm_id, 'idatm'))
										  ->setCellValue('C'.$row, $atm($r->atm_id, 'cabang'))
										  ->setCellValue('D'.$row, $atm($r->atm_id, 'lokasi'))
										  ->setCellValue('E'.$row, $bank($atm($r->atm_id, 'id_bank'), 'nama'))
										  ->setCellValue('F'.$row, $pic($r->pic))
										  ->setCellValue('G'.$row, $r->ticket_id)
										  ->setCellValue('H'.$row, $r->problem_type)
										  ->setCellValue('I'.$row, $r->email_date)
										  ->setCellValue('J'.$row, $r->entry_date)
										  ->setCellValue('K'.$row, $r->accept_time)
										  ->setCellValue('L'.$row, $r->arrival_time)
										  ->setCellValue('M'.$row, $r->start_job)
										  ->setCellValue('N'.$row, $r->end_job)
										  ->setCellValue('O'.$row, $response_duty)
										  ->setCellValue('P'.$row, $response_slm)
										  ->setCellValue('Q'.$row, $repair_time)
										  ->setCellValue('R'.$row, $resolution_time)
										  ->setCellValue('S'.$row, $up_time.' / '.$down_time)
										  ->setCellValue('T'.$row, $action_taken);
										  
			$i++;
		}
		
		$spreadsheet->getActiveSheet()->removeRow($row+2,1);
		
		if($act=="output") {
			$filename = 'report_technical_'.date("Y_m_d");
			$this->output($filename, $spreadsheet);
		} else {
			echo $this->get_preview($result->result());
		}
	}
	
	public function output($filename, $spreadsheet) {
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
}