jQuery(document).ready(function ($) {

    let uploadMediaButton,
        justNumInput,
        formItems_switchRadio,
        makeId,
        removeItems,
        add_items,
        create_token_link,
        convertToSlug,
        slug_input,
        show_on_cta,
        nav_handler;


    uploadMediaButton = () => {
        $('body').on('click', '.upload-media-button', function (e) {
            e.preventDefault();

            var button = $(this),
                custom_uploader = wp.media({
                    library: {
                        //uploadedTo: wp.media.view.settings.post.id,
                        type: button.data('type')
                    },
                    multiple: (button.data('multiple') ? 1 : 0)
                }).on('select', function () {
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    const input_show = button.data('input-show');
                    if (input_show && input_show == 'id') {
                        button.prev().val(attachment.id);
                    } else if (input_show && input_show == 'url') {
                        button.prev().val(attachment.url);
                    } else {
                        button.prev().val(attachment.id);
                    }
                    button.next().attr('src', attachment.url);
                }).open();
        });
    }


    justNumInput = () => {
        $('.just_num').each(function () {
            const input = $(this);

            input.on('keyup', function () {
                const inputVal = input.val();

                if (/\D/g.test(inputVal)) {
                    $(this).val(inputVal.replace(/\D/g, ''));
                }
            });
        });
    }


    formItems_switchRadio = () => {
        $('.formItems_switchRadio').each(function () {
            const $this = $(this);

            $this.find('input[type="radio"]').each(function () {
                $(this).on('change', function () {
                    if ($this.find('.type-1').is(':checked')) {
                        $this.find('.fields-entry').html($this.data('type-1'));
                    } else if ($this.find('.type-2').is(':checked')) {
                        $this.find('.fields-entry').html($this.data('type-2'));
                    }
                });
            });

            if ($this.find('.type-1').is(':checked')) {
                $this.find('.fields-entry').html($this.data('type-1'));
            } else if ($this.find('.type-2').is(':checked')) {
                $this.find('.fields-entry').html($this.data('type-2'));
            } else {
                $this.find('.default-type').click();
            }
        });
    }


    makeId = (length, hasChar = false) => {
        var result = '';
        var characters = hasChar ? 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789' : '0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }


    removeItems = () => {
        $('[data-item-remove-btn]').on('click', function (e) {
            e.preventDefault();

            let itemRemoveSlug = $(this).data('item-remove-btn');

            $('[data-item-remove-target = "' + itemRemoveSlug + '"]').remove();
        });
    }


    add_items = () => {
        $('[data-add-item]').on('click', function (e) {
            e.preventDefault();

            let $btn = $(this);
            let itemHtml = $btn.data('item-html');

            let rand = makeId(4);

            itemHtml = itemHtml.toString().replaceAll('{$}', rand);

            $btn.closest('.form_add_items').find('[data-item-html-wrap]').prepend(itemHtml);

            removeItems();
        });
    }


    nav_handler = () => {
        $('.nav').each(function (e) {
            const $nav = $(this);
            $nav.find('.nav-item').on('click', function (e) {
                $nav.find('.nav-item').each(function () {
                    $(this).removeClass('active');
                });
                $nav.next('.tab-content').find('.tab-pane').each(function () {
                    $(this).removeClass('active');
                });
                $(this).addClass('active');
                $nav.next('.tab-content').find('.tab-pane[id="' + $(this).data('target') + '"]').addClass('active');
            });
        });

    }

    convertToSlug = (text) => {
        return text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
    }

    slug_input = () => {
        $('.slug_input').on('blur', function () {
            $(this).val(convertToSlug($(this).val()));
        });
    }

    show_on_cta = () => {
        $('.show_on_cta').on('change', function () {
            if ($(this).prop('checked')) {
                $(this).parent().prev().find('input[type="checkbox"]').prop('checked', true);
            } else {
                $(this).parent().prev().find('input[type="checkbox"]').prop('checked', false);
            }
        });
    }

    // ----------------------------------------------

    uploadMediaButton();

    justNumInput();

    formItems_switchRadio();

    removeItems();

    add_items();

    nav_handler();

    slug_input();

    show_on_cta();

});