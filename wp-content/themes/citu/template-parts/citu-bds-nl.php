<body class="service-page bds-service-page full-navbar-page  <?php echo pll_current_language('slug') ?>">
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
                <h1>Business Development & Support</h1>
                <div class="header-line"></div>
                <h2>Discover the opportunities of extending your
                    <br/> business in Ukraine.</h2>
            </div>
        </div>
    </div>
    <?php include ('citu-menu-overlay.php'); ?>
</section><!-- intro section end-->

<div class="nav-bar-full-width box-normal">
    <div class="container">
        <div class="row">
            <div class="nav-bar color">
                <?php include ('citu-menu-main-color.php'); ?>
            </div>
        </div>
    </div></div><!-- sticky header end-->

<section class="about-service">
    <div class="container">

        <div class="row"><!-- intro-block -->
            <div class="col-md-8 col-md-offset-2">
                <div class="intro-block ">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="itc-icon icon"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <h3>We work with a network of partners in Ukraine who make our full-range services possible.</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- EOF intro-block -->

        <div class="row exp-we-provide"><!-- form-block -->
            <div class="col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
                <h2>Expertise that we provide</h2>
                <div class="exp-items-container">
                    <div class="row" id="bds-services">
                        <div class="col-sm-4">
                            <div class="box-normal form-item">
                                <div class="icon marketing-bds"></div>
                                <h3>Market research</h3>
                                <div class="header-line"></div>
                                <ul>
                                    <li>Market information & trends</li>
                                    <li>Customer analysis</li>
                                    <li>Competitor analysis</li>
                                    <li>Risk analysis</li>
                                    <li>SWOT analysis</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box-normal form-item">
                                <div class="icon biz-dev-bds"></div>
                                <h3>Business development</h3>
                                <div class="header-line"></div>
                                <ul>
                                    <li>Matchmaking</li>
                                    <li>Legal and organizational advice</li>
                                    <li>Project management</li>
                                    <li>Sales support</li>
                                    <li>On-site representation </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box-normal form-item">
                                <div class="icon biz-support-bds"></div>
                                <h3>Business support</h3>
                                <div class="header-line"></div>
                                <ul>
                                    <li>Ongoing legal and tax support
                                    <li>Administration support</li>
                                    <li>Bookkeeping</li>
                                    <li>Project management</li>
                                    <li>Translation services</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- EOF form-block -->
        <div class="form-items-container"> <!-- form-items-container -->
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                    <h2>How do we work?</h2>

                    <div class="row form-items">
                        <div class="col-sm-4 col-xs-12 item">
                            <h3>Any type of project:</h3>
                            <ul>
                                <li>Project based</li>
                                <li>Interim projects</li>
                                <li>Ongoind support</li>
                            </ul>
                        </div>
                        <div class="col-sm-4 col-xs-12 item">
                            <h3>What do we offer:</h3>
                            <ul>
                                <li>Presence in the Netherlands</li>
                                <li>On-site support in Ukraine</li>
                                <li>Long-term partnership</li>
                            </ul>
                        </div>
                        <div class="col-sm-4 col-xs-12 item">
                            <h3>We can help you to:</h3>
                            <ul>
                                <li>Determine the opportunities</li>
                                <li>Develop your business</li>
                                <li>Provide you with local support</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- EOF form-items-container -->
    </div>
</section><!-- about-service end-->

<section class="our-clients">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div class="section-intro">
                    <h3>Our clients:</h3>
                    <div class="header-line"></div>
                    <div class="clients-container">
                        <?php AbvFunctions::get_all_post_type('clients','abv_clients_position_meta_value_key','citu-slider-clients.php', 6) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- our-clients section end -->

<section class="magazine">
    <div class="container">

        <div class="row">
            <?php include('citu-mailchimp.php') ?>
        </div>

    </div>
</section>
<?php include ('citu-contact-form.php'); ?>
