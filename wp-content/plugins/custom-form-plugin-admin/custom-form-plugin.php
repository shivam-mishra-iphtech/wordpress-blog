<?php
/**
 * Plugin Name: Custom Form Plugin
 * Plugin URI: https://yourwebsite.com
 * Description: A simple plugin to create a form and insert data into the database.
 * Version: 1.1
 * Author: Your Name
 * Author URI: https://yourwebsite.com
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Include necessary files
include_once plugin_dir_path(__FILE__) . 'includes/database.php';
include_once plugin_dir_path(__FILE__) . 'includes/form-handler.php';
include_once plugin_dir_path(__FILE__) . 'includes/display-data.php';

// Create database table on activation
function custom_form_create_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_form_entries';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'custom_form_create_table');

// Add admin menu for plugin
function custom_form_admin_menu() {
    add_menu_page(
        'Custom Form Entries',   // Page title
        'Form Entries',          // Menu title
        'manage_options',        // Capability
        'custom-form-entries',   // Menu slug
        'custom_form_display_admin_page', // Callback function
        'dashicons-feedback',    // Icon
        25                       // Position
    );
}
add_action('admin_menu', 'custom_form_admin_menu');

// Display entries in the admin menu page
function custom_form_display_admin_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_form_entries';
    
    $results = $wpdb->get_results("SELECT * FROM $table_name ORDER BY created_at DESC");

    echo '<div class="wrap"><h1>Submitted Form Entries</h1>';
    
    if (empty($results)) {
        echo '<p>No entries found.</p>';
        return;
    }

    echo '<table class="widefat fixed" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>';
    
    foreach ($results as $row) {
        echo '<tr>
                <td>' . esc_html($row->id) . '</td>
                <td>' . esc_html($row->name) . '</td>
                <td>' . esc_html($row->email) . '</td>
                <td>' . esc_html($row->message) . '</td>
                <td>' . esc_html($row->created_at) . '</td>
              </tr>';
    }

    echo '</tbody></table></div>';
}
