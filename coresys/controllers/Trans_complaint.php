<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Google\Cloud\Storage\StorageClient;

class Trans_complaint extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		require_once APPPATH . 'third_party/ssp.php';	
		$this->load->model('Datatables_model', 'datatables');
		$this->data['that'] = $this;
		
		if($this->data['user_access']['level']=="KOORDINATOR") {
			redirect('koord/trans_complaint');
		}
	}
	
	public function index() {
        return view('pages/trans_complaint/index', $this->data);
		// $date = (isset($_REQUEST['date_daily']) ? $_REQUEST['date_daily'] : "");
	}
	
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$today = date("Y-m-d");
		$data = [
			'date' => $today,
			'timestamp'  => date("Y-m-d H:i:s"),
			'pic'  => $_REQUEST['pic'],
			'id_lokasi'  => $_REQUEST['id_lokasi'],
		];
		
		if (!$this->db->insert('trans_complaint', $data)) {
			echo 'error';
		} else {
			$inserted_id = $this->db->insert_id();
			$data = array(
				'id_detail' => $inserted_id,
				'id_kelolaan_detail' => $_REQUEST['id_kelolaan_detail'],
				'timestamp' => date("Y-m-d H:i:s")
			);
			
			if (!$this->db->insert('trans_complaint_detail', $data)) {
				echo 'error';
			} else {
				echo 'success';
			}
		}
		
		// $id = $this->input->post('id');
		// $data = array(
			// "pic_from"	=> $this->input->post('pic_from'),
			// "pic_to"	=> $this->input->post('pic_to'),
			// "state"		=> $this->input->post('search_by'),
			// "date_from"	=> DateTime::createFromFormat('d/m/Y', explode(" - ", $this->input->post('date_range'))[0])->format('Y-m-d'),
			// "date_to"	=> DateTime::createFromFormat('d/m/Y', explode(" - ", $this->input->post('date_range'))[1])->format('Y-m-d'),
			// "reason"	=> $this->input->post('reason')
		// );
		
		// if($id==null){
			// // INSERT
			// if (!$this->db->insert('trans_complaint', $data)) {
				// echo 'error';
			// }
			// echo 'success';
		// } else {
			// // UPDATE
			// $this->db->where('id', $id);
			// if (!$this->db->update('trans_complaint', $data)) {
				// echo 'error';
			// }
			// echo 'success';
		// }
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('trans_complaint');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	}
	
	// public function generata_
	
	public function json_ssp() {
		$table = 'trans_complaint';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns which should be read and sent back to DataTables.
		// The `db` parameter represents the column name in the database, while the `dt`
		// parameter represents the DataTables column identifier. In this case simple
		// indexes
		$columns = array(
			array( 'db' => '`a`.`date`',				'dt' => 0, 		'field' => 'date' ),
			array( 'db' => '`e`.`kanwil`', 				'dt' => 1, 		'field' => 'kanwil' ),
			array( 'db' => '`d`.`grup_area`',			'dt' => 2, 		'field' => 'grup_area' ),
			array( 'db' => '`e`.`tid`',					'dt' => 3, 		'field' => 'tid' ),
			array( 'db' => '`e`.`lokasi`',				'dt' => 4, 		'field' => 'lokasi' ),
			array( 'db' => '`a`.`pic`',					'dt' => 5, 		'field' => 'pic' ),
			array( 'db' => '`a`.`id`',					'dt' => 6, 		'field' => 'id' ),
		);

		// SQL server connection information
		$sql_details = array(
			"host" 	=> $this->db->hostname,
			"user" 	=> $this->db->username,
			"pass" 	=> $this->db->password,
			"db"	=> $this->db->database,
		);

		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP
		 * server-side, there is no need to edit below this line.
		 */

		$joinQuery = "
			FROM trans_complaint AS a 
			LEFT JOIN trans_complaint_detail AS b ON(a.id=b.id_detail) 
			LEFT JOIN master_kelolaan_detail AS c ON(c.id=b.id_kelolaan_detail) 
			LEFT JOIN master_kelolaan AS d ON(c.id_kelolaan=d.id) 
			LEFT JOIN master_atm AS e ON(e.tid=c.tid) 
		";
		
		
		$extraWhere = "";
		$groupBy = "";
		$having = "";

		echo json_encode(
			SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
		);
	}
	
	public function json() {
		if(count($this->uri->segment_array())>2) {
			$id_vendor = $this->uri->segment(3);
		} else {
			$id_vendor = "";
		}
		
		$query = "
			SELECT *, trans_complaint.id as ids FROM trans_complaint
			LEFT JOIN trans_schedule_team ON(trans_schedule_team.pic=trans_complaint.pic_from)
			LEFT JOIN master_kelolaan_detail ON(master_kelolaan_detail.tid=trans_schedule_team.tid)
			LEFT JOIN master_kelolaan ON(master_kelolaan_detail.id_kelolaan=master_kelolaan.id)
			LEFT JOIN master_atm ON(master_atm.tid=master_kelolaan_detail.tid)
		";
		
		$param['query'] 		= trim($query);
		$param['column_order'] 	= array(null, 'id');
		$param['column_search'] = array('trans_schedule.pic');
		$param['order'] 		= array('trans_schedule.id' => 'desc');
		// $param['where'] 		= array(array('merk_mesin' => 'DN Series 200V FL'), array('kanwil' => 'DENPASAR'));
		if($id_vendor!=="") {
			$param['where'] 		= array(array('master_staff.id_vendor'=>$id_vendor));
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
				<a onclick='createModalAssignedTeam(".json_encode($rows).")' class='btn btn-success btn-sm zoomsmall' style='background: linear-gradient(to bottom, #69c167, #13aa1d);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:15px; width:15px; ' src='".BASE_LAYOUT."/img/adddata.png'/>Assign Team Job</a>
				<a onclick='deleteAction(\"".$url."/delete/".$rows->ids."\")' class='btn btn-danger btn-sm zoomsmall' style='background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; ' src='".BASE_LAYOUT."/img/del.png'/>Delete</a></center>";
			
			// <a onclick='updateModal(".json_encode($rows).")' class='btn btn-warning btn-sm zoomsmall' style='background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:15px; width:15px; ' src='".BASE_LAYOUT."/img/edit.png'/>Edit</a>
				
			
			$key++;
		}
		
		$out['data'] = $list;
		
		header('Content-Type: application/json');
		echo json_encode( $out );
	}
}