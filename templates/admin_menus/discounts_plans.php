<?php
$current_url = add_query_arg('page', 'sarehal-plans-discounts', admin_url('admin.php'));
$db = new SarehalDbManager();
?>
<?php if (isset($_GET['edit-plan-discount']) && intval($_GET['edit-plan-discount'])): ?>

    <?php
    $row = $db->get_row($db->table_discounts, $_GET['edit-plan-discount']);

    if ($row): ?>
        <div class="wrap">
            <h1 class="fw-bold">ویرایش کد تخفیف <?php echo $row->name; ?></h1>
            <form action="<?php echo $current_url; ?>" method="post">
                <div class="mt-4">
                    <label for="discount-name" class="d-block mb-1 fw-bold">نام کد تخفیف</label>
                    <input type="text" name="name" id="discount-name" value="<?php echo $row->name; ?>" required
                           class="min-w-240">
                </div>

                <div class="mt-4">
                    <label for="discount-code" class="d-block mb-1 fw-bold">کد تخفیف</label>
                    <input type="text" name="code" id="discount-code" value="<?php echo $row->code; ?>" required
                           class="min-w-240">
                </div>

                <div class="mt-4">
                    <label for="discount-price" class="d-block mb-1 fw-bold">قیمت</label>
                    <input type="text" name="price" id="discount-price" value="<?php echo $row->price; ?>" required
                           class="just_num min-w-240"> تومان
                </div>

                <div class="mt-4">
                    <label for="discount-expire" class="d-block mb-1 fw-bold">تاریخ انقضا</label>
                    <input type="datetime-local" name="expire_at" value="<?php echo $row->expire_at; ?>"
                           id="discount-expire"
                           class="min-w-240">
                    <p class="fs-12 my-0">برای عدم انقضا خالی بگذارید</p>
                </div>

                <div class="mt-4">
                    <label for="discount-usable" class="d-block mb-1 fw-bold">تعداد دفعات قابل استفاده برای
                        افراد</label>
                    <input type="number" name="usable_count" id="discount-usable"
                           value="<?php echo $row->usable_count; ?>" required
                           class="input-sm">
                    <p class="fs-12 my-0">-1 برای نامحدود</p>
                </div>

                <div class="mt-4">
                    <label for="discount-usable-person" class="d-block mb-1 fw-bold">تعداد دفعات قابل استفاده برای یک
                        فرد</label>
                    <input type="number" name="usable_person_count" id="discount-usable-person"
                           value="<?php echo $row->usable_person_count; ?>" required
                           class="input-sm">
                    <p class="fs-12 my-0">-1 برای نامحدود</p>
                </div>

                <?php
                $discount_plans = !empty(unserialize($row->plans)) ? unserialize($row->plans) : array();
                $plans_rows = $db->get_results($db->table_plans);
                ?>
                <?php if (!empty($plans_rows)): ?>
                    <div class="mt-4">
                        <label for="discount-usable-person" class="d-block mb-1 fw-bold">تعریف برای اشتراک خاص</label>
                        <?php foreach ($plans_rows as $plans_row): ?>
                            <div>
                                <div class="d-flex flex-wrap ai-center mt-3">
                                    <label for="discount-plans-<?php echo $plans_row->ID; ?>"><?php echo $plans_row->name . ' - ' . $plans_row->slug; ?></label>
                                    <input type="checkbox" name="discount_plans[]"
                                           id="discount-plans-<?php echo $plans_row->ID; ?>"
                                           value="<?php echo $plans_row->ID; ?>"
                                        <?php echo (in_array($plans_row->ID, $discount_plans)) ? 'checked' : ''; ?>
                                           class="my-0 mr-2">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="mt-5">
                    <input type="hidden" name="plan_discount_id" value="<?php echo $_GET['edit-plan-discount']; ?>">
                    <button type="submit" name="modify-plan-discount" class="button button-primary fs-14">ذخیره
                        تغییرات
                    </button>
                </div>
            </form>
        </div>
    <?php else: ?>
        <div class="wrap">
            <p>کد تخفیف مورد نظر پیدا نشد!</p>
        </div>
    <?php endif; ?>

