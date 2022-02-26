<div class="sidebar col-md-4"><!--Start Sidebar -->
						<div class="row">
							<div class="inner_sidebar"><!--Start Inner Sidebar -->

								<div class="widget widget_social_counter"> <!-- widget_social_counter -->
									<h4 class="widget_title">Follow Us</h4>
									<div class="social_counter social_counter_twitter">
										<a class="social_counter_icon" href="<?php echo $this->config->item('social_twitter')?>" title="Follow our twitter" target="_blank"><i class="fa fa-twitter"></i></a>
										
                                        <div class="clearfix"></div>
									</div>
									<div class="social_counter social_counter_facebook">
										<a class="social_counter_icon" href="<?php echo $this->config->item('social_facebook')?>" title="Like our facebook" target="_blank"><i class="fa fa-facebook"></i></a>
										
										<div class="clearfix"></div>
									</div>
									<div class="social_counter social_counter_instagram">
										<a class="social_counter_icon" href="<?php echo $this->config->item('social_instagram')?>" title="Follow our instagram" target="_blank"><i class="fa fa-instagram"></i></a>
										
										<div class="clearfix"></div>
									</div>
									<div class="social_counter social_counter_youtube">
										<a class="social_counter_icon" href="<?php echo $this->config->item('social_youtube')?>" title="Subscribe our youtube" target="_blank"><i class="fa fa-youtube"></i></a>

										<div class="clearfix"></div>
									</div>
									
									<div class="clearfix"></div>
								</div><!-- End widget_social_counter -->
									

								<div class="widget widget_recent_post"><!-- Start widget recent post -->
									<h4 class="widget_title">Recent Post</h4>
									<ul class="recent_post">
										<?php
										if(!empty($recentpost)){
											foreach($recentpost as $recent){  ?>
										<li>
											<figure class="widget_post_thumbnail">
												<a href="#"><img src="<?php echo base_url($recent->postimagethumb)?>" alt="<?php echo $recent->title?>"></a>
											</figure>
											<div class="widget_post_info">
												<h5><a href="<?php echo base_url("web/posts/read/".$recent->slug)?>"><?php echo $recent->title?></a></h5>
												<div class="post_meta">
													<span class="date_meta"><a href="#"><i class="fa fa-calendar"></i><?php echo date_format(date_create($recent->createdat), "d, M Y")?></a></span>
												</div>
											</div>
										</li>
											<?php }
										} ?>
									</ul>
								</div><!-- End widget recent post -->
								
							</div><!--End Inner Sidebar -->
						</div>
					</div><!--End Sidebar -->