<?php
$db   = new SarehalDbManager();
$slug = esc_sql( $_GET['plan'] );
$plan = $db->get_result_by( $db->table_plans, "slug = '$slug'" );
$plan || wp_redirect( home_url() );
?>
<section class="voucher-details py-6">
    <div class="container">
        <h2 class="font-28 h-b-line text-center fw-bold mb-3">تندرستی، آسون تر از همیشه!</h2>

        <div class="row ai-center">
            <div class="col-lg-6 mt-5">
                <p class="font-20 text-center text-lg-right">
                    شما اشتراک <?php echo $db->get_row( $db->table_plans_durations, $plan->duration_id )->name; ?> <b
                            class="font-22"><?php echo $plan->name; ?></b> را انتخاب کردید.
                    <br>
                    در این اشتراک، خدمات زیر را دریافت می کنید:
                </p>

				<?php $options = unserialize( $plan->options ); ?>
				<?php if ( $options ): ?>
                    <ul class="pkg-items mt-5">
						<?php foreach ( $options as $option_id => $option ): ?>
							<?php if ( $option['active'] ): ?>
                                <li class="my-2"><?php echo $db->get_row( $db->table_plans_options, $option_id )->name; ?></li>
							<?php endif; ?>
						<?php endforeach; ?>
                    </ul>
				<?php endif; ?>
            </div>

            <div class="col-lg-6 bg-white mt-5">
                <form action="" method="post" class="bg-white p-3 p-sm-4 radius-17">
                    <input type="hidden" name="plan_id" value="<?php echo $plan->ID; ?>">
                    <input type="text" class="form-control radius-25 mb-3" name="fullname"
                           placeholder="نام و نام خانوادگی (الزامی)">
                    <input type="tel" class="form-control radius-25" name="phone"
                           placeholder="شماره همراه (الزامی) : 09301234567">

                    <div class="errors-wrap alert alert-danger mx-1 font-14 mt-3 mb-5 display-none"></div>

                    <div class="discount-box radius-25 px-2 mb-n2 pb-3 mt-3">
                        <div class="row jc-center py-0 jc-sm-between mx-n2 ai-center">
                            <input type="text" name="discount-code" class="form-control mt-3 radius-25 max-w-300 mx-2"
                                   placeholder="کد تخفیف">

                            <button type="button"
                                    class="apply_discount btn btn-main font-16 radius-25 text-white px-5 mt-3 mx-2">
                                اعمال
                            </button>
                        </div>
                    </div>

                    <p id="discount_alert" class="display-none fg-red font-14 text-center mt-4"></p>

                    <div class="row flex-row-reverse ai-center mx-n2 ai-end jc-between">
                        <div class="px-2 mt-4">
                            <a href="https://www.zarinpal.com/trustPage/sarehal.com" target="_blank">
                                <img src="https://cdn.zarinpal.com/badges/trustLogo/1.svg" width="70" height="85"
                                     class="img-fluid" alt="پرداخت امن با زرین پال">
                            </a>
                        </div>

                        <div class="text-center mx-2 mt-4">
							<?php if ( ! empty( $plan->lined_price ) ): ?>
                                <p class="mb-n1 font-17 fg-main">
                                    <del><?php echo number_format( $plan->lined_price ); ?></del>
                                    تومان
                                </p>
							<?php endif; ?>
                            <p class="mb-2 font-20 fg-red">
                                <span id="plan_price" class="font-30"><?php echo number_format( $plan->price ); ?></span>
                                تومان
                            </p>

                            <button type="button" id="submit_pay"
                                    class="btn btn-fat btn-dark font-xs-16 px-4 radius-25">
                                ثبت و پرداخت
                                <i class="far fa-spinner-third process-animation text-white mr-2"
                                   style="display: none;"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="voucher-faq py-6">
    <div class="container">
        <h2 class="font-28 h-b-line text-center fw-bold mb-5">سوالات پر تکرار</h2>

        <div id="voucher_accordion" class="index-accordion mb-n3 mt-5">
            <div class="card mb-3 overflow-hidden b-0 bg-1 radius-10">
                <div class="card-header bg-transparent p-0 bb-0">
                    <a class="collapsed d-flex ai-center jc-between fg-main p-3 font-20"
                       data-toggle="collapse" href="#collapse2" aria-expanded="false">
                        منظور از مربی‌گری تندرستی سرِحال چیست و چرا بهتر است از آن استفاده کنیم؟
                        <i class="far fa-chevron-down font-16"></i>
                    </a>
                </div>

                <div id="collapse2" data-parent="#voucher_accordion" class="collapse">
                    <div class="card-body text-justify p-3">
                        شخصی‌سازی خدمات سرِحال برای سلامت‌جویان از مهم‌ترین اهدافی است که در سرِحال دنبال می‌کنیم.
                        مربیان تندرستی سرِحال، علاوه بر برقراری ارتباط شخصی
                        با شما برای مطمئن‌شدن از تناسب هرچه بیشتر خدمات سرِحال با شرایط شما،
                        با استفاده از تکنیک‌های انگیزشی و آموزشی مختلف، روند رسیدن شما به هدفتان را آسان‌تر می‌کنند.
                        مقالات مختلف علمی و تجربیات سرِحال، نقش مربی‌گری را در رسیدن صحیح به تندرستی بسیار مهم می‌دانند.
                    </div>
                </div>
            </div>

            <div class="card mb-3 overflow-hidden b-0 bg-1 radius-10">
                <div class="card-header bg-transparent p-0 bb-0">
                    <a class="collapsed d-flex ai-center jc-between fg-main p-3 font-20"
                       data-toggle="collapse" href="#collapse4" aria-expanded="false">
                        در طول مدت اشتراک، چند بار می‌توانم برای برنامه‌ی خود درخواست ویرایش کنم؟
                        <i class="far fa-chevron-down font-16"></i>
                    </a>
                </div>

                <div id="collapse4" data-parent="#voucher_accordion" class="collapse">
                    <div class="card-body text-justify p-3">
                        هر زمان که شما یا مربی تندرستی‌تان احساس کنید که برنامه‌ی تندرستی سرِحال نیاز به ویرایش دارد،
                        برنامه‌ی شما ویرایش می‌شود
                        و در این زمینه هیچ محدودیتی وجود ندارد. ویرایش‌های متعدد به ما این امکان را می‌دهد که خدمات ما
                        به بهترین نحو، متناسب با نیازهای شما باشند.
                        به علاوه، در صورتی که مدت زمان اشتراک شما بیش از یک ماه باشد، برنامه‌ی تندرستی شما ابتدای هر ماه
                        عوض خواهد شد.
                    </div>
                </div>
            </div>

            <div class="card mb-3 overflow-hidden b-0 bg-1 radius-10">
                <div class="card-header bg-transparent p-0 bb-0">
                    <a class="collapsed d-flex ai-center jc-between fg-main p-3 font-20"
                       data-toggle="collapse" href="#collapse3" aria-expanded="false">
                        در صورت عدم رضایت از خدمات سرِحال، چگونه می‌توانم اشتراک خود را لغو کنم؟
                        <i class="far fa-chevron-down font-16"></i>
                    </a>
                </div>

                <div id="collapse3" data-parent="#voucher_accordion" class="collapse">
                    <div class="card-body text-justify p-3">
                        یت شما از سرِحال و رسیدن به هدفتان، مهم‌ترین هدف ما در سرِحال است. در صورت عدم رضایت از خدمات
                        سرِحال تا یک هفته پس از شروع اشتراک،
                        می‌توانید با ارسال پیام به شماره‌ی واتساپ 09901100715، مشکل خود را اعلام کنید و در صورت عدم جلب
                        رضایت شما،
                        مبلغ اشتراک ظرف ۷۲ ساعت به حساب بانکی شما بازگردانده خواهد شد.
                    </div>
                </div>
            </div>

            <!-- <div class="card mb-3 overflow-hidden b-0 bg-1 radius-10">
                <div class="card-header bg-transparent p-0 bb-0">
                    <a class="d-flex ai-center jc-between fg-main p-3 font-20"
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
                    <a class="collapsed d-flex ai-center jc-between fg-main p-3 font-20"
                       data-toggle="collapse" href="#collapse1" aria-expanded="false">
                        برنامه‌ی ذهن در برنامه‌ی تندرستی سرِحال چیست؟
                        <i class="far fa-chevron-down font-16"></i>
                    </a>
                </div>

                <div id="collapse1" data-parent="#voucher_accordion" class="collapse">
                    <div class="card-body text-justify p-3">
                        ما در سرِحال معتقدیم که رسیدن به اهداف مرتبط با تندرستی (چه تناسب اندام و چه اهداف دیگر) بدون
                        توجه به هر سه بخش تغذیه، تمرین و ذهن ممکن نیست.
                        به طور مثال، اگر خواب شما کافی نباشد و میزان استرس شما بیش از حد باشد، سخت‌تر به هدف خود خواهید
                        رسید. به همین دلیل در سرِحال تلاش می‌کنیم
                        تا با شناسایی نیازهای روانی شما و با استفاده از تکنیک‌های مختلف مدیتیشن، به شما در رسیدن همیشگی
                        به اهدافتان کمک کنیم.
                    </div>
                </div>
            </div>

            <div class="card mb-3 overflow-hidden b-0 bg-1 radius-10">
                <div class="card-header bg-transparent p-0 bb-0">
                    <a class="collapsed d-flex ai-center jc-between fg-main p-3 font-20"
                       data-toggle="collapse" href="#collapse5" aria-expanded="false">
                        منظور از لیست خرید در برنامه‌ی تندرستی سرِحال چیست؟
                        <i class="far fa-chevron-down font-16"></i>
                    </a>
                </div>

                <div id="collapse5" data-parent="#voucher_accordion" class="collapse">
                    <div class="card-body text-justify p-3">
                        این لیست برای راحتی هرچه بیشتر شما تهیه می‌شود. در این لیست، هر آنچه که در برنامه‌ی تندرستی خود
                        نیاز به تهیه‌ی آن‌ها دارید، به صورت منظم آورده شده است.
                        کافی است در ابتدای برنامه‌ی خود، هر آنچه را که نیاز دارید، از لیست خرید خود ببینید و تهیه کنید.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>