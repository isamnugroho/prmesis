<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Service_extends extends REST_Controller {
	function __construct($config = 'rest') {
        parent::__construct($config);
		$this->load->database();
		
		$this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
	
	function index_get() {
		echo "A";
	}
	
	function new_jobX_get() {
		// ini_set('display_errors', 1);
		// ini_set('display_startup_errors', 1);
		// error_reporting(E_ALL);
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		$query = "
			SELECT master_atm.*, master_ticket_extends.*, master_ticket_extends.id as ids, master_client.nama as nama_bank FROM master_ticket_extends
			LEFT JOIN master_atm ON(master_atm.idatm=master_ticket_extends.atm_id)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE master_ticket_extends.pic='".$id_user."' AND master_ticket_extends.status!='done'
		";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();
		
		// echo $this->db->last_query();
		// print_r($res);

		if ($num_rows > 0) {
			$list = array();
			$key=0;
			foreach($res as $r) {
				$list[$key]['id'] = $r['ids'];
				$list[$key]['ticket_id'] = $r['ticket_id'];
				$list[$key]['atm_id'] = $r['atm_id'];
				$list[$key]['nama_bank'] = $r['nama_bank'];
				$list[$key]['cabang'] = $r['cabang'];
				$list[$key]['lokasi'] = $r['lokasi'];
				$list[$key]['alamat'] = $r['alamat'];
				
				$key++;
			}
			
			$result['data'] = $list;
		}

		echo json_encode($result);
	}
	
	function new_job_detail_get() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$result = array();
		
		$id = $this->input->get('id');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		// $query2 = "
			// SELECT 
				// *,  
				// master_location_detail.id as id_detail
				// FROM 
					// master_location_detail
						// LEFT JOIN master_atm ON(master_location_detail.id_atm = master_atm.id)
						// WHERE 
							// id_lokasi='$id_lokasi' 
							// AND master_location_detail.id = '$id'
		// ";
		$query = "
			SELECT master_atm.*, master_ticket_extends.*, master_ticket_extends.id as ids, master_client.nama as nama_bank FROM master_ticket_extends
			LEFT JOIN master_atm ON(master_atm.idatm=master_ticket_extends.atm_id)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE master_ticket_extends.pic='$id_user' AND master_ticket_extends.id='$id'
		";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();
		
		echo json_encode($res);
	}
	
	function save_job_post() {
		// print_r($this->input->post());
		
		$id_user = $this->input->post('id_user');
		$id_detail = $this->input->post('id_detail');
		$data_save = $this->input->post('data_save');
		$saved = json_decode($data_save, true);
		
		if($saved['status']!=='pending-sparepart' || $saved['status']!=='pending-pekerjaan') {
			$this->db->set('end_job', date("Y-m-d H:i:s"));
		}
		
		if($saved['status']=='pending-pekerjaan') {
			$r = $this->db->query("SELECT * FROM master_ticket WHERE id='$id_detail'")->row();
			
			$extends_data['id_master'] = $r->id;
			$extends_data['ticket_id'] = $r->ticket_id;
			$extends_data['bank_id'] = $r->bank_id;
			$extends_data['atm_id'] = $r->atm_id;
			$extends_data['service_type'] = $r->service_type;
			$extends_data['problem_type'] = $r->problem_type;
			$extends_data['reported_problem'] = $r->reported_problem;
			$extends_data['reported_by'] = $r->reported_by;
			$extends_data['email_pic'] = $r->email_pic;
			$extends_data['phone_pic'] = $r->phone_pic;
			$extends_data['method_by_email'] = $r->method_by_email;
			$extends_data['method_by_phone'] = $r->method_by_phone;
			$extends_data['entry_date'] = $r->entry_date;
			$extends_data['email_date'] = $r->email_date;
			$extends_data['accept_time'] = null;
			$extends_data['arrival_time'] = null;
			$extends_data['waiting_time'] = null;
			$extends_data['start_job'] = null;
			$extends_data['end_job'] = null;
			$extends_data['leave_time'] = null;
			$extends_data['pic'] = $r->pic;
			$this->db->insert('master_ticket_extends', $extends_data);
		}
		$this->db->set('status', $saved['status']);
		$this->db->set('action_taken', json_encode($saved));
		$this->db->set('remark', $saved['remark']);
		$this->db->set('updated', 'true');
		$this->db->where('id', $id_detail);
		$res = $this->db->update('master_ticket');
		
		if($res) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	function save_akomodation_post() {
		$id_user = $this->input->post('id_user');
		$id_detail = $this->input->post('id_detail');
		$data_save = $this->input->post('data_save');
		
		$ticket_id = $this->db->query("SELECT ticket_id FROM master_ticket_extends WHERE id='$id_detail'")->row()->ticket_id;
		$atm_id = $this->db->query("SELECT atm_id FROM master_ticket_extends WHERE id='$id_detail'")->row()->atm_id;
		$kode_costing = $this->db->query("SELECT kode_costing FROM finance_costing WHERE atm_id='$atm_id'")->row()->kode_costing;
		$job_order = $this->db->query("SELECT job_order FROM finance_costing WHERE atm_id='$atm_id'")->row()->job_order;
		
		$data['id_extends'] = $id_detail;
		$data['date'] = date("Y-m-d H:i:s");
		$data['ticket_id'] = $ticket_id;
		$data['kode_costing'] = $kode_costing;
		$data['job_order'] = $job_order;
		$data['detail'] = $data_save;
		$data['job_type'] = "extends";
		$data['	status'] = "new request";
		
		$this->db->where('id_extends', $id_detail);
		$q = $this->db->get('finance_akomodation');
		if ($q->num_rows() > 0) {
			$this->db->where('id_extends', $id_detail);
			$res = $this->db->update('finance_akomodation', $data);
		} else {
			$this->db->set('id_extends', $id_detail);
			$res = $this->db->insert('finance_akomodation', $data);
		}
		
		
		echo "<pre>";
		print_r($data);
		// $kode_costing = $this->db->query("SELECT kode_costing FROM finance_costing WHERE atm_id='$idatm'")->row()->kode_costing;
			// $job_order = $this->db->query("SELECT job_order FROM finance_costing WHERE atm_id='$idatm'")->row()->job_order;
			
			// $this->db->where('ticket_id', $ticket_id);
			// $q = $this->db->get('finance_akomodation');
			
			// $data_n['kode_costing'] = $kode_costing;
			// $data_n['job_order'] = $job_order;
			// if ($q->num_rows() > 0) {
				// $this->db->where('ticket_id', $ticket_id);
				// $res = $this->db->update('finance_akomodation', $data_n);
			// } else {
				// $this->db->set('ticket_id', $ticket_id);
				// $res = $this->db->insert('finance_akomodation', $data_n);
			// }
		
		// $this->db->where('ticket_id', $ticket_id);
		// $q = $this->db->get('finance_akomodation');
		// if ($q->num_rows() > 0) {
			// $this->db->where('ticket_id', $ticket_id);
			// $res = $this->db->update('finance_akomodation', $data);
		// } else {
			// $this->db->set('ticket_id', $ticket_id);
			// $res = $this->db->insert('finance_akomodation', $data);
		// }
		
		// if($res) {
			// echo "success";
		// } else {
			// echo "failed";
		// }
	}
	
	function validate_date($value) {
		$value = date("Y-m-d G", strtotime($value));
		// echo "zona waktu dari server: " . date('Y-m-d G:i:s') . " \n";
		// echo $value. " \n";
 
		$tz = 'Asia/Jakarta';
		$dt = new DateTime("now", new DateTimeZone($tz));
		$timestamp_wib = $dt->format('Y-m-d G');
		 
		$tz = 'Asia/Makassar';
		$dt = new DateTime("now", new DateTimeZone($tz));
		$timestamp_wita = $dt->format('Y-m-d G');
		 
		$tz = 'Asia/Jayapura';
		$dt = new DateTime("now", new DateTimeZone($tz));
		$timestamp_wit = $dt->format('Y-m-d G');
		
		if($value==$timestamp_wib) {
			return "WIB";
		} else if($value==$timestamp_wita) {
			return "WITA";
		} else if($value==$timestamp_wit) {
			return "WIT";
		} else {
			return false;
		}
	}
	
	function acc_newjob_get() {
		$id = $this->input->get('id');
		$date = $this->input->get('date');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$tz = $this->validate_date($date);
		
		if($tz=="WIB" || $tz=="WITA" || $tz=="WIT") {
			$this->db->set('accept_time', date("Y-m-d H:i:s"));
			$this->db->set('updated', 'true');
			$this->db->where('id', $id);
			$res = $this->db->update('master_ticket_extends');

			if($res) {
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "INVALID TIME DEVICE!";
		}
	}
	
	function arrive_job_get() {
		$id = $this->input->get('id');
		$date = $this->input->get('date');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$tz = $this->validate_date($date);
		
		if($tz=="WIB" || $tz=="WITA" || $tz=="WIT") {
			$this->db->set('arrival_time', date("Y-m-d H:i:s"));
			$this->db->set('updated', 'true');
			$this->db->where('id', $id);
			$res = $this->db->update('master_ticket_extends');

			if($res) {
				// echo $this->db->last_query();
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "INVALID TIME DEVICE!";
		}
	}
	
	function stop_waiting_get() {
		$id = $this->input->get('id');
		$date = $this->input->get('date');
		$time = $this->input->get('time');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$tz = $this->validate_date($date);
		
		if($tz=="WIB" || $tz=="WITA" || $tz=="WIT") {
			$this->db->set('waiting_time', $time);
			$this->db->set('updated', 'true');
			$this->db->where('id', $id);
			$res = $this->db->update('master_ticket_extends');

			if($res) {
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "INVALID TIME DEVICE!";
		}
	}
	
	function start_job_get() {
		$id = $this->input->get('id');
		$date = $this->input->get('date');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$tz = $this->validate_date($date);
		
		if($tz=="WIB" || $tz=="WITA" || $tz=="WIT") {
			$this->db->set('start_job', date("Y-m-d H:i:s"));
			$this->db->set('updated', 'true');
			$this->db->where('id', $id);
			$res = $this->db->update('master_ticket_extends');

			if($res) {
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "INVALID TIME DEVICE!";
		}
	}
	
	function leave_job_get() {
		$id = $this->input->get('id');
		$date = $this->input->get('date');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$tz = $this->validate_date($date);
		
		if($tz=="WIB" || $tz=="WITA" || $tz=="WIT") {
			$this->db->set('leave_time', date("Y-m-d H:i:s"));
			$this->db->set('updated', 'true');
			$this->db->where('id', $id);
			$res = $this->db->update('master_ticket_extends');

			if($res) {
				// echo $this->db->last_query();
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "INVALID TIME DEVICE!";
		}
	}
}