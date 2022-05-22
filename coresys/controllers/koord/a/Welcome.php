<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Medoo\Medoo;

class Welcome extends MY_Controller {

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
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function tes() {
		$database = new Medoo([
			'type' => 'sqlite',
			'database' => 'data/data_report/data.sqlite'
		]);
		
		// print_r($database);
		
		// $data = $database->select('trans_clean', '*');
		// echo "<pre>";
		// print_r($data);
		
		$database->delete("daily_report", ['id[>]' => 0]);
		// $database->delete("trans_clean", ['id[>]' => 0]);
		// $database->delete("trans_clean_detail", ['id[>]' => 0]);
		// $database->delete("trans_clean", ['id' => null]);
		// $database->delete("trans_clean_detail", ['id' => null]);
	}
}
