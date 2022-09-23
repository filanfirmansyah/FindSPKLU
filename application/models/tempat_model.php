<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tempat_model extends CI_model {
	

	public function __construct(){
		$this->load->database();
	}

	//Listing 
	public function listing() {
		$this->db->order_by('id_tempat','DESC');
		 
		$query=$this->db->get('tempat');
		return $query->result();
	}
	
	function get_all($limit, $offset, $idkecamatan)
	{
		if($idkecamatan!="") {
			$query = $this->db->order_by('id_tempat','desc');
			$query = $this->db->limit($limit, $offset); 
			$query = $this->db->where('id_kecamatan',$idkecamatan);
			$query = $this->db->from('tempat');
			$query = $this->db->get();
		} else {
			$query = $this->db->order_by('id_tempat','desc');
			$query = $this->db->limit($limit, $offset);  
			$query = $this->db->from('tempat');
			$query = $this->db->get();
		}
		
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	

	public function getAlltempat(){
		$this->db->order_by('id_tempat','DESC');
		 
		$query=$this->db->get('tempat');
		return $query->result();
	}

	public function jumlah_tempat($idkecamatan)
    {
		if($idkecamatan!="") {
			$query = $this->db->select('*');
			$query = $this->db->where('id_kecamatan',$idkecamatan);
			$query = $this->db->from('tempat');
			$query = $this->db->get();
			
		} else {
			$query = $this->db->select('*');
			$query = $this->db->from('tempat');
			$query = $this->db->get();
		}
		
		
        if ($query->num_rows() > 0) 
        {
            return $query->num_rows();
        } 
        else 
        {
            return 0 ;
        }
    }
	
	
	//Detail
	public function detail ($id_tempat) {
		 
		$query = $this->db->get_where('tempat',array('id_tempat' => $id_tempat));
		return $query->row();
	} 

	//Tambah
	public function tambah($data){
		$this->db->insert('tempat',$data);
		$last_id = $this->db->insert_id();

		return $last_id; 
	}
	
	public function tambahfoto($data){
		$this->db->insert('foto',$data);
		return TRUE;
	}

	//edit
	public function edit($data){
		$this->db->where('id_tempat',$data['id_tempat']);
		$this->db->update('tempat',$data);
		return TRUE;
	}

	//delete
	public function delete($data){
		$this->db->where('id_tempat',$data['id_tempat']);
		$this->db->delete('tempat',$data);
		return TRUE;
	}
	
	public function hapusfoto($data){
		$this->db->where('id_foto',$data['id_foto']);
		$this->db->delete('foto',$data);
		return TRUE;
	}
	
	
} 