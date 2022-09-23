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
				  
				  <div id='map'> </div> <br>
				  
				  
              
			<?php 
			//open form 
			echo form_open(base_url('tempat/tambah'),'class="form-horizontal" enctype="multipart/form-data" parsley-validate');
			?>

			
			 
	<div class="col-lg-6">
			
			<div class="form-group">
			<label class="col-xs-12 col-lg-4 control-label">Nama Tempat</label>
			<div class="col-xs-12 col-lg-8">
			<input type="text" name="nama_tempat" class="form-control required" placeholder="Nama Tempat" value="<?php echo set_value('nama_tempat') ?>" >
			</div>
			</div>
			
		 
			
			
			<div class="form-group">
			<label class="col-xs-12 col-lg-4 control-label">Kecamatan</label>
			<div class="col-xs-12 col-lg-8">
				<select name="id_kecamatan" class="form-control required">
					<option value="">-- Pilih Kecamatan --</option>
					<?php 
					 
					foreach ($kecamatans as $kecamatan) {
						echo "<option value='".$kecamatan->id_kecamatan."'>".$kecamatan->nama_kecamatan."</option>"; 
					}
					?>
					
				</select>
			</div>
			</div>
			
			<div class="form-group">
			<label class="col-xs-12 col-lg-4 control-label">Deskripsi</label>
			<div class="col-xs-12 col-lg-8">
			<textarea name="deskripsi_tempat" class="form-control textareaku required"><?php echo set_value('deskripsi_tempat') ?></textarea>
			</div>
			</div>
			
			
			<div class="form-group">
			<label class="col-xs-12 col-lg-4 control-label">Alamat </label>
			<div class="col-xs-12 col-lg-8">
				<input type="text" name="alamat_tempat" class="form-control required" placeholder="Alamat" value="<?php echo set_value('alamat_tempat') ?>" >
			</div>
			</div>
			
			<div class="form-group">
			<label class="col-xs-12 col-lg-4 control-label">Koordinat</label>
			<div class="col-xs-12 col-lg-8">  
			<input type="text" name="koordinat_tempat" id="koordinat" class="form-control" placeholder="Koordinat" value="" > 
			</div>
			</div>
			
			<div class="form-group">
			<label class="col-xs-12 col-lg-4 control-label">No. Telepon</label>
			<div class="col-xs-12 col-lg-8">
			<input type="text" name="notelp_tempat" class="form-control" placeholder="No Telepon" value="<?php echo set_value('notelp_tempat') ?>" >
			</div>
			</div>

 
			

			
			<div class="form-group">
			<label class="col-xs-12 col-lg-4 control-label"> </label>
			<div class="col-xs-12 col-lg-2">

			</div>
			</div>
			
			
		 
			  
			 
		 
			  
			<hr />
			
			<div class="form-group">
			<label class="col-xs-12 col-lg-4 control-label"></label>
			<div class="col-xs-12 col-lg-5">
			<input type="submit" name="submit" class="btn btn-success default" value="Submit">
			<input type="reset" name="reset" class="btn btn-warning default" value="Reset"> 
			</div>
			</div>


			
	</div>
	<div class="col-lg-6">
	
			<a href="#" class="btn btn-default"><i class="fa fa-plus"></i> Foto</a>
			<table class="table">
				<tr>
					<th>No</th>
					<th>Foto</th>
					<th>File</th>
					<th>Aksi</th>
				</tr>
				<tr>
					<td>&nbsp;</td> 
					<td>&nbsp;</td> 
					<td>&nbsp;</td> 
					<td>&nbsp;</td> 
				</tr>
				
			</table>
			
			<?php
			//close form
			echo form_close();
			?>


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
 
 
	 
		// define map center
		var buton = new google.maps.LatLng(-6.259934,106.833622);
		var infoWindow = new google.maps.InfoWindow;
		
		// define map options
		var myOptions = {
			zoom: 11,
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
		
		var customIcons = {
		  markermerah: {
			icon: '<?php echo base_url(); ?>assets/img/redmarker.png',
			shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
		  },
		   
		};
		var type = 'markermerah';
		 
		var icon = customIcons[type] || {baik};
        
		var marker = new google.maps.Marker({
            map: map, 
            icon: icon.icon
          });
		  
		// menambahkan pendengar acara ketika pengguna mengklik pada peta
		google.maps.event.addListener(map, 'click', function(event) {
			findAddress(event.latLng); 
			marker.setPosition(event.latLng); 
			 
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
						
						// fill in the results in the form
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
	
	
	 
	 


</script>			

 