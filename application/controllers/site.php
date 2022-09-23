<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	//Load database 
	public function __construct(){
		parent::__construct();
		
		$this->output->disable_cache();
		
		$this->load->model('kecamatan_model');  
		$this->load->model('berita_model'); 
		$this->load->model('tempat_model'); 
		$this->load->model('aplikasi_model');  
		$this->load->model('site_model'); 
		$this->load->model('kontakkami_model');
		$this->load->library('session');
		
	}

	
	public function index(){
		
	
		
		
		$data 	= array(
				'aplikasi' => $this->aplikasi_model->get_aplikasi(),
				'kecamatans' 	=> $this->kecamatan_model->listing(),
				'beritas' 	=> $this->berita_model->getAllberita(),
				'tempats' 	=> $this->tempat_model->get_all(8,0,null),
			);
		 
		 
		
		$this->load->view('layout/site_header', $data);				
		$this->load->view('site/home', $data);
		$this->load->view('layout/site_footer', $data);
	}
	
	
	public function kontakkami(){
		 
		
		$data 	= array(
				'aplikasi' => $this->aplikasi_model->get_aplikasi(),
				'kecamatans' 	=> $this->kecamatan_model->listing(),
			);
		 
		$this->load->view('layout/site_header', $data);				
		$this->load->view('site/kontakkami', $data);
		$this->load->view('layout/site_footer', $data);
	}
	
	
	public function simpankontakkami(){ 
		$tgl = date("Y-m-d H:i:s");
		$data = array('nama_pengirim'	=>$this->input->post('nama'), 
					  'email_pengirim'	=>$this->input->post('email'), 
					  'judul_pesan'		=>$this->input->post('judul'), 
					  'isi_pesan'		=>$this->input->post('isi'),  
					  'tgl_buat'		=>$tgl,
					  );
					  
		if($this->kontakkami_model->tambah($data)) {
			$this->session->set_flashdata('sukses','Pesan kontak kami berhasil dikirim');
			redirect(base_url('site/kontakkami'));	
		}else{
			$this->session->set_flashdata('gagal','Pesan kontak kami gagal dikirim');
			redirect(base_url('site/kontakkami'));	
		}
	}
	
 




	public function berita(){
		 
			
		//pengaturan pagination
		$config['base_url'] = base_url().'site/berita';
		$config['total_rows'] = $this->berita_model->jumlah_berita();
		$config['per_page'] = '2';
 
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = ' First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last  ';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next  ';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		//inisialisasi config
		$this->pagination->initialize($config);
		 
		 
		//tamplikan data
		$id = $this->uri->segment(3);
	 
		 
		
		$data 	= array(
				'aplikasi' => $this->aplikasi_model->get_aplikasi(),
				'kecamatans' 	=> $this->kecamatan_model->listing(),
				'beritas' 	=> $this->berita_model->get_all($config['per_page'],$id),
				'beritas_populer' 	=> $this->berita_model->listing_populer(),
				'halaman' => $this->pagination->create_links(),
			);
			
			
		 
		$this->load->view('layout/site_header', $data);				
		$this->load->view('site/berita', $data);
		$this->load->view('layout/site_footer', $data);
	}
	
	
	
	public function berita_detail(){
		 
 
		//tamplikan data
		$id = $this->uri->segment(3);
	 
		
		$data 	= array(
				'aplikasi' => $this->aplikasi_model->get_aplikasi(),
				'kecamatans' 	=> $this->kecamatan_model->listing(),
				'berita' 	=> $this->berita_model->detail($id), 
				'beritas_populer' 	=> $this->berita_model->listing_populer(),
			);
			
			
		 
		$this->load->view('layout/site_header', $data);				
		$this->load->view('site/berita_detail', $data);
		$this->load->view('layout/site_footer', $data);
	}
	
	
	
	public function tempat(){
		
		$halamanke = $this->uri->segment(4);
		$idkecamatan = $this->uri->segment(3);
		
		//pengaturan pagination
		$config['base_url'] = base_url().'site/tempat/'.$idkecamatan;
		$config['total_rows'] = $this->tempat_model->jumlah_tempat($idkecamatan);
		$config['per_page'] = '9';
		
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = ' First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last  ';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next  ';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		//inisialisasi config
		$this->pagination->initialize($config);
	
		
		if($idkecamatan=="") {
			$data 	= array(
				'aplikasi' => $this->aplikasi_model->get_aplikasi(),
				'kecamatans' 	=> $this->kecamatan_model->listing(),
				'kecamatan' 	=> null,
				'tempats' 	=> $this->tempat_model->get_all($config['per_page'],$halamanke, $idkecamatan), 
				'halaman' => $this->pagination->create_links(),
			);
		} else {
			$data 	= array(
				'aplikasi' => $this->aplikasi_model->get_aplikasi(),
				'kecamatans' 	=> $this->kecamatan_model->listing(),
				'kecamatan' 	=> $this->kecamatan_model->detail($idkecamatan),
				'tempats' 	=> $this->tempat_model->get_all($config['per_page'],$halamanke, $idkecamatan), 
				'halaman' => $this->pagination->create_links(),
			);
 
		}
		
		
		 
		$this->load->view('layout/site_header', $data);				
		$this->load->view('site/tempat', $data);
		$this->load->view('layout/site_footer', $data);
	}
	 
	 
	public function tempat_detail(){
		 
 
		//tamplikan data
		$id = $this->uri->segment(3);
	 
		
		$data 	= array(
				'aplikasi' => $this->aplikasi_model->get_aplikasi(),
				'kecamatans' 	=> $this->kecamatan_model->listing(),
				'tempat' 	=> $this->tempat_model->detail($id),  
			);
			
			
		 
		$this->load->view('layout/site_header', $data);				
		$this->load->view('site/tempat_detail', $data);
		$this->load->view('layout/site_footer', $data);
		$this->load->view('site/tempat_detail_js', $data);
	}
	
	
	
	public function carirute(){
		 
		$lokasiawal = '';
		$lat = '';
		$lon = '';
		$idtujuan = ''; 
		$aksicari = '';
		 
		
		$data 	= array(
				'aplikasi' => $this->aplikasi_model->get_aplikasi(),
				'kecamatans' 	=> $this->kecamatan_model->listing(), 
				'tujuan' 	=> $this->tempat_model->detail($idtujuan), 
				'lokasiawal' 	=> $lokasiawal,
				'lat' 	=> $lat,
				'lon' 	=> $lon, 
				'idtujuan' 	=> $idtujuan,
				'aksicari' 	=> $aksicari,
			);
			
			
		 
		$this->load->view('layout/site_header', $data);				
		$this->load->view('site/carirute', $data);
		$this->load->view('layout/site_footer', $data); 
		$this->load->view('site/carirute_js', $data);
 		
	}
	
	
	
	public function carirutehasil1(){
		
 
		$lokasiawal = $this->input->post('lokasiawal');
		$lat = $this->input->post('lat');
		$lon = $this->input->post('lon');
		$idtujuan = $this->input->post('tujuan');
		$aksicari = 'YA';		
		 
		$data 	= array(
				'aplikasi' => $this->aplikasi_model->get_aplikasi(),
				'kecamatans' 	=> $this->kecamatan_model->listing(), 
				'tujuan' 	=> $this->tempat_model->detail($idtujuan), 
				'lokasiawal' 	=> $lokasiawal,
				'lat' 	=> $lat,
				'lon' 	=> $lon, 
				'idtujuan' 	=> $idtujuan,
				'aksicari' 	=> $aksicari,
			);
			
			
		 
		$this->load->view('layout/site_header', $data);				
		$this->load->view('site/carirutehasil1', $data);
		$this->load->view('layout/site_footer', $data); 
		 
		$this->load->view('site/carirutehasil1_js', $data);	
		 
		
	}
	
	
	public function tambahcaritemp(){ 
			 
		$hasil=$this->input->post('a');
		$totaljarak=$this->input->post('b'); 
			 
		$this->session->set_userdata('hasildijkstra', $hasil); 
	
	}
	
	
	
	public function carirutehasil2(){
		
		 
		$lokasiawal = $this->input->post('lokasiawal');
		$lat = $this->input->post('lat');
		$lon = $this->input->post('lon');
		$idtujuan = $this->input->post('tujuan');
		$aksicari = 'YA';		
		 
		$data 	= array(
				'aplikasi' => $this->aplikasi_model->get_aplikasi(),
				'kecamatans' 	=> $this->kecamatan_model->listing(), 
				'tujuan' 	=> $this->tempat_model->detail($idtujuan), 
				'lokasiawal' 	=> $lokasiawal,
				'lat' 	=> $lat,
				'lon' 	=> $lon, 
				'idtujuan' 	=> $idtujuan,
				'aksicari' 	=> $aksicari,
			);
			
			
		 
		$this->load->view('layout/site_header', $data);				
		$this->load->view('site/carirutehasil2', $data);
		$this->load->view('layout/site_footer', $data);  
		$this->load->view('site/carirutehasil2_js', $data);	
		 
		
	}
	
	
	public function tambahcaritemp2(){ 
			 
		$hasil=$this->input->post('a');
		$totaljarak=$this->input->post('b'); 
			
		 
		$this->session->set_userdata('hasildijkstra2', $hasil); 
	
	}
	
	
	
	
	public function getroute(){
		
		  
		$aksicari = 'YA';		
		 
		$data 	= array(
				'aplikasi' => $this->aplikasi_model->get_aplikasi(),
				'kecamatans' 	=> $this->kecamatan_model->listing(), 
				'aksicari' 	=> $aksicari,
			);
			
			
		 
		$this->load->view('layout/site_header', $data);				
		$this->load->view('site/getroute', $data);
		$this->load->view('layout/site_footer', $data);  
		$this->load->view('site/getroute_js', $data);	
		 
		
	}
	
	
	public function tambahgetroute(){ 
			 
		$hasil=$this->input->post('a');
		$totaljarak=$this->input->post('b'); 
			
		 
		$this->session->set_userdata('hasilgetroute', $hasil); 
	
	}
	 
	 
	public function terdekat(){
		
		$halamanke = $this->uri->segment(4);
		$idkecamatan = $this->uri->segment(3);
		
		
		//pengaturan pagination
		$config['base_url'] = base_url().'site/terdekat/'.$idkecamatan;
		$config['total_rows'] = $this->tempat_model->jumlah_tempat($idkecamatan);
		$config['per_page'] = '99';
		
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = ' First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last  ';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next  ';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		//inisialisasi config
		$this->pagination->initialize($config);
		
		
		if($this->input->post('cari')) {
			$lokasiawal = $this->input->post('lokasiawal');
			$lat = $this->input->post('lat');
			$lon = $this->input->post('lon'); 
			$idkecamatan = $this->input->post('idkecamatan');
			$aksicariterdekat = 'YA';

			$data 	= array(
				'aplikasi' => $this->aplikasi_model->get_aplikasi(),
				'kecamatans' 	=> $this->kecamatan_model->listing(),
				'tempats' 	=> $this->tempat_model->get_all($config['per_page'],$halamanke, $idkecamatan), 				
				'lokasiawal' 	=> $lokasiawal,
				'lat' 	=> $lat,
				'lon' 	=> $lon, 
				'idkecamatan' 	=> $idkecamatan, 
				'aksicariterdekat' 	=> $aksicariterdekat,
			);
			
		} else {
			$lokasiawal = '';
			$lat = '';
			$lon = '';
			$idkecamatan = ''; 
			$aksicariterdekat = '';
			
			$data 	= array(
				'aplikasi' => $this->aplikasi_model->get_aplikasi(),
				'kecamatans' 	=> $this->kecamatan_model->listing(),
				'tempats' 	=> null, 				
				'lokasiawal' 	=> $lokasiawal,
				'lat' 	=> $lat,
				'lon' 	=> $lon,
				'idkecamatan' 	=> $idkecamatan,
				'aksicariterdekat' 	=> $aksicariterdekat,
			);
			
		}
		
		
			
			
		 
		$this->load->view('layout/site_header', $data);				
		$this->load->view('site/terdekat', $data);
		
		if($aksicariterdekat=="YA") {
			//$this->site_model->hapuscaritemp();
			$this->load->view('site/hasilterdekat_js', $data);
			 
			$this->load->view('site/terdekat_hasil', $data);
		} else {
			$this->load->view('site/terdekat_js', $data);
		}
		
		
		 
		$this->load->view('layout/site_footer', $data);
		
		
	}
	
	
	
 	
 
	
	
	
}