<?php $this->load->view('base/header') ?>
<!--loader-->
<div class="loader-wrap">
    <div class="loader-inner">
        <div class="loader-inner-cirle"></div>
    </div>
</div>
<!--loader end-->
<!-- main start  -->
<div id="main">
    <!-- header -->
    <?php $this->load->view('base/nav') ?>
    <!-- header end-->
    <!-- wrapper-->
    <div id="wrapper">
        <?php $this->load->view($template); ?>
    </div>
    <!--wrapper end-->
    <!--footer -->
    <footer class = "main-footer fl-wrap">
        <!--footer-header-->

        <!--footer-inner-->
        <div class = "footer-inner   fl-wrap">
            <div class = "container">
                <div class = "row">
                    <!--footer-widget-->
                    <div class = "col-md-4">
                        <div class = "footer-widget fl-wrap">
                            <div class = "footer-logo"><a href = "<?php echo base_url("app") ?>"><img src = "<?php echo base_url($this->config->item('site_logo')) ?>" alt = ""></a></div>
                            <div class = "footer-contacts-widget fl-wrap">

                                <ul class = "footer-contacts fl-wrap no-list-style">
                                    <li><span><i class = "fal fa-envelope"></i> Mail :</span><a href = "#" target = "_blank"><?php echo $this->config->item('site_email') ?></a></li>
                                    <li> <span><i class = "fal fa-map-marker"></i> Adress :</span><a href = "#" target = "_blank"><?php echo $this->config->item('site_address') ?></a></li>
                                    <li><span><i class = "fal fa-phone"></i> Phone :</span><a href = "#"><?php echo $this->config->item('site_phone') ?></a></li>
                                </ul>
                                <div class = "footer-social">
                                    <span>Find us on: </span>
                                    <ul class = "no-list-style">
                                        <li><a href = "#" target = "_blank"><i class = "fab fa-facebook-f"></i></a></li>
                                        <li><a href = "#" target = "_blank"><i class = "fab fa-twitter"></i></a></li>
                                        <li><a href = "#" target = "_blank"><i class = "fab fa-instagram"></i></a></li>
                                        <li><a href = "#" target = "_blank"><i class = "fab fa-vk"></i></a></li>
                                        <li><a href = "#" target = "_blank"><i class = "fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--footer-widget end-->
                    <!--footer-widget-->
                    <div class = "col-md-4">
                        <div class = "footer-widget fl-wrap">
                            <h3>Destinasi Terbaru</h3>
                            <div class = "footer-widget-posts fl-wrap">
                                <ul class = "no-list-style">
                                    <?php
                                    if (!empty($newplace)) {
                                        foreach ($newplace as $np) {
                                            ?>
                                            <li class = "clearfix">
                                                <a href = "<?php echo base_url('web/places/detail/' . $np->id) ?>" class = "widget-posts-img"><img src = "<?php echo base_url($np->image_path . "/" . $np->image_name) ?>" class = "respimg" alt = ""></a>
                                                <div class = "widget-posts-descr">
                                                    <a href = "<?php echo base_url('web/places/detail/' . $np->id) ?>" title = ""><?php echo $np->name ?></a>
                                                    <span class = "widget-posts-date"><i class = "fal fa-calendar"></i> <?php echo date_format(date_create($np->createdat), 'd F y') ?> </span>
                                                </div>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>


                                </ul>

                            </div>
                        </div>
                    </div>
                    <!--footer-widget end-->
                    <!--footer-widget -->
                    <div class = "col-md-4">
                        <div class = "footer-widget fl-wrap ">
                            <h3>Our Twitter</h3>
                            <div class = "twitter-holder fl-wrap scrollbar-inner2" data-simplebar data-simplebar-auto-hide = "false">
                                <div id = "footer-twiit"></div>
                            </div>
                            <a href = "#" class = "footer-link twitter-link" target = "_blank">Follow us <i class = "fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <!--footer-widget end-->
                </div>
            </div>
            <!--footer bg-->
            <div class = "footer-bg" data-ran = "4"></div>
            <div class = "footer-wave">
                <svg viewbox = "0 0 100 25">
                <path fill = "#fff" d = "M0 30 V12 Q30 17 55 12 T100 11 V30z" />
                </svg>
            </div>
            <!--footer bg end-->
        </div>
        <!--footer-inner end -->
        <!--sub-footer-->
        <div class = "sub-footer  fl-wrap">
            <div class = "container">
                <div class = "copyright"> &#169; <?php echo $this->config->item('site_name') ?> </div>
                <div class = "lang-wrap">
                    <div class = "show-lang"><span><i class = "fal fa-globe-europe"></i><strong>En</strong></span><i class = "fa fa-caret-down arrlan"></i></div>
                    <ul class = "lang-tooltip lang-action no-list-style">
                        <li><a href = "#" class = "current-lan" data-lantext = "En">English</a></li>
                    </ul>
                </div>
                <div class = "subfooter-nav">
                    <ul class = "no-list-style">
                        <li><a href = "#">Terms of use</a></li>
                        <li><a href = "#">Privacy Policy</a></li>
                        <li><a href = "#">Blog</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--sub-footer end -->
    </footer>
    <!--footer end -->

    <a class = "to-top"><i class = "fas fa-caret-up"></i></a>
</div>
<!--Main end -->
<?php
$this->load->view('base/footer');
