<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

class Request_sparepart extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->load->model('datatables_model', 'datatables');
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index() {	
		$this->data['merk'] = $this->db->query('SELECT * FROM master_merk GROUP BY merk')->result();
		
	
		return view('pages/request_sparepart/index', $this->data);
	}
	
	public function dataList() {
		$query = "
			SELECT * FROM master_inventory_request 
			LEFT JOIN master_ticket ON (master_ticket.ticket_id=master_inventory_request.ticket_id)
		";
		
		
		$param['query'] 		= trim($query);
		$param['column_order'] 	= array(null, 'master_inventory_request.id', 'master_inventory_request.ticket_id');
		$param['column_search'] = array('master_inventory_request.ticket_id');
		$param['order'] 		= array('master_inventory_request.id' => 'desc');
		$param['where'] 		= array(
									  // array('finance_costing.kode_costing[!]' => null)
								  );
		
		$param['param'] = json_encode($param);
		$param['post'] 	= $_REQUEST;
		
		
		$data = $this->datatables->check($param);
		
		$r = json_decode($data, true);
		// print_r($r);
		
		$out = array();
		$out['draw'] = $r['draw'];
		$out['recordsTotal'] = $r['recordsTotal'];
		$out['recordsFiltered'] = $r['recordsFiltered'];
		$datas = array();
		$list = array();
		$key = 0;
		$no = $_REQUEST['start'];
		$object = json_decode(json_encode($r['data']), FALSE);
		foreach($object as $r) {
			$no++;
			
			$rr = $this->db->query("SELECT * FROM master_client WHERE id='$r->bank_id'")->row();
			$rrr = $this->db->query("SELECT * FROM master_atm WHERE idatm='$r->atm_id'")->row();
			$cse = $this->db->query("SELECT * FROM master_staff WHERE id='$r->cse'")->row();
			
			$det = json_decode($r->detail, true)[0]['status'];
			
			if($det=="request") {
				$list[$key] = array(
					"date" => date("d-m-Y", strtotime($r->date)),
					"ticket_id" => $r->ticket_id,
					"atm_id" => $r->atm_id,
					"service_type" => $r->service_type,
					"problem_type" => $r->problem_type,
					"status" => $r->status,
					"produk" => "ATM ".strtoupper($rrr->merk_mesin)." Tipe ".strtoupper($rrr->type_mesin),
					"bank" => $rr->nama,
					"cabang" => $rrr->cabang,
					"lokasi" => $rrr->lokasi,
					"cse" => $cse->nama,
					"detail" => $r->detail,
					"action" => "<button class='btn btn-xs btn-success pull-right' onclick='costing_acceptence(\"".$r->id."\")'>ACCEPT REQUEST</button> "
				);
				$key++;
			}
			
		}
		
		$out['data'] = $list;
		
		// echo "<pre>";
		// print_r($out);
		echo json_encode($out);
		
	}
	
	public function add() {
		
		$this->data['id'] = '';
		$this->data['idatm'] = '';
		$this->data['cabang'] = '';
		$this->data['lokasi'] = '';
		$this->data['alamat'] = '';
		$this->data['kategori'] = '';
		$this->data['status'] = '';
		
		return view('pages/request_sparepart/form', $this->data);
	}
	
	public function edit($id) {
		$this->db->where("id", $id);
		$row = $this->db->get("request_sparepart")->row();
		
		// echo "<pre>";
		// print_r($row);
		
		$this->data['id'] = $row->id;
		$this->data['idatm'] = $row->idatm;
		$this->data['cabang'] = $row->cabang;
		$this->data['lokasi'] = $row->lokasi;
		$this->data['alamat'] = $row->alamat;
		$this->data['kategori'] = $row->kategori;
		$this->data['status'] = $row->status;
		
		
		return view('pages/request_sparepart/form', $this->data);
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = trim($this->input->post("id"));
		$kode_part = trim($this->input->post("kode_part"));
		$nama_part = trim($this->input->post("nama_part"));
		$part_no = trim($this->input->post("part_no"));
		$stock = trim($this->input->post("stock"));
		$merk = trim($this->input->post("merk"));
		$price = trim($this->input->post("price"));
		
		$data = array();
		if($id==null){
			$data['kode_part'] = $kode_part;
			$data['nama_part'] = $nama_part;
			$data['part_no'] = $part_no;
			$data['stock'] = $stock;
			$data['merk'] = $merk;
			$data['price'] = $price;
			$result = $this->db->insert('request_sparepart', $data);
		} else {
			$data['kode_part'] = $kode_part;
			$data['nama_part'] = $nama_part;
			$data['part_no'] = $part_no;
			$data['stock'] = $stock;
			$data['merk'] = $merk;
			$data['price'] = $price;
			$this->db->where('id', $id);
			$result = $this->db->update('request_sparepart', $data);
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
		$kategori = trim($this->input->post("kategori"));
		$status = trim($this->input->post("status"));
		
		$data = array();
		$data['idatm'] = $idatm;
		$data['cabang'] = $cabang;
		$data['lokasi'] = $lokasi;
		$data['alamat'] = $alamat;
		$data['kategori'] = $kategori;
		$data['status'] = $status;
		$this->db->where("id", $id);
		$result = $this->db->update('request_sparepart', $data);
		
		if($result) {
			echo "<script>alert('SUCCESS');</script>";
		} else {
			echo "<script>alert('FAILED');</script>";
		}
		
		redirect('request_sparepart');
	}
	
	public function delete($id) {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$this->db->where('id', $id);
        $result = $this->db->delete('request_sparepart');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	} 
	
	/**
	 * Additional method
	 */
	public function get_data($merk) {
		$merk = urldecode($merk);
		$valid_columns = array(
            0=>'id',
            1=>'kode_part',
            2=>'nama_part',
            3=>'merk',
            4=>'part_no',
            5=>'stock',
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
		if($merk!=="0") {
			$this->db->where('merk', urldecode($merk));
		}
        $employees = $this->db->get("request_sparepart");
        $data = array();
		
		$no = 0;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'request_sparepart';
            $data[]= array(
                $no,
                $rows->kode_part,
                $rows->nama_part,
                $rows->merk,
                $rows->part_no,
                $rows->stock,
                number_format($rows->price, 0, ",", "."),
                '<a onclick="updateModal(
					\''.$rows->id.'\',
					\''.$rows->kode_part.'\',
					\''.$rows->nama_part.'\',
					\''.$rows->merk.'\',
					\''.$rows->part_no.'\',
					\''.$rows->stock.'\',
					\''.$rows->price.'\'
				)" class="btn btn-warning mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/edit.png"/>Edit</a>
                 <a onclick="deleteAction(\''.$url.'/delete/'.$rows->id.'\')" class="btn btn-danger mr-1"><img style="float: left; margin: 3px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/delete.png"/>Delete</a>'
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
		$query = $this->db->select("COUNT(*) as num")->get("request_sparepart");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}
