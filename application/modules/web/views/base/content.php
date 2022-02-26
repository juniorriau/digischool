<?php $this->load->view('base/header') ?>
	<div class="all_content news_layout animsition container-fluid">
		<div class="row">

			<div class="header"><!-- header -->
				<div class="top_bar"><!-- top_bar -->
					<div class="min_top_bar"><!-- min_top_bar -->
						<div class="container">


							<div id="top_search_ico"><!-- top_search_ico -->
								<div class="top_search">
									<form method="POST" action="<?php base_url('web/search/keyword/')?>"><input type="text" placeholder="Search and hit enter..."></form>
									<i class="fa fa-search search-desktop"></i>
								</div>

								<div id="top_search_toggle">
									<div id="search_toggle_top">
									<form method="POST" action="<?php base_url('web/search/keyword/')?>"><input type="text" placeholder="Search and hit enter..."></form>
									</div>
									<i class="fa fa-search search-desktop"></i>
								</div>
							</div><!-- // top_search_ico -->

							<div class="social_icon"><!-- social_icon -->
								<span><a target="_blank" href="<?php echo $this->config->item('social_facebook')?>"><i class="fa fa-facebook"></i></a></span>
								<span><a target="_blank" href="<?php echo $this->config->item('social_twitter')?>"><i class="fa fa-twitter"></i></a></span>
								<span><a target="_blank" href="<?php echo $this->config->item('social_youtube')?>"><i class="fa fa-youtube"></i></a></span>
								<span><a target="_blank" href="<?php echo $this->config->item('social_instagram')?>"><i class="fa fa-instagram"></i></a></span>
								<span><a target="_blank" href="<?php echo $this->config->item('social_linkedin')?>"><i class="fa fa-linkedin"></i></a></span>
							</div><!-- // social_icon -->
						</div>
					</div><!-- // min_top_bar -->
				</div><!-- // top_bar -->

				<div class="main_header"><!-- main_header -->
					<div class="container">
						<div class="logo_ads"><!-- logo_ads -->
							<div class="logo"><!-- logo -->
								<!-- <h3>logo</h3> -->
								<a href="<?php echo base_url()?>"><img class="img img-responsive" src="<?php echo base_url($this->config->item('site_home_bg'))?>" alt="Logo"></a>
							</div><!-- // logo -->
							
						</div><!-- // logo_ads -->
					</div>

					<?php $this->load->view('base/nav'); ?>
				</div><!-- // main_header -->
			</div><!-- End header -->
			
			<div class="main_content container"><!-- main_content -->
            <?php
            $this->load->view($template);
            ?>
			</div><!-- main_content -->

			<div id="footer" class="footer container-fulid"><!-- footer -->
				<footer class="main_footer"><!-- main_footer -->
						<div class="container">
							<div class="row">
								
								<div class="col-sm-4"><!-- start first footer widget area -->
									<div id="text-3" class="widget widget_text"><!-- widget_text -->
										<h4 class="widget_title"><?php echo $this->config->item('site_name')?></h4>
										<div class="logo_widget">
											<a href="#"><img class="img img-thumbnail" src="<?php echo base_url($this->config->item('site_logo'))?>" alt="Logo"></a>
										</div>
										<div class="textwidget">
											<p><?php echo $this->config->item('site_description')?></p>
                                            <p><?php echo $this->config->item('site_address')?></p>
										</div>
									</div>	<!-- // widget_text -->
								</div><!-- end first footer widget area -->

								<div class="col-sm-4"><!-- start third footer widget area -->
									<div class="widget widget_recent_post"><!-- Start widget recent post -->
										<h4 class="widget_title">Alternatif Link</h4>
										<ul class="recent_post">
											<li>
												<div class="widget_post_info">
													<h5><a href="https://ppdb.smkcitramedikamgl.sch.id/">PPDB Online</a></h5>
													
												</div>
											</li>
                                            <li>
												<div class="widget_post_info">
													<h5><a href="https://alumni.smkcitramedikamgl.sch.id/">Alumni</a></h5>
													
												</div>
											</li>
										</ul>
									</div><!-- End widget recent post -->
								</div><!-- end third footer widget area -->

								<div class="col-sm-4"><!-- start first footer widget area -->
									
								</div><!-- end first footer widget area -->

							</div>
						</div>
				</footer><!-- // main_footer -->

				<div class="copyright"><!-- copyright -->
					<div class="hmztop">Scroll To Top</div><!-- hmztop -->
					<div class="container">
						<div class="social_icon"><!-- social_icon -->
							<span><a target="new" href="<?php echo $this->config->item('social_facebook')?>"><i class="fa fa-facebook"></i></a></span>
							<span><a target="new" href="<?php echo $this->config->item('social_twitter')?>"><i class="fa fa-twitter"></i></a></span>
							<span><a target="new" href="<?php echo $this->config->item('social_youtube')?>"><i class="fa fa-youtube"></i></a></span>
							<span><a target="new" href="<?php echo $this->config->item('social_instagram')?>"><i class="fa fa-instagram"></i></a></span>
							<span><a target="new" href="<?php echo $this->config->item('social_linkedin')?>"><i class="fa fa-linkedin"></i></a></span>
						</div><!-- // social_icon -->
						<p>Copyrights © <?php echo date('Y')?> <?php echo $this->config->item('site_name')?></p>
					</div>
				</div><!-- // copyright -->
			</div><!-- // footer -->

		</div><!-- End row -->
	</div><!-- End all_content -->
<?php $this->load->view('base/footer');
