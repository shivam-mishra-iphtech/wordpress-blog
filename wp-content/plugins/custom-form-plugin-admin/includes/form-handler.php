<?php
// Handle form submission
function custom_form_handle_submission() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        global $wpdb;
        $table_name = $wpdb->prefix . 'custom_form_entries';

        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_textarea_field($_POST['message']);

        $wpdb->insert(
            $table_name,
            ['name' => $name, 'email' => $email, 'message' => $message],
            ['%s', '%s', '%s']
        );
    }
    wp_redirect(home_url());
    exit;
}
add_action('admin_post_nopriv_custom_form_submit', 'custom_form_handle_submission');
add_action('admin_post_custom_form_submit', 'custom_form_handle_submission');
