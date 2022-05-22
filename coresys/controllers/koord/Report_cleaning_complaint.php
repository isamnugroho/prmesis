<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Google\Cloud\Storage\StorageClient;

class Report_cleaning_complaint extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		require_once APPPATH . 'third_party/ssp.php';	
		$this->load->model('Datatables_model', 'datatables');
		$this->data['that'] = $this;
	}
	
	public function index() {
        return view('pages_koord/report_cleaning_complaint/index', $this->data);
		// $date = (isset($_REQUEST['date_daily']) ? $_REQUEST['date_daily'] : "");
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
			if (!$this->db->insert('master_user', $data)) {
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
			if (!$this->db->update('master_user', $data)) {
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
	
	public function json() {
		$date = (isset($_REQUEST['date_daily']) ? 
			DateTime::createFromFormat('d/m/Y', $_REQUEST['date_daily'])->format('Y-m-d')
		: "");
		$kanwil = (isset($_REQUEST['kanwil']) ? 
			$_REQUEST['kanwil']
		: "");
		
		$table = 'trans_clean';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns which should be read and sent back to DataTables.
		// The `db` parameter represents the column name in the database, while the `dt`
		// parameter represents the DataTables column identifier. In this case simple
		// indexes
		$columns = array(
			array( 'db' => '`a`.`date`', 				'dt' => 0, 		'field' => 'date', 
					'formatter' => function( $d, $row ) { 
						return ($d!=="0000-00-00 00:00:00") ? date( 'd-m-Y', strtotime($d)) : ""; 
					} ),
			array( 'db' => '`d`.`tid`', 				'dt' => 1, 		'field' => 'tid' ),
			array( 'db' => '`d`.`kanwil`', 				'dt' => 2, 		'field' => 'kanwil' ),
			array( 'db' => '`d`.`lokasi`', 				'dt' => 3, 		'field' => 'lokasi' ),
			array( 'db' => '`d`.`alamat`',				'dt' => 4, 		'field' => 'alamat' ),
			array( 'db' => '`b`.`daily_report_pagi`',	'dt' => 5,		'field' => 'daily_report_pagi' ),
			array( 'db' => '`b`.`daily_report_sore`',	'dt' => 6, 		'field' => 'daily_report_sore' ),
			// array( 'db' => '`b`.`waktu_pagi`', 			'dt' => 6, 		'field' => 'waktu_pagi', 
					// 'formatter' => function( $d, $row ) { 
						// return ($d!=="0000-00-00 00:00:00") ? date( 'd-m-Y', strtotime($d)) : ""; 
					// } ),
			// array( 'db' => '`b`.`waktu_sore`', 			'dt' => 7, 		'field' => 'waktu_sore', 
					// 'formatter' => function( $d, $row ) { 
						// return ($d!=="0000-00-00 00:00:00") ? date( 'd-m-Y', strtotime($d)) : ""; 
					// } ),
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
						FROM `trans_clean` AS `a` 
						LEFT JOIN `trans_clean_detail` AS `b` ON (`a`.`id` = `b`.`id_detail`)
						LEFT JOIN `master_kelolaan_detail` AS `c` ON (`b`.`id_kelolaan_detail`=`c`.`id`)
						LEFT JOIN `master_atm` AS `d` ON(`c`.`tid`=d.`tid`)
		";
		
		
		if($date!=="") {
			$extraWhere = "
							`a`.`date`='$date' AND 
							`d`.`kanwil` LIKE '%$kanwil%' AND 
							(`b`.`action_pagi`!='' OR `b`.`action_sore`!='') AND
							`b`.`jenis_job`='switch'
			";
		} else {
			$extraWhere = "
							(`b`.`action_pagi`!='' OR `b`.`action_sore`!='')AND
							`b`.`jenis_job`='switch'
			";
		}
		$groupBy = "";
		$having = "";

		echo json_encode(
			SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
		);
	}
	
	public function json2() {
		// $query = "SELECT * FROM master_atm";
		$query = "
			SELECT *, master_atm.tid as tid FROM trans_clean 
			LEFT JOIN trans_clean_detail ON(trans_clean_detail.id_detail=trans_clean.id)
			LEFT JOIN (SELECT id, tid as tid2 FROM master_kelolaan_detail) as master_kelolaan_detail ON(master_kelolaan_detail.id=trans_clean_detail.id_kelolaan_detail)
			LEFT JOIN master_atm ON(master_atm.tid=master_kelolaan_detail.tid2)
		";
		
		$param['query'] 		= trim($query);
		$param['column_order'] 	= array(null, 'master_atm.id');
		$param['column_search'] = array('master_atm.tid', 'master_atm.kanwil', 'master_atm.cabang', 'master_atm.nama_unit', 'master_atm.lokasi', 'master_atm.alamat');
		$param['order'] 		= array('master_atm.id' => 'desc');
		// $param['where'] 		= array(array('merk_mesin' => 'DN Series 200V FL'), array('kanwil' => 'DENPASAR'));
		$param['where'] 		= array(
										array('trans_clean.date' => '2022-01-14'),
										array('trans_clean_detail.date' => '2022-01-14')
									);
		
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
	
	public function get_report2() {
		print_r($_REQUEST);
	}
	public function get_report() {
		
		$objectName = $_REQUEST['objectName'];
		
		// $destination = "./data";
		$storage = new StorageClient([
			'keyFile' => json_decode(file_get_contents('./data/crucial-summer-313307-1beae6e5346d.json'), true)
		]);
		$storage->registerStreamWrapper();
		$contents = file_get_contents('gs://dev-bucket-test-001/'.$objectName);
		
		$file_name  =   basename($objectName);
		//save the file by using base name
		$fn         =   file_put_contents($file_name, $contents);
		header("Expires: 0");
		header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-type: application/file");
		header('Content-length: '.filesize($file_name));
		header('Content-disposition: attachment; filename="'.basename($file_name).'"');
		readfile($file_name);
		
		// $storage = new StorageClient();
		// $bucket = $storage->bucket('dev-bucket-test-001');
		// $object = $bucket->object($objectName);
		// $object->downloadToFile($destination);
		// printf('Downloaded gs://%s/%s to %s' . PHP_EOL,
			// $bucketName, $objectName, basename($destination));
	}
	
	public function get_reportx() {
		
		$objectName = $_REQUEST['objectName'];
		
		// $destination = "./data";
		$storage = new StorageClient([
			'keyFile' => json_decode(file_get_contents('./data/crucial-summer-313307-1beae6e5346d.json'), true)
		]);
		$storage->registerStreamWrapper();
		$contents = file_get_contents('gs://dev-bucket-test-001/'.$objectName);
		
		$file_name1  =   basename($objectName);
		$file_name  =   "view.pdf";
		//save the file by using base name
		$fn         =   file_put_contents($file_name, $contents);
		// header("Expires: 0");
		// header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
		// header("Cache-Control: no-store, no-cache, must-revalidate");
		// header("Cache-Control: post-check=0, pre-check=0", false);
		// header("Pragma: no-cache");
		// header("Content-type: application/file");
		// header('Content-length: '.filesize($file_name));
		// header('Content-disposition: attachment; filename="'.basename($file_name).'"');
		// readfile($file_name);
		
		header("Pragma: public");
		header("Expires: 0");
		header("Accept-Ranges: bytes");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/pdf");
		header('Content-length: '.filesize($file_name));
		header('Content-disposition: inline; filename="'.basename($file_name1).'"');
		header("Content-Transfer-Encoding: binary");
		readfile($file_name);
	}
}