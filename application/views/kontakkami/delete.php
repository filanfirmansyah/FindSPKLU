 <button class="btn btn-sm btn-danger " data-toggle="modal" data-target="#myModal<?php echo $kontakkami->id_kontakkami ?>" title="Delete kontak kami"> <i class = "fa fa-trash-o"> </i> </button>
	 
	 
	 
	 
                            
	<div class="modal fade" id="myModal<?php echo $kontakkami->id_kontakkami ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel" style="text-align:left;">Hapus Data Kontak Kami </h4>
				</div>
				<div class="modal-body" style="text-align:left;">
					Apakah Anda yakin ingin menghapus data kontak kami dengan judul :: <?php echo $kontakkami->judul_pesan ?>?
				</div>
				<div class="modal-footer">

				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="margin-top:2px;"> Close </button>
				<a href="<?php echo base_url('kontakkami/delete/'.$kontakkami->id_kontakkami)?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Ya. Hapus data ini !</a>
				

				</div>
			</div>
		</div>
	</div>

