 <button class="btn btn-sm btn-danger " data-toggle="modal" data-target="#myModal<?php echo $d->id_foto ?>" title="Delete Foto"> <i class = "fa fa-trash-o"> </i> </button>
	 
	 
	 
	 
                            
	<div class="modal fade" id="myModal<?php echo $d->id_foto ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel" style="text-align:left;">Hapus Data Foto </h4>
				</div>
				<div class="modal-body" style="text-align:left;">
					Apakah Anda yakin ingin menghapus data foto :: <?php echo $d->file_foto; ?>?
				</div>
				<div class="modal-footer">

				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="margin-top:2px;"> Close </button>
				<a href="<?php echo base_url('tempat/hapusfoto/'.$tempat->id_tempat."/".$d->id_foto)?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Ya. Hapus data ini !</a>
				

				</div>
			</div>
		</div>
	</div>

