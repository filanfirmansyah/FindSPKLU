

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu2vT0kp4UjmRmUwpq0SOONk9RCbG16ds&callback=initMap&language=id&region=ID&libraries=geometry"></script>

 
<script>

localStorage.clear();
sessionStorage.clear();
 


var JARAKMINAWAL=0;
var NODEAWAL='';
var LATNODEAWAL='';
var LONNODEAWAL='';
var x=10000000;

<?php
	$query=$this->db->query("SELECT * FROM titik 
						ORDER BY id_titik ASC");
		$titik = $query->result();
		
		foreach ($titik as $r) { 
			$latitude = $r->latitude;
			$longitude = $r->longitude;
			$id = $r->id_titik;
		?>
		var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>), new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lon; ?>));
		 
		
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
 
 
document.getElementById('nodeterdekatawal').innerHTML = 'Node '+NODEAWAL +' dengan jarak '+ Math.round(JARAKMINAWAL)/1000 +' km';  

document.getElementById('nodeawal').value = NODEAWAL; 



</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu2vT0kp4UjmRmUwpq0SOONk9RCbG16ds&callback=initMap&language=id&region=ID&libraries=geometry"></script>


<script>
 
var JARAKMINAKHIR=0;
var NODEAKHIR='';
var LATNODEAKHIR = '';
var LONNODEAKHIR = '';
var x=100000;


<?php 
		$query=$this->db->query("SELECT * FROM tempat WHERE id_tempat='".$idtujuan."'");
		$tempat = $query->result();
		
		 
		$koordinat = $tempat[0]->koordinat_tempat; 
		$part = explode(",",$koordinat);
		$lat_akhir = $part[0];
		$lon_akhir = $part[1]; 
		
		
	    $query2=$this->db->query("SELECT * FROM titik 
						ORDER BY id_titik ASC");
		$titik2 = $query2->result();
		
		foreach ($titik2 as $r2) { 
			$latitude2 = $r2->latitude;
			$longitude2 = $r2->longitude;
			$id2 = $r2->id_titik;
		?>
		
		var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(<?php echo $latitude2; ?>, <?php echo $longitude2; ?>),new google.maps.LatLng(<?php echo $lat_akhir; ?>, <?php echo $lon_akhir; ?>));
		 
		
		if(distance<x) {
			JARAKMINAKHIR=distance;
			x=distance;
			NODEAKHIR= <?php echo $id2; ?>;
			LATNODEAKHIR = <?php echo $latitude2; ?>;
			LONNODEAKHIR = <?php echo $longitude2; ?>; 
		}
		
		<?php } ?>
  

document.getElementById('nodeterdekatakhir').innerHTML = 'Node '+NODEAKHIR +' dengan jarak '+ Math.round(JARAKMINAKHIR)/1000 +' km';  

document.getElementById('nodeakhir').value = NODEAKHIR; 

</script>





<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	

<link href="<?php echo base_url(); ?>assets/dijkstra/shortest-path.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dijkstra/d3.v3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dijkstra/ShortestPathCalculator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dijkstra/ShortestPathUtils.js"></script>
 
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
		hasil = hasil.slice(0, -1);
		hasil = hasil.slice(0, -1);
		
		
		document.getElementById('results').innerHTML = hasil; 
		document.getElementById('results2').innerHTML = node1+', '+hasil+', '+node2;  
		
		var disimpan = 'O-'+node1+', '+hasil+', '+node2+'-D'; 
		disimpan = disimpan.replace(" ",""); 
		
		var totaljarak = parseFloat(JARAKMINAWAL/1000)+parseFloat(jarakdijkstra/1000)+parseFloat(JARAKMINAKHIR/1000);
		 
		tambahCariTemp(disimpan, totaljarak);	 
          
		 
		//sp1.drawGraph('graph',1000,500);
		
function tambahCariTemp(hasildijkstra, totaljarak){ 
    
	var fd = new FormData(); 
	fd.append('a',hasildijkstra);
	fd.append('b',totaljarak); 


	$.ajax({
		url: '<?php echo base_url(); ?>site/tambahcaritemp/',
		type: 'post',
		data: fd,
		contentType: false,
		processData: false,
		success: function(response){
			if(response != 0){
				 
			}else{
				//alert('file not uploaded');
				 
			}
		},
	});
		
		   
}


	</script>
				
				
		
















