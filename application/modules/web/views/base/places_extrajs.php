<script src="<?php echo base_url() ?>/assets/frontends/web/plugins/leaflet/leaflet.js"></script>
<script type="text/javascript">
    $("#formerror").hide();
    var mapOptions = {
        center: [$('#singleMap').data('latitude'), $('#singleMap').data('longitude')],
        zoom: 13
    };

    // Creating a map object
    var map = new L.map('singleMap', mapOptions);

    // Creating a Layer object
    var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

    // Adding layer to the map
    map.addLayer(layer);

    function validate_form() {
        var stat = false;
        if (!$("#fullname").val()) {
            $("#formerror").append('<span class="formerror gsd_close">Fullname Required</span>');
            stat = true;
        }
        if (!$("#email").val()) {
            $("#formerror").append('<span class="formerror gsd_close">Email Required</span>');
            stat = true;
        }
        if (!$("#content").val()) {
            $("#formerror").append('<span class="formerror gsd_close">Review Required</span>');
            stat = true;
        }
        return stat;
    }

    $("#add-comment").on('submit', function (e) {
        e.preventDefault();
        if (validate_form()) {
            $("#formerror").show();
        } else {
            $("#formerror").hide();
            var formdata = new FormData();
            formdata.append('placeid', $("#placeid").val());
            formdata.append('facility', $("#facility").val());
            formdata.append('comfort', $("#comfort").val());
            formdata.append('price', $("#price").val());
            formdata.append('service', $("#service").val());
            formdata.append('score', $("#rg_total").val());
            formdata.append('fullname', $("#fullname").val());
            formdata.append('email', $("#email").val());
            formdata.append('content', $("#content").val());
            formdata.append('<?php echo $this->security->get_csrf_token_name() ?>', $("#<?php echo $this->security->get_csrf_token_name() ?>").val());
            for (var i = 0; i < $("#image")[0].files.length; i++) {
                formdata.append('image[]', $("#image")[0].files[i]);
            }
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url("web/places/review_action") ?>",
                data: formdata,
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function (data) {
                    $("#<?php echo $this->security->get_csrf_token_name() ?>").val(data);
                    $("#facility").data("ionRangeSlider").reset();
                    $("#comfort").data("ionRangeSlider").reset();
                    $("#price").data("ionRangeSlider").reset();
                    $("#service").data("ionRangeSlider").reset();
                    $("#fullname").val("");
                    $("#email").val("");
                    $("#content").val("");
                    $("#image").val("");
                    $("#formerror").append('<span class="formerror color-bg ">Review submitted!</span>');
                    $("#formerror").show();
                    setTimeout(function () {
                        $("#formerror").hide();
                    }, 1000);
                }
            });
        }
    });
</script>