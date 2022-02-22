<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>app">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
</div>

<?php if ($this->session->userdata('message') <> '') { ?>
    <div class="alert alert-info  text-center" role="alert">
        <strong><?php echo $this->session->userdata('message') ?> </strong> <?php echo $session['name']; ?>  .
    </div>
<?php } ?>



