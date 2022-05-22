<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Costing_rev extends MY_Controller {
    var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
    }
	
	public function index() {
        return view('pages/costing_rev/index', $this->data);
	}
	
	public function input_by_txt() {
		$costing = file(base_url()."assets/costing_kalteng.txt");
		echo "<pre>";
		
		foreach($costing as $key => $line) {
			if($key==0) {
				$param = explode(PHP_EOL, $line);
				$param = explode("	", $param[0]);
			} else { 
				$param2 = explode(PHP_EOL, $line);
				$param2 = explode("	", $param2[0]);
				
				$kode_costing = $param2[0];
				$job_order = $param2[1];
				$sn_mesin = $param2[2];
				// print_r($param2);
				$res = $this->db->query("SELECT *, master_atm.id as id, master_atm.cabang as cabang, master_atm.lokasi as lokasi FROM master_atm LEFT JOIN master_client ON(master_atm.id_bank=master_client.id) WHERE sn_mesin LIKE '%$sn_mesin%'")->row();
				
				$bank = $this->db->query("SELECT * FROM master_client WHERE id='$res->id_bank'")->row();
				$cse = $this->db->query("SELECT *, master_staff.id as id_cse FROM trans_schedule 
					LEFT JOIN master_staff ON (master_staff.id=trans_schedule.id_petugas) 
					LEFT JOIN master_location ON (trans_schedule.id_lokasi=master_location.id) 
					LEFT JOIN master_location_detail ON (master_location_detail.id_lokasi=master_location.id)
					WHERE master_location.id_bank='$res->id_bank' AND master_location_detail.id_atm='$res->id'")->row();
					
				$data = array(
					"costing_biaya" => $kode_costing,
					"job_order" => $job_order,
					"serial_number" => $sn_mesin,
					"produk" => "ATM ".strtoupper($res->merk_mesin)." Tipe ".strtoupper($res->type_mesin),
					"bank" => $bank->nama,
					"cabang" => $res->cabang,
					"lokasi" => $res->lokasi,
					"cse" => ucfirst(strtolower($cse->nama)),
					"atm_id" => $res->idatm,
					"id_cse" => $cse->id_cse,
				);
				
				print_r($data);
			}
		}
	}
	
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = trim($this->input->post("id"));
		$job_order = trim($this->input->post("job_order"));
		// $kode_part = trim($this->input->post("kode_part"));
		// $tgl_terima = trim($this->input->post("tgl_terima"));
		// $quantity = trim($this->input->post("quantity"));
		
		$data = array();
		if($id==null){
			$this->insert_temp($job_order);
		} 
		// else {
			// $data['tgl_terima'] = $tgl_terima;
			// $data['kode_part'] = $kode_part;
			// $data['quantity'] = $quantity;
			// $this->db->where('id', $id);
			// $result = $this->db->update('master_transaction_in', $data);
		// }
		
		// if($result) {
			// echo "success";
		// } else {
			// echo "failed";
		// }
	}
	
	public function get_serial() {
		// header('Content-type: text/javascript');
		
		$data_temp = $_SESSION['temp_costing'];
		$sn_number = array();
		if(count($data_temp)>0) {
			foreach($data_temp as $k => $r) {
				$arr = array();
				foreach($r as $x => $y) {
					$sn_number[] = $y['serial_number'];
				}
			}
		}
		
		$search = $this->input->post('search');
		$search = "%".strtolower($search)."%";
		$query = "SELECT * FROM master_atm WHERE (sn_mesin NOT IN ( '" . implode( "', '" , $sn_number ) . "' ) AND sn_mesin NOT IN (SELECT sn_number FROM costing_rev)) AND (sn_mesin LIKE '$search' OR idatm LIKE '$search')";
		$result = $this->db->query($query)->result();
		
		
		$list = array();
		if (count($result) > 0) {
			$key=0;
			foreach ($result as $row) {
				$list[$key]['id'] = $row->sn_mesin;
				$list[$key]['text'] = $row->sn_mesin." / ATM ".strtoupper($row->merk_mesin)." Tipe ".strtoupper($row->type_mesin); 
				// $list[$key]['text'] = implode("', '" , $sn_number); 
				$key++;
			}
			echo json_encode($list);
		} else {
			echo json_encode($list);
		}
	}
	
	public function count_data_temp() {
		if(isset($_SESSION['temp_costing'])) {
			echo count($_SESSION['temp_costing']);
		} else {
			echo 0;
		}
	}
	
	public function insert_temp($job_order) {
		if(isset($_SESSION['temp_costing'])) {
			$data_temp = $_SESSION['temp_costing'];
			foreach($data_temp as $k => $r) {
				$arr = array();
				foreach($r as $x => $y) {
					$arr[] = array(
						'kode_costing' => $y['costing_biaya'],
						'job_order' => $job_order,
						'atm_id' => $y['atm_id'],
						'sn_number' => $y['serial_number'],
						'cse' => $y['id_cse']
					);
					
					// $this->db->where('kode_costing', $y['costing_biaya']);
					// $q = $this->db->get('costing_rev');
					// if ( $q->num_rows() > 0 ) {
						// $this->db->where('kode_costing', $y['costing_biaya']);
						// $this->db->update('costing_rev', $arr);
					// } else {
						// $this->db->set('kode_costing', $y['costing_biaya']);
						// $this->db->insert('costing_rev', $arr);
					// }
				}
				
				// echo "<pre>";
				// print_r($arr);
				$result = $this->db->insert_batch('costing_rev', $arr);
				if($result) {
					unset($_SESSION['temp_costing']);
					echo "success";
				} else {
					echo "failed";
				}
			}
		}
	}
	
	public function deletetemp($id) {
		array_splice($_SESSION['temp_costing'], $id, 1);
	}
	
	public function clear_temp() {
		$_SESSION['temp_costing'] = array();
	}
	 
	public function add_data_temp() {
		// echo "<pre>";
		// print_r($this->input->post());
		$array = ($_SESSION['temp_costing']==null ? array() : $_SESSION['temp_costing']);
		// echo end($array); 
		// print_r(end($array)[0]['costing_biaya']);
		
		$sn_mesin = trim($this->input->post("serial_number"));
		$res = $this->db->query("SELECT *, master_atm.id as id, master_atm.cabang as cabang, master_atm.lokasi as lokasi FROM master_atm LEFT JOIN master_client ON(master_atm.id_bank=master_client.id) WHERE sn_mesin='$sn_mesin'")->row();
		if(count($array)==0) {
			$kode = 1;
		} else {
			$kode = end($array)[0]['costing_biaya'];
            $kode = intval(substr($kode, strlen($res->kode_ticket))) + 1;
		}
		$kode = str_pad($kode, 4, '0', STR_PAD_LEFT);
        $kode = $res->kode_ticket.$kode;
		// echo $kode;
		
		$bank = $this->db->query("SELECT * FROM master_client WHERE id='$res->id_bank'")->row();
		$cse = $this->db->query("SELECT *, master_staff.id as id_cse FROM trans_schedule 
			LEFT JOIN master_staff ON (master_staff.id=trans_schedule.id_petugas) 
			LEFT JOIN master_location ON (trans_schedule.id_lokasi=master_location.id) 
			LEFT JOIN master_location_detail ON (master_location_detail.id_lokasi=master_location.id)
			WHERE master_location.id_bank='$res->id_bank' AND master_location_detail.id_atm='$res->id'")->row();
		
		// print_r($cse);
		$data = array(
			"costing_biaya" => ($_REQUEST['costing_biaya']!=="" ? trim($_REQUEST['costing_biaya']) : $kode),
			"serial_number" => trim($this->input->post("serial_number")),
			"produk" => "ATM ".strtoupper($res->merk_mesin)." Tipe ".strtoupper($res->type_mesin),
			"bank" => $bank->nama,
			"cabang" => $res->cabang,
			"lokasi" => $res->lokasi,
			"cse" => ucfirst(strtolower($cse->nama)),
			"atm_id" => $res->idatm,
			"id_cse" => $cse->id_cse,
		);
		// print_r($data);
		
		$array = ($_SESSION['temp_costing']==null ? array() : $_SESSION['temp_costing']);
		$newdata = array($data);
		array_push($array, $newdata);
		
		$_SESSION['temp_costing'] = $array;
	}
	
	public function get_data_temp() {
		$data_temp = $_SESSION['temp_costing'];
		arsort($data_temp);
		
		$total_employees = count($data_temp);
		
		$url = base_url().'costing_rev';
		$data = array();
		$no = 0;
		foreach($data_temp as $k => $r) {
			$no++;
			$arr = array();
			foreach($r as $x => $y) {
				$arr = array(
					$no,
					$y['costing_biaya'],
					$y['serial_number'],
					$y['produk'],
					$y['bank'],
					$y['cabang'],
					$y['lokasi'],
					$y['cse'],
					'<a onclick="deleteTemp(\''.$url.'/deletetemp/'.$k.'\')" class="btn btn-danger mr-1">Delete</a>'
				);
			}
			array_push($data, $arr);
			// print_r($data);
		}
		$output = array(
            "draw" => 0,
            "recordsTotal" => $total_employees,
            "recordsFiltered" => $total_employees,
            "data" => $data
        );
        echo json_encode($output);
        exit();
	}
	
	public function get_data() {
		$id = $this->uri->segment(3);
		$valid_columns = array(
            1=>'id'
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
        $this->db->select('*');
        $this->db->from('master_ticket');
        // $this->db->join('trouble_category', 'trouble_category.id = trouble_sub_category.id_category');
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
			$url = base_url().'new_ticket';
            $data[]= array(
                $no,
                $atm($rows->atm_id, 'idatm'),
                $bank($atm($rows->atm_id, 'id_bank')),
                $atm($rows->atm_id, 'cabang'),
                $atm($rows->atm_id, 'lokasi'),
                $rows->ticket_id,
                $rows->problem_type,
                $rows->entry_date,
                '<center>
                    <a onclick="deleteAction(\''.$url.'/delete/'.$rows->id.'\')" class="btn btn-danger mr-1 zoomsmall" style="background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;">
                        <img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/del.png"/>
                        Delete
                    </a>
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
	
	public function tes() {
		$valid_columns = array(
            1 => 'finance_costing.id'
        );

        // $draw = 1;
        // $start = 0;
        // $length = 10;
        // $order = array(array("column"=>1,"dir"=>""));
        // $search= array('value'=>'');
        // $search = $search['value'];
		// $col = 0;
        // $dir = "";
		
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
		$this->db->select('*, finance_akomodation.id as ids, finance_akomodation.status as statuy');
        $this->db->from('finance_akomodation');
		$this->db->join('master_ticket', 'master_ticket.ticket_id = finance_akomodation.ticket_id');
		$this->db->join('finance_costing', 'finance_costing.kode_costing = finance_akomodation.kode_costing');
		// $this->db->where('finance_akomodation.status', 'approved');
		$this->db->where("(finance_akomodation.status='approved' OR finance_akomodation.status='transfered')");
		$result = $this->db->get();
		
		
		$no = $start;
		foreach($result->result() as $r) {
			$rr = $this->db->query("SELECT * FROM master_client WHERE id='$r->bank_id'")->row();
			$rrr = $this->db->query("SELECT * FROM master_atm WHERE idatm='$r->atm_id'")->row();
			$cse = $this->db->query("SELECT * FROM master_staff WHERE id='$r->cse'")->row();
			
			$kode_costing = $r->kode_costing;
			$sn_number = $r->sn_number;
			$job_order = $r->job_order;
			if($r->statuy=='approved') {
				$status_action = '<center>
							<a onclick="detailData(\''.$r->ids.'\', \''.$cse->id.'\')" class="btn btn-warning btn-sm zoomsmall" style="background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;">
								<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/edit.png"/>
								Detail
							</a>
						 </center>';
			} else {
				// $status_action = "Rp. ".number_format($r->jumlah_transfer, 0, ",", ".");
				
				
				if($r->jenis_transfer=="partial") {
					$status_action = '<center><span class="btn-warning btn-sm" style="background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;">Transfer Sebagian</span><br>
							<a onclick="detailData(\''.$r->ids.'\', \''.$cse->id.'\')" class="btn btn-warning btn-sm zoomsmall" style="background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;">
								<img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/edit.png"/>
								Detail
							</a>
						 </center>';
				} else {
					$status_action = '<center>
								<span class="btn-warning btn-sm zoomsmall" style="background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;">
									TRANSFERED
								</span>
							 </center>';
				}
			}
			
			$no++;
			$url = base_url().'finance_costing';
			$data[] = array(
				$no,
				$kode_costing,
				$sn_number,
				$job_order,
				$rr->nama,
				$rrr->cabang,
				$rrr->lokasi,
				$cse->nama,
				$status_action
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
        $query = $this->db->select("COUNT(*) as num")->get("finance_akomodation");
		
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }
	
	public function detail($id) {
		$row = $this->db->query("SELECT * FROM finance_akomodation WHERE id='$id'")->row();
		
		// print_r($id);$row->detail
		echo "<table class='table table-striped table-bordered table-hover'>";
		echo "<tr>";
		echo "<th>Tanggal</th>";
		echo "<th>Pengeluaran</th>";
		echo "<th>Keterangan</th>";
		echo "<th>Biaya</th>";
		echo "</tr>";
		$total = 0;
		foreach(json_decode($row->detail, true) as $r) {
			echo "<tr>";
			if($r['tanggal']!==$current) {
				echo "<td>".$r['tanggal']."</td>";
			} else {				
				echo "<td></td>";
			}
			echo "<td>".$r['pengeluaran']."</td>";
			echo "<td>".$r['keterangan']."</td>";
			echo "<td align='right'>".$r['biaya']."</td>";
			echo "</tr>";
			
			$current = $r['tanggal'];
			$total = $total + $r['cost'];
		}
		echo "<tr>";
		echo "<td align='center' colspan='3'><b>TOTAL</b></td>";
		echo "<td align='right'><b>Rp. ".number_format($total, 0, ",", ".")."</b></td>";
		echo "</tr>";
		if($row->jenis_transfer=="partial") {
			$jumlah_transfer = "Rp. ".number_format($row->jumlah_transfer, 0, ",", ".");
			$jumlah_kurang = "Rp. ".number_format($total-$row->jumlah_transfer, 0, ",", ".");
		echo "<tr>";
		echo "<td align='center' colspan='4'>Sudah Di trensfer sebesar : ".$jumlah_transfer."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td align='center' colspan='4'>Kekurangan : ".$jumlah_kurang."</td>";
		echo "</tr>";
		}
		echo "</table>";
	}
	
	public function transfered($id, $pic, $jum) {
		// echo $id;
		// $id = trim($this->input->get("id"));
		$row = $this->db->query("SELECT * FROM finance_akomodation WHERE id='$id'")->row();
		$total = 0;
		foreach(json_decode($row->detail, true) as $r) {
			$total = $total + $r['cost'];
		}
		
		if($total>$jum && $jum>0) {
			$this->db->where('id', $id);
			$res = $this->db->update('finance_akomodation', array('jumlah_transfer'=>$jum, 'jenis_transfer'=>'partial', 'status'=>'transfered'));
			if($res) {
				$this->notif_model->notif_transfer($pic);
				echo "success";
			} else {
				echo "failed";
			}
			
		} else if($total==$jum) {
			$this->db->where('id', $id);
			$res = $this->db->update('finance_akomodation', array('jumlah_transfer'=>$jum, 'jenis_transfer'=>'lunas', 'status'=>'transfered'));
			if($res) {
				$this->notif_model->notif_transfer($pic);
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "Jumlah Invalid";
		}
	
		
	}
}