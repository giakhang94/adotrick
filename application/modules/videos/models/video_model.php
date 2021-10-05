<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		
	}
	public function insertVideo_model($title, $des, $time, $comment, $type, $category, $link, $thumb)
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$object = array (
			'title'=>$title,
			'description'=>$des,
			'time'=>$time,
			'comment'=>$comment,
			'type'=>$type,
			'category_id'=>$category,
			'link'=>$link,
			'thumb'=>$thumb
		);
		$this->db->select('*');
		$this->db->insert('video', $object);
		return $this->db->insert_id();
	}
	public function getVideoById($id)
	{
		// $this->db->select('*');
		$this->db->where('id', $id);
		$res = $this->db->get('video');
		$res = $res->result_array();
		return $res;
	}
	public function updateVideo($id,$title, $des, $time, $comment, $type, $category, $link, $thumb)
	{
		$object = array (
			'title'=>$title,
			'description'=>$des,
			'time'=>$time,
			'comment'=>$comment,
			'type'=>$type,
			'category_id'=>$category,
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
	public function getVideo()
	{
		$this->db->select('*');
		$res = $this->db->get('video',2,0);
		$res = $res->result_array();
		return $res;
	}	
	public function getVideo_pagination()
	{
		$this->db->select('*');
		$res = $this->db->get('video');
		$res = $res->result_array();
		$total_rows = count($res);
		$row_number = 2;
		$total_pages =  round($total_rows/$row_number);
		return $total_pages;
	}
	public function getVideoPage($page)
	{
		$limit = 2;
		if($page == 1) {
			$offset = 0;
		}else {
			$offset = ($page-1)*2;	
		}
		$this->db->select('*');
		$res = $this->db->get('video', $limit, $offset);
		$res = $res->result_array();
		return $res;
	}
	public function getCategory()
	{
		$this->db->select('*');
		$res = $this->db->get('video_categories');
		$res = $res->result_array();
		return $res;
	}
}

/* End of file video_model.php */
/* Location: ./application/models/video_model.php */