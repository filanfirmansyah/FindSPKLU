<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nodedijkstra extends CI_Controller {

	//Load database 
	public function __construct(){
		parent::__construct();
		$this->load->model('kecamatan_model');
		 
		$this->load->model('nodedijkstra_model');   
		$this->load->model('aplikasi_model');  
		
	}


	
	public function index(){
		 

		$data 	= array('aplikasi' => $this->aplikasi_model->get_aplikasi(),
						'title'	=> 'Kelola Titik dan Jalur',
						'subtitle' => 'List Data Titik dan Jalur', 
						'isi'	=> 'nodedijkstra/list', 
						);
						
		$this->load->view('layout/wrapper', $data);
	}

	
	//Tambah
	public function tambah(){ 
			 
		$id=$this->input->post('id');
		$lat=$this->input->post('lat');
		$long=$this->input->post('lng');
		$alamat=$this->input->post('alamat');
		
			$data = array('id_titik'	=>$id, 
				  'latitude'	=>$lat,  
				  'longitude'	=>$long,
				  'nama_titik' =>$alamat, 
				  );
  
		$this->nodedijkstra_model->tambah($data);
		  
	}
	
	
	public function tambahjalur(){ 
			 
		$id1=$this->uri->segment(3);
		$id2=$this->uri->segment(4);
		$jarak=$this->uri->segment(5);
		
			$data = array('titik_awal'	=>$id1, 
				  'titik_akhir'			=>$id2,  
				  'jarak'				=>$jarak,  
				  );
  
		$this->nodedijkstra_model->tambahjalur($data);
		  
	}

	public function update(){

		$id=$this->input->post('id');
		$idsebenarnya = $this->nodedijkstra_model->getIDSebenarnya($id);
		
		$lat=$this->input->post('lat');
		$long=$this->input->post('lng');
		$alamat=$this->input->post('alamat');
		
		 
		
			$data = array('id_titik'	=>$idsebenarnya, 
				  'latitude'	=>$lat,  
				  'longitude'	=>$long,  
				  'nama_titik' =>$alamat, 
				  );
		
		$this->nodedijkstra_model->edit($data);
	}

	
	
	public function hapus(){

		
		$id=$this->uri->segment(3);
		$idsebenarnya = $this->nodedijkstra_model->getIDSebenarnya($id);
		
		$data = array('id_titik' =>$idsebenarnya);
		$this->nodedijkstra_model->delete($data);
		
		 
	}
	
	
	public function hapusjalur(){

		$id1=$this->uri->segment(3);
		$id2=$this->uri->segment(4);
		
		
		$data = array(
			'titik_awal' =>$id1,
			'titik_akhir' =>$id2,
		);
		 
		$this->nodedijkstra_model->deletejalur($data);
		
		 
	}


	
	
 
 
	
}