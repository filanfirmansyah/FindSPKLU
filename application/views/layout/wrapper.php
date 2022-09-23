<?php
$this->simple_login->cek_login(); 
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php echo $aplikasi->nama_aplikasi; ?></title>
  <link rel="icon" type="image/png" href="upload/<?php echo $aplikasi->icon_aplikasi; ?>" /> 

  <!-- Bootstrap core CSS -->

  <link href="<?php echo base_url(); ?>assets/gentella/css/bootstrap.min.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>assets/gentella/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/gentella/css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="<?php echo base_url(); ?>assets/gentella/css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/gentella/css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="<?php echo base_url(); ?>assets/gentella/css/icheck/flat/green.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/gentella/css/floatexamples.css" rel="stylesheet" type="text/css" />

  <script src="<?php echo base_url(); ?>assets/gentella/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/gentella/js/nprogress.js"></script>
  
  <link href="<?php echo base_url(); ?>assets/gentella/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/gentella/js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/gentella/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/gentella/js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/gentella/js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />


  
  <!--[if lt IE 9]>
        <script src="<?php echo base_url(); ?>assets/gentella/../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="<?php echo base_url(); ?>assets/gentella/https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="<?php echo base_url(); ?>assets/gentella/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

		
	<style>
	.datatable_wrapper{
		padding:10px !important;
	}
	
	#datatable-responsive_wrapper{
		padding:10px !important;
	}
	
	th {
		text-align:center;
		text-transform:uppercase;
	}
	
	html, footer {
		background-color:#F7F7F7;
	}
	
	#sidebar-menu {
		background-color:#2A3F54;
	}
	
	.page-title .title_left {
		width: 100%;
		float: left;
		display: block;
	}
	
	.page-title .title_right {
		width: 0%; 
	}
	
	.sidebar-footer a { 
		width: 100%; 
	}

		.select2-container, .select2-selection {
				border-radius:0px !important;
				height:32px !important; 
			 
			}
			
	.radio {
		position: relative;
		display: unset !important; 
		 
	}
	
	.tile_stats_count { 
		margin-top: 10px !important;
		 
	}
	
	.tile_stats_count .count {
		font-size: 40px;
		line-height: 47px;
		font-weight: 600;
		margin-left: 30px;
	}
	
	</style>
