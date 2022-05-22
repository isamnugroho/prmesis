<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

class Cro_master_absen_location extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */	
	public function index() {
		$this->data['absen_location'] = $this->db->get('cro_master_absen_location')->result();
		
		$location = $this->db->query("SELECT * FROM master_location WHERE id NOT IN (SELECT id_lokasi FROM cro_master_absen_location)")->result();
		$location_edit = $this->db->query("SELECT * FROM master_location")->result();
		$this->data['location'] = $location;
		$this->data['location_edit'] = $location_edit;
		
		return view('pages/cro_master_absen_location/index', $this->data);
	}
	
	public function add() {
	}
	
	public function edit($id) {
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		$id = trim($this->input->post("id"));
		$id_lokasi = trim($this->input->post("lokasi"));
		$lokasi = $this->db->query("SELECT * FROM master_location WHERE id='$id_lokasi'")->row()->name;
		$latlng = trim($this->input->post("latlng"));
		$radius = trim($this->input->post("radius"));
		$keterangan = trim($this->input->post("keterangan"));
		
		$data = array();
		if($id==null){
			$data['id_lokasi'] = $id_lokasi;
			$data['lokasi'] = $lokasi;
			$data['latlng'] = $latlng;
			$data['radius'] = $radius;
			$data['keterangan'] = $keterangan;
			$result = $this->db->insert('cro_master_absen_location', $data);
		} else {
			$data['lokasi'] = $lokasi;
			$data['latlng'] = str_replace('lat', '"lat"', str_replace('lng', '"lng"', $latlng));
			$data['radius'] = $radius;
			$data['keterangan'] = $keterangan;
			$this->db->where('id', $id);
			$result = $this->db->update('cro_master_absen_location', $data);
		}
		
		if($result) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	
	public function update() {
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('cro_master_absen_location');
		
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAILED";
		}
	} 
	
	/**
	 * Additional method
	 */
	public function get_data() {
		$valid_columns = array(
            0=>'id',
            1=>'lokasi',
            2=>'latlng',
            3=>'keterangan'
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
        $employees = $this->db->get("cro_master_absen_location");
        $data = array();
		
		$no = 0;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'cro_master_absen_location';
            $data[]= array(
                $no,
                $rows->lokasi,
                $rows->latlng,
                $rows->radius,
                $rows->keterangan,
                '<center><a onclick="updateModal(
					\''.$rows->id.'\',
					\''.$rows->id_lokasi.'\',
					\'{lat:'.json_decode($rows->latlng)->lat.', lng:'.json_decode($rows->latlng)->lng.'}\',
					\''.$rows->keterangan.'\',
					\''.$rows->radius.'\',
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
		$query = $this->db->select("COUNT(*) as num")->get("cro_master_absen_location");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}