<div class="pull-left">
    <a href="<?php echo get_home_url(); ?>" class="nav-logo logo-white"></a>
    <div class="main-links hide-mobile">
        <a href="<?php echo AbvFunctions::set_pll_link('/its') ?>" class="itc <?php echo AbvFunctions::add_class_active('its') ?>"><span>Internet Communication<br> & Technology</span> <span class="nav-arrow white-arrow"></span></a>
        <a href="<?php echo AbvFunctions::set_pll_link('/bds') ?>" class="bds <?php echo AbvFunctions::add_class_active('bds') ?>"><span>Business Development<br> & Support</span> <span class="nav-arrow white-arrow"></span></a>
    </div>
</div>
<div class="pull-right no-padding">
    <ul class="menu hide-tablet">
        <a href="<?php echo AbvFunctions::set_pll_link('/magazine') ?>" class=" <?php echo AbvFunctions::add_class_active('magazine') ?>">magazine</a>
        <a href="<?php echo AbvFunctions::set_pll_link('/about') ?>" class="<?php echo AbvFunctions::add_class_active('about') ?>">about us</a>
        <ul class="lang-switcher">
            <?php pll_the_languages(array('show_flags'=>0,
                'show_names'=>1,
                'dropdown'=>1,
                'display_names_as'=>'slug'
            ));?>
        </ul>
        <a href="#map">get in touch</a>
    </ul>
    <div class="mobile-menu-icon hide-pc mobile-menu-toggle">
        <ul class="white">
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</div>
