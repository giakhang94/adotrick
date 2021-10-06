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
	public function updateThumbNameCat($id, $new_name, $old_path, $new_path,$target)
	{
		rename($old_path, $new_path);
		$object = array ('cat_thumb'=>$new_name);
		$this->db->select('*');
		$this->db->where('id', $id);
		$res = $this->db->update('video_categories', $object);
		if($res){
			copy($new_path, $target);
			unlink($new_path);
		}
		return $res;
	}
	public function insertCategory_model($cat_name, $thumb, $public_flag, $delete_flag, $create_date, $update_date)
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$object = array (
			'cat_name'=>$cat_name,
			'cat_thumb'=>$thumb,
			'public_flag'=>$public_flag,
			'delete_flag'=>$delete_flag,
			'create_date'=>$create_date,
			'update_date'=>$update_date,
		);
		$this->db->select('*');
		$this->db->insert('video_categories', $object);
		return $this->db->insert_id();
	}
	public function updateCategory($id,$cat_name, $thumb, $public_flag, $delete_flag, $create_date, $update_date)
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$object = array (
			'cat_name'=>$cat_name,
			'cat_thumb'=>$thumb,
			'public_flag'=>$public_flag,
			'delete_flag'=>$delete_flag,
			'create_date'=>$create_date,
			'update_date'=>$update_date,
		);
		$this->db->select('*');
		$this->db->where('id', $id);
		return $this->db->update('video_categories', $object);
	}
	public function getCategory()
	{
		$limit = 2;
		$offset = 0; //lấy ra 2 phần tử, từ vị trí 0; tạm thời để vậy sẽ xử lý tiếp
		$this->db->select('*');
		$this->db->where('delete_flag', '0');
		$res = $this->db->get('video_categories', $limit, $offset);
		$res = $res->result_array();
		return $res;
	}

}

/* End of file category_model.php */
/* Location: ./application/models/category_model.php */