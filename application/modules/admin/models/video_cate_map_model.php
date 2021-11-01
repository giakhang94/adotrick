<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video_cate_map_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertId_map($id_video, $id_cate)
	{
		$object = array (
			'video_id'=> $id_video,
			'category_id'=> $id_cate
		);
		$this->db->select('*');
		$this->db->insert('video_category_map', $object);
		$res = $this->db->insert_id();
		return $res;
	}
	public function xoaColCateID($value='')
	{
		echo "xoá bằng tay đi thàn"
	}

}

/* End of file video_cate_map_model.php */
/* Location: ./application/models/video_cate_map_model.php */