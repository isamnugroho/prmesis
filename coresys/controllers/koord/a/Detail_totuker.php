<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_totuker extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->load->model('Datatables_model', 'datatables');
		$this->data['that'] = $this;
	}
	
	public function index() {
        return view('pages/detail_totuker/index', $this->data);
	}
	
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = $this->input->post('id');
		$data = array(
			"username"	=> $this->input->post('username'),
			"password"	=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			"level"		=> $this->input->post('level')
		);
		
		if($id==null){
			// INSERT
			if (!$this->db->insert('detail_totuker', $data)) {
				echo 'error';
			}
			echo 'success';
		} else {
			if($this->input->post('password')!=="") {
				$data = array(
					"password"	=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					"level"		=> $this->input->post('level')
				);
			} else {
				$data = array(
					"level"		=> $this->input->post('level')
				);
			}
			// UPDATE
			$this->db->where('id', $id);
			if (!$this->db->update('detail_totuker', $data)) {
				echo 'error';
			}
			echo 'success';
		}
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('detail_totuker');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	}
	
	public function json() {
		if(count($this->uri->segment_array())>2) {
			$id_vendor = $this->uri->segment(3);
		} else {
			$id_vendor = "";
		}
		
		$query = "SELECT *, detail_totuker.id as id, master_staff.nama as nama_staff, master_staff.alamat as alamat_staff, master_vendor.nama as nama_vendor, master_staff.id_vendor as vendor_id, master_staff.id as id_staff FROM detail_totuker LEFT JOIN master_staff ON (detail_totuker.username=master_staff.nik) LEFT JOIN master_vendor ON (master_staff.id_vendor=master_vendor.id)";
		
		$param['query'] 		= trim($query);
		$param['column_order'] 	= array(null, 'id');
		$param['column_search'] = array('master_staff.nik');
		$param['order'] 		= array('master_staff.id' => 'desc');
		// $param['where'] 		= array(array('merk_mesin' => 'DN Series 200V FL'), array('kanwil' => 'DENPASAR'));
		if($id_vendor!=="") {
			$param['where'] 		= array(array('master_staff.id_vendor[!]'=>'0'), array('master_staff.id_vendor'=>$id_vendor));
		} else {
			$param['where'] 		= array(array('master_staff.id_vendor[!]'=>'0'));
		}
		
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
		
		$team = function($team) {
			$array = $this->db->query("SELECT *, detail_totuker.id as id, master_staff_petugas.nama as nama_staff, master_staff_petugas.alamat as alamat_staff, master_vendor.nama as nama_vendor, master_staff_petugas.id_vendor as vendor_id, master_staff_petugas.id as id_staff FROM detail_totuker LEFT JOIN master_staff_petugas ON (detail_totuker.username=master_staff_petugas.nik) LEFT JOIN master_vendor ON (master_staff_petugas.id_vendor=master_vendor.id) WHERE master_staff_petugas.id_koord = '$team'")->result_array();
			
			if(count($array)>0) {
				return $array;
			} else {
				return null;
			}
		};
		
		
		$key = 0;
		foreach($object as $rows) {
			$no++;
			$url = base_url().'/detail_totuker';
			$list[$key]['no'] = $no;
			$list[$key]['nama_vendor'] = $rows->nama_vendor;
			$list[$key]['nik'] = $rows->nik;
			$list[$key]['nama'] = $rows->nama_staff;
			$list[$key]['level'] = $rows->level;
			$list[$key]['alamat'] = $rows->alamat_staff;
			$list[$key]['team'] = $team($rows->id_staff);
			$list[$key]['action'] = "
				<center>
				<a onclick='createModalTeam(".json_encode($rows).")' class='btn btn-success btn-sm zoomsmall' style='background: linear-gradient(to bottom, #69c167, #13aa1d);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:15px; width:15px; ' src='".BASE_LAYOUT."/img/adddata.png'/>Add Team User</a>
				<a onclick='updateModal(".json_encode($rows).")' class='btn btn-warning btn-sm zoomsmall' style='background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:15px; width:15px; ' src='".BASE_LAYOUT."/img/edit.png'/>Edit</a>
				<a onclick='deleteAction(\"".$url."/delete/".$rows->id."\")' class='btn btn-danger btn-sm zoomsmall' style='background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; ' src='".BASE_LAYOUT."/img/del.png'/>Delete</a></center>";
			
			$key++;
		}
		
		$out['data'] = $list;
		
		header('Content-Type: application/json');
		echo json_encode( $out );
	}
}