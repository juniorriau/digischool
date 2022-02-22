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
        <h2 style="margin-top:0px">Files Read</h2>
        <table class="table">
	    <tr><td>File Title</td><td><?php echo $file_title; ?></td></tr>
	    <tr><td>Enrolledto</td><td><?php echo $enrolledto; ?></td></tr>
	    <tr><td>File Name</td><td><?php echo $file_name; ?></td></tr>
	    <tr><td>File Path</td><td><?php echo $file_path; ?></td></tr>
	    <tr><td>Full Path</td><td><?php echo $full_path; ?></td></tr>
	    <tr><td>Createdby</td><td><?php echo $createdby; ?></td></tr>
	    <tr><td>Createdat</td><td><?php echo $createdat; ?></td></tr>
	    <tr><td>Updatedby</td><td><?php echo $updatedby; ?></td></tr>
	    <tr><td>Updatedat</td><td><?php echo $updatedat; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('files') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>