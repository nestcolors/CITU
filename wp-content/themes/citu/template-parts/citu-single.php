<body class="single-blog-page">
<div class="nav-bar-full-width box-normal fixed">
    <div class="container">
        <div class="row">
            <div class="nav-bar color">
                <?php include ('citu-menu-main-color.php'); ?>
            </div>
        </div>
    </div>
</div><!-- sticky header end-->

<section class="blog-item-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="box-normal box-hover">
                    <div class="back-btn ">
                        <a href="<?php echo AbvFunctions::set_pll_link('/magazine') ?>" class="read-more"><span class="arrow arrow-blue"></span> Back to blog</a>
                    </div>
                    <div class="blog-item-image" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID,'full') ?>)"></div>

                    <div class="blog-item-text">
                        <div class="blog-item-text-intro">
                            <h2><?php the_title(); ?></h2>
                            <p class="small-text date pull-left"><?php the_date('d/m/Y'); ?></p>
                            <p class="small-text category pull-right"><?php echo ABVCituWidgets::get_category_list($post->ID) ?></p>
                            <div class="clear"></div>
                        </div>
                        <div class="blog-text-body">
                            <?php the_content() ?>
                        </div>
                        <?php
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="related-posts">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <h4>related posts:</h4>

                <div class="blog-slider-container" id="blogPage-slider">
                    <?php ABVCituWidgets::show_slider(5, $post) ?>
                </div><!-- blog slider section end-->
            </div>
        </div>
    </div>
</section>

<section class="magazine">
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
