<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>auth">Home</a></li>
                <li class="breadcrumb-item "><a href="<?php echo base_url() ?>auth/userdetails"><?php echo ucfirst($this->uri->segment(2)) ?></a></li>
                <li class="breadcrumb-item active"><?php echo ucfirst($this->uri->segment(3)) ?></li>
            </ol>
        </div>
    </div>
</div>
<!-- end row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-12"><?php echo ucfirst($this->uri->segment(2) . ' ' . $this->uri->segment(3)) ?></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="varchar">Fullname <?php echo form_error('fullname') ?></label>
                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Fullname" value="<?php echo $fullname; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="address">Address <?php echo form_error('address') ?></label>
                        <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"><?php echo $address; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="url">Url <?php echo form_error('url') ?></label>
                        <input type="url" class="form-control" name="url" id="url" placeholder="Url" value="<?php echo $url; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Image <?php echo form_error('image') ?></label>
                        <?php if (!empty($image)) { ?>
                            <img width="30%" class="img-responsive img-thumbnail" src="<?php echo site_url($image) ?>"/>
                        <?php } ?>
                        <input type="text" class="form-control" name="image" id="image" readonly="" value="<?php echo $image; ?>" />
                        <input type="file" class="form-control" name="fileimage" id="fileimage"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Aboutme <?php echo form_error('description') ?></label>
                        <textarea class="form-control" rows="3" name="description" id="description" placeholder="Aboutme"><?php echo $description; ?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            <input type="hidden" name="userid" value="<?php echo $userid; ?>" />
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                            <a href="<?php echo site_url('auth/home') ?>" class="btn btn-danger">Go to Home</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> <!-- end col -->
</div>


