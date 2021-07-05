<?php
$current_url = add_query_arg('page', 'sarehal-plans', admin_url('admin.php'));
$db = new SarehalDbManager();
?>
<?php if (isset($_GET['edit-plan']) && intval($_GET['edit-plan'])): ?>

    <?php
    $row = $db->get_row($db->table_plans, $_GET['edit-plan']);

    if ($row): ?>
        <div class="wrap">
            <h1 class="fw-bold">ویرایش اشتراک <?php echo $row->name; ?></h1>
            <form action="<?php echo $current_url; ?>" method="post">
                <div class="mt-4">
                    <label for="plan-name" class="d-block mb-1 fw-bold">نام اشتراک</label>
                    <input type="text" name="name" value="<?php echo $row->name; ?>" id="plan-name" required
                           class="min-w-240">
                </div>

                <div class="mt-4">
                    <label for="plan-duration" class="d-block mb-1 fw-bold">مدت اشتراک</label>
                    <select name="duration_id" id="plan-duration" required class="min-w-240">
                        <?php
                        $duration_rows = $db->get_results($db->table_plans_durations);
                        if ($duration_rows) {
                            foreach ($duration_rows as $duration_row) {
                                $checked = $duration_row->ID == $row->duration_id ? 'selected' : '' ;
                                echo "<option $checked value='$duration_row->ID'>$duration_row->name</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="mt-4">
                    <label for="plan-price" class="d-block mb-1 fw-bold">هزینه اشتراک</label>
                    <input type="text" name="price" value="<?php echo $row->price; ?>" id="plan-price" required
                           class="just_num min-w-240"> تومان
                </div>

                <div class="mt-4">
                    <label for="plan-lined-price" class="d-block mb-1 fw-bold">هزینه خط خورده</label>
                    <input type="text" name="lined-price" value="<?php echo $row->lined_price; ?>" id="plan-lined-price" class="just_num min-w-240"> تومان
                </div>

                <div class="mt-4">
                    <label for="plan-slug" class="d-block mb-1 fw-bold">اسلاگ (نامک)</label>
                    <input type="text" name="slug" value="<?php echo $row->slug; ?>" id="plan-slug" required
                           class="slug_input min-w-240">
                </div>

                <div class="mt-4">
                    <div class="d-flex ai-center">
                        <label for="plan-payable" class="fw-bold ml-2">قابل پرداخت</label>
                        <input type="checkbox" name="payable" <?php echo $row->payable ? 'checked' : ''; ?> value="1" id="plan-payable" class="my-0">
                    </div>
                </div>

                <div class="mt-4">
                    <label class="d-block mb-1 fw-bold">گزینه ها</label>

                    <?php
                    $options_rows = $db->get_results($db->table_plans_options);
                    $options = unserialize($row->options);
                    if ($options_rows) {
                        foreach ($options_rows as $option_row) {
                            ?>
                            <div class="d-flex flex-wrap ai-center mx-n3 mt-3">
                                <p class="mx-3 my-0 fs-14"><?php echo $option_row->name; ?></p>

                                <div class="d-flex mx-3 ai-center">
                                    <span>افزودن</span>
                                    <input type="checkbox"
                                           name="plan_options[<?php echo $option_row->ID; ?>][active]" <?php echo $options[$option_row->ID]['active'] ? 'checked' : ''; ?>
                                           value="1" class="my-0 mr-1">
                                </div>

                                <div class="d-flex mx-3 ai-center">
                                    <span>نمایش در CTA</span>
                                    <input type="checkbox" name="plan_options[<?php echo $option_row->ID; ?>][show_on_cta]" <?php echo $options[$option_row->ID]['show_on_cta'] ? 'checked' : ''; ?>
                                           value="1"
                                           class="show_on_cta my-0 mr-1">
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>

                <div class="mt-5">
                    <input type="hidden" name="plan_id" value="<?php echo $_GET['edit-plan']; ?>">
                    <button type="submit" name="modify-plan" class="button button-primary fs-14">ذخیره تغییرات</button>
                </div>
            </form>
        </div>
    <?php else: ?>
        <div class="wrap">
            <p>پلن مورد نظر پیدا نشد!</p>
        </div>
    <?php endif; ?>

<?php elseif (isset($_GET['add-plan'])): ?>

    <div class="wrap">
        <h1 class="fw-bold">افزودن اشتراک جدید</h1>
        <form action="<?php echo $current_url; ?>" method="post">
            <div class="mt-4">
                <label for="plan-name" class="d-block mb-1 fw-bold">نام اشتراک</label>
                <input type="text" name="name" id="plan-name" required class="min-w-240">
            </div>

            <div class="mt-4">
                <label for="plan-duration" class="d-block mb-1 fw-bold">مدت اشتراک</label>
                <select name="duration_id" id="plan-duration" required class="min-w-240">
                    <?php
                    $rows = $db->get_results($db->table_plans_durations);
                    if ($rows) {
                        foreach ($rows as $row) {
                            echo "<option value='$row->ID'>$row->name</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="mt-4">
                <label for="plan-price" class="d-block mb-1 fw-bold">هزینه اشتراک</label>
                <input type="text" name="price" id="plan-price" required class="just_num min-w-240"> تومان
            </div>

            <div class="mt-4">
                <label for="plan-lined-price" class="d-block mb-1 fw-bold">هزینه خط خورده</label>
                <input type="text" name="lined-price" id="plan-lined-price" class="just_num min-w-240"> تومان
            </div>

            <div class="mt-4">
                <label for="plan-slug" class="d-block mb-1 fw-bold">اسلاگ (نامک)</label>
                <input type="text" name="slug" id="plan-slug" required class="slug_input min-w-240">
            </div>

            <div class="mt-4">
                <div class="d-flex ai-center">
                    <label for="plan-payable" class="fw-bold ml-2">قابل پرداخت</label>
                    <input type="checkbox" name="payable" checked value="1" id="plan-payable" class="my-0">
                </div>
            </div>

            <div class="mt-4">
                <label class="d-block mb-1 fw-bold">گزینه ها</label>

                <?php
                $rows = $db->get_results($db->table_plans_options);
                if ($rows) {
                    foreach ($rows as $row) {
                        ?>
                        <div class="d-flex flex-wrap ai-center mx-n3 mt-3">
                            <p class="mx-3 my-0 fs-14"><?php echo $row->name; ?></p>

                            <div class="d-flex mx-3 ai-center">
                                <span>افزودن</span>
                                <input type="checkbox" name="plan_options[<?php echo $row->ID; ?>][active]" value="1"
                                       class="my-0 mr-1">
                            </div>

                            <div class="d-flex mx-3 ai-center">
                                <span>نمایش در CTA</span>
                                <input type="checkbox" name="plan_options[<?php echo $row->ID; ?>][show_on_cta]"
                                       value="1"
                                       class="show_on_cta my-0 mr-1">
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <div class="mt-5">
                <button type="submit" name="new-plan" class="button button-primary fs-14">ذخیره تغییرات</button>
            </div>
        </form>
    </div>

<?php else: ?>

    <?php if (isset($_GET['delete-plan']) && intval($_GET['delete-plan'])) {
        $row = $db->delete($db->table_plans, $_GET['delete-plan']);
        if ($row) {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-success is-dismissible">
             <p>اشتراک مورد نظر با موفقیت حذف شد!</p>
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

    <?php if (isset($_POST['new-plan'])) {
        $name = sanitize_text_field($_POST['name']);
        $price = sanitize_text_field($_POST['price']);
        $lined_price = sanitize_text_field($_POST['lined-price']);
        $duration_id = $_POST['duration_id'];
        $slug = sanitize_text_field($_POST['slug']);
        $options = serialize($_POST['plan_options']);
        $payable = $_POST['payable'];

        $row = $db->insert($db->table_plans, compact('name', 'price', 'duration_id', 'slug', 'options', 'payable', 'lined_price'));

        if ($row) {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-success is-dismissible">
             <p>اشتراک مورد نظر با موفقیت ایجاد شد!</p>
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

    <?php if (isset($_POST['modify-plan'])) {
        $name = sanitize_text_field($_POST['name']);
        $price = sanitize_text_field($_POST['price']);
        $lined_price = sanitize_text_field($_POST['lined-price']);
        $duration_id = $_POST['duration_id'];
        $slug = sanitize_text_field($_POST['slug']);
        $options = serialize($_POST['plan_options']);
        $payable = $_POST['payable'];
        $plan_id = $_POST['plan_id'];

        $row = $db->update($db->table_plans, compact('name', 'price', 'duration_id', 'slug', 'options', 'payable', 'lined_price'), $plan_id);

        if ($row) {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-success is-dismissible">
             <p>اشتراک مورد نظر با موفقیت بروز رسانی شد!</p>
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
        <h2 class="fw-bold">اشتراک ها</h2>

        <?php do_action('admin_notices'); ?>

        <div class="mb-3">
            <a href="<?php echo add_query_arg('add-plan', '1', $current_url); ?>" class="button button-primary fs-14">افزودن
                اشتراک
                جدید</a>
        </div>

        <div class="table-responsive">
            <table class="wp-list-table widefat striped vertical-middle">
                <thead>
                <tr>
                    <th>نام اشتراک</th>
                    <th>مدت</th>
                    <th>قیمت</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $rows = $db->get_results($db->table_plans);
                if (count($rows)): ?>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $db->get_row($db->table_plans_durations, $row->duration_id)->name; ?></td>
                            <td><?php echo number_format($row->price) . ' تومان'; ?></td>
                            <td>
                                <div class="d-flex ai-center">
                                    <a onclick="return confirm('از حذف اشتراک اطمینان دارید؟')"
                                       href="<?php echo add_query_arg('delete-plan', $row->ID, $current_url); ?>"
                                       class="button button-red dashicons-trash font-dashicon fs-20 lh-1_6 ml-3"></a>
                                    <a href="<?php echo add_query_arg('edit-plan', $row->ID, $current_url); ?>"
                                       class="button button-orange dashicons-edit font-dashicon fs-20 lh-1_6"></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">اشتراکی پیدا نشد!</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

<?php endif; ?>
