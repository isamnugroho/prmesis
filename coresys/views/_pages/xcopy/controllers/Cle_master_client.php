<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cle_master_client extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	/**
	 * View method
	 */
	public function index() {	
		return view('pages/cle_master_client/index', $this->data);
	}
	
	public function add() {
		return view('pages/cle_master_client/add');
	}
	
	public function edit() {
		return view('pages/cle_master_client/edit');
	}
	
	/**
	 * Process method
	 */
	public function insert() {
		// echo "<pre>";
		// print_r();
		
		// echo "<pre>";
		// print_r($_REQUEST);
		// print_r($_FILES);
		
		$id = trim($this->input->post("id"));
		$client = trim($this->input->post("client"));
		$cabang = trim($this->input->post("cabang"));
		$alamat = trim($this->input->post("alamat"));
		$pic = trim($this->input->post("pic"));
		$kode_ticket = trim($this->input->post("kode_ticket"));
		$telp = trim($this->input->post("telp"));
		// $username = trim($this->input->post("username"));
		// $password = trim($this->input->post("password"));
		
		// if($id==null) {
			// echo "Add New Data";
		// } else {
			// echo "Update Data";
		// }
		
		$picture = $this->upload_picture($_FILES, $client);
		
		// echo "<pre>";
		// print_r($picture);
		// if(empty($picture)) {
			// echo "AAA";
		// } else {
			// echo "BBB";
		// }
		
		if($id==null) {
			
			$data['nama'] = $client;
			$data['cabang'] = $cabang;
			$data['alamat'] = $alamat;
			$data['pic'] = $pic;
			$data['kode_ticket'] = $kode_ticket;
			$data['telp'] = $telp;
			// $data['username'] = $username;
			// $data['password'] = $password;
			if(!empty($picture)) {
				$data['logo'] = json_encode($picture);
			} else {
				// $data['logo'] = '';
			}
			
			$this->db->where('nama', $client);
			// $this->db->like('nama', $client);
			$res = $this->db->get('cle_master_client');
			$num = $res->num_rows();
			
			if($num>0) {
				$result['status'] = 'exist';
			} else {
				$res = $this->db->insert('cle_master_client', $data);
				
				if($res) {
					$result['status'] = 'success';
					
					$this->logs_model->insert(array(
						'menu_access' 	=> 'cle_master_client',
						'user_id' 		=> $this->session->userdata('user_data')['id'], 
						'username' 		=> $this->session->userdata('user_data')['username'], 
						'ip_address' 	=> $this->input->ip_address(), 
						'accesstype' 	=> 'insert', // ('insert', 'modify', 'delete')
						'oldvalue' 		=> '', // ('modify', 'delete')
						'newvalue' 		=> json_encode($data), // ('modify')
						'type' 			=> 'info', // ('info','emergency','critical','alert','error','warning','notice','debug')
						'message' 		=> $result['status'],
					), true);
				} else {
					$result['status'] = 'failed';
					
					$this->logs_model->insert(array(
						'menu_access' 	=> 'cle_master_client',
						'user_id' 		=> $this->session->userdata('user_data')['id'], 
						'username' 		=> $this->session->userdata('user_data')['username'], 
						'ip_address' 	=> $this->input->ip_address(), 
						'accesstype' 	=> 'insert', // ('insert', 'modify', 'delete')
						'oldvalue' 		=> '', // ('modify', 'delete')
						'newvalue' 		=> json_encode($data), // ('modify')
						'type' 			=> 'error', // ('info','emergency','critical','alert','error','warning','notice','debug')
						'message' 		=> $result['status'],
					), true);
				}
			}
			echo json_encode($result);
			
		} else {
			
			$data['nama'] = $client;
			$data['cabang'] = $cabang;
			$data['alamat'] = $alamat;
			$data['pic'] = $pic;
			$data['kode_ticket'] = $kode_ticket;
			$data['telp'] = $telp;
			// $data['username'] = $username;
			// $data['password'] = $password;
			if(!empty($picture)) {
				$data['logo'] = json_encode($picture);	
			} else {
				// $data['logo'] = '';
			}
			
			// $this->db->where('nama', $client);
			$this->db->like('nama', $client);
			$res = $this->db->get('cle_master_client');
			$num = $res->num_rows();
			
			// if($num>0) {
				// $result['status'] = 'exist';
			// } else {
				$data_old = $query = $this->db->get_where('cle_master_client', array('id' => $id), 1, 0)->row();
				$this->db->where('id', $id);
				$res = $this->db->update('cle_master_client', $data);
				
				if($res) {
					$result['status'] = 'success';
					
					$this->logs_model->insert(array(
						'menu_access' 	=> 'cle_master_client',
						'user_id' 		=> $this->session->userdata('user_data')['id'], 
						'username' 		=> $this->session->userdata('user_data')['username'], 
						'ip_address' 	=> $this->input->ip_address(), 
						'accesstype' 	=> 'modify', // ('insert', 'modify', 'delete')
						'oldvalue' 		=> json_encode($data_old), // ('modify', 'delete')
						'newvalue' 		=> json_encode($data), // ('modify')
						'type' 			=> 'info', // ('info','emergency','critical','alert','error','warning','notice','debug')
						'message' 		=> $result['status'],
					), true);
				} else {
					$result['status'] = 'failed';
					
					$this->logs_model->insert(array(
						'menu_access' 	=> 'cle_master_client',
						'user_id' 		=> $this->session->userdata('user_data')['id'], 
						'username' 		=> $this->session->userdata('user_data')['username'], 
						'ip_address' 	=> $this->input->ip_address(), 
						'accesstype' 	=> 'modify', // ('insert', 'modify', 'delete')
						'oldvalue' 		=> json_encode($data_old), // ('modify', 'delete')
						'newvalue' 		=> json_encode($data), // ('modify')
						'type' 			=> 'error', // ('info','emergency','critical','alert','error','warning','notice','debug')
						'message' 		=> $result['status'],
					), true);
				}
			// }
			echo json_encode($result);

		}
	}
	
	public function upload_picture($picture, $client) {
		$errors= array();
		$url_file = array();
		if(isset($_FILES['logo'])) {
			if($_FILES['logo']['name']!=="") {
				$file_name 	= $_FILES['logo']['name'];
				$file_size 	= $_FILES['logo']['size'];
				$file_tmp 	= $_FILES['logo']['tmp_name'];
				$file_type	= $_FILES['logo']['type'];
				$file	= explode('.', strtolower($file_name));
				$file_ext	= end($file);
				
				$extensions= array("jpeg","jpg","png");
				
				if(in_array($file_ext,$extensions)=== false){
					$errors[]="extension not allowed.<br>";
				}
				
				if(empty($errors)==true){
					$file_name = "upload/foto_client/logo_".$client.".".$file_ext;
					// $url_file = base_url().$file_name;
					$url_file = array(
						"file_name"	=> reset($file).".".$file_ext,
						"full_name" => $file_name,
						"full_link" => base_url().$file_name
					);
					move_uploaded_file($file_tmp, $file_name);
					
					// print_r($url_file);
				} else {
					echo $errors[0];
				}
			}
			
			// $url_file = json_encode($url_file);
		}
		
		return $url_file;
	}
	
	public function update() {
		
	}
	
	public function delete($id) {
		$data_old = $this->db->get_where('cle_master_client', array('id' => $id), 1, 0)->row();
		$this->db->where('id', $id);
        $result = $this->db->delete('cle_master_client');
		
		if($result) {
			echo "SUCCESS";
			
			$this->logs_model->insert(array(
				'menu_access' 	=> 'cle_master_client',
				'user_id' 		=> $this->session->userdata('user_data')['id'], 
				'username' 		=> $this->session->userdata('user_data')['username'], 
				'ip_address' 	=> $this->input->ip_address(), 
				'accesstype' 	=> 'delete', // ('insert', 'modify', 'delete')
				'oldvalue' 		=> json_encode($data_old), // ('modify', 'delete')
				'newvalue' 		=> '', // ('modify')
				'type' 			=> 'info', // ('info','emergency','critical','alert','error','warning','notice','debug')
				'message' 		=> 'success',
			), true);
		} else {
			echo "FAILED";
			
			$this->logs_model->insert(array(
				'menu_access' 	=> 'cle_master_client',
				'user_id' 		=> $this->session->userdata('user_data')['id'], 
				'username' 		=> $this->session->userdata('user_data')['username'], 
				'ip_address' 	=> $this->input->ip_address(), 
				'accesstype' 	=> 'delete', // ('insert', 'modify', 'delete')
				'oldvalue' 		=> json_encode($data_old), // ('modify', 'delete')
				'newvalue' 		=> '', // ('modify')
				'type' 			=> 'info', // ('info','emergency','critical','alert','error','warning','notice','debug')
				'message' 		=> 'failed',
			), true);

		}
	} 
	
	/**
	 * Additional method
	 */
	public function get_data() {
		$valid_columns = array(
            0=>'id',
            1=>'nama',
            2=>'alamat',
            3=>'pic',
            4=>'username',
            5=>'password'
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
        $employees = $this->db->get("cle_master_client");
        $data = array();
		
		$no = $start;
		foreach($employees->result() as $rows) {
			$no++;
			$url = base_url().'cle_master_client';
			$url2 = base_url().'cle_master_client';
			
			$image = '';
			if($rows->logo!=="") {
				$image = '<center><img src="'.json_decode($rows->logo, true)['full_link'].'?'.time().'" style="margin: 0px 0px 0px 0px; height:30px; width:120px;"></center>'; 
			}
			
            $data[]= array(
                $no,
                $image,
                $rows->nama,
                $rows->cabang,
                $rows->alamat,
                $rows->pic,
                '<center><a onclick="updateModal(
					\''.$rows->id.'\',
					\''.$rows->nama.'\',
					\''.$rows->cabang.'\',
					\''.$rows->alamat.'\',
					\''.$rows->pic.'\',
					\''.$rows->username.'\',
					\''.$rows->password.'\',
					\''.$rows->kode_ticket.'\',
					\''.$rows->telp.'\'
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
		$query = $this->db->select("COUNT(*) as num")->get("cle_master_client");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}
