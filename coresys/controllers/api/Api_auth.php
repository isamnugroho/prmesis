<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Api_auth extends REST_Controller {
	function __construct($config = 'rest') {
        parent::__construct($config);
		$this->load->database();
		
		$this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
	
	private function getKey()
    {
        return "example_key";
    }
	
	function login_post() {
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		
		$this->db->where("username", $username);
		$row = $this->db->get('master_user');
		$num = $row->num_rows();
		$res = $row->row();
		
		if($num>0) {
			$hash = $res->password;
			if (password_verify($password, $hash)) {
				$this->db->where("nik", $username);
				$row = $this->db->get('master_staff');
				$num = $row->num_rows();
				$userdata = $row->row();
				$is_mandor = array("is_koord" => "true");
				
				if($num==0) {
					$this->db->where("nik", $username);
					$row = $this->db->get('master_staff_petugas');
					$num = $row->num_rows();
					$userdata = $row->row();
					$is_mandor = array("is_koord" => "false");
					$area = $this->db->query("SELECT master_kelolaan.* FROM trans_schedule 
												LEFT JOIN trans_schedule_team ON (trans_schedule_team.id_detail=trans_schedule.id)
												LEFT JOIN master_kelolaan ON(master_kelolaan.id=trans_schedule.id_lokasi) WHERE trans_schedule_team.pic='$userdata->nik'
												GROUP BY trans_schedule_team.pic
											")->row();
				} else {
					$area = $this->db->query("SELECT master_kelolaan.* FROM trans_schedule LEFT JOIN master_kelolaan ON(master_kelolaan.id=trans_schedule.id_lokasi) WHERE trans_schedule.pic='$userdata->nik'")->row();
				}
				
				$obj_merged = (object) array_merge((array) $res, (array) $userdata, $is_mandor, (array) $area);
				
				$response = [
					'status' => 200,
					'error' => false,
					'messages' => 'User logged In successfully',
					'data' => [
						'token' => $this->generate_token($obj_merged),
						'userdata' => $obj_merged
					]
				];
			} else {
				$response = [
					'status' => 500,
					'error' => true,
					'messages' => 'Password Invalid',
					'data' => []
				];
			}
		} else {
			$response = [
				'status' =>500,
				'error' => true,
				'messages' => 'User not found',
				'data' => []
			];
		}
		
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function generate_token($userdata) {
		$issuedAt = time();
		$expirationTime = $issuedAt + 60 * 60 * 24 * 60;
		$key = $this->getKey();
		$payload = array(
			"iss" => "The_claim",
			"aud" => "The_Aud",
			"iat" => $issuedAt,
			"exp" => $expirationTime,
			"data" => $userdata
		);

		$jwt = JWT::encode($payload, $key, 'HS256');
		// $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
		// $decoded_array = (array) $decoded;
		// JWT::$leeway = 60; // $leeway in seconds
		// $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
		
		return $jwt;
	}
	
	// function login_postx() {}
		
		// $userdata = array(
			// "username" => "imam",
			// "password" => "123",
			// "level" => "user"
		// );
		// $issuedAt = time();
		// $expirationTime = $issuedAt + 60 * 60 * 24 * 60;
		// $key = "example_key";
		// $payload = array(
			// "iss" => "The_claim",
			// "aud" => "The_Aud",
			// "iat" => $issuedAt,
			// "exp" => $expirationTime,
			// "data" => $userdata
		// );

		// $jwt = JWT::encode($payload, $key, 'HS256');
		// $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
		// $decoded_array = (array) $decoded;
		// JWT::$leeway = 60; // $leeway in seconds
		// $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
		
		// $response = [
			// 'status' => 200,
			// 'error' => false,
			// 'messages' => 'User logged In successfully',
			// 'data' => [
				// 'token' => $jwt,
				// 'userdata' => $userdata
			// ]
		// ];
		// header('Content-Type: application/json');
		// echo json_encode( $response );
	// }
}