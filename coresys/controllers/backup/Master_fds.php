<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_fds extends CI_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index() {	
		$this->data['active_menu'] = "master_fds";
		
		
		$this->data['active_blok'] = isset($_GET['id_blok']) ? $_GET['id_blok'] : "";
		$this->data['active_atm'] = isset($_GET['id_atm']) ? $_GET['id_atm'] : "";
		
		$this->db->select('*');
		$this->db->from('blok');
		$result = $this->db->get()->result();
		$this->data['blok'] = $result;
		
		$this->data['get_client'] = function($id_blok) {
			$this->db->select('*');
			$this->db->from('client');
			$this->db->where('id_blok', $id_blok);
			$result = $this->db->get()->result();
			
			return $result;
		};
		
		$this->data['get_data_client'] = function($id_client) {
			$this->db->select('*');
			$this->db->from('client');
			$this->db->where('id_client', $id_client);
			$result = $this->db->get()->result();
			
			return $result;
		};
		
		$this->data['get_status_client'] = function($id_client) {
			$this->db->select('*');
			$this->db->from('client');
			$this->db->where('id_client', $id_client);
			$result = $this->db->get()->row();
			
			return $result->status_client;
		};
		
		$this->data['get_ip_client'] = function($id_client) {
			$this->db->select('*');
			$this->db->from('client');
			$this->db->where('id_client', $id_client);
			$result = $this->db->get()->row();
			
			return $result->ip_client;
		};
		
		return view('pages/master_fds/index', $this->data);
	}
}
