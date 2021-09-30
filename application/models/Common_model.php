<?php

class Common_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function getAllTest()
	{
		$select = 'id, name';
		$where = array(
			'delete_flag' => 0,
			'public_flag' => 1
		);
		$order_by = 'id DESC';


		$this->db->select($select);
		$this->db->where($where);
		$this->db->order_by($order_by);

		$query = $this->db->get('test');

		return $query->result_array();
	}
}
