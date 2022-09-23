
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
		 
		 
		 
		var html = '<b>'+document.getElementById('namaobjek').value +'</b><br/> '+document.getElementById('alamat').value+'<br/><br/><a href="<?php echo base_url(); ?>site/getroute/<?php echo $tempat->id_tempat; ?>">Tampilkan Rute</a>';
				 			
		var loc = new google.maps.LatLng(lats,lngs);
		 var customIcons = {
		  markermerah: {
			icon: '<?php echo base_url(); ?>upload/marker.png',
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
	
	
 

 
	 	function bindInfoWindowArea(area, map, infoWindow, htmlArea) {
      google.maps.event.addListener(area, 'click', function(event) {
        infoWindow.setContent(htmlArea); 
		infoWindow.close();
        infoWindow.open(map, area);
		infoWindow.setPosition(event.latLng); 
      });
    }
 

</script>

