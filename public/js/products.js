$(document).ready(function () {
    jQuery.datetimepicker.setLocale('es');
    $('.datetimepicker_mask').datetimepicker({
        i18n: {
            es: {
                months: [
                    'Enero', 'Febrero', 'Marzo', 'Abril',
                    'Mayo', 'Junio', 'Julio', 'Agosto',
                    'Septiembre', 'Octubre', 'Noviembre', 'Diciembre',
                ],
                dayOfWeek: [
                    "Do", "Lu", "Ma", "Mi",
                    "Ju", "Vi", "Sa",
                ]
            }
        },
    });

    $('.datetimepicker_mask').datetimepicker({defaultDate: new Date()});

    $('.datetimepicker_mask').click(function () {
        $(this).datetimepicker('show');
    });


    var $categories = $('#categories'),
        $subcategories = $('#subcategories'),
        $options = $('#categories').children('option'),
        optionsNumber = $options.length,
        $categoriesList = $('#categoriesList'),
        $subcategoriesList = $('#subcategoriesList'),
        inputsForm = new Array;

    for (var i = 0; i < optionsNumber; i += 1) {
        $('<li />', {
            html: $options.eq(i).text() + '<svg width="7px" height="12px"><use xlink:href="#arrow" /></svg>',
            'data-id': $options.eq(i).val()
        }).appendTo($categoriesList);
    }

    $('#categoriesList li').on('click', function () {

        $('#stepOneButton').addClass('invalid')
        $('#categoriesList li').removeClass('selected');
        $(this).addClass('selected');
        inputsForm = [];

        $.post($categories.data('route'), {
            id: $(this).data('id'),
            _token: $categories.data('token')
        }, function (response) {
            var subcategories = response.subcategories;
            $subcategories.html('');
            $subcategoriesList.html('');

            for (var i in subcategories) {
                $('<li />', {
                    html: subcategories[i].name,
                    'data-id': subcategories[i].id
                }).appendTo($subcategoriesList);
                $subcategories.append($("<option></option>").attr("value", subcategories[i].id).text(subcategories[i].name));
            }


        }).fail(function () {
            button.removeClass('hidden');
            alert('Ocurrió un error :(');
        });

    });
    $('#subcategoriesList').on('click', ' li', function () {
        $('#subcategoriesList li').removeClass('selected');
        $(this).addClass('selected')
        inputsForm = [];
        $.post($subcategories.data('route'), {id: $(this).data('id'), _token: $('#categories').data('token')},
            function (response) {
                $.each(response.features, function (arrayID, group) {
                    inputsForm.push(group.name)
                });
                $('#stepOneButton').removeClass('invalid')
            }).fail(function () {
            button.removeClass('hidden');
            alert('Ocurrió un error :(');
        });
    });


    $('#stepOneButton').on('click', function () {
        if(!$(this).hasClass('invalid')){
            $('.Wizard li:nth-child(2)').addClass('current');
            $('.Wizard-line').css('width','50%');
            $('.Step-1').hide('slow');
            $('.Step-2').show('slow');
        }

    });

});
