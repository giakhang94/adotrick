<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
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

	public function listCategory2($page=0) //tiến hành đổ data ra page theo số trang trên pagination
	{
		$this->load->model('category_model');
		$data = $this->category_model->getCategory($page);

		$total = $this->category_model->getTotalRows();
		//lấy ra tổng số trang
		//su dung thu vien quanbisaka
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'category/listCategory2/';
		$config['total_rows'] = $total;
		$config['per_page'] = 2;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['use_page_numbers'] = TRUE;
    	// $config['page_query_string'] = TRUE;
    	$config['query_string_segment'] = 'page';

        //html config
		$config['first_link']      = '&laquo; First';
		$config['first_tag_open']  = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link']       = 'Last &raquo;';
		$config['last_tag_open']   = '<li>';
		$config['last_tag_close']  = '</li>';

		$config['full_tag_open']  = '<nav aria-label="Page navigation" class=""><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';
		$config['cur_tag_open']   = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']  = '</a></li>';

		$config['num_tag_open']   = '<li>';
		$config['num_tag_close']  = '</li>';

		$config['next_link']      = 'Next';
		$config['next_tag_open']  = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link']      = 'Back';
		$config['prev_tag_open']  = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		//truyền tổng số trang ra view để dùng for tạo pagination
		$data = array ('data_cat'=>$data, 'pagi_config' => $config);
		$this->load->view('listCategory_view_pagi_thuvien', $data, FALSE);
		// echo $this->pagination->create_links();

	}

}

/* End of file category.php */
/* Location: ./application/controllers/category.php */