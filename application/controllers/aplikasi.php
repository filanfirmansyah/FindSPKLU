<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplikasi extends CI_Controller {

	//Load database 
	public function __construct(){
	parent::__construct();
	$this->load->model('aplikasi_model'); 
 
}


	
public function index(){
	
	$this->edit();
	
	}

	

public function edit(){

		//validasi
		$valid=$this->form_validation;

		$valid->set_rules(	'nama_aplikasi','nama_aplikasi','required',
					array(	'required'=>'nama aplikasi harus diisi'));
					
		if($valid->run()==FALSE){
		//end validasi
		
		$data = array(	'title'		=> 'Profil Aplikasi',
					  	'subtitle' 	=> 'Edit Data Prodil Aplikasi ',
					  	'isi'		=> 'aplikasi/edit');
		$data['aplikasi'] = $this->aplikasi_model->get_aplikasi();
		 
		
		
		$this->load->view('layout/wrapper', $data);
		
		
		}else{
			  
			  
			//GAMBAR
			$filename = $_FILES['logo']['name']; 
			if ($filename) {	
							$acak     = rand(000000,999999);
							$fileName = $acak.$filename; 
							$tmp_file = $_FILES['logo']['tmp_name'];   
						
							$destination = 'upload/' . $fileName;
					 
							move_uploaded_file($tmp_file, $destination);
							unlink("upload/".$this->input->post('logolama'));
			} else {
				$fileName= $this->input->post('logolama');
			}
			
			 
			//ICON MARKER
			$filenameicon = $_FILES['icon']['name']; 
			if ($filenameicon) {	
							$acak     = rand(000000,999999);
							$fileNameIcon = $acak.$filenameicon; 
							$tmp_file = $_FILES['icon']['tmp_name'];   
						
							$destination = 'upload/' . $fileNameIcon;
					 
							 move_uploaded_file($tmp_file, $destination);
							 unlink("upload/".$this->input->post('iconlama'));
			} else {
				$fileNameIcon= $this->input->post('iconlama');
			}
		
		
		
			$data = array(
					  'nama_aplikasi'		=>$this->input->post('nama_aplikasi'),
					  'nama_pemilik'		=>$this->input->post('nama_pemilik'), 
					'tentang_kami'			=>$this->input->post('tentang_kami'),
					'alamat_pemilik'		=>$this->input->post('alamat_pemilik'),
					'koordinat_pemilik'		=>$this->input->post('koordinat_pemilik'),
					'notelp_pemilik'		=>$this->input->post('notelp_pemilik'),
					'email_pemilik'			=>$this->input->post('email_pemilik'),
					  'logo_aplikasi'		=> $fileName,
					  'icon_aplikasi'		=> $fileNameIcon,
					  );
					  
			//masuk database 
			if($this->aplikasi_model->edit($data)) { 
				$this->session->set_flashdata('sukses','Data aplikasi berhasil diupdate');
				redirect(base_url('aplikasi'));	
			}else{
				$this->session->set_flashdata('gagal','Data aplikasi gagal diupdate');
				redirect(base_url('aplikasi'));	
			}
	}
}


 
	
	
	
}