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

class Api_initial extends REST_Controller {
	function __construct($config = 'rest') {
        parent::__construct($config);
		$this->load->database();
		
		$this->methods['get_scheduled_get']['limit'] = 500; // 500 requests per hour per user/key
		$this->methods['get_scheduled_post']['limit'] = 500; // 500 requests per hour per user/key
		$this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
	
	private function getKey()
    {
        return "example_key";
    }
	
	public function get_scheduled_post() {
		print_r($_REQUEST['header']);
	}
	
	public function init_get() {
		$today = date("Y-m-d");
		$id_lokasi = $_REQUEST['data']['id_lokasi'];
		$sql = "
			SELECT * FROM trans_schedule
			WHERE pic NOT IN (SELECT pic FROM trans_clean WHERE date = '$today')	
		";
		$sql = "
			SELECT *, 
			(SELECT count(*) FROM trans_clean WHERE pic=trans_schedule.pic) as cnt_scheduled,
			(SELECT count(*) FROM master_kelolaan LEFT JOIN master_kelolaan_detail ON(master_kelolaan_detail.id_kelolaan=master_kelolaan.id) WHERE master_kelolaan.id=trans_schedule.id_lokasi) as cnt_kelolaan,
			(SELECT count(*) FROM trans_clean LEFT JOIN trans_clean_detail ON(trans_clean_detail.id_detail=trans_clean.id) WHERE trans_clean.pic=trans_schedule.pic) as cnt_scheduled_detail
			FROM trans_schedule	
			WHERE 
			trans_schedule.id_lokasi='$id_lokasi'
		";
		$result_schedule = $this->db->query($sql);
		
		$this->generate_schedule($result_schedule);
		
		// print_r($result_schedule->result());
		
		// echo json_encode($result_schedule->result());
	}
	
	function generate_schedule($result_schedule) {
		$today = date("Y-m-d");
		if($result_schedule->num_rows()) {
			$result = $result_schedule->result();
			
			$i = 0;
			foreach($result as $row) {
				$sql = "SELECT * FROM master_kelolaan 
						LEFT JOIN master_kelolaan_detail ON (master_kelolaan_detail.id_kelolaan=master_kelolaan.id)
						WHERE master_kelolaan.id='".$row->id_lokasi."'
						AND master_kelolaan_detail.tid IN (SELECT tid FROM trans_schedule_team)
						";
				$result_kelolaan = $this->db->query($sql);
				if($result_kelolaan->num_rows()>0) {
					$kelolaan = $result_kelolaan->result();
					// print_r($row);
					$sql = "SELECT * FROM trans_clean WHERE date='$today' AND pic='$row->pic'";
					$res = $this->db->query($sql);
					if(!$res->num_rows()) {
						$data = [
							'date' => $today,
							'timestamp'  => date("Y-m-d H:i:s"),
							'pic'  => $row->pic,
							'id_lokasi'  => $row->id_lokasi,
						];
						if (!$this->db->insert('trans_clean', $data)) {
							$response = [
								'status' => 500,
								'error' => false,
								'messages' => 'Error query trans_clean',
								'data' => []
							];
						} else {
							$inserted_id = $this->db->insert_id();
							$data = array();
							foreach($kelolaan as $r) {
								$data[] = array(
									'id_detail' => $inserted_id,
									'id_kelolaan_detail' => $r->id,
									'timestamp' => date("Y-m-d H:i:s")
								);
							}
							$this->db->insert_batch('trans_clean_detail', $data);
							
							$response = [
								'status' => 200,
								'error' => false,
								'messages' => 'Success generated schedule 1',
								'data' => []
							];
						}
					} else {
						$data = [
							'date' => $today,
							'timestamp'  => date("Y-m-d H:i:s"),
							'pic'  => $row->pic,
							'id_lokasi'  => $row->id_lokasi,
						];
						
						$sql = "
							SELECT *, master_kelolaan_detail.id as id_kelolaan_detail, trans_clean.id as id_detail 
							FROM master_kelolaan 
							LEFT JOIN master_kelolaan_detail ON (master_kelolaan_detail.id_kelolaan=master_kelolaan.id)
							LEFT JOIN trans_clean ON (master_kelolaan.id=trans_clean.id_lokasi)
							WHERE 
							master_kelolaan.id='".$row->id_lokasi."' 
							AND master_kelolaan_detail.id NOT IN (SELECT id_kelolaan_detail FROM trans_clean_detail)
							AND trans_clean.date='$today' AND trans_clean.pic='$row->pic'
							AND master_kelolaan_detail.tid IN (SELECT tid FROM trans_schedule_team)
						";
						
						// $sql = "
							// SELECT *, master_kelolaan_detail.id as id_kelolaan_detail, trans_clean.id as id_detail FROM master_kelolaan 
							// LEFT JOIN master_kelolaan_detail ON (master_kelolaan_detail.id_kelolaan=master_kelolaan.id)
							// LEFT JOIN trans_clean ON (master_kelolaan.id=trans_clean.id_lokasi)
							// WHERE 
							// master_kelolaan.id='".$row->id_lokasi."' 
							// AND master_kelolaan_detail.id NOT IN (SELECT id_kelolaan_detail FROM trans_clean_detail)
							// AND trans_clean.date='$today' AND trans_clean.pic='$row->pic'
						// ";
						
						
						
						$result_kelolaan = $this->db->query($sql);
						if($result_kelolaan->num_rows()>0) {
							$kelolaan = $result_kelolaan->result();
							$data = array();
							foreach($kelolaan as $r) {
								$data[] = array(
									'id_detail' => $r->id_detail,
									'id_kelolaan_detail' => $r->id_kelolaan_detail,
									'timestamp' => date("Y-m-d H:i:s")
								);
							}
							$this->db->insert_batch('trans_clean_detail', $data);
							
							$response = [
								'status' => 200,
								'error' => false,
								'messages' => 'Success generated schedule 2',
								'data' => $data,
								'sql' => trim(preg_replace('/(\v|\s)+/', ' ', $sql))
							];
						} else {
							// TERHAPUS DARI DETAIL
							// $sql = "
								// SELECT *, master_kelolaan_detail.id as id_kelolaan_detail, trans_clean.id as id_detail 
								// FROM master_kelolaan 
								// LEFT JOIN master_kelolaan_detail ON (master_kelolaan_detail.id_kelolaan=master_kelolaan.id)
								// LEFT JOIN trans_clean ON (master_kelolaan.id=trans_clean.id_lokasi)
								// WHERE 
								// master_kelolaan.id='".$row->id_lokasi."' 
								// AND master_kelolaan_detail.id NOT IN (SELECT id_kelolaan_detail FROM trans_clean_detail)
								// AND trans_clean.date='$today' AND trans_clean.pic='$row->pic'
								// AND master_kelolaan_detail.tid IN (SELECT tid FROM trans_schedule_team)
							// ";
							$sql = "
								SELECT *, master_kelolaan_detail.id as id_kelolaan_detail, trans_clean.id as id_detail 
								FROM master_kelolaan
								LEFT JOIN master_kelolaan_detail ON (master_kelolaan_detail.id_kelolaan=master_kelolaan.id)
								LEFT JOIN trans_clean ON (master_kelolaan.id=trans_clean.id_lokasi)
								WHERE master_kelolaan.id='".$row->id_lokasi."' 
								AND trans_clean.date='$today' AND trans_clean.pic='$row->pic'
								AND master_kelolaan_detail.tid IN (SELECT tid FROM trans_schedule_team)
								AND master_kelolaan_detail.id NOT IN (
									SELECT id_kelolaan_detail FROM trans_clean_detail
									LEFT JOIN trans_clean ON (trans_clean.id=trans_clean_detail.id_detail)
									WHERE trans_clean.date='$today' AND trans_clean.pic='$row->pic'
								)
							";
							$result_kelolaan = $this->db->query($sql);
							if($result_kelolaan->num_rows()>0) {
								$kelolaan = $result_kelolaan->result();
								$data = array();
								foreach($kelolaan as $r) {
									$data[] = array(
										'id_detail' => $r->id_detail,
										'id_kelolaan_detail' => $r->id_kelolaan_detail,
										'timestamp' => date("Y-m-d H:i:s")
									);
								}
								$this->db->insert_batch('trans_clean_detail', $data);
								
								$response = [
									'status' => 200,
									'error' => false,
									'messages' => 'Success generated schedule 3',
									'data' => $data,
									'sql' => trim(preg_replace('/(\v|\s)+/', ' ', $sql))
								];
							}
							
							$response = [
								'status' => 200,
								'error' => false,
								'messages' => 'Schedule already generated 1',
								'data' => $data,
								'sql' => trim(preg_replace('/(\v|\s)+/', ' ', $sql))
							];
						}
					}
				} else {
					$response = [
						'status' => 500,
						'error' => true,
						'messages' => 'No data 1',
						'data' => []
					];
				}
			}
		} else {
			$response = [
				'status' => 500,
				'error' => true,
				'messages' => 'No data 2',
				'data' => []
			];
		}
		
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	public function get_scheduled_get() {
		$authorized = $this->Authorization();
		// print_r($authorized->data);
		if($authorized) {
			$sql = "
				SELECT *, master_staff.nik as koord FROM trans_schedule
				LEFT JOIN master_staff ON(master_staff.nik=trans_schedule.pic)
				LEFT JOIN master_staff_petugas ON(master_staff_petugas.id_koord=master_staff.id)
				WHERE (master_staff.nik='".$authorized->data->username."' OR master_staff_petugas.nik='".$authorized->data->username."' )
			";
			$result_schedule = $this->db->query($sql);
			if($result_schedule->num_rows()) {
				$row = $result_schedule->row();
				
				$sql = "SELECT * FROM master_kelolaan 
						LEFT JOIN master_kelolaan_detail ON (master_kelolaan_detail.id_kelolaan=master_kelolaan.id)
						WHERE master_kelolaan.id='".$row->id_lokasi."'";
				$result_kelolaan = $this->db->query($sql);
				if($result_kelolaan->num_rows()>0) {
					$kelolaan = $result_kelolaan->result();
					$authorized = $this->Authorization()->data;
					// print_r($row);
					$today = date("Y-m-d");
					$sql = "SELECT * FROM trans_clean WHERE date='$today' AND pic='$row->koord'";
					$res = $this->db->query($sql);
					if(!$res->num_rows()) {
						$data = [
							'date' => date("Y-m-d"),
							'timestamp'  => date("Y-m-d H:i:s"),
							'pic'  => $row->pic,
							'id_lokasi'  => $row->id_lokasi,
						];
						if (!$this->db->insert('trans_clean', $data)) {
							$response = [
								'status' => 500,
								'error' => false,
								'messages' => 'Error query trans_clean',
								'data' => [
									'profile' => $authorized
								]
							];
						} else {
							$inserted_id = $this->db->insert_id();
							$data = array();
							foreach($kelolaan as $r) {
								$data[] = array(
									'id_detail' => $inserted_id,
									'id_kelolaan_detail' => $r->id,
									'timestamp' => date("Y-m-d H:i:s"),
									'timestamp' => date("Y-m-d H:i:s")
								);
							}
					
							$this->db->insert_batch('trans_clean_detail', $data);
							
							$response = [
								'status' => 200,
								'error' => false,
								'messages' => 'Success generated schedule',
								'data' => [
									'profile' => $authorized
								]
							];
						}
					}  else {
						$response = [
							'status' => 200,
							'error' => false,
							'messages' => 'Schedule already generated 2',
							'data' => [
								'profile' => $authorized
							]
						];
					}
				}
			} else {
				$response = [
                    'status' => 500,
                    'error' => true,
                    'messages' => 'No data',
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
}