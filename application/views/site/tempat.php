<div id="content">
  <div class="container">
    <div class="catelog_c">
      

	  <div class="title clearfix">
        <h2>SPKLU 
		<?php 
		if($kecamatan!=null) {
			echo " :: KECAMATAN ".$kecamatan->nama_kecamatan;
		}
		?>
		</h2>
      </div>
	  
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 ">
          <div class="sidebar sidebar_1 " >
             
            
            <div class="side_box side_box_1 red5 col_box">
              <h5> KECAMATAN </h5>
              <ul class="tgl_c">
				
				 
				 
				<?php 
				foreach ($kecamatans as $kecamatan) {
					$query=$this->db->query("SELECT * FROM tempat WHERE id_kecamatan='".$kecamatan->id_kecamatan."'");
					$jumlah = $query->num_rows(); 
					
					if($jumlah>0) {
				?>
                <li><a href="<?php echo base_url();?>site/tempat/<?php echo $kecamatan->id_kecamatan; ?>"><span></span><?php echo $kecamatan->nama_kecamatan; ?>
                  <label class="pull-right"style="font-weight: normal;" ><?php echo $jumlah; ?></label>
				  
				  </a>
				  
                </li> 
                <?php 
					}
				} ?>
				
				<?php
				$query=$this->db->query("SELECT * FROM tempat ");
					$jumlah = $query->num_rows();
				?>
				<li><a href="<?php echo base_url();?>site/tempat"><span></span>SEMUA
                  <label class="pull-right"style="font-weight: normal;" ><?php echo $jumlah; ?></label> </a>
				 </li> 
				 
				 
              </ul>
            </div>
             
          </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
          <div class="product_c">
             
            <div class="row view-grid animated  fadeInUp" data-animation="fadeInUp" >
				<?php  
				if($tempats!=null) {
				foreach ($tempats as $data) {
					
					$query=$this->db->query("SELECT * FROM foto WHERE id_tempat='".$data->id_tempat."'");
					$xxx = $query->result();
					$foto = $xxx[0]->file_foto;
				?>
						
				<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" style="min-height: 360px;" >
                <div class="main_box">
                  <div class="box_1"> <a href="<?php echo base_url(); ?>site/tempat_detail/<?php echo $data->id_tempat; ?>"><img alt="alt"   src="<?php echo base_url(); ?>upload/foto_tempat/<?php echo $foto; ?>" draggable="false" width="100%" height="300px"></a>
                     
                  </div>
                  <div class="desc" >
                    <h5><a href="<?php echo base_url(); ?>site/tempat_detail/<?php echo $data->id_tempat; ?>"><?php echo $data->nama_tempat; ?></a></h5>
                    <p><?php echo $data->alamat_tempat; ?></p>
                     
                  </div>
                </div>
              </div>
               
            
				
			<?php }
				}			?>
			
			</div>
			
			
            <div class="page_c clearfix red5">
			<?php echo $halaman; ?>
			</div>
			
			<br/><br/>
			
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
