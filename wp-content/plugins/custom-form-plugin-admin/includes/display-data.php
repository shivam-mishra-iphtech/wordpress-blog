<?php
// Shortcode to display submitted form data
function custom_form_display_data() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_form_entries';
    
    $results = $wpdb->get_results("SELECT * FROM $table_name ORDER BY created_at DESC");

    if (empty($results)) {
        return '<p>No entries found.</p>';
    }

    ob_start();
    ?>
    <h1>New Student List </h1>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Date</th>
        </tr>
        <?php foreach ($results as $row) : ?>
            <tr>
                <td><?php echo esc_html($row->id); ?></td>
                <td><?php echo esc_html($row->name); ?></td>
                <td><?php echo esc_html($row->email); ?></td>
                <td><?php echo esc_html($row->message); ?></td>
                <td><?php echo esc_html($row->created_at); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_form_data', 'custom_form_display_data');
