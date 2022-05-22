<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_key extends MY_Controller {
    var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
    }
    
    /**
	 * View method
	 */
    public function index() {
		$this->data['id'] = (isset($_REQUEST['id']) ? $_REQUEST['id'] : "");
		$this->data['date'] = (isset($_REQUEST['id']) ? date("Y-m-d", strtotime($this->db->query("SELECT entry_date FROM master_request_key WHERE id='".$_REQUEST['id']."'")->row()->entry_date)) : date('Y-m-d'));
        return view('pages/status_key/index', $this->data);
	}

    function diff($a1, $a2) {
        $awal  = date_create($a1);
        $akhir = date_create($a2); // waktu sekarang
        $diff  = date_diff($awal, $akhir);

        // return $diff;
        return sprintf('%02d', $diff->h).':'.sprintf('%02d', $diff->i).':'.sprintf('%02d', $diff->s);
    }

    function check_data() {
		$sql = "
			SELECT 
				COUNT(*) as cnt
			FROM master_request_key 
			WHERE updated='true'";
            $row = $this->db->query($sql)->row()->cnt;
		
		echo $row;
    }
    
    function update_status() {
		$sql = "UPDATE `master_request_key` SET `updated`='false' WHERE 1";
		$res = $this->db->query($sql);
		
		if (!$res) {
			echo "failed";
		} else {
			echo "success";
		}
	}

    public function show_table() {
        $where_id = ($_GET['id']!=="" ? "AND master_request_key.id='".$_GET['id']."'" : "");
        $date = (isset($_GET['date']) ? $_GET['date'] : date("Y-m-d"));
        $query = "SELECT * FROM master_request_key WHERE entry_date LIKE '%".$date."%' $where_id";
        // $query = "SELECT 
					// *, 
					// master_request_key.id as ids, 
					// primary_table.status as status, 
					// master_client.nama as nama_bank, 
					// master_request_key.pic as pic 
				// FROM master_request_key_detail primary_table 
				// LEFT JOIN (SELECT id, atm_id, ticket_id, problem_type, entry_date, pic FROM master_request_key) as master_request_key ON(master_request_key.ticket_id=primary_table.ticket_id)
				// LEFT JOIN master_atm ON(master_atm.idatm=master_request_key.atm_id)
				// LEFT JOIN master_client ON(master_client.id=master_atm.id_bank), 
				// (SELECT MAX(id) as pId FROM master_request_key_detail GROUP BY ticket_id) second_table
				// WHERE primary_table.id = second_table.pId AND master_request_key.entry_date LIKE '%".$date."%' $where_id";
        $res = $this->db->query($query);

		// echo  $query;
        // print_r($res);

        $list = array();
		$i = 0;
		foreach($res->result() as $r) {
			$list[$i]['id'] = $r->id;
			$list[$i]['ticket_id'] = $r->request_id;
			$list[$i]['status'] = $r->status;
			$list[$i]['atm_id'] = $r->atm_id;
            $list[$i]['action_taken'] = $r->action_taken;
            
			$list[$i]['service_type'] = $r->service_type;
			$list[$i]['entry_date'] = $r->entry_date;
			$list[$i]['selisih1'] = $this->diff($r->entry_date, $r->end_job);
			$list[$i]['accept_time'] = $r->entry_date;
			$list[$i]['selisih2'] = $this->diff($r->entry_date, $r->end_job);
			$list[$i]['end_job'] = $r->end_job;
			$list[$i]['problem'] = $r->problem_type;
			$list[$i]['pic'] = $r->pic;
			$i++;
        }
        
        $table = '';
		$table_ctnt = '';
		$table_status = '';
		
		
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
		
		$pic = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_staff WHERE id='$id'")->row()->nama;
			
			return $nama;
		};
		
		$no = 1; 
		foreach ($list as $d) {
			
			// print_r($d);
			if($d['accept_time']=="" && $d['action_taken']=="") {
				$table_status = '<span class="badge_style b_pending">Waiting PIC</span>';
			} else if($d['accept_time']!=="" && $d['action_taken']=="") {
				$table_status = '<span class="badge_style b_medium">Job Accepted</span>';
			}  else if($d['accept_time']!=="" && $d['action_taken']!=="") {
				if($d['status']=="done" || $d['status']=="close") {
					$table_status = '<span class="badge_style b_done">JOB DONE</span> <a href="'.base_url().'laporanfpdf/jobcard/'.$d['ticket_id'].'" target="_blank"><span class="badge_style b_done">Detail</span></a>';
				} else if($d['status']=="pending-sparepart") {
					$table_status = '<span class="badge_style b_away">JOB PENDING SPAREPART</span>';
				} else if($d['status']=="pending-pekerjaan") {
					// $table_status = '<span class="badge_style b_suspend">Refer to SLM</span>';
					$table_status = '<span class="badge_style b_done">JOB PENDING</span> <a href="'.base_url().'laporanfpdf/jobcard/'.$d['ticket_id'].'" target="_blank"><span class="badge_style b_done">Detail</span></a>';
				} else {
					$table_status = '<span class="badge_style b_away">DONE</span>';
				}
            }

            $table_ctnt .= '
				<tr>
					<td>'.$no.'</td>
					<td>
                        <table class="table display table-bordered" style="width: 100%">
							<tr>
								<td style="width: 120px">ID Request</td>
								<td style="width: 10px"> : </td>
								<td>'.$d['ticket_id'].'</td>
							</tr>
							<tr>
								<td>Client/Bank</td>
								<td> : </td>
								<td>'.$bank($atm($d['atm_id'], 'id_bank')).'</td>
							</tr>
							<tr>
								<td>Lokasi Mesin</td>
								<td> : </td>
								<td>'.$atm($d['atm_id'], 'lokasi').'</td>
							</tr>
						</table>
					</td>
					<td style="vertical-align: top">
                        <table class="table display table-bordered" style="width: 100%">
							<tr>
								<td style="width: 120px">Provide Date</td>
								<td style="width: 10px"> : </td>
								<td>'.date("d-m-Y", strtotime($d['entry_date'])).'</td>
							</tr>
							<tr>
								<td>Provide Time</td>
								<td> : </td>
								<td>'.date("H:i:s", strtotime($d['entry_date'])).'</td>
							</tr>
							<tr>
								<td>Nama PIC/CSE</td>
								<td> : </td>
								<td>'.$pic($d['pic']).'</td>
							</tr>
						</table>
					</td>
					<td style="vertical-align: top">
                        <table class="table display table-bordered" style="width: 100%">
							<tr>
								<td>Close Date</td>
								<td> : </td>
								<td>'.($d['end_job']=="" ? "-" : date("d-m-Y", strtotime($d['end_job']))).'</td>
							</tr>
							<tr>
								<td>Close Time</td>
								<td> : </td>
								<td>'.($d['end_job']=="" ? "-" : date("H:i:s", strtotime($d['end_job']))).'</td>
							</tr>
							<tr>
								<td>Total Time</td>
								<td> : </td>
								<td><span id="demo2'.$d['id'].'">'.($d['end_job']=="" ? "-" : $d['selisih2']).'</span></td>
							</tr>
						</table>
					</td>
					<td style="text-align: center; font-weight:bold;font-size:16px;">'.$d['status'].'</td>
				</tr>
			';
			
			$no++; 
        }

        $table_arry = '';
		foreach ($list as $d) { 
			$table_arry .= '
				{
					id: "'.$d['id'].'",
					entry_date: "'.$d['entry_date'].'",
					distance1: new Date("'.date('M j, Y H:i:s', strtotime($d['entry_date'])).'").getTime(),
					accept_time: "'.$d['accept_time'].'",
					distance2: new Date("'.date('M j, Y H:i:s', strtotime($d['accept_time'])).'").getTime(),
					end_apply: "'.$d['end_job'].'"
				},
			';
        } 
        
        $table .= '<br>
			<div style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%);">
				<h4 style="color:white; padding: 16px; height:30px;"><p style="margin: -12px 0px 0px 0px; font-size:16px;font-weight:bold;">Status Provide Key Per-Tanggal : '.date("d-m-Y", strtotime($date)).'</p></h4>
				<div class="view" style="margin-bottom: 20px">
					<div class="wrapper" style="margin-top: 0px">
						<table class="table display table-bordered" style="width: 100%">
							<tbody>
                                <tr>
                                    <td  style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%); text-align: center;"><b style="color:white;font-size:14px; margin: 0px 0px 0px 0px;">No</b></td>
                                    <td style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%); text-align: center;"><b style="color:white;font-size:14px; margin: 0px 0px 0px 0px;">Request Key Description</b></td>
                                    <td colspan="2"  style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%); text-align: center;"><b style="color:white;font-size:14px; margin: 0px 0px 0px 0px;">Utilization Date & Time</b></td>
                                    <td style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 0%, #1C1C1C 150%); text-align: center;"><b style="color:white;font-size:14px; margin: 0px 0px 0px 0px;">Status Key</b></td>
                                </tr>
								'.$table_ctnt.'
							</tbody>
						</table>
					</div>
				</div>
				
				<script>
					var countdowns = [
						'.$table_arry.'
                    ];
                    
                    console.log(countdowns);
					
					var timer = setInterval(function() {
						// Get todays date and time
						var now = Date.now();

						var index = countdowns.length - 1;

						// we have to loop backwards since we will be removing
						// countdowns when they are finished
						while(index >= 0) {
							var countdown = countdowns[index];
							
							// console.log(countdown.accept_time);

							// Find the distance between now and the count down date
							
							if(countdown.accept_time=="") {
								var distance1 = now - countdown.distance1;
								// Time calculations for days, hours, minutes and seconds
								var days1 = Math.floor(distance1 / (1000 * 60 * 60 * 24));
								var hours1 = Math.floor((distance1 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
								var minutes1 = Math.floor((distance1 % (1000 * 60 * 60)) / (1000 * 60));
								var seconds1 = Math.floor((distance1 % (1000 * 60)) / 1000);

								var timerElement1 = document.getElementById("demo1" + countdown.id);
								// If the count down is over, write some text 
								if (distance1 < 0) {
									timerElement1.innerHTML = "EXPIRED";
									// this timer is done, remove it
									countdowns.splice(index, 1);
								} else {
									timerElement1.innerHTML =  days1 + "d " + hours1 + "h " + minutes1 + "m " + seconds1 + "s "; 
								}
							}
							
							if(countdown.end_apply=="" && countdown.accept_time!="") {
								var distance2 = now - countdown.distance2;
								// Time calculations for days, hours, minutes and seconds
								var days2 = Math.floor(distance2 / (1000 * 60 * 60 * 24));
								var hours2 = Math.floor((distance2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
								var minutes2 = Math.floor((distance2 % (1000 * 60 * 60)) / (1000 * 60));
								var seconds2 = Math.floor((distance2 % (1000 * 60)) / 1000);
								
								var timerElement2 = document.getElementById("demo2" + countdown.id);
								// If the count down is over, write some text 
								if (distance2 < 0) {
									timerElement2.innerHTML = "EXPIRED";
									// this timer is done, remove it
									countdowns.splice(index, 1);
								} else {
									timerElement2.innerHTML =  days2 + "d " + hours2 + "h " + minutes2 + "m " + seconds2 + "s "; 
								}
							}

							index -= 1;
						}

						// if all countdowns have finished, stop timer
						if (countdowns.length < 1) {
							clearInterval(timer);
						}
					}, 1000);
				</script>
			</div>
		';
		
		echo $table;
    }
}