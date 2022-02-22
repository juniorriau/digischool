<!-- Clipboardjs -->
<script src="<?php echo base_url() ?>assets/app/plugins/clipboard/clipboard.min.js"></script>
<script>
    $('button').tooltip({
        trigger: 'click',
        placement: 'bottom'
    });

    function setTooltip(btn, message) {
        $(btn).tooltip('hide')
                .attr('data-original-title', message)
                .tooltip('show');
    }

    function hideTooltip(btn) {
        setTimeout(function () {
            $(btn).tooltip('hide');
        }, 1000);
    }
    var clipboard = new ClipboardJS('.copylink');

    clipboard.on('success', function (e) {
        setTooltip(e.trigger, 'Copied!');
        hideTooltip(e.trigger);
        console.log(e);
    });

    clipboard.on('error', function (e) {
        setTooltip(e.trigger, 'Failed to copy!');
        hideTooltip(e.trigger);
        console.log(e);
    });
</script>
<!-- Magnific popup -->
<script src="<?php echo base_url() ?>assets/app/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url() ?>assets/app/pages/lightbox.js"></script>
<script>
    $('.image-popup-vertical-fit').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }

    });
</script>