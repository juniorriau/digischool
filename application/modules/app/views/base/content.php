<?php
$this->load->view('base/header');
$this->load->view('base/nav');
?>
<!-- Start right Content here -->

<div class="content-page">
    <!-- Start content -->
    <div class="content">

        <!-- Top Bar Start -->
        <div class="topbar">

            <div class="topbar-left	d-none d-lg-block">
                <div class="text-center">

                    <a href="<?php echo base_url() ?>" class="logo"><img class="img img-responsive img-circle"src="<?php echo base_url($this->config->item('site_logo')) ?>" style="width: auto;max-height: 65px" alt="logo"></a>
                </div>
            </div>

            <nav class="navbar-custom">

                <ul class="list-inline float-right mb-0">
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="<?php echo base_url() ?>#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                               <?php if (!empty($session['image'])) { ?>
                                <img src="<?php echo base_url($session['image']) ?>" alt="user" class="rounded-circle">
                            <?php } else { ?>
                                <img src="<?php echo base_url('assets/app/images/user-1.jpg') ?>" alt="user" class="rounded-circle">
                            <?php } ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                            <a class="dropdown-item" href="<?php echo base_url('auth/users/userdetails/') . $session['id'] ?>"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                            <a class="dropdown-item" href="<?php echo base_url('auth/users/account/') . $session['id'] ?>"><i class="mdi mdi-settings m-r-5 text-muted"></i> Account</a>
                            <a class="dropdown-item" href="<?php echo base_url('auth/authentication/logout') ?>"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="list-inline-item">
                        <button type="button" class="button-menu-mobile open-left waves-effect">
                            <i class="fas fa fa-bars"></i>
                        </button>
                    </li>
                </ul>

                <div class="clearfix"></div>

            </nav>

        </div>
        <!-- Top Bar End -->

        <div class="page-content-wrapper ">

            <div class="container-fluid">
                <?php
                $this->load->view($template);
                ?>
            </div><!-- container fluid -->
        </div> <!-- Page content Wrapper -->

    </div> <!-- content -->

    <footer class="footer">
        &COPY; <b><?php echo $this->config->item('site_name') ?></b>
    </footer>

</div>
<!-- End Right content here -->
<?php
$this->load->view('base/footer');
