<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title><?php echo $this->config->item('site_name') . " | " . $this->config->item('site_title') ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/frontends/web/') ?>css/reset.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/frontends/web/') ?>css/plugins.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/frontends/web/') ?>css/style.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/frontends/web/') ?>css/color.css">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="<?php echo base_url($this->config->item('site_icon')) ?>">
        <?php
        if (isset($extracss)) {
            $this->load->view($extracss);
        }
        ?>
    </head>
    <body>
