<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Api_json extends REST_Controller {
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
	
	public function json_get() {
		header('Content-Type: application/json');
		$sql = "SELECT * FROM trans_clean";
		$result = $this->db->query($sql);
		
		$db = array();
		$db['database'] 	= "premesis-db";
		$db['version'] 		= 1;
		$db['encrypted'] 	= false;
		$db['mode'] 			= "partial";
		
		$tbl = array("trans_clean", "trans_clean_detail");
		$table = array();
		$oi = array();
		foreach($tbl as $k => $tb) {
			// echo $tb;
			$fields = $this->db->list_fields($tb);
			$table['name']   = $tb;
			foreach ($fields as $j => $field) {
				// echo $field . "<br/>";
				
				if($field=="id") {
					$value = "INTEGER PRIMARY KEY NOT NULL";
				} else if($field=="id_detail") {
					$value = "INTEGER";
				} else if($field=="last_modified") {
					$value = "INTEGER DEFAULT (strftime('%s', 'now'))";
				} else {
					$value = "TEXT";
				}
				
				$table['schema'][$j]["column"] = $field;
				$table['schema'][$j]["value"] = $value;
				
				if($j+1==count($fields)) {
					if($tb=="trans_clean_detail") {
						$table['schema'][$j+1]["foreignkey"] = "id_detail";
						$table['schema'][$j+1]["value"] = "REFERENCES trans_clean(id)";
					}
				}
			}
			$oi[$k] = $table;
		}
		
		// $table['value'] = array(1,2,3,4,5);
		// $oi[0] = $table;
		
		// $this->db->where('pic', 'SKS-02');
		$query = $this->db->get("trans_clean");
		$tablex = array();
		$data = array();
		foreach ($query->result_array() as $k => $row) {
			$data = array(
				$row['id'],
				$row['date'],
				$row['timestamp'],
				$row['pic'],
				$row['id_lokasi'],
				$row['action'],
				$row['jenis_pekerjaan'],
				// $row['last_modified']
				strtotime(date('d-m-y h:i:s'))
			);
			$tablex[] = $data;
		}
		$oi[0]['values'] = $tablex;
		
		// $this->db->like('timestamp', '2022-07-12', 'right');
		$query = $this->db->get("trans_clean_detail");
		$tablex = array();
		$data = array();
		foreach ($query->result_array() as $k => $row) {
			$datax = array(
				$row['id'],
				$row['id_detail'],
				$row['id_kelolaan_detail'],
				$row['timestamp'],
				$row['waktu_pagi'],
				$row['action_pagi'],
				$row['waktu_sore'],
				$row['action_sore'],
				$row['daily_report_pagi'],
				$row['daily_report_sore'],
				$row['ttd_petugas_pagi'],
				$row['ttd_petugas_sore'],
				$row['ttd_pic_pagi'],
				$row['ttd_pic_sore'],
				$row['withness_pagi'],
				$row['withness_sore'],
				$row['remark_pagi'],
				$row['remark_sore'],
				$row['jenis_job'],
				// $row['last_modified'],
				strtotime(date('d-m-y h:i:s'))
			);
			// echo count($query->result_array())."<br>";
			// $dataxx = array();
			// if($k+1==count($query->result_array())) {
				
				// );
			// }
			
			// print_r($dataxx);
			
			$tablex[] = $datax;
		}
		$oi[1]['values'] = $tablex;
		
		
		$db['tables'] = $oi;
		
		// echo "<pre>";
		// print_r($db);
		echo json_encode($db);
	}
	
	public function json_get2() {
		header('Content-Type: application/json');
		$sql = "SELECT * FROM trans_clean";
		$result = $this->db->query($sql);
		
		$tbl = array("trans_clean", "trans_clean_detail");
		
		$db = array();
		$db['database'] 	= "premesis";
		$db['version'] 		= 1;
		$db['encrypted'] 	= false;
		$db['mode'] 			= "full";
		
		$table = array();
		$table['name']   = "trans_clean";
		$fields = $this->db->list_fields('trans_clean');
		foreach ($fields as $field) {
				// echo $field . "<br/>";
				$table['schema'][] = array(
															"column" => $field
														);
		}
		
		$table2 = array();
		$table2['name']   = "trans_clean_detail";
		$fields = $this->db->list_fields('trans_clean');
		foreach ($fields as $field) {
				// echo $field . "<br/>";
				$table2['schema'][] = array(
															"column" => $field
														);
		}
		
		$db['table'] = $table;
		
		
		// echo "<pre>";
		echo json_encode($db);
	}
}