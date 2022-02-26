<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]>
<!--> <!--<![endif]-->
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title><?php echo $this->config->item('site_title')?></title>
  <meta name="description" content="<?php echo $this->config->item('site_description')?>">
  <meta name="author" content="<?php echo $this->config->item('site_name')?>">
  <meta property="og:image" content="<?php echo base_url($this->config->item('site_logo'))?>">
  <meta property="og:title" content="<?php echo $this->config->item('site_title')?>">
  <meta property="og:description" content="<?php echo $this->config->item('site_description')?>">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/web/css/")?>style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/web/css/")?>bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/web/css/")?>bootstrap-theme.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/web/css/")?>font-awesome.min.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" href="<?php echo $this->config->item('site_icon')?>">

        <?php
if (isset($extracss)) {
    $this->load->view($extracss);
}
?>
    </head>
    <body>
