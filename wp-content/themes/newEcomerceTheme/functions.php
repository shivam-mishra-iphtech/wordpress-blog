<?php

function newEcomerceTheme_child_enqueue_styles() {
    // Load parent theme stylesheet
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'newEcomerceTheme_child_enqueue_styles');



function mytheme_setup() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'mytheme'),
    ));
}
add_action('after_setup_theme', 'mytheme_setup');

function mytheme_enqueue_scripts() {
    // Enqueue the main stylesheet
    wp_enqueue_style('main-style', get_stylesheet_uri());

    // Enqueue an additional custom stylesheet
    wp_enqueue_style(
        'newEcommerceTheme', // Unique handle
        get_template_directory_uri() . '/assets/css/custom-style.css', // Path to CSS file
        array('main-style'), // Dependencies (loads after main-style)
        '1.0.0', // Version
        'all' // Media type
    );
}



?>
