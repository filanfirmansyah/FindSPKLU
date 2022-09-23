<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontakkami_model extends CI_model {
	

	public function __construct(){
		$this->load->database();
	}

	//Listing 
	public function listing() {
		$this->db->order_by('id_kontakkami','DESC');
		$query=$this->db->get('kontakkami');
		return $query->result();
	}

	public function getAllkontakkami(){
		$this->db->order_by('id_kontakkami','DESC');
		$query=$this->db->get('kontakkami');
		return $query->result();
	}

	//Detail
	public function detail ($id_kontakkami) {
		$query = $this->db->get_where('kontakkami',array('id_kontakkami' => $id_kontakkami));
		return $query->row();
	} 

	//Tambah
	public function tambah($data){
		$this->db->insert('kontakkami',$data);
		return TRUE;
	}

	//edit
	public function edit($data){
		$this->db->where('id_kontakkami',$data['id_kontakkami']);
		$this->db->update('kontakkami',$data);
		return TRUE;
	}

	//delete
	public function delete($data){
		$this->db->where('id_kontakkami',$data['id_kontakkami']);
		$this->db->delete('kontakkami',$data);
		return TRUE;
	}
} 