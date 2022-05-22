<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

class Maps extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index() {	
		$this->data['kelolaan'] = $this->db->get('master_absen_location')->result();
		return view('pages/maps/index', $this->data);
	}
	
	public function get_latlng($id) {
		$res = $this->db->query("select * from master_absen_location where id='$id'")->row();
		// json_decode($res, true);
		
		// echo json_decode(json_encode($res), true);
		
		echo json_encode($res);
	}
	
	public function get_marker_cse($id_lokasi) {
		$res = $this->db->query("
			SELECT * FROM master_staff 
			LEFT JOIN master_user ON(master_user.username=master_staff.nik)
			LEFT JOIN trans_schedule ON(trans_schedule.id_petugas=master_user.id)
			WHERE current_location!='' AND trans_schedule.id_lokasi='$id_lokasi'")->result();
		
		echo json_encode($res);
	}
	
	public function get_marker_atm() {
		$res = $this->db->query("
			SELECT * FROM master_atm WHERE latitude!='' AND longitude!=''
		");
		
		echo json_encode($res);
	}
}
