<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cro_master_item extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index() {	
		return view('pages/cro_master_item/index', $this->data);
	}
	
	public function add() {
		return view('pages/cro_master_item/add');
	}
	
	public function edit() {
		return view('pages/cro_master_item/edit');
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		// echo "<pre>";
		// print_r();
		
		$name = trim($this->input->post("name"));
		
		$data['name'] = $name;
		
		$this->db->where('name', $name);
		$res = $this->db->get('cro_master_item');
		$num = $res->num_rows();
		
		if($num>0) {
			$result['status'] = 'exist';
		} else {
			$res = $this->db->insert('cro_master_item', $data);
			
			if($res) {
				$result['status'] = 'success';
			} else {
				$result['status'] = 'failed';
			}
		}
		echo json_encode($result);
	}
	
	public function update() {
		
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('cro_master_item');
		
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
            1=>'name'
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
        $employees = $this->db->get("cro_master_item");
        $data = array();
		
		$no = $start;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'cro_master_item';
			$url2 = 'cro_master_item_detail/index';
            $data[]= array(
                $no,
                $rows->name,
                // $rows->username,
                // str_repeat("*", strlen($rows->password)),
                '<center>
				<a href="'.$url2.'/'.$rows->id.'" class="btn btn-warning btn-sm zoomsmall" style="background: linear-gradient(to top, #44a08d, #093637);border-radius: 4px;font-weight:bold;"><img style="float: left; margin: 1px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/whiteloc.png"/>Detail</a>
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
		$query = $this->db->select("COUNT(*) as num")->get("cro_master_item");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}
