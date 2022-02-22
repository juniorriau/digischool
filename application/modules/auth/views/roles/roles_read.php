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
        <h2 style="margin-top:0px">Roles Read</h2>
        <table class="table">
	    <tr><td>Rolename</td><td><?php echo $rolename; ?></td></tr>
	    <tr><td>Moduleroute</td><td><?php echo $moduleroute; ?></td></tr>
	    <tr><td>Rolelist</td><td><?php echo $rolelist; ?></td></tr>
	    <tr><td>Roleaction</td><td><?php echo $roleaction; ?></td></tr>
	    <tr><td>Createdat</td><td><?php echo $createdat; ?></td></tr>
	    <tr><td>Createdby</td><td><?php echo $createdby; ?></td></tr>
	    <tr><td>Updatedat</td><td><?php echo $updatedat; ?></td></tr>
	    <tr><td>Updatedby</td><td><?php echo $updatedby; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('roles') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>