<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Videos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('homepage_view');
	}
	public function listVideo2()
	{
		$this->load->model('video_model');
		$data = $this->video_model->getVideo();
		$total_pages = $this->video_model->getVideo_pagination();
		$pagination['pages']=$total_pages;
		$data = array ('data_video'=>$data, 'pagi'=>$pagination);
		$this->load->view('videoList_view', $data, FALSE);
	}
	public function test()
	{
		$this->load->model('video_model');
		$data = $this->video_model->getVideo();
		$data = array ('data_video'=>$data);
		$this->load->view('videoList_backup_view', $data, FALSE);
	}
	public function listVideo($page=0)
	{
		if($page == 0){
			$page = 1;
		}
		$this->load->model('video_model');
		$data= $this->video_model->getVideoPage($page);
		$total_pages = $this->video_model->getVideo_pagination();
		$pagination['pages']=$total_pages;
		$pagination['active-page'] = $page;
		$data = array ('data_video'=>$data, 'pagi'=>$pagination);
		$this->load->view('videoList_view', $data, FALSE);
	}
	public function listVideoByCat($id = 0)
	{
		if(($id == 0)&&(!$this->input->post())) {
			$this->load->model('video_model');
			$data = $this->video_model->getCategory();
			$data_video = array (
				'id'=>"",
				'title'=>"",
				'category_id'=>"",
				'link'=>"",
				'thumb'=>"",
				'time'=>"",
				'description'=>"",
				'type'=>"",
				'comment'=>""
			);
			$error = "Chọn ID rồi nhấn nút Gửi giùm tao mày ơi";
			$signal = 1;
			$data_video = array (0=>$data_video);
			$data = array ('data_cat'=>$data, 'data_video'=>$data_video, "error"=>$error,"signal"=>$signal);
			$this->load->view('videoListByCat_user', $data, FALSE);

		}
		else  {
			$signal = 2;
			//lay ra category_id
			$catID = ($id !== 0)?$id:$this->input->post('category');
			// $catID = $id;
			$count = 0;
			$error = "";
			$this->load->model('video_model');
			$data_cat = $this->video_model->getCategory();
			foreach ($data_cat as $key => $value) {
				if ($value['id'] == $catID){
					$count = $count + 1;
				}
			}
			if ($count == 0) {
				$error = "Lỗi: Chưa có id này hoặc mày đã delete nó rồi mày ạ";
			}
			//lay ra video
			$this->load->model('video_model');
			$data_video = $this->video_model->getVideoByCat($catID);
			$data = array('data_cat'=>$data_cat, 'data_video'=>$data_video,'error'=>$error,"signal"=>$signal);
			$this->load->view('videoListByCat_user', $data, FALSE);
		}
	}

}

/* End of file  */
/* Location: ./application/controllers/ */