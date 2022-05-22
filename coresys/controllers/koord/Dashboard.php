<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	public function index() {
		$this->data['table_view'] = $this->input->get("view");
		$this->data['data_summary'] = $this->dashboard_summary();
		$this->data['summary'] = $this->summary();
		// $this->data['data_atm'] = $this->summary_atm();
		$this->data['data_total_atm'] = 675;
		// $this->data['data_ticket'] = $this->summary_ticket();
		$this->data['data_crm_status'] = $this->data_crm_status();
		return view('pages_koord/dashboard', $this->data);
	}
	
	public function get_job_pagi() {
		$result['job_pagi'] = $this->db->query("
			SELECT count(*) as cnt FROM trans_clean LEFT JOIN trans_clean_detail ON(trans_clean_detail.id_detail=trans_clean.id)
			WHERE trans_clean.date='".date("Y-m-d")."' AND trans_clean_detail.action_pagi=''
		")->row()->cnt;
	}
	
	public function summary() {
		$result = array();
		$result['job_pagi'] = $this->db->query("
			SELECT count(*) as cnt FROM trans_clean LEFT JOIN trans_clean_detail ON(trans_clean_detail.id_detail=trans_clean.id)
			WHERE trans_clean.date='".date("Y-m-d")."' AND trans_clean_detail.action_pagi=''
		")->row()->cnt;
		$result['job_sore'] = $this->db->query("
			SELECT count(*) as cnt FROM trans_clean LEFT JOIN trans_clean_detail ON(trans_clean_detail.id_detail=trans_clean.id)
			WHERE trans_clean.date='".date("Y-m-d")."' AND trans_clean_detail.action_sore=''
		")->row()->cnt;
		$result['done_pagi'] = $this->db->query("
			SELECT count(*) as cnt FROM trans_clean LEFT JOIN trans_clean_detail ON(trans_clean_detail.id_detail=trans_clean.id)
			WHERE trans_clean.date='".date("Y-m-d")."' AND trans_clean_detail.action_pagi!=''
		")->row()->cnt;
		$result['done_sore'] = $this->db->query("
			SELECT count(*) as cnt FROM trans_clean LEFT JOIN trans_clean_detail ON(trans_clean_detail.id_detail=trans_clean.id)
			WHERE trans_clean.date='".date("Y-m-d")."' AND trans_clean_detail.action_sore!=''
		")->row()->cnt;
		$result['switch_schedule'] = $this->db->query("
			SELECT count(*) as cnt FROM trans_switch
		")->row()->cnt;
		$result['complain'] = $this->db->query("
			SELECT count(*) as cnt FROM trans_complaint
		")->row()->cnt;
		$result['total_koord'] = $this->db->query("
			SELECT count(*) as cnt FROM master_user WHERE level='KOORDINATOR'
		")->row()->cnt;
		$result['total_petugas'] =  $this->db->query("
			SELECT count(*) as cnt FROM master_user WHERE level='PETUGAS'
		")->row()->cnt;
		$result['total_grup_area'] =  $this->db->query("
			SELECT count(*) as cnt FROM master_kelolaan
		")->row()->cnt;
		
		return $result;
	}
	
	public function dashboard_summary() {
		$result = array();
		
		$result['total_atm'] = 675;
		$result['total_wilayah'] = 6;
		$result['total_kc'] = 142;
		$result['total_unit'] = 642;
		$result['total_staff'] = 8;
		$result['total_cse'] = 8;
		$result['total_client'] = 0;
		$result['total_ticket'] = 0;
		$result['total_ticket_open'] = 0;
		$result['total_ticket_done'] = 0;
		$result['total_ticket_pending'] = 0;
		$result['total_today_ticket'] = 0;
		$result['total_today_ticket_open'] = 0;
		$result['total_today_ticket_done'] = 0;
		$result['total_today_ticket_pending'] = 0;
		$result['persen_open'] = 0;
		$result['persen_done'] = 0;
		$result['persen_pending'] = 0;
		
		return $result;
	}
	
	public function summary_atm() {
		if($this->uri->segment(3)!==null) {
			$id = $this->uri->segment(3);
			$bank = $this->db->query("SELECT * FROM master_client WHERE id='$id'");
		} else {
			// $bank = $this->db->query("SELECT * FROM master_client");
			$bank = $this->db->query("
				SELECT 
					*, 
					master_client.id as id_bank, 
					master_client.nama as nama_bank, 
					master_kelolaan.id as id_location,
					master_staff.nama as nama_pic
				FROM master_kelolaan 
				LEFT JOIN master_client ON (master_client.id=master_kelolaan.id_bank)
				LEFT JOIN trans_schedule ON (trans_schedule.id_lokasi=master_kelolaan.id)
				LEFT JOIN master_staff ON (master_staff.id=trans_schedule.id_petugas)
			");
		}
		
		$res = array();
		$i = 0;
		foreach($bank->result() as $r) {
			// $bank = $this->db->query("SELECT count(*) as cnt, merk_mesin FROM master_atm WHERE id_bank='".$r->id."' GROUP BY merk_mesin")->result();
			$bank = $this->db->query("
				SELECT count(*) as cnt, merk_mesin 
				FROM master_kelolaan_detail LEFT JOIN master_atm ON (master_kelolaan_detail.id_atm=master_atm.id)
				WHERE 
				master_atm.id_bank='".$r->id_bank."' AND
				master_kelolaan_detail.id_lokasi='".$r->id_location."' 
				GROUP BY merk_mesin
			")->result();
			$total = $this->db->query("
				SELECT count(*) as cnt  
				FROM master_kelolaan_detail LEFT JOIN master_atm ON (master_kelolaan_detail.id_atm=master_atm.id)
				WHERE 
				master_atm.id_bank='".$r->id_bank."' AND
				master_kelolaan_detail.id_lokasi='".$r->id_location."' 
			")->row();
			$res[$i]['bank'] = $r->nama_bank;
			$res[$i]['regional'] = $r->name;
			$res[$i]['pic'] = $r->nama_pic;
			$res[$i]['diebold'] = 0;
			$res[$i]['ncr'] = 0;
			$res[$i]['crm'] = 0;
			$res[$i]['yihua'] = 0;
			if(count($bank)>0) {
				foreach($bank as $rr) {
					// $res[$i]['merk'][] = $rr->merk_mesin;
					if(strtolower($rr->merk_mesin)=="diebold") {
						$res[$i]['diebold'] = $rr->cnt;
					} else if(strtolower($rr->merk_mesin)=="ncr") {
						$res[$i]['ncr'] = $rr->cnt;
					} else if(strtolower($rr->merk_mesin)=="crm") {
						$res[$i]['crm'] = $rr->cnt;
					} else if(strtolower($rr->merk_mesin)=="yihua") {
						$res[$i]['yihua'] = $rr->cnt;
					}
				}
			}
			$res[$i]['total'] = $total->cnt;
			$i++;
		}
			
		// header('Content-Type: application/json');
		// echo json_encode($res);
		return $res;
	}
	
	public function data_crm_status() {
		$query = "SELECT * FROM data_master_kanwil";
		$result = $this->db->query($query)->result();
		
		
		$atm = function($kanwil) {
			$query = "SELECT * FROM master_atm WHERE kanwil='$kanwil'";
			$result = $this->db->query($query)->result();
			
			return $result;
		};
		
		// echo "<pre>";
		// $arr = array();
		foreach($result as $r) {
			$arr[][$r->nama_kanwil] = $atm($r->nama_kanwil);
		}
		// print_r($arr);
		
		// foreach($arr as $r) {
			// foreach ($r as $k => $v) {				
				// print_r($v);
			// }
		// }
		
		return $arr;
	}
	
	public function get_donut_data() {
		$db = \Config\Database::connect();
		$res = $db->query("SELECT count(*) as cnt, merk_mesin FROM master_atm GROUP BY merk_mesin")->getResult();
		
		// print_r($res);
		foreach($res as $r) {
			$data[] = array(
				'value' => intval($r->cnt),
				'label' => strtoupper($r->merk_mesin),
			);
		}
		
		echo json_encode($data);
	}
	
	public function crm_live_status($kanwil) {
		$valid_columns = array(
            0=>'idatm',
            1=>'cabang',
            2=>'lokasi',
            3=>'alamat',
            4=>'merk_mesin',
            5=>'type_mesin'
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
					$this->db->where('kanwil', $kanwil);
                    $this->db->like($sterm,$search);
                } else {
					$this->db->where('kanwil', $kanwil);
                    $this->db->or_like($sterm,$search);
                }
                $x++;
            }                 
        }
		
		$this->db->limit($length,$start);
		if($kanwil!=="0") {
			$this->db->where('kanwil', $kanwil);
		}
        $employees = $this->db->get("master_atm");
        $data = array();
		
		$no = 0;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'master_atm';
            $data[]= array(
                '<a onclick="findThis(\''.$rows->alamat.', '.$rows->kelurahan.', '.$rows->kecamatan.', '.$rows->kabupaten.', '.$rows->kanwil.'\', \''.$rows->idatm.'\')" style="cursor: pointer">'.$rows->idatm.'</a>',
				$rows->alamat,
				$rows->cabang
            );     
        }
		
        $total_employees = $this->totalDatas($kanwil);
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_employees,
            "recordsFiltered" => $total_employees,
            "data" => $data
        );
        echo json_encode($output);
        exit();
	}
	
	public function crm_trans_status($kanwil) {
		$valid_columns = array(
            0=>'idatm',
            1=>'cabang',
            2=>'lokasi',
            3=>'alamat',
            4=>'merk_mesin',
            5=>'type_mesin'
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
					$this->db->where('kanwil', $kanwil);
                    $this->db->like($sterm,$search);
                } else {
					$this->db->where('kanwil', $kanwil);
                    $this->db->or_like($sterm,$search);
                }
                $x++;
            }                 
        }
		
		$this->db->limit($length,$start);
		if($kanwil!=="0") {
			$this->db->where('kanwil', $kanwil);
		}
        $employees = $this->db->get("master_atm");
        $data = array();
		
		$no = 0;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'dashboard';
            $data[]= array(
                '<a onclick="findThis2(\''.$url.'/detail_cash_position/'.$rows->idatm.'\', \''.$rows->idatm.'\')" style="cursor: pointer">'.$rows->idatm.'</a>',
				// $rows->alamat,
				$rows->cabang,
				$rows->idatm,
				$url.'/detail_cash_position/'.$rows->idatm
            );     
        }
		
        $total_employees = $this->totalDatas($kanwil);
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_employees,
            "recordsFiltered" => $total_employees,
            "data" => $data
        );
        echo json_encode($output);
        exit();
	}
	
	public function totalDatas($kanwil) {
		if($kanwil!=="0") {
			$this->db->where('kanwil', $kanwil);
		}
		$query = $this->db->select("COUNT(*) as num")->get("master_atm");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}