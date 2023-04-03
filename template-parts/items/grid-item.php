<?php $background = get_the_post_thumbnail_url(); ?>
<div class="grid__posts__item grid__posts__item<?php echo $args['counter']; ?>" style='background-image:url(<?php echo $background; ?>);'>
    <div class="content">
        <a href="<?php the_permalink(); ?>">
            <div class="tag">
                <?php $categories = get_the_category();

                if (!empty($categories)) {
                    echo esc_html($categories[0]->name);
                } ?>
            </div>
            <h3 class="title">
                <?php the_title(); ?>
            </h3>
            <?php $post_date = get_the_date('F j, Y'); ?>
            <span><?php echo $post_date; ?> </span>
        </a>
    </div>
</div>