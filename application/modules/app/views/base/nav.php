<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <div class="left-side-logo d-block d-lg-none">
        <div class="text-center">

            <a href="<?php echo base_url() ?>" class="logo"><img src="<?php echo base_url($this->config->item('site_logo')) ?>" height="50" alt="logo"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>

                <li class="<?php echo $this->uri->segment(2) == "" ? 'nav-active' : '' ?>"><a href="<?php echo base_url("app") ?>"><i class="main-icon fas fa-home "></i> Beranda</a></li>
                <?php foreach ($session['menus'] as $m) { ?>
                    <li class="<?php echo ucfirst($this->uri->segment(2)) == $m['name'] ? 'nav-active' : '' ?>"><a href="<?= $m['url'] ?>"><?= !empty($m['icon']) ? '<i class="main-icon fas fa-' . $m['icon'] . ' "></i>' : '' ?><span>  <?= empty($m['alias']) ? $m['name'] : $m['alias'] ?> </span></a></li>
                <?php } ?>
            </ul>
            <?php if ($session['role'] == 1) { ?>

                <ul >

                    <li class="<?php echo $this->uri->segment(2) == "users" ? 'nav-active' : '' ?>"><a href="<?php echo base_url() ?>auth/users"><i class="main-icon fas fa-user"></i> <span> Users </span> </a></li>
                    <li class="<?php echo $this->uri->segment(2) == "roles" ? 'nav-active' : '' ?>"><a href="<?php echo base_url() ?>auth/roles"><i class="main-icon fas fa-users"></i> <span> Roles </span></a></li>
                    <li class="<?php echo $this->uri->segment(2) == "routings" ? 'nav-active' : '' ?>"><a href="<?php echo base_url() ?>auth/routings"><i class="main-icon fas fa-paper-plane"></i> <span> Routings </span></a></li>
                    <li class="<?php echo $this->uri->segment(2) == "settings" ? 'nav-active' : '' ?>"><a href="<?php echo base_url() ?>app/settings"><i class="main-icon fas fa-cog"></i> <span> Settings </span></a></li>
                </ul>
            <?php } ?>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>