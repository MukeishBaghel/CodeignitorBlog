<?php
	class Blogmodel extends CI_Model{
		public function saveArticle($data){
			return $this->db->insert('blog', $data);
		}

		public function getCategories(){
			$q = $this->db->select('id, name')->get('blog_categories');
			return $q->result();

		}

		public function getArticles(){
			$q = $this->db->select('blog.id as blog_id, blog.user_id as author_id, blog.title as blog_title, blog.body as blog_body, blog.created_at as blog_created_at, users.fullname as author, blog_categories.name as category')
							->from('blog')
							->join('users', 'users.id = blog.user_id')
							->join('blog_categories', 'blog_categories.id = blog.category_id')
							->where('blog.status','published')
							->get();
			$articles =  $q->result();
			// echo '<pre>';
			// var_dump($articles);
			return $articles;
		}

		public function getArticlesByCategory($category){
			$q = $this->db->select('blog.id as blog_id, blog.user_id as author_id, blog.title as blog_title, blog.body as blog_body, blog.created_at as blog_created_at, users.fullname as author, blog_categories.name as category')
							->from('blog')
							->join('users', 'users.id = blog.user_id')
							->join('blog_categories', 'blog_categories.id = blog.category_id')
							->where('blog_categories.name',$category)
							->where('blog.status','published')
							->get();
			$articles =  $q->result();
			// echo '<pre>';
			// var_dump($articles);
			return $articles;
		}

		public function getArticlesForLoggedinUser(){
			$q = $this->db->select("id, title, body, created_at, status")
									->where('user_id', $this->session->userdata("userid"))
									->order_by('created_at', 'DESC')
									->get('blog');
			$q2 = $this->db->select('id')
									->where('user_id', $this->session->userdata("userid"))
									->where('status','published' )
									->get('blog');
			$q3 = $this->db->select('id')
									->where('user_id', $this->session->userdata("userid"))
									->where('status','draft' )
									->get('blog');
			$data['published'] = $q2->num_rows();
			$data['draft'] = $q3->num_rows();
			$data['articles'] =  $q->result();
			return $data;
		}

		public function getPublishedArticlesForLoggedinUser(){
			$q = $this->db->select("id, title, body, created_at, status")
									->where('user_id', $this->session->userdata("userid"))
									->where('status', 'published')
									->get('blog');
			$q2 = $this->db->select('id')
									->where('user_id', $this->session->userdata("userid"))
									->where('status','published' )
									->get('blog');
			$q3 = $this->db->select('id')
									->where('user_id', $this->session->userdata("userid"))
									->where('status','draft' )
									->get('blog');
			$data['published'] = $q2->num_rows();
			$data['draft'] = $q3->num_rows();
			$data['articles'] =  $q->result();
			return $data;
		}

		public function getDraftedArticlesForLoggedinUser(){
			$q = $this->db->select("id, title, body, created_at, status")
									->where('user_id', $this->session->userdata("userid"))
									->where('status', 'draft')
									->get('blog');
			$q2 = $this->db->select('id')
									->where('status','published' )
									->where('user_id', $this->session->userdata("userid"))
									->get('blog');
			$q3 = $this->db->select('id')
									->where('status','draft' )
									->where('user_id', $this->session->userdata("userid"))
									->get('blog');
			$data['published'] = $q2->num_rows();
			$data['draft'] = $q3->num_rows();
			$data['articles'] =  $q->result();
			return $data;
		}

		public function getArticleToUpdate($id){
			 $q = $this->db->where('id', $id)->get('blog');
			 return $q->row();
		}

		public function updateArticle($data , $id){
			// print_r($data);
			$this->db->where('id', $id);
			$this->db->update('blog', $data);
		}

		public function deleteArticle($id){
			$this->db->where('id', $id);
			$this->db->delete('blog');
		}
	
		public function getArticleById($id){
			$q = $this->db->select('blog.id as blog_id, blog.user_id as blog_user_id, blog.title as blog_title, blog.body as blog_body, blog.created_at as blog_created_at, users.fullname as user_fullname, blog_categories.name as category')
							->from('blog')
							->join('users', 'users.id = blog.user_id')
							->join('blog_categories', 'blog_categories.id = blog.category_id')
							->where('blog.id', $id)
							->get();
							
			return $q->row();
		}

		

	}
