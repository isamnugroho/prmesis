<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Automatic_ticket extends REST_Controller {
	function __construct($config = 'rest') {
        parent::__construct($config);
		$this->load->database();
		
		$this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    function get_data_problem_post() {
        // echo "<pre>";
        // print_r($_REQUEST);
        // $id_atm         = trim($_REQUEST[0]['ID ATM']);
        // $failurecount   = trim($_REQUEST[0]['FAILURECOUNT']);
        // $location       = trim($_REQUEST[0]['LOCATION']);
        // $ip             = trim($_REQUEST[0]['IP']);
        // $start          = trim($_REQUEST[0]['START']);
        // $end            = trim($_REQUEST[0]['END']);
        // $durasi         = trim($_REQUEST[0]['DURASI']);
        // $description    = trim($_REQUEST[0]['DESCRIPTION']);
        // $component      = trim($_REQUEST[0]['COMPONENT']);

        foreach($_REQUEST as $r) {
            $id_atm         = trim($r['ID ATM']);
            $failurecount   = trim($r['FAILURECOUNT']);
            $location       = trim($r['LOCATION']);
            $ip             = trim($r['IP']);
            $start          = trim($r['START']);
            $end            = trim($r['END']);
            $durasi         = trim($r['DURASI']);
            $description    = trim($r['DESCRIPTION']);
            $component      = trim($r['COMPONENT']);

            $this->db->where(array('id_atm' => $id_atm, 'failure_count' => $failurecount));
            $q = $this->db->get('view_historical_problem');
            // echo $this->db->last_query();

            if ( $q->num_rows() > 0 ) {
                echo "RECORD : ".$id_atm." ADA\n";
                if($component!=="base device") {
                    echo "THIS PROBLEM HAS BEEN SET AUTO TICKET...\n";
                    $this->check_ticket($r);
                } else {
                    echo "THIS PROBLEM HAS BEEN SET MANUAL TICKET.\n";
                }
            } else {
                echo "RECORD : ".$id_atm." NOT FOUND\n";
                $this->insert_record($r);
                if($component!=="base device") {
                    echo "THIS PROBLEM HAS BEEN SET AUTO TICKET...\n";
                    $this->check_ticket($r);
                } else {
                    echo "THIS PROBLEM HAS BEEN SET MANUAL TICKET.\n";
                }
            }
        }
    }

    function insert_record($r) {
        echo "INSERTING RECORD ".$id_atm."...\n";
        $table = 'view_historical_problem';
        $rec['id_atm']          = trim($r['ID ATM']);
        $rec['failure_count']   = trim($r['FAILURECOUNT']);
        $rec['location']        = trim($r['LOCATION']);
        $rec['ip']              = trim($r['IP']);
        $rec['start']           = trim($r['START']);
        $rec['end']             = trim($r['END']);
        $rec['durasi']          = trim($r['DURASI']);
        $rec['description']     = trim($r['DESCRIPTION']);
        $rec['component']       = trim($r['COMPONENT']);

        $res = $this->db->insert($table, $rec);
        if($res) { 
            echo "RECORD SUCCESS INSERTED.\n";
        } else {
            echo "INSERTING FAILED.\n";
        }
    }

    function check_ticket($r) {
        // print_r($r);
        echo "CHECK TICKET...\n";
        $id_atm         = trim($r['ID ATM']);
        $failurecount   = trim($r['FAILURECOUNT']);
        $start          = trim($r['START']);
        
        $this->db->where(
            array(
                'atm_id' => $id_atm, 
                'failure_count' => $failurecount,
                'entry_date' => $start,
            )
        );
        $q = $this->db->get('flm_master_ticket');
        if ( $q->num_rows() > 0 ) {
            echo "TICKET FOUND\n";
            echo "TICKET ALREADY HAS BEEN CREATED!\n";
        } else {
            echo "TICKET NOT FOUND\n";
            // $this->check_pic($r);
            $pic = $this->check_pic($r);
            if($pic) {
                $this->create_flmticket($r, $pic);
            }
        }
    }

    function check_pic($r) {
        echo "CHECK PIC...\n";
        $id_atm         = trim($r['ID ATM']);
        $failurecount   = trim($r['FAILURECOUNT']);
        $start          = trim($r['START']);

        $this->db->select('*, master_atm.alamat as alamat');
        $this->db->from('master_atm');
        $this->db->join('master_location_detail', 'master_location_detail.id_atm=master_atm.id', 'left');
        $this->db->join('trans_schedule', 'trans_schedule.id_lokasi=master_location_detail.id_lokasi', 'left');
        $this->db->join('master_staff', 'master_staff.id=trans_schedule.id_petugas', 'left');
        $this->db->where(array('idatm'=>$id_atm));
        $q = $this->db->get();

        if ( $q->num_rows() > 0 ) {
            echo "CHECK PIC FOUND : \n";
            echo "\tID PIC\t: ".$q->row()->nik."\n";
            echo "\tNAMA\t: ".$q->row()->nama."\n";
            echo "\tHP\t: ".$q->row()->hp."\n";
            // echo "<table style='font-size: 12px; border: 1px solid black; margin-left: 20px'>
            //         <tr>
            //             <td>ID PIC</td>
            //             <td>:</td>
            //             <td>".$q->row()->nik."</td>
            //         </tr>
            //         <tr>
            //             <td>NAMA</td>
            //             <td>:</td>
            //             <td>".$q->row()->nama."</td>
            //         </tr>
            //         <tr>
            //             <td>HP</td>
            //             <td>:</td>
            //             <td>".$q->row()->hp."</td>
            //         </tr>
            // </table>";

            return $q->row()->id;
        } else {
            return false;
        }
        // print_r($q->row());
    }

    function create_code($kode) {
		$leading = $kode.date('ymd');
		$check = date('ym');
        if($kode=="FLM") {
		    $res = $this->db->query("SELECT ticket_id FROM flm_master_ticket WHERE ticket_id LIKE '%$check%' ORDER BY SUBSTRING(ticket_id, 10) DESC");
        } else if($kode=="SLM") {
		    $res = $this->db->query("SELECT ticket_id FROM slm_master_ticket WHERE ticket_id LIKE '%$check%' ORDER BY SUBSTRING(ticket_id, 10) DESC");
        }
		if($res->num_rows()==0) {
			$kode = 1;
		} else {
			$kode = $res->row()->ticket_id;
			$kode = intval(substr($kode, strlen($leading))) + 1;
		}
		$ticket = str_pad($kode, 4, '0', STR_PAD_LEFT);
		$ticket = $leading.$ticket;
		
		return $ticket;
    }

    function create_flmticket($r, $pic) {
        echo "CREATING AUTO TICKET...\n";
        // print_r($r);
        $table = 'view_historical_problem';
        $id_atm         = trim($r['ID ATM']);
        $failurecount   = trim($r['FAILURECOUNT']);
        $location       = trim($r['LOCATION']);
        $ip             = trim($r['IP']);
        $start          = trim($r['START']);
        $end            = trim($r['END']);
        $durasi         = trim($r['DURASI']);
        $description    = trim($r['DESCRIPTION']);
        $component      = trim($r['COMPONENT']);


        $ticket_id = $this->create_code("FLM");
        $rec['id'] = $id;
        $rec['ticket_id'] = $ticket_id;
        $rec['bank_id'] = '';
        $rec['atm_id'] = $id_atm;
        $rec['failure_count'] = $failurecount;
        $rec['service_type'] = '';
        $rec['problem_type'] = $component;
        $rec['reported_problem'] = $description;
        $rec['reported_by'] = 'AUTO SYSTEM';
        $rec['email_pic'] = '';
        $rec['phone_pic'] = '';
        $rec['method_by_email'] = '';
        $rec['method_by_phone'] = '';
        $rec['entry_date'] = $start;
        $rec['email_date'] = '';
        $rec['pic'] = $pic;
        $rec['created_by'] = 'SYSTEM';

        $rec2['ticket_id'] = $ticket_id;
		$rec2['pic'] = $pic;

        $res = $this->db->insert('flm_master_ticket', $rec);
        $this->db->insert('flm_master_ticket_detail', $rec2);

        if($res) {
            $this->push("AUTO TICKETING", "Auto ticket has been created", $pic, "status_ticket", $ticket_id);
            echo "TICKET CREATED SUCCESSFULLY";
        } else {
            echo "TICKET FAILED TO CREATE";
        }
    }

    public function push($title, $body, $id_user, $menu, $id) {
		$result = $this->db->query("SELECT token, username FROM master_user WHERE (level='SUPER' OR level='ADMIN' OR level='MONITOR' OR level='FINANCE') AND ( token!='' OR  token IS NOT NULL)")->result();
		
		$registration_ids = array();
		foreach($result as $r) {
			$registration_ids[] = $r->token;
		}
		
		$this->db->from('master_staff');
		$this->db->where('master_user.id', $id_user);
		$this->db->join('master_user', 'master_staff.nik = master_user.username');
		$query = $this->db->get();
		$res = $query->row();
		
		$msg = $body." to ".$res->nama." (".$res->nik.")";
		
		$data_save['menu']		= $menu;
		$data_save['id_menu']	= $id;
		$data_save['msg']		= $msg;
		$data_save['status'] 	= "unread";
		$res = $this->db->insert('notify', $data_save);
			
		if($res) {
			$this->push_notif($registration_ids, $title, $msg);
		} 
	}
	
	public function push_notif($registration_ids, $title, $body) {
		define('AUTHORIZATION_KEY', 'AAAAC0m9HsM:APA91bHCPkEQ1KUdBBQlYsPBXVjWj1yYgTMEFwmqFlyNqelLvA8XNDHeUI_376g4MUF13ItCLZcXL9pjgIknvuOdr2MvWN7BgWxVwvVF63HKZdQUr5ajHR9wbN4LyMOs_1O3hyoB4U9A');
		
		$title = $title;
		$body = $body;
		
		$type = ($data['status']=="priority") ? "priority" : "alarm2";
		$channel = ($data['status']=="priority") ? "my_channel_id1" : "my_channel_id2";
		
		$fields = array(
			'registration_ids' => $registration_ids,
			'data' => array(
				'notification' => array(
					"body" => $body,
					"title"=> $title,
				)
			)
		);
		
		$headers = array(
			'Authorization:key='.AUTHORIZATION_KEY,
			'Content-Type:application/json'
		);
		
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt($ch,CURLOPT_POST, true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		curl_close($ch);
		$result = json_decode($result, true);
	}
}