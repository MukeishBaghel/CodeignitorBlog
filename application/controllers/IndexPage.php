<?php
class IndexPage extends CI_Controller{
	public function index(){
		$this->load->library("session");
		$this->load->model('blogmodel');
		$data['categories'] = $this->blogmodel->getCategories();
		$this->load->view("index_view", $data);
	}
}
