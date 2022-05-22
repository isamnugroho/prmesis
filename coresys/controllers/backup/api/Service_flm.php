<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Service_flm extends REST_Controller {
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
	
	function update_token_post() {
		echo "AAA";
	}
	
	function dashboard2_get() {
		$id_user = $this->input->get('id_user');
		
		$query = $this->db->query("
			SELECT * FROM master_atm
				LEFT JOIN master_location_detail ON(master_location_detail.id_atm=master_atm.id)
				LEFT JOIN trans_clean ON(trans_clean.id_detail=master_location_detail.id AND date='".date("Y-m-d")."')
				LEFT JOIN trans_jadwal ON(trans_jadwal.id_lokasi=master_location_detail.id_lokasi)
				WHERE trans_jadwal.id_petugas='".$id_user."'
		");
		$num1 = $query->num_rows();
		
		// echo $num1."<br>";
		
		$query = $this->db->query("SELECT * FROM trans_clean WHERE date='".date("Y-m-d")."' AND id_petugas='".$id_user."'");
		$num2 = $query->num_rows();
		
		// echo $num2."<br>";
		
		
		$result['data_job'] = ($num1-$num2);
		$result['data_done'] = $num2;
		
		echo json_encode($result);
	}
	
	function dashboard_get() {
		$id_user = $this->input->get('id_user');
		
		$query1 = $this->db->query("SELECT * FROM flm_master_ticket WHERE entry_date LIKE '%".date("Y-m-d")."%' AND pic='".$id_user."'");
		$num1 = $query1->num_rows();
		
		$query2 = $this->db->query("SELECT * FROM flm_master_ticket WHERE entry_date LIKE '%".date("Y-m-d")."%' AND pic='".$id_user."'");
		$num2 = $query2->num_rows();
		
		
		$result['data_job'] = $num1;
		$result['data_done'] = $num2;
		
		echo json_encode($result);
	}
	
	function new_jobX_get() {
		// ini_set('display_errors', 1);
		// ini_set('display_startup_errors', 1);
		// error_reporting(E_ALL);
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		$query = "
			SELECT master_atm.*, flm_master_ticket.*, flm_master_ticket.id as ids, master_client.nama as nama_bank FROM flm_master_ticket
			LEFT JOIN master_atm ON(master_atm.idatm=flm_master_ticket.atm_id)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE flm_master_ticket.pic='".$id_user."' AND accept_time IS NULL
		";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();
		
		// echo $this->db->last_query();
		// print_r($res);

		if ($num_rows > 0) {
			$list = array();
			$key=0;
			foreach($res as $r) {
				$list[$key]['id'] = $r['ids'];
				$list[$key]['ticket_id'] = $r['ticket_id'];
				$list[$key]['atm_id'] = $r['atm_id'];
				$list[$key]['nama_bank'] = $r['nama_bank'];
				$list[$key]['cabang'] = $r['cabang'];
				$list[$key]['lokasi'] = $r['lokasi'];
				$list[$key]['alamat'] = $r['alamat'];
				
				$key++;
			}
			
			$result['data'] = $list;
		}

		echo json_encode($result);
	}

	function new_job_get() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		$query = "
			SELECT master_atm.*, flm_master_ticket.*, flm_master_ticket.id as ids, master_client.nama as nama_bank FROM flm_master_ticket
			LEFT JOIN master_atm ON(master_atm.idatm=flm_master_ticket.atm_id)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE flm_master_ticket.pic='".$id_user."' AND accept_time IS NOT NULL AND end_job IS NULL
		";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();

		if ($num_rows > 0) {
			$list = array();
			$key=0;
			foreach($res as $r) {
				$list[$key]['id'] = $r['ids'];
				$list[$key]['ticket'] = $r['ticket_id'];
				$list[$key]['idatm'] = $r['idatm'];
				$list[$key]['nama_bank'] = $r['nama_bank'];
				$list[$key]['cabang'] = $r['cabang'];
				$list[$key]['lokasi'] = $r['lokasi'];
				$list[$key]['alamat'] = $r['alamat'];
				
				$key++;
			}
			
			$result['data'] = $list;
		}

		echo json_encode($result);
	}
	
	function job_list_get() {
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		$query = "
			SELECT master_atm.*, flm_master_ticket.*, flm_master_ticket.id as ids, master_client.nama as nama_bank FROM flm_master_ticket
			LEFT JOIN master_atm ON(master_atm.idatm=flm_master_ticket.atm_id)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE flm_master_ticket.pic='".$id_user."' AND flm_master_ticket.accept_time IS NOT NULL AND flm_master_ticket.end_job IS NULL AND flm_master_ticket.status!='pending-pekerjaan'
		";
		
		// $query = $this->db->query($query);
		// $num_rows = $query->num_rows();
		// $res = $query->result_array();
		
		// echo json_encode($res);
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();

		if ($num_rows > 0) {
			$list = array();
			$key=0;
			foreach($res as $r) {
				$list[$key]['id'] = $r['ids'];
				$list[$key]['ticket_id'] = $r['ticket_id'];
				$list[$key]['atm_id'] = $r['atm_id'];
				$list[$key]['nama_bank'] = $r['nama_bank'];
				$list[$key]['cabang'] = $r['cabang'];
				$list[$key]['lokasi'] = $r['lokasi'];
				$list[$key]['alamat'] = $r['alamat'];
				
				$key++;
			}
			
			$result['data'] = $list;
		}

		echo json_encode($list);
	}
	
	function job_pending_get() {
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		$query = "
			SELECT *, flm_master_ticket.id as id FROM flm_master_ticket LEFT JOIN master_atm ON(master_atm.id=flm_master_ticket.atm_id) 
			WHERE flm_master_ticket.pic='".$id_user."' AND accept_time IS NOT NULL AND end_job IS NOT NULL AND 
			(flm_master_ticket.status='pending-sparepart' OR flm_master_ticket.status='pending')
		";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();
		
		echo json_encode($res);
	}
	
	function job_done_get() {
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		$query = "
			SELECT *, flm_master_ticket.id as id FROM flm_master_ticket LEFT JOIN master_atm ON(master_atm.id=flm_master_ticket.atm_id) 
			WHERE flm_master_ticket.pic='".$id_user."' AND accept_time IS NOT NULL AND end_job IS NOT NULL AND 
			(flm_master_ticket.status='done') AND flm_master_ticket.entry_date > '2021-04-30 23:59:59'
		";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();
		
		// echo json_encode($res);
		
		if ($num_rows > 0) {
			$list = array();
			$key=0;
			$no = 0;
			foreach($res as $r) {
				$no++;
				$list[$key]['no'] = $no;
				$list[$key]['id'] = $r['id'];
				$list[$key]['ticket_id'] = $r['ticket_id'];
				$list[$key]['atm_id'] = $r['atm_id'];
				
				$key++;
			}
			
			$result['data'] = $list;
		}

		echo json_encode($list);
	}
	
	function pending_jobcard_get() {
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		$query = "
			SELECT *, flm_master_ticket.id as id FROM flm_master_ticket LEFT JOIN master_atm ON(master_atm.id=flm_master_ticket.atm_id) 
			WHERE flm_master_ticket.pic='".$id_user."' AND accept_time IS NOT NULL AND end_job IS NOT NULL AND 
			(flm_master_ticket.status='pending-sparepart' OR flm_master_ticket.status='pending')
		";
		
		$query = "
			SELECT * FROM flm_master_ticket WHERE 
			ticket_id NOT IN (SELECT ticket_id FROM trans_jobcard) AND
			flm_master_ticket.pic='".$id_user."' AND flm_master_ticket.entry_date > '2021-04-30 23:59:59'
			ORDER BY flm_master_ticket.id DESC
		";
		
		$query = "
			SELECT * FROM flm_master_ticket WHERE 
			ticket_id NOT IN (SELECT ticket_id FROM trans_jobcard) AND flm_master_ticket.entry_date > '2021-04-30 23:59:59'
			ORDER BY flm_master_ticket.id DESC
		";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();
		
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		
		$list = array();
		$key=0;
		$no = 0;
		if ($num_rows > 0) {
			foreach($res as $r) {
				if($r['end_job']!=null) {
					$thn = date("Y", strtotime($r['end_job']));
					$bln = $bulan[(int)date("m", strtotime($r['end_job']))];
					$idatm = $r['atm_id'];
					$idticket = $r['ticket_id'];
					
					$dir_tahun = "upload/documentation/".$thn;
					$dir_bulan = $dir_tahun."/".$bln;
					$dir_idatm = $dir_tahun."/".$bln."/".$idatm;
					$dir_idticket = $dir_tahun."/".$bln."/".$idatm."/".$idticket;
					
					// echo $dir_idticket."<br>";
					
					foreach(glob($dir_idticket.'/*.*') as $file) {
						$file_name = basename($file)."<br>";
						
						if(strpos($file_name, "JC_") !== false){
							// echo $file_name."<br>";
							$no++;
							$list[$key]['no'] = $no;
							$list[$key]['id'] = $r['id'];
							$list[$key]['ticket_id'] = $r['ticket_id'];
							$list[$key]['atm_id'] = $r['atm_id'];
							
							$key++;
							
							break;
						}
					}
				}
			}
			
			$result['data'] = $list;
		}
		
		echo json_encode($list);
	}

	function acc_newjob_get() {
		$id = $this->input->get('id');
		$date = $this->input->get('date');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$tz = $this->validate_date($date);
		
		if($tz=="WIB" || $tz=="WITA" || $tz=="WIT") {
			$this->db->set('accept_time', date("Y-m-d H:i:s"));
			$this->db->set('updated', 'true');
			$this->db->where('id', $id);
			$res = $this->db->update('flm_master_ticket');

			if($res) {
				$this->push("Accepted Job", "Job telah diterima", $id_user, "status_ticket", $id);
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "INVALID TIME DEVICE!";
		}
	}
	
	function arrive_job_get() {
		$id = $this->input->get('id');
		$date = $this->input->get('date');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$tz = $this->validate_date($date);
		
		if($tz=="WIB" || $tz=="WITA" || $tz=="WIT") {
			$this->db->set('arrival_time', date("Y-m-d H:i:s"));
			$this->db->set('updated', 'true');
			$this->db->where('id', $id);
			$res = $this->db->update('flm_master_ticket');
			
			$this->clock_in();

			if($res) {
				$this->push("Arrive Job", "Customer Service Engineer telah sampai dilokasi", $id_user, "status_ticket", $id);
				// echo $this->db->last_query();
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "INVALID TIME DEVICE!";
		}
	}
	
	function clock_in() {
		$employee_id = $this->input->get('id_user');
		$today_date = date('Y-m-d');
		$curtime = date('Y-m-d H:i:s');
		$ip_address = 'ip_address';
		$latitude = 'latitude';
		$longitude = 'longitude';
		
		$query = "";
		
		$check = $this->db->query("SELECT attendance_date, time_attendance_id FROM master_attendance_time WHERE employee_id='$employee_id' AND attendance_date='$today_date' ORDER BY time_attendance_id DESC LIMIT 1");
		if($check->num_rows() < 1) {
			$total_rest = '';
		} else {
			$total_rest = '';
		}

		$data = array(
			'employee_id' => $employee_id,
			'attendance_date' => $today_date,
			'clock_in' => $curtime,
			'clock_in_ip_address' => $ip_address,
			'clock_in_latitude' => $latitude,
			'clock_in_longitude' => $longitude,
			'time_late' => $curtime,
			'early_leaving' => $curtime,
			'overtime' => $curtime,
			'total_rest' => $total_rest,
			'attendance_status' => 'Present (Perjalanan dinas)',
			'clock_in_out' => '1'
		);
		
		if($check->num_rows() < 1) {
			$this->db->insert('master_attendance_time', $data);
		} else {
			$this->db->where('time_attendance_id', $check->row()->time_attendance_id);
			$this->db->update('master_attendance_time', $data);
		}
	}
	
	function clock_out() {
		$employee_id = $this->input->get('id_user');
		$today_date = date('Y-m-d');
		$curtime = date('Y-m-d H:i:s');
		$ip_address = 'ip_address';
		$latitude = 'latitude';
		$longitude = 'longitude';
		
		$query = "";
		
		$check = $this->db->query("SELECT * FROM master_attendance_time where `employee_id` = '$employee_id' and `attendance_date` = '$today_date' ORDER BY time_attendance_id DESC LIMIT 1");
		$num = $check->num_rows();

		$total_work_cin =  new DateTime($check->row()->clock_in);
		$total_work_cout =  new DateTime($curtime);
		
		$interval_cin = $total_work_cout->diff($total_work_cin);
		$hours_in   = $interval_cin->format('%h');
		$minutes_in = $interval_cin->format('%i');
		$total_work = $hours_in .":".$minutes_in;
		
		$data = array(
			'employee_id' => $employee_id,
			'clock_out' => $curtime,
			'clock_out_ip_address' => $ip_address,
			'clock_out_latitude' => $latitude,
			'clock_out_longitude' => $longitude,
			'clock_in_out' => '0',
			'early_leaving' => $curtime,
			'overtime' => $curtime,
			'total_work' => $total_work
		);
		
		$id = $check->row()->time_attendance_id;
		$this->db->where('time_attendance_id', $id);
		$this->db->update('master_attendance_time', $data);
	}
	
	function stop_waiting_get() {
		$id = $this->input->get('id');
		$date = $this->input->get('date');
		$time = $this->input->get('time');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$tz = $this->validate_date($date);
		
		if($tz=="WIB" || $tz=="WITA" || $tz=="WIT") {
			$this->db->set('waiting_time', $time);
			$this->db->set('updated', 'true');
			$this->db->where('id', $id);
			$res = $this->db->update('flm_master_ticket');

			if($res) {
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "INVALID TIME DEVICE!";
		}
	}
	
	function start_job_get() {
		$id = $this->input->get('id');
		$date = $this->input->get('date');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$tz = $this->validate_date($date);
		
		if($tz=="WIB" || $tz=="WITA" || $tz=="WIT") {
			$this->db->set('start_job', date("Y-m-d H:i:s"));
			$this->db->set('updated', 'true');
			$this->db->where('id', $id);
			$res = $this->db->update('flm_master_ticket');

			if($res) {
				$this->push("Start Job", "Customer Service Engineer telah sedang melakukan pekerjaan", $id_user, "status_ticket", $id);
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "INVALID TIME DEVICE!";
		}
	}
	
	function leave_job_get() {
		$id = $this->input->get('id');
		$date = $this->input->get('date');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$tz = $this->validate_date($date);
		
		if($tz=="WIB" || $tz=="WITA" || $tz=="WIT") {
			$this->db->set('leave_time', date("Y-m-d H:i:s"));
			$this->db->set('updated', 'true');
			$this->db->where('id', $id);
			$res = $this->db->update('flm_master_ticket');

			if($res) {
				// echo $this->db->last_query();
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "INVALID TIME DEVICE!";
		}
	}
	
	function save_jobcard_post() {
		print_r($_REQUEST);
	}
	
	function validate_date($value) {
		$value = date("Y-m-d G", strtotime($value));
		// echo "zona waktu dari server: " . date('Y-m-d G:i:s') . " \n";
		// echo $value. " \n";
 
		$tz = 'Asia/Jakarta';
		$dt = new DateTime("now", new DateTimeZone($tz));
		$timestamp_wib = $dt->format('Y-m-d G');
		 
		$tz = 'Asia/Makassar';
		$dt = new DateTime("now", new DateTimeZone($tz));
		$timestamp_wita = $dt->format('Y-m-d G');
		 
		$tz = 'Asia/Jayapura';
		$dt = new DateTime("now", new DateTimeZone($tz));
		$timestamp_wit = $dt->format('Y-m-d G');
		
		if($value==$timestamp_wib) {
			return "WIB";
		} else if($value==$timestamp_wita) {
			return "WITA";
		} else if($value==$timestamp_wit) {
			return "WIT";
		} else {
			return false;
		}
	}

	function new_job_getXXX() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$result = array();
		
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$this->db->select('*,master_location_detail.id as id_detail');
		$this->db->from('master_location_detail');
		$this->db->where('id_lokasi', $id_lokasi);
		$this->db->join('master_atm', 'master_location_detail.id_atm = master_atm.id');
		
		$date=date("Y-m-d");
		
		date_default_timezone_set("Asia/Jakarta");
		
		$status_jam_kerja = 'false';
		$b = time();
		$hour = date("G",$b);
		
		$time = $this->waktu();
		$pagi_dari = date("G", strtotime($time->pagi_dari));
		$pagi_hingga = date("G", strtotime($time->pagi_hingga));
		$sore_dari = date("G", strtotime($time->sore_dari));
		$sore_hingga = date("G", strtotime($time->sore_hingga));
		
		$status_pekerjaan = "";
		if ($hour>=$pagi_dari && $hour<=$pagi_hingga) {
			$status_pekerjaan = "PAGI";
			$status_jam_kerja = 'true';
		} elseif ($hour >=$sore_dari && $hour<=$sore_hingga) {
			$status_pekerjaan = "SORE";
			$status_jam_kerja = 'true';
		} else {
			$status_jam_kerja = 'false';
		}
		
		if($status_jam_kerja=='true') {
			$query = "
				SELECT 
					*,  
					master_location_detail.id as id_detail
					FROM 
						master_location_detail
							LEFT JOIN master_atm ON(master_location_detail.id_atm = master_atm.id)
							WHERE 
								id_lokasi='$id_lokasi' AND
								master_location_detail.id NOT IN (SELECT id_detail FROM trans_clean WHERE jenis_pekerjaan='$status_pekerjaan' AND date='$date')
			";
			
			$query = $this->db->query($query);
			$num_rows = $query->num_rows();
			$res = $query->result_array();
			
			date_default_timezone_set("Asia/Jakarta");

			$b = time();
			$hour = date("G",$b);
			$status_pekerjaan = "";
			if ($hour>=$pagi_dari && $hour<=$pagi_hingga) {
				$status_pekerjaan = "Pekerjaan Pagi";
			} elseif ($hour >=$sore_dari && $hour<=$sore_hingga) {
				$status_pekerjaan = "Pekerjaan Sore";
			}
			
			$last_query = str_replace(array("\n","\r"), ' ', $this->db->last_query());
			$last_query = str_replace(array("\t"), '', $last_query);
			$result['query'] = $last_query;
			
			if ($num_rows > 0) {
				$list = array();
				$key=0;
				foreach($res as $r) {
					$list[$key]['id'] = $r['id_detail'];
					$list[$key]['idatm'] = $r['idatm'];
					$list[$key]['cabang'] = $r['cabang'];
					$list[$key]['lokasi'] = $r['lokasi'];
					$list[$key]['alamat'] = $r['alamat'];
					$list[$key]['status_pekerjaan'] = strtoupper($status_pekerjaan);
					
					$key++;
				}
				
				$result['data'] = $list;
			}
			
			$data_send = $this->input->get();
			$result['data_send'] = $data_send;
		}
		
		echo json_encode($result);
	}
	
	function job_detail_get() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$result = array();
		
		$id = $this->input->get('id');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');

		$query = "
			SELECT master_atm.*, flm_master_ticket.*, flm_master_ticket.id as ids, master_client.nama as nama_bank FROM flm_master_ticket
			LEFT JOIN master_atm ON(master_atm.id=flm_master_ticket.atm_id)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE flm_master_ticket.pic='".$id_user."' AND flm_master_ticket.id='".$id."'
		";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();

		if ($num_rows > 0) {
			$list = array();
			$key=0;
			foreach($res as $r) {
				$list[$key]['id'] = $r['ids'];
				$list[$key]['ticket'] = $r['ticket_id'];
				$list[$key]['idatm'] = $r['idatm'];
				$list[$key]['nama_bank'] = $r['nama_bank'];
				$list[$key]['cabang'] = $r['cabang'];
				$list[$key]['lokasi'] = $r['lokasi'];
				$list[$key]['alamat'] = $r['alamat'];
				
				$key++;
			}
			
			$result['data'] = $list;
		}

		echo json_encode($result);
	}
	
	function new_job_detail_get() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$result = array();
		
		$id = $this->input->get('id');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		// $query2 = "
			// SELECT 
				// *,  
				// master_location_detail.id as id_detail
				// FROM 
					// master_location_detail
						// LEFT JOIN master_atm ON(master_location_detail.id_atm = master_atm.id)
						// WHERE 
							// id_lokasi='$id_lokasi' 
							// AND master_location_detail.id = '$id'
		// ";
		$query = "
			SELECT master_atm.*, flm_master_ticket.*, flm_master_ticket.id as ids, master_client.nama as nama_bank FROM flm_master_ticket
			LEFT JOIN master_atm ON(master_atm.idatm=flm_master_ticket.atm_id)
			LEFT JOIN master_client ON(master_client.id=master_atm.id_bank)
			WHERE flm_master_ticket.pic='$id_user' AND flm_master_ticket.id='$id'
		";
		
		echo $query."<br>";
		
		$query = $this->db->query($query);
		$num_rows = $query->num_rows();
		$res = $query->result_array();
		
		echo json_encode($res);
	}
	
	function new_job_detail2_get() {
		// print_r($_REQUEST);
		
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$result = array();
		
		$id_atm = $this->input->get('id_atm');
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		date_default_timezone_set("Asia/Jakarta");
		
		$status_jam_kerja = 'false';
		$b = time();
		$hour = date("G",$b);
		
		$time = $this->waktu();
		$pagi_dari = date("G", strtotime($time->pagi_dari));
		$pagi_hingga = date("G", strtotime($time->pagi_hingga));
		$sore_dari = date("G", strtotime($time->sore_dari));
		$sore_hingga = date("G", strtotime($time->sore_hingga));
		
		$status_pekerjaan = "";
		if ($hour>=$pagi_dari && $hour<=$pagi_hingga) {
			$status_pekerjaan = "PAGI";
			$status_jam_kerja = 'true';
		} elseif ($hour >=$sore_dari && $hour<=$sore_hingga) {
			$status_pekerjaan = "SORE";
			$status_jam_kerja = 'true';
		} else {
			$status_jam_kerja = 'false';
		}
		
		if($status_jam_kerja=='true') {
			$query = "
				SELECT 
					*,  
					master_location_detail.id as id_detail
					FROM 
						master_location_detail
							LEFT JOIN master_atm ON(master_location_detail.id_atm = master_atm.id)
							WHERE 
								id_lokasi='$id_lokasi' AND
								master_atm.idatm = '$id_atm' AND
								master_location_detail.id NOT IN (SELECT id_detail FROM trans_clean WHERE id_petugas='$id_user' AND date='".date('Y-m-d')."' AND jenis_pekerjaan='$status_pekerjaan')
								
			";
			
			$query = $this->db->query($query);
			$num_rows = $query->num_rows();
			$res = $query->result_array();
			
			date_default_timezone_set("Asia/Jakarta");

			$b = time();
			$hour = date("G",$b);
			$status_pekerjaan = "";
			if ($hour>=0 && $hour<=11) {
				$status_pekerjaan = "Pekerjaan Pagi";
			} elseif ($hour >=12 && $hour<=17) {
				$status_pekerjaan = "Pekerjaan Sore";
			}
			
			
			$last_query = str_replace(array("\n","\r"), ' ', $this->db->last_query());
			$result['query'] = $last_query;
			
			if ($num_rows > 0) {
				$list = array();
				$key=0;
				foreach($res as $r) {
					$list[$key]['id'] = $r['id_detail'];
					$list[$key]['idatm'] = $r['idatm'];
					$list[$key]['cabang'] = $r['cabang'];
					$list[$key]['lokasi'] = $r['lokasi'];
					$list[$key]['alamat'] = $r['alamat'];
					$list[$key]['status_pekerjaan'] = strtoupper($status_pekerjaan);
					
					$key++;
				}
				
				$result['data'] = $list;
			}
			
			$data_send = $this->input->get();
			$result['data_send'] = $data_send;
		}
		
		echo json_encode($result);
	}
	
	function get_list_service_get() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$result = array();
		$data = array();
		
		$query = "
			SELECT 
				*
				FROM 
					master_item
		";
		
		$query = $this->db->query($query);
		$res = $query->result();
		
		foreach($res as $row) {
			// if($row->name=="CHECK LIST KEBERSIHAN") {
				// $data['kebersihan'] = "A";
			// } else {
				// $data['perlengkapan'] = "B";
			// }
			
			$query = "
				SELECT 
					*
					FROM 
						master_item_detail
							WHERE 
								id_detail='$row->id'
			";
			$query = $this->db->query($query);
			$res = $query->result();
			$i = 0;
			foreach($res as $r) {
				// if($row->name=="CHECK LIST ACTION TAKEN") {
					$data['checklist'][$i]['id'] = $r->id;
					$data['checklist'][$i]['item'] = $r->list;
				// } else {
					// $data['perlengkapan'][$i]['id'] = $r->list;
					// $data['perlengkapan'][$i]['item'] = $r->list;
				// }
				
				$i++;
			}
		}
		
		$result['data'] = $data;
		
		echo json_encode($result);
	}
	
	function waktu_get() {
		$time = $this->waktu();
		$pagi_dari = date("G", strtotime($time->pagi_dari));
		$pagi_hingga = date("G", strtotime($time->pagi_hingga));
		$sore_dari = date("G", strtotime($time->sore_dari));
		$sore_hingga = date("G", strtotime($time->sore_hingga));
	}
	
	function waktu() {
		$query = $this->db->query("SELECT * FROM master_setting");
		$res = $query->row();
		
		return $res;
	}
	
	function save_job_post() {
		// print_r($this->input->post());
		
		$id_user = $this->input->post('id_user');
		$id_detail = $this->input->post('id_detail');
		$data_save = $this->input->post('data_save');
		$saved = json_decode($data_save, true);
		
		if($saved['status']!=='pending-sparepart' || $saved['status']!=='pending-pekerjaan') {
			$this->db->set('end_job', date("Y-m-d H:i:s"));
		}
		
		if($saved['status']=='pending-pekerjaan') {
			$r = $this->db->query("SELECT * FROM flm_master_ticket WHERE id='$id_detail'")->row();
			
			$extends_data['id_master'] = $r->id;
			$extends_data['ticket_id'] = $r->ticket_id;
			$extends_data['bank_id'] = $r->bank_id;
			$extends_data['atm_id'] = $r->atm_id;
			$extends_data['service_type'] = $r->service_type;
			$extends_data['problem_type'] = $r->problem_type;
			$extends_data['reported_problem'] = $r->reported_problem;
			$extends_data['reported_by'] = $r->reported_by;
			$extends_data['email_pic'] = $r->email_pic;
			$extends_data['phone_pic'] = $r->phone_pic;
			$extends_data['method_by_email'] = $r->method_by_email;
			$extends_data['method_by_phone'] = $r->method_by_phone;
			$extends_data['entry_date'] = $r->entry_date;
			$extends_data['email_date'] = $r->email_date;
			$extends_data['accept_time'] = null;
			$extends_data['arrival_time'] = null;
			$extends_data['waiting_time'] = null;
			$extends_data['start_job'] = null;
			$extends_data['end_job'] = null;
			$extends_data['leave_time'] = null;
			$extends_data['pic'] = $r->pic;
			$this->db->insert('flm_master_ticket_extends', $extends_data);
		}
		$this->db->set('status', $saved['status']);
		$this->db->set('action_taken', json_encode($saved));
		$this->db->set('remark', $saved['remark']);
		$this->db->set('updated', 'true');
		$this->db->where('id', $id_detail);
		$res = $this->db->update('flm_master_ticket');
		
		$this->clock_out();
		
		if($res) {
			$this->push("Finish Job", "Customer Service Engineer telah telah selesai melakukan pekerjaan", $id_user, "status_ticket", $id);
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	function save_akomodation_post() {
		// print_r($this->input->post());
		
		$id_user = $this->input->post('id_user');
		$id_detail = $this->input->post('id_detail');
		$data_save = $this->input->post('data_save');
		
		$row = $this->db->query("SELECT * FROM flm_master_ticket LEFT JOIN finance_costing ON(flm_master_ticket.atm_id=finance_costing.atm_id) WHERE flm_master_ticket.id='$id_detail'")->row();
		
		$data['ticket_id'] = $row->ticket_id;
		$data['kode_costing'] = $row->kode_costing;
		$data['job_order'] = $row->job_order;
		$data['detail'] = $data_save;
		
		$this->db->where('ticket_id', $row->ticket_id);
		$q = $this->db->get('finance_akomodation');
		if ($q->num_rows() > 0) {
			$this->db->where('ticket_id', $row->ticket_id);
			$res = $this->db->update('finance_akomodation', $data);
		} else {
			$this->db->set('ticket_id', $row->ticket_id);
			$res = $this->db->insert('finance_akomodation', $data);
		}
		
		// $saved = json_decode($data_save, true);
		
		// if($saved['status']!=='pending-sparepart' || $saved['status']!=='pending-pekerjaan') {
			// $this->db->set('end_job', date("Y-m-d H:i:s"));
		// }
		// $this->db->set('status', $saved['status']);
		// $this->db->set('action_taken', json_encode($saved));
		// $this->db->set('remark', $saved['remark']);
		// $this->db->set('updated', 'true');
		// $this->db->where('id', $id_detail);
		// $res = $this->db->update('flm_master_ticket');
		
		if($res) {
			$this->push("Costing Job", "Pengajuan Akomodasi telah di submit", $id_user, "costing_job", $id_detail);
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	function save_pending_job_post() {
		// print_r($this->input->post());
		
		$id_user = $this->input->post('id_user');
		$id_detail = $this->input->post('id_detail');
		$data_save = $this->input->post('data_save');
		$saved = json_decode($data_save, true);
		
		// $this->db->set('end_job', date("Y-m-d H:i:s"));
		$this->db->set('status', $saved['status']);
		$this->db->set('action_taken', json_encode($saved));
		$this->db->set('remark', $saved['remark']);
		$this->db->set('updated', 'true');
		$this->db->where('id', $id_detail);
		$res = $this->db->update('flm_master_ticket');
		
		if($res) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	function save_job_get() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		
		date_default_timezone_set("Asia/Jakarta");
		
		// print_r($_REQUEST);

		// $b = time();
		// $hour = date("G",$b);
		
		// $time = $this->waktu();
		// $pagi_dari = date("G", strtotime($time->pagi_dari));
		// $pagi_hingga = date("G", strtotime($time->pagi_hingga));
		// $sore_dari = date("G", strtotime($time->sore_dari));
		// $sore_hingga = date("G", strtotime($time->sore_hingga));
		
		// $status_pekerjaan = "";
		// if ($hour>=$pagi_dari && $hour<=$pagi_hingga) {
			// $status_pekerjaan = "PAGI";
		// } elseif ($hour >=$sore_dari && $hour<=$sore_hingga) {
			// $status_pekerjaan = "SORE";
		// }
		
		// $result = array();
		
		$id_user = $this->input->get('id_user');
		$id_detail = $this->input->get('id_detail');
		$data_save = $this->input->get('data_save');
		
		// echo $id_user." ".$id_detail." ".$data_save;
		
		// print_r($this->input->get());
		
		// $this->db->set('end_job', date("Y-m-d H:i:s"));
		// $this->db->set('action_taken', $data_save);
		// $this->db->set('updated', 'true');
		// $this->db->where('id', $id_detail);
		// $res = $this->db->update('flm_master_ticket');

		// if($res) {
			// echo "success";
		// } else {
			// echo "failed";
		// }
		// $data_problem = $this->input->get('data_problem');
		
		// $data_simpan['date'] = date("Y-m-d");
		// $data_simpan['id_petugas'] = $id_user;
		// $data_simpan['id_detail'] = $id_detail;
		// $data_simpan['action'] = $data_save;
		// $data_simpan['jenis_pekerjaan'] = $status_pekerjaan;
		
		// // echo "<pre>";
		// // print_r($data_problem);
		// // print_r($data_simpan);
		
		// $this->db->select('*');
		// $this->db->from('trans_clean');
		// $this->db->where('date', date("Y-m-d"));
		// $this->db->where('id_petugas', $id_user);
		// $this->db->where('id_detail', $id_detail);
		// $this->db->where('jenis_pekerjaan', $status_pekerjaan);
		// $query = $this->db->get();
		// $num_rows = $query->num_rows();
		
		// if ($num_rows == 0) {
			// $this->db->insert('trans_clean', $data_simpan);
			// $insert_id = $this->db->insert_id();
			
			// if(count(json_decode($data_problem))>0) {
				// $data_simpan_problem['id_clean'] = $insert_id;
				// $data_simpan_problem['problem'] = $data_problem;
				// $this->db->insert('trans_activity', $data_simpan_problem);
			// }
			
			// $result['data'] = "success";
		// } else {
			// $result['data'] = "success";
		// }
		
		// $data_send = $this->input->get();
		// $result['data_send'] = $data_send;
		
		// echo json_encode($result);
	}
	
	function get_absen_location_get() {
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		
		$this->db->select('*');
		$this->db->where('id_lokasi', $id_lokasi);
		$this->db->from('master_absen_location');
		$query = $this->db->get();
		
		echo json_encode($query->result());
	}
	
	function get_data_ticket_get() {
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		// $date = $this->input->get('date');
		
		$where_condition = array(
			'pic' => $id_user, 
			// 'entry_date' => $title, 
		);
		
		$this->db->select('*');
		$this->db->from('flm_master_ticket');
		$this->db->where($where_condition);
		$query1 = $this->db->get();
		
		$param = array();
		foreach($query1->result() as $r) {
			$param2[] = $r->ticket_id;
			$param3[] = $r->atm_id;
		}
		
		$this->db->select('*');
		$this->db->from('flm_master_ticket_detail');
		$this->db->where_in('ticket_id', $param2);
		$query2 = $this->db->get();
		
		$this->db->select('*');
		$this->db->from('finance_akomodation');
		$this->db->where_in('ticket_id', $param2);
		$query22 = $this->db->get();
		
		$this->db->select('*');
		$this->db->from('master_atm');
		$this->db->where_in('idatm', $param3);
		$query3 = $this->db->get();
		
		$this->db->select('*');
		$this->db->from('master_client');
		$query4 = $this->db->get();
		
		$data = array(
			"data_ticket" => $query1->result(),
			"data_ticket_detail" => $query2->result(),
			"data_finance" => $query22->result(),
			"data_atm" => $query3->result(),
			"data_client" => $query4->result(),
		);
		
		echo json_encode($data);
	}
	
	function get_data_jobcard_get() {
		$this->db->select('*');
		$this->db->from('trans_jobcard');
		$query = $this->db->get();
		
		echo json_encode($query->result());
	}
	
	function get_data_action_get() {
		$this->db->select('*');
		$this->db->from('master_item');
		$query = $this->db->get();
		
		echo json_encode($query->result());
	}
	
	function get_data_action_detail_get() {
		$this->db->select('*');
		$this->db->from('master_item_detail');
		$query = $this->db->get();
		
		echo json_encode($query->result());
	}
	
	function check_sparepart_post() {
		$id_user = $this->input->post('id_user');
		$id_detail = $this->input->post('id_detail');
		$serial = $this->input->post('serial_good');
		$status = $this->input->post('status');
		$remark = $this->input->post('remark');
		
		
		$query = $this->db->query("
			SELECT 
				master_inventory_part_out.id as id_part,
				master_transaction_out.kode_part,
				master_transaction_out.id_location
			FROM master_inventory_part_out 
			LEFT JOIN master_transaction_out ON (master_transaction_out.id=master_inventory_part_out.id_detail)
			LEFT JOIN trans_schedule ON (trans_schedule.id_lokasi=master_transaction_out.id_location)
			WHERE master_inventory_part_out.sn_part='$serial' AND trans_schedule.id_petugas='$id_user'
		");
		
		echo $query;
		$result = $query->row();
		
		if($query->num_rows()==0) {
			echo "0";
		} else {
			$check = $this->db->query("SELECT * FROM servicepoint_used WHERE id_part='$result->id_part'");
			if($check->num_rows()) {
				echo "2";
			} else {
				$ticket = $this->db->query("SELECT * FROM flm_master_ticket WHERE id='$id_detail'")->row();
				$data['id_location'] = $result->id_location;
				$data['id_ticket'] = $id_detail;
				$data['id_petugas'] = $id_user;
				$data['kode_part'] = $result->kode_part;
				$data['id_atm'] = $ticket->atm_id;
				$data['id_part'] = $result->id_part;
				
				$res = $this->db->insert('servicepoint_used', $data);
				echo $res;
			}
		}
		
		// echo "<pre>";
		// print_r("SELECT * FROM master_inventory_part WHERE sn_part='$serial'");
		// print_r($query->num_rows());
		// print_r($_REQUEST);
		// if($query->num_rows()==0) {
			// echo "0";
		// } else {
			// echo "1";
		// }
		
		$this->sync_used();
	}
	
	public function request_sparepart_post() {
		$id_user = $this->input->post('id_user');
		$id_detail = $this->input->post('id_detail');
		$item_request = $this->input->post('item_request');
		
		// print_r($id_detail);
		
		$data = json_decode($item_request, true);
		
		$list = array();
		$list_consume = array();
		$key=0;
		foreach($data as $k => $r) {
			if(count($r)>2) {
				// str_replace("%body%", "black", "<body text='%body%'>");
				// print_r($r);
				if($r['status']=="replace_consume") {
					$list[$key]['index'] = $r['data_id'];
					$list[$key]['item_request'] = str_replace('`', '', $r['item_request']);
					$list[$key]['status'] = $r['status'];
					$list[$key]['remark'] = $r['remark'];
					$list[$key]['kode'] = $r['kode'];
					$list[$key]['note'] = $r['note'];
					
				} else if($r['status']=="replace_sparepart") {
					$list[$key]['index'] = $r['data_id'];
					$list[$key]['item_request'] = str_replace('`', '', $r['item_request']);
					$list[$key]['status'] = $r['status'];
					$list[$key]['remark'] = $r['remark'];
					$list[$key]['serial_good'] = $r['serial_good'];
					$list[$key]['serial_bad'] = $r['serial_bad'];
					$list[$key]['kode'] = $r['kode'];
					$list[$key]['note'] = $r['note'];
					
					$update['status'] = "used";
					$this->db->where("sn_part", $r['serial_good']);
					$this->db->update("master_inventory_part_out", $update);
				} else {
					$list[$key]['index'] = $r['data_id'];
					$list[$key]['item_request'] = str_replace('`', '', $r['item_request']);
					$list[$key]['status'] = $r['status'];
					$list[$key]['remark'] = $r['remark'];
					$list[$key]['note'] = $r['note'];
				}
				
				$key++;
			}
		}
		
		
		
		// print_r($data_save);
		
		if(count($list)>0) {
			$data_save['ticket_id'] = $id_detail;
			$data_save['detail'] = json_encode($list);
			$data_save['cse'] = $id_user;
			$res = $this->db->insert('master_inventory_request', $data_save);
			if($res) {
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "no data";
		}
		
		// if(count($list_consume)>0) {
			// $data_save['ticket_id'] = $id_detail;
			// $data_save['detail'] = json_encode($list_consume);
			// $data_save['cse'] = $id_user;
			// $res = $this->db->insert('master_inventory_consume', $data_save);
			// if($res) {
				// echo "success";
			// } else {
				// echo "failed";
			// }
		// } else {
			// echo "no data";
		// }
		
		// $list = array();
		// $key=0;
		// foreach($res as $r) {
			// $list[$key]['id'] = $r['ids'];
			// $list[$key]['ticket'] = $r['ticket_id'];
			// $list[$key]['idatm'] = $r['idatm'];
			// $list[$key]['nama_bank'] = $r['nama_bank'];
			// $list[$key]['cabang'] = $r['cabang'];
			// $list[$key]['lokasi'] = $r['lokasi'];
			// $list[$key]['alamat'] = $r['alamat'];
			
			// $key++;
		// }
	}
	
	public function sync_used() {
		$q = "SELECT * FROM master_inventory_part_out WHERE id IN (SELECT id_part FROM servicepoint_used) AND status='available'";
		$result = $this->db->query($q)->result();
		if(count($result)>0) {
			$data = array();
			foreach($result as $r) {
				$data['status'] = "used";
				$this->db->where('id', $r->id);
				$this->db->update('master_inventory_part_out', $data);
			}
		} 
		$q = "SELECT * FROM master_inventory_part_out WHERE id NOT IN (SELECT id_part FROM servicepoint_used) AND status='used'";
		$result = $this->db->query($q)->result();
		if(count($result)>0) {
			$data = array();
			foreach($result as $r) {
				$data['status'] = "available";
				$this->db->where('id', $r->id);
				$this->db->update('master_inventory_part_out', $data);
			}
		}
	}
	
	public function upload_post() {
		// echo "POST<br>";
		// print_r($_REQUEST);
		
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		
		$thn = date("Y");
		$bln = $bulan[(int)date("m")];
		$idatm = $_REQUEST['atm_id'];
		$idticket = $_REQUEST['ticket_id'];
		
		// echo $thn." ".$bln;
		
		$dir_tahun = "upload/documentation/".$thn;
		$dir_bulan = $dir_tahun."/".$bln;
		$dir_idatm = $dir_tahun."/".$bln."/".$idatm;
		$dir_idticket = $dir_tahun."/".$bln."/".$idatm."/".$idticket;
		if( is_dir($dir_tahun) === false ) {
			mkdir($dir_tahun);
		}
		if( is_dir($dir_bulan) === false ) {
			mkdir($dir_bulan);
		}
		if( is_dir($dir_idatm) === false ) {
			mkdir($dir_idatm);
		}
		if( is_dir($dir_idticket) === false ) {
			mkdir($dir_idticket);
		}
		
		$new_image_name = $_FILES["file"]["name"];
		$foto = $this->_uploadImage($new_image_name, $dir_idticket);
		
		if (strpos($foto, 'jc') !== false) {
			$data = array();
			$data['ticket_id'] = $this->input->post('ticket_id');
			$data['atm_id'] = $this->input->post('atm_id');
			$data['foto_jobcard'] = $foto;
			
			$this->db->insert('trans_jobcard', $data);
		}
	}
	
	/**
	 * Additional method
	 */
	private function _uploadImage($name, $path) {
		$errors= array();
		$url_file = "default.png";
		if(isset($_FILES['file'])) {
			if($_FILES['file']['name']!=="") {
				$file_name 	= $_FILES['file']['name'];
				$file_size 	= $_FILES['file']['size'];
				$file_tmp 	= $_FILES['file']['tmp_name'];
				$file_type	= $_FILES['file']['type'];
				$file	= explode('.', strtolower($file_name));
				$file_ext	= end($file);
				
				$extensions= array("jpeg","jpg","png");
				
				if(in_array($file_ext,$extensions)=== false){
					$errors[]="extension not allowed.<br>";
				}
				
				if(empty($errors)==true){
					// $file_name = "upload/foto_client/logo_".$client.".".$file_ext;
					// $url_file = base_url().$file_name;
					$url_file = $path.'/'.$name;
					move_uploaded_file($file_tmp, $url_file);
					
					// print_r($url_file);
				} else {
					echo $errors[0];
				}
			}
			
			// $url_file = json_encode($url_file);
		}
		
		return $url_file;
	}
	
	public function check_qrcode_post() {
		$id_atm = $this->input->post('id_atm');
		$qrcode = $this->input->post('qrcode');
		$row = $this->db->query("SELECT identity FROM master_atm WHERE idatm='$id_atm'")->row();
		
		if($row->identity==null) {
			echo 'unindentify';
		} else {
			// return 1;
			if($qrcode!==$row->identity) {
				echo 'invalid';
			} else {
				echo 'valid';
			}
		}
	}
	
	public function check_qrcode_registration_post() {
		$id_atm = $this->input->post('id_atm');
		$qrcode = $this->input->post('qrcode');
		$this->db->set('identity', $qrcode);
		$this->db->where('idatm', $id_atm);
		$res = $this->db->update('master_atm');
		
		if($res) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	public function check_valid_get() {
		$atm_id = $this->input->get('atm_id');
		
		$data = $this->db->query("SELECT updated_data FROM master_atm WHERE idatm='$atm_id'")->row()->updated_data;
		
		echo $data;
	}
	
	public function save_valid_atm_get() {
		$id_user = $this->input->get('id_user');
		$id_lokasi = $this->input->get('id_lokasi');
		$idatm = $this->input->get('idatm');
		$id_atm = $this->input->get('id_atm');
		$sn_atm = $this->input->get('sn_atm');
		$cabang = $this->input->get('cabang');
		$lokasi = $this->input->get('lokasi');
		$nama_pic = $this->input->get('nama_pic');
		$no_hp = $this->input->get('no_hp');
		$get_location = $this->input->get('get_location');
		
		$data = array(
			'id_user'		=> $id_user,
			'id_lokasi'		=> $id_lokasi,
			'id_atm'		=> $id_atm,
			'sn_atm'		=> $sn_atm,
			'cabang'		=> $cabang,
			'lokasi'		=> $lokasi,
			'nama_pic'		=> $nama_pic,
			'no_hp'			=> $no_hp,
			'get_location'	=> $get_location,
		);
		
		// print_r($data);
		// print_r($_REQUEST);
		// print_r("AAA");
		
		$this->db->set('updated_data', json_encode($data));
		$this->db->where('idatm', $idatm);
		$res = $this->db->update('master_atm');
		
		if($res) {
			echo "success";
		} else {
			echo "failed";
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
		
		$msg = $body." oleh ".$res->nama." (".$res->nik.")";
		
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
	
	public function get_costing_get() {
		$id_user = $this->input->get('id_user');
		$id_detail = $this->input->get('id_detail');
		$job_type = $this->input->get('job_type');
		
		$query = $this->db->query("SELECT * FROM finance_akomodation WHERE ticket_id='$id_detail' AND id_extends='0'")->row();
		
		// print_r(json_decode($query->detail));
		echo $query->detail;
	}
}