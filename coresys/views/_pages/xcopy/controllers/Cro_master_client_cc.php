<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cro_master_client_cc extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index() {	
		return view('pages/cro_master_client_cc/index', $this->data);
	}
	
	public function add() {
		return view('pages/cro_master_client_cc/add');
	}
	
	public function edit() {
		return view('pages/cro_master_client_cc/edit');
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$id = trim($this->input->post("id"));
		$nama_client = trim($this->input->post("nama_client"));
		$alamat = trim($this->input->post("alamat"));
		$telepon = trim($this->input->post("telepon"));
		
		if($id==null) {
			$data['nama_client'] = $nama_client;
			$data['alamat'] = $alamat;
			$data['telepon'] = $telepon;
			
			$this->db->where('nama_client', $nama_client);
			$res = $this->db->get('cro_master_client_cc');
			$num = $res->num_rows();
			
			if($num>0) {
				$result['status'] = 'exist';
			} else {
				$res = $this->db->insert('cro_master_client_cc', $data);
				
				if($res) {
					$result['status'] = 'success';
				} else {
					$result['status'] = 'failed';
				}
			}
			
			echo json_encode($result);
		} else {
			$data['nama_client'] = $nama_client;
			$data['alamat'] = $alamat;
			$data['telepon'] = $telepon;
			
			$this->db->where('id', $id);
			$res = $this->db->update('cro_master_client_cc', $data);
			
			if($res) {
				$result['status'] = 'success';
			} else {
				$result['status'] = 'failed';
			}
			
			echo json_encode($result);
		}
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('cro_master_client_cc');
		
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
            1=>'nama_client',
            2=>'alamat',
            3=>'telepon'
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
        $employees = $this->db->get("cro_master_client_cc");
        $data = array();
		
		$no = $start;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'cro_master_client_cc';
			$url2 = base_url().'cro_master_client_cc';
			
			$image = '';
			if($rows->logo!=="") {
				$image = '<center><img src="'.json_decode($rows->logo, true)['full_link'].'?'.time().'" style="margin: 0px 0px 0px 0px; height:30px; width:120px;"></center>'; 
			}
			
            $data[]= array(
                $no,
                $rows->nama_client,
                $rows->alamat,
                $rows->telepon,
                '<center><a onclick="updateModal(
					\''.$rows->id.'\',
					\''.$rows->nama_client.'\',
					\''.$rows->alamat.'\',
					\''.$rows->telepon.'\'
				)" class="btn btn-warning btn-sm zoomsmall" style="background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;"><img style="float: left; margin: 1px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/edit.png"/>Edit</a>
                 <a onclick="deleteAction2(\''.$url.'/delete/'.$rows->id.'\')" class="btn btn-danger btn-sm zoomsmall" style="background: linear-gradient(to top, #ed213a, #93291e);border-radius: 4px;font-weight:bold;"><img style="float: left; margin: 1px 5px 0px 0px; height:18px; width:18px; " src="'.base_url().'seipkon/assets/img/del.png"/>Delete</a></center>'
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
		$query = $this->db->select("COUNT(*) as num")->get("cro_master_client_cc");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}
