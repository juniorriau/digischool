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
        <h2 style="margin-top:0px">Media Read</h2>
        <table class="table">
	    <tr><td>Filename</td><td><?php echo $filename; ?></td></tr>
	    <tr><td>Filepath</td><td><?php echo $filepath; ?></td></tr>
	    <tr><td>Fullpath</td><td><?php echo $fullpath; ?></td></tr>
	    <tr><td>Filetype</td><td><?php echo $filetype; ?></td></tr>
	    <tr><td>Descriptions</td><td><?php echo $descriptions; ?></td></tr>
	    <tr><td>Createdby</td><td><?php echo $createdby; ?></td></tr>
	    <tr><td>Createdat</td><td><?php echo $createdat; ?></td></tr>
	    <tr><td>Updatedby</td><td><?php echo $updatedby; ?></td></tr>
	    <tr><td>Updatedat</td><td><?php echo $updatedat; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('media') ?>" class="btn btn-warning">Cancel</a></td></tr>
	</table>
        </body>
</html>