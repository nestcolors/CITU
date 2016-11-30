<div class="pull-left">
    <a href="<?php echo get_home_url(); ?>" class="nav-logo logo-color"></a>
    <div class="main-links hide-mobile">
        <a href="<?php echo AbvFunctions::set_pll_link('/its') ?>" class="itc"><span>Internet Communication<br> & Technolory</span> <span class="nav-arrow white-arrow"></span></a>
        <a href="<?php echo AbvFunctions::set_pll_link('/bds') ?>" class="bds"><span>Business Development<br> & Support</span> <span class="nav-arrow white-arrow"></span></a>
    </div>
</div>
<div class="pull-right no-padding">
    <ul class="menu hide-tablet">
        <li><a href="<?php echo AbvFunctions::set_pll_link('/magazine') ?>">magazine</a></li>
        <li><a href="<?php echo AbvFunctions::set_pll_link('/about') ?>">about us</a></li>
        <li><ul><?php pll_the_languages(array('show_flags'=>0,
                    'show_names'=>1,
                    'dropdown'=>0,
                    'display_names_as'=>'slug'
                ));?></ul></li>
        <li><a href="#getintouch">get in touch</a></li>
    </ul>
    <div class="mobile-menu-icon hide-pc">
        <ul class="white">
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</div>
