<header class="main-header">
    <!-- logo-->
    <a href="<?php echo base_url() ?>" class="logo-holder"><img src="<?php echo base_url($this->config->item('site_logo')) ?>" alt=""></a>
    <!-- logo end-->
    <a href="<?php echo base_url('web/ticketorders') ?>" class="add-list red-bg">Pesan Tiket <span><i class="fa fa-ticket-alt"></i></span></a>
    <!-- lang-wrap-->
    <div class="lang-wrap">
        <div class="show-lang"><span><i class="fal fa-globe-europe"></i><strong>En</strong></span><i class="fa fa-caret-down arrlan"></i></div>
        <ul class="lang-tooltip lang-action no-list-style">
            <li><a href="#" class="current-lan" data-lantext="En">English</a></li>
            <li><a href = "#" data-lantext = "Fr">Français</a></li>
            <li><a href = "#" data-lantext = "Es">Español</a></li>
            <li><a href = "#" data-lantext = "De">Deutsch</a></li>
        </ul>
    </div>
    <!--lang-wrap end-->
    <!--nav-button-wrap-->
    <div class = "nav-button-wrap color-bg">
        <div class = "nav-button">
            <span></span><span></span><span></span>
        </div>
    </div>
    <!--nav-button-wrap end-->
    <!--navigation -->
    <div class = "nav-holder main-menu">
        <nav>
            <ul class = "no-list-style">
                <?php
                if (!empty($this->config->item('site_menu'))) {
                    $menu = json_decode($this->config->item('site_menu'));
                    foreach ($menu as $m) {
                        $tmpmenu = explode(";", $m->id);
                        ?>


                        <li>
                            <a class="<?php echo $this->uri->segment(2) ? '' : $tmpmenu[0] == 'Home' ? 'act-link' : '' ?>" href="<?php echo $tmpmenu[1] ?>">
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
                                <li ><a class="<?php echo $this->uri->segment(2) == str_replace(" ", "-", strtolower($temp[0])) ? 'act-link' : '' ?>" href="<?php echo $temp[1] ?>"><?php echo $temp[0] ?></a></li>
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
        </nav>
    </div>
    <!-- navigation  end -->
</header>

