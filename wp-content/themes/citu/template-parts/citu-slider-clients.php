<div class="client">
    <img src="<?php echo get_the_post_thumbnail_url($item->ID,'full') ?>" alt="<?php echo get_the_title($item->ID); ?>">
    <p><?php echo get_the_title($item->ID); ?></p>
</div>