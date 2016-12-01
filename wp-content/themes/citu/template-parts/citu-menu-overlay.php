
    <div class="mobile-overlay">
        <div class="close-mobile-overlay"></div>
        <div class="main-links">
            <a href="<?php echo AbvFunctions::set_pll_link('/its') ?>" class="itc"><span>Internet Communication<br> & Technolory</span> <span class="nav-arrow white-arrow"></span></a>
            <a href="<?php echo AbvFunctions::set_pll_link('/bds') ?>" class="bds"><span>Business Development<br> & Support</span> <span class="nav-arrow white-arrow"></span></a>
        </div>
        <div class="page-links">
            <a href="<?php echo AbvFunctions::set_pll_link('/magazine') ?>">magazine</a>
            <a href="<?php echo AbvFunctions::set_pll_link('/about') ?>">about us</a>
            <a href="#getintouch">get in touch</a>
        </div>
        <ul class="lang-switcher">
            <?php pll_the_languages(array('show_flags'=>0,
                'show_names'=>1,
                'dropdown'=>0,
                'display_names_as'=>'slug'
            ));?>
        </ul>
    </div>