<?php elseif (isset($_GET['add-plan-discount'])): ?>

    <div class="wrap">
        <h1 class="fw-bold">افزودن کد تخفیف جدید</h1>
        <form action="<?php echo $current_url; ?>" method="post">
            <div class="mt-4">
                <label for="discount-name" class="d-block mb-1 fw-bold">نام کد تخفیف</label>
                <input type="text" name="name" id="discount-name" required class="min-w-240">
            </div>

            <div class="mt-4">
                <label for="discount-code" class="d-block mb-1 fw-bold">کد تخفیف</label>
                <input type="text" name="code" id="discount-code" required
                       class="min-w-240">
            </div>

            <div class="mt-4">
                <label for="discount-price" class="d-block mb-1 fw-bold">قیمت</label>
                <input type="text" name="price" id="discount-price" required
                       class="just_num min-w-240"> تومان
            </div>

            <div class="mt-4">
                <label for="discount-expire" class="d-block mb-1 fw-bold">تاریخ انقضا</label>
                <input type="datetime-local" name="expire_at" id="discount-expire"
                       class="min-w-240">
                <p class="fs-12 my-0">برای عدم انقضا خالی بگذارید</p>
            </div>

            <div class="mt-4">
                <label for="discount-usable" class="d-block mb-1 fw-bold">تعداد دفعات قابل استفاده برای افراد</label>
                <input type="number" name="usable_count" id="discount-usable" required
                       class="input-sm">
                <p class="fs-12 my-0">-1 برای نامحدود</p>
            </div>

            <div class="mt-4">
                <label for="discount-usable-person" class="d-block mb-1 fw-bold">تعداد دفعات قابل استفاده برای یک
                    فرد</label>
                <input type="number" name="usable_person_count" id="discount-usable-person" required
                       class="input-sm">
                <p class="fs-12 my-0">-1 برای نامحدود</p>
            </div>

            <?php
            $plans_rows = $db->get_results($db->table_plans);
            ?>
            <?php if (!empty($plans_rows)): ?>
                <div class="mt-4">
                    <label for="discount-usable-person" class="d-block mb-1 fw-bold">تعریف برای اشتراک خاص</label>
                    <?php foreach ($plans_rows as $plans_row): ?>
                        <div>
                            <div class="d-flex flex-wrap ai-center mt-3">
                                <label for="discount-plans-<?php echo $plans_row->ID; ?>"><?php echo $plans_row->name . ' - ' . $plans_row->slug; ?></label>
                                <input type="checkbox" name="discount_plans[]"
                                       id="discount-plans-<?php echo $plans_row->ID; ?>"
                                       value="<?php echo $plans_row->ID; ?>"
                                       class="my-0 mr-2">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="mt-5">
                <button type="submit" name="new-plan-discount" class="button button-primary fs-14">ذخیره تغییرات
                </button>
            </div>
        </form>
    </div>

<?php else: ?>

    <?php if (isset($_GET['delete-plan-discount']) && intval($_GET['delete-plan-discount'])) {
        $row = $db->delete($db->table_discounts, $_GET['delete-plan-discount']);
        if ($row) {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-success is-dismissible">
             <p>کد تخفیف مورد نظر با موفقیت حذف شد!</p>
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

    <?php if (isset($_POST['new-plan-discount'])) {
        $name = sanitize_text_field($_POST['name']);
        $code = sanitize_text_field($_POST['code']);
        $price = sanitize_text_field($_POST['price']);
        $expire_at = sanitize_text_field($_POST['expire_at']);
        $usable_count = sanitize_text_field($_POST['usable_count']);
        $usable_person_count = sanitize_text_field($_POST['usable_person_count']);
        $plans = !empty($_POST['discount_plans']) ? serialize($_POST['discount_plans']) : null;

        $row = $db->insert($db->table_discounts, compact(
            'name',
            'code',
            'price',
            'usable_count',
            'usable_person_count',
            'plans',
            'expire_at'
        ));

        if ($row) {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-success is-dismissible">
             <p>کد تخفیف مورد نظر با موفقیت ایجاد شد!</p>
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

    <?php if (isset($_POST['modify-plan-discount'])) {
        $name = sanitize_text_field($_POST['name']);
        $code = sanitize_text_field($_POST['code']);
        $price = sanitize_text_field($_POST['price']);
        $expire_at = sanitize_text_field($_POST['expire_at']);
        $usable_count = sanitize_text_field($_POST['usable_count']);
        $usable_person_count = sanitize_text_field($_POST['usable_person_count']);
        $plans = !empty($_POST['discount_plans']) ? serialize($_POST['discount_plans']) : null;
        $plan_discount_id = $_POST['plan_discount_id'];

        $row = $db->update($db->table_discounts, compact(
            'name',
            'code',
            'price',
            'usable_count',
            'usable_person_count',
            'plans',
            'expire_at'
        ), $plan_discount_id);

        if ($row) {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-success is-dismissible">
             <p>کد تخفیف مورد نظر با موفقیت بروز رسانی شد!</p>
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
        <h2 class="fw-bold">کد های تخفیف</h2>

        <?php do_action('admin_notices'); ?>

        <div class="mb-3">
            <a href="<?php echo add_query_arg('add-plan-discount', '1', $current_url); ?>"
               class="button button-primary fs-14">افزودن
                کد تخفیف
                جدید</a>
        </div>

        <div class="table-responsive">
            <table class="wp-list-table widefat striped vertical-middle">
                <thead>
                <tr>
                    <th>نام</th>
                    <th>کد</th>
                    <th>قیمت</th>
                    <th>تاریخ انقضا</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $rows = $db->get_results($db->table_discounts);
                if (count($rows)): ?>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->code; ?></td>
                            <td><?php echo $row->price; ?></td>
                            <td><?php echo ($row->expire_at != '0000-00-00 00:00:00') ? parsidate('H:i - Y/m/d', $row->expire_at, 'per') : ''; ?></td>
                            <td>
                                <div class="d-flex ai-center">
                                    <a onclick="return confirm('از حذف این کد تخفیف اطمینان دارید؟')"
                                       href="<?php echo add_query_arg('delete-plan-discount', $row->ID, $current_url); ?>"
                                       class="button button-red dashicons-trash font-dashicon fs-20 lh-1_6 ml-3"></a>
                                    <a href="<?php echo add_query_arg('edit-plan-discount', $row->ID, $current_url); ?>"
                                       class="button button-orange dashicons-edit font-dashicon fs-20 lh-1_6"></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">کد تخفیفی پیدا نشد!</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

<?php endif; ?>