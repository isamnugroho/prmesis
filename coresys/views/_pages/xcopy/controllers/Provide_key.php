<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provide_key extends MY_Controller {
    var $data = array();
	public function __construct() {
        parent::__construct();
		$this->load->model('datatables_model', 'datatables');
		$this->data['that'] = $this;
    }
    
    /**
	 * View method
	 */
    public function index() {
        return view('pages/provide_key/index', $this->data);
		// print_r($this->data['user_access']);
		
		// echo $created_by;
    }
	
    public function ticket_new() {
        return view('pages/provide_key/index_new', $this->data);
		// print_r($this->data['user_access']);
		
		// echo $created_by;
    }
	
	public function input_by_txt() {
		$ticket = file(base_url()."assets/ticket_sulteng_februari.txt");
		echo "<pre>";
		// print_r($ticket);
		
		// $data = array();
		$code = 0;
		$prev = "";
		foreach($ticket as $key => $line) {
			if($key==0) {
				$param = explode(PHP_EOL, $line);
				$param = explode("	", $param[0]);
			} else { 
				$param2 = explode(PHP_EOL, $line);
				$param2 = explode("	", $param2[0]);
				
				// print_r(date("Y-m-d", strtotime($param2[6])));
				// print_r($param2);
				
				// $leading = $kode->kode_ticket.date('ymd');
				$bank = $param2[22];
				$kode = $this->db->query("SELECT * FROM master_client WHERE nama='".$bank."'")->row();
				$date = date("ymd", strtotime($param2[6]));
				$date1 = date("ym", strtotime($param2[6]));
				$date2 = date("Y-m-d", strtotime($param2[6]));
				$leading = $kode->kode_ticket.$date;
				$check = $date1;
				$res = $this->db->query("SELECT request_id FROM master_request_key WHERE request_id LIKE '%$check%' ORDER BY SUBSTRING(request_id, 10) DESC");
				if($res->num_rows()==0) {
					if($code==0) {
						$code = 1;
					} else {
						$code = $code + 1;
					}
				} else {
					if($code==0) {
						$kode = $res->row()->request_id;
						echo "KODE : ".$kode;
						echo "<br>QUERY : "."SELECT request_id FROM master_request_key WHERE request_id LIKE '%$check%' ORDER BY request_id DESC<br>";
						$kode = intval(substr($kode, strlen($leading))) + 1;
						$code = $kode;
					} else {
						$code = $code + 1;
					}
				}
				$ticket = str_pad($code, 4, '0', STR_PAD_LEFT);
				$ticket = $leading.$ticket;
				$data = array(
					"request_id" => $ticket,
					"atm_id" => $param2[1],
					"service_type" => $param2[2]." - ATM",
					"problem_type" => $param2[3],
					"reported_problem" => $param2[4],
					"reported_by" => $param2[5],
					"entry_date" => date("Y-m-d H:i:s", strtotime($param2[6])),
					"email_date" => date("Y-m-d H:i:s", strtotime($param2[7])),
					"accept_time" => $param2[8],
					"arrival_time" => $date2." ".$param2[9],
					"start_job" => $date2." ".$param2[10],
					"end_job" => $date2." ".$param2[11],
					"leave_time" => $param2[12],
					"pic" => $param2[13],
					"status" => $param2[14],
					"action_taken" => $param2[15],
					"remark" => $param2[16],
					"replacement_part" => $param2[17],
					"replacement_consume" => $param2[18]
				);
				$data2[] = array(
					"request_id" => $ticket,
					"atm_id" => $param2[1],
					"service_type" => $param2[2]." - ATM",
					"problem_type" => $param2[3],
					"reported_problem" => $param2[4],
					"reported_by" => $param2[5],
					"entry_date" => date("Y-m-d H:i:s", strtotime($param2[6])),
					"email_date" => date("Y-m-d H:i:s", strtotime($param2[7])),
					"accept_time" => $param2[8],
					"arrival_time" => $date2." ".$param2[9],
					"start_job" => $date2." ".$param2[10],
					"end_job" => $date2." ".$param2[11],
					"leave_time" => $param2[12],
					"pic" => $param2[13],
					"status" => $param2[14],
					"action_taken" => $param2[15],
					"remark" => $param2[16],
					"replacement_part" => $param2[17],
					"replacement_consume" => $param2[18]
				);
				$prev = $date;
				
				
				$this->db->where('request_id', $ticket);
				$q = $this->db->get('master_request_key');
				if ( $q->num_rows() > 0 ) {
					$this->db->where('request_id', $ticket);
					$this->db->update('master_request_key', $data);
				} else {
					$this->db->set('request_id', $ticket);
					$this->db->insert('master_request_key', $data);
				}
			}
		}
		
		
		print_r($data2);
		// // $param = array();
		// foreach($atm as $key => $line) {
			
			// if($key==0) {
				// $param = explode(PHP_EOL, $line);
				// $param = explode("	", $param[0]);
			// } else {
				// $param2 = explode(PHP_EOL, $line);
				// $param2 = explode("	", $param2[0]);
				// $idatm = $this->db->query("SELECT * FROM master_atm WHERE idatm='".$param2[1]."'");
				
				// if($idatm->num_rows()==0) {
					// $query = array();
					// foreach($param as $k => $field) {
						// $query[$field] = $param2[$k];
					// }
					// $query['id_serial'] = $this->db->query('SELECT id FROM master_serial WHERE id NOT IN (SELECT id_serial FROM master_atm) ORDER BY id ASC LIMIT 0,1')->row()->id;
					// $this->db->insert('master_atm', $query);
					// $insert_id = $this->db->insert_id();
					// if($insert_id!="") {
						// $real_reqion = $this->db->query("SELECT id FROM master_location WHERE name='".$region."'")->row()->id;
						// $data['id_lokasi'] = $real_reqion;
						// $data['id_atm'] = $insert_id;
						// $this->db->insert('master_location_detail', $data);				
					// }
				// } else {
					// echo "IDATM INI SUDAH TERSIMPAN";
				// }
			// }
		// }
	}
    
    public function add() {}

    public function edit() {}
	
	public function tes() {
		$this->notif_model->notif("34");
	}

    /**
	 * Process method
	 */
    public function insert() {
        // echo "<pre>";
        // print_r($_REQUEST);

        $id = trim($this->input->post("id"));
        $idatm = trim($this->input->post("idatm"));
		$bank_id = $this->db->query("SELECT id_bank FROM master_atm WHERE idatm='$idatm'")->row()->id_bank;
        $email_date = trim($this->input->post("email_date"));
        $request_id = trim($this->input->post("request_id"));
        $service_type = explode(" - ", explode(" / ", $this->input->post("service_type"))[0])[0];
		$problem_type = explode(" / ", $this->input->post("service_type"))[1];
        $reported_problem = trim($this->input->post("reported_problem"));
        $reported_by = trim($this->input->post("reported_by"));
        $key_open = trim($this->input->post("key_open"));
        $key_close = trim($this->input->post("key_close"));
        $phone_pic = trim($this->input->post("phone_pic"));
        $method_by_email = trim($this->input->post("email_method"));
        $method_by_phone = trim($this->input->post("phone_method"));
        $pic = trim($this->input->post("pic"));
		$created_by = $this->data['user_access']['name']=="" ? $this->data['user_access']['username'] : $this->data['user_access']['name'];

		$request_id = $this->check_ticket();
        $data['id'] = $id;
        $data['request_id'] = $request_id;
        $data['bank_id'] = $bank_id;
        $data['atm_id'] = $idatm;
        $data['service_type'] = $service_type;
        $data['problem_type'] = $problem_type;
        $data['reported_problem'] = $reported_problem;
        $data['reported_by'] = $reported_by;
        $data['key_open'] = $key_open;
        $data['key_close'] = $key_close;
        $data['phone_pic'] = $phone_pic;
        $data['method_by_email'] = ($method_by_email=="" ? "false" : "true");
        $data['method_by_phone'] = ($method_by_phone=="" ? "false" : "true");
        $data['entry_date'] = date("Y-m-d H:i:s");
        $data['email_date'] = $email_date;
        $data['pic'] = $pic;
        $data['created_by'] = $created_by;
		
		
		$in = new DateTime($email_date);
		$out = new DateTime(date("Y-m-d H:i:s"));
		if ($in > $out) $out->add(new DateInterval('P1D'));
		$diff = $out->diff($in);
        $data['late_input'] = $diff->format('%H:%I');

        $res = $this->db->insert('master_request_key', $data);
        
        if($res) {
			$this->notif(42, $key_open);
            $result['status'] = 'success';
        } else {
            $result['status'] = 'failed';
        }

        echo json_encode($result);
    }
	
	public function notif($id, $key) {
		$to = $this->db->query("SELECT token FROM master_user WHERE id='$id'")->row()->token;
		
		define('AUTHORIZATION_KEY', 'AAAAnvWH4cE:APA91bGNmkgFTw4gn0l7DFah6bPVdoY_SiWO-vxEgZpBAkNQATQif_HcW4bFtFW6Q2hLDFVFaxl3lGar-DDfzbgDGwPvj0h_lDAw90NOa75TbN2k_ZuX3YMNoY13eAlTYisR29F6Keo7');

		// print_r($data);
		
		$type = ($data['status']=="priority") ? "priority" : "alarm2";
		$channel = ($data['status']=="priority") ? "my_channel_id1" : "alarm2";
		
		$fields = array(
			'to' => $to,
			'data' => array(
				"command"=> "open:lib:send_key:".$key,
				"notification_foreground"=> "true",
				"notification_android_channel_id"=> $channel,
				"notification_android_priority"=> "2",
				"notification_android_visibility"=> "1",
				"notification_android_color"=> "#ff0000",
				"notification_android_smallIcon"=> "thumbs_up",
				"notification_android_icon"=> "thumbs_up",
				"notification_android_sound"=> $type,
				"notification_android_vibrate"=> "500, 200, 500",
				"notification_android_lights"=> "#ffff0000, 250, 250",
			),
			'notification' => array(
				"body" => "Data Key Telah dikirim oleh Team Monitor",
				"title"=> "Key Provided",
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
    
    public function update() {}

    public function close($id) {
		$this->db->where('id', $id);
		$this->db->update('master_request_key', array("status"=>"CLOSE"));
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	} 

    public function close_manual() {
		// print_r($this->input->post());
		$request_id = trim($this->input->post("closing_ticket"));
		$arrival_time = trim($this->input->post("waktu_tiba"));
		$start_job = trim($this->input->post("waktu_mulai"));
		$end_job = trim($this->input->post("waktu_selesai"));
		$action_taken = trim($this->input->post("action_taken"));
		
		$json = '{"action":{"form1":{},"form2":{},"form3":{"status":"done"}},"status":"done","action_taken":"'.$action_taken.'","remark":""}';
		$action_taken = json_encode(json_decode($json));
		
		$data_n['accept_time'] = $arrival_time;
		$data_n['arrival_time'] = $arrival_time;
		$data_n['start_job'] = $start_job;
		$data_n['end_job'] = $end_job;
		$data_n['action_taken'] = $action_taken;
		$data_n['status'] = "close";
		$this->db->where('request_id', $request_id);
		$result = $this->db->update('master_request_key', $data_n);
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	} 

    public function delete($id) {
		
		// $qrcode = $this->input->post('qrcode');
		// $row = $this->db->query("SELECT identity FROM master_atm WHERE idatm='$id_atm'")->row();
		
		$this->db->where('id', $id);
        $result = $this->db->delete('master_request_key');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	} 

    /**
	 * Additional method
	 */

    function check_ticket() {
        $leading = date('ym');
        $check = date('ym');
		$res = $this->db->query("SELECT request_id, SUBSTRING(request_id, 5) FROM master_request_key WHERE request_id LIKE '%$check%' ORDER BY SUBSTRING(request_id, 5) DESC ");
		
		if($res->num_rows()==0) {
			$kode = 1;
		} else {
			$kode = $res->row()->request_id;
			$kode = intval(substr($kode, strlen($leading))) + 1;
		}
		$ticket = str_pad($kode, 4, '0', STR_PAD_LEFT);
		$ticket = $leading.$ticket;
		
		return $ticket;
    }
	
	public function tester() {
		echo $this->check_ticket();
	}

    function get_ticket() {
        $leading = date('ymd');
		$check = date('ymd');
		$res = $this->db->query("SELECT request_id FROM master_request_key WHERE request_id LIKE '%$check%' ORDER BY SUBSTRING(request_id, 10) DESC");
		if($res->num_rows()==0) {
			$kode = 1;
		} else {
			$kode = $res->row()->request_id;
			$kode = intval(substr($kode, strlen($leading))) + 1;
		}
		$ticket = str_pad($kode, 4, '0', STR_PAD_LEFT);
		$ticket = $leading.$ticket;

		echo $ticket;
    }

    function get_ticket2() {
        $leading = "T".date('Ym');
        $check = date('Ym');
        $res = $this->db->query("SELECT request_id FROM master_request_key WHERE request_id LIKE '%$check%' ORDER BY request_id DESC");
        if($res->num_rows()==0) {
            $kode = 1;
        } else {
            $kode = $res->row()->request_id;
            $kode = intval(substr($kode, strlen($leading))) + 1;
        }
        $ticket = str_pad($kode, 4, '0', STR_PAD_LEFT);
        $ticket = $leading.$ticket;

        return $ticket;
    }

    function select_atm() {
        $search = $this->input->post('search');
		// if($search!="") {
		$search = "%".strtolower($search)."%";
		// }
		$query = "SELECT *, master_atm.id as id FROM master_atm LEFT JOIN master_client ON (master_atm.id_bank=master_client.id) 
		WHERE (master_atm.idatm LIKE '$search' OR master_client.nama LIKE '$search' OR master_client.nama_lengkap LIKE '$search' OR master_atm.sn_mesin LIKE '$search')";
		$result = $this->db->query($query)->result();
		
		
		$bank = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_client WHERE id='$id'")->row()->nama;
			return $nama;
		};
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->idatm!=="") {
					$list[$key]['id'] = $row->idatm;
					$list[$key]['text'] = $row->idatm." / ".$bank($row->id_bank)." / ".$row->lokasi; 
					$key++;
				}
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
    }

    function select_problem() {
		$search = $this->input->post('search');
		$search = "%".strtolower($search)."%";
		
		$query = "SELECT *, trouble_sub_category.id as id FROM trouble_category 
					LEFT JOIN trouble_sub_category ON (trouble_sub_category.id_category=trouble_category.id)
		WHERE sub_category_name LIKE '$search'";	
		
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->category_name." / ".$row->sub_category_name;
				$list[$key]['text'] = $row->category_name." / ".$row->sub_category_name; 
				$key++;
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}

    function select_cse() {
        $search = $this->input->post('search');
        $atm_id = $this->input->post('atm_id');
		
		$id_bank = $this->db->query("SELECT id_bank FROM master_atm WHERE idatm='$atm_id'")->row()->id_bank;
		$id_atm = $this->db->query("SELECT id FROM master_atm WHERE idatm='$atm_id'")->row()->id;
		// if($search!="") {
		$search = "%".strtolower($search)."%";
		// }
		$query = "SELECT *, master_staff.id as ids FROM master_staff 
					LEFT JOIN master_user ON (master_staff.nik=master_user.username) 
					LEFT JOIN trans_schedule ON (trans_schedule.id_petugas=master_user.id)
					LEFT JOIN master_location ON (master_location.id=trans_schedule.id_lokasi)
					LEFT JOIN master_location_detail ON (master_location_detail.id_lokasi=master_location.id)
					WHERE master_user.level='cse' AND master_location.id_bank='$id_bank' AND (master_staff.nama LIKE '$search') GROUP BY master_staff.id";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->ids;
				$list[$key]['text'] = $row->nik." - ".$row->nama; 
				$key++;
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
    }

    function select_part() {
        $search = $this->input->post('search');
		// if($search!="") {
		$search = "%".strtolower($search)."%";
		// }
		$query = "SELECT * FROM master_inventory WHERE (kode_part LIKE '$search' OR nama_part LIKE '$search')";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->id;
				$list[$key]['text'] = $row->kode_part." - ".$row->nama_part; 
				$key++;
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
    }
     
    public function get_data() {
        $id = $this->uri->segment(3);
		$valid_columns = array(
            0=>'master_request_key.id',
            1=>'master_request_key.atm_id',
            2=>'master_atm.cabang',
            3=>'master_atm.lokasi',
            4=>'master_request_key.request_id',
            5=>'master_request_key.problem_type',
            6=>'master_request_key.entry_date',
        );

        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search= $this->input->post("search");
        $search = $search['value'];
		$col = 0;
        $dir = "";
        if(!empty($order)) {
            foreach($order as $o) {
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		
		if($dir != "asc" && $dir != "desc") {
            $dir = "desc";
        }
		
		if(!isset($valid_columns[$col])) {
            $order = null;
        } else {
            $order = $valid_columns[$col];
        }
		
        if($order !=null) {
            $this->db->order_by($order, $dir);
        }
		
		if(!empty($search)) {
            $x=0;
            foreach($valid_columns as $sterm) {
                if($x==0) {
                    $this->db->like($sterm,$search);
                } else {
                    $this->db->or_like($sterm,$search);
                }
                $x++;
            }                 
        }
		
        $this->db->limit($length,$start);
        $this->db->select('*,master_request_key.id as ids, master_request_key.status as status');
        $this->db->from('master_request_key');
		$this->db->join('master_atm', 'master_atm.idatm=master_request_key.atm_id');
        // $this->db->join('trouble_category', 'trouble_category.id = trouble_sub_category.id_category');
        $employees = $this->db->get();
        $data = array();
		
		$atm = function($id, $field) {
			error_reporting(0);
			$atm = $this->db->query("SELECT $field FROM master_atm WHERE (id='$id' OR idatm='$id')")->row();
			$atm = (array) $atm;
			return $atm[$field];
		};
		
		$bank = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_client WHERE id='$id'")->row()->nama;
			
			return $nama;
		};
		
		$no = $start;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'provide_key';
			
			$button_close = "";
			// if($rows->status=="OPEN") {
				$button_close = '<a onclick="closeAction(\''.$rows->ids.'\', \''.$rows->request_id.'\')" class="btn btn-warning mr-1 zoomsmall" 
									style="background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;">
									<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'assets/img/del2.png"/>
									Closed
								</a>
								<a onclick="deleteAction(\''.$url.'/delete/'.$rows->ids.'\')" class="btn btn-danger mr-1 zoomsmall" 
									style="background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;">
									<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/del.png"/>
									Delete
								</a>';
			// }
            $data[]= array(
                $no,
                $atm($rows->atm_id, 'idatm'),
                // $bank($atm($rows->atm_id, 'id_bank')),
                $atm($rows->atm_id, 'cabang'),
                $atm($rows->atm_id, 'lokasi'),
                $rows->request_id,
                $rows->problem_type,
                $rows->entry_date,
                strtoupper($rows->status),
                '<center>
                    '.$button_close.'
				 </center>'
				 
				 
                    // <a onclick="updateModal(
                                            // \''.$rows->id.'\'
                                        // )" class="btn btn-warning mr-1">
                        // <img style="float: left; margin: 3px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/edit.png"/>
                        // Edit
                    // </a>
            );     
        }
		
        $total_employees = $this->totalDatas();
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_employees,
            "recordsFiltered" => $total_employees,
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    public function totalDatas() {
        $query = $this->db->select("COUNT(*) as num")->get("master_request_key");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }
	
	public function json() {
		// // error_reporting(0);
		
		// $query = "
			// SELECT *, master_request_key.id as ids, master_request_key.status as status, master_client.nama as nama_bank, master_request_key.pic as pic
			// FROM master_request_key 
			// LEFT JOIN master_atm ON (master_atm.idatm=master_request_key.atm_id)
			// LEFT JOIN master_client ON (master_client.id=master_request_key.bank_id)
		// ";
		
		$query = "
			SELECT *, master_request_key.id as ids, master_request_key.status as status, master_client.nama as nama_bank, master_request_key.pic as pic
			FROM master_request_key 
			LEFT JOIN master_atm ON (master_atm.idatm=master_request_key.atm_id)
			LEFT JOIN master_client ON (master_client.id=master_request_key.bank_id)
		";
		
		$param['query'] 		= trim($query);
		$param['column_order'] 	= array(
										null, 
										'master_request_key.id', 
										'master_request_key.id', 
										'master_request_key.id', 
										'master_request_key.id'
								  );
		$param['column_search'] = array(
										'master_atm.idatm'
								  );
		$param['order'] 		= array('master_request_key.id' => 'desc');
		$param['where'] 		= array();
		
		$param['param'] = json_encode($param);
		$param['post'] 	= $_REQUEST;
		
		$data = $this->datatables->check($param);
		
		
		$r = json_decode($data, true);
		
		$atm = function($id, $field) {
			error_reporting(0);
			$atm = $this->db->query("SELECT $field FROM master_atm WHERE (id='$id' OR idatm='$id')")->row();
			$atm = (array) $atm;
			return $atm[$field];
		};
		
		$bank = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_client WHERE id='$id'")->row()->nama;
			
			return $nama;
		};
		
		$cse = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_staff WHERE id='$id'")->row()->nama;
			
			return $nama;
		};
		
		$out = array();
		$out['draw'] = $r['draw'];
		$out['recordsTotal'] = $r['recordsTotal'];
		$out['recordsFiltered'] = $r['recordsFiltered'];
		$datas = array();
		$key = 0;
		$no = $_REQUEST['start'];
		foreach($r['data'] as $r) {
			$no++;
			
			$url = base_url().'provide_key';
			$button_close = "";
			if($r['status']=="OPEN") {
				$button_close = '<center><a onclick="closeAction(\''.$r['ids'].'\', \''.$r['request_id'].'\')" class="btn btn-sm btn-warning zoomsmall" 
									style="background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;">
									<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'assets/img/del2.png"/>
									Closed
								</a>
								<a onclick="deleteAction(\''.$url.'/delete/'.$r['ids'].'\')" class="btn btn-sm btn-danger zoomsmall" 
									style="background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;">
									<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/del.png"/>
									Delete
								</a></center>';
			} else {
				$button_close = '
								<center><a disabled onclick="closeAction(\''.$r['ids'].'\', \''.$r['request_id'].'\')" class="btn btn-sm btn-warning" 
									style="background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;">
									<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'assets/img/del2.png"/>
									Closed
								</a>
								<a disabled onclick="deleteAction(\''.$url.'/delete/'.$r['ids'].'\')" class="btn btn-sm btn-danger" 
									style="background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;">
									<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/del.png"/>
									Delete
								</a></center>';
			}
			
			$list[$key]['no'] = $no;
			$list[$key]['atm_id'] = $r['atm_id'];
			$list[$key]['nama_bank'] = $r['nama_bank'];
			$list[$key]['cabang'] = $r['cabang'];
			$list[$key]['lokasi'] = $r['lokasi'];
			$list[$key]['request_id'] = $r['request_id'];
			$list[$key]['problem_type'] = $r['key_open'];
			$list[$key]['key_open'] = $r['key_open'];
			$list[$key]['key_close'] = $r['key_close'];
			$list[$key]['entry_date'] = $r['entry_date'];
			$list[$key]['status'] = strtoupper($r['status']);
			$list[$key]['button'] = $button_close;
			// $list[$key]['button'] = $button_close;
			
			// EXTEND
			$list[$key]['cse'] = $cse($r['pic']);
			$list[$key]['reported_by'] = $r['reported_by'];
			$list[$key]['reported_problem'] = $r['reported_problem'];
			$list[$key]['email_pic'] = $r['email_pic'];
			$list[$key]['phone_pic'] = $r['phone_pic'];
			$list[$key]['created_by'] = $r['created_by'];
			// $list[$key]['jobcard'] = base_url().'laporanfpdf/jobcard/'.$r['request_id'];
			$list[$key]['jobcard'] = "<a href='".base_url()."laporanfpdf/jobcard/".$r['request_id']."' target='_blank'><button class='btn btn-xs btn-success'>Preview</button></a>";
			
			$key++;
		}
		
		$out['data'] = $list;
		
		echo json_encode($out);
	}
	
	
	
	public function json_open() {
		// // error_reporting(0);
		
		// $query = "
			// SELECT *, master_request_key.id as ids, master_request_key.status as status, master_client.nama as nama_bank, master_request_key.pic as pic
			// FROM master_request_key 
			// LEFT JOIN master_atm ON (master_atm.idatm=master_request_key.atm_id)
			// LEFT JOIN master_client ON (master_client.id=master_request_key.bank_id)
		// ";
		
		$query = "
			SELECT *, master_request_key.id as ids, master_request_key.status as status, master_client.nama as nama_bank, master_request_key.pic as pic
			FROM master_request_key 
			LEFT JOIN master_atm ON (master_atm.idatm=master_request_key.atm_id)
			LEFT JOIN master_client ON (master_client.id=master_request_key.bank_id)
		";
		
		$param['query'] 		= trim($query);
		$param['column_order'] 	= array(
										null, 
										'master_request_key.id', 
										'master_request_key.id', 
										'master_request_key.id', 
										'master_request_key.id'
								  );
		$param['column_search'] = array(
										'master_atm.idatm'
								  );
		$param['order'] 		= array('master_request_key.id' => 'desc');
		$param['where'] 		= array(
									array('master_request_key.status' => 'OPEN')
								);
		
		$param['param'] = json_encode($param);
		$param['post'] 	= $_REQUEST;
		
		$data = $this->datatables->check($param);
		
		
		$r = json_decode($data, true);
		
		$atm = function($id, $field) {
			error_reporting(0);
			$atm = $this->db->query("SELECT $field FROM master_atm WHERE (id='$id' OR idatm='$id')")->row();
			$atm = (array) $atm;
			return $atm[$field];
		};
		
		$bank = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_client WHERE id='$id'")->row()->nama;
			
			return $nama;
		};
		
		$cse = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_staff WHERE id='$id'")->row()->nama;
			
			return $nama;
		};
		
		$out = array();
		$out['draw'] = $r['draw'];
		$out['recordsTotal'] = $r['recordsTotal'];
		$out['recordsFiltered'] = $r['recordsFiltered'];
		$datas = array();
		$key = 0;
		$no = $_REQUEST['start'];
		foreach($r['data'] as $r) {
			$no++;
			
			$url = base_url().'provide_key';
			$button_close = "";
			if($r['status']=="OPEN") {
				$button_close = '<center><a onclick="closeAction(\''.$r['ids'].'\', \''.$r['request_id'].'\')" class="btn btn-sm btn-warning" 
									style="background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;">
									<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'assets/img/del2.png"/>
									Closed
								</a>
								<a onclick="deleteAction(\''.$url.'/delete/'.$r['ids'].'\')" class="btn btn-sm btn-danger" 
									style="background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;">
									<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/del.png"/>
									Delete
								</a></center>';
			} else {
				$button_close = '
								<center><a disabled onclick="closeAction(\''.$r['ids'].'\', \''.$r['request_id'].'\')" class="btn btn-sm btn-warning" 
									style="background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;">
									<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'assets/img/del2.png"/>
									Closed
								</a>
								<a disabled onclick="deleteAction(\''.$url.'/delete/'.$r['ids'].'\')" class="btn btn-sm btn-danger" 
									style="background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;">
									<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/del.png"/>
									Delete
								</a></center>';
			}
			
			$list[$key]['no'] = $no;
			$list[$key]['atm_id'] = $r['atm_id'];
			$list[$key]['nama_bank'] = $r['nama_bank'];
			$list[$key]['cabang'] = $r['cabang'];
			$list[$key]['lokasi'] = $r['lokasi'];
			$list[$key]['request_id'] = $r['request_id'];
			$list[$key]['problem_type'] = $r['problem_type'];
			$list[$key]['key_open'] = $r['key_open'];
			$list[$key]['key_close'] = $r['key_close'];
			$list[$key]['entry_date'] = $r['entry_date'];
			$list[$key]['status'] = strtoupper($r['status']);
			$list[$key]['button'] = $button_close;
			// $list[$key]['button'] = $button_close;
			
			// EXTEND
			$list[$key]['cse'] = $cse($r['pic']);
			$list[$key]['reported_by'] = $r['reported_by'];
			$list[$key]['reported_problem'] = $r['reported_problem'];
			$list[$key]['email_pic'] = $r['email_pic'];
			$list[$key]['phone_pic'] = $r['phone_pic'];
			$list[$key]['created_by'] = $r['created_by'];
			// $list[$key]['jobcard'] = base_url().'laporanfpdf/jobcard/'.$r['request_id'];
			$list[$key]['jobcard'] = "<a href='".base_url()."laporanfpdf/jobcard/".$r['request_id']."' target='_blank'><button class='btn btn-xs btn-success'>Preview</button></a>";
			
			$key++;
		}
		
		$out['data'] = $list;
		
		echo json_encode($out);
	}
	
	public function json_close() {
		// // error_reporting(0);
		
		// $query = "
			// SELECT *, master_request_key.id as ids, master_request_key.status as status, master_client.nama as nama_bank, master_request_key.pic as pic
			// FROM master_request_key 
			// LEFT JOIN master_atm ON (master_atm.idatm=master_request_key.atm_id)
			// LEFT JOIN master_client ON (master_client.id=master_request_key.bank_id)
		// ";
		
		$query = "
			SELECT *, master_request_key.id as ids, master_request_key.status as status, master_client.nama as nama_bank, master_request_key.pic as pic
			FROM master_request_key 
			LEFT JOIN master_atm ON (master_atm.idatm=master_request_key.atm_id)
			LEFT JOIN master_client ON (master_client.id=master_request_key.bank_id)
		";
		
		$param['query'] 		= trim($query);
		$param['column_order'] 	= array(
										null, 
										'master_request_key.id', 
										'master_request_key.id', 
										'master_request_key.id', 
										'master_request_key.id'
								  );
		$param['column_search'] = array(
										'master_atm.idatm'
								  );
		$param['order'] 		= array('master_request_key.id' => 'desc');
		$param['where'] 		= array(
									array('master_request_key.status' => 'CLOSE')
								);
		
		$param['param'] = json_encode($param);
		$param['post'] 	= $_REQUEST;
		
		$data = $this->datatables->check($param);
		
		
		$r = json_decode($data, true);
		
		$atm = function($id, $field) {
			error_reporting(0);
			$atm = $this->db->query("SELECT $field FROM master_atm WHERE (id='$id' OR idatm='$id')")->row();
			$atm = (array) $atm;
			return $atm[$field];
		};
		
		$bank = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_client WHERE id='$id'")->row()->nama;
			
			return $nama;
		};
		
		$cse = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_staff WHERE id='$id'")->row()->nama;
			
			return $nama;
		};
		
		$out = array();
		$out['draw'] = $r['draw'];
		$out['recordsTotal'] = $r['recordsTotal'];
		$out['recordsFiltered'] = $r['recordsFiltered'];
		$datas = array();
		$key = 0;
		$no = $_REQUEST['start'];
		foreach($r['data'] as $r) {
			$no++;
			
			$url = base_url().'provide_key';
			$button_close = "";
			if($r['status']=="OPEN") {
				$button_close = '<center><a onclick="closeAction(\''.$r['ids'].'\', \''.$r['request_id'].'\')" class="btn btn-sm btn-warning" 
									style="background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;">
									<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'assets/img/del2.png"/>
									Closed
								</a><br>
								<a onclick="deleteAction(\''.$url.'/delete/'.$r['ids'].'\')" class="btn btn-sm btn-danger" 
									style="background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;">
									<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/del.png"/>
									Delete
								</a></center>';
			} else {
				$button_close = '
								<center><a disabled onclick="closeAction(\''.$r['ids'].'\', \''.$r['request_id'].'\')" class="btn btn-sm btn-warning" 
									style="background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;">
									<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'assets/img/del2.png"/>
									Closed
								</a><br>
								<a disabled onclick="deleteAction(\''.$url.'/delete/'.$r['ids'].'\')" class="btn btn-sm btn-danger" 
									style="background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;">
									<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/del.png"/>
									Delete
								</a></center>';
			}
			
			$list[$key]['no'] = $no;
			$list[$key]['atm_id'] = $r['atm_id'];
			$list[$key]['nama_bank'] = $r['nama_bank'];
			$list[$key]['cabang'] = $r['cabang'];
			$list[$key]['lokasi'] = $r['lokasi'];
			$list[$key]['request_id'] = $r['request_id'];
			$list[$key]['problem_type'] = $r['problem_type'];
			$list[$key]['key_open'] = $r['key_open'];
			$list[$key]['key_close'] = $r['key_close'];
			$list[$key]['entry_date'] = $r['entry_date'];
			$list[$key]['status'] = strtoupper($r['status']);
			$list[$key]['button'] = $button_close;
			// $list[$key]['button'] = $button_close;
			
			// EXTEND
			$list[$key]['cse'] = $cse($r['pic']);
			$list[$key]['reported_by'] = $r['reported_by'];
			$list[$key]['reported_problem'] = $r['reported_problem'];
			$list[$key]['email_pic'] = $r['email_pic'];
			$list[$key]['phone_pic'] = $r['phone_pic'];
			$list[$key]['created_by'] = $r['created_by'];
			// $list[$key]['jobcard'] = base_url().'laporanfpdf/jobcard/'.$r['request_id'];
			$list[$key]['jobcard'] = "<a href='".base_url()."laporanfpdf/jobcard/".$r['request_id']."' target='_blank'><button class='btn btn-xs btn-success'>Preview</button></a>";
			
			$key++;
		}
		
		$out['data'] = $list;
		
		echo json_encode($out);
	}
	
	public function json2() {
		// // error_reporting(0);
		
		// $query = "
			// SELECT *, master_request_key.id as ids, master_request_key.status as status, master_client.nama as nama_bank, master_request_key.pic as pic
			// FROM master_request_key 
			// LEFT JOIN master_atm ON (master_atm.idatm=master_request_key.atm_id)
			// LEFT JOIN master_client ON (master_client.id=master_request_key.bank_id)
		// ";
		
		$query = "
			SELECT *, master_request_key.id as ids, primary_table.status as status, master_client.nama as nama_bank, master_request_key.pic as pic FROM master_request_key_detail primary_table 
			LEFT JOIN master_request_key ON(master_request_key.request_id=primary_table.request_id)
			LEFT JOIN master_atm ON(master_atm.idatm=master_request_key.atm_id)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank), 
			(SELECT MAX(id) as pId FROM master_request_key_detail GROUP BY request_id) second_table
			WHERE primary_table.id = second_table.pId
		";
		
		$param['query'] 		= trim($query);
		$param['column_order'] 	= array(
										null, 
										'master_request_key.id', 
										'master_request_key.id', 
										'master_request_key.id', 
										'master_request_key.id'
								  );
		$param['column_search'] = array(
										'master_atm.idatm'
								  );
		$param['order'] 		= array('master_request_key.id' => 'desc');
		$param['where'] 		= array();
		
		$param['param'] = json_encode($param);
		$param['post'] 	= $_REQUEST;
		
		$data = $this->datatables->check($param);
		
		
		$r = json_decode($data, true);
		
		$atm = function($id, $field) {
			error_reporting(0);
			$atm = $this->db->query("SELECT $field FROM master_atm WHERE (id='$id' OR idatm='$id')")->row();
			$atm = (array) $atm;
			return $atm[$field];
		};
		
		$bank = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_client WHERE id='$id'")->row()->nama;
			
			return $nama;
		};
		
		$cse = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_staff WHERE id='$id'")->row()->nama;
			
			return $nama;
		};
		
		$out = array();
		$out['draw'] = $r['draw'];
		$out['recordsTotal'] = $r['recordsTotal'];
		$out['recordsFiltered'] = $r['recordsFiltered'];
		$datas = array();
		$key = 0;
		$no = $_REQUEST['start'];
		foreach($r['data'] as $r) {
			$no++;
			
			$url = base_url().'provide_key';
			$button_close = "";
			if($r['status']=="OPEN") {
				$button_close = '<center><a onclick="closeAction(\''.$r['ids'].'\', \''.$r['request_id'].'\')" class="btn btn-sm btn-warning" 
									style="background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;">
									<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'assets/img/del2.png"/>
									Closed
								</a><br>
								<a onclick="deleteAction(\''.$url.'/delete/'.$r['ids'].'\')" class="btn btn-sm btn-danger" 
									style="background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;">
									<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/del.png"/>
									Delete
								</a></center>';
			} else {
				$button_close = '
								<center><a disabled onclick="closeAction(\''.$r['ids'].'\', \''.$r['request_id'].'\')" class="btn btn-sm btn-warning" 
									style="background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;">
									<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'assets/img/del2.png"/>
									Closed
								</a><br>
								<a disabled onclick="deleteAction(\''.$url.'/delete/'.$r['ids'].'\')" class="btn btn-sm btn-danger" 
									style="background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;">
									<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/del.png"/>
									Delete
								</a></center>';
			}
			
			$list[$key]['no'] = $no;
			$list[$key]['atm_id'] = $r['atm_id'];
			$list[$key]['nama_bank'] = $r['nama_bank'];
			$list[$key]['cabang'] = $r['cabang'];
			$list[$key]['lokasi'] = $r['lokasi'];
			$list[$key]['request_id'] = $r['request_id'];
			$list[$key]['problem_type'] = $r['problem_type'];
			$list[$key]['entry_date'] = $r['entry_date'];
			$list[$key]['status'] = strtoupper($r['status']);
			$list[$key]['button'] = $button_close;
			// $list[$key]['button'] = $button_close;
			
			// EXTEND
			$list[$key]['cse'] = $cse($r['pic']);
			$list[$key]['reported_by'] = $r['reported_by'];
			$list[$key]['reported_problem'] = $r['reported_problem'];
			$list[$key]['email_pic'] = $r['email_pic'];
			$list[$key]['phone_pic'] = $r['phone_pic'];
			$list[$key]['created_by'] = $r['created_by'];
			// $list[$key]['jobcard'] = base_url().'laporanfpdf/jobcard/'.$r['request_id'];
			$list[$key]['jobcard'] = "<a href='".base_url()."laporanfpdf/jobcard/".$r['request_id']."' target='_blank'><button class='btn btn-xs btn-success'>Preview</button></a>";
			
			$key++;
		}
		
		$out['data'] = $list;
		
		echo json_encode($out);
	}
}