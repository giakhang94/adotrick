<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video_cate_map extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}
	public function tach_bang()
	{
		$dem = 0;
		$this->load->model('video_model');
		$video = $this->video_model->getVideo_tach_bang();
		$count = count($video);
		foreach ($video as $key => $value_video) {
			if(($value_video['category_id'] !== 0) OR ($value_video['category_id'] !== "")) {
				$this->load->model('video_cate_map_model');
				$res = $this->video_cate_map_model->insertID_map($value_video['id'], $value_video['category_id']);
				if($res){
					echo "done thêm id map";
				}else {
					echo "thêm ip map cate vs video chưa được";
				}
			}
			$dem = $dem+1;
		}
		if ($dem == $count) {
			$this->load->model('video_cate_map_model');
			if($this->video_cate_map_model->xoaColCateID()) {
				echo "xoa cot category_id thanh cong thù";
			}
			else { echo "xoa chua cột category_id chưa được";}
		}
	}

}

/* End of file video_cate_map.php */
/* Location: ./application/controllers/video_cate_map.php */