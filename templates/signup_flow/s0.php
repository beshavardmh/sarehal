<div id="welcome-step"
     class="step position-absolute w-100 h-100 text-center top-0 right-0 active">
    <div class="container pb-6 max-w-800">
        <h2 class="mt-3">دوست عزیز، سلام!
            <br>
            به <span class="fg-main py-2">سرِحال</span> خوش اومدی &nbsp; &#127881;
        </h2>

        <p class="font-22 font-xs-20 fw-semibold mb-4 py-3 mt-3">
            قبل از دریافت رژیم و برنامه‌ی تمرینی، نیازه که به چند تا سؤال پاسخ بدی.
        </p>

        <div class="d-flex jc-center">
            <button id="btn-welcome-step" type="button"
                    class="next_step btn btn-dark min-w-300 radius-25 d-flex ai-center jc-center text-white px-5 mt-2 lh-1">
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
            برای تناسب اندام در سن‌های متفاوت، نیازهای متفاوتی وجود دارند.
        </p>

        <div class="mt-4">
            <input type="number" class="line-input w-100 max-w-300 font-20" name="age-step"
                   placeholder="سن:" min="10" max="100">
        </div>

        <div class="display-none alert alert-danger w-100 max-w-300 mx-auto px-3 mb-0 mt-5"></div>

        <div class="d-flex jc-center">
            <button id="btn-age-step" type="button"
                    class="next_step btn btn-dark hidden min-w-300 radius-25 d-flex ai-center jc-center text-white px-5 mt-5 lh-1">
                ادامه
                <i class="fal fa-chevron-left font-14 position-relative top-n1 mr-3"></i>
            </button>
        </div>
    </div>
</div>

