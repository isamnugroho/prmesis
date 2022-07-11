<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Google\Cloud\Storage\StorageClient;

class Complain_management extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		require_once APPPATH . 'third_party/ssp.php';	
		$this->load->model('Datatables_model', 'datatables');
		$this->data['that'] = $this;
	}
	
	public function index() {
        return view('pages/complain_management/index', $this->data);
		// $date = (isset($_REQUEST['date_daily']) ? $_REQUEST['date_daily'] : "");
	}
	
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = $this->input->post('id');
		$data = array(
			"pic_from"	=> $this->input->post('pic_from'),
			"pic_to"	=> $this->input->post('pic_to'),
			"state"		=> $this->input->post('search_by'),
			"date_from"	=> DateTime::createFromFormat('d/m/Y', explode(" - ", $this->input->post('date_range'))[0])->format('Y-m-d'),
			"date_to"	=> DateTime::createFromFormat('d/m/Y', explode(" - ", $this->input->post('date_range'))[1])->format('Y-m-d'),
			"reason"	=> $this->input->post('reason')
		);
		
		if($id==null){
			// INSERT
			if (!$this->db->insert('trans_switch', $data)) {
				echo 'error';
			}
			echo 'success';
		} else {
			// UPDATE
			$this->db->where('id', $id);
			if (!$this->db->update('trans_switch', $data)) {
				echo 'error';
			}
			echo 'success';
		}
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('master_user');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	}
	
	// public function generata_
	
	public function json_ssp() {
		$table = 'trans_switch';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns which should be read and sent back to DataTables.
		// The `db` parameter represents the column name in the database, while the `dt`
		// parameter represents the DataTables column identifier. In this case simple
		// indexes
		$columns = array(
			array( 'db' => '`a`.`id`', 					'dt' => 0, 		'field' => 'id' ),
			array( 'db' => '`e`.`kanwil`', 			'dt' => 1, 		'field' => 'kanwil' ),
			array( 'db' => '`d`.`grup_area`',		'dt' => 2, 		'field' => 'grup_area' ),
			array( 'db' => '`a`.`pic_from`', 		'dt' => 3, 		'field' => 'pic_from' ),
			array( 'db' => '`a`.`pic_to`', 			'dt' => 4, 		'field' => 'pic_to' ),
			array( 'db' => '`a`.`date_from`',		'dt' => 5, 		'field' => 'date_from' ),
			array( 'db' => '`a`.`date_to`',			'dt' => 6, 		'field' => 'date_to' ),
			array( 'db' => '`a`.`reason`',			'dt' => 7, 		'field' => 'reason' ),
			array( 'db' => '`a`.`id`', 					'dt' => 8, 		'field' => 'id' ),
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
			FROM trans_switch AS a
			LEFT JOIN trans_schedule_team AS b ON(a.pic_from=b.pic)
			LEFT JOIN master_kelolaan_detail AS c ON(c.tid=b.tid)
			LEFT JOIN master_kelolaan AS d ON(c.id_kelolaan=d.id)
			LEFT JOIN master_atm AS e ON(e.tid=c.tid)
		";
		
		
		$extraWhere = "";
		$groupBy = "b.pic";
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
			SELECT * FROM trans_switch
			LEFT JOIN trans_schedule_team ON(trans_schedule_team.pic=trans_switch.pic_from)
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
				<a onclick='deleteAction(\"".$url."/delete/".$rows->id."\")' class='btn btn-danger btn-sm zoomsmall' style='background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; ' src='".BASE_LAYOUT."/img/del.png'/>Delete</a></center>";
			
			// <a onclick='updateModal(".json_encode($rows).")' class='btn btn-warning btn-sm zoomsmall' style='background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;'><img style='float: left; margin: 1px 5px 0px 0px; height:15px; width:15px; ' src='".BASE_LAYOUT."/img/edit.png'/>Edit</a>
				
			
			$key++;
		}
		
		$out['data'] = $list;
		
		header('Content-Type: application/json');
		echo json_encode( $out );
	}
}