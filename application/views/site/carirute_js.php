<style type="text/css">
		
	div#map{
		width:100%;
		height:450px; 
		margin-right:20px;
		border-radius:5px;
	}
 
	.gm-style-iw { 
		width: 250px; 
	}
		  
	 

	</style>

 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu2vT0kp4UjmRmUwpq0SOONk9RCbG16ds&callback=initMap&language=id&region=ID&libraries=places&style=feature:poi%7Celement:labels.icon%7Cvisibility:off"></script>
	 
<script type="text/javascript">

initialize();


 
var geocoder;
	var map;

function initialize()
	{
		// mengaktifkan autocomplete
		var input = document.getElementById('lokasiawal');
        var autocomplete = new google.maps.places.Autocomplete(input);
        
		google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                document.getElementById('lokasiawal').value = place.name;
                document.getElementById('lat').value = place.geometry.location.lat();
                document.getElementById('lon').value = place.geometry.location.lng();
				var loc = new google.maps.LatLng(place.geometry.location.lat(),place.geometry.location.lng());
				marker.setPosition(loc); 
				
        });
			
			
			
		var lats = -6.1685304;
		var lngs = 106.7259478;
		
	 
		// define map center
		var buton = new google.maps.LatLng(lats,lngs);
		var infoWindow = new google.maps.InfoWindow;
		
		// define map options
		var myOptions = {
			zoom: 14,
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
	
		
	 	
		//tampilkan seluruh tempat
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
		
		
		var customIcons = {
		  markertempat: {
			icon: '<?php echo base_url(); ?>assets/img/redmarker.png',
			shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
		  },
		   
		};
		var type = 'markertempat';
		var icon = customIcons[type] || {saranapendukung};
		var marker = new google.maps.Marker({
            map: map, 
            icon: icon.icon
          });
		
		//tambah action listener klik
		google.maps.event.addListener(map, 'click', function(event) {
			findAddress(event.latLng);
			marker.setPosition(event.latLng); 
			var loc = new google.maps.LatLng(event.latLng);
			document.getElementById('lat').value = loc.lat();  
			document.getElementById('lon').value = loc.lng();  			
		});
		 
		 
		 
		 
		if (navigator.geolocation) {
			  navigator.geolocation.getCurrentPosition(function(position) {
			 
				
				var loc = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
				 
						var geocoder = new google.maps.Geocoder();  
		
						if (geocoder) 
						{
							geocoder.geocode({'latLng': loc}, function(results, status) 
							{
								if (status == google.maps.GeocoderStatus.OK) 
								{
									if (results[0]) 
									{
										address = results[0].formatted_address;
										
										document.getElementById('lat').value = loc.lat();  
										document.getElementById('lon').value = loc.lng();  
										document.getElementById('lokasiawal').value = address;
										
										 
										marker.setPosition(loc); 
									}
								} 
								else 
								{
									alert("Geocoder failed due to: " + status);
								}
							});
						}


				 				
 			 
				document.getElementById('lat').value = position.coords.latitude; 
				document.getElementById('lon').value = position.coords.longitude;
				
				
			  }, function() {
				handleLocationError(true, infoWindow, map.getCenter());
			  });
			} else {
			  // Browser doesn't support Geolocation
			  // handleLocationError(false, infoWindow, map.getCenter());
			  document.getElementById('address').value = 'Geolocation tidak berfungsi';
			}
			
			
			
		
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
						
						document.getElementById('lat').value = loc.lat();  
						document.getElementById('lon').value = loc.lng();  
						document.getElementById('lokasiawal').value = address;
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
