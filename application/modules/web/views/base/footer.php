<script src="<?php echo base_url('assets/frontends/web/') ?>js/jquery.min.js"></script>
<script src="<?php echo base_url('assets/frontends/web/') ?>js/plugins.js"></script>
<script src="<?php echo base_url('assets/frontends/web/') ?>js/scripts.js"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY_HERE&libraries=places&callback=initAutocomplete"></script>
<script src="<?php echo base_url('assets/frontends/web/') ?>js/map-single.js"></script>-->
<?php
if (isset($extrajs)) {
    $this->load->view($extrajs);
}
?>
</body>
</html>
