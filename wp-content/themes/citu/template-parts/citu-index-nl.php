<body <?php body_class("home-page full-navbar-page ". pll_current_language('slug')) ?>>
<?php include ('citu-top-bar.php'); ?>
<section class="intro">
    <div class="gradient-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="nav-bar nav-bar-light">
                <?php include ('citu-menu-main.php'); ?>
            </div>
        </div>

        <div class="row">
            <div class="tagline-container show-from-bottom">
                <div class="logo"></div>
                <h1>Connect it! Ukraine</h1>
                <div class="header-line"></div>
                <h2>Discover possibilities of doing business in<br/> Ukraine</h2>
            </div>
        </div>
    </div>
    <?php include ('citu-menu-overlay.php'); ?>
</section><!-- intro section end-->

<div class="nav-bar-full-width box-normal">
    <div class="nav-bar color">
        <div class="container">
            <div class="row">
                <?php include ('citu-menu-main-color.php'); ?>
            </div>
        </div>
    </div>
</div><!-- sticky header end-->

<section class="features">
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2>Build globally, profit locally</h2>
                <div class="header-line"></div>
                <h3>We believe that Ukraine has a great potential which you can use for growing your business locally:</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 col-xs-0"></div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="feature-item">
                    <div class="feature-icon lead-in-it"></div>
                    <h4>Leading in IT</h4>
                    <div class="header-line"></div>
                    <p>Leading in IT: 90 000*+ IT professionals (#1 in Europe)<br><span class="small show-pc">*200 000 expected in 2020</span></p>
                </div>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="feature-item">
                    <div class="feature-icon agriculture"></div>
                    <h4>Agriculture</h4>
                    <div class="header-line"></div>
                    <p>25% of the global black soil assets is located in Ukraine</p>
                </div>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="feature-item">
                    <div class="feature-icon professionals"></div>
                    <h4>Professionals</h4>
                    <div class="header-line"></div>
                    <p>Highly skilled workers at competitive wages</p>
                </div>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <div class="feature-item">
                    <div class="feature-icon cost-advances"></div>
                    <h4>Cost Advances</h4>
                    <div class="header-line"></div>
                    <p>Cost competitive manufacturing platform</p>
                </div>
            </div>
        </div><!-- features-items row end-->

        <div class="row" id="advantages">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div class="box-normal advantages">
                    <h3>Advantages of doing business in or with Ukraine:</h3>
                    <div class="advantages-list hide-mobile">
                        <ul>
                            <li>1) Close proximity to Europe</li>
                            <li>2) No time difference</li>
                            <li>3) High literacy rate</li>
                            <li>4) European culture</li>
                        </ul>
                    </div>
                    <hr class="show-mobile"/>
                    <a href="<a href="<?php echo AbvFunctions::set_pll_link('/magazine') ?>" class="read-more static show-mobile center">read more <span class="arrow arrow-blue"></span></a>
                    <a href="<a href="<?php echo AbvFunctions::set_pll_link('/magazine') ?>" class="read-more hide-mobile">read more <span class="arrow arrow-blue"></span></a>
                </div>
            </div>
        </div>

    </div>
</section><!-- features section end-->

