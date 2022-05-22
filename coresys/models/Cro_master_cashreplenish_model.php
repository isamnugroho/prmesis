<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cro_master_cashreplenish_model extends CI_Model {
	public $table = 'cro_master_cashreplenish';
    public $id = 'id';
	
	function __construct() {
        parent::__construct();
    }
	
	// datatables
    function json() {
		$this->datatables->select('id, date, h_min, run_number, action_date, dibuat_oleh, status');
        $this->datatables->from($this->table);
		return $this->datatables->generate();
	}
	
	// get all
    function get_all() {}
	
	// get data by id
    function get_by_id($id) {}
	
	// insert data
    function insert($data) {
		$this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}