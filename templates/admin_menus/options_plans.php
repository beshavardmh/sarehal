<?php
$current_url = add_query_arg('page', 'sarehal-plans-options', admin_url('admin.php'));
$db = new SarehalDbManager();
?>
<?php if (isset($_GET['edit-plan-option']) && intval($_GET['edit-plan-option'])): ?>

    <?php
    $row = $db->get_row($db->table_plans_options, $_GET['edit-plan-option']);

    if ($row): ?>
        <div class="wrap">
            <h1 class="fw-bold">ویرایش گزینه <?php echo $row->name; ?></h1>
            <form action="<?php echo $current_url; ?>" method="post">
                <div class="mt-4">
                    <label for="plan-name" class="d-block mb-1 fw-bold">نام گزینه</label>
                    <input type="text" name="name" value="<?php echo $row->name; ?>" id="plan-name" required
                           class="min-w-240">
                </div>

                <div class="mt-4">
                    <label for="plan-duration" class="d-block mb-1 fw-bold">نمایش در جدول پلن ها</label>

                    <div class="d-flex flex-wrap ai-center mx-n3 mt-3">
                        <div class="d-flex mx-3 ai-center">
                            <span>بله</span>
                            <input type="radio" name="show_on_plans_page" <?php echo $row->show_on_plans_page ? 'checked' : ''; ?> value="1" class="my-0 mr-1">
                        </div>

                        <div class="d-flex mx-3 ai-center">
                            <span>خیر</span>
                            <input type="radio" name="show_on_plans_page" <?php echo !$row->show_on_plans_page ? 'checked' : ''; ?> value="0" class="my-0 mr-1">
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <input type="hidden" name="plan_option_id" value="<?php echo $_GET['edit-plan-option']; ?>">
                    <button type="submit" name="modify-plan-option" class="button button-primary fs-14">ذخیره تغییرات</button>
                </div>
            </form>
        </div>
    <?php else: ?>
        <div class="wrap">
            <p>گزینه مورد نظر پیدا نشد!</p>
        </div>
    <?php endif; ?>

<?php elseif (isset($_GET['add-plan-option'])): ?>

    <div class="wrap">
        <h1 class="fw-bold">افزودن گزینه جدید</h1>
        <form action="<?php echo $current_url; ?>" method="post">
            <div class="mt-4">
                <label for="plan-name" class="d-block mb-1 fw-bold">نام گزینه</label>
                <input type="text" name="name" id="plan-name" required class="min-w-240">
            </div>

            <div class="mt-4">
                <label for="plan-duration" class="d-block mb-1 fw-bold">نمایش در جدول پلن ها</label>

                <div class="d-flex flex-wrap ai-center mx-n3 mt-3">
                    <div class="d-flex mx-3 ai-center">
                        <span>بله</span>
                        <input type="radio" name="show_on_plans_page" checked value="1" class="my-0 mr-1">
                    </div>

                    <div class="d-flex mx-3 ai-center">
                        <span>خیر</span>
                        <input type="radio" name="show_on_plans_page" value="0" class="my-0 mr-1">
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <button type="submit" name="new-plan-option" class="button button-primary fs-14">ذخیره تغییرات</button>
            </div>
        </form>
    </div>

<?php else: ?>

    <?php if (isset($_GET['delete-plan-option']) && intval($_GET['delete-plan-option'])) {
        $row = $db->delete($db->table_plans_options, $_GET['delete-plan-option']);
        if ($row) {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-success is-dismissible">
             <p>گزینه مورد نظر با موفقیت حذف شد!</p>
         </div>';
            });
        } else {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-error is-dismissible">
             <p>عملیات با شکست مواجه شد!</p>
         </div>';
            });
        }
    } ?>

    <?php if (isset($_POST['new-plan-option'])) {
        $name = sanitize_text_field($_POST['name']);
        $show_on_plans_page = $_POST['show_on_plans_page'];

        $row = $db->insert($db->table_plans_options, compact('name', 'show_on_plans_page'));

        if ($row) {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-success is-dismissible">
             <p>گزینه مورد نظر با موفقیت ایجاد شد!</p>
         </div>';
            });
        } else {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-error is-dismissible">
             <p>عملیات با شکست مواجه شد!</p>
         </div>';
            });
        }
    } ?>

    <?php if (isset($_POST['modify-plan-option'])) {
        $name = sanitize_text_field($_POST['name']);
        $show_on_plans_page = $_POST['show_on_plans_page'];
        $plan_option_id = $_POST['plan_option_id'];

        $row = $db->update($db->table_plans_options, compact('name', 'show_on_plans_page'), $plan_option_id);

        if ($row) {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-success is-dismissible">
             <p>گزینه مورد نظر با موفقیت بروز رسانی شد!</p>
         </div>';
            });
        } else {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-error is-dismissible">
             <p>عملیات با شکست مواجه شد!</p>
         </div>';
            });
        }
    } ?>

    <div class="wrap">
        <h2 class="fw-bold">گزینه های اشتراک ها</h2>

        <?php do_action('admin_notices'); ?>

        <div class="mb-3">
            <a href="<?php echo add_query_arg('add-plan-option', '1', $current_url); ?>"
               class="button button-primary fs-14">افزودن
                گزینه
                جدید</a>
        </div>

        <div class="table-responsive">
            <table class="wp-list-table widefat striped vertical-middle">
                <thead>
                <tr>
                    <th>نام گزینه</th>
                    <th>نمایش در جدول پلن ها</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $rows = $db->get_results($db->table_plans_options);
                if (count($rows)): ?>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->show_on_plans_page ? 'بله' : 'خیر'; ?></td>
                            <td>
                                <div class="d-flex ai-center">
                                    <a onclick="return confirm('از حذف این گزینه اطمینان دارید؟')"
                                       href="<?php echo add_query_arg('delete-plan-option', $row->ID, $current_url); ?>"
                                       class="button button-red dashicons-trash font-dashicon fs-20 lh-1_6 ml-3"></a>
                                    <a href="<?php echo add_query_arg('edit-plan-option', $row->ID, $current_url); ?>"
                                       class="button button-orange dashicons-edit font-dashicon fs-20 lh-1_6"></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">گزینه ای پیدا نشد!</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

<?php endif; ?>