<section class="services">
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="services-logo logo-blue"></div>
                <div class="header-line"></div>
                <h2>Our services</h2>
            </div>
        </div>
        <!-- services for ps&table view -->
        <div class="row hide-mobile">
            <div class="col-md-4 col-md-offset-2 col-xs-6">
                <div class="box-normal service-box">
                    <div class="service-icon itc"></div>
                    <h4>Internet Communications and Technologies</h4>
                    <p>We help European ICT companies with outsourcing of their work to Ukraine. We develop full-range ICT solutions at a competitive price for companies in Europe.</p>
                    <a href="<?php echo AbvFunctions::set_pll_link('/its') ?>" class="button button-blue">learn more</a>
                </div>
            </div>
            <div class="col-md-4 col-xs-6" id="move-service-item">
                <div class="box-normal service-box">
                    <div class="service-icon bds"></div>
                    <h4 class="orange-text">Business Development and <br> Support</h4>
                    <p>We assist companies willing to do business in Ukraine with market research, legal and organizational advice, matchmaking, administrative support and project management.</p>
                    <a href="<?php echo AbvFunctions::set_pll_link('/bds') ?>" class="button button-orange">learn more</a>
                </div>
            </div>
        </div><!-- EOF services for ps&table view -->

        <!-- services for mobile view -->
        <div class="row show-mobile" id="mobile-services-slider">
            <div class="col-xs-10">
                <div class="box-normal service-box">
                    <div class="service-icon itc"></div>
                    <h4>Information & Communication Technology</h4>
                    <p>We help European ICT companies with outsourcing of their work to Ukraine. We develop full-range ICT solutions at a competitive price for companies in Europe.</p>
                    <a href="<?php echo AbvFunctions::set_pll_link('/its') ?>" class="button button-blue">learn more</a>
                </div>
            </div>
            <div class="col-xs-10">
                <div class="box-normal service-box">
                    <div class="service-icon bds"></div>
                    <h4 class="orange-text">Business Development and <br> Support</h4>
                    <p>We assist companies willing to do business in Ukraine with market research, legal & organizational advice, matchmaking, administrative support & project management.</p>
                    <a href="<?php echo AbvFunctions::set_pll_link('/bds') ?>" class="button button-orange">learn more</a>
                </div>
            </div>
        </div><!-- EOF services for mobile view -->

    </div>
</section><!-- services section end-->

<section class="magazine">
    <div class="container">

        <div class="row section-header">
            <h2>Magazine</h2>
            <div class="header-line"></div>
            <h3>News from Ukraine</h3>
        </div>
        <div class="blog-slider-container" id="blog-slider">
            <?php ABVCituWidgets::show_slider() ?>
        </div><!-- blog slider section end-->
        <a href="<?php echo AbvFunctions::set_pll_link('/magazine') ?>" class="button button-white">Read magazine</a>

        <div class="row">
            <?php include('citu-mailchimp.php') ?>
        </div>

    </div>
</section><!-- magazine section end-->
<section class="about-us">

    <div class="container">
        <div class="row section-header">
            <h2>About us</h2>
            <div class="header-line"></div>
            <h3>Why choosing us?</h3>
        </div>
        <div class="row about-us-container">
            <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row about-us-feature-item">
                            <div class="col-xs-9 hide-mobile">
                                <p class="right-align">We speak languages (Dutch, English, Ukrainian, Russian)</p>
                            </div>
                            <div class="col-xs-3 hide-mobile">
                                <div class="about-us-icon lang-icon"></div>
                            </div>
                            <div class="col-xs-3 show-mobile">
                                <div class="about-us-icon lang-icon"></div>
                            </div>
                            <div class="col-xs-9 show-mobile">
                                <p class="left-align">We speak languages (Dutch, English, Ukrainian, Russian)</p>
                            </div>
                        </div>
                        <div class="row about-us-feature-item">
                            <div class="col-xs-9 hide-mobile">
                                <p class="right-align">We help to understand the culture differences </p>
                            </div>
                            <div class="col-xs-3 hide-mobile">
                                <div class="about-us-icon cult-diff-icon"></div>
                            </div>
                            <div class="col-xs-3 show-mobile">
                                <div class="about-us-icon cult-diff-icon"></div>
                            </div>
                            <div class="col-xs-9 show-mobile">
                                <p class="left-align">We help to understand the culture differences </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row about-us-feature-item">
                            <div class="col-xs-3">
                                <div class="about-us-icon all-in-one-icon"></div>
                            </div>
                            <div class="col-xs-9">
                                <p class="">We provide all-in-one-shop expertise through a large network in Ukraine</p>
                            </div>
                        </div>
                        <div class="row about-us-feature-item">
                            <div class="col-xs-3">
                                <div class="about-us-icon one-site-icon"></div>
                            </div>
                            <div class="col-xs-9">
                                <p class="">Our Dutch team is always on-site and ready to assist You!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row citu-history">
            <div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12">
                <div class="box-normal">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 logo-container">
                            <div class="logo logo-color"></div>
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <p>Based in the Netherlands, Connect it! Ukraine work together with the partners in Ukraine specialized in various expertises.</p>
                            <p>This allows us to provide broad range of services using tailored approach based on the needs of the client or certain project.</p>
                        </div>
                        <a href="<?php echo AbvFunctions::set_pll_link('/about') ?>" class="read-more">read more <span class="arrow arrow-blue"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- about-us section end-->
<?php include ('citu-contact-form.php'); ?>

