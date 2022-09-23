<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {

	//Load database 
public function __construct(){
	parent::__construct();
	$this->load->model('kecamatan_model');  
	$this->load->model('aplikasi_model');  
	
	
}

	
public function index(){
	$kecamatan 	= $this->kecamatan_model->listing();
	
	$data 	= array('aplikasi' => $this->aplikasi_model->get_aplikasi(),
					'title'	=> 'Kelola Kecamatan',
					'subtitle' => 'List Kecamatan ',
				    'kecamatan'	=> $kecamatan,
				    'isi'	=> 'kecamatan/list');
	 
					
	$this->load->view('layout/wrapper', $data);
	}

	
	//Tambah
public function tambah(){ 
		//validasi
		$valid=$this->form_validation;
		$valid->set_rules('nama','nama','required',
					array('required'	=>'nama harus diisi'));

		if($valid->run()===FALSE){
		//end validasi
		
	 
		
		$data = array('aplikasi' => $this->aplikasi_model->get_aplikasi(),
					  'title'	=> 'Kelola Kecamatan',
					  'subtitle'=> 'Tambah Kecamatan',
					  'isi'		=> 'kecamatan/tambah', );
					  
		
					  
		$this->load->view('layout/wrapper', $data);
		
		
		}else{  //masuk database
			
			$data = array( 
						  'nama_kecamatan'	=>$this->input->post('nama'), 
						  );
						  
			if($this->kecamatan_model->tambah($data)) {
				$this->session->set_flashdata('sukses','Data kecamatan berhasil ditambahkan');
				redirect(base_url('kecamatan'));	
			}else{
				$this->session->set_flashdata('gagal','Data kecamatan gagal ditambahkan');
				redirect(base_url('kecamatan'));	
			}
	}
		 
}

public function edit(){

		//validasi
		$valid=$this->form_validation;

		$valid->set_rules(	'id_kecamatan','id_kecamatan','required',
					array(	'required'=>'id_kecamatan harus diisi'));
					
		if($valid->run()==FALSE){
		//end validasi
		
		 
		
		 
		$data = array('aplikasi' => $this->aplikasi_model->get_aplikasi(),
					  'title'	=> 'Kelola Kecamatan',
					  'subtitle'=> 'Edit Kecamatan',
					  'isi'		=> 'kecamatan/edit', 
					  'kecamatan' 	=> $this->kecamatan_model->detail($this->uri->segment(3)),
					  );
		 
					  
		$this->load->view('layout/wrapper', $data);
		
		//masuk database
		}else{
			  
				 
		 $data = array( 'id_kecamatan'	=>$this->input->post('id_kecamatan'),
			  'nama_kecamatan'	=>$this->input->post('nama'),
			  );
						   
			
			if($this->kecamatan_model->edit($data)) { 
				$this->session->set_flashdata('sukses','Data kecamatan berhasil diupdate');
				redirect(base_url('kecamatan'));	
			}else{
				$this->session->set_flashdata('gagal','Data kecamatan gagal diupdate');
				redirect(base_url('kecamatan'));	
			}
	}
}
	
	
//delete
public function delete($id_kecamatan){
	$data = array('id_kecamatan' =>$id_kecamatan);
	$this->kecamatan_model->delete($data);
	
	$this->session->set_flashdata('sukses','Data kecamatan berhasil dihapus');
	
	redirect(base_url('kecamatan'));
	}
	
	
 
	
	
}