
<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>app">Home</a></li>
                <li class="breadcrumb-item "><a href="<?php echo base_url("bakend/" . $this->uri->segment(2)) ?>"><?php echo ucfirst($this->uri->segment(2)) ?></a></li>
                <li class="breadcrumb-item active"><?php echo ucfirst($this->uri->segment(3)) ?></li>
            </ol>
        </div>
    </div>
</div>
<!-- end row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-12"><?php echo ucfirst($this->uri->segment(2) . ' ' . $this->uri->segment(3)) ?></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title <?php echo form_error('title') ?></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="longtext">Content <?php echo form_error('content') ?></label>
                        <textarea name="content" id="content" rows="5" class="form-control"><?php echo $content ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Page Image <?php echo form_error('postimage') ?></label>
                        <?php if (!empty($postimage)) { ?>
                            <a class="image-popup-vertical-fit" href="<?php echo site_url($postimage) ?>" title="<?php echo $title; ?>">

                                <img src="<?php echo site_url($postimage) ?>" class="img img-thumbnail d-block mo-mb-2" style="max-height: 250px;width: auto;" alt=""/>
                            </a>
                        <?php } ?>
                        <input type="file" class="form-control" name="postimage" id="postimage" placeholder="Postimage" value="<?php echo $postimage; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="longtext">Metapost <?php echo form_error('metapost') ?><span class="badge badge-info badge-pill">Split with comma if more than 1</span></label>
                        <input type="text" class="form-control" name="metapost" id="metapost" placeholder="Metapost" value="<?php echo $metapost; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="longtext">Keywords <?php echo form_error('keywords') ?><span class="badge badge-info badge-pill">Split with comma if more than 1</span></label>
                        <input type="text" class="form-control" name="keywords" id="keywords" placeholder="Keywords" value="<?php echo $keywords; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="longtext">Status <?php echo form_error('poststatus') ?></label>
                        <select name="poststatus" id="poststatus" class="form-control">
                            <option value="Draft" <?php echo $poststatus == "Draft" ? 'selected' : '' ?>>Draft</option>
                            <option value="Public" <?php echo $poststatus == "Public" ? 'selected' : '' ?>>Public</option>
                            <option value="Private" <?php echo $poststatus == "Private" ? 'selected' : '' ?>>Private</option>
                            <option value="Trash" <?php echo $poststatus == "Trash" ? 'selected' : '' ?>>Trash</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <input type="hidden" name="type" id="type" value="page" />
                    <input type="hidden" name="commentstatus" id="commentstatus" value="0" />

                    <input type="hidden" name="currentimage" id="currentimage" value="<?php echo $postimage ?>" />
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('app/pages') ?>" class="btn btn-warning">Cancel</a>
                </div>
            </form>
        </div>
    </div> <!-- end col -->
</div>