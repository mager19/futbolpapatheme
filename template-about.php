<?php

/**
 * TEMPLATE NAME: About template
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

<div class="hero__about__page">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 px-4 md:px-0 md:mt-5 gap-8 lg:mt-10">
            <div class="hero__about--left">
                <h1 class="title">
                    <?php the_field('about_page_title'); ?>
                </h1>
                <?php the_field('about_page_intro'); ?>

                <?php
                if (have_rows('logos_accreditations', 'option')) : ?>

                    <div class="logos grid grid-cols-3 gap-4">
                        <?php while (have_rows('logos_accreditations', 'option')) : the_row(); ?>
                            <div class="item__logo">
                                <?php $logo = get_sub_field('logo', 'option'); ?>

                                <?php
                                fps_get_Image($logo);
                                ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php
            $images = get_field('about_page_slide');
            if ($images) : ?>
                <div class="hero__about--right">
                    <div class="slickDemo">
                        <?php foreach ($images as $image) { ?>
                            <div class="item">
                                <?php
                                fps_get_Image($image);
                                ?>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container mx-auto mt-4 lg:mt-10 px-4">
    <div class="flex">
        <div class="w-full lg:w-10/12 mx-auto">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php
get_footer();
