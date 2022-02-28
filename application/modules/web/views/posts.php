
<div class="posts_sidebar clearfix"><!--Start Posts Areaa -->
    <div class="posts_areaa col-md-8"><!-- posts_areaa -->
        <div class="row">
            <div class="block_posts block_6">
                <!-- block_inner -->
                <div class="block_inner">
                    <?php foreach ($posts as $post) { ?>
                        <!-- block_posts block_6 -->

                        <article class="block_hz_post">
                            <div class="standard_post">
                                <div class="list_thum">
                                    <div class="hz_thumb_post">
                                        <div class="cat_list_post">
                                            <span class="hz_cat_post">
                                                <a href="<?php echo base_url('web/categories/index/' . $post->cslug) ?>"><?php echo $post->category ?></a>
                                            </span>
                                        </div>
                                        <img src="<?php echo base_url($post->postimagethumb) ?>" class="img img-responsive" alt="Responsive image">
                                    </div>

                                </div>
                                <div class="list_content">
                                    <div class="block_hz_top_post">
                                        <div class="block_hz_title_and_meta">
                                            <h4 class="hz_title"><a href="<?php echo base_url('web/posts/read/' . $post->slug) ?>"><?php echo $post->title ?></a></h4>
                                            <div class="hz_meta_post">
                                                <span class="hz_date_post"><i class="fa fa-calendar"></i><a href="#"><?php echo date_format(date_create($post->createdat), 'd, M Y') ?></a></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="block_hz_main_post_content">
                                        <div class="hz_content">
                                            <p><?php echo word_limiter($post->content, 100) ?></p>
                                        </div>

                                        <div class="hz_bottom_post">

                                            <div class="hz_read_more">
                                                <a href="<?php echo base_url('web/posts/read/' . $post->slug) ?>">Read More</a>
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
                            </div>
                        </article>


                        <!-- // block_posts block_6 -->
                    <?php }
                    ?>
                </div>
                <!-- // block_inner -->
            </div>
            <?php
            echo $pagination;
            ?>
        </div>
    </div><!--End Posts Areaa -->
    <?php $this->load->view('base/sidebar'); ?>

</div><!-- Posts And Sidebar -->