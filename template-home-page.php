<?php

/**
 * TEMPLATE NAME:  Home Page template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package baseTheme
 */

get_header(); ?>

<div class="content__page">
    <?php $posts = get_field('select_hero_posts'); ?>
    <?php if ($posts) : ?>
        <div class="container mx-auto py-4 md:py-8 lg:py-14">
            <div class="grid__posts px-4 md:px-0">
                <?php $counter = 1; ?>
                <?php foreach ($posts as $post) : setup_postdata($post); ?>
                    <?php $background = get_the_post_thumbnail_url(); ?>
                    <div class="grid__posts__item grid__posts__item<?php echo $counter; ?>" style='background-image:url(<?php echo $background; ?>);'>
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
                    <?php $counter++; ?>
                <?php endforeach;
                wp_reset_postdata(); ?>
            </div>
        </div><!-- #main -->
    <?php endif; ?>

    <div class="content__main pb-8">
        <div class="container mx-auto">
            <div class="flex px-4 md:px-0 gap-4">
                <!-- THOUGHT OF THE MONTH -->
                <div class="content__main--left md:w-8/12 bg-primary-lighter py-8 px-6">
                    <?php get_template_part('template-parts/thought', 'month'); ?>

                    <div class="featured__post mt-4">
                        <!-- Featured Posts -->
                        <?php get_template_part(
                            'template-parts/title',
                            'section',
                            array(
                                'title' => 'FEATURED POSTS',
                                'links' => true
                            )
                        ); ?>
                    </div>
                </div>



                <div class="aside hidden md:block md:w-4/12 bg-slate-100">
                    <h5>Categories</h5>
                    <?php
                    $categories = get_categories(array(
                        'orderby' => 'name',
                        'order'   => 'ASC'
                    ));


                    foreach ($categories as $category) {
                        $category_link = sprintf(
                            '<a href="%1$s" alt="%2$s">%3$s</a>',
                            esc_url(get_category_link($category->term_id)),
                            esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $category->name)),
                            esc_html($category->name)
                        );
                        echo '<p>' . $category_link;
                        echo ' (' . $category->count . ')</p>';
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <?php wp_reset_query(); ?>
</div>

<?php
get_footer();
