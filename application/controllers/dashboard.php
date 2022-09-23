<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	
	public function __construct(){
	parent::__construct(); 
		$this->load->model('aplikasi_model');  
		 
	}

	
	public function index(){
		
		 
	 
		$data['isi']		= 'dashboard/list';
		$data['aplikasi'] = $this->aplikasi_model->get_aplikasi();
		
		$this->load->view('layout/wrapper', $data);
	}
}