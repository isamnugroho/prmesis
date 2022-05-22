<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cro_master_cashreplenish_detail extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index() {	
		$this->data['id'] = $_REQUEST['id'];
		return view('pages/cro_master_cashreplenish_detail/index', $this->data);
	}
	
	public function add() {
		return view('pages/cro_master_cashreplenish_detail/add');
	}
	
	public function edit() {
		return view('pages/cro_master_cashreplenish_detail/edit');
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		echo "<pre>";
		print_r($_REQUEST);
		
		$id = trim($this->input->post("id"));
		$id_bank = trim($this->input->post("idatm"));
		$cst_1 = trim($this->input->post("cst_1"));
		$cst_1_val = trim($this->input->post("cst_1_val"));
		$cst_2 = trim($this->input->post("cst_2"));
		$cst_2_val = trim($this->input->post("cst_2_val"));
		$cst_3 = trim($this->input->post("cst_3"));
		$cst_3_val = trim($this->input->post("cst_3_val"));
		$cst_4 = trim($this->input->post("cst_4"));
		$cst_4_val = trim($this->input->post("cst_4_val"));
		
		$data['id_cashtransit'] = $id;
		$data['id_bank'] = $id_bank;
		$data['cassette_1'] = $cst_1.";".$cst_1_val;
		$data['cassette_2'] = $cst_2.";".$cst_2_val;
		$data['cassette_3'] = $cst_3.";".$cst_3_val;
		$data['cassette_4'] = $cst_4.";".$cst_4_val;
		$data['nominal'] = (($cst_1*1000)*$cst_1_val) + (($cst_2*1000)*$cst_2_val) + (($cst_3*1000)*$cst_3_val) + (($cst_4*1000)*$cst_4_val);
		
		$res = $this->db->insert('cro_master_cashreplenish_detail', $data);
			
		if($res) {
			$result['status'] = 'success';
		} else {
			$result['status'] = 'failed';
		}
		
		echo json_encode($result);
		// // else {
			// // $data['nama_client'] = $nama_client;
			// // $data['alamat'] = $alamat;
			// // $data['telepon'] = $telepon;
			
			// // $this->db->where('id', $id);
			// // $res = $this->db->update('cro_master_cashreplenish_detail', $data);
			
			// // if($res) {
				// // $result['status'] = 'success';
			// // } else {
				// // $result['status'] = 'failed';
			// // }
			
			// // echo json_encode($result);
		// // }
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('cro_master_cashreplenish_detail');
		
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
        $employees = $this->db->get("cro_master_cashreplenish_detail");
        $data = array();
		
		$no = $start;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'cro_master_cashreplenish_detail';
			$url2 = base_url().'cro_master_cashreplenish_detail';
			
			$image = '';
			if($rows->logo!=="") {
				$image = '<center><img src="'.json_decode($rows->logo, true)['full_link'].'?'.time().'" style="margin: 0px 0px 0px 0px; height:30px; width:120px;"></center>'; 
			}
			
            $data[]= array(
                $rows->id_bank,
                $rows->cassette_1,
                $rows->cassette_2,
                ($rows->cassette_3==";" ? "" : $rows->cassette_3),
                ($rows->cassette_4==";" ? "" : $rows->cassette_4),
                number_format($rows->nominal, 0, ",", "."),
                '<center><a onclick="updateModal(
					\''.$rows->id.'\',
					\''.$rows->run_number.'\',
					\''.$rows->date.'\',
					\''.$rows->action_date.'\'
				)" class="btn btn-warning btn-sm zoomsmall" style="background: linear-gradient(to bottom, #fe8c00, #f83600);border-radius: 4px;font-weight:bold;"><img style="float: left; margin: 1px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/edit.png"/>Detail</a>
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
		$query = $this->db->select("COUNT(*) as num")->get("cro_master_cashreplenish_detail");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}
