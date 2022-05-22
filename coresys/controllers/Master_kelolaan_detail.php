<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_kelolaan_detail extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->load->model('Datatables_model', 'datatables');
		$this->data['that'] = $this;
	}
	
	public function index($id) {
		$this->data['id'] = $id;
        return view('pages/master_kelolaan_detail/index', $this->data);
	}
	
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$data = array();
		foreach($_REQUEST['id'] as $tid) {
			$data[] = array(
				"id_kelolaan" => $_REQUEST['id_kelolaan'],
				"tid" => $tid,
			);
		}
		
		if($id==null){
			// INSERT
			if (!$this->db->insert_batch('master_kelolaan_detail', $data)) {
				echo 'error';
			}
			echo 'success';
		}
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('master_kelolaan_detail');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	}
	
	public function delete_selected() {
		$data = $_REQUEST['id'];
		
		$this->db->where('id', $data);
        $result = $this->db->delete('master_kelolaan_detail');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	}
	
	public function json() {
		if(count($this->uri->segment_array())>2) {
			$id_kelolaan = $this->uri->segment(3);
		} else {
			$id_kelolaan = "";
		}
		
		$query = "SELECT *, master_kelolaan_detail.id as id FROM (SELECT master_kelolaan_detail.id, master_kelolaan_detail.id_kelolaan, master_kelolaan_detail.tid as tid2 FROM master_kelolaan_detail) as master_kelolaan_detail LEFT JOIN master_atm ON (master_kelolaan_detail.tid2=master_atm.tid)";
		
		$param['query'] 		= trim($query);
		$param['column_order'] 	= array(null, 'id');
		$param['column_search'] = array('master_atm.tid');
		$param['order'] 		= array('master_kelolaan_detail.id' => 'desc');
		// $param['where'] 		= array(array('merk_mesin' => 'DN Series 200V FL'), array('kanwil' => 'DENPASAR'));
		$param['where'] 		= array(array('master_kelolaan_detail.id_kelolaan'=>$id_kelolaan));
		
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
			$url = base_url().'/master_kelolaan_detail';
			$list[$key]['no'] = $no;
			$list[$key]['id'] = $rows->id;
			$list[$key]['tid'] = $rows->tid;
			$list[$key]['alamat'] = $rows->alamat;
			$list[$key]['cabang'] = $rows->cabang;
			$list[$key]['action'] = "
				<center><a onclick='deleteAction(\"".$url."/delete/".$rows->id."\")' class='btn btn-danger btn-sm zoomsmall' style='background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; ' src='".BASE_LAYOUT."/img/del.png'/>Delete</a></center>";
			
			$key++;
		}
		
		$out['data'] = $list;
		
		header('Content-Type: application/json');
		echo json_encode( $out );
	}
	
	public function json_select_atm() {
		$query = "SELECT * FROM (SELECT * FROM master_atm WHERE tid NOT IN (SELECT tid FROM master_kelolaan_detail)) as master_atm";
		
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
			$url = base_url().'/master_kelolaan_detail';
			$list[]= array(
				$rows->tid,
				$rows->kanwil,
				$rows->alamat,
				$rows->tid,
			);
		}
		
		$out['data'] = $list;
		
		header('Content-Type: application/json');
		echo json_encode( $out );
	}
}