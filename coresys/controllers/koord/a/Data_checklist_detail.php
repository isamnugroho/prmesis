<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_checklist_detail extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->load->model('Datatables_model', 'datatables');
		$this->data['that'] = $this;
	}
	
	public function index() {
        return view('pages/data_checklist_detail/index', $this->data);
	}
	
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = $this->input->post('id');
		$data = array(
			"id_detail"		=> $this->input->post('id_detail'),
			"list"			=> $this->input->post('list'),
		);
		
		if($id==null){
			// INSERT
			if (!$this->db->insert('master_checklist_detail', $data)) {
				echo 'error';
			}
			echo 'success';
		} else {
			// UPDATE
			$this->db->where('id', $id);
			if (!$this->db->update('master_checklist_detail', $data)) {
				echo 'error';
			}
			echo 'success';
		}
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('master_checklist_detail');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	}
	
	public function json() {
		if(count($this->uri->segment_array())>2) {
			$id_detail = $this->uri->segment(3);
		} else {
			$id_detail = "";
		}
		
		$query = "SELECT * FROM master_checklist_detail";
		
		$param['query'] 		= trim($query);
		$param['column_order'] 	= array(null, 'id');
		$param['column_search'] = array('list');
		$param['order'] 		= array('id' => 'desc');
		// $param['where'] 		= array(array('merk_mesin' => 'DN Series 200V FL'), array('kanwil' => 'DENPASAR'));
		$param['where'] 		= array(array('id_detail'=>$id_detail));
		
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
			$url = base_url().'/data_checklist_detail';
			$list[$key]['no'] = $no;
			$list[$key]['id'] = $rows->id;
			$list[$key]['list'] = $rows->list;
			$list[$key]['action'] = "
				<center><a onclick='deleteAction(\"".$url."/delete/".$rows->id."\")' class='btn btn-danger btn-sm zoomsmall' style='background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; ' src='".BASE_LAYOUT."/img/del.png'/>Delete</a></center>";
			
			$key++;
		}
		
		$out['data'] = $list;
		
		header('Content-Type: application/json');
		echo json_encode( $out );
	}
}