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

            <div class="card-header ">
                <div class="row">
                    <div class="col-12"><?php echo ucfirst($this->uri->segment(2) . ' ' . $this->uri->segment(3)) ?></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card-header">
                            <h6>Page Lists</h6>
                        </div>
                        <div class="card-body">
                            <div class="custom-dd dd" id="nestable_pages">
                                <ol class="dd-list">
                                    <?php foreach ($pages as $p) { ?>
                                        <li class="dd-item" data-id="<?php echo $p->title . ";" . base_url("web/pages/" . $p->slug) ?>">
                                            <div class="dd-handle">
                                                <?php echo $p->title ?>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ol>
                            </div>
                        </div>

                        <div class="card-header">
                            <h6>Category Lists</h6>
                        </div>
                        <div class="card-body">
                            <div class="custom-dd dd" id="nestable_category">
                                <ol class="dd-list">
                                    <?php foreach ($category as $pc) { ?>
                                        <li class="dd-item" data-id="<?php echo $pc->category . ";" . base_url("web/categories/index/" . $pc->slug) ?>">
                                            <div class="dd-handle">
                                                <?php echo $pc->category ?>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ol>
                            </div>
                        </div>

                        <div class="card-header">
                            <h6>Add Text</h6>
                        </div>
                        <div class="card-body">
                            <div class="custom-dd dd">
                                <div class="form-group">
                                    <label for="varchar">Text Name</label>
                                    <input class="form-control" type="text" id="nameurl" name="nameurl" placeholder="Nama Com" />
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Text URL</label>
                                    <input class="form-control" type="url" id="url" name="url" placeholder="e.g: http://name.com" />
                                </div>
                                <button name="btnaddmenu" id="btnaddmenu" type="button" class="btn btn-info">Add to Menu</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12s">
                        <div class="card-header">
                            <h6>Main Menu</h6>
                        </div>
                        <div class="card-body">
                            <div class="custom-dd dd" id="nestable_menu">
                                <ol class="dd-list" id="main-list">
                                    <?php if (empty($site_menu)) { ?>
                                        <li class="dd-item" data-id="Home;<?php echo base_url("/web") ?>">
                                            <div class="dd-handle">
                                                Home
                                            </div>
                                        </li>
                                        <?php
                                    } else {
                                        $home = explode(";", $site_menu[0]->id);
                                        if (in_array("Home", $home) !== TRUE) {
                                            ?>
                                            <li class="dd-item" data-id="Home;<?php echo base_url("/web") ?>">
                                                <div class="dd-handle">
                                                    Home
                                                </div>
                                            </li>
                                            <?php
                                        }
                                        foreach ($site_menu as $mn) {
                                            ?>
                                            <li class="dd-item" data-id="<?php echo $mn->id ?>">
                                                <div class="dd-handle">
                                                    <?php echo current(explode(";", $mn->id)) ?>
                                                </div>
                                                <?php if (isset($mn->children)) { ?>
                                                    <ol class="dd-list">
                                                        <?php foreach ($mn->children as $chld) { ?>
                                                            <li class="dd-item" data-id="<?php echo $chld->id ?>">
                                                                <div class="dd-handle">
                                                                    <?php echo current(explode(";", $chld->id)) ?>
                                                                </div>
                                                            </li>
                                                        <?php } ?>
                                                    </ol>
                                                <?php } ?>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <form id="savemenu" method="post" action="<?php echo $action ?>">
                    <input type="hidden" name="nestable_menu_output" id="nestable_menu_output" value="" />
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                </form>
                <button id="menusave" name="menusave" class="btn btn-primary">Save</button>
            </div>

        </div>
    </div> <!-- end col -->
</div>