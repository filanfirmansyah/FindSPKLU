<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	//Load database 
	public function __construct(){
	parent::__construct();
	$this->load->model('pengguna_model');  
	 
	$this->load->model('aplikasi_model');  
	
}


	
public function index(){
	$pengguna 	= $this->pengguna_model->listing();

	$data 	= array('aplikasi' => $this->aplikasi_model->get_aplikasi(),
					'title'	=> 'Kelola Pengguna',
					'subtitle' => 'List Data pengguna',
				    'pengguna'	=> $pengguna,
				    'isi'	=> 'pengguna/list', 
					);
					
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
		
		$data['aplikasi'] = $this->aplikasi_model->get_aplikasi();
		 
		 
		$data = array('aplikasi' => $this->aplikasi_model->get_aplikasi(),
					  'title'	=> 'Kelola Pengguna',
					  'subtitle'=> 'Tambah Pengguna',
					  'isi'		=> 'pengguna/tambah');
					  
		
					  
		$this->load->view('layout/wrapper', $data);
		
		
		}else{  //masuk database
			
		 
			
			//GAMBAR
			$filename = $_FILES['foto']['name']; 
			if ($filename) {	
							$acak     = rand(000000,999999);
							$fileName = $acak.$filename; 
							$tmp_file = $_FILES['foto']['tmp_name'];   
						
							$destination = 'upload/foto_pengguna/' . $fileName;
					 
							move_uploaded_file($tmp_file, $destination); 
			} else {
				$fileName= "";
			}
			
			 
			$data = array('foto'			=>$fileName,
						  'nama_lengkap'	=>$this->input->post('nama'), 
						  'jenis_kelamin'	=>$this->input->post('jenis_kelamin'), 
						  'no_telepon'		=>$this->input->post('no_telepon'), 
						  'username'		=>$this->input->post('username'),
						  'password'		=> sha1($this->input->post('pass')), 
						  );
						  
			if($this->pengguna_model->tambah($data)) {
				$this->session->set_flashdata('sukses','Data pengguna berhasil ditambahkan');
				redirect(base_url('pengguna'));	
			}else{
				$this->session->set_flashdata('gagal','Data pengguna gagal ditambahkan');
				redirect(base_url('pengguna'));	
			}
	}
		 
}

public function edit(){

		//validasi
		$valid=$this->form_validation;

		$valid->set_rules(	'id_pengguna','id_pengguna','required',
					array(	'required'=>'id_pengguna harus diisi'));
					
		if($valid->run()==FALSE){
		//end validasi
		
		
		$data['aplikasi'] = $this->aplikasi_model->get_aplikasi(); 
		$data['pengguna'] = $this->pengguna_model->detail($this->uri->segment(3));
		
 
		
		 
		$data = array('aplikasi' => $this->aplikasi_model->get_aplikasi(),
					  'title'	=> 'Kelola Pengguna',
					  'subtitle'=> 'Edit Pengguna',
					  'isi'		=> 'pengguna/edit', 
					  'pengguna' 	=> $this->pengguna_model->detail($this->uri->segment(3)),
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
						
							$destination = 'upload/foto_pengguna/' . $fileName;
					 
							move_uploaded_file($tmp_file, $destination);
							unlink("upload/foto_pengguna/".$this->input->post('fotolama'));
			} else {
				$fileName= $this->input->post('fotolama');
			}
			
			
			
			
			if($this->input->post('passbaru')!="") {
			 
			$data = array('id_pengguna'	=>$this->input->post('id_pengguna'),
						  'foto'			=>$fileName,
						  'nama_lengkap'	=>$this->input->post('nama'), 
						  'jenis_kelamin'	=>$this->input->post('jenis_kelamin'), 
						  'no_telepon'		=>$this->input->post('no_telepon'), 
						  'username'		=>$this->input->post('username'),
						  'password'		=> sha1($this->input->post('passbaru')), 
						  );
						  
						  
			} else {
				
				$data = array('id_pengguna'	=>$this->input->post('id_pengguna'),
						  'foto'			=>$fileName,
						  'nama_lengkap'	=>$this->input->post('nama'), 
						  'jenis_kelamin'	=>$this->input->post('jenis_kelamin'), 
						  'no_telepon'		=>$this->input->post('no_telepon'), 
						  'username'		=>$this->input->post('username'), 
						  'password'		=> $this->input->post('passlama'), 
						  );
						   
			}
			
			if($this->pengguna_model->edit($data)) { 
				if($this->session->userdata('id')==$this->input->post('id_pengguna')) {
					$this->session->set_userdata('namalengkap', $this->input->post('nama'));
					$this->session->set_userdata('foto', $fileName);
				}
			
			
				$this->session->set_flashdata('sukses','Data pengguna berhasil diupdate');
				redirect(base_url('pengguna'));	
			}else{
				$this->session->set_flashdata('gagal','Data pengguna gagal diupdate');
				redirect(base_url('pengguna'));	
			}
	}
}




