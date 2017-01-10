var subcategories = $('#subcategoriesList'),
    productTable = $('#productTable'),
    products,
    $searchProduct = $('#searchProduct'),
    $return = [],
    html = "",
    itemPacking = $('.Packing .Packing-item').length,
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
        if($('input[name="product_id"]').val() == null){
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
                "<td>" + '<a target="_blank" href="'+ $('#productsProviderUrl').data('urlproduct') + '/ver-producto/' + products[j].id +'">Ver' + "</a></td>" +
                "<td><input style='opacity:1' value='" + products[j].id + "' name='product_id'  type='radio' class='productSelected'></td>" +
                "</tr>"
            );
        }
    }

}

$('#addPacking').on('click',function () {
    itemPacking++;

    $('.Packing').append(

        '<div class="row Packing-item">'+
        '    <div class="col-3 Field"  >'+
        '   <label for="high' + itemPacking + '">'+
        '     <input type="number"  class="requerid"  min="1" id="high' + itemPacking + '"'+
        '          name="packing[packing'+ itemPacking +'][high]" >'+
        '    <span>Alto</span>'+
        '     <em></em>'+
        '  </label>'+
        ' </div>'+
        ' <div class="col-3 Field"  >'+
        '     <label for="width' + itemPacking + '">'+
        '         <input type="number" class="requerid"  min="1"  id="width' + itemPacking + '"'+
        '                 name="packing[packing'+ itemPacking +'][width]" >'+
        '        <span>Ancho</span>'+
        '         <em></em>'+
        '      </label>'+
        '   </div>'+
        ' <div class="col-3 Field"  >'+
        '    <label for="long' + itemPacking + '">'+
        '        <input type="number" min="1" class="requerid"   @endif id="long' + itemPacking + '"'+
        '            name="packing[packing'+ itemPacking +'][long]">'+
        '  <span>Largo</span>'+
        '   <em></em>'+
        '   </label>'+
        ' </div>'+
        ' <div class="col-3 Field"  >'+
        '     <label for="quantity' + itemPacking + '">'+
        '         <input type="number"  class="requerid"  min="1" id="quantity' + itemPacking + '"'+
        '             name="packing[packing'+ itemPacking +'][quantity]">'+
        '       <span>Cantidad</span>'+
        '      <em></em>'+
        '    </label>'+
        ' </div>'+
        '</div>'

    );

});

$('#deletePacking').on('click',function () {

    if(itemPacking > 0){
        itemPacking--;
    }

    $('.Packing .Packing-item:last-child').remove();
});

$('.validateDataProduct').on('click',function () {
    if($('product_id').val()){
        console.log('error');
    }
    if($('product_id').val()) {
        console.log('error');
    }
    validateEmpty($('#contentValidate .requerid'));
    validateEmpty($('.Packing .row .requerid'));

    /*has_offer
    offer_on
    offer_off
    offer_price*/
});
$('#Location').bind('change',function () {
    console.log($( this ).val())
    if( $( this ).val() == ''){
        $( this ).siblings('.errorInputs').html('Este campo no debe estar vacio')
        $( this ).css('border-color', 'red')

    }else{
        $( this ).siblings('.errorInputs').html('');
        $( this ).css('border-color', '#C5C5C5');
        delete errors[$( this ).attr('id')]

    }
});
$('.Packing .row , #contentValidate ').on('blur', '.requerid', function () {

    if( $( this ).val() == ''){
        $( this ).siblings('.errorInputs').html('Este campo no debe estar vacio')
        $( this ).css('border-color', 'red')

    }else{
        $( this ).siblings('.errorInputs').html('');
        $( this ).css('border-color', '#C5C5C5');
        delete errors[$( this ).attr('id')]

    }
    var pos;
    for (var i = 0; i < arrayMarkers.length; i++) {
        pos += arrayMarkers[i].getPosition().lat() + '&' + arrayMarkers[i].getPosition().lng() + ';';
    }
    console.log(pos)
    if(jQuery.isEmptyObject(errors)){

        $('#stepThreeButton').removeClass('invalid');
    }

});
function addElementsValidate(data){
    $( data ).each(function( index ) {
        errors[$( this ).attr('id')] = $( this ).attr('id');
    });
}
function validateEmpty(data) {

    if( jQuery.type( data ) == 'object' ){

        $( data ).each(function( index ) {
            errors[$( this ).attr('id')] = $( this ).attr('id');
        });

    }else {

    }
    if (!errors[0]){
        return true;
    }
    return false;
}