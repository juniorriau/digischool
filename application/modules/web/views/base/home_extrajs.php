<script type="text/javascript">
    $("#btn_search").on('click', function (e) {
        e.preventDefault();
        if ($("#keyword").val() != "") {
            window.location.href = '<?php echo base_url('web/places/search/') ?>' + $("#placecategory").val() + '/' + $("#keyword").val();
        }
    });

    $("#btn_reset").on('click', function () {
        $("#keyword").val("");
        $("#placecategory").select(0);
    });
</script>
