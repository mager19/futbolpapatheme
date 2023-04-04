<?php
function baseTheme_scripts()
{
    wp_enqueue_style('bookantiqua', 'https://fonts.cdnfonts.com/css/book-antiqua?styles=15621,29960');
    wp_enqueue_style('manrope', 'https://fonts.googleapis.com/css2?family=Manrope:wght@400;800&display=swap');
    wp_enqueue_style('google-font-icon', 'https://fonts.googleapis.com/icon?family=Material+Icons');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/dist/css/app.css', array(), '1.1', 'all');
    wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/assets/dist/js/app.js', array('jquery'), '0.1', true);
}
add_action('wp_enqueue_scripts', 'baseTheme_scripts');
