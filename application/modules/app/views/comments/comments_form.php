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
        <h2 style="margin-top:0px">Comments <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Postid <?php echo form_error('postid') ?></label>
            <input type="text" class="form-control" name="postid" id="postid" placeholder="Postid" value="<?php echo $postid; ?>" />
        </div>
	    <div class="form-group">
            <label for="comment">Comment <?php echo form_error('comment') ?></label>
            <textarea class="form-control" rows="3" name="comment" id="comment" placeholder="Comment"><?php echo $comment; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Authorname <?php echo form_error('authorname') ?></label>
            <input type="text" class="form-control" name="authorname" id="authorname" placeholder="Authorname" value="<?php echo $authorname; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Authoremail <?php echo form_error('authoremail') ?></label>
            <input type="text" class="form-control" name="authoremail" id="authoremail" placeholder="Authoremail" value="<?php echo $authoremail; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Authorip <?php echo form_error('authorip') ?></label>
            <input type="text" class="form-control" name="authorip" id="authorip" placeholder="Authorip" value="<?php echo $authorip; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Approved <?php echo form_error('approved') ?></label>
            <input type="text" class="form-control" name="approved" id="approved" placeholder="Approved" value="<?php echo $approved; ?>" />
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
	    <a href="<?php echo site_url('comments') ?>" class="btn btn-warning">Cancel</a>
	</form>
    </body>
</html>