/*!

 =========================================================
 * Bootstrap Wizard - v1.1.1
 =========================================================
 
 * Product Page: https://www.creative-tim.com/product/bootstrap-wizard
 * Copyright 2017 Creative Tim (http://www.creative-tim.com)
 * Licensed under MIT (https://github.com/creativetimofficial/bootstrap-wizard/blob/master/LICENSE.md)
 
 =========================================================
 
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 */

// Get Shit Done Kit Bootstrap Wizard Functions



$(document).ready(function () {

    $('.disabled').on('click', function (e) {
        e.preventDefault();
    })

    var getValues = function () {
        var fields = {}

        $('.form').find(`input[type="text"],
            input[type="number"],
            input[type="tel"],
            input[type="email"],
            input[type="hidden"],
            input[type="radio"]:checked,
            input[type="checkbox"]:checked,
            select,
            textarea`).each(function (i) {
            var name = $(this).attr('name') || $(this).attr('id')
            if (name) {
                fields[name] = $(this).val()
            }
        })

        console.log(fields);
        $('#confirmation span').each(function () {
            var field = $(this).attr('class');
            if (field == 'price_combo' || field == 'price_total') {
                fields[field] = new Intl.NumberFormat('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }).format(fields[field]);
            }
            $(this).text(fields[field]);
        })
    }

    $('.form input', ).on('blur', function () {
        getValues();
    })

    $('#transfer-form').on('submit', function (e) {
        e.preventDefault();
        var fields = {}

        $(this).find(`input[type="text"],
            input[type="number"],
            input[type="tel"],
            input[type="email"],
            input[type="hidden"],
            input[type="radio"]:checked,
            input[type="checkbox"]:checked,
            select,
            textarea`).each(function (i) {
            var name = $(this).attr('name') || $(this).attr('id')
            if (name) {
                fields[name] = $(this).val()
            }
        })

        $.ajax({
            type: "POST",
            url: $('#transfer-form').attr('action'),
            data: fields,
            success: function (msg) {
                console.log(msg);
            }
        });
    });

    /*  Activate the tooltips      */
    $('[rel="tooltip"]').tooltip();

    // Code for the Validator
    var $validator = $('.wizard-card form').validate({
        rules: {
            nome: {
                required: true,
                minlength: 3
            },
            phone: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                minlength: 3,
            },
            quantity: {
                required: true
            },
            city_country: {
                required: true
            },
            price_combo: {
                required: true,
                min: 2
            },
            confirmar: {
                required: true
            }
        },
        messages: {
            nome: {
                required: 'Digite o seu nome'
            },
            phone: {
                required: 'Digite o seu telefone'
            },
            email: {
                required: 'Digite o seu e-mail'
            },
            quantity: {
                required: 'Digite o número de pessoas'
            },
            confirmar: {
                required: 'Por favor, confirme as informações'
            }
        }
    });

    $('#package').on('change', function () {
        if ($('option:selected', this).text() == 'Ida e Volta') {
            $('.form-back').show();
        } else {
            $('.form-back').hide();
        }
    })

    $('select[name="departure"]').on('change', function () {
        var value = $(this).val();
        $('.form-group--information').remove();

        if (value == "Aeroportos") {
            var html = `<div class="form-group form-group--information">
                            <input class="form-control" type="text" placeholder="Dados do Vôo" name="information" my-input="information" autocomplete="off">
                        </div>`

        } else {
            var html = `<div class="form-group form-group--information">
                            <textarea class="form-control" type="text" placeholder="Endereço" name="information" my-input="information" autocomplete="off"></textarea>
                        </div>`
        }

        $(html).insertAfter('.form-group--destino')
    })




    // Wizard Initialization
    $('.wizard-card').bootstrapWizard({
        'tabClass': 'nav nav-pills',
        'nextSelector': '.btn-next',
        'previousSelector': '.btn-previous',

        onNext: function (tab, navigation, index) {

            if (index == 2) {
                $('.btn-next').val('Confirmar');
            } else {

            }



            var $valid = $('.wizard-card form').valid();
            if (!$valid) {
                $validator.focusInvalid();
                return false;
            }

            getValues();
        },

        onInit: function (tab, navigation, index) {

            //check number of tabs and fill the entire row
            var $total = navigation.find('li').length;
            $width = 100 / $total;
            var $wizard = navigation.closest('.wizard-card');

            $display_width = $(document).width();

            if ($display_width < 600 && $total > 3) {
                $width = 50;
            }

            navigation.find('li').css('width', $width + '%');
            $first_li = navigation.find('li:first-child a').html();
            $moving_div = $('<div class="moving-tab">' + $first_li + '</div>');
            $('.wizard-card .wizard-navigation').append($moving_div);
            refreshAnimation($wizard, index);
            $('.moving-tab').css('transition', 'transform 0s');
        },

        onTabClick: function (tab, navigation, index) {

            var $valid = $('.wizard-card form').valid();

            if (!$valid) {
                return false;
            } else {
                return true;
            }
        },

        onTabShow: function (tab, navigation, index, currentIndex) {
            console.log(index);
            var $total = navigation.find('li').length;
            var $current = index + 1;



            var $wizard = navigation.closest('.wizard-card');

            // If it's the last tab then hide the last button and show the finish instead
            if ($current >= $total) {
                $('#transfer-form').submit();
                $($wizard).find('.btn-next').hide();
                $($wizard).find('.btn-finish').hide();
                $($wizard).find('.btn-previous').hide();
                $('.nav-pills a').addClass('disabled');
                $('.moving-tab').hide();
            } else {
                $($wizard).find('.btn-next').show();
                $($wizard).find('.btn-previous').show();
                $($wizard).find('.btn-finish').hide();
                $('.nav-pills a').removeClass('disabled');
                $('.moving-tab').show();
            }

            button_text = navigation.find('li:nth-child(' + $current + ') a').html();

            setTimeout(function () {
                $('.moving-tab').text(button_text);
            }, 150);

            var checkbox = $('.footer-checkbox');

            if (!index == 0) {
                $(checkbox).css({
                    'opacity': '0',
                    'visibility': 'hidden',
                    'position': 'absolute'
                });
            } else {
                $(checkbox).css({
                    'opacity': '1',
                    'visibility': 'visible'
                });
            }

            refreshAnimation($wizard, index);
        }
    });


    // Prepare the preview for profile picture
    $("#wizard-picture").change(function () {
        readURL(this);
    });

    $('[data-toggle="wizard-radio"]').click(function () {
        wizard = $(this).closest('.wizard-card');
        wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
        $(this).addClass('active');
        $(wizard).find('[type="radio"]').removeAttr('checked');
        $(this).find('[type="radio"]').attr('checked', 'true');
    });

    $('[data-toggle="wizard-checkbox"]').click(function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $(this).find('[type="checkbox"]').removeAttr('checked');
        } else {
            $(this).addClass('active');
            $(this).find('[type="checkbox"]').attr('checked', 'true');
        }
    });

    $('.set-full-height').css('height', 'auto');

});



//Function to show image before upload

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(window).resize(function () {
    $('.wizard-card').each(function () {
        $wizard = $(this);
        index = $wizard.bootstrapWizard('currentIndex');
        refreshAnimation($wizard, index);

        $('.moving-tab').css({
            'transition': 'transform 0s'
        });
    });
});

function refreshAnimation($wizard, index) {
    total_steps = $wizard.find('li').length;
    move_distance = $wizard.width() / total_steps;
    step_width = move_distance;
    move_distance *= index;

    $wizard.find('.moving-tab').css('width', step_width);
    $('.moving-tab').css({
        'transform': 'translate3d(' + move_distance + 'px, 0, 0)',
        'transition': 'all 0.3s ease-out'

    });
}

function debounce(func, wait, immediate) {
    var timeout;
    return function () {
        var context = this,
            args = arguments;
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            timeout = null;
            if (!immediate) func.apply(context, args);
        }, wait);
        if (immediate && !timeout) func.apply(context, args);
    };
};