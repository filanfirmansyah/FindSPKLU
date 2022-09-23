<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan_model extends CI_model {
	

	public function __construct(){
		$this->load->database();
	}

	//Listing 
	public function listing() {
		$this->db->order_by('id_kecamatan','ASC');
		$query=$this->db->get('kecamatan');
		return $query->result();
	}

	public function getAllkecamatan(){
		$this->db->order_by('id_kecamatan','ASC');
		$query=$this->db->get('kecamatan');
		return $query->result();
	}

	//Detail
	public function detail ($id_kecamatan) {
		$query = $this->db->get_where('kecamatan',array('id_kecamatan' => $id_kecamatan));
		return $query->row();
	} 

	//Tambah
	public function tambah($data){
		$this->db->insert('kecamatan',$data);
		return TRUE;
	}

	//edit
	public function edit($data){
		$this->db->where('id_kecamatan',$data['id_kecamatan']);
		$this->db->update('kecamatan',$data);
		return TRUE;
	}

	//delete
	public function delete($data){
		$this->db->where('id_kecamatan',$data['id_kecamatan']);
		$this->db->delete('kecamatan',$data);
		return TRUE;
	}
} 