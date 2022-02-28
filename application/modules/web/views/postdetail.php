<div class="posts_sidebar clearfix"><!--Start Posts Areaa -->
    <div class="posts_areaa col-md-8"><!-- posts_areaa -->
        <div class="row">

            <article class="hz_post"><!-- Start article -->
                <div class="video_post post_wrapper">

                    <div class="hz_thumb_post">
                        <div class="embed-responsive embed-responsive-16by9">
                            <img src="<?php echo base_url($post->postimage) ?>" class="img img-responsive"/>
                        </div>
                    </div>

                    <div class="hz_top_post">

                        <div class="hz_title_and_meta">
                            <div class="hz_title"><h3><a href="<?php echo base_url("web/posts/read/" . $post->slug) ?>"> <?php echo $post->title ?></a></h3></div>
                            <div class="hz_meta_post">
                                <span class="hz_post_by"><i class="fa fa-user"></i><a href="#"><?php echo $post->fullname ? $post->fullname : $post->username ?></a></span>
                                <span class="hz_cat_post"><i class="fa fa-folder-open"></i><a href="<?php echo base_url('web/categories/index/' . $post->cslug) ?>"><?php echo $post->category ?></a></span>
                                <span class="hz_date_post"><i class="fa fa-calendar"></i><a href="#"><?php echo date_format(date_create($post->createdat), 'd, M Y') ?></a></span>
                                <span class="hz_date_post"><i class="fa fa-comments"></i><a href="#">Comments</a></span>
                            </div>
                        </div>
                    </div>

                    <div class="hz_main_post_content">
                        <div class="hz_content">
                            <p>
                                <?php echo $post->content ?>
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

                <div class="user_info_post"><!--Start user info post -->
                    <div class="post_title"><h4>About the Author</h4></div>
                    <div class="user_pic">
                        <img src="<?php echo base_url($post->userimage) ?>" alt="Ashmawi Sami">
                    </div>
                    <div class="min_user_info">
                        <h4><?php echo $post->fullname ? $post->fullname : $post->username ?></h4>
                        <p></p>
                    </div>
                    <div class="social_icon">
                        <span><a href="#"><i class="fa fa-facebook"></i></a></span>
                        <span><a href="#"><i class="fa fa-twitter"></i></a></span>
                        <span><a href="#"><i class="fa fa-google-plus"></i></a></span>
                        <span><a href="#"><i class="fa fa-youtube"></i></a></span>
                        <span><a href="#"><i class="fa fa-dribbble"></i></a></span>
                        <span><a href="#"><i class="fa fa-behance"></i></a></span>
                        <span><a href="#"><i class="fa fa-instagram"></i></a></span>
                        <span><a href="#"><i class="fa fa-vimeo-square"></i></a></span>
                        <span><a href="#"><i class="fa fa-linkedin"></i></a></span>
                    </div>
                </div><!--End user info post -->




                <!--                <div class="conmments_block">Start Conmments Block
                                    <div class="post_title"><h4>Comments</h4></div>

                                    <ol class="commentlist clearfix">
                                        <li class="comment">
                                            <div class="comment-body clearfix">
                                                <div class="avatar"><img alt="" src="img/demo/pic.jpg"></div>
                                                <div class="comment-text">
                                                    <div class="author clearfix">
                                                        <div class="comment-meta">
                                                            <span><a href="#">ashmawi</a></span>
                                                            <div class="date">August 20 , 2014 at 10:00 pm</div>
                                                        </div>
                                                        <a class="comment-reply button" href="#">Reply</a>
                                                    </div>
                                                    <div class="text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequat. Vivamus vulputate posuere nisl quis consequat.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="children">
                                                <li class="comment">
                                                    <div class="comment-body clearfix">
                                                        <div class="avatar"><img alt="" src="img/demo/pic.jpg"></div>
                                                        <div class="comment-text">
                                                            <div class="author clearfix">
                                                                <div class="comment-meta">
                                                                    <span>sami</span>
                                                                    <div class="date">August 20 , 2014 at 10:00 pm</div>
                                                                </div>
                                                                <a class="comment-reply button" href="#">Reply</a>
                                                            </div>
                                                            <div class="text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequat. Vivamus vulputate posuere nisl quis consequat.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="children">
                                                        <li class="comment">
                                                            <div class="comment-body clearfix">
                                                                <div class="avatar"><img alt="" src="img/demo/pic.jpg"></div>
                                                                <div class="comment-text">
                                                                    <div class="author clearfix">
                                                                        <div class="comment-meta">
                                                                            <span>ahmed</span>
                                                                            <div class="date">August 20 , 2014 at 10:00 pm</div>
                                                                        </div>
                                                                        <a class="comment-reply button" href="#">Reply</a>
                                                                    </div>
                                                                    <div class="text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequat. Vivamus vulputate posuere nisl quis consequat.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul> End children
                                                </li>
                                                <li class="comment">
                                                    <div class="comment-body clearfix">
                                                        <div class="avatar"><img alt="" src="img/demo/pic.jpg"></div>
                                                        <div class="comment-text">
                                                            <div class="author clearfix">
                                                                <div class="comment-meta">
                                                                    <span>fawzy</span>
                                                                    <div class="date">August 20 , 2014 at 10:00 pm</div>
                                                                </div>
                                                                <a class="comment-reply button" href="#">Reply</a>
                                                            </div>
                                                            <div class="text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequat. Vivamus vulputate posuere nisl quis consequat.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul> End children
                                        </li>
                                        <li class="comment">
                                            <div class="comment-body clearfix">
                                                <div class="avatar"><img alt="" src="img/demo/pic.jpg"></div>
                                                <div class="comment-text">
                                                    <div class="author clearfix">
                                                        <div class="comment-meta">
                                                            <span>john</span>
                                                            <div class="date">August 20 , 2014 at 10:00 pm</div>
                                                        </div>
                                                        <a class="comment-reply button" href="#">Reply</a>
                                                    </div>
                                                    <div class="text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequat. Vivamus vulputate posuere nisl quis consequat.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </div>End Conmments Block



                                <div id="respond"> Start respond Conmments
                                    <div class="reply-title">
                                        <h4 class="post_title">Leaver your comment</h4>
                                    </div> COMMENT FORM


                                    <div class="comment-form">
                                        <form method="post" class="form-js" action="contact_us.php">
                                            <div class="form-input">
                                                <i class="fa fa-user"></i>
                                                <input type="text" name="name" id="name" placeholder="Your Name">
                                            </div>
                                            <div class="form-input">
                                                <i class="fa fa-envelope"></i>
                                                <input type="email" name="mail" id="mail" placeholder="Email">
                                            </div>
                                            <div class="form-input">
                                                <i class="fa fa-home"></i>
                                                <input type="url" name="url" id="url" placeholder="URL">
                                            </div>
                                            <div class="form-input">
                                                <i class="fa fa-comment"></i>
                                                <textarea placeholder="Message" name="message" id="message"></textarea>
                                            </div>
                                            <input type="submit" class="button" value="Send Message"></form>
                                    </div>

                                     END / COMMENT FORM
                                </div>
                                 End respond Conmments -->
            </article><!-- End article -->

        </div>
    </div><!--End Posts Areaa -->
    <?php $this->load->view('base/sidebar'); ?>

</div><!-- Posts And Sidebar -->