
<script src="<?php echo base_url() ?>/assets/frontends/web/plugins/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        $("#eticket").hide();
        $("#confirmpay").hide();
        $(function () {
            $("#visitdate").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        });

        function getprice(id) {
            var obj = {};
            $.ajax({
                type: "GET",
                url: "<?php echo site_url("web/ticketorders/getprice/") ?>" + id,
                dataType: 'JSON',
                async: false,
                success: function (data) {
                    obj = data;
                }
            });
            return obj;
        }
        function getplacedetail(id) {
            var obj = {};
            $.ajax({
                type: "GET",
                url: "<?php echo site_url("web/places/ajax_detail/") ?>" + id,
                dataType: 'JSON',
                async: false,
                success: function (data) {
                    obj = data;
                }
            });
            return obj;
        }

        $("#placeid").on('change', function () {
            var price = getprice(this.value);
            $("#adultp").html("@ Rp. " + price.adult);
            $("#teenagerp").html("@ Rp. " + price.teenager);
            $("#childp").html("@ Rp. " + price.child);
            var place = getplacedetail(this.value);
            $("#ajax_cart_img").attr('src', "<?php echo site_url() ?>" + place.image_path + "/" + place.image_name);
            $("#ajax_cart_title").html(place.name);
            $("#ajax_cart_address").html(place.address);
            $("#ajax_cart_category").html(place.placecategory);
        });
        $("#adult").on('keyup', function () {
            var price = getprice($("#placeid").val());
            $("#adulttprice").html("Rp. " + (price.adult * this.value));
            $("#totalprice").html("Rp. " + ((price.adult * parseInt(this.value)) + (price.teenager * parseInt($("#teenager").val())) + (price.child * parseInt($("#child").val()))));
        });
        $("#teenager").on('keyup', function () {
            var price = getprice($("#placeid").val());
            $("#teenagertprice").html("Rp. " + (price.teenager * this.value));
            $("#totalprice").html("Rp. " + ((price.teenager * parseInt(this.value)) + (price.adult * parseInt($("#adult").val())) + (price.child * parseInt($("#child").val()))));
        });
        $("#child").on('keyup', function () {
            var price = getprice($("#placeid").val());
            $("#childtprice").html("Rp. " + (price.child * this.value));
            $("#totalprice").html("Rp. " + ((price.child * parseInt(this.value)) + (price.teenager * parseInt($("#teenager").val())) + (price.adult * parseInt($("#adult").val()))));
        });

    });


    $("#triggerconfirm").on("click", function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url("web/ticketorders/order_action") ?>",
            data: $("#ticketorder").serialize(),
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                $("#eticket").show();
                $("#eticketbc").attr('src', "<?php echo base_url('web/ticketorders/generate_barcode/') ?>" + data);
                $("#eticketdownload").attr('href', "<?php echo base_url('web/ticketorders/download/') ?>" + data);
            }
        });
    });
</script>
