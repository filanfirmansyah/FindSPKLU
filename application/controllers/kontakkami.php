<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontakkami extends CI_Controller {

	//Load database 
	public function __construct(){
	parent::__construct();
	$this->load->model('kontakkami_model');  
	 
	$this->load->model('aplikasi_model');  
	
}


	
public function index(){
	$kontakkami 	= $this->kontakkami_model->listing();

	$data 	= array('aplikasi' => $this->aplikasi_model->get_aplikasi(),
					'title'	=> 'Kelola Kontak Kami',
					'subtitle' => 'List Data Kontak Kami',
				    'kontakkami'	=> $kontakkami,
				    'isi'	=> 'kontakkami/list', 
					);
					
	$this->load->view('layout/wrapper', $data);
	}

	 
public function jawabpesan(){

		//validasi
		$valid=$this->form_validation;

		$valid->set_rules(	'id_kontakkami','id_kontakkami','required',
					array(	'required'=>'id_kontakkami harus diisi'));
					
		if($valid->run()==FALSE){
		//end validasi
		
		
		$data['aplikasi'] = $this->aplikasi_model->get_aplikasi(); 
		$data['kontakkami'] = $this->kontakkami_model->detail($this->uri->segment(3));
		 
		 
		$data = array('aplikasi' => $this->aplikasi_model->get_aplikasi(),
					  'title'	=> 'Kelola Kontak Kami',
					  'subtitle'=> 'Jawab Pesan Kontak Kami',
					  'isi'		=> 'kontakkami/jawabpesan', 
					  'kontakkami' 	=> $this->kontakkami_model->detail($this->uri->segment(3)),
					  );
		 
					  
		$this->load->view('layout/wrapper', $data);
		
		//masuk database
		}else{
			 
			  
			  
				
				$data = array(
					'id_kontakkami'	=>$this->input->post('id_kontakkami'), 
					'jawaban'	=>$this->input->post('jawaban'),  
					'tgl_jawab'		=>date('Y-m-d'), 
					'status_kontakkami' => 'Dijawab',
				  );
						  
				 
			if($this->kontakkami_model->edit($data)) { 
				$this->session->set_flashdata('sukses','Jawaban kontakkami berhasil dikirim');
				redirect(base_url('kontakkami'));	
			}else{
				$this->session->set_flashdata('gagal','jawaban kontakkami gagal dikirim');
				redirect(base_url('kontakkami'));	
			}
	}
}




	
	//delete
	public function delete($id_kontakkami){
		$data = array('id_kontakkami' =>$id_kontakkami);
		$this->kontakkami_model->delete($data);
		
		$this->session->set_flashdata('sukses','Data kontakkami berhasil dihapus');
		
		redirect(base_url('kontakkami'));
	}
	
	
 
	
}