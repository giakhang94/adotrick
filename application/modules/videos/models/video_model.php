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
		$res_video_list = $this->db->get('video', $limit, $offset);
		$res_video_list = $res_video_list->result_array();
		$this->db->select('video_categories.*,video_category_map.id as map_id,video_category_map.category_id as cate_id, video_category_map.video_id as video_id');
		$this->db->join('video_category_map', 'video_category_map.category_id = video_categories.id', 'left');
		foreach ($res_video_list as $key => $value_option) {
			$option[]=$value_option['id'];
		}
		$this->db->where_in('video_category_map.video_id', $option);
		$res_map = $this->db->get('video_categories');
		$res_map = $res_map->result_array();
		$dem = count($res_map); 
		for ($j = 0; $j < count($res_video_list); $j++) {
			for ($i=0; $i < $dem ; $i++) { 
				if($res_video_list[$j]['id'] == $res_map[$i]['video_id']) {
					$res_video_list[$j]['category'][] = $res_map[$i];
				}
    		}
		}
		return $res_video_list; //lát sửa lại sau chỗ return 1
	}
	public function getCategory()
	{
		$this->db->select('*');
		$res = $this->db->get('video_categories');
		$res = $res->result_array();
		return $res;
	}
	public function getVideoByCat($catID)
	{
		$this->db->select('video.*,video_categories.id as cate_id, video_category_map.video_id as map_video_id, video_category_map.category_id as map_cate_id');
		$this->db->join('video_category_map', 'video_category_map.category_id = video_categories.id', 'left');
		$this->db->join('video', 'video.id = video_category_map.video_id', 'left');
		$this->db->where('video_categories.id', $catID);
		$res = $this->db->get('video_categories');
		$res = $res->result_array();
		return $res;
	}
}

/* End of file video_model.php */
/* Location: ./application/models/video_model.php */