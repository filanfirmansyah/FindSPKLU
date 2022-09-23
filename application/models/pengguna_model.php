<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_model {
	

	public function __construct(){
		$this->load->database();
	}

	//Listing 
	public function listing() {
		$this->db->order_by('id_pengguna','DESC');
		$query=$this->db->get('pengguna');
		return $query->result();
	}

	public function getAllpengguna(){
		$this->db->order_by('id_pengguna','DESC');
		$query=$this->db->get('pengguna');
		return $query->result();
	}

	//Detail
	public function detail ($id_pengguna) {
		$query = $this->db->get_where('pengguna',array('id_pengguna' => $id_pengguna));
		return $query->row();
	} 

	//Tambah
	public function tambah($data){
		$this->db->insert('pengguna',$data);
		return TRUE;
	}

	//edit
	public function edit($data){
		$this->db->where('id_pengguna',$data['id_pengguna']);
		$this->db->update('pengguna',$data);
		return TRUE;
	}

	//delete
	public function delete($data){
		$this->db->where('id_pengguna',$data['id_pengguna']);
		$this->db->delete('pengguna',$data);
		return TRUE;
	}
} 