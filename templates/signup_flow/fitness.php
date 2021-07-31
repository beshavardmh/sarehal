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

<div id="services-step"
     class="step position-absolute w-100 h-100 text-center top-0 right-0">
    <div class="container pb-6 max-w-1000">
        <h3>
            خدمات مورد نیاز خود را انتخاب کنید.
        </h3>

        <div class="row jc-center mt-n4 mt-lg-2">
            <label id="label-services-step" class="col-lg-4 mt-4">
                <div class="item outline_option has_hvr_bg overflow-hidden radius-21 p-3">
                    <div class="bg-1 d-flex ai-center jc-center rounded-full mx-auto"
                         style="width: 60px; height: 60px">
                        <i class="fal fa-utensils-alt font-36 fg-main"></i>
                    </div>

                    <h3 class="my-3 font-26">برنامه‌های تغذیه و تمرین اختصاصی</h3>

                    <ul class="list-style-disc list-style-inside text-right font-16">
                        <li class="mt-1">مبتنی بر هدف و سبک زندگی شما</li>
                        <li class="mt-1"> طراحی انواع رژیم‌های خاص مثل کتوژنیک</li>
                        <li class="mt-1">برنامه‌ی تمرین در باشگاه، خانه و فضای باز</li>
                        <li class="mt-1">مبتنی بر جدیدترین یافته‌های علمی</li>
                        <li class="mt-1">با قابلیت ویرایش نامحدود</li>
                    </ul>
                    <input type="checkbox" class="d-none" name="services-step[]" value="برنامه">
                </div>
            </label>

            <label id="label-services-step" class="col-lg-4 mt-4">
                <div class="item outline_option has_hvr_bg overflow-hidden radius-21 p-3">
                    <div class="bg-1 d-flex ai-center jc-center rounded-full mx-auto"
                         style="width: 60px; height: 60px">
                        <i class="fal fa-hands-heart font-36 fg-main"></i>
                    </div>

                    <h3 class="my-3 font-26">مربی تغذیه و تمرین اختصاصی</h3>

                    <ul class="list-style-disc list-style-inside text-right font-16">
                        <li class="mt-1">تقویت انگیزه‌ی شما تا رسیدن به هدف</li>
                        <li class="mt-1">آموزش اصول صحیح تغذیه و تمرینات</li>
                        <li class="mt-1">پاسخ‌گویی همیشگی</li>
                        <li class="mt-1">مبتنی بر جدیدترین یافته‌های علمی</li>
                        <li class="mt-1">افزایش بیش از ۵۰٪ موفقیت شما</li>
                    </ul>
                    <input type="checkbox" class="d-none" name="services-step[]" value="مربی">
                </div>
            </label>
        </div>

        <div class="display-none alert alert-danger w-100 max-w-500 mx-auto p-3 mt-5"></div>

        <div class="d-flex jc-center mb-4">
            <button id="btn-services-step" type="button"
                    class="next_step btn btn-dark hidden min-w-200 radius-25 d-flex ai-center jc-center text-white px-5 mt-5 lh-1">
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
            اطلاعات خود را وارد کنید تا یک جلسه مشاوره‌ی رایگان با مشاوران متخصص سرِحال دریافت کنید.
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

<div id="thankyou-step"
     class="step position-absolute w-100 h-100 text-center top-0 right-0 active">
    <div class="container pb-6 max-w-800">
        <h2 class="mt-3">با تشکر از شما!  &#128591;
            <br>
            درخواست مشاوره‌ی رایگان شما ثبت شد.
        </h2>

        <p class="font-22 font-xs-20 fw-semibold mb-4 py-3">
            متخصصان سرِحال به زودی با شما تماس خواهند گرفت.
        </p>
    </div>
</div>