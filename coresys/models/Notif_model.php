<?php
	class Notif_model extends CI_Model {
		
		public function notif($id) {
			$to = $this->db->query("SELECT token FROM master_user WHERE id='$id'")->row()->token;
			
			$msg = $this->msg('flm');
			$data['to'] = $to;
			$data['title'] = $msg['title'];
			$data['body'] = $msg['body'];
			$data['status'] = $msg['status'];
			// refresh, get_current_location
			// $data['command'] = "open:lib:refresh";
			
			$res = $this->push($data); 
		}
		
		public function notif_transfer($id) {
			$to = $this->db->query("SELECT token FROM master_user WHERE id='$id'")->row()->token;
			
			$msg = $this->msg('transfer');
			$data['to'] = $to;
			$data['title'] = $msg['title'];
			$data['body'] = $msg['body'];
			$data['status'] = $msg['status'];
			// refresh, get_current_location
			// $data['command'] = "open:lib:refresh";
			
			$res = $this->push($data); 
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
				),
				"transfer" => array(
					"title" => "Costing Job",
					"body" => "Request costing job anda telah di setujui, silahkan cek kembali aplikasi anda",
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
			
			$type = ($data['status']=="priority") ? "priority" : "alarm1";
			$channel = ($data['status']=="priority") ? "my_channel_id1" : "my_channel_id1";
			
			$fields = array(
				'to' => $to,
				'data' => array(
					"notification_foreground"=> "true",
					"notification_android_channel_id"=> "my_channel_id1",
					"notification_android_priority"=> "2",
					"notification_android_visibility"=> "1",
					"notification_android_color"=> "#ff0000",
					"notification_android_smallIcon"=> "thumbs_up",
					"notification_android_icon"=> "thumbs_up",
					"notification_android_sound"=> "blackberry",
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
			
			// echo "<pre>";
			// print_r($fields);
			// print_r($result);
		}
	}