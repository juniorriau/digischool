
<!-- CKEditor4 -->

<script src="<?php echo base_url() ?>assets/app/plugins/ckfinder/ckfinder.js"></script>
<script src="<?php echo base_url() ?>assets/app/plugins/ckeditor4/ckeditor.js"></script>
<script src="<?php echo base_url() ?>assets/app/plugins/ckeditor4/adapters/jquery.js"></script>
<script type="text/javascript">
    $(function () {
        CKEDITOR.replace('content', {
            filebrowserBrowseUrl: '<?php echo base_url('assets/app/plugins/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=') ?>',
        });
        //var editor = CKEDITOR.replace('content');
        //CKFinder.setupCKEditor(editor);

    });
</script>
