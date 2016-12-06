<a href="<?php echo get_the_permalink($item->ID) ?>" class="slide box-normal box-hover">
    <div class="post-image pull-left" style="background-image: url(<?php echo get_the_post_thumbnail_url($item->ID,'full') ?>)"></div>
    <div class="post-text pull-right">
        <h4><?php echo get_the_title($item->ID); ?></h4>
        <p class="small-text date"><?php echo get_the_date('d/m/Y',$item->ID); ?></p>
        <p class="small-text category"><?php echo ABVCituWidgets::get_category_list($item->ID) ?></p>
        <p class="excerpt"><?php echo ABVCituWidgets::get_short_content($item->ID, 88) ?></p>
    </div>
</a>