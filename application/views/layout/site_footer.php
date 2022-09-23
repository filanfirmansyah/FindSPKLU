<div id="footer" >
   <div class="f_mid">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <h4>Tentang Kami</h4>
          <div class="desc">
			<?php echo $aplikasi->tentang_kami; ?>
			</div>
           
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <h4>Kontak</h4>
          
          <p><strong>Alamat: </strong><?php echo $aplikasi->alamat_pemilik; ?></p>
          <p><strong>No. Telp.: </strong><?php echo $aplikasi->notelp_pemilik; ?></p>
          <p><strong>E-mail: </strong><?php echo $aplikasi->email_pemilik; ?></p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
           
		   
		   
		   
        </div>
      </div>
    </div>
  </div>
  <div class="f_bot">
    <div class="container">
      <div class="f_bot_left"><strong>CoonCook - </strong>Responsive  Theme  © <?php echo date("Y"); ?></div>
      <div class="f_bot_right"> </div>
    </div>
  </div>
</div>

 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/cooncook/js/jquery.js"></script>
	
<script type="text/javascript" src="<?php echo base_url(); ?>assets/cooncook/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/cooncook/js/jquery.icheck.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/cooncook/js/package.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/cooncook/js/jquery.flexslider.js"></script>
<script src="<?php echo base_url(); ?>assets/cooncook/js/bxslider/jquery.bxslider.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/cooncook/js/scripts.js"></script>

 
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/gentella/select2/dist/css/select2.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/gentella/select2/dist/js/select2.js"></script>
		

<script>


 $("#select2").select2();
 
$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});





</script>


</body>

</html>
