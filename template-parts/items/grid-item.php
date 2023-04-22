<?php $background = get_the_post_thumbnail_url(); ?>
<div class="grid__posts__item pb-4 grid__posts__item<?php echo $args['counter']; ?>" style='background-image:url(<?php echo $background; ?>);'>
    <div class="content flex flex-wrap gap-1">
        <div class="tag">
            <?php $categories = get_the_category();

            if (!empty($categories)) { ?>
            <a href="<?php echo esc_url(get_bloginfo('url')); ?>/category/<?php echo $categories[0]->slug ?>">
<?php 
                echo esc_html($categories[0]->name);
            } ?>
            </a>
        </div>
        <a class='inline-flex w-full' href="<?php the_permalink(); ?>">
            <h3 class="title">
                <?php the_title(); ?>
            </h3>
        </a>
        <?php $post_date = get_the_date('F j, Y'); ?>
        <span><?php echo $post_date; ?> </span>

    </div>
</div>