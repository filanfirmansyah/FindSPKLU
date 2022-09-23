<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	
	public function __construct(){
	parent::__construct(); 
		$this->load->model('aplikasi_model');  
	}


	// index login
	public function index() {
		
		//validasi form
		$valid = $this->form_validation;
		
		$valid->set_rules('username','Username','required',
			array('required'	=> 'Username harus diisi'));
		
		$valid->set_rules('password','Password','required',
			array('required'	=> 'Password harus diisi'));
			
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		
		if($valid->run()) {
			$this->simple_login->login($username,$password,
			base_url('dashboard'), base_url('login'));
		}
		// End validasi
	
			
		$data['title']	= 'Login Administrator';
		$data['aplikasi'] = $this->aplikasi_model->get_aplikasi();
		 
		$this->load->view('login_view',$data);
	}
	//logout
	public function logout() {
		$this->simple_login->logout();
	}
}