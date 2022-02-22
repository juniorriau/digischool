<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>app">Home</a></li>
                <li class="breadcrumb-item active"><?php echo ucfirst($this->uri->segment(2)) ?></li>
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
                    <div class="col-3">
                        <?php echo anchor(site_url('app/media/create'), 'Upload', 'class="btn btn-primary"'); ?>
                    </div>
                    <div class="col-lg-6">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                    <div class="col-3">
                        <form action="<?php echo site_url('app/media/index'); ?>" class="form-inline" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php
                                    if ($q <> '') {
                                        ?>
                                        <a href="<?php echo site_url('app/media'); ?>" class="btn btn-warning">Reset</a>
                                        <?php
                                    }
                                    ?>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php foreach ($media_data as $m) { ?>
                        <div class="col-xl-2 col-md-2">
                            <div class="card m-b-30">
                                <img class="card-img-top img-responsive" src="<?php echo base_url($m->fullpath) ?>" style="max-height: 150px; height: 150px;width: auto" >
                                <div class="card-body text-center">
                                    <p class="text-break"><span class="badge badge-default badge-pill "><?php echo $m->filename ?></span></p>
                                    <button class="btn btn-primary waves-effect waves-light copylink" data-clipboard-text="<?php echo base_url($m->fullpath) ?>"><i class="fas fa-link"></i></button>
                                    <a class="image-popup-no-margins image-popup-vertical-fit btn btn-primary waves-effect waves-light" href="<?php echo base_url($m->fullpath) ?>">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?php echo base_url('app/media/delete/' . $m->id) ?>" class="btn btn-danger waves-effect waves-light" onclick="javasciprt: return confirm('Are You Sure ?')"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>

                        </div><!-- end col -->
                    <?php } ?>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6 col-md-12">
                        <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                    </div>
                    <div class="col-md-6 col-md-12">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>