
<!-- CKEditor4 -->

<script src="<?php echo base_url() ?>assets/app/plugins/ckfinder/ckfinder.js"></script>
<script src="<?php echo base_url() ?>assets/app/plugins/ckeditor4/ckeditor.js"></script>
<script src="<?php echo base_url() ?>assets/app/plugins/ckeditor4/adapters/jquery.js"></script>
<!-- Magnific popup -->
<script src="<?php echo base_url() ?>assets/app/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url() ?>assets/app/pages/lightbox.js"></script>

<script type="text/javascript">
    $(function () {
        CKEDITOR.replace('content', {
            filebrowserBrowseUrl: '<?php echo base_url('assets/app/plugins/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=') ?>',
        });
        //var editor = CKEDITOR.replace('content');
        //CKFinder.setupCKEditor(editor);

    });
    $('.image-popup-vertical-fit').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }

    });
</script>
