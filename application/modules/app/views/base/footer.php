

</div>
<!-- END wrapper -->


<!-- jQuery  -->
<script src="<?php echo base_url() ?>assets/app/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/app/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/app/js/modernizr.min.js"></script>
<script src="<?php echo base_url() ?>assets/app/js/detect.js"></script>
<script src="<?php echo base_url() ?>assets/app/js/fastclick.js"></script>
<script src="<?php echo base_url() ?>assets/app/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url() ?>assets/app/js/jquery.blockUI.js"></script>
<script src="<?php echo base_url() ?>assets/app/js/waves.js"></script>
<script src="<?php echo base_url() ?>assets/app/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url() ?>assets/app/js/jquery.scrollTo.min.js"></script>

<!-- App js -->
<script src="<?php echo base_url() ?>assets/app/js/app.js"></script>
<?php
if (isset($extrajs)) {
    $this->load->view($extrajs);
}
?>
</body>
</html>