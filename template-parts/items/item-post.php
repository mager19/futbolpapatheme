<div class="item__post item__post<?php echo $args['counter']; ?> flex flex-col flex-wrap gap-2">
    <div class="image">
        <?php echo get_the_post_thumbnail(); ?>
    </div>
    <div class="content flex items-center">
        <h6 class='title mb-0'><?php the_title(); ?></h6>
    </div>
</div>