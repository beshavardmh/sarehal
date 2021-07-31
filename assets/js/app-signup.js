jQuery(document).ready(function ($) {
    /**
     * --- Define Functions Name ---
     * let functionName;
     *
     */
    let
        htmlClick,
        fixNumbers,
        isValidPhone,
        isNumeric,
        isValidName,
        isValidEmail,
        processBtn,
        signUpHandler,
        isValidHeight,
        isValidWeight,
        renderProgressBar,
        validationInformation,
        enterKeyHandler,
        goNextStep,
        goPrevStep,
        clearStepInputs,
        calcBMI,
        saveUserValidation,
        getPlanDetails,
        goPaymentValidation,
        applyDiscount,
        cardTestimonialSlider;


    /**
     * --- Init Function ---
     * functionName = ()=>{};
     *
     */
    htmlClick = () => {
        $(document).click(function (e) {
            if (
                !$(e.target).closest('#contact_btn').length &&
                !$(e.target).closest('#contact_popup').length &&
                !$(e.target).is('[data-open-contact-popup]')
            ) {
                let btn = $('#contact_btn');
                btn.removeClass('show');
                $('#contact_popup').fadeOut();
                $('#contact_popup .status-contact').fadeOut();
                btn.find('i').removeClass('far fa-times').addClass('fal fa-comment-alt-smile');
            }
        });
    }

    fixNumbers = (str) => {
        let persianNumbers = [/۰/g, /۱/g, /۲/g, /۳/g, /۴/g, /۵/g, /۶/g, /۷/g, /۸/g, /۹/g],
            arabicNumbers = [/٠/g, /١/g, /٢/g, /٣/g, /٤/g, /٥/g, /٦/g, /٧/g, /٨/g, /٩/g];

        if (typeof str === 'string') {
            for (var i = 0; i < 10; i++) {
                str = str.replace(persianNumbers[i], i).replace(arabicNumbers[i], i);
            }
        }
        return str;
    };

    isValidPhone = (val) => {
        let reg = new RegExp('^(\\+98|0)?9\\d{9}$');
        return reg.test(val);
    }

    isNumeric = (val) => {
        let reg = new RegExp('^\\d+$');
        return reg.test(val);
    }

    isValidName = (val) => {
        let reg = new RegExp('^[\u0600-\u06FF\\s]+$');
        // return reg.test(val) && val.length >= 3;
        return val.length >= 3;
    }

    isValidEmail = (val) => {
        let reg = new RegExp('^\\b[A-Z0-9._%-]+@[A-Z0-9.-]+\\.[A-Z]{2,4}\\b$', 'i');
        return reg.test(val);
    }

    processBtn = (btn, status = 'deactive') => {
        if (status == 'active') {
            $(btn).prop('disabled', true);
            $(btn).find('.process-animation').fadeIn();
        } else {
            $(btn).prop('disabled', false);
            $(btn).find('.process-animation').fadeOut();
        }

    }
    // --------------------
    signUpHandler = () => {
        if ($('.signup .step').length) {

            $('* .signup .step').removeClass('active').fadeOut();
            $('.signup .step').first().addClass('active').fadeIn();

            $('[name="age-step"]').on('input', function () {
                let val = parseInt($(this).val());
                if ($(this).val().length >= 2) {
                    if (val < $(this).attr('min') || val > $(this).attr('max')) {
                        $(this).val(null);
                        $('#age-step .next_step').addClass('hidden');
                    } else {
                        $('#age-step .next_step').removeClass('hidden');
                    }
                } else {
                    $('#age-step .next_step').addClass('hidden');
                }
            });

            $('[name="gender-step"]').on('change', function () {
                $('* #gender-step label').removeClass('selected');
                $(this).parent().addClass('selected');
                goNextStep();
            });

            $('[name="height-step"]').on('input', function () {
                let val = parseInt($(this).val());
                if ($(this).val().length >= 3) {
                    if (val < $(this).attr('min') || val > $(this).attr('max')) {
                        $(this).val(null);
                    }
                }
                calcBMI();
            });

            $('[name="weight-step"]').on('input', function () {
                let val = parseInt($(this).val());
                if ($(this).val().length >= 3) {
                    if (val < $(this).attr('min') || val > $(this).attr('max')) {
                        $(this).val(null);
                    }
                }
                calcBMI();
            });

            $('[name="sickness-step[]"]').on('change', function () {
                if ($(this).prop('checked') == true) {

                    $('[data-option="none"]').prop('checked', false);
                    $('[data-option="none"]').parent().removeClass('selected');
                    $('[data-option="none"]').parent().find('.fa-check-square').removeClass('fa-check-square').addClass('fa-square');

                    if ($(this).attr('data-option') == 'none') {
                        $('* [name="sickness-step[]"]').prop('checked', false);
                        $('* [name="sickness-step[]"]').parent().removeClass('selected');
                        $('* [name="sickness-step[]"]').parent().find('.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
                    }

                    $(this).prop('checked', true);
                    $(this).parent().addClass('selected');
                    $(this).parent().find('.fa-square').removeClass('fa-square').addClass('fa-check-square');

                } else {

                    $(this).parent().removeClass('selected');
                    $(this).parent().find('.fa-check-square').removeClass('fa-check-square').addClass('fa-square');

                }

                if ($('[name="sickness-step[]"]:checked').length) {
                    $('#sickness-step .next_step').removeClass('hidden');
                } else {
                    $('#sickness-step .next_step').addClass('hidden');
                }
            });

            $('[name="services-step[]"]').on('change', function () {
                if ($(this).prop('checked') == true) {

                    $('[data-option="none"]').prop('checked', false);
                    $('[data-option="none"]').parent().removeClass('selected');
                    $('[data-option="none"]').parent().find('.fa-check-square').removeClass('fa-check-square').addClass('fa-square');

                    if ($(this).attr('data-option') == 'none') {
                        $('* [name="services-step[]"]').prop('checked', false);
                        $('* [name="services-step[]"]').parent().removeClass('selected');
                        $('* [name="services-step[]"]').parent().find('.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
                    }

                    $(this).prop('checked', true);
                    $(this).parent().addClass('selected');
                    $(this).parent().find('.fa-square').removeClass('fa-square').addClass('fa-check-square');

                } else {

                    $(this).parent().removeClass('selected');
                    $(this).parent().find('.fa-check-square').removeClass('fa-check-square').addClass('fa-square');

                }

                if ($('[name="services-step[]"]:checked').length) {
                    $('#services-step .next_step').removeClass('hidden');
                } else {
                    $('#services-step .next_step').addClass('hidden');
                }
            });

            $('[name="fullname-step"]').on('input', function () {
                validationInformation();
            });

            $('[name="phone-step"]').on('input', function () {
                validationInformation();
            });

            $('[name="plans-step"]').on('change', function () {
                $('* #plans-step label').removeClass('selected');
                $(this).parent().addClass('selected');
                getPlanDetails();
            });

            $('.next_step').on('click', function () {
                if ($(this).hasClass('hidden')){
                    $(this).closest('.step').find('.alert').show().html('لطفا برای ادامه، به این سوال پاسخ دهید!');
                }
                else{
                    $(this).closest('.step').find('.alert').hide().html(null);
                    if ($('#information-step').hasClass('active')) {
                        saveUserValidation();
                    }
                    else {
                        goNextStep();
                    }
                }
            });

            $('.signup .go_payment').on('click', function () {
                goPaymentValidation();
            });

            renderProgressBar();
        }

        $('.signup .prev-step').on('click', function () {
            if (!$(this).hasClass('hidden')) {
                goPrevStep();
            }
        });
    }

    goNextStep = () => {
        $('html,body').scrollTop(0);

        let current_step = $('.signup .step.active');

        if (current_step.next('.step').length) {
            $('* .signup .step').removeClass('active').fadeOut();
            current_step.next('.step').addClass('active').fadeIn();
            current_step = $('.signup .step.active');

            if (current_step.attr('id') == 'welcome-step') {
                $('.signup .go-back').hide();
                $('.signup .go-home').show();
            } else {
                $('.signup .go-home').hide();
                $('.signup .go-back').show();
            }

            if (current_step.attr('id') == 'statistics-step') {
                $('.signup #statistics-step .circle-chart').show();
                $('#statistics-step .next_step').removeClass('hidden');
            }

            if (current_step.attr('id') == 'testimonial-step') {
                $('#testimonial-step .next_step').removeClass('hidden');
            }

            if (current_step.hasClass('sarehal-step')) {
                $('.signup .prev-step').addClass('white-img');
                $('.signup .main-logo').addClass('white-img');
            } else {
                $('.signup .prev-step').removeClass('white-img');
                $('.signup .main-logo').removeClass('white-img');
            }

            renderProgressBar();
        }
    }

    goPrevStep = () => {
        $('html,body').scrollTop(0);

        let current_step = $('.signup .step.active');

        if (current_step.prev('.step').length) {
            $('* .signup .step').removeClass('active').fadeOut();
            current_step.prev('.step').addClass('active').fadeIn();
            current_step = $('.signup .step.active');

            if (current_step.attr('id') == 'welcome-step') {
                $('.signup .go-back').hide();
                $('.signup .go-home').show();
            } else {
                $('.signup .go-home').hide();
                $('.signup .go-back').show();
            }

            if (current_step.hasClass('sarehal-step')) {
                $('.signup .prev-step').addClass('white-img');
                $('.signup .main-logo').addClass('white-img');
            } else {
                $('.signup .prev-step').removeClass('white-img');
                $('.signup .main-logo').removeClass('white-img');
            }

            clearStepInputs();

            renderProgressBar();
        }
    }

    clearStepInputs = () => {
        let currentStep = $('.signup .step.active').attr('id');

        switch (currentStep) {
            case 'gender-step':
                $('* #gender-step input[type="radio"]').prop('checked', false);
                $('* #gender-step label').removeClass('selected');
                break;
            case 'plans-step':
                $('* #plans-step input[type="radio"]').prop('checked', false);
                $('* #plans-step label').removeClass('selected');
                break;
        }
    }

    enterKeyHandler = () => {
        function validation(e) {
            if ($('#welcome-step').hasClass('active')) {
                if (!$('#welcome-step .next_step').hasClass('hidden')) {
                    goNextStep();
                }
            } else if ($('#age-step').hasClass('active')) {
                if (!$('#age-step .next_step').hasClass('hidden')) {
                    goNextStep();
                }
            } else if ($('#bmi-step').hasClass('active')) {
                if (!$('#bmi-step .next_step').hasClass('hidden')) {
                    goNextStep();
                }
            } else if ($('#statistics-step').hasClass('active')) {
                if (!$('#statistics-step .next_step').hasClass('hidden')) {
                    goNextStep();
                }
            } else if ($('#sickness-step').hasClass('active')) {
                if (!$('#sickness-step .next_step').hasClass('hidden')) {
                    goNextStep();
                }
            } else if ($('#testimonial-step').hasClass('active')) {
                if (!$('#testimonial-step .next_step').hasClass('hidden')) {
                    goNextStep();
                }
            } else if ($('#information-step').hasClass('active')) {
                if (!$('#information-step .next_step').hasClass('hidden')) {
                    goNextStep();
                }
            } else if ($('#services-step').hasClass('active')) {
                if (!$('#services-step .next_step').hasClass('hidden')) {
                    goNextStep();
                }
            } else {
                e.preventDefault();
            }
        }

        $(document).on('keypress', function (e) {
            if (e.which == 13) {
                validation(e);
            }
        });
    }

    calcBMI = () => {
        $('[name="height-step"]').on('input', function () {
            if ($('[name="weight-step"]').val() != '') {
                validation_w_h();
            }
        });

        $('[name="weight-step"]').on('input', function () {
            if ($('[name="height-step"]').val() != '') {
                validation_w_h();
            }
        });

        function validation_w_h() {
            let errors = {'weight': 0, 'height': 0};
            let errMsg = '';

            if (!isValidWeight()) {
                errors.weight = 1;
            }

            if (!isValidHeight()) {
                errors.height = 1;
            }

            $.each(errors, function (i, hasErr) {
                switch (i) {
                    case 'weight':
                        if (hasErr) errMsg += 'وزن خود را صحیح وارد کنید!' + '<br>';
                        break;
                    case 'height':
                        if (hasErr) errMsg += 'قد خود را صحیح وارد کنید!' + '<br>';
                        break;
                }
            });

            if (errMsg !== '') {
                $('#bmi_status_val').html(null);
                $('.calc_bmi').addClass('hidden');
                $('#bmi-step .next_step').addClass('hidden');
                if ($('[name="weight-step"]').val().length >= 2) {
                    $('#bmi-step .alert').html(errMsg).show();
                }
            } else {
                let height = parseInt($('[name="height-step"]').val()) / 100;
                let weight = parseInt($('[name="weight-step"]').val());

                let bmi = weight / (height * height);

                let bmi_status_val = '';

                let recom_chart_color = '';

                let recom_val = '';

                let recom_msg = '';

                if (bmi.toFixed(0) < 18.5) {
                    recom_chart_color = '#ecd530';
                    bmi_status_val = 'پیشنهاد ما به شما، <mark style="color: ' + recom_chart_color + ';" class="bg-transparent p-0">افزایش وزن</mark> است.';
                    recom_val = '86';
                    recom_msg = 'از کاربران سرِحال در سال گذشته با هدف افزایش وزن، بیش از 10 کیلوگرم وزن اضافه کرده‌اند.';
                    recom_val_fa = '۸۶٪';
                } else if (bmi.toFixed(0) >= 18.5 && bmi.toFixed(0) <= 24.9) {
                    recom_chart_color = '#34cda0';
                    bmi_status_val = 'پیشنهاد ما به شما، <mark style="color: ' + recom_chart_color + ';" class="bg-transparent p-0">بهبود عادات تغذیه‌ای</mark> است.';
                    recom_val = '95';
                    recom_msg = 'از کاربران سرِحال در سال گذشته با هدف تناسب اندام، از تغییرات اندام خود «بسیار راضی» بوده‌اند.';
                    recom_val_fa = '۹۵٪';
                } else if (bmi.toFixed(0) >= 25 && bmi.toFixed(0) <= 29.9) {
                    recom_chart_color = '#ecd530';
                    bmi_status_val = 'پیشنهاد ما به شما، <mark style="color: ' + recom_chart_color + ';" class="bg-transparent p-0">چربی‌سوزی</mark> است.';
                    recom_val = '97';
                    recom_msg = 'از کاربران سرِحال در سال گذشته با هدف چربی‌سوزی، بیش از 5 کیلوگرم چربی سوزانده‌اند.';
                    recom_val_fa = '۹۷٪';
                } else {
                    recom_chart_color = '#f23c57';
                    bmi_status_val = 'پیشنهاد ما به شما، <mark style="color: ' + recom_chart_color + ';" class="bg-transparent p-0">کاهش وزن</mark> است.';
                    recom_val = '89';
                    recom_msg = 'از کاربران سرِحال در سال گذشته با هدف کاهش وزن، بیش از 10 کیلوگرم کاهش وزن داشته‌اند.';
                }

                $('#bmi_status_val').html(bmi_status_val);
                $('.calc_bmi').removeClass('hidden');
                $('#bmi-step .next_step').removeClass('hidden');
                $('#bmi-step .alert').html(null).hide();

                $('#recom_chart').attr('stroke', recom_chart_color);
                $('#recom_chart').attr('stroke-dasharray', recom_val + ',100');
                $('#recom_chart_val').text(recom_val + '٪');
                $('#recom_msg').text(recom_msg);
            }
        }
    }

    validationInformation = () => {
        function validation() {
            let phoneVal = fixNumbers($('[name="phone-step"]').val());
            let nameVal = $('[name="fullname-step"]').val();
            let errors = {'fullname': 0, 'phone': 0};
            let errMsg = '';

            if (!isNumeric(phoneVal) || !isValidPhone(phoneVal) || phoneVal.length < 11) {
                errors.phone = true;
            }

            if (!isValidName(nameVal)) {
                errors.fullname = true;
            }

            $.each(errors, function (i, hasErr) {
                switch (i) {
                    case 'phone':
                        if (hasErr) errMsg += 'شماره همراه را صحیح وارد کنید!' + '<br>';
                        break;
                    case 'fullname':
                        if (hasErr) errMsg += 'نام و نام خانوادگی را صحیح وارد کنید!' + '<br>';
                        break;
                }
            });

            if (errMsg !== '') {
                $('#information-step .next_step').addClass('hidden');
                if ($('[name="phone-step"]').val().length > 10) {
                    $('#information-step .alert').html(errMsg).show();
                }
            } else {
                $('#information-step .next_step').removeClass('hidden');
                $('#information-step .alert').html(null).hide();
            }
        }

        $('[name="fullname-step"]').on('input', function () {
            if ($('[name="phone-step"]').val() != '') {
                validation();
            }
        });

        $('[name="phone-step"]').on('input', function () {
            if ($('[name="fullname-step"]').val() != '') {
                validation();
            }
        });
    }

    isValidHeight = () => {
        let val = parseInt($('[name="height-step"]').val());
        if ($('[name="height-step"]').val().length >= 3) {
            if (val < $('[name="height-step"]').attr('min') || val > $('[name="height-step"]').attr('max')) {
                return false;
            }
            return true;
        }
        return false;
    }

    isValidWeight = () => {
        let val = parseInt($('[name="weight-step"]').val());
        if ($('[name="weight-step"]').val().length >= 2) {
            if (val < $('[name="weight-step"]').attr('min') || val > $('[name="weight-step"]').attr('max')) {
                return false;
            }
            return true;
        }
        return false;
    }

    renderProgressBar = () => {
        let steps_eq = $('.signup .step').length;
        let each_step_w = 100 / steps_eq;
        let current_step = $('.signup .step.active').index() - 2;
        let step_w = current_step * each_step_w;
        $('.progress-bar').css('width', step_w + '%')
    }

    cardTestimonialSlider = () => {
        if ($('.signup #payment-step .owl-carousel').length) {
            $('.signup #payment-step .owl-carousel').owlCarousel({
                center: true,
                items: 1,
                loop: true,
                nav: true,
                dots: false,
                margin: 10,
                autoplay: true,
                autoPlay: 5000
            });
        }
    }

    saveUserValidation = () => {
        let ageVal = $('[name="age-step"]').val();
        let genderVal = $('[name="gender-step"]:checked').val();
        let heightVal = $('[name="height-step"]').val();
        let weightVal = $('[name="weight-step"]').val();
        let diseasesVal = [];
        $('[name="sickness-step[]"]:checked').each(function () {
            diseasesVal.push($(this).val());
        });
        let fullnameVal = $('[name="fullname-step"]').val();
        let phoneVal = $('[name="phone-step"]').val();
        let smsVal = $('[name="sms-step"]').is(':checked') ? 1 : 0;

        let errors = {
            'ageVal': 0,
            'genderVal': 0,
            'heightVal': 0,
            'weightVal': 0,
            'diseasesVal': 0,
            'fullnameVal': 0,
            'phoneVal': 0
        };
        let errMsg = '';

        if (!ageVal.length) {
            errors.ageVal = 1;
        }

        if (!genderVal.length) {
            errors.genderVal = 1;
        }

        if (!isValidWeight()) {
            errors.weightVal = 1;
        }

        if (!isValidHeight()) {
            errors.heightVal = 1;
        }

        if (!diseasesVal.length) {
            errors.diseasesVal = 1;
        }

        if (!isNumeric(phoneVal) || !isValidPhone(phoneVal) || phoneVal.length < 11) {
            errors.phoneVal = 1;
        }

        if (!isValidName(fullnameVal)) {
            errors.fullnameVal = 1;
        }

        $.each(errors, function (i, hasErr) {
            switch (i) {
                case 'ageVal':
                    if (hasErr) errMsg += 'سن خود را صحیح وارد کنید!' + '<br>';
                    break;
                case 'genderVal':
                    if (hasErr) errMsg += 'جنسیت خود را انتخاب کنید!' + '<br>';
                    break;
                case 'weightVal':
                    if (hasErr) errMsg += 'وزن خود را صحیح وارد کنید!' + '<br>';
                    break;
                case 'heightVal':
                    if (hasErr) errMsg += 'قد خود را صحیح وارد کنید!' + '<br>';
                    break;
                case 'diseasesVal':
                    if (hasErr) errMsg += 'بخش بیماری ها را صحیح انتخاب کنید!' + '<br>';
                    break;
                case 'phoneVal':
                    if (hasErr) errMsg += 'شماره خود را صحیح وارد کنید!' + '<br>';
                    break;
                case 'fullnameVal':
                    if (hasErr) errMsg += 'نام و نام خانوادگی خود را صحیح وارد کنید!' + '<br>';
                    break;
            }
        });

        if (errMsg !== '') {
            $('#information-step .alert').html(errMsg).show();
        }
        else {
            $('#information-step .alert').html(null).hide();
            $('#btn-information-step .fa-chevron-left').hide();
            processBtn($('#btn-information-step'), 'active');

            $.ajax({
                type: "POST",
                url: sarehal_ajax.ajax_url,
                data: {
                    'age': ageVal,
                    'gender': genderVal,
                    'height': heightVal,
                    'weight': weightVal,
                    'diseases': JSON.stringify(diseasesVal),
                    'phone': phoneVal,
                    'fullname': fullnameVal,
                    'sms_adv': smsVal,
                    'nonce': sarehal_ajax.nonce,
                    'action': 'signup_ajax'
                },
                success: function (response) {
                    processBtn($('#btn-information-step'), 'deactive');
                    if (!response.success) {
                        $('#information-step .alert').html(response.data.errMsg).show();
                    } else {
                        goNextStep();
                    }
                }
            });
        }
    }

    getPlanDetails = () => {
        let plan_id = $('[name="plans-step"]:checked').val();
        let errMsg = '';

        if (!plan_id.length){
            errMsg = 'اشتراک مورد نظر خود را صحیح انتخاب کنید!' + '<br>';
        }

        if (errMsg !== '') {
            $('#plans-step .alert').html(errMsg).show();
        }
        else {
            $('#plans-step .alert').html(null).hide();

            $.ajax({
                type: "POST",
                url: sarehal_ajax.ajax_url,
                data: {
                    'plan_id': plan_id,
                    'nonce': sarehal_ajax.nonce,
                    'action': 'plan_details_ajax'
                },
                success: function (response) {
                    if (!response.success) {
                        $('#plans-step .alert').html(response.data.errMsg).show();
                    } else {
                        $('#payment-step #plan_name').html(' اشتراک ' + response.data.plan_duration_name + '‌ی <b class="font-22">' + response.data.plan_name + '</b>، شامل این خدمات می‌شود:');
                        $('#payment-step #plan_options').html(response.data.plan_options);
                        $('#payment-step #plan_price').html(response.data.plan_price + ' تومان');

                        if (response.data.plan_lined_price !== ''){
                            $('#payment-step #plan_lined_price').html(response.data.plan_lined_price);
                            $('#payment-step #plan_percentage').html(response.data.plan_percentage);
                            $('#plan_price_in_summary').hide();
                            $('* .has_lined_price').show();
                        }
                        else{
                            $('#plan_price_in_summary').show().html(response.data.plan_price + ' تومان');
                            $('* .has_lined_price').hide();
                        }

                        $('[name="discount-code"]').val(null);
                        $('#discount_alert').html(null).hide();
                        $('#discount_summary_percentage').text(null);
                        $('* .discount_summary').hide();

                        goNextStep();
                    }
                }
            });
        }
    }

    goPaymentValidation = () => {
        let plan_id = $('[name="plans-step"]:checked').val();
        let errMsg = '';

        if (!plan_id.length){
            errMsg = 'اشتراک مورد نظر خود را صحیح انتخاب کنید!' + '<br>';
        }

        if (errMsg !== '') {
            $('#payment-step .alert').html(errMsg).show();
        }
        else {
            $('#payment-step .alert').html(null).hide();
            $('#btn-payment-step .fa-chevron-left').hide();
            processBtn($('#btn-payment-step'), 'active');

            $.ajax({
                type: "POST",
                url: sarehal_ajax.ajax_url,
                data: {
                    'plan_id': plan_id,
                    'nonce': sarehal_ajax.nonce,
                    'action': 'payment_ajax'
                },
                success: function (response) {
                    processBtn($('#btn-payment-step'), 'deactive');
                    if (!response.success) {
                        $('#payment-step .alert').html(response.data.errMsg).show();
                    } else {
                        if (!response.data.errMsg) {
                            window.location.replace(response.data.redirect_url);
                        } else {
                            $('#payment-step .alert').html(response.data.errMsg).show();
                        }
                    }
                }
            });
        }
    }

    applyDiscount = () => {
        $('.apply_discount').on('click', function () {
            let discount_code = $('[name="discount-code"]').val();
            let plan_id = $('[name="plans-step"]:checked').val();

            if (!discount_code.length || !plan_id.length){
                return;
            }

            processBtn($('.apply_discount'), 'active');
            $.ajax({
                type: "POST",
                url: sarehal_ajax.ajax_url,
                data: {
                    'discount_code': discount_code,
                    'plan_id': plan_id,
                    'nonce': sarehal_ajax.nonce,
                    'action': 'discount_check_ajax'
                },
                success: function (response) {
                    processBtn($('.apply_discount'), 'deactive');
                    if (!response.success) {
                        $('#discount_alert').html(response.data.msg).removeClass('fg-green').addClass('fg-red').show();
                    } else {
                        $('#discount_alert').html(response.data.msg).removeClass('fg-red').addClass('fg-green').show();
                        $('#plan_price').text(response.data.plan_price + ' تومان');
                        $('#discount_summary_percentage').text(response.data.discount_percentage);
                        $('* .discount_summary').show();
                    }
                }
            });
        });
    }

    /**
     *
     * --- Call function ---
     * functionName();
     */
    //htmlClick();
    // --------------------
    signUpHandler();
    enterKeyHandler();
    cardTestimonialSlider();
    applyDiscount();
});

jQuery.event.special.touchstart = {
    setup: function (_, ns, handle) {
        this.addEventListener("touchstart", handle, {passive: true});
    }
};