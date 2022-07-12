<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash_performance extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->load->model('Datatables_model', 'datatables');
		$this->data['that'] = $this;
		
		if($this->data['user_access']['level']=="KOORDINATOR") {
			redirect('koord/dash_performance');
		}
	}
	
	public function index() {
        return view('pages/dash_performance/index', $this->data);
	}
	
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = $this->input->post('id');
		$data = array(
			"id_vendor"	=> $this->input->post('id_vendor'),
			"nik"		=> $this->input->post('nik'),
			"nama"		=> $this->input->post('nama'),
			"alamat"	=> $this->input->post('alamat'),
			"jk"		=> $this->input->post('jk'),
			"hp"		=> $this->input->post('hp'),
			"email"		=> $this->input->post('email')
		);
		
		if($id==null){
			// INSERT
			if (!$this->db->insert('master_staff', $data)) {
				echo 'error';
			}
			echo 'success';
		} else {
			// UPDATE
			$this->db->where('id', $id);
			if (!$this->db->update('master_staff', $data)) {
				echo 'error';
			}
			echo 'success';
		}
	}
	
	public function insert_team() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = $this->input->post('id');
		$data = array(
			"id_koord"	=> $this->input->post('id_koord'),
			"id_vendor"	=> $this->input->post('id_vendor'),
			"nik"		=> $this->input->post('nik'),
			"nama"		=> $this->input->post('nama'),
			"alamat"	=> $this->input->post('alamat'),
			"jk"		=> $this->input->post('jk'),
			"hp"		=> $this->input->post('hp'),
			"email"		=> $this->input->post('email'),
			"id_lokasi"		=> $this->input->post('kanwil')
		);
		
		if($id==null){
			// INSERT
			if (!$this->db->insert('master_staff_petugas', $data)) {
				echo 'error';
			}
			echo 'success';
		} else {
			// UPDATE
			$this->db->where('id', $id);
			if (!$this->db->update('master_staff_petugas', $data)) {
				echo 'error';
			}
			echo 'success';
		}
	}
	
	public function delete($id) {
		$username = $this->db->query("SELECT nik FROM master_staff WHERE id='$id'")->row()->nik;
		
		// echo $username;
		$this->db->where('id', $id);
        $result = $this->db->delete('master_staff');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	}
	
	public function delete_petugas($id) {
		$username = $this->db->query("SELECT nik FROM master_staff_petugas WHERE id='$id'");
		if($username->num_rows() > 0) {
			$this->db->where('username', $username->row()->nik);
			$this->db->delete('master_user');
		}
		
		$this->db->where('id', $id);
        $result = $this->db->delete('master_staff_petugas');
		
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
		
		$query = "SELECT *, master_staff.id as id, master_staff.nama as nama_staff, master_staff.alamat as alamat_staff, master_vendor.nama as nama_vendor, master_staff.id_vendor as vendor_id FROM master_staff LEFT JOIN master_vendor ON (master_staff.id_vendor=master_vendor.id)";
		
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
			$array = $this->db->query("SELECT * FROM master_staff_petugas WHERE id_koord = '$team'")->result_array();
			
			if(count($array)>0) {
				return $array;
			} else {
				return null;
			}
		};
		
		$user = function($nik) {
			$sql = $this->db->query("SELECT * FROM master_user WHERE username='$nik'");
			
			return $sql;
		};
		
		$kelolaan = function($nik) {
			$sql = $this->db->query("SELECT * FROM trans_schedule LEFT JOIN master_kelolaan ON (master_kelolaan.id=trans_schedule.id_lokasi) WHERE trans_schedule.pic='$nik'");
			if($sql->num_rows()==0) {
				return "<p style='color: red'>User belum di set schedule</p>";
			} else {
				$ga = array();
				foreach($sql->result_array() as $r) {
					$ga[] = $r['grup_area'];
				}
				
				$res 	= '<ul style="padding-left: 10px; list-style-type:disc">';
				$res .= '<li>' . implode( '</li><li>', $ga) . '</li>';
				$res .= '</ul>';
				return $res;
			}
		};
		
		
		$key = 0;
		foreach($object as $rows) {
			$no++;
			
			$url = base_url().'/master_staff';
			$list[$key]['no'] = $no;
			$list[$key]['id_vendor'] = $rows->id_vendor;
			$list[$key]['nama_vendor'] = $rows->nama_vendor;
			$list[$key]['nik'] = $rows->nik;
			$list[$key]['nama'] = $rows->nama_staff;
			$list[$key]['kelolaan'] = $kelolaan($rows->nik);
			$list[$key]['team'] = $team($rows->id);
			$list[$key]['action'] = "
				<center>
				<a onclick='listModalPetugas(".json_encode($rows).")' class='btn btn-success btn-sm zoomsmall' style='background: linear-gradient(to bottom, #69c167, #13aa1d);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:15px; width:15px; ' src='".BASE_LAYOUT."/img/adddata.png'/>Detail Petugas</a>
				</center>";
			
			$key++;
		}
		
		$out['data'] = $list;
		
		header('Content-Type: application/json');
		echo json_encode( $out );
	}
	
	public function json_list_petugas() {
		$id_koord = (isset($_REQUEST['id_koord']) ? $_REQUEST['id_koord'] : 0);
		// $query = "SELECT * FROM (SELECT * FROM master_atm WHERE tid NOT IN (SELECT tid FROM master_kelolaan_detail)) as master_atm";
		$query = "
			SELECT *, 
				master_staff_petugas.id as id_petugas,
				master_staff_petugas.nik as nik,
				(
					SELECT count(*) as cnt 
					FROM trans_schedule 
					LEFT JOIN trans_schedule_team ON(trans_schedule_team.id_detail=trans_schedule.id)
					WHERE trans_schedule_team.pic=nik
				) AS total_job_pagi,
				(
					SELECT count(*) as cnt 
					FROM trans_schedule 
					LEFT JOIN trans_schedule_team ON(trans_schedule_team.id_detail=trans_schedule.id)
					LEFT JOIN master_kelolaan_detail ON(master_kelolaan_detail.tid=trans_schedule_team.tid)
					LEFT JOIN trans_clean_detail ON(trans_clean_detail.id_kelolaan_detail=master_kelolaan_detail.id)
					WHERE trans_clean_detail.timestamp LIKE '".date("Y-m-d")."%' 
					AND trans_schedule_team.pic=nik
					AND trans_clean_detail.action_pagi!=''
				) AS done_job_pagi,
				(
					SELECT count(*) as cnt 
					FROM trans_schedule 
					LEFT JOIN trans_schedule_team ON(trans_schedule_team.id_detail=trans_schedule.id)
					WHERE trans_schedule_team.pic=nik
				) AS total_job_sore,
				(
					SELECT count(*) as cnt 
					FROM trans_schedule 
					LEFT JOIN trans_schedule_team ON(trans_schedule_team.id_detail=trans_schedule.id)
					LEFT JOIN master_kelolaan_detail ON(master_kelolaan_detail.tid=trans_schedule_team.tid)
					LEFT JOIN trans_clean_detail ON(trans_clean_detail.id_kelolaan_detail=master_kelolaan_detail.id)
					WHERE trans_clean_detail.timestamp LIKE '".date("Y-m-d")."%' 
					AND trans_schedule_team.pic=nik
					AND trans_clean_detail.action_sore!=''
				) AS done_job_sore
				FROM master_staff_petugas 
				LEFT JOIN master_kelolaan ON (master_kelolaan.id=master_staff_petugas.id_lokasi)";
		
		$param['query'] 		= trim($query);
		$param['column_order'] 	= array(null, 'id');
		$param['column_search'] = array('id');
		$param['order'] 		= array('id' => 'desc');
		// $param['where'] 		= array(array('merk_mesin' => 'DN Series 200V FL'), array('kanwil' => 'DENPASAR'));
		$param['where'] 		= array(array('id_koord'=>$id_koord));
		
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
		
		$user = function($nik) {
			$sql = $this->db->query("SELECT * FROM master_user WHERE username='$nik'");
			
			return $sql;
		};
		
		$key = 0;
		foreach($object as $rows) {
			$no++;
			
			if($user($rows->nik)->num_rows()) {
				$add_acc = "<a onclick='editUserPetugasAccess(".json_encode($user($rows->nik)->row()).")' class='btn btn-primary btn-sm zoomsmall' style='background: linear-gradient(to bottom, #0072ff, #0072ff);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:15px; width:15px; ' src='".BASE_LAYOUT."/img/adddata.png'/>Edit Access</a>";	
			} else {
				$add_acc = "<a onclick='addUserPetugasAccess(".json_encode($rows).")' class='btn btn-primary btn-sm zoomsmall' style='background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:15px; width:15px; ' src='".BASE_LAYOUT."/img/adddata.png'/>Add Access</a>";
			}
			
			$url = base_url().'/master_staff';
			$list[]= array(
				$no,
				$rows->nik,
				$rows->nama,
				$rows->grup_area,
				$rows->done_job_pagi." / ".$rows->total_job_pagi,
				$rows->done_job_sore." / ".$rows->total_job_sore,
			);
		}
		
		$out['data'] = $list;
		
		header('Content-Type: application/json');
		echo json_encode( $out );
	}
}