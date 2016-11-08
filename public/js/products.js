var currentStep = 1,
    arrayInput = {
        'description': 'Descripción',
        'location': 'Locación',
        'DescriptionOffer': 'Descripción oferta'
    };
$(document).ready(function () {
    jQuery.datetimepicker.setLocale('es');
    var dateTimePicker = $('.datetimepicker_mask');
    dateTimePicker.datetimepicker({
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

    dateTimePicker.datetimepicker({defaultDate: new Date()});

    dateTimePicker.click(function () {
        $(this).datetimepicker('show');
    });

    var categoryId = $('#categoryId').val(),
        subcategoryId = $('#subcategoryId').val(),
        compositionFile = $('#composition'),

        $categories = $('#categories'),
        $subcategories = $('#subcategories'),
        $options = $('#categories').children('option'),
        optionsNumber = $options.length,
        $categoriesList = $('#categoriesList'),
        $subcategoriesList = $('#subcategoriesList'),
        inputsForm = new Array;

        for (var i = 0; i < optionsNumber; i++) {
            $('<li />', {
                html: $options.eq(i).text() + '<svg width="7px" height="12px"><use xlink:href="#arrow" /></svg>',
                'data-id': $options.eq(i).val()
            }).appendTo($categoriesList);
        }

    $categoriesList.on('click', 'li', function () {
        $('#stepOneButton').addClass('invalid');
        $categoriesList.children('li').removeClass('selected');
        $('.Wizard li:gt(0)').removeClass('current');
        $(this).addClass('selected');

        $('.DataForm').css('display', 'none');

        inputsForm = [];

        $.post($categories.data('route'), {
            id: $(this).data('id'),
            _token: $categories.data('token')
        }, function (response) {
            var subcategories = response.subcategories;
            $subcategories.html('');
            $subcategories.html('');
            $subcategoriesList.html('');

            for (var j in subcategories) {
                var subcategory = $('<li />', {
                    html: subcategories[j].name,
                    'data-id': subcategories[j].id
                }).appendTo($subcategoriesList);

                $subcategories.append($("<option></option>").attr("value", subcategories[j].id).text(subcategories[j].name));
                if(subcategoryId == subcategory.attr('data-id')){
                    $subcategoriesList.children('li').eq(j).click();
                }
            }

        }).fail(function () {
            button.removeClass('hidden');
            alert('Ocurrió un error :(');
        });
    });

    $subcategoriesList.on('click', ' li', function () {
        $subcategoriesList.children('li').removeClass('selected');
        $(this).addClass('selected');
        inputsForm = [];
        $subcategories.val($(this).data('id'));
        $.post($subcategories.data('route'), {id: $(this).data('id'), _token: $categories.data('token')},
            function (response) {
                $.each(response.features, function (arrayID, group) {
                    $('.' + group.name).css('display', 'block');
                    inputsForm.push(group.name)
                });
                $('#stepOneButton').removeClass('invalid')
            }).fail(function () {
            button.removeClass('hidden');
            alert('Ocurrió un error :(');
        });
    });
    $('#stepOneButton').on('click', function () {
        if (!$(this).hasClass('invalid')) {
            steps(1, 2)
        }
    });
    $('#stepTwoButton').on('click', function () {
        steps(2, 3)
    });
    $('.MessagePlatform-close').on('click', function () {
        $('.MessagePlatform').hide();
    });
    $('#stepThreeButton, #omitir').on('click', function () {
        steps(3, 4)
    });
    $('.Wizard li').on('click', function () {
        var index = $(this).data('id');
        if ($(this).hasClass('current')) {
            steps(currentStep, index)
        }
    });

    compositionFile.on('change', function(){
        var file = $(this).val();
        $('#compositionText').text(file);
    });

    $categoriesList.children('li:nth-child(' + categoryId +')').click();

    $('.productDetailAction').on('click', function(){
        var $form = $('.formProductPreview');
        $form.html('<input style="display:none" type="submit" class="productDetailSession">');

        var input = $('input[type="text"], input[type="hidden"], input[type="number"]'),
            checkbox = $('input[type="checkbox"]'),
            images = $('.result figure img'),
            categories = $('#categoriesList').children(),
            subcategories = $('#subcategoriesList').children();

        var searchData = function(object, attr, type, name){
            var elements = "";

            for(var i = 0; i < object.length; i++){
                var flag = false,
                    item = object.eq(i),
                    idItem = item.attr('id'),
                    valueItem = item.attr(attr),
                    finalValue = "",
                    finalName = "";

                if(!valueItem) valueItem = item.val();

                if(type == 'select'){
                    if(item.hasClass('selected')){
                        flag = true;
                        finalValue = valueItem;
                        finalName  = name + '';
                    }
                }
                else if(type == 'image'){
                    if(valueItem){
                        flag = true;
                        finalValue = valueItem;
                        finalName  = name + i;
                    }
                }

                else if(type == 'checkbox'){
                    if(item.attr('checked') == 'checked'){
                        flag = true;
                        finalValue = valueItem;
                        finalName  = idItem;
                    }
                }

                else if(type == 'text'){
                    if(valueItem && idItem){
                        if(idItem == 'token')
                            idItem = '_token';
                        flag = true;
                        finalValue = valueItem;
                        finalName  = idItem;
                    }
                }

                if(flag)
                    elements += "<input type='text' value='" + finalValue + "' name='" + finalName +"'>";
            }
            return elements;
        };

        $form.append(searchData(subcategories, 'data-id', 'select', 'subcategoriesId'));
        $form.append(searchData(categories, 'data-id', 'select', 'categoriesId'));
        $form.append(searchData(images, 'src', 'image', 'image'));
        $form.append(searchData(input, 'value', 'text', 'auto'));
        $form.append(searchData(checkbox, 'value', 'checkbox', 'auto'));

        $('.productDetailSession').trigger('click');
    });

});

function steps(from, to) {
    currentStep = to;
    if (to == 3) {
        $("#Map").animate({"height": "400px"}, 500, function () {
            google.maps.event.trigger(map, 'resize');
            var myLatlngCenter = new google.maps.LatLng(4.716397271832087, -74.13149477499996);
            map.setCenter(myLatlngCenter);
            map.setZoom(4);
        });
    }
    if (to == 3) {
        var stringPrice = parseInt($('#priceCurrent').val()).toLocaleString('de-DE');
        $('#priceForOffer').text(stringPrice);

    }
    if (to == 4) {
        DetailsProduct();
    }
    widthLine = 25 * to;
    $('.Wizard li:nth-child(' + to + ')').addClass('current');
    $('.Wizard-line').css('width', widthLine + '%');
    $('.Step-' + from).hide('slow');
    $('.Step-' + to).show('slow');
}

function DetailsProduct() {
    /*$('.owl-wrapper').html('');
    var count = 0;

    for(i = 0; i < 4; i++){
        var $result = $('.result').eq(i);
        if($result.children().length > 0){
            var image = $result.children('figure').children('img').attr('src');
            $('#sync1 .owl-wrapper').append('<div style="width: 379px;" class="owl-item"><figure class="item"><img src="'+ image + '" alt=""></figure></div>');
            $('#sync2 .owl-wrapper').append('<div style="width: 95px;" class="owl-item"><figure class="item"><img src="'+ image + '" alt=""></figure></div>');
            count += 1;
        }
        else
            break;
    }
    $('#sync1 .owl-wrapper').css('width', (379 * count) + 'px');
    $('#sync2 .owl-wrapper').css('width', (95 * count) + 'px');*/

    var $DetailsProduct = $("#detailsProduct");
    $DetailsProduct.html('');
    var pos = '';
    for (var i = 0; i < arrayMarkers.length; i++) {
        pos += arrayMarkers[i].getPosition().lat() + '&' + arrayMarkers[i].getPosition().lng() + ';';
    }
    $('#Location').val(pos);

    $("#Product-form input").each(function (i) {

        var nameProduct = $(this).siblings('span').text(),
            ValueProduct = String($(this).val());
            html = "";

        if (nameProduct == "") {

            nameProduct = $(this).attr("name");
            if (nameProduct == "_token") {
                return;
            }

            if (nameProduct == "location") {

                var coordinates = ValueProduct.split(";");
                nameProduct = arrayInput[nameProduct];
                html = "";
                for (var j = 0; j < coordinates.length - 1; j++) {

                    coord = String(coordinates[j]).split("&");
                    $.getJSON('https://maps.googleapis.com/maps/api/geocode/json?latlng=' + coord[0] + ',' + coord[1], function (data) {

                        html = '<article class="col-4">' + '<span>' + nameProduct + ': </span><div class="ItemProduct">' + data.results[0].formatted_address + '<br>' + '</div></article>';
                        $DetailsProduct.append(html);

                    });
                }
                return;
            }

            if (arrayInput[nameProduct] != undefined) {
                nameProduct = arrayInput[nameProduct];
            }


        }

        if (ValueProduct != "") {


            if (nameProduct == "taxes[]") {
                if ($(this).is(':checked')) {
                    nameProduct = "Impuesto"
                } else {
                    return;
                }
            }
            if (nameProduct == "important_offer") {
                if ($(this).is(':checked')) {
                    ValueProduct = 'si';
                    nameProduct = "Producto Destacado"
                } else {
                    return;
                }
            }
            if ($(this).hasClass('StepImages')) {
                nameProduct = "Imagen ";
                ValueProduct = $(this).val();//.replace(/C:\\fakepath\\/i, '');
                $('#sync1 .owl-wrapper').html('<div style="width: 379px;" class="owl-item"><figure class="item"><img src="' + ValueProduct + '" alt=""></figure></div>');
            }

            if (ValueProduct != "") {
                html = '<article class="col-4">' + '<span>' + nameProduct + ': </span><div class="ItemProduct">' + ValueProduct + '</div></article>';
                $DetailsProduct.append(html);
            }


        }

    });

}

/********* Eliminar productos *********/

var tab1 = $('[for="tab1"]'),
    tab2 = $('[id="tab2"]'),
    line = $('.Line-bottom-two'),
    deleteMessage = $('.DeleteMessage'),
    productUpdate = $('#ProductUpdate'),
    url = $('#deleteProductRoute').val(),
    productId;


    if (tab2.is(':checked')) {
        line.addClass('right');
    }

    tab2.on('click', function () {
        line.addClass('right');
    });

    tab1.on('click', function () {
        line.removeClass('right');
    });

    $('#ProductUpdate-close').on('click', function () {
        productUpdate.removeClass('left');
    });

    $('.Item-actions').on('click', '.icon-remove',function () {
        productId = $(this).siblings('.ProductId').val();

        if ($(this).hasClass('icon-update'))
            productUpdate.addClass('left');
        else
            deleteMessage.show();
    });

    deleteMessage.on('click', '#Cancel, #Accept', function () {
        if($(this).attr('id') == "Accept"){
            var deleteForm = $('#DeleteForm');
            var url = deleteForm.attr('action') + '/' + productId;
            deleteForm.attr('action', url);
            deleteForm.children('.submit').trigger('click');
        }

        deleteMessage.hide();
    });