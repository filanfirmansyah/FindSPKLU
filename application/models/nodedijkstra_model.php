<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Nodedijkstra_model extends CI_model {
	

	public function __construct(){
		$this->load->database();
		$this->db->query("DELETE FROM jalur WHERE titik_awal=titik_akhir");
	}

	//Listing 
	public function listing() {
		$this->db->order_by('id_titik','DESC'); 
		$query=$this->db->get('titik');
		return $query->result();
	}

	public function getAlltitik(){
		$this->db->order_by('id_titik','DESC'); 
		$query=$this->db->get('titik');
		return $query->result();
	}

	//Detail
	public function detail ($id_titik) {
		$query = $this->db->get_where('titik',array('id_titik' => $id_titik));
		return $query->row();
	} 

	//Tambah
	public function tambah($data){
		$this->db->insert('titik',$data);
		return TRUE;
	}
	
	public function tambahjalur($data){
		$this->db->insert('jalur',$data);
		return TRUE;
	}

	//edit
	public function edit($data){
		$this->db->where('id_titik',$data['id_titik']);
		$this->db->update('titik',$data);
		return TRUE;
	}

	//delete
	public function delete($data){
		$this->db->where('id_titik',$data['id_titik']);
		$this->db->delete('titik',$data);
	  
		$id = $data['id_titik'];
		$data = $this->db->query("SELECT * FROM titik WHERE id_titik>$id")->result();
		 
		foreach ($data as $d) {
			$idbaru=$d->id_titik-1;
			$this->db->query("UPDATE titik SET id_titik=$idbaru WHERE id_titik=".$d->id_titik);
			
			 
		}
		
		$this->db->query("DELETE FROM jalur WHERE titik_awal=$id");
		$this->db->query("DELETE FROM jalur WHERE titik_akhir=$id");
		
		$this->db->query("UPDATE jalur SET titik_awal=titik_awal-1 WHERE titik_awal>".$id);
		
		$this->db->query("UPDATE jalur SET titik_akhir=titik_akhir-1 WHERE titik_akhir>".$id);
		
		return TRUE;
	}
	
	public function deletejalur($data){
		$this->db->where($data);
		$this->db->delete('jalur',$data);
		
		 
		return TRUE;
	}
	
	
	public function getIDSebenarnya($x){
		
		$this->db->order_by('id_titik','ASC'); 
		$query=$this->db->get('titik');
		
		$hasil = $query->result();
		
		$no=0;
		$OK=0;
		foreach($hasil as $titik) { 
			
			if($no==$x) {
				$OK=$titik->id_titik;
			}
			$no++;
		}
		
		return $OK;
	}
	 
} 