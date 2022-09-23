<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	//Load database 
	public function __construct(){
	parent::__construct();
	$this->load->model('berita_model');  
	 
	$this->load->model('aplikasi_model');  
	
}


	
public function index(){
	$berita 	= $this->berita_model->listing();

	$data 	= array('aplikasi' => $this->aplikasi_model->get_aplikasi(),
					'title'	=> 'Kelola Berita',
					'subtitle' => 'List Data Berita',
				    'berita'	=> $berita,
				    'isi'	=> 'berita/list', 
					);
					
	$this->load->view('layout/wrapper', $data);
	}

	
	//Tambah
public function tambah(){ 
		//validasi
		$valid=$this->form_validation;
		$valid->set_rules('judul_berita','judul_berita','required',
					array('required'	=>'judul berita harus diisi'));

		if($valid->run()===FALSE){
		//end validasi
		
		$data['aplikasi'] = $this->aplikasi_model->get_aplikasi();
		 
		 
		$data = array('aplikasi' => $this->aplikasi_model->get_aplikasi(),
					  'title'	=> 'Kelola Berita',
					  'subtitle'=> 'Tambah Data Berita',
					  'isi'		=> 'berita/tambah');
					  
		
					  
		$this->load->view('layout/wrapper', $data);
		
		
		}else{  //masuk database
			
		 
			
			//GAMBAR
			$filename = $_FILES['foto']['name']; 
			if ($filename) {	
							$acak     = rand(000000,999999);
							$fileName = $acak.$filename; 
							$tmp_file = $_FILES['foto']['tmp_name'];   
						
							$destination = 'upload/foto_berita/' . $fileName;
					 
							move_uploaded_file($tmp_file, $destination); 
			} else {
				$fileName= "";
			}
			
			 
			$data = array('foto_berita'		=>$fileName,
						  'judul_berita'	=>$this->input->post('judul_berita'), 
						  'isi_berita'		=>$this->input->post('isi_berita'), 
						  'tgl_buat'		=>date('Y-m-d'),  
						  );
						  
			if($this->berita_model->tambah($data)) {
				$this->session->set_flashdata('sukses','Data berita berhasil ditambahkan');
				redirect(base_url('berita'));	
			}else{
				$this->session->set_flashdata('gagal','Data berita gagal ditambahkan');
				redirect(base_url('berita'));	
			}
	}
		 
}

public function edit(){

		//validasi
		$valid=$this->form_validation;

		$valid->set_rules(	'id_berita','id_berita','required',
					array(	'required'=>'id_berita harus diisi'));
					
		if($valid->run()==FALSE){
		//end validasi
		
		
		$data['aplikasi'] = $this->aplikasi_model->get_aplikasi(); 
		$data['berita'] = $this->berita_model->detail($this->uri->segment(3));
		
 
		
		 
		$data = array('aplikasi' => $this->aplikasi_model->get_aplikasi(),
					  'title'	=> 'Kelola Berita',
					  'subtitle'=> 'Edit Data Berita',
					  'isi'		=> 'berita/edit', 
					  'berita' 	=> $this->berita_model->detail($this->uri->segment(3)),
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
						
							$destination = 'upload/foto_berita/' . $fileName;
					 
							move_uploaded_file($tmp_file, $destination);
							unlink("upload/foto_berita/".$this->input->post('fotolama'));
			} else {
				$fileName= $this->input->post('fotolama');
			}
			
			 
				
				$data = array('id_berita'	=>$this->input->post('id_berita'),
						  'foto_berita'		=>$fileName,
						  'judul_berita'	=>$this->input->post('judul_berita'), 
						  'isi_berita'		=>$this->input->post('isi_berita'), 
						  'tgl_buat'		=>date('Y-m-d'),  
						  );
						  
						  
				 
			 
			
			if($this->berita_model->edit($data)) { 
				$this->session->set_flashdata('sukses','Data berita berhasil diupdate');
				redirect(base_url('berita'));	
			}else{
				$this->session->set_flashdata('gagal','Data berita gagal diupdate');
				redirect(base_url('berita'));	
			}
	}
}




	
	//delete
	public function delete($id_berita){
		$data = array('id_berita' =>$id_berita);
		$this->berita_model->delete($data);
		
		$this->session->set_flashdata('sukses','Data berita berhasil dihapus');
		
		redirect(base_url('berita'));
	}
	
	
 
	
}