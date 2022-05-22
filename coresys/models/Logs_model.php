<?php
	class Logs_model extends CI_Model {
		public $user_id;
		public $username;
		public $ip_address;
		public $menu_access;
		public $accesstype;
		public $oldvalue;
		public $newvalue;
		public $type;
		public $message;
		
		public function insert($data = array(), $act = false) {
			$this->user_id 		= (isset($data['user_id']) ? $data['user_id'] : "");
			$this->username 	= (isset($data['username']) ? $data['username'] : "");
			$this->ip_address 	= (isset($data['ip_address']) ? $data['ip_address'] : "");
			$this->menu_access 	= (isset($data['menu_access']) ? $data['menu_access'] : "");
			$this->accesstype 	= (isset($data['accesstype']) ? $data['accesstype'] : "");
			$this->oldvalue 	= (isset($data['oldvalue']) ? $data['oldvalue'] : "");
			$this->newvalue 	= (isset($data['newvalue']) ? $data['newvalue'] : "");
			$this->type 		= (isset($data['type']) ? $data['type'] : "");
			$this->message 		= (isset($data['message']) ? $data['message'] : "");
			
			if($act==true) {
				$this->db->insert('logs', $this);
			} else {
				echo "<pre>";
				print_r($this);
			}
		}
		
		public function tes() {
			echo "<pre>";
			print_r($this);
		}
	}