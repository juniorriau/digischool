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
        <h2 style="margin-top:0px">Files List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('files/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('files/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('files'); ?>" class="btn btn-default">Reset</a>
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
		<th>File Title</th>
		<th>Enrolledto</th>
		<th>File Name</th>
		<th>File Path</th>
		<th>Full Path</th>
		<th>Createdby</th>
		<th>Createdat</th>
		<th>Updatedby</th>
		<th>Updatedat</th>
		<th>Action</th>
            </tr><?php
            foreach ($files_data as $files)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $files->file_title ?></td>
			<td><?php echo $files->enrolledto ?></td>
			<td><?php echo $files->file_name ?></td>
			<td><?php echo $files->file_path ?></td>
			<td><?php echo $files->full_path ?></td>
			<td><?php echo $files->createdby ?></td>
			<td><?php echo $files->createdat ?></td>
			<td><?php echo $files->updatedby ?></td>
			<td><?php echo $files->updatedat ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('files/read/'.$files->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('files/update/'.$files->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('files/delete/'.$files->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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