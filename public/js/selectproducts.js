var subcategories = $('#subcategoriesList'),
    productTable = $('#productTable'),
    products,
    $searchProduct = $('#searchProduct'),
    $return = [],
    html = "";
;

/*
 subcategories.on('click', 'li', function () {
 var params = {
 subcategory_id: $(this).data('id'),
 _token: $('#token').val()
 };

 $.post($('#callProducts').val(), params, function (data) {

 var products = data.products,
 html = "";

 $.each(products, function (i, product) {
 html += "<tr>" +
 "<td>" + product.name + "</td>" +
 "<td><input style='opacity:1' value='" + product.id + "' name='product_id' type='radio' class='productSelected'></td>" +
 "</tr>";
 });

 productTable.html(html);
 $('.productSelected').eq(0).attr('checked', 'checked');

 }, 'json');
 });
 */
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
        } else {
            productTable.html($return).slideDown();
        }
        $('.productSelected').eq(0).attr('checked', 'checked');
    });
});

function strInArray(str, strArray) {

    for (var j = 0; j < strArray.length; j++) {
        if (strArray[j].name.toLowerCase().match(str)) {
            console.log(strArray[j].name)
            $return.push("<tr>" +
                "<td>" + strArray[j].name + "</td>" +
                "<td><input style='opacity:1' value='" + strArray[j].id + "' name='product_id' type='radio' class='productSelected'></td>" +
                "</tr>"
            );
        }
    }

}




