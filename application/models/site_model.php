<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_model {
	

	public function __construct(){
		$this->load->database();
	}

	public function getAllBerita(){
		$this->db->order_by('id_berita','ASC');
		$query=$this->db->get('berita');
		return $query->result();
	}
 
	public function getAllkecamatan(){
		$this->db->order_by('id_kecamatan','ASC');
		$query=$this->db->get('kecamatan');
		return $query->result();
	}

 
	public function detailBerita ($id_kecamatan) {
		$query = $this->db->get_where('berita',array('id_berita' => $id_kecamatan));
		return $query->row();
	} 

	public function tambahcaritemp($data){
		$this->db->insert('temp_carirute',$data);
		return TRUE;
	}
	
	public function hapuscaritemp(){
		$this->db->query('DELETE FROM temp_carirute');
		return TRUE;
	}
	
 
	
 
	 
} 