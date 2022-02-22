<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                <li class="breadcrumb-item active"><?php echo ucfirst($this->uri->segment(2)) ?></li>
            </ol>
        </div>
        <h5 class="page-title"><?php echo ucfirst($this->uri->segment(2)) ?></h5>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header ">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <?php echo anchor(site_url('auth/users/create'), 'Create', 'class="btn btn-primary"'); ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 text-right">
                        <form action="<?php echo site_url('auth/users/index'); ?>" class="form-inline" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php
                                    if ($q <> '') {
                                        ?>
                                        <a href="<?php echo site_url('auth/users'); ?>" class="btn btn-warning">Reset</a>
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
                    <table class="table table-striped mb-0" >
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>CreatedAt</th>
                            <th>UpdatedAt</th>
                            <th>Action</th>
                        </tr><?php
                        foreach ($users_data as $users) {
                            ?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $users->username ?></td>
                                <td><?php echo $users->rolename ?></td>
                                <td><?php echo $users->createdat ?></td>
                                <td><?php echo $users->updatedat ?></td>
                                <td style="text-align:center" width="200px">
                                    <?php
                                    echo anchor(site_url('auth/users/update/' . $users->id), 'Update', 'class="btn btn-sm btn-info"');
                                    echo anchor(site_url('auth/users/delete/' . $users->id), 'Delete', 'class="btn btn-sm btn-warning" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
