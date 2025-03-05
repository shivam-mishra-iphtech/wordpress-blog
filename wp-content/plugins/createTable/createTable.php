<?php
/**
 * Plugin Name: Student Table Manager
 * Plugin URI: https://example.com
 * Description: A WordPress plugin to manage student data in a table.
 * Version: 1.0
 * Author: Your Name
 * Author URI: https://example.com
 * License: GPL2
 */

if (!defined('ABSPATH')) {
    exit;
}

// Define Plugin Directory
define('STUDENT_TABLE_PLUGIN_DIR', plugin_dir_path(__FILE__));

// Include the UI Page
require_once STUDENT_TABLE_PLUGIN_DIR . 'includes/ui-page.php';

// Enqueue Styles and Scripts
function student_table_enqueue_assets() {
    wp_enqueue_style('student-table-style', plugin_dir_url(__FILE__) . 'assets/admin-style.css');
    wp_enqueue_script('student-table-script', plugin_dir_url(__FILE__) . 'assets/admin-script.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'student_table_enqueue_assets');

// Create Admin Menu Page
function student_table_menu_page() {
    add_menu_page(
        'Student Table page',
        'Student Table',
        'manage_options',
        'student-table',
        'student_table_display_page',
        'dashicons-welcome-learn-more',
        20
    );
}
add_action('admin_menu', 'student_table_menu_page');
