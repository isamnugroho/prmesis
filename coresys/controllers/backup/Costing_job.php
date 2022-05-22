<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;
use Mpdf\Mpdf;

class Costing_job extends MY_Controller {
    var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
    }
	
	public function index() {
        return view('pages/costing_job/index', $this->data);
    }
	
	public function dataList() {
		$result = $this->db->query("SELECT *, finance_akomodation.id as ids FROM finance_akomodation 
                                    LEFT JOIN master_ticket ON (master_ticket.ticket_id=finance_akomodation.ticket_id)
                                    LEFT JOIN finance_costing ON (finance_costing.kode_costing=finance_akomodation.kode_costing)
                                    WHERE finance_akomodation.kode_costing!='' AND master_ticket.ticket_id IS NOT NULL
									ORDER BY finance_akomodation.id DESC
								")->result();
		
		
		// echo "<pre>";
		// print_r($result);
		
		$data = array();
		$data2 = array();
		$res = array();
		$k = 0;
		foreach($result as $r) {
			$rr = $this->db->query("SELECT * FROM master_client WHERE id='$r->bank_id'")->row();
			$rrr = $this->db->query("SELECT * FROM master_atm WHERE idatm='$r->atm_id'")->row();
			$cse = $this->db->query("SELECT * FROM master_staff WHERE id='$r->cse'")->row();
			
			$data2[] = array(
				"date" => date("d/m/Y", strtotime($r->date)),
				"ticket" => $r->ticket_id,
				"kode_costing" => $r->kode_costing,
				"sn_number" => $r->sn_number,
				"produk" => "ATM ".strtoupper($rrr->merk_mesin)." Tipe ".strtoupper($rrr->type_mesin),
				"job_order" => $r->job_order,
				"bank" => $rr->nama,
				"cabang" => $rrr->cabang,
				"lokasi" => $rrr->lokasi,
				"cse" => $cse->nama,
				"detail" => $r->detail,
				"action" => "<a href='".base_url()."costing_job/print_pdf/".$r->ids."' target='_blank'><button class='btn btn-xs btn-info'>PRINT</button></a> | <button class='btn btn-xs btn-info' onclick='costing_edit(\"".$r->ids."\")'>EDIT</button> | <button class='btn btn-xs btn-success' onclick='costing_acceptence(\"".$r->ids."\")'>COSTING APPROVEMENT</button> "
			);
			// $data['name'] = $r->kode_costing;
			// $data['est'] = $r->sn_number;
			// $data['contacts'] = $r->ticket_id;
			// $data['status'] = $r->ticket_id;
			// $data['target-actual'] = $r->ticket_id;
			// $data['actual'] = $r->ticket_id;
			// $data['tracker'] = $r->ticket_id;
			// $data['starts'] = $r->ticket_id;
			// $data['ends'] = $r->ticket_id;
			// $data['comments'] = $r->ticket_id;
			// $data['detail'] = $r->detail;
			// $data['action'] = "<button class='btn btn-xs btn-success pull-right' onclick='costing_acceptence(\"".$r->id."\")'>COSTING APPROVEMENT</button> ";
			
			$k++;
		}
		
		// $res['data'] = array($data2);
		
		// header('Content-Type: application/json');
		// echo json_encode($res);
		
		echo json_encode(array("data"=>$data2));
	}
	
	public function get_data_costing() {
		$id = $_REQUEST['id'];
		$row = $this->db->query("SELECT * FROM finance_akomodation WHERE id='$id'")->row();
		
		echo $row->detail;
	}
	
	public function update_data_costing() {
		$id = $_REQUEST['id'];
		$detail = $_REQUEST['detail'];
	
		$this->db->where('id', $id);
		$res = $this->db->update('finance_akomodation', array('detail'=>$detail));
		
		if($res) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	public function costing_approve() {
		$id = trim($this->input->get("id"));
		
		$id_user = $this->session->userdata('user_data')['id'];
	
		$this->db->where('id', $id);
		$res = $this->db->update('finance_akomodation', array('status'=>'approved'));
		
		if($res) {
			$this->push("Costing Approve", "Pengajuan Akomodasi telah di approve", $id_user, "costing_rev", $id);
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
	
	public function dataList2() {
		$result = $this->db->query("SELECT * FROM finance_akomodation 
									LEFT JOIN master_ticket ON (master_ticket.ticket_id=finance_akomodation.ticket_id)
									LEFT JOIN finance_costing ON (finance_costing.kode_costing=finance_akomodation.kode_costing)
								")->result();
		
		
		echo "<pre>";
		print_r($result);
		
		// $data = array();
		// $res = array();
		// foreach($result as $r) {
			// $data['name'] = $r->kode_costing;
			// $data['est'] = $r->sn_number;
			// $data['contacts'] = $r->ticket_id;
			// $data['status'] = $r->ticket_id;
			// $data['target-actual'] = $r->ticket_id;
			// $data['actual'] = $r->ticket_id;
			// $data['tracker'] = $r->ticket_id;
			// $data['starts'] = $r->ticket_id;
			// $data['ends'] = $r->ticket_id;
			// $data['comments'] = $r->ticket_id;
			// $data['detail'] = $r->detail;
			// $data['action'] = "<button class='btn btn-xs btn-success pull-right' onclick='costing_acceptence(\"".$r->id."\")'>COSTING APPROVEMENT</button> ";
		// }
		
		// $res['data'] = array($data);
		
		// header('Content-Type: application/json');
		// echo json_encode($res);
	}
	
	public function print_pdf($id) {
// 	    SELECT *, finance_akomodation.id as ids FROM finance_akomodation 
//         LEFT JOIN master_ticket ON (master_ticket.ticket_id=finance_akomodation.ticket_id)
//         WHERE finance_akomodation.kode_costing!='' AND master_ticket.ticket_id IS NOT NULL
// 		ORDER BY finance_akomodation.id DESC
	    
		$result = $this->db->query("SELECT *, finance_akomodation.id as ids FROM finance_akomodation 
									LEFT JOIN master_ticket ON (master_ticket.ticket_id=finance_akomodation.ticket_id)
									LEFT JOIN finance_costing ON (finance_costing.kode_costing=finance_akomodation.kode_costing)
									LEFT JOIN master_staff ON (master_staff.id=master_ticket.pic)
									LEFT JOIN master_atm ON (master_atm.idatm=master_ticket.atm_id)
									WHERE finance_costing.kode_costing IS NOT NULL AND finance_akomodation.id='$id'
									ORDER BY finance_akomodation.id DESC
								")->row();
		// echo "<pre>";
		// print_r($result);
		$htmlString = '
			<style>
				#table_bawah {
					width: 100%;
					margin-top: 20px;
					background-color: #ebebeb;
					font-size: 10px;
				}
				#div {
					font-size: 12px;
				}
				
				#table_bawah {
				  font-family: Arial, Helvetica, sans-serif;
				  border-collapse: collapse;
				  width: 100%;
				}

				#table_bawah th {
				  border: 1px solid #ddd;
				  padding: 8px;
				}

				#table_bawah td {
				  border: 1px solid #ddd;
				  padding: 5px;
				}

				#table_bawah tr:nth-child(even){background-color: #f2f2f2;}

				#table_bawah tr:hover {background-color: #ddd;}

				#table_bawah th {
				  padding-top: 12px;
				  padding-bottom: 12px;
				  text-align: center;
				  background-color: #4CAF50;
				  color: white;
				}
				
				
			</style>
			<center>
				<h3>BIAYA COSTING PERJALANAN TEKNISI</h3>
			</center>
			<br>
			<table style="width: 100%;" id="div">
				<tr>
					<td width="50%">
						<table>
							<tr>
								<td>NAMA TEKNISI</td>
								<td>:</td>
								<td>'.$result->nama.'</td>
							</tr>
							<tr>
								<td>NOMOR HANDPHONE</td>
								<td>:</td>
								<td>'.$result->hp.'</td>
							</tr>
						</table>
					</td>
					<td width="50%">
						<table>
							<tr>
								<td>PROJECT</td>
								<td>:</td>
								<td>Perbaikan ATM '.$result->cabang.'</td>
							</tr>
							<tr>
								<td>JOB ORDER</td>
								<td>:</td>
								<td>'.$result->job_order.'</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		';
		
		$data = json_decode($result->detail,true);
		
		$htmlString .= '<div class="w3-responsive">';
		$htmlString .= '<table id="table_bawah" class="w3-table-all w3-card-4 w3-tiny">';
		$htmlString .= '<tr class="w3-light-green">';
		$htmlString .= '<th>No</th>';
		$htmlString .= '<th>Tanggal</th>';
		$htmlString .= '<th>Pengeluaran</th>';
		$htmlString .= '<th>Biaya</th>';
		$htmlString .= '<th>Keterangan</th>';
		$htmlString .= '</tr>';
		$no = 0;
		$total = 0;
		foreach($data as $r) {
			
			$htmlString .= '<tr>';
			if($r['tanggal']!==$current) {
				$no++;
				$htmlString .= '<td>'.$no.'</td>';
				$htmlString .= '<td>'.$r['tanggal'].'</td>';
			} else {				
				$htmlString .= '<td></td>';
				$htmlString .= '<td></td>';
			}
			$htmlString .= '<td>'.$r['pengeluaran'].'</td>';
			$htmlString .= '<td align="right">'.$r['biaya'].'</td>';
			$htmlString .= '<td>'.$r['keterangan'].'</td>';
			$htmlString .= '</tr>';
			
			$current = $r['tanggal'];
			$total = $total + $r['cost'];
		}
		$htmlString .= '<tr>';
		$htmlString .= '<td colspan="3" align="center">TOTAL</td>';
		$htmlString .= '<td align="right">Rp. '.number_format($total, 0, ",", ".").'</td>';
		$htmlString .= '</tr>';
		
		$htmlString .= '</table>';
		$htmlString .= '<div id="div">
			<br>
			Jakarta, '.date("d-m-Y").'<br><br><br>
			<table bolder=1 style="width: 100%">
				<tr>
					<td width="50%" align="center">
						Di Setujui,
						<br>
						<br>
						<br>
						<br>
						<br>
						(Mangatas Felix K. Marpaung)
					</td>
					<td width="50%" align="center">
						Di Periksa,
						<br>
						<br>
						<br>
						<br>
						<br>
						(Sari)
					</td>
				</tr>
			</table>
		</div>';
		$htmlString .= '</div>';
		
		$dompdf = new DOMPDF();
		$dompdf->loadHtml($htmlString);
		$dompdf->set_paper("A4", "portrait");
		$dompdf->render();

		$dompdf->stream(date("Y-m-d").'_Perbaikan ATM '.$result->cabang, array("Attachment" => false));
	}
}    