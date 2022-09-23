
<style>
.ideas-hover figure img, .ideas-hover figure, #content .box  {
  
    position: relative;
    display: block;
    width: 100%;
    height: 450px;
	object-fit: cover;
}

</style>

<!--SLIDER START-->
<div class="flexslider home-slider">
  <ul class="slides">
    <li> <img alt="alt" src="<?php echo base_url(); ?>assets/cooncook/media/slides/1.jpg" width="1600" height="800">
      <div class="flex-caption">
        <div class="banner">
          <h1>LOKASI SPKLU</h1>
          <div class="line_1"></div>
          <h4>SE- PROVINSI DKI JAKARTA</h4>
          <br/>
		  <p style="padding:10px;">Website ini memiliki konten utama lokasi SPKLU seluruh kecamatan di DKI Jakarta. </p>
           
      </div>
    </li>
   
    <li> <img alt="alt" src="<?php echo base_url(); ?>assets/cooncook/media/slides/3.jpg" width="1600" height="800">
      <div class="flex-caption">
        <div class="banner">
          <h1>PENCARIAN RUTE</h1>
          <div class="line_1"></div>
          <h4>METODE DIJKSTRA</h4>
          <br/>
		  <p>Algoritma pencarian rute terdekat membantu pengguna menuju lokasi SPKLU dengan mudah dan cepat.</p>
           
      </div>
    </li>
	
	
	 
	
  </ul>
  <div class="container">
    <div class="banner_nav ">
      <div class="scroll_down">Scroll down <span class="fa fa-arrow-circle-down"></span></div>
    </div>
  </div>
</div>
<!--SLIDER END -->




<div id="content">
  <div class="container">
    <div class="h_row_1 ideas-hover">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12  animated" data-animation="rollIn" >
		
		<?php 
		$berita = $beritas;
		
		?>
          <div class="box hg_510 box_1 red5">
            <figure class="effect-chico"> <img alt="alt" src="<?php echo base_url(); ?>upload/foto_berita/<?php echo $berita[0]->foto_berita; ?>" width="760" height="510" >
              <figcaption> </figcaption>
            </figure>
            <div class="box_inn">
              <h2><a href="<?php echo base_url(); ?>site/berita_detail/<?php echo $berita[0]->id_berita; ?>"><?php echo $berita[0]->judul_berita; ?></a></h2>
               
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 animated" data-animation="bounceInRight">
          <div class="box hg_510 box_2 red5">
            <figure class="effect-chico"> <img alt="alt" src="<?php echo base_url(); ?>upload/foto_berita/<?php echo $berita[1]->foto_berita; ?>" width="360" height="510" >
              <figcaption> </figcaption>
            </figure>
            <div class="box_inn" style="background-color:#FFF !important; padding:10px;">
              <h3><a href="<?php echo base_url(); ?>site/berita_detail/<?php echo $berita[1]->id_berita; ?>" ><?php echo $berita[1]->judul_berita; ?></a></h3>
               
            </div>
          </div>
        </div>
      </div>
    </div>
    


	 <br/>
	 <br/>
	 <div class=" animated" data-animation="fadeInUp">
      <div class="clearfix">
        <h3>SPKLU - STASIUN PENGISIAN KENDARAAN LISTRIK UMUM</h3>
      </div>
      <div class="carosel product_c">
          <div class="row"> 
            <!-- Place somewhere in the <body> of your page -->
            <div >
               
			 <ul class="bxcarousel" >
            
                <?php  
				foreach ($tempats as $data) {
					
					if($data->id_tempat!="") {
					
					$query=$this->db->query("SELECT * FROM foto WHERE id_tempat='".$data->id_tempat."'");
					$xxx = $query->result();
					
					if($xxx!=null) {
						$foto = $xxx[0]->file_foto;
					} else {
						$foto = "noimage.jpg";
					}
				?>
				 
			  
			  <li>
                  <div class="main_box">
                    <div class="box_1"> <img alt="alt"  src="<?php echo base_url(); ?>upload/foto_tempat/<?php echo $foto; ?>" width="259" height="200">
                     
                                
                                </div>
                    <div class="desc">
                      <h5><a href="<?php echo base_url(); ?>site/tempat_detail/<?php echo $data->id_tempat; ?>"><?php echo $data->nama_tempat; ?></a></h5>
                    <p><?php echo $data->alamat_tempat; ?></p>
                    </div>
                  </div>
                </li>
				
               
            
				
			<?php } 
			
				}
				?>
			
                
                
               
                
              </ul>
            

			
			</div>
          </div>
        </div>
    </div>
  </div>
</div>


