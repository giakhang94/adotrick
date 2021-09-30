<?php

class Test_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function getAllTest()
	{
		$select = 'id, name, public_flag, delete_flag';
		$where = array();
		$order_by = 'id ASC';


		$this->db->select($select);
		$this->db->where($where);
		$this->db->order_by($order_by);

		$query = $this->db->get('test');

		return $query->result_array();
	}
}
