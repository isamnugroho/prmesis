<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * Default method
	 */
	public function index()
	{	
		$this->data['table_view'] = $this->input->get("view");
		$this->data['data_summary'] = $this->dashboard_summary();
		$this->data['data_atm'] = $this->summary_atm();
		$this->data['data_total_atm'] = $this->get_total_atm();
		$this->data['data_ticket'] = $this->summary_ticket();
		$this->data['data_crm_status'] = $this->data_crm_status();
		// $this->data['data_view'] = $this->summary_atm();
		return view('pages/dashboard', $this->data);
	}
	
	public function tes() {
		// // master_client
		// $bank = $this->db->query("
			// SELECT * FROM trouble_category 
						// LEFT JOIN trouble_sub_category ON (trouble_sub_category.id_category=trouble_category.id)
		// ")->result();
		// echo "<pre>";
		// print_r($this->summary_ticket());
		// // print_r($bank);
		// // $string = "PM - ATM ";
		// // // echo preg_replace('/\s+/', '', trim($string));
		// // echo $this->reformat($string);
		
		// print_r(get_user_data()['level']);
	}
	
	public function reformat($str) {
		return strtoupper(preg_replace('/\s+/', '', trim($str)));
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
		$result = array();
		
		$query_total_atm = $this->db->query("SELECT * FROM master_atm");
		$count_atm = $query_total_atm->num_rows();
		$result['total_atm'] = $count_atm;
		
		$query_total_wilayah = $this->db->query("SELECT * FROM data_master_kanwil");
		$count_wilayah = $query_total_wilayah->num_rows();
		$result['total_wilayah'] = $count_wilayah;
		
		$query_total_kc = $this->db->query("SELECT * FROM data_master_kc GROUP BY nama_kc");
		$count_kc = $query_total_kc->num_rows();
		$result['total_kc'] = $count_kc;
		
		$query_total_unit = $this->db->query("SELECT * FROM data_master_unitkerja");
		$count_unit = $query_total_unit->num_rows();
		$result['total_unit'] = $count_unit;
		
		$query_total_staff = $this->db->query("SELECT * FROM master_staff");
		$count_staff = $query_total_staff->num_rows();
		$result['total_staff'] = $count_staff;
		
		$query_total_cse = $this->db->query("SELECT * FROM master_staff LEFT JOIN master_user ON(master_user.username=master_staff.nik) WHERE (level='FLM' OR level='SLM')");
		$count_cse = $query_total_cse->num_rows();
		$result['total_cse'] = $count_cse;
		
		$query_total_client = $this->db->query("SELECT * FROM master_client");
		$count_client = $query_total_client->num_rows();
		$result['total_client'] = $count_client;
		
		$query_total_ticket = $this->db->query("SELECT * FROM master_ticket");
		$count_ticket = $query_total_ticket->num_rows();
		$result['total_ticket'] = $count_ticket;
		
		$query_total_ticket_open = $this->db->query("SELECT * FROM master_ticket WHERE status LIKE '%open%'");
		$count_ticket_open = $query_total_ticket_open->num_rows();
		$result['total_ticket_open'] = $count_ticket_open;
		
		$query_total_ticket_done = $this->db->query("SELECT * FROM master_ticket WHERE status LIKE '%done%'");
		$count_ticket_done = $query_total_ticket_done->num_rows();
		$result['total_ticket_done'] = $count_ticket_done;
		
		$query_total_ticket_pending = $this->db->query("SELECT * FROM master_ticket WHERE status LIKE '%pending%'");
		$count_ticket_pending = $query_total_ticket_pending->num_rows();
		$result['total_ticket_pending'] = $count_ticket_pending;
		
		$query_today_ticket = $this->db->query("SELECT * FROM master_ticket WHERE entry_date LIKE '%".date("Y-m-d")."%'");
		$count_today_ticket = $query_today_ticket->num_rows();
		$result['total_today_ticket'] = $count_today_ticket;
		
		$query_today_ticket_open = $this->db->query("SELECT * FROM master_ticket WHERE status LIKE '%open%' AND entry_date LIKE '%".date("Y-m-d")."%'");
		$count_today_ticket_open = $query_today_ticket_open->num_rows();
		$result['persen_open'] = $count_ticket_open/$count_ticket*100;
		
		$query_today_ticket_done = $this->db->query("SELECT * FROM master_ticket WHERE status LIKE '%done%' AND entry_date LIKE '%".date("Y-m-d")."%'");
		$count_today_ticket_done = $query_today_ticket_done->num_rows();
		$result['persen_done'] = $count_ticket_done/$count_ticket*100;
		
		$query_today_ticket_pending = $this->db->query("SELECT * FROM master_ticket WHERE status LIKE '%pending%' AND entry_date LIKE '%".date("Y-m-d")."%'");
		$count_today_ticket_pending = $query_today_ticket_pending->num_rows();
		$result['persen_pending'] = $count_ticket_pending/$count_ticket*100;
		
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
	
	public function get_total_atm() {
		$query = "SELECT master_client.nama, COUNT(*) as total_atm FROM master_atm LEFT JOIN master_client ON (master_client.id=master_atm.id_bank) GROUP BY master_client.id";
		$bank = $this->db->query($query)->result();
		
		$data = array();
		$i = 0;
		foreach($bank as $row) {
			$data[$i]['nama_bank'] = $row->nama;
			$data[$i]['total_atm'] = $row->total_atm;
			$i++;
		}
		
		return $data;
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
	
	public function summary_ticket() {
		$res = $this->db->query("SELECT * FROM master_ticket ORDER BY SUBSTRING(ticket_id, 10) DESC");
		
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
			$query = "SELECT nama FROM master_staff WHERE (id='$id' OR nama LIKE '%$id%')";
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
	
	public function summary_attend() {
		$karyawan = function($param) {
			if($param=="all") {
				$res = $this->db->query("SELECT * FROM master_staff");
				return $res->result();
			} else if($param=="num_row") {
				$res = $this->db->query("SELECT count(*) as cnt FROM master_staff")->row();
				return $res->cnt;
			}
		};
		
		$first_in_check = function($employee_id, $attendance_date) {
			$sql = 'SELECT * FROM master_attendance_time WHERE employee_id = ? and attendance_date = ? limit 1';
			$binds = array($employee_id, $attendance_date);
			$query = $this->db->query($sql, $binds);

			return $query;
		};
		
		$first_out_check = function($employee_id, $attendance_date) {
			$sql = 'SELECT * FROM master_attendance_time WHERE employee_id = ? and attendance_date = ? order by time_attendance_id desc limit 1';
			$binds = array($employee_id,$attendance_date);
			$query = $this->db->query($sql, $binds);
			
			return $query;
		};
		
		$first_in = function($employee_id, $attendance_date) {
			$sql = 'SELECT * FROM master_attendance_time WHERE employee_id = ? and attendance_date = ?';
			$binds = array($employee_id, $attendance_date);
			$query = $this->db->query($sql, $binds);
			
			return $query->result();
		};
		
		$first_out = function($employee_id, $attendance_date) {
			$sql = 'SELECT * FROM master_attendance_time WHERE employee_id = ? and attendance_date = ? order by time_attendance_id desc limit 1';
			$binds = array($employee_id,$attendance_date);
			$query = $this->db->query($sql, $binds);
			
			return $query->result();
		};
		
		$total_hours_worked_attendance = function($employee_id, $attendance_date) {
			$sql = 'SELECT * FROM master_attendance_time WHERE employee_id = ? and attendance_date = ? and total_work != ""';
			$binds = array($employee_id, $attendance_date);
			$query = $this->db->query($sql, $binds);
			
			return $query;
		};
		
		// $data = function($param, $id, $date) {
			// if($param=="all"
				// $this->db->query("SELECT * FROM master_attendance");
			// }
		// };
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		// print_r($karyawan("all"));
		
		$no = 0;
		foreach($karyawan("all") as $r) {
			$no++;
			$full_name = $r->nama;
			$attendance_date = date("Y-m-d");
			$get_day = strtotime($attendance_date);
			$day = date('l', $get_day);
			
			$d_date = date("d-m-Y", strtotime($attendance_date));
			$office_shift = $this->shift('pagi');
			if(!is_null($office_shift)) {
				if($day == 'Monday') {
					if($office_shift['monday_in_time']=='') {
						$in_time = '00:00:00';
						$out_time = '00:00:00';
					} else {
						$in_time = $office_shift['monday_in_time'];
						$out_time = $office_shift['monday_out_time'];
					}
				} else if($day == 'Tuesday') {
					if($office_shift['tuesday_in_time']=='') {
						$in_time = '00:00:00';
						$out_time = '00:00:00';
					} else {
						$in_time = $office_shift['tuesday_in_time'];
						$out_time = $office_shift['tuesday_out_time'];
					}
				} else if($day == 'Wednesday') {
					if($office_shift['wednesday_in_time']=='') {
						$in_time = '00:00:00';
						$out_time = '00:00:00';
					} else {
						$in_time = $office_shift['wednesday_in_time'];
						$out_time = $office_shift['wednesday_out_time'];
					}
				} else if($day == 'Thursday') {
					if($office_shift['thursday_in_time']=='') {
						$in_time = '00:00:00';
						$out_time = '00:00:00';
					} else {
						$in_time = $office_shift['thursday_in_time'];
						$out_time = $office_shift['thursday_out_time'];
					}
				} else if($day == 'Friday') {
					if($office_shift['friday_in_time']=='') {
						$in_time = '00:00:00';
						$out_time = '00:00:00';
					} else {
						$in_time = $office_shift['friday_in_time'];
						$out_time = $office_shift['friday_out_time'];
					}
				} else if($day == 'Saturday') {
					if($office_shift['saturday_in_time']=='') {
						$in_time = '00:00:00';
						$out_time = '00:00:00';
					} else {
						$in_time = $office_shift['saturday_in_time'];
						$out_time = $office_shift['saturday_out_time'];
					}
				} else if($day == 'Sunday') {
					if($office_shift['sunday_in_time']=='') {
						$in_time = '00:00:00';
						$out_time = '00:00:00';
					} else {
						$in_time = $office_shift['sunday_in_time'];
						$out_time = $office_shift['sunday_out_time'];
					}
				}
				
						
				$attendance_status = '';
				$check = $first_in_check($r->id, $attendance_date);	
				if($check->num_rows() > 0) {
					$attendance = $first_in($r->id, $attendance_date);
					$clock_in = new DateTime($attendance[0]->clock_in);
					$clock_in2 = $clock_in->format('h:i a');
					// print_r($attendance);
					
					$office_time =  new DateTime($in_time.' '.$attendance_date);
					//time diff > total time late
					$office_time_new = strtotime($in_time.' '.$attendance_date);
					$clock_in_time_new = strtotime($attendance[0]->clock_in);
					if($clock_in_time_new <= $office_time_new) {
						$total_time_l = '00:00';
					} else {
						$interval_late = $clock_in->diff($office_time);
						$hours_l   = $interval_late->format('%h');
						$minutes_l = $interval_late->format('%i');			
						$total_time_l = $hours_l ."h ".$minutes_l."m";
					}
					
					$total_hrs = $total_hours_worked_attendance($r->id, $attendance_date);
					$hrs_old_int1 = '';
					$Total = '';
					$Trest = '';
					$total_time_rs = '';
					$hrs_old_int_res1 = '';
					
					foreach ($total_hrs->result() as $hour_work){		
						// total work			
						$timee = $hour_work->total_work.':00';
						$str_time =$timee;
			
						$str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $str_time);
						
						sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
						
						$hrs_old_seconds = $hours * 3600 + $minutes * 60 + $seconds;
						
						$hrs_old_int1 = $hrs_old_seconds;
						
						$Total = gmdate("H:i", $hrs_old_int1);	
					}
					if($Total=='') {
						$total_work = '00:00';
					} else {
						$total_work = $Total;
					}

					
					$status = $attendance[0]->attendance_status;
					if($total_time_rs=='') {
						$Trest = '00:00';
					} else {
						$Trest = $total_time_rs;
					}
				} else {
					$clock_in2 = '-';
					$total_time_l = '00:00';
					$total_work = '00:00';
					$Trest = '00:00';
					$clkInIp = $clock_in2;
					
					
					if($office_shift['monday_in_time'] == '' && $day == 'Monday') {
						$status = "Liburan";;	
					} else if($office_shift['tuesday_in_time'] == '' && $day == 'Tuesday') {
						$status = "Liburan";;	
					} else if($office_shift['wednesday_in_time'] == '' && $day == 'Wednesday') {
						$status = "Liburan";;	
					} else if($office_shift['thursday_in_time'] == '' && $day == 'Thursday') {
						$status = "Liburan";;	
					} else if($office_shift['friday_in_time'] == '' && $day == 'Friday') {
						$status = "Liburan";;	
					} else if($office_shift['saturday_in_time'] == '' && $day == 'Saturday') {
						$status = "Liburan";;	
					} else if($office_shift['sunday_in_time'] == '' && $day == 'Sunday') {
						$status = "Liburan";;	
					} 
					// else if(in_array($attendance_date, $holiday_arr)) { // holiday
						// $status = "Liburan";;
					// } 
					// else if(in_array($attendance_date, $leave_arr)) { // on leave
						// $status = "Cuti";
					// }  
					else {
						$status = "Absen";
					}
				}  
				
				$check_out = $first_out_check($r->id, $attendance_date);
				if($check_out->num_rows() == 1) {
					$early_time =  new DateTime($out_time.' '.$attendance_date);
					$first_out = $first_out($r->id, $attendance_date);
					$clock_out = new DateTime($first_out[0]->clock_out);
					
					if ($first_out[0]->clock_out!='') {
						$clock_out2 = $clock_out->format('h:i a');
						$clkOutIp = $clock_out2;
						
						// early leaving
						$early_new_time = strtotime($out_time.' '.$attendance_date);
						$clock_out_time_new = strtotime($first_out[0]->clock_out);
					
						if($early_new_time <= $clock_out_time_new) {
							$total_time_e = '00:00';
						} else {			
							$interval_lateo = $clock_out->diff($early_time);
							$hours_e   = $interval_lateo->format('%h');
							$minutes_e = $interval_lateo->format('%i');			
							$total_time_e = $hours_e ."h ".$minutes_e."m";
						}
						
						/* over time */
						$over_time =  new DateTime($out_time.' '.$attendance_date);
						$overtime2 = $over_time->format('h:i a');
						// over time
						$over_time_new = strtotime($out_time.' '.$attendance_date);
						$clock_out_time_new1 = strtotime($first_out[0]->clock_out);
						
						if($clock_out_time_new1 <= $over_time_new) {
							$overtime2 = '00:00';
						} else {			
							$interval_lateov = $clock_out->diff($over_time);
							$hours_ov   = $interval_lateov->format('%h');
							$minutes_ov = $interval_lateov->format('%i');			
							$overtime2 = $hours_ov ."h ".$minutes_ov."m";
						}			
					}
				} else {
					$clock_out2 =  '-';
					$total_time_e = '00:00';
					$overtime2 = '00:00';
					$clkOutIp = $clock_out2;
				}	
				
				$fclckIn = $clock_in2;
				$fclckOut = $clock_out2;
			} else {
				// attendance date
				$d_date = date("d-m-Y", strtotime($attendance_date));
				$status = '<a href="javascript:void(0)" class="badge badge-danger">'.$this->lang->line('xin_office_shift_not_assigned').'</a>';
				$fclckIn = '--';
				$fclckOut = '--';
				$total_time_l = '--';
				$total_time_e = '--';
				$overtime2 = '--';
				$total_work = '--';
				$Trest = '--';
			}
			
			// error_reporting(0);
			$data[] = array(
				'karyawan' => $full_name,
				'tanggal' => $d_date,
				'status' => $status,
				'clockin' => $fclckIn,
				'clockout' => $fclckOut
			);
		}
		
		
		echo json_encode($data);
	}
	
	public function get_donut_data() {
		$res = $this->db->query("SELECT count(*) as cnt, merk_mesin FROM master_atm GROUP BY merk_mesin")->result();
		
		// print_r($res);
		foreach($res as $r) {
			$data[] = array(
				'value' => intval($r->cnt),
				'label' => strtoupper($r->merk_mesin),
			);
		}
		
		echo json_encode($data);
	}
	
	public function hari_ini($hari){
		switch($hari){
			case 'Sun':
				$hari_ini = "Minggu";
			break;
	 
			case 'Mon':			
				$hari_ini = "Senin";
			break;
	 
			case 'Tue':
				$hari_ini = "Selasa";
			break;
	 
			case 'Wed':
				$hari_ini = "Rabu";
			break;
	 
			case 'Thu':
				$hari_ini = "Kamis";
			break;
	 
			case 'Fri':
				$hari_ini = "Jumat";
			break;
	 
			case 'Sat':
				$hari_ini = "Sabtu";
			break;
			
			default:
				$hari_ini = "Tidak di ketahui";		
			break;
		}
	 
		return $hari_ini;
	 
	}
	
	public function get_week_data() {
		$begin = new DateTime('monday this week');
		$end = clone $begin;    
		$end->modify('next sunday');
		$end->setTime(0,0,1); 
		$interval = new DateInterval('P1D');
		$daterange = new DatePeriod($begin, $interval, $end);

		$data = array();
		foreach($daterange as $date) {
			// echo $date->format('Y-m-d')."<br />";
			$date = $date->format('Y-m-d');
			$ticket = $this->db->query("SELECT count(*) as cnt FROM master_ticket WHERE entry_date LIKE '$date%'")->row();
			$timestamp = strtotime($date);

			$day = date('D', $timestamp);
			$data[] = array(
				"country" => $this->hari_ini($day), 
				"visits" => $ticket->cnt
			);
		}
		
		echo json_encode($data);
	}
	
	public function shift($index) {
		$data = array(
			"pagi" => array(
				"monday_in_time" => "08:00",
				"monday_out_time" => "18:00",
				"tuesday_in_time" => "08:00",
				"tuesday_out_time" => "18:00",
				"wednesday_in_time" => "08:00",
				"wednesday_out_time" => "18:00",
				"thursday_in_time" => "08:00",
				"thursday_out_time" => "18:00",
				"friday_in_time" => "08:00",
				"friday_out_time" => "18:00",
				"saturday_in_time" => "08:00",
				"saturday_out_time" => "18:00",
				"sunday_in_time" => "08:00",
				"sunday_out_time" => "18:00",
			),
			"malam" => array(
				"monday_in_time" => "07:00",
				"monday_out_time" => "19:00",
				"tuesday_in_time" => "07:00",
				"tuesday_out_time" => "19:00",
				"wednesday_in_time" => "07:00",
				"wednesday_out_time" => "19:00",
				"thursday_in_time" => "07:00",
				"thursday_out_time" => "19:00",
				"friday_in_time" => "07:00",
				"friday_out_time" => "19:00",
				"saturday_in_time" => "07:00",
				"saturday_out_time" => "19:00",
				"sunday_in_time" => "07:00",
				"sunday_out_time" => "19:00",
			),
		);
		
		return $data[$index];
	}
	
	public function get_graph() {
		$year = date("Y");
		$month = date("m");
		$res = array();
		$detik = 60;
		$menit = 60;
		$jam = $detik*$menit;
		$hari = 24*$jam;
		$bulan = 30*$hari;
		// $limit = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		for($i=0; $i<12; $i++) {
			// $timestamp = strtotime(date("Y-m-d H:i:s")) + $i * $bulan;
			$default = strtotime("$year-01-01 00:00:00");
			$timestamp = strtotime(date("Y-m-d", strtotime("+".$i." months", $default)));
			$time = date('Y-m-d H:i:s', $timestamp);
			$date = date('Y-m', $timestamp);
			$datetime = new DateTime($time);
			$result = $datetime->getTimestamp()*1000;
			$datetime->setTimestamp($result/1000);
			
			$ticket_total = $this->db->query("SELECT * FROM master_ticket WHERE entry_date LIKE '%$date%'");
			$ticket_open = $this->db->query("SELECT * FROM master_ticket WHERE entry_date LIKE '%$date%' AND status LIKE '%OPEN%'");
			$ticket_pending = $this->db->query("SELECT * FROM master_ticket WHERE entry_date LIKE '%$date%' AND status LIKE '%PENDING%'");
			$ticket_done = $this->db->query("SELECT * FROM master_ticket WHERE entry_date LIKE '%$date%'  AND status LIKE '%DONE%'");
			$res['total'][] = array(
				$datetime->getTimestamp()*1000, 
				$ticket_total->num_rows(),
				$time
			);
			$res['open'][] = array(
				$datetime->getTimestamp()*1000, 
				$ticket_open->num_rows()
			);
			$res['pending'][] = array(
				$datetime->getTimestamp()*1000, 
				$ticket_pending->num_rows()
			);
			$res['done'][] = array(
				$datetime->getTimestamp()*1000, 
				$ticket_done->num_rows()
			);
		}
		
		echo json_encode($res);
	}
	
	public function get_data_dashboard() {
		$arr_atm = "";
		$arr_ticket_open = "";
		$arr_ticket_close = "";
	}
	
	public function get_data_mesin() {
		$query = $this->db->query("SELECT * FROM master_atm");
		$num = $query->num_rows();
		
		echo $num;
	}
	
	public function get_data_user() {
		$query = $this->db->query("SELECT * FROM master_petugas");
		$num = $query->num_rows();
		
		echo $num;
	}
	
	public function get_data_client() {
		$query = $this->db->query("SELECT * FROM master_client");
		$num = $query->num_rows();
		
		echo $num;
	}
	
	public function get_total_ticket() {
		$query = $this->db->query("SELECT * FROM master_ticket");
		$num = $query->num_rows();
		
		echo $num;
	}
	
	public function total_job_done() {
		$query = $this->db->query("SELECT * FROM master_ticket WHERE status='CLOSED'");
		$num = $query->num_rows();
		
		echo ($num);
		
	}
	
	public function total_job_pending() {
		$query = $this->db->query("SELECT * FROM master_ticket WHERE status='PENDING'");
		$num = $query->num_rows();
		
		echo ($num);
		
	}
	
	public function total_job_onprogress() {
		$query = $this->db->query("SELECT * FROM master_ticket WHERE status='OPEN'");
		$num = $query->num_rows();
		
		echo ($num);
		
	}
	
	public function ticket_today() {
		$query = $this->db->query("SELECT * FROM master_ticket WHERE entry_date='".date("Y-m-d")."'");
		$num = $query->num_rows();
		
		echo ($num);
		
	}
	
	public function job_done_today() {
		$query = $this->db->query("SELECT * FROM master_ticket WHERE status='CLOSED' AND entry_date='".date("Y-m-d")."'");
		$num = $query->num_rows();
		
		echo ($num);
		
	}
	
	public function job_pending_today() {
		$query = $this->db->query("SELECT * FROM master_ticket WHERE status='PENDING' AND entry_date='".date("Y-m-d")."'");
		$num = $query->num_rows();
		
		echo ($num);
		
	}
	
	public function get_data_sore() {
		$query = $this->db->query("
			SELECT * FROM master_atm
				LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id_atm=master_atm.id)
				LEFT JOIN trans_clean ON(trans_clean.id_detail=master_lokasi_detail.id AND date='".date("Y-m-d")."' AND jenis_pekerjaan='SORE')
		");
		$num = $query->num_rows();
		
		$query2 = $this->db->query("
			SELECT * FROM master_atm
				LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id_atm=master_atm.id)
				WHERE master_lokasi_detail.id IN (SELECT id_detail FROM trans_clean WHERE date='".date("Y-m-d")."' AND jenis_pekerjaan='SORE')
		");
		$num2 = $query2->num_rows();
		// echo $this->db->last_query();
		
		echo ($num-$num2);
	}
	
	public function get_data_pagi_done() {
		$query = $this->db->query("
			SELECT * FROM master_atm
				LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id_atm=master_atm.id)
				LEFT JOIN trans_clean ON(trans_clean.id_detail=master_lokasi_detail.id AND  date='".date("Y-m-d")."' AND jenis_pekerjaan='PAGI')
		");
		$num = $query->num_rows();
		
		$query2 = $this->db->query("
			SELECT * FROM master_atm
				LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id_atm=master_atm.id)
				WHERE master_lokasi_detail.id IN (SELECT id_detail FROM trans_clean WHERE date='".date("Y-m-d")."' AND jenis_pekerjaan='PAGI')
		");
		$num2 = $query2->num_rows();
		// echo $this->db->last_query();
		
		echo (($num2/$num)*100)."%";
		
	}
	
	public function get_data_sore_done() {
		$query = $this->db->query("
			SELECT * FROM master_atm
				LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id_atm=master_atm.id)
				LEFT JOIN trans_clean ON(trans_clean.id_detail=master_lokasi_detail.id AND date='".date("Y-m-d")."' AND jenis_pekerjaan='SORE')
		");
		$num = $query->num_rows();
		
		$query2 = $this->db->query("
			SELECT * FROM master_atm
				LEFT JOIN master_lokasi_detail ON(master_lokasi_detail.id_atm=master_atm.id)
				WHERE master_lokasi_detail.id IN (SELECT id_detail FROM trans_clean WHERE date='".date("Y-m-d")."' AND jenis_pekerjaan='SORE')
		");
		$num2 = $query2->num_rows();
		// echo $this->db->last_query();
		
		echo (($num2/$num)*100)."%";
	}
	
	public function get_data_atm() {
		$query = $this->db->query("SELECT * FROM master_atm")->result();
		
		$key = 0;
		$res = array();
		foreach($query as $r) {
			$res[$key]['idatm'] = $r->idatm;
			$res[$key]['latlng'] = json_encode(array("lat"=>$r->latitude, "lng"=>$r->longitude));
			
			$key++;
		}
		
		// echo json_encode($query);
		echo json_encode($res);
	}
	
	public function detail_atm($id) {
		$r = $this->db->query("
			SELECT *,
			IFNULL((SELECT status FROM view_crm_state WHERE id_atm=master_atm.idatm), 'OFFLINE') as status
			FROM master_atm
			WHERE idatm='$id'
		")->row();
		
		if($r->status=="OFFLINE") {
			$status = "<span style='color: red; font-weight: bold'>$r->status</span>";
		} else {
			$status = "<span style='color: green; font-weight: bold'>$r->status</span>";
		}
		
		$table = '
			<table class="table table-bordered table-condensed">
				<thead>
					<tr>
						<th>TID</th>
						<th>KANWIL</th>
						<th>BRANCH KC SUPERVISI</th>
						<th>NAMA UNIT KERJA</th>
						<th>LOKASI</th>
						<th>ALAMAT</th>
						<th>KELURAHAN</th>
						<th>KECAMATAN</th>
						<th>KABUPATEN</th>
						<th>KETERANGAN</th>
						<th>STATUS</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>'.$r->idatm.'</td>
						<td>'.$r->kanwil.'</td>
						<td>'.$r->cabang.'</td>
						<td>'.$r->nama_unit.'</td>
						<td>'.$r->lokasi.'</td>
						<td>'.$r->alamat.'</td>
						<td>'.$r->kelurahan.'</td>
						<td>'.$r->kecamatan.'</td>
						<td>'.$r->kabupaten.'</td>
						<td>'.$r->keterangan.'</td>
						<td>'.$status.'</td>
					</tr>
				</tbody>
			</table>
		';
		
		// echo json_encode($query);
		echo $table;
	}
	
	public function detail_trans_atm($id) {
		$r = $this->db->query("
			SELECT *
			FROM master_atm
			LEFT JOIN view_position_cash ON (view_position_cash.id_atm=master_atm.idatm)
			WHERE idatm='$id'
		")->row();
		
		$table = '
			<table class="table table-bordered table-condensed">
				<thead>
					<tr>
						<th>TID</th>
						<th>CASSETTE 1</th>
						<th>CASSETTE 2</th>
						<th>CASSETTE 3</th>
						<th>CASSETTE 4</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>'.$r->idatm.'</td>
						<td>
							DENOM : '.$r->cassette_1_denom.'<br>
							NOTES : '.$r->cassette_1.'<br>
						</td>
						<td>
							DENOM : '.$r->cassette_2_denom.'<br>
							NOTES : '.$r->cassette_2.'<br>
						</td>
						<td>
							DENOM : '.$r->cassette_3_denom.'<br>
							NOTES : '.$r->cassette_3.'<br>
						</td>
						<td>
							DENOM : '.$r->cassette_4_denom.'<br>
							NOTES : '.$r->cassette_4.'<br>
						</td>
					</tr>
				</tbody>
			</table>
		';
		
		// echo json_encode($query);
		echo $table;
	}
	
	public function detail_cash_position($id) {
		$r = $this->db->query("SELECT * FROM view_position_cash WHERE id_atm='$id'")->row();
		
		$key = 0;
		$res = array();
		// foreach($query as $r) {
			// $res[$key]['label'] = $r->cassette_1_denom;
			// $res[$key]['latlng'] = json_encode(array("lat"=>$r->latitude, "lng"=>$r->longitude));
			
			// $key++;
		// }
		
		$valid = function($valid, $data, $denom) {
			if($valid == $denom) {
				return intval($data);
			} else {
				return 0;
			}
		};
		
		$res[0]['label'] = "100.000";
		$res[0]['data'] = 	array(
								$valid("100000", $r->cassette_1, $r->cassette_1_denom), 
								$valid("100000", $r->cassette_2, $r->cassette_2_denom), 
								$valid("100000", $r->cassette_3, $r->cassette_3_denom), 
								$valid("100000", $r->cassette_4, $r->cassette_4_denom), 
								0, 
								0
							);
		$res[0]['backgroundColor'] = array('rgba(54, 162, 235, 0.2)');
		$res[0]['borderColor'] = array('rgba(54, 162, 235, 1)');
		$res[0]['borderWidth'] = 1;
		
		$res[1]['label'] = "50.000";
		$res[1]['data'] = 	array(
								$valid("50000", $r->cassette_1, $r->cassette_1_denom), 
								$valid("50000", $r->cassette_2, $r->cassette_2_denom), 
								$valid("50000", $r->cassette_3, $r->cassette_3_denom), 
								$valid("50000", $r->cassette_4, $r->cassette_4_denom), 
								0, 
								0
							);
		$res[1]['backgroundColor'] = array('rgba(255, 99, 132, 0.2)');
		$res[1]['borderColor'] = array('rgba(255, 99, 132, 1)');
		$res[1]['borderWidth'] = 1;
		
		$res[2]['label'] = "MIX";
		$res[2]['data'] = 	array(
								0, 
								0, 
								0, 
								0, 
								intval($r->mix), 
								0
							);
		$res[2]['backgroundColor'] = array('rgba(255, 206, 86, 0.2)');
		$res[2]['borderColor'] = array('rgba(255, 206, 86, 1)');
		$res[2]['borderWidth'] = 1;
		
		$res[3]['label'] = "REJECT";
		$res[3]['data'] = 	array(
								0, 
								0, 
								0, 
								0, 
								0, 
								intval($r->reject)
							);
		$res[3]['backgroundColor'] = array('rgba(75, 192, 192, 0.2)');
		$res[3]['borderColor'] = array('rgba(75, 192, 192, 1)');
		$res[3]['borderWidth'] = 1;
		
		// echo json_encode($query);
		echo json_encode($res);
		// echo "<pre>";
		// print_r($res);
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
