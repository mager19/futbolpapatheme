<?php

/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package baseTheme
 */

get_header(); ?>


<div class="container mx-auto py-14">
    <div class="info">
        <!-- List Post -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 px-4">
            <?php while (have_posts()) : the_post(); ?>

                <!-- Item Post -->
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="header-post">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                    </header>

                    <div class="info-post">
                        <h2 class='title title--5 lg:title--5'>
                            <a class='text-text visited:text-text hover:text-text  hover:opacity-80 no-underline mt-2 inline-flex' href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

                        <?php echo wp_trim_words(get_the_content(), 30, '[...]'); ?>

                        <?php //the_excerpt(); ?>

                        <a class='flex mt-2' href="<?php the_permalink(); ?>" class="link">
                            <?php _e('Continue Reading', 'frontporchsolutions'); ?>
                        </a>
                    </div>
                </article>
                <!-- Item Post -->

            <?php endwhile; ?>
        </div>
        <!-- List Post -->

        <!-- Pagination -->
     
            <div class="pagination px-4">
                <?php baseTheme__pagination($wp_query->max_num_pages, "", $paged); ?>
            </div>

        <!-- End Pagination -->
    </div>
</div><!-- #main -->
<?php
get_footer();
