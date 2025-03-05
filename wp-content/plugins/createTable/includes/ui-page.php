<?php
if (!defined('ABSPATH')) {
    exit;
}

function student_table_display_page() {
    ?>
    <div class="wrap">
        <h2>Student List</h2>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th class="table-h" width="10%">S.N.</th>
                    <th width="30%">Student Name</th>
                    <th width="20%">Branch</th>
                    <th width="30%">College</th>
                    <th width="20%">Marks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>Computer Science</td>
                    <td>XYZ University</td>
                    <td>85%</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>Electronics</td>
                    <td>ABC College</td>
                    <td>90%</td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}
