<?php
if($aksicariterdekat=="YA") {
	$LOKASIAWAL = $lokasiawal;
	$LAT = $lat;
	$LON = $lon;
	$IDKECAMATAN = $idkecamatan;
 
}
  	

?>

<div id="content">
  <div class="container">
    <div class="title clearfix">
      <h2>SPKLU TERDEKAT</h2>
        <div class="title_right"> 
		
		</div>
    </div>
    <div class="pro_main_c">
      
	  
	  <div class="desc_blk">
             
	
	<div class="col-lg-12 row" style="margin:20px 10px; padding-top:20px;">
	<form method="POST" action="<?php echo base_url(); ?>site/terdekat/" >
		
		<div class="col-lg-5">
		<div class="form-group">
			<label class="col-lg-4 control-label">Lokasi Anda </label>
			<div class="col-lg-8">
				<input type="text" id="lokasiawal" name="lokasiawal" class="form-control required" placeholder="Alamat" autocomplete="on" runat="server"  value="<?php echo $LOKASIAWAL; ?>" >
				
				<input type="hidden" id="lat" name="lat" value="<?php echo $LAT; ?>"  >
				<input type="hidden" id="lon" name="lon" value="<?php echo $LON; ?>" > 
				
				<input type="hidden" id="nodeawal" name="nodeawal"  > 
				<input type="hidden" id="nodeakhir" name="nodeakhir"  >
				<input type="hidden" id="jarakdriving" name="jarakdriving"  >
			</div>
			</div>
		</div>
		
		<div class="col-lg-5">
		<div class="form-group">
			<label class="col-lg-4 control-label">Cari SPKLU Di Area (Kec.)</label>
			<div class="col-lg-8">
				<select name="idkecamatan" id="select2" class="form-control">
				<option value=''> -- Pilih Kecamatan --</option>
				<?php
				$query=$this->db->query("SELECT * FROM kecamatan ORDER BY id_kecamatan ASC "); 
				$datas = $query->result();
				foreach ($datas as $data) {
					if($data->id_kecamatan==$IDKECAMATAN) {$ok="selected=selected";
					$KECAMATAN = $data->nama_kecamatan;
					} else { $ok=""; }
					echo "<option value='".$data->id_kecamatan."' $ok>".$data->nama_kecamatan."</option>";
				}
				
				?>
				</select>
				
				 
				
			</div>
			</div>
		</div>
		<div class="col-lg-1">
		<div class="form-group"> 
			<div class="col-lg-12">
				<button type="submit" name="cari" value="YA" class="btn btn-success">TAMPILKAN</button>
			</div>
			</div>
			
			
		</div>
		
		
		</form>
		<div class="col-lg-12">
		Alamat dapat diperoleh otomatis melalui :<br/>
		1. fitur html5 geolocation (terbaik jika menggunakan smartphone)<br/>
		2. ketik dan dibantu auto suggest google api (library places)<br/>
		3. klik pada peta <br/> 
		</div>
	</div>

	 
            <div class="desc_blk_inn">
				<div id='map'></div> 
				 
				   
			 
		 
			 
	 
		
 <?php if ($aksicariterdekat!="YA") { ?>	       
			<div class="clearfix"></div>
    
		 </div>
		  
          </div>
	   
	  
      
    </div>
  </div>
</div>
 <?php } ?>

	 