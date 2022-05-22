<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Maps extends REST_Controller {
	function __construct($config = 'rest') {
        parent::__construct($config);
		$this->load->database();
		
		$this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
	
	function index_get() {
		echo "A";
	}
	
	function update_post() {
		$data = json_decode(file_get_contents('php://input'), true);
		$array = json_decode(json_encode($data), true);
		// $data = $array[0]['time'];
		
		print_r($_REQUEST);
		$id_user = $_REQUEST['id_user'];
		
		$latlng = array('lat'=>$array['location']['coords']['latitude'], 'lng'=>$array['location']['coords']['longitude']);
		
		$this->db->set('current_location', json_encode($latlng));
		$this->db->where('id', $id_user);
		$res = $this->db->update('master_user');
		
		if($res) {
			echo "success";
		} else {
			echo "failed";
		}
	}
}