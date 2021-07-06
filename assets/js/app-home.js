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
            $('#start').removeClass('disabled').attr('type', 'submit');
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