</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

           

          <!-- menu prile quick info -->
          <div class="profile" style="padding:15px;">
			<center>
					<img src="<?php echo base_url(); ?>upload/<?php echo $aplikasi->logo_aplikasi; ?>" class="img-responsive" style="width:40%; margin:10px;">
					<h4><?php echo strtoupper($aplikasi->nama_aplikasi); ?></h4>
			</center>
			 
          </div>
          <!-- /menu prile quick info -->
 
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3> </h3>
              <ul class="nav side-menu">
                <li class="<?php if($this->uri->segment(1)=="dashboard") { echo "active"; } else { echo ""; }  ?>"><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-bar-chart"></i> Dashboard </a> 
                </li>
				
				
				 <li class="<?php 
				 
				 if($this->uri->segment(1)=="aplikasi" or
					$this->uri->segment(1)=="pengguna" or 
					$this->uri->segment(1)=="kecamatan" or 
					$this->uri->segment(1)=="marker" ) { echo "active"; } else { echo ""; }  ?>"><a><i class="fa fa-cogs"></i> Settings <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" <?php 
					if($this->uri->segment(1)=="aplikasi" or
					$this->uri->segment(1)=="pengguna" or 
					$this->uri->segment(1)=="kecamatan" or 
					$this->uri->segment(1)=="marker") { echo "style='display:block'"; } else { echo "style='display:none'"; }  ?>>
					
					<li <?php if($this->uri->segment(1)=="aplikasi") { echo "class='current-page'"; } else { echo ""; }  ?>><a href="<?php echo base_url('aplikasi'); ?>">Profil Aplikasi</a>
                    </li>
					
                    <li <?php if($this->uri->segment(1)=="pengguna") { echo "class='current-page'"; } else { echo ""; }  ?>><a href="<?php echo base_url('pengguna'); ?>">Pengguna</a>
                    </li>
					
                    <li <?php if($this->uri->segment(1)=="kecamatan") { echo "class='current-page'"; } else { echo ""; }  ?>><a href="<?php echo base_url('kecamatan'); ?>">Kecamatan</a>
                     
                    
                  </ul>
                </li>
               
				 
				
				
				
				<li class="<?php if($this->uri->segment(1)=="berita") { echo "active"; } else { echo ""; }  ?>"><a href="<?php echo base_url('berita');?>"><i class="fa fa-rss"></i> Berita  </a> 
                </li>
				
				<li class="<?php if($this->uri->segment(1)=="tempat") { echo "active"; } else { echo ""; }  ?>"><a href="<?php echo base_url('tempat');?>"><i class="fa fa-bars"></i> Tempat (SPKLU)</a> 
                </li>
				
				
				<li class="<?php if($this->uri->segment(1)=="nodedijkstra") { echo "active"; } else { echo ""; }  ?>"><a href="<?php echo base_url('nodedijkstra');?>"><i class="fa fa-share-alt"></i> Node Dijkstra  </a> 
                </li>
				
				<li class="<?php if($this->uri->segment(1)=="kontakkami") { echo "active"; } else { echo ""; }  ?>"><a href="<?php echo base_url('kontakkami');?>"><i class="fa fa-envelope-o"></i> Kontak  Kami</a> 
                </li>
				
				
				
 
				 
                  
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small"> 
            
              <span class="" aria-hidden="true" style="color:#172D44;">.</span>
            
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

			
			<?php if ($this->session->userdata('foto')==""){
				$foto = "noimage.jpg";
			} else {
				$foto = $this->session->userdata('foto');
			}
			?>
            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="<?php echo base_url(); ?>assets/gentella/javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?php echo base_url(); ?>upload/foto_pengguna/<?php echo $foto; ?>" alt=""><?php echo $this->session->userdata('namalengkap'); ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="<?php echo base_url(); ?>pengguna/editprofile">  Profile</a>
                  </li>
                  
               
                  <li><a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

              

            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->


      <!-- page content -->
      <div class="right_col" role="main">

        
		
		<?php
			if ($isi) {
			$this->load->view ($isi);
		}
		?>
			  
	  
	  
        <!-- footer content -->

        <footer>
          <div class="copyright-info">
            <p class="pull-right">Gentelella - Bootstrap Admin Template by Colorlib .
            </p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
      <!-- /page content -->

    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>
  
  
  
   
  <div class="modal fade" id="modal_ajax" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					 
					<h4 class="modal-title" id="myModalLabel" style="text-align:left;">Tambah Foto</h4>
					
				</div>
				<div class="modal-body" style="text-align:left;">
					 
				</div>
				<div class="modal-footer">

				  
				</div>
			</div>
		</div>
	</div>



  
   
  
  

  <script src="<?php echo base_url(); ?>assets/gentella/js/bootstrap.min.js"></script>

  <!-- gauge js -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/gentella/js/gauge/gauge.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/gentella/js/gauge/gauge_demo.js"></script>
  <!-- bootstrap progress js -->
  <script src="<?php echo base_url(); ?>assets/gentella/js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/gentella/js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="<?php echo base_url(); ?>assets/gentella/js/icheck/icheck.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/gentella/js/moment/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/gentella/js/datepicker/daterangepicker.js"></script> 
  <!-- chart js -->
  
  <script src="<?php echo base_url(); ?>assets/gentella/js/custom.js"></script>
  
  
        
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/parsley/validation.css" />
  
	  <script src="<?php echo base_url(); ?>assets/parsley/parsley.min.js"></script>
	  <script src="<?php echo base_url(); ?>assets/parsley/messages.id.js"></script>
	  
	  
	  
          <!-- Datatables-->
        <script src="<?php echo base_url(); ?>assets/gentella/js/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/gentella/js/datatables/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/gentella/js/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/gentella/js/datatables/buttons.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/gentella/js/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/gentella/js/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/gentella/js/datatables/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>assets/gentella/js/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/gentella/js/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/gentella/js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/gentella/js/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/gentella/js/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/gentella/js/datatables/responsive.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/gentella/js/datatables/dataTables.scroller.min.js"></script>
		
		

		
		
			
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/gentella/select2/dist/css/select2.css" />
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/gentella/select2/dist/js/select2.js"></script>
	
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
	
	
    <script type="text/javascript">
		  
		   $(".alert").delay(4000).addClass("in").fadeOut("slow");
		   
         
           $('#datatable').dataTable();
           $('#datatable-responsive').dataTable();
		   
		    $("#penduduk").select2();
		   
 
	
           
        </script>
		
		
		
 
   
 
   
  <script>
    NProgress.done();
  </script>
  <!-- /datepicker -->
  <!-- /footer content -->
  
   <script type="text/javascript">
    $(document).ready(function() {
      $.listen('parsley:field:validate', function() {
        validateFront();
      });
      $('#demo-form .btn').on('click', function() {
        $('#demo-form').parsley().validate();
        validateFront();
      });
      var validateFront = function() {
        if (true === $('#demo-form').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });

    $(document).ready(function() {
      $.listen('parsley:field:validate', function() {
        validateFront();
      });
      $('#demo-form2 .btn').on('click', function() {
        $('#demo-form2').parsley().validate();
        validateFront();
      });
      var validateFront = function() {
        if (true === $('#demo-form2').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });
    try {
      hljs.initHighlightingOnLoad();
    } catch (err) {}
  </script>
  
  
   <script type="text/javascript">
            
              $('#birthday').daterangepicker({
                singleDatePicker: true,
				format: 'DD-MM-YYYY',
                calender_style: "picker_4"
              }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
              });
            
          </script>

  
  
	<script>	  
	
		function showAjaxModal(url) { 
			$('#modal_ajax').modal('show', {backdrop: 'true'}); 
			$.ajax({
				url:  url,
				success: function(response)
				{ 
					$('#modal_ajax .modal-body').html(response);
				}
			});
		}
	 
	 
	tinymce.init({
	 menubar : false,
		  forced_root_block : "", 
		force_br_newlines : true,
		force_p_newlines : false,
		selector: ".textareaku",
		
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste  code"
		],
		toolbar: " styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | undo redo | jbimages | code"
	});


	</script>
	
		
		
</body>

</html>


