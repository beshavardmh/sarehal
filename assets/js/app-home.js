jQuery(document).ready(function ($) {
    /**
     * --- Define Functions Name ---
     * let functionName;
     *
     */
    let targetOptions;

    /**
     * --- Init Function ---
     * functionName = ()=>{};
     *
     */
    targetOptions = () => {
        $('.target_option').on('click', function () {
            $('* .target_option').removeClass('selected');
            $(this).addClass('selected');
            $('.errors-wrap').text(null).hide();
            $('#start').removeClass('disabled').attr('type', 'submit');
        });

        $('#start').on('click', function () {
            if ($(this).hasClass('disabled')){
                $('.errors-wrap').text('لطفا یکی از گزینه های بالا را انتخاب کنید.').show();
            }
            else{
                $('.errors-wrap').text(null).hide();
            }
        });
    }

    /**
     *
     * --- Call function ---
     * functionName();
     */
    targetOptions();
});

jQuery.event.special.touchstart = {
    setup: function (_, ns, handle) {
        this.addEventListener("touchstart", handle, {passive: true});
    }
};