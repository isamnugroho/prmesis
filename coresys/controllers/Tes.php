<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends MY_Controller {
	var $data = array();
	public function __construct() {
        parent::__construct();
		$this->data['that'] = $this;
	}
	
	public function index()
	{	
		return view('tes', $this->data);
	}
}