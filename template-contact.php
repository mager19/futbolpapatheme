<?php

/**
 * TEMPLATE NAME: Contact template
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
                    <?php the_field('contact_page_title'); ?>
                </h1>
                <?php the_field('contact_page_intro'); ?>

                <?php
                $contactinfo = get_field('contact_information');

                if ($contactinfo) { ?>
                    <div class="contact__info">
                        <?php echo $contactinfo; ?>
                    </div>
                <?php
                }
                ?>

                <?php
                $rows = get_field('social_icons', 'option');
                if ($rows) { ?>
                    <div class="social__icons flex justify-center lg:justify-start items-center gap-x-2">
                        <?php
                        foreach ($rows as $row) { ?>
                            <a href="<?php echo $row['social_profile']; ?>" target='_blank'>
                                <div class="icon-<?php echo $row['social_icon']['value']; ?>--d"></div>
                            </a>
                        <?php
                        } ?>
                    </div>
                <?php
                }
                ?>
            </div>

            <?php
            $images = get_field('contact_page_slide');
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

    <div class="container mx-auto mt-4 lg:mt-10 px-4">
        <div class="flex">
            <div class="w-full lg:w-10/12 mx-auto">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

    <?php
    get_footer();
