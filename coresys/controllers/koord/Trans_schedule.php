<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trans_schedule extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->load->model('Datatables_model', 'datatables');
		$this->data['that'] = $this;
	}
	
	public function index() {
        return view('pages_koord/trans_schedule/index', $this->data);
	}
	
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = $this->input->post('id');
		$data = array(
			"id_lokasi" 	=> $this->input->post('id_lokasi'),
			"pic"			=> $this->input->post('pic'),
			// "team"			=> (isset($_POST['team']) ? $this->input->post('pic').",".implode(",", $this->input->post('team'))."" : '')
		);
		
		if($this->input->post('pic')!=="") {
			if($id==null){
				// INSERT
				if (!$this->db->insert('trans_schedule', $data)) {
					echo 'error';
				}
				
				// // $id = $this->db->insert_id();
				// $id_koord = $this->db->get_where('master_staff', array('nik' => $this->input->post('pic')))->row()->id;
				// $res = $this->db->get_where('master_staff_petugas', array('id_koord' => $id_koord))->row()->team;
				// $dataa = explode(",", $res);
				// $dataaa=array();
				// foreach($dataa as $r) {
					// $dataaa[] = array(
						// "id_detail" 	=> $id,
						// "pic"			=> $r
					// );
				// }
				// $this->db->insert_batch('trans_schedule_team', $dataaa);
				echo 'success';
			}
		} else {
			echo 'error';
		}
	}
	
	public function insert_assign() {
		// print_r($_REQUEST);
		
		$data = array();
		foreach($_REQUEST['id'] as $tid) {
			$data[] = array(
				"id_detail" => $_REQUEST['id_detail'],
				"tid" => $tid,
				"pic" => $_REQUEST['pic'],
			);
		}
		
		if($id==null){
			// INSERT
			if (!$this->db->insert_batch('trans_schedule_team', $data)) {
				echo 'error';
			}
			echo 'success';
		}
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('trans_schedule');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	}
	
	public function delete_assigned($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('trans_schedule_team');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	}
	
	public function json() {
		// if(count($this->uri->segment_array())>2) {
			// $id_vendor = $this->uri->segment(3);
		// } else {
			// $id_vendor = "";
		// }
		
		$query = "
			SELECT *, trans_schedule.id as id, master_staff.id as id_koord, master_staff.nama as nama_staff, master_vendor.nama as nama_vendor 
			FROM trans_schedule 
			LEFT JOIN master_kelolaan ON (master_kelolaan.id=trans_schedule.id_lokasi)
			LEFT JOIN master_vendor ON (master_vendor.id=master_kelolaan.id_vendor)
			LEFT JOIN master_staff ON (master_staff.nik=trans_schedule.pic)
		";
		
		$param['query'] 		= trim($query);
		$param['column_order'] 	= array(null, 'id');
		$param['column_search'] = array('trans_schedule.pic');
		$param['order'] 		= array('trans_schedule.id' => 'desc');
		$param['where'] 		= array(array('master_staff.nik' => $this->data['user_access']['username']));
		// if($id_vendor!=="") {
			// $param['where'] 		= array(array('master_staff.id_vendor'=>$id_vendor));
		// } else {
			// $param['where'] 		= array();
		// }
		
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
		
		$proj = function($nik) {
			if($nik!=="") {
				// $array = $staff->whereIn('nik', json_decode($team))->find();
				$array = $this->db->query("SELECT *, master_staff_petugas.nik as nik, master_staff_petugas.nama as nama_staff FROM master_staff_petugas LEFT JOIN master_staff ON(master_staff.id=master_staff_petugas.id_koord) WHERE master_staff.nik='$nik'")->result_array();
				$output = array();
				foreach ($array as $subarray) { $output[] = "Username : ".$subarray['nik']."<br> Nama : ".$subarray['nama_staff']; }
				// return implode(", ", $output);
				// return implode("<br>", $output);
				// return '<ul style="list-style-type:disc; margin-left: 10px"><li style="display: list-item;">' . implode( '</li><li>', $output) . '</li></ol>';
				return '<ul style="list-style-type:list; margin-left: 10px"><li style="display: list-item;">' . implode( '</li><li>', $output) . '</li></ol>';
			}
			
			return null;
		};
		
		$key = 0;
		foreach($object as $rows) {
			$no++;
			$team = "";
			if($rows->team!=="") {
				$team = $rows->team;
			}
			$url = base_url().'/trans_schedule';
			$list[$key]['no'] = $no;
			$list[$key]['nama_vendor'] = $rows->nama_vendor;
			$list[$key]['kanwil'] = $rows->kanwil;
			$list[$key]['grup_area'] = $rows->grup_area;
			$list[$key]['pic'] = "Username : ".$rows->pic."<br>"."Nama : ".$rows->nama_staff;
			$list[$key]['team'] = $proj($rows->pic);
			$list[$key]['action'] = "
				<center>
				<a onclick='createModalAssignedTeam(".json_encode($rows).")' class='btn btn-success btn-sm zoomsmall' style='background: linear-gradient(to bottom, #69c167, #13aa1d);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:15px; width:15px; ' src='".BASE_LAYOUT."/img/adddata.png'/>Assign Team Job</a></center>";
			
			// <a onclick='updateModal(".json_encode($rows).")' class='btn btn-warning btn-sm zoomsmall' style='background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:15px; width:15px; ' src='".BASE_LAYOUT."/img/edit.png'/>Edit</a>
				
			
			$key++;
		}
		
		$out['data'] = $list;
		
		header('Content-Type: application/json');
		echo json_encode( $out );
	}
	
	public function json_assigned() {
		if(count($this->uri->segment_array())>2) {
			$pic = $this->uri->segment(4);
		} else {
			$pic = "";
		}
		
		$query = "
			SELECT *, trans_schedule_team.id as id
			FROM (
				SELECT 
				trans_schedule_team.id, 
				trans_schedule_team.id_detail, 
				trans_schedule_team.pic, 
				trans_schedule_team.tid as tid2 
				FROM trans_schedule_team
			) as trans_schedule_team 
			LEFT JOIN master_atm ON (trans_schedule_team.tid2=master_atm.tid)
		";
		
		$param['query'] 		= trim($query);
		$param['column_order'] 	= array(null, 'id');
		$param['column_search'] = array('tid');
		$param['order'] 		= array('trans_schedule_team.id' => 'desc');
		if($id_vendor!=="") {
			$param['where'] 		= array(array('trans_schedule_team.pic'=>$pic));
		} else {
			$param['where'] 		= array();
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
		
		$key = 0;
		foreach($object as $rows) {
			$no++;
			$url = base_url().'/koord/trans_schedule';
			$list[$key]['no'] = $no;
			$list[$key]['tid'] = $rows->tid;
			$list[$key]['alamat'] = trim($rows->alamat);
			$list[$key]['action'] = "
				<center>
				<a onclick='deleteAssignedAction(\"".$url."/delete_assigned/".$rows->id."\")' class='btn btn-danger btn-sm zoomsmall' style='background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; ' src='".BASE_LAYOUT."/img/del.png'/>Delete</a></center>";
			
			// <a onclick='updateModal(".json_encode($rows).")' class='btn btn-warning btn-sm zoomsmall' style='background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:15px; width:15px; ' src='".BASE_LAYOUT."/img/edit.png'/>Edit</a>
				
			
			$key++;
		}
		
		$out['data'] = $list;
		
		header('Content-Type: application/json');
		echo json_encode( $out );
	}
	
	public function json_select_atm() {
		$id_lokasi = (isset($_REQUEST['id_lokasi']) ? $_REQUEST['id_lokasi'] : 0);
		// $query = "SELECT * FROM (SELECT * FROM master_atm WHERE tid NOT IN (SELECT tid FROM master_kelolaan_detail)) as master_atm";
		$query = "SELECT * FROM (SELECT * FROM master_atm WHERE tid NOT IN (SELECT tid FROM trans_schedule_team)) as master_atm
					LEFT JOIN master_kelolaan_detail ON (master_kelolaan_detail.tid=master_atm.tid)
		";
		
		$param['query'] 		= trim($query);
		$param['column_order'] 	= array(null, 'id');
		$param['column_search'] = array('master_atm.tid', 'kanwil', 'cabang', 'nama_unit', 'lokasi', 'alamat');
		$param['order'] 		= array('master_atm.id' => 'desc');
		// $param['where'] 		= array(array('merk_mesin' => 'DN Series 200V FL'), array('kanwil' => 'DENPASAR'));
		$param['where'] 		= array(array('master_kelolaan_detail.id_kelolaan'=>$id_lokasi));
		
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