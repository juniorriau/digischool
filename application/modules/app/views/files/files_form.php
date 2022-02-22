
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
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" >
                <div class="card-header ">
                    <div class="row">
                        <div class="col-12"><?php echo ucfirst($this->uri->segment(2) . ' ' . $this->uri->segment(3)) ?></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="varchar">File Title <?php echo form_error('file_title') ?></label>
                        <input type="text" class="form-control" name="file_title" id="file_title" placeholder="File Title" value="<?php echo $file_title; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Enrolledto <?php echo form_error('enrolledto') ?></label>
                        <select name="class" id="class" class="form-control">
                            <?php
                            if(!empty($class)){
                                foreach($class as $c){ ?>
                                    <option value="<?php echo $c->id?>" <?php echo $enrolledto == $c->id?'selected':''?>><?php echo $c->classname?></option>
                                <?php }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="varchar">File <?php echo form_error('file') ?><span class="badge badge-warning">.docx/.doc/.xls/.xlxs/.pdf/.ppt</span></label>
                        <input type="file" name="file" id="file" class="form-control">
                        <label >Current File <span class="badge badge-success"><?php echo $file_name?></span></label>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Expire at<?php echo form_error('expiredat') ?></label>
                        <input type="text" name="expiredat" id="expiredat" autocomplete="false" class="form-control datepicker" value="<?php echo $expiredat?>">
                    </div>
	    	    </div>
                <div class="card-footer">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <input type="hidden" name="curfile" value="<?php echo $curfile?>"/>
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('app/files') ?>" class="btn btn-warning">Cancel</a>
                </div>
            </form>
        </div>
    </div> <!-- end col -->
</div>