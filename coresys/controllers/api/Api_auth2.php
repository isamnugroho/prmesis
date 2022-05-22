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
        return "my_application_secret";
    }
	
	function login_post() {
		// echo "AAA";
		
		$userdata = array(
			"username" => "imam",
			"password" => "123",
			"level" => "user"
		);
		
		// header('Content-Type: application/json');
		// echo json_encode( $arr );
		$issuedAt = time();
		$expirationTime = $issuedAt + 60 * 60 * 24 * 60;
		$key = "example_key";
		$payload = array(
			"iss" => "The_claim",
			"aud" => "The_Aud",
			"iat" => $issuedAt,
			"exp" => $expirationTime,
			// "nbf" => 1357000000,
			"data" => $userdata
		);

		/**
		 * IMPORTANT:
		 * You must specify supported algorithms for your application. See
		 * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
		 * for a list of spec-compliant algorithms.
		 */
		$jwt = JWT::encode($payload, $key, 'HS256');
		$decoded = JWT::decode($jwt, new Key($key, 'HS256'));

		// print_r($expirationTime);
		
		// header('Content-Type: application/json');
		// echo json_encode( $decoded );

		/*
		 NOTE: This will now be an object instead of an associative array. To get
		 an associative array, you will need to cast it as such:
		*/

		$decoded_array = (array) $decoded;

		/**
		 * You can add a leeway to account for when there is a clock skew times between
		 * the signing and verifying servers. It is recommended that this leeway should
		 * not be bigger than a few minutes.
		 *
		 * Source: http://self-issued.info/docs/draft-ietf-oauth-json-web-token.html#nbfDef
		 */
		JWT::$leeway = 60; // $leeway in seconds
		$decoded = JWT::decode($jwt, new Key($key, 'HS256'));
		
		
		// echo json_encode( $decoded );
		
		$response = [
			'status' => 200,
			'error' => false,
			'messages' => 'User logged In successfully',
			'data' => [
				'token' => $jwt,
				'userdata' => $userdata
			]
		];
		header('Content-Type: application/json');
		echo json_encode( $response );
	}
}