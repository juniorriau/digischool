<!-- content-->
<div class="content">
    <!--section  -->
    <section class="hero-section"   data-scrollax-parent="true">
        <div class="bg-tabs-wrap">
            <div class="bg-parallax-wrap" data-scrollax="properties: { translateY: '200px' }">
                <div class="video-container">

                </div>
                <!--
                Vimeo code

                <div class = "background-vimeo" data-vim = "97871257"> </div> -->
                <?php
                $tmpvid = explode("?v=", $this->config->item('site_bg_video'));
                ?>
                <div class = "background-youtube-wrapper" data-vid = "<?php echo $tmpvid[1] ?>" data-mv = "1"> </div>
                <div class = "bg mob_bg" data-bg = "<?php echo base_url($this->config->item('site_home_bg')) ?>"></div>
                <div class = "overlay op7"></div>
            </div>
        </div>
        <div class = "container small-container">
            <div class = "intro-item fl-wrap">
                <span class = "section-separator"></span>
                <div class = "bubbles">
                    <h1>Eksplor Tempat Terbaik di Wonogiri</h1>
                </div>
            </div>
            <!--main-search-input-tabs-->
            <div class = "main-search-input-tabs  tabs-act fl-wrap">

                <!--tabs -->
                <div class = "tabs-container fl-wrap  ">
                    <!--tab -->
                    <div class = "tab">
                        <div id = "tab-inpt1" class = "tab-content first-tab">
                            <div class = "main-search-input-wrap fl-wrap">
                                <div class = "main-search-input fl-wrap">
                                    <form>
                                        <div class = "main-search-input-item">
                                            <label><i class = "fal fa-keyboard"></i></label>
                                            <input type = "text" name="keyword" id="keyword" placeholder = "Apa yang kamu cari??" value = "" required/>
                                        </div>

                                        <div class = "main-search-input-item">
                                            <select name="placecategory" id="placecategory" data-placeholder = "All Categories" class = "chosen-select" >
                                                <option value="all">Semua Kategori</option>
                                                <?php
                                                if (!empty($placecategory)) {
                                                    foreach ($placecategory as $pc) {
                                                        echo '<option value="' . strtolower($pc->slug) . '">' . $pc->category . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <button id="btn_search" class = "main-search-button red-bg">Temukan <i class = "far fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--tab end-->
                </div>
                <!--tabs end-->
            </div>
            <!--main-search-input-tabs end-->
            <div class = "hero-categories fl-wrap">
                <h4 class = ""></h4>
                <ul class = "no-list-style">
                    <?php
                    if (!empty($placecategory)) {
                        foreach ($placecategory as $pc) {
                            echo '<li><a href = "' . base_url('web/places/category/' . $pc->slug) . '"><i class = "far fa-' . $pc->icon . '"></i><span>' . $pc->category . '</span></a></li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class = "header-sec-link">
            <a href = "#sec1" class = "custom-scroll-link"><i class = "fal fa-angle-double-down"></i></a>
        </div>
    </section>
    <!--section end-->

    <div class = "sec-circle fl-wrap"></div>


    <!--section -->
    <section class="content-wrap" style="background-image:url('<?php echo base_url($this->config->item('site_web_bg')) ?>')">
        <div class = "container big-container">
            <div class = "section-title">
                <h2><span>Tempat Populer</span></h2>
                <div class = "section-subtitle">Tempat Populer</div>
                <span class = "section-separator"></span>

            </div>
            <div class="listing-filters gallery-filters fl-wrap">
                <a href="#" class="gallery-filter  gallery-filter-active" data-filter="*">Semua Kategori</a>
                <?php
                if (!empty($placecategory)) {
                    foreach ($placecategory as $pc) {
                        echo '<a href="#" class="gallery-filter" data-filter=".' . $pc->slug . '">' . $pc->category . '</a>';
                    }
                }
                ?>
            </div>
            <div class = "grid-item-holder gallery-items fl-wrap">
                <?php
                if (!empty($places)) {
                    foreach ($places as $p) {
                        ?>
                        <div class = "gallery-item <?php echo $p->pcslug ?>">
                            <div class = "listing-item">
                                <article class = "geodir-category-listing fl-wrap">
                                    <div class = "geodir-category-img">
        <!--                                    <div class = "geodir-js-favorite_btn"><i class = "fal fa-heart"></i><span>Save</span></div>-->
                                        <a href = "<?php echo base_url("web/places/detail/" . $p->id) ?>" class = "geodir-category-img-wrap fl-wrap">
                                            <img src = "<?php echo base_url($p->image_path . "/" . $p->image_name) ?>" alt = "">
                                        </a>
                                        <div class = "listing-avatar"><a href = "#"><img src="<?php echo site_url('assets/frontends/web/images/avatar.png') ?>" alt = ""></a>
                                            <span class = "avatar-tooltip">Added By <strong>Admin</strong></span>
                                        </div>
        <!--                                    <div class = "geodir_status_date gsd_open"><i class = "fal fa-lock-open"></i>Open Now</div>-->
                                        <div class = "geodir-category-opt">
                                            <div class = "listing-rating-count-wrap">
                                                <div class = "review-score"><?php echo number_format($p->rscore, 1) ?></div>
                                                <div class = "listing-rating card-popup-rainingvis" data-starrating2 = "<?php echo $p->rscore ?>"></div>
                                                <br>
                                                <div class = "reviews-count"><?php echo $p->totalreview ?> reviews</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "geodir-category-content fl-wrap title-sin_item">
                                        <div class = "geodir-category-content-title fl-wrap">
                                            <div class = "geodir-category-content-title-item">
                                                <h3 class = "title-sin_map"><a href = "<?php echo base_url("web/places/detail/" . $p->id) ?>"><?php echo $p->name ?></a><span class = "verified-badge"><i class = "fal fa-check"></i></span></h3>
                                                <div class = "geodir-category-location fl-wrap"><a href = "#" ><i class = "far fa-map-marked-alt"></i> <?php echo $p->address ?></a></div>
                                            </div>
                                        </div>
                                        <div class = "geodir-category-text fl-wrap">

                                            <div class = "facilities-list fl-wrap">
                                                <div class = "facilities-list-title">Facilities : </div>
                                                <ul class = "no-list-style">
                                                    <?php
                                                    $fclty = array_values(json_decode($p->facility));
                                                    foreach ($facility as $f) {
                                                        if (in_array($f->id, $fclty)) {
                                                            ?>
                                                            <li class = "tolt" data-microtip-position = "top" data-tooltip = "<?php echo $f->facility ?>"><i class = "fal fa-<?php echo $f->icon ?>"></i></li>
                                                            <?php
                                                        }
                                                    }
                                                    ?>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class = "geodir-category-footer fl-wrap">
                                            <a class = "listing-item-category-wrap">
                                                <div class = "listing-item-category red-bg"><i class="fal fa-<?php echo $p->pcategoryicon ?>"></i></div>
                                                <span><?php echo $p->placecategory ?></span>
                                            </a>
                                            <div class = "geodir-opt-list">
                                                <ul class = "no-list-style">
                                                    <li><a href = "#" class = "show_gcc"><i class = "fal fa-envelope"></i><span class = "geodir-opt-tooltip">Contact Info</span></a></li>
                                                    <li><a target="_blank" href="https://www.google.com/maps/place/<?php echo str_replace(" ", "+", $p->name) ?>/@<?php echo $p->location ?>" class="show-single-contactform tolt" data-microtip-position="top" data-tooltip="Open in Google Maps"><i class="far fa-map-marked-alt"></i></a></li>

                                                </ul>
                                            </div>
                                            <!--                                        <div class = "price-level geodir-category_price">
                                                                                        <span class = "price-level-item" data-pricerating = "3"></span>
                                                                                        <span class = "price-name-tooltip">Pricey</span>
                                                                                    </div>-->
                                            <div class = "geodir-category_contacts">
                                                <div class = "close_gcc"><i class = "fal fa-times-circle"></i></div>
                                                <ul class = "no-list-style">
                                                    <li><span><i class = "fal fa-phone"></i> Call : </span><a href = "#"><?php echo $p->phone ?></a></li>
                                                    <li><span><i class = "fal fa-envelope"></i> Write : </span><a href = "mailto:<?php echo $p->email ?>"><?php echo $p->email ?></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!--                        listing-item end-->
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <a href = "<?php echo base_url('web/places/search/all') ?>" class = "btn  dec_btn  red-bg">Cek Seluruh Tempat<i class = "fal fa-arrow-alt-right"></i></a>
        </div>
    </section>
    <!--section end-->
    <!--section -->
    <section class = "gradient-bg hidden-section" data-scrollax-parent = "true">
        <div class = "container">
            <div class = "row">
                <div class = "col-md-6">
                    <div class = "colomn-text  pad-top-column-text fl-wrap">
                        <div class = "colomn-text-title">
                            <h3>Aplikasi Kami Tersedia di Google Play Store.</h3>
                            <p>Dapatkan informasi dengan mudah dari Aplikasi Kami. Download Sekarang.</p>
                            <a href = "#" class = " down-btn color3-bg"><i class = "fab fa-android"></i> Google Play </a>
                        </div>
                    </div>
                </div>
                <div class = "col-md-6">
                    <div class = "collage-image">
                        <img width="680" src = "<?php echo base_url('assets/frontends/web/') ?>images/ticfooter.png" class = "main-collage-image" alt = "">
                        <div class = "images-collage-title red-bg icdec"> <img src = "<?php echo base_url($this->config->item('site_logo')) ?>" alt = ""></div>
                        <div class = "images-collage_icon green-bg" style = "right:-20px; top:120px;"><i class = "fal fa-thumbs-up"></i></div>
                        <div class = "collage-image-min cim_1"><img src = "<?php echo site_url('assets/frontends/web/images/avatar.png') ?>" alt = ""></div>
                        <div class = "collage-image-min cim_2"><img src = "<?php echo site_url('assets/frontends/web/images/avatar.png') ?>" alt = ""></div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "gradient-bg-figure" style = "right:-30px;top:10px;"></div>
        <div class = "gradient-bg-figure" style = "left:-20px;bottom:30px;"></div>
        <div class = "circle-wrap" style = "left:270px;top:120px;" data-scrollax = "properties: { translateY: '-200px' }">
            <div class = "circle_bg-bal circle_bg-bal_small"></div>
        </div>
        <div class = "circle-wrap" style = "right:420px;bottom:-70px;" data-scrollax = "properties: { translateY: '150px' }">
            <div class = "circle_bg-bal circle_bg-bal_big"></div>
        </div>
        <div class = "circle-wrap" style = "left:420px;top:-70px;" data-scrollax = "properties: { translateY: '100px' }">
            <div class = "circle_bg-bal circle_bg-bal_big"></div>
        </div>
        <div class = "circle-wrap" style = "left:40%;bottom:-70px;" >
            <div class = "circle_bg-bal circle_bg-bal_middle"></div>
        </div>
        <div class = "circle-wrap" style = "right:40%;top:-10px;" >
            <div class = "circle_bg-bal circle_bg-bal_versmall" data-scrollax = "properties: { translateY: '-350px' }"></div>
        </div>
        <div class = "circle-wrap" style = "right:55%;top:90px;" >
            <div class = "circle_bg-bal circle_bg-bal_versmall" data-scrollax = "properties: { translateY: '-350px' }"></div>
        </div>
    </section>
    <!--section end-->

</div>
