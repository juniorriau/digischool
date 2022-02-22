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
        <h2 style="margin-top:0px">Galleries <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Galleryname <?php echo form_error('galleryname') ?></label>
            <input type="text" class="form-control" name="galleryname" id="galleryname" placeholder="Galleryname" value="<?php echo $galleryname; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinytext">Descriptions <?php echo form_error('descriptions') ?></label>
            <input type="text" class="form-control" name="descriptions" id="descriptions" placeholder="Descriptions" value="<?php echo $descriptions; ?>" />
        </div>
	    <div class="form-group">
            <label for="content">Content <?php echo form_error('content') ?></label>
            <textarea class="form-control" rows="3" name="content" id="content" placeholder="Content"><?php echo $content; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="datetime">Createdat <?php echo form_error('createdat') ?></label>
            <input type="text" class="form-control" name="createdat" id="createdat" placeholder="Createdat" value="<?php echo $createdat; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Createdby <?php echo form_error('createdby') ?></label>
            <input type="text" class="form-control" name="createdby" id="createdby" placeholder="Createdby" value="<?php echo $createdby; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Updatedat <?php echo form_error('updatedat') ?></label>
            <input type="text" class="form-control" name="updatedat" id="updatedat" placeholder="Updatedat" value="<?php echo $updatedat; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Updatedby <?php echo form_error('updatedby') ?></label>
            <input type="text" class="form-control" name="updatedby" id="updatedby" placeholder="Updatedby" value="<?php echo $updatedby; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('galleries') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>