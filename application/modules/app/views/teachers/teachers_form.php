
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
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nip <?php echo form_error('nip') ?></label>
            <input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Assignto <?php echo form_error('assignto') ?></label>
            <div>
                <?php 
                if(!empty($class)){
                    foreach($class as $c){?>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="assignto[]" id="customCheck<?php echo $c->id?>" value="<?php echo $c->id?>" <?php echo in_array($c->id,$assignto)?'checked':''?> >
                        <label class="custom-control-label" for="customCheck<?php echo $c->id?>"><?php echo $c->classname?></label>
                    </div>
                    <?php }
                }
                ?>
                
            </div>
        </div>
        </div>
                <div class="card-footer">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <input type="hidden" name="currentassignto" value="<?php echo json_encode($assignto)?>"/>
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('app/teachers') ?>" class="btn btn-warning">Cancel</a>
                </div>
            </form>
        </div>
    </div> <!-- end col -->
</div>