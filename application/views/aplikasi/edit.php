   <div class="page-title">
            <div class="title_left">
              <h4><?php echo $title ?> <small>/ <?php echo $subtitle ?> </small></h4>
            </div>
            <div class="title_right"> 
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-xs-12 col-lg-12">
              <div class="x_panel" style="margin-top:5px;">
                
                <div class="x_content">
				<br/>
				
					<?php
			 
				if($this->session->flashdata('sukses')) {
					echo '<div class="alert alert-success fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>';
					echo $this->session->flashdata('sukses');
					echo '</div>';
				} else if($this->session->flashdata('gagal')) {

				  echo '<div class="alert alert-danger fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>';
				  echo $this->session->flashdata('gagal');
				  echo '</div>';
				}
				?>
              
			 
			<form method="POST" enctype="multipart/form-data"  action="<?php echo base_url('aplikasi/edit'); ?>" class="form-horizontal" parsley-validate>
			
			
			<div class="form-group">
			<label class="col-lg-3 control-label"> Nama Aplikasi</label>
			<div class="col-lg-7">
			<input type="text" name="nama_aplikasi" class="form-control required" placeholder="Nama aplikasi" value="<?php echo $aplikasi->nama_aplikasi ?>">
			</div>
			</div>

			<div class="form-group">
			<label class="col-lg-3 control-label"> Pemilik</label>
			<div class="col-lg-4">
			<input type="text" name="nama_pemilik" class="form-control required" placeholder="Nama Pemilik" value="<?php echo $aplikasi->nama_pemilik ?>">
			</div>
			</div>
			
			<div class="form-group">
			<label class="col-lg-3 control-label"> Alamat Pemilik</label>
			<div class="col-lg-7">
			<input type="text" name="alamat_pemilik" class="form-control required" placeholder="Alamat Pemilik" value="<?php echo $aplikasi->alamat_pemilik ?>">
			</div>
			</div>
			
			
			<div class="form-group">
			<label class="col-lg-3 control-label"> Koordinat</label>
			<div class="col-lg-7">
			<input type="text" name="koordinat_pemilik" class="form-control required" placeholder="Koordinat" value="<?php echo $aplikasi->koordinat_pemilik ?>">
			</div>
			</div>
			
			<div class="form-group">
			<label class="col-lg-3 control-label"> Notelp Pemilik</label>
			<div class="col-lg-7">
			<input type="text" name="notelp_pemilik" class="form-control required" placeholder="Notelp Pemilik" value="<?php echo $aplikasi->notelp_pemilik ?>">
			</div>
			</div>
			
			<div class="form-group">
			<label class="col-lg-3 control-label"> Email Pemilik</label>
			<div class="col-lg-7">
			<input type="text" name="email_pemilik" class="form-control required" placeholder="Email Pemilik" value="<?php echo $aplikasi->email_pemilik ?>">
			</div>
			</div>

			<div class="form-group">
			<label class="col-lg-3 control-label"> Tentang Kami</label>
			<div class="col-lg-7">
			<textarea name="tentang_kami" class="form-control required textareaku" ><?php echo $aplikasi->tentang_kami ?></textarea>
			</div>
			</div>
			 
		 
			  
			  
			  
			  <div class="form-group">
				<label class="control-label col-lg-3" for="focusedInput">Logo</label>
				<div class="controls  col-lg-4">
					<?php 
						if ($aplikasi->logo_aplikasi!="") {
							echo "<img src='".base_url()."upload/".$aplikasi->logo_aplikasi."' width=200>";
						} else {
							echo "<img src='".base_url()."upload/noimage.jpg' width=200>";
						}
					?>
				    <input class="" name="logo" id="focusedInput" type="file" >
					<input class="" name="logolama" id="focusedInput" type="hidden" value="<?php echo $aplikasi->logo_aplikasi; ?>">
				</div>
			  </div>
			 
			 
			 	<div class="form-group">
				<label class="control-label col-lg-3" for="focusedInput">Fav Icon</label>
				<div class="controls  col-lg-4">
					<?php 
						if ($aplikasi->icon_aplikasi!="") {
							echo "<img src='".base_url()."upload/".$aplikasi->icon_aplikasi."' width=50>";
						} else {
							echo "<img src='".base_url()."upload/noimage.jpg' width=200>";
						}
					?>
				    <input class="" name="icon" id="focusedInput" type="file" >
					<input class="" name="iconlama" id="focusedInput" type="hidden" value="<?php echo $aplikasi->icon_aplikasi; ?>">
				</div>
			  </div>
			  
			  
			  

			<hr />
			<div class="form-group">
			<label class="col-lg-3 control-label"></label>
			<div class="col-lg-5">
			<input type="submit" name="submit" class="btn btn-success default" value="Submit">
			<input type="reset" name="reset" class="btn btn-warning default" value="Reset"> 
			</div>
			</div>
			 

			
			<?php
			//close form
			echo form_close();
			?>


			
			
			

			  </div>
              </div>
            </div>
          </div>

 
		  