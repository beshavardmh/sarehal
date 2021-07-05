<section class="plans-cover-slider pt-lg-4 pb-5">
    <div class="container">
        <div class="bg-wrap px-6 py-6 d-flex flex-column jc-center radius-25">
            <div class="mr-auto max-w-500 ">
                <h1 class="font-38 font-xs-30 text-center text-sm-right">
                    هر چیزی که برای تندرستی لازم داری،
                    <br>
                    در یک اشتراک
                    <mark class="fg-main p-0 bg-transparent">سرِحال</mark>
                    !
                </h1>
                <p class="font-20 font-xs-16 text-justify lh-1_8 mt-3">
                    اشتراک‌های سرِحال، با این هدف طراحی شده‌اند که همه‌ی نیازهای لازم را برای رسیدن به تندرستی
                    پایدار، با هزینه‌ای به صرفه و به آسانی برآورده کنند. کافی است یک اشتراک را خریداری کنید، تا به
                    صورت ماهانه از خدمات جامع مرکز آنلاین تندرستی سرِحال استفاده کنید.
                </p>

                <div class="d-flex jc-center jc-sm-start mt-4">
                    <a href="#plans_details" class="btn btn-main d-flex ai-center font-20 font-xs-16 px-4 radius-25">مشاهده
                        اشتراک‌ها
                        <i class="far fa-chevron-double-down animate-arrow position-relative top-n2 mr-3"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="plans_details" class="plans-details py-6">
    <div class="container">
        <h2 class="font-28 h-b-line text-center mb-5">روی سرِحالی‌ت سرمایه گذاری کن!</h2>

        <?php
        $db = new SarehalDbManager();
        $plans = $db->get_results($db->table_plans);
        ?>

        <?php if ($plans): ?>
            <?php if (count($plans) > 1): ?>
                <div class="table-buttons position-relative d-block d-lg-none">
                    <div class="position-absolute arrow arrow-prev fas fa-chevron-circle-right font-28 right-1rem top-1rem cursor-pointer"></div>

                    <div class="position-absolute arrow arrow-next fas fa-chevron-circle-left font-28 left-1rem top-1rem cursor-pointer"></div>
                </div>
            <?php endif; ?>

            <div class="table-responsive radius-10">
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th class="th-empty"></th>

                        <?php foreach ($plans as $plan): ?>
                            <th>اشتراک <?php echo $db->get_row($db->table_plans_durations, $plan->duration_id)->name; ?>
                                <b class="d-block fw-bold fg-main font-20"><?php echo $plan->name; ?></b>
                            </th>
                        <?php endforeach; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="plan-name fw-semibold">هزینه</td>
                        <?php foreach ($plans as $plan): ?>
                            <td><?php echo number_format($plan->price); ?> تومان</td>
                        <?php endforeach; ?>
                    </tr>

                    <tr>
                        <td class="plan-name fw-semibold">مدت زمان</td>
                        <?php foreach ($plans as $plan): ?>
                            <td><?php echo $db->get_row($db->table_plans_durations, $plan->duration_id)->duration; ?>
                                روز
                            </td>
                        <?php endforeach; ?>
                    </tr>

                    <?php $plans_options = $db->get_results($db->table_plans_options); ?>
                    <?php if ($plans_options): ?>
                        <?php foreach ($plans_options as $plan_option): ?>
                            <?php if ($plan_option->show_on_plans_page): ?>
                                <tr>
                                    <td class="plan-name fw-semibold"><?php echo $plan_option->name; ?></td>
                                    <?php foreach ($plans as $plan): ?>
                                        <?php $options = unserialize($plan->options); ?>
                                        <td><?php echo $options[$plan_option->ID]['active'] ? '<i class="fas fg-green fa-check-circle font-22"></i>' : '<i class="fas text-danger fa-times-circle font-22"></i>'; ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <tr class="actions">
                        <td></td>
                        <?php foreach ($plans as $plan): ?>
                            <?php if ($plan->payable): ?>
                                <td>
                                    <a href="<?php echo add_query_arg('plan', $plan->slug, home_url('voucher')); ?>"
                                       class="btn btn-outline-black font-16 px-5 radius-25 text-nowrap mx-2">انتخاب و
                                        ادامه</a>
                                </td>
                            <?php else: ?>
                                <td>
                                    <a href="javascript:void(0)"
                                       class="btn disabled btn-outline-black font-16 px-5 radius-25 text-nowrap mx-2">به
                                        زودی!</a>
                                </td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tr>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-center">اشتراکی پیدا نشد!</p>
        <?php endif; ?>
    </div>
