<?php
if($aksicariterdekat=="YA") {
	$LOKASIAWAL = $lokasiawal;
	$LAT = $lat;
	$LON = $lon;
	$IDKECAMATAN = $idkecamatan;
 
}
?>


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

 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu2vT0kp4UjmRmUwpq0SOONk9RCbG16ds&callback=initMap&language=id&region=ID&libraries=geometry,places&style=feature:poi%7Celement:labels.icon%7Cvisibility:off"></script>
	 
<script type="text/javascript">
initialize();
	
	
var geocoder;
var map;
var DATA;
var HASILCARI = [];

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
	
		
	 	
		//tampilkan  tempat sesuai kecamatan pencarian
		<?php 
		
		$query=$this->db->query("SELECT * FROM tempat  
		WHERE tempat.id_kecamatan='".$IDKECAMATAN."' ORDER BY tempat.id_tempat ASC");
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
		$lat1 = $part[0];
		$lon1 = $part[1]; 
		
		if($lat1=="") {$lat1=0; } else { $lat1=$lat1;}
		if($lon1=="") {$lon1=0; } else { $lon1=$lon1;}
		?>
		
		
		var loc = new google.maps.LatLng(<?php echo $lat1; ?>,<?php echo $lon1; ?>);
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
		
		
		// Lokasi lama
		var customIcons = {
		  markertempat: {
			icon: '<?php echo base_url(); ?>assets/img/green.png',
			shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
		  },
		   
		};
		 
		var loc = new google.maps.LatLng(<?php echo $LAT; ?>,<?php echo $LON; ?>);
		var type = 'markertempat';
				
				
		var icon = customIcons[type] || {saranapendukung};
		var html = '<div class=info ><strong> Lokasi Anda</strong><br/><?php echo $LOKASIAWAL; ?><br/> </div>';
		var markerx = new google.maps.Marker({
            map: map,
            position: loc,
            icon: icon.icon
          });
				
		 bindInfoWindow(markerx, map, infoWindow, html);	
		 
		
		
		
		
		
		// siapkan klik handler
		var customIcons = {
		  markertempat: {
			icon: '<?php echo base_url(); ?>assets/img/redmarker.png',
			shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
		  },
		   
		};
		 
		var loc = new google.maps.LatLng(<?php echo $LAT; ?>,<?php echo $LON; ?>);
		var type = 'markertempat';
				
				
		var icon = customIcons[type] || {saranapendukung};
		var html = '<div class=info ><strong> Lokasi Anda Yang Baru</strong></div>';
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






<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	

<link href="<?php echo base_url(); ?>assets/dijkstra/shortest-path.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dijkstra/d3.v3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dijkstra/ShortestPathCalculator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dijkstra/ShortestPathUtils.js"></script>


<?php 
// PERULANGAN HITUNG JARAKDIJKSTRA 		

$query=$this->db->query("SELECT * FROM tempat 
WHERE tempat.id_kecamatan='".$IDKECAMATAN."' ORDER BY tempat.id_tempat ASC");
$tempat = $query->result();

foreach ($tempat as $tempat) { 
$koor = $tempat->koordinat_tempat;
$latlon=explode(",",$koor);
$LAT2 = $latlon[0]; 
$LON2 = $latlon[1];  

$query=$this->db->query("SELECT * FROM foto WHERE id_tempat='".$tempat->id_tempat."'");
$xxx = $query->result();
$FOTO = $xxx[0]->file_foto;
					
					

?>
		
<script>

var JARAKMINAWAL=0;
var NODEAWAL='';
var LATNODEAWAL='';
var LONNODEAWAL='';
var x=10000000;
<?php
		$query=$this->db->query("SELECT * FROM titik 
						ORDER BY id_titik ASC");
		$titik = $query->result();
		
		foreach ($titik as $titik) { 
			$latitude = $titik->latitude;
			$longitude = $titik->longitude;
			$id = $titik->id_titik;
		?>
		var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>), new google.maps.LatLng(<?php echo $LAT; ?>, <?php echo $LON; ?>));
		 
		
		if(distance<x) {
			JARAKMINAWAL=distance;
			x=distance;
			NODEAWAL= <?php echo $id; ?>;
			LATNODEAWAL = <?php echo $latitude; ?>;
			LONNODEAWAL = <?php echo $longitude; ?>;
		}
		<?php
		} 
?>
 
document.getElementById('nodeawal').value = NODEAWAL; 
  
</script>


 
<script>
 
var JARAKMINAKHIR=0;
var NODEAKHIR='';
var LATNODEAKHIR = '';
var LONNODEAKHIR = '';
var x=100000;


<?php 
		 
	    $query2=$this->db->query("SELECT * FROM titik 
						ORDER BY id_titik ASC");
		$titik2 = $query2->result();
		
		foreach ($titik2 as $r2) { 
			$latitude2 = $r2->latitude;
			$longitude2 = $r2->longitude;
			$id2 = $r2->id_titik;
		?>
		
		var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(<?php echo $latitude2; ?>, <?php echo $longitude2; ?>),new google.maps.LatLng(<?php echo $LAT2; ?>, <?php echo $LON2; ?>));
		 
		
		if(distance<x) {
			JARAKMINAKHIR=distance;
			x=distance;
			NODEAKHIR= <?php echo $id2; ?>;
			LATNODEAKHIR = <?php echo $latitude2; ?>;
			LONNODEAKHIR = <?php echo $longitude2; ?>; 
		}
		
		<?php } ?>
  
document.getElementById('nodeakhir').value = NODEAKHIR; 
 

</script>




 
<?php  
	$query=$this->db->query("SELECT * FROM titik ORDER BY id_titik ASC");
	$titiks = $query->result();
	$xxx = "";
	foreach ($titiks as $titik) { 
		$xxx.="{ index: ".$titik->id_titik.", value: '".$titik->id_titik."', r: 20 },";
	} 
	$xxx=substr($xxx,0,-1); 
	 
 
		
	$query=$this->db->query("SELECT * FROM jalur ORDER BY id_jalur ASC");
	$jalurs = $query->result();
	$yyy = "";
	foreach ($jalurs as $jalur) { 
		$yyy.="{ source: ".$jalur->titik_awal.", target: ".$jalur->titik_akhir.", distance: ".$jalur->jarak." },";
	}
	
	$yyy=substr($yyy,0,-1);
	
	
	
	 
?>
		
		
<script type="text/javascript">

		
		
		var nodes = [
		<?php  
			echo $xxx; 
		?>
		];

		var paths = [
		<?php  
			echo $yyy; 
		?>
		];
		
		var node1 = document.getElementById('nodeawal').value;
		var node2 = document.getElementById('nodeakhir').value;
		
		var sp1 = new ShortestPathCalculator(nodes, paths);  
		var route = sp1.findRoute(node1,node2); 
		var result = sp1.formatResult();  
		
		 
		var hasil = sp1.formatResultDijkstra(); 
		var jarakdijkstra = sp1.formatResultJarak();
	 
		
		var totaljarak = parseFloat(JARAKMINAWAL/1000)+parseFloat(jarakdijkstra/1000)+parseFloat(JARAKMINAKHIR/1000);
		
		
		
		var position_1 = new google.maps.LatLng(<?php echo $LAT; ?>, <?php echo $LON; ?>);
        var position_2 = new google.maps.LatLng(<?php echo $LAT2; ?>, <?php echo $LON2; ?>);
        var jarakgeometriok = google.maps.geometry.spherical.computeDistanceBetween(position_1, position_2);
		var alamatpemakai=document.getElementById('lokasiawal').value;
		  		
		 
		
		var DATA = {idtempat:<?php echo $tempat->id_tempat; ?>, namatempat:'<?php echo $tempat->nama_tempat; ?>', alamattempat:'<?php echo $tempat->alamat_tempat; ?>',fototempat:'<?php echo $FOTO ; ?>',jarakdijkstra: totaljarak,jarakgeometri: jarakgeometriok, loc1: position_1, loc2: position_2, address:alamatpemakai, lat:<?php echo $LAT; ?>, lon:<?php echo $LON; ?>};
		
		
		HASILCARI.push(DATA); 						
		 
	
	
 


	</script>
 		
<?php
}
?>



<script>


function compareValues(key, order = 'asc') {
  return function innerSort(a, b) {
    if (!a.hasOwnProperty(key) || !b.hasOwnProperty(key)) {
      // property doesn't exist on either object
      return 0;
    }

    const varA = (typeof a[key] === 'string')
      ? a[key].toUpperCase() : a[key];
    const varB = (typeof b[key] === 'string')
      ? b[key].toUpperCase() : b[key];

    let comparison = 0;
    if (varA > varB) {
      comparison = 1;
    } else if (varA < varB) {
      comparison = -1;
    }
    return (
      (order === 'desc') ? (comparison * -1) : comparison
    );
  };
}


HASILCARI.sort(compareValues('jarakdijkstra', 'asc'));

 
 
</script>
 
 
