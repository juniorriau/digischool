<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>app">Home</a></li>
                <li class="breadcrumb-item active"><?php echo ucfirst($this->uri->segment(2)) ?></li>
            </ol>
        </div>
        <h5 class="page-title">Comments List</h5>
    </div>
</div>
<!-- end row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header ">
                <div class="row">
                    <div class="col-3">
                        <?php echo anchor(site_url('comments/create'), 'Create', 'class="btn btn-primary"'); ?>
                    </div>
                    <div class="col-lg-6">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                    <div class="col-3">
                        <form action="<?php echo site_url('app/comments/index'); ?>" class="form-inline" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php
                                    if ($q <> '') {
                                        ?>
                                        <a href="<?php echo site_url('app/comments'); ?>" class="btn btn-warning">Reset</a>
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
                            <th>Post</th>
                            <th>Comment</th>
                            <th>Authorname</th>
                            <th>Authoremail</th>
                            <th>Authorip</th>
                            <th>Approved</th>
                            <th>Action</th>
                        </tr><?php
                        foreach ($comments_data as $comments) {
                            ?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $comments->postid ?></td>
                                <td><?php echo $comments->comment ?></td>
                                <td><?php echo $comments->authorname ?></td>
                                <td><?php echo $comments->authoremail ?></td>
                                <td><?php echo $comments->authorip ?></td>
                                <td><?php echo $comments->approved ?></td>
                                <td style="text-align:center" width="200px">
                                    <?php
                                    echo anchor(site_url('comments/read/' . $comments->id), 'Read');
                                    echo ' | ';
                                    echo anchor(site_url('comments/update/' . $comments->id), 'Update');
                                    echo ' | ';
                                    echo anchor(site_url('comments/delete/' . $comments->id), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
                    <div class="col-md-6 col-md-12">
                        <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                    </div>
                    <div class="col-md-6 col-md-12">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>