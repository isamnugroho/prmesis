<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Uploads extends CI_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	public function index() {
		echo "POST<br>";
		print_r($_REQUEST);
		print_r($_FILES);
		
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		
		$thn = date("Y");
		$bln = $bulan[(int)date("m")];
		$idatm = $_REQUEST['atm_id'];
		$idticket = $_REQUEST['ticket_id'];
		
		// echo $thn." ".$bln;
		
		$dir_tahun = "upload/documentation/".$thn;
		$dir_bulan = $dir_tahun."/".$bln;
		$dir_idatm = $dir_tahun."/".$bln."/".$idatm;
		$dir_idticket = $dir_tahun."/".$bln."/".$idatm."/".$idticket;
		if( is_dir($dir_tahun) === false ) {
			mkdir($dir_tahun);
		}
		if( is_dir($dir_bulan) === false ) {
			mkdir($dir_bulan);
		}
		if( is_dir($dir_idatm) === false ) {
			mkdir($dir_idatm);
		}
		if( is_dir($dir_idticket) === false ) {
			mkdir($dir_idticket);
		}
		
		$new_image_name = $_FILES["foto"]["name"];
		$nama = $this->_uploadImage($new_image_name, $dir_idticket);
		
		echo $nama;
	}
	
	/**
	 * Additional method
	 */
	private function _uploadImage($name, $path) {
		$config['upload_path']          = './upload/foto_atm/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $name;
		$config['overwrite']			= true;
		$config['max_size']             = 1024*1000; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto')) {
			return './upload/documentation/2021/April/40601/BKT2104050001/'.$this->upload->data("file_name");
		}
		
		return "default.jpg";
	}
	
	public function get_data_report($ticket) {
		$query = "
			SELECT *, master_ticket.status as status_ticket FROM master_ticket
			LEFT JOIN master_atm ON(master_atm.idatm=master_ticket.atm_id)
			LEFT JOIN master_client ON(master_client.id=master_ticket.bank_id)
			LEFT JOIN trouble_sub_category ON(trouble_sub_category.sub_category_name=master_ticket.problem_type)
			LEFT JOIN trouble_category ON(trouble_category.id=trouble_sub_category.id_category)
			WHERE master_ticket.ticket_id='".$ticket."'
		";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->row();
		
		// echo "<pre>";
		// print_r($res);
		$this->data['res'] = $res;
		$this->data['base_url'] = base_url();
		$this->data['ticket'] = $ticket;
		return view('pages/report_jobcard/pdf', $this->data);
	}
	
	public function pdf() {
		// print_r($_FILES['pdf']['tmp_name']);
		$ticket = $_REQUEST['ticket'];
		
		move_uploaded_file($_FILES['pdf']['tmp_name'], "upload/jobcard/".$ticket.".pdf");
	}
}