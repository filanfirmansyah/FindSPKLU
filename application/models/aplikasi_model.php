<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplikasi_model extends CI_model {
	

	public function __construct(){
		$this->load->database();
	}

  
	public function get_aplikasi () {
		$query = $this->db->get_where('aplikasi',array('id_aplikasi' => '1'));
		return $query->row();
	} 
 
	public function edit($data){
		$this->db->where('id_aplikasi','1');
		$this->db->update('aplikasi',$data);
		return TRUE;
	}

	 
} 