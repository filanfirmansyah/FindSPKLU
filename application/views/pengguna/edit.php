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
			echo form_open(base_url('pengguna/edit'),'class="form-horizontal" enctype="multipart/form-data" parsley-validate');

			?>

			
			<div class="form-group hidden">
			<label class="col-lg-3 control-label"> </label>
			<div class="col-lg-2">
			<input type="text" name="id_pengguna" class="form-control" placeholder="ID pengguna" value="<?php echo $pengguna->id_pengguna ?>">
			</div>
			</div>
			
			  <div class="form-group">
				<label class="control-label col-lg-3" for="focusedInput">Foto</label>
				<div class="controls  col-lg-4">
					<?php 
						if ($pengguna->foto!="") {
							echo "<img src='".base_url()."upload/foto_pengguna/".$pengguna->foto."' width=200>";
						} else {
							echo "<img src='".base_url()."upload/foto_pengguna/noimage.jpg' width=200>";
						}
					?>
				    <input class="" name="foto" id="focusedInput" type="file" >
					<input class="" name="fotolama" id="focusedInput" type="hidden" value="<?php echo $pengguna->foto; ?>">
				</div>
			  </div>
			 
			 
			 

			<div class="form-group">
			<label class="col-lg-3 control-label">Nama Lengkap</label>
			<div class="col-lg-4">
			<input type="text" name="nama" class="form-control required" placeholder="Nama Lengkap" value="<?php echo $pengguna->nama_lengkap ?>">
			</div>
			</div>
			
			
 
			
			<div class="form-group">
			<label class="col-xs-12 col-lg-3 control-label">Jenis Kelamin</label>
			<div class="col-xs-12 col-lg-4">
				<select name="jenis_kelamin" class="form-control required" > 
					<option value="Laki-laki" <?php if($pengguna->jenis_kelamin=="Laki-laki") { echo "selected=selected"; } else { echo ""; } ?> >Laki-laki</option>
					<option value="Perempuan" <?php if($pengguna->jenis_kelamin=="Perempuan") { echo "selected=selected"; } else { echo ""; } ?>>Perempuan</option>
				</select>
			</div>
			</div>
			
 

			<div class="form-group">
			<label class="col-lg-3 control-label">No. Telepon</label>
			<div class="col-lg-3">
			<input type="text" name="no_telepon" class="form-control required" placeholder="No Telepon" value="<?php  echo $pengguna->no_telepon ?>">
			</div>
			</div>

 


			<div class="form-group">
			<label class="col-lg-3 control-label"></label>
			<div class="col-lg-3">

			</div>
			</div>



			<div class="form-group">
			<label class="col-lg-3 control-label">Username</label>
			<div class="col-lg-3">
			<input type="text" name="username" class="form-control required" placeholder="Email" value="<?php  echo $pengguna->username ?>">
			</div>
			</div>



			<div class="form-group">
			<label class="col-lg-3 control-label">Password</label>
			<div class="col-lg-3">
			<input type="password" name="passbaru" class="form-control" placeholder="Password" value="" autocomplete="off">
			* Kosongkan password jika tidak ingin mengganti password.
			<input type="hidden" name="passlama" class="form-control" placeholder="Password" value="<?php  echo $pengguna->password ?>">
			</div>
			</div>
			
			
			<div class="form-group">
			<label class="col-xs-12 col-lg-3 control-label"> </label>
			<div class="col-xs-12 col-lg-2">

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

 
		  