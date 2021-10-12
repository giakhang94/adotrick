<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		
	}
	public function getVideoById($id)
	{
		// $this->db->select('*');
		$this->db->where('id', $id);
		$res = $this->db->get('video');
		$res = $res->result_array();
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