<?php
$current_url = add_query_arg('page', 'sarehal-leads', admin_url('admin.php'));
$db = new SarehalDbManager();

if (isset($_GET['delete-lead']) && intval($_GET['delete-lead'])) {
    $row = $db->delete($db->table_users, $_GET['delete-lead']);
    if ($row) {
        add_action('admin_notices', function () {
            echo '<div class="notice notice-success is-dismissible">
             <p>لید مورد نظر با موفقیت حذف شد!</p>
         </div>';
        });
    } else {
        add_action('admin_notices', function () {
            echo '<div class="notice notice-error is-dismissible">
             <p>عملیات با شکست مواجه شد!</p>
         </div>';
        });
    }
}
?>
<div class="wrap">
    <h2 class="fw-bold">لید ها</h2>

    <?php do_action('admin_notices'); ?>

    <div class="table-responsive">
        <table class="wp-list-table widefat striped vertical-middle">
            <thead>
            <tr>
                <th>نام و نام خانوادگی</th>
                <th>شماره تلفن</th>
                <th>ایمیل</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $total = $db->get_count($db->table_users);
            $post_per_page = 10;
            $page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
            $offset = ( $page * $post_per_page ) - $post_per_page;

            $rows = $db->get_results($db->table_users, 'DESC', "LIMIT $post_per_page OFFSET $offset");
            if ($rows): ?>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->phone; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td>
                            <a onclick="return confirm('از حذف این لید اطمینان دارید؟')"
                               href="<?php echo add_query_arg('delete-lead', $row->ID, $current_url); ?>"
                               class="button button-red dashicons-trash font-dashicon fs-20 lh-1_6"></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">هیچ لیدی پیدا نشد!</td>
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