<div id="gender-step"
     class="step position-absolute w-100 h-100 text-center top-0 right-0">
    <div class="container pb-6 max-w-800">
        <p class="font-22 font-xs-20 fw-semibold mb-5">جنسیت و هورمون‌‌ها، اثر ویژه‌ای روی سوخت‌وساز ما دارند.</p>

        <div class="d-flex flex-column ai-center jc-center">
            <label id="btn-gender-step"
                   class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-300 outline_option has_hvr_bg d-flex ai-center jc-center">
                <div class="icon-wrap bg-1 ml-2">
                    <i class="fal fa-venus fg-main font-20"></i>
                </div>
                زن هستم.
                <input type="radio" class="d-none" name="gender-step" value="female">
            </label>

            <label id="btn-gender-step"
                   class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-300 outline_option has_hvr_bg d-flex ai-center jc-center">
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
        <p class="font-22 font-xs-20 fw-semibold mb-5"> تحقیقات می‌گویند<span class="fg-main">رژیم یا برنامه‌ی تمرین اختصاصی</span>،
             ۳۰٪ بیشتر باعث تغییر بلندمدت بدن می‌شود.
        </p>

        <div class="mt-4">
            <input type="number" class="line-input w-100 max-w-300 font-20" name="height-step"
                   placeholder="قد (سانتی‌متر):" min="140" max="220">
        </div>

        <div class="mt-4">
            <input type="number" class="line-input w-100 max-w-300 font-20" name="weight-step"
                   placeholder="وزن (کیلوگرم):" min="25" max="250">
        </div>

        <div class="display-none alert alert-danger w-100 max-w-300 mx-auto px-3 mb-0 mt-5"></div>

        <!-- <div class="calc_bmi hidden mt-5">
            <p id="bmi_status_val" class="font-22 font-xs-20 fw-semibold"></p>
        </div> -->

        <div class="d-flex jc-center">
            <button id="btn-bmi-step" type="button"
                    class="next_step btn btn-dark hidden min-w-300 radius-25 d-flex ai-center jc-center text-white px-5 mt-5 lh-1">
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
            در معرض کدام یک از بیماری‌های زیر هستی؟
        </p>

        <label class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-300 w-100 max-w-300 mx-auto outline_option d-flex ai-center jc-center">
            <i class="fal fa-square font-18"></i>
            <p class="mr-2 mt-1">کمبود تستوسترون</p>
            <input type="checkbox" class="d-none" name="sickness-step[]" value="کمبود تستوسترون">
        </label>

        <label class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-300 w-100 max-w-300 mx-auto outline_option d-flex ai-center jc-center">
            <i class="fal fa-square font-18"></i>
            <p class="mr-2 mt-1">بیماری قلبی یا سکته</p>
            <input type="checkbox" class="d-none" name="sickness-step[]" value="بیماری قلبی یا سکته">
        </label>

        <label class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-300 w-100 max-w-300 mx-auto outline_option d-flex ai-center jc-center">
            <i class="fal fa-square font-18"></i>
            <p class="mr-2 mt-1">فشار خون بالا</p>
            <input type="checkbox" class="d-none" name="sickness-step[]" value="فشار خون بالا">
        </label>

        <label class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-300 w-100 max-w-300 mx-auto outline_option d-flex ai-center jc-center">
            <i class="fal fa-square font-18"></i>
            <p class="mr-2 mt-1">دیابت</p>
            <input type="checkbox" class="d-none" name="sickness-step[]" value="دیابت">
        </label>

        <label class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-300 w-100 max-w-300 mx-auto outline_option d-flex ai-center jc-center">
            <i class="fal fa-square font-18"></i>
            <p class="mr-2 mt-1">پوکی استخوان</p>
            <input type="checkbox" class="d-none" name="sickness-step[]" value="پوکی استخوان">
        </label>

        <label class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-300 w-100 max-w-300 mx-auto outline_option d-flex ai-center jc-center">
            <i class="fal fa-square font-18"></i>
            <p class="mr-2 mt-1">اضطراب و افسردگی</p>
            <input type="checkbox" class="d-none" name="sickness-step[]" value="اضطراب و افسردگی">
        </label>

        <label class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-300 w-100 max-w-300 mx-auto outline_option d-flex ai-center jc-center">
            <i class="fal fa-square font-18"></i>
            <p class="mr-2 mt-1">سایر</p>
            <input type="checkbox" class="d-none" name="sickness-step[]" value="سایر">
        </label>

        <label class="radius-30 lh-2_4 px-3 py-2 mt-4 min-w-300 w-100 max-w-300 mx-auto outline_option d-flex ai-center jc-center">
            <i class="fal fa-square font-18"></i>
            <p class="mr-2 mt-1">هیچکدام</p>
            <input type="checkbox" class="d-none" name="sickness-step[]" data-option="none" value="هیچکدام">
        </label>

        <div class="display-none alert alert-danger w-100 max-w-500 mx-auto px-3 mb-0 mt-5"></div>

        <div class="d-flex jc-center mb-4">
            <button id="btn-sickness-step" type="button"
                    class="next_step btn btn-dark hidden min-w-300 radius-25 d-flex ai-center jc-center text-white px-5 mt-5 lh-1">
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
                <img data-src="https://sarehal.com/wp-content/uploads/2021/06/Before-After-Ebadi.png"
                     width="511" height="451"
                     class="img-fluid lazyload radius-10" alt="Sarehal Testimonial">
            </div>
            <div class="col-lg-5 mt-4">
                <h2 class="font-30 text-center font-xs-26 fw-bold">داستان‌های سرِحال: محمد عبادی</h2>
                <p class="text-right font-18 font-xs-16 mt-3">
                    محمد، ۳۱ ساله، قبل از مراجعه به سرِحال، ۱۳۸ کیلوگرم بود
                    و راه‌های مختلفی رو از
                    کالری‌شماری تا هر روز دویدن امتحان کرده بود، اما نتیجه نگرفته بود.
                    </br>
                    محمد فروردین ۱۳۹۹ شروع به کار با سرِحال کرد و بعد از یک سال رژیم و تمرین و با اراده‌ی قوی خودش، تونست
                    ۴۸ کیلوگرم وزن کم کنه و این کاهش وزن رو نگه داره.
                </p>
                <div class="d-flex jc-center">
                    <button id="btn-testimonial-step" type="button"
                        class="next_step btn btn-dark min-w-300 radius-25 d-flex ai-center jc-center text-white px-5 mt-3 lh-1">
                        قهرمان بعدی باش
                    <i class="fal fa-chevron-left font-14 position-relative top-n1 mr-3"></i>
                  </button>
               </div>
            </div>
        </div>
    </div>
