<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_ticketslm extends MY_Controller {
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
        return view('pages/new_ticketslm/index', $this->data);
		// print_r($this->data['user_access']);
		
		// echo $created_by;
    }
	
    public function ticket_new() {
        return view('pages/new_ticketslm/index_new', $this->data);
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
				
				// print_r(date("d-m-Y", strtotime($param2[6])));
				// print_r($param2);
				
				// $leading = $kode->kode_ticket.date('ymd');
				$bank = $param2[22];
				$kode = $this->db->query("SELECT * FROM master_client WHERE nama='".$bank."'")->row();
				$date = date("dmy", strtotime($param2[6]));
				$date1 = date("dm", strtotime($param2[6]));
				$date2 = date("d-m-Y", strtotime($param2[6]));
				$leading = $kode->kode_ticket.$date;
				$check = $date1;
				$res = $this->db->query("SELECT ticket_id FROM slm_master_ticket WHERE ticket_id LIKE '%$check%' ORDER BY SUBSTRING(ticket_id, 10) DESC");
				if($res->num_rows()==0) {
					if($code==0) {
						$code = 1;
					} else {
						$code = $code + 1;
					}
				} else {
					if($code==0) {
						$kode = $res->row()->ticket_id;
						echo "KODE : ".$kode;
						echo "<br>QUERY : "."SELECT ticket_id FROM slm_master_ticket WHERE ticket_id LIKE '%$check%' ORDER BY ticket_id DESC<br>";
						$kode = intval(substr($kode, strlen($leading))) + 1;
						$code = $kode;
					} else {
						$code = $code + 1;
					}
				}
				$ticket = str_pad($code, 4, '0', STR_PAD_LEFT);
				$ticket = $leading.$ticket;
				$data = array(
					"ticket_id" => $ticket,
					"atm_id" => $param2[1],
					"service_type" => $param2[2]." - ATM",
					"problem_type" => $param2[3],
					"reported_problem" => $param2[4],
					"reported_by" => $param2[5],
					"entry_date" => date("d-m-Y H:i:s", strtotime($param2[6])),
					"email_date" => date("d-m-Y H:i:s", strtotime($param2[7])),
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
					"ticket_id" => $ticket,
					"atm_id" => $param2[1],
					"service_type" => $param2[2]." - ATM",
					"problem_type" => $param2[3],
					"reported_problem" => $param2[4],
					"reported_by" => $param2[5],
					"entry_date" => date("d-m-Y H:i:s", strtotime($param2[6])),
					"email_date" => date("d-m-Y H:i:s", strtotime($param2[7])),
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
				
				
				$this->db->where('ticket_id', $ticket);
				$q = $this->db->get('slm_master_ticket');
				if ( $q->num_rows() > 0 ) {
					$this->db->where('ticket_id', $ticket);
					$this->db->update('slm_master_ticket', $data);
				} else {
					$this->db->set('ticket_id', $ticket);
					$this->db->insert('slm_master_ticket', $data);
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
        $ticket_id = trim($this->input->post("ticket_id"));
        $service_type = explode(" - ", explode(" / ", $this->input->post("service_type"))[0])[0];
		$problem_type = explode(" / ", $this->input->post("service_type"))[1];
        $reported_problem = trim($this->input->post("reported_problem"));
        $reported_by = trim($this->input->post("reported_by"));
        $email_pic = trim($this->input->post("email_pic"));
        $phone_pic = trim($this->input->post("phone_pic"));
        $method_by_email = trim($this->input->post("email_method"));
        $method_by_phone = trim($this->input->post("phone_method"));
        $pic = trim($this->input->post("pic"));
		$created_by = strtoupper($this->data['user_access']['name']=="" ? $this->data['user_access']['username'] : $this->data['user_access']['name']);

		$ticket_id = $this->create_code("SLM");
        $data['id'] = $id;
        $data['ticket_id'] = $ticket_id;
        $data['bank_id'] = $bank_id;
        $data['atm_id'] = $idatm;
        $data['service_type'] = $service_type;
        $data['problem_type'] = $problem_type;
        $data['reported_problem'] = $reported_problem;
        $data['reported_by'] = $reported_by;
        $data['email_pic'] = $email_pic;
        $data['phone_pic'] = $phone_pic;
        $data['method_by_email'] = ($method_by_email=="" ? "false" : "true");
        $data['method_by_phone'] = ($method_by_phone=="" ? "false" : "true");
        $data['entry_date'] = date("Y-m-d H:i:s");
        $data['email_date'] = date("Y-m-d H:i:s", strtotime($email_date));
        $data['pic'] = $pic;
        $data['created_by'] = $created_by;
		
        $data2['ticket_id'] = $ticket_id;
		$data2['pic'] = $pic;
		
		
		$in = new DateTime($email_date);
		$out = new DateTime(date("d-m-Y H:i:s"));
		if ($in > $out) $out->add(new DateInterval('P1D'));
		$diff = $out->diff($in);
		
        // $data['late_input'] = $diff->format('%H:%I:%S');
        $data['late_input'] = $diff->format('%H:%I');
		// print_r($data);

        $res = $this->db->insert('slm_master_ticket', $data);
        $this->db->insert('slm_master_ticket_detail', $data2);
		// echo $this->last_query();
        
        if($res) {
			$kode_costing = $this->db->query("SELECT kode_costing FROM finance_costing WHERE atm_id='$idatm'")->row()->kode_costing;
			$job_order = $this->db->query("SELECT job_order FROM finance_costing WHERE atm_id='$idatm'")->row()->job_order;
			
			$this->db->where('ticket_id', $ticket_id);
			$q = $this->db->get('finance_akomodation');
			
			$data_n['kode_costing'] = $kode_costing;
			$data_n['job_order'] = $job_order;
			if ($q->num_rows() > 0) {
				$this->db->where('ticket_id', $ticket_id);
				$res = $this->db->update('finance_akomodation', $data_n);
			} else {
				$this->db->set('ticket_id', $ticket_id);
				$res = $this->db->insert('finance_akomodation', $data_n);
			}
			
			$this->notif_model->notif($pic);
            $result['status'] = 'success';
        } else {
            $result['status'] = 'failed';
        }

        echo json_encode($result);
    }
    
    public function update() {}

    public function close($id) {
		$this->db->where('id', $id);
		$this->db->update('slm_master_ticket', array("status"=>"CLOSE"));
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	} 

    public function close_manual() {
		// print_r($this->input->post());
		$ticket_id = trim($this->input->post("closing_ticket"));
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
		$this->db->where('ticket_id', $ticket_id);
		$result = $this->db->update('slm_master_ticket', $data_n);
		
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
        $result = $this->db->delete('slm_master_ticket');
		
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
        $idatm = trim($this->input->post("idatm"));
		$kode = $this->db->query("SELECT * FROM master_atm LEFT JOIN master_client ON(master_atm.id_bank=master_client.id) WHERE master_atm.idatm='".$idatm."'")->row();
		
		$leading = $kode->kode_ticket.date('ymd');
		$check = date('ym');
		$res = $this->db->query("SELECT ticket_id FROM slm_master_ticket WHERE ticket_id LIKE '%$check%' ORDER BY SUBSTRING(ticket_id, 10) DESC");
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

    function get_ticket() {
        $id = trim($this->input->post("id"));
		// $id = '478';	
		// $id = '247';
		$ada = $this->db->query("SELECT * FROM finance_costing WHERE atm_id='".$id."'")->num_rows();
		
		
		if($ada==0) {
			echo "nojo";
		} else {
			$kode = $this->db->query("SELECT * FROM master_atm LEFT JOIN master_client ON(master_atm.id_bank=master_client.id) WHERE master_atm.idatm='".$id."'")->row();
			
			$leading = $kode->kode_ticket.date('ymd');
			$check = date('ym');
			$res = $this->db->query("SELECT ticket_id FROM slm_master_ticket WHERE ticket_id LIKE '%$check%' ORDER BY SUBSTRING(ticket_id, 10) DESC");
			if($res->num_rows()==0) {
				$kode = 1;
			} else {
				$kode = $res->row()->ticket_id;
				$kode = intval(substr($kode, strlen($leading))) + 1;
			}
			$ticket = str_pad($kode, 4, '0', STR_PAD_LEFT);
			$ticket = $leading.$ticket;

			echo $ticket;
		}
    }

    function get_ticket2() {
        $leading = "T".date('Ym');
        $check = date('Ym');
        $res = $this->db->query("SELECT ticket_id FROM slm_master_ticket WHERE ticket_id LIKE '%$check%' ORDER BY ticket_id DESC");
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

	function create_code($kode) {
		$leading = $kode.date('ymd');
		$check = date('ym');
        if($kode=="SLM") {
		    $res = $this->db->query("SELECT ticket_id FROM slm_master_ticket WHERE ticket_id LIKE '%$check%' ORDER BY SUBSTRING(ticket_id, 10) DESC");
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

    function select_atm() {
        $search = $this->input->post('search');
		// if($search!="") {
		$search = "%".strtolower($search)."%";
		// }
		$query = "SELECT *, master_atm.id as id, master_atm.alamat as alamat FROM master_atm LEFT JOIN master_client ON (master_atm.id_bank=master_client.id) 
		WHERE (master_atm.idatm LIKE '$search' OR master_client.nama LIKE '$search' OR master_client.nama_lengkap LIKE '$search' OR master_atm.sn_mesin LIKE '$search')";
		$result = $this->db->query($query)->result();
		
		
		$bank = function($id) {
			$nama = $this->db->query("SELECT alamat FROM master_client WHERE id='$id'")->row()->alamat;
			return $alamat;
		};
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->idatm!=="") {
					$list[$key]['id'] = $row->idatm;
					$list[$key]['text'] = $row->idatm." / ".$row->alamat; 
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
					WHERE master_user.level='slm' AND master_location.id_bank='$id_bank' AND (master_staff.nama LIKE '$search') GROUP BY master_staff.id";
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
            0=>'slm_master_ticket.id',
            1=>'slm_master_ticket.atm_id',
            2=>'master_atm.cabang',
            3=>'master_atm.lokasi',
            4=>'slm_master_ticket.ticket_id',
            5=>'slm_master_ticket.problem_type',
            6=>'slm_master_ticket.entry_date',
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
        $this->db->select('*,slm_master_ticket.id as ids, slm_master_ticket.status as status');
        $this->db->from('slm_master_ticket');
		$this->db->join('master_atm', 'master_atm.idatm=slm_master_ticket.atm_id');
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
			$url = base_url().'new_ticketslm';
			
			$button_close = "";
			// if($rows->status=="OPEN") {
				$button_close = '<a onclick="closeAction(\''.$rows->ids.'\', \''.$rows->ticket_id.'\')" class="btn btn-warning mr-1 zoomsmall" 
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
                $rows->ticket_id,
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
        $query = $this->db->select("COUNT(*) as num")->get("slm_master_ticket");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }
	
	public function json() {
		// // error_reporting(0);
		
		// $query = "
			// SELECT *, slm_master_ticket.id as ids, slm_master_ticket.status as status, master_client.nama as nama_bank, slm_master_ticket.pic as pic
			// FROM slm_master_ticket 
			// LEFT JOIN master_atm ON (master_atm.idatm=slm_master_ticket.atm_id)
			// LEFT JOIN master_client ON (master_client.id=slm_master_ticket.bank_id)
		// ";
		
		$query = "
			SELECT *, slm_master_ticket.id as ids, slm_master_ticket.status as status, master_client.nama as nama_bank, slm_master_ticket.pic as pic
			FROM slm_master_ticket 
			LEFT JOIN master_atm ON (master_atm.idatm=slm_master_ticket.atm_id)
			LEFT JOIN master_client ON (master_client.id=slm_master_ticket.bank_id)
		";
		
		$param['query'] 		= trim($query);
		$param['column_order'] 	= array(
										null, 
										'slm_master_ticket.id', 
										'slm_master_ticket.id', 
										'slm_master_ticket.id', 
										'slm_master_ticket.id'
								  );
		$param['column_search'] = array(
										'master_atm.idatm'
								  );
		$param['order'] 		= array('slm_master_ticket.id' => 'desc');
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
			
			$url = base_url().'new_ticketslm';
			$button_close = "";
			if($r['status']=="OPEN") {
				$button_close = '<center><a onclick="closeAction(\''.$r['ids'].'\', \''.$r['ticket_id'].'\')" class="btn btn-sm btn-warning" 
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
								<center><a disabled onclick="closeAction(\''.$r['ids'].'\', \''.$r['ticket_id'].'\')" class="btn btn-sm btn-warning" 
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
			$list[$key]['ticket_id'] = $r['ticket_id'];
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
			// $list[$key]['jobcard'] = base_url().'laporanfpdf/jobcard/'.$r['ticket_id'];
			$list[$key]['jobcard'] = "<a href='".base_url()."laporanfpdf/jobcard/".$r['ticket_id']."' target='_blank'><button class='btn btn-xs btn-success'>Preview</button></a>";
			
			$key++;
		}
		
		$out['data'] = $list;
		
		echo json_encode($out);
	}
	
	public function json2() {
		// // error_reporting(0);
		
		// $query = "
			// SELECT *, slm_master_ticket.id as ids, slm_master_ticket.status as status, master_client.nama as nama_bank, slm_master_ticket.pic as pic
			// FROM slm_master_ticket 
			// LEFT JOIN master_atm ON (master_atm.idatm=slm_master_ticket.atm_id)
			// LEFT JOIN master_client ON (master_client.id=slm_master_ticket.bank_id)
		// ";
		
		$query = "
			SELECT *, slm_master_ticket.id as ids, primary_table.status as status, master_client.nama as nama_bank, slm_master_ticket.pic as pic FROM slm_master_ticket_detail primary_table 
			LEFT JOIN slm_master_ticket ON(slm_master_ticket.ticket_id=primary_table.ticket_id)
			LEFT JOIN master_atm ON(master_atm.idatm=slm_master_ticket.atm_id)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank), 
			(SELECT MAX(id) as pId FROM slm_master_ticket_detail GROUP BY ticket_id) second_table
			WHERE primary_table.id = second_table.pId
		";
		
		$param['query'] 		= trim($query);
		$param['column_order'] 	= array(
										null, 
										'slm_master_ticket.id', 
										'slm_master_ticket.id', 
										'slm_master_ticket.id', 
										'slm_master_ticket.id'
								  );
		$param['column_search'] = array(
										'master_atm.idatm'
								  );
		$param['order'] 		= array('slm_master_ticket.id' => 'desc');
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
			
			$url = base_url().'new_ticketslm';
			$button_close = "";
			if($r['status']=="OPEN") {
				$button_close = '<center><a onclick="closeAction(\''.$r['ids'].'\', \''.$r['ticket_id'].'\')" class="btn btn-sm btn-warning" 
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
								<center><a disabled onclick="closeAction(\''.$r['ids'].'\', \''.$r['ticket_id'].'\')" class="btn btn-sm btn-warning" 
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
			$list[$key]['ticket_id'] = $r['ticket_id'];
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
			// $list[$key]['jobcard'] = base_url().'laporanfpdf/jobcard/'.$r['ticket_id'];
			$list[$key]['jobcard'] = "<a href='".base_url()."laporanfpdf/jobcard/".$r['ticket_id']."' target='_blank'><button class='btn btn-xs btn-success'>Preview</button></a>";
			
			$key++;
		}
		
		$out['data'] = $list;
		
		echo json_encode($out);
	}
}