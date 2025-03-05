<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_separate', trailingslashit( get_stylesheet_directory_uri() ) . 'ctc-style.css', array( 'parent-style','parent-style','main-style','newEcommerceTheme' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

$show_albums = get_posts( array(
    'posts_per_page' => 10,
    'orderby'        => 'rand',
    'post_type'      => 'post',
    'genre'          => 'jazz',
    'post_status'    => 'publish'
) );

// echo "<pre style='width:800px; padding:300px;'>";
// print_r($show_albums);
// echo "</pre>";

function add_custom_menu_link($items, $args) {
    // Define the correct URL using get_template_directory_uri()
    $custom_link = '<li class="menu-item"><a href="' . get_template_directory_uri() . '/pattern/studentList.php">Student</a></li>';

    // Append the new menu item
    return $items . $custom_link;
}
add_filter('wp_nav_menu_items', 'add_custom_menu_link', 10, 2);

$api_url = get_site_url() . '/wp-json/wp/v2/pages';
$response = wp_remote_get($api_url);
// echo "<pre style='width:800px; padding:300px;'>";
// print_r($response);
// echo "</pre>";
// Check if the request was successful
if (is_wp_error($response)) {
    echo 'Error fetching pages: ' . $response->get_error_message();
    return;
}

$pages = json_decode(wp_remote_retrieve_body($response), true);



// Check if $pages is a valid array before looping
if (!is_array($pages)) {
    echo 'No pages found or API returned an invalid response.';
    return;
}

echo '<ul>';
foreach ($pages as $page) {
    echo '<li><a href="' . esc_url($page['link']) . '">' . esc_html($page['title']['rendered']) . '</a></li>';
}
echo '</ul>';

?>