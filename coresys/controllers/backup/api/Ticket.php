<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Ticket extends REST_Controller {
	function __construct($config = 'rest') {
        parent::__construct($config);
		$this->load->database();
		
		$this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
	
	
	
	function getMonthlyTicket_get() {
		// $query = "SELECT * FROM master_ticket_new WHERE ticket_status='Done'";
		$status = "Done";
		$query = "SELECT * FROM master_ticket_new WHERE ticket_status='$status'";
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();
		
		if ($num_rows > 0) {
			$list = array();
			$key=0;
			foreach($res as $r) {
				$list[$key]['flm_srno'] 		= "";
				$list[$key]['slm_srno'] 		= $r['ticket_dn'];
				$list[$key]['issue_ref_no'] 	= "";
				$list[$key]['description'] 		= $r['reported_problem'];
				$list[$key]['status'] 			= $r['ticket_status'];
				
				
				$slm_opendate = ((strtolower($r['ticket_status'])=="done") ? 
									date("Y-m-d", strtotime(json_decode($r['problem_received'], true)['date'])).' '.json_decode($r['problem_received'], true)['time'] : "");
				$slm_closedate = ((strtolower($r['ticket_status'])=="done") ? 
									date("Y-m-d", strtotime(json_decode($r['work_finish'], true)['date'])).' '.json_decode($r['work_finish'], true)['time'] : "");
				$list[$key]['flm_opendate'] 	= "";
				$list[$key]['flm_closedate'] 	= "";
				$list[$key]['slm_opendate'] 	= $slm_opendate;
				$list[$key]['slm_closedate'] 	= $slm_closedate;
				$list[$key]['tid'] 				= $r['tid'];
				$list[$key]['tiket_type'] 		= "slm";
				$list[$key]['Error'] 			= $r['problem_type'];
				$list[$key]['aging_flm'] 		= 0;
				$list[$key]['aging_slm'] 		= ((strtolower($r['ticket_status'])=="done") ?  $this->convert_aging($slm_opendate, $slm_closedate) : 0);
				
				$key++;
			}
			$result = $list;
		}
		
		
		header('Content-Type: application/json'); 
		echo json_encode($result);
	}
	
	function getMonthlyTicket3_get() {
		$query = "SELECT * FROM flm_master_ticket UNION SELECT * FROM slm_master_ticket";
		$query = "SELECT id, ticket_id, atm_id, service_type, problem_type, reported_problem, reported_by, email_pic, phone_pic, method_by_email, method_by_phone, entry_date, email_date, accept_time, arrival_time, waiting_time, start_job, end_job, status
					FROM
					(
						SELECT id, ticket_id, atm_id, service_type, problem_type, reported_problem, reported_by, email_pic, phone_pic, method_by_email, method_by_phone, entry_date, email_date, accept_time, arrival_time, waiting_time, start_job, end_job, status
						FROM flm_master_ticket
							Union
						SELECT id, ticket_id, atm_id, service_type, problem_type, reported_problem, reported_by, email_pic, phone_pic, method_by_email, method_by_phone, entry_date, email_date, accept_time, arrival_time, waiting_time, start_job, end_job, status
						FROM slm_master_ticket
					) results
					ORDER BY entry_date";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();
		
		if ($num_rows > 0) {
			$list = array();
			$key=0;
			foreach($res as $r) {
				$list[$key]['flm_srno'] 		= 	(strtolower(substr($r['ticket_id'], 0,3))=='flm') ?
														$r['ticket_id'] : "";
				$list[$key]['slm_srno'] 		= 	(strtolower(substr($r['ticket_id'], 0,3))=='slm') ?
														$r['ticket_id'] : "";
				$list[$key]['issue_ref_no'] 	= "";
				$list[$key]['description'] 		= $r['reported_problem'];
				$list[$key]['status'] 			= 	(strtolower($r['status'])=="done") ? "Close" : "Open";
				$list[$key]['flm_opendate'] 	= 	(strtolower(substr($r['ticket_id'], 0,3))=='flm') ?
														$r['entry_date'] : "";
				$list[$key]['flm_closedate'] 	= 	(strtolower(substr($r['ticket_id'], 0,3))=='flm') ?
														((strtolower($r['status'])=="done") ?  $r['end_job'] : "") : "";
				$list[$key]['slm_opendate'] 	= 	(strtolower(substr($r['ticket_id'], 0,3))=='slm') ?
														$r['entry_date'] : "";
				$list[$key]['slm_closedate'] 	= 	(strtolower(substr($r['ticket_id'], 0,3))=='slm') ?
														((strtolower($r['status'])=="done") ?  $r['end_job'] : "") : "";
				$list[$key]['tid'] 				= $r['atm_id'];
				$list[$key]['tiket_type'] 		= strtolower(substr($r['ticket_id'], 0,3));
				$list[$key]['Error'] 			= $r['problem_type'];
				$list[$key]['aging_flm'] 		= 	(strtolower(substr($r['ticket_id'], 0,3))=='flm') ?
														((strtolower($r['status'])=="done") ?  $this->convert_aging($r['entry_date'], $r['end_job']) : 0) : 0;
				$list[$key]['aging_slm'] 		= 	(strtolower(substr($r['ticket_id'], 0,3))=='slm') ?
														((strtolower($r['status'])=="done") ?  $this->convert_aging($r['entry_date'], $r['end_job']) : 0) : 0;
				
				$key++;
			}
			
			$result = $list;
		}

		header('Content-Type: application/json'); 
		echo json_encode($result);
	}
	
	function convert_aging($d1, $d2) {
		$your_date = strtotime($d1);
		$now = strtotime($d2);
		$datediff = $now - $your_date;

		return round($datediff / (60 * 60));
	}
	
	function getMonthlyTicket2_get() {
		$query = "SELECT * FROM flm_master_ticket";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();
		
		header('Content-Type: application/json'); 
		echo json_encode($res);
		
		if ($num_rows > 0) {
			$list = array();
			$key=0;
			foreach($res as $r) {
				$list[$key]['flm_srno'] 		= $r['ticket_id'];
				$list[$key]['slm_srno'] 		= "A";
				$list[$key]['issue_ref_no'] 	= "A";
				$list[$key]['description'] 		= $r['reported_problem'];
				$list[$key]['status'] 			= strtolower($r['status']);
				$list[$key]['flm_opendate'] 	= $r['entry_date'];
				$list[$key]['flm_closedate'] 	= $r['end_job'];
				$list[$key]['slm_opendate'] 	= "A";
				$list[$key]['slm_closedate'] 	= "A";
				$list[$key]['tid'] 				= $r['atm_id'];
				$list[$key]['tiket_type'] 		= substr($r['ticket_id'], 0,3);
				$list[$key]['Error'] 			= "A";
				$list[$key]['aging_flm'] 		= "A";
				$list[$key]['aging_slm'] 		= "A";
				
				$key++;
			}
			
			$result = $list;
		}

		// header('Content-Type: application/json'); 
		// echo json_encode($result);
	}
}