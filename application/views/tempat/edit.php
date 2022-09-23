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
				
                <div class="x_content">
				
				
              
				<div id='map'></div>
				    <br/>
					 
				
				
		<div class="col-lg-6">
		
			<?php 

			//open form 
			echo form_open(base_url('tempat/edit'),'class="form-horizontal" enctype="multipart/form-data" parsley-validate');

			?>

			
			<div class="form-group hidden">
			<label class="col-lg-4 control-label"> </label>
			<div class="col-lg-2">
			<input type="text" name="id_tempat" class="form-control" placeholder="ID tempat" value="<?php echo $tempat->id_tempat ?>">
			</div>
			</div>
			
			
	
			
			
			 
			 

			<div class="form-group">
			<label class="col-xs-12 col-lg-4 control-label">Nama Tempat</label>
			<div class="col-xs-12 col-lg-8">
			<input type="text" name="nama_tempat" id="namaobjek" class="form-control required" placeholder="Nama Tempat" value="<?php echo $tempat->nama_tempat; ?>" >
			</div>
			</div>
			
		 
			
			
			<div class="form-group">
			<label class="col-xs-12 col-lg-4 control-label">Kecamatan</label>
			<div class="col-xs-12 col-lg-8">
				<select name="id_kecamatan" class="form-control required">
					<option value="">-- Pilih Kecamatan --</option>
					<?php 
					 
					foreach ($kecamatans as $kecamatan) {
						if($kecamatan->id_kecamatan==$tempat->id_kecamatan) { $ok="selected=selected"; } else { $ok=""; }
						echo "<option value='".$kecamatan->id_kecamatan."' ".$ok.">".$kecamatan->nama_kecamatan."</option>"; 
					}
					?>
					
				</select>
			</div>
			</div>
			
			<div class="form-group">
			<label class="col-xs-12 col-lg-4 control-label">Deskripsi</label>
			<div class="col-xs-12 col-lg-8">
			<textarea name="deskripsi_tempat" class="form-control textareaku required"><?php echo $tempat->deskripsi_tempat; ?></textarea>
			</div>
			</div>
			
			
			<div class="form-group">
			<label class="col-xs-12 col-lg-4 control-label">Alamat </label>
			<div class="col-xs-12 col-lg-8">
				<input type="text" name="alamat_tempat" id="alamat" class="form-control required" placeholder="Alamat" value="<?php echo $tempat->alamat_tempat; ?>" >
			</div>
			</div>
			
			<div class="form-group">
			<label class="col-xs-12 col-lg-4 control-label">Koordinat</label>
			<div class="col-xs-12 col-lg-8">  
			<input type="text" name="koordinat_tempat" id="koordinat" class="form-control" placeholder="Koordinat" value="<?php echo $tempat->koordinat_tempat; ?>" > 
			<?php
				$koor = explode(",",$tempat->koordinat_tempat);
				
			?>
			<input type="hidden" name="xxx" id="lat" value="<?php echo $koor[0]; ?>" > 
			<input type="hidden" name="yyy" id="long" value="<?php echo $koor[1]; ?>" > 
			
			</div>
			</div>
			
			<div class="form-group">
			<label class="col-xs-12 col-lg-4 control-label">No. Telepon</label>
			<div class="col-xs-12 col-lg-8">
			<input type="text" name="notelp_tempat" class="form-control" placeholder="No Telepon" value="<?php echo $tempat->notelp_tempat; ?>" >
			</div>
			</div>

 
			

			
			<div class="form-group">
			<label class="col-xs-12 col-lg-4 control-label"> </label>
			<div class="col-xs-12 col-lg-2">

			</div>
			</div>
			
			
			 
			  
			  
			 
		 
			  
			<hr />
			
			<div class="form-group">
			<label class="col-lg-4 control-label"></label>
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
	<div class="col-lg-6">
	
			
			<button  onclick="showAjaxModal('<?php echo base_url(); ?>tempat/tambahfoto/<?php echo $this->uri->segment(3); ?>');"  class="btn btn-success" title="Tambah Foto"><i class="fa fa-plus"></i> Tambah Foto</button>
			
			<table class="table">
				<tr>
					<th>No</th>
					<th>Foto</th>
					<th>File</th>
					<th>Aksi</th>
				</tr>
			<?php
			$cari= $this->db->query("SELECT * FROM foto WHERE id_tempat='". $this->uri->segment(3)."'");
			  
			$data=$cari->result(); 
			$no=1;
			foreach ($data as $d) {
				if($d->file_foto!=="") {
				echo "<tr>
						<td>".$no."</td>
						<td>
						<img src='".base_url()."/upload/foto_tempat/".$d->file_foto."' width='100px' height='60px'>
						</td>
						<td>".$d->file_foto."
						</td>
						<td>";
				include('delete_foto.php');  
				echo "</td> </tr>";
						
				}
			$no++;
				
			}
			
			?>

							
				
			</table>
			 
			 
			
			<!-- <button  onclick="showAjaxModal('kriteria_edit.php?id=');"  class="btn btn-warning btn-xs" title="edit kriteria"><i class="fa fa-pencil"></i></button> -->
			
			


	</div>		
			
			

			  </div>
              </div>
            </div>
          </div>





