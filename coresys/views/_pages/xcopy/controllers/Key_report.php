<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class Key_report extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->load->model('datatables_model', 'datatables');
		$this->data['that'] = $this;
	}
	
	public function index() {
		return view('pages/key_report/index', $this->data);
	}
	
	function json() {
		error_reporting(0);
		// BANK SULTENG 18
		// BANK MALUKU MALUT 19
		// BANK KALTENG 20
		$id_bank = "18";
		
		$query = "
			SELECT *,
			(SELECT nama FROM master_staff WHERE id=master_request_key.pic) as cse,
			(SELECT lokasi FROM master_atm WHERE idatm=master_request_key.atm_id) as lokasi,
			(SELECT idatm FROM master_atm WHERE idatm=master_request_key.atm_id) as idatm
			FROM master_request_key
		";
		
		
		$param['query'] 		= trim($query);
		$param['column_order'] 	= array(null, 'id', 'ticket_id');
		$param['column_search'] = array('ticket_id', 'atm_id');
		$param['order'] 		= array('id' => 'desc');
		$param['where'] 		= array(
									  array('status' => 'CLOSE')
								  );
		
		$param['param'] = json_encode($param);
		$param['post'] 	= $_REQUEST;
		
		$data = $this->datatables->check($param);
		
		$r = json_decode($data, true);
		
		// echo "<pre>";
		// print_r($r);
		
		$out = array();
		$out['draw'] = $r['draw'];
		$out['recordsTotal'] = $r['recordsTotal'];
		$out['recordsFiltered'] = $r['recordsFiltered'];
		$datas = array();
		$key = 0;
		$no = $_REQUEST['start'];
		foreach($r['data'] as $r) {
			$no++;
			
			if($r['idatm']!=="") {
				$lokasi = $r['idatm'];
			} else {
				$lokasi = "";
			}
			
			// else if($r['lokasi']!=="") {
				// $lokasi = $r['lokasi'];
			// } else if($r['lokasi']!=="" && $r['lokasi']!=="") {
				// $lokasi = $r['atm_id']." / ".$r['lokasi'];
			// }
			
			$list[$key]['no'] = $no;
			$list[$key]['lokasi'] = $r['idatm'];
			$list[$key]['ticket'] = $r['ticket_id'];
			$list[$key]['cse'] = $r['cse'];
			$list[$key]['problem_type'] = $r['problem_type'];
			
			$action_taken = json_decode($r['action_taken'], true)['action_taken'];
			$without_breaks = str_replace(array(' __plugindomid="pgm1418961401523"'), '', $action_taken);
			$without_breaks = str_replace(array('<ol>', '</ol>'), '', $without_breaks);
			$without_breaks = str_replace(array('<li>'), '', $without_breaks);
			$without_breaks = str_replace(array('</li>'), ', ', $without_breaks);
			$action_taken = $without_breaks;
			
			$list[$key]['action_taken'] = strip_tags($action_taken);
			
			//data PIC
			$list[$key]['reported_problem'] = $r['reported_problem'];
			$list[$key]['reported_by'] = $r['reported_by'];
			$list[$key]['email_pic'] = $r['email_pic'];
			$list[$key]['phone_pic'] = $r['phone_pic'];
			
			//rumus
			$list[$key]['email_date'] = date("d-m-Y", strtotime($r['email_date']))." / ".date("H:i:s", strtotime($r['email_date']));
            $list[$key]['email_time'] = date("H:i:s", strtotime($r['email_date']));
			$list[$key]['entry_date'] = date("d-m-Y", strtotime($r['entry_date']))." / ".date("H:i:s", strtotime($r['entry_date']));
            $list[$key]['entry_time'] = date("H:i:s", strtotime($r['entry_date']));
			$list[$key]['accept_time'] = ($r['accept_time']=="" ? "-" : date("H:i:s", strtotime($r['accept_time'])));
			// $list[$key]['arrival_date'] = date("d-m-Y", strtotime($r['arrival_date']))." / ".date("H:i:s", strtotime($r['arrival_date']));
            // $list[$key]['arrival_time'] = date("H:i:s", strtotime($r['arrival_date']));
            $list[$key]['start_date'] = ($r['start_job']=="" ? "-" : 
											date("d-m-Y", strtotime($r['start_job']))." / ".date("H:i:s", strtotime($r['start_job']))
										);
            $list[$key]['start_time'] = ($r['start_job']=="" ? "-" : 
											date("H:i:s", strtotime($r['start_job']))
										);
            $list[$key]['close_date'] = ($r['end_job']=="" ? "-" : 
											date("d-m-Y", strtotime($r['end_job']))." / ".date("H:i:s", strtotime($r['end_job']))
										);
            $list[$key]['close_time'] = ($r['end_job']=="" ? "-" : 
											date("H:i:s", strtotime($r['end_job']))
										);
			
			if($r['accept_time']!=="0000-00-00 00:00:00") {
				
				$list[$key]['arrival_date'] = (true !== isset($r['arrival_time']) ? "-" : 
													date("d-m-Y", strtotime($r['arrival_time']))." / ".date("H:i:s", strtotime($r['arrival_time']))
												);
				$list[$key]['arrival_time'] = (true !== isset($r['arrival_time']) ? "-" : 
													date("H:i:s", strtotime($r['arrival_time']))
												);
				
				$response_duty = $this->diff($r['email_date'], $r['entry_date']);
				$list[$key]['response_duty'] = $response_duty;
				
				
				
				
				$start_date = strtotime($r['entry_date']); 
				$end_date = strtotime($r['arrival_time']); 
				$diff1 = abs($start_date - $end_date); 
				$years1 = floor($diff1 / (365*60*60*24)); 
				$months1 = floor(($diff1 - $years1 * 365*60*60*24) / (30*60*60*24)); 
				$days1 = floor(($diff1 - $years1 * 365*60*60*24 - $months1*30*60*60*24) / (60*60*24));
				$hours1 = floor(($diff1 - $years1 * 365*60*60*24 - $months1*30*60*60*24 - $days1*60*60*24) / (60*60));
				$minutes1 = floor(($diff1 - $years1 * 365*60*60*24 - $months1*30*60*60*24 - $days1*60*60*24 - $hours1*60*60)/ 60);
				$seconds1 = floor(($diff1 - $years1 * 365*60*60*24 - $months1*30*60*60*24 - $days1*60*60*24 - $hours1*60*60 - $minutes1*60)); 
				$response_cse = "";
				if($years1>0) {
					$response_cse = sprintf("%02d years, %02d months, %02d days, %02d:" . "%02d:%02d", $years1, $months1, $days1, $hours1, $minutes1, $seconds1);
				} else if($months1>0) {
					$response_cse = sprintf("%02d months, %02d days, %02d:" . "%02d:%02d", $months1, $days1, $hours1, $minutes1, $seconds1);
				} else if($days1>0) {
					$response_cse = sprintf("%02d days, %02d:" . "%02d:%02d", $days1, $hours1, $minutes1, $seconds1);
				} else if($hours1>0) {
					$response_cse = sprintf("%02d:%02d:%02d", $hours1, $minutes1, $seconds1);
				} else {
					$response_cse = sprintf("%02d:%02d:%02d", $hours1, $minutes1, $seconds1);
				}
				// $response_cse = $this->diff($r['entry_date'], $r['accept_time']);
				$list[$key]['response_cse'] = $response_cse;
				
				$arrive_date = strtotime($r['entry_date']);
				$close_date = strtotime($r['end_job']);
				$diff2 = abs($arrive_date - $close_date); 
				$years2 = floor($diff2 / (365*60*60*24)); 
				$months2 = floor(($diff2 - $years2 * 365*60*60*24) / (30*60*60*24)); 
				$days2 = floor(($diff2 - $years2 * 365*60*60*24 - $months2*30*60*60*24) / (60*60*24));
				$hours2 = floor(($diff2 - $years2 * 365*60*60*24 - $months2*30*60*60*24 - $days2*60*60*24) / (60*60));
				$minutes2 = floor(($diff2 - $years2 * 365*60*60*24 - $months2*30*60*60*24 - $days2*60*60*24 - $hours2*60*60)/ 60);
				$seconds2 = floor(($diff2 - $years2 * 365*60*60*24 - $months2*30*60*60*24 - $days2*60*60*24 - $hours2*60*60 - $minutes2*60)); 
				$repair_time = "";
				if($years2>0) {
					$repair_time = sprintf("%02d years, %02d months, %02d days, %02d:" . "%02d:%02d", $years2, $months2, $days2, $hours2, $minutes2, $seconds2);
				} else if($months2>0) {
					$repair_time = sprintf("%02d months, %02d days, %02d:" . "%02d:%02d", $months2, $days2, $hours2, $minutes2, $seconds2);
				} else if($days2>0) {
					$repair_time = sprintf("%02d days, %02d:" . "%02d:%02d", $days2, $hours2, $minutes2, $seconds2);
				} else if($hours2>0) {
					$repair_time = sprintf("%02d:%02d:%02d", $hours2, $minutes2, $seconds2);
				} else {
					$repair_time = sprintf("%02d:%02d:%02d", $hours2, $minutes2, $seconds2);
				}
				// $repair_time = $this->diff($r['start_job'], $r['end_job']);
				$list[$key]['resolution_time'] = $repair_time;
				
				
				// $diff3 = $diff1+$diff2;
				// $years3 = floor($diff3 / (365*60*60*24)); 
				// $months3 = floor(($diff3 - $years3 * 365*60*60*24) / (30*60*60*24)); 
				// $days3 = floor(($diff3 - $years3 * 365*60*60*24 - $months3*30*60*60*24) / (60*60*24));
				// $hours3 = floor(($diff3 - $years3 * 365*60*60*24 - $months3*30*60*60*24 - $days3*60*60*24) / (60*60));
				// $minutes3 = floor(($diff3 - $years3 * 365*60*60*24 - $months3*30*60*60*24 - $days3*60*60*24 - $hours3*60*60)/ 60);
				// $seconds3 = floor(($diff3 - $years3 * 365*60*60*24 - $months3*30*60*60*24 - $days3*60*60*24 - $hours3*60*60 - $minutes3*60)); 
				// // printf("resolution time => %d years, %d months, %d days, %d hours, " . "%d minutes, %d seconds", $years3, $months3, $days3, $hours3, $minutes3, $seconds3); 
				// $resolution_time = "";
				// if($years3>0) {
					// $resolution_time = sprintf("%02d years, %02d months, %02d days, %02d:" . "%02d:%02d", $years3, $months3, $days3, $hours3, $minutes3, $seconds3);
				// } else if($months3>0) {
					// $resolution_time = sprintf("%02d months, %02d days, %02d:" . "%02d:%02d", $months3, $days3, $hours3, $minutes3, $seconds3);
				// } else if($days3>0) {
					// $resolution_time = sprintf("%02d days, %02d:" . "%02d:%02d", $days3, $hours3, $minutes3, $seconds3);
				// } else if($hours3>0) {
					// $resolution_time = sprintf("%02d:%02d:%02d", $hours3, $minutes3, $seconds3);
				// } else {
					// $resolution_time = sprintf("%02d:%02d:%02d", $hours3, $minutes3, $seconds3);
				// }
				// // $resolution_time = $this->diff($r['start_job'], $r['end_job']);
				// $list[$key]['resolution_time'] = $resolution_time;
				
				$down_time = $this->hoursToMinutes($resolution_time);
				$rumus = ($this->dayNumber(date("Y-m-d", strtotime($r['start_job']))));
				$str = ($diff3/60)/($rumus*24*60);
				$down_time = round((float)$str * 100, 2);
				// $list[$key]['down_time'] = $down_time." ".$rumus." = ".$down_time/$rumus;
				// $list[$key]['down_time'] = ($down_time==0 ? "" : round($down_time/$rumus, 2)." / ".(100-round($down_time/$rumus, 2)));
				$list[$key]['down_time'] = ($down_time==0 ? "" : $down_time." / ".(100-$down_time));
				$list[$key]['up_time'] = 100-$down_time;
			} else {
				// $list[$key]['arrival_date'] = (true !== isset($r['arrival_time']) ? "-" : 
													// date("d-m-Y", strtotime($r['arrival_time']))." / ".date("H:i:s", strtotime($r['arrival_time']))
												// );
				// $list[$key]['arrival_time'] = (true !== isset($r['arrival_time']) ? "-" : 
													// date("H:i:s", strtotime($r['arrival_time']))
												// );
												
				// $response_duty = $this->diff($r['email_date'], $r['entry_date']);
				// $list[$key]['response_duty'] = $response_duty;
				
				// $response_cse = $this->diff($r['entry_date'], $r['accept_time']);
				// $list[$key]['response_cse'] = $response_cse;
				
				// $repair_time = $this->diff($r['start_job'], $r['end_job']);
				// $list[$key]['repair_time'] = $repair_time;
				
				// $resolution_time = $this->diff($r['start_job'], $r['end_job']);
				// $list[$key]['resolution_time'] = $resolution_time;
				
				// $down_time = $this->hoursToMinutes($resolution_time);
				// $rumus = ($this->dayNumber(date("Y-m-d", strtotime($r['start_job']))));
				// // $list[$key]['down_time'] = $down_time." ".$rumus." = ".$down_time/$rumus;
				// $list[$key]['down_time'] = ($down_time==0 ? "" : round($down_time/$rumus, 2)." / ".(100-round($down_time/$rumus, 2)));
				// $list[$key]['up_time'] = 100-round($down_time/$rumus, 2);
			}
			
			$key++;
		}
		
		$out['data'] = $list;
		
		// echo "<pre>";
		// print_r($out);
		echo json_encode($out);
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
	
	function tambah_waktu($jam_mulai, $jam_selesai) {
        $times = array($jam_mulai,$jam_selesai); 
        $seconds = 0; 
        foreach ( $times as $time ) { 
            list( $g, $i, $s ) = explode( ':', $time ); 
            $seconds += $g * 3600; 
            $seconds += $i * 60; 
            $seconds += $s; 
        } 
        $hours = floor( $seconds / 3600 ); 
        $seconds -= $hours * 3600; 
        $minutes = floor( $seconds / 60 ); 
        $seconds -= $minutes * 60; 

        return sprintf('%02d', $hours).':'.sprintf('%02d', $minutes).':'.sprintf('%02d', $seconds);
    }

    function diff($a1, $a2) {
        // $awal  = date_create($a1);
        // $akhir = date_create($a2); // waktu sekarang
        // $diff  = date_diff($awal, $akhir);

        // // return $diff;
        // return sprintf('%02d', $diff->h).':'.sprintf('%02d', $diff->i).':'.sprintf('%02d', $diff->s);
		
		$in = new DateTime($a1);
		$out = new DateTime($a2);
		
		if ($in > $out) $out->add(new DateInterval('P1D'));
		$diff = $out->diff($in);
		
		return sprintf('%02d', $diff->h).':'.sprintf('%02d', $diff->i).':'.sprintf('%02d', $diff->s);
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
}