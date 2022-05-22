<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Service_action extends REST_Controller {
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
	
	function new_jobX_get() {
		// ini_set('display_errors', 1);
		// ini_set('display_startup_errors', 1);
		// error_reporting(E_ALL);
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		// $query = "
			// SELECT master_atm.*, master_ticket.*, master_ticket.id as ids, master_client.nama as nama_bank FROM master_ticket
			// LEFT JOIN master_atm ON(master_atm.idatm=master_ticket.atm_id)
			// LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			// WHERE master_ticket.pic='".$id_user."' AND accept_time IS NULL
		// ";
		
		$query = "
			SELECT *, master_ticket.id as ids, primary_table.status as status, master_client.nama as nama_bank FROM master_ticket_detail primary_table 
			LEFT JOIN master_ticket ON(master_ticket.ticket_id=primary_table.ticket_id)
			LEFT JOIN master_atm ON(master_atm.idatm=master_ticket.atm_id)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank), 
			(SELECT MAX(id) as pId FROM master_ticket_detail GROUP BY ticket_id) second_table
			WHERE primary_table.id = second_table.pId 
			AND primary_table.pic='".$id_user."'
			AND primary_table.accept_time IS NULL
			ORDER BY primary_table.id DESC
 		";
		
		// echo $query."<br>";
		
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
				$list[$key]['tanggal'] = date("d/m/Y", strtotime($r['entry_date']));
				$list[$key]['ticket_id'] = $r['ticket_id'];
				$list[$key]['atm_id'] = $r['atm_id'];
				$list[$key]['nama_bank'] = $r['nama_bank'];
				$list[$key]['cabang'] = $r['cabang'];
				$list[$key]['lokasi'] = $r['lokasi'];
				$list[$key]['alamat'] = $r['alamat'];
				$list[$key]['merk_mesin'] = $r['merk_mesin'];
				
				$key++;
			}
			
			$result['data'] = $list;
		}

		echo json_encode($result);
	}
	
	function job_list_get() {
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		// $query = "
			// SELECT master_atm.*, master_ticket.*, master_ticket.id as ids, master_client.nama as nama_bank FROM master_ticket
			// LEFT JOIN master_atm ON(master_atm.idatm=master_ticket.atm_id)
			// LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			// WHERE master_ticket.pic='".$id_user."' AND master_ticket.accept_time IS NOT NULL AND master_ticket.end_job IS NULL AND master_ticket.status!='pending-pekerjaan'
		// ";

		// $query = "
			// SELECT master_atm.*, master_ticket.*, master_ticket.id as ids, master_client.nama as nama_bank FROM master_ticket
			// LEFT JOIN master_ticket_detail ON(master_ticket_detail.ticket_id=master_ticket.ticket_id)
			// LEFT JOIN master_atm ON(master_atm.idatm=master_ticket.atm_id)
			// LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			// WHERE master_ticket.pic='".$id_user."' AND master_ticket.accept_time IS NOT NULL AND master_ticket.end_job IS NULL AND master_ticket.status!='pending-pekerjaan'
		// ";

		$query = "
			SELECT *, master_ticket.id as ids, primary_table.status as status, master_client.nama as nama_bank FROM master_ticket_detail primary_table 
			LEFT JOIN master_ticket ON(master_ticket.ticket_id=primary_table.ticket_id)
			LEFT JOIN master_atm ON(master_atm.idatm=master_ticket.atm_id)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank), 
			(SELECT MAX(id) as pId FROM master_ticket_detail GROUP BY ticket_id) second_table
			WHERE primary_table.id = second_table.pId 
			AND primary_table.pic='".$id_user."'
			AND primary_table.accept_time IS NOT NULL 
			AND primary_table.end_job IS NULL 
		";
		
		// echo $query."<br>";
		
		// $query = $this->db->query($query);
		// $num_rows = $query->num_rows();
		// $res = $query->result_array();
		
		// echo json_encode($res);
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();

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
				$list[$key]['merk_mesin'] = $r['merk_mesin'];
				
				$key++;
			}
			
			$result['data'] = $list;
		}

		echo json_encode($list);
	}
	
	function new_job_detail_get() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$result = array();
		
		$id = $this->input->get('id');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$query = "
			SELECT master_atm.*, master_ticket.*, master_ticket.id as ids, master_client.nama as nama_bank FROM master_ticket
			LEFT JOIN master_atm ON(master_atm.idatm=master_ticket.atm_id)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE master_ticket.pic='$id_user' AND master_ticket.id='$id'
		";
		
		$query = "
			SELECT *, primary_table.id as ids, primary_table.status as status, master_client.nama as nama_bank FROM master_ticket_detail primary_table 
			LEFT JOIN master_ticket ON(master_ticket.ticket_id=primary_table.ticket_id)
			LEFT JOIN master_atm ON(master_atm.idatm=master_ticket.atm_id)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank), 
			(SELECT MAX(id) as pId FROM master_ticket_detail GROUP BY ticket_id) second_table
			WHERE primary_table.id = second_table.pId 
			AND primary_table.pic='$id_user' AND master_ticket.id='$id'
		";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();
		
		echo json_encode($res);
	}
	
	function job_pending_get() {
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		$query = "
			SELECT *, master_ticket.id as id FROM master_ticket LEFT JOIN master_atm ON(master_atm.id=master_ticket.atm_id) 
			WHERE master_ticket.pic='".$id_user."' AND accept_time IS NOT NULL AND end_job IS NOT NULL AND 
			(master_ticket.status='pending-sparepart' OR master_ticket.status='pending')
		";

		$query = "
			SELECT *, master_ticket.id as id, primary_table.status as status FROM master_ticket_detail primary_table 
			LEFT JOIN master_ticket ON(master_ticket.ticket_id=primary_table.ticket_id)
			LEFT JOIN master_atm ON(master_atm.idatm=master_ticket.atm_id), 
			(SELECT MAX(id) as pId FROM master_ticket_detail GROUP BY ticket_id) second_table
			WHERE primary_table.id = second_table.pId 
			AND primary_table.pic='".$id_user."'
			AND primary_table.accept_time IS NOT NULL 
			AND primary_table.end_job IS NOT NULL 
			AND (
				primary_table.status='pending-sparepart' OR 
				primary_table.status='pending-pekerjaan'
			)
		";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();
		
		echo json_encode($res);
	}
	
	function key_pending_get() {
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		$query = "
			SELECT *, master_request_key.id as id, master_request_key.status as status FROM master_request_key LEFT JOIN master_atm ON(master_atm.id=master_request_key.atm_id) 
			WHERE master_request_key.pic='".$id_user."' AND master_request_key.key_close=''
		";

		// $query = "
			// SELECT *, master_ticket.id as id, primary_table.status as status FROM master_ticket_detail primary_table 
			// LEFT JOIN master_ticket ON(master_ticket.ticket_id=primary_table.ticket_id)
			// LEFT JOIN master_atm ON(master_atm.idatm=master_ticket.atm_id), 
			// (SELECT MAX(id) as pId FROM master_ticket_detail GROUP BY ticket_id) second_table
			// WHERE primary_table.id = second_table.pId 
			// AND primary_table.pic='".$id_user."'
			// AND primary_table.accept_time IS NOT NULL 
			// AND primary_table.end_job IS NOT NULL 
			// AND (
				// primary_table.status='pending-sparepart' OR 
				// primary_table.status='pending-pekerjaan'
			// )
		// ";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();
		
		echo json_encode($res);
	}
	
	function job_done_get() {
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		$query = "
			SELECT *, master_ticket.id as id FROM master_ticket LEFT JOIN master_atm ON(master_atm.id=master_ticket.atm_id) 
			WHERE master_ticket.pic='".$id_user."' AND accept_time IS NOT NULL AND end_job IS NOT NULL AND 
			(master_ticket.status='done') AND master_ticket.entry_date > '2021-04-30 23:59:59'
		";

		$query = "
			SELECT *, master_ticket.id as id, primary_table.status as status FROM master_ticket_detail primary_table 
			LEFT JOIN master_ticket ON(master_ticket.ticket_id=primary_table.ticket_id), 
			(SELECT MAX(id) as pId FROM master_ticket_detail GROUP BY ticket_id) second_table
			WHERE primary_table.id = second_table.pId 
			AND primary_table.pic='".$id_user."'
			AND primary_table.accept_time IS NOT NULL 
			AND primary_table.end_job IS NOT NULL 
			AND primary_table.status='done'
			AND master_ticket.entry_date > '2021-04-30 23:59:59'
		";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();
		
		// echo json_encode($res);
		
		if ($num_rows > 0) {
			$list = array();
			$key=0;
			$no = 0;
			foreach($res as $r) {
				$no++;
				$list[$key]['no'] = $no;
				$list[$key]['id'] = $r['id'];
				$list[$key]['ticket_id'] = $r['ticket_id'];
				$list[$key]['atm_id'] = $r['atm_id'];
				
				$key++;
			}
			
			$result['data'] = $list;
		}

		echo json_encode($list);
	}
	
	function crud_action($act) {
		$id = $this->input->get('id');
		$date = $this->input->get('date');
		
		$detail = $this->db->query("SELECT *, master_ticket_detail.id as id_detail FROM master_ticket LEFT JOIN master_ticket_detail ON (master_ticket_detail.ticket_id=master_ticket.ticket_id) WHERE master_ticket.id='$id' ORDER BY master_ticket_detail.id DESC")->row();
		
		$num1 = $this->db->query("SELECT * FROM master_ticket_detail WHERE ticket_id='$detail->ticket_id' AND status='OPEN'");
		
		if($num1->num_rows()==0) {
			$data2['ticket_id'] = $detail->ticket_id;
			$data2['pic'] = $detail->pic;
			$this->db->insert('master_ticket_detail', $data2);
		}
		
		$num = $this->db->query("SELECT * FROM master_ticket_detail WHERE ticket_id='$detail->ticket_id' AND status='OPEN'");
		
		$time = date("Y-m-d H:i:s");
		
		if($act=="acc") {
			$data['accept_time']	= $time;
			$data['updated']		= 'true';
			$this->db->where('ticket_id', $detail->ticket_id);
			$this->db->update('master_ticket', $data);
			
			$this->db->set('accept_time', $time);
			$this->db->set('updated', 'true');
			$this->db->where('id', $num->row()->id);
			$res = $this->db->update('master_ticket_detail');
		} else if($act=="arrive") {
			$data['arrival_time']	= $time;
			$data['updated']		= 'true';
			$this->db->where('ticket_id', $detail->ticket_id);
			$this->db->update('master_ticket', $data);
			
			$this->db->set('arrival_time', $time);
			$this->db->set('updated', 'true');
			$this->db->where('id', $num->row()->id);
			$res = $this->db->update('master_ticket_detail');
		} else if($act=="waiting") {
			$data['waiting_time']	= $this->input->get('time');
			$data['updated']		= 'true';
			$this->db->where('ticket_id', $detail->ticket_id);
			$this->db->update('master_ticket', $data);
			
			$this->db->set('waiting_time', $this->input->get('time'));
			$this->db->set('updated', 'true');
			$this->db->where('id', $num->row()->id);
			$res = $this->db->update('master_ticket_detail');
		} else if($act=="start") {
			$data['start_job']		= $time;
			$data['updated']		= 'true';
			$this->db->where('ticket_id', $detail->ticket_id);
			$this->db->update('master_ticket', $data);
			
			$this->db->set('start_job', $time);
			$this->db->set('updated', 'true');
			$this->db->where('id', $num->row()->id);
			$res = $this->db->update('master_ticket_detail');
		}
		
		return $res;
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
	
	public function push($title, $body, $id_user, $menu, $id) {
		$result = $this->db->query("SELECT token, username FROM master_user WHERE (level='SUPER' OR level='ADMIN' OR level='MONITOR' OR level='FINANCE') AND ( token!='' OR  token IS NOT NULL)")->result();
		
		$registration_ids = array();
		foreach($result as $r) {
			$registration_ids[] = $r->token;
		}
		
		$this->db->from('master_staff');
		$this->db->where('master_user.id', $id_user);
		$this->db->join('master_user', 'master_staff.nik = master_user.username');
		$query = $this->db->get();
		$res = $query->row();
		
		$msg = $body." oleh ".$res->nama." (".$res->nik.")";
		
		$data_save['menu']		= $menu;
		$data_save['id_menu']	= $id;
		$data_save['msg']		= $msg;
		$data_save['status'] 	= "unread";
		$res = $this->db->insert('notify', $data_save);
			
		if($res) {
			$this->push_notif($registration_ids, $title, $msg);
		} 
	}
	
	public function push_notif($registration_ids, $title, $body) {
		define('AUTHORIZATION_KEY', 'AAAAC0m9HsM:APA91bHCPkEQ1KUdBBQlYsPBXVjWj1yYgTMEFwmqFlyNqelLvA8XNDHeUI_376g4MUF13ItCLZcXL9pjgIknvuOdr2MvWN7BgWxVwvVF63HKZdQUr5ajHR9wbN4LyMOs_1O3hyoB4U9A');
		
		$title = $title;
		$body = $body;
		
		// $type = ($data['status']=="priority") ? "priority" : "alarm2";
		// $channel = ($data['status']=="priority") ? "my_channel_id1" : "my_channel_id2";
		
		$fields = array(
			'registration_ids' => $registration_ids,
			'data' => array(
				'notification' => array(
					"body" => $body,
					"title"=> $title,
				)
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
	}
	
	function acc_newjob_get() {
		$id = $this->input->get('id');
		$atm_id = $this->input->get('atm_id');
		$date = $this->input->get('date');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$tz = $this->validate_date($date);
		
		if($tz=="WIB" || $tz=="WITA" || $tz=="WIT") {
			$res = $this->crud_action("acc");

			if($res) {
				$this->push("Accepted Job", "Job telah diterima", $id_user, "status_ticket", $id);
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
			$res = $this->crud_action("arrive");
			
			$this->clock_in();

			if($res) {
				$this->push("Arrive Job", "Customer Service Engineer telah sampai dilokasi", $id_user, "status_ticket", $id);
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
			$res = $this->crud_action("waiting");

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
			$res = $this->crud_action("start");

			if($res) {
				$this->push("Start Job", "Customer Service Engineer telah sedang melakukan pekerjaan", $id_user, "status_ticket", $id);
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "INVALID TIME DEVICE!";
		}
	}
	
	function save_job_post() {
		// print_r($this->input->post());
		
		$id = $this->input->post('id');
		$id_user = $this->input->post('id_user');
		$id_detail = $this->input->post('id_detail');
		$data_save = $this->input->post('data_save');
		$saved = json_decode($data_save, true);
		
		$detail = $this->db->query("SELECT *, master_ticket_detail.id as id_detail FROM master_ticket LEFT JOIN master_ticket_detail ON (master_ticket_detail.ticket_id=master_ticket.ticket_id) WHERE master_ticket.id='$id' ORDER BY master_ticket_detail.id DESC")->row();
		
		$end_time = date("Y-m-d H:i:s");
		
		$data['accept_time']	= $detail->accept_time;
		$data['arrival_time']	= $detail->arrival_time;
		$data['waiting_time']	= $detail->waiting_time;
		$data['start_job']		= $detail->start_job;
		$data['end_job']		= $end_time;
		$data['status']			= $saved['status'];
		$data['action_taken']	= json_encode($saved);
		$data['remark']			= $saved['remark'];
		$data['updated']		= 'true';
		$this->db->where('ticket_id', $detail->ticket_id);
		$this->db->update('master_ticket', $data);
		
		$this->db->set('end_job', $end_time);
		$this->db->set('status', $saved['status']);
		$this->db->set('action_taken', json_encode($saved));
		$this->db->set('remark', $saved['remark']);
		$this->db->set('updated', 'true');
		$this->db->where('id', $detail->id_detail);
		$res = $this->db->update('master_ticket_detail');
		
		$this->clock_out();
		
		if($res) {
			$this->push("Finish Job", "Customer Service Engineer telah telah selesai melakukan pekerjaan", $id_user, "status_ticket", $id);
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	function update_key_post() {
		// print_r($this->input->post());
		
		$id = $this->input->post('id');
		$key_close = $this->input->post('key_close');
		$status = $this->input->post('status');
		$end_time = date("Y-m-d H:i:s");
		
		$data['key_close']		= $key_close;
		$data['end_job']		= $end_time;
		$data['status']			= $status;
		$this->db->where('id', $id);
		$this->db->update('master_request_key', $data);
		
		if($res) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	function clock_in() {
		$employee_id = $this->input->get('id_user');
		$today_date = date('Y-m-d');
		$curtime = date('Y-m-d H:i:s');
		$ip_address = 'ip_address';
		$latitude = 'latitude';
		$longitude = 'longitude';
		
		$query = "";
		
		$check = $this->db->query("SELECT attendance_date, time_attendance_id FROM master_attendance_time WHERE employee_id='$employee_id' AND attendance_date='$today_date' ORDER BY time_attendance_id DESC LIMIT 1");
		if($check->num_rows() < 1) {
			$total_rest = '';
		} else {
			$total_rest = '';
		}

		$data = array(
			'employee_id' => $employee_id,
			'attendance_date' => $today_date,
			'clock_in' => $curtime,
			'clock_in_ip_address' => $ip_address,
			'clock_in_latitude' => $latitude,
			'clock_in_longitude' => $longitude,
			'time_late' => $curtime,
			'early_leaving' => $curtime,
			'overtime' => $curtime,
			'total_rest' => $total_rest,
			'attendance_status' => 'Present (Perjalanan dinas)',
			'clock_in_out' => '1'
		);
		
		if($check->num_rows() < 1) {
			$this->db->insert('master_attendance_time', $data);
		} else {
			$this->db->where('time_attendance_id', $check->row()->time_attendance_id);
			$this->db->update('master_attendance_time', $data);
		}
	}
	
	function clock_out() {
		$employee_id = $this->input->post('id_user');
		$today_date = date('Y-m-d');
		$curtime = date('Y-m-d H:i:s');
		$ip_address = 'ip_address';
		$latitude = 'latitude';
		$longitude = 'longitude';
		
		$query = "";
		
		$check = $this->db->query("SELECT * FROM master_attendance_time where `employee_id` = '$employee_id' and `attendance_date` = '$today_date' ORDER BY time_attendance_id DESC LIMIT 1");
		$num = $check->num_rows();
		
		// echo "SELECT * FROM master_attendance_time where `employee_id` = '$employee_id' and `attendance_date` = '$today_date' ORDER BY time_attendance_id DESC LIMIT 1";

		$total_work_cin =  new DateTime($check->row()->clock_in);
		$total_work_cout =  new DateTime($curtime);
		
		$interval_cin = $total_work_cout->diff($total_work_cin);
		$hours_in   = $interval_cin->format('%h');
		$minutes_in = $interval_cin->format('%i');
		$total_work = $hours_in .":".$minutes_in;
		
		$data = array(
			'employee_id' => $employee_id,
			'clock_out' => $curtime,
			'clock_out_ip_address' => $ip_address,
			'clock_out_latitude' => $latitude,
			'clock_out_longitude' => $longitude,
			'clock_in_out' => '0',
			'early_leaving' => $curtime,
			'overtime' => $curtime,
			'total_work' => $total_work
		);
		
		$id = $check->row()->time_attendance_id;
		$this->db->where('time_attendance_id', $id);
		$this->db->update('master_attendance_time', $data);
	}
	
	function save_akomodation_get() {
		$id = $this->input->get('id');
		$ticket_id = $this->input->get('ticket_id');
		$id_user = $this->input->get('id_user');
		$id_detail = $this->input->get('id_detail');
		$data_save = $this->input->get('data_save');
		
		$row = $this->db->query("SELECT * FROM master_ticket LEFT JOIN finance_costing ON(master_ticket.atm_id=finance_costing.atm_id) WHERE master_ticket.id='$id_detail'")->row();
		$detail = $this->db->query("SELECT * FROM master_ticket_detail WHERE ticket_id='$ticket_id' ORDER BY id DESC")->row();
		
		$data['id_detail'] = $detail->id;
		$data['ticket_id'] = $row->ticket_id;
		$data['kode_costing'] = $row->kode_costing;
		$data['job_order'] = $row->job_order;
		$data['detail'] = $data_save;
		$data['job_type'] = ($detail->status=="OPEN" ? "normal" : $detail->status);
		
		$this->db->where('id_detail', $detail->id);
		$q = $this->db->get('finance_akomodation');
		if ($q->num_rows() > 0) {
			$this->db->where('id_detail', $detail->id);
			$res = $this->db->update('finance_akomodation', $data);
		} else {
			$this->db->set('id_detail', $detail->id);
			$res = $this->db->insert('finance_akomodation', $data);
		}
		
		if($res) {
			$this->push("Costing Job", "Pengajuan Akomodasi telah di submit", $id_user, "costing_job", $id_detail);
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	public function get_costing_get() {
		$id = $this->input->get('id');
		$ticket_id = $this->input->get('ticket_id');
		$id_user = $this->input->get('id_user');
		$id_detail = $this->input->get('id_detail');
		$job_type = $this->input->get('job_type');
		
		$detail = $this->db->query("SELECT * FROM master_ticket_detail WHERE ticket_id='$ticket_id' ORDER BY id DESC")->row();
		$query = $this->db->query("SELECT * FROM finance_akomodation WHERE id_detail='$detail->id'")->row();
		// echo "SELECT * FROM finance_akomodation WHERE id_detail='$detail->id'";
		// print_r(json_decode($query->detail));
		echo $query->detail;
	}
}