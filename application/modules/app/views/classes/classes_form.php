<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Classes <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Classname <?php echo form_error('classname') ?></label>
            <input type="text" class="form-control" name="classname" id="classname" placeholder="Classname" value="<?php echo $classname; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Createdby <?php echo form_error('createdby') ?></label>
            <input type="text" class="form-control" name="createdby" id="createdby" placeholder="Createdby" value="<?php echo $createdby; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Createdat <?php echo form_error('createdat') ?></label>
            <input type="text" class="form-control" name="createdat" id="createdat" placeholder="Createdat" value="<?php echo $createdat; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Updatedby <?php echo form_error('updatedby') ?></label>
            <input type="text" class="form-control" name="updatedby" id="updatedby" placeholder="Updatedby" value="<?php echo $updatedby; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Updatedat <?php echo form_error('updatedat') ?></label>
            <input type="text" class="form-control" name="updatedat" id="updatedat" placeholder="Updatedat" value="<?php echo $updatedat; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('classes') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>