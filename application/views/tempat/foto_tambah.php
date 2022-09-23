 
						 <form  method="POST" action="<?php echo base_url();?>tempat/simpanfoto/" class='form-horizontal' enctype="multipart/form-data" parsley-validate >
		  
						  
			 
							  <br/><br/>
							<input type="hidden" name="id_tempat" value="<?php echo $this->uri->segment(3); ?>">
							
							 <div class='form-group'>
								<label class='col-xs-3 control-label' > Foto   </label>
								<div class='col-xs-6'> 
								  <input class="" name="foto" id="focusedInput" type="file" > 
								</div>
							</div>
					 
 							

							<div class='form-group'>
								<label class='col-xs-3 control-label' > </label>
								<div class='col-xs-6'>
										 
								  <input type=submit value=Simpan class="btn btn-success btn-flat">
												 
								</div>
							</div>
							  
						
							 
							 
						 </form> 
						   
					 
           
		 
 
	<script>
	 
		$('#modal_ajax .judul').html('Tambah Foto'); 
	  
	</script>		