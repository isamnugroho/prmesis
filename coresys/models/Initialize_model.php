<?php
	
class Initialize_model extends CI_Model 
{
	public function __construct() {
		// error_reporting(0);
	}
	
	public function init() {
		// CHECK SCHEDULED USER
		$sql = "
			SELECT * FROM trans_schedule A 
			LEFT JOIN trans_clean B ON(A.pic=B.pic)
			LEFT JOIN trans_clean_detail C ON(C.id_detail=B.id)
			WHERE B.date = '".date("Y-m-d")."'
		";
		$check_data = $this->db->query($sql);
		
		if($check_data->num_rows()==0) {
			$sql = "
				SELECT * FROM trans_schedule A 
			";
			$check_scheduled = $this->db->query($sql);
			
			foreach($check_scheduled->result() as $r) {
				$sql = "
					SELECT *, master_staff.nik as koord FROM trans_schedule
					LEFT JOIN master_staff ON(master_staff.nik=trans_schedule.pic)
					LEFT JOIN master_staff_petugas ON(master_staff_petugas.id_koord=master_staff.id)
					WHERE (master_staff.nik='".$r->pic."' OR master_staff_petugas.nik='".$r->pic."' )
				";
				
				$result_schedule = $this->db->query($sql);
				if($result_schedule->num_rows()) {
					$row = $result_schedule->row();
					
					$sql = "SELECT * FROM master_kelolaan 
							LEFT JOIN master_kelolaan_detail ON (master_kelolaan_detail.id_kelolaan=master_kelolaan.id)
							WHERE master_kelolaan.id='".$row->id_lokasi."'";
					$result_kelolaan = $this->db->query($sql);
					if($result_kelolaan->num_rows()>0) {
						$kelolaan = $result_kelolaan->result();
						$today = date("Y-m-d");
						$sql = "SELECT * FROM trans_clean WHERE date='$today' AND pic='$r->pic'";
						$res = $this->db->query($sql);
						if(!$res->num_rows()) {
							$data = [
								'date' => date("Y-m-d"),
								'timestamp'  => date("Y-m-d H:i:s"),
								'pic'  => $row->pic,
								'id_lokasi'  => $row->id_lokasi,
							];
							
							if (!$this->db->insert('trans_clean', $data)) {
								echo "Error query trans_clean";
							} else {
								$inserted_id = $this->db->insert_id();
								$data = array();
								foreach($kelolaan as $r) {
									$data[] = array(
										'id_detail' => $inserted_id,
										'id_kelolaan_detail' => $r->id,
										'timestamp' => date("Y-m-d H:i:s"),
										'timestamp' => date("Y-m-d H:i:s")
									);
								}
						
								$this->db->insert_batch('trans_clean_detail', $data);
								
								// echo "Success generated schedule";
							}
						}  else {
							// echo "Schedule already generated";
						}
					}
				} else {
					// echo "No data";
				}
			}
		} else {
			// echo "Already generated data";
		}
	}
}
