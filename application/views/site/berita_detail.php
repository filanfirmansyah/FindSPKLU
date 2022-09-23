 <div id="content">
    	<div class="container">
            <div class="title clearfix">
                <h2>DETAIL - <?php echo $berita->judul_berita; ?> </h2>
                <div class="title_right"> <a href="<?php echo base_url(); ?>site/berita" class="backtocate"><span class="fa fa-arrow-circle-left"></span>Kembali</a> </div> 
            </div>
            <div class="blog_c ideas-hover">
            	<div class="row">
                	<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    	
						
 						<div class="blog_blk red5 clearfix animated" data-animation="rollIn">
                        
                        
                        <a href="<?php echo base_url(); ?>site/berita_detail/<?php echo $berita->id_berita; ?>"> 
                        
                        	<div class="box ">
                            
                             <figure class="effect-chico">     <img alt="alt"  src="<?php echo base_url(); ?>upload/foto_berita/<?php echo $berita->foto_berita; ?>"  />          <figcaption></figcaption>
							</figure>
                            
                             
                            
                            <div class="rounded_box"><img alt="alt"  src="<?php echo base_url(); ?>upload/<?php echo $aplikasi->logo_aplikasi; ?>" /></div></div> </a>
                            
                            
                            <div class="blog_desc">
                            	 
                                <p><?php echo $berita->isi_berita ; ?> </p>
                            </div>
                            <div class="tag_c clearfix">
                                <ul>
                                    <li><span class="fa fa-calendar"></span><span><?php echo $berita->tgl_buat; ?></span></li>
                                    <li><span class="fa fa-user"></span>Administrator </li>
                                     
                                </ul>
                                 
                            </div>
                        </div>
						
						<?php
						
						$query=$this->db->query("UPDATE berita SET jml_dibaca=jml_dibaca+1 WHERE id_berita='".$berita->id_berita."'");
					
						 
					
						
						?>
                          
						
						<br/><br/>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    	<div class="sidebar">
                        	 
                            <div class="side_box side_box_2 red5  animated" data-animation="bounceInRight">
                            	<h5>BERITA POPULER</h5>
                                <ul>
								
								<?php  
								foreach ($beritas_populer as $p) {
								?>
                                	<li><div class="post_img"><img alt="alt"  src="<?php echo base_url(); ?>upload/foto_berita/<?php echo $p->foto_berita; ?>" width="100%" height="100%" /></div><a href="<?php echo base_url(); ?>site/berita_detail/<?php echo $p->id_berita; ?>" style="text-decoration:none;"><?php echo $p->judul_berita; ?></a></li>
									
								<?php } ?>								
                                    
                                </ul>
                            </div>
                           
						   
						   </div>
                    </div>
                </div>
            </div>
    	</div>
    </div>
  