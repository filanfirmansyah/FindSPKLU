
<style type="text/css">
		
	div#map{
		width:100%;
		height:400px; 
		border-radius:5px;
	}
	
 
	
	</style>
	
<?php 
$koor = explode(",",$tempat->koordinat_tempat);
?>
<input type="hidden" id="lat" value="<?php echo $koor[0];?>">
<input type="hidden" id="long" value="<?php echo $koor[1];?>">	
<input type="hidden" id="namaobjek" value="<?php echo $tempat->nama_tempat; ?>">	
<input type="hidden" id="alamat" value="<?php echo $tempat->alamat_tempat; ?>">	

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
			icon: '<?php echo base_url(); ?>upload/icon_marker/<?php echo $tempat->icon_marker; ?>',
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

