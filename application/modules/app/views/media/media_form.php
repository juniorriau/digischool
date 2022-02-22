<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>app">Home</a></li>
                <li class="breadcrumb-item "><a href="<?php echo base_url("bakend/" . $this->uri->segment(2)) ?>"><?php echo ucfirst($this->uri->segment(2)) ?></a></li>
                <li class="breadcrumb-item active"><?php echo ucfirst($this->uri->segment(3)) ?></li>
            </ol>
        </div>
    </div>
</div>
<!-- end row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">

            <div class="card-header ">
                <div class="row">
                    <div class="col-12"><?php echo ucfirst($this->uri->segment(2) . ' ' . $this->uri->segment(3)) ?></div>
                </div>
            </div>
            <div class="card-body">
                <form id="dropzone" action="<?php echo $action; ?>" class="dropzone" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="fallback">
                            <input id="file" name="file" type="file" multiple="multiple">
                        </div>
                    </div>
                    <input id="<?= $this->security->get_csrf_token_name() ?>" type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                </form>
            </div>
            <div class="card-footer">
                <a href="<?php echo site_url('app/media') ?>" class="btn btn-success">Back to Media</a>
            </div>

        </div>
    </div> <!-- end col -->
</div>


