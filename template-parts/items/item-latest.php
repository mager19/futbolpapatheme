<div class="item__latest flex flex-wrap md:flex-nowrap items-center gap-3">
    <div class="image w-full md:w-5/12 md:h-full">
        <?php echo get_the_post_thumbnail(); ?>
    </div>
    <div class="content w-full md:w-7/12">
        <h4 class="title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h4>
        <p class='title--body text-text'><?php $content = get_the_excerpt();
                                            echo wp_trim_words($content, 20, '...');
                                            ?>
        </p>
        <?php $post_date = get_the_date('F j, Y'); ?>
        <span><?php echo $post_date; ?> </span>
    </div>
</div>