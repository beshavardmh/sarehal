<?php
$current_url = add_query_arg('page', 'sarehal-customers', admin_url('admin.php'));
$db = new SarehalDbManager();

?>
<div class="wrap">
    <h2 class="fw-bold">مشتری‌ ها</h2>

    <div class="table-responsive">
        <table class="wp-list-table widefat striped vertical-middle">
            <thead>
            <tr>
                <th>نام و نام خانوادگی</th>
                <th>شماره تلفن</th>
                <th>سن - جنسیت</th>
                <th>قد(cm) - وزن(kg)</th>
                <th>بیماری‌ها</th>
                <th>فعال بودن پیامک</th>
                <th>تاریخ ثبت نام</th>
                <th>تاریخ تبدیل</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $post_per_page = 10;
            $page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
            $offset = ( $page * $post_per_page ) - $post_per_page;

            $rows = $db->select("SELECT $db->table_users.*, $db->table_transactions.date AS `conversion_date` FROM $db->table_users INNER JOIN $db->table_transactions
    ON $db->table_users.ID = $db->table_transactions.user_id AND $db->table_transactions.paid = 1
ORDER BY ID DESC LIMIT $post_per_page OFFSET $offset");

            $total = count($rows);

            if ($rows): ?>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?php echo $row->fullname; ?></td>
                        <td><?php echo $row->phone; ?></td>
                        <td><?php
                            $gender = ($row->gender == 'female') ? 'خانم' : 'آقا';
                            echo $row->age . ' - ' . $gender;
                            ?></td>
                        <td><?php echo $row->height . ' - ' . $row->weight; ?></td>
                        <td><?php echo implode(' - ', json_decode(stripslashes($row->diseases))); ?></td>
                        <td><?php echo $row->sms_adv ? 'بله' : 'خیر'; ?></td>
                        <td><?php echo parsidate('H:i - Y/m/d', $row->date, 'per'); ?></td>
                        <td><?php echo parsidate('H:i - Y/m/d', $row->conversion_date, 'per'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">هیچ مشتری‌ای پیدا نشد!</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php
    echo '<div class="pagination">';
    echo paginate_links( array(
        'base' => add_query_arg( 'cpage', '%#%' ),
        'format' => '',
        'prev_text' => __('&laquo;'),
        'next_text' => __('&raquo;'),
        'total' => ceil($total / $post_per_page),
        'current' => $page,
        'type' => 'list'
    ));
    echo '</div>';
    ?>

    <style>
        .pagination ul{
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }
        .pagination ul li{
            font-size: 14px;
            margin: 5px 8px;
        }
    </style>

</div>