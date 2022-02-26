<div class="all_nav container-fluid"><!-- all_nav -->
						<div class="container">
							<div class="nav_bar"><!-- nav_bar -->
							<nav id="primary_nav_wrap"><!-- Start primary_nav_wrap -->
								<ul>
								  <?php
                if (!empty($this->config->item('site_menu'))) {
                    $menu = json_decode($this->config->item('site_menu'));
                    foreach ($menu as $m) {
                        $tmpmenu = explode(";", $m->id);
                        ?>
                        <li>
                            <a class="<?php echo $this->uri->segment(2) ? '' : $tmpmenu[0] == 'Home' ? 'current-menu-item' : '' ?>" href="<?php echo $tmpmenu[1] ?>">
                                <?php echo $tmpmenu[0] ?>
                                <?php
                                if (isset($m->children))
                                    echo '<i class="fa fa-caret-down"></i>';
                                ?>
                            </a>
                            <?php
                            if (isset($m->children)) {
                                echo "<ul>";
                                foreach ($m->children as $chld) {

                                    $temp = explode(";", $chld->id)
                                    ?>
                                <li ><a class="<?php echo $this->uri->segment(2) == str_replace(" ", "-", strtolower($temp[0])) ? 'current-menu-item' : '' ?>" href="<?php echo $temp[1] ?>"><?php echo $temp[0] ?></a></li>
                                <?php
                            }
                            echo "</ul>";
                        }
                        echo "</li>";
                    }
                } else {
                    ?>

                    <li ><!-- HOME -->
                        <a class="sct-link" href="<?php echo base_url() ?>">
                            Home
                        </a>
                    </li>
                    <?php
                }
                ?>
								</ul>
							</nav><!-- End primary_nav_wrap -->
							</div><!-- // nav_bar -->
							
							<div class="hz_responsive"><!--button for responsive menu-->
								<div id="dl-menu" class="dl-menuwrapper">
									<button class="dl-trigger">Open Menu</button>
								<ul class="dl-menu">
                                    <?php
                                    if (!empty($this->config->item('site_menu'))) {
                                        $menu = json_decode($this->config->item('site_menu'));
                                        foreach ($menu as $m) {
                                            $tmpmenu = explode(";", $m->id);
                                            ?>
                                            <li>
                                                <a class="<?php echo $this->uri->segment(2) ? '' : $tmpmenu[0] == 'Home' ? 'current-menu-item' : '' ?>" href="<?php echo $tmpmenu[1] ?>">
                                                    <?php echo $tmpmenu[0] ?>
                                                    <?php
                                                    if (isset($m->children))
                                                        echo '<i class="fa fa-caret-down"></i>';
                                                    ?>
                                                </a>
                                                <?php
                                                if (isset($m->children)) {
                                                    echo "<ul class='dl-submenu'>";
                                                    foreach ($m->children as $chld) {

                                                        $temp = explode(";", $chld->id)
                                                        ?>
                                                    <li ><a class="<?php echo $this->uri->segment(2) == str_replace(" ", "-", strtolower($temp[0])) ? 'current-menu-item' : '' ?>" href="<?php echo $temp[1] ?>"><?php echo $temp[0] ?></a></li>
                                                    <?php
                                                }
                                                echo "</ul>";
                                            }
                                            echo "</li>";
                                        }
                                    } else {
                                        ?>
                                        <li ><!-- HOME -->
                                            <a class="sct-link" href="<?php echo base_url() ?>">
                                                Home
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
								</ul>
								</div><!-- /dl-menuwrapper -->
							</div><!--End button for responsive menu-->
						</div>
					</div><!-- // all_nav -->   
