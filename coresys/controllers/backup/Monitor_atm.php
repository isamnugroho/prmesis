<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor_atm extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	public function index() {	
		$status_server = file_get_contents(base_url()."seipkon/json/status.json");
	
		$this->db->select('*');
		$this->db->from('view_crm_state');
		$result = $this->db->get()->result();
		$this->data['client'] = $result;
		$this->data['status_server'] = $status_server;
		$this->data['stasiun'] = $this->db->select('*')->from('blok')->get()->result();
	
		return view('pages/monitor_atm/index', $this->data);
	}
	
	public function proses_server() {
		$status = $_REQUEST['status'];
		file_put_contents("./seipkon/json/status.json", $status);
	}
	
	public function proses_client() {
		$id = $_REQUEST['id'];
		$ip = $_REQUEST['ip'];
		$status = $_REQUEST['status'];
		
		$data = array();
		$data['status_client'] = $status;
		$this->db->where("id_client", $id);
		$result = $this->db->update('client', $data);
	}
	
	public function form_add() {
		return view('pages/monitor_atm/form', $this->data);
	}
	
	public function save() {
		// echo "<pre>";
		// print_r($_REQUEST);
		$id = "NULL";
		$ip = trim($this->input->post("ip"));
		$name = trim($this->input->post("client"));
		$blok = trim($this->input->post("stasiun"));
		if (!empty($ip) || !empty($name) || !empty($blok)) {
			$data = array();
			$data['id_client'] = $id;
			$data['id_blok'] = $blok;
			$data['ip_client'] = $ip;
			$data['name_client'] = $name;
			$result = $this->db->insert('client', $data);
			
			if($result) {
				echo "success";
			} else {
				echo "failed";
			}
		}
	}
	
	public function update() {
		// echo "<pre>";
		// print_r($_REQUEST);
		$id = trim($this->input->post("id"));
		$ip = trim($this->input->post("ip"));
		$name = trim($this->input->post("client"));
		$blok = trim($this->input->post("stasiun"));
		if (!empty($ip) || !empty($name) || !empty($blok)) {
			$data = array();
			$data['id_client'] = $id;
			$data['id_blok'] = $blok;
			$data['ip_client'] = $ip;
			$data['name_client'] = $name;
			$this->db->where("id_client", $id);
			$result = $this->db->update('client', $data);
			
			if($result) {
				echo "success";
			} else {
				echo "failed";
			}
		}
	}
	
	public function delete($id) {
		$this->db->where('id_client', $id);
        $result = $this->db->delete('client');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	} 
	
	public function t() {
		$this->db->select('*');
		$this->db->from('client');
		$result = $this->db->get()->result();
		
		echo "<pre>";
		print_r($result);
	}
	
	public function get_data() {
		
		// if(!isset($_GET['pn']) || !is_numeric($_GET['pn'])){
			// $page = 1;
		// } else {
			// $page = $_GET['pn'];
		// }
		
		// $numofpages = ceil($totalrows / $limit);
		// $limitvalue = $page * $limit - ($limit);
		
		$this->db->limit(10,0);
		$this->db->select('*');
		$this->db->from('client');
		$result = $this->db->get()->result();
		$no = 0;
		$start = 1;
		
		foreach($result as $row) {
			$ip_client = $row->ip_client;
			$id_client = $row->id_client;
			$status_client = $row->status_client;
			$status = $row->status_client;
			// exec("ping -n 1 $ip_client", $output['ke'.$ip_client], $status);
			// if($status==0) {
				// $cut = explode(":", $output['ke'.$ip_client]['2']);
				// $hasil = trim($cut['0'], " .");
				// switch ($hasil) {
					// case 'Request timed out':
						// $log = "Request timed out";
						// if ($status_client !== "$log") {
						// }
						// $status="<button type='button' class='btn btn-success btn-circle'>
						// <i class='fa fa-times'></i>
						// </button>&nbsp;<font color='#5CB85C'>$log</font>";
					// break;
					// default:
						// $hasil1 = trim($cut['1'], " .");
						// switch ($hasil1) {
							// case 'Destination net unreachable':
								// $log =  "Destination net unreachable";
								// if ($status_client !== "$log") {
									
								// }
								// $status="<button type='button' class='btn btn-success btn-circle'>
								// <i class='fa fa-question-circle'></i>
								// </button>&nbsp;<font color='#5CB85C'>$log</font>";
							// break;
							// case 'Destination host unreachable':
								// $log = "Destination host unreachable";
								// if ($status_client !== "$log") {
									
								// }
								// $status="<button type='button' class='btn btn-success btn-circle'>
								// <i class='fa fa-question-circle'></i>
								// </button>&nbsp;<font color='#5CB85C'>$log</font>";
							// break;
							// default:
								// $log = "Connected";
								// if ($status_client !== "$log") {
									
								// }
								// $status = "<button type='button' class='btn btn-warning btn-circle'>
								// <i class='fa fa-check'></i>
								// </button>&nbsp;<font color='#F0AD4E'>$log</font>";
							// break;
						// }
					// break;
				// }
			// } else {
				// $log = "Disconnected";
				// if ($status_client !== "$log") {
				// }
				// $status="<button type='button' class='btn btn-danger btn-circle'>
				// <i class='fa fa-power-off'></i>
				// </button>&nbsp;<font color='#D9534F'>$log</font>";
			// }
			
			$url = base_url().'monitor_atm';
			$data[] = array(
                "no" => $no+$start,
				"name_client" => $row->name_client, 
				"ip_client" => $row->ip_client, 
				"status" => $status,
				"aksi" => '
				<button class="btn btn-primary btn-sm" data-toggle="modal" onclick="createModalEdit(
					\''.$row->id_client.'\',
					\''.$row->name_client.'\',
					\''.$row->ip_client.'\',
					\''.$row->id_blok.'\'
				)">
					<i class="glyphicon glyphicon-pencil"></i> Edit
				</button>
				<button class="btn btn-danger btn-sm" data-toggle="modal" onclick="deleteAction(\''.$url.'/delete/'.$id_client.'\')"> Hapus
					<i class="glyphicon glyphicon-trash"></i>
				</button>
				'
			);
		}
		
		$output = array(
            "data" => $data
        );
		echo json_encode($output);
        exit();
		
		// $this->output($output);
		// echo json_encode($output);
	}
	
	public function output($return=array()){
		/*Set response header*/
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		/*Final JSON response*/
		exit(json_encode($return));
	}
}
