var subcategories = $('#subcategoriesList'),
    productTable = $('#productTable'),
    products,
    $searchProduct = $('#searchProduct'),
    $return = [],
    html = "",
    itemPacking = $('.Packing .Packing-item').length,
    itemCities = $('#Cities select').length,
    errors = {};
;
addElementsValidate($('#contentValidate .requerid'));
addElementsValidate($('.Packing .row .requerid'));

subcategories.on('click', 'li', function () {
    var params = {
        subcategory_id: $(this).data('id'),
        _token: $('#token').val()
    };
    $.post($('#callProducts').val(), params, function (data) {

        products = data.products,

            $('.productSelected').eq(0).attr('checked', 'checked');

    }, 'json');
});
$searchProduct.on('keydown', function (e) {

    setTimeout(function () {
        var search = $searchProduct.val();
        $return = [];
        strInArray(search, products);
        if (search == '' || !$('input').val) {
            productTable.html('').slideUp();
            $('#stepTwoButton').addClass('invalid');
            $('.Wizard li:nth-child(n+3)').removeClass('current');
        } else {
            $('#stepTwoButton').removeClass('invalid');
            productTable.html($return).slideDown();
        }
        $('.productSelected').eq(0).attr('checked', 'checked');


        console.log($('input[name="product_id"]').val())
        if ($('input[name="product_id"]').val() == null) {
            $('.Wizard li:nth-child(n+3)').removeClass('current');
            $('#stepTwoButton').addClass('invalid');
        }
    });

});

function strInArray(str, products) {

    for (var j = 0; j < products.length; j++) {
        if (products[j].name.toLowerCase().match(str)) {
            $return.push("<tr>" +
                "<td>" + products[j].name + "</td>" +
                "<td>" + '<a target="_blank" href="' + $('#productsProviderUrl').data('urlproduct') + '/ver-producto/' + products[j].id + '">Ver' + "</a></td>" +
                "<td><input style='opacity:1' value='" + products[j].id + "' name='product_id'  type='radio' class='productSelected'></td>" +
                "</tr>"
            );
        }
    }

}

$('#addCity').on('click', function () {

    var options;
    itemCities++;
    for (i in cities){
        options += ' <option value="' + i + '">' + cities[i] + '</option>'
    }
    $('#Cities').append(
        '<label class="cities" for="citi'+ itemCities +'">' +
        '<select class="requerid"  name="city['+ itemCities +']" id="citi'+ itemCities +'">' +
        '<option value="">Selecciona Ciudad despacho</option>' +
        options +
        '</select>' +
         '</label>'
    );
    addElementsValidate($('#Cities label:last-child .requerid'))
    $('#stepThreeButton').addClass('invalid');
});
$('#deleteCity').on('click', function () {

    if (itemCities > 0) {
        itemCities--;
    }

    $('#Cities .cities:last-child').remove();

    delete errors[$('#Cities .cities:last-child .requerid').attr('id')]
    if (jQuery.isEmptyObject(errors)) {

        $('#stepThreeButton').removeClass('invalid');
    }

});
$('#addPacking').on('click', function () {
    itemPacking++;
    $('.Packing').append(
        '<div class="row Packing-item">' +
        '    <div class="col-3 Field"  >' +
        '   <label for="high' + itemPacking + '">' +
        '     <input type="number"  class="requerid"  min="1" id="high' + itemPacking + '"' +
        '          name="packing[' + itemPacking + '][high]" >' +
        '    <span>Alto</span>' +
        '     <em></em>' +
        '  </label>' +
        ' </div>' +
        ' <div class="col-3 Field"  >' +
        '     <label for="width' + itemPacking + '">' +
        '         <input type="number" class="requerid"  min="1"  id="width' + itemPacking + '"' +
        '                 name="packing[' + itemPacking + '][width]" >' +
        '        <span>Ancho</span>' +
        '         <em></em>' +
        '      </label>' +
        '   </div>' +
        ' <div class="col-3 Field"  >' +
        '    <label for="long' + itemPacking + '">' +
        '        <input type="number" min="1" class="requerid"   @endif id="long' + itemPacking + '"' +
        '            name="packing[' + itemPacking + '][long]">' +
        '  <span>Largo</span>' +
        '   <em></em>' +
        '   </label>' +
        ' </div>' +
        ' <div class="col-3 Field"  >' +
        '     <label for="quantity' + itemPacking + '">' +
        '         <input type="number"  class="requerid"  min="1" id="quantity' + itemPacking + '"' +
        '             name="packing[' + itemPacking + '][quantity]">' +
        '       <span>Cantidad</span>' +
        '      <em></em>' +
        '    </label>' +
        ' </div>' +
        '</div>'
    );
    addElementsValidate($('.Packing .Packing-item:last-child .requerid'))
    $('#stepThreeButton').addClass('invalid');


});


$('#deletePacking').on('click', function () {

    if (itemPacking > 0) {
        itemPacking--;
    }
    $('.Packing .Packing-item:last-child .requerid').each(function (index) {
        delete errors[$(this).attr('id')]
    });
    $('.Packing .Packing-item:last-child').remove();
    if (jQuery.isEmptyObject(errors)) {

        $('#stepThreeButton').removeClass('invalid');
    }
});



$('.Packing .row , #contentValidate ').on('blur change ', '.requerid', function () {

    if ($(this).val() == '') {
        $(this).siblings('.errorInputs').html('Este campo no debe estar vacio')
        $(this).css('border-color', 'red')
        errors[$(this).attr('id')] = $(this).attr('id');
    } else {
        $(this).siblings('.errorInputs').html('');
        $(this).css('border-color', '#C5C5C5');
        delete errors[$(this).attr('id')]

    }
    console.log(errors);

    if (jQuery.isEmptyObject(errors)) {

        $('#stepThreeButton').removeClass('invalid');
    }else{
        $('#stepThreeButton').addClass('invalid');
    }

});
function addElementsValidate(data) {
    $(data).each(function (index) {
        errors[$(this).attr('id')] = $(this).attr('id');
    });
}
