<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_kelolaan extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->load->model('Datatables_model', 'datatables');
		$this->data['that'] = $this;
	}
	
	public function index() {
        return view('pages/master_kelolaan/index', $this->data);
	}
	
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = $this->input->post('id');
		$data = array(
			"id_vendor"		=> $this->input->post('id_vendor'),
			"kanwil"		=> $this->input->post('kanwil'),
			"grup_area"		=> $this->input->post('grup_area'),
			"time_zone"		=> $this->input->post('time_zone')
		);
		
		if($id==null){
			// INSERT
			if (!$this->db->insert('master_kelolaan', $data)) {
				echo 'error';
			}
			echo 'success';
		} else {
			// UPDATE
			$this->db->where('id', $id);
			if (!$this->db->update('master_kelolaan', $data)) {
				echo 'error';
			}
			echo 'success';
		}
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('master_kelolaan');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	}
	
	public function json() {
		$query = "SELECT master_kelolaan.*, master_vendor.nama as nama_vendor FROM master_kelolaan LEFT JOIN master_vendor ON (master_kelolaan.id_vendor=master_vendor.id)";
		
		$param['query'] 		= trim($query);
		$param['column_order'] 	= array(null, 'id');
		$param['column_search'] = array('master_vendor.nama_vendor');
		$param['order'] 		= array('master_kelolaan.id' => 'desc');
		// $param['where'] 		= array(array('merk_mesin' => 'DN Series 200V FL'), array('kanwil' => 'DENPASAR'));
		$param['where'] 		= array();
		
		$param['param'] = json_encode($param);
		$param['post'] 	= $_REQUEST;
		
		$data = $this->datatables->check($param);
		
		$r = json_decode($data, true);
		
		$out = array();
		$list = array();
		$out['draw'] = $r['draw'];
		$out['recordsTotal'] = $r['recordsTotal'];
		$out['recordsFiltered'] = $r['recordsFiltered'];
		$no = (isset($_REQUEST['start']) ? $_REQUEST['start'] : 0);
        $data = array();
		$object = json_decode(json_encode($r['data']), FALSE);
		
		
		$key = 0;
		foreach($object as $rows) {
			$no++;
			$url = base_url().'/master_kelolaan';
			$url2 = 'master_kelolaan_detail/index';
			$list[$key]['no'] = $no;
			$list[$key]['nama_vendor'] = $rows->nama_vendor;
			$list[$key]['kanwil'] = $rows->kanwil;
			$list[$key]['grup_area'] = $rows->grup_area;
			$list[$key]['time_zone'] = $rows->time_zone;
			$list[$key]['action'] = "
				<center>
				<a href='".$url2."/".$rows->id."' class='btn btn-warning btn-sm zoomsmall' style='background: linear-gradient(to top, #44a08d, #093637);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:15px; width:15px;' src='".BASE_LAYOUT."/img/whiteloc.png'/>Detail Area</a>
				<a onclick='updateModal(".json_encode($rows).")' class='btn btn-warning btn-sm zoomsmall' style='background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:15px; width:15px; ' src='".BASE_LAYOUT."/img/edit.png'/>Edit</a>
				<a onclick='deleteAction(\"".$url."/delete/".$rows->id."\")' class='btn btn-danger btn-sm zoomsmall' style='background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; ' src='".BASE_LAYOUT."/img/del.png'/>Delete</a></center>";
			
			$key++;
		}
		
		$out['data'] = $list;
		
		header('Content-Type: application/json');
		echo json_encode( $out );
	}
}