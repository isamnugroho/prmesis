<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->library('session');
		
		
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		if($this->session->userdata('user_data')) {
			redirect('dashboard');
		}
		
		return view('pages/login');
	}
	
	public function logout() {
		$username = $this->session->userdata('user_data')['username'];
		$this->db->where('username', $username);
		$res = $this->db->update('master_user', array('token' => null));
		
		if($res) {
			$this->session->sess_destroy();
			redirect('');
		}
	}
	
	public function proses() {
		// echo "<pre>";
		// print_r($_REQUEST);
		
		$this->db->select('*, master_user.id as ids');
		$this->db->where("username", $_REQUEST['username']);
		// $this->db->like('username', $_REQUEST['username']);
		$this->db->join('master_staff', 'master_staff.nik = master_user.username', 'left'); 
		$row = $this->db->get('master_user');
		$num = $row->num_rows();
		$res = $row->row();
		
		if($num>0) {
			$hash = $res->password;

			if (password_verify($_REQUEST['password'], $hash)) {
				$this->db->where('username', $res->username);
				$this->db->update('master_user', array('token' => $_REQUEST['token']));
				
				$session['id'] = $res->ids;
				$session['name'] = $res->nama;
				$session['username'] = $res->username;
				$session['level'] = $res->level;
				$session['token'] = $res->token;
				$this->session->set_userdata(array("user_data"=>$session));
				
				echo 'Password is valid!';
			} else {
				echo 'Invalid password.';
			}
		} else {
			echo 'Username not found.';
		}
	}
}
