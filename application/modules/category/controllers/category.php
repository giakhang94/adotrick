<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}
	
	public function listCategory($page=0) //tiến hành đổ data ra page theo số trang trên pagination
	{
		$this->load->model('category_model');
		$data = $this->category_model->getCategory($page);
		//lấy ra tổng số trang
		$page_number = $this->category_model->getPageNumber();
		$pagi['pages'] = $page_number;
		$pagi['active-page'] = $page;
		//truyền tổng số trang ra view để dùng for tạo pagination
		$data = array ('data_cat'=>$data,'pagi'=>$pagi);
		$this->load->view('listCategory_userside', $data, FALSE);
	}

}

/* End of file category.php */
/* Location: ./application/controllers/category.php */