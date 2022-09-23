<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	// Login
	public function login($username, $password) {
		// Query untuk pencocokan data
		$queryadmin = $this->CI->db->get_where('pengguna', array(
										  'username' => $username, 
										  'password' => sha1($password)
										));
	
										
		// Jika ada hasilnya
		if($queryadmin->num_rows() == 1) {
			$row 	= $this->CI->db->query('SELECT * FROM pengguna WHERE username = "'.$username.'"');
			$admin 	= $row->row(); 
 
			$this->CI->session->set_userdata('username', $username);   
			$this->CI->session->set_userdata('namalengkap', $admin->nama_lengkap); 
			$this->CI->session->set_userdata('foto', $admin->foto); 
			$this->CI->session->set_userdata('id_login', uniqid(rand()));
			$this->CI->session->set_userdata('id', $admin->id_pengguna); 

			redirect(base_url('dashboard'));


		}  else {
			$this->CI->session->set_flashdata('gagal','Username atau password salah');
			redirect(base_url().'login');
		}
		return false;
	}
	
	// Cek login
	public function cek_login() {
		if($this->CI->session->userdata('username') == '' && 
		$this->CI->session->userdata('namalengkap')=='') {
			$this->CI->session->set_flashdata('sukses','Oops...Silakan login dulu');
			redirect(base_url('login'));
		}	
	}
	
	// Logout
	public function logout() {
		$this->CI->session->unset_userdata('username'); 
		$this->CI->session->unset_userdata('namalengkap');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id');
		$this->CI->session->unset_userdata('foto'); 
		$this->CI->session->set_flashdata('sukses','Terimakasih, Anda berhasil logout');
		redirect(base_url().'login');
	}
	
}