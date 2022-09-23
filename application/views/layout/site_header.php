<!DOCTYPE HTML>
<html class="noIE">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<meta http-equiv="Expires" content="-1">

<title><?php echo $aplikasi->nama_aplikasi; ?></title>

<link rel="icon" type="image/png" href="upload/<?php echo $aplikasi->icon_aplikasi; ?>" /> 

<!--Master css-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/cooncook/css/master.css">

 
<style>

	#content { 
		padding: 30px 0 0px 0;
	}
	
	.home-slider .banner {  
		width: 100%;
	}

	a {
		text-decoration:none !important; 
	}
	
	#content .main_box .box_1 img {
		width: 100%;
		height: 150px;
	}
	
	.sidebar .side_box_2 ul li .post_img {
		padding:2px;
		border:solid 1px #ccc;
		border-radius:0px;
		width: 60px;
		height: 40px; 
	}	
	
	.sidebar .side_box_2 ul li {
		padding: 10px;
	}
	
	.select2-container, .select2-selection {
			  
				height:32px !important; 
			 
			}

	.maplabels {
		mergin-top:-10px !important;
	}
	
	#nav .navbar-nav > li.active > a {
		color:#FED11D !important;
		 
	}
	
	
	
</style>
</head>
 
<body>
<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
?>
<div id="header">
  <div class="header_top">
    <div class="container"> 
      <div class="hed_right">
        <ul>
          <li>&nbsp;  </li> 
        </ul>
      </div>
    </div>
  </div>
  <div class="header_bot">
    <div class="container">
      <div class="logo"> <a href="<?php echo base_url(); ?>" style="text-decoration:none;"><h2> SPKLU <img alt="alt" src="<?php echo base_url(); ?>upload/<?php echo $aplikasi->logo_aplikasi; ?>" width="40px"> DKI JAKARTA </h2></a> 
	  
	   
					
	  </div>
      <div id="nav" class="yamm">
        <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <nav id="navbar-collapse-1" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown <?php if($this->uri->segment(2)=="") { echo "active"; } else { echo ""; } ?>" ><a href="<?php echo base_url(); ?>" >HOME</a> </li>
            
			<li class="dropdown <?php if($this->uri->segment(2)=="berita" or $this->uri->segment(2)=="berita_detail") { echo "active"; } else { echo ""; } ?>"><a href="<?php echo base_url(); ?>site/berita"  >BERITA</a> </li>
			
			  
            <li class="dropdown <?php if($this->uri->segment(2)=="tempat" or $this->uri->segment(2)=="tempat_detail") { echo "active"; } else { echo ""; } ?>"><a href="<?php echo base_url(); ?>site/tempat"  >SPKLU</a> </li>
			
			<li class="dropdown <?php if($this->uri->segment(2)=="terdekat" or $this->uri->segment(2)=="getroute" ) { echo "active"; } else { echo ""; } ?>"><a href="<?php echo base_url(); ?>site/terdekat"  >TERDEKAT</a> </li>
			
			<li class="dropdown <?php if($this->uri->segment(2)=="carirute" ) { echo "active"; } else { echo ""; } ?>"><a href="<?php echo base_url(); ?>site/carirute"  >CARI RUTE</a> </li>
			
            <li class="dropdown <?php if($this->uri->segment(2)=="kontak" ) { echo "active"; } else { echo ""; } ?>"><a href="<?php echo base_url(); ?>site/kontakkami" >KONTAK</a></li>
          </ul>
        </nav>
      </div>
      <div class="right_menu">
        <ul>
         
		  <li class="menubtn"><a href="#"><span class="fa fa-search"></span></a>
            <div class="menu_c search_menu">
              <div class="search_box">
                <input type="search" class="txtbox" placeholder="Search">
                <a href="#"><span class="fa fa-level-down fa-rotate-90"></span></a> </div>
            </div>
          </li>
		  
        </ul>
      </div>
    </div>
  </div>
</div>
 