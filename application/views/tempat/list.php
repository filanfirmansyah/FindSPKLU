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
                
				<div id=map> </div> <br/>
	
				<p><a href="<?php echo base_url('tempat/tambah') ?>" class="btn btn-sm btn-success">
				<i class="fa fa-plus"></i> Tambah Tempat </a></p>

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
					<th>Nama Tempat</th> 
					<th>Alamat</th>  
					<th>Foto</th>
					<th width=80>Aksi</th>
				</tr>
				</thead>
					<tbody>
						<?php $i= 1; foreach($tempat as $tempat) { ?>
						
						<tr >
							<td class=center ><?php echo $i ?></td>  
							<td style="text-align:left"><?php echo $tempat->nama_tempat ?></td> 
							<td style="text-align:left"><?php echo $tempat->alamat_tempat ?></td>  
							 
							
							<td style="text-align:left"> 
							<?php
							$cari= $this->db->query("SELECT * FROM foto WHERE id_tempat='". $tempat->id_tempat."'");
							  
							$data=$cari->result(); 
							foreach ($data as $d) {
								if($d->file_foto!=="") {
								echo "<img src='".base_url()."/upload/foto_tempat/".$d->file_foto."' width='80px' height='50px'>";
								}
								
							}
							
							?>
							</td> 
							
							<td class=center >

							<a href="<?php echo base_url('tempat/edit/'.$tempat->id_tempat) ?>" class="btn btn-sm btn-warning " title="Edit tempat">
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





<style type="text/css">
		
	div#map{
		width:100%;
		height:350px; 
		margin-right:20px;
		border-radius:5px;
	}
 
	.gm-style-iw { 
		width: 250px; 
	}
		  
	 

	</style>

 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu2vT0kp4UjmRmUwpq0SOONk9RCbG16ds&callback=initMap&language=id&region=ID&style=feature:poi%7Celement:labels.icon%7Cvisibility:off"></script>
	 
<script type="text/javascript">
initialize();
	
	
var geocoder;
	var map;

function initialize()
	{
		 
		var lats = -6.259934;
		var lngs = 106.833622;
		
	 
		// define map center
		var buton = new google.maps.LatLng(lats,lngs);
		var infoWindow = new google.maps.InfoWindow;
		
		// define map options
		var myOptions = {
			zoom: 10,
			center: buton,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			styles: [
				{
				  "featureType": "poi",
				  "stylers": [
					{ "visibility": "off" }
				  ]
				}
			  ]
			
		};
	
	
		// initialize map
		map = new google.maps.Map(document.getElementById("map"), myOptions);
	
 	 
	 	
		 
		<?php
		 
		$query=$this->db->query("SELECT * FROM tempat 
						ORDER BY id_tempat ASC");
		$ti = $query->result();
		
		foreach ($ti as $r) { 
		 
		   
		?>
		
		var html = '<div class=info ><strong> <?php echo strtoupper($r->nama_tempat); ?></strong><br/><?php echo $r->alamat_tempat; ?><br/> </div>';
		 
		var customIcons = {
		  markertempat: {
			icon: '<?php echo base_url(); ?>upload/marker.png',
			shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
		  },
		   
		};
		var type = 'markertempat';
		 
		<?php  
		$koordinat=$r->koordinat_tempat;
		$part = explode(",",$koordinat);
		$lat = $part[0];
		$lon = $part[1]; 
		
		if($lat=="") {$lat=0; } else { $lat=$lat;}
		if($lon=="") {$lon=0; } else { $lon=$lon;}
		?>
		
		
		var loc = new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $lon; ?>);
		var icon = customIcons[type] || {saranapendukung};
        
		var marker = new google.maps.Marker({
            map: map,
            position: loc,
            icon: icon.icon
          });
				
		 bindInfoWindow(marker, map, infoWindow, html);	
		 	
		<?php
		}
		?>
		
		
		 
		
		}
	
		
	
	 function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }
	
	
	
	 


</script>

 