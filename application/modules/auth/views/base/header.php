<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo $this->config->item('site_name') ?></title>
        <meta content="<?php echo $this->config->item('site_name') ?>" name="description" />
        <meta content="<?php echo $this->config->item('default_author') ?>" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="<?php echo base_url($this->config->item('site_icon')) ?>">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/app/plugins/morris/morris.css">
        <link href="<?php echo base_url() ?>assets/app/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/app/fonts/fa5/css/all.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/app/css/style.css" rel="stylesheet" type="text/css">
        <?php
        if (isset($extracss)) {
            $this->load->view($extracss);
        }
        ?>
    </head>




    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">