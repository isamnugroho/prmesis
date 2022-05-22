<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_location extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index() {	
		return view('pages/master_location/index', $this->data);
	}
	
	public function add() {
		return view('pages/master_location/add');
	}
	
	public function edit() {
		return view('pages/master_location/edit');
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		// echo "<pre>";
		// print_r();
		
		$id = trim($this->input->post("id"));
		$name = trim($this->input->post("name"));
		
		if($id==null) {
			$data['name'] = $name;
			
			$this->db->where('name', $name);
			$res = $this->db->get('master_location');
			$num = $res->num_rows();
			
			if($num>0) {
				$result['status'] = 'exist';
			} else {
				$res = $this->db->insert('master_location', $data);
				
				if($res) {
					$result['status'] = 'success';
				} else {
					$result['status'] = 'failed';
				}
			}
			echo json_encode($result);
		} else {
			$data['name'] = $name;
			
			$this->db->where('name', $name);
			$res = $this->db->get('master_location');
			$num = $res->num_rows();
			
			if($num>0) {
				$result['status'] = 'exist';
			} else {
				$this->db->where('id', $id);
				$res = $this->db->update('master_location', $data);
				
				if($res) {
					$result['status'] = 'success';
				} else {
					$result['status'] = 'failed';
				}
			}
			echo json_encode($result);
		}
	}
	
	public function update() {
		
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
        $result = $this->db->delete('master_location');
		
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
        $employees = $this->db->get("master_location");
        $data = array();
		
		$no = $start;
		foreach($employees->result() as $rows) {
			$count = function($id) {
				$res = $this->db->query("SELECT * FROM master_location_detail WHERE id_lokasi='".$id."'");
				
				return $res->num_rows();
			};
			$cse = function($id) {
				$res = $this->db->query("SELECT * FROM trans_schedule 
											LEFT JOIN master_location ON (trans_schedule.id_lokasi=master_location.id) 
											LEFT JOIN master_staff ON (master_staff.id=trans_schedule.id_petugas) WHERE trans_schedule.id_lokasi='".$id."'")->row();
				
				return $res->nama;
			};
			
			$no++;
			$url = base_url().'master_location';
			$url2 = 'master_location_detail/index';
			$url3 = 'master_require_part/index';
            $data[]= array(
                $no,
                $rows->name,
                $count($rows->id),
                $cse($rows->id),
                // $rows->username,
                // str_repeat("*", strlen($rows->password)),
                '<center>
				<a href="'.$url2.'/'.$rows->id.'" class="btn btn-warning btn-sm zoomsmall" style="background: linear-gradient(to top, #44a08d, #093637);border-radius: 4px;font-weight:bold;"><img style="float: left; margin: 1px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/whiteloc.png"/>Detail Area</a>
				<a href="'.$url3.'/'.$rows->id.'" class="btn btn-warning btn-sm zoomsmall" style="background: linear-gradient(to bottom, #606c88, #3f4c6b);"><img style="float: left; margin: 4px 5px 0px 0px; height:15px; width:15px; " src="'.base_url().'seipkon/assets/img/folset.png"/>Kebutuhan Sparepart</a>
				<a onclick="updateModal(
					\''.$rows->id.'\',
					\''.$rows->name.'\'
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
		$query = $this->db->select("COUNT(*) as num")->get("master_location");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}
