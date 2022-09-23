		
        <!-- top tiles -->
        <div class="row tile_count">
		
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-tags"></i>  Kecamatan</span>
              
			  <?php
				$query = $this->db->query('SELECT * FROM kecamatan');
				$jumlahkecamatan = $query->num_rows();
			  ?>
			  <div class="count"><?php echo $jumlahkecamatan; ?></div>
               
            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-list"></i>  Tempat </span>
			  <?php
				$query = $this->db->query('SELECT * FROM tempat');
				$jumlahtempat = $query->num_rows();
			  ?>
              <div class="count"><?php echo $jumlahtempat; ?></div>
              
            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-circle"></i>  Node Dijkstra</span>
			   <?php
				$query = $this->db->query('SELECT * FROM titik');
				$jumlahtitik = $query->num_rows();
			  ?>
              <div class="count"><?php echo $jumlahtitik; ?></div>
               
            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-share-alt"></i>  Path Dijkstra</span>
              <?php
				$query = $this->db->query('SELECT * FROM jalur');
				$jumlahjalur = $query->num_rows();
			  ?>
			  <div class="count"><?php echo $jumlahjalur; ?></div>
               
            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-rss"></i>  Berita</span>
              
			   <?php
				$query = $this->db->query('SELECT * FROM berita');
				$jumlahberita = $query->num_rows();
			  ?>
			  <div class="count"><?php echo $jumlahberita; ?></div>
              
            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-envelope"></i>  Pesan Kontak</span>
			   <?php
				$query = $this->db->query('SELECT * FROM kontakkami');
				$jumlahkontak = $query->num_rows();
			  ?>
              <div class="count"><?php echo $jumlahkontak; ?></div>
               
            </div>
          </div>

        </div>
        <!-- /top tiles -->

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

              <div class="row x_title">
                <div class="col-md-6">
                  <h3>Tempat  (SPKLU)</h3>
                </div>
                 
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div id=map> </div> <br/>
				
              </div>
               
              <div class="clearfix"></div>
            </div>
          </div>

        </div>
        <br />




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
		 
		var lats = -6.180676027191859;
		var lngs = 106.83277092924035;
		
	 
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
