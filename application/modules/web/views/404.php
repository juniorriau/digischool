<section class="page-header page-header-xs">
    <div class="container">

        <h1><?php echo strtoupper($this->uri->segment(2)) ?></h1>

        <!-- breadcrumbs -->
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>">Home</a></li>
            <li><a href="<?php echo base_url($this->uri->segment(1)) ?>"><?php echo ucfirst($this->uri->segment(1)) ?></a></li>
            <li class="active"><?php echo ucfirst($this->uri->segment(2)) ?></li>
        </ol><!-- /breadcrumbs -->

    </div>
</section>
<section class="section-xlg">
    <div class="container">

        <div class="row">

            <div class="col-md-6 col-sm-6 hidden-xs-down">

                <div class="error-404">
                    404
                </div>

            </div>

            <div class="col-md-6 col-sm-6">

                <h3 class="m-0">Sorry, <strong>The page/post you requested can not be found!</strong></h3>
                <p class="mt-0 fs-20 font-lato text-muted">Please, try again.</p>

                <!-- /INLINE SEARCH -->

                <div class="divider mb-0"><!-- divider --></div>

                <a class="fs-16 font-lato" href="<?php echo base_url() ?>"><i class="glyphicon glyphicon-menu-left mr-10 fs-12"></i> back to homepage now!</a>

            </div>

        </div>

    </div>
</section>