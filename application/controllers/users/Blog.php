<?php

class Blog extends CI_Controller{

	public function index(){
		echo "hello world";
	}
	// add article rout
	public function addArticle(){
		if($this->session->userdata('userid') == NULL){
			$this->session->set_flashdata('msg', 'Sorry! You Must Login First.');
			return redirect('authentication/login');
		}
		else{
			$categories['categories'] = $this->blogmodel->getCategories();
			$this->load->view('layout/adminHeader');
			$this->load->view('add-article-view', $categories);
		}
	}
	// process submited article data
	public function addArticleProcess(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'title','required',
		array('required' => 'You must provide a %s.')
		);
		$this->form_validation->set_rules('body', 'body','required',
		array('required' => 'You must provide a %s.')
		);
		if ($this->form_validation->run() == FALSE)
		{		
				$this->load->view('add-article-view');
		}
		else{	

				if(isset($_POST["draft"])){
					$data = array(
				'title' => $this->input->post('title'),
				'category_id' => $this->input->post('category'),
				'body' => $this->input->post('body'),
				'user_id' => $this->session->userdata('userid'),
				'status' => 'draft'
			);
				// print_r($data);
				if($this->blogmodel->saveArticle($data)){
					$this->session->set_flashdata('msg', 'Article saved in Drafts ');
					return redirect('authentication/dashboard');
				}else{
					$this->session->set_flashdata('msg', 'something went wrong! ');
					return redirect('users/blog/addarticle');
				}
				echo 'draft';
			}
			else{
				$data = array(
					'title' => $this->input->post('title'),
					'category_id' => $this->input->post('category'),
					'body' => $this->input->post('body'),
					'user_id' => $this->session->userdata('userid')
				);
				if($this->blogmodel->saveArticle($data)){
					$this->session->set_flashdata('msg', 'Article Pulished. ');
					return redirect('authentication/dashboard');
				}else{
					$this->session->set_flashdata('msg', 'something went wrong! ');
					return redirect('users/blog/addarticle');
				}
				echo 'published';
			}	
		}
	}

	// published rout for showing published articles
	public function published(){
		if($this->session->userdata('userid') == NULL ){
			$this->session->set_flashdata('msg', 'Sorry! You must login first');
			return redirect('user/login');
		}
		else{
			$data = $this->blogmodel->getPublishedArticlesForLoggedinUser();
			// echo '<pre>';
			// var_dump($data['published']);
			$this->load->view('dashboard-view' , $data);
		}		
	}


	// drafts rout for showing drafts articles
	public function drafts(){
		if($this->session->userdata('userid') == NULL ){
			$this->session->set_flashdata('msg', 'Sorry! You must login first');
			return redirect('authentication/login');
		}
		else{
			$data = $this->blogmodel->getDraftedArticlesForLoggedinUser();
			// echo '<pre>';
			// var_dump($data['published']);
			$this->load->view('dashboard-view' , $data);
		}		
	}

	// update article rout for to get and update the article
	public function updateArticle( $article_id ){
		if($this->session->userdata('userid') == NULL ){
			$this->session->set_flashdata('msg', 'Sorry! You must login first');
			return redirect('authentication/login');
		}
		else{
			$this->load->helper('form');
			$data['categories'] = $this->blogmodel->getCategories();
			$data['article'] = $this->blogmodel->getArticleToUpdate( $article_id );
			// echo '<pre>';
			// var_dump($data['article'][0]->title);
			$this->load->view('update-article-view' , $data);
		}			
	}

	// process submitted updated article
	public function updateArticleProcess(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'title','required',
		array('required' => 'You must provide a %s.')
		);
		$this->form_validation->set_rules('body', 'body','required',
		array('required' => 'You must provide a %s.')
		);
		if ($this->form_validation->run() == FALSE)
		{		
				$this->load->view('update-article-view');
		}else{

			if(isset($_POST['draft'])){
				$id = $this->input->post('article_id');
				$data['title'] = $this->input->post('title');
				$data['category_id'] = $this->input->post('category');
				$data['body'] = $this->input->post('body');
				$data['updated_at'] = date('Y-m-d h:i:s');
				$data['status'] = 'draft';
				$this->blogmodel->updateArticle($data, $id);
				$this->session->set_flashdata('msg', 'Article UPDATED sucessfully, Saved in Drafts.');
				return redirect('authentication/dashboard');
			}else{
				$id = $this->input->post('article_id');
				$data['title'] = $this->input->post('title');
				$data['category_id'] = $this->input->post('category');
				$data['body'] = $this->input->post('body');
				$data['updated_at'] = date('Y-m-d h:i:s');
				$this->blogmodel->updateArticle($data, $id);
				$this->session->set_flashdata('msg', 'Article UPDATED sucessfully');
				return redirect('authentication/dashboard');
			}
		}
	}

	// delete article rout 
	public function deleteArticle( $article_id ){
		if($this->session->userdata('userid') == NULL ){
			$this->session->set_flashdata('msg', 'Sorry! You must login first');
			return redirect('authentication/login');
		}
		else{
			$this->blogmodel->deleteArticle($article_id);
			$this->session->set_flashdata('msg', 'Article DELETED sucessfully');
			return redirect('authentication/dashboard');
		}			
	}

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->model('blogmodel');
	}
}
