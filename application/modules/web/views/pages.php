<div class="posts_sidebar clearfix"><!--Start Posts Areaa -->
    <div class="posts_areaa col-md-8"><!-- posts_areaa -->
        <div class="row">

            <article class="hz_post"><!-- Start article -->
                <div class="video_post post_wrapper">

                    <?php if (!empty($page->postimage)) { ?>
                        <div class="hz_thumb_post">
                            <div class="embed-responsive embed-responsive-16by9">
                                <img src="<?php echo base_url($page->postimage) ?>" class="img img-responsive"/>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="hz_top_post">

                        <div class="hz_title_and_meta">
                            <div class="hz_title"><h3><a href="<?php echo base_url("web/posts/read/" . $page->slug) ?>"> <?php echo $page->title ?></a></h3></div>

                        </div>
                    </div>

                    <div class="hz_main_post_content">
                        <div class="hz_content">
                            <p>
                                <?php echo $page->content ?>
                            </p>
                        </div>

                        <div class="hz_bottom_post">
                            <div class="hz_tags">
                            </div>

                            <div class="hz_icon_shere">
                                <span class="share_toggle pi-btn">
                                    <i class="fa fa-share-alt"></i>
                                </span>
                                <div class="hz_share">
                                    <span><a href="#"><i class="fa fa-facebook"></i></a></span>
                                    <span><a href="#"><i class="fa fa-twitter"></i></a></span>
                                    <span><a href="#"><i class="fa fa-google-plus"></i></a></span>
                                    <span><a href="#"><i class="fa fa-stumbleupon"></i></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article><!-- End article -->

        </div>
    </div><!--End Posts Areaa -->
    <?php $this->load->view('base/sidebar'); ?>

</div><!-- Posts And Sidebar -->