<style type="text/css">
		
	div#petadijkstra{
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
var geocoder;
var map;


 
initialize(); 
 	 

function initialize()
	{
		 
			
			
			
		var lats = -6.1685304;
		var lngs = 106.7259478;
		
	 
		// define map center
		var dkijakarta = new google.maps.LatLng(lats,lngs);
		var infoWindow = new google.maps.InfoWindow;
		
		// define map options
		var myOptions = {
			zoom: 12,
			center: dkijakarta,
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
		map = new google.maps.Map(document.getElementById("petadijkstra"), myOptions);
	
		
	 	
		//tampilkan seluruh node
		<?php 
		$query=$this->db->query("SELECT * FROM titik");
		$titiks = $query->result();
		
		foreach ($titiks as $titik) { 
		 
		   
		?>
		
		var html = '<?php echo $titik-> id_titik; ?>';
		 
		 var marker_icon = { 
				path: google.maps.SymbolPath.CIRCLE,
				scale: 4,
				fillColor: "#F00",
				fillOpacity: 1,
				strokeWeight: 1 
			}
			
		var customIcons = {
		  markertempat: {
			icon: marker_icon,
			shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
		  },
		   
		};
		var type = 'markertempat';
		 
		<?php  
		 
		$lattitik = $titik->latitude;
		$lontitik = $titik->longitude;
		
		if($lattitik=="") {$lattitik=0; } else { $lattitik=$lattitik;}
		if($lontitik=="") {$lontitik=0; } else { $lontitik=$lontitik;}
		?>
		
		
		var loc = new google.maps.LatLng(<?php echo $lattitik; ?>,<?php echo $lontitik; ?>);
		var icon = customIcons[type] || {saranapendukung};
        
		var lat = parseFloat(<?php echo $lattitik; ?>);
        var lng = parseFloat(<?php echo $lontitik; ?>);
        var value = 0;
        var info = "";
		
		var marker = new google.maps.Marker({
            map: map,
            position: loc,
            icon: icon.icon,
			label: { color: '#FFF', fontSize: '12px', text: '<?php echo strtoupper($titik->id_titik); ?>', fontWeight: "bold" }, 
			 
          });
		  
		 
				
		 bindInfoWindow(marker, map, infoWindow, html);	
		 	
		<?php
		}
		?>
		
		
		 
		
		
	
	  
	//tampilkan seluruh jalur 
	<?php
	$cari = $this->db->query("SELECT * FROM jalur"); 
	$data = $cari->result();
 
	foreach ($data as $d) {
		
		$titikawal = $d->titik_awal;
		$titikakhir = $d->titik_akhir;
		
		$query=$this->db->query("SELECT * FROM titik WHERE id_titik='".$titikawal."'");
		$titik1 = $query->result();
		
		$query=$this->db->query("SELECT * FROM titik WHERE id_titik='".$titikakhir."'");
		$titik2 = $query->result();
		
		$latsatu = $titik1[0]->latitude;
		$lonsatu = $titik1[0]->longitude;
		
		$latdua = $titik2[0]->latitude;
		$londua = $titik2[0]->longitude;
		
		?>  
        
		var lat1 = parseFloat(<?php echo $latsatu; ?>);
        var lng1 = parseFloat(<?php echo $lonsatu; ?>);
		var lat2 = parseFloat(<?php echo $latdua; ?>);
        var lng2 = parseFloat(<?php echo $londua; ?>);

        
		   // KODE BUAT GARIS
		var lineCoordinates = [
				new google.maps.LatLng(lat1, lng1),
				new google.maps.LatLng(lat2, lng2)
		  ];
		  
		var lineSymbol = {
		  path: google.maps.SymbolPath.FORWARD_OPEN_ARROW
		};

		var line = new google.maps.Polyline({
			path: lineCoordinates, 
			strokeColor: '#000',
			strokeOpacity: 1.0,
			strokeWeight: 2,
			icons: [{
				icon: lineSymbol,
				offset: '100%'
			  }],
		});
		 
		
	 
		line.setMap(map);
		 
      <?php  
	  } ?>

	 
	 
	 // tampilkan posisi anda (titik awal)
	 var customIcons = {
		  markeranda: {
			icon: '<?php echo base_url(); ?>assets/img/green.png',
			shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
		  },
		   
		};
		var type = 'markeranda';
		 
 		
		var loc = new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $lon; ?>);
		var icon = customIcons[type] || {markeranda};
        
		  
		var marker = new google.maps.Marker({
            map: map,
            position: loc,
            icon: icon.icon,
          });
		  
	 
	 
	 
	 // tampilkan titik tujuan 
	 var customIcons = {
		  markertujuan: {
			icon: '<?php echo base_url(); ?>assets/img/redmarker.png',
			shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
		  },
		   
		};
		var type = 'markertujuan';
		 
		var lattujuan = parseFloat(<?php echo $lat_akhir; ?>);
        var lngtujuan = parseFloat(<?php echo $lon_akhir; ?>);
		
		var loc = new google.maps.LatLng(lattujuan,lngtujuan);
		var icon = customIcons[type] || {markertujuan};
         
     
		
		var marker = new google.maps.Marker({
            map: map,
            position: loc,
            icon: icon.icon,
          });
		  
		  
		  
	 
	 
	 
	 
	 
	 // buat jalur hasil dijkstra
	 
		
		<?php  
		$rute = $this->session->userdata('hasildijkstra'); 
		 
		
		$jalurs=explode(",",$rute);
		  
		 for($x=0; $x<sizeof($jalurs); $x++) {
			$jalurs[$x]=trim($jalurs[$x]);
			
			$nodes = explode("-",$jalurs[$x]);
			$node1=$nodes[0];
			$node2=$nodes[1];
			
			if($node1=="O") {
				$lat1=$lat;
				$lon1=$lon;
				
				$query=$this->db->query("SELECT * FROM titik where id_titik='".$node2."'"); 
				$titik = $query->result();
				
				$lat2=$titik[0]->latitude;
				$lon2=$titik[0]->longitude;
				
				?>
				
				
				var lat1 = parseFloat(<?php echo $lat1; ?>);
				var lng1 = parseFloat(<?php echo $lon1; ?>);
				var lat2 = parseFloat(<?php echo $lat2; ?>);
				var lng2 = parseFloat(<?php echo $lon2; ?>);

				
				   // KODE BUAT GARIS
				var lineCoordinates = [
						new google.maps.LatLng(lat1, lng1),
						new google.maps.LatLng(lat2, lng2)
				  ];
		 
				var line = new google.maps.Polyline({
					path: lineCoordinates, 
					strokeColor: '#25F603',
					strokeOpacity: 1.0,
					strokeWeight: 2,
				}); 
				line.setMap(map);
				
				<?php
				
			}  else if($node2=="D") {
				
				$query=$this->db->query("SELECT * FROM titik where id_titik='".$node1."'"); 
				$titik = $query->result();
				
				$lat1=$titik[0]->latitude;
				$lon1=$titik[0]->longitude;
				
				
				$lat2=$lat_akhir;
				$lon2=$lon_akhir;
				
				?>
				var lat1 = parseFloat(<?php echo $lat1; ?>);
				var lng1 = parseFloat(<?php echo $lon1; ?>);
				var lat2 = parseFloat(<?php echo $lat2; ?>);
				var lng2 = parseFloat(<?php echo $lon2; ?>);

				
				   // KODE BUAT GARIS
				var lineCoordinates = [
						new google.maps.LatLng(lat1, lng1),
						new google.maps.LatLng(lat2, lng2)
				  ];
		 
				var line = new google.maps.Polyline({
					path: lineCoordinates, 
					strokeColor: '#25F603',
					strokeOpacity: 1.0,
					strokeWeight: 2,
				}); 
				line.setMap(map);
				
				<?php
				
			} else {
				
				$query=$this->db->query("SELECT * FROM titik where id_titik='".$node1."'"); 
				$titik = $query->result();
				
				$lat1=$titik[0]->latitude;
				$lon1=$titik[0]->longitude;
				
				$query=$this->db->query("SELECT * FROM titik where id_titik='".$node2."'"); 
				$titik = $query->result();
				
				$lat2=$titik[0]->latitude;
				$lon2=$titik[0]->longitude;
				
				?>
				var lat1 = parseFloat(<?php echo $lat1; ?>);
				var lng1 = parseFloat(<?php echo $lon1; ?>);
				var lat2 = parseFloat(<?php echo $lat2; ?>);
				var lng2 = parseFloat(<?php echo $lon2; ?>);

				
				   // KODE BUAT GARIS
				var lineCoordinates = [
						new google.maps.LatLng(lat1, lng1),
						new google.maps.LatLng(lat2, lng2)
				  ];
		 
				var line = new google.maps.Polyline({
					path: lineCoordinates, 
					strokeColor: '#25F603',
					strokeOpacity: 1.0,
					strokeWeight: 2,
				}); 
				line.setMap(map);
				
				<?php
				
				
			}
			
		 } ?>
		
		 
	}
	
		
	
	 function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }
	
	
	

