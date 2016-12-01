<body class="magazine-page full-navbar-page">
<section class="intro">
    <div class="color-overlay"></div>
    <div class="container">
        <div class="row">

            <div class="nav-bar nav-bar-light">
                <?php include ('citu-menu-main.php'); ?>
            </div>

        </div>

        <div class="row">
            <div class="tagline-container">
                <div class="logo"></div>
                <h1>Magazine</h1>
            </div>
        </div>
    </div>
</section><!-- intro section end-->

<div class="nav-bar-full-width box-normal fixed">
    <div class="container">
        <div class="row">
            <div class="nav-bar color">
                <?php include ('citu-menu-main-color.php'); ?>
            </div>
        </div>
    </div>
</div><!-- sticky header end-->

<section class="magazine">
    <div class="container">
        <div class="row filter-block">
        </div>

        <div class="blog-items-list-container row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div class="row">
                    <?php
                    if ( have_posts() ){
                        $item = $posts[0];
                        include ('citu-post-big.php');
                    }
                    ?>
                </div>


                <div class="row"><!-- blog-items-list -->
                    <div class="blog-items-list">
                        <?php
                        for($n = 1; $n<=4; $n++){
                            $item = $posts[$n];
                            include ('citu-post-small.php');
                        }
                        ?>
                        <div class="clear"></div>
                    </div>
                </div><!-- EOF blog-items-list -->

            </div>
        </div>
        <!-- </div> -->
    </div>
    <a href="" class="button button-blue button-blue-inverse">load more</a>
</section>
<section class="magazine-blog">

    <div class="container">

        <div class="row">
            <h3 class="center show-mobile">Subscribe for newsletters</h3>
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="subscribe-block box-normal box-hover">
                    <h3 class="hide-mobile">Subscribe for newsletters</h3>
                    <input type="text" class="mail" placeholder="yourmail@mail.com">
                    <input type="button" class="subscribe">
                </div>
                <div class="social-links">
                    <span>social profiles: <a href="" class="subs-icon fb"></a><a href="" class="subs-icon in"></a><a href="" class="subs-icon insta"></a></span>
                </div>
            </div>
        </div>

    </div>
</section>
<?php include ('citu-contact-form.php'); ?>