<?php

/**
 * TEMPLATE NAME: Join template
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
                    <?php the_field('join_page_title'); ?>
                </h1>
                <?php the_field('join_page_intro'); ?>


            </div>

            <?php
            $images = get_field('join_page_slide');
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

    <?php
    if (have_rows('prices')) : ?>

        <div class="prices__container my-4 lg:my-12">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 px-4 mt-8 lg:mt-12">
                    <?php $counter = 1; ?>
                    <?php while (have_rows('prices')) : the_row(); ?>

                        <div class="price__item price__item--<?php echo $counter; ?>">
                            <span class="nameprice">
                                <?php the_sub_field('title_membership'); ?>
                            </span>

                            <h5 class="price">
                                <?php the_sub_field('price_membership'); ?>
                            </h5>

                            <?php the_sub_field('description'); ?>

                            <?php if (have_rows('features')) : ?>
                                <ul>
                                    <?php $list = 0; ?>
                                    <?php while (have_rows('features')) : the_row(); ?>
                                        <?php if ($list < 6) { ?>
                                            <li>
                                                <?php the_sub_field('featured'); ?>
                                            </li>
                                        <?php }
                                        $list++;
                                        ?>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>

                            <?php $button = get_sub_field('button');
                            if ($button) { ?>
                                <a class='btn btn__primary ' href="<?php echo $button['url']; ?>" data-izimodal-open="#modal-custom-<?php echo $counter; ?>c">
                                    <?php echo $button['title']; ?>
                                </a>
                            <?php
                            }
                            ?>

                        </div>

                        <!-- Modal -->

                        <div id="modal-custom-<?php echo $counter; ?>c" class="modalMenu joinModal">
                            <div class="modal__header">
                                <button data-iziModal-close class="icon-close">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L15 15M1 15L15 1" stroke="#A9E1D3" stroke-width="2" />
                                    </svg>
                                </button>

                                <div class="titleModal">
                                    <h3 class="flex gap-2 items-center text-secondary mb-0">
                                        <svg width="32px" height="32px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--emojione" preserveAspectRatio="xMidYMid meet">
                                            <circle cx="32" cy="32" fill="#ffffff" r="29.3"></circle>
                                            <path d="M61.9 32c0-.7.2-10.9-5.8-17.5c-.3-.6-1.5-3-5.6-5.9C47.8 6.5 45 5 44.7 4.8C44.4 4.6 39.4 2 33.4 2c-.5 0-.9 0-1.4.1c-4.6-.1-8.8 1.1-11.9 2.5c-3.2 1.4-5.3 2.8-5.5 3c-3.4 1.9-9.9 9.5-10.4 13.6c-2.1 2.6-3.8 14.5 0 21.7c2.7 10 12.7 15 13.5 15.4c.5.3 5.9 3.7 12.6 3.7h.9c.6.1 1.1.1 1.7.1c7.2 0 18-5.1 20.2-9.1c6.2-4.6 9.4-16.2 8.8-21M17.8 47.1c-2.9-4.6-4.5-10.7-4.9-12.1c.9-1.4 5.4-8 7.9-10c1.4.3 7.5 1.4 13.2 2.4c.7 1.9 3.9 10 4.8 13.2c-1 1.2-4.9 5.7-8.7 9.2c-4.1.1-11-2.3-12.3-2.7m36-32.5c0 .4-.1 2-.9 3.9c-1.5-.8-5.3-2.4-10.6-2.7c-.8-1.2-3.8-5.3-8.5-8.1c.6-1.3 1.5-2.8 2.1-3.3c.2 0 .4-.1.8-.1c2.5 0 6.9 1.7 7.3 1.8c.4.2 8.3 4.4 9.8 8.5M11.8 34c-3.4-.6-5.5-1.6-6.1-2c-1.3-4.6-.2-9.6-.1-10.3c1.3-2.2 4.8-8 7.2-9.1c2.4-.5 5.5.1 6.7.4c-.1 1.6-.3 6.1.3 10.9c-2.6 2.2-6.9 8.5-8 10.1M31.7 3.5c.8.1 1.9.2 2.7.5c-.8 1-1.6 2.5-1.9 3.3c-1.6.3-7.5 1.4-12.2 4.4c-.9-.2-3.8-.9-6.5-.7c.7-1.3 1.7-2.2 1.8-2.3c.3-.3 7.4-5.3 16.1-5.2m19.1 38.1c-1.2 0-5.7-.3-10.6-1.5c-.9-3.3-4.1-11.4-4.8-13.3c3.1-4.4 6.1-8.5 6.9-9.7c5.7.4 9.7 2.5 10.5 2.9c3.3 5.3 4 10.7 4.1 11.6c-1.8 5.5-5.2 9.2-6.1 10M3.7 28.5c.1 1.3.3 2.6.7 3.9c-.3.9-.6 1.8-.7 2.7c-.3-2.3-.3-4.6 0-6.6M18.5 57l-.4.6l.4-.6c-2.5-1.2-4.4-4-5.2-5.1c1.5-1.5 3.4-2.9 4.1-3.4c1.6.6 8.3 2.8 12.6 2.8c.7 1 3.1 4 6 6.4c-1.8 1.8-4.4 2.6-4.9 2.8c-6.8.2-12.6-3.5-12.6-3.5m16.3 3.4c.9-.5 1.9-1.2 2.7-2.1c1.3-.2 6.9-1.1 11.9-4.8c.3 0 .9.1 1.5.1c-3.1 2.9-10.5 6.2-16.1 6.8M50.2 52c1.8-4.7 1.7-8.3 1.6-9.4c1-1 4.4-4.6 6.3-10.1c1 .2 1.7.4 2 .6c.1.4.3 1.3.2 2.7c-.8 5-3.4 12.6-8.1 15.9c-.5.3-1.3.4-2 .3" fill="#4a4e51"></path>
                                        </svg>
                                        JOIN FUTBOL PAPA®
                                    </h3>
                                </div>
                            </div>

                            <div class="modal__content relative">
                                <span class="nameprice my-4 flex title--6 font-bold">
                                    <?php the_sub_field('title_membership'); ?>
                                </span>

                                <?php the_sub_field('description'); ?>

                                <div class="features__modal flex flex-wrap lg:flex-nowrap gap-2 items-center">
                                    <div class="left w-full lg:w-7/12">
                                        <?php if (have_rows('features')) : ?>
                                            <ul>

                                                <?php while (have_rows('features')) : the_row(); ?>

                                                    <li>
                                                        <?php the_sub_field('featured'); ?>
                                                    </li>

                                                <?php endwhile; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>

                                    <div class="right w-full lg:w-5/12 flex flex-col items-center">
                                        <h5 class="price text-white title--4 lg:title--3 text-center">
                                            <?php the_sub_field('price_membership'); ?>
                                        </h5>
                                        <?php $button = get_sub_field('button');
                                        if ($button) { ?>
                                            <a class='btn btn__primary ' href="<?php echo $button['url']; ?>" >
                                                <?php echo $button['title']; ?>
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Todo: Falta el link del producto -->
                        <?php $counter++; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="container mx-auto mt-4 lg:mt-10 px-4">
        <div class="flex">
            <div class="w-full lg:w-10/12 mx-auto">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

    <?php
    get_footer();
