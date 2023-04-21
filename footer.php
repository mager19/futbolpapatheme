<?php

/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package baseTheme
 */
?>

</div>
<!--/ Content Page -->

<?php
if (!is_404()) {
    if (!is_home()) {
        get_template_part('template-parts/cta', 'footer');
    }
}
?>

<!-- Footer -->
<footer class="site-footer">
    <div class="container mx-auto py-8">
        <div class="site__footer__content flex flex-wrap px-4 justify-center lg:justify-start">
            <div class="site__footer__logo w-full md:w-3/12 text-center lg:text-left flex justify-center">
                <a href="<?php echo esc_url(get_bloginfo('url')); ?>">
                    <?php
                    $GETlogo = get_field('logo_site', 'option');
                    if ($GETlogo) {
                        fps_get_Image($GETlogo);
                    } else {
                        echo "<h3 class='mb-0'>Logo Brand</h3>";
                    } ?>
                </a>
            </div>

            <div class="site-footer__top w-full md:w-9/12">
                <?php
                $rows = get_field('social_icons', 'option');
                if ($rows) { ?>
                    <div class="social__icons flex justify-center lg:justify-start items-center gap-x-2 my-4">
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
                <!-- Footer Menu -->
                <div class="footer-menu">
                    <?php if (has_nav_menu('menu-2')) {
                        wp_nav_menu(array('theme_location' => 'menu-2'));
                    } ?>
                </div>
                <!--/Footer Menu-->

            </div>

            <div class="site-footer__bottom w-full md:mt-2">

                <!-- copyright -->
                <div class="copyright text-center md:text-right lg:text-left">
                    <?php the_field('copyright', 'option'); ?>
                </div>
                <!--/ copyright -->

            </div>
        </div>

    </div>
</footer>
<!--/ Footer -->

<div id="modal-custom-1b" class="modalMenu menuModal">
    <div class="modal__header">
        <button data-iziModal-close class="icon-close">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L15 15M1 15L15 1" stroke="#A9E1D3" stroke-width="2" />
            </svg>
        </button>
    </div>

    <div class="modal__content relative">
        <?php
        $GETlogo = get_field('logo_site', 'option'); ?>
        <a href="<?php echo esc_url(get_bloginfo('url')); ?>">
            <figure>
                <?php if ($GETlogo) {
                    fps_get_Image($GETlogo);
                }  ?>
            </figure>
        </a>
        <div class="menuMobileModal flex">
            <!--Menu-->
            <?php
            if (has_nav_menu('menu-1')) { ?>

                <?php
                wp_nav_menu(array('theme_location' => 'menu-1'));
                ?>

            <?php
            }
            ?>
            <!--/Menu-->
        </div>
    </div>

</div>

<!-- bottom bar -->
<?php get_template_part('template-parts/bottom', 'bar'); ?>
<?php wp_footer(); ?>
</body>

</html>