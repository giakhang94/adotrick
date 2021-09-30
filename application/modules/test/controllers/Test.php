<?php
class Test extends CI_Controller
{
    public $data;
    public $position;

    function __construct()
    {
        parent::__construct();
        $this->load->model('test_model');
    }

    public function index()
    {
        $this->data['tests'] = $this->test_model->getAllTest();
        $this->load->view('test', $this->data);
    }
}
