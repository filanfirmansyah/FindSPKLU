 
<?php if ($aksicariterdekat=="YA") {

	 
	?>	 
		<br/><br/>	 
			
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:#f3f6f6;">
          <div class="product_c">
             
			<?php
				$query=$this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan='".$idkecamatan."' "); 
				$datas = $query->result();
				 
				$KECAMATAN = $datas[0]->nama_kecamatan;
					 
				
				?>
				 
			<h3>HASIL PENCARIAN SPKLU TERDEKAT - KECAMATAN <?php echo $KECAMATAN; ?></h3>
			<br/>
            <div class="row view-grid animated  fadeInUp" data-animation="fadeInUp" >
		
			<div id="listtempat">
			</div>
			
			
			</div>
			
			
            <div class="page_c clearfix red5">
			<?php //echo $halaman; ?>
			</div>
			
			 
			
          </div>
        </div>
		
		<?php } ?>
		
   		
 <?php if ($aksicariterdekat=="YA") { ?>	       
			<div class="clearfix"></div>
    
		 </div>
		  
          </div>
	   
	  
      
    </div>
  </div>
</div>
 <?php } ?>


<script>

for(var i=0; i<HASILCARI.length; i++) {
	
	var JARAK = parseFloat((HASILCARI[i].jarakdijkstra).toFixed(2));
	var JARAKGEOMETRI = parseFloat((HASILCARI[i].jarakgeometri/1000).toFixed(2));
	var JARAKGOOGLE = getJarak(HASILCARI[i].loc1, HASILCARI[i].loc2);
	var ALAMAT = HASILCARI[i].address; 
		
	
	 $('#listtempat').append('<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 "><div class="main_box"><div class="box_1"> <a href="<?php echo base_url(); ?>site/tempat_detail/12"><img alt="alt" src="<?php echo base_url(); ?>upload/foto_tempat/'+HASILCARI[i].fototempat+'" draggable="false" width="100%" height="300px"></a></div><div class="desc"><h5><a href="<?php echo base_url(); ?>site/tempat_detail/12">#'+(i+1)+' '+HASILCARI[i].namatempat+'</a></h5><p>'+HASILCARI[i].alamattempat+'<br/><br/> Jarak Dijkstra : '+JARAK+' km<br/>Jarak Garis Lurus : '+JARAKGEOMETRI+' km <br/><br/> <a href="<?php echo base_url(); ?>site/getroute/'+HASILCARI[i].idtempat+'">Tampilkan Rute</a></p></div></div></div>');
	 
}



function getJarak (loc1, loc2) {
		var directionsService = new google.maps.DirectionsService();
		//var directionsRenderer = new google.maps.DirectionsRenderer();
		var jarakgoogleapiok;
		//directionsRenderer.setMap(map); // Existing map object displays directions
	  // Create route from existing points used for markers
		var route = {
			origin: loc1,
			destination: loc2,
			travelMode: 'DRIVING'
		}

		directionsService.route(route,
		function(response, status) { // anonymous function to capture directions
		  if (status !== 'OK') {
			//window.alert('Directions request failed due to ' + status);
			return;
		  } else {
			//directionsRenderer.setDirections(response); // Add route to the map
			var directionsData = response.routes[0].legs[0]; // Get data about the mapped route
			if (!directionsData) {
			  //window.alert('Directions request failed');
			  return;
			}
			else {
			  jarakgoogleapiok = directionsData.distance.text; 
			  //jarakgoogleapiok = jarakgoogleapiok.replace(" ", "");
			  //jarakgoogleapiok = jarakgoogleapiok.replace("km", ""); 
			   
			  return jarakgoogleapiok;
			   
			}
		  }
		});
	}
		
		
		

 
</script>

