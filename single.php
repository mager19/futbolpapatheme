<?php

/**
 * The template for displaying all single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package baseTheme
 */

get_header(); ?>

<div class="single__post py-8 lg:py-12 relative">
    <div class="container mx-auto">
        <div class="flex flex-wrap px-4 md:px-0">
            <div class="w-full lg:w-10/12 lg:mx-auto">
                <h1 class="title--4 lg:title--3 text-center"><?php the_title(); ?></h1>
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    if (has_post_thumbnail()) { ?>
                        <figure class="featuredImage">
                            <?php
                            the_post_thumbnail();
                            ?>
                        </figure>
                    <?php
                    }
                    if (get_the_post_thumbnail_caption()) { ?>
                        <span class="text-dark-3 title--caption justify-center lg:justify-end flex mb-4">
                            <?php echo get_the_post_thumbnail_caption(); ?>
                        </span>
                    <?php
                    }
                    ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>

<!-- Featured Posts -->
<div class="container">
    <div class="futbol__papa__section flex flex-wrap px-4 my-6 lg:my-10 lg:px-0">
        <div class="titleSection w-full">
            <!-- Featured Posts -->
            <?php get_template_part(
                'template-parts/title',
                'section',
                array(
                    'title' => "You might also like",
                    'links' => false
                )
            ); ?>
        </div>
        <?php
        $args =  array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'post__not_in' => array($post->ID)
        );

        $posts = get_posts($args) ?>
        <?php if ($posts) : ?>
            <div class="futbol__papa__posts w-full grid grid-cols-2 lg:grid-cols-4 gap-4 mt-4 lg:mt-10">
                <?php $counter = 1; ?>
                <?php foreach ($posts as $post) : setup_postdata($post); ?>
                    <?php
                    get_template_part(
                        'template-parts/items/item',
                        'post',
                        array(
                            'counter' => $counter,
                        )
                    );
                    ?>
                    <?php $counter++; ?>
                <?php endforeach;
                wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>


<?php
get_footer();
