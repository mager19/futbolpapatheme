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
                    <?php get_template_part(
                        'template-parts/items/grid',
                        'item',
                        array(
                            'counter' => $counter,
                        )
                    ); ?>
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

                    <!-- **** -->
                    <!-- Featured Posts -->
                    <div class="featured__post__section mt-6 lg:mt-10">
                        <div class="titleSection">
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
                        <?php $posts = get_field('select_featured_posts'); ?>
                        <?php if ($posts) : ?>
                            <div class='featured__post'>
                                <?php $counter = 1; ?>
                                <?php foreach ($posts as $post) : setup_postdata($post); ?>
                                    <?php if ($counter == 1) { ?>
                                        <?php get_template_part(
                                            'template-parts/items/grid',
                                            'item',
                                            array(
                                                'counter' => $counter,
                                            )
                                        ); ?>
                                    <?php
                                    } else {
                                        get_template_part(
                                            'template-parts/items/item',
                                            'post',
                                            array(
                                                'counter' => $counter,
                                            )
                                        );
                                    } ?>
                                    <?php $counter++; ?>
                                <?php endforeach;
                                wp_reset_postdata(); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- **** -->
                    <!-- Featured Posts -->
                    <div class="futbol__papa__section flex flex-wrap mt-6 lg:mt-10">
                        <div class="titleSection w-full">
                            <!-- Featured Posts -->
                            <?php get_template_part(
                                'template-parts/title',
                                'section',
                                array(
                                    'title' => "Futbol Papa's Blog",
                                    'links' => true
                                )
                            ); ?>
                        </div>
                        <?php $posts = get_field('select_futbol_papa_blog'); ?>
                        <?php if ($posts) : ?>
                            <div class="futbol__papa__posts grid grid-cols-2 lg:grid-cols-3 gap-4 mt-4 lg:mt-10">
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

                    <!-- **** -->
                    <!-- Latest Posts -->
                    <?php
                    $showLatestPosts = get_field('show');
                    if ($showLatestPosts) { ?>
                        <div class="latest__posts__section flex flex-wrap mt-6 lg:mt-10">
                            <div class="titleSection w-full">
                                <!-- Featured Posts -->
                                <?php get_template_part(
                                    'template-parts/title',
                                    'section',
                                    array(
                                        'title' => "Latest Posts",
                                        'links' => true
                                    )
                                ); ?>
                            </div>

                            <?php
                            $args = array('post_type' => 'post', 'posts_per_page' => 7);
                            $loop = new WP_Query($args);
                            if ($loop->have_posts()) : ?>
                                <div class="latest__posts__container mt-4 lg:mt-10 grid grid-cols-1 gap-6">
                                    <?php
                                    while ($loop->have_posts()) : $loop->the_post(); ?>
                                        <?php
                                        get_template_part(
                                            'template-parts/items/item',
                                            'latest',
                                        );
                                        ?>
                                    <?php endwhile; ?>
                                    <!-- post navigation -->
                                </div>
                            <?php else : ?>
                                <!-- no posts found -->
                            <?php endif; ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <!-- **** -->
                <!-- Aside -->
                <div class="aside hidden md:block md:w-4/12 bg-primary-lighter p-4">
                    <div class="about__section">
                        <?php
                        $imageAbout = get_field('about_futbol_papa_image', 'option');
                        $contentAbout = get_field('about_futbol_papa_content', 'option');

                        if ($imageAbout || $contentAbout) { ?>
                            <div class="titleSection">
                                <!-- Featured Posts -->
                                <?php get_template_part(
                                    'template-parts/title',
                                    'section',
                                    array(
                                        'title' => 'ABOUT FUTBOL PAPA®',
                                        'links' => false
                                    )
                                ); ?>
                            </div>
                            <div class="about__section__content">
                                <?php if ($imageAbout) { ?>
                                    <div class="about__image mt-6">
                                        <?php fps_get_Image($imageAbout); ?>
                                    </div>

                                    <?php if ($imageAbout['caption']) { ?>
                                        <span class="text-dark-3 title--caption justify-center lg:justify-start flex mt-2 mb-4">
                                            <?php echo $imageAbout['caption']; ?>
                                        </span>
                                    <?php
                                    } ?>
                                <?php
                                } ?>
                                <?php
                                if ($contentAbout) { ?>
                                    <div class='about__content title--body text-text mt-4'>
                                        <?php echo $contentAbout; ?>

                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        $rows = get_field('social_icons', 'option');
                        if ($rows) { ?>
                            <div class="follow__futbol__papa">
                                <div class="titleSection">
                                    <!-- Featured Posts -->
                                    <?php get_template_part(
                                        'template-parts/title',
                                        'section',
                                        array(
                                            'title' => 'FOLLOW FUTBOL PAPA®',
                                            'links' => false
                                        )
                                    ); ?>
                                </div>
                                <div class="social__icons flex justify-start items-center gap-x-2 my-6">
                                    <?php
                                    foreach ($rows as $row) { ?>
                                        <a href="<?php echo $row['social_profile']; ?>" target='_blank'>
                                            <div class="icon-<?php echo $row['social_icon']['value']; ?>--d"></div>
                                        </a>
                                    <?php
                                    } ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <div class="search">
                            <span>Search</span>
                            <?php echo get_search_form(); ?>
                        </div>

                    </div>

                    <div class="categories mt-7">
                        <div class="titleSection">
                            <!-- Featured Posts -->
                            <?php get_template_part(
                                'template-parts/title',
                                'section',
                                array(
                                    'title' => 'CATEGORIES',
                                    'links' => false
                                )
                            ); ?>
                        </div>
                        <div class="cats mt-4">
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
                            } ?>
                        </div>
                    </div>

                    <?php
                    if (have_rows('logos_accreditations', 'option')) : ?>

                        <div class="titleSection mt-8">
                            <!-- Featured Posts -->
                            <?php get_template_part(
                                'template-parts/title',
                                'section',
                                array(
                                    'title' => 'ACCREDITATIONS',
                                    'links' => false
                                )
                            ); ?>
                        </div>

                        <div class="logos grid grid-cols-2 gap-4 mt-10">
                            <?php while (have_rows('logos_accreditations', 'option')) : the_row(); ?>
                                <div class="item__logo flex items-center">
                                    <?php $logo = get_sub_field('logo', 'option'); ?>

                                    <?php
                                    fps_get_Image($logo);
                                    ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>


        </div>
    </div>
</div>
<?php wp_reset_query(); ?>
</div>

<?php
get_footer();
