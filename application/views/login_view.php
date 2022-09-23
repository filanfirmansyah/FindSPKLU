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
  <link href="<?php echo base_url(); ?>assets/gentella/css/icheck/flat/green.css" rel="stylesheet">


  <script src="<?php echo base_url(); ?>assets/gentella/js/jquery.min.js"></script>
       
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/parsley/validation.css" />
  
	  <script src="<?php echo base_url(); ?>assets/parsley/parsley.min.js"></script>
	  <script src="<?php echo base_url(); ?>assets/parsley/messages.id.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

		<style>
		.login_content form input[type="submit"], #content form .submit {
			float: none !important;
			margin-left: 0px !important;
		}

		 
	
	.parsley-error-list > li{
		margin-left: -40px !important;
		margin-top:-15px;
		text-align: left !important;
	}
	</style>
	
</head>

<body style="background:#F7F7F7;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content" style="margin-top:-40px;">
		<center>
		 <h1><?php echo strtoupper($aplikasi->nama_aplikasi); ?></h1>
		 <img src="upload/<?php echo $aplikasi->logo_aplikasi; ?>" class="img-responsive" style="width:50%" /> 
		
		 </center>
          <form  class="form-horizontal" action "<?php echo base_url('login') ?>" method="POST" parsley-validate>
            <h1>Login Form</h1>
			  <?php
  
			if($this->session->flashdata('gagal')) {

				  echo '<div class="alert alert-danger fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>';
				  echo $this->session->flashdata('gagal');
				  echo '</div>';
			}
		  
		  ?>
		  
            <div>
              <input type="text" name="username"  class="form-control required" placeholder="Username" />
            </div>
            <div>
              <input type="password" name="password"  class="form-control required" placeholder="Password"  />
            </div>
            <div>
              <input type="submit" class="btn btn-default submit" value="Submit" >
              
            </div>
            <div class="clearfix"></div>
            <div class="separator">

               
              <div class="clearfix"></div>
              <br />
              <div>
                 

                <p>© <?php echo date("Y"); ?> All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template.</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
    </div>
  </div>

</body>

</html>

 