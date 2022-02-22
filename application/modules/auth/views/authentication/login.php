<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo $this->config->item('site_name') ?></title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="<?php echo base_url($this->config->item('site_icon')) ?>">

        <link href="<?php echo base_url() ?>assets/app/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/app/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/app/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div class="accountbg">

            <div class="content-center">
                <div class="content-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-8">
                                <div class="card">
                                    <div class="card-body">

                                        <h3 class="text-center mt-0 m-b-15">
                                            <a href="<?php echo base_url() ?>" class="logo logo-admin"><img src="<?php echo base_url($this->config->item('site_logo')) ?>" width="45%" alt="logo"></a>
                                        </h3>

                                        <h4 class="text-muted text-center font-18"><b>Sign In </b></h4>
                                        <?php if ($this->session->userdata('message') <> '') { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong><?php echo $this->session->userdata('message') ?></strong>
                                            </div>
                                        <?php } ?>
                                        <div class="p-2">
                                            <form method="post" class="form-horizontal m-t-20" action="<?php echo $action ?>">

                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <?php echo form_error('username') ?>
                                                        <input id="username" name="username" class="form-control" type="text"  placeholder="Username">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <?php echo form_error('password') ?>
                                                        <input id="password" name="password" class="form-control" type="password"  placeholder="Password">
                                                    </div>
                                                </div>

                                                <div class="form-group text-center row m-t-20">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                                    </div>
                                                </div>

                                                <div class="form-group m-t-10 mb-0 row">
                                                    <div class="col-sm-7 m-t-20">
                                                        <a href="<?php echo $forgot ?>" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="redirect_back" id="redirect_back" value="<?php echo $redirect_back ?>"/>
                                                <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery  -->
        <script src="<?php echo base_url() ?>assets/app/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/app/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url() ?>assets/app/js/modernizr.min.js"></script>
        <script src="<?php echo base_url() ?>assets/app/js/detect.js"></script>
        <script src="<?php echo base_url() ?>assets/app/js/fastclick.js"></script>
        <script src="<?php echo base_url() ?>assets/app/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url() ?>assets/app/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url() ?>assets/app/js/waves.js"></script>
        <script src="<?php echo base_url() ?>assets/app/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url() ?>assets/app/js/jquery.scrollTo.min.js"></script>
        <!-- App js -->
        <script src="<?php echo base_url() ?>assets/app/js/app.js"></script>

    </body>
</html>