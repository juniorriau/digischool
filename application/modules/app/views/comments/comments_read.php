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
        <h2 style="margin-top:0px">Comments Read</h2>
        <table class="table">
	    <tr><td>Postid</td><td><?php echo $postid; ?></td></tr>
	    <tr><td>Comment</td><td><?php echo $comment; ?></td></tr>
	    <tr><td>Authorname</td><td><?php echo $authorname; ?></td></tr>
	    <tr><td>Authoremail</td><td><?php echo $authoremail; ?></td></tr>
	    <tr><td>Authorip</td><td><?php echo $authorip; ?></td></tr>
	    <tr><td>Approved</td><td><?php echo $approved; ?></td></tr>
	    <tr><td>Createdat</td><td><?php echo $createdat; ?></td></tr>
	    <tr><td>Createdby</td><td><?php echo $createdby; ?></td></tr>
	    <tr><td>Updatedat</td><td><?php echo $updatedat; ?></td></tr>
	    <tr><td>Updatedby</td><td><?php echo $updatedby; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('comments') ?>" class="btn btn-warning">Cancel</a></td></tr>
	</table>
        </body>
</html>