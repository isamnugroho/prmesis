<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Cro_action extends REST_Controller {
	function __construct($config = 'rest') {
        parent::__construct($config);
		$this->load->database();
		
		$this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
	
	function index_get() {
		echo "no function exist";
	}
	
	function sync_data_get() {
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		$param1 = array(
			'pic' => $id_user
		);

		$this->db->select('cro_master_cashreplenish.*');
		$this->db->from('cro_master_cashreplenish');
		$this->db->join('cro_master_cashreplenish_detail', 'cro_master_cashreplenish.id=cro_master_cashreplenish_detail.id_cashtransit', 'left');
		$this->db->where('cro_master_cashreplenish_detail.status', 'on_progress');
		$this->db->group_by('cro_master_cashreplenish.id');
		$this->db->where($param1);
		$query1 = $this->db->get();

		$param2 = array();
		foreach($query1->result() as $r) {
			$param2[] = $r->id;
		}

		$this->db->select('*');
		$this->db->from('cro_master_cashreplenish_detail');
		$this->db->where('status', 'on_progress');
		$this->db->where_in('id_cashtransit', $param2);
		$query2 = $this->db->get();

		$param3 = array();
		foreach($query2->result() as $r) {
			$param3[] = $r->idatm;
		}

		$this->db->select('*');
		$this->db->from('cro_master_atm');
		// $this->db->where_in('idatm', $param3);
		$query3 = $this->db->get();

		$param4 = array();
		foreach($query3->result() as $r) {
			$param4[] = $r->id_bank;
		}

		$this->db->select('*');
		$this->db->from('cro_master_client');
		$this->db->where_in('id', $param4);
		$query4 = $this->db->get();

		$data = array(
			"cro_master_cashreplenish" 			=> $query1->result(),
			"cro_master_cashreplenish_detail" 	=> $query2->result(),
			"cro_master_atm" 					=> $query3->result(),
			"cro_master_client" 				=> $query4->result(),
		);

		echo json_encode($data);
	}

	function new_job_get() {
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		$query = "
			SELECT *,
			(SELECT COUNT(*) FROM cro_master_cashreplenish_detail WHERE id_cashtransit=cro_master_cashreplenish.id) as total_run,
			(SELECT SUM(nominal) FROM cro_master_cashreplenish_detail WHERE id_cashtransit=cro_master_cashreplenish.id) as total_cash
			FROM cro_master_cashreplenish WHERE pic='$id_user'";

		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();

		// echo json_encode($res);

		$list = array();
		if ($num_rows > 0) {
			$key=0;
			foreach($res as $r) {
				$list[$key]['id'] = $r['id'];
				$list[$key]['tanggal'] = date("d-m-Y", strtotime($r['action_date']));
				$list[$key]['h_min'] = $r['h_min'];
				$list[$key]['run_number'] = $r['run_number'];
				$list[$key]['total_run'] = $r['total_run'];
				$list[$key]['total_cash'] = $r['total_cash'];
				$key++;
			}
		}

		echo json_encode($list);
	}

	function list_job_get() {
		$id_user = $this->input->get('id_user');
		$id_cashtransit = $this->input->get('id_cashtransit');

		$query = "
			SELECT cro_master_cashreplenish_detail.id as id_detail, 
			cro_master_client.nama as nama_client,
			cro_master_cashreplenish_detail.*, 
			cro_master_atm.*
			FROM cro_master_cashreplenish_detail 
			LEFT JOIN cro_master_atm ON (cro_master_atm.idatm=cro_master_cashreplenish_detail.idatm)
			LEFT JOIN cro_master_client ON (cro_master_client.id=cro_master_atm.id_bank)
			WHERE id_cashtransit='$id_cashtransit'
		";

		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();

		echo json_encode($res);
	}

	
	function job_detail_get() {
		$id_user = $this->input->get('id_user');
		$id_detail = $this->input->get('id_detail');

		$query = "
			SELECT cro_master_cashreplenish_detail.id as id_detail, 
			cro_master_client.nama as nama_client,
			cro_master_cashreplenish_detail.*, 
			cro_master_atm.*
			FROM cro_master_cashreplenish_detail 
			LEFT JOIN cro_master_atm ON (cro_master_atm.idatm=cro_master_cashreplenish_detail.idatm)
			LEFT JOIN cro_master_client ON (cro_master_client.id=cro_master_atm.id_bank)
			WHERE cro_master_cashreplenish_detail.id='$id_detail'
		";

		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();

		echo json_encode($res);
	}

	public function tes_post() {
		echo print_r($_REQUEST);
	}

	public function save_job_post() {
		// echo print_r($_REQUEST);
		$id_detail =  $this->input->post('id_detail');
		$data_solve =  $this->input->post('data_solve');

		$data['data_solve']	= $data_solve;
		$data['status']	= "done_replenish";

		$this->db->where('id', $id_detail);
		$res = $this->db->update('cro_master_cashreplenish_detail', $data);

		// echo $this->db->last_query();

		if($res) {
			echo "success";
		} else {
			echo "failed";
		}
	}
}