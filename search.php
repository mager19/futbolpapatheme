<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package baseTheme
 */

get_header(); ?>

<div class="container mx-auto py-14">
    <div class="info">

        <?php
        if (have_posts()) : ?>

            <header class="page-header px-4">
                <h1 class="inline-flex border-b-2 border-secondary title--4 lg:title--4 mb-8">
                    <?php
                    /* translators: %s: search query. */
                    printf(esc_html__('Search Results for: %s', 'frontporchsolutions'), '<span>' . get_search_query() . '</span>');
                    ?>
                </h1>
            </header><!-- .page-header -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 px-4">
                <?php
                /* Start the Loop */
                while (have_posts()) : the_post(); ?>
                    <!-- Item Post -->
                    <!-- Item Post -->
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="header-post">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail(); ?>
                            </a>
                        </header>

                        <div class="info-post">
                            <h2 class='title title--5 lg:title--5'>
                                <a class='text-text visited:text-text hover:text-text  hover:opacity-80 no-underline mt-4 inline-flex' href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <?php echo wp_trim_words(get_the_content(), 30, '[...]'); ?>

                            <?php //the_excerpt(); 
                            ?>

                            <a class='flex mt-2' href="<?php the_permalink(); ?>" class="link">
                                <?php _e('Continue Reading', 'frontporchsolutions'); ?>
                            </a>
                        </div>
                    </article>
                    <!-- Item Post -->
                    <!-- Item Post -->
                <?php endwhile; ?>
            </div>
            <!-- Pagination -->
            <?php if (function_exists('frontporchsolutions__pagination')) : ?>
                <div class="pagination">
                    <?php baseTheme__pagination($posts->max_num_pages, "", $paged); ?>
                </div>
            <?php endif; ?>
            <!-- End Pagination -->

        <?php
        else :
            echo '<p>Sorry, but nothing matched your search terms. Please try again with some different keywords</p>';
            get_search_form();
        endif; ?>

    </div>
</div><!-- #main -->


<?php
get_footer();
