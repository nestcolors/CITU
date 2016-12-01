<section class="contact-us">
    <div id="map"></div>
    <!-- <div class="gradient"></div> -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="contact-us-container">
                    <h2><?php _e('Contact Us','citu') ?></h2>
                    <div class="contact-data">
                        <div class="info-block">
                            <h4><?php _e('Email','citu') ?></h4>
                            <div class="header-line"></div>
                            <a href="<?php echo AbvFunctions::add_protocol_to_link(get_option('abv_options_theme')['email'],'email') ?>" >
                                <?php echo get_option('abv_options_theme')['email'] ?>
                            </a>
                        </div>
                        <div class="info-block">
                            <h4><?php _e('Phone #','citu') ?></h4>
                            <div class="header-line"></div>
                            <p><?php echo get_option('abv_options_theme')['phone'] ?></p>
                            <p><?php echo get_option('abv_options_theme')['workweekDays'] ?></p>
                        </div>
                        <div class="info-block">
                            <h4><?php _e('Address','citu') ?></h4>
                            <div class="header-line"></div>
                            <p><?php echo get_option('abv_options_theme')['address'] ?>
                        </div>
                    </div>
                    <div class="form-block box-hover">
                        <h3><?php _e('We would be happy to discuss your project or answer any questions.','citu') ?></h3>
                        <?php
                            if (pll_current_language('slug') === 'nl'){
                                echo do_shortcode('[contact-form-7 id="42" title="Contact form nl"]');
                            } else {
                                echo do_shortcode('[contact-form-7 id="4" title="Contact form en"]');
                            }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- contacts section end-->
