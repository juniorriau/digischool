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
        <h2 style="margin-top:0px">Classes Read</h2>
        <table class="table">
	    <tr><td>Classname</td><td><?php echo $classname; ?></td></tr>
	    <tr><td>Createdby</td><td><?php echo $createdby; ?></td></tr>
	    <tr><td>Createdat</td><td><?php echo $createdat; ?></td></tr>
	    <tr><td>Updatedby</td><td><?php echo $updatedby; ?></td></tr>
	    <tr><td>Updatedat</td><td><?php echo $updatedat; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('classes') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>