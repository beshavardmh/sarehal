<?php
$current_url = add_query_arg('page', 'sarehal-transactions', admin_url('admin.php'));
$db = new SarehalDbManager();

?>
<div class="wrap">
    <h2 class="fw-bold">تراکنش ها</h2>

    <?php do_action('admin_notices'); ?>

    <div class="table-responsive">
        <table class="wp-list-table widefat striped vertical-middle">
            <thead>
            <tr>
                <th>شماره همراه کاربر</th>
                <th>مبلغ</th>
                <th>وضعیت</th>
                <th>شرح وضعیت</th>
                <th>کد پیگیری</th>
                <th>نام اشتراک</th>
                <th>تخفیف</th>
                <th>شماره کارت کاربر</th>
                <th>تاریخ تراکنش</th>
            </tr>
            </thead>
            <tbody>
            <?php
            get_template_part('inc/payment');
            $payment = new SarehalPayment();

            $total = $db->get_count($db->table_transactions);
            $post_per_page = 20;
            $page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
            $offset = ( $page * $post_per_page ) - $post_per_page;

            $rows = $db->get_results($db->table_transactions, 'DESC', "LIMIT $post_per_page OFFSET $offset");
            if ($rows): ?>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?php echo $db->get_row($db->table_users, $row->user_id)->phone; ?></td>
                        <td><?php echo number_format(substr($row->amount, 0, -1)) . ' تومان'; ?></td>
                        <td><?php echo $row->paid ? '<span class="text-green">پرداخت شده</span>' : '<span class="text-red">پرداخت نشده</span>'; ?></td>
                        <td><?php echo $payment->payment_messages[$row->status_code]; ?></td>
                        <td><?php echo $payment->payment_messages[$row->ref_code]; ?></td>
                        <td><?php echo $db->get_row($db->table_plans, $row->plan_id)->name; ?></td>
                        <td><?php echo $row->has_discount ? number_format($db->get_row($db->table_discounts, $row->discount_id)->price) . ' تومان' : 'بدون تخفیف'; ?></td>
                        <td><?php echo $row->card; ?></td>
                        <td><?php echo parsidate('H:i - Y/m/d', $row->date, 'per'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9">هیچ تراکنشی پیدا نشد!</td>
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