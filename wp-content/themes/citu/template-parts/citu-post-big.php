<div class="col-xs-12">
    <a href="<?php get_the_permalink($item->ID) ?>" class="box-normal box-hover init-blog-item"><!-- init-blog-item -->
        <div class="post-image pull-left" style="background-image: url(<?php echo get_the_post_thumbnail_url($item->ID,'full') ?>)"></div>
        <div class="post-text pull-right">
            <h3 class="hide-mobile"><?php echo get_the_title($item->ID); ?></h3>
            <h4 class="show-mobile"><?php echo get_the_title($item->ID); ?></h4>
            <p class="small-text date pull-left"><?php get_the_date('d/m/Y',$item->ID); ?></p>
            <p class="small-text category pull-right"><?php echo ABVCituWidgets::get_category_list($item->ID) ?></p>
            <div class="clear"></div>
            <p class="excerpt hide-mobile"><?php echo ABVCituWidgets::get_short_content($item->ID, 380) ?></p>
            <p class="excerpt show-mobile"><?php echo ABVCituWidgets::get_short_content($item->ID, 88) ?></p>
        </div>
        <div class="clear"></div>
    </a><!-- EOF init-blog-item -->
</div>