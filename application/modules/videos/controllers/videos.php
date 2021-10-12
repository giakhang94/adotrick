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

}

/* End of file  */
/* Location: ./application/controllers/ */