</script>







		
				
				







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
		var dkijakarta = new google.maps.LatLng(lats,lngs);
		var infoWindow = new google.maps.InfoWindow;
		
		// define map options
		var myOptions = {
			zoom: 12,
			center: dkijakarta,
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
		$lat_ti = $part[0];
		$lon_ti = $part[1]; 
		
		if($lat_ti=="") {$lat_ti=0; } else { $lat_ti=$lat_ti;}
		if($lon_ti=="") {$lon_ti=0; } else { $lon_ti=$lon_ti;}
		?>
		
		
		var loc = new google.maps.LatLng(<?php echo $lat_ti; ?>,<?php echo $lon_ti; ?>);
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
		
		
		
		
	
	
	
		 
		// tampilkan posisi anda (titik awal)
		var customIcons = {
		  markeranda: {
			icon: '<?php echo base_url(); ?>assets/img/green.png',
			shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
		  },  
		};
		var type = 'markeranda'; 
		var loc = new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $lon; ?>);
		var icon = customIcons[type] || {markeranda}; 
		var marker = new google.maps.Marker({
            map: map,
            position: loc,
            icon: icon.icon,
        });
		  
	 
	 
		
		
		<?php 
			
			 
			$rute = $this->session->userdata('hasildijkstra'); 
			$jalurs=explode(",",$rute);
			
			$ARR_NODE=array();
			for($x=1; $x<sizeof($jalurs)-1; $x++) {
				$jalurs[$x]=trim($jalurs[$x]);
				
				$nodes = explode("-",$jalurs[$x]);
				$node1=$nodes[0];
				$node2=$nodes[1];
				
				array_push($ARR_NODE,$node1);
				array_push($ARR_NODE,$node2);	
			}
			
			$ARR_NODE = array_unique($ARR_NODE);
			 
			for ($m=0; $m<sizeof($ARR_NODE); $m++) {
				  
				$query2=$this->db->query("SELECT * FROM titik WHERE id_titik='$ARR_NODE[$m]'");
				$mampir = $query2->result();
				 
				$lat_mampir=$mampir[0]->latitude;
				$lon_mampir=$mampir[0]->longitude;
			?>
		 	
		  
			var marker_icon = { 
				path: google.maps.SymbolPath.CIRCLE,
				scale: 4,
				fillColor: "#F00",
				fillOpacity: 1,
				strokeWeight: 1 
			}
			
			var customIcons = {
			  markertempat: {
				icon: marker_icon,
				shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
			  },
			   
			};
			var type = 'markertempat';
			 
			
			var loc = new google.maps.LatLng(<?php echo $lat_mampir; ?>,<?php echo $lon_mampir; ?>);
			var icon = customIcons[type] || {saranapendukung};
			
			 
			
			var marker = new google.maps.Marker({
				map: map,
				position: loc,
				icon: icon.icon,  
			  });
 		<?php 
			
		} ?>
		
		
		
		
		<?php 
		
		 
		
		$rute = $this->session->userdata('hasildijkstra'); 
		$jalurs=explode(",",$rute);
		  
		 for($x=0; $x<sizeof($jalurs); $x++) {
			$jalurs[$x]=trim($jalurs[$x]);
			
			$nodes = explode("-",$jalurs[$x]);
			$node1=$nodes[0];
			$node2=$nodes[1];
			
			if($node1=="O") {
				$lat1=$lat;
				$lon1=$lon;
				
				$query=$this->db->query("SELECT * FROM titik where id_titik='".$node2."'"); 
				$titik = $query->result();
				
				$lat2=$titik[0]->latitude;
				$lon2=$titik[0]->longitude;
				
				$lat_awal=$titik[0]->latitude;
				$lon_awal=$titik[0]->longitude;
				
				?>
				var directionsService = new google.maps.DirectionsService;
				var directionsDisplay = new google.maps.DirectionsRenderer({
						suppressMarkers: true,
						suppressInfoWindows: true //,
						//polylineOptions: {
						 // strokeColor: "#8b0013"
						//}
					});
				 
				directionsDisplay.setMap(map);
		
				var lat1 = parseFloat(<?php echo $lat1; ?>);
				var lng1 = parseFloat(<?php echo $lon1; ?>);
				var lat2 = parseFloat(<?php echo $lat2; ?>);
				var lng2 = parseFloat(<?php echo $lon2; ?>);

				var awaldijkstra = new google.maps.LatLng(lat1,lng1);
				var akhirdijkstra = new google.maps.LatLng(lat2,lng2);
				
				 
				
				DisplayRoute(directionsService, directionsDisplay, awaldijkstra, akhirdijkstra);
				
				<?php
				
			}  else if($node2=="D") {
				
				$query=$this->db->query("SELECT * FROM titik where id_titik='".$node1."'"); 
				$titik = $query->result();
				
				$lat1=$titik[0]->latitude;
				$lon1=$titik[0]->longitude;
				
				
				$lat2=$lat_akhir;
				$lon2=$lon_akhir;
				
				?>
				
				var directionsService = new google.maps.DirectionsService;
				var directionsDisplay = new google.maps.DirectionsRenderer({
						suppressMarkers: true,
						suppressInfoWindows: true //,
						//polylineOptions: {
						 // strokeColor: "#8b0013"
						//}
					});
				 
				directionsDisplay.setMap(map);
		
				var lat1 = parseFloat(<?php echo $lat1; ?>);
				var lng1 = parseFloat(<?php echo $lon1; ?>);
				var lat2 = parseFloat(<?php echo $lat2; ?>);
				var lng2 = parseFloat(<?php echo $lon2; ?>);

				var awaldijkstra = new google.maps.LatLng(lat1,lng1);
				var akhirdijkstra = new google.maps.LatLng(lat2,lng2);
				
				  
				DisplayRoute(directionsService, directionsDisplay, awaldijkstra, akhirdijkstra);
				
				
				
				<?php
				
			} else {
				
				$query=$this->db->query("SELECT * FROM titik where id_titik='".$node1."'"); 
				$titik = $query->result();
				
				$lat1=$titik[0]->latitude;
				$lon1=$titik[0]->longitude;
				
				$query=$this->db->query("SELECT * FROM titik where id_titik='".$node2."'"); 
				$titik = $query->result();
				
				$lat2=$titik[0]->latitude;
				$lon2=$titik[0]->longitude;
				
				?>
				var directionsService = new google.maps.DirectionsService;
				var directionsDisplay = new google.maps.DirectionsRenderer({
						suppressMarkers: true,
						suppressInfoWindows: true //,
						//polylineOptions: {
						 // strokeColor: "#8b0013"
						//}
					});
				 
				directionsDisplay.setMap(map);
		
				var lat1 = parseFloat(<?php echo $lat1; ?>);
				var lng1 = parseFloat(<?php echo $lon1; ?>);
				var lat2 = parseFloat(<?php echo $lat2; ?>);
				var lng2 = parseFloat(<?php echo $lon2; ?>);

				var awaldijkstra = new google.maps.LatLng(lat1,lng1);
				var akhirdijkstra = new google.maps.LatLng(lat2,lng2);
				
				
				
				DisplayRoute(directionsService, directionsDisplay, awaldijkstra, akhirdijkstra);
				
				<?php
				
				
			}
			
		 } ?>
		 
		
	 
		   
		 

      function DisplayRoute(directionsService, directionsDisplay, awal, akhir) {
		directionsService.route({
          origin: awal,
          destination: akhir, 
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
			 
			
          } else {
            //window.alert('Directions request failed due to ' + status);
          }
        });

	  }
	  
	  
	 
	 
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
	


	 
window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
	
	
}


</script>

 