</div>

<div id="information-step"
     class="step position-absolute w-100 h-100 text-center top-0 right-0">
    <div class="container pb-6 max-w-900">
        <h2 class="font-28 h-b-line text-center mb-4">دریافت برنامه از سرِحال</h2>
        <div class="row flex-column flex-lg-row ai-center jc-center mt-n5 mt-lg-0">
            <div class="col-lg-5 mt-4 d-block d-sm-none">
                <img data-src="https://sarehal.com/wp-content/uploads/2021/08/mPromotion.png"
                     width="511" height="451"
                     class="img-fluid lazyload radius-10" alt="Promotion">
            </div>
            <div class="col-lg-5 d-none d-sm-block">
                <img data-src="https://sarehal.com/wp-content/uploads/2021/08/dPromotion.png"
                     width="511" height="451"
                     class="img-fluid lazyload radius-10" alt="Promotion">
            </div>
            <div class="col-lg-5 mt-4">
                <p class="fw-semibold text-right">
                    برای دریافت برنامه‌ غذایی یا تمرینی، ابتدا ثبت نام کنید و برنامه‌های مورد نیاز خود را انتخاب کنید. بعد از پرداخت و
                    تکمیل پرونده‌ی پزشکی، برنامه‌های خود را دریافت می‌کنید.
                </p>
                <p class="text-right fw-light">
                توجه داشته باشید که برنامه‌ها توسط متخصصین سرِحال آماده خواهند شد و زمان مورد نیاز
                    برای آماده‌سازی برنامه‌ها بین ۲۴ تا ۷۲ ساعت است.
                </p>
                <div class="mt-4">
                    <input type="text" class="line-input-colored w-100 max-w-300 font-20" name="fullname-step"
                        placeholder="نام و نام خانوادگی:">
                </div>
                <div class="mt-4">
                    <input type="tel" class="line-input-colored w-100 max-w-300 font-20" name="phone-step"
                        placeholder="شماره همراه (مثل 09901100715):">
                </div>
                <label class="w-100 mx-auto mt-6 d-flex ai-center jc-right">
                    <input type="checkbox" class="position-relative top-n2" checked name="sms-step" value="sms">
                    <p class="mr-2 font-14 text-right">مایلم برای اطلاع از جدیدترین تخفیف‌ها پیامک دریافت کنم.</p>
                </label>

                <!--<p class="mt-4 fg-pencil">با ثبت نام در سرِحال، شما <a href="#terms-popup" data-toggle="modal" class="fg-main bb-dashed">قوانین
                        حریم خصوصی</a> سایت سرِحال را می‌پذیرید.</p>

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
                </div>-->

                <div class="display-none alert alert-danger w-100 max-w-500 mx-auto px-3 mb-0 mt-5"></div>

                <div class="d-flex jc-center">
                   <button id="btn-information-step" type="button"
                        class="next_step btn btn-dark hidden min-w-200 radius-25 d-flex ai-center jc-center text-white px-5 mt-5 lh-1">
                        ثبت درخواست و ادامه
                    <i class="fal fa-chevron-left font-14 position-relative top-n1 mr-3"></i>

                    <i class="far fa-spinner-third process-animation text-white mr-3" style="display: none;"></i>
                    </button>
                </div>               
            </div>
        </div>
    </div>
</div>

<div id="thankyou-step"
     class="step position-absolute w-100 h-100 text-center top-0 right-0 active">
    <div class="container pb-6 max-w-800">
        <h2 class="mt-3">با تشکر از شما! &#9989;
        </h2>

        <p class="font-22 font-xs-20 fw-semibold mb-4 py-3">
            متخصصان سرِحال به زودی با شما تماس خواهند گرفت.
        </p>
    </div>
</div>