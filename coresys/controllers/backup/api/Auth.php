<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Auth extends REST_Controller {
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
	
	function check_password_get() {
		// print_r($_REQUEST);
		
		$username = $this->input->get('username');
		$password = $this->input->get('password');
		
		$this->db->select('
			master_staff.id,
			master_staff.nik,
			master_staff.nama,
			master_staff.jk,
			master_user.username,
			master_user.password,
			master_location.id as id_area,
			master_location.name as area,
			master_location.tz as time_zone,
		');
		$this->db->from('master_staff');
		$this->db->where('master_user.username', $username);
		// $this->db->where('master_user.password', $password);
		$this->db->join('master_user', 'master_staff.nik = master_user.username');
		$this->db->join('trans_schedule', 'master_staff.id = trans_schedule.id_petugas');
		$this->db->join('master_location', 'trans_schedule.id_lokasi = master_location.id');
		$query = $this->db->get();
		$num_rows = $query->num_rows();
		$res = $query->row();
		
		if ($num_rows > 0) {
			$hash = $res->password;
			
			if (password_verify($_REQUEST['password'], $hash)) {
				echo "true";
			} else {
				echo "false";
			}
		}
	}
	
	function change_password_get() {
		// print_r($_REQUEST);
		
		$username = $this->input->get('username');
		$password = password_hash($this->input->get('password'), PASSWORD_BCRYPT, ['cost' => 12]);
		
		$this->db->select('
			master_staff.id,
			master_staff.nik,
			master_staff.nama,
			master_staff.jk,
			master_user.username,
			master_user.password,
			master_location.id as id_area,
			master_location.name as area,
			master_location.tz as time_zone,
		');
		$this->db->from('master_staff');
		$this->db->where('master_user.username', $username);
		// $this->db->where('master_user.password', $password);
		$this->db->join('master_user', 'master_staff.nik = master_user.username');
		$this->db->join('trans_schedule', 'master_staff.id = trans_schedule.id_petugas');
		$this->db->join('master_location', 'trans_schedule.id_lokasi = master_location.id');
		$query = $this->db->get();
		$num_rows = $query->num_rows();
		$res = $query->row();
		
		if ($num_rows > 0) {
			$hash = $res->password;
			
			if (password_verify($_REQUEST['old_password'], $hash)) {
				$this->db->where('id', $res->id);
				$res = $this->db->update('master_user', array('password' => $password));
				
				if($res) {
					echo "success";
				} else {
					echo "failed";
				}
			}
		}
	}
	
	function login_admin_get() {
		// print_r($_REQUEST);
		$post = explode(":", $_REQUEST['auth_key']);
		$pass_adm = $_REQUEST['password'];
		$user_adm = $post[0];
		if(($s = sizeof($post)) % 2 !== 0) {
			$user = $post[floor($s/2)];
		}
		$key = $post[2];
		
		// echo $user_adm;
		
		$this->db->select('
			master_staff.id,
			master_staff.nik,
			master_staff.nama,
			master_staff.jk,
			master_user.username,
			master_user.password,
			master_location.id as id_area,
			master_location.name as area,
			master_location.tz as time_zone,
		');
		$this->db->from('master_staff');
		$this->db->where('master_user.username', $user);
		$this->db->join('master_user', 'master_staff.nik = master_user.username');
		$this->db->join('trans_schedule', 'master_staff.id = trans_schedule.id_petugas');
		$this->db->join('master_location', 'trans_schedule.id_lokasi = master_location.id');
		$query = $this->db->get();
		$num_rows = $query->num_rows();
		$res = $query->row();
		
		$last_query = str_replace(array("\n","\r"), ' ', $this->db->last_query());
		$result['query'] = $last_query;
		
		if (password_verify($user_adm, "$2y$12$4EVSg4ZD6vnVv4sD9COi8.mxzGWNQ07di1QaGZbYSkPI.3jfx9iXu")) {
			// echo "~~~ADMIN MODE~~~\n";
			if (password_verify($key, "$2y$12$9SgTlB.sgn7MvBaivjiz..tTam4etMXGuj8J.VH3oEcC.8Ajvm.Fa")) {
				// echo "~~~KEY VALID~~~\n";
				if ($num_rows > 0) {
					$hash = '$2y$12$3OI3Y0F0ifC8MiJvGxlQ0.5Izl4mQNE/DxSzJ46x7i8DZya/MEc2G';
					if (password_verify($pass_adm, $hash)) {
						// echo "~~~PASSWORD VALID~~~\n";
						$user = [
							"id"=>$res->id, 
							"nik"=>$res->nik, 
							"nama"=>$res->nama, 
							"jk"=>$res->jk, 
							"username"=>$res->username, 
							"id_area"=>$res->id_area,
							"area"=>$res->area,
							"time_zone"=>$res->time_zone,
							"mode"=>"ADMIN",
						];
						
						$result['data'] = $user;
						
						$data_send = $this->input->get();
						$result['data_send'] = $data_send;
						$result['status'] = "found";
					} else {
						// echo "!!!PASSWORD INVALID!!!\n";
						$data_send = $this->input->get();
						$result['data_send'] = $data_send;
						$result['status'] = "invalidpassword";
					}
				} else {
					$data_send = $this->input->get();
					$result['data_send'] = $data_send;
					$result['status'] = "notfound";
				}
			} else {
				// echo "!!!KEY INVALID!!!\n";
			}
		} else {
			// echo "!!!ACCESS INVALID!!!\n";
		}
		
		echo json_encode($result);
	}
	
	function login_get() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$result = array();
		
		// print_r($this->input->get());
		
		$username = $this->input->get('username');
		$password = $this->input->get('password');
		$token = $this->input->get('token');
		
		$chk = explode("-", $username);
		
		if($chk[0]=="CLE" || $chk[0]=="CRO") {
			$delimit = strtolower($chk[0]);
			
			$tbl_staff = $delimit.'_master_staff';
			$tbl_user = $delimit.'_master_user';
			$tbl_location = $delimit.'_master_location';
			$tbl_schedule = $delimit.'_trans_schedule';
		
			$this->db->select("
				$tbl_staff.id,
				$tbl_staff.nik,
				$tbl_staff.nama,
				$tbl_staff.jk,
				$tbl_user.username,
				$tbl_user.password,
				$tbl_location.id as id_area,
				$tbl_location.name as area,
				$tbl_location.tz as time_zone,
			");
			$this->db->from($tbl_staff);
			$this->db->where("$tbl_user.username", $username);
			$this->db->join($tbl_user, "$tbl_staff.nik = $tbl_user.username");
			$this->db->join($tbl_schedule, "$tbl_staff.id = $tbl_schedule.id_petugas");
			$this->db->join($tbl_location, "$tbl_schedule.id_lokasi = $tbl_location.id");
			$query = $this->db->get();
			$num_rows = $query->num_rows();
			$res = $query->row();
			
			$last_query = str_replace(array("\n","\r"), ' ', $this->db->last_query());
			$result['query'] = $last_query;
			
			if ($num_rows > 0) {
				$hash = $res->password;
				
				if (password_verify($_REQUEST['password'], $hash)) {
					// $this->db->where('username', $username);
					$this->db->where('id', $res->id);
					$this->db->update($tbl_user, array('token' => $token));
					
					$user = [
						"id"=>$res->id, 
						"nik"=>$res->nik, 
						"nama"=>$res->nama, 
						"jk"=>$res->jk, 
						"username"=>$res->username, 
						"id_area"=>$res->id_area,
						"area"=>$res->area,
						"time_zone"=>$res->time_zone,
						"mode"=>"USER",
						"page"=>"home-".$delimit,
					];
					
					$result['data'] = $user;
					
					$data_send = $this->input->get();
					$result['data_send'] = $data_send;
					$result['status'] = "found";
				} else {
					$data_send = $this->input->get();
					$result['data_send'] = $data_send;
					$result['status'] = "invalidpassword";
				}
			} else {
				$data_send = $this->input->get();
				$result['data_send'] = $data_send;
				$result['status'] = "notfound";
			}
		} else {
			$delimit = strtolower($chk[0]);
			$tbl_staff = 'master_staff';
			$tbl_user = 'master_user';
			$tbl_location = 'master_location';
			$tbl_schedule = 'trans_schedule';
		
			$this->db->select("
				$tbl_staff.id,
				$tbl_staff.nik,
				$tbl_staff.nama,
				$tbl_staff.jk,
				$tbl_user.username,
				$tbl_user.password,
				$tbl_location.id as id_area,
				$tbl_location.name as area,
				$tbl_location.tz as time_zone,
			");
			$this->db->from($tbl_staff);
			$this->db->where("$tbl_user.username", $username);
			$this->db->join($tbl_user, "$tbl_staff.nik = $tbl_user.username");
			$this->db->join($tbl_schedule, "$tbl_staff.id = $tbl_schedule.id_petugas");
			$this->db->join($tbl_location, "$tbl_schedule.id_lokasi = $tbl_location.id");
			$query = $this->db->get();
			$num_rows = $query->num_rows();
			$res = $query->row();
			
			$last_query = str_replace(array("\n","\r"), ' ', $this->db->last_query());
			$result['query'] = $last_query;
			
			if ($num_rows > 0) {
				$hash = $res->password;
				
				if (password_verify($_REQUEST['password'], $hash)) {
					// $this->db->where('username', $username);
					$this->db->where('id', $res->id);
					$this->db->update($tbl_user, array('token' => $token));
					
					$user = [
						"id"=>$res->id, 
						"nik"=>$res->nik, 
						"nama"=>$res->nama, 
						"jk"=>$res->jk, 
						"username"=>$res->username, 
						"id_area"=>$res->id_area,
						"area"=>$res->area,
						"time_zone"=>$res->time_zone,
						"mode"=>"USER",
						"page"=>"home-".$delimit,
					];
					
					$result['data'] = $user;
					
					$data_send = $this->input->get();
					$result['data_send'] = $data_send;
					$result['status'] = "found";
				} else {
					$data_send = $this->input->get();
					$result['data_send'] = $data_send;
					$result['status'] = "invalidpassword";
				}
			} else {
				$data_send = $this->input->get();
				$result['data_send'] = $data_send;
				$result['status'] = "notfound";
			}
		}
		
		echo json_encode($result);
	}
	
	function get_location_get() {
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		$impl = $this->input->get('impl');
		$callback = $this->input->get('callback');
		
		$this->push($impl, $callback, $id_user);
	}
	
	function get_version_get() {
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		$impl = $this->input->get('impl');
		$callback = $this->input->get('callback');
		
		$this->push($impl, "APPS Version : ". $callback, $id_user);
	}
	
	public function push($title, $body, $id_user) {
		$result = $this->db->query("SELECT token, username FROM master_user WHERE (level='ADMIN') AND ( token!='' OR  token IS NOT NULL)")->result();
		
		$registration_ids = array();
		foreach($result as $r) {
			$registration_ids[] = $r->token;
		}
		
		$this->db->from('master_staff');
		$this->db->where('master_user.id', $id_user);
		$this->db->join('master_user', 'master_staff.nik = master_user.username');
		$query = $this->db->get();
		$res = $query->row();
		
		// $msg = $body." <br> ".$res->nama." (".$res->nik.")";
		$msg = $body;
			
		if($res) {
			$this->push_notif($registration_ids, $title, $msg);
		} 
	}
	
	public function push_notif($registration_ids, $title, $body) {
		define('AUTHORIZATION_KEY', 'AAAAC0m9HsM:APA91bHCPkEQ1KUdBBQlYsPBXVjWj1yYgTMEFwmqFlyNqelLvA8XNDHeUI_376g4MUF13ItCLZcXL9pjgIknvuOdr2MvWN7BgWxVwvVF63HKZdQUr5ajHR9wbN4LyMOs_1O3hyoB4U9A');
		
		$title = $title;
		$body = $body;
		
		$type = ($data['status']=="priority") ? "priority" : "alarm2";
		$channel = ($data['status']=="priority") ? "my_channel_id1" : "my_channel_id2";
		
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
		
		print_r($result);
	}
}