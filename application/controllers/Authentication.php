<?php
 
 class Authentication extends CI_Controller {

	public function index(){
		return redirect('authentication/login');
	}

	public function register(){
		$this->load->helper("form");
		$this->load->view("register-view");
	}

	public function registerProcess(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fullname', 'Username','required|alpha',
		array('required' => 'You must provide a %s.',
			  'alpha' => 'Name must be in Alphabet'
			)
		);
		$this->form_validation->set_rules('email', 'Email','required|valid_email|callback_checkUserName',
		array(
			'required' => 'You must provide a %s.',
			'checkUserName' => 'Username %s is already taken plz choose another.'
			)
		);
		$this->form_validation->set_rules('password', 'Confirm Password','required',
		array(
			'required' => 'You must provide a %s.',
			)
		);
		$this->form_validation->set_rules('confpassword', 'Password Confirmation', 'required|matches[password]');
		if ($this->form_validation->run() == FALSE)
		{		
				$this->load->view('register-view');
		}
		else
		{
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$fullname = $this->input->post('fullname');
				$password = password_hash($password, PASSWORD_DEFAULT);
				$data = array(
					'email' => $email,
					'password' => $password,
					'fullname' => $fullname
				);
				if($this->usermodel->saveUser($data)){
					$this->session->set_flashdata('pass_err','YOU are registered. now can log in');
					return redirect('authentication/login');
				}
		}
	}

	public function login(){
		$this->load->helper('form');
		$this->session->unset_userdata('useremail');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('userid');
		$this->load->view('login-view')	;
	}

	public function loginProcess(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Username','required'
		);
		$this->form_validation->set_rules('password', 'Password','required'
		);
		if( $this->form_validation->run() == false ){
			$this->load->view('login-view');
		}
		else{
			 $email = $this->input->post('email');
			 $password = $this->input->post('password');
			 $data = [
				 'email' => $email,
				 'password' => $password
			 ];
			if($this->usermodel->loginUser($data) == 'NOT_REGISTERED'){
				$this->session->set_flashdata('not_reg','You are not registered whith us');
				return redirect('authentication/login');
			}
			else if($this->usermodel->loginUser($data) == 'PASS_NOT_MATCH'){
				$this->session->set_flashdata('pass_err',"Password didn't Match");
				return redirect('authentication/login');
			}
			else{
				$user = $this->usermodel->loginUser($data);
				$this->session->set_userdata('useremail',$user->email);
				$this->session->set_userdata('username',$user->fullname);
				$this->session->set_userdata('userid',$user->id);
				return redirect('authentication/dashboard');
			}
		}
	}

	public function dashboard(){
		if($this->session->userdata('userid') == NULL ){
			$this->session->set_flashdata('msg', 'Sorry! You must login first');
			return redirect('authentication/login');
		}
		else{
			$data = $this->blogmodel->getArticlesForLoggedinUser();
			// echo '<pre>';
			// var_dump($data['published']);
			$this->load->view('dashboard-view' , $data);
		}		
	}

	public function checkUserName($username){
		
		if($this->usermodel->checkUserEmail($username)){
			return false;
		}
		else{
			return true;
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		return redirect('authentication/login');
	}

	public function __construct(){
		parent::__construct();
		$this->load->model('usermodel');
		$this->load->model('blogmodel');
		$this->load->library('session');
		// $this->load->helper('security');
	}
 }

 