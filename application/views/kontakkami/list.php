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
				<br/>

				<div class="table-responsive" >
				<table id="datatable-responsive" class="table table-condensed table-striped " cellspacing="0" width="100%">
				<thead>
				<tr>
					<th width=20>No</th>  
					<th>Tgl Buat</th>
					<th>Judul</th>
					<th>Isi</th>
					<th>Status</th> 
					<th width=80>Aksi</th>
				</tr>
				</thead>
					<tbody>
						<?php $i= 1; foreach($kontakkami as $kontakkami) { 
						 
						?>
						
						<tr >
							<td class=center ><?php echo $i ?></td>  
							<td style="text-align:center"><?php echo $kontakkami->tgl_buat ?></td>
							<td style="text-align:left"><?php echo $kontakkami->judul_pesan ?></td>
							<td style="text-align:left"><?php echo substr($kontakkami->isi_pesan,0,200); ?> ...</td> 
							<td style="text-align:center"> 
							
							<?php
							if($kontakkami->status_kontakkami=="Baru") {
								echo "<label class='label label-warning'>Baru</label>";
							} else {
								echo "<label class='label label-success'>Dijawab</label>";
							}
							?>
							
							</td>
							
							<td class=center >
							
							<?php
							if($kontakkami->status_kontakkami=="Baru") { ?>
							<a href="<?php echo base_url('kontakkami/jawabpesan/'.$kontakkami->id_kontakkami) ?>" class="btn btn-sm btn-success " title="Jawab Pesan">
							<i class="fa fa-envelope"></i></a>
							<?php } else { ?>
							<a href="<?php echo base_url('kontakkami/jawabpesan/'.$kontakkami->id_kontakkami) ?>" class="btn btn-sm btn-warning " title="Jawab Pesan">
							<i class="fa fa-envelope"></i></a>
							<?php } ?>
							
							<?php  include('delete.php'); ?>

							</td>
						</tr>
						<?php $i++; }?>
					</tbody>
				</table>
				</div>
				 
 
 
 
			  </div>
              </div>
            </div>
          </div>

 