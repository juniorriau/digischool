<!-- Javascript
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <script type="text/javascript" src="<?php echo base_url("assets/web/")?>js/jquery.v2.1.3.js"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/web/")?>js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/web/")?>js/modernizr.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/web/")?>js/owl.carousel.js"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/web/")?>js/isotope.js"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/web/")?>js/jquery.jribbble-1.0.1.ugly.js"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/web/")?>js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/web/")?>js/hamzh.js"></script>
    <?php
if (isset($extrajs)) {
    $this->load->view($extrajs);
}
?>
</body>
</html>
