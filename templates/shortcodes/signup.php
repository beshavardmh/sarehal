<?php
if (!isset($_GET['target'])) {
    wp_redirect(home_url());
}
?>

<section class="signup">
    <form action="" method="post">

        <div class="progress-bar position-fixed top-0 z-index-3"></div>

        <header class="position-relative z-index-2 text-center pt-3 px-3">
            <a href="javascript:void(0)" class="py-3">
                <img data-src="https://sarehal.com/wp-content/uploads/2021/06/Linear-Logo.svg" width="160" height="50"
                     class="main-logo lazyload">
            </a>
        </header>

        <div class="position-relative z-index-2 max-w-800 mx-auto py-2 px-3">
            <a href="https://sarehal.com/" class="go-home hvr-fg-main fg-pencil">
                <div class="d-flex ai-center">
                    <div class="icon-wrap cursor-pointer">
                        <i class="far fa-chevron-right font-22"></i>
                    </div>

                    <span class="font-14">بازگشت</span>
                </div>
            </a>

            <a href="javascript:void(0)" class="display-none go-back hvr-fg-main fg-pencil">
                <div class="d-flex ai-center prev-step">
                    <div class="icon-wrap cursor-pointer">
                        <i class="far fa-chevron-right font-22"></i>
                    </div>

                    <span class="font-14">بازگشت</span>
                </div>
            </a>
        </div>

        <div id="welcome-step"
             class="step position-absolute w-100 h-100 text-center top-0 right-0 active">
            <div class="container pb-6 max-w-800">
                <h2 class="mt-3">دوست عزیز، سلام!
                    <br>
                    به <span class="fg-main py-2">سرِحال</span> خوش آمدید! &nbsp; &#127881;
                </h2>

                <p class="font-22 font-xs-20 fw-semibold mb-4 py-3">
                    با پاسخ‌دادن به چند سؤال، کمک می‌کنید تا تجربه‌ی اختصاصی‌تری به شما ارائه دهیم.
                </p>

                <div class="d-flex jc-center">
                    <button id="btn-welcome-step" type="button"
                            class="next_step btn btn-dark min-w-200 radius-25 d-flex ai-center jc-center text-white px-5 mt-5 lh-1">
                        ادامه
                        <i class="fal fa-chevron-left font-14 position-relative top-n1 mr-3"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="age-step"
             class="step position-absolute w-100 h-100 text-center top-0 right-0">
            <div class="container pb-6 max-w-800">
                <p class="font-22 font-xs-20 fw-semibold mb-5">
                    اینکه در کدام مرحله از زندگی هستید، ویژگی‌های مسیر تندرستی شما را متفاوت می‌کند.
                </p>

                <div class="mt-4">
                    <input type="number" class="line-input w-100 max-w-300 font-20" name="age-step"
                           placeholder="سن شما:" min="10" max="100">
                </div>

                <div class="display-none alert alert-danger w-100 max-w-500 mx-auto p-3 mt-5"></div>

                <div class="d-flex jc-center">
                    <button id="btn-age-step" type="button"
                            class="next_step btn btn-dark hidden min-w-200 radius-25 d-flex ai-center jc-center text-white px-5 mt-5 lh-1">
                        ادامه
                        <i class="fal fa-chevron-left font-14 position-relative top-n1 mr-3"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="gender-step"
             class="step position-absolute w-100 h-100 text-center top-0 right-0">
            <div class="container pb-6 max-w-800">
                <p class="font-22 font-xs-20 fw-semibold mb-5">انسان‌های مختلف، مسیرهای متفاوتی رو برای رسیدن به تندرستی
                    طی
                    می‌کنند.</p>

                <div class="d-flex flex-column ai-center jc-center">
                    <label id="btn-gender-step"
                           class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-200 outline_option has_hvr_bg d-flex ai-center jc-center">
                        <div class="icon-wrap bg-1 ml-2">
                            <i class="fal fa-venus fg-main font-20"></i>
                        </div>
                        زن هستم.
                        <input type="radio" class="d-none" name="gender-step" value="female">
                    </label>

                    <label id="btn-gender-step"
                           class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-200 outline_option has_hvr_bg d-flex ai-center jc-center">
                        <div class="icon-wrap bg-1 ml-2">
                            <i class="fal fa-mars fg-main font-20"></i>
                        </div>
                        مرد هستم.
                        <input type="radio" class="d-none" name="gender-step" value="male">
                    </label>
                </div>
            </div>
        </div>

        <div id="bmi-step"
             class="step position-absolute w-100 h-100 text-center top-0 right-0">
            <div class="container pb-6 max-w-800">
                <p class="font-22 font-xs-20 fw-semibold mb-5"> تحقیقات می‌گویند برنامه‌های
                    اختصاصی، ۲۹٪ بیشتر باعث تغییر بلندمدت
                    در اندام می‌شوند.
                </p>

                <div class="mt-4">
                    <input type="number" class="line-input w-100 max-w-300 font-20" name="height-step"
                           placeholder="قد شما (سانتی‌متر):" min="140" max="220">
                </div>

                <div class="mt-4">
                    <input type="number" class="line-input w-100 max-w-300 font-20" name="weight-step"
                           placeholder="وزن شما (کیلوگرم):" min="25" max="250">
                </div>

                <div class="display-none alert alert-danger w-100 max-w-500 mx-auto p-3 mt-5"></div>

                <div class="calc_bmi hidden mt-5">
                    <p id="bmi_status_val" class="font-22 font-xs-20 fw-semibold"></p>
                </div>

                <div class="d-flex jc-center">
                    <button id="btn-bmi-step" type="button"
                            class="next_step btn btn-dark hidden min-w-200 radius-25 d-flex ai-center jc-center text-white px-5 mt-5 lh-1">
                        ادامه
                        <i class="fal fa-chevron-left font-14 position-relative top-n1 mr-3"></i>
                    </button>
                </div>

            </div>
        </div>

        <div id="statistics-step"
             class="step position-absolute w-100 min-vh-100 text-center top-0 right-0">
            <div class="container pb-6 max-w-800">
                <p class="font-22 font-xs-20 fw-semibold mb-5">
                    جای نگرانی نیست، <span class="fg-main">سرِحال</span> کنار شماست!
                </p>

                <div class="calc_bmi jc-center mt-n5 mt-lg-2">
                    <div class="mt-6">
                        <svg class="circle-chart display-none" viewbox="0 0 33.83098862 33.83098862"
                             width="200" height="200" xmlns="http://www.w3.org/2000/svg">
                            <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none"
                                    cx="16.91549431" cy="16.91549431" r="15.91549431"/>
                            <circle class="circle-chart__circle" id="recom_chart" stroke="#efefef" stroke-width="2"
                                    stroke-dasharray="35,100" stroke-linecap="round" fill="none" cx="16.91549431"
                                    cy="16.91549431" r="15.91549431"/>
                            <g class="circle-chart__info">
                                <text class="circle-chart__percent" id="recom_chart_val" x="16.5" y="17.5"
                                      alignment-baseline="central"
                                      text-anchor="middle" font-size="8">۸۵٪
                                </text>
                            </g>
                        </svg>

                        <div class="d-flex jc-center mt-3">
                            <p id="recom_msg" class="mt-4 font-18 font-xs-16 max-w-300"></p>
                        </div>
                    </div>
                </div>

                <div class="d-flex jc-center">
                    <button id="btn-statistics-step" type="button"
                            class="next_step btn btn-dark min-w-200 radius-25 d-flex ai-center jc-center text-white px-5 mt-5 mt-lg-6 lh-1">
                        ادامه
                        <i class="fal fa-chevron-left font-14 position-relative top-n1 mr-3"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="sickness-step"
             class="step position-absolute w-100 h-100 text-center top-0 right-0">
            <div class="container pb-6 max-w-800">
                <p class="font-22 font-xs-20 fw-semibold mb-5">
                    در معرض کدام یک از بیماری‌های زیر هستید؟
                </p>

                <label class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-200 w-100 max-w-300 mx-auto outline_option d-flex ai-center jc-center">
                    <i class="fal fa-square font-18"></i>
                    <p class="mr-2 mt-1">کمبود تستوسترون</p>
                    <input type="checkbox" class="d-none" name="sickness-step[]" value="کمبود تستوسترون">
                </label>

                <label class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-200 w-100 max-w-300 mx-auto outline_option d-flex ai-center jc-center">
                    <i class="fal fa-square font-18"></i>
                    <p class="mr-2 mt-1">بیماری قلبی یا سکته</p>
                    <input type="checkbox" class="d-none" name="sickness-step[]" value="بیماری قلبی یا سکته">
                </label>

                <label class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-200 w-100 max-w-300 mx-auto outline_option d-flex ai-center jc-center">
                    <i class="fal fa-square font-18"></i>
                    <p class="mr-2 mt-1">فشار خون بالا</p>
                    <input type="checkbox" class="d-none" name="sickness-step[]" value="فشار خون بالا">
                </label>

                <label class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-200 w-100 max-w-300 mx-auto outline_option d-flex ai-center jc-center">
                    <i class="fal fa-square font-18"></i>
                    <p class="mr-2 mt-1">دیابت</p>
                    <input type="checkbox" class="d-none" name="sickness-step[]" value="دیابت">
                </label>

                <label class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-200 w-100 max-w-300 mx-auto outline_option d-flex ai-center jc-center">
                    <i class="fal fa-square font-18"></i>
                    <p class="mr-2 mt-1">پوکی استخوان</p>
                    <input type="checkbox" class="d-none" name="sickness-step[]" value="پوکی استخوان">
                </label>

                <label class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-200 w-100 max-w-300 mx-auto outline_option d-flex ai-center jc-center">
                    <i class="fal fa-square font-18"></i>
                    <p class="mr-2 mt-1">اضطراب و افسردگی</p>
                    <input type="checkbox" class="d-none" name="sickness-step[]" value="اضطراب و افسردگی">
                </label>

                <label class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-200 w-100 max-w-300 mx-auto outline_option d-flex ai-center jc-center">
                    <i class="fal fa-square font-18"></i>
                    <p class="mr-2 mt-1">سایر</p>
                    <input type="checkbox" class="d-none" name="sickness-step[]" value="سایر">
                </label>

                <label class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-200 w-100 max-w-300 mx-auto outline_option d-flex ai-center jc-center">
                    <i class="fal fa-square font-18"></i>
                    <p class="mr-2 mt-1">هیچکدام</p>
                    <input type="checkbox" class="d-none" name="sickness-step[]" data-option="none" value="هیچکدام">
                </label>

                <div class="display-none alert alert-danger w-100 max-w-500 mx-auto p-3 mt-5"></div>

                <div class="d-flex jc-center mb-4">
                    <button id="btn-sickness-step" type="button"
                            class="next_step btn btn-dark hidden min-w-200 radius-25 d-flex ai-center jc-center text-white px-5 mt-5 lh-1">
                        ادامه
                        <i class="fal fa-chevron-left font-14 position-relative top-n1 mr-3"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="testimonial-step"
             class="step position-absolute w-100 h-100 text-center top-0 right-0">
            <div class="container max-w-900 pb-6">
                <div class="row flex-column flex-lg-row ai-center jc-center mt-n5 mt-lg-0">
                    <div class="col-lg-5 mt-4">
                        <h2 class="font-30 text-center font-xs-26 fw-bold">داستان‌های سرِحال: محمد عبادی</h2>
                        <p class="text-justify font-18 font-xs-16 mt-3">
                            محمد، ۳۱ ساله و ساکن تهران، با ۱۳۸ کیلوگرم وزن، از اضافه‌وزن زیادی رنج می‌برد.
                            پیش از مراجعه به مرکز آنلاین تندرستی سرِحال، راهکارهای مختلفی را از جمله رژیم‌های سنتی و
                            کالری‌شماری امتحان کرده بود، اما نتیجه‌ی بلندمدت نگرفته بود.
                            </br>
                            پس از مراجعه در فروردین ۱۳۹۹ و یک سال کار با مربی خود در سرِحال و با اراده‌ی قوی خود، توانست
                            به
                            ۴۸ کیلو کاهش وزن متناسب، با کمترین ضرر به سلامتی و بلندمدت دست پیدا کند.
                            محمد هنوز هم برای تناسب اندام بهتر از خدمات سرِحال استفاده می‌کند.
                        </p>
                    </div>

                    <div class="col-lg-5 mt-4">
                        <img data-src="https://sarehal.com/wp-content/uploads/2021/06/Before-After-Ebadi.png"
                             width="511" height="451"
                             class="img-fluid lazyload radius-10" alt="Sarehal Testimonial">
                    </div>
                </div>

                <div class="d-flex jc-center">
                    <button id="btn-testimonial-step" type="button"
                            class="next_step btn btn-dark min-w-200 radius-25 d-flex ai-center jc-center text-white px-5 mt-5 mt-lg-6 lh-1">
                        ادامه
                        <i class="fal fa-chevron-left font-14 position-relative top-n1 mr-3"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="information-step"
             class="step position-absolute w-100 h-100 text-center top-0 right-0">
            <div class="container pb-6 max-w-800">
                <p class="font-22 font-xs-20 fw-semibold mb-5">
                    یک حساب رایگان بسازید تا پاسخ‌هایتان را ثبت کنید.
                </p>

                <div class="mt-4">
                    <input type="text" class="line-input w-100 max-w-300 font-20" name="fullname-step"
                           placeholder="نام و نام خانوادگی شما:">
                </div>

                <div class="mt-4">
                    <input type="tel" class="line-input w-100 max-w-300 font-20" name="phone-step"
                           placeholder="شماره همراه شما (مثل 09901100715):">
                </div>

                <label class="w-100 mx-auto mt-6 d-flex ai-center jc-center">
                    <input type="checkbox" class="position-relative top-n2" checked name="sms-step" value="sms">
                    <p class="mr-2 text-right">مایلم برای اطلاع از جدیدترین خدمات، از سرِحال پیامک دریافت کنم.</p>
                </label>

                <!--<p class="mt-4 fg-pencil">با ثبت نام در سرِحال، شما <a href="#terms-popup" data-toggle="modal" class="fg-main bb-dashed">قوانین
                        حریم خصوصی</a> سایت سرِحال را می‌پذیرید.</p>-->

                <div class="modal fade" id="terms-popup" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان
                                    گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و
                                    برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی
                                    می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و
                                    متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی
                                    الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید
                                    داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان
                                    مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود
                                    طراحی اساسا مورد استفاده قرار گیرد.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="display-none alert alert-danger w-100 max-w-500 mx-auto p-3 mt-5"></div>

                <div class="d-flex jc-center">
                    <button id="btn-information-step" type="button"
                            class="next_step btn btn-dark hidden min-w-200 radius-25 d-flex ai-center jc-center text-white px-5 mt-5 lh-1">
                        ادامه
                        <i class="fal fa-chevron-left font-14 position-relative top-n1 mr-3"></i>

                        <i class="far fa-spinner-third process-animation text-white mr-3" style="display: none;"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="services-step"
             class="step position-absolute w-100 h-100 text-center top-0 right-0">
            <div class="container pb-6 max-w-1000">
                <h3>
                    خدمات <span class="fg-main py-2">سرِحال</span> برای رسیدن شما به هدف
                </h3>

                <div class="row jc-center mt-n4 mt-lg-2">
                    <div class="col-lg-4 mt-4">
                        <div class="item bg-white overflow-hidden radius-21 p-3">
                            <div class="bg-1 d-flex ai-center jc-center rounded-full mx-auto"
                                 style="width: 60px; height: 60px">
                                <i class="fal fa-utensils-alt font-36 fg-main"></i>
                            </div>

                            <h3 class="my-3 font-26">برنامه‌ی تغذیه‌ی اختصاصی</h3>

                            <ul class="list-style-disc list-style-inside text-right font-16">
                                <li class="mt-1">مبتنی بر هدف و سبک زندگی شما</li>
                                <li class="mt-1"> طراحی انواع رژیم‌های خاص مثل کتوژنیک</li>
                                <li class="mt-1">مبتنی بر سفره‌ی شما و علایق غذایی‌تان</li>
                                <li class="mt-1">مبتنی بر جدیدترین یافته‌های علمی</li>
                                <li class="mt-1">با قابلیت ویرایش نامحدود</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4">
                        <div class="item bg-white overflow-hidden radius-21 p-3">
                            <div class="bg-1 d-flex ai-center jc-center rounded-full mx-auto"
                                 style="width: 60px; height: 60px">
                                <i class="fal fa-running font-36 fg-main"></i>
                            </div>

                            <h3 class="my-3 font-26">برنامه‌ی تمرین اختصاصی</h3>

                            <ul class="list-style-disc list-style-inside text-right font-16">
                                <li class="mt-1">مبتنی بر هدف و سبک زندگی شما</li>
                                <li class="mt-1">برنامه‌ی تمرین در باشگاه، خانه و فضای باز</li>
                                <li class="mt-1">مبتنی بر علایق و سطح شما</li>
                                <li class="mt-1">مبتنی بر جدیدترین یافته‌های علمی</li>
                                <li class="mt-1">با قابلیت ویرایش نامحدود</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4">
                        <div class="item bg-white overflow-hidden radius-21 p-3">
                            <div class="bg-1 d-flex ai-center jc-center rounded-full mx-auto"
                                 style="width: 60px; height: 60px">
                                <i class="fal fa-hands-heart font-36 fg-main"></i>
                            </div>

                            <h3 class="my-3 font-26">مربی تندرستی اختصاصی</h3>

                            <ul class="list-style-disc list-style-inside text-right font-16">
                                <li class="mt-1">تقویت انگیزه‌ی شما تا رسیدن به هدف</li>
                                <li class="mt-1">آموزش اصول صحیح تغذیه و تمرینات</li>
                                <li class="mt-1">پاسخ‌گویی همیشگی</li>
                                <li class="mt-1">مبتنی بر جدیدترین یافته‌های علمی</li>
                                <li class="mt-1">افزایش ۳۰٪ موفقیت شما</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="d-flex jc-center mb-5">
                    <button id="btn-services-step" type="button"
                            class="next_step btn btn-dark min-w-200 radius-25 d-flex ai-center jc-center text-white px-5 mt-5 mt-lg-6 lh-1">
                        ادامه
                        <i class="fal fa-chevron-left font-14 position-relative top-n1 mr-3"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="plans-step"
             class="step position-absolute w-100 h-100 text-center top-0 right-0">
            <div class="container pb-6 max-w-800">
                <p class="font-22 font-xs-20 fw-semibold mb-3">
                    اشتراک مورد نظر خود را انتخاب کنید.
                </p>

                <?php
                $db = new SarehalDbManager();
                $plans = $db->get_results($db->table_plans);
                ?>
                <?php if ($plans): ?>
                    <div class="row jc-center mt-n3 mt-lg-0">
                        <?php foreach ($plans as $plan): ?>
                            <div class="col-lg-6 mt-5">
                                <div class="item radius-17 p-3 w-100 max-w-400 mx-auto border">
                                    <b class="d-block fw-bold font-22"><?php echo $db->get_row($db->table_plans_durations, $plan->duration_id)->name . ' - ' . $plan->name; ?></b>
                                    <?php $options = unserialize($plan->options); ?>
                                    <?php if ($options): ?>
                                        <ul class="pkg-items text-right my-3">
                                            <?php foreach ($options as $option_id => $option): ?>
                                                <?php if ($option['active'] && $option['show_on_cta']): ?>
                                                    <li class="my-1"><?php echo $db->get_row($db->table_plans_options, $option_id)->name; ?></li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                    <div class="d-flex mx-n2 flex-column flex-sm-row ai-center jc-center jc-sm-between mt-n2">
                                        <div class="px-2 mt-2">
                                            <del class="fg-gray font-16"> <?php echo number_format($plan->lined_price); ?>
                                                تومان
                                            </del>
                                            <p class="fg-main font-20 fw-semibold"> <?php echo number_format($plan->price); ?>
                                                تومان</p>
                                        </div>
                                        <label id="btn-plans-step"
                                               class="px-2 mt-2 btn btn-dark min-w-200 radius-25 text-white px-5">
                                            انتخاب
                                            <input type="radio" class="d-none" name="plans-step"
                                                   value="<?php echo $plan->ID; ?>">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="evaluation-box p-4 radius-30 mt-6">
                    <div class="row flex-column flex-md-row ai-center jc-between mt-n4">
                        <div class="text-white text-center text-md-right px-3 mt-4">
                            <p class="font-22 mt-2 fw-normal">هنوز مطمئن نیستی؟</p>
                        </div>

                        <a href="https://api.whatsapp.com/send?phone=989901100715" class="btn bg-white fg-pencil radius-25 px-5 mx-3 mt-4">مشورت رایگان با مربی</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="payment-step"
             class="step position-absolute w-100 h-100 text-center top-0 right-0">
            <div class="container px-4 pb-6 max-w-500">
                <div class="">
                    <p id="plan_name" class="font-20 text-center text-lg-right">
                        اشتراک یک ماهه‌ی <b class="font-22">فیتنس با سرِحال</b>، شامل این خدمات می‌شود:
                    </p>

                    <ul id="plan_options" class="pkg-items border bx-0 py-2 text-right mt-4">
                        <li class="my-2">بر اساس هدف</li>
                        <li class="my-2">برنامه‌ی غذایی و تمرینی</li>
                        <li class="my-2">مربی تندرستی اختصاصی</li>
                        <li class="my-2">پشتیبانی از 8 صبح تا 10 شب</li>
                        <li class="my-2">امکان بازگشت هزینه در صورت عدم رضایت پس از 7 روز</li>
                    </ul>
                </div>

                <h2 class="font-28 h-b-line text-center fw-bold mb-4 mt-6">نظرات کاربران</h2>
                <div class="border p-3 p-sm-4 bg-white radius-17">
                    <div class="owl-carousel dir-ltr">
                        <div class="item dir-rtl d-flex mx-n2">
                            <div class="px-2">
                                <div class="thumb text-center mx-auto" style="width: 70px; height: 70px;">
                                    <img data-src="https://sarehal.com/wp-content/uploads/2021/06/Testimonial-Moradkhani.jpg"
                                         width="100" height="100" class="img-fit lazyload rounded-full">
                                </div>
                                <div class="text-nowrap">
                                    <p class="fw-bold font-20 mt-2">حسام مرادخانی</p>
                                    <div class="stars dir-ltr font-12 mt-1">
                                        <i class="fa fa-star fill"></i>
                                        <i class="fa fa-star fill"></i>
                                        <i class="fa fa-star fill"></i>
                                        <i class="fa fa-star fill"></i>
                                        <i class="fa fa-star fill"></i>
                                    </div>
                                </div>
                            </div>

                            <p class="px-2 font-xs-16 text-justify">
                                تجربه‌ای که من از تیم ورزشی سرِحال داشتم، رضایت‌بخش بود واقعا و مشاورم واقعا باسواد و
                                باتجربه بود.
                                توی 4 ماه تقریبا 11 کیلو کم کردم که تقریبا همون مقداری بود که می‌خواستم.
                            </p>
                        </div>

                        <div class="item dir-rtl d-flex mx-n2">
                            <div class="px-2">
                                <div class="thumb text-center mx-auto" style="width: 70px; height: 70px;">
                                    <img data-src="https://sarehal.com/wp-content/uploads/2021/06/Testimonial-Firouzi.jpg"
                                         width="100" height="100" class="img-fit lazyload rounded-full">
                                </div>
                                <div class="text-nowrap">
                                    <p class="fw-bold font-20 mt-2">زهرا فیروزی</p>
                                    <div class="stars dir-ltr font-12 mt-1">
                                        <i class="fa fa-star fill"></i>
                                        <i class="fa fa-star fill"></i>
                                        <i class="fa fa-star fill"></i>
                                        <i class="fa fa-star fill"></i>
                                        <i class="fa fa-star fill"></i>
                                    </div>
                                </div>
                            </div>

                            <p class="px-2 font-xs-16 text-justify">
                                سرِحال یکی از دغدغه‌های اصلی من رو که افزایش وزن و بالابردن حجم عضله بود، برطرف کرد.
                                پیگیری‌های مداوم مربی‌م به همراه مشاوره‌های تخصصیش باعث شد که در این مسیر با انگیزه‌ی
                                زیادی پیش برم و برعکس برنامه‌های قبلی که داشتم نیمه‌کاره رها نکنم
                                و الآن سرِحال و سالمم.
                            </p>
                        </div>

                        <div class="item dir-rtl d-flex mx-n2">
                            <div class="px-2">
                                <div class="thumb text-center mx-auto" style="width: 70px; height: 70px;">
                                    <img data-src="https://sarehal.com/wp-content/uploads/2021/06/WhatsApp-Image-2021-06-20-at-10.37-1.png"
                                         width="100" height="100" class="img-fit lazyload rounded-full">
                                </div>
                                <div class="text-nowrap">
                                    <p class="fw-bold font-20 mt-2">فائزه بادله</p>
                                    <div class="stars dir-ltr font-12 mt-1">
                                        <i class="fa fa-star fill"></i>
                                        <i class="fa fa-star fill"></i>
                                        <i class="fa fa-star fill"></i>
                                        <i class="fa fa-star fill"></i>
                                        <i class="fa fa-star fill"></i>
                                    </div>
                                </div>
                            </div>

                            <p class="px-2 font-xs-16 text-justify">
                                من 74 کیلو بودم و به مدت 3 ماه از اشتراک فیتنس تیم سرِحال استفاده کردم.الآن 64 کیلوام و
                                با وجود اینکه
                                هنوز 4 کیلو با وزن ایده‌آلم فاصله دارم، خیلی از هیکلم راضی‌ام. خواستم یک تشکر ویژه از
                                تیم حرفه‌ای سرِحال بکنم.
                            </p>
                        </div>
                    </div>
                </div>

                <h2 class="font-28 h-b-line text-center fw-bold mb-4 mt-6">سرمایه گذاری شما</h2>
                <table class="table mt-6">
                    <tr>
                        <td colspan="2" class="text-center">
                            <div class="row jc-center mt-n3 py-3 jc-sm-between mx-n2 ai-center">
                                <input type="text" name="discount-code" class="form-control mt-3 radius-25 max-w-300 mx-2" placeholder="کد تخفیف">

                                <button type="button" class="apply_discount btn btn-main font-16 radius-25 text-white px-5 mt-3 mx-2">اعمال</button>
                            </div>

                            <p id="discount_alert" class="display-none fg-red font-13"></p>
                        </td>
                    </tr>

                    <tr>
                        <td class="text-right">
                            <p class="fw-semibold font-20">اشتراک فیتنس با سرِحال</p>
                            <p class="mt-2 pr-2">تخفیف تابستانه</p>
                            <p class="display-none discount_summary mt-2 pr-2">کد تخفیف</p>
                            <p class="mt-2 pr-2">مالیات بر ارزش افزوده</p>
                        </td>
                        <td class="text-left">
                            <p class="font-18 fg-gray">
                                <del id="plan_lined_price">189,000</del>
                                تومان
                            </p>
                            <p class="mt-2 fg-red fw-semibold font-20 dir-ltr">-<b id="plan_percentage">50</b><span
                                        class="font-sans-serif font-17">%</span>
                            </p>
                            <p class="display-none discount_summary mt-2 fg-red fw-semibold font-20 dir-ltr">-<b id="discount_summary_percentage">20</b><span
                                        class="font-sans-serif font-17">%</span>
                            </p>
                            <p class="mt-2 fg-green fw-semibold font-20 dir-ltr">+9<span
                                        class="font-sans-serif font-17">%</span></p>
                        </td>
                    </tr>

                    <tr>
                        <td class="text-right">
                            <p class="fw-semibold font-20">قابل پرداخت</p>
                            <p id="plan_price" class="fg-main font-22 fw-semibold mt-1">149,000 تومان</p>
                        </td>

                        <td class="text-left">
                            <a href="https://www.zarinpal.com/trustPage/sarehal.com" target="_blank" class="max-w-200">
                                <img src="https://cdn.zarinpal.com/badges/trustLogo/1.svg" width="60" height="85"
                                     alt="پرداخت امن با زرین پال">
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="text-right">
                            <ul class="list-style-disc list-style-inside mr-n1 font-14 my-n2">
                                <li class="my-2 lh-1">ضمانت بازگشت وجه پس از یک هفته در صورت عدم رضایت</li>
                                <li class="my-2 lh-1">اطلاعات بیشتر در <a class="fg-main bb-dashed" href="#faq-popup"
                                                                          data-toggle="modal">سؤالات پرتکرار</a></li>
                            </ul>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="text-center text-sm-left bt-0">
                            <button id="btn-payment-step" type="button"
                                    class="go_payment btn btn-dark min-w-200 radius-25 text-white px-5 mb-3">
                                پرداخت و دریافت اشتراک

                                <i class="far fa-spinner-third process-animation text-white mr-3"
                                   style="display: none;"></i>
                            </button>
                        </td>
                    </tr>
                </table>

                <div class="display-none alert alert-danger w-100 mx-auto p-3 mt-5"></div>

                <div class="modal fade" id="faq-popup" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered radius-17">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="voucher_accordion" class="index-accordion mb-n3">
                                    <div class="card mb-3 overflow-hidden b-0 bg-1 radius-10">
                                        <div class="card-header bg-transparent p-0 bb-0">
                                            <a class="collapsed d-flex ai-center jc-between fg-main p-3 font-20 font-xs-18"
                                               data-toggle="collapse" href="#collapse2" aria-expanded="false">
                                                منظور از مربی‌گری تندرستی سرِحال چیست و چرا بهتر است از آن استفاده کنیم؟
                                                <i class="far fa-chevron-down font-16"></i>
                                            </a>
                                        </div>

                                        <div id="collapse2" data-parent="#voucher_accordion" class="collapse">
                                            <div class="card-body text-justify p-3">
                                                شخصی‌سازی خدمات سرِحال برای سلامت‌جویان از مهم‌ترین اهدافی است که در
                                                سرِحال دنبال می‌کنیم.
                                                مربیان تندرستی سرِحال، علاوه بر برقراری ارتباط شخصی
                                                با شما برای مطمئن‌شدن از تناسب هرچه بیشتر خدمات سرِحال با شرایط شما،
                                                با استفاده از تکنیک‌های انگیزشی و آموزشی مختلف، روند رسیدن شما به هدفتان
                                                را آسان‌تر می‌کنند.
                                                مقالات مختلف علمی و تجربیات سرِحال، نقش مربی‌گری را در رسیدن صحیح به
                                                تندرستی بسیار مهم می‌دانند.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-3 overflow-hidden b-0 bg-1 radius-10">
                                        <div class="card-header bg-transparent p-0 bb-0">
                                            <a class="collapsed d-flex ai-center jc-between fg-main p-3 font-20 font-xs-18"
                                               data-toggle="collapse" href="#collapse4" aria-expanded="false">
                                                در طول مدت اشتراک، چند بار می‌توانم برای برنامه‌ی خود درخواست ویرایش
                                                کنم؟
                                                <i class="far fa-chevron-down font-16"></i>
                                            </a>
                                        </div>

                                        <div id="collapse4" data-parent="#voucher_accordion" class="collapse">
                                            <div class="card-body text-justify p-3">
                                                هر زمان که شما یا مربی تندرستی‌تان احساس کنید که برنامه‌ی تندرستی سرِحال
                                                نیاز به ویرایش دارد،
                                                برنامه‌ی شما ویرایش می‌شود
                                                و در این زمینه هیچ محدودیتی وجود ندارد. ویرایش‌های متعدد به ما این امکان
                                                را می‌دهد که خدمات ما
                                                به بهترین نحو، متناسب با نیازهای شما باشند.
                                                به علاوه، در صورتی که مدت زمان اشتراک شما بیش از یک ماه باشد، برنامه‌ی
                                                تندرستی شما ابتدای هر ماه
                                                عوض خواهد شد.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-3 overflow-hidden b-0 bg-1 radius-10">
                                        <div class="card-header bg-transparent p-0 bb-0">
                                            <a class="collapsed d-flex ai-center jc-between fg-main p-3 font-20 font-xs-18"
                                               data-toggle="collapse" href="#collapse3" aria-expanded="false">
                                                بر صورت عدم رضایت از خدمات سرِحال، چگونه می‌توانم اشتراک خود را لغو کنم؟
                                                <i class="far fa-chevron-down font-16"></i>
                                            </a>
                                        </div>

                                        <div id="collapse3" data-parent="#voucher_accordion" class="collapse">
                                            <div class="card-body text-justify p-3">
                                                یت شما از سرِحال و رسیدن به هدفتان، مهم‌ترین هدف ما در سرِحال است. در
                                                صورت عدم رضایت از خدمات
                                                سرِحال تا یک هفته پس از شروع اشتراک،
                                                می‌توانید با ارسال پیام به شماره‌ی واتساپ 09901100715، مشکل خود را اعلام
                                                کنید و در صورت عدم جلب
                                                رضایت شما،
                                                مبلغ اشتراک ظرف ۷۲ ساعت به حساب بانکی شما بازگردانده خواهد شد.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="card mb-3 overflow-hidden b-0 bg-1 radius-10">
                                        <div class="card-header bg-transparent p-0 bb-0">
                                            <a class="d-flex ai-center jc-between fg-main p-3 font-20 font-xs-18"
                                               data-toggle="collapse" href="#collapse1" aria-expanded="true">
                                                در صورت عدم رضایت از خدمات سرِحال، چگونه می‌توانم اشتراک خود را لغو کنم؟
                                                <i class="far fa-chevron-down font-16"></i>
                                            </a>
                                        </div>

                                        <div id="collapse1" data-parent="#voucher_accordion" class="collapse show">
                                            <div class="card-body p-3">
                                                رضایت شما از سرِحال و رسیدن به هدفتان، مهم‌ترین هدف ما در سرِحال است. در صورت عدم رضایت از خدمات سرِحال تا یک هفته پس از شروع اشتراک،
                                                می‌توانید با ارسال پیام به شماره‌ی واتساپ 09901100715، مشکل خود را اعلام کنید و در صورت عدم جلب رضایت شما،
                                                مبلغ اشتراک ظرف ۷۲ ساعت به حساب بانکی شما بازگردانده خواهد شد.
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="card mb-3 overflow-hidden b-0 bg-1 radius-10">
                                        <div class="card-header bg-transparent p-0 bb-0">
                                            <a class="collapsed d-flex ai-center jc-between fg-main p-3 font-20 font-xs-18"
                                               data-toggle="collapse" href="#collapse1" aria-expanded="false">
                                                برنامه‌ی ذهن در برنامه‌ی تندرستی سرِحال چیست؟
                                                <i class="far fa-chevron-down font-16"></i>
                                            </a>
                                        </div>

                                        <div id="collapse1" data-parent="#voucher_accordion" class="collapse">
                                            <div class="card-body text-justify p-3">
                                                ما در سرِحال معتقدیم که رسیدن به اهداف مرتبط با تندرستی (چه تناسب اندام
                                                و چه اهداف دیگر) بدون
                                                توجه به هر سه بخش تغذیه، تمرین و ذهن ممکن نیست.
                                                به طور مثال، اگر خواب شما کافی نباشد و میزان استرس شما بیش از حد باشد،
                                                سخت‌تر به هدف خود خواهید
                                                رسید. به همین دلیل در سرِحال تلاش می‌کنیم
                                                تا با شناسایی نیازهای روانی شما و با استفاده از تکنیک‌های مختلف مدیتیشن،
                                                به شما در رسیدن همیشگی
                                                به اهدافتان کمک کنیم.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-3 overflow-hidden b-0 bg-1 radius-10">
                                        <div class="card-header bg-transparent p-0 bb-0">
                                            <a class="collapsed d-flex ai-center jc-between fg-main p-3 font-20 font-xs-18"
                                               data-toggle="collapse" href="#collapse5" aria-expanded="false">
                                                منظور از لیست خرید در برنامه‌ی تندرستی سرِحال چیست؟
                                                <i class="far fa-chevron-down font-16"></i>
                                            </a>
                                        </div>

                                        <div id="collapse5" data-parent="#voucher_accordion" class="collapse">
                                            <div class="card-body text-justify p-3">
                                                این لیست برای راحتی هرچه بیشتر شما تهیه می‌شود. در این لیست، هر آنچه که
                                                در برنامه‌ی تندرستی خود
                                                نیاز به تهیه‌ی آن‌ها دارید، به صورت منظم آورده شده است.
                                                کافی است در ابتدای برنامه‌ی خود، هر آنچه را که نیاز دارید، از لیست خرید
                                                خود ببینید و تهیه کنید.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="position-fixed bottom-0 pt-4 w-100 z-index-2 d-none d-sm-block">
            <div style="background-color: #493e9a;" class="text-white font-15 text-center dir-ltr py-1">
                <div class="container">
                    <p class="d-inline-block">مرکز آنلاین تندرستی سرِحال</p>
                    <span class="mx-2">|</span>
                    <span>1400 - 1401 <?php // echo parsidate('Y', 'now', 'per'); ?></span>
                </div>
            </div>
        </footer>
    </form>
</section>