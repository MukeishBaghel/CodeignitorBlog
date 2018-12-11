<?php
 class Usermodel extends CI_Model{

	public function checkUserEmail($email){
		$q = $this->db->where('email',$email)
						->get('users');
		if( $q->num_rows() ){
			return true;
		}
		else{
		}
			return false;
	}

	public function saveUser( $data ){
		return $this->db->insert('users', $data);
	}

	public function loginUser($data){
		$q = $this->db->where('email', $data['email'])
						->get('users');
		if($q->num_rows()){
			$user = $q->row();
			if(password_verify($data['password'], $user->password)){
				return $user;
			}
			else return 'PASS_NOT_MATCH';
		}
		else{
			return 'NOT_REGISTERED';
		}
	}

	// public function getArticles(){
	// 	$q = $this->db->select("id, title, body, created_at, status")
	// 							->where('user_id', $this->session->userdata("userid"))
	// 							->get('blog');
	// 	return $q->result();
	// }

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}
 }
