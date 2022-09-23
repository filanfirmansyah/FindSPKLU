<div id="content">
  <div class="container">
    <div class="title clearfix">
      <h2>Kontak Kami</h2>
    </div>
    <div class="contact_c">
	
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
				
				
      <div class="box contact-box animated  rollIn" data-animation="rollIn" >
		<div id='map'></div>
	  </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 bounceInLeft animated animation-done " data-animation="bounceInLeft">
          <div class="infor_c">
            <h5>Informasi</h5>
            <div class="infor_c_inn">
               <?php echo $aplikasi->tentang_kami; ?>
			   <br/><br/>
              <div class="add_c">
                <p><strong>Alamat: </strong><?php echo $aplikasi->alamat_pemilik; ?></p>
				<p><strong>No. Telp.: </strong><?php echo $aplikasi->notelp_pemilik; ?></p>
				<p><strong>E-mail: </strong><?php echo $aplikasi->email_pemilik; ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 animated bounceInRight animation-done" data-animation="bounceInRight">
          <div class="con_frm">
            <h5>Kirim Pesan</h5>
            <form method="POST" action="<?php echo base_url(); ?>site/simpankontakkami">
              <div class="frm con_frm_inn">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="lbltxt">Nama Pengirim:<span class="req">*</span></div>
                    <input type="text" name="nama" class="txtbox" required >
                  </div>
                  
                </div>
				
				 <div class="row">
                  
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="lbltxt">E-mail:<span class="req">*</span></div>
                    <input type="text" name="email" class="txtbox" required>
                  </div>
                </div>
                 
				
				 <div class="row">
                   
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="lbltxt">Judul Pesan:<span class="req">*</span></div>
                     <input type="text" name="judul" class="txtbox" required>
                  </div>
                </div>
				
                <div class="lbltxt">Isi Pesan: <span class="req">*</span></div>
                <textarea name="isi" required></textarea>
                <div class="clearfix frm_bot">
                  <input type="submit" class="btn_c" value="Kirim">
                  <input type="reset" class="clear_btn" value="Hapus">
                  <span class="reqired">* Fields Harus Diisi</span> </div>
              </div>
            </form>
          </div>
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
	

<?php

$koordinat = $aplikasi->koordinat_pemilik;
$koor = explode(",",$koordinat);
$lat = $koor[0];
$lon = $koor[1];

?>

	
<script type="text/javascript">
 
initialize();
	
	
	
var geocoder;
	var map;

function initialize()
	{
		
		
		var lats = <?php echo $lat;  ?>;
		var lngs = <?php echo $lon;  ?>;
		
		 
		
		// define map center
		var dkijakarta = new google.maps.LatLng(lats,lngs);
		var infoWindow = new google.maps.InfoWindow;
		
		// define map options
		var myOptions = {
			zoom: 15,
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
		// menambahkan pendengar acara ketika pengguna mengklik pada peta
		 
		 
		 
		var html = '<b><?php echo $aplikasi->nama_pemilik; ?></b><br/><?php echo $aplikasi->alamat_pemilik; ?>';
				 			
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
	
	
	 

 
	 	function bindInfoWindowArea(area, map, infoWindow, htmlArea) {
      google.maps.event.addListener(area, 'click', function(event) {
        infoWindow.setContent(htmlArea); 
		infoWindow.close();
        infoWindow.open(map, area); 
      });
    }
 

</script>
