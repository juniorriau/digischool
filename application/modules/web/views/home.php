
<div class="mian_slider clearfix"> <!--Start Mian slider -->
    <div class="big_silder col-md-12"><!-- Start big silder -->
        <div class="row">
            <?php if (!empty($slider)) { ?>
                <ul id="big-slid-post" class="a-post-box">
                    <?php foreach ($slider as $slide) { ?>
                        <li>
                            <div class="feat-item img-section" data-bg-img="<?php echo base_url($slide->postimage) ?>">
                                <div class="latest-overlay"></div>
                                <div class="latest-txt">
                                    <span class="latest-cat"><a href="<?php echo base_url("web/posts/category/" . $slide->cslug) ?>"><?php echo $slide->category ?></a></span>
                                    <h3 class="latest-title"><a href="<?php echo base_url("web/posts/read/" . $slide->slug) ?>"><?php echo $slide->title ?></a></h3>
                                    <div class="big-latest-content">
                                        <p><?php echo word_limiter($slide->content, 20) ?></p>
                                    </div>
                                    <div class="hz_admin_pic">
                                        <img src="<?php echo base_url($slide->userimage) ?>" class="img-responsive" alt="Responsive image">
                                    </div>
                                    <span class="hz_post_by"><i class="fa fa-user"></i><a href="#"><?php echo $slide->fullname ? $slide->fullname : $slide->username ?></a></span>
                                    <span class="latest-meta">
                                        <span class="latest-date"><i class="fa fa-clock-o"></i> <?php echo date_format(date_create($slide->createdat), 'd,M Y?') ?></span>
                                    </span>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
                <?php
            }
            ?>
        </div>
    </div><!-- End big silder -->
</div><!--End Mian slider -->



<div class="featured_slider"> <!--Start featured_slider -->
    <div class="featured_title"><!-- featured_title -->
        <h4>Berita Terbaru</h4>
        <a href="<?php echo base_url("web/categories/index/berita") ?>" class="view_button">View All</a>
    </div><!-- // featured_title -->

    <div class="featured_posts_slider"><!-- featured_posts_slider -->
        <div id="featured_post"><!-- featured_post -->
            <?php
            if (!empty($recentpost)) {
                foreach ($recentpost as $post) {
                    ?>
                    <div class="item"><!-- item -->
                        <div class="img_post">
                            <a href="<?php echo base_url("web/posts/read/" . $post->slug) ?>"><img src="<?php echo base_url($post->postimagethumb) ?>" alt="<?php echo $post->title ?>"></a>
                        </div>
                        <div class="featured_title_post">
                            <div class="caption_inner">
                                <a href="<?php echo base_url("web/posts/read/" . $post->slug) ?>"><h4 class="title_post"><?php echo $post->title ?></h4></a>
                                <div class="post_date"><em><a href="#">July 01, 2014</a></em></div>
                                <span class="latest-cat"><a href="<?php echo base_url("web/posts/category/" . $post->cslug) ?>">life style</a></span>
                            </div>
                        </div>
                    </div><!-- // item -->
                    <?php
                }
            }
            ?>
        </div><!-- // featured_post -->
    </div><!-- // featured_posts_slider -->
</div><!--End featured_slider -->

<div class="posts_sidebar clearfix"><!--Start Posts Areaa -->
    <div class="posts_areaa col-md-8"><!-- posts_areaa -->
        <div class="row">

            <!-- block_posts block_2 -->
            <div class="block_posts block_2">
                <div class="featured_title"><!-- featured_title -->
                    <h4>Kegiatan Sekolah</h4>
                    <a href="<?php echo base_url("web/categories/index/kegiatan-sekolah") ?>" class="view_button">View All</a>
                </div><!-- // featured_title -->
                <!-- block_inner -->
                <div class="block_inner row">
                    <!-- small_list_post -->
                    <?php
                    $part = ceil(count($kegiatansekolah) / 2);
                    $count = 0;
                    foreach ($kegiatansekolah as $ks) {
                        if ($count == 0 || $count == $part) {
                            ?>
                            <div class="small_list_post col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <ul>
                                    <li class="small_post clearfix">
                                        <div class="img_small_post">
                                            <img src="<?php echo base_url($ks->postimagethumb) ?>" alt="<?php echo $ks->title ?>">
                                        </div>
                                        <div class="small_post_content">
                                            <div class="title_small_post">
                                                <a href="<?php echo base_url("web/posts/read/" . $ks->slug) ?>"><h5><?php echo $ks->title ?></h5></a>
                                            </div>
                                            <div class="post_date"><em><a href="#"><?php date_format(date_create($ks->createdat), 'd, M Y') ?></a></em></div>
                                        </div>
                                    </li>
                                <?php } elseif ($count == $part - 1 || $count = count($kegiatansekolah) - 1) {
                                    ?>
                                    <li class="small_post clearfix">
                                        <div class="img_small_post">
                                            <img src="<?php echo base_url($ks->postimagethumb) ?>" alt="<?php echo $ks->title ?>">
                                        </div>
                                        <div class="small_post_content">
                                            <div class="title_small_post">
                                                <a href="<?php echo base_url("web/posts/read/" . $ks->slug) ?>"><h5><?php echo $ks->title ?></h5></a>
                                            </div>
                                            <div class="post_date"><em><a href="#"><?php date_format(date_create($ks->createdat), 'd, M Y') ?></a></em></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        <?php } else { ?>
                            <li class="small_post clearfix">
                                <div class="img_small_post">
                                    <img src="<?php echo base_url($ks->postimagethumb) ?>" alt="<?php echo $ks->title ?>">
                                </div>
                                <div class="small_post_content">
                                    <div class="title_small_post">
                                        <a href="<?php echo base_url("web/posts/read/" . $ks->slug) ?>"><h5><?php echo $ks->title ?></h5></a>
                                    </div>
                                    <div class="post_date"><em><a href="#"><?php date_format(date_create($ks->createdat), 'd, M Y') ?></a></em></div>
                                </div>
                            </li>
                            <?php
                        }
                        $count++;
                        if ($count == count($kegiatansekolah)) {
                            echo "</ul></div>";
                        }
                    }
                    ?>
                </div>
                <!-- // block_inner -->
            </div>
            <!-- // block_posts block_2 -->

            <!-- block_posts block_2 -->
            <div class="block_posts block_2">
                <div class="featured_title"><!-- featured_title -->
                    <h4>Kegiatan Siswa</h4>
                    <a href="<?php echo base_url("web/categories/index/kegiatan-siswa") ?>" class="view_button">View All</a>
                </div><!-- // featured_title -->
                <!-- block_inner -->
                <div class="block_inner row">
                    <!-- small_list_post -->
                    <?php
                    $part = ceil(count($kegiatansiswa) / 2);
                    $count = 0;
                    foreach ($kegiatansiswa as $ks) {
                        if ($count == 0 || $count == $part) {
                            ?>
                            <div class="small_list_post col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <ul>
                                    <li class="small_post clearfix">
                                        <div class="img_small_post">
                                            <img src="<?php echo base_url($ks->postimagethumb) ?>" alt="<?php echo $ks->title ?>">
                                        </div>
                                        <div class="small_post_content">
                                            <div class="title_small_post">
                                                <a href="<?php echo base_url("web/posts/read/" . $ks->slug) ?>"><h5><?php echo $ks->title ?></h5></a>
                                            </div>
                                            <div class="post_date"><em><a href="#"><?php date_format(date_create($ks->createdat), 'd, M Y') ?></a></em></div>
                                        </div>
                                    </li>
                                <?php } elseif ($count == $part - 1 || $count = count($kegiatansiswa) - 1) {
                                    ?>
                                    <li class="small_post clearfix">
                                        <div class="img_small_post">
                                            <img src="<?php echo base_url($ks->postimagethumb) ?>" alt="<?php echo $ks->title ?>">
                                        </div>
                                        <div class="small_post_content">
                                            <div class="title_small_post">
                                                <a href="<?php echo base_url("web/posts/read/" . $ks->slug) ?>"><h5><?php echo $ks->title ?></h5></a>
                                            </div>
                                            <div class="post_date"><em><a href="#"><?php date_format(date_create($ks->createdat), 'd, M Y') ?></a></em></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        <?php } else { ?>
                            <li class="small_post clearfix">
                                <div class="img_small_post">
                                    <img src="<?php echo base_url($ks->postimagethumb) ?>" alt="<?php echo $ks->title ?>">
                                </div>
                                <div class="small_post_content">
                                    <div class="title_small_post">
                                        <a href="<?php echo base_url("web/posts/read/" . $ks->slug) ?>"><h5><?php echo $ks->title ?></h5></a>
                                    </div>
                                    <div class="post_date"><em><a href="#"><?php date_format(date_create($ks->createdat), 'd, M Y') ?></a></em></div>
                                </div>
                            </li>
                            <?php
                        }
                        $count++;
                        if ($count == count($kegiatansiswa)) {
                            echo "</ul></div>";
                        }
                    }
                    ?>
                    <!-- // small_list_post -->
                </div>
                <!-- // block_inner -->
            </div>
            <!-- // block_posts block_2 -->
        </div>
    </div><!--End Posts Areaa -->
    <?php $this->load->view('base/sidebar'); ?>

</div><!-- Posts And Sidebar -->