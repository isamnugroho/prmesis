<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

// header('Access-Control-Allow-Origin: *');
// header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
// header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
// $method = $_SERVER['REQUEST_METHOD'];
// if ($method == "OPTIONS") {
	// die();
// }

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Api_clean extends REST_Controller {
	function __construct($config = 'rest') {
        parent::__construct($config);
		$this->load->database();
		
		$this->load->model('Initialize_model', 'init_model');
		
		$this->methods['get_scheduled_get']['limit'] = 500; // 500 requests per hour per user/key
		$this->methods['get_scheduled_post']['limit'] = 500; // 500 requests per hour per user/key
		$this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
	
	public function init_get() {
	}
	
	private function getKey()
    {
        return "example_key";
    }
	
	public function sync_complaint_post() {
		$this->init_model->init();
		
		// print_r($_REQUEST['data']['sync']);
		// print_r($_REQUEST['data']['id_lokasi']);
		if(isset($_REQUEST['data']['sync'])) {
			$sync = $_REQUEST['data']['sync'];
			$id_lokasi = $_REQUEST['data']['id_lokasi'];
			$output=array();
			foreach($sync as $values) {
				if($values["waktu_pagi"]=="") {
					$waktu = $values["waktu_sore"];
				} else {
					$waktu = $values["waktu_pagi"];
				}
				 $d=date("Y-m-d",strtotime($waktu));
				 $output[$d][]=$values;
			}
			
			foreach($output as $k => $r) {
				foreach($r as $s) {
					$sql = "
						SELECT *, trans_complaint.date as date, trans_complaint_detail.id as id_sync 
						FROM trans_complaint_detail 
						LEFT JOIN trans_complaint ON(trans_complaint.id=trans_complaint_detail.id_detail)
						LEFT JOIN master_kelolaan_detail ON(trans_complaint_detail.id_kelolaan_detail=master_kelolaan_detail.id)
						LEFT JOIN master_atm ON(master_atm.tid=master_kelolaan_detail.tid)
						WHERE master_kelolaan_detail.tid='".$s['tid']."' 
						AND trans_complaint.id_lokasi='".$id_lokasi."' 
						AND trans_complaint_detail.timestamp LIKE '%$k%'
					";
					$result_check_data = $this->db->query($sql);
					
					if($result_check_data->num_rows()) {
						$bulan = array (1 =>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
								
						// echo (is_object(json_decode($s['action_sore'])) ? "array" : "");
						$row = $result_check_data->row();
						$thn = date("Y");
						$bln = $bulan[(int)date("m")];
						$dir_tahun = $thn;
						$dir_bulan = $dir_tahun."/".strtoupper($bln)."/".$row->kanwil;
						$name = $row->date."_".$s['tid'].".pdf";
						$url_file = $dir_bulan.'/'.$name;
						$this->db->where('id', $row->id_sync);
						if(!$this->db->update('trans_complaint_detail', array(
							'waktu_pagi'=> $s['waktu_pagi'],
							'action_pagi'=> ($s['action_pagi']=="" ? "" : (is_object(json_decode($s['action_pagi'])) ? $s['action_pagi'] : (($s['action_pagi']=="PENDING" || $s['action_pagi']=="CLOSED") ? $s['action_pagi'] : json_encode($s['action_pagi'])))),
							'waktu_sore'=> $s['waktu_sore'],
							'action_sore'=> ($s['action_sore']=="" ? "" : (is_object(json_decode($s['action_sore'])) ? $s['action_sore'] : (($s['action_sore']=="PENDING" || $s['action_sore']=="CLOSED") ? $s['action_sore'] : json_encode($s['action_sore'])))),
							// 'daily_report_pagi'=> $s['daily_report_pagi'],
							// 'daily_report_sore'=> $s['daily_report_sore'],
							'ttd_petugas_pagi'=> $s['ttd_petugas_pagi'],
							'ttd_petugas_sore'=> $s['ttd_petugas_sore'],
							'ttd_pic_pagi'=> $s['ttd_pic_pagi'],
							'ttd_pic_sore'=> $s['ttd_pic_sore'],
							'withness_pagi'=> $s['withness_pagi'],
							'withness_sore'=> $s['withness_sore'],
							'remark_pagi'=> (isset($s['remark_pagi']) ? $s['remark_pagi'] : ""),
							'remark_sore'=> (isset($s['remark_sore']) ? $s['remark_sore'] : ""),
							'jenis_job'=> $s['jenis_job'],
						))) {
							echo "failed";
						}
						echo "success";
					}
				}
			}
		}
	}
	
	public function sync_post() {
		print_r($_REQUEST);
		
		$this->init_model->init();
		if(isset($_REQUEST['data']['sync'])) {
			$sync = $_REQUEST['data']['sync'];
			$id_lokasi = $_REQUEST['data']['id_lokasi'];
			// echo("TOTAL DATA : ".count($sync));
			
			$output=array();
			foreach($sync as $values) {
				if($values["waktu_pagi"]=="") {
					$waktu = $values["waktu_sore"];
				} else {
					$waktu = $values["waktu_pagi"];
				}
				$d=date("Y-m-d",strtotime($waktu));
				$output[$d][]=$values;
			}

			// print_r($output);
			
			foreach($output as $k => $r) {
				// print_r($k);
				// $date = date('Y-m-d', strtotime($r['waktu_pagi']));
				
				$sql = "
					SELECT * FROM trans_clean
					LEFT JOIN trans_clean_detail ON(trans_clean_detail.id_detail=trans_clean.id)
					WHERE trans_clean.date='$k'
				";
				$result_check = $this->db->query($sql);
				
				if($result_check->num_rows()) {
					foreach($r as $s) {
						print_r($s);
						$sql = "
							SELECT *, trans_clean.date as date, trans_clean_detail.id as id_sync FROM trans_clean_detail 
							LEFT JOIN trans_clean ON(trans_clean.id=trans_clean_detail.id_detail)
							LEFT JOIN master_kelolaan_detail ON(trans_clean_detail.id_kelolaan_detail=master_kelolaan_detail.id)
							LEFT JOIN master_atm ON(master_atm.tid=master_kelolaan_detail.tid)
							WHERE master_kelolaan_detail.tid='".$s['tid']."' AND trans_clean_detail.timestamp LIKE '%$k%'
						";
						$result_check_data = $this->db->query($sql);
				
						// echo $result_check->num_rows()." ".$result_check_data->num_rows();
						
						if($result_check_data->num_rows()) {
							$bulan = array (1 =>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
							
							// echo (is_object(json_decode($s['action_sore'])) ? "array" : "");
							$row = $result_check_data->row();
							
							// print_r($row);
							$thn = date("Y");
							$bln = $bulan[(int)date("m")];
							$dir_tahun = $thn;
							$dir_bulan = $dir_tahun."/".strtoupper($bln)."/".$row->kanwil;
							$name = $row->date."_".$s['tid'].".pdf";
							$url_file = $dir_bulan.'/'.$name;
							$this->db->where('id', $row->id_sync);
							if(!$this->db->update('trans_clean_detail', array(
								'waktu_pagi'=> $s['waktu_pagi'],
								'action_pagi'=> ($s['action_pagi']=="" ? "" : (is_object(json_decode($s['action_pagi'])) ? $s['action_pagi'] : (($s['action_pagi']=="PENDING" || $s['action_pagi']=="CLOSED") ? $s['action_pagi'] : json_encode($s['action_pagi'])))),
								'waktu_sore'=> $s['waktu_sore'],
								'action_sore'=> ($s['action_sore']=="" ? "" : (is_object(json_decode($s['action_sore'])) ? $s['action_sore'] : (($s['action_sore']=="PENDING" || $s['action_sore']=="CLOSED") ? $s['action_sore'] : json_encode($s['action_sore'])))),
								// 'daily_report_pagi'=> $s['daily_report_pagi'],
								// 'daily_report_sore'=> $s['daily_report_sore'],
								'ttd_petugas_pagi'=> $s['ttd_petugas_pagi'],
								'ttd_petugas_sore'=> $s['ttd_petugas_sore'],
								'ttd_pic_pagi'=> $s['ttd_pic_pagi'],
								'ttd_pic_sore'=> $s['ttd_pic_sore'],
								'withness_pagi'=> $s['withness_pagi'],
								'withness_sore'=> $s['withness_sore'],
								'remark_pagi'=> (isset($s['remark_pagi']) ? $s['remark_pagi'] : ""),
								'remark_sore'=> (isset($s['remark_sore']) ? $s['remark_sore'] : ""),
								'jenis_job'=> $s['jenis_job'],
							))) {
								echo "failed";
							}
							
							// echo $s['jenis_job'];
							
							echo "success";
							
							// $this->db->last_query();
						}
						
						
						// echo $sql;
					}
					// echo "ADA";
				}
			}
		}
		// echo $sql;
	}
	
	public function get_scheduled_post() {
		$this->init_model->init();
		$authorized = $this->Authorization();
		// print_r($authorized->data);
		$is_koord = $authorized->data->is_koord;
		$id_lokasi = $_REQUEST['data']['id_lokasi'];
		$pic = $_REQUEST['data']['pic'];
		if($authorized) {
			$sql = "
				SELECT *, master_staff.nik as koord FROM trans_schedule
				LEFT JOIN master_staff ON(master_staff.nik=trans_schedule.pic)
				LEFT JOIN master_staff_petugas ON(master_staff_petugas.id_koord=master_staff.id)
				WHERE (master_staff.nik='".$authorized->data->username."' OR master_staff_petugas.nik='".$authorized->data->username."' )
			";
			
			$result_schedule = $this->db->query($sql);
			// echo $result_schedule->num_rows();
			if($result_schedule->num_rows()) {
				// $sql = 'SELECT * FROM trans_clean 
					// LEFT JOIN trans_clean_detail ON(trans_clean_detail.id_detail=trans_clean.id)
					// LEFT JOIN master_kelolaan_detail ON(master_kelolaan_detail.id=trans_clean_detail.id_kelolaan_detail)
					// LEFT JOIN master_atm ON(master_atm.tid=master_kelolaan_detail.tid)
					// WHERE trans_clean.pic=:pic:';
				$row = $result_schedule->row();
				
				$result_switch = "";
					
				if($is_koord=="true") {
					$sql = "
						SELECT *, if(trans_clean_detail.jenis_job='', 'rutin', trans_clean_detail.jenis_job) as jenis_job, trans_clean.date as date, trans_clean_detail.id as id_report, master_staff.nama as nama_petugas 
						FROM master_kelolaan 
						LEFT JOIN master_kelolaan_detail ON(master_kelolaan_detail.id_kelolaan=master_kelolaan.id)
						LEFT JOIN master_atm ON(master_atm.tid=master_kelolaan_detail.tid)
						LEFT JOIN trans_clean_detail ON(trans_clean_detail.id_kelolaan_detail=master_kelolaan_detail.id)
						LEFT JOIN trans_clean ON(trans_clean.id=trans_clean_detail.id_detail)
						LEFT JOIN master_staff ON(master_staff.nik=trans_clean.pic)
						WHERE master_kelolaan.id='$row->id_lokasi' AND trans_clean_detail.timestamp LIKE '".date("Y-m-d")."%'
					";
					
					// echo $sql;
					
			        $obj_merged = $this->db->query($sql)->result();
				} else if($is_koord=="false") {
					$sql = "
						SELECT *, if(trans_clean_detail.jenis_job='', 'rutin', trans_clean_detail.jenis_job) as jenis_job, trans_clean.date as date, trans_clean_detail.id as id_report, master_staff_petugas.nama as nama_petugas 
						FROM trans_schedule 
						LEFT JOIN trans_schedule_team ON(trans_schedule_team.id_detail=trans_schedule.id)
						LEFT JOIN master_kelolaan_detail ON(master_kelolaan_detail.tid=trans_schedule_team.tid)
						LEFT JOIN master_atm ON(master_atm.tid=trans_schedule_team.tid)
						LEFT JOIN trans_clean_detail ON(trans_clean_detail.id_kelolaan_detail=master_kelolaan_detail.id)
						LEFT JOIN trans_clean ON(trans_clean.id=trans_clean_detail.id_detail)
						LEFT JOIN master_staff_petugas ON(master_staff_petugas.nik=trans_schedule_team.pic)
						WHERE trans_schedule.id_lokasi='$row->id_lokasi' 
						AND trans_clean_detail.timestamp LIKE '".date("Y-m-d")."%'
						AND trans_schedule_team.pic='".$authorized->data->username."'
						AND trans_schedule_team.pic NOT IN (SELECT pic_from FROM trans_switch)
					";
					
					$check_switch = $this->db->query("SELECT * FROM trans_switch WHERE pic_to='".$authorized->data->username."' 
														AND date_from>='".date("Y-m-d")."' AND date_to<='".date("Y-m-d")."'")->num_rows();
					if($check_switch>0) {
						$sql2 = "
							SELECT *, if(trans_clean_detail.jenis_job='', 'switch', trans_clean_detail.jenis_job) as jenis_job, trans_clean.date as date, trans_clean_detail.id as id_report, master_staff_petugas.nama as nama_petugas
							 FROM trans_schedule
							 LEFT JOIN trans_schedule_team ON(trans_schedule_team.id_detail=trans_schedule.id) 
							 LEFT JOIN master_kelolaan_detail ON(master_kelolaan_detail.tid=trans_schedule_team.tid) 
							 LEFT JOIN master_atm ON(master_atm.tid=trans_schedule_team.tid) 
							 LEFT JOIN trans_clean_detail ON(trans_clean_detail.id_kelolaan_detail=master_kelolaan_detail.id) 
							 LEFT JOIN trans_clean ON(trans_clean.id=trans_clean_detail.id_detail) 
							 LEFT JOIN master_staff_petugas ON(master_staff_petugas.nik=trans_schedule_team.pic) 
							WHERE 
							trans_clean_detail.timestamp LIKE '".date("Y-m-d")."%'
							AND trans_schedule_team.pic = (SELECT pic_from FROM trans_switch WHERE date_from>='".date("Y-m-d")."' AND date_to<='".date("Y-m-d")."')
						";
						
						$result_switch = $this->db->query($sql2)->result();
						
						
				        $result = $this->db->query($sql)->result();
						$obj_merged = (object) array_merge((array) $result, (array) $result_switch);
					} else {
				        $obj_merged = $this->db->query($sql)->result();
					}
					
					$check_complaint = $this->db->query("SELECT * FROM trans_complaint WHERE pic='".$authorized->data->username."' AND date='".date("Y-m-d")."'")->num_rows();
					
					$result_complaint = array();
					if($check_complaint>0) {
						$sql2 = "
							SELECT *, trans_complaint.date as date, trans_complaint_detail.id as id_report, master_staff_petugas.nama as nama_petugas 
							FROM trans_complaint 
							LEFT JOIN trans_complaint_detail ON(trans_complaint.id=trans_complaint_detail.id_detail) 
							LEFT JOIN master_kelolaan_detail ON(master_kelolaan_detail.id=trans_complaint_detail.id_kelolaan_detail) 
							LEFT JOIN master_kelolaan ON(master_kelolaan_detail.id_kelolaan=master_kelolaan.id) 
							LEFT JOIN master_atm ON(master_atm.tid=master_kelolaan_detail.tid) 
							LEFT JOIN master_staff_petugas ON(master_staff_petugas.nik=trans_complaint.pic) 
							WHERE trans_complaint.date='".date("Y-m-d")."' 
							AND trans_complaint.id_lokasi = '$id_lokasi'
							AND trans_complaint.pic = '$pic'
						";
						
						$result_complaint = $this->db->query($sql2)->result_array();
					} 
				}
				
				// echo $sql;
				
				
					
				// $response = $authorized;
				// $response = $result;
				$response = [
                    'status' => 200,
                    'error' => true,
                    'messages' => '',
                    // 'data' => $result,
                    'data_merged' => $obj_merged,
                    'data_complaint' => $result_complaint,
                ];
			} else {
				$response = [
                    'status' => 500,
                    'error' => true,
                    'messages' => 'Your account not scheduled yet, Please contact administrator!',
                    'data' => []
                ];
			}
		} else {
			$response = [
                'status' => 401,
                'error' => true,
                'messages' => 'Access denied, token invalid',
                'data' => []
            ];
		}
		
		header('Content-Type: application/json');
		echo json_encode($response);
		
		// echo "<pre>";
		// print_r($response);
	}
	
	private function Authorization() {
		$authHeader = $_REQUEST['headers']['Authorization'];
		$token = $authHeader;
		$key = $this->getKey();
		try {
			$decoded = JWT::decode($token, new Key($key, 'HS256'));
			return $decoded;
		} catch (Exception $ex) {
            return false;
        }
	}
	
	public function request_switch_get() {
		$authorized = $this->Authorization();
		echo "<pre>";
		print_r($_REQUEST);
		
		if(isset($_REQUEST['data']['sync'])) {
			$sync = $_REQUEST['data']['sync'];
			$id_lokasi = $_REQUEST['data']['id_lokasi'];
			
			$output=array();
			foreach($sync as $values) {
				$waktu = $values["date"];
				$d=date("Y-m-d",strtotime($waktu));
				$output[$d][]=$values;
			}

			echo "<pre>";
			print_r($output);
			foreach($output as $k => $r) {
				$sql = "
					SELECT * FROM trans_clean
					LEFT JOIN trans_clean_detail ON(trans_clean_detail.id_detail=trans_clean.id)
					WHERE trans_clean.date='$k'
				";
				$result_check = $this->db->query($sql);
				
				if($result_check->num_rows()) {
					foreach($r as $s) {
						print_r($s);
						$sql = "
							SELECT *, trans_clean.date as date, trans_clean_detail.id as id_sync FROM trans_clean_detail 
							LEFT JOIN trans_clean ON(trans_clean.id=trans_clean_detail.id_detail)
							LEFT JOIN master_kelolaan_detail ON(trans_clean_detail.id_kelolaan_detail=master_kelolaan_detail.id)
							LEFT JOIN master_atm ON(master_atm.tid=master_kelolaan_detail.tid)
							WHERE master_kelolaan_detail.tid='".$s['tid']."' AND trans_clean_detail.timestamp LIKE '%$k%'
						";
						$result_check_data = $this->db->query($sql);
				
						// echo $result_check->num_rows()." ".$result_check_data->num_rows();
						
						if($result_check_data->num_rows()) {
							$bulan = array (1 =>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
							
							// echo (is_object(json_decode($s['action_sore'])) ? "array" : "");
							$row = $result_check_data->row();
							
							// print_r($row);
							$thn = date("Y");
							$bln = $bulan[(int)date("m")];
							$dir_tahun = $thn;
							$dir_bulan = $dir_tahun."/".strtoupper($bln)."/".$row->kanwil;
							$name = $row->date."_".$s['tid'].".pdf";
							$url_file = $dir_bulan.'/'.$name;
							$this->db->where('id', $row->id_sync);
							if(!$this->db->update('trans_clean_detail', array(
								'waktu_pagi'=> $s['waktu_pagi'],
								'action_pagi'=> ($s['action_pagi']=="" ? "" : (is_object(json_decode($s['action_pagi'])) ? $s['action_pagi'] : (($s['action_pagi']=="PENDING" || $s['action_pagi']=="CLOSED") ? $s['action_pagi'] : json_encode($s['action_pagi'])))),
								'waktu_sore'=> $s['waktu_sore'],
								'action_sore'=> ($s['action_sore']=="" ? "" : (is_object(json_decode($s['action_sore'])) ? $s['action_sore'] : (($s['action_sore']=="PENDING" || $s['action_sore']=="CLOSED") ? $s['action_sore'] : json_encode($s['action_sore'])))),
								// 'daily_report_pagi'=> $s['daily_report_pagi'],
								// 'daily_report_sore'=> $s['daily_report_sore'],
								'ttd_petugas_pagi'=> $s['ttd_petugas_pagi'],
								'ttd_petugas_sore'=> $s['ttd_petugas_sore'],
								'ttd_pic_pagi'=> $s['ttd_pic_pagi'],
								'ttd_pic_sore'=> $s['ttd_pic_sore'],
								'withness_pagi'=> $s['withness_pagi'],
								'withness_sore'=> $s['withness_sore'],
								'remark_pagi'=> (isset($s['remark_pagi']) ? $s['remark_pagi'] : ""),
								'remark_sore'=> (isset($s['remark_sore']) ? $s['remark_sore'] : ""),
								'jenis_job'=> $s['jenis_job'],
							))) {
								echo "failed";
							}
							echo "success";
						}
					}
				}
			}
		}
	}
}