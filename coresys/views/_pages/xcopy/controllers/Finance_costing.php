<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class Finance_costing extends MY_Controller {
    var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
    }
	
	public function index() {
        return view('pages/finance_costing/index', $this->data);
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
		
		$sn_number = array();
		if(isset($_SESSION['temp_costing'])) {
			$data_temp = $_SESSION['temp_costing'];
			if(count($data_temp)>0) {
				foreach($data_temp as $k => $r) {
					$arr = array();
					foreach($r as $x => $y) {
						$sn_number[] = $y['serial_number'];
					}
				}
			}
		}
		
		$search = $this->input->post('search');
		$search = "%".strtolower($search)."%";
		$query = "SELECT * FROM master_atm WHERE (sn_mesin NOT IN ( '" . implode( "', '" , $sn_number ) . "' ) AND sn_mesin NOT IN (SELECT sn_number FROM finance_costing)) AND (sn_mesin LIKE '$search' OR idatm LIKE '$search')";
		// $query = "SELECT * FROM master_atm WHERE (sn_mesin LIKE '$search' OR idatm LIKE '$search')";
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
					// $q = $this->db->get('finance_costing');
					// if ( $q->num_rows() > 0 ) {
						// $this->db->where('kode_costing', $y['costing_biaya']);
						// $this->db->update('finance_costing', $arr);
					// } else {
						// $this->db->set('kode_costing', $y['costing_biaya']);
						// $this->db->insert('finance_costing', $arr);
					// }
				}
				
				// echo "<pre>";
				// print_r($arr);
				$result = $this->db->insert_batch('finance_costing', $arr);
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
		
		$url = base_url().'finance_costing';
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
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('finance_costing');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
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
		$this->db->select('finance_costing.*, finance_costing.id as ids, master_atm.*, master_client.nama as nama_bank, master_atm.cabang as cabang, master_atm.lokasi as lokasi, master_staff.nama as nama_cse');
        $this->db->from('finance_costing');
		$this->db->join('master_atm', 'master_atm.sn_mesin = finance_costing.sn_number');
		$this->db->join('master_client', 'master_client.id = master_atm.id_bank');
		$this->db->join('master_location_detail', 'master_location_detail.id_atm = master_atm.id');
		$this->db->join('master_location', 'master_location.id = master_location_detail.id_lokasi');
		$this->db->join('trans_schedule', 'trans_schedule.id_lokasi = master_location.id');
		$this->db->join('master_staff', 'master_staff.id = trans_schedule.id_petugas');
		$result = $this->db->get();
		
		
		$no = $start;
		foreach($result->result() as $r) {
			$no++;
			$url = base_url().'finance_costing';
			$data[] = array(
				$no,
				$r->kode_costing,
				$r->sn_number,
				"ATM ".strtoupper($r->merk_mesin)." Tipe ".strtoupper($r->type_mesin),
				$r->job_order,
				$r->nama_bank,
				$r->cabang,
				$r->lokasi,
				$r->nama_cse,
                '<center>
                    <a onclick="deleteAction(\''.$url.'/delete/'.$r->ids.'\')" class="btn btn-danger mr-1 zoomsmall" style="background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;">
                        <img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/del.png"/>
                        Delete
                    </a>
				 </center>'
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
        $query = $this->db->select("COUNT(*) as num")->get("finance_costing");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }
	
	public function read_excel() {
		$sheetname = 'COSTING BIAYA';
		$reader = IOFactory::createReader('Xlsx');
		$reader->setLoadSheetsOnly($sheetname);
		$spreadsheet = $reader->load('data_maluku.xlsx');
		
		$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
		echo "<pre>";
		// print_r($sheetData);
		
		
		$cse_q = function($nama) {
			$atm = $this->db->query("SELECT * FROM master_staff LEFT JOIN master_user ON(master_staff.nik=master_user.username) WHERE master_staff.nama LIKE '$nama%'")->row();
			$atm = (array) $atm;
			return $atm;
		};
		
		foreach($sheetData as $key => $row) {
			if(is_numeric($row['A'])) {
				// print_r($row);
				$kode_costing = $row['F'];
				$job_order = $row['G'];
				$atm_id = $row['C'];
				$sn_number = $row['D'];
				$cse = $cse_q($row['B'])['id'];
				
				// echo  $kode_costing."<br>";
				// echo  $job_order."<br>";
				// echo  $atm_id."<br>";
				// echo  $cse."<br>";
				
				// echo $atm_id;
				
				if(empty($atm_id)) {
					$atm_id = $this->db->query("SELECT idatm FROM master_atm WHERE sn_mesin='$sn_number'")->row()->idatm;
				}
				
				if(empty($sn_number)) {
					$sn_number = $this->db->query("SELECT sn_mesin FROM master_atm WHERE idatm='$atm_id'")->row()->sn_mesin;
				}
				
				// echo "<br>";
				$query = "INSERT INTO `finance_costing`(`kode_costing`, `job_order`, `atm_id`, `sn_number`, `cse`) VALUES ('$kode_costing', '$job_order', '$atm_id', '$sn_number', '$cse')";
				
				echo $query."<br>";
				
				$data['kode_costing'] = $kode_costing;
				$data['job_order'] = $job_order;
				$data['atm_id'] = $atm_id;
				$data['sn_number'] = $sn_number;
				$data['cse'] = $cse;
				
				$this->db->where('kode_costing', $kode_costing);
				$q = $this->db->get('finance_costing');
				if ($q->num_rows() > 0) {
					$this->db->where('kode_costing', $kode_costing);
					$res = $this->db->update('finance_costing', $data);
				} else {
					$this->db->set('kode_costing', $kode_costing);
					$res = $this->db->insert('finance_costing', $data);
				}
			}
		}
	}
}