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
                 
	
				<p><a href="<?php echo base_url('berita/tambah') ?>" class="btn btn-sm btn-success">
				<i class="fa fa-plus"></i> Tambah Berita </a></p>

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
					<th>Foto</th> 
					<th width=80>Aksi</th>
				</tr>
				</thead>
					<tbody>
						<?php $i= 1; foreach($berita as $berita) { 
						 
						?>
						
						<tr >
							<td class=center ><?php echo $i ?></td>  
							<td style="text-align:left"><?php echo $berita->tgl_buat ?></td>
							<td style="text-align:left"><?php echo $berita->judul_berita ?></td>
							<td style="text-align:left"><?php echo substr($berita->isi_berita,0,200); ?> ...</td> 
							<td style="text-align:left"><img src="<?php echo base_url(); ?>upload/foto_berita/<?php echo $berita->foto_berita ?>" width="100px"></td>
							
							<td class=center >

							<a href="<?php echo base_url('berita/edit/'.$berita->id_berita) ?>" class="btn btn-sm btn-warning " title="Edit berita">
							<i class="fa fa-pencil"></i></a>

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

 