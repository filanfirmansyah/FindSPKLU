<div id="content">
  <div class="container">
    <div class="title clearfix">
      <h2>DETAIL - <?php echo $tempat->nama_tempat; ?></h2>
      <div class="title_right"> <a href="<?php echo base_url(); ?>site/tempat" class="backtocate"><span class="fa fa-arrow-circle-left"></span>Kembali</a> </div>
    </div>
    <div class="pro_main_c">
      <div class="row">
        <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12 animated  animation-done bounceInLeft" data-animation="bounceInLeft">
          <div class="slider_1 clearfix">
            <div class="clearfix" id="image-block">
  <div id="slider-product" class="flexslider">
    <ul class="slides">
		<?php 
		
			$query=$this->db->query("SELECT * FROM foto WHERE id_tempat='".$tempat->id_tempat."'");
			$fotos = $query->result();
			
			foreach ($fotos as $foto) {		
		?>
			<li> <img src="<?php echo base_url(); ?>upload/foto_tempat/<?php echo $foto->file_foto; ?>"/> </li>
       
		
		<?php } ?>
    </ul>
  </div>
  <div id="carousel" class="flexslider">
    <ul class="slides">
	
	<?php 
		
			$query=$this->db->query("SELECT * FROM foto WHERE id_tempat='".$tempat->id_tempat."'");
			$fotos = $query->result();
			
			foreach ($fotos as $foto) {		
		?>
			<li> <div class="carousel-item"><img src="<?php echo base_url(); ?>upload/foto_tempat/<?php echo $foto->file_foto; ?>"/></div> </li> 
       
		
		<?php } ?>
		
      
       

    </ul>
  </div>
</div>
          </div>
        
		
		 
		</div>
        
		<div class="col-lg-6 col-md-5 col-sm-6 col-xs-12 animated animation-done  bounceInRight" data-animation="bounceInRight">
          <div class="desc_blk">
            <h5>Keterangan</h5>
            <div class="desc_blk_inn">
				<?php echo $tempat->deskripsi_tempat; ?>
            </div>
            <div class="desc_blk_bot clearfix">
                 </div>
            
          </div>
        </div>
      </div>
	  
	  
	  <div class="desc_blk">
            <h5>Peta Lokasi</h5>
            <div class="desc_blk_inn">
				<div id='map'></div> 
				 
            </div>
             
            
          </div>
	  <br/><br/>
	  
       
      <div class=" animated  fadeInUp" data-animation="fadeInUp">
        <div class="clearfix">
          <h3>SPKLU LAINNYA</h3>
        </div>
        <div class="carosel product_c">
          <div class="row"> 
            <!-- Place somewhere in the <body> of your page -->
            <div >
              <ul class="bxcarousel" >
             
			<?php 
		
			$query=$this->db->query("SELECT * FROM tempat WHERE id_kecamatan='".$tempat->id_kecamatan."' AND id_tempat<>'".$tempat->id_tempat."'");
			$tpi = $query->result();
			
			foreach ($tpi as $tempat) {	

				$query=$this->db->query("SELECT * FROM foto WHERE id_tempat='".$tempat->id_tempat."'");
				$fotos = $query->result_array();
				 
			
			?>
		
			<li>
                  <div class="main_box">
                    <div class="box_1"> <img alt="alt"  src="<?php echo base_url();?>upload/foto_tempat/<?php echo $fotos[0]['file_foto'];?>" width="259" height="200">
                    
                     
                    
                    </div>
                    <div class="desc">
                      <h5><a href="<?php echo base_url();?>site/tempat_detail/<?php echo $tempat->id_tempat;?>"><?php echo $tempat->nama_tempat;?></a></h5>
                      <p><?php echo $tempat->alamat_tempat;?></p> 
                    </div>
                  </div>
                </li>
				
			 
			 
			<?php } ?>
				
               
			   </ul>
            </div>
          </div>
        </div>
      </div>
	  
	  
	  
    </div>
  </div>
</div>


