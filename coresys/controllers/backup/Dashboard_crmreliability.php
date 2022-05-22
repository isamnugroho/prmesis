<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_crmreliability extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index() {	
	
		$this->data['data_client'] = $this->db->query("SELECT * FROM master_client")->result();
		$this->data['data_cabang'] = $this->db->query("SELECT * FROM master_client GROUP BY cabang")->result();
		$this->data['kunjungan'] = $this->kunjungan();
		$this->data['data_summary'] = $this->dashboard_summary();
		$this->data['data_atm'] = $this->summary_atm();
		$this->data['data_ticket'] = $this->summary_ticket();
		
	
		return view('pages/dashboard_crmreliability/index', $this->data);
	}
	
	public function interval_ticket() {
		$query = "SELECT 
					*,
					SUBSTRING(entry_date, 1, 10) as date,
					(SELECT count(*) FROM master_ticket WHERE entry_date=A.entry_date) as totticket,
					(SELECT count(*) FROM master_ticket WHERE entry_date=A.entry_date AND status LIKE 'done') as tdone,
					(SELECT count(*) FROM master_ticket WHERE entry_date=A.entry_date AND status LIKE 'pending') as tpending,
					(SELECT count(*) FROM master_ticket WHERE entry_date=A.entry_date AND status LIKE 'open') as ttoday
					FROM master_ticket as A GROUP BY SUBSTRING(entry_date, 1, 10)";
		$result = $this->db->query($query)->result();
		
		// echo "<pre>";
		foreach($result as $r) {
			// print_r($r);
			$data[] = array(
				"date" => $r->date,
				"tdone" => $r->tdone,
				"tpending" => $r->tpending,
				"totticket" => $r->totticket,
				"ttoday" => $r->ttoday,
			);
		}
		
		// print_r($data);
		echo json_encode($data);
	}
	
	public function dashboard_summary() {
		$query_total_atm = $this->db->query("SELECT * FROM master_atm");
		$count_atm = $query_total_atm->num_rows();
		
		$query_total_cse = $this->db->query("SELECT * FROM master_staff");
		$count_cse = $query_total_cse->num_rows();
		
		$query_total_client = $this->db->query("SELECT * FROM master_client");
		$count_client = $query_total_client->num_rows();
		
		$query_total_ticket = $this->db->query("SELECT * FROM master_ticket");
		$count_ticket = $query_total_ticket->num_rows();
		
		$query_total_ticket_open = $this->db->query("SELECT * FROM master_ticket WHERE status LIKE '%open%'");
		$count_ticket_open = $query_total_ticket_open->num_rows();
		
		$query_total_ticket_done = $this->db->query("SELECT * FROM master_ticket WHERE status LIKE '%done%'");
		$count_ticket_done = $query_total_ticket_done->num_rows();
		
		$query_total_ticket_pending = $this->db->query("SELECT * FROM master_ticket WHERE status LIKE '%pending%'");
		$count_ticket_pending = $query_total_ticket_pending->num_rows();
		
		$query_today_ticket = $this->db->query("SELECT * FROM master_ticket WHERE entry_date LIKE '%".date("Y-m-d")."%'");
		$count_today_ticket = $query_today_ticket->num_rows();
		
		$query_today_ticket_open = $this->db->query("SELECT * FROM master_ticket WHERE status LIKE '%open%' AND entry_date LIKE '%".date("Y-m-d")."%'");
		$count_today_ticket_open = $query_today_ticket_open->num_rows();
		
		$query_today_ticket_done = $this->db->query("SELECT * FROM master_ticket WHERE status LIKE '%done%' AND entry_date LIKE '%".date("Y-m-d")."%'");
		$count_today_ticket_done = $query_today_ticket_done->num_rows();
		
		$query_today_ticket_pending = $this->db->query("SELECT * FROM master_ticket WHERE status LIKE '%pending%' AND entry_date LIKE '%".date("Y-m-d")."%'");
		$count_today_ticket_pending = $query_today_ticket_pending->num_rows();
		
		// echo "TOTAL ATM : ".$count_atm."<br>";
		// echo "TOTAL CSE : ".$count_cse."<br>";
		// echo "TOTAL CLIENT : ".$count_client."<br>";
		// echo "TOTAL TICKET : ".$count_ticket."<br>";
		// echo "TOTAL TICKET OPEN : ".$count_ticket_open."<br>";
		// echo "TOTAL TICKET DONE : ".$count_ticket_done."<br>";
		// echo "TOTAL TICKET PENDING : ".$count_ticket_pending."<br>";
		// echo "TOTAL TODAY TICKET : ".$count_today_ticket."<br>";
		// echo "TOTAL TODAY TICKET OPEN : ".$count_today_ticket_open."<br>";
		// echo "TOTAL TODAY TICKET DONE : ".$count_today_ticket_done."<br>";
		// echo "TOTAL TODAY TICKET PENDING : ".$count_today_ticket_pending."<br>";
		
		$result = array(
			'total_atm' => $count_atm,
			'total_cse' => $count_cse,
			'total_client' => $count_client,
			'total_ticket' => $count_ticket,
			'total_ticket_open' => $count_ticket_open,
			'total_ticket_done' => $count_ticket_done,
			'total_ticket_pending' => $count_ticket_pending,
			'total_today_ticket' => $count_today_ticket,
			'total_today_ticket_open' => $count_today_ticket_open,
			'total_today_ticket_done' => $count_today_ticket_done,
			'total_today_ticket_pending' => $count_today_ticket_pending,
			'persen_open' => $count_ticket_open/$count_ticket*100,
			'persen_done' => $count_ticket_done/$count_ticket*100,
			'persen_pending' => $count_ticket_pending/$count_ticket*100,
		);
		
		return $result;
	}
	
	// public function dashboard_summary() {
		// $bank = "BANK SULTENG";
		// $query_total_ticket = $this->db->query("SELECT * FROM master_ticket 
												// LEFT JOIN master_atm ON (master_atm.id=master_ticket.atm_id)
												// LEFT JOIN master_client ON (master_client.id=master_atm.id_bank)
												// WHERE master_client.nama='$bank'");
		// $count_ticket = $query_total_ticket->num_rows();
		
		// $query_total_ticket_open = $this->db->query("SELECT * FROM master_ticket 
													 // LEFT JOIN master_atm ON (master_atm.id=master_ticket.atm_id)
													 // LEFT JOIN master_client ON (master_client.id=master_atm.id_bank)
													 // WHERE master_client.nama='$bank' AND master_ticket.status LIKE '%open%'");
		// $count_ticket_open = $query_total_ticket_open->num_rows();
		
		// $query_total_ticket_done = $this->db->query("SELECT * FROM master_ticket  
													 // LEFT JOIN master_atm ON (master_atm.id=master_ticket.atm_id)
													 // LEFT JOIN master_client ON (master_client.id=master_atm.id_bank)
													 // WHERE master_client.nama='$bank' AND master_ticket.status LIKE '%done%'");
		// $count_ticket_done = $query_total_ticket_done->num_rows();
		
		// $query_total_ticket_pending = $this->db->query("SELECT * FROM master_ticket  
														// LEFT JOIN master_atm ON (master_atm.id=master_ticket.atm_id)
														// LEFT JOIN master_client ON (master_client.id=master_atm.id_bank)
														// WHERE master_client.nama='$bank' AND master_ticket.status LIKE '%pending%'");
		// $count_ticket_pending = $query_total_ticket_pending->num_rows();
		
		// $query_today_ticket = $this->db->query("SELECT * FROM master_ticket  
												// LEFT JOIN master_atm ON (master_atm.id=master_ticket.atm_id)
												// LEFT JOIN master_client ON (master_client.id=master_atm.id_bank)
												// WHERE master_client.nama='$bank' AND master_ticket.entry_date LIKE '%".date("Y-m-d")."%'");
		// $count_today_ticket = $query_today_ticket->num_rows();
		
		// $query_today_ticket_open = $this->db->query("SELECT * FROM master_ticket  
													 // LEFT JOIN master_atm ON (master_atm.id=master_ticket.atm_id)
													 // LEFT JOIN master_client ON (master_client.id=master_atm.id_bank)
													 // WHERE master_client.nama='$bank' AND master_ticket.status LIKE '%open%' AND master_ticket.entry_date LIKE '%".date("Y-m-d")."%'");
		// $count_today_ticket_open = $query_today_ticket_open->num_rows();
		
		// $query_today_ticket_done = $this->db->query("SELECT * FROM master_ticket  
													 // LEFT JOIN master_atm ON (master_atm.id=master_ticket.atm_id)
													 // LEFT JOIN master_client ON (master_client.id=master_atm.id_bank)
													 // WHERE master_client.nama='$bank' AND master_ticket.status LIKE '%done%' AND master_ticket.entry_date LIKE '%".date("Y-m-d")."%'");
		// $count_today_ticket_done = $query_today_ticket_done->num_rows();
		
		// $query_today_ticket_pending = $this->db->query("SELECT * FROM master_ticket  
													    // LEFT JOIN master_atm ON (master_atm.id=master_ticket.atm_id)
													    // LEFT JOIN master_client ON (master_client.id=master_atm.id_bank)
													    // WHERE master_client.nama='$bank' AND master_ticket.status LIKE '%pending%' AND master_ticket.entry_date LIKE '%".date("Y-m-d")."%'");
		// $count_today_ticket_pending = $query_today_ticket_pending->num_rows();
														
		// $result = array(
			// 'total_ticket' => $count_ticket,
			// 'total_ticket_open' => $count_ticket_open,
			// 'total_ticket_done' => $count_ticket_done,
			// 'total_ticket_pending' => $count_ticket_pending,
			// 'total_today_ticket' => $count_today_ticket,
			// 'total_today_ticket_open' => $count_today_ticket_open,
			// 'total_today_ticket_done' => $count_today_ticket_done,
			// 'total_today_ticket_pending' => $count_today_ticket_pending,
		// );
		
		// // echo "<pre>";
		// // print_r($result);
		
		// return $result;
	// }
	
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
					master_location.id as id_location,
					master_staff.nama as nama_pic
				FROM master_location 
				LEFT JOIN master_client ON (master_client.id=master_location.id_bank)
				LEFT JOIN trans_schedule ON (trans_schedule.id_lokasi=master_location.id)
				LEFT JOIN master_staff ON (master_staff.id=trans_schedule.id_petugas)
			");
		}
		
		$res = array();
		$i = 0;
		foreach($bank->result() as $r) {
			// $bank = $this->db->query("SELECT count(*) as cnt, merk_mesin FROM master_atm WHERE id_bank='".$r->id."' GROUP BY merk_mesin")->result();
			$bank = $this->db->query("
				SELECT count(*) as cnt, merk_mesin 
				FROM master_location_detail LEFT JOIN master_atm ON (master_location_detail.id_atm=master_atm.id)
				WHERE 
				master_atm.id_bank='".$r->id_bank."' AND
				master_location_detail.id_lokasi='".$r->id_location."' 
				GROUP BY merk_mesin
			")->result();
			$total = $this->db->query("
				SELECT count(*) as cnt  
				FROM master_location_detail LEFT JOIN master_atm ON (master_location_detail.id_atm=master_atm.id)
				WHERE 
				master_atm.id_bank='".$r->id_bank."' AND
				master_location_detail.id_lokasi='".$r->id_location."' 
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
	
	public function summary_ticket() {
		$bank = "BANK SULTENG";
		
		$res = $this->db->query("SELECT *, master_ticket.status as status, master_ticket.pic as pic FROM master_ticket 
									LEFT JOIN master_atm ON (master_atm.id=master_ticket.atm_id)
									LEFT JOIN master_client ON (master_client.id=master_ticket.bank_id)
									WHERE master_client.nama='$bank' ORDER BY master_ticket.entry_date DESC");
		
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
		
		$problem_detail = function($id) {
			$query = "SELECT * FROM trouble_category LEFT JOIN trouble_sub_category ON (trouble_sub_category.id_category=trouble_category.id) WHERE trouble_sub_category.sub_category_name='$id'";
			
			$detail = $this->db->query($query)->row();
			
			// return explode($detail->category_name, " - ")[0];
			return explode(" - ", $detail->category_name)[1];
		};
		
		$cse = function($id) {
			$query = "SELECT nama FROM master_staff WHERE id='$id'";
			$cse = $this->db->query($query)->row();
			
			return $cse->nama;
		};
		
		$arry = array();
		foreach($res->result() as $rows) {
			if(strpos($rows->status, "pending") !== false){ 
				$status = "PENDING";
			} else {
				$status= strtoupper($rows->status);
			}
			
			$arry[] = array(
				'idticket' => $rows->ticket_id,
				'date' => date("d-m-Y", strtotime($rows->entry_date)),
				'idatm' => $atm($rows->atm_id, 'idatm'),
				// 'problem' => $problem_detail($rows->problem_type)." / ".$rows->problem_type,
				'problem' => $rows->problem_type,
				'status' => $status,
				'cse' => $cse($rows->pic),
				'bank' => $bank($atm($rows->atm_id, 'id_bank')),
				'areaservice' => $atm($rows->atm_id, 'cabang'),
				'lokasi' => $atm($rows->atm_id, 'lokasi'),
			);
		}
		
		return $arry;
	}
	
	public function index2() {	
		$client = $this->uri->segment(3);
		$cabang = $this->uri->segment(4);
		
		// echo "<pre style='background-color: white'>";
		// echo $client." ".$cabang;
		$this->data['client'] = $client;
		$this->data['cabang'] = $cabang;
		// $this->data['logo'] = json_decode($this->db->query("SELECT logo FROM master_client WHERE nama='$client' AND cabang='$cabang'")->row()->logo);
		$logo = json_decode($this->db->query("SELECT logo FROM master_client WHERE nama='$client'")->row()->logo);
		$this->data['logo'] = '<img style="float: left; margin: 0px 0px 0px 30px; width: 155px; height: 60px; " src="'.$logo->full_link.'" height="25" width="25" />';
	
		// print_r($this->data['logo']->full_link);
		
		// echo '<img style="float: left; margin: 0px 0px 0px 30px;" src="'.$this->data['logo'].'" height="25" width="25" />';
	
		return view('pages/dashboard_crmreliability/index2', $this->data);
	}
	
	public function get_cabang() {
		$client = $this->uri->segment(3);
		$query = "
			SELECT *
			FROM master_client
			WHERE nama='$client'
		";
		
		$query = $this->db->query($query);
		
		$data[0] = array(
			"id" => "",
			"cabang" => "Pilih Cabang"
		);
		foreach($query->result() as $rows) {
			$data[]= array(
				"id" => $rows->id,
				"cabang" => $rows->cabang
			);  
		}
		
		echo json_encode($data);
        exit();
	}
	
	public function get_data_detail() {
		$client = $this->uri->segment(3);
		$cabang = $this->uri->segment(4);
		
		$array = array(
			"Body ATM Bersih dan tidak berdebu", 
			"ATM Berfungsi / Online", 
			"Brosur ATM tertata rapih",
			"Layar monitor bersih dan terlihat jelas tampilannya",
			"Pin pad ATM bersih dan tidak berdebu",
			"Boot ATM bersih, tidak ada noda atau debu",
			"Sticker ATM tidak terkelupas, pudar atau hilang",
			"Tertera sticker kartu, receipt printer, uang keluar, nominal pecahan uang",
			"Terdapat sticker larangan memakai helm, masker, kacamata gelap, topi, rokok",
			"Terdapat informasi ketersediaan mesin ATM BNI terdekat",
			"Lampu boot ATM menyala",
			"Lampu ruangan ATM menyala dengan baik",
			"Tempat sampah bersih dan tidak ada sampah",
			"Teras ruangan ATM bersih dan tidak rusak",
			"Dinding kaca ruangan bersih",
			"Dinding tembok ruangan bersih",
			"Atap ruangan tidak terbuka dan bocor",
			"AC ruangan ATM bersih, dingin, dan tidak bocor",
			"Peralatan, Kabel rapih dan tidak berantakan",
			"Pintu ATM bersih dan berfungsi dengan baik",
			"Pegangan pintu terpasang dengan baik",
			"Terdapat sticker tarik dan dorong",
			"Teras luar bersih",
			"Dinding luar bersih",
			"Lampu luar menyala",
			"Sticker dinding kaca dan pintu kaca menempel dengan baik",
			"Neon box menyala dan bersih",
			"Box panel listrik terkunci",
			"Token listrik masih tersedia atau tidak",
			"Kamera CCTV",
			"DVR CCTV",
			"UPS",
			"Integrated Transformer",
			"AC",
			"Sticker Kaca",
			"Sticker Mesin",
			"Neon Sign"
		);
		
		$query = "
			SELECT *, trans_activity.id as ids
			FROM trans_activity
			LEFT JOIN trans_clean ON(trans_clean.id=trans_activity.id_clean)
			LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id=trans_clean.id_detail)
			LEFT JOIN master_atm ON(master_atm.id=master_lokasi_detail.id_atm)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE trans_activity.status!='solved' AND master_client.nama='$client' AND master_client.cabang='$cabang'
		";
		
		$query = $this->db->query($query);
		
		// echo "<pre>";
		// print_r($query->result());
		$data = array();
		foreach($query->result() as $rows) {
			$no = 0;
			$prob = '<table style="width:100%">';
			$prob .= 	'<tr>
							<th><b>No.</b></th>
							<th>Checklist</th>
							<th>Status</th>
						</tr>';
			$n = 0;
			foreach(json_decode($rows->action) as $r) {
				$no++;
				if($no>=30) {
					$n++;
					// $prob .= '- '.$array[$no-1].'<br>';
					
					$prob .= 	'<tr>
									<td><b>'.$n.'.</b></td>
									<td>'.$array[$no-1].'</td>
									<td>'.($r->value==0 ? "NOT OK" : "OK").'</td>
								</tr>';
				}
			}
			$prob .= '</table>';
			
			// echo $prob."<br><br>";
			
            $data[]= array(
                "id" => $rows->ids,
                "date" => date("d M Y", strtotime($rows->date)),
                "idatm" => $rows->idatm,
                "cabang" => $rows->cabang,
                "lokasi" => $rows->lokasi,
                "problem" => $prob
            );     
        }
		
		// print_r($data);
		
		echo json_encode($data);
        exit();
	}
	
	public function get_data_problem() {
		$client = $this->uri->segment(3);
		$cabang = $this->uri->segment(4);
		
		$query = "
			SELECT *, trans_activity.id as ids
			FROM trans_activity
			LEFT JOIN trans_clean ON(trans_clean.id=trans_activity.id_clean)
			LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id=trans_clean.id_detail)
			LEFT JOIN master_atm ON(master_atm.id=master_lokasi_detail.id_atm)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE trans_activity.status!='solved' AND master_client.nama='$client' AND master_client.cabang='$cabang'
		";
		
		$query = $this->db->query($query);
		
		// echo "<pre>";
		// print_r($query->result());
		$data = array();
		foreach($query->result() as $rows) {
			$prob = '';
			foreach(json_decode($rows->problem) as $r) {
				$prob .= '- '.$r->keterangan.'<br>';
			}
			
			
            $data[]= array(
				"id" => $rows->ids,
                "date" => date("d M Y", strtotime($rows->date)),
                "idatm" => $rows->idatm,
                "cabang" => $rows->cabang,
                "lokasi" => $rows->lokasi,
                "problem" => $prob
            );     
        }
		
		// print_r($data);
		
		echo json_encode($data);
        exit();
	}
	
	public function get_data_todolist($status, $client, $cabang) {
		// $this->db->select("*, trans_activity.id as ids");
		// $this->db->from('trans_activity');
		// $this->db->join('trans_clean', 'trans_clean.id = trans_activity.id_clean');
		// $this->db->join('master_lokasi_detail', 'master_lokasi_detail.id = trans_clean.id_detail');
		// $this->db->join('master_atm', 'master_atm.id = master_lokasi_detail.id_atm');
		// $this->db->where('trans_activity.status', $status);
		// $query = $this->db->get();
		
		$query = "
			SELECT *, trans_activity.id as ids
			FROM trans_activity
			LEFT JOIN trans_clean ON(trans_clean.id=trans_activity.id_clean)
			LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id=trans_clean.id_detail)
			LEFT JOIN master_atm ON(master_atm.id=master_lokasi_detail.id_atm)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE trans_activity.status='$status' AND master_client.nama='$client' AND master_client.cabang='$cabang'
		";
		
		$query = $this->db->query($query);
		
		// echo "<pre>";
		// print_r($query->result());
		
		foreach($query->result() as $rows) {
			$prob = '';
			foreach(json_decode($rows->problem) as $r) {
				$prob .= '- '.$r->keterangan.'<br>';
			}
			
			
            $data[]= array(
                "id" => $rows->ids,
                "date" => date("d M Y", strtotime($rows->date)),
                "idatm" => $rows->idatm,
                "cabang" => $rows->cabang,
                "lokasi" => $rows->lokasi,
                "problem" => $prob
            );     
        }
		
		// print_r($data);
		
		echo json_encode($data);
        exit();
	}
	
	
	public function get_data_problem_found($status, $client, $cabang) {
		// $this->db->select("COUNT(*) as num");
		// $this->db->from('trans_activity');
		// $this->db->join('trans_clean', 'trans_clean.id = trans_activity.id_clean');
		// $this->db->join('master_lokasi_detail', 'master_lokasi_detail.id = trans_clean.id_detail');
		// $this->db->join('master_atm', 'master_atm.id = master_lokasi_detail.id_atm');
		// $query = $this->db->get();
		
		// $result1 = $query->row();
		
		$query = "
			SELECT COUNT(*) as num
			FROM trans_activity
			LEFT JOIN trans_clean ON(trans_clean.id=trans_activity.id_clean)
			LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id=trans_clean.id_detail)
			LEFT JOIN master_atm ON(master_atm.id=master_lokasi_detail.id_atm)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE master_client.nama='$client' AND master_client.cabang='$cabang'
		";
		$result1 = $this->db->query($query)->row();
		
		// $this->db->select("COUNT(*) as num");
		// $this->db->from('trans_activity');
		// $this->db->join('trans_clean', 'trans_clean.id = trans_activity.id_clean');
		// $this->db->join('master_lokasi_detail', 'master_lokasi_detail.id = trans_clean.id_detail');
		// $this->db->join('master_atm', 'master_atm.id = master_lokasi_detail.id_atm');
		// $this->db->where('trans_activity.status', $status);
		// $query = $this->db->get();
		
		// $result2 = $query->row();
		
		$query = "
			SELECT COUNT(*) as num
			FROM trans_activity
			LEFT JOIN trans_clean ON(trans_clean.id=trans_activity.id_clean)
			LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id=trans_clean.id_detail)
			LEFT JOIN master_atm ON(master_atm.id=master_lokasi_detail.id_atm)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE trans_activity.status='$status' AND master_client.nama='$client' AND master_client.cabang='$cabang'
		";
		$result2 = $this->db->query($query)->row();
		if($result2->num==0 && $result1->num==0) {
			echo "0%";
		} else {
			if(isset($result2)) { echo round((($result2->num/$result1->num)*100), 2)."%"; } else { echo "0%"; }
		}
	}
	
	public function solving_problem() {
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		
		$data = array();
		$data['status'] = $status;
		$this->db->where('id', $id);
		$result = $this->db->update('trans_activity', $data);
		
		if($result) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	 
	public function get_data() {
		$valid_columns = array(
            0=>'username',
            1=>'password',
            2=>'level'
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
        $employees = $this->db->get("dashboard_crmreliability");
        $data = array();
		
		$no = 0;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'dashboard_crmreliability';
            $data[]= array(
                $no,
                $rows->username,
                str_repeat("*", strlen($rows->password)),
                $rows->level,
                '<a href="'.$url.'/edit/'.$rows->id.'" class="btn btn-warning mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/edit.png"/>Edit
				</a>
                 <a href="#" onclick="deleteAction(\''.$url.'/delete/'.$rows->id.'\')" class="btn btn-danger mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/delete.png"/>Delete</a>'
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
		$query = $this->db->select("COUNT(*) as num")->get("dashboard_crmreliability");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
	
		// Total kunjungan
	public function kunjungan()
	{
		$this->db->select('hari, COUNT(*) AS total');
		$this->db->from('kunjungan');
		$this->db->group_by('hari');
		$this->db->order_by('hari', 'desc');
		$this->db->limit(14);
		$query = $this->db->get();
		return $query->result();
	}
}