</section>

<section class="plans-scm-1 pb-6">
    <div class="container pb-5">
        <div class="evaluation-box p-4 p-sm-5 radius-30">
            <div class="row flex-column flex-md-row ai-center jc-between mt-n4">
                <div class="text-white text-center text-md-right px-3 mt-4">
                    <h2 class="font-28">درباره‌ی تندرستی سؤالی داری؟</h2>
                    <p class="font-22 mt-2 fw-normal">همین حالا از ما بپرس!</p>
                </div>

                <p data-open-contact-popup class="btn bg-white radius-25 px-5 mx-3 mt-4">مشاوره‌ی رایگان</p>
            </div>
        </div>
    </div>
</section>

<section class="plans-scm-2 pb-6">
    <div class="container team-slider-bg pb-5">
        <h2 class="font-28 h-b-line text-center">حس شیرین رضایت سرِحالی‌ها!</h2>

        <div class="team-slider owl-carousel dir-ltr mt-5">
            <div class="item text-center">
                <img src="https://sarehal.com/wp-content/uploads/2021/06/Testimonial-Firouzi.jpg" width="121" height="121"
                     class="img-fluid rounded-full">

                <div class="cont display-none">
                    <p class="fw-bold font-18 mt-2">زهرا فیروزی</p>
                    <span class="fg-gray font-15">فیتنس با سرِحال</span>
                    <div class="stars dir-ltr font-12 mt-1">
                        <i class="fa fa-star fill"></i>
                        <i class="fa fa-star fill"></i>
                        <i class="fa fa-star fill"></i>
                        <i class="fa fa-star fill"></i>
                        <i class="fa fa-star fill"></i>
                    </div>
                </div>

                <p class="cm d-none">
                    سرِحال یکی از دغدغه‌های اصلی من رو که افزایش وزن و بالابردن حجم عضله بود، برطرف کرد.
                    پیگیری‌های مداوم مربیم به همراه مشاوره‌های تخصصیش باعث شد که در این  مسیر با انگیزه‌ی زیادی پیش برم و برعکس برنامه‌های قبلی که داشتم نیمه‌کاره رها نکنم.
                    و الان سرِحال و سالمم.
                </p>
            </div>

            <div class="item text-center">
                <img src="https://sarehal.com/wp-content/uploads/2021/06/Testimonial-Moradkhani.jpg" width="121" height="121"
                     class="img-fluid rounded-full">

                <div class="cont display-none">
                    <p class="fw-bold font-18 mt-2">حسام مرادخانی</p>
                    <span class="fg-gray font-15">فیتنس با سرِحال</span>
                    <div class="stars dir-ltr font-12 mt-1">
                        <i class="fa fa-star fill"></i>
                        <i class="fa fa-star fill"></i>
                        <i class="fa fa-star fill"></i>
                        <i class="fa fa-star fill"></i>
                        <i class="fa fa-star fill"></i>
                    </div>
                </div>

                <p class="cm d-none">
                    تجربه‌ای که من از تیم ورزشی سرِحال داشتم، رضایت‌بخش بود واقعا و مشاورم واقعا باسواد و باتجربه بود.
                    توی 4 ماه تقریبا 11 کیلو کم کردم که تقریبا همون مقداری بود که می‌خواستم.
                </p>
            </div>
        </div>

        <p id="tsm_cm" class="text-center mt-0 mt-md-4 max-w-700 mx-auto"></p>
    </div>
</section>