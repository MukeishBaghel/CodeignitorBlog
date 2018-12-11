<?php
class Blog extends CI_Controller{
	public function index(){
		$data['categories'] = $this->blogmodel->getCategories();
		$data['articles'] = $this->blogmodel->getArticles();
		$this->load->view('layout/header', $data);
		$this->load->view("blog_view", $data);
	}
	
	public function article( $article_id ){
		$data['article'] = $this->blogmodel->getArticleById($article_id);
		$data['categories'] = $this->blogmodel->getCategories();
		$this->load->view('layout/header', $data);
		$this->load->view("article_view", $data);
	}
	// add article rout
	
	public function category($category){
		$data['articles'] = $this->blogmodel->getArticlesByCategory($category);
		$data['categories'] = $this->blogmodel->getCategories();
		$this->load->view('layout/header', $data);
		$this->load->view('single_category_view', $data);
	}

	// constructor
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->model('blogmodel');
	}
}
