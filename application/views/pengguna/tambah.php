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
			echo form_open(base_url('pengguna/tambah'),'class="form-horizontal" enctype="multipart/form-data" parsley-validate');
			?>

			
			  <div class="form-group">
				<label class="control-label col-lg-3" for="focusedInput">Foto</label>
				<div class="controls  col-lg-4">
					 
				    <input class="" name="foto" id="focusedInput" type="file" > 
				</div>
			  </div>
			 
			 
			 
			
			
			<div class="form-group">
			<label class="col-xs-12 col-lg-3 control-label">Nama Lengkap</label>
			<div class="col-xs-12 col-lg-4">
			<input type="text" name="nama" class="form-control required" placeholder="Nama Lengkap" value="<?php echo set_value('nama_lengkap') ?>" required">
			</div>
			</div>
			
		 
			
			
			<div class="form-group">
			<label class="col-xs-12 col-lg-3 control-label">Jenis Kelamin</label>
			<div class="col-xs-12 col-lg-4">
				<select name="jenis_kelamin" class="form-control required" >
					<option value="">-- Jenis Kelamin --</option>
					<option value="Laki-laki">Laki-laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
			</div>
			</div>
			
 

			<div class="form-group">
			<label class="col-xs-12 col-lg-3 control-label">No. Telepon</label>
			<div class="col-xs-12 col-lg-4">
			<input type="text" name="no_telepon" class="form-control required" placeholder="No Telepon" value="<?php echo set_value('no_telepon') ?>" >
			</div>
			</div>

 
			<div class="form-group">
			<label class="col-xs-12 col-lg-3 control-label"> </label>
			<div class="col-xs-12 col-lg-2">

			</div>
			</div>



			<div class="form-group">
			<label class="col-xs-12 col-lg-3 control-label">Username</label>
			<div class="col-xs-12 col-lg-4">
			<input type="text" name="username" class="form-control required" placeholder="Username" value="<?php echo set_value('username') ?>" >
			</div>
			</div>


			<div class="form-group">
			<label class="col-xs-12 col-lg-3 control-label">Password</label>
			<div class="col-xs-12 col-lg-4">
			<input type="text" name="pass" class="form-control required" placeholder="Password" value="<?php echo set_value('pass') ?>" >
			</div>
			</div>

			
			<div class="form-group">
			<label class="col-xs-12 col-lg-3 control-label"> </label>
			<div class="col-xs-12 col-lg-2">

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

 
		  
		  
		  
 