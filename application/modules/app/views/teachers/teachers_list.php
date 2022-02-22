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
        <h2 style="margin-top:0px">Teachers List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('teachers/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('teachers/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('teachers'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Name</th>
		<th>Nip</th>
		<th>Assignto</th>
		<th>Createdby</th>
		<th>Createdat</th>
		<th>Updatedby</th>
		<th>Updatedat</th>
		<th>Action</th>
            </tr><?php
            foreach ($teachers_data as $teachers)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $teachers->name ?></td>
			<td><?php echo $teachers->nip ?></td>
			<td><?php echo $teachers->assignto ?></td>
			<td><?php echo $teachers->createdby ?></td>
			<td><?php echo $teachers->createdat ?></td>
			<td><?php echo $teachers->updatedby ?></td>
			<td><?php echo $teachers->updatedat ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('teachers/read/'.$teachers->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('teachers/update/'.$teachers->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('teachers/delete/'.$teachers->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>