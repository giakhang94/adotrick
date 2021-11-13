<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		
	}
	public function getCategory()
	{

		$this->db->select('*');
		$this->db->where('delete_flag', '0');
		$res = $this->db->get('video_categories');
		$res = $res->result_array();
		return $res;
	}
	public function insertVideo_model($title, $des, $time, $comment, $type, $link, $thumb)
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$object = array (
			'title'=>$title,
			'description'=>$des,
			'time'=>$time,
			'comment'=>$comment,
			'type'=>$type,
			'link'=>$link,
			'thumb'=>$thumb
		);
		$this->db->select('*');
		$this->db->insert('video', $object);
		return $this->db->insert_id();
	}
	public function getVideoById2($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$res = $this->db->get('video');
		$res = $res->result_array();
		return $res;
	}
	public function getVideoById($id)
	{
		$this->db->select('*');
		$this->db->where('video.id', $id);
		$res_video = $this->db->get('video');
		$res_video = $res_video->result_array();
		$this->db->select('video.id as video_id,video_category_map.category_id as cate_id, video_categories.cat_name as cate_name');
		$this->db->join('video_category_map', 'video_category_map.video_id = video.id', 'left');
		$this->db->join('video_categories', 'video_categories.id = video_category_map.category_id', 'left');
		$this->db->where('video.id', $id);
		$res_map = $this->db->get('video');
		$res_map = $res_map->result_array();
		foreach ($res_video as $key => $value_video) {
			foreach ($res_map as $key => $value_map) {
				if ($value_video['id'] == $value_map['video_id']){
					$res_video[0]['cate_array'][] = $value_map;
				}
			}
		}
		return $res_video;
	}
	public function updateVideo($id,$title, $des, $time, $comment, $type,  $link, $thumb)
	{
		$object = array (
			'title'=>$title,
			'description'=>$des,
			'time'=>$time,
			'comment'=>$comment,
			'type'=>$type,
			'link'=>$link,
			'thumb'=>$thumb
		);
		$this->db->select('*');
		$this->db->where('id', $id);
		return $this->db->update('video', $object);
	}
	public function updateThumbName($id, $new_name, $old_path, $new_path,$target)
	{
		rename($old_path, $new_path);
		$object = array ('thumb'=>$new_name);
		$this->db->select('*');
		$this->db->where('id', $id);
		$res = $this->db->update('video', $object);
		if($res){
			copy($new_path, $target);
			unlink($new_path);
		}
		return $res;
	}
	public function getPageNumber_admin()
	{
		$limit = 2;//sau này sẽ xử lý bỏ input vào trước thầy phế
		$this->db->select('*');
		$res = $this->db->get('video');
		$res = $res->result_array();
		$total_rows = count($res);
		$page_number = ceil($total_rows/$limit);
		return $page_number;
	}
	public function getPagePagi_admin($page)
	{
		$limit = 2;
		if ($page == 0){
			$page = 1;
		}
		$offset = ($page - 1)*$limit;
		// $this->db->select('*');
		$this->db->select('video.*, video_categories.cat_name as Wanbi_saca, video_categories.id as cate_id');
		$this->db->join('video_category_map', 'video_category_map.category_id = video_categories.id', 'left');
		$this->db->join('video', 'video.id = video_category_map.video_id', 'left');
		$res = $this->db->get('video_categories', $limit, $offset);
		$res = $res->result_array();;
		return $res;
	}
	public function getVideobyCatID($catID)
	{
		$this->db->select('video.*,video_categories.id as cate_id, video_category_map.video_id as map_video_id, video_category_map.category_id as map_cate_id');
		$this->db->join('video_category_map', 'video_category_map.category_id = video_categories.id', 'left');
		$this->db->join('video', 'video.id = video_category_map.video_id', 'left');
		$this->db->where('video_categories.id', $catID);
		$res = $this->db->get('video_categories');
		$res = $res->result_array();
		return $res;
	}
	public function getVideo_tach_bang()
	{
		$this->db->select('*');
		$res = $this->db->get('video');
		$res = $res->result_array();
		return $res;
	}
	public function getVideoCatMapById($id)
	{
		$this->db->select('video.id as video_id, video_categories.id as cate_id, video_category_map.video_id as map_video_id, video_category_map.category_id as map_cate_id, video_categories.*');
		$this->db->join('video_category_map', 'video_category_map.video_id = video.id', 'left');
		$this->db->join('video_categories', 'video_categories.id = video_category_map.category_id', 'left');
		$this->db->where('video.id', $id);
		$res = $this->db->get('video');
		$res = $res->result_array();
		return $res;
	}
}

/* End of file video_model.php */
/* Location: ./application/models/video_model.php */