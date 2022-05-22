<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends MY_Controller {

	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
    }
	
	public function index()
	{
		$query = "SELECT * FROM master_user LEFT JOIN master_staff ON(master_staff.nik=master_user.username) WHERE master_user.token IS NOT NULL";
		$result = $this->db->query($query)->result();
		
		$this->data['post'] = $_REQUEST;
		$this->data['result'] = $result;
		
		if(isset($_REQUEST['submit'])) {
			$query = $this->db->query("SELECT * FROM master_user WHERE id='".$_REQUEST['id']."'");
			$row = $query->row();
			
			$data['to'] = $row->token;
			$impl = $_REQUEST['impl'];
			
			$data['command'] = "open:lib:$impl";
			
			$res = $this->push_cmd($data); 
		}
		
		return view('coba', $this->data);
	}
	
	public function check() {
		$user_adm = "administrator";
		$key = "isn";
		$pass_adm = "@admin123";
		
		if (password_verify($user_adm, "$2y$12$4EVSg4ZD6vnVv4sD9COi8.mxzGWNQ07di1QaGZbYSkPI.3jfx9iXu")) {
			echo "~~~ADMIN MODE~~~\n";
			if (password_verify($key, "$2y$12$9SgTlB.sgn7MvBaivjiz..tTam4etMXGuj8J.VH3oEcC.8Ajvm.Fa")) {
				echo "~~~KEY VALID~~~\n";
				// if ($num_rows > 0) {
					$hash = '$2y$12$3OI3Y0F0ifC8MiJvGxlQ0.5Izl4mQNE/DxSzJ46x7i8DZya/MEc2G';
					if (password_verify($pass_adm, $hash)) {
						echo "~~~PASSWORD VALID~~~\n";
					} else {
						echo "!!!PASSWORD INVALID!!!\n";
					}
				// }
			} else {
				echo "!!!KEY INVALID!!!\n";
			}
		} else {
			echo "!!!ACCESS INVALID!!!\n";
		}
	}
	
	
	public function tes()
	{
		$query = "SELECT * FROM master_user LEFT JOIN master_staff ON(master_staff.nik=master_user.username) WHERE master_user.token IS NOT NULL";
		$result = $this->db->query($query)->result();
		
		echo "<h1>NOTIF</h1>";
		echo "<form method='post' action='".base_url()."coba/notif'>";
		echo "<select name='token'>";
		foreach($result as $r) {
			if($r->token!=="mozilla/5.0 (windows nt 10.0; win64; x64; rv:71.0) gecko/20100101 firefox/71.0") {
				echo "<option value='$r->token'>$r->nama</option>";
			}
		}
		echo "</select>";
		echo "<input type='submit' value='SUBMIT'></input>";
		echo "</form>";
		
		
		echo "<h1>CMD</h1>";
		echo "<form method='post' action='".base_url()."coba/cmd'>";
		echo "<select name='token'>";
		foreach($result as $r) {
			if($r->token!=="mozilla/5.0 (windows nt 10.0; win64; x64; rv:71.0) gecko/20100101 firefox/71.0") {
				echo "<option value='$r->token'>$r->nama</option>";
			}
		}
		echo "</select>";
		echo "<input type='submit' value='SUBMIT'></input>";
		echo "</form>";
		
		echo "<h1>LOCATION</h1>";
		echo "<form method='post' action='".base_url()."coba/location'>";
		echo "<select name='token'>";
		foreach($result as $r) {
			if($r->token!=="mozilla/5.0 (windows nt 10.0; win64; x64; rv:71.0) gecko/20100101 firefox/71.0") {
				echo "<option value='$r->token'>$r->nama</option>";
			}
		}
		echo "</select>";
		echo "<input type='submit' value='SUBMIT'></input>";
		echo "</form>";
		// print_r($_REQUEST);
		
		echo "<h1>IMPL</h1>";
		echo "<form method='post' action='".base_url()."coba/impl'>";
		echo "<select name='impl'>";
		echo "<option value='get_current_location'>get_current_location</option>";
		echo "<option value='get_version'>get_version</option>";
		echo "</select>";
		echo "<select name='token'>";
		foreach($result as $r) {
			if($r->token!=="mozilla/5.0 (windows nt 10.0; win64; x64; rv:71.0) gecko/20100101 firefox/71.0") {
				echo "<option value='$r->token'>$r->nama</option>";
			}
		}
		echo "</select>";
		echo "<input type='submit' value='SUBMIT'></input>";
		echo "</form>";
	}
	
	
	public function tes2()
	{
	}
	
	public function notif() {
		$msg = $this->msg('flm');
		$data['to'] = $_REQUEST['token'];
		$data['title'] = $msg['title'];
		$data['body'] = $msg['body'];
		$data['status'] = $msg['status'];
		
		$res = $this->push($data); 
		
		echo $res;
	}
	
	public function impl() {
		$data['to'] = $_REQUEST['token'];
		$impl = $_REQUEST['impl'];
		
		// refresh, get_current_location
		$data['command'] = "open:lib:$impl";
		
		$res = $this->push_cmd($data); 
	}
	
	public function cmd() {
		$data['to'] = $_REQUEST['token'];
		
		// refresh, get_current_location
		$data['command'] = "open:lib:refresh";
		
		$res = $this->push_cmd($data); 
	}
	
	public function location() {
		$data['to'] = $_REQUEST['token'];
		
		// refresh, get_current_location
		$data['command'] = "open:lib:tracking";
		
		$res = $this->push_cmd($data); 
	}
	
	public function notif2() {
		$msg = $this->msg('flm');
		$data['to'] = "fdM5pvlEzE2jGl1E8nBTQe:APA91bHiVCr-EQ7EhE8kvTJmbp7iQo_eCaLsf9o2qCQuZxSAAY2DYdMGX2nRFpUP6lvatK9nSD0sawsBMdUB9klGdQJWpfQ7XjvvYLmy7IsvmVKjJWxNfwrwe_d6sBFmb8pzVSzWstcv";
		$data['title'] = $msg['title'];
		$data['body'] = $msg['body'];
		$data['status'] = $msg['status'];
		
		$res = $this->push2($data); 
		
		echo $res;
	}
	
	public function msg($krit='') {
		$arr = array(
			"cashout" => array(
				"title" => "Prioritas Replenishment",
				"body" => "Prioritas pengisian/replenishment telah dialihkan pada lokasi yang lain, silahkan cek kembali aplikasi anda",
				"status" => "priority"
			),
			"flm" => array(
				"title" => "Request Job",
				"body" => "Request maintenance segera melakukan perbaikan mesin ATM, silahkan cek kembali aplikasi anda",
				"status" => "normal"
			),
			"op" => array(
				"title" => "Request Job",
				"body" => "Request pengisian/replenishment, silahkan cek kembali aplikasi anda",
				"status" => "normal"
			)
		);
		
		return $arr[$krit];
	}
	
	function push($data) {
		define('AUTHORIZATION_KEY', 'AAAAnvWH4cE:APA91bGNmkgFTw4gn0l7DFah6bPVdoY_SiWO-vxEgZpBAkNQATQif_HcW4bFtFW6Q2hLDFVFaxl3lGar-DDfzbgDGwPvj0h_lDAw90NOa75TbN2k_ZuX3YMNoY13eAlTYisR29F6Keo7');

		// print_r($data);
		$to = $data['to'];
		
		$title = $data['title'];
		$body = $data['body'];
		
		$type = ($data['status']=="priority") ? "priority" : "alarm2";
		$channel = ($data['status']=="priority") ? "my_channel_id1" : "alarm2";
		
		$fields = array(
			'to' => $to,
			'data' => array(
				"notification_foreground"=> "true",
				"notification_android_channel_id"=> $channel,
				"notification_android_priority"=> "2",
				"notification_android_visibility"=> "1",
				"notification_android_color"=> "#ff0000",
				"notification_android_smallIcon"=> "thumbs_up",
				"notification_android_icon"=> "thumbs_up",
				"notification_android_sound"=> $type,
				"notification_android_vibrate"=> "500, 200, 500",
				"notification_android_lights"=> "#ffff0000, 250, 250",
			),
			'notification' => array(
				"body" => $body,
				"title"=> $title,
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
		
		echo "<pre>";
		print_r($fields);
		print_r($result);
	}
	
	function push_cmd($data) {
		define('AUTHORIZATION_KEY', 'AAAAnvWH4cE:APA91bGNmkgFTw4gn0l7DFah6bPVdoY_SiWO-vxEgZpBAkNQATQif_HcW4bFtFW6Q2hLDFVFaxl3lGar-DDfzbgDGwPvj0h_lDAw90NOa75TbN2k_ZuX3YMNoY13eAlTYisR29F6Keo7');

		// print_r($data);
		$to = trim($data['to']);
		
		$fields = array(
			'to' => $to,
			'data' => array(
				"command"=> $data['command']
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
		
		// echo "<pre>";
		// // print_r($fields);
		// print_r($result);
		// echo "</pre>";
	}
	
	function push2($data) {
		define('AUTHORIZATION_KEY', 'AAAAnvWH4cE:APA91bGNmkgFTw4gn0l7DFah6bPVdoY_SiWO-vxEgZpBAkNQATQif_HcW4bFtFW6Q2hLDFVFaxl3lGar-DDfzbgDGwPvj0h_lDAw90NOa75TbN2k_ZuX3YMNoY13eAlTYisR29F6Keo7');

		// print_r($data);
		$to = $data['to'];
		
		$title = $data['title'];
		$body = $data['body'];
		
		$type = ($data['status']=="priority") ? "priority" : "alarm2";
		$channel = ($data['status']=="priority") ? "my_channel_id1" : "alarm2";
		
		$fields = array(
			'to' => $to,
			'data' => array(
				"body" => $body,
				"title"=> $title,
				"icon"=> "firebase/itwonders-web-logo.png"
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
		
		echo "<pre>";
		print_r($fields);
		print_r($result);
	}
}
