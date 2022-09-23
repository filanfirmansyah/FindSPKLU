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
			echo form_open(base_url('kontakkami/jawabpesan'),'class="form-horizontal" enctype="multipart/form-data" parsley-validate');

			?>

			
			<div class="form-group hidden">
			<label class="col-lg-3 control-label"> </label>
			<div class="col-lg-2">
			<input type="text" name="id_kontakkami" class="form-control" placeholder="ID kontakkami" value="<?php echo $kontakkami->id_kontakkami ?>">
			</div>
			</div>
			
			<h4>DATA PESAN </h4>
			  
			<div class="form-group">
			<label class="col-lg-3 control-label">Nama Pengirim </label>
			<div class="col-lg-4">
			<input type="text" name="nama_pengirim" class="form-control " placeholder="Pengirim" value="<?php echo $kontakkami->nama_pengirim ?>" disabled>
			</div>
			</div> 
			
			<div class="form-group">
			<label class="col-lg-3 control-label">Email </label>
			<div class="col-lg-4">
			<input type="text" name="judul_pesan" class="form-control " placeholder="Pengirim" value="<?php echo $kontakkami->email_pengirim ?>" disabled>
			</div>
			</div> 
			 

			<div class="form-group">
			<label class="col-lg-3 control-label">Judul Pesan</label>
			<div class="col-lg-8">
			<input type="text" name="judul_pesan" class="form-control" placeholder="Judul Pesan" value="<?php echo $kontakkami->judul_pesan; ?>" disabled>
			</div>
			</div>
			 

			<div class="form-group">
			<label class="col-lg-3 control-label">Isi Pesan</label>
			<div class="col-lg-8">
			<textarea name="isi_pesan" class="form-control" disabled><?php  echo $kontakkami->isi_pesan ?></textarea>
			</div>
			</div>
			
			<hr/>
			
			<h4>DATA JAWABAN</h4>
			
			<div class="form-group">
			<label class="col-lg-3 control-label">Jawaban</label>
			<div class="col-lg-8">
			<textarea name="jawaban" class="form-control textareaku required"><?php  if($kontakkami->status_kontakkami=="Baru") {
				echo $kontakkami->isi_pesan."<br/>======================================================================= <br/>
				Jawaban : <br/>";
			  } else {
				echo $kontakkami->jawaban;
			  }
			?>
			
			
			
			
			</textarea>
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
			<input type="submit" name="submit" class="btn btn-success default" value="Kirim">
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

 
		  