
<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
        <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>app">Home</a></li>
                <li class="breadcrumb-item "><a href="<?php echo base_url("app/" . $this->uri->segment(2)) ?>"><?php echo ucfirst($this->uri->segment(2)) ?></a></li>
                <li class="breadcrumb-item active"><?php echo ucfirst($this->uri->segment(3)) ?></li>
            </ol>
        </div>
    </div>
</div>
<!-- end row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <form action="<?php echo $action; ?>" method="post" >
                <div class="card-header ">
                    <div class="row">
                        <div class="col-12"><?php echo ucfirst($this->uri->segment(2) . ' ' . $this->uri->segment(3)) ?></div>
                    </div>
                </div>
                <div class="card-body">
	    <div class="form-group">
            <label for="int">Classid <?php echo form_error('classid') ?></label>
            <select name="class" id="class" class="form-control">
                <?php
                if(!empty($class)){
                    foreach($class as $c){ ?>
                        <option value="<?php echo $c->id?>" <?php echo $classid == $c->id?'selected':''?>><?php echo $c->classname?></option>
                    <?php }
                }
                ?>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nisn <?php echo form_error('nisn') ?></label>
            <input type="text" class="form-control" name="nisn" id="nisn" placeholder="Nisn" value="<?php echo $nisn; ?>" />
        </div>
	    </div>
                <div class="card-footer">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('app/students') ?>" class="btn btn-warning">Cancel</a>
                </div>
            </form>
        </div>
    </div> <!-- end col -->
</div>