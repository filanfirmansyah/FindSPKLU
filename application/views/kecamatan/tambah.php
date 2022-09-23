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
			//open form 
			echo form_open(base_url('kecamatan/tambah'),'class="form-horizontal" enctype="multipart/form-data" parsley-validate');
			?>

			 
			
			
		 	<div class="form-group">
			<label class="col-xs-12 col-lg-3 control-label">Nama Kelompok Kecamatan</label>
			<div class="col-xs-12 col-lg-4">
			<input type="text" name="nama" class="form-control required" placeholder="Nama Kecamatan" value="<?php  echo set_value('nama_kecamatan') ?>" >
			</div>
			</div> 
			
			
			 
			
			
		 
			 
			  
			<hr />
			
			<div class="form-group">
			<label class="col-xs-12 col-lg-3 control-label"></label>
			<div class="col-xs-12 col-lg-5">
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

 
		  
		  
		  
 