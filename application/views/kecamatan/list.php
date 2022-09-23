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
                 
	
				<p><a href="<?php echo base_url('kecamatan/tambah') ?>" class="btn btn-sm btn-success">
				<i class="fa fa-plus"></i> Tambah Kecamatan </a></p>

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
					<th>Nama Kecamatan</th>  
					<th width=150>Aksi</th>
				</tr>
				</thead>
					<tbody>
						<?php $i= 1; foreach($kecamatan as $kecamatan) { 
						
						  
						?>
						
						<tr >
							<td class=center ><?php echo $i ?></td> 
							<td style="text-align:left"><?php echo $kecamatan->nama_kecamatan ?></td> 
							 
							 
							<td class=center >

							<a href="<?php echo base_url('kecamatan/edit/'.$kecamatan->id_kecamatan) ?>" class="btn btn-sm btn-warning " title="Edit kecamatan">
							<i class="fa fa-pencil"></i> Edit</a>

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

 