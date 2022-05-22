<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Service_stock extends REST_Controller {
	function __construct($config = 'rest') {
        parent::__construct($config);
		$this->load->database();
		
		$this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
	
	function index_get() {
		echo "no function exist";
	}
	
	function data_consume_get() {
		$id_lokasi = $this->input->get('id_lokasi');
		$model = $this->db->query("SELECT * FROM master_inventory WHERE  merk!='BOTH' GROUP BY merk")->result();
	
		// echo "<pre>";
		// print_r($result);
		
		$data = array();
		$i = 0;
		foreach($model as $r) {
			$result = $this->db->query("SELECT * FROM master_inventory WHERE category='consume' AND (merk='$r->merk' OR merk='BOTH')")->result();
			$result = $this->db->query("SELECT *,
				 (SELECT count(*) FROM master_inventory_part_out WHERE id_detail=B.id AND status='available') as stock
				 FROM servicepoint_inventory A 
				 LEFT JOIN master_transaction_out B ON (A.kode_part=B.kode_part)
				 LEFT JOIN master_inventory_part_out C ON (C.id_detail=B.id)
				 WHERE A.category='consume' 
				 AND (A.merk='$r->merk' OR A.merk='BOTH') 
				 AND C.status='available'
				 AND B.id_location='$id_lokasi'
				 GROUP BY A.id ORDER BY A.id ASC")->result();
			// print_r($result);
			// $data['model'][$i] = $r->merk;
			
			$j = 0;
			foreach($result as $rr) {
				$data[$r->merk][$j]['merk'] = $rr->merk;
				$data[$r->merk][$j]['type'] = strtoupper($rr->category);
				$data[$r->merk][$j]['kode'] = $rr->kode_part;
				$data[$r->merk][$j]['nama'] = $rr->nama_part;
				
				$j++;
			}
			// if($data['model']==$r->merk) {
				// $i++;
				// $data['data'][$i] = array(
					// 'kode_part' => $r->kode_part,
					// 'nama_part' => $r->nama_part
				// );
			// }
			
			$i++;
		}
		
		// echo "<pre>";
		// print_r($data);
		
		echo json_encode($data);
	}
	
	function data_module_get() {
		
	}
}