public function editprofile(){

		//validasi
		$valid=$this->form_validation;

		$valid->set_rules(	'id_pengguna','id_pengguna','required',
					array(	'required'=>'id_pengguna harus diisi'));
					
		if($valid->run()==FALSE){
		//end validasi
		
		
		$data['aplikasi'] = $this->aplikasi_model->get_aplikasi();
	  
		$data['pengguna'] = $this->pengguna_model->detail($this->session->userdata('id'));
		
	 
		
		 
		$data = array('aplikasi' => $this->aplikasi_model->get_aplikasi(),
					  'title'	=> 'Kelola Pengguna',
					  'subtitle'=> 'Edit Profile',
					  'isi'		=> 'pengguna/editprofile', 
					  'pengguna' 	=> $this->pengguna_model->detail($this->session->userdata('id')),
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
						
							$destination = 'upload/foto_pengguna/' . $fileName;
					 
							move_uploaded_file($tmp_file, $destination);
							unlink("upload/foto_pengguna/".$this->input->post('fotolama'));
			} else {
				$fileName= $this->input->post('fotolama');
			}
			
			
			
			
			if($this->input->post('passbaru')!="") {
			 
			$data = array('id_pengguna'	=>$this->input->post('id_pengguna'),
						  'foto'			=>$fileName,
						  'nama_lengkap'	=>$this->input->post('nama'), 
						  'jenis_kelamin'	=>$this->input->post('jenis_kelamin'), 
						  'no_telepon'		=>$this->input->post('no_telepon'), 
						  'username'		=>$this->input->post('username'),
						  'password'		=> sha1($this->input->post('passbaru')), 
						  );
						  
						  
			} else {
				
				$data = array('id_pengguna'	=>$this->input->post('id_pengguna'),
						  'foto'			=>$fileName,
						  'nama_lengkap'	=>$this->input->post('nama'), 
						  'jenis_kelamin'	=>$this->input->post('jenis_kelamin'), 
						  'no_telepon'		=>$this->input->post('no_telepon'), 
						  'username'		=>$this->input->post('username'), 
						  'password'		=> $this->input->post('passlama'),
						  );
						  
						  
				 
			}
			
			if($this->pengguna_model->edit($data)) { 
			
				if($this->session->userdata('id')==$this->input->post('id_pengguna')) {
					$this->session->set_userdata('namalengkap', $this->input->post('nama'));
					$this->session->set_userdata('foto', $fileName);
				}
				
				$this->session->set_flashdata('sukses','Data profile berhasil diupdate');
				redirect(base_url('pengguna/editprofile'));	
			}else{
				$this->session->set_flashdata('gagal','Data profile gagal diupdate');
				redirect(base_url('pengguna/editprofile'));	
			}
	}
}
	
	
	//delete
	public function delete($id_pengguna){
		$data = array('id_pengguna' =>$id_pengguna);
		$this->pengguna_model->delete($data);
		
		$this->session->set_flashdata('sukses','Data pengguna berhasil dihapus');
		
		redirect(base_url('pengguna'));
	}
	
	
 
	
}