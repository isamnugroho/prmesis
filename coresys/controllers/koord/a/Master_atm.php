<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_atm extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->load->model('Datatables_model', 'datatables');
		$this->data['that'] = $this;
	}
	
	public function index() {
        return view('pages/master_atm/index', $this->data);
	}
	
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = $this->input->post('id');
		$data = array(
			"tid" 			=> $this->input->post('tid'),
			"merk_mesin"	=> $this->input->post('merk_mesin'),
			"type_mesin"	=> $this->input->post('type_mesin'),
			"sn_mesin" 		=> $this->input->post('sn_mesin'),
			"kanwil" 		=> $this->input->post('kanwil'),
			"cabang" 		=> $this->input->post('cabang'),
			"nama_unit"		=> $this->input->post('nama_unit'),
			"lokasi" 		=> $this->input->post('lokasi'),
			"zonasi" 		=> $this->input->post('zonasi'),
			"alamat" 		=> $this->input->post('alamat'),
			"kelurahan"		=> $this->input->post('kelurahan'),
			"kecamatan"		=> $this->input->post('kecamatan'),
			"kabupaten"		=> $this->input->post('kabupaten'),
			"keterangan"	=> $this->input->post('keterangan'),
			"pic"			=> $this->input->post('pic'),
			"hp_pic" 		=> $this->input->post('hp_pic'),
		);
		
		if($id==null){
			// INSERT
			if (!$this->db->insert('master_atm', $data)) {
				echo 'error';
			}
			echo 'success';
		} else {
			// UPDATE
			$this->db->where('id', $id);
			if (!$this->db->update('master_atm', $data)) {
				echo 'error';
			}
			echo 'success';
		}
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('master_atm');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	}
	
	public function json() {
		$query = "SELECT * FROM master_atm";
		
		$param['query'] 		= trim($query);
		$param['column_order'] 	= array(null, 'id');
		$param['column_search'] = array('tid', 'kanwil', 'cabang', 'nama_unit', 'lokasi', 'alamat');
		$param['order'] 		= array('id' => 'desc');
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
			$url = base_url().'/master_atm';
			
			$list[$key]['no'] = $no;
			$list[$key]['tid'] = $rows->tid;
			$list[$key]['kanwil'] = $rows->kanwil;
			$list[$key]['cabang'] = $rows->cabang;
			$list[$key]['nama_unit'] = $rows->nama_unit;
			$list[$key]['lokasi'] = $rows->lokasi;
			$list[$key]['alamat'] = trim($rows->alamat);
			$list[$key]['action'] = "<center><a onclick='updateModal(".json_encode($rows).")' class='btn btn-warning btn-sm zoomsmall' style='background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:15px; width:15px; ' src='".BASE_LAYOUT."/img/edit.png'/>Edit</a>
                 <a onclick='deleteAction(\"".$url."/delete/".$rows->id."\")' class='btn btn-danger btn-sm zoomsmall' style='background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; ' src='".BASE_LAYOUT."/img/del.png'/>Delete</a></center>";
			
			$key++;
		}
		
		$out['data'] = $list;
		
		header('Content-Type: application/json');
		echo json_encode( $out );
	}
}