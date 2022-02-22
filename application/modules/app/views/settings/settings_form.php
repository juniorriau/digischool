<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>app">Home</a></li>
                <li class="breadcrumb-item "><a href="<?php echo base_url() ?>app/packages"><?php echo ucfirst($this->uri->segment(2)) ?></a></li>
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
                    <div class="col-12"><?php echo ucfirst($this->uri->segment(2) . ' ' . $this->uri->segment(3)) ?> </div>
                </div>
            </div>
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#general" role="tab">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#mail" role="tab">Mail Setting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#post" role="tab">Post Setting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#socialmedia" role="tab">Social Media</a>
                        </li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="general" role="tabpanel">
                            <div class="form-group">
                                <label for="varchar">Site Name </label>
                                <input type="text" class="form-control" name="site_name" id="site_name"  value="<?php echo $site_name; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Site URL </label>
                                <input type="url" class="form-control" name="site_url" id="site_url"  value="<?php echo $site_url; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Site Title </label>
                                <input type="text" class="form-control" name="site_title" id="site_title"  value="<?php echo $site_title; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Site Description</label>
                                <input type="text" class="form-control" name="site_description" id="site_description"  value="<?php echo $site_description; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Site Email </label>
                                <input type="email" class="form-control" name="site_email" id="site_email"  value="<?php echo $site_email; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Site Logo </label>
                                <?php if (!empty($site_logo)) { ?>
                                    <img class="img-thumbnail" style="max-height: 240px" src="<?php echo site_url($site_logo) ?>"/>
                                <?php } ?>
                                <input class="form-control" type="file" name="filelogo" id="filelogo"/>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Site Icon </label>
                                <?php if (!empty($site_icon)) { ?>
                                    <img class="img-thumbnail" style="max-height: 240px" src="<?php echo site_url($site_icon) ?>"/>
                                <?php } ?>
                                <input class="form-control" type="file" name="fileicon" id="fileicon"/>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Site Home Background </label>
                                <?php if (!empty($site_home_bg)) { ?>
                                    <img class="img-thumbnail" style="max-height: 240px" src="<?php echo site_url($site_home_bg) ?>"/>
                                <?php } ?>
                                <input class="form-control" type="file" name="filesitehomebg" id="filesitehomebg"/>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Site Web Background </label>
                                <?php if (!empty($site_web_bg)) { ?>
                                    <img class="img-thumbnail" style="max-height: 240px" src="<?php echo site_url($site_web_bg) ?>"/>
                                <?php } ?>
                                <input class="form-control" type="file" name="filesitewebbg" id="filesitewebbg"/>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Site Background Video </label>
                                <input type="url" class="form-control" name="site_bg_video" id="site_bg_video"  value="<?php echo $site_bg_video; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Site Address </label>
                                <input type="text" class="form-control" name="site_address" id="site_address"  value="<?php echo $site_address; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Phone Number</label>
                                <input type="text" class="form-control" name="site_phone" id="site_phone"  value="<?php echo $site_phone; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Language</label>
                                <select name="site_lang" id="site_lang" class="form-control">
                                    <option value="id" <?php echo $site_lang == "id" ? 'selected' : '' ?>>Indonesia</option>
                                    <option value="en" <?php echo $site_lang == "en" ? 'selected' : '' ?>>English</option>
                                </select>
                            </div>
                        </div>
                        <div class="tab-pane p-3" id="mail" role="tabpanel">
                            <div class="form-group">
                                <label for="varchar">SMTP Host</label>
                                <input type="text" class="form-control" name="smtp_host" id="smtp_host"  value="<?php echo $smtp_host; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="varchar">SMTP User</label>
                                <input type="email" class="form-control" name="smtp_user" id="smtp_user"  value="<?php echo $smtp_user; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">SMTP Password</label>
                                <input type="password" class="form-control" name="smtp_pass" id="smtp_pass"  value="<?php echo base64_decode($smtp_pass); ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">SMTP Port</label>
                                <input type="text" class="form-control" name="smtp_port" id="smtp_port"  value="<?php echo $smtp_port; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">SMTP Secure</label>
                                <select name="smtp_secure" class="form-control" id="smtp_secure">
                                    <option <?php echo $smtp_secure == "None" ? 'selected' : '' ?>>None</option>
                                    <option <?php echo $smtp_secure == "TLS" ? 'selected' : '' ?>>TLS</option>
                                    <option <?php echo $smtp_secure == "SSL" ? 'selected' : '' ?>>SSL</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Reply To</label>
                                <input type="text" class="form-control" name="reply_to" id="reply_to"  value="<?php echo $reply_to; ?>" />
                            </div>
                        </div>
                        <div class="tab-pane p-3" id="post" role="tabpanel">
                            <div class="form-group">
                                <label for="varchar">Limit Posts per Page</label>
                                <input type="text" class="form-control" name="site_limit_post" id="site_limit_post"  value="<?php echo $site_limit_post; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Enable Recent Post</label>
                                <select class="form-control" name="site_enable_recent" id="site_enable_recent">
                                    <option value="1" <?php echo $site_enable_recent == 1 ? 'selected' : ''; ?>>Yes</option>
                                    <option value="0" <?php echo $site_enable_recent == 0 ? 'selected' : ''; ?>>No</option>
                                </select>
                            </div>

                        </div>
                        <div class="tab-pane p-3" id="socialmedia" role="tabpanel">
                            <div class="form-group">
                                <label for="varchar">Facebook</label>
                                <input type="text" class="form-control" name="social_facebook" id="social_facebook"  value="<?php echo $social_facebook; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Twitter</label>
                                <input type="text" class="form-control" name="social_facebook" id="social_facebook"  value="<?php echo $social_twitter; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Instagram</label>
                                <input type="text" class="form-control" name="social_instagram" id="social_instagram"  value="<?php echo $social_instagram; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Youtube</label>
                                <input type="text" class="form-control" name="social_youtube" id="social_youtube"  value="<?php echo $social_youtube; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Linkedin</label>
                                <input type="text" class="form-control" name="social_linkedin" id="social_linkedin"  value="<?php echo $social_linkedin; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Thumbler</label>
                                <input type="text" class="form-control" name="social_thumbler" id="social_thumbler"  value="<?php echo $social_thumbler; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Pinterest</label>
                                <input type="text" class="form-control" name="social_pinterest" id="social_pinterest"  value="<?php echo $social_pinterest; ?>"/>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                            <a href="<?php echo site_url('app/home') ?>" class="btn btn-danger">Go to Home</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> <!-- end col -->
</div>


