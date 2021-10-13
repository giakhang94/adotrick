<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}
	public function addCategory($id = 0){
		if(!$this->input->post()){
			if($id == 0) {
				$data_video_value = array (
					'id'=>0,
					'cat_name'=>"",
					'cat_thumb'=>"",
					'public_flag'=>"",
					'delete_flag'=>"",
					'create_date'=>"",
					'update_date'=>"",
				);
				$data_video_value = array (0=>$data_video_value);

			}
			else {
				$this->load->model('category_model');
				$data_video_value = $this->category_model->getCatById($id);

			}

			$data = array ('video_value'=>$data_video_value);
			$this->load->view('category/addcategory_view', $data, FALSE);
		}else {
			if($id == 0){
				$cat_name = $this->input->post('cat_name');
				$public_flag = $this->input->post('public_flag');
				$delete_flag = $this->input->post('delete_flag');
				$create_date = date("Y/m/d");
				//làm cái upload thumbnail
				$config['upload_path'] = './uploads_temp/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '10000';
				$config['max_width']  = '102400';
				$config['max_height']  = '76800';
				$config['file_name'] = strval(time());
				$thumb = $config['file_name'];
				$target_folder = "./uploads/";
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload("cat_thumb")){
					$error = array('error' => $this->upload->display_errors());
							echo "<pre>";
							print_r($error);
							echo "</pre>";
							exit;
				}
				else{
					$data = array('upload_data' => $this->upload->data());
					echo "success";
					$file_ext = $data['upload_data']['file_ext'];
					//gọi model insert data vào DB

					$this->load->model('category_model');
					$update_date = date("Y/m/d");
					$id_thumb = $this->category_model->insertCategory_model($cat_name, $thumb, $public_flag, $delete_flag, $create_date, $update_date);
					if ($id_thumb){
						$new_thumb_name = strval($id_thumb)."_".strval($thumb).$file_ext;
						$old_path = $config['upload_path'].$thumb.$file_ext;
						$new_target = $target_folder.$new_thumb_name;
						$new_path = $config['upload_path'].$new_thumb_name;
						$this->load->model('category_model');
						$res = $this->category_model->updateThumbNameCat($id_thumb, $new_thumb_name, $old_path, $new_path,$new_target);
						if($res){
							header("Location: ".base_url()."Category/listCategory");
						}
						else {
							header("location ".base_url()."videos/loi-insert_view");
						}
					} else {
						header("location ".base_url()."videos/loi-insert_view");
					}
				}
			}else {
				$cat_name = $this->input->post('cat_name');
				$public_flag = $this->input->post('public_flag');
				$delete_flag = $this->input->post('delete_flag');
				$update_date = date("Y/m/d");
				//làm cái upload thumbnail
				$config['upload_path'] = './uploads_temp/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '10000';
				$config['max_width']  = '102400';
				$config['max_height']  = '76800';
				$config['file_name'] = strval(time());
				$thumb = $config['file_name'];
				$target_folder = "./uploads/";
				$this->load->model('category_model');
				$cat_by_id = $this->category_model->getCatById($id);
				$create_date = $cat_by_id[0]['create_date'];
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload("cat_thumb")){
					$error = array('error' => $this->upload->display_errors());
					$thumb_old = $this->input->post('cat_thumb_old');
					$this->load->model('category_model');
					if($this->category_model->updateCategory($id, $cat_name, $thumb_old, $public_flag, $delete_flag, $create_date, $update_date))
					{
						header("Location: ".base_url()."category/listCategory");

					}else {
						header("location ".base_url()."videos/loi-insert_view");

					}
				}
				else{
					$data = array('upload_data' => $this->upload->data());
					echo "success";
					$file_ext = $data['upload_data']['file_ext'];
					//gọi model insert data vào DB
					$this->load->model('category_model');
					if($this->category_model->updateCategory($id, $cat_name, $thumb, $public_flag, $delete_flag, $create_date, $update_date))
					{
						$new_thumb_name = strval($id)."_".strval($thumb).$file_ext;
						$old_path = $config['upload_path'].$thumb.$file_ext;
						$new_path = $config['upload_path'].$new_thumb_name;
						$new_target = $target_folder.$new_thumb_name;
						$this->load->model('category_model');
						$res = $this->category_model->updateThumbNameCat($id, $new_thumb_name, $old_path, $new_path,$new_target);
						if($res){
							header("Location: ".base_url()."category/listCategory");
						}
						else {
							header("location ".base_url()."videos/loi-insert_view");
						}
					} else {
						header("location ".base_url()."videos/loi-insert_view");
					}

				}
			}
		}
	}
	public function listCategory($page=0) //tiến hành đổ data ra page theo số trang trên pagination
	{
		$this->load->model('category_model');
		$data = $this->category_model->getCategory($page);
		for ($i=0; $i < count($data) ; $i++) { 
			
			$id_temp = $this->category_model->getVideoByCat($data[$i]['cat_name']);
			$id[strval($data[$i]['id'])] = $id_temp;
		}
		//lấy ra tổng số trang
		$page_number = $this->category_model->getPageNumber();
		//truyền tổng số trang ra view để dùng for tạo pagination
		$data = array ('data_cat'=>$data,'page'=>$page_number,'video_id', 'cate'=>$id);

		$this->load->view('category/listCategory_view', $data, FALSE);
	}

}

/* End of file category.php */
/* Location: ./application/controllers/category.php */