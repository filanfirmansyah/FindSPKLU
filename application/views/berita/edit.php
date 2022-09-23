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
			echo form_open(base_url('berita/edit'),'class="form-horizontal" enctype="multipart/form-data" parsley-validate');

			?>

			
			<div class="form-group hidden">
			<label class="col-lg-3 control-label"> </label>
			<div class="col-lg-2">
			<input type="text" name="id_berita" class="form-control" placeholder="ID berita" value="<?php echo $berita->id_berita ?>">
			</div>
			</div>
			
			  
			 
			 

			<div class="form-group">
			<label class="col-lg-3 control-label">Judul Berita</label>
			<div class="col-lg-4">
			<input type="text" name="judul_berita" class="form-control required" placeholder="Judul Berita" value="<?php echo $berita->judul_berita ?>">
			</div>
			</div>
			
			
 
			
			 
 

			<div class="form-group">
			<label class="col-lg-3 control-label">Isi Berita</label>
			<div class="col-lg-8">
			<textarea name="isi_berita" class="form-control textareaku required"><?php  echo $berita->isi_berita ?></textarea>
			</div>
			</div>

			
			<div class="form-group">
				<label class="control-label col-lg-3" for="focusedInput">Foto Berita</label>
				<div class="controls  col-lg-4">
					<?php 
						if ($berita->foto_berita!="") {
							echo "<img src='".base_url()."upload/foto_berita/".$berita->foto_berita."' width=200>";
						} else {
							echo "<img src='".base_url()."upload/foto_berita/noimage.jpg' width=200>";
						}
					?>
				    <input class="" name="foto" id="focusedInput" type="file" >
					<input class="" name="fotolama" id="focusedInput" type="hidden" value="<?php echo $berita->foto_berita; ?>">
				</div>
			  </div>
			 
			 


			<div class="form-group">
			<label class="col-lg-3 control-label"></label>
			<div class="col-lg-3">

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

 
		  