jQuery(document).ready(function ($) {
    /**
     * --- Define Functions Name ---
     * let functionName;
     *
     */
    let
        fixNumbers,
        isValidPhone,
        isNumeric,
        isValidName,
        processBtn,
        goPaymentValidation,
        saveUserValidation,
        applyDiscount;


    /**
     * --- Init Function ---
     * functionName = ()=>{};
     *
     */
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

    processBtn = (btn, status = 'deactive') => {
        if (status == 'active') {
            $(btn).prop('disabled', true);
            $(btn).find('.process-animation').fadeIn();
        } else {
            $(btn).prop('disabled', false);
            $(btn).find('.process-animation').fadeOut();
        }

    }

    saveUserValidation = () => {
        $('#submit_pay').on('click', function () {
            let ageVal = 20;
            let genderVal = 'female';
            let heightVal = 180;
            let weightVal = 80;
            let diseasesVal = ['Posted from voucher'];
            let fullnameVal = $('[name="fullname"]').val();
            let phoneVal = $('[name="phone"]').val();
            let smsVal = 0;
            let plan_id = $('[name="plan_id"]').val();

            if (!plan_id.length){
                return;
            }

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

            if (!isNumeric(phoneVal) || !isValidPhone(phoneVal) || phoneVal.length < 11) {
                errors.phoneVal = 1;
            }

            if (!isValidName(fullnameVal)) {
                errors.fullnameVal = 1;
            }

            $.each(errors, function (i, hasErr) {
                switch (i) {
                    case 'phoneVal':
                        if (hasErr) errMsg += 'شماره خود را صحیح وارد کنید!' + '<br>';
                        break;
                    case 'fullnameVal':
                        if (hasErr) errMsg += 'نام و نام خانوادگی خود را صحیح وارد کنید!' + '<br>';
                        break;
                }
            });

            if (errMsg !== '') {
                $('.errors-wrap.alert').html(errMsg).show();
            }
            else {
                $('.errors-wrap.alert').html(null).hide();
                processBtn($('#submit_pay'), 'active');

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
                        'check_user_exist': 1,
                        'action': 'signup_ajax'
                    },
                    success: function (response) {
                        if (!response.success) {
                            processBtn($('#submit_pay'), 'deactive');
                            $('.errors-wrap.alert').html(response.data.errMsg).show();
                        } else {
                            goPaymentValidation();
                        }
                    }
                });
            }
        });
    }

    goPaymentValidation = () => {
        let plan_id = $('[name="plan_id"]').val();

        $.ajax({
            type: "POST",
            url: sarehal_ajax.ajax_url,
            data: {
                'plan_id': plan_id,
                'nonce': sarehal_ajax.nonce,
                'action': 'payment_ajax'
            },
            success: function (response) {
                processBtn($('#submit_pay'), 'deactive');
                if (!response.success) {
                    $('.errors-wrap.alert').html(response.data.errMsg).show();
                } else {
                    if (!response.data.errMsg) {
                        window.location.replace(response.data.redirect_url);
                    } else {
                        $('.errors-wrap.alert').html(response.data.errMsg).show();
                    }
                }
            }
        });
    }

    applyDiscount = () => {
        $('.apply_discount').on('click', function () {
            let discount_code = $('[name="discount-code"]').val();
            let plan_id = $('[name="plan_id"]').val();
            let phoneVal = $('[name="phone"]').val();
            let phoneError = 0;

            if (!discount_code.length || !plan_id.length) {
                return;
            }

            if (!isNumeric(phoneVal) || !isValidPhone(phoneVal) || phoneVal.length < 11) {
                phoneError = 1;
            }

            if (phoneError){
                $('#discount_alert').html('ابتدا اطلاعات خود را وارد کنید.').show();
            }
            else{
                $('#discount_alert').html(null).hide();
                processBtn($('.apply_discount'), 'active');
                $.ajax({
                    type: "POST",
                    url: sarehal_ajax.ajax_url,
                    data: {
                        'discount_code': discount_code,
                        'plan_id': plan_id,
                        'runtime_phone': phoneVal,
                        'nonce': sarehal_ajax.nonce,
                        'action': 'discount_check_ajax'
                    },
                    success: function (response) {
                        processBtn($('.apply_discount'), 'deactive');
                        if (!response.success) {
                            $('#discount_alert').html(response.data.msg).removeClass('fg-green').addClass('fg-red').show();
                        } else {
                            $('#discount_alert').html(response.data.msg).removeClass('fg-red').addClass('fg-green').show();
                            $('#plan_price').text(response.data.plan_price);
                        }
                    }
                });
            }
        });
    }

    /**
     *
     * --- Call function ---
     * functionName();
     */
    saveUserValidation();
    applyDiscount();
});

jQuery.event.special.touchstart = {
    setup: function (_, ns, handle) {
        this.addEventListener("touchstart", handle, {passive: true});
    }
};