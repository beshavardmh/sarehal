<?php
$authority = $_GET['Authority'];
$status = $_GET['Status'];
($authority && $status) || wp_redirect(home_url());
?>
<section class="callback-payment py-6">
    <div class="container">
        <?php
        get_template_part('inc/payment');

        $payment = new SarehalPayment();

        $payment->verify_payment($authority, $status, 'success_payment_cb', 'error_payment_cb');

        function success_payment_cb($class, $result)
        {
            ?>
            <div class="text-center mx-auto max-w-500">
                <img src="https://sarehal.com/wp-content/uploads/2021/06/successful-payment.jpg" class="img-fluid mb-6"
                     alt="خرید موفقیت آمیز">
                <h2 class="font-36 text-center fw-bold fg-green mb-3">تراکنش موفق!</h2>
                <p>تراکنش شما با موفقیت انجام شد. از خرید شما متشکریم. برای شروع دریافت خدمات، نخست دکمه‌ی «شروع اشتراک» در پایین صفحه را فشار دهید
                و بعد از هدایت به سمت اپلیکیشن واتساپ، پیام از پیش نوشته‌شده را ارسال کنید.</p>
            </div>

            <ul class="max-w-500 mx-auto my-5">
                <li class="row mx-n2 ai-center jc-between py-3 border-bottom">
                    <span class="fw-semibold px-2">تاریخ تراکنش</span>

                    <span class="px-2"><?php echo parsidate('Y/m/d', 'now', 'per'); ?></span>
                </li>

                <li class="row mx-n2 ai-center jc-between py-3 border-bottom">
                    <span class="fw-semibold px-2">کد تراکنش</span>

                    <span class="dir-ltr px-2"><?php echo $result['data']['ref_id']; ?></span>
                </li>

                <li class="row mx-n2 ai-center jc-between py-3 border-bottom">
                    <span class="fw-semibold px-2">اشتراک خریداری شده</span>

                    <?php $db = $class->get_instance_db_manager(); ?>
                    <span class="px-2"><?php echo $db->get_row($db->table_plans, $_SESSION['payment_plan_id'])->name; ?></span>
                </li>

                <li class="row mx-n2 ai-center jc-between py-3 border-bottom">
                    <span class="fw-semibold px-2">مبلغ</span>

                    <span class="px-2"><?php echo number_format($db->get_row($db->table_plans, $_SESSION['payment_plan_id'])->price); ?> تومان</span>
                </li>
            </ul>

            <div class="row mx-n2 ai-center jc-center">
                <a href="https://api.whatsapp.com/send?phone=989901100715&text=%D8%B3%D9%84%D8%A7%D9%85%20%D8%B3%D8%B1%D9%90%D8%AD%D8%A7%D9%84!%20%D9%85%D9%86%20%D8%A2%D9%85%D8%A7%D8%AF%D9%87%E2%80%8C%D9%85."
                class="btn btn-dark text-white font-16 px-4 radius-25 mx-2 mt-4">شروع اشتراک</a>
                <a href="<?php echo home_url(); ?>" class="btn btn-outline-main-color font-16 px-4 radius-25 mx-2 mt-4">بازگشت
                    به صفحه اصلی</a>
            </div>
            <?php
        }

        function error_payment_cb($class, $result)
        {
            ?>
            <div class="text-center mx-auto max-w-500">
                <img src="https://sarehal.com/wp-content/uploads/2021/06/error-payment.jpg" class="img-fluid mb-6"
                     alt="خرید ناموفق">
                <h2 class="font-36 text-center fw-bold fg-red mb-3">تراکنش ناموفق!</h2>
                <p><?php echo $class->payment_messages[$result['errors']['code']]; ?></p>
            </div>

            <ul class="max-w-500 mx-auto my-5">
                <li class="row mx-n2 ai-center jc-between py-3 border-bottom">
                    <span class="fw-semibold px-2">تاریخ تراکنش</span>

                    <span class="px-2"><?php echo parsidate('Y/m/d', 'now', 'per'); ?></span>
                </li>

                <li class="row mx-n2 ai-center jc-between py-3 border-bottom">
                    <span class="fw-semibold px-2">اشتراک انتخاب شده</span>

                    <?php $db = $class->get_instance_db_manager(); ?>
                    <span class="px-2"><?php echo $db->get_row($db->table_plans, $_SESSION['payment_plan_id'])->name; ?></span>
                </li>

                <li class="row mx-n2 ai-center jc-between py-3 border-bottom">
                    <span class="fw-semibold px-2">مبلغ</span>

                    <span class="px-2"><?php echo number_format($db->get_row($db->table_plans, $_SESSION['payment_plan_id'])->price); ?> تومان</span>
                </li>
            </ul>

            <div class="row mx-n2 ai-center jc-center">
                <a href="<?php echo home_url(); ?>" class="btn btn-outline-main-color font-16 px-4 radius-25 mx-2 mt-4">بازگشت
                    به صفحه اصلی</a>
            </div>
            <?php
        }

        ?>

    </div>
</section>