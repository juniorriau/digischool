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
        <h2 style="margin-top:0px">Files <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">File Title <?php echo form_error('file_title') ?></label>
            <input type="text" class="form-control" name="file_title" id="file_title" placeholder="File Title" value="<?php echo $file_title; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Enrolledto <?php echo form_error('enrolledto') ?></label>
            <input type="text" class="form-control" name="enrolledto" id="enrolledto" placeholder="Enrolledto" value="<?php echo $enrolledto; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">File Name <?php echo form_error('file_name') ?></label>
            <input type="text" class="form-control" name="file_name" id="file_name" placeholder="File Name" value="<?php echo $file_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">File Path <?php echo form_error('file_path') ?></label>
            <input type="text" class="form-control" name="file_path" id="file_path" placeholder="File Path" value="<?php echo $file_path; ?>" />
        </div>
	    <div class="form-group">
            <label for="full_path">Full Path <?php echo form_error('full_path') ?></label>
            <textarea class="form-control" rows="3" name="full_path" id="full_path" placeholder="Full Path"><?php echo $full_path; ?></textarea>
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
	    <a href="<?php echo site_url('files') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>