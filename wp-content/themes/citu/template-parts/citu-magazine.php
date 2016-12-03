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
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div class="row">
                    <div class="col-sm-8 search-form">
                        <?php get_search_form(); ?>
                    </div>
                    <div class="col-sm-4">
                        <p id="show-sorting"><span class="icon sort-icon"></span><span class="icon filter-icon"></span></p>
                        <div class="sorting-container box-normal box-hover">
                            <ul class="order-list filtering">
                            <span class="pull-right">filter by:</span><br><?php ABVCituWidgets::show_category() ?></ul>
                            <?php global $wp; $current_url = home_url(add_query_arg(array(),$wp->request));?>
                            <ul class="order-list sorting">
                            <span class="pull-right">sort by:</span><br>
                                <li><a href="<?php echo $current_url ?>\?orderby=name&order=DESC">name desc</a></li>
                                <li><a href="<?php echo $current_url ?>\?orderby=name&order=ASC">name asc</a></li>
                                <li><a href="<?php echo $current_url ?>\?orderby=date&order=DESC">date desc</a></li>
                                <li><a href="<?php echo $current_url ?>\?orderby=date&order=ASC">date asc</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
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
                            $count = $wp_query->post_count;
                            if ( $count > 1 ) {
                                if ($count >= 5) $count = 5;
                                for ($n = 1; $n <= $count-1; $n++) {
                                    $item = $posts[$n];
                                    include('citu-post-small.php');
                                }
                            }
                        ?>
                        <div class="clear" id="append"></div>
                    </div>
                </div><!-- EOF blog-items-list -->

            </div>
        </div>
        <!-- </div> -->
    </div>
    <a href="#" class="button button-blue button-blue-inverse" id="load_more">load more</a>
</section>
<section class="magazine-blog" id="magazine-blog">

    <div class="container">

        <div class="row">
            <?php include('citu-mailchimp.php') ?>
        </div>

    </div>
</section>
<?php include ('citu-contact-form.php'); ?>
