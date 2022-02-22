<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>auth">Home</a></li>
                <li class="breadcrumb-item active"><?php echo ucfirst($this->uri->segment(2)) ?></li>
            </ol>
        </div>
    </div>
</div>
<!-- end row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header ">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <?php echo anchor(site_url('auth/routings/create'), 'Create', 'class="btn btn-primary"'); ?>
                        <?php echo anchor(site_url('auth/routings/generateAll'), 'Generate All Functions', 'class="btn btn-success"'); ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 text-right">
                        <form action="<?php echo site_url('auth/routings/index'); ?>" class="form-inline" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php
                                    if ($q <> '') {
                                        ?>
                                        <a href="<?php echo site_url('auth/routings'); ?>" class="btn btn-warning">Reset</a>
                                        <?php
                                    }
                                    ?>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table table-bordered mb-0" >
                        <tr>
                            <th>No</th>
                            <th>Routename</th>
                            <th>Routealias</th>
                            <th>Routeurl</th>
                            <th>Createdat</th>
                            <th>Updatedat</th>
                            <th>Action</th>
                        </tr><?php
                        foreach ($routings_data as $routings) {
                            ?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $routings->routename ?></td>
                                <td><?php echo $routings->routealias ?></td>
                                <td><?php echo $routings->routeurl ?></td>
                                <td><?php echo $routings->createdat ?></td>
                                <td><?php echo $routings->updatedat ?></td>
                                <td style="text-align:center">
                                    <?php
                                    echo anchor(site_url('auth/routings/generateOne/' . $routings->id), 'Generate Function', 'class="btn btn-sm btn-success"');
                                    echo anchor(site_url('auth/routings/update/' . $routings->id), 'Update', 'class="btn btn-sm btn-info"');
                                    echo anchor(site_url('auth/routings/delete/' . $routings->id), 'Delete', 'class="btn btn-sm btn-warning" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>


