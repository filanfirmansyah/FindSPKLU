<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_model {
	

	public function __construct(){
		$this->load->database();
	}

	//Listing 
	public function listing() {
		$this->db->order_by('id_berita','DESC');
		$query=$this->db->get('berita');
		return $query->result();
	}
	
	public function listing_populer() {
		
		$tgl=date("Y-m");
		$query=$this->db->query("SELECT * FROM berita WHERE tgl_buat like '$tgl%' ORDER BY jml_dibaca DESC LIMIT 0,5");
		return $query->result();
	}

	function get_all($limit, $offset)
	{
		$query = $this->db->order_by('id_berita','desc');
		$query = $this->db->limit($limit, $offset); 
		$query = $this->db->from('berita');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	
	public function jumlah_berita()
    {
		 
		$query = $this->db->select('*');
		$query = $this->db->from('berita');
		$query = $this->db->get();
		
        if ($query->num_rows() > 0) 
        {
            return $query->num_rows();
        } 
        else 
        {
            return 0 ;
        }
    }
	
	
	
	
	public function getAllberita(){
		$this->db->order_by('id_berita','DESC');
		$query=$this->db->get('berita');
		return $query->result();
	}

	//Detail
	public function detail ($id_berita) {
		$query = $this->db->get_where('berita',array('id_berita' => $id_berita));
		return $query->row();
	} 

	//Tambah
	public function tambah($data){
		$this->db->insert('berita',$data);
		return TRUE;
	}

	//edit
	public function edit($data){
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->update('berita',$data);
		return TRUE;
	}

	//delete
	public function delete($data){
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->delete('berita',$data);
		return TRUE;
	}
} 