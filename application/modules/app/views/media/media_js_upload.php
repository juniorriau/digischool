<!-- Dropzone js -->
<script src="<?php echo base_url() ?>assets/app/plugins/dropzone/dist/dropzone.js"></script>
<script>
    Dropzone.autoDiscover = false;

    var foto_upload = new Dropzone("#dropzone", {
        url: "<?php echo $action ?>",
        maxFilesize: 10240,
        method: "post",
        acceptedFiles: ".gif,.jpg,.jpeg,.png,.pdf,.doc,.docx,.xlsx,.ppt,.pptx,.zip,.rar",
        paramName: "file",
        parallelUploads: 20,
        dictInvalidFileType: "Tipe file ini tidak dizinkan",
        addRemoveLinks: false,
    });
    foto_upload.on('complete', function (file) {
        $("#<?= $this->security->get_csrf_token_name() ?>").val(file.xhr.responseText);

    });
</script>