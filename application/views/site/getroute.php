

<?php
 
$lokasiawal = "";
$lat = "";
$lon = "";
$idtujuan = $this->uri->segment(3);
 
?>

<div id="content">
  <div class="container">
    <div class="title clearfix">
      <h2>RUTE <small> Rute diperoleh dari algoritma dijkstra yang dicoding sendiri (hardcoded). 
	  </small></h2>
        <div class="title_right"> 
		
		</div>
    </div>
    <div class="pro_main_c">
      
	  
	  <div class="desc_blk">
             
	
	<div class="col-lg-12 row" style="margin:20px 10px; padding-top:20px;">
	<form method="POST" action="" >
		
		<div class="col-lg-5">
		<div class="form-group">
			<label class="col-lg-3 control-label">Lokasi Anda </label>
			<div class="col-lg-9">
				<input type="text" id="lokasiawal" name="lokasiawal" class="form-control required" placeholder="Alamat" autocomplete="on" runat="server"  value="<?php echo $lokasiawal; ?>" >
				
				<input type="hidden" id="lat" name="lat" value="<?php echo $lat; ?>"  >
				<input type="hidden" id="lon" name="lon" value="<?php echo $lon; ?>" > 
				
				<input type="hidden" id="nodeawal" name="nodeawal"  > 
				
			</div>
			</div>
		</div>
		
		<div class="col-lg-5">
		<div class="form-group">
			<label class="col-lg-3 control-label">Tujuan  </label>
			<div class="col-lg-9">
				<select name="tujuan" id="select2" class="form-control" disabled>
				<option value=''></option>
				<?php
				$query=$this->db->query("SELECT * FROM tempat ORDER BY nama_tempat ASC ");
				
				$datas = $query->result();
				foreach ($datas as $data) {
					if($data->id_tempat==$this->uri->segment(3)) {$ok="selected=selected";} else { $ok="";}
					echo "<option value='".$data->id_tempat."' $ok>".$data->nama_tempat."</option>";
				}
				
				?>
				</select>
				
				
				<?php
				$query=$this->db->query("SELECT * FROM tempat ORDER BY nama_tempat ASC ");
				
				$datas = $query->result();
				foreach ($datas as $data) {
					if($data->id_tempat==$this->uri->segment(3)) {
					
					echo "<input type='hidden' id='nodeakhir' name='nodeakhir' value='".$data->koordinat_tempat."'  > ";
						
					} else { }
					 
				}
				
				?>
				
				
			</div>
			</div>
		</div>
		 
		
		
		</form>
			  <br/> 
	</div>

	<?php if($aksicari=="YA") { ?>
	
  <div class="panel-group col-lg-12" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Detail Proses
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
		#1 Lokasi awal <br/>
		<span id="x1"></span><br/>
		(<span id="x2"></span>,<span id="x3"></span>)<br/><br/>
		
		#2 Lokasi tujuan <br/>
		<?php
		$query=$this->db->query("SELECT * FROM tempat WHERE id_tempat='".$idtujuan."'");
		$tempat = $query->result();
		
		echo $tempat[0]->nama_tempat."<br/>";
		echo $tempat[0]->alamat_tempat."<br/>";
		echo "(".$tempat[0]->koordinat_tempat.")<br/><br/>";
		 
		?>
		#3 Node dan Path <br/>
		<?php
		$query=$this->db->query("SELECT * FROM titik");
		$jumlahnode = $query->num_rows();
		
		$query=$this->db->query("SELECT * FROM jalur");
		$jumlahjalur = $query->num_rows(); 
		?>
		Node di basisdata <?php echo $jumlahnode; ?> buah, dan Path di basisdata <?php echo $jumlahjalur; ?> buah.<br/><br/>
		
		#4 Node terdekat dengan lokasi awal <br/>
		<div id="nodeterdekatawal"></div><br/> 
		
		
		#5 Node terdekat dengan lokasi akhir <br/>
		<div id="nodeterdekatakhir"></div><br/>
		 
		#6 Hasil pencarian jalur terpendek (dijkstra) <br/>
		<div id="results"></div> <br/> 
		 
		#7 Digabungkan dengan lokasi awal dan lokasi tujuan <br/>
		Lokasi anda-<span id="results2"></span>-Tujuan <br/> <br/>
		
		
		#8 Peta Dijkstra <br/>
		<div id="petadijkstra"></div><br/><br/>
		
		<!-- <div class="spgraph" id="graph"></div> -->  
							 
		
	
		
	
      </div>
    </div>
  </div>
  
</div>
<div class="clearfix"></div>


	<?php } ?>
            <div class="desc_blk_inn">
				<div id='map'></div> 
				 
            </div>
             
            
          </div>
	  <br/><br/>
	  
     
	  
    </div>
  </div>
</div>