<style type="text/css">
		
	div#map{
		width:100%;
		height:400px; 
		border-radius:5px;
	}
	
 
	
	</style>
	
	
	

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu2vT0kp4UjmRmUwpq0SOONk9RCbG16ds&callback=initMap"></script>
	
	
<script type="text/javascript">
 
initialize();
	
	
	
var geocoder;
	var map;

function initialize()
	{
		
		
		var lats = document.getElementById('lat').value;
		var lngs = document.getElementById('long').value;
		
		 
		
		// define map center
		var buton = new google.maps.LatLng(lats,lngs);
		var infoWindow = new google.maps.InfoWindow;
		
		// define map options
		var myOptions = {
			zoom: 15,
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
		// menambahkan pendengar acara ketika pengguna mengklik pada peta
		google.maps.event.addListener(map, 'click', function(event) {
			findAddress(event.latLng);
			marker.setPosition(event.latLng);  
			 if (infowindow) {
                infowindow.close();
            }
			
		});
		
		
		
		 
		var html = '<b>'+document.getElementById('namaobjek').value +'</b><br/> '+document.getElementById('alamat').value;
				 			
		var loc = new google.maps.LatLng(lats,lngs);
		 var customIcons = {
		  markermerah: {
			icon: '<?php echo base_url(); ?>assets/img/redmarker.png',
			shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
		  },
		   
		};
		var type = 'markermerah';
		var icon = customIcons[type] || {markermerah};
        
		var marker = new google.maps.Marker({
            map: map,
            position: loc,
            icon: icon.icon
          });
				
		 bindInfoWindow(marker, map, infoWindow, html);		
 
		}
	
	
	 function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }
	
	
	// menemukan alamat untuk lokasi yang diberikan
	function findAddress(loc)
	{
		geocoder = new google.maps.Geocoder(); 
		
		if (geocoder) 
		{
			geocoder.geocode({'latLng': loc}, function(results, status) 
			{
				if (status == google.maps.GeocoderStatus.OK) 
				{
					if (results[0]) 
					{
						address = results[0].formatted_address;
						
						document.getElementById('koordinat').value = loc.lat()+','+loc.lng(); 
						document.getElementById('alamat').value = address;
					}
				} 
				else 
				{
					alert("Geocoder failed due to: " + status);
				}
			});
		}
	}
	

 
	 	function bindInfoWindowArea(area, map, infoWindow, htmlArea) {
      google.maps.event.addListener(area, 'click', function(event) {
        infoWindow.setContent(htmlArea); 
		infoWindow.close();
        infoWindow.open(map, area);
		infoWindow.setPosition(event.latLng); 
      });
    }
 

</script>


 
		  