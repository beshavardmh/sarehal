<?php
$current_url = add_query_arg('page', 'sarehal-plans-durations', admin_url('admin.php'));
$db = new SarehalDbManager();
?>
<?php if (isset($_GET['edit-plan-duration']) && intval($_GET['edit-plan-duration'])): ?>

    <?php
    $row = $db->get_row($db->table_plans_durations, $_GET['edit-plan-duration']);

    if ($row): ?>
        <div class="wrap">
            <h1 class="fw-bold">ویرایش مدت اشتراک <?php echo $row->name; ?></h1>
            <form action="<?php echo $current_url; ?>" method="post">
                <div class="mt-4">
                    <label for="plan-name" class="d-block mb-1 fw-bold">نام مدت اشتراک</label>
                    <input type="text" name="name" value="<?php echo $row->name; ?>" id="plan-name" required
                           class="min-w-240">
                </div>

                <div class="mt-4">
                    <label for="plan-duration" class="d-block mb-1 fw-bold">مدت اشتراک</label>
                    <input type="text" name="duration" value="<?php echo $row->duration; ?>" id="plan-duration" required
                           class="just_num min-w-240"> روز
                </div>

                <div class="mt-5">
                    <input type="hidden" name="plan_duration_id" value="<?php echo $_GET['edit-plan-duration']; ?>">
                    <button type="submit" name="modify-plan-duration" class="button button-primary fs-14">ذخیره تغییرات</button>
                </div>
            </form>
        </div>
    <?php else: ?>
        <div class="wrap">
            <p>مدت اشتراک مورد نظر پیدا نشد!</p>
        </div>
    <?php endif; ?>

<?php elseif (isset($_GET['add-plan-duration'])): ?>

    <div class="wrap">
        <h1 class="fw-bold">افزودن مدت اشتراک جدید</h1>
        <form action="<?php echo $current_url; ?>" method="post">
            <div class="mt-4">
                <label for="plan-name" class="d-block mb-1 fw-bold">نام مدت اشتراک</label>
                <input type="text" name="name" id="plan-name" required class="min-w-240">
            </div>

            <div class="mt-4">
                <label for="plan-duration" class="d-block mb-1 fw-bold">مدت اشتراک</label>
                <input type="text" name="duration" id="plan-duration" required
                       class="just_num min-w-240"> روز
            </div>

            <div class="mt-5">
                <button type="submit" name="new-plan-duration" class="button button-primary fs-14">ذخیره تغییرات</button>
            </div>
        </form>
    </div>

<?php else: ?>

    <?php if (isset($_GET['delete-plan-duration']) && intval($_GET['delete-plan-duration'])) {
        $row = $db->delete($db->table_plans_durations, $_GET['delete-plan-duration']);
        if ($row) {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-success is-dismissible">
             <p>مدت اشتراک مورد نظر با موفقیت حذف شد!</p>
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

    <?php if (isset($_POST['new-plan-duration'])) {
        $name = sanitize_text_field($_POST['name']);
        $duration = $_POST['duration'];

        $row = $db->insert($db->table_plans_durations, compact('name', 'duration'));

        if ($row) {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-success is-dismissible">
             <p>مدت اشتراک مورد نظر با موفقیت ایجاد شد!</p>
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

    <?php if (isset($_POST['modify-plan-duration'])) {
        $name = sanitize_text_field($_POST['name']);
        $duration = $_POST['duration'];
        $plan_duration_id = $_POST['plan_duration_id'];

        $row = $db->update($db->table_plans_durations, compact('name', 'duration'), $plan_duration_id);

        if ($row) {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-success is-dismissible">
             <p>مدت اشتراک مورد نظر با موفقیت بروز رسانی شد!</p>
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
        <h2 class="fw-bold">مدت اشتراک ها</h2>

        <?php do_action('admin_notices'); ?>

        <div class="mb-3">
            <a href="<?php echo add_query_arg('add-plan-duration', '1', $current_url); ?>"
               class="button button-primary fs-14">افزودن
                مدت اشتراک
                جدید</a>
        </div>

        <div class="table-responsive">
            <table class="wp-list-table widefat striped vertical-middle">
                <thead>
                <tr>
                    <th>نام مدت اشتراک</th>
                    <th>مدت اشتراک</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $rows = $db->get_results($db->table_plans_durations);
                if (count($rows)): ?>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->duration . ' روز' ?></td>
                            <td>
                                <div class="d-flex ai-center">
                                    <a onclick="return confirm('از حذف این مدت اشتراک اطمینان دارید؟')"
                                       href="<?php echo add_query_arg('delete-plan-duration', $row->ID, $current_url); ?>"
                                       class="button button-red dashicons-trash font-dashicon fs-20 lh-1_6 ml-3"></a>
                                    <a href="<?php echo add_query_arg('edit-plan-duration', $row->ID, $current_url); ?>"
                                       class="button button-orange dashicons-edit font-dashicon fs-20 lh-1_6"></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">مدت اشتراکی پیدا نشد!</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

<?php endif; ?>