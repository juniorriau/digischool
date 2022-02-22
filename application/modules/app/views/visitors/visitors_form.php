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
        <h2 style="margin-top:0px">Visitors <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Ipaddress <?php echo form_error('ipaddress') ?></label>
            <input type="text" class="form-control" name="ipaddress" id="ipaddress" placeholder="Ipaddress" value="<?php echo $ipaddress; ?>" />
        </div>
	    <div class="form-group">
            <label for="longtext">Referrer <?php echo form_error('referrer') ?></label>
            <input type="text" class="form-control" name="referrer" id="referrer" placeholder="Referrer" value="<?php echo $referrer; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('visitors') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>