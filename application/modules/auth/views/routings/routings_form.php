<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>auth">Home</a></li>
                <li class="breadcrumb-item "><a href="<?php echo base_url() ?>auth/routings"><?php echo ucfirst($this->uri->segment(2)) ?></a></li>
                <li class="breadcrumb-item active"><?php echo ucfirst($this->uri->segment(3)) ?></li>
            </ol>
        </div>
    </div>
</div>
<!-- end row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <form action="<?php echo $action; ?>" method="post">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-12"><?php echo ucfirst($this->uri->segment(2) . ' ' . $this->uri->segment(3)) ?></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="varchar">Routename <?php echo form_error('routename') ?></label>
                        <input type="text" class="form-control" name="routename" id="routename" placeholder="Routename" value="<?php echo $routename; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Routealias <?php echo form_error('routealias') ?></label>
                        <input type="text" class="form-control" name="routealias" id="routealias" placeholder="Routealias" value="<?php echo $routealias; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Route Icon <?php echo form_error('icon') ?></label>
                        <select name="icon" id="icon" class="form-control fa">
                            <?php foreach ($icons as $i) { ?>
                                <option class="fa fa-1x" value="<?php echo $i->icon ?>" <?php echo $icon == $i->icon ? 'selected' : '' ?>> <?php echo "&#x" . $i->unicode . " " . $i->icon ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                            <a href="<?php echo site_url('auth/routings') ?>" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> <!-- end col -->
</div>


