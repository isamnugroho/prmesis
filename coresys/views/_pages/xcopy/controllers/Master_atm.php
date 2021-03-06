<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

class Master_atm extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index() {	
		$result = $this->db->get("master_atm")->result();
		
		foreach($result as $r) {
			$qrCode = new QrCode($r->idatm);
			$qrCode->setSize(300);
			
			$qrCode->writeFile(realpath(__DIR__ . '/../../upload/qrcode').'/'.$r->idatm.'.png');
		}
		
		$this->data['client'] = $this->db->get('master_client')->result();
	
		return view('pages/master_atm/index', $this->data);
	}
	
	public function ccek() {
		$arr = array('40401', '40601', '40501', '30004', '40201', '30105', '30304', '30011', '30012', '30005', '40103', '30007', '30008', '30006', '40303', '40005', '30103', '40004', '30101', '30315', '30314', '30313', '30201', '300014', '300016', '300015', '30602', '40011', '40013', '40307', '30316', '40012', '30107', '40203', '30501', '12540003', '12530102', '12540102', '12540302', '12530101', '12540002', '12530002', '12530003');
	
		$query = $this->db->query("SELECT * FROM master_atm WHERE id_bank='20' AND idatm NOT IN ('40401', '40601', '40501', '30004', '40201', '30105', '30304', '30011', '30012', '30005', '40103', '30007', '30008', '30006', '40303', '40005', '30103', '40004', '30101', '30315', '30314', '30313', '30201', '300014', '300016', '300015', '30602', '40011', '40013', '40307', '30316', '40012', '30107', '40203', '30501', '12540003', '12530102', '12540102', '12540302', '12530101', '12540002', '12530002', '12530003')")->result();
		$query = $this->db->query("SELECT master_atm.idatm FROM master_location_detail LEFT JOIN master_atm ON (master_atm.id=master_location_detail.id_atm) WHERE master_location_detail.id_lokasi='59'")->result();
		
		// echo "<pre>";
		// // print_r(count($query));
		// print_r(count($arr));
		foreach($query as $r) {
			$arr2[] = $r->idatm;
			// echo $r->idatm;
			// if (in_array($r->idatm, $arr))
			  // {
			  // echo "Match found<br>";
			  // }
			// else
			  // {
			  // echo "Match not found<br>";
			  // }
		}
		
		echo "<pre>";
		sort($arr);
		print_r($arr);
		echo "<br>";
		sort($arr2);
		print_r($arr2);
		
		foreach($arr as $r) {
			if (in_array($r, $arr2)) {
				
			} else {
				echo "Match not found<br>";
			}
		}
	}
	
	public function resync_by_txt() {
		$atm = file(base_url()."assets/resync_data.txt");
		$no = 0;
		$noid = 0;
		foreach($atm as $key => $line) {
			if($key==0) {
				$param = explode(PHP_EOL, $line);
				$param = explode("	", $param[0]);
			} else {
				$param2 = explode(PHP_EOL, $line);
				$param2 = explode("	", $param2[0]);
				
				$sn_number = $param2[1];	
				$result = $this->db->query("SELECT * FROM master_atm WHERE sn_mesin='".$sn_number."'");
				if($result->num_rows()>0) {
					// if($sn_number!=="") {
						// $no++;
						// if($param2[0]!=="") {
							// $data['idatm'] = $param2[0];
							// $data['status'] = "ON";
							// // $data['sn_number'] = $sn_number;
						// } else {
							// $noid++;
							// $data['idatm'] = "noid_bkt_".$noid;
							// $data['status'] = "ON";
							// // $data['sn_number'] = $sn_number;
						// }
						// echo $no." ADA ";
						// print_r($data);
						// echo "<br>";
					// }
					// $this->db->where('sn_mesin', $sn_number);
					// $this->db->update('master_atm', $data);
				} else {
					$no++;
					
					$data['id_serial'] = $this->db->query('SELECT id FROM master_serial WHERE id NOT IN (SELECT id_serial FROM master_atm) ORDER BY id ASC LIMIT 0,1')->row()->id;
					$data['id_bank'] = "20";
					$data['idatm'] = $param2[0];
					$data['cabang'] = $param2[5];
					$data['lokasi'] = $param2[6];
					$data['alamat'] = $param2[7];
					$data['merk_mesin'] = explode(" ", $param2[2])[0];
					$data['type_mesin'] = explode(" ", $param2[2])[1];
					$data['foto_atm'] = "";
					$data['sn_mesin'] =$param2[1];
					$data['status'] = null;
					$data['latitude'] = "";
					$data['longitude'] = "";
					
					// echo $no." GAK ADA ";
					echo "<pre>";
					print_r($data);
					echo "<br>";
					
					$result = $this->db->insert('master_atm', $data);
					
					// $qrCode = new QrCode($idatm);
					// $qrCode->setSize(300);
					// $qrCode->writeFile(realpath(__DIR__ . '/../../upload/qrcode').'/'.$idatm.'.png');
				}
			}
		}
	}
	
	public function input_by_txt() {
		$atm = file(base_url()."assets/atm.txt");
		$region = "TERNATE 2";
		$pic = "RISKI SANDI UMAR";
		
		// print_r($atm);
		// $param = array();
		foreach($atm as $key => $line) {
			
			if($key==0) {
				$param = explode(PHP_EOL, $line);
				$param = explode("	", $param[0]);
			} else {
				$param2 = explode(PHP_EOL, $line);
				$param2 = explode("	", $param2[0]);
				$idatm = $this->db->query("SELECT * FROM master_atm WHERE idatm='".$param2[1]."'");
				
				if($idatm->num_rows()==0) {
					$query = array();
					foreach($param as $k => $field) {
						$query[$field] = $param2[$k];
					}
					$query['id_serial'] = $this->db->query('SELECT id FROM master_serial WHERE id NOT IN (SELECT id_serial FROM master_atm) ORDER BY id ASC LIMIT 0,1')->row()->id;
					$this->db->insert('master_atm', $query);
					$insert_id = $this->db->insert_id();
					if($insert_id!="") {
						$real_reqion = $this->db->query("SELECT id FROM master_location WHERE name='".$region."'")->row()->id;
						$data['id_lokasi'] = $real_reqion;
						$data['id_atm'] = $insert_id;
						$this->db->insert('master_location_detail', $data);				
					}
				} else {
					echo "IDATM INI SUDAH TERSIMPAN";
				}
			}
		}
	}
	
	public function add() {
		
		$this->data['id'] = '';
		$this->data['idatm'] = '';
		$this->data['cabang'] = '';
		$this->data['lokasi'] = '';
		$this->data['alamat'] = '';
		$this->data['merk_mesin'] = '';
		$this->data['type_mesin'] = '';
		$this->data['kategori'] = '';
		$this->data['status'] = '';
		
		return view('pages/master_atm/form', $this->data);
	}
	
	public function edit($id) {
		$this->db->where("id", $id);
		$row = $this->db->get("master_atm")->row();
		
		// echo "<pre>";
		// print_r($row);
		
		$this->data['id'] = $row->id;
		$this->data['idatm'] = $row->idatm;
		$this->data['cabang'] = $row->cabang;
		$this->data['lokasi'] = $row->lokasi;
		$this->data['alamat'] = $row->alamat;
		$this->data['merk_mesin'] = $row->merk_mesin;
		$this->data['type_mesin'] = $row->type_mesin;
		$this->data['kategori'] = $row->kategori;
		$this->data['status'] = $row->status;
		
		
		return view('pages/master_atm/form', $this->data);
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = trim($this->input->post("id"));
		$id_serial = $this->db->query('SELECT id FROM master_serial WHERE id NOT IN (SELECT id_serial FROM master_atm) ORDER BY id ASC LIMIT 0,1')->row()->id;
		$id_bank = trim($this->input->post("id_bank"));
		$idatm = trim($this->input->post("idatm"));
		$cabang = trim($this->input->post("cabang"));
		$lokasi = trim($this->input->post("lokasi"));
		$alamat = trim($this->input->post("alamat"));
		$merk_mesin = trim($this->input->post("merk_mesin"));
		$type_mesin = trim($this->input->post("type_mesin"));
		$foto_atm = $this->_uploadImage($idatm);
		$sn_mesin = trim($this->input->post("sn_mesin"));
		$status = trim($this->input->post("status"));
		
		// BELOM
		$foto = trim($this->input->post("foto"));
		$latitude = trim($this->input->post("latitude"));
		$longitude = trim($this->input->post("longitude"));
		
		$data = array();
		if($id==null){
			$data['id_serial'] = $id_serial;
			$data['id_bank'] = $id_bank;
			$data['idatm'] = $idatm;
			$data['cabang'] = $cabang;
			$data['lokasi'] = $lokasi;
			$data['alamat'] = $alamat;
			$data['merk_mesin'] = $merk_mesin;
			$data['type_mesin'] = $type_mesin;
			$data['foto_atm'] = $foto_atm;
			$data['sn_mesin'] = $sn_mesin;
			$data['status'] = $status;
			$data['latitude'] = $latitude;
			$data['longitude'] = $longitude;
			$result = $this->db->insert('master_atm', $data);
			
			$qrCode = new QrCode($idatm);
			$qrCode->setSize(300);
			$qrCode->writeFile(realpath(__DIR__ . '/../../upload/qrcode').'/'.$idatm.'.png');
		} else {
			$old_image = trim($this->input->post("old_image"));
			$data['id_bank'] = $id_bank;
			$data['idatm'] = $idatm;
			$data['cabang'] = $cabang;
			$data['lokasi'] = $lokasi;
			$data['alamat'] = $alamat;
			$data['merk_mesin'] = $merk_mesin;
			$data['type_mesin'] = $type_mesin;
			if (!empty($_FILES["foto"]["name"])) {
				$data['foto_atm'] = $this->_uploadImage($idatm);
			} else {
				$data['foto_atm'] = $old_image;
			}
			$data['sn_mesin'] = $sn_mesin;
			$data['status'] = $status;
			$data['latitude'] = $latitude;
			$data['longitude'] = $longitude;
			$this->db->where('id', $id);
			$result = $this->db->update('master_atm', $data);
			
			$qrCode = new QrCode($idatm);
			$qrCode->setSize(300);
			$qrCode->writeFile(realpath(__DIR__ . '/../../upload/qrcode').'/'.$idatm.'.png');
		}
		
		if($result) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	public function update() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = trim($this->input->post("id"));
		$idatm = trim($this->input->post("idatm"));
		$cabang = trim($this->input->post("cabang"));
		$lokasi = trim($this->input->post("lokasi"));
		$alamat = trim($this->input->post("alamat"));
		$merk_mesin = trim($this->input->post("merk_mesin"));
		$type_mesin = trim($this->input->post("type_mesin"));
		$kategori = trim($this->input->post("kategori"));
		$status = trim($this->input->post("status"));
		
		$data = array();
		$data['idatm'] = $idatm;
		$data['cabang'] = $cabang;
		$data['lokasi'] = $lokasi;
		$data['alamat'] = $alamat;
		$data['merk_mesin'] = $merk_mesin;
		$data['type_mesin'] = $type_mesin;
		$data['kategori'] = $kategori;
		$data['status'] = $status;
		$this->db->where("id", $id);
		$result = $this->db->update('master_atm', $data);
		
		if($result) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	public function delete($id) {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$this->db->where('id', $id);
        $result = $this->db->delete('master_atm');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	} 
	
	/**
	 * Additional method
	 */
	private function _uploadImage($name) {
		$config['upload_path']          = './upload/foto_atm/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $name;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto')) {
			return 'upload/jobcard/'.$this->upload->data("file_name");
		}
		
		return "default.jpg";
	}
	
	 
	public function get_data($id_bank) {
		$valid_columns = array(
            0=>'idatm',
            1=>'cabang',
            2=>'lokasi',
            3=>'alamat',
            4=>'merk_mesin',
            5=>'type_mesin',
            6=>'kategori',
            7=>'status',
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
		if($id_bank!=="0") {
			$this->db->where('id_bank', $id_bank);
		}
        $employees = $this->db->get("master_atm");
        $data = array();
		
		$bank = function($id) {
			$nama = $this->db->query("SELECT nama FROM master_client WHERE id='$id'")->row()->nama;
			
			return $nama;
		};
		
		$no = 0;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'master_atm';
            $data[]= array(
                $no,
                $rows->idatm,
                $bank($rows->id_bank),
                '<a href="#" onclick="openPicture(\''.$rows->idatm.'\', \''.base_url().'upload/qrcode/'.$rows->idatm.'.png\')"><img src="'.base_url().'upload/qrcode/'.$rows->idatm.'.png" width="50" height="50"></img></a>',
                '<a onclick="openPicture(\''.$rows->idatm.'\', \''.base_url().'upload/foto_atm/'.$rows->idatm.'.png\')"><img src="'.base_url().'upload/foto_atm/'.$rows->idatm.'.png?'.microtime().'" width="50"></a>',
                $rows->cabang,
                $rows->lokasi,
				$rows->merk_mesin,
                $rows->type_mesin,
                $rows->sn_mesin,
                '<center><a onclick="updateModal(
					\''.$rows->id.'\',
					\''.$rows->id_bank.'\',
					\''.$rows->idatm.'\',
					\''.$rows->cabang.'\',
					\''.$rows->lokasi.'\',
					\''.$rows->sn_mesin.'\',
					\''.$rows->status.'\',
					\''.$rows->latitude.'\',
					\''.$rows->longitude.'\',
					\''.$rows->alamat.'\',
					\''.$rows->merk_mesin.'\',
					\''.$rows->type_mesin.'\',
					\''.$rows->foto_atm.'\'
				)" class="btn btn-warning btn-sm zoomsmall" style="background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;"><img style="float: left; margin: 1px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/edit.png"/>Edit</a>
                 <a onclick="deleteAction(\''.$url.'/delete/'.$rows->id.'\')" class="btn btn-danger btn-sm zoomsmall" style="background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;"><img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/del.png"/>Delete</a></center>'
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
		$query = $this->db->select("COUNT(*) as num")->get("master_atm");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}
