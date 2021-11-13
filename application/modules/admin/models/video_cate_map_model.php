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
		echo "xoá bằng tay đi thàn";
	}
	public function getMap_cateID()
	{
		$this->db->select('video_category_map.category_id as cate_id');
		$res = $this->db->get('video_category_map');
		$res = $res->result_array();
		return $res;
	}
	public function getMapByVideoId($id)
	{
		$this->db->select('video_category_map.category_id as cate_id');
		$this->db->where('video_category_map.video_id', $id);
		$res = $this->db->get('video_category_map');
		$res = $res->result_array();
		return $res;
	}
	public function insertmap($cate_id, $video_id)
	 {
	 	$this->load->helper('url');
	 	$dem  = 0;
	 	foreach ($cate_id as $key => $value) {
	 		$object = array ('category_id'=>$value, 'video_id'=>$video_id);
	 		$this->db->insert('video_category_map', $object);
	 		$dem = $dem + 1;
	 	}
	 	if($dem == count($cate_id)){
	 		header("location: ".base_url()."videos/listVideo");
	 		return 1;
	 	} else {echo "insert map k thanh cong";	}
	 } 
	public function delMap($del, $id)
	{
		$this->load->helper('url');
		$this->db->select('*');
		$this->db->where_in('video_category_map.category_id', $del);
		$this->db->where('video_category_map.video_id', $id);
		$res = $this->db->delete('video_category_map');
		if($res){
			echo "del category map thành công từ model";
	 		header("location: ".base_url()."videos/listVideo");

		}
		else {echo "del đéll thành cồng từ modal rồi mày ạ (del cate map)";}
	}
}

/* End of file video_cate_map_model.php */
/* Location: ./application/models/video_cate_map_model.php */