 <div id="content">
    	<div class="container">
            <div class="title clearfix">
                <h2>BERITA </h2>
                 
            </div>
            <div class="blog_c ideas-hover">
            	<div class="row">
                	<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    	
						
						<?php  
						foreach ($beritas as $berita) {
						?>
						
						<div class="blog_blk red5 clearfix animated" data-animation="rollIn">
                        
                        
                        <a href="<?php echo base_url(); ?>site/berita_detail/<?php echo $berita->id_berita; ?>"> 
                        
                        	<div class="box ">
                            
                             <figure class="effect-chico">     <img alt="alt"  src="<?php echo base_url(); ?>upload/foto_berita/<?php echo $berita->foto_berita; ?>"  />          <figcaption></figcaption>
							</figure>
                            
                             
                            
                            <div class="rounded_box"><img alt="alt"  src="<?php echo base_url(); ?>upload/<?php echo $aplikasi->logo_aplikasi; ?>" /></div></div> </a>
                            
                            
                            <div class="blog_desc">
                            	<h5><a href="<?php echo base_url(); ?>site/berita_detail/<?php echo $berita->id_berita; ?>"><?php echo $berita->judul_berita; ?></a></h5>
                                <p><?php echo substr($berita->isi_berita,0,300); ?>... <a href="<?php echo base_url(); ?>site/berita_detail/<?php echo $berita->id_berita; ?>">Selengkapnya</a></p>
                            </div>
                            <div class="tag_c clearfix">
                                <ul>
                                    <li><span class="fa fa-calendar"></span><span><?php echo $berita->tgl_buat; ?></span></li>
                                    <li><span class="fa fa-user"></span>Administrator </li>
                                     
                                </ul>
                                <a href="<?php echo base_url(); ?>site/berita_detail/<?php echo $berita->id_berita; ?>" class="share"><span class="fa fa-mail-forward"></span>Detail</a>
                            </div>
                        </div>
						
						
						
						<?php
						} 
						?>
						
						
                          
						<div class="page_c clearfix red5">
                        	 
                            	<?php echo $halaman; ?>
                             
                             
                        </div>
						
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
  