<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getCatById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$res = $this->db->get('video_categories');
		$res = $res->result_array();
		return $res;
	}
	
	
	public function getCategory($page)
	{
		$limit = 2; 
		if($page == 0){
			$page = 1;
		}
		$offset = ($page-1)*$limit;
		$this->db->select('*');
		$this->db->where('delete_flag', '0');
		$res = $this->db->get('video_categories', $limit, $offset);
		$res = $res->result_array();
		return $res;
	}
	//tính tổng số trang cần có theo limit (hiên tại là 2)
	public function getPageNumber()
	{
		$limit = 2;
		$this->db->select('*');
		$res = $this->db->get('video_categories');
		$res = $res->result_array();
		$total_rows = count($res);
		$total_page = ceil($total_rows/$limit);
		return $total_page;
	}


}

/* End of file category_model.php */
/* Location: ./application/models/category_model.php */