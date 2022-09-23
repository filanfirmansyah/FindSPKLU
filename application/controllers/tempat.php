<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tempat extends CI_Controller {

	//Load database 
	public function __construct(){
		parent::__construct();
		$this->load->model('kecamatan_model');
	 
		$this->load->model('tempat_model');   
		$this->load->model('aplikasi_model');  
		
	}


	
	public function index(){
		$tempat 	= $this->tempat_model->listing();

		$data 	= array('aplikasi' => $this->aplikasi_model->get_aplikasi(),
						'title'	=> 'Kelola Tempat',
						'subtitle' => 'List Data Tempat',
						'tempat'	=> $tempat,
						'isi'	=> 'tempat/list', 
						);
						
		$this->load->view('layout/wrapper', $data);
	}

	
	//Tambah
	public function tambah(){ 
			//validasi
			$valid=$this->form_validation;
			$valid->set_rules('nama_tempat','nama_tempat','required',
						array('required'	=>'nama tempat harus diisi'));

			if($valid->run()===FALSE){
			//end validasi
			
			 
			 
			$data = array('aplikasi' => $this->aplikasi_model->get_aplikasi(),
						  'title'	=> 'Kelola Tempat',
						  'subtitle'=> 'Tambah Data Tempat',
						  'isi'		=> 'tempat/tambah',
						  'kecamatans' => $this->kecamatan_model->listing(), 
						  );
						  
			
						  
			$this->load->view('layout/wrapper', $data);
			
			
			}else{  //masuk database
				
			
				
				//GAMBAR
				$filename = $_FILES['foto']['name']; 
				if ($filename) {	
								$acak     = rand(000000,999999);
								$fileName = $acak.$filename; 
								$tmp_file = $_FILES['foto']['tmp_name'];   
							
								$destination = 'upload/foto_tempat/' . $fileName;
						 
								move_uploaded_file($tmp_file, $destination); 
				} else {
					$fileName= "";
				}
				
				//id_tempat 	id_kecamatan 	nama_tempat 	deskripsi_tempat 	alamat_tempat 	notelp_tempat 	koordinat_tempat 	foto_tempat 	 
			 	
				$data = array('id_kecamatan'	=>$this->input->post('id_kecamatan'), 
					  'nama_tempat'	=>$this->input->post('nama_tempat'),  
					  'deskripsi_tempat'	=>$this->input->post('deskripsi_tempat'), 
					  'alamat_tempat'	=>$this->input->post('alamat_tempat'), 
					  'notelp_tempat'		=>$this->input->post('notelp_tempat'), 
					  'koordinat_tempat'		=>$this->input->post('koordinat_tempat'),   
					  );
	  
				$id=$this->tempat_model->tambah($data);
							  
				if($id!=null) {
					$this->session->set_flashdata('sukses','Data tempat berhasil ditambahkan');
					
					
					redirect(base_url('tempat/edit/'.$id));	
					
					
				}else{
					$this->session->set_flashdata('gagal','Data tempat gagal ditambahkan');
					redirect(base_url('tempat'));	
				}
		}
			 
	}



	public function edit(){

			//validasi
			$valid=$this->form_validation;

			$valid->set_rules(	'id_tempat','id_tempat','required',
						array(	'required'=>'id_tempat harus diisi'));
						
			if($valid->run()==FALSE){
			//end validasi
			
			  
			 
			$data = array('aplikasi' => $this->aplikasi_model->get_aplikasi(),
						  'title'	=> 'Kelola Tempat',
						  'subtitle'=> 'Edit Data Tempat',
						  'isi'		=> 'tempat/edit', 
						  'tempat' 	=> $this->tempat_model->detail($this->uri->segment(3)),
						  'kecamatans' => $this->kecamatan_model->listing(), 

						  );
			 
						  
			$this->load->view('layout/wrapper', $data);
			
			//masuk database
			}else{
				 
				 
			 
				
				//GAMBAR
				$filename = $_FILES['foto']['name']; 
				if ($filename) {	
								$acak     = rand(000000,999999);
								$fileName = $acak.$filename; 
								$tmp_file = $_FILES['foto']['tmp_name'];   
							
								$destination = 'upload/foto_tempat/' . $fileName;
						 
								move_uploaded_file($tmp_file, $destination);
								unlink("upload/foto_tempat/".$this->input->post('fotolama'));
				} else {
					$fileName= $this->input->post('fotolama');
				}
				
				 
					//id_tempat 	id_kecamatan 	nama_tempat 	deskripsi_tempat 	alamat_tempat 	notelp_tempat 	koordinat_tempat 	foto_tempat 	 
				 
				$data = array('id_tempat'	=>$this->input->post('id_tempat'), 
							  'nama_tempat'	=>$this->input->post('nama_tempat'), 
							  'id_kecamatan'	=>$this->input->post('id_kecamatan'), 
							  'deskripsi_tempat'	=>$this->input->post('deskripsi_tempat'), 
							  'alamat_tempat'	=>$this->input->post('alamat_tempat'), 
							  'notelp_tempat'		=>$this->input->post('notelp_tempat'),  
							  'koordinat_tempat'		=>$this->input->post('koordinat_tempat'),  
							  
							  );
							  
				 
				 
				if($this->tempat_model->edit($data)) { 
					$this->session->set_flashdata('sukses','Data tempat berhasil diupdate');
					redirect(base_url('tempat/edit/'.$this->input->post('id_tempat')));	
				}else{
					$this->session->set_flashdata('gagal','Data tempat gagal diupdate');
					redirect(base_url('tempat/edit/'.$this->input->post('id_tempat')));	
				}
		}
	}





	
	
	//delete
	public function delete($id_tempat){
		$data = array('id_tempat' =>$id_tempat);
		$this->tempat_model->delete($data);
		
		$this->session->set_flashdata('sukses','Data tempat berhasil dihapus');
		
		redirect(base_url('tempat'));
	}
	
	
	
	
	//Tambah
	public function tambahfoto(){ 
			  
			$this->load->view('tempat/foto_tambah'); 
	}
	
	
	 
	 
	public function simpanfoto(){ 
			 
				
				//GAMBAR
				$filename = $_FILES['foto']['name']; 
				if ($filename) {	
								$acak     = rand(000000,999999);
								$fileName = $acak.$filename; 
								$tmp_file = $_FILES['foto']['tmp_name'];   
							
								$destination = 'upload/foto_tempat/' . $fileName;
						 
								move_uploaded_file($tmp_file, $destination); 
				} else {
					$fileName= "";
				}
				
 
			 	
				$data = array('id_tempat'	=>$this->input->post('id_tempat'),  
					  'file_foto'			=>$fileName,  
					  );
	  
	   		  
				if($this->tempat_model->tambahfoto($data)) {
					$this->session->set_flashdata('sukses','Data foto berhasil ditambahkan');
					 
					redirect(base_url('tempat/edit/'.$this->input->post('id_tempat')));	
					 
				}else{
					$this->session->set_flashdata('gagal','Data foto gagal ditambahkan');
					redirect(base_url('tempat/edit/'.$this->input->post('id_tempat')));	
				}
		 
			 
	}
	
	
	public function hapusfoto(){
		$id_tempat=$this->uri->segment(3);
		$id_foto=$this->uri->segment(4);
		
		$data = array(
				'id_tempat' =>$id_tempat,
				'id_foto' => $id_foto
				);
				
		$this->tempat_model->hapusfoto($data);
		
		$this->session->set_flashdata('sukses','Data foto berhasil dihapus');
		
		redirect(base_url('tempat/edit/'.$id_tempat));
	}
	
	
 
	
}