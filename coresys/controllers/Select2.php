<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Select2 extends MY_Controller {
	public function __construct() {
        parent::__construct();
		header('Content-Type: application/json');
	}
	
	function select_atm() {
		$search = isset($_POST['search']) ? $_POST['search'] : '';
		
		$query = "SELECT * FROM master_atm WHERE tid LIKE '%$search%'";
		$result = $this->db->query($query)->result();
		
		$bank = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_client WHERE id='$id'")->row()->nama;
			return $nama;
		};
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->id!=="") {
					$list[$key]['id'] = $row->id;
					$list[$key]['text'] = $row->tid." ".trim($row->alamat); 
					$key++;
				}
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
    }
	
	public function select_staff() {
		$search = isset($_POST['search']) ? $_POST['search'] : '';
		
		$query = "SELECT * FROM master_staff WHERE nik NOT IN (SELECT username FROM master_user) AND nama LIKE '%$search%'";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->id!=="") {
					$list[$key]['id'] = $row->nik;
					$list[$key]['text'] = "(".$row->nik.") ".$row->nama; 
					$key++;
				}
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	public function select_staff_team() {
		$search = isset($_POST['search']) ? $_POST['search'] : '';
		
		$query = "SELECT * FROM master_staff_petugas WHERE nik NOT IN (SELECT username FROM master_user) AND nama LIKE '%$search%'";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->id!=="") {
					$list[$key]['id'] = $row->nik;
					$list[$key]['text'] = "(".$row->nik.") ".$row->nama; 
					$key++;
				}
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	public function select_user() {
		$search = isset($_POST['search']) ? $_POST['search'] : '';
		
		$query = "SELECT * FROM master_user LEFT JOIN master_staff ON(master_user.username=master_staff.nik) WHERE master_user.id!='1' AND master_staff.nama LIKE '%$search%'";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->id!=="") {
					$list[$key]['id'] = $row->nik;
					$list[$key]['text'] = "(".$row->nik.") ".$row->nama; 
					$key++;
				}
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	public function select_vendor() {
		$search = isset($_POST['search']) ? $_POST['search'] : '';
		
		$query = "SELECT * FROM master_vendor WHERE nama LIKE '%$search%'";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->id!=="") {
					$list[$key]['id'] = $row->id;
					$list[$key]['text'] = "(".$row->kode_vendor.") ".$row->nama; 
					$key++;
				}
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	public function select_kanwil() {
		$search = isset($_POST['search']) ? $_POST['search'] : '';
		
		$query = "SELECT * FROM master_atm WHERE kanwil LIKE '%$search%' GROUP BY kanwil";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->id!=="") {
					$list[$key]['id'] = $row->id;
					$list[$key]['text'] = $row->kanwil; 
					$key++;
				}
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	public function select_ga() {
		$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : '';
		$kanwil = isset($_REQUEST['kanwil']) ? $_REQUEST['kanwil'] : '';
		
		$query = "SELECT * FROM master_kelolaan WHERE kanwil='$kanwil' AND kanwil LIKE '%$search%'";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->id!=="") {
					$list[$key]['id'] = $row->id;
					$list[$key]['text'] = $row->grup_area; 
					$key++;
				}
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	function select_atm_by_ga() {
		$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : '';
		$ga = isset($_REQUEST['ga']) ? $_REQUEST['ga'] : '';
		
		$query = "SELECT *, master_kelolaan_detail.id as id_kelolaan_detail FROM master_kelolaan_detail 
					LEFT JOIN master_kelolaan ON(master_kelolaan.id=master_kelolaan_detail.id_kelolaan)
					LEFT JOIN master_atm ON(master_atm.tid=master_kelolaan_detail.tid)
					WHERE master_kelolaan.grup_area='$ga' 
					AND master_atm.tid IN (SELECT tid FROM trans_schedule_team)
					AND (master_atm.alamat LIKE '%$search%' OR master_atm.tid LIKE '%$search%')";
		$result = $this->db->query($query)->result();
		
		$bank = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_client WHERE id='$id'")->row()->nama;
			return $nama;
		};
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->id!=="") {
					$list[$key]['id'] = $row->id_kelolaan_detail;
					$list[$key]['text'] = "(".$row->tid.") ".trim($row->alamat); 
					$key++;
				}
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	
	
	function select_atm_by_ga2() {
		$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : '';
		$ga = isset($_REQUEST['ga']) ? $_REQUEST['ga'] : '';
		
		$query = "SELECT *, master_kelolaan_detail.id as id_kelolaan_detail FROM master_kelolaan_detail 
					LEFT JOIN master_kelolaan ON(master_kelolaan.id=master_kelolaan_detail.id_kelolaan)
					LEFT JOIN master_atm ON(master_atm.tid=master_kelolaan_detail.tid)
					WHERE master_kelolaan.grup_area='$ga' 
					AND master_atm.tid IN (SELECT tid FROM trans_schedule_team)
					AND (master_atm.alamat LIKE '%$search%' OR master_atm.tid LIKE '%$search%')";
		$result = $this->db->query($query)->result();
		
		$bank = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_client WHERE id='$id'")->row()->nama;
			return $nama;
		};
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->id!=="") {
					$list[$key]['id'] = $row->tid;
					$list[$key]['text'] = "(".$row->tid.") ".trim($row->alamat); 
					$key++;
				}
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	public function select_timezone() {
		$search = isset($_POST['search']) ? $_POST['search'] : '';
		
		$result = array(
			array("id" => "WIB", "text" => "WIB"),
			array("id" => "WITA", "text" => "WITA"),
			array("id" => "WIT", "text" => "WIT"),
		);
		
		$result = $this->searchForId($search, $result);
		
		$list = array();
		$result = json_decode(json_encode($result), FALSE);
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				
				$list[$key]['id'] = $row->id;
				$list[$key]['text'] = $row->text; 
				$key++;
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	function searchForId($id, $array) {
		$res = array();
		foreach ($array as $key => $val) {
			if ($val['id'] === $id) {
				array_push($res, $array[$key]);
				return $res;
			}
		}
	   return $array;
	}
	
	public function select_grup_area() {
		$search = isset($_POST['search']) ? $_POST['search'] : '';
		$id_vendor = isset($_POST['id_vendor']) ? $_POST['id_vendor'] : $this->uri->segment(3);
		
		$query = "SELECT * FROM master_kelolaan WHERE id NOT IN (SELECT id_lokasi FROM trans_schedule) AND id_vendor='$id_vendor' AND grup_area LIKE '%$search%'";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->id!=="") {
					$list[$key]['id'] = $row->id;
					$list[$key]['text'] = "(".$row->kanwil.") ".$row->grup_area; 
					$key++;
				}
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	public function select_user_by_vendor() {
		$search = isset($_POST['search']) ? $_POST['search'] : '';
		$id_vendor = isset($_POST['id_vendor']) ? $_POST['id_vendor'] : $this->uri->segment(3);
		
		// $query = "SELECT * FROM master_user 
					// LEFT JOIN master_staff ON(master_user.username=master_staff.nik) 
					// WHERE 
						// master_staff.nik NOT IN(SELECT pic FROM trans_schedule) AND 
						// master_staff.nik NOT IN(SELECT team FROM trans_schedule) AND 
						// master_user.id!='1' AND 
						// master_staff.id_vendor='$id_vendor' AND 
						// master_staff.nama LIKE '%$search%'
		// ";
		$query = "SELECT * FROM master_user 
					LEFT JOIN master_staff ON(master_user.username=master_staff.nik) 
					WHERE 
						master_user.id!='1' AND 
						master_staff.id_vendor='$id_vendor' AND 
						master_staff.nama LIKE '%$search%'
		";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->id!=="") {
					$list[$key]['id'] = $row->nik;
					$list[$key]['text'] = "(".$row->nik.") ".$row->nama; 
					$key++;
				}
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	public function select_petugas_by_koord() {
		$search = isset($_POST['search']) ? $_POST['search'] : '';
		$id_koord = isset($_POST['id_koord']) ? $_POST['id_koord'] : $this->uri->segment(3);
		$id_lokasi = isset($_POST['id_lokasi']) ? $_POST['id_lokasi'] : $this->uri->segment(4);
		
		$query = "SELECT * FROM master_staff_petugas 
					WHERE 
						id_koord='$id_koord' AND
						id_lokasi='$id_lokasi' AND
						nama LIKE '%$search%'
		";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->id!=="") {
					$list[$key]['id'] = $row->nik;
					$list[$key]['text'] = "(".$row->nik.") ".$row->nama; 
					$key++;
				}
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	public function select_kanwil_by_location() {
		$search = isset($_POST['search']) ? $_POST['search'] : '';
		$kode_koord = isset($_POST['kode_koord']) ? $_POST['kode_koord'] : '';
		
		// $query = "SELECT * FROM master_atm WHERE kanwil LIKE '%$search%' GROUP BY kanwil";
		$query = "SELECT * FROM trans_schedule 
					LEFT JOIN master_kelolaan ON(master_kelolaan.id=trans_schedule.id_lokasi)
					WHERE trans_schedule.pic LIKE '%$kode_koord%'";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->id!=="") {
					$list[$key]['id'] = $row->id_lokasi;
					$list[$key]['text'] = $row->grup_area; 
					$key++;
				}
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	// USED BY trans_complaint
	public function select_petugas_by_kanwil() {
		$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : '';
		$kelolaan_detail = isset($_REQUEST['kelolaan_detail']) ? $_REQUEST['kelolaan_detail'] : $this->uri->segment(3);
		
		$query = "SELECT * FROM trans_schedule 
					LEFT JOIN trans_schedule_team ON(trans_schedule_team.id_detail=trans_schedule.id)
					LEFT JOIN master_staff_petugas ON(master_staff_petugas.nik=trans_schedule_team.pic)
					LEFT JOIN master_atm ON(master_atm.tid=trans_schedule_team.tid)
					LEFT JOIN master_kelolaan_detail ON(master_kelolaan_detail.tid=trans_schedule_team.tid)
					WHERE 
						master_staff_petugas.nama LIKE '%$search%'
						AND master_kelolaan_detail.id = '$kelolaan_detail'
					GROUP BY trans_schedule_team.pic
		";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->id!=="") {
					$list[$key]['id'] = $row->nik;
					$list[$key]['text'] = "(".$row->nik.") ".$row->nama; 
					$key++;
				}
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	// USED BY trans_switch
	public function select_petugas_by_kanwil2() {
		$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : '';
		$id_kanwil = isset($_REQUEST['id_kanwil']) ? $_REQUEST['id_kanwil'] : $this->uri->segment(3);
		
		$query = "SELECT * FROM trans_schedule 
					LEFT JOIN trans_schedule_team ON(trans_schedule_team.id_detail=trans_schedule.id)
					LEFT JOIN master_staff_petugas ON(master_staff_petugas.nik=trans_schedule_team.pic)
					LEFT JOIN master_atm ON(master_atm.tid=trans_schedule_team.tid)
					WHERE 
						master_staff_petugas.nama LIKE '%$search%'
						AND trans_schedule.id_lokasi = '$id_kanwil'
					GROUP BY trans_schedule_team.pic
		";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->id!=="") {
					$list[$key]['id'] = $row->nik;
					$list[$key]['text'] = "(".$row->nik.") ".$row->nama; 
					$key++;
				}
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	public function select_petugas_by_kanwil_switch() {
		$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : '';
		$id_kanwil = isset($_REQUEST['id_kanwil']) ? $_REQUEST['id_kanwil'] : $this->uri->segment(3);
		$from = isset($_REQUEST['from']) ? $_REQUEST['from'] : $this->uri->segment(3);
		
		$query = "SELECT * FROM trans_schedule 
					LEFT JOIN trans_schedule_team ON(trans_schedule_team.id_detail=trans_schedule.id)
					LEFT JOIN master_staff_petugas ON(master_staff_petugas.nik=trans_schedule_team.pic)
					LEFT JOIN master_atm ON(master_atm.tid=trans_schedule_team.tid)
					WHERE 
						master_staff_petugas.nik!='$from' AND
						master_staff_petugas.nama LIKE '%$search%'
						AND trans_schedule.id_lokasi = '$id_kanwil'
					GROUP BY trans_schedule_team.pic
		";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->id!=="") {
					$list[$key]['id'] = $row->nik;
					$list[$key]['text'] = "(".$row->nik.") ".$row->nama; 
					$key++;
				}
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	public function get_petugas_by_kanwil_switch($id) {
		$query = "
			SELECT *, master_staff_petugas.nama as nama_petugas FROM trans_clean_detail 
			LEFT JOIN trans_clean ON(trans_clean.id=trans_clean_detail.id_detail)
			LEFT JOIN master_kelolaan_detail ON(master_kelolaan_detail.id=trans_clean_detail.id_kelolaan_detail)
			LEFT JOIN master_kelolaan ON(master_kelolaan_detail.id_kelolaan=master_kelolaan.id)
			LEFT JOIN master_atm ON(master_atm.tid=master_kelolaan_detail.tid)
			LEFT JOIN trans_schedule_team ON(master_kelolaan_detail.tid=trans_schedule_team.tid)
			LEFT JOIN master_staff_petugas ON(master_staff_petugas.nik=trans_schedule_team.pic)
			WHERE trans_clean_detail.jenis_job='request_switch' AND trans_clean_detail.id='$id'
		";
		
		$result = $this->db->query($query)->row();
		
		echo json_encode($result);
	}
	
	public function select_team() {
		$search = isset($_POST['search']) ? $_POST['search'] : '';
		
		$query = "SELECT * FROM master_staff WHERE nik NOT IN (SELECT username FROM master_user) AND nama LIKE '%$search%'";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->id!=="") {
					$list[$key]['id'] = $row->nik;
					$list[$key]['text'] = "(".$row->nik.") ".$row->nama; 
					$key++;
				}
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	public function select_team_by_vendor() {
		$search = isset($_POST['search']) ? $_POST['search'] : '';
		$id_pic = isset($_POST['id_pic']) ? $_POST['id_pic'] : $this->uri->segment(3);
		$id_vendor = isset($_POST['id_vendor']) ? $_POST['id_vendor'] : $this->uri->segment(3);
		
		$query = "SELECT * FROM master_staff WHERE master_staff.id_vendor='$id_vendor' AND master_staff.nik!='$id_pic' AND nama LIKE '%$search%'";
		$result = $this->db->query($query)->result();
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				if($row->id!=="") {
					$list[$key]['id'] = $row->nik;
					$list[$key]['text'] = "(".$row->nik.") ".$row->nama; 
					$key++;
				}
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	public function kode_koordinator() {
		$id_vendor = $_REQUEST['id_vendor'];
		$query = "SELECT kode_vendor FROM master_vendor WHERE id='$id_vendor'";
		$kode_vendor = $this->db->query($query)->row()->kode_vendor;
		// print_r($row);
		
		$leading = $kode_vendor."-";
		$res = $this->db->query("SELECT nik FROM master_staff WHERE nik LIKE '%$kode_vendor%' ORDER BY SUBSTRING(nik, 5) DESC");
		if($res->num_rows()==0) {
			$kode = 1;
		} else {
			$kode = $res->row()->nik;
			$kode = intval(substr($kode, strlen($leading))) + 1;
		}
		
		$kode = str_pad($kode, 2, '0', STR_PAD_LEFT);
		$kode = $leading.$kode;
		
		echo $kode;
	}
	
	public function kode_petugas() {
		// print_r($_REQUEST);
		$kode_koord = $_REQUEST['kode_koord'];
		
		$leading = $kode_koord."-";
		$res = $this->db->query("SELECT nik, SUBSTRING(nik, 8) as num FROM master_staff_petugas WHERE nik LIKE '%$kode_koord%' ORDER BY SUBSTRING(nik, 8) DESC");
		if($res->num_rows()==0) {
			$kode = 1;
		} else {
			$kode = $res->row()->nik;
			$kode = intval(substr($kode, strlen($leading))) + 1;
		}
		
		$kode = str_pad($kode, 3, '0', STR_PAD_LEFT);
		$kode = $leading.$kode;
		
		echo $kode;
	}
}